<?php
$blog_plugin_zbpNana_prise_Table = '%pre%blog_plugin_zbpNana_prise';
$blog_plugin_zbpNana_prise_DataInfo = array(
	'ID'				=>	array('ID','integer','',0),		//ID
	'UserID'			=>	array('UserID','integer','',0),   //提交的用户id
	'PostID'			=>	array('PostID','integer','',0),	//提交的文章ID
	'IP'				=>	array('IP','string',15,''),		//提交IP
);

function zbpNana_prise_html($postid){
	global $zbp;

	$zbpNana_prise = new zbpNana_prise($postid);
	echo $zbpNana_prise->zbpNana_prise_button();
}


function zbpNana_prise_do($src_type){
	global $zbp;
	if (!$zbp->CheckPlugin('zbpNana')) {$zbp->ShowError(48);die();}
	$result=array();
	if($src_type == 'zbpNana_prise'){
		$post_id = trim($_POST['post_id']);
		$zbpNana_prise = new zbpNana_prise($post_id);
		if( $zbpNana_prise->zbpNana_prised() ){
			$result = array('status' => 300);
		}else{
			$zbpNana_prise->zbpNana_add_prise();
			$result = array('status' => 200,'count' => $zbpNana_prise->prise_count);
		}
	}
	if(count($result)>0){
	echo json_encode($result);
	}
}

class zbpNana_prise {
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
		$this->zbpNana_prise_count();
	}
	public function zbpNana_prise_count(){
		global $zbp, $blog_plugin_zbpNana_prise_Table, $blog_plugin_zbpNana_prise_DataInfo;
		$sql=$zbp->db->sql->Select($blog_plugin_zbpNana_prise_Table,'*',array(array('=','PostID',$this->post_id)),null,null,null);
		$array=$zbp->GetListCustom($blog_plugin_zbpNana_prise_Table,$blog_plugin_zbpNana_prise_DataInfo,$sql);
		$this->prise_count=count($array);
	}
	public function zbpNana_prised(){
		if( isset($_COOKIE['zbpNana_prise_id_'.$this->post_id]) ){
			return true;
		}
		global $zbp, $blog_plugin_zbpNana_prise_Table, $blog_plugin_zbpNana_prise_DataInfo;
		if($this->is_login){
			$DataArr = array('=','UserID',$this->user_id);
		} else{
			$DataArr = array('=','IP',$this->ip);
		}
		$sql=$zbp->db->sql->Select($blog_plugin_zbpNana_prise_Table,'*',array(array('=','PostID',$this->post_id),$DataArr),null,null,null);
		$array=$zbp->GetListCustom($blog_plugin_zbpNana_prise_Table,$blog_plugin_zbpNana_prise_DataInfo,$sql);
		$p_check = intval(count($array));
		return $p_check && $p_check > 0;
	}
	public function zbpNana_add_prise(){
		global $zbp, $blog_plugin_zbpNana_prise_Table;
		if(!$this->zbpNana_prised()){
			$DataArr = array('PostID'=>(int)$this->post_id,'UserID'=>(int)$this->user_id,'IP' => $this->ip);
			$sql= $zbp->db->sql->Insert($blog_plugin_zbpNana_prise_Table,$DataArr);
			$zbp->db->Insert($sql);
			$expire = time() + 365*24*60*60;
        	setcookie('zbpNana_prise_id_'.$this->post_id, $this->post_id, $expire, '/', $_SERVER['HTTP_HOST'], false);
		}
		$this->zbpNana_prise_count();
	}
	public function zbpNana_prise_button(){
		$class = $this->zbpNana_prised()?'zbpNana_prise prised':'zbpNana_prise';
		$count = $this->prise_count?' <span>'.$this->prise_count.'</span>':'<span></span>';
		$postId = $this->post_id;
		$action = "zbpNana_prise('$postId')";
		$btn_html = '<a href="javascript:;" id="zbpNana_prise_id-%s" onclick="%s" class="am-icon-thumbs-o-up %s" title="好文！一定要点赞！"><i class="fas fa-thumbs-up"></i>点赞%s</a>';
		$button = sprintf($btn_html, $postId, $action, $class, $count);
		return $button;
	}
}
?>
