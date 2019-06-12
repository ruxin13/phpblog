<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">Blogs主题页面</h2><h3>请尊重版权，如想去除版权，请赞助20元辛苦费，谢谢合作！！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
							<article id="post-{$article.ID}" class="post-{$article.ID} post type-post status-publish format-standard hentry category-{$article.Category.Alias}">
					{if $zbp->Config('Blogs')->wzlx_kg=='1'}
					{if $article.Metas.Blogs_wzlx==2}
					<div class="post-date-ribbon"><div class="corner"></div>转载文章</div>
					{/if}
					{if $article.Metas.Blogs_wzlx==3}
					<div class="post-date-ribbon"><div class="corner"></div>投稿文章</div>
					{/if}
					{/if}
					<header class="entry-header">
						<h1 class="entry-title">{$article.Title}</h1>						
						<div class="single_info">
							<i class="fa fa-user" aria-hidden="true"></i>&nbsp;<a href="{php}Blogs_wenzhanglaiyuan($article->ID){/php}" rel="nofollow" target="_blank">{php}Blogs_wenzhangzuozhe($article->ID){/php}</a>&nbsp;
							<span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;{$article.Time('Y-m-d H:i')}&nbsp;</span>
							<span class="views"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;{$article.ViewNums} 人阅读</span>
							<span class="comment"><i class="fa fa-comment" aria-hidden="true"></i>&nbsp;{$article.CommNums} 条评论</span>
							{if $user.ID>0}<span class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;<a href="{$host}zb_system/cmd.php?act=ArticleEdt&id={$article.ID}" rel="nofollow">编辑</a></span>{/if}
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
						{if $zbp->Config('Blogs')->wzzy_kg=='1'}
						{if ($article.Intro)}
						<fieldset><legend><strong>摘要：</strong></legend><p>{$article.Intro}</p></fieldset>
						{/if}
						{/if}						
						{$article->Content}																	
						</div>
						<div class="clear"></div>
						<div class="xiaoshi">
							<div class="single_banquan">	
								<strong>本文地址：</strong><a href="{$article.Url}" title="{$article.Title}"  target="_blank">{$article.Url}</a><br/>
								{if $article.Metas.Blogs_wzlx==3}
									<strong>温馨提示：</strong>文章内容系作者个人观点，不代表{$name}对观点赞同或支持。<br/>
									<strong>版权声明：</strong>本文为投稿文章，感谢&nbsp;<a href="{php}Blogs_wenzhanglaiyuan($article->ID){/php}" target="_blank" rel="nofollow">{php}Blogs_wenzhangzuozhe($article->ID){/php}</a>&nbsp;的投稿，版权归原作者所有，欢迎分享本文，转载请保留出处！
								{elseif $article.Metas.Blogs_wzlx==2}
									<strong>温馨提示：</strong>文章内容系作者个人观点，不代表{$name}对观点赞同或支持。<br/>
									<strong>版权声明：</strong>本文为转载文章，来源于&nbsp;<a href="{php}Blogs_wenzhanglaiyuan($article->ID){/php}" target="_blank" rel="nofollow">{php}Blogs_wenzhangzuozhe($article->ID){/php}</a>&nbsp;，版权归原作者所有，欢迎分享本文，转载请保留出处！
								{else}
									<strong>版权声明：</strong>本文为原创文章，版权归&nbsp;<a href="{$article.Author.Url}" target="_blank">{$article.Author.StaticName}</a>&nbsp;所有，欢迎分享本文，转载请保留出处！
								{/if}
							</div>
						</div>
<div class="clear"></div>
{template:social}					
<div class="clear"></div>
<div class="post-navigation">
<div class="post-previous">
{if $article.Prev}
<a href="{$article.Prev.Url}" rel="prev"><span>PREVIOUS:</span>{$article.Prev.Title}</a> 
{else}
<span>PREVIOUS:</span><a href="JavaScript:void(0)">已经是最后一篇了</a> 
{/if}
</div>
<div class="post-next">
{if $article.Next}
<a href="{$article.Next.Url}" rel="next"><span>NEXT:</span>{$article.Next.Title}</a> 
{else}
<span>NEXT:</span><a href="JavaScript:void(0)">已经是最新一篇了</a> 
{/if}
</div>
</div>
<nav class="nav-single-c"> 	
	<nav class="navigation post-navigation" role="navigation">		
		<h2 class="screen-reader-text">文章导航</h2>		
		<div class="nav-links">	
		{if $article.Prev}
		<div class="nav-previous"> <a href="{$article.Prev.Url}" rel="prev"><span class="meta-nav-r" aria-hidden="true"><i class="fa fa-angle-left"></i></span></a> </div>
		{/if}
		{if $article.Next}
		<div class="nav-next"> <a href="{$article.Next.Url}" rel="next"><span class="meta-nav-l" aria-hidden="true"><i class="fa fa-angle-right"></i></span> </a> </div>
		{/if}
		</div>	
	</nav>
</nav>


					</div><!-- .entry-content -->
				</article><!-- #post -->								
					{if $zbp->Config('Blogs')->DisplayAd5=='1'}
<div id="abcxg" class="abc-pc abc-site">
	{if Blogs_is_mobile()}
		{$zbp->Config('Blogs')->Adm5}
	{else}
		{$zbp->Config('Blogs')->Ad5}
	{/if}
</div>
{/if}				
<div class="tab-site">
	<div id="layout-tab">
		<div class="tit">
        <span class="name">相关文章</span>
            <span class="plxiaoshi"><span class="keyword">
            	关键词：{if Count($article.Tags)>0}{foreach $article.Tags as $tag}<a href="{$tag.Url}" target="_blank" rel="tag">{$tag.Name}</a>{/foreach}{/if}</span></span>
        </div>
		<ul class="tab-bd">
		{php}$i=0;$excludeid = $article->ID;$xgnum=8;{/php}
		{foreach GetList($xgnum,null,null,null,null,null,array('is_related'=>$article->ID)) as $articles}
	<li><span class="post_spliter">•</span><a href="{$articles.Url}" target="_blank">{$articles.Title}</a></li>
	{php}$i+=1;$excludeid .= ',' . $articles->ID;{/php}
{/foreach}
	{if $i<$xgnum}
{php}$j=$xgnum-$i;Blogs_wenzhangxgfl($excludeid,$article->Category->ID,$j);{/php}
	{/if}
		</ul>
	</div>
</div>
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