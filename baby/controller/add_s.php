<?php
/////////////////////////////////////////////////////////////////
//黑芝麻糊土著, Copyright (C)   2011 - 2012  www.ditieker.com 
//
include_once("httpsqs_client.php");

class add_s extends top
{
	
	 function __construct(){  
         parent::__construct(); 
		 if(!islogin()){prient_jump(spUrl('main'));}
		 
     }
	
	
	/*发布文字模型*/
	public function text()
	{
		if($this->dtk['addtext_switch'] == 0){$this->error('没有开放该模型');}
		$this->getCreateBid();
		$this->attach();
		$this->myTagUsually(); //我的常用标签
		$this->display('admin/add_text.html');  //默认发布文字行
	}
	
	/*发布音乐模型*/
	public function music()
	{
		if($this->dtk['addmusic_switch'] == 0){$this->error('没有开放该模型');}
		$this->getCreateBid();
		$this->attach();
		$this->myTagUsually(); //我的常用标签
		$this->display('admin/add_music.html');  //默认发布文字
	}
	
	/*发布音乐模型*/
	public function image()
	{
		if($this->dtk['addimg_switch'] == 0){$this->error('没有开放该模型');}
		$this->getCreateBid();
		$this->attach();
		$this->myTagUsually(); //我的常用标签
		$this->display('admin/add_image.html');  //默认发布文字
	}
	
	/*发布音乐模型*/
	public function video()
	{
		if($this->dtk['addvideo_switch'] == 0){$this->error('没有开放该模型');}
		$this->getCreateBid();
		$this->attach();
		$this->myTagUsually(); //我的常用标签
		$this->display('admin/add_video.html');  //默认发布文字
	}
	
	
	
	public function edit()
	{
		$this->getCreateBid();
		$this->attach(false);
		$this->myTagUsually(); //我的常用标签
		$this->__parse_mytag($this->blog['tag']); //如果是编辑的则推送edit时的标签
		$this->body = split_attribute($this->blog['body']); //获得属性和正文信息
		
		if($this->blog['type'] == 1) //文字
		{
			
			$this->display('add_text.html');	
		}elseif($this->blog['type'] == 2){  //音乐
		
			$this->display('add_music.html');	
		}elseif($this->blog['type'] == 3){  //照片
		
			$this->display('add_image.html');	
		}elseif($this->blog['type'] == 4){//视频
			$this->display('add_video.html');	
		}else{
			exit('未知数据流');
		}
	}
	
