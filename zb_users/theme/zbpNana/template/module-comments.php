
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
