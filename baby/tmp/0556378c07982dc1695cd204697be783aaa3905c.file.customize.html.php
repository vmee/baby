<?php /* Smarty version Smarty-3.0.6, created on 2014-11-04 13:15:52
         compiled from "/home/kingkong/Projects/php/baby/tpl/customize.html" */ ?>
<?php /*%%SmartyHeaderCode:16259231545861087a73a9-32877468%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0556378c07982dc1695cd204697be783aaa3905c' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/customize.html',
      1 => 1336898889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16259231545861087a73a9-32877468',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>定制界面</title>
<?php $_template = new Smarty_Internal_Template("require_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('custom','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<style>
body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,form,fieldset,input,textarea,p,blockquote,th,td{padding:0;margin:0;}
fieldset, img{border:0;}
table{border-collapse: collapse;border-spacing:0;}
ol,ul{list-style: none;}
address,caption,cite,code,dfn,em,strong,th,var{font-weight:normal;font-style:normal;}
caption,th{text-align:left;}
h1,h2,h3,h4,h5,h6{font-weight: normal;font-size: 100%;}
q:before,q:after{content:'';}
abbr,acronym{border:0;}
.customizeTool{
	/*position:fixed;*/
	width:100%;
}
.customizeTool .head{
	background:#1F1F1F;
	box-shadow: 0 1px 2px rgba(0,0,0,0.7);
    font-size: 12px;
    height: 50px;
}


	
.customizeTool .head a{
	display:block;
	height:50px;
	font-size:14px;
	padding:0px 18px;
	float:left;
	margin-right:2px;
	line-height:50px;
	text-decoration:none;
	color:#BABABA
}
.customizeTool .head a:hover{
	background:#313131;
}
.customizeTool .head a.current{
	background:#313131;
}

.customizeTool .savebutton{
	float:right;
}
.customizeTool .savebutton a{
	margin-right:5px
}

.allThemes{
	margin:0px;
	background-color:#fff;
	border-bottom: 1px solid #B1B1B1;
	box-shadow: 0 1px 4px rgba(0,0,0,0.7);
	/*display:none;*/
}

.allThemes .theme{
	display:block;
	width:208px;
	margin:20px;
	float:left;
}

.allThemes .theme a{
	display:block;
	width:200px;
	border:4px solid #E2E2E2;
}
.allThemes .theme a:hover{
	border:4px solid #F9D853;
}
.allThemes .custom{
	padding:20px;
}


.allThemes .theme h3{
	margin-top:5px;
 	color: #333333;
	font-size: 14px;
	word-wrap: break-word;	
}
.customtable tr td{
	padding:5px
}
.customtable .colorinput{
	width:60px;
}
.customtable .priew{
	padding:5px 10px;
}

.clearfix{
	zoom:1
}
.clearfix:after{
	content:"";display:block;height:0;line-height:0;font-size:0;visibility:hidden;clear:both
}

</style>

</head>

<body>
<div class="customizeTool">
	<div class="head">
    <?php if ($_smarty_tpl->getVariable('type')->value==''){?><a href="javascript:void(0)" onclick="slideToggle()" class="current">模板主题</a><?php }else{ ?> <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'userblog','a'=>'customize'),$_smarty_tpl);?>
">模板主题</a><?php }?>
    <?php if ($_smarty_tpl->getVariable('type')->value=='my'){?><a href="javascript:void(0)" onclick="slideToggle()" class="current">专属主题</a><?php }else{ ?><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'userblog','a'=>'customize','type'=>'my'),$_smarty_tpl);?>
">专属主题</a><?php }?>
    <?php if ($_smarty_tpl->getVariable('type')->value=='custom'){?><a href="javascript:void(0)" onclick="slideToggle()" class="current">自定义主题外观</a><?php }else{ ?><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'userblog','a'=>'customize','type'=>'custom'),$_smarty_tpl);?>
">自定义主题外观</a><?php }?> 
    <div class="savebutton"><a href="javascript:void(0)" onclick="saveConfig('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'userblog','a'=>'customize','action'=>'send'),$_smarty_tpl);?>
')">保存设置</a>
    <a href="javascript:void(0)" onclick="CannlConfig('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'userblog','a'=>'customize','action'=>'cal'),$_smarty_tpl);?>
')">取消</a></div>
    </div>
	
    <div class="allThemes clearfix">
    <?php if ($_smarty_tpl->getVariable('type')->value=='custom'){?>
    
    <div class="custom">
    <form id="form1" name="form1" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'userblog','a'=>'customize','type'=>'custom'),$_smarty_tpl);?>
" enctype="multipart/form-data">
    <table width="677" border="0" cellspacing="0" cellpadding="0" class="customtable">
      <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('setting')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
      <tr>
          <td width="80"><?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
</td>
          <td width="287"><?php echo themecustom(array('type'=>$_smarty_tpl->tpl_vars['d']->value['type'],'data'=>$_smarty_tpl->tpl_vars['d']->value['options'],'id'=>$_smarty_tpl->tpl_vars['d']->value['id'],'lable'=>$_smarty_tpl->tpl_vars['d']->value['findid'],'default'=>$_smarty_tpl->tpl_vars['d']->value['default'],'formvalue'=>$_SESSION['customize']['config']),$_smarty_tpl);?>
</td>
          <td width="310"><?php echo $_smarty_tpl->tpl_vars['d']->value['description'];?>
</td>
        </tr>
      <?php }} ?>
         <tr>
          <td colspan="3"><input type="submit" name="submit" id="submit" value="预览" class="priew"/>
          <input type="button" value="回归默认" class="priew" onclick="customDefault('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'userblog','a'=>'customize','customdefault'=>'yes'),$_smarty_tpl);?>
')"/></td>
          </tr>
       
    </table>
 	</form>
    
    </div>
    
    <?php }else{ ?>

       <?php if ($_smarty_tpl->getVariable('type')->value!='my'){?>
         <div class="theme">
         <a href="javascript:void(0)" onclick="setThemeId('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'userblog','a'=>'customize','skinid'=>'default'),$_smarty_tpl);?>
')"><img src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/theme/default/cover.jpg" width="200" height="120" /></a>
          <h3>经典</h3>
         </div>
         <?php }?>
    
        <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('skins')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
         <div class="theme">
         <a href="javascript:void(0)" onclick="setThemeId('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'userblog','a'=>'customize','skinid'=>$_smarty_tpl->tpl_vars['d']->value['id']),$_smarty_tpl);?>
')"><img src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/theme/<?php echo $_smarty_tpl->tpl_vars['d']->value['skindir'];?>
/cover.jpg" width="200" height="120" /></a>
          <h3><?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['d']->value['usernumber']>10){?>(<?php echo $_smarty_tpl->tpl_vars['d']->value['usenumber'];?>
)<?php }?></h3>
         </div>
         <?php }} else { ?>
         <div class="theme">
         <a href="javascript:void(0)"><img src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/theme/default/nocover.jpg" width="200" height="120" /></a>
          <h3>没有更多主题</h3>
         </div>
         <?php } ?>
         
    <?php }?>     
   
      
    
    </div>
    
</div>
<iframe width="100%" frameborder="0" name="previewIframe" id="previewIframe" src="<?php echo goUserHome(array('uid'=>$_SESSION['uid']),$_smarty_tpl);?>
"></iframe>
<script type="text/javascript">
window.setInterval("reinitIframe()", 100);
</script>
</body>
</html>
