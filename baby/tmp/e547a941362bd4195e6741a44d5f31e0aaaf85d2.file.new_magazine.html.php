<?php /* Smarty version Smarty-3.0.6, created on 2014-11-03 17:37:19
         compiled from "/home/kingkong/Projects/php/baby/tpl/new_magazine.html" */ ?>
<?php /*%%SmartyHeaderCode:61702334054574ccfe5d881-22443904%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e547a941362bd4195e6741a44d5f31e0aaaf85d2' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/new_magazine.html',
      1 => 1336662481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61702334054574ccfe5d881-22443904',
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
 <?php echo $_smarty_tpl->getVariable('dtk')->value['site_title'];?>
 - <?php echo $_smarty_tpl->getVariable('dtk')->value['site_titlepre'];?>
</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/css/collect.css"/>
	
	<?php $_template = new Smarty_Internal_Template("require_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	</head>

<body>
	<h2 id="title">创建一本新杂志</h2>
	<form id="create-tblog-form" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'newmag_do'),$_smarty_tpl);?>
" method="post">
		<input type="hidden" name="formKey" >
		<div id="input_container">
			<div class="newmag_left" ><label for="blogName">杂志名字:</label></div>
			
			<input class="newmag_input" type="text" id="MagName" name="MagName" >
			
		</div>
	</form>
	
	<script>
		(function () {
		var parent = art.dialog.parent,				// 父页面window对象
			api = art.dialog.open.api,	// 			art.dialog.open扩展方法
			$ = function (id) {return document.getElementById(id)},
			form = $('create-tblog-form'),
			magname = $('MagName');

		if (!api) return;

		parent.document.title = 'iframe中的javascirpt到此一游';

		// 操作对话框
		api.title('系统登录')
			// 自定义按钮
			.button(
				{
					name: '登录',
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