<?php
/////////////////////////////////////////////////////////////////
//地铁客开源轻博客, Copyright (C)   2010 - 2011  www.ditieker.com
//EMAIL:ditieker@163.com QQ:530548182
//$Id: main.php 45 2011-11-07 06:33:21Z anythink $


class main extends top
{

	public function feeds(){
		
		$rsstool = spClass('RSS');
		$where = "`ispub` = 1";
		$blogs = spClass('db_blog')->spLinker()->spPager($this->spArgs('page',1),50)->findAll($where,'time desc');
		foreach ($blogs as $index => $blog) {
			$rsstool->AddItem($blogs[$index]["title"],
							  'http://www.ditieker.com/read/'.$blogs[$index]["bid"],
							  $rsstool->feeds($blogs[$index]),
							  Date('Y-m-d H:i:s', $blogs[$index]["time"]));
		}
		$rsstool->Display(); 
	}
	public function index()
	{
		$conf = spClass('db_setting')->getConfig();//$conf.show_login_mode == 0璇存槑鏈櫥褰曚笉鍏佽璁块棶,1鏈櫥褰曞厑璁歌闂�
		if($conf['show_login_mode']==0 && !islogin())
		{
			$this->email = $_COOKIE['unames'];
			$this->display('login.html');
		}else{
			/*TagClouds*/
			$tags = spClass('db_tags')->getHotTag(20);
			$this->hotMax = $tags['rs'][0]['num'];
			$this->htag = $tags['rs'];
			/*Hot Magazines*/
			$this->HotBoards = spClass('db_board')->HotBoards(1,10);
			/*Below are original*/
			$this->favatag = spClass('db_mytag')->myFavaTag($_SESSION['uid'],5);
			$this->CurrentModule = 'index';
			if(islogin() && $_SESSION['username'] == '')  { header('Location:'.spUrl('user','setting'));  }
			$this->memberinfo();
			$this->MyBoards = spClass('db_board')->myBoards($_SESSION['uid']);
			
			$where = "`ispub` = 1";
			$this->blogs = spClass('db_blog')->spLinker()->spPager($this->spArgs('page',1),5)->findAll($where,'time desc');
			
			$this->pager = spClass('db_blog')->spPager()->pagerHtml('main');
			$page = spClass('db_blog')->spPager()->getPager('');
			if($this->spArgs('ajaxload'))
			{
				if($this->spArgs('page') <= $page['total_page'])
				{
					$this->limits = 4;
					$this->data = $this->blogs;
					$this->display('require_feeds.html');
					exit;
				}
			}else{
				$this->display('index.html');
			}
		}
	}
	public function hot()
	{
		$conf = spClass('db_setting')->getConfig();//$conf.show_login_mode == 0
		if($conf['show_login_mode']==0 && !islogin())
		{
			$this->email = $_COOKIE['unames'];
			$this->display('login.html');
		}else{
			/*TagClouds*/
			$tags = spClass('db_tags')->getHotTag(20);
			$this->hotMax = $tags['rs'][0]['num'];
			$this->htag = $tags['rs'];
			/*Hot Magazines*/
			$this->HotBoards = spClass('db_board')->HotBoards(1,10);
			/*Below are original*/
			$this->favatag = spClass('db_mytag')->myFavaTag($_SESSION['uid'],5);
			$this->CurrentModule = 'index';
			if(islogin() && $_SESSION['username'] == '')  { header('Location:'.spUrl('user','setting'));  }
			$this->memberinfo();
			$this->MyBoards = spClass('db_board')->myBoards($_SESSION['uid']);
			//arter
			$where = "`ispub` = 1 and `type` = 3";
			$blogs = spClass('db_blog')->spLinker()->spPager($this->spArgs('page',1),12)->findAll($where,'hitcount desc');
			if($blogs){
				foreach ($blogs as $index => $blog) {
					$body = split_attribute($blogs[$index]["body"]);
					$imgs = $body["attr"]["img"];
					$imgso = $imgs[0];
					$tmpResultBlogs[] = array(
										"blog_id" => $blogs[$index]["bid"], 
										"desc" => $blogs[$index]["desc"],
										"title" => $blogs[$index]["title"],
										"name" => $blogs[$index]["user"]["username"],
									    "domain" => $blogs[$index]["user"]["domain"],
										"ctime" => api_dtktime($blogs[$index]["time"]),
										"content" =>strip_tags(mb_substr($body["content"], 0, 700, "utf-8")), //140*5=700,澶х害鏄剧ず140瀛楃殑content棰勮
										//"blogs" => $blogs[$index],
										"hitcount" => $blogs[$index]["hitcount"],
										"commentcount" => $blogs[$index]["replaycount"],
										"likecount" => $blogs[$index]["feedcount"],
										"avatar" => get_avatar2($blogs[$index]["user"]["uid"]),
										"type" => $blogs[$index]["type"],
										"img_url" => getBigImg($imgso["url"]),
										"good" => $blogs[$index]["good_num"],
										"bad" => $blogs[$index]["bad_num"]
					
					);
				}
				$this->data = $tmpResultBlogs;
			}else{
				$this->data = null;
			}
			$this->pager = spClass('db_blog')->spPager()->pagerHtml('main');
			$page = spClass('db_blog')->spPager()->getPager('');
			if($this->spArgs('ajaxload'))
			{
				if($this->spArgs('page') <= $page['total_page'])
				{
					$this->limits = 4;
					$this->data = $this->blogs; //灏嗗唴瀹圭粰妯℃澘鍙橀噺
					$this->display('require_feeds.html');
					exit;
				}
			}else{
				$this->display('index.html');
			}
		}
	}
	public function recommend()
	{
		$this->memberinfo();
		$tags = spClass('db_tags')->getHotTag(30);
		if($tags['string'])
		{
			$where = "`open` = 1 and `tag` in ({$tags['string']})";
		}

		$blogs = spClass('db_blog')->spLinker()->findAll($where,'bid desc','',30);


		$this->feeds = feddshtml($blogs,0,'recommend');
		$this->hotMax = $tags['rs'][0]['num'];

		$this->htag = $tags['rs'];



		$this->title = '鎺ㄨ崘棰戦亾';
		$this->CurrentModule = 'recommend';
		$this->display('recommend.html');

	}
	public function discovery()
	{
		$this->memberinfo();
		 $this->cate = spClass('db_category')->findCate();


		if($this->spArgs('catename'))
		{
			$_SESSION['discover_catename'] = $this->spArgs('catename');
			$cname = spClass('db_member')->escape('%'.urldecode($this->spArgs('catename')).'%');
			if($this->spArgs('local'))
			{
				$local = spClass('db_member')->escape('%'.urldecode($this->spArgs('local')).'%');
				$_SESSION['discover_local'] = TRUE;
				$where = "`local` like $cname ";
			}else{
				unset($_SESSION['discover_local']);
			}
			$this->currcid = $this->spArgs('cid');

		}

		if($_SESSION['discover_catename'])
		{
			$blogtag = explode(',',urldecode($_SESSION['discover_catename']));
			$pre = '';
				foreach($blogtag as $d)
				{
					$pre .= '`blogtag` like \'%'.$d.'%\' or ';
				}
				$pre = substr($pre,0,-4);
				$where = "$pre and `blogtag` != ''";
		}

		if($_SESSION['discover_local'])
		{
			$cname = spClass('db_member')->escape('%'.urldecode($_SESSION['discover_catename']).'%');
			$where = "`local` like $cname ";
		}

		if($this->spArgs('cateall'))
		{
			unset($_SESSION['discover_catename']);
			header("Location:".spUrl('main','discovery'));
		}


		$this->userinfo = spClass('db_member')->spPager($this->spArgs('page',1),16)->findAll($where,'flow desc,num desc');
		$count  = spClass('db_member')->findCount($where);
		$page = spClass('db_member')->spPager()->getPager();



		$this->CurrentModule = 'discover';
		if($this->spArgs('catename'))
		{
			$this->titlepre = urldecode($this->spArgs('catename')).' - 鍙戠幇';
		}else{
			$this->titlepre = '鍙戠幇';
		}
		if($this->spArgs('ajaxload'))
		{
			if($this->spArgs('page') <= $page['total_page'])
			{
				$this->data = $this->userinfo;
				$this->display('require_discovery_user.html');
			}
		}else{
			$this->display('discovery.html');
		}
	}


