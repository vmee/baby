<?php  
include_once "httpsqs_client.php";
require("../init/spFunctions.php");
$httpsqs = new httpsqs("0.0.0.0", 1218, "ditieker", "utf-8");
while(true) {  
  $result = $httpsqs->gets("insertDB");  
  $pos = $result["pos"]; //当前队列消息的读取位置点  
  $data = $result["data"]; //当前队列消息的内容
  if ($data != "HTTPSQS_GET_END" && $data != "HTTPSQS_ERROR") {
	$tmpjson = json_decode($data,true);
	$new_bid = $tmpjson["new_bid"];
  	$uids = $tmpjson["uids"];
  	$len=count($uids);
    for($i=0;$i<$len;$i++){	
    	$this_uid = $uids[$i]["uid"];
		$bids = spClass('db_member_sends')->spLinker()->find(array('uid'=>$this_uid),'','sends');
    	if($bids==null || $bids==""){
			spClass('db_member_sends')->create(array('uid' =>$this_uid,'sends' =>$new_bid,'count'=>1));
		}else{
			$tmp = implode(',',$bids);
			$tmp = $new_bid.",".$tmp;
			$result=substr($tmp,0,strlen($tmp)-1);		
			spClass('db_member_sends')->update(array('uid'=>$this_uid),array('sends'=>$result,'count'=>2));
		}
    }
  } else {  
    sleep(1); //暂停1秒钟后，再次循环  
  }
}  
?>  