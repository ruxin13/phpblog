<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNana主题页面</h2><h3>请尊重版权购买正版主题，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
{if $socialcomment}
{$socialcomment}
{else}
{php}
    if ($option['ZC_COMMENT_REVERSE_ORDER']=='1') {
        $where = array(array('=', 'comm_LogID', $article->ID),array('=', 'comm_RootID','0'),array('=', 'comm_IsChecking', 0));
        $_comments = $zbp->GetCommentList('*',$where,null,null,null);
        $commentsRootSum = count($_comments)+1;
    } else {
        $commentsRootSum = 0;
    }
{/php}
<div id="commentszbplk" class="commentszbp-area">
{template:commentpost}
</div>
<label id="AjaxCommentBegin"></label>
{if $article.CommNums>0}
<div id="commentszbplb" class="commentszbp-area">
<h3 id="pinglunliebiao">评论列表</h3>
<ol class="commentzpb-list">
{foreach $comments as $key => $comment}
{$commentRootFloor=abs($comment.FloorID-$commentsRootSum)}
{template:comment}
{/foreach}
</ol>
</div>
{template:pagebar}
<label id="AjaxCommentEnd"></label>
	{else}
	<div id="commentszbpmy" class="commentszbp-area">
		<h3 id="meiyoupinglun">还没有留言，还不快点抢沙发？</h3>
	</div>
	{/if}	
{/if}