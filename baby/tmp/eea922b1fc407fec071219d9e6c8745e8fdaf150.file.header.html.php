<?php /* Smarty version Smarty-3.0.6, created on 2014-11-03 17:24:53
         compiled from "/home/kingkong/Projects/php/baby/tpl/admin/header.html" */ ?>
<?php /*%%SmartyHeaderCode:1923983639545749e53eb647-26337170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eea922b1fc407fec071219d9e6c8745e8fdaf150' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/admin/header.html',
      1 => 1336897439,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1923983639545749e53eb647-26337170',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>地铁客开源轻博客系统 后台设置v1.7</title>
<script>var urlpath = '<?php echo $_smarty_tpl->getVariable('url')->value;?>
'</script> 
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/dialog/dialog.js?skin=mac"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/dialog/dialogTools.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/admin/style/global.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/global.js"></script>
<?php if ($_smarty_tpl->getVariable('editor')->value=='yes'){?>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/editor/xheditor.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/add.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/js/add2.js"></script>
<?php }?>
<link href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/css/reset.css" rel="stylesheet" type="text/css">
<link href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/admin/style/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/css/admin.css" class="cssfx"/>
</head>
<body>
<div id="wrap">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="137"><img src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/admin/style/logo.png" width="173" height="87" alt="ditieker os" /></td>
      <td class="menuline"><div class="menu">
          <ul>
            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'index'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_index')->value;?>
>首页</a></li>
            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'system'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_system')->value;?>
>系统管理</a> </li>
			<!--<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'site'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_site')->value;?>
>站点图片</a> </li>-->
            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blog'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_blog')->value;?>
>内容管理</a> </li>
            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'user'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_user')->value;?>
>用户管理</a></li>
            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'theme'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_theme')->value;?>
>主题管理</a></li>
            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'database'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_database')->value;?>
>数据管理</a></li>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'allpm'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_allpm')->value;?>
>私信管理</a></li>
            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main'),$_smarty_tpl);?>
">返回首页</a></li>
          </ul>
        </div></td>
    </tr>
  </table>
 
   <?php if (isset($_smarty_tpl->getVariable('get',null,true,false)->value['ac'])){?> <script>showprccmsg('<?php echo $_smarty_tpl->getVariable('get')->value['ac'];?>
')</script> <?php }?>