<?php

/////////////////////////////////////////////////////////////////
//地铁客开源轻博, Copyright (C)   2011 - 2012  www.ditieker.com
//EMAIL:ditieker@163.com QQ:530548182
//$Id: index.php 43 2011-11-06 08:19:05Z anythink $

define("APP_PATH",substr(dirname(__FILE__),0,-8));
define('IN_APP',TRUE);
define("SP_PATH",APP_PATH.'/init');
require(APP_PATH."/config.php"); //载入配置文件
require(SP_PATH."/init.php");
require(SP_PATH."/Extensions/thFunctions.php");

date_default_timezone_set('PRC');
if( substr(PHP_VERSION, 0, 3) == "5.3" ){
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);
}else{
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
}

header("Content-type: text/html; charset=utf-8");
$version = $GLOBALS['DTK']['version'];
$step = $_GET['step'];
if(!is_file(APP_PATH.'/config.php')){ exit( '没有发现配置文件config.php 请自行检查否则无法升级');  }
//定义升级文件及路径
$versiondata = array('1.6to1.8.sql'=>'从《地铁客1.6 beta》升级到《地铁客1.8 beta》');

switch($step)
{
	case 'run':

	$err = run_update();
	$url = substr($_SERVER['SCRIPT_NAME'],0,-18);
	include 'tpl/update2.html';
	break;
	
	default:
	include 'tpl/update.html';
}


function run_update()
{
	$file = $_POST['upfile'];
	if($file == '0')
	{
		return  '请选择升级文件';
	}

	$file = 'tpl/update/'.$file;
	if(!$sql = file_get_contents($file)) {return('无法读取数升级文件:'.$file);}


	$prefix = $GLOBALS['spConfig']['db']['prefix']; //获取数据表前缀
	$sql = str_replace('th_',$prefix,$sql);

	$sqlArr = preg_split("/;[\r\n]/", $sql);
	$del = count($sqlArr)-1;
	unset($sqlArr[$del]);

	$msg = '';
	foreach($sqlArr as $k=>$v)
	{
		$msg .= '更新数据表：'.$v;
		if(spClass('db_member')->runSql($v))
		{
			$msg .= ' 成功<br />';
		}else{
			$msg .= ' 失败<br />';
		}
	}

	$msg .= "<hr/>数据库升级完毕，请删除install目录并更新程序文件。请勿刷新本页，直接进入首页即可完成升级！";

	return $msg;
}


?>