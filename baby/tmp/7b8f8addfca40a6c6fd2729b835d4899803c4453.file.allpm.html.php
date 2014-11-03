<?php /* Smarty version Smarty-3.0.6, created on 2014-11-03 17:26:32
         compiled from "/home/kingkong/Projects/php/baby/tpl/admin/allpm.html" */ ?>
<?php /*%%SmartyHeaderCode:4735569154574a4880b3a3-70284870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b8f8addfca40a6c6fd2729b835d4899803c4453' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/admin/allpm.html',
      1 => 1336896355,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4735569154574a4880b3a3-70284870',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
  <div id="content">
   
    <h2>给所有用户发送私信</h2>
    <table width="100%" class="table">

      <tr>
        <td width="25%"><a href="javascript:void(0)" onclick="sendallpm()">发送私信</a></td>
      </tr>
    </table>
	
     <h2>搜索</h2>
    <form id="form1" name="form1" method="post" action="">
    <table width="100%" class="table">

      <tr>
        <td width="25%">用户邮箱、用户昵称、用户域名</td>
        <td ><input name="where" type="text" value="<?php echo $_smarty_tpl->getVariable('get')->value['niname'];?>
"/></td>
		<td><input name="submit" type="submit" value="搜索" /></td>
      </tr>
    </table>
    </form>
	
    
 <h2>用户列表，共 <?php echo $_smarty_tpl->getVariable('countuser')->value;?>
 名会员</h2>
	  <div class="nav"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
</div>
    <table width="100%" class="table2">
    <tr>

        <th width="30" align="center" valign="middle">UID</th>
         <th width="120" align="center" valign="middle">账号</th>
        <th width="40" align="center" valign="middle">访问</th>
       
        <th width="140" align="center" valign="middle">昵称</th>
        <th width="100" align="center" valign="middle">注册</th>
        <th width="100" align="center" valign="middle">登陆</th>
        <th width="40" align="center" valign="middle">发布</th>
        <th width="40" align="center"  valign="middle">跟随</th>
        <th width="40" align="center"  valign="middle">喜欢</th>
		<th width="80" align="center"  valign="middle">发送私信</th>
      </tr>
  <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('user')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
    <tr>
      <td><?php echo $_smarty_tpl->tpl_vars['d']->value['uid'];?>
</td>
            <td valign="middle"><a href="<?php echo goUserHome(array('domain'=>$_smarty_tpl->tpl_vars['d']->value['domain'],'uid'=>$_smarty_tpl->tpl_vars['d']->value['uid']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
</a></td>
        <td valign="middle" align="center"><?php if ($_smarty_tpl->tpl_vars['d']->value['open']==1){?>允许<?php }else{ ?>禁止<?php }?></td>
        <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
</td>
        <td valign="middle" align="center"><?php echo dtktime(array('time'=>$_smarty_tpl->tpl_vars['d']->value['regtime']),$_smarty_tpl);?>
</td>
        <td valign="middle" align="center"><?php echo dtktime(array('time'=>$_smarty_tpl->tpl_vars['d']->value['logtime']),$_smarty_tpl);?>
</td>
        <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['d']->value['num'];?>
</td>
        <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['d']->value['flow'];?>
</td>
        <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['d']->value['likenum'];?>
</td>
	   <td valign="middle" align="center"><a href="javascript:void(0)" onclick="sendpm(<?php echo $_smarty_tpl->tpl_vars['d']->value['uid'];?>
)">发送私信</a></td>
      </tr>
   <?php }} ?>
    </table>
    

    
    <div class="nav"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
</div>
    
    
    
   
  </div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
