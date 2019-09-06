<?php
class content
{
	var $db;
	var $table;
	var $table_log;
	var $model_table;
	var $table_category;
	var $ishtml = 0;
	var $userid = 0;
	var $userid_sql = '';
	var $pages;
	var $number;
	var $url;
	var $html;
	var $s;
	var $is_update_related = 1;

    function __construct()
    {
		global $db, $log, $MODULE;
		$this->db = &$db;
		$this->table = DB_PRE.'content';
		$this->table_count = DB_PRE.'content_count';
		$this->table_position = DB_PRE.'content_position';
		$this->table_tag = DB_PRE.'content_tag';
		$this->table_category = DB_PRE.'category';
		$this->log = is_object($log) ? $log : load('log.class.php');
		$this->url = load('url.class.php');
    }

	function content()
	{
		$this->__construct();
	}

	function set_catid($catid)
	{
		global $CATEGORY, $MODEL;
		if(!isset($CATEGORY[$catid])) return false;
		$modelid = $CATEGORY[$catid]['modelid'];
		if(!isset($MODEL[$modelid])) return false;
		$this->modelid = $modelid;
		$this->ishtml = $MODEL[$modelid]['ishtml'];
		$this->model_table = DB_PRE.'c_'.$MODEL[$modelid]['tablename'];
		return true;
	}

	function set_userid($userid)
	{
		$this->userid = intval($userid);
		$this->userid_sql = " AND $this->table.`userid`=$this->userid ";
	}

	function get($contentid, $tablecount = 2)
	{
		$contentid = intval($contentid);
		$data = $this->db->get_one("SELECT * FROM `$this->table` WHERE `contentid`=$contentid $this->userid_sql");
		if($data)
		{
			if($tablecount >= 2)
			{
				$this->set_catid($data['catid']);
				if(!$this->model_table) return false;
				$data2 = $this->db->get_one("SELECT * FROM `$this->model_table` WHERE `contentid`=$contentid");
				if($tablecount == 2 && is_array($data) && is_array($data2)) $data = array_merge($data, $data2);
			}
			if($tablecount == 3)
			{
				$data3 = $this->db->get_one("SELECT * FROM `$this->table_count` WHERE `contentid`=$contentid");
				if(is_array($data) && is_array($data2) && is_array($data3)) $data = array_merge($data, $data2, $data3);
			}
		}
		return $data;
	}

	function add($data,$cat_selected = 0, $isimport = 0)
	{
		global $_userid, $_username,$CATEGORY, $MODEL;
        if(!$this->set_catid($data['catid'])) return false;

		require_once CACHE_MODEL_PATH.'content_input.class.php';
        require_once CACHE_MODEL_PATH.'content_update.class.php';
		$content_input = new content_input($this->modelid);
		$inputinfo = $content_input->get($data, $isimport);
		$systeminfo = $inputinfo['system'];
		$modelinfo = $inputinfo['model'];
		if(!$systeminfo['username']) $systeminfo['username'] = $_username;
		if(!$systeminfo['userid']) $systeminfo['userid'] = $_userid;

			if($data['inputtime'])
			{
				$systeminfo['inputtime'] = strtotime($data['inputtime']);
			}
			else
			{
				$systeminfo['inputtime'] = TIME;
			}
			if($data['updatetime'])
			{
				$systeminfo['updatetime'] = strtotime($data['updatetime']);
			}
			else
			{
				$systeminfo['updatetime'] = TIME;
			}

		$this->db->insert($this->table, $systeminfo);
		$contentid = $this->db->insert_id();
        $modelinfo['contentid'] = $contentid;
		$this->db->insert($this->model_table, $modelinfo);
		if($data['islink']==1)
		{
			$url = $data['linkurl'];
		}
		else
		{
			$url = $this->url->show($contentid, 0, $systeminfo['catid'], $systeminfo['inputtime'], $data['prefix']);
		}
        $this->db->query("UPDATE `$this->table` SET `url`='$url' WHERE `contentid`=$contentid");
        $this->db->query("UPDATE `$this->table_category` SET `items`=`items`+1 WHERE `catid`='".$data['catid']."'");
		$this->db->query("INSERT INTO `$this->table_count`(`contentid`) VALUES('$contentid')");

		if(is_array($cat_selected) && !empty($cat_selected))
		{
			$relink_array['title'] = $data['title'];
			$relink_array['url'] = $url;
			$relink_array['islink'] = 1;
			$relink_array['username'] = $_username;
			$relink_array['userid'] = $_userid;
			$relink_array['inputtime'] = $systeminfo['inputtime'];
			$relink_array['updatetime'] = $systeminfo['updatetime'];
			$relink_array['status'] = $data['status'];
			foreach($cat_selected AS $cid)
			{
				$relink_array['catid'] = $cid;
				$relink_modelid = $CATEGORY[$cid]['modelid'];
				$relink_model_table = DB_PRE.'c_'.$MODEL[$relink_modelid]['tablename'];
				$this->db->insert($this->table, $relink_array);
				$relink_contentid = $this->db->insert_id();
				$relinkinfo['contentid'] = $relink_contentid;
				$this->db->insert($relink_model_table, $relinkinfo);
			}
		}
		$content_update = new content_update($this->modelid, $contentid);
		$content_update->update($data);

		if(!$isimport) $this->log_write($contentid);
		return $contentid;
	}

