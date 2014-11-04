<?php /* Smarty version Smarty-3.0.6, created on 2014-11-04 13:15:34
         compiled from "/home/kingkong/Projects/php/baby/tpl/theme/default/footer.html" */ ?>
<?php /*%%SmartyHeaderCode:1497680046545860f632a349-97174675%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6b67f253972b8fabddfb994e7aab834606f1dee' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/theme/default/footer.html',
      1 => 1320734418,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1497680046545860f632a349-97174675',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/kingkong/Projects/php/baby/init/Drivers/Smarty/plugins/modifier.date_format.php';
?>

<div id="foorer">
<small>Powered by  <a href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/<?php echo $_smarty_tpl->getVariable('domain')->value;?>
"><?php echo $_smarty_tpl->getVariable('username')->value;?>
</a>&nbsp;&amp;&nbsp;<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->getVariable('yb')->value['soft'];?>
 <b><?php echo $_smarty_tpl->getVariable('yb')->value['version'];?>
</a>
 2011-<?php echo smarty_modifier_date_format(time(),"%Y");?>
&nbsp;<?php echo $_smarty_tpl->getVariable('yb')->value['site_icp'];?>
<?php echo $_smarty_tpl->getVariable('yb')->value['site_count'];?>
 </small>


</div>
</div>
</div>
</div>
</body>
</html>
