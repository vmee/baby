// JavaScript Document
	hs.lang.loadingText = '请稍候...';  
	hs.lang.loadingTitle = '关闭';  
	hs.lang.focusTitle = 'Click to bring to front';  
	hs.lang.fullExpandTitle = '实际大小';
	hs.lang.creditsTitle = '';  
	hs.lang.previousText = '上一张';  
	hs.lang.nextText = '下一张';   
	hs.lang.moveText = '移动';  
	hs.lang.closeText = '关闭';   
	hs.lang.closeTitle = '关闭 (esc键)';   
	hs.lang.resizeTitle = '还原';  
	hs.lang.playText = '开始';  
	hs.lang.playTitle = '幻灯片播放(空格键)';  
	hs.lang.pauseText = '暂停';  
	hs.lang.pauseTitle = 'Pause slideshow (spacebar)';  
	hs.lang.previousTitle = '上一张 (←键)';  
	hs.lang.nextTitle = '下一张 (→键)';  
	hs.lang.moveTitle = '移动';  
	hs.lang.fullExpandText = '满屏';  
	hs.lang.number= '第 %1 张/共 %2 张';  
	hs.lang.restoreTitle = '点击关闭, 点击并拖动可移动图片';
	try{
		if(tplpath){hs.graphicsDir = tplpath+ 'image/gallery.show/';}
		}catch(exception){
			hs.graphicsDir ='tpl/image/gallery.show/';
			
	}
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	hs.addSlideshow({
		interval: 5000,
		repeat: false,
		useControls: true,
		fixedControls: 'fit',
		overlayOptions: {
			opacity: 0.75,
			position: 'bottom center',
			hideOnMouseOut: true
		}
	});