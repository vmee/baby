<?php /* Smarty version Smarty-3.0.6, created on 2014-11-05 13:07:36
         compiled from "/home/kingkong/Projects/php/baby/tpl/recommend.html" */ ?>
<?php /*%%SmartyHeaderCode:2098289065459b0982308b4-76535870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fec1cb243a70c8d5a8ab1073f1409f5e5ff19e3f' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/recommend.html',
      1 => 1336662481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2098289065459b0982308b4-76535870',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include '/home/kingkong/Projects/php/baby/init/Drivers/Smarty/plugins/function.cycle.php';
?><?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('layout','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


<div class="channle">
<div class="welcome"> <?php echo $_smarty_tpl->getVariable('feeds')->value;?>
 </div>
<div class="htag">
  <div class="htag">
    <table width="900" cellpadding="0" class="hottab" cellspace="0">
      <thead>
        <tr >
          <th width="167" class="tag-hd">热门标签</th>
          <th width="322" class="hot-hd">标签热度</th>
          <th width="171" class="editor-hd">最新更新时间</th>
          <th width="228" class="editor-hd">贡献者博客</th>
         
        </tr>
      </thead>
      <tbody>
      
      <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('htag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
      <tr class="tag-row <?php echo smarty_function_cycle(array('values'=>"odd,add"),$_smarty_tpl);?>
">
        <td class="tag"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'tag','tag'=>$_smarty_tpl->tpl_vars['d']->value['title']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
</a></td>
        <td class="hot"><div class="state" style="width:<?php echo checkHit(array('max'=>$_smarty_tpl->getVariable('hotMax')->value,'val'=>$_smarty_tpl->tpl_vars['d']->value['num']),$_smarty_tpl);?>
%"><?php echo $_smarty_tpl->tpl_vars['d']->value['num'];?>
</div> </td>
        <td class="editor"><?php echo dtktime(array('time'=>$_smarty_tpl->tpl_vars['d']->value['updates']),$_smarty_tpl);?>
&nbsp;</td>
        <td class="editor">
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'userblog','a'=>'index','domain'=>$_smarty_tpl->tpl_vars['d']->value['user']['domain']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['d']->value['user']['username'];?>
" target="_blank"> <img src="<?php echo avatar(array('uid'=>$_smarty_tpl->tpl_vars['d']->value['user']['uid'],'size'=>'small'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['d']->value['user']['username'];?>
" align="absmiddle"/><?php echo $_smarty_tpl->tpl_vars['d']->value['user']['username'];?>
</a>
        </td>
       
      </tr>
      <?php }} ?>
      </tbody>
      
    </table>
  </div>
</div>
</div>
<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>