{* Template Name:文章归档页面 *} 
<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNana主题页面</h2><h3>请尊重版权购买正版主题，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
{template:header}
<style type="text/css">
.year {
    font-size: 18px;
    font-size: 1.8rem;
    line-height: 150%;
    margin: 10px 0px;
    padding: 0 0 0 5px;
    border-left: 5px solid #C01E22;
}
.mon {
	color: #000;
	line-height: 30px; 
	margin: 5px 0 5px 5px;
	cursor: pointer;
}
.post_list li {
	line-height: 30px;
	text-indent: 2em;
}
.post_list {
	color: #999;
	margin: 0 0 10px 0!important;
}
.single-content ul li {
    list-style-position:outside ;
    list-style-type: none;
	margin: 0;
}
</style>
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
<div id="all_archives">
{php} zbpNana_cx_archives_list(); {/php}
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
<script type="text/javascript">
$(document).ready(function(){
    (function(){
		$('#all_archives span.mon').each(function(){
			var num=$(this).next().children('li').size();
			var text=$(this).text();
			$(this).html(text+' ( '+num+' 篇文章 )');
		});
		var $al_post_list=$('#all_archives ul.post_list'),
			$al_post_list_f=$('#all_archives ul.post_list:first');
		$al_post_list.hide(1,function(){
			$al_post_list_f.show();
		});
		$('#all_archives span.mon').click(function(){
			$(this).next().slideToggle(400);
			return false;
		});
    })();
 });
</script>
{template:footer}