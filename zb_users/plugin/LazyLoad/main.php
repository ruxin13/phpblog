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
InstallPlugin_LazyLoad();
if(isset($_POST['LazyLoadImg'])){
  $zbp->Config('LazyLoad')->LazyLoadImg = $_POST['LazyLoadImg'];
  $zbp->Config('LazyLoad')->templates = $_POST['templates'];
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
			<th width="15%"><p>配置名称</p></th>
			<th width="50%"><p>配置内容</p></th>
			<th width="35%"><p>配置说明</p></th>
		</tr>
		<tr>
			<td><label for="LazyLoadImg"><p>延迟加载</p></label></td>
			<td><p><textarea name="LazyLoadImg" type="text" id="LazyLoadImg" style="width:98%;"><?php echo $zbp->Config('LazyLoad')->LazyLoadImg;?></textarea></p></td>
			<td>请改为具体的CSS选择器，多个选择器用英文逗号分隔；<br />假设{$article.Content}所在元素为.post-body，则在本插件中填入<code>.post-body img</code></td>
		</tr>
		<tr>
			<td><label for="templates"><p>预编译模板</p></label></td>
			<td><p><textarea name="templates" type="text" id="templates" style="width:98%;"><?php echo $zbp->Config('LazyLoad')->templates;?></textarea></p></td>
			<td>对显式写在模板里的img应用延迟加载，比如带缩略图的摘要;参考值：post-multi,post-istop</td>
		</tr>
	</table>
	<br />
   <input name="submit" type="submit" class="button" value="保存"/>
    </form>
  </div>
</div>

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>