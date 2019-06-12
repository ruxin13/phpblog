/*-------------------
*Description:        By www.yiwuku.com
*Website:            https://app.zblogcn.com/?auth=3ec7ee20-80f2-498a-a5dd-fda19b198194
*Author:             尔今 erx@qq.com
*update:             2017-11-25(Last:2018-10-11)
-------------------*/

$(function(){
	var uppAct = '<div class="uplist-act"><input type="button" class="button checkall" value="全选/取消"><input type="button" class="button reverse" value="反选"><input type="button" class="button delmany" value="批量删除"></div>';
	$(".search, .pagebar").append(uppAct);
	$(".search").after('<ul class="uplist"></ul>');
	$(".uplist").next(".tableFull").hide();
	var upp_mab = $("#divMain2 .tableFull tr:not(:first)");
	var upp_ulid_str = "", upp_flink_str = "", upp_fname_str = "", upp_fsize_str = "", upp_fctrl_str = "", upp_plist = "";
    upp_mab.each(function () {     
        upp_ulid_str += $(this).children("td:eq(0)").eq(0).text() + ',';
        upp_flink_str += $(this).children("td:eq(2)").children("a").attr("href") + ',';
        upp_fname_str += $(this).children("td:eq(2)").text() + ',';
        upp_fsize_str += $(this).children("td:eq(4)").text()*1 + ',';
        upp_fctrl_str += $(this).children("td:eq(6)").children("a").attr("href") + ',';
    });
	var upp_ulid = upp_ulid_str.split(","),
		upp_flink = upp_flink_str.split(","),
		upp_fname = upp_fname_str.split(","),
		upp_fsize = upp_fsize_str.split(","),
		upp_fctrl = upp_fctrl_str.split(","),
		fnex_arr = ['jpg','jpeg','JPG','gif','png','webp','bmp','ico','jpg-thumb','jpeg-thumb','JPG-thumb','gif-thumb','png-thumb','webp-thumb','bmp-thumb','ico-thumb'];
    for (var i=0; i < upp_flink.length-1; i++){
      if (upp_flink[i]) {
        upp_flink[i] = upp_flink[i].replace(/-md/g, "-thumb");
			}
    	var ftarr = upp_flink[i].split("."),
    		ftstr = ftarr[ftarr.length-1],
    		fsize = (upp_fsize[i]/1024).toFixed(2)+"KB",
    		aplink = '<a href="'+upp_flink[i]+'" target="_blank" title="打开'+upp_fname[i]+'" class="mp"><img src="'+upp_flink[i]+'"></a>';
    	if(upp_fsize[i] >= 1048576){
    		fsize = (upp_fsize[i]/1048576).toFixed(2)+"MB";
    	}
    	if($.inArray(ftstr, fnex_arr)<0){
    		aplink = '<a href="'+upp_flink[i]+'" target="_blank" title="下载'+upp_fname[i]+'" class="mp"><img src="'+bloghost+'zb_users/plugin/Uplist/nopic.png"></a>';
    	}
	    upp_plist += '<li>'+aplink+'<div class="vc"><input type="checkbox" value="'+upp_ulid[i]+'" name="ulID[]" class="ulid"><span>'+fsize+'</span><a href="javascript:;" class="cpurl">复制地址</a><input type="text" value="'+upp_flink[i]+'" class="flink"><a href="'+upp_fctrl[i]+'" title="删除" onclick="return window.confirm(\'确定删除'+upp_fname[i]+'？\');" class="del">&times;</a></div></li>';
    }
    $(".uplist").html(upp_plist);
	$(document).on('click','.cpurl', function(){
        var e=$(this).next("input");
        e.select();
        document.execCommand("Copy");
        $(this).text("已操作！");
	});
	function upcArray(n){
		var valArr = [];
		$("input[name='"+n+"[]']:checked").each(function(i){
			valArr[i] = $(this).val();
		});
		var upc = valArr.join(',');
		return upc;
	}
	var ulID = [], ulNum = 0, isCheck1 = 0, isCheck2 = 0;
	function checkUlid(){
		ulID = [upcArray("ulID")];
		ulNum = upcArray("ulID").split(',').length;
		if(ulNum == 1 && ulID[0] == ''){
			ulNum = 0;
		}
		//console.log(ulNum);
		//console.log(ulID);
	}
	$(document).on('click', '.ulid', function(){
		if(!$(this).attr("checked")){
			$(this).attr("checked",'true');
			$(this).parent().addClass("selected");
		}else{
			$(this).attr("checked",'false');
			$(this).parent().removeClass("selected");
		}
		checkUlid();
	});
	$(document).on('click', '.checkall', function(){
        if(isCheck1) {
            $(".ulid").each(function() {
                this.checked = false;
                $(this).parent().removeClass("selected");
            });
            isCheck1 = 0;
        }else{
            $(".ulid").each(function() {
                this.checked = true;
                $(this).parent().addClass("selected");
            });
            isCheck1 = 1;
        }
		checkUlid();
	});
	$(document).on('click', '.reverse', function(){
		if(!isCheck2){
	        $(".ulid").each(function () {
	            $(this).attr("checked", !$(this).attr("checked"));
				if($(this).attr("checked")){
					$(this).parent().addClass("selected");
				}else{
					$(this).parent().removeClass("selected");
				}

	        });
	        isCheck2 = 1;
        }else{
			return false;
		}
		checkUlid();
	});
	$(document).on('click', '.delmany', function(){
		if(!ulNum){
			alert("没有选择任何文件！");
			return false;
		} 
		if(confirm("确定删除这"+ulNum+"个文件？")==false){
			return false;
		} 
		$.post(bloghost+'zb_users/plugin/Uplist/delbat.php',{
			"ulID":ulID,
			"mustdo":1,
			},function(data){
				var s =data;
				if((s.search("faultCode")>0)&&(s.search("faultString")>0)){
					alert("删除失败！请尝试单个删除");
				}else{
					//alert(s);
					window.location.reload();
				}
			}
		);
	});
    $(".pagebar").after('<div class="uplist-tip">当前附件管理可视化效果由《图式附件管理》插件[<a href="'+bloghost+'zb_users/plugin/AppCentre/main.php?auth=3ec7ee20-80f2-498a-a5dd-fda19b198194" target="_blank">尔今作品</a>]辅助实现，加载缓慢的图片可能较大（1024KB=1MB），如有疑问和定制需求敬请[<a href="http://www.yiwuku.com/diy-zblog.html" target="_blank">联系作者</a>]<br>灰底无图显示时表示仅有上传信息存于数据库，对应文件则可能已被移除，附件默认存放目录：'+bloghost+'zb_users/upload/<br></div>');
});