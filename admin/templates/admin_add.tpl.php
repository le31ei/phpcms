<?php 
defined('IN_PHPCMS') or exit('Access Denied');
include admintpl('header');
?>

<script LANGUAGE="javascript">
<!--
function gradechange(val){
	if(val == 1)
	{
		document.all.select_channel.style.display="block";
		document.all.select_module.style.display="block";
		<?php  
			foreach($CHANNEL as $channelid=>$channel)
			{
				if(!$channel['islink'])
				{	
		?>
		table_<?=$channelid?>.style.display='none';
		<?php 
				}
			}
		?>
	}
	else if(val > 1)
	{
		document.all.select_channel.style.display="block";
		document.all.select_module.style.display="none";
		if(val == 2)
		{
			<?php  
				foreach($CHANNEL as $channelid=>$channel)
				{
					if(!$channel['islink'])
					{	
			?>
			table_<?=$channelid?>.style.display='none';
			<?php 
					}
				}
			?>
		}
		else
		{
			<?php  
				foreach($CHANNEL as $channelid=>$channel)
				{
					if(!$channel['islink'])
					{	
			?>
			if(document.myform.channel<?=$channelid?>.checked==true) table_<?=$channelid?>.style.display='';
			<?php 
					}
				}
			?>
		}
	}
}

function Check() {
     if (document.myform.username.value=="")
	 {
	  alert("请输入用户名！")
	  document.myform.username.focus()
	  return false
	 }
	 GetCatPurview();
}

function GetCatPurview(){
  document.myform.catids.value='';
<?php 
if(is_array($CHANNEL))
{
	foreach($CHANNEL as $channel)
	{
		if(!$channel['islink'])
		{
			$channelid = $channel['channelid'];
			$channeldir = $channel['channeldir'];
			$CATEGORY = cache_read('categorys_'.$channelid.'.php');
			if(is_array($CATEGORY) && $CATEGORY)
			{
?>
  if(document.myform.channel<?=$channelid?>.checked==true){
	<?php if(count($CATEGORY) > 1){ ?>
     for(var i=0;i<frm_<?=$channelid?>.document.myform.catid.length;i++){
         if (frm_<?=$channelid?>.document.myform.catid[i].checked==true){
             if (document.myform.catids.value=='') document.myform.catids.value= ',';
             document.myform.catids.value+=frm_<?=$channelid?>.document.myform.catid[i].value+',';
         }
     }
	<?php }else{ ?>
         if (frm_<?=$channelid?>.document.myform.catid.checked==true){
		     document.myform.catids.value = ','+frm_<?=$channelid?>.document.myform.catid.value+',';
         }
	<?php } ?>
  }
<?php 
			}
		}
	}
}
?>
}
//-->
</script>

<body>
<?=$menu?>
<table cellpadding="2" cellspacing="1" class="tableborder">
  <tr>
    <th colspan="2">添加管理员</th>
  </tr>
   <form action="?mod=<?=$mod?>&file=<?=$file?>&action=<?=$action?>" method="post" name="myform" onsubmit="return Check()">
    <tr> 
      <td width="20%" class="tablerow">用户名</td>
      <td class="tablerow">
      <input size="20" name="username" type=text value="<?=$username?>">
      </td>
    </tr>
	<tr> 
      <td class="tablerow">管理员级别</td>
      <td class="tablerow">
	  <select name='grade' onchange="javascript:gradechange(this.value)">
<?php 
foreach($grades as $k=>$v)
{
	echo "<option value='$k'>$v</option>";
}
?>
	  </select>
     </td>
    </tr>
<tbody id="select_channel" style="display:none">
	<tr> 
	<td class="tablerow">选择频道</td>
	<td class="tablerow">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<?php 
if(is_array($CHANNEL)){
	foreach($CHANNEL as $channel){
		if(!$channel['islink']){
?>
  <tr>
    <td height="25"><input size=50 name="channel[<?=$channel['channelid']?>]" id="channel<?=$channel['channelid']?>"  type="checkbox" value="<?=$channel['channelid']?>" onclick="if(this.checked==true && myform.grade.value>2)table_<?=$channel['channelid']?>.style.display='';else table_<?=$channel['channelid']?>.style.display='none';"><?=$channel['channelname']?>频道 <br/></td>
  </tr>
  <tr id='table_<?=$channel['channelid']?>' style='display:none'>
    <td><iframe id='frm_<?=$channel['channelid']?>' height='200' width='100%' src='?mod=<?=$mod?>&file=<?=$file?>&action=purview_category&channelid=<?=$channel['channelid']?>'></iframe></td>
  </tr>
<?php 
		}
	}
}
?>
</table>
	</td>
	</tr>
</tbody>
<tbody id="select_module" style="display:none">
	<tr> 
	<td class="tablerow">选择模块</td>
	<td class="tablerow">

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<?php 
if(is_array($MODULE)){
	$k=0;
	foreach($MODULE as $module=>$m){
		if($m['iscopy']==0 && $m['isshare']==0 && $module!='phpcms'){
		if($k%4==0) echo "<tr>";
?>
    <td height="25"><input size=50 name="module[]" type="checkbox" value="<?=$module?>"><?=$m['name']?></td>
<?php 
		if($k%4==3) echo "</tr>";
	    $k++;
		}
	}
}
?>
</table>
	</td>
	</tr>
</tbody>
    <tr> 
      <td class="tablerow"></td>
      <td class="tablerow">
	  <input type="hidden" name="catids" value="">
	  <input type="submit" name="dosubmit" value=" 确定 "> 
     &nbsp; <input type="reset" name="reset" value=" 清除 "> </td>
    </tr>
  </form>
</table>
</body>
</html>