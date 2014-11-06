<?php
/////////////////////////////////////////////////////////////////
//地铁客开源轻博客(基于云边), Copyright (C)   2010 - 2011  www.ditieker.com 
//EMAIL:ditieker@163.com QQ:530548182                              
//$Id: db_member_sends.php 35 2011-11-03 08:18:14Z anythink $ 
//用于高速获取好友状态信息的blog的id

class db_member_sends extends spModel  
{  
	var $pk = "id"; //主键  
	var $table = "member_sends"; // 数据表的名称 
	
	var $linker = array(  
        array(  
		'type' => 'hasone',   // 关联类型，这里是一对一关联  
		'map' => 'user',    // 关联的标识  
		'mapkey' => 'uid', // 本表与对应表关联的字段名  
		'fclass' => 'db_member', // 对应表的类名  
		'fkey' => 'uid',    // 对应表中关联的字段名
		'field'=>'uid',//你要限制的字段     
		'enabled' => true     // 启用关联  
        )
    );
}
?>