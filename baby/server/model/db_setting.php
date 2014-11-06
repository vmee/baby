<?php
/////////////////////////////////////////////////////////////////
//地铁客开源轻博客(基于云边), Copyright (C)   2010 - 2011  www.ditieker.com 
//EMAIL:ditieker@163.com QQ:530548182                              
//$Id: db_setting.php 7 2011-09-20 15:02:20Z anythink $ 

class db_setting extends spModel  
{  
	var $pk = "name"; //主键  
	var $table = "setting"; // 数据表的名称 
	
	
	/*显示系统配置*/
	function getConfig()
	{
		$rs = $this->findAll();
		$data = '';
		foreach($rs as $d)
		{
			$data[$d['name']] = $d['val'];
		}

		return $data;
	}
	
	
	/*保存系统配置
	input array key value*/
	function saveConfig($var)
	{
		spAccess('c','ybconfig');

		foreach($var as $k=>$d)
		{
			$rs = $this->find(array('name'=>$k));
			if(is_array($rs))
			{
				$this->update(array('name'=>$k),array('val'=>$d));
			}else{
				$this->create(array('name'=>$k),array('val'=>$d));
			}
		}
		$rs = $this->getConfig();

		spAccess('w','ybconfig',$rs,3600);
	}
	



	

}
?>