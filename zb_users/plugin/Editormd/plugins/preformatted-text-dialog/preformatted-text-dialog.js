(function(){var e=function(e){var t,o="preformatted-text-dialog";e.fn.preformattedTextDialog=function(){var i,n=this.cm,r=this.lang,a=this.editor,d=this.settings,l=n.getCursor(),s=n.getSelection(),c=this.classPrefix,f=r.dialog.preformattedText,h=c+o;if(n.focus(),a.find("."+h).length>0)i=a.find("."+h),i.find("textarea").val(s),this.dialogShowMask(i),this.dialogLockScreen(),i.show();else{var g='<textarea placeholder="coding now...." style="display:none;">'+s+"</textarea>";i=this.createDialog({name:h,title:f.title,width:780,height:540,mask:d.dialogShowMask,drag:d.dialogDraggable,content:g,lockScreen:d.dialogLockScreen,maskStyle:{opacity:d.dialogMaskOpacity,backgroundColor:d.dialogMaskBgColor},buttons:{enter:[r.buttons.enter,function(){var e=this.find("textarea").val();if(""===e)return alert(f.emptyAlert),!1;e=e.split("\n");for(var t in e)e[t]="    "+e[t];return e=e.join("\n"),0!==l.ch&&(e="\r\n\r\n"+e),n.replaceSelection(e),this.hide().lockScreen(!1).hideMask(),!1}],cancel:[r.buttons.cancel,function(){return this.hide().lockScreen(!1).hideMask(),!1}]}})}var u={mode:"text/html",theme:d.theme,tabSize:4,autofocus:!0,autoCloseTags:!0,indentUnit:4,lineNumbers:!0,lineWrapping:!0,extraKeys:{"Ctrl-Q":function(e){e.foldCode(e.getCursor())}},foldGutter:!0,gutters:["CodeMirror-linenumbers","CodeMirror-foldgutter"],matchBrackets:!0,indentWithTabs:!0,styleActiveLine:!0,styleSelectedText:!0,autoCloseBrackets:!0,showTrailingSpace:!0,highlightSelectionMatches:!0},m=i.find("textarea"),p=i.find(".CodeMirror");i.find(".CodeMirror").length<1?(t=e.$CodeMirror.fromTextArea(m[0],u),p=i.find(".CodeMirror"),p.css({float:"none",margin:"0 0 5px",border:"1px solid #ddd",fontSize:d.fontSize,width:"100%",height:"410px"}),t.on("change",function(e){m.val(e.getValue())})):t.setValue(n.getSelection())}};"function"==typeof require&&"object"==typeof exports&&"object"==typeof module?module.exports=e:"function"==typeof define?define.amd?define(["editormd"],function(t){e(t)}):define(function(t){var o=t("./../../editormd");e(o)}):e(window.editormd)})();