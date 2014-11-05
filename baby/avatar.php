<?php
/////////////////////////////////////////////////////////////////
//�Ʊ߿�Դ�Ჩ, Copyright (C)   2010 - 2011  www.ditieker.com //
//Author �ä�����, EMAIL:ditieker@163.com    QQ:530548182          //
/////////////////////////////////////////////////////////////////

error_reporting(0);
define('UC_API', strtolower(($_SERVER['HTTPS'] == 'on' ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/'))));
$uid = isset($_GET['uid']) ? $_GET['uid'] : 0;
$babyid = isset($_GET['babyid']) ? $_GET['babyid'] : false;
$size = isset($_GET['size']) ? $_GET['size'] : '';
$random = isset($_GET['random']) ? $_GET['random'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : '';
$check = isset($_GET['check_file_exists']) ? $_GET['check_file_exists'] : '';

$avatar = 'avatar/'.get_avatar($uid, $size, $type,$babyid);



if(file_exists(dirname(__FILE__).'/'.$avatar)) {
	if($check) {
		echo 1;
		exit;
	}
	$random = !empty($random) ? rand(1000, 9999) : '';
	$avatar_url = empty($random) ? $avatar : $avatar.'?random='.$random;
} else {
	if($check) {
		echo 0;
		exit;
	}
	$size = in_array($size, array('big', 'middle', 'small')) ? $size : 'middle';
	$avatar_url = 'tpl/image/noavatar_'.$size.'.jpg';
}

if(empty($random)) {
	header("HTTP/1.1 301 Moved Permanently");
	header("Last-Modified:".date('r'));
	header("Expires: ".date('r', time() + 86400));
}

header('Location: '.UC_API.'/'.$avatar_url);
exit;

function get_avatar($uid, $size = 'middle', $type = '',$babyid=false) {
	$size = in_array($size, array('big', 'middle', 'small')) ? $size : 'middle';
	$uida = abs(intval($uid));
	$uid = sprintf("%09d", $uid);
	$dir1 = substr($uid, 0, 3);
	$dir2 = substr($uid, 3, 2);
	$dir3 = substr($uid, 5, 2);
	$typeadd = $type == 'real' ? '_real' : '';
	return $dir1.'/'.$dir2.'/'.$dir3.'/'.$typeadd.$size.'_'.substr($uid, -2).($babyid===false ? '' :'_'.$babyid).".jpg";
}

?>