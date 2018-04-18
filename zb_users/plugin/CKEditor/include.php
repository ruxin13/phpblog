<?php

Add_Filter_Plugin('Filter_Plugin_Html_Js_Add','CodeHighLight_print_CKEditor');
function CodeHighLight_print_CKEditor(){
	global $zbp;
	echo 'document.writeln("<script src=\'' . $zbp->host .'zb_users/plugin/CKEditor/ckeditor/prettify/prettify.js\' type=\'text/javascript\'></script><link rel=\'stylesheet\' type=\'text/css\' href=\'' . $zbp->host .'zb_users/plugin/CKEditor/ckeditor/prettify/prettify.css\'/>");'."\n";
	echo "$(document).ready(function(){prettyPrint();});\n";
}
//注册插件
RegisterPlugin("CKEditor","ActivePlugin_CKEditor");
function ActivePlugin_CKEditor() {
	Add_Filter_Plugin('Filter_Plugin_Edit_Begin','CKEditor_addscript_begin');
	Add_Filter_Plugin('Filter_Plugin_Edit_End','CKEditor_addscript_end');
}

function CKEditor_addscript_begin(){
	global $zbp;
	echo '<script type="text/javascript" src="' . $zbp->host .'zb_users/plugin/CKEditor/ckeditor/ckeditor.js"></script>';

}
function CKEditor_addscript_end(){
$s=<<<script
<script type="text/javascript">
function editor_init(){
editor_api.editor.content.get=function(){return this.obj.getData()};
editor_api.editor.content.put=function(a){return this.obj.setData(a)};
editor_api.editor.content.insert=function(a){return this.obj.insertHtml(a)};
editor_api.editor.content.focus=function(a){return this.obj.focus()};
editor_api.editor.intro.get=function(){return this.obj.getData()};
editor_api.editor.intro.put=function(a){return this.obj.setData(a)};
editor_api.editor.intro.focus=function(a){return this.obj.focus()};
CKEDITOR.replace('editor_content',{toolbar:[{name:'document',groups:['mode','document','doctools'],items:['Source','-','Preview','Print','-','Templates']},{name:'clipboard',groups:['clipboard','undo'],items:['Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo']},{name:'editing',groups:['find','selection','spellchecker'],items:['Find','Replace','-','SelectAll']},{name:'links',items:['Link','Unlink','Anchor']},{name:'insert',items:['Image','Flash','Table','InsertPre','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe']},{name:'tools',items:['Maximize','ShowBlocks']},'/',{name:'styles',items:['Styles','Format','Font','FontSize']},{name:'colors',items:['TextColor','BGColor']},{name:'basicstyles',groups:['basicstyles','cleanup'],items:['Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat']},{name:'paragraph',groups:['list','indent','blocks','align','bidi'],items:['NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']},{name:'others',items:['-']},{name:'about',items:['About']}],height:500});
CKEDITOR.replace('editor_intro',{toolbar:[{name:'document',groups:['mode','document','doctools'],items:['Source','-','Preview']},{name:'styles',items:['Format','Font','FontSize']},{name:'colors',items:['TextColor','BGColor']},{name:'basicstyles',groups:['basicstyles','cleanup'],items:['Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat']},{name:'links',items:['Link','Unlink']},]});
$('#contentready').hide();
editor_api.editor.content.obj=CKEDITOR.instances.editor_content;
editor_api.editor.intro.obj=CKEDITOR.instances.editor_intro;
sContent=editor_api.editor.content.get();
$('#introready').hide();
$('#editor_intro').prev().removeAttr('style');
sIntro=editor_api.editor.intro.get()
};
</script>
script;

echo $s;

}
?>