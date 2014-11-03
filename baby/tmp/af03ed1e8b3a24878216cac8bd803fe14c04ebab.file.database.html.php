<?php /* Smarty version Smarty-3.0.6, created on 2014-11-03 17:26:31
         compiled from "/home/kingkong/Projects/php/baby/tpl/admin/database.html" */ ?>
<?php /*%%SmartyHeaderCode:88466320254574a4738a961-26882557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af03ed1e8b3a24878216cac8bd803fe14c04ebab' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/admin/database.html',
      1 => 1336896133,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88466320254574a4738a961-26882557',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
  <div id="content">
   
    
     <h2>数据库管理</h2>
     <div>数据恢复请使用PHPMYADMIN的导入功能，将备份的SQL数据导入。</div>
<form id="form1" name="form1" method="post" action="">
      <?php if ($_smarty_tpl->getVariable('get')->value['chk']){?>
      <div>已检查所有表，请对有问题的表点击修复操作进行修复</div>
      <input type="button" value="返回" onclick="window.location.href='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'database'),$_smarty_tpl);?>
'"/>
      <?php }else{ ?><input name="chk" type="submit" value="检查所有表" />
      <?php }?>
    |   <a href="javascript:void(0)" id="download" onclick="databseOut('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'database','ouall'=>'yes'),$_smarty_tpl);?>
')">备份全部数据</a>
      </form>  </th>
    </tr>
</table>

    
    
 <h2>使用中</h2>
	  <form id="form1" name="form1" method="post" action="">
    <table width="100%" class="table2">
    <tr>
      <th align="center" valign="middle">数据表</th>
        <th width="30" align="center" valign="middle">引擎</th>
         <th width="70" align="center" valign="middle">字符集</th>
         
        <th width="50" align="center" valign="middle">占用空间</th>
       
        <th width="50" align="center" valign="middle">记录数</th>
        <th width="40" align="center" valign="middle">表状态</th>
        
        <th width="70" align="center" valign="middle">创建时间</th>
         <th width="70" align="center" valign="middle">更新时间</th>
        <th width="70" align="center" valign="middle">检查时间</th>
        
        <th width="100" valign="middle">多余</th>
        <th width="130" align="center"  valign="middle">操作</th>
      </tr>
  <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('table')->value['rs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
    <tr>
      <td><?php echo $_smarty_tpl->tpl_vars['d']->value['TABLE_NAME'];?>
<?php if ($_smarty_tpl->tpl_vars['d']->value['TABLE_COMMENT']!=''){?>(<?php echo $_smarty_tpl->tpl_vars['d']->value['TABLE_COMMENT'];?>
)<?php }?></td>
      <td valign="middle"><?php echo $_smarty_tpl->tpl_vars['d']->value['ENGINE'];?>
</td>
        <td valign="middle"><?php echo $_smarty_tpl->tpl_vars['d']->value['TABLE_COLLATION'];?>
</td>
        
         <td valign="middle"><?php echo formatBytes(array('size'=>$_smarty_tpl->tpl_vars['d']->value['DATA_LENGTH']),$_smarty_tpl);?>
</td>
         <td valign="middle"><?php echo $_smarty_tpl->tpl_vars['d']->value['TABLE_ROWS'];?>
</td>
        <td valign="middle"><?php if ($_smarty_tpl->tpl_vars['d']->value['ROW_FORMAT']=='Dynamic'){?>动态<?php }else{ ?>静态<?php }?></td>
        
        <td valign="middle"><?php echo dtktime(array('time'=>strtotime($_smarty_tpl->tpl_vars['d']->value['CREATE_TIME'])),$_smarty_tpl);?>
</td>
        <td valign="middle"><?php echo dtktime(array('time'=>strtotime($_smarty_tpl->tpl_vars['d']->value['UPDATE_TIME'])),$_smarty_tpl);?>
</td>
        <td valign="middle"><?php echo dtktime(array('time'=>strtotime($_smarty_tpl->tpl_vars['d']->value['CHECK_TIME'])),$_smarty_tpl);?>
</td>

        <td valign="middle"><?php if ($_smarty_tpl->tpl_vars['d']->value['DATA_FREE']!=0){?><?php echo formatBytes(array('size'=>$_smarty_tpl->tpl_vars['d']->value['DATA_FREE']),$_smarty_tpl);?>
 <?php }else{ ?>正常 <?php }?></td>
        <td align="right" valign="middle">
      
        <?php if ($_smarty_tpl->tpl_vars['d']->value['DATA_FREE']!=0){?><input type="button" name="button" id="button" value="优化表" onclick="tableOp('<?php echo $_smarty_tpl->tpl_vars['d']->value['TABLE_NAME'];?>
')" /> <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['d']->value['CHECK_TABLE']!='OK'&&$_smarty_tpl->tpl_vars['d']->value['CHECK_TABLE']!='NCHECK'){?>
          <input type="button" name="button" id="button" value="修复表" onclick="tableRep('<?php echo $_smarty_tpl->tpl_vars['d']->value['TABLE_NAME'];?>
','<?php echo $_smarty_tpl->tpl_vars['d']->value['CHECK_TABLE'];?>
')"  />
         <?php }?>
         
         <?php if (!isset($_smarty_tpl->tpl_vars['d']) || !is_array($_smarty_tpl->tpl_vars['d']->value)) $_smarty_tpl->createLocalArrayVariable('d');
if ($_smarty_tpl->tpl_vars['d']->value['DATA_FREE'] = 0||$_smarty_tpl->tpl_vars['d']->value['CHECK_TABLE']!='NCHECK'||$_smarty_tpl->tpl_vars['d']->value['CHECK_TABLE']!='OK'){?> 
          <input type="button" name="button" id="tab_o_<?php echo $_smarty_tpl->tpl_vars['d']->value['TABLE_NAME'];?>
" value="导出" onclick="outputTab('<?php echo $_smarty_tpl->tpl_vars['d']->value['TABLE_NAME'];?>
')"  />
           <?php }?>
        </td>
      </tr>
  
   <?php }} ?>
   <tr>
      <td>表总数：<strong><?php echo $_smarty_tpl->getVariable('table')->value['all_table'];?>
</strong></td>
      <td valign="middle"></td>
        <td align="right" valign="middle">占用空间：</td>
        
         <td valign="middle"><?php echo formatBytes(array('size'=>$_smarty_tpl->getVariable('table')->value['all_byte']),$_smarty_tpl);?>
</td>
         <td valign="middle">&nbsp;</td>
        <td valign="middle">&nbsp;</td>
        
        <td valign="middle">&nbsp;</td>
      <td valign="middle">&nbsp;</td>
        <td align="right" valign="middle">多余:</td>
        <td valign="middle"><?php echo formatBytes(array('size'=>$_smarty_tpl->getVariable('table')->value['all_free']),$_smarty_tpl);?>
</td>
        <td valign="middle"></td>
      </tr>
    </table>
    </form>

    
    
   
  </div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
