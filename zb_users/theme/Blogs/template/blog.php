<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">Blogs主题页面</h2><h3>请尊重版权，如想去除版权，请赞助20元辛苦费，谢谢合作！！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
{template:header}
	<div id="content" class="site-content">	
	<div class="clear"></div>
{if $zbp->Config('Blogs')->DisplayAd1=='1'}
<div id="abcdh" class="abc-pc abc-site">
	{if Blogs_is_mobile()}
		{$zbp->Config('Blogs')->Adm1}
	{else}
		{$zbp->Config('Blogs')->Ad1}
	{/if}
</div>
{/if}
		<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		{if $zbp->Config('Blogs')->hdpsz_kg=='1'}
		{if $type=='index'&&$page=='1'} 
		{template:slider}
			{/if}
				{/if}
<div id="post_list_box" class="border_gray">
{foreach $articles as $keyd=>$article}
{template:post-multi}
{/foreach}			
</div>		
</main><!-- .site-main -->
{template:pagebar}	
	</section><!-- .content-area -->
{if ($zbp->Config('Blogs')->cebianlanbj !== '3') }
<div class="clear"></div>
</div>
{template:footer}