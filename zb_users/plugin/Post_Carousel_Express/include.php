<?php
#注册插件
RegisterPlugin("Post_Carousel_Express","ActivePlugin_Post_Carousel_Express");

function ActivePlugin_Post_Carousel_Express() {
    Add_Filter_Plugin('Filter_Plugin_ViewPost_Template','Post_Carousel_Express_Content');
    Add_Filter_Plugin('Filter_Plugin_Edit_Response','Post_Carousel_Express_Edit');
    Add_Filter_Plugin('Filter_Plugin_PostArticle_Core','Post_Carousel_Express_Post');
    Add_Filter_Plugin('Filter_Plugin_PostPage_Core','Post_Carousel_Express_Post');
}

function Post_Carousel_Express_Post(&$article){
    global $zbp;
    $host = $zbp->host;
    foreach($_POST['meta_imgs'] as $key => $value){
        $_POST['meta_imgs'][$key] = str_replace($host,'{#ZC_BLOG_HOST#}',$value);
    }
    $article->Metas->imgs=$_POST['meta_imgs'];
}

function Post_Carousel_Express_Edit(){
    ?>
<style>
legend{display:block;margin-bottom:20px;padding:0;width:100%;border-color:-moz-use-text-color -moz-use-text-color #e5e5e5;border-style:none none solid;border-width:0 0 1px;border-image:none;color:#333;font-size:21px;line-height:40px;-moz-border-bottom-colors:none;-moz-border-left-colors:none;-moz-border-right-colors:none;-moz-border-top-colors:none}
.table-bordered{margin-bottom:20px;width:100%;max-width:100%;border-collapse:separate;border-color:#ddd #ddd #ddd -moz-use-text-color;border-style:solid solid solid none;border-width:1px 1px 1px 0;border-radius:4px;border-image:none;background-color:transparent;-moz-border-bottom-colors:none;-moz-border-left-colors:none;-moz-border-right-colors:none;-moz-border-top-colors:none;border-spacing:0}
.table-bordered th{padding:8px;border-top:1px solid #ddd;vertical-align:top;text-align:left;line-height:20px}
.ytecn span {color: #ffffff;font-size: 1.1em;height: 29px;padding: 6px 18px 6px 18px;margin: 0 0.5em;background: #3a6ea5;border: 1px solid #3399cc;cursor: pointer;}
.ytecn strong {color: #ffffff;font-size: 1.1em;height: 29px;padding: 6px 18px 6px 18px;margin: 0 0.5em;background: #3a6ea5;border: 1px solid #3399cc;cursor: pointer;}
</style>
<script>
function upwindow(){
    var container = document.createElement('script');
$(container).attr('type','text/plain').attr('id','img_editor');
$("body").append(container);
_editor = UE.getEditor('img_editor');
_editor.ready(function () {
    _editor.hide();
    $(".uploadimg strong").click(function(){        
        object = $(this).parent().find('.uplod_img');
        _editor.getDialog("insertimage").open();
        _editor.addListener('beforeInsertImage', function (t, arg) {
            object.attr("value", arg[0].src);
        });
    });
});
}
        function adddiv(){
            var num = $(".includeli").children().length;
            var html = '<li id="savedimage'+num+'" class="includeli"><p align="left" class="uploadimg"><input name="meta_imgs[]" id="edtTitle" type="text" class="uplod_img" style="width: 60%;"  /><strong class="button" style="color: #ffffff;    font-size: 1.1em;    height: 29px;      padding: 6px 18px 6px 18px;    margin: 0 0.5em;    background: #3a6ea5;    border: 1px solid #3399cc;    cursor: pointer;" >浏览文件</strong><span  style="color: #ffffff;    font-size: 1.1em;    height: 29px;      padding: 6px 18px 6px 18px;    margin: 0 0.5em;    background: #3a6ea5;    border: 1px solid #3399cc;    cursor: pointer;" onclick="deldiv('+num+')">移除图片</span></p></li>';
            $("#photos").append(html);
            upwindow();
        }
        function deldiv(num){
            $("#savedimage"+num).remove();
        }
    </script>
    <?php
    global $zbp,$article;
    echo '<div class="ytecn">';
      echo '<table class="table-bordered"><tr>
    <td><fieldset>
    <legend>幻灯片图集</legend>
    <ul id="photos" class="pic-list unstyled">';
        $imgs = $article->Metas->imgs;
        if(!empty($imgs)){
            foreach ($imgs as $key => $value) {
                echo '<li id="savedimage'.$key.'" class="includeli">
                <p align="left" class="uploadimg">
                <input name="meta_imgs[]" id="edtTitle" type="text" class="uplod_img" style="width: 60%;" value="'.$value.'" /><strong class="button">浏览文件</strong>';
                if($key == 0){
                    echo '<span onclick="adddiv()">添加图片</span>';
                }else{
                    echo '<span onclick="deldiv('.$key.')">移除图片</span>';
                }                    
                echo '</p></li>';
            }
        }else{
            echo '<li id="savedimage'.$imgs.'" class="includeli">
                    <p align="left" class="uploadimg">
                    <input name="meta_imgs[]" id="edtTitle" type="text" class="uplod_img" style="width: 60%;" /><strong class="button">浏览文件</strong><span onclick="adddiv()">添加图片</span>
                    </p>
                  </li>';
        }
    echo '</ul><script>upwindow();</script></fieldset></td></tr>';  
    echo '</table></div>';  
?>
<?php
}
function Post_Carousel_Express_Content(&$template){
global $zbp;
$article = $template->GetTags('article');
$article->imgs = str_replace('{#ZC_BLOG_HOST#}',$zbp->host,$article->Metas->imgs);
$template->SetTags('article', $article);
}

function InstallPlugin_Post_Carousel_Express() {
    global $zbp;
}

function UninstallPlugin_Post_Carousel_Express() {

}