<?php /* Smarty version Smarty-3.0.6, created on 2014-11-03 17:25:55
         compiled from "/home/kingkong/Projects/php/baby/tpl/admin/blog.html" */ ?>
<?php /*%%SmartyHeaderCode:92209792154574a2327cf35-81929352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd773070fb994ced40eff7c15fac90874ad38cffd' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/admin/blog.html',
      1 => 1336894681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92209792154574a2327cf35-81929352',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div id="content">
	<?php if ($_smarty_tpl->getVariable('tab')->value==0){?>
	<h2>博客列表 | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blog','MagazineList'=>'yes'),$_smarty_tpl);?>
">杂志列表</a> | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blog','SystemTags'=>'yes'),$_smarty_tpl);?>
">系统标签</a> | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blog','UserTags'=>'yes'),$_smarty_tpl);?>
">用户标签</a></h2>
		<h2>搜索</h2>
		<form id="form1" name="form1" method="post" action="">
		<table width="100%" class="table">

		<tr>
		<td width="60">标题</td>
		<td valign="middle"><input type="text" name="title" value="<?php echo $_smarty_tpl->getVariable('get')->value['title'];?>
"  />
		或</td>
		</tr>
		<tr>
		<td>用户ID</td>
		<td valign="middle"><input name="niname" type="text" value="<?php echo $_smarty_tpl->getVariable('get')->value['niname'];?>
"/></td>
		</tr>
		</table>

		<input name="submit" type="submit" value="搜索" />
		</form>

		<h2>博客列表</h2>
		<div class="nav"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
</div>
		<table width="100%" class="table2">
		<tr>
		<th width="30" align="center" valign="middle">ID</th>
		<th width="30" align="center" valign="middle">置顶</th>
		<th width="40" align="center" valign="middle">类型</th>
		<th width="120" align="center" valign="middle">标签</th>
		<th width="40" align="center" valign="middle">草稿</th>
		<th width="40" align="center" valign="middle">点击</th>
		<th width="40" align="center" valign="middle">动态</th>
		<th width="40" align="center"  valign="middle">评论</th>
		<th width="40" align="center" valign="middle">不评</th>
		<th align="center"  valign="middle">标题</th>
		<th width="80" align="center"  valign="middle">作者</th>
		<th width="60" align="center" valign="middle">time</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('blog')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
		<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['d']->value['bid'];?>
</td>
		<td valign="middle"><?php if ($_smarty_tpl->tpl_vars['d']->value['top']==1){?>顶<?php }else{ ?>非<?php }?></td>
		<td valign="middle"><?php if ($_smarty_tpl->tpl_vars['d']->value['type']==1){?>文字<?php }elseif($_smarty_tpl->tpl_vars['d']->value['type']==2){?>音乐<?php }elseif($_smarty_tpl->tpl_vars['d']->value['type']==3){?>照片<?php }elseif($_smarty_tpl->tpl_vars['d']->value['type']==4){?>视频<?php }?></td>
		<td valign="middle"><?php echo tag(array('tag'=>$_smarty_tpl->tpl_vars['d']->value['tag'],'c'=>'tag'),$_smarty_tpl);?>
</td>
		<td valign="middle"><?php if ($_smarty_tpl->tpl_vars['d']->value['open']==1){?>否<?php }else{ ?>是<?php }?></td>
		<td valign="middle"><?php echo $_smarty_tpl->tpl_vars['d']->value['hitcount'];?>
</td>
		<td valign="middle"><?php echo $_smarty_tpl->tpl_vars['d']->value['feedcount'];?>
</td>
		<td valign="middle"><?php echo $_smarty_tpl->tpl_vars['d']->value['replaycount'];?>
</td>
		<td valign="middle"><?php if ($_smarty_tpl->tpl_vars['d']->value['noreply']==1){?>是<?php }else{ ?>否<?php }?></td>
		<td valign="middle"><a href="<?php echo goUserBlog(array('bid'=>$_smarty_tpl->tpl_vars['d']->value['bid']),$_smarty_tpl);?>
" target="_blank"><?php if ($_smarty_tpl->tpl_vars['d']->value['title']==''){?>没有标题<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
<?php }?></a></td>
		<td valign="middle"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'gouser','uid'=>$_smarty_tpl->tpl_vars['d']->value['user']['uid']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['d']->value['user']['username'];?>
</a></td>
		<td valign="middle"><?php echo dtktime(array('time'=>$_smarty_tpl->tpl_vars['d']->value['time']),$_smarty_tpl);?>
</td>
		</tr>
		<?php }} ?>
		</table>
		<div class="nav"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
</div>
	<?php }elseif($_smarty_tpl->getVariable('tab')->value==1){?>
	<h2><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blog','BlogList'=>'yes'),$_smarty_tpl);?>
">博客列表</a> | 杂志列表 | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blog','SystemTags'=>'yes'),$_smarty_tpl);?>
">系统标签</a> | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blog','UserTags'=>'yes'),$_smarty_tpl);?>
">用户标签</a></h2>
		<h2>杂志列表</h2>
		<div class="nav"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
</div>
		<table width="100%" class="table2">
			<tr>
				<th width="40" align="center" valign="middle">ID</th>
				<th width="80" align="center" valign="middle">收集总数</th>
				<th width="80" align="center" valign="middle">状态数量</th>
				<th width="80" align="center" valign="middle">文字数量</th>
				<th width="80" align="center" valign="middle">图片数量</th>
				<th width="80" align="center" valign="middle">音频数量</th>
				<th width="80" align="center"  valign="middle">视频数量</th>
				<th align="center"  valign="middle">杂志名称</th>
				<th width="80" align="center"  valign="middle">作者</th>
				<th width="60" align="center" valign="middle">time</th>
				<th width="60" align="center" valign="middle">编辑</th>
				<th width="60" align="center" valign="middle">删除</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Magazines')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
				<tr id="mag_<?php echo $_smarty_tpl->tpl_vars['d']->value['boid'];?>
">
					<td><?php echo $_smarty_tpl->tpl_vars['d']->value['boid'];?>
</td>
					<td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['d']->value['collect_count'];?>
</td>
					<td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['d']->value['collect_count'];?>
</td>
					<td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['d']->value['collect_count'];?>
</td>
					<td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['d']->value['collect_count'];?>
</td>
					<td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['d']->value['collect_count'];?>
</td>
					<td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['d']->value['collect_count'];?>
</td>
					<td valign="middle" align="center"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'magazine','boid'=>$_smarty_tpl->tpl_vars['d']->value['boid']),$_smarty_tpl);?>
" target="_blank"><?php if ($_smarty_tpl->tpl_vars['d']->value['boardname']==''){?>没有标题<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['d']->value['boardname'];?>
<?php }?></a></td>
					<td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['d']->value['uid'];?>
</td>
					<td valign="middle" align="center"><?php echo dtktime(array('time'=>$_smarty_tpl->tpl_vars['d']->value['time']),$_smarty_tpl);?>
</td>
					<td valign="middle" align="center"><a href="javascript:void(0)" onclick="edit_magazine('<?php echo $_smarty_tpl->tpl_vars['d']->value['boid'];?>
')">编辑</a></td>
					<td valign="middle" align="center"><a href="javascript:void(0)" onclick="del_magazine('<?php echo $_smarty_tpl->tpl_vars['d']->value['boid'];?>
')">删除</a></td>
				</tr>
			<?php }} ?>
		</table>
		<div class="nav"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
</div>
	<?php }elseif($_smarty_tpl->getVariable('tab')->value==2){?>
	<h2><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blog','BlogList'=>'yes'),$_smarty_tpl);?>
">博客列表</a> | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blog','MagazineList'=>'yes'),$_smarty_tpl);?>
">杂志列表</a> | 系统标签 | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blog','UserTags'=>'yes'),$_smarty_tpl);?>
">用户标签</a></h2>
		<form action="" method="post">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
				<tr>
					<th width="9%" scope="col">排序</th>
					<th width="91%" scope="col"><input type="text" name="sort"/></th>
				</tr>
				<tr>
					<th scope="col">标签名称</th>
					<th scope="col"><input type="text" name="cname" /></th>
				</tr>
			</table>
			<input type="submit" name="sysadd"  value="添加系统标签" />
		</form>
		<div class="nav"><?php echo $_smarty_tpl->getVariable('systagpager')->value;?>
</div>
		<form action="" method="post">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table2">
				<tr>
					<th width="50" align="center" valign="middle" scope="col">排序</th>
					<th align="center" valign="middle"  scope="col">标签</th>
					<th width="100" align="center" valign="middle" scope="col">操作</th>
				</tr>
			<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('systag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
				<tr id="systag_<?php echo $_smarty_tpl->tpl_vars['d']->value['cid'];?>
">
					<td><input name="cate[<?php echo $_smarty_tpl->tpl_vars['d']->value['cid'];?>
][sort]" type="text"  value="<?php echo $_smarty_tpl->tpl_vars['d']->value['sort'];?>
" /></td>
					<td><input name="cate[<?php echo $_smarty_tpl->tpl_vars['d']->value['cid'];?>
][catename]"  type="text"  value="<?php echo $_smarty_tpl->tpl_vars['d']->value['catename'];?>
" /></td>
					<td align="right"><a href="javascript:void(0)" onclick="delsystag(<?php echo $_smarty_tpl->tpl_vars['d']->value['cid'];?>
)">删除</a></td>
				</tr>
			<?php }} ?>
			</table>
		<input name="syscate" type="submit" value="保存" />
		</form>
		<div class="nav"><?php echo $_smarty_tpl->getVariable('systagpager')->value;?>
</div>
	<?php }elseif($_smarty_tpl->getVariable('tab')->value==3){?>
	<h2><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blog','BlogList'=>'yes'),$_smarty_tpl);?>
">博客列表</a> | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blog','MagazineList'=>'yes'),$_smarty_tpl);?>
">杂志列表</a> | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blog','SystemTags'=>'yes'),$_smarty_tpl);?>
">系统标签</a> | 用户标签</h2>
		<div class="nav"><?php echo $_smarty_tpl->getVariable('usrtagpage')->value;?>
</div>
		<form action="" method="post">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table2">
				<tr>
					<th align="center" valign="middle" scope="col">标签</th>
					<th width="150" align="center" valign="middle"  scope="col">添加人</th>
					<th width="50" align="center" valign="middle"  scope="col">活跃度</th>
					<th width="100" align="center" valign="middle"  scope="col">添加时间</th>
					<th width="100" align="center" valign="middle"  scope="col">最后调用时间</th>
					<th width="47" align="center" valign="middle" scope="col">操作</th>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('usrtag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
					<tr id="usertag_<?php echo $_smarty_tpl->tpl_vars['d']->value['tid'];?>
">
						<td><input name="tag[<?php echo $_smarty_tpl->tpl_vars['d']->value['tid'];?>
]" type="text"  value="<?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
" /></td>
						<td><?php echo $_smarty_tpl->tpl_vars['d']->value['user']['username'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['d']->value['num'];?>
</td>
						<td><?php echo dtktime(array('time'=>$_smarty_tpl->tpl_vars['d']->value['time']),$_smarty_tpl);?>
</td>
						<td><?php echo dtktime(array('time'=>$_smarty_tpl->tpl_vars['d']->value['updates']),$_smarty_tpl);?>
</td>
						<td><a href="javascript:void(0)" onclick="delusertag(<?php echo $_smarty_tpl->tpl_vars['d']->value['tid'];?>
)">删除</a></td>
					</tr>
				<?php }} ?>
			</table>
			<input name="usercate" type="submit" value="保存" />
		</form>
		<div class="nav"><?php echo $_smarty_tpl->getVariable('usrtagpage')->value;?>
</div>
	<?php }?>
</div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
