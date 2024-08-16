<?php
/**
 * 默认markdown编辑器增强插件
 *
 * @package MdEditorPlus
 * @author Darylyexu
 * @version 1.0
 * @link https://www.darylyexu.top:8888
 */
class MdEditorPlus_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
     
    public static Function activate()
    {
        
        Typecho_Plugin::factory('Widget_Archive')->header = array('MdEditorPlus_Plugin','headercss');
		Typecho_Plugin::factory('admin/write-post.php')->bottom = array('MdEditorPlus_Plugin', 'button');
		Typecho_Plugin::factory('admin/write-page.php')->bottom = array('MdEditorPlus_Plugin', 'button');
		Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('MdEditorPlus_Plugin','hide');
		Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('MdEditorPlus_Plugin','hide');
	}

public static function headercss(){
    

}
public static function button(){
		?><style>.wmd-button-row {height: auto;}
.wmdp-span{background-image:none !important;background: none;font-size: large;text-align: center;color: #999999;font-family: serif;width: auto !important;}
</style>
		<script> 
          $(document).ready(function(){
          	$('#wmd-spacer1').after('<li class="wmd-button" id="wmd-center-button" title="居中 <center> ALT+J"><span class="wmdp-span">≡</span></li><li class="wmd-button" id="wmd-underline-button" title="下划线 <underline> ALT+U"><span class="wmdp-span">＿</span></li><li class="wmd-button" id="wmd-codeblocks-button" title="代码块 <codes> ALT+B"><span class="wmdp-span">▭</span></li><li class="wmd-button" id="wmd-latex-button" title="LateX $ $ ALT+S"><span class="wmdp-span">∑</span></li>');$('#wmd-spacer2').after('<li class="wmd-button" id="wmd-purple-button" title="紫色 <f00090>"><span class="wmdp-span">💜</span></li><li class="wmd-button" id="wmd-blue-button" title="蓝色 <0080ff>"><span class="wmdp-span">💙</span></li><li class="wmd-button" id="wmd-orange-button" title="橙色 <ff8000>"><span class="wmdp-span">🧡</span></li><li class="wmd-button" id="wmd-black-button" title="黑色 <000000>"><span class="wmdp-span">🖤</span></li><li class="wmd-button" id="wmd-green-button" title="绿色 <00ff00>"><span class="wmdp-span">💚</span></li>')
function changeText(e){
    var txtarea = document.getElementById("text");
    //获取textarea中选择文本开头字符的坐标
    var start = txtarea.selectionStart;
    //获取textarea中选择文本结尾字符的坐标
    var finish = txtarea.selectionEnd;
    var allText = txtarea.value;
 
    //截取textarea中选择的文本
    var sel = allText.substring(start, finish);
    //构造新<php></php>文本
    var newText=allText.substring(0, start)+"<"+e+">"+sel+"</"+e+">"+allText.substring(finish, allText.length);
 
    txtarea.value=newText;
    var start =start + e.length + 2;
    var finish =finish + e.length + 2;
    
txtarea.setSelectionRange(start,finish);
txtarea.focus();
}

function changeText1(f){
    var  txt1area = document.getElementById("text");
    //获取textarea中选择文本开头字符的坐标
    var st1art =  txt1area.selectionStart;
    //获取textarea中选择文本结尾字符的坐标
    var fini1sh =  txt1area.selectionEnd;
    var all1Text =  txt1area.value;
 
    //截取textarea中选择的文本
    var s1el = all1Text.substring(st1art, fini1sh);
    //构造新f f文本
    var new1Text=all1Text.substring(0, st1art)+f+s1el+f+all1Text.substring(fini1sh, all1Text.length);
     //光标位置
     txt1area.value=new1Text;
    var st1art =st1art + f.length + 2;
    var fini1sh =fini1sh + f.length + 2;
    
 txt1area.setSelectionRange(st1art,fini1sh);
}

function changecolor(g){
    var  txt2area = document.getElementById("text");
    //获取textarea中选择文本开头字符的坐标
    var st2art =  txt2area.selectionStart;
    //获取textarea中选择文本结尾字符的坐标
    var fini2sh =  txt2area.selectionEnd;
    var all2Text =  txt2area.value;
 
    //截取textarea中选择的文本
    var s2el = all2Text.substring(st2art, fini2sh);
    //构造新文本
    var new2Text=all2Text.substring(0, st2art)+"<font color="+g+">"+s2el+"</font>"+all2Text.substring(fini2sh, all2Text.length);
     //光标位置
     txt2area.value=new2Text;
    var st2art =st2art + g.length + 2;
    var fini2sh =fini2sh + g.length + 2;    

 txt2area.setSelectionRange(st2art,fini2sh);
}


                if($('#wmd-button-row').length !== 0){
                   $('#wmd-center-button').click(function(){
					changeText("center");
					});
                   $('#wmd-underline-button').click(function(){
					changeText("u");
					});
                   $('#wmd-codeblocks-button').click(function(){
					changeText1("\n```\n");
					});
                   $('#wmd-latex-button').click(function(){
					changeText1("$");
					});
                   $('#wmd-purple-button').click(function(){
					changecolor("#f00090");
					});
                   $('#wmd-blue-button').click(function(){
					changecolor("#0080ff");
					});
                   $('#wmd-orange-button').click(function(){
					changecolor("#ff8000");
					});
                   $('#wmd-black-button').click(function(){
					changecolor("#000000");
					});
                   $('#wmd-green-button').click(function(){
					changecolor("#00ff00");
					});

                }
                $('body').on('keydown',function(a){
//ALT+J
                    if( a.altKey && a.keyCode == "74"){
						$('#wmd-center-button').click();
					}
//ALT+B
                    if( a.altKey && a.keyCode == "66"){
                        $('#wmd-codeblocks-button').click();
                    }
//ALT+U
                    if( a.altKey && a.keyCode == "85"){
                        $('#wmd-underline-button').click();
                    }
//ALT+S
                    if( a.altKey && a.keyCode == "83"){
                        $('#wmd-latex-button').click();
                    }
                });
			});
</script>
<?php
}


public static function hide($con,$obj,$text)
    {
/*固定写法*/
$text = empty($text)?$con:$text;
/*数据库连接*/
$db = Typecho_Db::get();
$user = Typecho_Widget::widget('Widget_User');
/*通过判断id来判断用户是否登录*/
if($user->uid > 0){
$sql = $db->select()->from('table.comments')
    ->where('cid = ?',$obj->cid)
    ->where('authorId = ?', $user->uid)
    ->where('status = ?', 'approved')
    ->limit(1);
$text = preg_replace("/\[login\](.*?)\[\/login\]/sm",'<div class="reply2view-ok"><fieldset><legend>登录可见内容</legend>$1</fieldset></div>',$text);
}else{
$sql = $db->select()->from('table.comments')
    ->where('cid = ?',$obj->cid)
    ->where('mail = ?', $obj->remember('mail',true))
    ->where('status = ?', 'approved')
    ->limit(1);
if(!$obj->is('single'))
{$text = preg_replace("/\[login\](.*?)\[\/login\]/sm",'<div class="reply2view">抱歉，隐藏内容登陆后可见</div>',$text);}else{

$text = preg_replace("/\[login\](.*?)\[\/login\]/sm",'<div class="reply2view">抱歉，隐藏内容 <a  href="javascript:void(0)">登陆</a> 后可见</div>',$text);

}



}
$result = $db->fetchAll($sql);

if($result || $user->uid==$obj->authorId){
$text= preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'<div class="reply2view-ok"><fieldset><legend>回复可见内容</legend>$1</fieldset></div>',$text);
}else{

if(!$obj->is('single'))
{
$text = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",' 回复可见内容 ',$text);
}else{
$text = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'<div class="reply2view">抱歉，隐藏内容 <a href="#comments">回复</a> 后可见</div>',$text);
    
}
    
    
    
}
return $text;
}



	
    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){}

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}



}
