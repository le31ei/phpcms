<?php
$tags_config = array (
  '投票首页列表标签' => 
  array (
    'func' => 'vote_list',
    'introduce' => '',
    'page' => '$page',
    'keyid' => '$keyid',
    'votenum' => '10',
    'subjectlen' => '50',
    'cols' => '3',
    'templateid' => 'tag_vote_list-detail',
    'edittime' => '2007-01-15 03:25:58',
    'editor' => 'phpcms',
    'longtag' => 'vote_list(\'tag_vote_list-detail\',$keyid,$page,10,50,3)',
  ),
  '网站首页投票调查' => 
  array (
    'func' => 'vote_list',
    'introduce' => '',
    'page' => '0',
    'keyid' => '0',
    'votenum' => '1',
    'subjectlen' => '50',
    'cols' => '1',
    'templateid' => 'tag_vote_list-detail',
    'edittime' => '2007-01-15 03:27:37',
    'editor' => 'phpcms',
    'longtag' => 'vote_list(\'tag_vote_list-detail\',0,0,1,50,1)',
  ),
  '文章频道首页投票' => 
  array (
    'func' => 'vote_list',
    'introduce' => '',
    'page' => '0',
    'keyid' => '$channelid',
    'votenum' => '1',
    'subjectlen' => '50',
    'cols' => '1',
    'templateid' => 'tag_vote_list-detail',
    'edittime' => '2007-01-20 02:28:12',
    'editor' => 'phpcms',
    'longtag' => 'vote_list(\'tag_vote_list-detail\',$channelid,0,1,50,1)',
  ),
  '图片频道首页投票' => 
  array (
    'func' => 'vote_list',
    'introduce' => '',
    'page' => '0',
    'keyid' => '$channelid',
    'votenum' => '1',
    'subjectlen' => '50',
    'cols' => '1',
    'templateid' => 'tag_vote_list-detail',
    'edittime' => '2007-01-15 05:38:08',
    'editor' => 'phpcms',
    'longtag' => 'vote_list(\'tag_vote_list-detail\',$channelid,0,1,50,1)',
  ),
  '下载频道首页投票' => 
  array (
    'func' => 'vote_list',
    'introduce' => '',
    'page' => '0',
    'keyid' => '$channelid',
    'votenum' => '1',
    'subjectlen' => '50',
    'cols' => '1',
    'templateid' => 'tag_vote_list',
    'edittime' => '2007-01-15 05:38:03',
    'editor' => 'phpcms',
    'longtag' => 'vote_list(\'tag_vote_list\',$channelid,0,1,50,1)',
  ),
);
?>