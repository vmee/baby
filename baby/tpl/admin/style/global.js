
$(document).ready(function(){
	queryVersion();
	$('input[type=submit]').addClass('submit');
	$('input[type=text]').addClass('textipt');
	$(".table tr:odd").addClass('tableven');	
	$(".table2 tr:even").addClass('tableven');	
	$(".table2 tr").hover(function(){
	  	  $(this).addClass('hover')
	  },function(){
		  $(this).removeClass('hover')
	});
	
});


function queryVersion()
{
	$('#checkVersion').html('正在检查更新...');
	var ver = $('#encodeversion').html();
	$.getJSON('http://www.ditieker.com/version.php?ver='+ver+'&callback=?',function(rs){
				if(rs.state ==99){$('#checkVersion').html('暂时无法检查,或检查出错'); return false;}
				if(rs.state ==98){$('#checkVersion').html('您使用的已是最新版本'); return false;}
				if(rs.state ==3) { alert('可用更新有漏洞补丁，请尽快升级，否则系统不再安全。') }
			   $('#checkVersion').html('<a href="http://www.thinksaas.cn/index.php/group/group/groupid-129" target="_blank">更新可用：'+rs.version +' '+rs.type +' ' + rs.info+'</a>');    			
	})
}

function showprccmsg(type)
{
	if(type == 'ok') { $.dialog.tips('成功执行操作');}
	if(type == 'err') { $.dialog.tips('执行操作失败');}
}
	

/*禁止访问*/
function nologin(id)
{
	$.post(urlpath+'/index.php?c=admin&a=user&lockuser='+id,function(){ window.location.reload(); })
}

/*重设密码*/
function resetpwd(uid,name)
{
	$.dialog.prompt('请给'+name+'输入新密码', function (val) {
		 if(val != ''){ $.post(urlpath+'/index.php?c=admin&a=user&resetpwd='+uid+'&pwd='+val,function(rs){ alert(rs)})  }
	});
}
/*删除系统标签*/
function delsystag(cid)
{
	$.dialog.confirm('你确定要删除这个系统标签？', function () {
		 $.post(urlpath+'/index.php?c=admin&a=tag&sysdel='+cid,function(rs){$('#systag_'+cid).hide('fast');})
	});
}
/*删除用户标签*/
function delusertag(tid)
{
	$.dialog.confirm('你确定要删除这个用户标签？', function () {
		 $.post(urlpath+'/index.php?c=admin&a=tag&userdel='+tid,function(rs){$('#usertag_'+tid).hide('fast');})
	});
}

/*优化表*/
function tableOp(tab)
{
	 $.post(urlpath+'/index.php?c=admin&a=database&dbac=op&tabl='+tab,function(rs){window.location.reload();})
}

/*修复*/
function tableRep(tab,msg)
{
	alert('表故障原因'+msg);
	 $.post(urlpath+'/index.php?c=admin&a=database&dbac=rep&tabl='+tab,function(rs){window.location.reload();})
}

function unInstallTheme(id)
{
	$.dialog.confirm('你确定要卸载这个主题吗？', function () {
		window.location.href=urlpath+'/index.php?c=admin&a=theme&m=uninstall&id='+id;
	});
}

function outputTab(tab)
{
	window.location.href=urlpath+'/index.php?c=admin&a=database&outab='+tab;
}

function databseOut(url)
{
	$('#download').html('执行中...').attr('disabled',true);
	window.location.href=url;
}
/*删除杂志*/
function del_magazine(boid)
{
	$.dialog({content:'确认删除这个杂志？',lock:true,yesFn:function(){
		//window.location.href=url;
		$.post(urlpath+'/index.php?c=admin&a=delmagazine&boid='+boid,function(result){
			if(result == 'ok')
			{
				tipok('已删除');
				$('#mag_'+boid).hide('slow');
			}else{
				tiper(result);
			}
		});
	},noFn:true});
}
function edit_magazine(boid)
{
	art.dialog.open(urlpath+'/index.php?c=admin&a=edit_magazine_page&boid='+boid, {title: '提示',yesFn: function () {
    	var iframe = this.iframe.contentWindow;
    	if (!iframe.document.body) {
        	alert('iframe还没加载完毕呢')
        	return false;
        };
		
    	var form = iframe.document.getElementById('edit-board-form'),
			magname = iframe.document.getElementById('MagName');
        if (check(magname)){
			form.submit();
			art.dialog.tips('成功修改！');
			art.dialog.open.api.close();
		}
		return false;
		},
		noFn: true},false);
	var check = function (input) {
		if(input.value.length<2){
			alert('杂志名称长度至少4个字符！')
			return false;
		} else {
			return true;
		};
	};
}
function sendallpm(){
	art.dialog.open(urlpath+'/index.php?c=admin&a=allpm_page');
}
function doPmAllSubmit(url)
{
	var i = $('#info').val();
	if(i == ''){tiper('请填写内容');return false;}
	$('#submit_button').hide();
	$('#submit_tip').show();
	$.post(url,{info:i},function(rs){
		if(rs == 1){
			art.dialog({ content: '发送成功了',time:2,	closeFn:
			 function(){
					art.dialog.open.api.close();
				 }
			});
		}else{
			art.dialog.open.api.close();
			$('#submit_button').show();
			$('#submit_tip').hide();
		}
	})
}
(function($) {
        $.fn.disable = function() {
            return $(this).find("*").each(function() {
                $(this).attr("disabled", "disabled");
            });
        }
        $.fn.enable = function() {
        return $(this).find("*").each(function() {
         $(this).removeAttr("disabled");
            });
        }
    })(jQuery);
	
