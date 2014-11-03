<?php
/////////////////////////////////////////////////////////////////
//地铁客开源轻博客, Copyright (C)   2010 - 2011  www.ditieker.com 
//EMAIL:ditieker@163.com QQ:530548182                              
//$Id: admin.php 34 2011-10-28 16:56:54Z anythink $ 


class admin extends top
{
	
	 function __construct(){  
         parent::__construct(); 
		 $this->get = $this->spArgs();
		if($_SESSION['admin'] != 1){prient_jump(spUrl('main'));}
     }  
	 
	 
	function index(){
		$os = explode(" ", php_uname());
		$this->hzmsoft = $GLOBALS['YB'];
		$this->server = $_SERVER;
		$this->os = php_uname();
		$this->postupload = ini_get('post_max_size');
		$this->maxupload = ini_get('upload_max_filesize');
		$this->version = phpversion();
		$this->mysql = spClass('db_blog')->showVersion();
		$this->hzmsoftencode = base64_encode($GLOBALS['YB']['version']);
		
		
		if(!function_exists("gd_info")){$this->gd = '不支持,无法处理图像';}
		if(function_exists(gd_info)) {  $gd = @gd_info();  $this->gd = $gd["GD Version"];  $gd ? '&nbsp; 版本：'.$gd : '';}
		$this->curr_index = ' id="current"';
		$this->display('admin/index.html');
	}
	
	
	function system()
	{
		$this->tab=0;
		if($this->spArgs('BaseSetting')){
			$this->tab=0;
		}else if($this->spArgs('WebInfo')){
			$this->tab=1;
		}else if($this->spArgs('SEO')){
			$this->tab=2;
		}else if($this->spArgs('Bind')){
			$this->tab=3;
		}
		
		if($this->spArgs('submit'))
		{
			spClass('db_setting')->saveConfig($this->spArgs('val'));
			$this->jump(spUrl('admin','system',array('ac'=>'ok')));
		}
		
		if($this->spArgs('testSendMail'))
		{
			spClass('db_notice')->sendMailTest(); exit('<hr/>请确保您打开了邮件发送开关，测试邮件才会发送。开启邮件DEBUG模式会看到详细的发送过程。如果发送成功请关闭。');
		}
		$this->conf = spClass('db_setting')->getConfig();
		$this->curr_system = ' id="current"';
		$this->display('admin/system.html');
	}
	
	function site()
	{
		$this->curr_site = ' id="current"';
		$this->display('admin/site.html');
	}
	/*上传头像*/
	function upavatar()
	{
		$upfile = spClass('uploadFile');
		$upfile->set_filetypes('jpg|png|jpge|bmp|gif');
		$upfile->set_path(APP_PATH.'/avatar');
		$upfile->set_imgresize(false);
		$upfile->set_imgmask(false);
		$upfile->set_dirtype(5); //设置为上传头像
		$upfile->set_diydir($_SESSION['uid']);  //用户id
		
		$files = $upfile->fileupload();	
		echo $files;
	}
	
