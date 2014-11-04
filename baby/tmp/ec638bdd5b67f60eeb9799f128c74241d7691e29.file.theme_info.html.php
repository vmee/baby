<?php /* Smarty version Smarty-3.0.6, created on 2014-11-04 13:14:21
         compiled from "/home/kingkong/Projects/php/baby/tpl/admin/theme_info.html" */ ?>
<?php /*%%SmartyHeaderCode:553375207545860ad0ea644-92764566%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec638bdd5b67f60eeb9799f128c74241d7691e29' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/admin/theme_info.html',
      1 => 1320733684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '553375207545860ad0ea644-92764566',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
  <div id="content">

    
 <h2>主题编辑 - <?php echo $_smarty_tpl->getVariable('skin')->value['name'];?>
 <?php echo $_smarty_tpl->getVariable('skin')->value['version'];?>
</h2>
 <div style="margin:10px 0px"></div>
 <form action="" method="post">
 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table2">
  <tr>
    <td colspan="2"><b>主题图片</b></td>
  </tr>
  <tr>
    <td><span style="margin:10px 0px"><img src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/theme/<?php echo $_smarty_tpl->getVariable('skin')->value['skindir'];?>
/cover.jpg" width="200" height="120" /></span></td>
    <td>修改主题图片请上传200*120的jpg覆盖原始图片</td>
  </tr>
  <tr>
    <td><b>主题开关</b></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="radio" name="open"  value="1"  <?php if ($_smarty_tpl->getVariable('skin')->value['open']==1){?> checked="checked" <?php }?> />开启
    <input type="radio" name="open"  value="0"  <?php if ($_smarty_tpl->getVariable('skin')->value['open']==0){?> checked="checked" <?php }?> />关闭</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><b>主题名称</b></td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><input name="name" type="text" value="<?php echo $_smarty_tpl->getVariable('skin')->value['name'];?>
" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><b>主题作者</b></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $_smarty_tpl->getVariable('skin')->value['author'];?>
</td>
  </tr>
 
  <tr>
    <td colspan="2"><b>主题位置</b></td>
    </tr>
  <tr>
    <td width="571"><?php echo @APP_PATH;?>
/tpl/theme/<input name="skindir" type="text" value="<?php echo $_smarty_tpl->getVariable('skin')->value['skindir'];?>
" />&nbsp;</td>
    <td>修改主题位置请对应的修改文件夹名称</td>
    </tr>
  
  <tr>
    <td><b>专属主题设置</b></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="text" name="exclusive" id="exclusive" value="<?php echo $_smarty_tpl->getVariable('skin')->value['exclusive'];?>
"/></td>
    <td>请输入允许使用该主题的用户UID,为空则不限制</td>
  </tr>
  
 
  <tr>
    <td><b>主题钩子</b></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><textarea name="confswitch" id="textarea" cols="45" rows="5" style="width:100%;height:150px"><?php echo $_smarty_tpl->getVariable('skin')->value['confswitch'];?>
</textarea></td>
    <td>&nbsp;请勿任意修改</td>
  </tr>
  <tr>
    <td><b>主题预定义数据</b></td>
    <td></td>
  </tr>
  <tr>
    <td>请使用主题制作工具编辑</td>
    <td>&nbsp;</td>
  </tr>
 
 </table>
 <input name="submit" type="submit" value="保存" /> 
  <input name="submit" type="button" value="返回" onclick="window.history.go(-1)" class="submit"/>
  <input name="submit" type="button" value="卸载主题" onclick="unInstallTheme(<?php echo $_smarty_tpl->getVariable('skin')->value['id'];?>
)" class="submit"/>
</form>
    
    
   
  </div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