	//创建一个供发布或者编辑用的
	public function post_state()
	{
		//计算随机马甲发布用户
		//$test = array(1,2,3,4,5,6);//对这5个数建立数字索引数组，则索引值为0到4
		//$i = rand(0,5);//随机生成一个0，到4之间的整形数字，包括0和4
		$test = array(1,2,3,4,5,6,7,9,10,16,17);
		$i = rand(0,10);//
		$rand_uid = $test[$i];
		$_SESSION['tempuid'] = $rand_uid;
		if($this->spArgs('textarea')==""){
			prient_jump(spUrl('main'));
		}
		$rows = array('title'=>strip_tags($this->spArgs('pb-text-title')),
					      'type' =>'6',
					      'top'  =>$this->spArgs('pb-top-post',0),
					      'tag'  =>'短笑话',
						  'open'=>'1',
						  'ispub' => 0, //保存仓库模式
					      'body'=>$bodypre.strreplaces($this->spArgs('textarea')),
					      'noreply'=>$this->spArgs('pb-nowrite-post',0),
						  'time' =>time(),
						  'uid'=>$_SESSION['tempuid']
			);
		spClass("db_blog")->create($rows);
		$_SESSION['tempuid']= NULL;
		prient_jump(spUrl('admin/Warehouse'));
	}
	
	
	//创建一个供发布或者编辑用的
	public function post()
	{
		if($_SESSION['tempid'] == 0){$this->error('丢失临时id');	}
		$one = spClass("db_blog")->findBy('bid',$_SESSION['tempid']);
		
		

		if($this->spArgs('blog-types') == 1)
		{
			$this->_localImgParse($this->spArgs('textarea'));  //处理图像资源
			if($this->spArgs('blog-attach') != ''){ $bodypre = '[attribute]'.serialize($this->spArgs('blog-attach')).'[/attribute]'; }	//加入属性关键字
		}
		
		
	
		 //音乐模型 视频模型
		if($this->spArgs('blog-types') == 2 || $this->spArgs('blog-types') == 4 )
		{
			if($this->spArgs('useedit') != 1)//如果有特殊则处理
			{
				if($this->spArgs('localmusicfid') == '' && $this->spArgs('urlmusic') == '') {exit('未完成的内容');}
				if($this->spArgs('urlmusic'))//进行音乐列表的处理
				{
					$music = $this->__loadMusicString($this->spArgs('urlmusic'));
					$music_count = count($music); //总共几首音乐
				}
				$bodypre = '[attribute]'.serialize($music).'[/attribute]';//加入属性关键字
			}
			
		}
		
		//图片模型
		if($this->spArgs('blog-types') == 3)
		{
			
			$image = $this->_imagemodeparse($this->spArgs('localimg')); //处理图片
			if(is_array($image)) { $bodypre = '[attribute]'.serialize($image).'[/attribute]'; } //加入属性关键字
 		}
		
		
		
		
			$rows = array('title'=>strip_tags($this->spArgs('pb-text-title')),
					      'type' =>$this->spArgs('blog-types'),
					      'top'  =>$this->spArgs('pb-top-post',0),
					      'tag'  =>substr((strip_tags($this->spArgs('blog-tags'))),0,-1),
					      'attribute'=>$attribute,
					      'body'=>$bodypre.strreplaces($this->spArgs('textarea')),
					      'open'=>$this->spArgs('blog-open'),
					      'noreply'=>$this->spArgs('pb-nowrite-post',0),
						  'open' =>$this->spArgs('post-privacy-select'),
						  'time' =>time(),
						  'ispub' => 0 //保存仓库模式
			);
		$this->tagCreate(trim($this->spArgs('blog-tags'))); //处理TAG
		if($one['open'] == -1){spClass('db_member')->incrField(array('uid'=>$_SESSION['tempuid']),'num');}  //如果不是编辑的话就加
		spClass("db_blog")->update(array('bid'=>$_SESSION['tempid']),$rows,$_SESSION['tempuid']);
		
		$this->postToConnect($this->spArgs());
		
		//获取关注我的好友列表，像这些用户发送我的发布内容
		//同步先将自己的uid里的发布信息放进去
		$my_bids[] = spClass('db_member_sends')->spLinker()->find(array('uid'=>$_SESSION['tempuid']),'','sends');
		if(trim($my_bids)==null || trim($my_bids)==""){
			$tmpids[] = array($_SESSION['tempuid']);
			spClass("db_member_sends")->create(array('uid' =>$_SESSION['tempuid'],'sends' =>$tmpids,'count'=>1));
		}else{
			array_push($my_bids, array($_SESSION['tempid']));
			spClass('db_member_sends')->update(array('uid'=>$_SESSION['tempuid']),array('sends'=>$my_bids));
		}
		//再来操作其他的用户
		$where = "`touid` = ".$_SESSION['uid'];
		$follow_me_uids[] = spClass('db_follow')->spLinker()->findAll($where,' time desc');
		$tmpResultBlogs[] = array(
			"new_bid" => $_SESSION['tempid'], 
			"uids" => $follow_me_uids);
		$pushdata = implode($tmpResultBlogs);
		$httpsqs = new httpsqs("127.0.0.1", 17814, "ditieker", "utf-8");
		$result = $httpsqs->put("add_sends", $pushdata); 
		$_SESSION['tempid'] = NULL;
		$_SESSION['tempuid']= NULL;
		prient_jump(spUrl('admin','Warehouse'));
		
	}
	
	
	
	public function uploadimg()
	{
		if(isset($_SESSION['tempid']))
		{
			$upfile = spClass("uploadFile");
			$upfile->set_filesize($this->dtk['addimg_upsize']); //改为后台配置
			$upfile->set_filetypes('jpg|png|jpge|bmp|gif');
			$upfile->set_diydir($_SESSION['tempid']);
			$files = $upfile->fileupload();	
			$farray = json_decode($files);
			echo $files;
		}else{
			echo json_encode(array('err'=>'丢失参数了啊 你怎么搞的','msg'=>''));
		}
	}
	
