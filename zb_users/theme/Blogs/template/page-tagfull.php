{* Template Name:全面标签云页面 *} 
<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">Blogs主题页面</h2><h3>请尊重版权，如想去除版权，请赞助20元辛苦费，谢谢合作！！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
{template:header}
<div id="content" class="site-content tagfull">	
<div class="clear"></div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <article id="post-{$article.ID}" class="post-{$article.ID} post type-page status-publish hentry">

	<header class="entry-header">
		<h1 class="entry-title">{$article.Title}</h1>	
						<div class="single_info">
							<span class="date">{$article.Time('Y-m-d')}&nbsp;</span>
							<span class="views">  阅读 {$article.ViewNums} 次  </span>
							<span class="comment">评论 {$article.CommNums} 条</span>		
							<span class="edit"><a href="{$host}zb_system/cmd.php?act=PageEdt&id={$article.ID}" rel="nofollow">编辑</a></span>
						</div>						
	</header><!-- .entry-header -->
{if $zbp->Config('Blogs')->DisplayAd4=='1'}
<div id="abcbt" class="abc-pc abc-site">
	{if Blogs_is_mobile()}
		{$zbp->Config('Blogs')->Adm4}
	{else}
		{$zbp->Config('Blogs')->Ad4}
	{/if}
</div>
{/if}
	<div class="entry-content">
	<div class="single-content">									
{php}echo Blogs_pytags_show();{/php}
	</div>
<div class="clear"></div>
{template:social}			
<div class="clear"></div>
	</div><!-- .entry-content -->

	</article><!-- #post -->	
{if $zbp->Config('Blogs')->DisplayAd6=='1'}
<div id="abcpl" class="abc-pc abc-site">
	{if Blogs_is_mobile()}
		{$zbp->Config('Blogs')->Adm6}
	{else}
		{$zbp->Config('Blogs')->Ad6}
	{/if}
</div>
{/if}

	<div class="clear"></div>
{if !$article.IsLock}
{template:comments}
{else}
<p class="no-comments">评论已关闭！</p>
{/if}			
</main><!-- .site-main -->
	</div><!-- .content-area -->
</div>
<div class="clear"></div>
</div><!-- .site-content -->
{template:footer}