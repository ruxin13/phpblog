<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNana主题页面</h2><h3>请尊重版权购买正版主题，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
<div class="social-main">
{if $zbp->Config('zbpNana')->wzdz_kg=='1'}
		<div class="like clr">{zbpNana_prise_html($article->ID)}</div>
{/if}
{if $zbp->Config('zbpNana')->wzds_kg=='1'}
		<span class="liubaixx">
		<div class="shang clr">	
			<a  title="好文！一定要打赏！" class="dashang" href="JavaScript:void(0)"><i class="fa fa-gift" aria-hidden="true"></i>赞赏<span><img src="{php}zbpNana_Get_Logo('dashang','jpg');{/php}" alt="打赏二维码"></span></a>
		</div>
		</span>
		{/if}
		{if $zbp->Config('zbpNana')->wzfx_kg=='1'}
		<div class="bdsharebuttonbox">
		<span class="s-txt">分享：</span>
		<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
		<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
		<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
		<a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a>
		<a href="#" class="bds_ty" data-cmd="ty" title="分享到天涯社区"></a>
		<a href="#" class="bds_more" data-cmd="more"></a>
		</div>
		{/if}
				<div class="clear"></div>
</div>							