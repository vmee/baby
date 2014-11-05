<?php /* Smarty version Smarty-3.0.6, created on 2014-11-05 11:09:07
         compiled from "/home/kingkong/Projects/php/baby/tpl/magazine_index.html" */ ?>
<?php /*%%SmartyHeaderCode:869662958545994d3438bd9-13402503%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9640a456cbb96132a3bc82e9fa4b326cf6258f69' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/magazine_index.html',
      1 => 1336895923,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '869662958545994d3438bd9-13402503',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('titlepre',$_smarty_tpl->getVariable('tagname')->value);$_template->assign('index','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div id="article">
	
	<div id="magtool">
        <div class="img"><img src="<?php echo avatar(array('uid'=>$_smarty_tpl->getVariable('thisboard')->value['uid'],'size'=>'middle'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->getVariable('thisboard')->value['boardname'];?>
"/></div>
        <div class="pop">
			<?php if ($_smarty_tpl->getVariable('dtk')->value['addstate_switch']==1){?><li><a class="state">状态: <?php if ($_smarty_tpl->getVariable('num_state')->value!=0){?><?php echo $_smarty_tpl->getVariable('num_state')->value;?>
<?php }else{ ?>0<?php }?></a></li><?php }?>
			<?php if ($_smarty_tpl->getVariable('dtk')->value['addtext_switch']==1){?> <li><a class="text">文字: <?php if ($_smarty_tpl->getVariable('num_txt')->value!=0){?><?php echo $_smarty_tpl->getVariable('num_txt')->value;?>
<?php }else{ ?>0<?php }?></a></li><?php }?>
			<?php if ($_smarty_tpl->getVariable('dtk')->value['addmusic_switch']==1){?> <li><a class="music">音乐: <?php if ($_smarty_tpl->getVariable('num_music')->value!=0){?><?php echo $_smarty_tpl->getVariable('num_music')->value;?>
<?php }else{ ?>0<?php }?></a></li><?php }?>
			<?php if ($_smarty_tpl->getVariable('dtk')->value['addimg_switch']==1){?> <li><a class="photo">图片: <?php if ($_smarty_tpl->getVariable('num_pic')->value!=0){?><?php echo $_smarty_tpl->getVariable('num_pic')->value;?>
<?php }else{ ?>0<?php }?></a></li><?php }?>
			<?php if ($_smarty_tpl->getVariable('dtk')->value['addvideo_switch']==1){?><li><a class="video">视频: <?php if ($_smarty_tpl->getVariable('num_vedio')->value!=0){?><?php echo $_smarty_tpl->getVariable('num_vedio')->value;?>
<?php }else{ ?>0<?php }?></a></li><?php }?>
			<li class="magname">杂志名：<?php echo $_smarty_tpl->getVariable('thisboard')->value['boardname'];?>
</li>
			<!--<li><a href="#" class="link">其他</a></li>--> 
			<?php if ($_smarty_tpl->getVariable('thisboard')->value['uid']==$_SESSION['uid']){?>
			<div class="magedit">
				<a class="edit" href="javascript:void(0)" onclick="edit_magazine_name('<?php echo $_smarty_tpl->getVariable('thisboard')->value['boid'];?>
')">编辑</a>
				<a class="edit" href="javascript:void(0)" onclick="del_magazine_name('<?php echo $_smarty_tpl->getVariable('thisboard')->value['boid'];?>
')">删除</a>
			</div>
			<?php }?>			
		</div>
    </div>
	
	<!--<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'magazine','a'=>'magshow','boid'=>$_smarty_tpl->getVariable('boid')->value['boid']),$_smarty_tpl);?>
" >点击生成对应ID的xml文件</a>-->
	<div id="feedArea">
		<?php $_template = new Smarty_Internal_Template("require_magfeeds.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('data',$_smarty_tpl->getVariable('feeds')->value);$_template->assign('limits',10); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	</div>
</div>

<div id="aside">
   <?php $_template = new Smarty_Internal_Template("require_sider.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('in_tagindex',true); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>