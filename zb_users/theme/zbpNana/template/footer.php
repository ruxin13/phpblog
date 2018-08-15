


<div class="tools">
    <a class="tools_top" title="返回顶部"></a>
    {if $type=='article' || $type=='page'} 	
	<a class="tools_comments" title="发表评论"></a>
	{else}
	<a href="{$zbp->Config('zbpNana')->liuyanban}#divCommentPost" class="tools_comments" title="给我留言" target="_blank" rel="nofollow"></a>
	{/if}
    </div>
	{if $zbp->Config('zbpNana')->wzfx_kg=='1'}	
{if $type=='article' || $type=='page'} 	
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
{/if}
	{/if}
<script src="{$host}zb_users/theme/{$theme}/script/superfish.js" type="text/javascript"></script>
{if $type=='article' || $type=='page'}	
{else} 
{if $zbp->Config('zbpNana')->fanyeanniu =='2' || $zbp->Config('zbpNana')->fanyeanniu =='3'}
<script src="{$host}zb_users/theme/{$theme}/script/jquery-ias.js" type="text/javascript"></script>
<script type="text/javascript">
	{if ($zbp->Config('zbpNana')->shouyebuju=='3' && $type=='index')  || ($zbp->Config('zbpNana')->fltpbj_kg=='1' && $type=='category') || ($zbp->Config('zbpNana')->fltpbj_kg=='1' && $type=='author') || ($zbp->Config('zbpNana')->fltpbj_kg=='1' && $type=='tag') || ($zbp->Config('zbpNana')->fltpbj_kg=='1' && $type=='date')}
    var ias = $.ias({
        container: ".cat-one-list",
        item: ".cat-lists",
        pagination: "nav-links",
        next: ".nav-links .next a",
    });
	{elseif ($zbp->Config('zbpNana')->shouyebuju=='1' && $type=='index') || ($zbp->Config('zbpNana')->fltpbj_kg!=='1' && $type=='category') || ($zbp->Config('zbpNana')->fltpbj_kg!=='1' && $type=='author') || ($zbp->Config('zbpNana')->fltpbj_kg!=='1' && $type=='tag') || ($zbp->Config('zbpNana')->fltpbj_kg!=='1' && $type=='date')}
	var ias = $.ias({
        container: "#post_list_box",
        item: "article",
        pagination: "nav-links",
        next: ".nav-links .next a",
    });
	{/if}
	{if $zbp->Config('zbpNana')->fanyeanniu=='2'}
    ias.extension(new IASTriggerExtension({
        text: '<i class="fa fa-chevron-circle-down"></i>加载更多', 
        offset: 1, 
    }));
	{/if}
    ias.extension(new IASSpinnerExtension());
    ias.extension(new IASNoneLeftExtension({
        text: '已经加载完成！',
    }));
    ias.on('rendered', function(items) {
        $("img").lazyload({
            effect: "fadeIn",
        failure_limit : 10
        }); 
    })
</script>
{/if}
{/if}
{$zbp->Config('zbpNana')->yejiaoewdm}
{$footer}
</div>
</body></html>