	public function now()
	{

		/*TagClouds*/
		$tags = spClass('db_tags')->getHotTag(10);
		$this->hotMax = $tags['rs'][0]['num'];

		/*Hot Magazines*/
		$this->HotBoards = spClass('db_board')->HotBoards(1,10);
		
		$this->htag = $tags['rs'];
		$this->MyBoards = spClass('db_board')->myBoards($_SESSION['uid']);
		$this->memberinfo();
		$this->favatag = spClass('db_mytag')->myFavaTag($_SESSION['uid'],5);
		$where = "`ispub` = 1";
		$this->blogs = spClass('db_blog')->spLinker()->spPager($this->spArgs('page',1),5)->findAll($where,'time desc');
		$page = spClass('db_blog')->spPager()->getPager('');

		$this->title = '此刻最新';
		$this->CurrentModule = 'now';
		if($this->spArgs('ajaxload'))
		{
			if($this->spArgs('page') <= $page['total_page'])
			{
				$this->limits = 4;
				$this->data = $this->blogs;
				$this->display('require_feeds.html');
			}
		}else{
			$this->display('now.html');
		}
	}
	public function login()
	{

		if($this->spArgs('email'))
		{

			$userobj = spClass('db_member');

			if($this->dtk['loginCodeSwitch'] != 'close')
			{
				$userobj->verifier = $userobj->verifier_login;
			}else{
				$userobj->verifier = $userobj->verifier_openConnect_Login;
			}

			if( false == $userobj->spVerifier($this->spArgs()) ){
				$userobj->userLogin($this->spArgs());


				if($this->spArgs('callback'))
				{
					$this->jslocation(base64_decode($this->spArgs('callback')));
				}else{
					$this->jslocation(spUrl('main','index'));
				}

			}else{
				$err = $userobj->spVerifier($this->spArgs());
				foreach($err as $d){$errs[] = $d;}
				$this->errmsg = $errs[0][0];

			}
		}
		$this->callback = $this->spArgs('callback');
		$this->time = time();
		$this->email = $_COOKIE['unames'];
		$this->display('login.html');
	}

