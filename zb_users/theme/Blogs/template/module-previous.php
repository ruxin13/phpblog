<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">Blogs主题页面</h2><h3>请尊重版权，如想去除版权，请赞助20元辛苦费，谢谢合作！！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
<div class="new_cat" id="new_cat"><ul>
{php}$i = $zbp->modulesbyfilename['previous']->MaxLi;if ($i == 0) $i = 6;{/php}
{foreach getlist($i) as $article}
<li class="clr"><a href="{$article->Url}"  title="{$article->Title}" target="_blank"><div class="time"><span class="r">{$article->Time('d')}</span>/<span class="y">{$article->Time('m月')}</span></div><div class="title">{$article->Title}</div></a></li>
{/foreach}
</ul></div>