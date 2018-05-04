var container = document.createElement('script');
$(container).attr('type','text/plain').attr('id','img_editor');
$("body").append(container);
_editor = UE.getEditor('img_editor');
_editor.ready(function () {       
	_editor.hide();
	$(".upload_button").click(function(){		
		object = $(this).parent().find('.uplod_img');
		object2 = $(this).parent().find('#uploadA,#uploadB');
		_editor.getDialog("insertimage").open();
		_editor.addListener('beforeInsertImage', function (t, arg) {
			object.attr("value", arg[0].src);
			object2.attr("src", arg[0].src);
		});
	});
});

 //下面用于图片上传预览功能
            function setImagePreview(avalue) {
				
            //input
                var docObj = document.getElementById("postimga");
				 var docObj = document.getElementById("postimgb");
//img
                var imgObjPreview = document.getElementById("uploadA");
				var imgObjPreview = document.getElementById("uploadB");
                //div
                var divs = document.getElementById("localImag");
				var divs = document.getElementById("localImag2");
				
				
				
				
                if (docObj.files && docObj.files[0]) {
                    //火狐下，直接设img属性
                    imgObjPreview.style.display = 'block';
                    imgObjPreview.style.width = '190px';
                    imgObjPreview.style.height = '118px';
                    //imgObjPreview.src = docObj.files[0].getAsDataURL();
                    //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
                   imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
                } else {
                    //IE下，使用滤镜
                    docObj.select();
                    var imgSrc = document.selection.createRange().text;
                    var localImagId = document.getElementById("localImag");
					var localImagId = document.getElementById("localImag2");
                    //必须设置初始大小
                    localImagId.style.width = "190px";
                    localImagId.style.height = "118px";
                    //图片异常的捕捉，防止用户修改后缀来伪造图片
                    try {
                        localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                        localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
                    } catch(e) {
                        alert("您上传的图片格式不正确，请重新选择!");
                        return false;
                    }
                    imgObjPreview.style.display = 'none';
					
                    document.selection.empty();
					
                }
                return true;
				
            }
			
		

			
			