	function edit($contentid, $data)
	{
		global $MODEL;
        if(!$this->set_catid($data['catid'])) return false;
		require_once CACHE_MODEL_PATH.'content_input.class.php';
        require_once CACHE_MODEL_PATH.'content_update.class.php';
		if(!$MODEL[$this->modelid]['isrelated']) $this->is_update_related = 0;

		$content_input = new content_input($this->modelid);
		$inputinfo = $content_input->get($data);
		$systeminfo = $inputinfo['system'];
		$modelinfo = $inputinfo['model'];
		$systeminfo['updatetime'] = TIME;
		unset($systeminfo['status']);
		if($data['islink']==1)
		{
			$systeminfo['url'] = $data['linkurl'];
		}
		else
		{
			 $systeminfo['url'] = $this->url->show($contentid, 0, 0, 0, $data['prefix']);
		}
		$this->db->update($this->table, $systeminfo, "`contentid`=$contentid $this->userid_sql");
		if($modelinfo) $this->db->update($this->model_table, $modelinfo, "`contentid`=$contentid");

		$content_update = new content_update($this->modelid, $contentid);
		$content_update->update($data);

		$this->log_write($contentid);
		return true;
	}

	function listinfo($where = '', $order = '`listorder` DESC,`contentid` DESC', $page = 1, $pagesize = 50)
	{
		if($where) $where = " WHERE $where $this->userid_sql";
		if($order) $order = " ORDER BY $order";
		$page = max(intval($page), 1);
        $offset = $pagesize*($page-1);
        $limit = " LIMIT $offset, $pagesize";
        $number = cache_count("SELECT count(*) AS `count` FROM `$this->table` $where");
        $this->pages = pages($number, $page, $pagesize);
		$array = array();
		$result = $this->db->query("SELECT * FROM `$this->table` $where $order $limit");
		while($r = $this->db->fetch_array($result))
		{
		    $r['inputtime'] = $r['inputtime'];
		    $r['updatetime'] = $r['updatetime'];
			$array[] = $r;
		}
		$this->number = $this->db->num_rows($result);
        $this->db->free_result($result);
		return $array;
	}

	function listorder($info)
	{
		if(!is_array($info)) return false;
		foreach($info as $id=>$listorder)
		{
			$id = intval($id);
			$listorder = intval($listorder);
			$this->db->query("UPDATE `$this->table` SET `listorder`=$listorder WHERE `contentid`=$id $this->userid_sql");
			$this->log_write($id, 'listorder');
		}
		return true;
	}

	function search($sql, $page = 1, $pagesize = 20, $setting = array())
	{
		$page = max(intval($page), 1);
		$offset = $number*($page-1);
		$sql_count = preg_replace("/^SELECT([^(]+)FROM(.+)(ORDER BY.+)$/i", "SELECT COUNT(*) AS `count` FROM\\2", $sql);
		$count = cache_count($sql_count);
		$this->pages = pages($count, $page, $number);
		$data = array();
		$result = $db->query("$sql LIMIT $offset, $number");
		while($r = $db->fetch_array($result))
		{
			$data[] = $r;
		}
		$db->free_result($result);
		return $data;
	}

