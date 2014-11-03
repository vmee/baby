(function($){
	// tipWrap: 	提示消息的容器
	// maxNumber: 	最大输入字符
	$.fn.artTxtCount = function(tipWrap, maxNumber){
		var countClass = 'js_txtCount',		// 定义内部容器的CSS类名
			fullClass = 'js_txtFull',		// 定义超出字符的CSS类名
			disabledClass = 'disabled';		// 定义不可用提交按钮CSS类名

		// 统计字数
		var count = function(){
			var btn = $(this).parent().find('.btn'),
				val = $(this).val().length,
				// 是否禁用提交按钮
				disabled = {
					on: function(){
						btn.removeAttr('disabled').removeClass(disabledClass);
					},
					off: function(){
						btn.attr('disabled', 'disabled').addClass(disabledClass);
					}
				};

			if (val == 0) disabled.off();
			if(val <= maxNumber){
				if (val > 0) disabled.on();
				tipWrap.html('\u8FD8\u80FD\u8F93\u5165 ' + (maxNumber - val) + ' \u4E2A\u5B57');
			}else{
				disabled.off();
				tipWrap.html('\u5DF2\u7ECF\u8D85\u51FA ' + (val - maxNumber) + ' \u4E2A\u5B57');
			};

		};
		$(this).bind('keyup change', count);
		return this;
	};
})(jQuery);



$(document).ready(function(){
$('#menuSideBtn').click(function(){
	$('#menuSide').toggle();
	$(this).toggleClass('curr');
})
		if($('img').attr('alt') == ''){$('img').attr('alt',' ');}
		$('aside nav#menu li').hover(function(){ $(this).addClass('hover'); },function(){  $(this).removeClass('hover'); });

		$('#search .ipt').click(function(){   if($(this).val() == '搜索标签,发现兴趣') {$(this).val('')}  }).blur(function(){ if($(this).val() == '') {$(this).val('搜索标签,发现兴趣')} });
		$('#ats').html('@'); //关于我们插入@符号
});

