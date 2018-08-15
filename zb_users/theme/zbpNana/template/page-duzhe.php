{* Template Name:百强读者页 *} 

{template:header}
<div id="content" class="site-content duzhefull">	
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
{if $zbp->Config('zbpNana')->DisplayAd4=='1'}
<div id="abcbt" class="abc-pc abc-site">
	{if zbpNana_is_mobile()}
		{$zbp->Config('zbpNana')->Adm4}
	{else}
		{$zbp->Config('zbpNana')->Ad4}
	{/if}
</div>
{/if}
	<div class="entry-content">
	<div class="single-content">									
<div class="readers">{php}echo zbpNana_readers_wall();{/php}
</div>
	</div>
<div class="clear"></div>
{template:social}			
<div class="clear"></div>
	</div><!-- .entry-content -->

	</article><!-- #post -->	
{if $zbp->Config('zbpNana')->DisplayAd6=='1'}
<div id="abcpl" class="abc-pc abc-site">
	{if zbpNana_is_mobile()}
		{$zbp->Config('zbpNana')->Adm6}
	{else}
		{$zbp->Config('zbpNana')->Ad6}
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