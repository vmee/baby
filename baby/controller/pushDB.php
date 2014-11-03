<?php
class pushDB extends top
{
	// 构造函数，进行全局操作的位置  
     function __construct(){  
         parent::__construct(); 
		 global $site_uri;
         $this->dtk = $GLOBALS['YB'] + $GLOBALS['G_SP']['dtk'];
		 $this->url = $site_uri;
     }  
     
	function push($data){
		spClass("db_member_sends")->create(array('uid' =>2,'sends' =>$data,'count'=>1));
	}
}
?>