<?php defined('IN_PHPCMS') or exit('Access Denied');
include admintpl('header');
?>
<body>
<table cellpadding="0" cellspacing="0" border="0" width="100%" height="10">
  <tr>
    <td></td>
  </tr>
</table>
<form name="myform" method="post" action="?mod=<?=$mod?>&file=<?=$file?>">
<table cellpadding="2" cellspacing="1" class="tableborder">
   <th colspan="2"><?=$MODULE[$mod]['name']?>模块配置</th>
	<tr>
      <td width='40%' class='tablerow'><strong>Meta Keywords（网页关键词）</strong><br>针对搜索引擎设置的关键词</td>
      <td class='tablerow'><textarea name='setting[seo_keywords]' cols='60' rows='2' id='seo_keywords'><?=$seo_keywords?></textarea></td>
    </tr>
    <tr>
      <td width='40%' class='tablerow'><strong>Meta Description（网页描述）</strong><br>针对搜索引擎设置的网页描述</td>
      <td class='tablerow'><textarea name='setting[seo_description]' cols='60' rows='2' id='seo_description'><?=$seo_description?></textarea></td>
    </tr>
    <tr>
      <td width='40%' class='tablerow'><strong>模块绑定域名</strong><br>最后不带反斜线'/'</td></td>
      <td class='tablerow'><input name='setting[moduledomain]' type='text' id='moduledomain' value='<?=$moduledomain?>' size='40' maxlength='50'></td>
    </tr>
    <tr>
      <td width='40%' class='tablerow'><strong>每页显示留言个数</strong></td></td>
      <td class='tablerow'><input name='setting[pagesize]' type='text' id='pagesize' value='<?=$pagesize?>' size='10' maxlength='50'></td>
    </tr>
	 <tr>
      <td width='40%' class='tablerow'><strong>留言最大字符数</strong></td></td>
      <td class='tablerow'><input name='setting[maxcontent]' type='text' id='maxcontent' value='<?=$maxcontent?>' size='10' maxlength='50'></td>
    </tr>
	<tr>
      <td width='40%' class='tablerow'><strong>是否开启验证码</strong>
	  </td>
      <td class='tablerow'>
	  <input type='radio' name='setting[enablecheckcode]' value='1'  <?php if($enablecheckcode){ ?>checked <?php } ?>> 是&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[enablecheckcode]' value='0'  <?php if(!$enablecheckcode){ ?>checked <?php } ?>> 否
     </td>
    </tr>
	 <tr>
      <td width='40%' class='tablerow'><strong>是否在前台显示留言</strong></td></td>
      <td class='tablerow'>
	  <input type='radio' name='setting[show]' value='1'  <?php if($show){ ?>checked <?php } ?>> 是&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[show]' value='0'  <?php if(!$show){ ?>checked <?php } ?>> 否
     </td>
    </tr>
	<tr>
      <td width='40%' class='tablerow'><strong>是否允许游客留言</strong>
	  </td>
      <td class='tablerow'>
	  <input type='radio' name='setting[enableTourist]' value='1'  <?php if($enableTourist){ ?>checked <?php } ?>> 是&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[enableTourist]' value='0'  <?php if(!$enableTourist){ ?>checked <?php } ?>> 否
     </td>
    </tr>
	<tr>
      <td width='40%' class='tablerow'><strong>留言是否需要审核</strong>
	  </td>
      <td class='tablerow'>
	  <input type='radio' name='setting[checkpass]' value='1'  <?php if($checkpass){ ?>checked <?php } ?>> 是&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[checkpass]' value='0'  <?php if(!$checkpass){ ?>checked <?php } ?>> 否
     </td>
    </tr>
	<tr>
      <td width='40%' class='tablerow'><strong>是否允许使用html代码</strong>
	  </td>
      <td class='tablerow'>
	  <input type='radio' name='setting[usehtml]' value='1'  <?php if($usehtml){ ?>checked <?php } ?>> 是&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[usehtml]' value='0'  <?php if(!$usehtml){ ?>checked <?php } ?>> 否
     </td>
    </tr>
</table>

<table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
  <tr>
     <td width='40%'></td>
     <td><input type="submit" name="dosubmit" value=" 确定 ">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" 重置 "></td>
  </tr>
</table>
</form>
</body>
</html>