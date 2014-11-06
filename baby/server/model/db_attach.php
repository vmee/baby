<?php
/////////////////////////////////////////////////////////////////
//地铁客开源轻博客(基于云边), Copyright (C)   2010 - 2011  www.ditieker.com 
//EMAIL:ditieker@163.com QQ:530548182                              
//$Id: db_attach.php 7 2011-09-20 15:02:20Z anythink $ 

class db_attach extends spModel  
{  
	var $pk = "id"; //主键  
	var $table = "attachments"; // 数据表的名称 



	/*删除某一个附件,连数据带文件都删除*/
	function delBy($id,$uid)
	{
		$rs = $this->find(array('id'=>$id,'uid'=>$uid),'','path');
		$path = pathinfo($rs['path']);
		$file = $path['dirname'].'/t_'.$path['basename'];
		@unlink(APP_PATH.'/'.$rs['path']);
		@unlink(APP_PATH.'/'.$file);

		return $this->deleteByPk($id);
	}
	
	//_localMusicParse使用
	function findBy($id)
	{
		return $this->find(array('id'=>$id),'','uid,path');
	}
	
}
?>