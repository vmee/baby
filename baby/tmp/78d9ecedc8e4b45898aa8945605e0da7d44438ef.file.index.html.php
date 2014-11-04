<?php /* Smarty version Smarty-3.0.6, created on 2014-11-04 12:00:48
         compiled from "/home/kingkong/Projects/php/baby/tpl/index.html" */ ?>
<?php /*%%SmartyHeaderCode:11537929654584f70bcc768-43739232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78d9ecedc8e4b45898aa8945605e0da7d44438ef' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/index.html',
      1 => 1415073647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11537929654584f70bcc768-43739232',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/kingkong/Projects/php/baby/init/Drivers/Smarty/plugins/modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('index','yes');$_template->assign('gallery','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
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
	<?php if ($_smarty_tpl->getVariable('noticeCount')->value){?>
	<div id="message" style="display:none">
		<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('notice')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
		<div id="notice_<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
		<div class="delnotice"><?php if ($_smarty_tpl->tpl_vars['d']->value['isread']==0){?><a href="javascript:void(0)" onClick="isreadnotice('<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
','<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'readnotice','id'=>$_smarty_tpl->tpl_vars['d']->value['id']),$_smarty_tpl);?>
')">我知道了</a><?php }else{ ?>删除消息<?php }?></div>
			<div><div class="facearea">
				 <a href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/<?php echo $_smarty_tpl->tpl_vars['d']->value['user']['domain'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['d']->value['user']['username'];?>
" target="_blank">
					 <img src="<?php echo avatar(array('uid'=>$_smarty_tpl->tpl_vars['d']->value['user']['uid'],'size'=>'middle'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['d']->value['tome']['username'];?>
" align="absmiddle" class="face"/>
				 </a>
			</div>
			   <p><a href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/<?php echo $_smarty_tpl->tpl_vars['d']->value['user']['domain'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['d']->value['user']['username'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['d']->value['user']['username'];?>
</a> <?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['time'],"%Y-%M-%d/%H:%M:%S");?>
</p>
				<p class="info"><?php echo replay_preg(array('msg'=>$_smarty_tpl->tpl_vars['d']->value['info']),$_smarty_tpl);?>
  <a href="<?php echo notice_preg(array('url'=>$_smarty_tpl->tpl_vars['d']->value['location']),$_smarty_tpl);?>
">查看原文</a></p>
		   </div>
		</div>
		<?php }} ?>
	</div>
	<?php }?>
	<div id="feedArea">
	<?php $_template = new Smarty_Internal_Template("require_feeds.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('data',$_smarty_tpl->getVariable('blogs')->value);$_template->assign('limits',4); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	</div>
	<?php if ($_smarty_tpl->getVariable('dtk')->value['show_page_mode']==1){?>
	<div id="feedAjaxTool" page="2" max="<?php echo $_smarty_tpl->getVariable('dtk')->value['show_ajax_to'];?>
" area="feedArea" query="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index','ajaxload'=>true),$_smarty_tpl);?>
" class="feedajax">
	<a href="javascript:void(0)" onclick="continueShow('feedAjaxTool')">查看更多...</a>
	</div>
	<script>feedToolBar('feedAjaxTool');</script>
	<?php }else{ ?>
	<div class="nav"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
</div>
	<?php }?>
</div>
<div id="aside">
   <?php $_template = new Smarty_Internal_Template("require_sider.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>