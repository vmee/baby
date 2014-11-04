<?php /* Smarty version Smarty-3.0.6, created on 2014-11-04 14:48:28
         compiled from "/home/kingkong/Projects/php/baby/tpl/require_header.html" */ ?>
<?php /*%%SmartyHeaderCode:50116171545876bc3aea95-65965538%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68aa7f7fa848f4a544e68169a32b32bbe3eb6957' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/require_header.html',
      1 => 1415083056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50116171545876bc3aea95-65965538',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php if ($_smarty_tpl->getVariable('titlepre')->value){?><?php echo $_smarty_tpl->getVariable('titlepre')->value;?>
 -<?php }?> <?php echo $_smarty_tpl->getVariable('title')->value;?>
 <?php echo $_smarty_tpl->getVariable('dtk')->value['site_title'];?>
 - <?php echo $_smarty_tpl->getVariable('dtk')->value['site_titlepre'];?>
</title>
<meta charset="utf-8" />
<meta name="author" content="<?php echo $_smarty_tpl->getVariable('dtk')->value['author'];?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->getVariable('dtk')->value['site_desc'];?>
" />
<meta name="keywords" content="<?php if ($_smarty_tpl->getVariable('titlepre')->value){?><?php echo $_smarty_tpl->getVariable('titlepre')->value;?>
,<?php }?><?php echo $_smarty_tpl->getVariable('dtk')->value['site_keyword'];?>
" />
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/css/html5.css" class="cssfx"/>

<!--google analasyse-->

<?php $_template = new Smarty_Internal_Template("require_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</head>
<body>
<?php if (islogin()){?>
<div id="PopElementContainer"></div>
<div id="PopMenuContainer">
	<div id="pop-blog-list-holder" class="pop-menu-list-holder" style="left: 940px; " >
		<div id="pop-blog-list-inner" class="pop-menu-list-inner">
			<div id="pop-blog-list-triangle" class="pop-menu-list-triangle"></div>
				<ul id="pop-blog-list" class="pop-menu-list">
					<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars["j"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('MyBoards')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
 $_smarty_tpl->tpl_vars["j"]->value = $_smarty_tpl->tpl_vars['d']->key;
?>
					<li class="" id="nav-blog-<?php echo $_smarty_tpl->tpl_vars['d']->value['boid'];?>
">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'magazine','boid'=>$_smarty_tpl->getVariable('MyBoards')->value[$_smarty_tpl->getVariable('j')->value]['boid']),$_smarty_tpl);?>
">
							<span class="pop-menu-extra blog-move-icon"></span>
							<span class="nav-blog-name"><?php echo $_smarty_tpl->tpl_vars['d']->value['boardname'];?>
</span>
						</a>
					</li>
					<?php }} ?>
			<li class="sub">
			<a href="javascript:void(0)" onclick="new_magazine()" title="再创建一个博客">
			<span class="aside-icon"></span>
			+再创建一个博客
			</a>
			</li>
			</ul>
		</div>
</div></div>
<?php }?>
<!-- ShareJs -->
<?php echo $_smarty_tpl->getVariable('dtk')->value['share_js'];?>

<div id="dd_header_holder">
<div id="dd_header">
	<div id="nav_holder">
		<div id="logo"><a title="<?php echo $_smarty_tpl->getVariable('title')->value;?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->getVariable('title')->value;?>
</a></div>
	</div>
	
	<ul id="nav">
		<li <?php if ($_smarty_tpl->getVariable('CurrentModule')->value=='waterfall'){?>class="current"<?php }?>><a class="nav_arrow" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'waterfall'),$_smarty_tpl);?>
">瀑布墙</a><?php if ($_smarty_tpl->getVariable('CurrentModule')->value=='waterfall'){?><div class="nav_arrow"></div><?php }?></li>
	<?php if (islogin()){?>
		<li <?php if ($_smarty_tpl->getVariable('CurrentModule')->value=='now'){?>class="current"<?php }?>><a class="nav_arrow" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'now'),$_smarty_tpl);?>
">此刻</a><?php if ($_smarty_tpl->getVariable('CurrentModule')->value=='now'){?><div class="nav_arrow"></div><?php }?></li>
		<li <?php if ($_smarty_tpl->getVariable('CurrentModule')->value=='index'){?>class="current"<?php }?>><a class="nav_arrow" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
">首页</a><?php if ($_smarty_tpl->getVariable('CurrentModule')->value=='index'){?><div class="nav_arrow"></div><?php }?></li>
	<?php }else{ ?>
		<li <?php if ($_smarty_tpl->getVariable('CurrentModule')->value=='now'){?>class="current"<?php }?>><a class="nav_arrow" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'now'),$_smarty_tpl);?>
">首页</a><?php if ($_smarty_tpl->getVariable('CurrentModule')->value=='now'){?><div class="nav_arrow"></div><?php }?></li>
	<?php }?>
	</ul>

	<?php if (islogin()){?>
		<ul id="nav-blog-list">
		<?php if ($_smarty_tpl->getVariable('MyBoards')->value){?>
			<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars["j"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('MyBoards')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
 $_smarty_tpl->tpl_vars["j"]->value = $_smarty_tpl->tpl_vars['d']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['d']->value['top']){?>					
					<li id="nav-blog-<?php echo $_smarty_tpl->tpl_vars['d']->value['boid'];?>
" <?php if ($_smarty_tpl->getVariable('CurrentModule')->value==$_smarty_tpl->tpl_vars['d']->value['boid']){?>class="current"<?php }?>><a class="nav_arrow" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'magazine','a'=>'all'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['boardname'];?>
</a><?php if ($_smarty_tpl->getVariable('CurrentModule')->value==$_smarty_tpl->tpl_vars['d']->value['boid']){?><div class="nav_arrow"></div><?php }?></li>
				<?php }else{ ?>
					<?php if ($_smarty_tpl->getVariable('j')->value>1){?>  
					<?php break 1?>
					<?php }?>
					<li id="nav-blog-<?php echo $_smarty_tpl->tpl_vars['d']->value['boid'];?>
" <?php if ($_smarty_tpl->getVariable('CurrentModule')->value==$_smarty_tpl->tpl_vars['d']->value['boid']){?>class="current"<?php }?>><a class="nav_arrow" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'magazine','boid'=>$_smarty_tpl->getVariable('MyBoards')->value[$_smarty_tpl->getVariable('j')->value]['boid']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['boardname'];?>
</a><?php if ($_smarty_tpl->getVariable('CurrentModule')->value==$_smarty_tpl->tpl_vars['d']->value['boid']){?><div class="nav_arrow"></div><?php }?></li>
				<?php }?>
			<?php }} ?>
		<?php }else{ ?>
			<li id="nav-blog-ditieker.com"<?php if ($_smarty_tpl->getVariable('CurrentModule')->value==$_smarty_tpl->getVariable('d')->value['boid']){?>class="current"<?php }?>><a class="nav_arrow" href="javascript:void(0)" onclick="new_magazine()" title="再创建一个博客">还没有杂志？新建一个吧</a></li>
		<?php }?>
		</ul>
		<?php if ($_smarty_tpl->getVariable('j')->value>=0){?>
		<div id="nav-blog-action">
			<a id="nav-more-blog" class="nav-more-blog" style="" onclick="emotion()">更多</a>
			<a id="nav-new-blog" class="nav-new-blog" href="javascript:void(0)" onclick="new_magazine()" title="再创建一个博客">再创建一本杂志</a>
			<span id="nav-more-blog-notice" class="header-pop-notice large-pop-notice blog-pop-notice" style="display:none;">new</span>
		</div>
		<?php }?>
	<?php }?>
	<div id="J_HeaderMiscAction" class="misc-action">
		<ul class="action-list">
			<?php if (islogin()){?>
			<li class="action-item">
				<a class="action-link discovery" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'discovery'),$_smarty_tpl);?>
" title="发现"></a>
			</li>
			<li class="action-item">
				<a class="action-link inbox" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'pm'),$_smarty_tpl);?>
" title="私信"></a>
			</li>
			<li class="action-item">
				<a class="action-link settings" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'setting'),$_smarty_tpl);?>
" title="设置"></a>
			</li>
			<li class="action-item">
				<?php if ($_SESSION['admin']==1){?><a class="text" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin'),$_smarty_tpl);?>
" title="后台">后台</a><?php }?>
			</li>
			<li class="action-item">
				<a class="action-link logout" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'logout'),$_smarty_tpl);?>
" title="退出"></a>
			</li>
			<?php }else{ ?>
				<li class="action-item"><a class="text" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
" title="登陆">登陆</a></li>
				<li class="action-item"><a class="text" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'reg'),$_smarty_tpl);?>
" title="注册">注册</a></li>
			<?php }?>
		</ul>
	</div>
	<div id="tool">
    </div>
</div>
	<div id="header_bg">
	
	<div class="clear"></div>

