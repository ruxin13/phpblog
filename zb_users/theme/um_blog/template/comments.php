{* Template Name:所有评论模板 *}
{if $socialcomment}
{$socialcomment}
{else}

{if $article.CommNums>0}
<div class="cmBox t">
  <ul class="msg msghead">
    <li class="tbname">{$lang['um_blog']['comment_list']}:</li>
  </ul>
</div>
{/if}
<label id="AjaxCommentBegin"></label>
<!--评论输出-->
{if $article.CommNums>0}
<div class="cmBox">
 {foreach $comments as $key => $comment}
  {template:comment}
 {/foreach} 
</div>
{/if}
<!--评论翻页条输出-->
<div class="pagebar commentpagebar"> {template:pagebar} </div>
<label id="AjaxCommentEnd"></label>
{template:commentpost}
{/if}