var  globalcount;	 //feedtolbar state
function feedToolBar(id)
{
	$(document).ready(function(){
		 $(window).bind("scroll", function(event){
		   var fold = $(window).height() + $(window).scrollTop();

		   if( fold >= $('#'+id).offset().top-20){
			p = parseInt($('#'+id).attr('page'));
			nextpage = p+1;
			url =$('#'+id).attr('query');

			maxpage = parseInt($('#'+id).attr('max'));
			if(globalcount == 1){return false;}//如果进入队列的就跳出

			if(p >= maxpage)
			{
				$('#'+id).html('<a href="javascript:void(0)" onclick="continueShow(\''+id+'\')"><img src="tpl/image/loading.gif" class="loading"/>点击查看更多...</a>');
			}else{
					globalcount = 1; //已经进入队列了
					$('#'+id).html('<img src="tpl/image/loading.gif" class="loading"/><span>请稍等</span>');
					$.post(url,{page:p},function(rs){

					if(rs != '')
					{
						area = $('#'+id).attr('area');
						$('#'+area).append(rs);
						$('#'+id).attr('page',nextpage);
						globalcount = 0; //出队列

					}else{
						$('#'+id).html('没有更多了');
						globalcount = 1; //出队列
					}

				 })

			}
		   }
		 });
	});
}
function continueShow(id)
{

	p = parseInt($('#'+id).attr('page'));
	url =$('#'+id).attr('query');

	nextpage = p+1;
	$('#'+id).html('<img src="tpl/image/loading.gif" class="loading"/><span>请稍等</span>');
	$.post(url,{page:p},function(rs){
				if(rs.length < 10)
				{
					 $('#'+id).html('没有更多了');
					 globalcount = 1; //出队列
				}else{
					area = $('#'+id).attr('area');
					$('#'+area).append(rs);
					$('#'+id).attr('page',nextpage);
					$('#'+id).html('<a href="javascript:void(0)" onclick="continueShow(\''+id+'\')"><img src="tpl/image/loading.gif" class="loading"/>点击查看更多...</a>');
				}

	})
}
function searchTag()
{
	var tag = $('#search .ipt').val();
	if(tag == '搜索标签,发现兴趣' || tag == ''){tiper('请填写标签');}else{
		$('#search .btn').addClass('loading');
		window.location.href=urlpath+'/index.php?c=blog&a=tag&tag='+tag;
	}

}
/*取消链接*/
function cancelConnect(url)
{
	$.post(url,function(rs){
			window.location.reload();
	})

}
/*删除博客*/
function delblogs(id,url)
{
	$.dialog({content:'确认删除这篇文章？',lock:true,yesFn:function(){
		//window.location.href=url;
		$.post(url,function(result){
			if(result == 'ok')
			{
				tipok('已删除');
				$('#blog_'+id).hide('slow');
			}else{
				tiper(result);
			}
		});
	},noFn:true});
}
function delrep(id,url)
{

	$.dialog({content:'确认删除本回复？',lock:true,yesFn:function(){
			//window.location.href=url;
			$.post(url,function(result){
				if(result == 'ok')
				{
					tipok('已删除');
					$('#feed_'+id).hide('slow');
				}else{
					tiper(result);
				}
			});
		},noFn:true});
}
/*发送站内信*/
function sendpm(uid,info)
{
	if(info ==undefined){info=''}
	$.dialog.open(urlpath+'/index.php?c=user&a=postpm&uid='+uid+'&info='+info, {id:'sendmail_box',fixed:true,lock:true,background:'#CCC',opacity:'0.4'});
}
//默认父框架刷新网页 为1 关闭父页面
function doPmSubmit(call)
{

	var u = $('#postpm').find('input[name=uid]').val();
	var i = $('#postpm').find('textarea').val();
	if(i == ''){tiper('请填写内容');return false;}
	$('#submit_button').hide();
	$('#submit_tip').show();
	$.post(urlpath+'/index.php?c=user&a=postpm&send=true',{uid:u,info:i},function(rs){

		if(rs == -1){alert('发送频率限制,请30秒后再试'); if(call ==1){art.dialog.open.api.close();}}
		if(rs == -2){alert('自己不能给自己发送');}
		if(rs == 0){alert('内容没有填写');}

		if(rs == 1){
			art.dialog({ content: '发送成功了',time:2,	closeFn:
			 function(){
					if(call ==1){art.dialog.open.api.close();}else{window.location.reload();}
				 }
			});
		}else{
			$('#submit_button').show();
			$('#submit_tip').hide();
		}
	})
}
/*删除通知*/
function delnotice(id,url)
{
	art.dialog.confirm('删除后对方也无法查看,确定吗?', function(){
		$.post(url,function(result){ if(result == 1){ $('#notice_'+id).hide('slow');}else{ tiper(result); }		});
	})

}
/*已读通知*/
function isreadnotice(id,url)
{
	$.post(url,function(result){
		if(result == 1)
		{
			$('#notice_'+id).hide('slow');
		}else{
			tiper(result);
		}
	});
}
/*显示首页评论框*/
function indexPostTab(type,id,url)
{
	if(type == 'reprint')
	{
		$('#comment_'+id).hide();
		$('#reprint_'+id).toggle().toggleClass('current');
	}else if(type =='comment'){
		$('#replyTo_'+id).val('');
		$('#comment_'+id).toggle();
		$('#feeds_'+id).hide();
		$('#replyInput_'+id).artTxtCount($('#replyInput_lengthinf_'+id), 100);
		$('#replyTo_'+id).val();

		$('#commentList_'+id).html('loading...');
		$.post(url,{bid:id},function(result){
				$('#commentList_'+id).html(result);
				$('#replyInput_lengthinf_'+id).html('');

		})
	}else if(type =='feeds'){
		$('#comment_'+id).hide();
		$('#feeds_'+id).toggle();
		$('#feedList_'+id).html('loading...');
		$.post(url,{bid:id},function(result){
				$('#feedList_'+id).html(result);

		})
	}
}

/*ajax page*/
function runpage(url,id)
{
	$('#'+id).html('<p id="upstates">loading......</p>');
	$.post(url,function(result){
				$('#'+id).html(result);
			$('#'+id).find('#upstates').remove();
		})
}
/*设置文本框的回复*/
function replays(id,user,uid)
{
	$('#replyInput_'+id).focus().val('@'+user+':');
	$('#replyTo_'+id).val(uid);

}
/*提交文本框的回复*/
function sendReplay(id,url)
{
	var ipt = $('#replyInput_'+id).val();
	if(ipt == ''){tiper('内容不能为空喔');return false;}

	  $.post(url,{inputs:ipt,bid:id,repuid:$('#replyTo_'+id).val()},function(result){
		if(result ==1)
		{
			tipok('回复成功');
		}else{
			tiper(result);
		}
			$('#comment_'+id).hide();
			$('#replyInput_'+id).val('');
			$('#comment_btn_'+id).removeClass('current');
	  });
}