$(document).ready(function(){


	   var editPlugin={
	   addImage:{c:'testClassName',t:'插入网上图片 (Ctrl+3)',s:'ctrl+3',h:1,e:function(){
			var _this=this;
		var jTest=$('<div>请把网络图片地址粘贴到下面的输入框</div><div><input id="xheTestInput" style="width:260px;height:20px;" /></div><div style="text-align:right;"><input type="button" id="xheSave" value="确定" /></div>');
			var jTestInput=$('#xheTestInput',jTest),jSave=$('#xheSave',jTest);
			jSave.click(function(){
				_this.loadBookmark();
				var imgs = jTestInput.val();
				var imghttp = imgs.substring(0,7);
				var imgar =  imgs.substr(imgs.length-3,imgs.length);

				if(imghttp == 'http://' && imgs !='')
				{
					_this.pasteHTML('<img src='+jTestInput.val()+' alt="" class="feedimg" />');
				}
				_this.hidePanel();
				return false;	
			});
			_this.showDialog(jTest);
		}}
		}

	   textbody =  $('#textarea').xheditor({plugins:editPlugin,loadCSS:urlpath+'/tpl/image/css/editor.css',urlBase:urlpath+'/',internalStyle:false});
	   
	 
	   
	   	var jUpload=$('#upload_img input');
		jUpload.mousedown(function(){textbody.saveBookmark();}).change(function(){
			var $this=$(this),sExt=$this.attr('ext'),$prev=$this.prev();
			if($this.val().match(new RegExp('\.('+sExt.replace(/,/g,'|')+')$','i'))){
				$('#uploading').show();
				var upload=new textbody.html4Upload(this,urlpath+'/index.php?c=add&a=uploadimg',function(sText){
					$('#uploading').hide();
					var data=Object,bOK=false;
				
					try{data=eval('('+sText+')');}catch(ex){alert(sText)};
					if(!data.err){
						textbody.loadBookmark();
						var urls = data.msg.url.split('||');
						if(urls.length ==2)
						{
							if($('#blog-types').val() == 1){$('#blog-attach').val(urls[0]);}
							textbody.pasteHTML('<a href="'+urls[1]+'"><img src="'+urls[0]+'" class="feedimg" /></a>');
						}else{
							if($('#blog-types').val() == 1){$('#blog-attach').val(data.msg.url);}
							textbody.pasteHTML('<img src="'+data.msg.url+'" class="feedimg" />');
						}
						
					}else{
						alert(data.err);	
					}
				});
				upload.start();
			}
			else alert('请上传'+sExt+'文件');
		});
		
		 	var jUpload=$('#upload_photo input'),$uploading=$('#upload_photo span');
		jUpload.mousedown(function(){textbody.saveBookmark();}).change(function(){
			var $this=$(this),sExt=$this.attr('ext'),$prev=$this.prev();
			if($this.val().match(new RegExp('\.('+sExt.replace(/,/g,'|')+')$','i'))){
				var upload=new textbody.html4Upload(this,urlpath+'/index.php?c=user&a=upavatar',function(sText){

					var data=Object,bOK=false;
				
					try{data=eval('('+sText+')');}catch(ex){alert(sText)};
					if(!data.err){
						textbody.loadBookmark();
					$uploading.html('已完成');
						tipok('头像上传完成');
						setTimeout(function(){window.location.reload()},2000);
					
					
					}else{
						alert(data.err);	
					}
				});
				upload.start();
				$uploading.show();
				$uploading.html('loading...');
			}
			else alert('请上传'+sExt+'文件');
		});
		
		

});
/*短暂提示 ok 和err*/
function tipok(txt){$.dialog({icon: 'face-smile',id:'tips', content: txt,time:2,fixed:true});}
function tiper(txt){$.dialog({icon: 'face-sad',id:'tips', content: txt,time:2,fixed:true}).shake();}