<?php /* Smarty version Smarty-3.0.6, created on 2014-11-03 17:30:01
         compiled from "/home/kingkong/Projects/php/baby/tpl/now.html" */ ?>
<?php /*%%SmartyHeaderCode:183289836754574b19d3a599-25101158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32d9d81239656854599f33cbe3e03988af7abf5c' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/now.html',
      1 => 1336665476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183289836754574b19d3a599-25101158',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('now','yes');$_template->assign('gallery','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

	<div id="article">
	<?php if (islogin()){?>
		<?php $_template = new Smarty_Internal_Template("require_post.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<?php }else{ ?>
		<div class="cartoon">亲！注册会员享受更多特权，发布、制作杂志、移动客户端一个</p>都不少！
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
" title="登陆">登录</a>
			（还米有账号？<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'reg'),$_smarty_tpl);?>
" title="注册">注册</a>）
		</div>
	<?php }?>
	<div id="feedArea">
	<?php $_template = new Smarty_Internal_Template("require_feeds.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('data',$_smarty_tpl->getVariable('blogs')->value);$_template->assign('limits',4); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	</div>
	<!--<footer class="nav"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
</footer> -->
	<div id="feedAjaxTool" page="2" max="10" area="feedArea" query="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'now','ajaxload'=>true),$_smarty_tpl);?>
" class="feedajax">
	<a href="javascript:void(0)" onclick="continueShow('feedAjaxTool')">查看更多...</a>
	</div>
	<script>feedToolBar('feedAjaxTool');</script>

	</div>

<div id="aside">
   <?php $_template = new Smarty_Internal_Template("require_sider.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>