	public function logout()
	{
		$_SESSION = array();
		session_destroy();
		if($this->spArgs('callback'))
		{
			$this->jslocation(base64_decode($this->spArgs('callback')));
		}else{
			$this->jslocation(spUrl('main','index'));
		}
	}

	public function reg()
	{
		$this->time = time();
		if($this->spArgs('doing'))
		{
			$userobj = spClass('db_member');

			if($this->dtk['regCodeSwitch'] != 'close')
			{
				$userobj->verifier = $userobj->verifier_reg;
			}else{
				$userobj->verifier = $userobj->verifier_openConnect_Reg;
			}

			if( false == $userobj->spVerifier($this->spArgs()) ){
				$userobj->userReg($this->spArgs());
				if($this->spArgs('callback'))
				{
					$this->jslocation(base64_decode($this->spArgs('callback')));
				}else{
					$this->jslocation(spUrl('main','index'));
				}
			}else{
				$err = $userobj->spVerifier($this->spArgs());
				foreach($err as $d){$errs[] = $d;}
				$this->errmsg = $errs[0][0];
			}
		}
		$this->callback = $this->spArgs('callback');
		$this->display('register.html');
	}

	public function vcode()
	{
		spClass('spVerifyCode')->display();
	}
	
	/**/
	public function collect()
	{
		$this->bid = ($this->spArgs('bid'));
		$this->d = spClass('db_blog')->spLinker()->find(array('bid'=>$this->spArgs('bid')));
		$this->myBoards = spClass('db_board')->myBoards($_SESSION['uid']); //鏄剧ず鏀惰棌鏍囩
		$this->display('collect.html');
	}
	