	function blog(){
		$this->tab=0;
		if($this->spArgs('MagazineList')){
			$this->tab=1;
			$this->Magazines = spClass('db_board')->spLinker()->spPager($this->spArgs('page',1),20)->findAll($where,'boid desc');
			$this->pager = spClass('db_blog')->spPager()->pagerHtml('admin','blog',array('MagazineList'=>true));
		}else if($this->spArgs('SystemTags')){
			$this->tab=2;
			if($this->spArgs('syscate'))
			{
				spClass('db_category')->saveCate($this->spArgs());
				$this->jump(spUrl('admin','tag',array('ac'=>'ok')));
			}
			if($this->spArgs('sysadd'))
			{
				spClass('db_category')->create(array('sort'=>$this->spArgs('sort'),'catename'=>$this->spArgs('cname')));
				$this->jump(spUrl('admin','tag',array('ac'=>'ok')));
			}
			if($this->spArgs('usercate'))
			{
				spClass('db_tags')->saveCate( $this->spArgs() );
				$this->jump(spUrl('admin','tag',array('ac'=>'ok')));
			}
			if($this->spArgs('sysdel'))	{spClass('db_category')->deleteByPk( $this->spArgs('sysdel') );}
			if($this->spArgs('userdel')) {spClass('db_tags')->deleteByPk( $this->spArgs('userdel') );}
			
			$this->systag = spClass('db_category')->spPager($this->spArgs('page',1),10)->findAll($where,'sort  asc'); //系统tag
			$this->systagpager = spClass('db_category')->spPager()->pagerHtml('admin','tag');
		}else if($this->spArgs('UserTags')){
			$this->tab=3;
			if($this->spArgs('syscate'))
			{
				spClass('db_category')->saveCate($this->spArgs());
				$this->jump(spUrl('admin','tag',array('ac'=>'ok')));
			}
			if($this->spArgs('sysadd'))
			{
				spClass('db_category')->create(array('sort'=>$this->spArgs('sort'),'catename'=>$this->spArgs('cname')));
				$this->jump(spUrl('admin','tag',array('ac'=>'ok')));
			}
			if($this->spArgs('usercate'))
			{
				spClass('db_tags')->saveCate( $this->spArgs() );
				$this->jump(spUrl('admin','tag',array('ac'=>'ok')));
			}
			if($this->spArgs('sysdel'))	{spClass('db_category')->deleteByPk( $this->spArgs('sysdel') );}
			if($this->spArgs('userdel')) {spClass('db_tags')->deleteByPk( $this->spArgs('userdel') );}
			
			$this->systag = spClass('db_category')->spPager($this->spArgs('page',1),10)->findAll($where,'sort  asc'); //系统tag
			$this->systagpager = spClass('db_category')->spPager()->pagerHtml('admin','tag');
			$this->usrtag = spClass('db_tags')->spLinker()->spPager($this->spArgs('page',1),20)->findAll($where,'tid  asc'); //系统tag
			$this->usrtagpage = spClass('db_tags')->spPager()->pagerHtml('admin','tag',array('showuser'=>'yes'));
		}else{
			$this->tab=0;
			if($this->spArgs('submit'))
			{
				$title = $this->spArgs('title');
				$niname = $this->spArgs('niname');
				$where = "title like '%$title%'";
				if($niname){$where .= " and uid = '$niname'";}
			}else{
				$where = "`open` != '-1'";
			}
			$this->blog = spClass('db_blog')->spLinker()->spPager($this->spArgs('page',1),20)->findAll($where,'bid desc');
			$this->pager = spClass('db_blog')->spPager()->pagerHtml('admin','blog',array('title'=>$title,'niname'=>$niname ,'submit'=>$this->spArgs('submit') ));
		}
		$this->curr_blog = ' id="current"';
		$this->display('admin/blog.html');
	}
	
	function user()
	{
		if($this->spArgs('mod') == 'info')	
		{
			$this->info = spClass('db_member')->find(array('uid'=>$this->spArgs('uid')));
			$this->display('admin/user_info.html');exit;
		}
	
		if($this->spArgs('lockuser')){ spClass('db_blog')->lockUser($this->spArgs('lockuser')); }
		if($this->spArgs('resetpwd')){ if(spClass('db_blog')->resetPwd($this->spArgs('resetpwd'),$this->spArgs('pwd'))){exit('ok');} }
		if($this->spArgs('where')) {
			$name = $this->spArgs('where');
			$where = " uid = '$name' or email = '$name' or domain = '$name'";
		}else{
			$where = '';
		}
		
		$this->user = spClass('db_member')->spLinker()->spPager($this->spArgs('page',1),20)->findAll($where,'uid desc');
		$this->pager = spClass('db_member')->spPager()->pagerHtml('admin','user' );
		$this->countuser = spClass('db_member')->findCount();
		$this->curr_user = ' id="current"';
		$this->display('admin/user.html');
	}
	
