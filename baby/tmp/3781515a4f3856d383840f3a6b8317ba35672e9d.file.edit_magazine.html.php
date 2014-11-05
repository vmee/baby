<?php /* Smarty version Smarty-3.0.6, created on 2014-11-05 13:02:04
         compiled from "/home/kingkong/Projects/php/baby/tpl/admin/edit_magazine.html" */ ?>
<?php /*%%SmartyHeaderCode:9359097165459af4c923e62-70428195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3781515a4f3856d383840f3a6b8317ba35672e9d' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/admin/edit_magazine.html',
      1 => 1332667306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9359097165459af4c923e62-70428195',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<!doctype html>
<html lang="zh-cn">
<head>
    <title><?php if ($_smarty_tpl->getVariable('titlepre')->value){?><?php echo $_smarty_tpl->getVariable('titlepre')->value;?>
 -<?php }?> <?php echo $_smarty_tpl->getVariable('title')->value;?>
 <?php echo $_smarty_tpl->getVariable('yb')->value['site_title'];?>
 - <?php echo $_smarty_tpl->getVariable('yb')->value['site_titlepre'];?>
</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/css/collect.css"/>
	<?php $_template = new Smarty_Internal_Template("require_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	</head>

<body>
	<h2 id="title">编辑杂志：<?php echo $_smarty_tpl->getVariable('board')->value['boardname'];?>
</h2>
	<form id="edit-board-form" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'edit_magazine_do'),$_smarty_tpl);?>
" method="post">
		<input type="hidden" name="formKey" >
		<div class="input_container">
			<div class="board_name" ><label for="blogName">杂志名字:</label></div>
			<input class="board_name_input" type="text" id="MagName" name="MagName" value="<?php echo $_smarty_tpl->getVariable('board')->value['boardname'];?>
">
			<input type="hidden" name="Uid" value="<?php echo $_smarty_tpl->getVariable('board')->value['uid'];?>
">
			<input type="hidden" name="boid" value="<?php echo $_smarty_tpl->getVariable('board')->value['boid'];?>
">
		</div>
	</form>
	
	<script>
		(function () {
		var parent = art.dialog.parent,// 父页面window对象
			api = art.dialog.open.api,//art.dialog.open扩展方法
			$ = function (id) {return document.getElementById(id)},
			form = $('edit-board-form'),
			magname = $('MagName');
		if (!api) return;
		parent.document.title = '编辑杂志';
		// 操作对话框
		api.title('系统登录')
			// 自定义按钮
			.button(
				{
					name: '修改',
					callback: function () {
						if (check(MagName) form.submit();
						return false;
					},
					focus: true
				},
				{
					name: '取消'
				}
			);
		// 表单验证
		var check = function (input) {
			if (input.value === '') {
				inputError(input);
				input.focus();
				return false;
			} else {
				return true;
			};
		};
		window.onload = function () {setTimeout(function () {username.focus()}, 240);};
		})();
		</script>
		
	</div>
</body>