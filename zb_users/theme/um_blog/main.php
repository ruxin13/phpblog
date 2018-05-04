<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('um_blog')) {$zbp->ShowError(48);die();}
$blogtitle='主题配置';

require $blogpath . 'zb_system/xiaoyezi/admin_header.php';
require $blogpath . 'zb_system/xiaoyezi/admin_top.php';

if(isset($_POST['ms'])){
  $zbp->Config('um_blog')->logo = $_POST['logo'];
  $zbp->Config('um_blog')->ms = $_POST['ms'];
  $zbp->Config('um_blog')->gjc = $_POST['gjc'];
  $zbp->Config('um_blog')->zs = $_POST['zs'];
  $zbp->Config('um_blog')->fs = $_POST['fs'];
  $zbp->SaveConfig('um_blog');
  $zbp->ShowHint('good');
}
?>
<script src="script/color/jscolor.js" type="text/javascript"></script>

<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div id="divMain2">
    <form id="form1" name="form1" method="post">
      <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
        <tr>
          <th width="15%"><p align="center">配置名称</p></th>
          <th width="50%"><p align="center">配置内容</p></th>
          <th width="25%"><p align="center">配置说明</p></th>
        </tr>
        <tr>
          <td><label for="gjc">
            <p align="center">主题LOGO</p>
            </label></td>
          <td><p align="left">
              <input id="uplod_img1" class="uplod_img" type="text" size="56" name="logo" value="<?php echo $zbp->Config('um_blog')->logo;?>">
              <input type="button" class="upload_button" value="上传">
              <?php if ($zbp->Config('um_blog')->logo) { ?>
            <div id="img-preview1" class="img-preview"> <img style="width:auto; height:46px" src="<?php echo $zbp->Config('um_blog')->logo;?>" alt=""> <a class="del-img" onclick="clearing();" title="删除">X</a> </div>
            <?php } ?>
            </p></td>
          <td><p align="left" class="help-tip">建议LOGO高度46px，宽度auto，最好为透明的 png 格式的图片。</p></td>
        </tr>
        <tr>
          <td><label for="ms">
            <p align="center">网站描述</p>
            </label></td>
          <td><p align="left">
              <textarea name="ms" type="text" id="ms" style="width:98%;"><?php echo $zbp->Config('um_blog')->ms;?></textarea>
            </p></td>
          <td><p align="left">首页网站描述</p></td>
        </tr>
        <tr>
          <td><label for="gjc">
            <p align="center">网站关键词</p>
            </label></td>
          <td><p align="left">
              <textarea name="gjc" type="text" id="gjc" style="width:98%;"><?php echo $zbp->Config('um_blog')->gjc;?></textarea>
            </p></td>
          <td><p align="left">首页网站关键词</p></td>
        </tr>
        <tr>
          <td><label>
            <p align="center">网站主色</p>
            </label></td>
          <td><p align="left">
              <input name="zs" type="text" class="color"  style="width:100px" value="#<?php echo $zbp->Config('um_blog')->zs;?>" />
            </p></td>
          <td><p align="left">默认6699cc</p></td>
        </tr>
        <tr>
          <td><label>
            <p align="center">网站辅色</p>
            </label></td>
          <td><p align="left">
              <input name="fs" type="text" class="color"  style="width:100px" value="#<?php echo $zbp->Config('um_blog')->fs;?>" />
            </p></td>
          <td><p align="left">默认6eabe8</p></td>
        </tr>
      </table>
      <input name="" type="Submit" class="button" value="保存"/>
    </form>
    <br />
  </div>
</div>
<!--<script type="text/javascript">ActiveTopMenu("topmenu_um_blog");</script>--> 
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/theme/um_blog/script/delimg.js"></script>
<?php
if ($zbp->CheckPlugin('UEditor')) {	
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.config.php"></script>';
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.all.min.js"></script>';
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/theme/um_blog/script/lib.upload.js"></script>';
}
require $blogpath . 'zb_system/xiaoyezi/admin_footer.php';
RunTime();
?>
