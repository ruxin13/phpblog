<?php
$blog_plugin_Blogs_prise_Table = '%pre%blog_plugin_Blogs_prise';
$blog_plugin_Blogs_prise_DataInfo = array(
	'ID'				=>	array('ID','integer','',0),		//ID
	'UserID'			=>	array('UserID','integer','',0),   //提交的用户id
	'PostID'			=>	array('PostID','integer','',0),	//提交的文章ID
	'IP'				=>	array('IP','string',15,''),		//提交IP
);

function Blogs_prise_html($postid){
	global $zbp;

	$Blogs_prise = new Blogs_prise($postid);
	echo $Blogs_prise->Blogs_prise_button();
}


function Blogs_prise_do($src_type){
	global $zbp;
	if (!$zbp->CheckPlugin('Blogs')) {$zbp->ShowError(48);die();}
	$result=array();
	if($src_type == 'Blogs_prise'){
		$post_id = trim($_POST['post_id']);
		$Blogs_prise = new Blogs_prise($post_id);
		if( $Blogs_prise->Blogs_prised() ){
			$result = array('status' => 300);
		}else{
			$Blogs_prise->Blogs_add_prise();
			$result = array('status' => 200,'count' => $Blogs_prise->prise_count);
		}
	}
	if(count($result)>0){
	echo json_encode($result);
	}
}

class Blogs_prise {
	private		$ip;
	public		$post_id;
	public		$user_id;
	public		$prise_count;
	public		$is_login;
	public function __construct($post_id){
		global $zbp;
		$this->ip = GetGuestIP();
		$this->post_id = $post_id;
		$this->user_id = $zbp->user->ID;
		if( $this->user_id && $this->user_id > 0 ){
			$this->is_login = true;
		}
		$this->Blogs_prise_count();
	}
	public function Blogs_prise_count(){
		global $zbp, $blog_plugin_Blogs_prise_Table, $blog_plugin_Blogs_prise_DataInfo;
		$sql=$zbp->db->sql->Select($blog_plugin_Blogs_prise_Table,'*',array(array('=','PostID',$this->post_id)),null,null,null);
		$array=$zbp->GetListCustom($blog_plugin_Blogs_prise_Table,$blog_plugin_Blogs_prise_DataInfo,$sql);
		$this->prise_count=count($array);
	}
	public function Blogs_prised(){
		if( isset($_COOKIE['Blogs_prise_id_'.$this->post_id]) ){
			return true;
		}
		global $zbp, $blog_plugin_Blogs_prise_Table, $blog_plugin_Blogs_prise_DataInfo;
		if($this->is_login){
			$DataArr = array('=','UserID',$this->user_id);
		} else{
			$DataArr = array('=','IP',$this->ip);
		}
		$sql=$zbp->db->sql->Select($blog_plugin_Blogs_prise_Table,'*',array(array('=','PostID',$this->post_id),$DataArr),null,null,null);
		$array=$zbp->GetListCustom($blog_plugin_Blogs_prise_Table,$blog_plugin_Blogs_prise_DataInfo,$sql);
		$p_check = intval(count($array));
		return $p_check && $p_check > 0;
	}
	public function Blogs_add_prise(){
		global $zbp, $blog_plugin_Blogs_prise_Table;
		if(!$this->Blogs_prised()){
			$DataArr = array('PostID'=>(int)$this->post_id,'UserID'=>(int)$this->user_id,'IP' => $this->ip);
			$sql= $zbp->db->sql->Insert($blog_plugin_Blogs_prise_Table,$DataArr);
			$zbp->db->Insert($sql);
			$expire = time() + 365*24*60*60;
        	setcookie('Blogs_prise_id_'.$this->post_id, $this->post_id, $expire, '/', $_SERVER['HTTP_HOST'], false);
		}
		$this->Blogs_prise_count();
	}
	public function Blogs_prise_button(){
		$class = $this->Blogs_prised()?'Blogs_prise prised':'Blogs_prise';
		$count = $this->prise_count?' <span>'.$this->prise_count.'</span>':'<span></span>';
		$postId = $this->post_id;
		$action = "Blogs_prise('$postId')";
		$btn_html = '<a href="javascript:;" id="Blogs_prise_id-%s" onclick="%s" class="am-icon-thumbs-o-up %s" title="好文！一定要点赞！"><i class="fa fa-thumbs-up"></i>点赞%s</a>';
		$button = sprintf($btn_html, $postId, $action, $class, $count);
		return $button;
	}
}
?>
