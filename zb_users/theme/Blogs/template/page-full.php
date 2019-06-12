{* Template Name:全面页面（无侧边栏） *} 
<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">Blogs主题页面</h2><h3>请尊重版权，如想去除版权，请赞助20元辛苦费，谢谢合作！！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
{template:header}
<div id="content" class="site-content pagefull">	
<div class="clear"></div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            {template:post-page}
	</div><!-- .content-area -->
</div>
<div class="clear"></div>
</div><!-- .site-content -->
{template:footer}