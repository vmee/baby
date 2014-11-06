<?php
/////////////////////////////////////////////////////////////////
//地铁客开源轻博客(基于云边), Copyright (C)   2010 - 2011  www.ditieker.com 
//EMAIL:ditieker@163.com QQ:530548182                              
//$Id: db_blog.php 34 2011-10-28 16:56:54Z anythink $ 

class db_blog extends spModel  
{  
	var $pk = "bid"; //主键  
	var $table = "blog"; // 数据表的名称 
	
	var $linker = array(  
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
            'map' => 'islike',    // 关联的标识  
             'mapkey' => 'bid', // 本表与对应表关联的字段名  
             'fclass' => 'db_likes', // 对应表的类名  
            'fkey' => 'bid',    // 对应表中关联的字段名
			//'condition'=>'`uid` = uid',
			//'field'=>'uid',//你要限制的字段     
            'enabled' => true     // 启用关联  
        ), array(  
            'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'board',    // 关联的标识  
            'mapkey' => 'boid', // 本表与对应表关联的字段名  
            'fclass' => 'db_board', // 对应表的类名  
            'fkey' => 'boid',    // 对应表中关联的字段名 
            'enabled' => true     // 启用关联  
        )
		
    );  
	
	

	
	/*检查博客是不是我的*/
	function blogIsMe($bid)
	{
		return $this->find(array('bid'=>$bid),'','uid');	
	}
	
	/*后台用方法*/
	function lockUser($uid)
	{
		$rs = spClass('db_member')->find(array('uid'=>$uid));
		if($rs['admin'] != 1)
		{
			if($rs['open'] == 1){$open = 0;}else{$open = 1;}
			spClass('db_member')->update(array('uid'=>$uid),array('open'=>$open)); 
		}
	}
	
	/*重置密码*/
	function resetPwd($uid,$pwd)
	{
		$rs = spClass('db_member')->find(array('uid'=>$uid));
		if($rs['admin'] != 1)
		{
			$salt = randstr();
			$pwds = password_encode($pwd,$salt);
			$arr['password'] = $pwds;
			$arr['salt'] = $salt;
			if(spClass('db_member')->update(array('uid'=>$uid),$arr)){return true;}
		}
	}
	
	function showVersion()
	{
		return $this->getVersion();
	}
	
	function getSystable()
	{
		return $this->getSystemTable();
	}

	/*内容转载 1.1版本中的*/
	function blogrep($bid,$title)
	{
		
		$rs = $this->spLinker()->find(array('bid'=>$bid));
		if($rs['uid'] == $_SESSION['uid']){return -2;} //自己的
		
		$repto = array('uid'=>$rs['uid'],
					  'username'=>$rs['user']['username'],
					  'domain'  =>$rs['user']['domain'],
					  'time'=>time()
		);
		
		$split = split_attribute($rs['body']);
		if($split['repto']){	$repto = '[repto]'.serialize($split['repto']).'[/repto]';}else{$repto = '[repto]'.serialize($repto).'[/repto]';}
		if($split['attr']){		$attr = '[attribute]'.serialize($split['attr']).'[/attribute]';}else{$attr = '';}
		$rs['body'] = $repto.$attr.$split['content'];
		$rs['title'] = $title;
		$rs['uid'] = $_SESSION['uid'];
		$rs['time'] = time();
		unset($rs['bid'],$rs['hitcount'],$rs['feedcount'],$rs['replaycount'],$rs['noreply'],$rs['top'],$rs['user']);
		if($rs)
		{
			spClass('db_member')->incrField(array('uid'=>$_SESSION['uid']),'num');  //我发布的统计+1
			spClass('db_feeds')->addRep(array('bid'=>$bid),$_SESSION['uid']);
			return $this->create($rs);
			//return 1;
		}else{
			return -1; //无效的
		}
	}
}
?>