/*加喜欢*/
function likes(id,url)
{
	 $.post(url,{bid:id},function(result){
		if(result ==1) { tipok('您已经喜欢'); }else if(result ==2){ tipok('您取消喜欢'); }else{ tiper(result); }
	  });
}

/*加关注*/
function follows(uid,url)
{
	$.post(url,{uid:uid},function(result){
		if(result ==1) {$('#follow_'+uid).html('已关注'); tipok('成功加为关注'); }else if(result ==2){ tipok('您已经取消了关注'); $('#myfollow_'+uid).hide(); }else{ tiper(result); }
	  });

}
/*加标签*/
function addMytag(tagName,url)
{
	$.post(url,{tag:tagName},function(result){
		if(result ==1) { tipok('已经添加该标签');$('#flowTag').html('取消标签关注'); }else if(result ==2){ tipok('已经取消该标签');$('#flowTag').html('添加标签关注'); }else{ tiper(result); }
	  });

}
function reinitIframe(x){
	var iframe = document.getElementById(x);
	try{
		var bHeight = iframe.contentWindow.document.body.scrollHeight;
		var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
		var height = Math.max(bHeight, dHeight);
		iframe.height =  height;

	}catch (ex){}
}
function opennotice()
{
	var msg = document.getElementById('message');
	$.dialog({content:msg});
}

/*清除通知*/
function noticeclear(sysid)
{

	art.dialog.confirm('都知道了吗?', function(){
		$.post(urlpath+'/index.php?c=user&a=mynotice&clears='+sysid,function(rs){
			window.location.reload();
		})
	})
}
/*删除通知*/
function noticedel(sysid)
{
	art.dialog.confirm('要删掉吗?', function(){
		$.post(urlpath+'/index.php?c=user&a=mynotice&dels='+sysid,function(rs){
			window.location.reload();
		})
	})

}

function OMP(url,that)
{

	var prgm = '<object width="500" height="385"><param name="allowscriptaccess" value="always"></param><param name="allowFullScreen" value="true"></param>'+
			  	 '<param name="wmode" value="Opaque"></param><param name="movie" value="'+url+'"></param>'+
			  	 '<embed src="'+url+'" width="500" height="385" allowscriptaccess="always" wmode="window" type="application/x-shockwave-flash"></embed>'+
				'</object>';
  $(that).parent().find('div .playbox').html(prgm);
  $(that).parent().parent().find('.feed_content').addClass('feed_content_h');
  $(that).parent().find('div').show();
  $(that).hide();
}

function LMP(that)
{
	$(that).parent().parent().parent().parent().find('.feed_content').removeClass('feed_content_h');//去掉block属性
	$(that).parent().parent().parent().find('a').show().html(); //显示小框
	$(that).parent().parent().hide();
}


function logout(x){art.dialog.confirm('是要退出登陆么?', function(){window.location.href=x})}
function openconnect(url){	$.dialog.open(url, {id:'connect_box', width:600,height:470,lock:true,fixed:true,background:'#CCC',opacity:'0.4'});}
/*短暂提示 global*/
function tips(txt){$.dialog({icon: 'face-sad',id:'tips', content: txt,time:2,fixed:true}).shake();}

/*短暂提示 ok 和err*/
function tipok(txt){$.dialog({icon: 'face-smile',id:'tips', content: txt,time:2,fixed:true});}
function tiper(txt){$.dialog({icon: 'face-sad',id:'tips', content: txt,time:2,fixed:true}).shake();}
/*删除博客*/
function delblog(x,y){ art.dialog.confirm('确定要删除日志#'+x+'?相关附件将会一并删除,且无法恢复', function(){window.location.href=y}) }

function attchManager(url){ logbox = art.dialog.open(url, {id:'attchManager',title: '附件管理器',width:720,height:350}); }