	function output($data)
	{
		require_once CACHE_MODEL_PATH.'content_output.class.php';
		$output = new content_output();
		return $output->get($data);
	}

	function log_write($contentid, $handle = '', $is_admin = 0)
	{
		if($is_admin) $this->ishtml = 1;

		if($this->ishtml && ($handle == '' || $handle == 99))
		{
			if(!is_object($this->html)) $this->html = load('html.class.php');
			$this->html->show($contentid, $this->is_update_related);
		}
		$this->search_api($contentid);
		$this->log->set('contentid', $contentid);
		return $this->log->add();
	}

	function search_api($contentid)
	{
		global $MODULE,$MODEL,$CATEGORY;
		if(!isset($MODULE['search'])) return false;
		if(!is_object($this->s)) $this->s = load('search.class.php', 'search', 'include');
		$r = $this->get($contentid);
		if(!$r) return false;
		$modelid = $CATEGORY[$r['catid']]['modelid'];
		if(!$MODEL[$modelid]['enablesearch']) return false;
        $type = $MODEL[$modelid]['tablename'];
		$this->s->set_type($type);
		if($r['searchid'])
		{
			if($r['status'] == 99)
			{
				$fulltext_array = cache_read($modelid.'_fields.inc.php',CACHE_MODEL_PATH);
				foreach($fulltext_array AS $key=>$value)
				{
					if($value['isfulltext']) $fulltextcontent .= $r[$key].' ';
				}
				$this->s->update($r['searchid'], $r['title'], $fulltextcontent, $r['url']);
			}
			else
			{
				$this->s->delete($r['searchid']);
			}
		}
		else
		{
			$fulltext_array = cache_read($modelid.'_fields.inc.php',CACHE_MODEL_PATH);
			foreach($fulltext_array AS $key=>$value)
			{
				if($value['isfulltext']) $fulltextcontent .= $r[$key].' ';
			}
			$searchid = $this->s->add($r['title'], $fulltextcontent, $r['url']);
			if(!$searchid) return false;
            $this->db->query("UPDATE `$this->table` SET `searchid`=$searchid WHERE `contentid`=$contentid");
		}
		return true;
	}

    function contentid($contentid, $userid = 0, $allow_status = array())
    {
		$where = "`contentid` IN(".implodeids($contentid).")";
		$where .= $allow_status ? " AND `status` IN(".implodeids($allow_status).")" : '';
		$where .=  $this->userid_sql;
		$array = array();
		$result = $this->db->query("SELECT `contentid` FROM `$this->table` WHERE $where");
		while($r = $this->db->fetch_array($result))
		{
			$array[] = $r['contentid'];
		}
        $this->db->free_result($result);
		return is_array($contentid) ? $array : $array[0];
    }

	function delete($contentid)
	{
		global $MODULE,$attachment;
		if(is_array($contentid))
		{
			array_map(array(&$this, 'delete'), $contentid);
		}
		else
		{
			$contentid = intval($contentid);
			$data = $this->db->get_one("SELECT `catid`,`url`,`searchid` FROM `$this->table` WHERE `contentid`=$contentid $this->userid_sql");
			if($data)
			{
				$this->set_catid($data['catid']);
				$this->db->query("DELETE `$this->table`,`$this->model_table` FROM `$this->table`,`$this->model_table` WHERE $this->table.contentid=$this->model_table.contentid AND $this->table.contentid=$contentid $this->userid_sql");
                $this->db->query("UPDATE `$this->table_category` SET `items`=`items`-1 WHERE `catid`='".$data['catid']."'");
				if($this->db->affected_rows())
				{
					$this->db->query("DELETE FROM `$this->table_count` WHERE `contentid`=$contentid");
					$this->db->query("DELETE FROM `$this->table_position` WHERE `contentid`=$contentid");
					$this->db->query("DELETE FROM `$this->table_tag` WHERE `contentid`=$contentid");
					$attachment->delete("`contentid`=$contentid");
					if(isset($MODULE['digg']))
					{
						$digg = load('digg.class.php', 'digg', 'include');
						$digg->delete($contentid);
					}
					if(isset($MODULE['mood']))
					{
						$this->db->query("DELETE FROM `".DB_PRE."mood_data` WHERE contentid=$contentid");
					}
					if(isset($MODULE['comment']))
					{
						$this->db->query("DELETE FROM `".DB_PRE."comment` WHERE keyid='phpcms-content-title-$contentid'");
					}
					if(isset($MODULE['search']))
					{
						$search = load('search.class.php', 'search', 'include');
						$search->delete($data['searchid']);
					}
				}
				if($this->ishtml) @unlink(PHPCMS_ROOT.$data['url']);
				$this->log_write($contentid, 'delete');
			}
		}
		return true;
	}

