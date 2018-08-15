
{php}$cmszxwznum=$zbp->Config('zbpNana')->cms_zxwz_num;$catelist=$zbp->Config('zbpNana')->cms_zxwz_eflid;{/php}
<div id="post_list_box" class="border_gray">
{foreach $array=zbpNana_GetArticleCategorys($cmszxwznum,$catelist,true) as $keyd=>$article}
<article id="post-{$article.ID}" class="archive-list">
		<figure class="thumbnail">	
{php}echo zbpNana_thumbnail($article->ID,270,180,1);{/php}								
		</figure>
		<header class="entry-header">
			<h2 class="entry-title"><a href="{$article.Url}" title="{$article.Title}">{$article.Title}</a></h2>		
		</header><!-- .entry-header -->
		<div class="entry-content">
			<span class="entry-meta">
				<span class="post_cat"><a href="{$article.Category.Url}" target="_blank" rel="category tag">{$article.Category.Name}</a></span>
				<span class="post_spliter">•</span>
			<span class="date" title="{$article.Time('Y/m/d H:i')}">{php}echo zbpNana_timeago($article->Time());{/php}</span>			
			</span>		
			
			<div class="archive-content">			
			{if strlen($article.Intro)>0}
				{php}$introd= trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),80)).'...';{/php}
				{else}
				{php}$introd= trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),90)).'...';{/php}
			{/if}
			{$introd}
			</div>
			<div class="archive-tag"><span class="views">  阅读 {$article.ViewNums} 次  </span>{if Count($article.Tags)>0}{foreach $article.Tags as $tag}<a href="{$tag.Url}" target="_blank" rel="tag">{$tag.Name}</a>{/foreach}{/if}</div>
			<div class="clear"></div>
		</div><!-- .entry-content -->
	</article><!-- #post -->

 	<!-- ad -->
{$i=$keyd}
{if $i==0}
{if $zbp->Config('zbpNana')->DisplayAd2=='1'}
<div id="abclbo" class="abc-pc abc-site">
	{if zbpNana_is_mobile()}
		{$zbp->Config('zbpNana')->Adm2}
	{else}
		{$zbp->Config('zbpNana')->Ad2}
	{/if}
</div>
{/if}
{/if}
		{if $i==4}
		{if $zbp->Config('zbpNana')->DisplayAd3=='1'}
<div id="abclbt" class="abc-pc abc-site">
	{if zbpNana_is_mobile()}
		{$zbp->Config('zbpNana')->Adm3}
	{else}
		{$zbp->Config('zbpNana')->Ad3}
	{/if}
</div>
{/if}
			{/if}
	<!-- end: ad -->
	{/foreach}	
</div>