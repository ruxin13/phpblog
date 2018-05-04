<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNana主题页面</h2><h3>请尊重版权购买正版主题，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
<div id="related-medias"><ul class="media-list">
{php}$i = $zbp->modulesbyfilename['comments']->MaxLi;if ($i == 0) $i = 6;
$comments = $zbp->GetCommentList('*', array(array('=', 'comm_IsChecking', 0),array('=', 'comm_AuthorID','0')), array('comm_PostTime' => 'DESC'), $i, null);	{/php}

	{foreach $comments as $comment}
		{php}$avatar = md5(strtolower($comment->Author->Email));
		$zmavatar=zbpNana_tt_touxiang_generate_first_letter_uri($comment->Author->StaticName);
		$cmtxt = preg_replace('/[\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($comment->Content,'[nohtml]'),40)).'');
		{/php}
		<li class="item"><a class="y-left img-wrap" rel="nofollow" target="_blank" href="{$comment->Post->Url}#cmt{$comment->ID}"><img alt='{$comment->Author->Name}' src="http://cn.gravatar.com/avatar/{$avatar}&amp;r=X&amp;s=56?d=404" onerror='javascript:this.src="{$zmavatar}";this.onerror=null;' class='avatar avatar-56 photo' height='56' width='56' /></a> <div class="media-info"> <div class="media-inner"> <a rel="nofollow" target="_blank" class="media-name" href="{$comment->Post->Url}#cmt{$comment->ID}">{$comment->Author->Name}</a><p class="media-des"><a rel="nofollow" target="_blank" href="{$comment->Post->Url}#cmt{$comment->ID}">{php}echo zbpNana_biaoqing($comment->Content){/php}</a></p></div> </div> </li>
		
{/foreach}
</ul></div>
