<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('LazyLoad')) {$zbp->ShowError(48);die();}

$blogtitle='LazyLoad';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
if(isset($_POST['LazyLoadImg'])){
  $zbp->Config('LazyLoad')->LazyLoadImg = $_POST['LazyLoadImg'];
  $zbp->Config('LazyLoad')->Save();
  $zbp->ShowHint('good');
  Redirect("main.php");
}
?>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
  </div>
  <div id="divMain2">
	<form id="form1" name="form1" method="post">  
    <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
		<tr>
			<th width="15%"><p align="center">配置名称</p></th>
			<th width="50%"><p align="center">配置内容</p></th>
			<th width="35%"><p align="center">配置说明</p></th>
		</tr>
		<tr>
			<td><label for="LazyLoadImg"><p align="center">延迟加载</p></label></td>
			<td><p align="left"><textarea name="LazyLoadImg" type="text" id="LazyLoadImg" style="width:98%;"><?php echo $zbp->Config('LazyLoad')->LazyLoadImg;?></textarea></p></td>
			<td><p align="left">请改为具体的CSS选择器，多个选择器用英文逗号分隔【别说你不知道什么是CSS选择器</p></td>
		</tr>
	</table>
	<br />
   <input name="" type="Submit" class="button" value="保存"/>
    </form>
  </div>
</div>

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>