	function tag()
	{
		if($this->spArgs('syscate'))
		{
			spClass('db_category')->saveCate($this->spArgs());
			$this->jump(spUrl('admin','tag',array('ac'=>'ok')));
		}
		if($this->spArgs('sysadd'))
		{
			spClass('db_category')->create(array('sort'=>$this->spArgs('sort'),'catename'=>$this->spArgs('cname')));
			$this->jump(spUrl('admin','tag',array('ac'=>'ok')));
		}
		if($this->spArgs('usercate'))
		{
			spClass('db_tags')->saveCate( $this->spArgs() );
			$this->jump(spUrl('admin','tag',array('ac'=>'ok')));
		}
		if($this->spArgs('sysdel'))	{spClass('db_category')->deleteByPk( $this->spArgs('sysdel') );}
		if($this->spArgs('userdel')) {spClass('db_tags')->deleteByPk( $this->spArgs('userdel') );}
		
		$this->systag = spClass('db_category')->spPager($this->spArgs('page',1),10)->findAll($where,'sort  asc'); //系统tag
		$this->systagpager = spClass('db_category')->spPager()->pagerHtml('admin','tag');
		if($this->spArgs('showuser'))
		{
			$this->usrtag = spClass('db_tags')->spLinker()->spPager($this->spArgs('page',1),20)->findAll($where,'tid  asc'); //系统tag
			$this->usrtagpage = spClass('db_tags')->spPager()->pagerHtml('admin','tag',array('showuser'=>'yes'));
		}
		$this->curr_blog = ' id="current"';
		$this->display('admin/tag.html');
	}
	
	function theme()
	{
		if($this->spArgs('m') == 'info')
		{
			if($this->spArgs('submit'))
			{
				spClass('db_skins')->update(array('id'=>$this->spArgs('id')),$this->spArgs());
				$this->success('保存成功',spUrl('admin','theme'));
			}
			$this->skin = spClass('db_skins')->find(array('id'=>$this->spArgs('id')));
			$this->display('admin/theme_info.html');exit;
		}
		
		if($this->spArgs('m') == 'install')
		{
			$name = $this->spArgs('installdir');
			$dir = APP_PATH.'/tpl/theme/'.$name;
			if(!is_dir($dir) || $name ==''){$this->error('请指定正确的主题安装目录!');}
			$result = spClass('db_skins')->find(array('skindir'=>$name));
			if(is_array($result)){
				$this->error('该目录已被安装,重新安装请先卸载');
			}else{
				spClass('db_skins')->create(array('skindir'=>$name));
				$this->error('主题已经安装，请编辑详情');
			}
		}
		if($this->spArgs('m') == 'uninstall')
		{
			spClass('db_skins')->delete(array('id'=>$this->spArgs('id')));
			$this->error('主题已经卸载，您可以删除该主题文件夹');
		}
		
		
		
		
		if($this->spArgs('filter'))
		{
			if($this->spArgs('filter') == 'close'){	$where = array('open'=>0);$page = array('filter'=>'close');	}
			if($this->spArgs('filter') =='open')  {	$where = "exclusive = 0 and open = 1";$page = array('filter'=>'open');}
			if($this->spArgs('filter') =='exclusive'){$where = "exclusive != 0";$page = array('filter'=>'exclusive');}
		}else{
			$where = '';
		}
		
		$this->skins = spClass('db_skins')->spPager($this->spArgs('page',1),3)->findAll($where,'id desc');
		if($page)
		{
			$this->pager = spClass('db_skins')->spPager()->pagerHtml('admin','theme',$page);
		}else{
			$this->pager = spClass('db_skins')->spPager()->pagerHtml('admin','theme');
		}

		$this->curr_theme = ' id="current"';
		$this->display('admin/theme.html');
	}
	
	function database()
	{
		//初始化数据库处理
		$db = spClass('dbbackup', array(0=>$GLOBALS['G_SP']['db']));
		$this->table = $db->showAllTable($this->spArgs('chk'));
		if($this->spArgs('dbac') == 'op') { $db->optimizeTable($this->spArgs('tabl'));exit;  }
		if($this->spArgs('dbac') == 'rep') { $db->repairTable($this->spArgs('tabl'));exit;  }
		if($this->spArgs('outab')) { $db->outTable($this->spArgs('outab'));exit;  }
		if($this->spArgs('ouall')) { $db->outAllData();exit;}
		

		
		$this->curr_database = ' id="current"';
		$this->display('admin/database.html');
	}
	
