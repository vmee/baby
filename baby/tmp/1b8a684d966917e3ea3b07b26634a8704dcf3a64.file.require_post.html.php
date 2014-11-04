<?php /* Smarty version Smarty-3.0.6, created on 2014-11-04 14:12:06
         compiled from "/home/kingkong/Projects/php/baby/tpl/require_post.html" */ ?>
<?php /*%%SmartyHeaderCode:136863888754586e364ae482-56812550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b8a684d966917e3ea3b07b26634a8704dcf3a64' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/require_post.html',
      1 => 1415081205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136863888754586e364ae482-56812550',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="postblog">
        <div class="img"><img src="<?php echo avatar(array('uid'=>$_SESSION['uid'],'size'=>'middle'),$_smarty_tpl);?>
" alt="<?php echo $_SESSION['username'];?>
" class="face"/></div>
		<div class="pop">
			<ul class="pop2">
				<?php if ($_smarty_tpl->getVariable('dtk')->value['addtext_switch']==1){?> <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'add','a'=>'text'),$_smarty_tpl);?>
" class="text">文字</a></li><?php }?>
                <?php if ($_smarty_tpl->getVariable('dtk')->value['addimg_switch']==1){?> <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'add','a'=>'image'),$_smarty_tpl);?>
" class="photo">照片</a></li><?php }?>
                <?php if ($_smarty_tpl->getVariable('dtk')->value['addvideo_switch']==1){?><li><a  href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'add','a'=>'video'),$_smarty_tpl);?>
" class="video">视频</a></li><?php }?>
                <!--<?php if ($_smarty_tpl->getVariable('dtk')->value['addmusic_switch']==1){?> <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'add','a'=>'music'),$_smarty_tpl);?>
" class="music">音乐</a></li><?php }?>-->
				<!--<?php if ($_smarty_tpl->getVariable('dtk')->value['addlink_switch']==1){?><li><a  href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'add','a'=>'link'),$_smarty_tpl);?>
" class="link">链接</a></li><?php }?>-->
				<!--
                <div id="state_bar">
				<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'add','a'=>'post_state'),$_smarty_tpl);?>
" id="form1" method="post">
					<input type="hidden" value="6" name="blog-types">
					<textarea class="state" name="textarea"></textarea><input class="subBtn" type="submit" value="&nbsp;">
				</form>
				</div>
				-->
			</ul>
		</div>
	  
    </div>
	