	public function swfupload()
	{

		if(isset($_SESSION['tempid']))
		{
			$upfile = spClass("uploadFile");
			$upfile->set_filesize($this->dtk['addimg_upsize']); //改为后台配置
			$upfile->set_filetypes('jpg|png|jpge|bmp|gif');
			$upfile->set_diydir($_SESSION['tempid']);
			$files = $upfile->fileupload();	
			$farray = json_decode($files);
			echo $files;
		}else{
			echo json_encode(array('err'=>'丢失参数了啊 你怎么搞的','msg'=>''));
		}
	}
	
		/*上传媒体*/
	public function uploadmedia()
	{
		if($this->dtk['addmusic_up_switch'] == 0) {$this->error('没有启用媒体上传',spUrl('main'));}
		if(isset($_SESSION['tempid']))
		{
			$upfile = spClass("uploadFile");
			$upfile->set_filesize($this->dtk['addmusic_upsize']); //改为后台配置
			$upfile->set_filetypes('mp3|wma|mid');
			$upfile->set_diydir($_SESSION['tempid']);
			$files = $upfile->fileupload();	
			$farray = json_decode($files);
			echo $files;
		}else{
			$this->error('丢失参数',spUrl('main'));
		}
	}
	
	
	
		
	//附件管理器
	public function attach($del=true)
	{
	
		if($this->tempid)
		{
			if($del)
			{
				foreach($this->attach as $d)
				{
					spClass('db_attach')->delBy($d['id'],$_SESSION['tempuid']);
				}
			}
				
			$rs = spClass('db_attach')->findAll(array('bid'=>$this->tempid),'time desc');
			if($rs[0]['uid'] == $_SESSION['uid'] || $_SESSION['admin'] == 1)
			{
				$this->attach = $rs;
			}
			
			
		}else{
			$this->attach = spClass('db_attach')->spPager($this->spArgs('page',1),10)->findAll(array('uid'=>$_SESSION['uid']));	
			$this->pager = spClass('db_attach')->spPager()->pagerHtml('mblog','attach');
		}
	}
	
	

	
	/*删除日志以及附件
	没有依赖db库
	7月12日测试完毕 如果日志没有附件不会自动删除那个博客的文件夹
	*/
	public function del()
	{
		$blog = spClass("db_blog")->findBy('bid',$this->spArgs('id'));
		if($blog['uid'] == $_SESSION['uid'] || $_SESSION['admin'] == 1)
		{
			$attach = spClass("db_attach")->findAll(array('bid'=>$blog['bid']),'','path');
			if($attach != '')
			{
				$path = pathinfo($attach[0]['path']);
				if($this->_deldir($path['dirname']))
				{
					spClass("db_attach")->delete(array('bid'=>$blog['bid']));
				}
			}
				spClass("db_blog")->deleteByPk($blog['bid']); //删除日志 deleteByPK是speedPHP根据主键删除内容的函数
				spClass('db_member')->decrField(array('uid'=>$blog['uid']),'num'); //计数减一   
				//删除喜欢，删除评论。
				spClass('db_replay')->delete(array('bid'=>$blog['bid']));
				spClass('db_likes')->delete(array('bid'=>$blog['bid']));
				
			exit('ok');
		}else{
			exit('删除失败,无权限或不存在该档案');
		}
	}
	
	/*删除某个媒体*/
	public function delattach()
	{
		$rs = spClass('db_attach')->delBy($this->spArgs('id'),$_SESSION['uid']);
		exit('ok');	
	}
	
	
	
	/*解析传入的地址
	url,desc*/
	public function links()
	{
		$return = spClass('urlParse')->seturldesc($this->spArgs('url'),$this->spArgs('desc'));
		echo json_encode($return);
	}
	
	
	/*处理发布图片模型*/
	private function _imagemodeparse($image)
	{
		$data = '';
		$i = 1;
		if(is_array($image))
		{
			foreach($image as $k => $d)
			{			

				if($i > $this->dtk['addimg_count']) //如果超过后台设定张数则把超过的删除
				{
					 spClass('db_attach')->delBy($k);
				}else{
					
					$rs = spClass('db_attach')->find(array('id'=>$k),'','id,path');
					if(is_array($rs)) //如果记录验证成功
					{
						$dir = pathinfo($rs['path']);
						$thum = $dir['dirname'].'/t_'.$dir['basename'];
						if($d != '图片说明可选'){$desc = $d;}else{$desc="";}
						if(file_exists($thum))
						{
							$data[] = array('url'=>$thum,'desc' =>$desc);
						}else{
							
							$data[] = array('url'=>$rs['path'],'desc' =>$desc);
						}
						
					 spClass('db_attach')->update(array('id'=>$k),array('blogdesc'=>$desc));
					}
				}
			$i++;
			}
			
			$datas['img'] = $data;
			$datas['count'] = count($data);
			return $datas;
		}
		return '';
	}
	