	function clearcache()
	{
		spClass('m_access_cache')->delete();
		$this->success('已经清除所有缓存');
	}
	public function Warehouse()
	{

		/*TagClouds*/
		$tags = spClass('db_tags')->getHotTag(10);
		if($tags['string'])
		{
			$where = "`open` = 1 and `tag` in ({$tags['string']})";
		}
		$this->hotMax = $tags['rs'][0]['num'];

		$this->htag = $tags['rs'];
		//
		
		/*Below are original*/
		$this->favatag = spClass('db_mytag')->myFavaTag($_SESSION['uid'],5); //显示收藏标签
		$this->CurrentModule = 'index';
		 if(islogin() && $_SESSION['username'] == '')  { header('Location:'.spUrl('user','setting'));  }

		$this->memberinfo();
//		$uid = $_SESSION['uid'];

		$this->blogs = spClass('db_blog')->findAll(array('ispub'=>0),'time desc');
		if($this->blogs){
			$this->snum = count($this->blogs);
		}else{
			$this->snum = 0;
		}


		$this->pager = spClass('db_blog')->spPager()->pagerHtml('main');
		$page = spClass('db_blog')->spPager()->getPager('');

		$this->curr_Warehouse = ' id="current"';

//		if(!islogin())
//		{
//			$this->email = $_COOKIE['unames'];
//			$this->display('login.html');
//		}else{
			if($this->spArgs('ajaxload'))
			{
				if($this->spArgs('page') <= $page['total_page'])
				{
					$this->limits = 4;
					$this->data = $this->blogs; //将内容给模板变量
					$this->display('require_feeds.html');
					exit;
				}
			}else{
				$this->display('admin/Warehouse.html');
			}

//		}
	}
	/*后台删除杂志
	*/
	public function delmagazine()
	{
		$board = spClass("db_board")->findBy('boid',$this->spArgs('boid'));
		if($_SESSION['admin'] == 1)
		{
			spClass("db_board")->deleteByPk($board['boid']); //删除日志 deleteByPK是speedPHP根据主键删除内容的函数
			spClass('db_boardinfo')->delete(array('boid'=>$board['boid']));			
			spClass('db_board_order')->delete(array('boid'=>$board['boid']));
			exit('ok');
		}else{
			exit('删除失败,无权限或不存在该档案');
		}
	}
	/*后台编辑杂志-页面
	*/
	public function edit_magazine_page()
	{
		$this->board = spClass("db_board")->findBy('boid',$this->spArgs('boid'));
		$this->display('admin/edit_magazine.html');
	}
	/*后台编辑杂志-页面
	*/
	public function edit_magazine_do()
	{
		spClass('db_board')->edit_magazine($this->spArgs('boid'),$this->spArgs('MagName'),$this->spArgs('Uid'));
		//spClass('db_board')->edit_magazine("12313132","2");
		echo "<script language='javascript'>history.back(-1)</script> ";
	}
	//发送私信
	function allpm()
	{
		if($this->spArgs('mod') == 'info')	
		{
			$this->info = spClass('db_member')->find(array('uid'=>$this->spArgs('uid')));
			$this->display('admin/user_info.html');exit;
		}
	
		if($this->spArgs('lockuser')){ spClass('db_blog')->lockUser($this->spArgs('lockuser')); }
		if($this->spArgs('resetpwd')){ if(spClass('db_blog')->resetPwd($this->spArgs('resetpwd'),$this->spArgs('pwd'))){exit('ok');} }
		if($this->spArgs('where')) {
			$name = $this->spArgs('where');
			$where = " uid = '$name' or email = '$name' or domain = '$name'";
		}else{
			$where = '';
		}
		
		$this->user = spClass('db_member')->spLinker()->spPager($this->spArgs('page',1),20)->findAll($where,'uid desc');
		$this->pager = spClass('db_member')->spPager()->pagerHtml('admin','user' );
		$this->countuser = spClass('db_member')->findCount();
		$this->curr_allpm = ' id="current"';
		$this->display('admin/allpm.html');
	}
	/*后台向所有用户发送私信-页面
	*/
	public function allpm_page()
	{
		$this->display('admin/send_allpm.html');
	}
	/*后台向所有用户发送私信-执行
	*/
	public function allpmdo()
	{
		$uids = spClass("db_member")->findAll('','','uid');
		if($uids)
		{
			foreach ($uids as $index => $uid) {
				$rs = spClass('db_notice')->noticeAllPm(array('uid'=>$uids[$index]['uid'],'info'=>$this->spArgs('info'),'foruid'=>$_SESSION['uid']));
			}
			echo $rs;
			exit;
		}else{
			exit(-1);
		}
	}
	
}