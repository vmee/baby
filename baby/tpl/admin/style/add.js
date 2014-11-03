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