<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNana主题页面</h2><h3>请尊重版权购买正版主题，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
<article id="post-{$article.ID}" class="post-{$article.ID} post type-page status-publish hentry">

	<header class="entry-header">
		<h1 class="entry-title">{$article.Title}</h1>	
						<div class="single_info">
							<span class="date">{$article.Time('Y-m-d')}&nbsp;</span>
							<span class="views">  阅读 {$article.ViewNums} 次  </span>
							<span class="comment">评论 {$article.CommNums} 条</span>		
							{if $user.ID>0}<span class="edit"><a href="{$host}zb_system/cmd.php?act=PageEdt&id={$article.ID}" rel="nofollow">编辑</a></span>{/if}
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
					{$article->Content}	
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