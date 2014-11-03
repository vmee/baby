<?php
class magazine extends top{
	//所有的杂志，按排名分页
	public function all(){
		$tmp[] = array('boardname'=>'杂志排行榜','boid'=>0,'top'=>true);
		$this->MyBoards = $tmp;
		$this->HotBoards = spClass('db_board')->HotBoards($this->spArgs('page',1),50);
		$this->display('all_magazines.html');
	}
	
	//写flash杂志的xml文件
	public function write_xml(){

		$boid = $this->spArgs('boid');
		$bruce=fopen("./attachs/siteContent.xml","r");
		//$bruce=fopen("http://localhost/yun3/attachs/siteContent.xml","r");
		if(!$bruce)
		{
		    echo'文件不存在';
		    exit;
		}
		$path="./attachs/magazine/".$boid.".xml";
		$james=fopen($path,"w");
		fclose($james);
		echo $path;
		while (!feof($bruce)){
		    $rose=fgets($bruce);
	        $james2=fopen($path,"a");
	        fwrite($james2,$rose);
	        fclose($james2);
		}
		
		fclose($bruce);
		chmod($path,0777);
		//通过boid获得此id下的图片内容！
		$boardinfos = spClass('db_boardinfo')->findAll(array('boid'=>$boid),'time desc');
		if($boardinfos){
			foreach ($boardinfos as $index => $boardinfo) {
				$tmpResultBlogs = spClass('db_blog')->spLinker()->find(array('','bid'=>$boardinfos[$index]["bid"]));
				if($tmpResultBlogs["type"]=="3"){
					$body = split_attribute($tmpResultBlogs["body"]);
					echo json_encode($body);
					$james3=fopen($path,"a");
			        fwrite($james3,"<page src='../../".$body['attr']['img'][0]['url']."'></page>");
			        fclose($james3);
				}
			}
		}
		$james4=fopen($path,"a");
        fwrite($james4,"</bookPages></flipBook>");
        fclose($james4);
	}
	
	
	//切换到flash页面
	public function magshow(){
		$this->boid = $this->spArgs('boid');
		$this->display('/magazine/index.html');
	}
	//修改，编辑页面
	public function edit(){
		$boardinfo = spClass("db_boardinfo")->findBy('id',$this->spArgs('id'));
		$this->boardinfo = $boardinfo;
		$this->display('magazine_edit.html');
	}
	//修改，编辑do页面
	public function edit_do(){
		$boardinfo = spClass("db_boardinfo")->findBy('id',$this->spArgs('id'));
		if($boardinfo['uid'] == $_SESSION['uid'] || $_SESSION['admin'] == 1)
		{
			$rows = array('title'=>$this->spArgs('MagName'),
						  'rtime' =>time());
			$result = spClass("db_boardinfo")->update(array('id'=>$this->spArgs('id')),$rows);
			exit('ok');
		}else{
			exit('修改失败,无权限或不存在该档案');
		}
	}
	//删除页面
	public function del(){
		$boardinfo = spClass("db_boardinfo")->findBy('id',$this->spArgs('id'));
		if($boardinfo['uid'] == $_SESSION['uid'] || $_SESSION['admin'] == 1)
		{
			spClass("db_blog")->deleteByPk($boardinfo['bid']);
			spClass("db_boardinfo")->deleteByPk($boardinfo['id']); //删除日志 deleteByPK是speedPHP根据主键删除内容的函数
			spClass('db_member')->decrField(array('uid'=>$boardinfo['uid']),'collect_count'); //计数减一   
			spClass('db_board')->decrField(array('boid'=>$boardinfo['boid']),'collect_count'); //计数减一   
			spClass('db_blog')->decrField(array('bid'=>$boardinfo['bid']),'collect_count'); //计数减一   
			exit('ok');
		}else{
			exit('删除失败,无权限或不存在该档案');
		}
	}
	
}