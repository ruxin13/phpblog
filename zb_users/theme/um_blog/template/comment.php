{* Template Name:单条评论 *}
<ul class="msg" id="cmt{$comment.ID}">
	<li class="msgname"><img class="avatar" src="{$comment.Author.Avatar}" alt="" width="32"/>&nbsp;<span class="commentname"><a href="{$comment.Author.HomePage}" rel="nofollow" target="_blank">{$comment.Author.StaticName}</a></span><br/><small>&nbsp;{$lang['um_blog']['comment_post_on']}&nbsp;{$comment.Time()}&nbsp;&nbsp;<span class="revertcomment"><a href="#comment" onclick="zbp.comment.reply('{$comment.ID}')">{$lang['um_blog']['reply']}</a></span></small></li>
	<li class="msgarticle">
    {$comment.Content}
	</li>
</ul>
{foreach $comment.Comments as $comment}
   <ul class="children">
        {template:comment}
	</ul>
{/foreach}	