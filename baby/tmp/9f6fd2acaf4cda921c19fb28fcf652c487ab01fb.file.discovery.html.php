<?php /* Smarty version Smarty-3.0.6, created on 2014-11-03 17:25:26
         compiled from "/home/kingkong/Projects/php/baby/tpl/discovery.html" */ ?>
<?php /*%%SmartyHeaderCode:111272799954574a069729d4-45552333%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f6fd2acaf4cda921c19fb28fcf652c487ab01fb' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/discovery.html',
      1 => 1336665347,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111272799954574a069729d4-45552333',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('discovery','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link rel="stylesheet" type="text/css" media="screen" href="tpl/image/css/recommend.css" />

<style>
.syscateul {
	   margin: 0 -1px;
	 background: url("tpl/image/syscateline.png");
	 height:auto;
}

.syscate h3{ font-size:24px; margin-bottom:15px }
.syscate{margin:20px; background-color:#FFF;border-radius: 7px;padding:20px}
.syscate li {
    float: left;
    margin: 3px 0;
    padding: 0 12px;
    width: 81px;
}
.syscate li a,.syscate li a:hover,.syscate li a:visited{
    color: #193E5C;
    display: block;
    font-size: 14px;
    height: 20px;
    line-height: 20px;
    text-align: center;
    width: 81px;
}
.syscate li.selected a, .syscate li.selected a:link, .syscate li.selected a:visited, .syscate li.selected a:hover,.syscate li a:hover {
	text-decoration:none;
    background: none repeat scroll 0 0 #4DBAFD;
    border-radius: 3px;
    color: #FFFFFF;
}
#showuser
{
	margin: 0 1px 20px;
    overflow: hidden;
    width: 880px;
	margin-left: -20px;
	margin-top:20px;

}

.blogitem {
    border: 1px solid #E5E8E8;
    border-radius: 4px;
    display: inline;
    float: left;
	height:170px;
    margin: 0 0 20px 15px;
    padding: 9px;
    position: relative;
    width: 180px;
    word-wrap: break-word;
	overflow:hidden;
}
.face {border-radius: 8px; float:left; margin-right:10px}
.title {
    font-size: 16px;
	float:left;
    font-weight: 700;
    height: 30px;
    line-height: 30px;
    overflow: hidden;
}
.sign {
	margin:10px 0px;
    color: #666666;
    font-size: 12px;
    line-height: 16px;
	height:50px;
	overflow:hidden;
    overflow: hidden;
}
.blogitem-new {
    background: url("tpl/image/new.png") no-repeat scroll 0 0 transparent;
    display: block;
    height: 63px;
    left: -10px;
    overflow: hidden;
    position: absolute;
    text-indent: -9999px;
    top: -10px;
    width: 63px;
}
</style>
<div class="contentTop"></div>

<div class="syscate">
<h3>发现兴趣,关注作者</h3>
	<ul class="syscateul clearfix">
    <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'discovery','cateall'=>true),$_smarty_tpl);?>
">全部</a></li>
	<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cate')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
     <?php if ($_smarty_tpl->getVariable('currcid')->value==$_smarty_tpl->tpl_vars['d']->value['cid']){?>
		<li class="selected"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'discovery','cid'=>$_smarty_tpl->tpl_vars['d']->value['cid'],'catename'=>$_smarty_tpl->tpl_vars['d']->value['catename']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['catename'];?>
</a></li>
    <?php }else{ ?>
    	<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'discovery','cid'=>$_smarty_tpl->tpl_vars['d']->value['cid'],'catename'=>$_smarty_tpl->tpl_vars['d']->value['catename']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['catename'];?>
</a></li>
    <?php }?>
    <?php }} ?>
    </ul>
    <h3 style="margin-top:15px">关注与您兴趣相投的作者<?php echo $_GET['catename'];?>
</h3>
    <?php if ($_SESSION['uid']!=''){?>
    <div>我的博客关键字：<?php if ($_smarty_tpl->getVariable('user')->value['blogtag']){?><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'discovery','catename'=>$_smarty_tpl->getVariable('user')->value['blogtag']),$_smarty_tpl);?>
">看看谁跟我关注的兴趣相同</a><?php }else{ ?>
    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'setting'),$_smarty_tpl);?>
">您还没设置博客关键字,请先设置后在来试试</a><?php }?>
    ,我在:<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'discovery','catename'=>$_smarty_tpl->getVariable('local')->value[0],'local'=>true),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->getVariable('local')->value[0];?>
,看看谁和我在一块</a>
</div>
    <?php }else{ ?>
    	<div>您还没有登录，登陆后可以发现更多内容哟 您可以<a href="javascript:void(0)" onClick="loginBox('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
')">登陆</a> 或
            <a href="javascript:void(0)" onClick="regBox('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'reg'),$_smarty_tpl);?>
')">注册</a></div>
    <?php }?>
    <div id="showuser" class="clearfix">
     <?php $_template = new Smarty_Internal_Template("require_discovery_user.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('data',$_smarty_tpl->getVariable('userinfo')->value); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    </div>

    <div id="feedAjaxTool" page="2" max="8" area="showuser" query="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'discovery','ajaxload'=>true),$_smarty_tpl);?>
" class="feedajax">
    <a href="javascript:void(0)" onclick="continueShow('feedAjaxTool')">查看更多...</a>
    <script>feedToolBar('feedAjaxTool');</script>


</div>

</div>
<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>