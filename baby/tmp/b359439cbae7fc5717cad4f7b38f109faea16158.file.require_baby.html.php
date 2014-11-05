<?php /* Smarty version Smarty-3.0.6, created on 2014-11-05 14:48:43
         compiled from "/home/kingkong/Projects/php/baby/tpl/require_baby.html" */ ?>
<?php /*%%SmartyHeaderCode:3838511575459c84bea3a62-49505634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b359439cbae7fc5717cad4f7b38f109faea16158' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/require_baby.html',
      1 => 1415170120,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3838511575459c84bea3a62-49505634',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if (!$_smarty_tpl->getVariable('MyBabys')->value){?>
<div id="postblog">
        <div class="img"><img src="<?php echo avatar(array('uid'=>$_SESSION['uid'],'size'=>'middle'),$_smarty_tpl);?>
" alt="<?php echo $_SESSION['username'];?>
" class="face"/></div>
		<div class="pop">
            还没有宝宝？<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'baby','a'=>'add'),$_smarty_tpl);?>
" title="入驻宝宝">入驻宝宝</a>
		</div>
	  
    </div>
<?php }?>