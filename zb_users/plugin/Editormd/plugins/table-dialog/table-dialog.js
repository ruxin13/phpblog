(function(){var e=function(e){var a=jQuery,l="table-dialog",t={"zh-cn":{toolbar:{table:"表格"},dialog:{table:{title:"添加表格",cellsLabel:"单元格数",alignLabel:"对齐方式",rows:"行数",cols:"列数",aligns:["默认","左对齐","居中对齐","右对齐"]}}},"zh-tw":{toolbar:{table:"添加表格"},dialog:{table:{title:"添加表格",cellsLabel:"單元格數",alignLabel:"對齊方式",rows:"行數",cols:"列數",aligns:["默認","左對齊","居中對齊","右對齊"]}}},en:{toolbar:{table:"Tables"},dialog:{table:{title:"Tables",cellsLabel:"Cells",alignLabel:"Align",rows:"Rows",cols:"Cols",aligns:["Default","Left align","Center align","Right align"]}}}};e.fn.tableDialog=function(){var e,i=this.cm,n=this.editor,o=this.settings,s=(o.path+"../plugins/"+l+"/",this.classPrefix),r=s+l;a.extend(!0,this.lang,t[this.lang.name]),this.setToolbar();var d=this.lang,c=d.dialog.table,g=['<div class="editormd-form" style="padding: 13px 0;">',"<label>"+c.cellsLabel+"</label>",c.rows+' <input type="number" value="3" class="number-input" style="width:40px;" max="100" min="2" data-rows />&nbsp;&nbsp;',c.cols+' <input type="number" value="2" class="number-input" style="width:40px;" max="100" min="1" data-cols /><br/>',"<label>"+c.alignLabel+"</label>",'<div class="fa-btns"></div>',"</div>"].join("\n");n.find("."+r).length>0?(e=n.find("."+r),this.dialogShowMask(e),this.dialogLockScreen(),e.show()):e=this.createDialog({name:r,title:c.title,width:360,height:226,mask:o.dialogShowMask,drag:o.dialogDraggable,content:g,lockScreen:o.dialogLockScreen,maskStyle:{opacity:o.dialogMaskOpacity,backgroundColor:o.dialogMaskBgColor},buttons:{enter:[d.buttons.enter,function(){var e=parseInt(this.find("[data-rows]").val()),a=parseInt(this.find("[data-cols]").val()),l=this.find('[name="table-align"]:checked').val(),t="",n="------------",o={_default:n,left:":"+n,center:":"+n+":",right:n+":"};if(e>1&&a>0)for(var s=0,r=e;s<r;s++){for(var d=[],c=[],g=0,b=a;g<b;g++)1===s&&c.push(o[l]),d.push(" ");1===s&&(t+="| "+c.join(" | ")+" |\n"),t+="| "+d.join(1===a?"":" | ")+" |\n"}return i.replaceSelection(t),this.hide().lockScreen(!1).hideMask(),!1}],cancel:[d.buttons.cancel,function(){return this.hide().lockScreen(!1).hideMask(),!1}]}});var b=e.find(".fa-btns");if(""===b.html())for(var f=["align-justify","align-left","align-center","align-right"],h=c.aligns,u=["_default","left","center","right"],p=0,m=f.length;p<m;p++){var v=0===p?' checked="checked"':"",k='<a href="javascript:;"><label for="editormd-table-dialog-radio'+p+'" title="'+h[p]+'">';k+='<input type="radio" name="table-align" id="editormd-table-dialog-radio'+p+'" value="'+u[p]+'"'+v+" />&nbsp;",k+='<i class="fa fa-'+f[p]+'"></i>',k+="</label></a>",b.append(k)}}};"function"==typeof require&&"object"==typeof exports&&"object"==typeof module?module.exports=e:"function"==typeof define?define.amd?define(["editormd"],function(a){e(a)}):define(function(a){var l=a("./../../editormd");e(l)}):e(window.editormd)})();