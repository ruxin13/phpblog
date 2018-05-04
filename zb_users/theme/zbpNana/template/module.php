<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNana主题页面</h2><h3>请尊重版权购买正版主题，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
<aside id="{$module.HtmlID}" class="widget widget_{$module.FileName}">{if (!$module.IsHideTitle)&&($module.Name)}<h3 class="widget-title"><span class="cat">{$module.Name}</span></h3>{/if}
{if ($module.Type=='div')}
<div class="textwidget" id="{$module.HtmlID}-1">{$module.Content}<div class="clear"></div></div>
{/if}
{if $module.Type=='ul'}
{if ($module.FileName=='previous')||($module.FileName=='comments')||($module.FileName=='tags')||($module.FileName=='authors')}
{$module.Content}
{else}
<ul id="{$module.HtmlID}-1">{$module.Content}<div class="clear"></div></ul>
{/if}{/if}
<div class="clear"></div>
</aside>