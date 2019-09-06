<?php
$tags_config = array (
  '专题文章' => 
  array (
    'func' => 'article_list',
    'introduce' => '',
    'channelid' => '1',
    'catid' => '0',
    'specialid' => '2',
    'child' => '1',
    'page' => '0',
    'articlenum' => '10',
    'titlelen' => '30',
    'introducelen' => '0',
    'typeid' => '0',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '0',
    'showcatname' => '0',
    'showauthor' => '0',
    'showhits' => '0',
    'target' => '0',
    'cols' => '1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-01-13 10:18:30',
    'editor' => 'phpcms',
    'longtag' => 'article_list(0,1,0,1,2,0,10,30,0,0,0,0,0,0,0,0,0,0,1,\'\')',
  ),
  '类别最新文章' => 
  array (
    'func' => 'article_list',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '0',
    'child' => '1',
    'specialid' => '0',
    'page' => '0',
    'articlenum' => '10',
    'titlelen' => '26',
    'introducelen' => '0',
    'typeid' => '$typeid',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '2',
    'showcatname' => '1',
    'showauthor' => '0',
    'showhits' => '0',
    'target' => '1',
    'cols' => '1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-03-12 09:36:13',
    'editor' => 'phpcms',
    'longtag' => 'article_list(0,$channelid,0,1,0,0,10,26,0,$typeid,0,0,0,2,1,0,0,1,1,\'\')',
  ),
  '类别文章列表' => 
  array (
    'func' => 'article_list',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '0',
    'child' => '1',
    'specialid' => '0',
    'page' => '$page',
    'articlenum' => '20',
    'titlelen' => '50',
    'introducelen' => '0',
    'typeid' => '$typeid',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '2',
    'showcatname' => '1',
    'showauthor' => '0',
    'showhits' => '0',
    'target' => '1',
    'cols' => '1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-01-19 10:20:24',
    'editor' => 'phpcms',
    'longtag' => 'article_list(0,$channelid,0,1,0,$page,20,50,0,$typeid,0,0,0,2,1,0,0,1,1,\'\')',
  ),
  '类别推荐图片文章' => 
  array (
    'func' => 'article_thumb',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '0',
    'child' => '1',
    'specialid' => '0',
    'page' => '0',
    'articlenum' => '2',
    'titlelen' => '10',
    'introducelen' => '0',
    'typeid' => '$typeid',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '0',
    'showalt' => '1',
    'imgwidth' => '100',
    'imgheight' => '100',
    'target' => '1',
    'cols' => '2',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-01-19 10:02:17',
    'editor' => 'phpcms',
    'longtag' => 'article_thumb(0,$channelid,0,1,0,0,2,10,0,$typeid,0,0,0,0,1,1,100,100,2,\'\')',
  ),
  '终极栏目页文章列表' => 
  array (
    'func' => 'article_list',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '$catid',
    'child' => '1',
    'specialid' => '0',
    'page' => '$page',
    'articlenum' => '20',
    'titlelen' => '50',
    'introducelen' => '0',
    'typeid' => '0',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '0',
    'showcatname' => '0',
    'showauthor' => '0',
    'showhits' => '0',
    'target' => '0',
    'cols' => '1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-01-15 12:15:30',
    'editor' => 'phpcms',
    'longtag' => 'article_list(0,$channelid,$catid,1,0,$page,20,50,0,0,0,0,0,0,0,0,0,0,1,\'\')',
  ),
  '栏目热点文章' => 
  array (
    'func' => 'article_list',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '$catid',
    'child' => '1',
    'specialid' => '0',
    'page' => '$page',
    'articlenum' => '10',
    'titlelen' => '30',
    'introducelen' => '0',
    'typeid' => '0',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '0',
    'showcatname' => '0',
    'showauthor' => '0',
    'showhits' => '0',
    'target' => '0',
    'cols' => '1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-01-15 12:02:45',
    'editor' => 'phpcms',
    'longtag' => 'article_list(0,$channelid,$catid,1,0,$page,10,30,0,0,0,0,0,0,0,0,0,0,1,\'\')',
  ),
  '频道首页焦点文章' => 
  array (
    'func' => 'article_list',
    'introduce' => '频道首页焦点文章',
    'channelid' => '$channelid',
    'catid' => '0',
    'child' => '1',
    'specialid' => '0',
    'page' => '0',
    'articlenum' => '10',
    'titlelen' => '50',
    'introducelen' => '0',
    'typeid' => '0',
    'posid' => '2',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '2',
    'showcatname' => '1',
    'showauthor' => '0',
    'showhits' => '0',
    'target' => '1',
    'cols' => '1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-02-10 10:13:34',
    'editor' => 'phpcms',
    'longtag' => 'article_list(0,$channelid,0,1,0,0,10,50,0,0,2,0,0,2,1,0,0,1,1,\'\')',
  ),
  '频道首页推荐' => 
  array (
    'func' => 'article_list',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '0',
    'child' => '1',
    'specialid' => '0',
    'page' => '0',
    'articlenum' => '10',
    'titlelen' => '50',
    'introducelen' => '0',
    'typeid' => '0',
    'posid' => '3',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '2',
    'showcatname' => '1',
    'showauthor' => '0',
    'showhits' => '0',
    'target' => '1',
    'cols' => '1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-02-10 10:13:51',
    'editor' => 'phpcms',
    'longtag' => 'article_list(0,$channelid,0,1,0,0,10,50,0,0,3,0,0,2,1,0,0,1,1,\'\')',
  ),
  '频道首页热点' => 
  array (
    'func' => 'article_list',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '0',
    'child' => '1',
    'specialid' => '0',
    'page' => '0',
    'articlenum' => '10',
    'titlelen' => '50',
    'introducelen' => '0',
    'typeid' => '0',
    'posid' => '0',
    'datenum' => '30',
    'ordertype' => '3',
    'datetype' => '2',
    'showcatname' => '1',
    'showauthor' => '0',
    'showhits' => '0',
    'target' => '1',
    'cols' => '1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-01-15 10:28:32',
    'editor' => 'phpcms',
    'longtag' => 'article_list(0,$channelid,0,1,0,0,10,50,0,0,0,30,3,2,1,0,0,1,1,\'\')',
  ),
  '频道首页图片文章' => 
  array (
    'func' => 'article_thumb',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '0',
    'child' => '1',
    'specialid' => '0',
    'page' => '0',
    'articlenum' => '5',
    'titlelen' => '20',
    'introducelen' => '0',
    'typeid' => '0',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '0',
    'showalt' => '1',
    'imgwidth' => '135',
    'imgheight' => '100',
    'target' => '1',
    'cols' => '5',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-01-15 10:29:24',
    'editor' => 'phpcms',
    'longtag' => 'article_thumb(0,$channelid,0,1,0,0,5,20,0,0,0,0,0,0,1,1,135,100,5,\'\')',
  ),
  '频道首页栏目最新文章' => 
  array (
    'func' => 'article_list',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '$cat[\'catid\']',
    'child' => '1',
    'specialid' => '0',
    'page' => '0',
    'articlenum' => '10',
    'titlelen' => '40',
    'introducelen' => '0',
    'typeid' => '0',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '2',
    'showcatname' => '0',
    'showauthor' => '0',
    'showhits' => '0',
    'target' => '1',
    'cols' => '1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-01-15 10:28:38',
    'editor' => 'phpcms',
    'longtag' => 'article_list(0,$channelid,$cat[\'catid\'],1,0,0,10,40,0,0,0,0,0,2,0,0,0,1,1,\'\')',
  ),
  '子栏目文章列表' => 
  array (
    'func' => 'article_list',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '$childcat[\'catid\']',
    'child' => '1',
    'specialid' => '0',
    'page' => '0',
    'articlenum' => '10',
    'titlelen' => '40',
    'introducelen' => '0',
    'typeid' => '0',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '2',
    'showcatname' => '0',
    'showauthor' => '0',
    'showhits' => '0',
    'target' => '1',
    'cols' => '1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-03-07 03:13:58',
    'editor' => 'phpcms',
    'longtag' => 'article_list(0,$channelid,$childcat[\'catid\'],1,0,0,10,40,0,0,0,0,0,2,0,0,0,1,1,\'\')',
  ),
  '栏目页图片文章列表' => 
  array (
    'func' => 'article_thumb',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '$catid',
    'child' => '1',
    'specialid' => '0',
    'page' => '0',
    'articlenum' => '5',
    'titlelen' => '20',
    'introducelen' => '0',
    'typeid' => '0',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '0',
    'showalt' => '1',
    'imgwidth' => '135',
    'imgheight' => '100',
    'target' => '1',
    'cols' => '5',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-01-15 10:29:32',
    'editor' => 'phpcms',
    'longtag' => 'article_thumb(0,$channelid,$catid,1,0,0,5,20,0,0,0,0,0,0,1,1,135,100,5,\'\')',
  ),
  '推荐文章列表' => 
  array (
    'func' => 'article_list',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '$catid',
    'child' => '1',
    'specialid' => '0',
    'page' => '0',
    'articlenum' => '10',
    'titlelen' => '26',
    'introducelen' => '0',
    'typeid' => '0',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '0',
    'showcatname' => '0',
    'showauthor' => '0',
    'showhits' => '0',
    'target' => '1',
    'cols' => '1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-03-12 09:36:01',
    'editor' => 'phpcms',
    'longtag' => 'article_list(0,$channelid,$catid,1,0,0,10,26,0,0,0,0,0,0,0,0,0,1,1,\'\')',
  ),
  '热点文章列表' => 
  array (
    'func' => 'article_list',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '$catid',
    'child' => '1',
    'specialid' => '0',
    'page' => '0',
    'articlenum' => '10',
    'titlelen' => '26',
    'introducelen' => '0',
    'typeid' => '0',
    'posid' => '0',
    'datenum' => '30',
    'ordertype' => '3',
    'datetype' => '0',
    'showcatname' => '0',
    'showauthor' => '0',
    'showhits' => '0',
    'target' => '1',
    'cols' => '1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-03-12 09:35:51',
    'editor' => 'phpcms',
    'longtag' => 'article_list(0,$channelid,$catid,1,0,0,10,26,0,0,0,30,3,0,0,0,0,1,1,\'\')',
  ),
  '相关文章列表' => 
  array (
    'func' => 'article_related',
    'introduce' => '',
    'channelid' => '$channelid',
    'articleid' => '$articleid',
    'keywords' => '$keywords',
    'articlenum' => '10',
    'titlelen' => '30',
    'datetype' => '0',
    'templateid' => '0',
    'edittime' => '2007-01-15 10:38:10',
    'editor' => 'phpcms',
    'longtag' => 'article_related(0,$channelid,$keywords,$articleid,10,30,0)',
  ),
  '内容页面最新文章列表' => 
  array (
    'func' => 'article_list',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '$catid',
    'child' => '1',
    'specialid' => '0',
    'page' => '0',
    'articlenum' => '10',
    'titlelen' => '26',
    'introducelen' => '0',
    'typeid' => '0',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '0',
    'showcatname' => '0',
    'showauthor' => '0',
    'showhits' => '0',
    'target' => '1',
    'cols' => '1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-03-12 09:38:50',
    'editor' => 'phpcms',
    'longtag' => 'article_list(0,$channelid,$catid,1,0,0,10,26,0,0,0,0,0,0,0,0,0,1,1,\'\')',
  ),
  '文章频道首页幻灯片' => 
  array (
    'func' => 'article_slide',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '0',
    'child' => '1',
    'specialid' => '0',
    'articlenum' => '5',
    'titlelen' => '30',
    'typeid' => '0',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '0',
    'imgwidth' => '260',
    'imgheight' => '234',
    'timeout' => '5',
    'effectid' => '-1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-01-17 04:01:25',
    'editor' => 'phpcms',
    'longtag' => 'article_slide(0,$channelid,0,1,0,5,30,0,0,0,0,260,234,5,-1,\'\')',
  ),
  '专题子分类最新文章' => 
  array (
    'func' => 'article_list',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '0',
    'child' => '1',
    'specialid' => '$specialid',
    'page' => '0',
    'articlenum' => '10',
    'titlelen' => '50',
    'introducelen' => '0',
    'typeid' => '0',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '1',
    'showcatname' => '0',
    'showauthor' => '0',
    'showhits' => '0',
    'target' => '1',
    'cols' => '1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-01-15 05:10:45',
    'editor' => 'phpcms',
    'longtag' => 'article_list(0,$channelid,0,1,$specialid,0,10,50,0,0,0,0,0,1,0,0,0,1,1,\'\')',
  ),
  '专题文章列表' => 
  array (
    'func' => 'article_list',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '0',
    'child' => '0',
    'specialid' => '$subspecialid',
    'page' => '0',
    'articlenum' => '100',
    'titlelen' => '50',
    'introducelen' => '0',
    'typeid' => '0',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '1',
    'showcatname' => '0',
    'showauthor' => '0',
    'showhits' => '0',
    'target' => '0',
    'cols' => '1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-01-15 05:12:46',
    'editor' => 'phpcms',
    'longtag' => 'article_list(0,$channelid,0,0,$subspecialid,0,100,50,0,0,0,0,0,1,0,0,0,0,1,\'\')',
  ),
  '网站首页幻灯片' => 
  array (
    'func' => 'article_slide',
    'introduce' => '',
    'channelid' => '1',
    'catid' => '0',
    'child' => '1',
    'specialid' => '0',
    'articlenum' => '5',
    'titlelen' => '30',
    'typeid' => '0',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '0',
    'imgwidth' => '260',
    'imgheight' => '220',
    'timeout' => '5',
    'effectid' => '-1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-01-15 07:41:22',
    'editor' => 'phpcms',
    'longtag' => 'article_slide(0,1,0,1,0,5,30,0,0,0,0,260,220,5,-1,\'\')',
  ),
  '网站首页推荐图片文章' => 
  array (
    'func' => 'article_thumb',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '0',
    'child' => '1',
    'specialid' => '0',
    'page' => '0',
    'articlenum' => '2',
    'titlelen' => '24',
    'introducelen' => '100',
    'typeid' => '0',
    'posid' => '1',
    'datenum' => '0',
    'ordertype' => '0',
    'datetype' => '0',
    'showalt' => '1',
    'imgwidth' => '145',
    'imgheight' => '100',
    'target' => '1',
    'cols' => '2',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-03-30 05:11:13',
    'editor' => 'phpcms',
    'longtag' => 'article_thumb(0,$channelid,0,1,0,0,2,24,100,0,1,0,0,0,1,1,145,100,2,\'\')',
  ),
  '网站首页最新文章' => 
  array (
    'func' => 'article_list',
    'introduce' => '',
    'channelid' => '$channelid',
    'catid' => '0',
    'child' => '1',
    'specialid' => '0',
    'page' => '0',
    'articlenum' => '10',
    'titlelen' => '30',
    'introducelen' => '0',
    'typeid' => '0',
    'posid' => '0',
    'datenum' => '0',
    'ordertype' => '1',
    'datetype' => '2',
    'showcatname' => '1',
    'showauthor' => '0',
    'showhits' => '0',
    'target' => '1',
    'cols' => '1',
    'username' => '',
    'templateid' => '0',
    'edittime' => '2007-03-30 05:11:53',
    'editor' => 'phpcms',
    'longtag' => 'article_list(0,$channelid,0,1,0,0,10,30,0,0,0,0,1,2,1,0,0,1,1,\'\')',
  ),
);
?>