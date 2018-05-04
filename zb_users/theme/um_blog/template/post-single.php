{* Template Name:文章页文章内容 *}
<div class="post single">
	<h4 class="post-date">{$article.Time('Y-m-d')}</h4>
	<h2 class="post-title">{$article.Title}</h2>
	<div class="post-body">{$article.Content}</div>
	{if $article.Tags}<h5 class="post-tags">标签:{foreach $article.Tags as $tag}<a href="{$tag.Url}" rel="tag">{$tag.Name}</a>{/foreach}</h5>{/if}
	<h6 class="post-footer">
		{$lang['msg']['author']}:{$article.Author.StaticName} | {$lang['msg']['category']}:{$article.Category.Name} | {$lang['um_blog']['view']}:{$article.ViewNums} | {$lang['msg']['comment']}:{$article.CommNums}
	</h6>
</div>

{if !$article.IsLock}
{template:comments}
{/if}