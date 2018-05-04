{* Template Name:404错误页 *}
<?php
 echo'<meta charset="UTF-8"><div style="text-align:center;padding:80px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;">傻逼不要扒皮</h2>由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为！！</div>';
 die();
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="Cache-Control" content="no-transform"/>
	<meta http-equiv="Content-Language" content="{$language}" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>对不起，页面未找到</title>
    <link rel="stylesheet" rev="stylesheet" href="{$host}zb_users/theme/{$theme}/style/images/404.css" type="text/css" media="all"/>
    <style>
	.page-back,submit{background-color: #{$zbp->Config('txpbl')->zs};}
	</style>
</head>
<body>
<div class="wrapper-page">
    <div class="page-ex">
        <h1>404!</h1>
        <h2>对不起，页面未找到</h2><br>
        <form name="search" method="post" action="{$host}zb_system/cmd.php?act=search">
		    <input type="text" name="q" size="11" placeholder="找不到内容？尝试下我们的搜索吧!"> 
			<input type="submit" value="搜索">
		</form>
        <br>
        <a class="page-back" href="{$host}"><i class="fa fa-angle-left"></i> 返回首页</a>
    </div>
</div>
</body>
</html>