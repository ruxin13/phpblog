(function(){var o=function(o){var e=jQuery,i="help-dialog";o.fn.helpDialog=function(){var t,a=this.lang,n=this.editor,d=this.settings,l=d.pluginPath+i+"/",r=this.classPrefix,s=r+i,c=a.dialog.help;if(n.find("."+s).length<1){var f='<div class="markdown-body" style="font-family:微软雅黑, Helvetica, Tahoma, STXihei,Arial;height:390px;overflow:auto;font-size:14px;border-bottom:1px solid #ddd;padding:0 20px 20px 0;"></div>';t=this.createDialog({name:s,title:c.title,width:840,height:540,mask:d.dialogShowMask,drag:d.dialogDraggable,content:f,lockScreen:d.dialogLockScreen,maskStyle:{opacity:d.dialogMaskOpacity,backgroundColor:d.dialogMaskBgColor},buttons:{close:[a.buttons.close,function(){return this.hide().lockScreen(!1).hideMask(),!1}]}})}t=n.find("."+s),this.dialogShowMask(t),this.dialogLockScreen(),t.show();var h=t.find(".markdown-body");""===h.html()&&e.get(l+"help.md",function(e){var i=o.$marked(e);h.html(i),h.find("a").attr("target","_blank")})}};"function"==typeof require&&"object"==typeof exports&&"object"==typeof module?module.exports=o:"function"==typeof define?define.amd?define(["editormd"],function(e){o(e)}):define(function(e){var i=e("./../../editormd");o(i)}):o(window.editormd)})();