	public function addcollect()
	{
		$rs = spClass('db_blog')->blogrep($this->spArgs('bid'),$this->spArgs('title'));
		if($rs == -2){
			$this->error('不能转载自己的内容');
		}else if($rs == -1){
			$this->error('转载的内容不存在');
		}else{
			spClass('db_boardinfo')->addcollect($this->spArgs('boid'),$rs,$_SESSION['uid'],$this->spArgs('title'));
			$this->error('内容已经成功转载');
		}
	}
	public function magazine()
	{
		/*TagClouds*/
		$tags = spClass('db_tags')->getHotTag(10);
		$num_txt=0;
		$num_music=0;
		$num_pic=0;
		$num_vedio=0;
		if($tags['string'])
		{
			$where = "`open` = 1 and `tag` in ({$tags['string']})";
		}
		$this->hotMax = $tags['rs'][0]['num'];

		$this->htag = $tags['rs'];
		/*Hot Magazines*/
		$this->HotBoards = spClass('db_board')->HotBoards(1,10);
		$boid = $this->spArgs('boid');
		$MyBoards = spClass('db_board')->myBoards($_SESSION['uid']);
		$boardinfos = spClass('db_boardinfo')->findAll(array('boid'=>$boid),'time desc');
		if($boardinfos){
			foreach ($boardinfos as $index => $boardinfo) {
				$mm= spClass('db_blog')->spLinker()->find(array('','bid'=>$boardinfos[$index]["bid"]));
				if($mm["type"]=="1"){
					$num_txt+=1;
				}elseif ($mm["type"]=="2"){
					$num_music+=1;
				}elseif ($mm["type"]=="3"){
					$num_pic+=1;
				}elseif ($mm["type"]=="4"){
					$num_vedio+=1;
				}elseif ($mm["type"]=="6"){
					$num_state+=1;
				}
				$tmpResultBlogs[] = array(
									"blog" => $mm, 
									"boardinfo" => $boardinfos[$index]);
				$this->num_state = $num_state;
				$this->num_txt = $num_txt;
				$this->num_music = $num_music;
				$this->num_pic = $num_pic;
				$this->num_vedio = $num_vedio;
			}
		}
		$this->boid = $boardinfo;
		$this->feeds=$tmpResultBlogs;
		$this->MyBoards = $MyBoards;
		$this->thisboard = spClass('db_board')->find(array('boid'=>$boid));
		$this->CurrentModule = $boid;
		$this->display('magazine_index.html');

	}
	public function newmag()
	{
		$this->display('new_magazine.html');
	}
	public function newmag_do()
	{
		spClass('db_board')->newmag($this->spArgs('MagName'));
		echo "<script language='javascript'>history.back(-1)</script> ";
	}
	public function digg(){
			$id =$this->spArgs('id');
			$et =$this->spArgs('et');
			if($_COOKIE['digg'.$id.'m'.'digg']=='' || empty($_COOKIE['digg'.$id.'m'.'digg']) ){
				setcookie("digg".$id.'m'.'digg', $id.'m'.'digg', time()+3600);
			if($et==1){
				spClass('db_blog')->incrField(array('bid'=>$id),'good_num');
			}else{
				spClass('db_blog')->incrField(array('bid'=>$id),'bad_num');
			}
		}else{
				echo "false";
		}
	}
	public function waterfall(){
	$where = "`ispub` = 1 and `type` = 3";
			$blogs = spClass('db_blog')->spLinker()->spPager($this->spArgs('page',1),20)->findAll($where,'time desc');
			if($blogs){
				foreach ($blogs as $index => $blog) {
					$body = split_attribute($blogs[$index]["body"]);
					$imgs = $body["attr"]["img"];
					$imgso = $imgs[0];
					$tmpResultBlogs[] = array(
										"blog_id" => $blogs[$index]["bid"], 
										"desc" => $blogs[$index]["desc"],
										"title" => $blogs[$index]["title"],
										"name" => $blogs[$index]["user"]["username"],
									    "domain" => $blogs[$index]["user"]["domain"],
										"ctime" => api_dtktime($blogs[$index]["time"]),
										"content" =>strip_tags(mb_substr($body["content"], 0, 700, "utf-8")), //140*5=700,澶х害鏄剧ず140瀛楃殑content棰勮
										"hitcount" => $blogs[$index]["hitcount"],
										"commentcount" => $blogs[$index]["replaycount"],
										"likecount" => $blogs[$index]["feedcount"],
										"avatar" => get_avatar2($blogs[$index]["user"]["uid"]),
										"type" => $blogs[$index]["type"],
										"img_url" => getBigImg($imgso["url"]),
										"good" => $blogs[$index]["good_num"],
										"bad" => $blogs[$index]["bad_num"]
					
					);
				}
				$this->data = $tmpResultBlogs;
			}else{
				$this->data = null;
			}
		$this->MyBoards = spClass('db_board')->myBoards($_SESSION['uid']);
		$this->CurrentModule = 'waterfall';
		$this->page=$this->spArgs('page',1);
		$this->data = $tmpResultBlogs;
		$this->display('waterfall.html');
	}
	function getBigImg($img)
	{
		$imgs = str_replace('t_','',$img);
		return $imgs;
	}
}
?>