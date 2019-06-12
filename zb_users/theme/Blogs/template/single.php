<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">Blogs主题页面</h2><h3>请尊重版权，如想去除版权，请赞助20元辛苦费，谢谢合作！！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
{template:header}
<div id="content" class="site-content">	
<div class="clear"></div>
	<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		{if $article.Type==0}
        {template:post-single}
            {else}
            {template:post-page}
            {/if}	
	</main><!-- .site-main -->
	</div><!-- .content-area -->
{if ($zbp->Config('Blogs')->cebianlanbj !== '3') }
<div id="sidebar" class="widget-area">	
{template:sidebar2}	
</div>
{/if}
</div>
<div class="clear"></div>
{template:footer}