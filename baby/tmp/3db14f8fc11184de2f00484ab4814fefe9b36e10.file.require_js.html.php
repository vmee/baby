<?php /* Smarty version Smarty-3.0.6, created on 2014-11-03 17:24:21
         compiled from "/home/kingkong/Projects/php/baby/tpl/require_js.html" */ ?>
<?php /*%%SmartyHeaderCode:1352657075545749c5be6492-38877457%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3db14f8fc11184de2f00484ab4814fefe9b36e10' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/require_js.html',
      1 => 1336919873,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1352657075545749c5be6492-38877457',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>
	<!--
	var urlpath = '<?php echo $_smarty_tpl->getVariable('url')->value;?>
';
	-->
</script>
<?php if ($_smarty_tpl->getVariable('index')->value=='yes'||$_smarty_tpl->getVariable('now')->value=='yes'){?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/jquery.min.js"/></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/global.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/swf/player.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/dialog/dialog.js?skin=mac"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/dialog/dialogTools.js"></script>
<?php }?>
<?php if ($_smarty_tpl->getVariable('waterfall')->value=='yes'){?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/jquery.min.js"/></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/digg.js"/></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/modernizr.js"></script>
<script type='text/javascript' src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/jquery.masonry.min.js"></script>
<script type='text/javascript' src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/jquery.infinitescroll.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/digg.js"/></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/cssfx.min.js"></script>
<?php }?>
<?php if ($_smarty_tpl->getVariable('login')->value=='yes'){?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/jquery.min.js"/></script>
<?php }?>
<?php if ($_smarty_tpl->getVariable('gallery')->value=='yes'){?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/gallery.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/gallery.global.js"></script>
<link type="text/css" href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/css/gallery.show.css" rel="stylesheet" >
<?php }?>
<?php if ($_smarty_tpl->getVariable('discovery')->value=='yes'){?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/jquery.min.js"/></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/css/reset.css" class="cssfx"/>
<script type='text/javascript' src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/global.js"></script>
<?php }?>

<?php if ($_smarty_tpl->getVariable('omg')->value=='yes'){?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/jquery.min.js"/></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/jquery-ui.js"/></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/modernizr.js"></script>
<script type='text/javascript' src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/jquery.masonry.min.js"></script>
<script type='text/javascript' src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/jquery.infinitescroll.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/dialog/dialog.js?skin=mac"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/dialog/dialogTools.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/cssfx.min.js"></script>
<?php }?>
<?php if ($_smarty_tpl->getVariable('custom')->value=='yes'){?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/jquery.min.js"/></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/dialog/dialog.js?skin=mac"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/dialog/dialogTools.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/custom.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/colorselect/jquery.modcoder.excolor.js"></script>
<?php }?>
<?php if ($_smarty_tpl->getVariable('loadedit')->value=='yes'){?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/jquery.min.js"/></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/dialog/dialog.js?skin=mac"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/dialog/dialogTools.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/global.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/editor/xheditor.js"></script>
<?php }?>
<?php if ($_smarty_tpl->getVariable('layout')->value=='yes'){?>
<script src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/modernizr-transitions.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/masonry.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/kissy-min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/css/recommend.css" />

	<script>
	$(document).ready(function(){
		$('.welcome').masonry({ itemSelector: '.box' 	});
		$('.welcome .box').hover(
					function(){
					$(this).find('.boxhover').fadeIn();
					},function(){
					$(this).find('.boxhover').fadeOut();
	});
	});
	</script>

<?php }?>
<?php if ($_smarty_tpl->getVariable('addcss')->value=='yes'){?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/jquery.min.js"/></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/dialog/dialog.js?skin=mac"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/dialog/dialogTools.js"></script>
<?php }?>
<?php if ($_smarty_tpl->getVariable('swfupload')->value=='yes'){?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/swfupload.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/multiupload.js"></script>
<?php }?>
<?php if ($_smarty_tpl->getVariable('editor')->value=='yes'){?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/editor/xheditor.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/global.js"></script>
<link   type="text/css" rel="stylesheet"  media="screen" href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/css/add.css" />
<?php }?>
<?php if ($_smarty_tpl->getVariable('index')->value=='yes'||'header'=='yes'){?>
<script type="text/javascript">
	var w = 0;
	var h = 0;
	var mout;
	var isShow = 0;
	function emotion(){
		var oMenu = document.getElementById("pop-blog-list-holder");
		if(w <= 50){
			oMenu.style.display = "block";
			fnLarge();
		}
	}
	function fnLarge(){
		var oMenu = document.getElementById("pop-blog-list-holder");
		if(w < 250){
			w += 50;
			h += 25;
			oMenu.style.width = w+"px";
			oMenu.style.height = h+"px";
			window.setTimeout("fnLarge()",10);
		}else{
			isShow = 1;
		}
	}
	document.onclick = function fnSmall(){
		var oMenu = document.getElementById("pop-blog-list-holder");
		if(isShow=='1'){
			w = 0;
			h = 0;
			oMenu.style.width = w+"px";
			oMenu.style.height = h+"px";
			window.setTimeout("fnSmall()",5);
			oMenu.style.display = "none";
			isShow = 0;
		}
	}
</script>
<?php }?>