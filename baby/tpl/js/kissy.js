KISSY.add("lib/header",function(a,b,c,d,e,f,g,h){function m(){i&&n(),o(),q(),r(),g.Dispatcher.on("navActiveChange",function(a){var b=a.activeItem,c;b.indexOf("blogId:")==0?p(b.replace("blogId:","")):b.indexOf("blogUrl:")==0&&(c=b.replace("blogUrl:",""),p(l[c]))})}function n(){var a=b.query("#nav-blog-list .blog-item");a.length>0&&c.on(a,"mouseenter mouseleave",function(a){var c="mouseenter"===a.type?b.addClass:b.removeClass;c(this,"hover")})}function o(c){var d,e,f,g,h,i,m,n,o,p=0,q=[],r,s;if(!1===k||!!c)i=b.width("#header")-(b.outerWidth("#logo-holder")+b.outerWidth("#nav")+b.outerWidth("#J_HeaderMiscAction")+b.outerWidth("#nav-blog-action")),d=b.get("#nav-blog-list"),e=b.query("li",d),f=b.query(".J_HasNotice",d),g=b.filter(e,".active")[0],j={index:0,maxWidth:i,blogList:d,blogs:e,noticeBlogs:f,activeItem:g},k=!0;d=d||j.blogList,undefined===e&&(e=j.blogs=b.query("li",d)),f=f||j.noticeBlogs,i=i||j.maxWidth,g=g||j.activeItem,!c||b.hide(e),a.each(e,function(a){var c=b.attr(a,"url"),d=a.id.replace("nav-blog-","");l[c]=d});if(!!c)for(n=0,o=e.length;n<o;n++){m=e[n],b.show(m),p=b.width(d),q.push(m);if(n!==j.index){if(p>i){b.hide(m),q.pop();break}}else if(p>i){b.css(m,{overflow:"hidden","float":"left",width:i+"px"});break}}if(g&&!a.inArray(g,q)){b.show(g);while((p=b.width(d))>i&&q.length>0)m=q.pop(),b.hide(m);q.length===0&&p>=i&&b.css(m,{overflow:"hidden","float":"left",width:i+"px"})}!c||(e.length>1&&q.length<e.length?b.hide("#nav-new-blog"):b.show("#nav-new-blog"),f.length<1?b.hide("#nav-more-blog-notice"):a.each(f,function(c){if(!a.inArray(c,q))return b.show("#nav-more-blog-notice"),!1}))}function p(c){if(!c)return;var d=b.children("#nav-blog-list","li");a.each(d,function(a){b.removeClass(a,"active")}),b.addClass("#nav-blog-"+c,"active"),o(!0)}function q(){function n(){var c=b.query("li",d),e=[];a.each(c,function(a){if(!a.id)return;var b=a.id.match(/pop-blog-(.*)/)[1];e.push(b)}),f.post(g.url.host+"/blog/change/order",{ids:e.join(",")})}function p(a){var c=b.offset("#nav-blog-action").left-162;b.css("#pop-blog-list-holder",{left:c}),b.toggle("#pop-blog-list-holder"),b.toggleClass("#nav-more-blog",".nav-more-blog-hover"),a.halt()}function q(a){var d=a.target,e=d.tagName,f=b.parent(d,"li"),g=document;startY=a.pageY,e=="li"&&(f=d),a.halt(),b.removeClass(f,"first"),c.on(g,"mousemove",function(a){a.halt(),i=!0,r(a,f)}),c.on(g,"mouseup",function(a){a.halt(),c.remove(g,"mousemove"),c.remove(g,"mouseup");if(!i)return;s(f),setTimeout(function(){i=!1}),n()})}function r(a,c){if(!c)return;var e=a.pageY,f=e-startY,g=c.id.match(/pop-blog-(.*)/)[1],h,i;j=b.prev(c),k=b.next(c),k.id||(k=null),l=j?b.height(j):null,m=k?b.height(k):null,b.css(c,{opacity:.7,position:"relative",top:f,"z-index":100}),h=b.get("#nav-blog-"+g),f>0&&m&&f>m&&(b.insertAfter(c,k),startY+=m,b.css(c,{top:0}),b.addClass(b.children(d)[0],"first"),b.removeClass(b.children(d)[1],"first"),b.insertAfter(h,b.next(h)),o(!0)),f<0&&l&&-f>l&&(b.insertBefore(c,j),startY-=l,b.css(c,{top:0}),b.addClass(b.children(d)[0],"first"),b.removeClass(b.children(d)[1],"first"),b.insertBefore(h,b.prev(h)),o(!0))}function s(a){b.css(a,{position:"static",top:0,opacity:1})}var d=b.get("#pop-blog-list"),e=b.query("li",d),h,i,j,k,l,m;c.on(d,"click",function(a){i&&a.halt()}),c.on("#nav-more-blog","click",p),c.on("#nav-more-blog-notice","click",p),c.on(document,"click",function(){b.hide("#pop-blog-list-holder"),b.removeClass("#nav-more-blog",".nav-more-blog-hover")}),c.on(d,"mousedown",q)}function r(){function a(){if(!window.DDHostName||!window.DDrev)return;var a="";a+="Host:"+window.DDHostName,a+="\nRev:"+window.DDrev,a+="\nCostTime:"+parseInt(window.DDrequestEnd-window.DDrequestStart),a+="\n\n\u4eb2~\u4f60\u7684\u8fd0\u6c14\u5b9e\u5728\u592a\u597d\u4e86~\u8d76\u5feb\u53bb\u4e70\u5f69\u7968\u5427~",alert(a)}c.on(document,"keydown",function(b){b.ctrlKey&&b.shiftKey&&b.altKey&&b.keyCode==76&&a()})}var i=6===d.ie,j={},k=!1,l={};return{init:m}},{requires:["dom","event","ua","json","ajax","util.$5106","sky.$5106"]})