/*收集到杂志*/
function collect(url)
{
	$.dialog.open(url, {title: '提示',yesFn: function () {
    	var iframe = this.iframe.contentWindow;
    	if (!iframe.document.body) {
        	alert('iframe还没加载完毕呢')
        	return false;
        };
    	var form = iframe.document.getElementById('collect_form'),
			title = iframe.document.getElementById('aInput');
        if (check(title)){
			form.submit();
			//art.dialog.tips('成功收集！');
		}	
		return false;
		},
		noFn: true}, false);
	var check = function (input) {
		if(input.value.length<5){
			alert('标题长度至少5个字符！')
			return false;
		} else {
			return true;
		};
	};
}
function new_magazine()
{
	art.dialog.open('./index.php?c=main&a=newmag', {title: '提示',yesFn: function () {
    	var iframe = this.iframe.contentWindow;
    	if (!iframe.document.body) {
        	alert('iframe还没加载完毕呢')
        	return false;
        };
		
    	var form = iframe.document.getElementById('create-tblog-form'),
			magname = iframe.document.getElementById('MagName');
        if (check(magname)){
			form.submit();
			art.dialog.tips('成功创建杂志！');
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
function edit_magazine_name(boid)
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
function edit_magazine(id){
	art.dialog.open('./index.php?c=magazine&a=edit&id='+id, {title: '修改收集标题',yesFn: function () {
    	var iframe = this.iframe.contentWindow;
    	if (!iframe.document.body) {
        	alert('iframe还没加载完毕呢')
        	return false;
        };
		
    	var form = iframe.document.getElementById('create-tblog-form'),
			magname = iframe.document.getElementById('MagName');
        if (check(magname)){
			form.submit();
			art.dialog.tips('修改成功！');
			art.dialog.open.api.close();
		}
		return false;
		},
		noFn: true},false);
	var check = function (input) {
		if(input.value.length<5){
			alert('标题长度至少5个字符！')
			return false;
		} else {
			return true;
		};
	};
}
/*删除杂志*/
function del_magazine_name(boid)
{
	$.dialog({content:'确认删除这个杂志？',lock:true,yesFn:function(){
		//window.location.href=url;
		$.post(urlpath+'/index.php?c=admin&a=delmagazine&boid='+boid,function(result){
			if(result == 'ok')
			{
				tipok('已删除');
				window.location.href=urlpath;
			}else{
				tiper(result);
			}
		});
	},noFn:true});
}
function del_magazine(id){
	art.dialog.confirm('确定删除这条收集内容吗?', function(){
		$.post('./index.php?c=magazine&a=del&id='+id);
		$('#blog_'+id).hide('slow');
	})
}
/*删除收集*/
function delcollects(id,url)
{
	$.dialog({content:'确认删除这篇文章？',lock:true,yesFn:function(){
		//window.location.href=url;
		$.post(url,function(result){
			if(result == 'ok')
			{
				tipok('已删除');
				$('#blog_'+id).hide('slow');
			}else{
				tiper(result);
			}
		});
	},noFn:true});
}
function closewindow()
{
	art.dialog.open.api.close();
}
//Digg方面的js
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
		
			var jUpload=$('#upload_mp3 input');
		jUpload.mousedown(function(){textbody.saveBookmark();}).change(function(){
			var $this=$(this),sExt=$this.attr('ext'),$prev=$this.prev();
			if($this.val().match(new RegExp('\.('+sExt.replace(/,/g,'|')+')$','i'))){
				var upload=new textbody.html4Upload(this,urlpath+'/index.php?c=add&a=uploadmedia',function(sText){
					$('#uploading').hide();
					var data=Object,bOK=false;
					try{data=eval('('+sText+')');}catch(ex){};
					if(!data.err){
						iattachMp3(data.msg.fid,data.msg.localname);
					}else{
						alert(data.err);	
					}
				});
				upload.start();
				$('#uploading').show();
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
		
	   var qsearch = '添加标签,写一个回车一下'
	   if($('#post-tag-input').val() == ''){$('#post-tag-input').val(qsearch);}
	   $('#post-tag-input').click(function(){if($('#post-tag-input').val() == qsearch){$('#post-tag-input').val('');}})
	   $('#post-tag-input').blur(function(){
	
		if($('#post-tag-input').val() == ''){ $('#post-tag-input').val(qsearch);}else{
			var tags = $('#post-tag-input').val();
			$('#post-tag-list').append('<li tag="'+tags+'"><span>'+tags+'</span><a href="javascript:;" onclick="remTags(this)" title="删除">x</a></li>');
			$('#post-tag-input').val('');} })
		
		$('.globox .trg:even').addClass("alt-row"); 
		

	   
	   $('#preview').click(function(){
			textbody.exec('Preview');			  
		});
	    $('#cancel').click(function(){
			window.history.go(-1);			  
		});

	   $('#draft').click(function(){
			$('#blog-open').val(0);
			if($('#textarea').val() == ''){$.dialog({icon: 'alert', content: '内容不能为空喔',time:2,fixed:true});return false;}
			$('#form1').submit();
		});	

		
		$('#post-tag-input').bind('keyup', function(event){
		   if (event.keyCode=="13"){
				var tags = $('#post-tag-input').val();
			if(tags != '')
			$('#post-tag-list').append('<li tag="'+tags+'"><span>'+tags+'</span><a href="javascript:;" onclick="remTags(this)" title="删除">x</a></li>');
			$('#post-tag-input').val('');
		   }
		});

		
		/*保存个人资料修*/
		$('#submit_baseinfo').click(function(){
				var niname = $('#niname').val();
				var domain = $('#domain').val();
				var signss = $('#sign').val();
				var m_reps  = $('#m_rep').val();
				var m_fows  = $('#m_fow').val();
				var m_pms   = $('#m_pm').val();
				
			
				var tag_str='';
				$('#post-tag2 li').each(function(){  
				tag_str  += $(this).attr('tag') + ',';
			})
			 chks = /^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){1,15}$/;
			if(!chks.exec(domain)){ tips('个性域名不符合要求'); return false;}
			$('#tag').val(tag_str); //写入标签
			
			$('#userSetting').submit();
			
			$('#pb-submiting-tip,#submit_baseinfo,#chgpwd,#cancel').toggle();
			/*
			$.post($('#submit_baseinfo').attr('submiturl'),{'niname':niname,'domain':domain,'sign':signss,'tag':tag_str,'m_rep':m_reps,'m_fow':m_fows,'m_pm':m_pms},function(result){ 
				$('#pb-submiting-tip,#submit_baseinfo,#chgpwd,#cancel').toggle();
				$.dialog({id:'alerts',icon: 'face-smile', content: result,time:2});							
			})*/

		});


	   

		/*修改密码弹出框*/
		 $('#chgpwd').click(function(){
			var dls = $.dialog({
					 content:document.getElementById('pwd_wrap'),
					 lock:true,
					 title:'修改密码',
					 
					 button:[{name: '保存修改', callback: function (){
															var pwd = $('#pwd'); var pwd1 = $('#pwd1'); var pwd2 = $('#pwd2');
															if(pwd.val() == ''){pwd.focus();return false;}
															if(pwd1.val() == ''){pwd1.focus();return false;}
															if(pwd2.val() == ''){pwd2.focus();return false;}
															$('#loadings').toggle();
															this.button({name: '保存修改',disabled: true});
															this.button({name: '取消',disabled: true});
															$.post($('#pwd').attr('submiturl'),{'pwd':pwd.val(),'pwd1':pwd1.val(),'pwd2':pwd2.val()},function(result){ 
																$('#loadings').toggle();
																if(result == 'ok')
																{
																	$.dialog({id:'alerts',icon: 'success', content:'密码成功修改,下次登录不要忘记使用新密码',time:3});
																	dls.close();
																}else{
																	
																	$.dialog({id:'alerts',icon: 'alert', content: result,time:2});
																}
																
															dls.button({name: '保存修改',disabled: false});
															dls.button({name: '取消',disabled: false});
																						
															})
															
															return false;	
														}},
							 {name: '取消'}] ,
					
					noFn:true
			  });
		});	
		 
		 	
	   
	   /*发布text*/
	   $('#submit').click(function(){
			var title = $('#pb-text-title').val(); 
			var text = $('#textarea').val();
			if(text == ''){tips('内容不能为空喔'); $('#textarea').focus();return false}
			if(!setTags()){ tips('标签至少要写一个~回车确定标签');return false;	}
			$('#submit,#draft,#preview,#cancel,#pb-submiting-tip').toggle();
			$('#form1').submit();
		});	
	   
	     /*发布music*/
	   $('#submit_music').click(function(){
			var umus = '';//获取发布音乐字符串
			$('#musicList .list').each(function(){ umus  += $(this).attr('type') +'|'+ $(this).attr('img') +'|'+ $(this).attr('pid') +'|'+$(this).find('input').val() +'|'+ $(this).attr('url') +'[YB]';  }) //获取音乐字串
			if(!setTags()){ tips('标签至少要写一个~回车确定标签');return false;	}
			
			if($('#useedit').val() == 1)
			{
				
				$.dialog({content:'您确认使用编辑器中的媒体作为最终发布的内容吗？',lock:true,yesFn:function(){ 
					
						$('#urlmusic').val(umus); //写入数据
						$('#submit_music,#draft,#preview,#cancel,#pb-submiting-tip').toggle();
						$('#form1').submit();
		
								   
				},noFn:true});
				
			}else{
					if(umus ==''){ tips('请添加一个网络音乐或者上传音乐');return false;}
				
						$('#urlmusic').val(umus); //写入数据
						$('#submit_music,#draft,#preview,#cancel,#pb-submiting-tip').toggle();
						$('#form1').submit();
			}
			
			
		
			//alert(umus);return false;
		
		});	
	   
	      /*发布image*/
	   $('#submit_image').click(function(){
			var umus = '';//获取发布音乐字符串
			$('#uploadArea div').each(function(){ umus  += 1}) //获取音乐字串
			if(umus ==''){ tips('请上传至少一张图片');return false;}
			if(!setTags()){ tips('标签至少要写一个~');return false;	}
			$('#urlmusic').val(umus); //写入数据
			$('#submit_image,#draft,#preview,#cancel,#pb-submiting-tip').toggle();
			$('#form1').submit();
		});	
	   
	      /*发布video*/
	   $('#submit_video').click(function(){
			var umus = '';//获取发布音乐字符串
				$('#musicList .list').each(function(){ umus  += $(this).attr('type') +'|'+ $(this).attr('img') +'|'+ $(this).attr('pid') +'|'+$(this).find('input').val() +'|'+ $(this).attr('url') +'[YB]';  }) //获取音乐字串
			if(umus ==''){ tips('请添加一个网络视频,并点击保存');return false;}
			//alert(umus);return false;
			if(!setTags()){ tips('标签至少要写一个');return false;	}
			$('#urlmusic').val(umus); //写入数据
			$('#submit_music,#draft,#preview,#cancel,#pb-submiting-tip').toggle();
			$('#form1').submit();
		});	
	   
	   
		
});


function postoff()
{
$('#pb-submiting-tip,#submit_baseinfo,#chgpwd,#cancel').toggle();	
}

function setTags()
{
	var tag_str = ''; 
	$('#post-tag-list li').each(function(){  	tag_str  += $(this).attr('tag') + ',';})
	$('#blog-tags').val(tag_str); //写入标签
	if($('#blog-tags').val() == ''){return false}else{return true}
}

/*处理音乐模型需要的方法*/

/*网络音乐和编辑器切换*/
function SelectLink()
{
	 $('#musicFrom').show();
	 $('#musicUpload').hide();
	 $('#useedit').val(0);
	 $('#mountchange ul li').removeClass('curr');
	 $('#url_link').addClass('curr');
}
function SelectUpload(that){
	 $('#musicFrom').hide();
	 $('#musicUpload').show();
	 $('#useedit').val(0)
	 $('#mountchange ul li').removeClass('curr');
	 $('#url_upload').addClass('curr');
}


/*判断添加网络音乐的mouseover事件*/
function musicMouse(thisa){ if($(thisa).val() == 'http://' || $(thisa).val() == '介绍(选填)'){$(thisa).val('');}	}
/*判断添加网络音乐的mouseout的事件*/
function musicMosout(thisa,t)
{
	if($(thisa).val() == '' && t=='u'){$(thisa).val('http://');}
	if($(thisa).val() == '' && t=='c'){$(thisa).val('介绍(选填)');}
}

/*保存一个条目*/
function saveMusicList(url)
{
	var url = $('#musicurl').val();
	if(url == 'http://'){ tips('请填写一个引用地址');	return false;}
	
	$("#musicFrom").disable();$("#urlParseLoading").val('正在解析...');
	$.post(urlpath+'/index.php?c=add&a=links',{'url':url},function(result){ 
																	 // alert(result);
		$("#musicFrom").enable();$("#urlParseLoading").val('添加地址');
		var data = eval("(" + result + ")");
		if(data.error != undefined){ tips(data.error);return false;}
		if(data.type =='mp3' || data.type =='wma' || data.type =='swf'){ data.img = 'tpl/image/add/webmusic.png';}
		desc = data.title;
		var html = '<div class="list" type="'+data.type+'" pid="'+data.id+'" img="'+data.img+'" url="'+url+'"> <div class="uri">已添加：'+url+'</div>'+
			'<input type="text" name="musicList['+data.id+']" value="'+desc+'" />'+
			'<a href="javascript:void(0)" onclick="musicDItem(this)">移除</a> </div>';
		$('#musicList').prepend(html);
		$('#pb-text-title').val(desc);
		$('#musicurl').val('http://');
	})
}




/*删除音乐发布的一个条目 DOM*/
function musicDItem(that){$(that).parent().remove();}

/*添加MP3类型媒体 如果localmusic 存在 则说明是在音乐模型*/
function iattachMMouse(that,id)
{
	if(id == 0){if($(that).val() == '描述'){$(that).val('');}}
	if(id == 1){if($(that).val() == ''){$(that).val('描述');}}
}


/*remove附件*/
function removeIattachMp3(that,id)
{
	$(that).parent().parent().remove();
	$('#attach_'+id).show();
}


/*音乐模型独立体结束*/
function iattachMp3(id,name)
{
	if($('#blog-types').val() == 2)
	{
		  var html = '<div class="list" type="local" pid="'+id+'" img="0"><div class="uri">已添加：来自本地音乐</div>'+
					'<div><input type="text" name="localMusic['+id+']" value="'+name+'" />'+
					'<a href="javascript:void(0)" onclick="musicDItem(this)">移除</a></div> </div>';
		$('#musicList').prepend(html); $('#attach_'+id).hide();
	}
}

/*音乐模型共同体以及全部结束*/

function iattachBigImg(x)
{
	var x = x.split('|');
	if($('#blog-types').val() == 1){$('#blog-attach').val(x[1]);}
	textbody.pasteHTML('<a href="'+x[0]+'" target="_blank"><img src="'+x[1]+'" alt="" class="feedimg"/></a>') 
}
function iattachImg(x)
{
	if($('#blog-types').val() == 1){$('#blog-attach').val(x);}
	textbody.pasteHTML('<img src="'+x+'" alt="" class="feedimg"/>') 
}

/*删除附件*/
function delAttach(id)
{
	$.dialog({content:'确认删除附件？',lock:true,yesFn:function(){ 
		$.post(urlpath+'/index.php?c=add&a=delattach',{'id':id},function(result){ 
				if(result == 'ok')
				{
					$('#attach_'+id).hide();tips('已删除');
				}else{
					tips('请稍后再试');
				}
			})			   
	},noFn:true});
}


/*删除附件 图片模块*/
function delAttachIMAGE(id)
{
	$.dialog({content:'确认删除附件？',lock:true,yesFn:function(){ 
		$.post(urlpath+'/index.php?c=add&a=delattach',{'id':id},function(result){ 
				if(result == 'ok')
				{
					$('#attach_'+id).remove();
				}else{
					tips('请稍后再试');
				}
			})			   
	},noFn:true});
}


/*删除tag*/
function remTags(x)
{
	$(x).parent().remove();
}
/*从推荐列表选择tag*/
function tuiTag(x,y)
{
	$('#post-tag-list').append('<li tag="'+x+'"><span>'+x+'</span><a href="javascript:;" onclick="remTags(this)" title="删除">x</a></li>');
	$(y).parent().remove();
}



/*网编辑器插入媒体*/
function iattach(x,y)
{
	var x = x.split('|');
	if(x[0] == 'img')
	{
		if(x[2] == undefined) //如果不存在缩略图
		{
			parent.textbody.pasteHTML('<img src="'+x[1]+'" />');	
		}else{
			parent.textbody.pasteHTML('<a href="'+x[1]+'" target="_blank"><img src="'+x[2]+'" alt="" /></a>') 
		}
	}else if(x[0] == 'mp3' || x[0] == 'mid' || x[0] == 'midi' || x[0] == 'wma' ){
		parent.textbody.pasteHTML('[music]'+x[1]+x[2]+'[/muisc]');	
	}else{
		parent.textbody.pasteHTML('<a href="'+x[2]+'">'+x[1]+'</a>');	
	}
}