	/*发布到其他媒体通过内部api*/
	private function postToConnect($args)
	{
	/*
		if($args['openconnect']['WEIB'])
		{
		
			import('sinaConnect.php');
			$sina = new sinaConnect();
			$sina->init($this->dtk['openlogin_weib_appid'],$this->dtk['openlogin_weib_appkey'],$this->dtk['openlogin_weib_callback']);
			$keys = $_SESSION['openconnect']['WEIB'];
			$c = new WeiboClient( $this->dtk['openlogin_weib_appid'],$this->dtk['openlogin_weib_appkey'], $keys['token'] , $keys['secret']  );
			
			if($args['filedata'])
			{
				$title = $args['pb-text-title'];
				$pic = stripslashes($args['filedata']);
				$rs = $c ->upload( $title ,$pic);  //update
			}else{
				$title = strip_tags($args['pb-text-title']);
				$subject = '"'.strip_tags($args['textarea']).'"';
				$rs = $c ->update( $title .$subject);  //update
			}
		}
*/		
	}
	
	
	
	
	
	/*处理TAG*/
	private function tagCreate($tag)
	{
		$tag_array = explode(',',substr($tag,0,-1));  //用逗号分隔,避免空格分隔出断章
		if(is_array($tag_array)){ foreach($tag_array as $d){if($d != ''){spClass('db_tags')->tagCreate($d,$_SESSION['uid']);}} }	
	}
	
	
	/*获取我的常用tag*/
	private function myTagUsually($num=20)
	{
		$this->myTagUsually = spClass('db_tags')->spCache(3600)->findAll(array('uid'=>$_SESSION['uid']),'num desc','',$num);
	}
	


	/*获取一个可用的临时ID*/
	private function getCreateBid()
	{
		//计算随机马甲发布用户
		//$test = array(1,2,3,4,5,6);//对这5个数建立数字索引数组，则索引值为0到4
		//$i = rand(0,5);//随机生成一个0，到4之间的整形数字，包括0和4
		$test = array(1,2,3,4,5,6,7,9,10,16,17);
		$i = rand(0,10);//
		$rand_uid = $test[$i];
		$_SESSION['tempuid'] = $rand_uid;
		
		$result = spClass("db_blog")->find(array('uid'=>$_SESSION['tempuid'],'open'=>-1),'','bid');
		if($result == '')
		{
			
			$_SESSION['tempid'] = spClass("db_blog")->create(array('title' =>'','open' =>-1,'body'=>'','abstract'=>'','tag'=>'','uid'=>$_SESSION['tempuid']));
			
			$this->tempid = $_SESSION['tempid'];
		}else{
			$_SESSION['tempid'] = $result['bid'];
			$this->tempid = $_SESSION['tempid'];
		}
		
		
		if($this->spArgs('id') != '')
		{
			$ras = spClass("db_blog")->findBy('bid',$this->spArgs('id'));
			if($ras['uid'] == $_SESSION['uid'] || $_SESSION['admin'] == 1)
			{
				$bid = $ras['bid'];
				$_SESSION['tempid'] = $bid;
				$this->tempid = $bid; 
				$this->times = $ras['time'];
				$this->blog = $ras;
			}else{
				$this->error('您没有权利编辑',spUrl('main','index'));
			}
		}
		
	}
	
	
	
	
	
