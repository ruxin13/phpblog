/*-------------------
*Description:        By www.yiwuku.com
*Website:            https://app.zblogcn.com/?auth=3ec7ee20-80f2-498a-a5dd-fda19b198194
*Author:             尔今 erx@qq.com
*update:             2017-11-25(Last:2018-01-23)
-------------------*/

$(function(){
	var upp_url = location.href.split("=")[1];
	if(upp_url == "UploadMng" || upp_url == "UploadMng&page"){
		$(".search").after('<ul class="uplist"></ul>');
		$(".uplist").next(".tableFull").hide();
		var upp_mab = $("#divMain2 .tableFull").find(".button:even");
		var upp_flink_str = "", upp_fname_str = "", upp_fsize_str = "", upp_fctrl_str = "", upp_plist = "";
	    upp_mab.each(function () {     
	        upp_flink_str += $(this).attr("href") + ',';
	        upp_fname_str += $(this).parent().text() + ',';
	        upp_fsize_str += $(this).parent().next().next().text()*1 + ',';
	        upp_fctrl_str += $(this).parent().next().next().next().next().find(".button").attr("href") + ',';
	    });
		var upp_flink = upp_flink_str.split(",");
		var upp_fname = upp_fname_str.split(",");
		var upp_fsize = upp_fsize_str.split(",");
		var upp_fctrl = upp_fctrl_str.split(",");
	    for (var i=0; i < upp_flink.length-1; i++){
	    	var ftarr = upp_flink[i].split(".");
	    	var ftstr = ftarr[ftarr.length-1];
	    	var fsize = (upp_fsize[i]/1024).toFixed(2)+"KB";
	    	if(upp_fsize[i] >= 1048576){
	    		fsize = (upp_fsize[i]/1048576).toFixed(2)+"MB";
	    	}
	    	if(ftstr != "jpg" && ftstr != "jpeg" && ftstr != "png" && ftstr != "gif" && ftstr != "webp"){
	    		upp_plist += '<li><a href="'+upp_flink[i]+'" target="_blank" title="下载'+upp_fname[i]+'" class="mp"><img src="'+bloghost+'zb_users/plugin/Uplist/nopic.png"></a><div class="vc"><span>'+fsize+'</span><a href="javascript:;" class="cpurl">复制地址</a><input type="text" value="'+upp_flink[i]+'"><a href="'+upp_fctrl[i]+'" title="删除" onclick="return window.confirm(\'确定删除'+upp_fname[i]+'？\');" class="del">&times;</a></div></li>';
	    	}else{
		        upp_plist += '<li><a href="'+upp_flink[i]+'" target="_blank" title="打开'+upp_fname[i]+'" class="mp"><img src="'+upp_flink[i]+'"></a><div class="vc"><span>'+fsize+'</span><a href="javascript:;" class="cpurl">复制地址</a><input type="text" value="'+upp_flink[i]+'"><a href="'+upp_fctrl[i]+'" title="删除" onclick="return window.confirm(\'确定删除'+upp_fname[i]+'？\');" class="del">&times;</a></div></li>';
		    }
	    }
	    $(".uplist").html(upp_plist);
		$(document).on('click','.cpurl', function(){
	        var e=$(this).next("input");
	        e.select();
	        document.execCommand("Copy");
	        $(this).text("已操作！");
		});
	    $(".pagebar").after('<div class="uplist-tip">当前附件管理可视化效果由《<a href="'+bloghost+'zb_users/plugin/AppCentre/main.php?auth=3ec7ee20-80f2-498a-a5dd-fda19b198194" target="_blank">图式附件管理</a>》插件辅助实现，加载缓慢的图片可能较大（1024KB=1MB），如有问题和建议敬请[<a href="http://www.yiwuku.com" target="_blank">联系作者</a>]<br>灰底无图显示时表示仅有上传信息存于数据库，对应文件则可能已损坏或不存在，附件默认存放目录：'+bloghost+'zb_users/upload/<br></div>');
	}
});