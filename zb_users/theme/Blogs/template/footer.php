<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">Blogs主题页面</h2><h3>请尊重版权，如想去除版权，请赞助20元辛苦费，谢谢合作！！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
<div id="footer">
<div class="foot">
{if $type=='index'&&$page=='1'} 
		<div id="links"> <ul class="linkcat"> <li><strong>友情链接：</strong></li> 
		{module:link}
		 </ul><div class="clear"></div></div>
		 {/if}
	<div class="ps">
<div class="p p2">
<div class="p-content">
<p class="t2">站点相关</p>
<ul>{$zbp->Config('Blogs')->yejiaoxiangguan}</ul>
</div>
<div class="clear"></div>
<div class="site-info">{$zbp->Config('Blogs')->banquanxinxi}<span class="footer-tag">&nbsp; | &nbsp; Theme by <a href="https://www.yigujin.cn/blogs/"  target="_blank" title="zblogPHP免费响应式博客主题Blogs">Blogs</a>&nbsp; | &nbsp; Powered by <a href="http://www.zblogcn.com/" title="RainbowSoft Z-BlogPHP" target="_blank">Z-BlogPHP</a></span></div>
</div>
<!-- 若要删除版权请自觉赞助懿古今(支付宝：yigujin@qq.com)20元，谢谢支持 -->
<div class="p p3">
<div class="p-content">
<p class="t2">欢迎您关注我们</p>
<div class="qcode clearfix">
<div class="img-container">
<img alt="公众号二维码" src="{php}Blogs_Get_Logo('gongzhonghao','jpg');{/php}">
</div>
<div class="link-container">
{$zbp->Config('Blogs')->yejiaoanniu1}{$zbp->Config('Blogs')->yejiaoanniu2}
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="tools">
    <a class="tools_top" title="返回顶部"></a>
    {if $type=='article' || $type=='page'} 	
	<a class="tools_comments" title="发表评论"></a>
	{else}
	<a href="{$zbp->Config('Blogs')->liuyanban}#divCommentPost" class="tools_comments" title="给我留言" target="_blank" rel="nofollow"></a>
	{/if}
    </div>
	{if $zbp->Config('Blogs')->wzfx_kg=='1'}	
{if $type=='article' || $type=='page'} 	
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
{/if}
	{/if}
<script src="{$host}zb_users/theme/{$theme}/script/superfish.js" type="text/javascript"></script>
{if $zbp->Config('Blogs')->fanyeanniu =='2' || $zbp->Config('Blogs')->fanyeanniu =='3'}
<script src="{$host}zb_users/theme/{$theme}/script/jquery-ias.js" type="text/javascript"></script>
<script type="text/javascript">
	var ias = $.ias({
        container: "#post_list_box",
        item: "article",
        pagination: "nav-links",
        next: ".nav-links .next a",
    });
	{if $zbp->Config('Blogs')->fanyeanniu=='2'}
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
{$zbp->Config('Blogs')->yejiaoewdm}
{$footer}
</div>
</body></html>