	/*进行发布音乐的处理
	id  附件id
	desc 描述
	需要判断是否归所属人
	如果此id没查出来则返回false 接到的方法要删除这个id
	*/
	private function _localMusicParse($id,$desc)
	{			
		$result = spClass("db_attach")->findBy($id,$_SESSION['uid']); //检出文件是否存在			
		if($result['uid'] == $_SESSION['uid']) //判断是否是我发的
		{
			if($desc[$d] != '描述') { spClass("db_attach")->update(array('id'=>$id),array('blogdesc'=>$desc)); }//如果有描述则更新描述
			return true;
		}else{
			return false;
		}
	}
	
	
	//获得编辑器实际使用的图片
	private function _localImgParse($body)
	{	
		preg_match_all( "/<img.[^>]*?(src|SRC)=\"[\"|'| ]{0,}([^>]*\\.(gif|jpg|jpeg|bmp|png))([\"|'|\\s]).*[\\/]?>/isU",stripslashes($body) , $info );
		$info = array_unique($info[2]);
	
		$str = '';
		if(is_array($info))
		{
			foreach($info as $d)
			{
			 if (substr($d,0,4) != 'http')  //非本地连接不管
			 {
				if(substr($d,0,7) == 'attachs')  //如果不是 attachs开头不管
				{
					$path = pathinfo($d);
					if(substr($path['basename'],0,2) == 't_') {$d = $path['dirname'].'/'. substr($path['basename'],2,99);}//如果是缩略图
				}
			 }	
			 $str .= '\''.$d.'\',';
			}
			
			$str = substr($str,0,-1); //去掉逗号
			if($str){ $where = "`path` not in ($str) and"; } //如果存在 就加限制
			$result = spClass('db_attach')->findAll("$where  uid = {$_SESSION['tempuid']} and bid = {$_SESSION['tempid']}",'','id,path'); //获取到编辑器没有使用的

			if(is_array($result))
			{
				foreach($result as $d) //全部搞定
				{
					spClass('db_attach')->delBy($d['id'],$_SESSION['tempuid']);
				}
			}
		}
	}



	
	/*处理发布的字符串
	发布时的文件如果小于上传的媒体文件，则本函数会自动清理
	*/
	private function __loadMusicString($strings)
	{
		$music  = substr(trim($strings),0,-4);
		$music = explode('[YB]',$music); //分隔
		$locadata = ''; //本博客媒体数量 
		$compdata = array(); //上传使用了几个
		if(is_array($music))
		{
			foreach($music as $d)
			{
				$rs = explode('|',$d);

				if($rs[0] =='local')
				{
					$compdata[] = $rs[2];
					if($this->_localMusicParse($rs[2],$rs[3])){  $data[] = array('type'=>'local','img'=>$rs[1],'pid'=>$rs[2],'desc'=>$rs[3]); } //验证成功或修改成功
				}else{
					$data[] = array('type'=>$rs[0],'img'=>$rs[1],'pid'=>$rs[2],'desc'=>$rs[3],'url'=>$rs[4]);	
				}	
			}
			
			//检查上传媒体的使用情况
			$result = spClass('db_attach')->findAll(array('bid'=>$_SESSION['tempid'],'uid'=>$_SESSION['tempuid']),'','id,bid,mime'); //锁定用户文件,防止提交非自己的id以至于被删除
			if(is_array($result))
			{
				foreach($result as $d) //整理本地文件
				{
					if($d['mime'] == 'mp3' || $d['mime'] == 'wma' || $d['mime'] == 'mid' ) //判断只有媒体文件才被处理
					{
						$locadata[] = $d['id'];
					}
				}
				//计算差集,删除编辑器未使用媒体
				$compute = array_diff($locadata,$compdata); 
				if(is_array($compute)) 
				{
					foreach($compute as $d){ spClass('db_attach')->delBy($d,$_SESSION['tempuid']); }
				}
			}

		}
		$data = $this->assoc_unique($data,'pid'); //数组去重
		return $data;
	}
	

	

	
	
	/*数组去重*/
	private function assoc_unique($arr, $key) {   
     $tmp_arr = array();   
     foreach($arr as $k => $v) {   
         if(in_array($v[$key], $tmp_arr)) {   
             unset($arr[$k]);   
         } else {   
             $tmp_arr[] = $v[$key];   
         }   
     }   
     sort($arr); 
     return $arr;   

 } 
 


	/*删除文件夹所有内容*/
	private function _deldir($dir) {
	  if($dir==''){return false;}
	  $dh=opendir($dir);
	  while ($file=readdir($dh)) {
		if($file!="." && $file!="..") {
		  $fullpath=APP_PATH.'/'.$dir."/".$file;
		  @unlink($fullpath); 
		}
	  }
	
	  closedir($dh);
	  if(rmdir(APP_PATH.'/'.$dir)) {
		return true;
	  } else {
		return false;
	  }
	  exit;
	}


}
?>