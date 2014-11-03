var xmlHttp
var isCanDiagg
var ajaxsoftid
var ajaxet
var ajaxfile
function stateChanged() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        isCanDiagg = xmlHttp.responseText
        if (isCanDiagg == "false") {
            alert("你已经投票过啦，请不要再点啦！");
        }
        else {
            var html_doc = document.getElementsByTagName('head')[0];
            var js = document.createElement('script');
            js.setAttribute('type', 'text/javascript');
            js.setAttribute('src', ajaxfile);
            js.onreadystatechange = function() {
                if (js.readyState == 'loaded' || js.readyState == 'complete') {
                    sEvalRes(ajaxsoftid, ajaxet);
                }
            }
            js.onload = function() {
            sEvalRes(ajaxsoftid, ajaxet);
            }
            html_doc.appendChild(js);
        }
    }
}
function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    }
    catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}
function $Obj(o){
	return document.getElementById(o);
}
var etag=new Array();
function sEval(softid,et){
        xmlHttp = GetXmlHttpObject()
        if (xmlHttp == null) {
            return
        }
        var file = './index.php?c=main&a=digg&id=' + softid + '&et=' + et;
        xmlHttp.onreadystatechange = stateChanged
        xmlHttp.open("GET", file, true)
        xmlHttp.send(null)
        ajaxsoftid = softid
        ajaxet = et
        ajaxfile = file
}
function sEvalRes(softid,et){
	if(et==1){
		var s=$Obj(softid).innerHTML;
		$Obj(softid).innerHTML=parseInt(s)+1;
	}
	else if(et==2){
		var s=$Obj('s'+softid).innerHTML;
		$Obj('s'+softid).innerHTML=parseInt(s)+1;
	}
	else{
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