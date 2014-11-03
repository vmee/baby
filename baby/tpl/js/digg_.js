function $Obj(o){
	return document.getElementById(o);
}

var etag=new Array();

function sEval(softid,et){
	if(etag[softid]==true)
	{
		alert('你已经投票过啦，请不要再点啦！');
		return;
	}
	var file='./index.php?c=main&a=digg&id='+softid+'&et='+et;
	var html_doc=document.getElementsByTagName('head')[0];
    var js=document.createElement('script');
    js.setAttribute('type', 'text/javascript');
    js.setAttribute('src', file);
	js.onreadystatechange=function(){
        if(js.readyState=='loaded'||js.readyState=='complete'){
            sEvalRes(softid,et);
        }
    }
    js.onload=function(){
        sEvalRes(softid,et);
    }
	html_doc.appendChild(js);
	etag[softid]=true;
}

function sEvalRes(softid,et){
	if(et==1){
		var s=$Obj(softid).innerHTML;
		$Obj(softid).innerHTML=parseInt(s)+1;
		alert(re[3]);
	}
	else if(et==2){
		var s=$Obj('s'+softid).innerHTML;
		$Obj('s'+softid).innerHTML=parseInt(s)+1;
		alert(re[3]);
	}
	else{
		alert('未知错误');
	}
}

function sUpdate(softid){
	var sUp=parseInt($Obj(softid).innerHTML);
	var sDown=parseInt('s'.$Obj(softid).innerHTML);
	var sTotal=sUp+sDown;
	var spUp=(sUp/sTotal)*100;
	spUp=Math.round(spUp*10)/10;
	var spDown=100-spUp;
	spDown=Math.round(spDown*10)/10;
	$Obj('sp1').innerHTML=spUp+'%';
	$Obj('sp2').innerHTML=spDown+'%';
	$Obj('eimg1').style.width = parseInt((sUp/sTotal)*55)+'px';
	$Obj('eimg2').style.width = parseInt((sDown/sTotal)*55)+'px';
}