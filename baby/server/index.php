<?php
define("APP_PATH",dirname(__FILE__));
define("SP_PATH",dirname(__FILE__).'/SpeedPHP');
$spConfig = array(

);
require(SP_PATH."/SpeedPHP.php");
require(APP_PATH."/function.php");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
spRun();