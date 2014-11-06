<?php
/////////////////////////////////////////////////////////////////
//黑芝麻糊土著, Copyright (C)   2011 - 2011  www.ditieker.com 
//ditieker@163.com                            
//$Id: db_board.php 34 2011-12-22 $

class db_baby_growing extends spModel
{  
	var $pk = "id"; //主键  
	var $table = "baby_growing"; // 数据表的名称
	
	var $linker = array( 
//		array(  
//            'type' => 'hasone',   // 关联类型，这里是一对一关联  
//            'map' => 'user',    // 关联的标识  
//            'mapkey' => 'uid', // 本表与对应表关联的字段名  
//            'fclass' => 'db_member', // 对应表的类名  
//            'fkey' => 'uid',    // 对应表中关联的字段名
//			'field'=>'uid,username,domain ',//你要限制的字段     
//            'enabled' => true     // 启用关联  
//        )
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
	
	/*收集到某一本杂志*/
	function addcollect($boid,$bid,$uid,$title)
	{
		$rs = spClass('db_blog')->find(array('bid'=>$rows['bid']),'','uid');
		if($rs['uid'] == $uid){return false;}

		$this->create(array('bid'=>$bid,'boid'=>$boid,'uid'=>$uid,'title'=>$title,'info'=>$title,'time'=>time()));
		spClass('db_board')->incrField(array('boid'=>$boid),'collect_count');//增加回复统计
		spClass('db_board')->incrField(array('boid'=>$boid),'coins',5);//增加回复统计
		spClass('db_blog')->incrField(array('bid'=>$bid),'collect_count');//增加回复统计
		spClass('db_member')->incrField(array('uid'=>$uid),'collect_count'); //增加回复统计
		return true;
	}
}