	function clear()
	{
		@set_time_limit(600);
		$result = $this->db->query("SELECT `contentid` FROM `$this->table` WHERE `status`=0");
		while($r = $this->db->fetch_array($result))
		{
			$this->delete($r['contentid']);
		}
        $this->db->free_result($result);
		return true;
	}

	function restore($contentid)
	{
		return $this->status($contentid, 99);
	}

	function restoreall()
	{
		@set_time_limit(600);
		$result = $this->db->query("SELECT `contentid` FROM `$this->table` WHERE `status`=0");
		while($r = $this->db->fetch_array($result))
		{
			$this->status($r['contentid'], 99);
		}
        $this->db->free_result($result);
		return true;
	}

	function count($where = '')
	{
		if($where) $where = " WHERE $where $this->userid_sql";
		return cache_count("SELECT count(*) AS `count` FROM `$this->table` $where");
	}

	function get_count($contentid)
	{
		$contentid = intval($contentid);
		return $this->db->get_one("SELECT * FROM `$this->table_count` WHERE `contentid`=$contentid");
	}

	function hits($contentid)
	{
		$contentid = intval($contentid);
		$r = $this->db->get_one("SELECT * FROM `$this->table_count` WHERE `contentid`=$contentid");
		if(!$r) return false;
		$hits = $r['hits'] + 1;
		$hits_day = (date('Ymd', $r['hits_time']) == date('Ymd', TIME)) ? ($r['hits_day'] + 1) : 1;
		$hits_week = (date('YW', $r['hits_time']) == date('YW', TIME)) ? ($r['hits_week'] + 1) : 1;
		$hits_month = (date('Ym', $r['hits_time']) == date('Ym', TIME)) ? ($r['hits_month'] + 1) : 1;
        return $this->db->query("UPDATE `$this->table_count` SET `hits`=$hits,`hits_day`=$hits_day,`hits_week`=$hits_week,`hits_month`=$hits_month,`hits_time`=".TIME." WHERE `contentid`=$contentid");
	}

	function status($contentid, $status, $is_admin = 0)
	{
		if(!$contentid) return false;
		$status = intval($status);
		$contentids = implodeids($contentid);
		$is_update = $this->db->query("UPDATE `$this->table` SET `status`=$status WHERE `contentid` IN($contentids) $this->userid_sql");
		if(is_array($contentid))
		{
			foreach($contentid as $id)
			{
				$this->log_write($id, $status,$is_admin);
			}
		}
		else
		{
			$this->log_write($contentid, $status,$is_admin);
		}
		return $is_update;
	}

	function get_status($processid)
	{
		$processid = intval($processid);
		$array = array();
		$result = $this->db->query("SELECT `status` FROM `".DB_PRE."process_status` WHERE `processid`=$processid");
		while($r = $this->db->fetch_array($result))
		{
			$array[] = $r['status'];
		}
        $this->db->free_result($result);
		return $array;
	}

	function move($id = '', $targetcatid = 0, $iscatid = 0)
	{
		if($iscatid)
		{
			if(!is_array($id)) return false;
			$ids = implode(',',$id);
			$this->db->query("UPDATE $this->table SET catid='$targetcatid' WHERE catid IN($ids)");
		}
		else
		{
			$this->db->query("UPDATE $this->table SET catid='$targetcatid' WHERE contentid IN ($id)");
		}
		return true;
	}
}
?>