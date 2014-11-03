<?php
/////////////////////////////////////////////////////////////////
//黑芝麻糊土著, Copyright (C)   2011 - 2011  www.ditieker.com 
//ditieker@163.com                            
//$Id: db_board.php 34 2011-12-22 $

class db_board_order extends spModel  
{  
	var $pk = "id"; //主键  
	var $table = "board_order"; // 数据表的名称 
	
	var $linker = array( 
		array(  
            'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'board_order',    // 关联的标识  
            'mapkey' => 'boid', // 本表与对应表关联的字段名  
            'fclass' => 'db_board_order', // 对应表的类名  
            'fkey' => 'boid',    // 对应表中关联的字段名 
            'enabled' => true     // 启用关联  
        ), 
		array(  
            'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'user',    // 关联的标识  
            'mapkey' => 'uid', // 本表与对应表关联的字段名  
            'fclass' => 'db_member', // 对应表的类名  
            'fkey' => 'uid',    // 对应表中关联的字段名
			'field'=>'uid,username,domain',//你要限制的字段     
            'enabled' => true     // 启用关联  
        ), 
		 array(  
            'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'board',    // 关联的标识  
            'mapkey' => 'boid', // 本表与对应表关联的字段名  
            'fclass' => 'db_board', // 对应表的类名  
            'fkey' => 'boid',    // 对应表中关联的字段名
            'enabled' => true     // 启用关联  
        ),		  
    );  
	
}