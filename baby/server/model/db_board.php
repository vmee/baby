<?php
/////////////////////////////////////////////////////////////////
//黑芝麻糊土著, Copyright (C)   2011 - 2011  www.ditieker.com 
//ditieker@163.com                            
//$Id: db_board.php 34 2011-12-22 $

class db_board extends spModel  
{  
	var $pk = "boid"; //主键  
	var $table = "board"; // 数据表的名称 
	
	var $linker = array( 
		array(  
            'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'boardinfo',    // 关联的标识  
            'mapkey' => 'boid', // 本表与对应表关联的字段名  
            'fclass' => 'db_boardinfo', // 对应表的类名  
            'fkey' => 'boid',    // 对应表中关联的字段名 
            'enabled' => true     // 启用关联  
        ), 
		array(  
            'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'user',    // 关联的标识  
            'mapkey' => 'uid', // 本表与对应表关联的字段名  
            'fclass' => 'db_member', // 对应表的类名  
            'fkey' => 'uid',    // 对应表中关联的字段名
			'field'=>'uid,username,domain ',//你要限制的字段     
            'enabled' => true     // 启用关联  
        ), 
		 array(  
            'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'blog',    // 关联的标识  
            'mapkey' => 'bid', // 本表与对应表关联的字段名  
            'fclass' => 'db_blog', // 对应表的类名  
            'fkey' => 'bid',    // 对应表中关联的字段名
			//'condition'=>'`uid` = uid',
			//'field'=>'uid',//你要限制的字段     
            'enabled' => true     // 启用关联  
        ), 
		  
    );  
	/*热门的board列表*/
	function HotBoards($page,$limit)
	{
//		return $this->spLinker()->spPager(1,$limit)->findAll('coins DESC');
		return $this->spLinker()->spPager($page,$limit)->findAll('','coins DESC');
	}
	/*我的board列表*/
	function myBoards($uid)
	{
		return $this->spLinker()->findAll(array('uid'=>$uid),'boid DESC','');
	}
	/*新建一本杂志*/
	function newmag($magname)
	{
		$result = $this->find(array('boardname'=>$magname,'uid'=>$uid));
		if(is_array($result)) //如果已经存在此杂志名
		{
			return false;
		}else{
			$this->create(array('uid'=>$_SESSION['uid'],'boardname'=>$magname,'time'=>time()));
			spClass('db_member')->incrField(array('uid'=>$uid),'magazine_count'); //增加用户杂志数量统计
			return true;
		}
	}
	/*修改杂志名称*/
	function edit_magazine($boid,$magname,$uid)
	{
		$result = $this->find(array('boardname'=>$magname,'uid'=>$uid));
		if(is_array($result)) //如果已经存在此杂志名
		{
			return false;
		}else{
			$this->update(array('boid'=>$boid),array('boardname'=>$magname)); //取消关系
			return true;
		}
	}
}