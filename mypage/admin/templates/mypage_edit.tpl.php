<?php 
defined('IN_PHPCMS') or exit('Access Denied');
include admintpl('header');
?>
<body>
<script language=JavaScript>

// 表单提交检测
function doCheck(){

	if (myform.seo_title.value=="") {
	alert("请输入网页标题");
	myform.name.focus();
	return false;
	}
}
</script>
<?=$menu?>
<table cellpadding="2" cellspacing="1" class="tableborder">
  <tr>
    <th colspan=2>自定义网页</th>
  </tr>
  <form name="myform" id="myform" method="post" action="?mod=<?=$mod?>&file=<?=$file?>&action=<?=$action?>&mypageid=<?=$mypageid?>" onsubmit="return doCheck();">
    <tr> 
      <td width="30%" class="tablerow"><b>名称</b><font color="red">*</font>
	  <br>必须由英文字母、数字和下划线组成
	  </td>
      <td width="70%" class="tablerow"><input name="name" type="text" size="30" value="<?=$name?>" disabled></td>
    </tr>
    <tr> 
      <td class="tablerow"><b>网页标题</b><font color="red">*</font><br>将显示到浏览器标题栏，所有搜索引擎均重视此项内容</td>
      <td class="tablerow"><input name="seo_title" type="text" size="60" value="<?=$seo_title?>"><br>如果不设置则系统以标题代替此项</td>
    </tr>
    <tr> 
      <td class="tablerow"><b>网页关键词</b><br>不显示，部分搜索引擎重视此项内容</td>
      <td class="tablerow"><input name="seo_keywords" type="text" size="60" value="<?=$seo_keywords?>"><br>如果不设置则系统以网站关键词代替此项</td>
    </tr>
    <tr> 
      <td class="tablerow"><b>网页描述</b><br>不显示，GOOGLE搜索重视此项内容</td>
      <td class="tablerow"><input name="seo_description" type="text" size="60" value="<?=$seo_description?>"><br>如果不设置则系统以网站描述代替此项</td>
    </tr>
    <tr> 
      <td class="tablerow"><b>网页模板</b> 此网页套用的模板</td>
      <td class="tablerow"><?=$showtpl?>
      &nbsp;&nbsp;<input type="button" name="edittpl" value="修改选中模板" onclick="window.location='?mod=phpcms&file=template&channelid=<?=$channelid?>&action=edit&templateid='+myform.templateid.value+'&module=<?=$mod?>&referer=<?=urlencode($PHP_URL)?>'"> [注:只能修改非默认模板]
     </td>
    </tr>
	<tr> 
      <td class="tablerow"><b>网页风格</b> 此网页套用的风格</td>
      <td class="tablerow"><?=$showskin?></td>
    </tr>
    <tr> 
      <td class="tablerow"></td>
      <td class="tablerow">
        <input type="submit" name="dosubmit" value=" 确定 " > &nbsp;
        <input type="reset" name="Reset" value=" 清除 ">
      </td>
    </tr>
  </form>
</table>

</body>
</html>