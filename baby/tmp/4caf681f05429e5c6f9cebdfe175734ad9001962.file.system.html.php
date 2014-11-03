<?php /* Smarty version Smarty-3.0.6, created on 2014-11-03 17:25:37
         compiled from "/home/kingkong/Projects/php/baby/tpl/admin/system.html" */ ?>
<?php /*%%SmartyHeaderCode:47791839254574a112741c1-32559839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4caf681f05429e5c6f9cebdfe175734ad9001962' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/admin/system.html',
      1 => 1336876506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47791839254574a112741c1-32559839',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('editor','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<style>
.hover{ background-color:#F6F6F6}
</style>
<div id="content">
	<h2><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'clearcache'),$_smarty_tpl);?>
">缓存删除</a></h2>
	<form id="form1" name="form1" method="post" action="">
	<?php if ($_smarty_tpl->getVariable('tab')->value==0){?>
		<h2>站点配置 | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'system','WebInfo'=>'yes'),$_smarty_tpl);?>
">站点信息</a> | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'system','SEO'=>'yes'),$_smarty_tpl);?>
">SEO优化</a> | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'system','Bind'=>'yes'),$_smarty_tpl);?>
">绑定登陆</a></h2>
		<h2>好友状态模式配置</h2>
		<table width="100%" class="table">
			<tr>
				<td width="240">好友状态获取</td>
				<td width="1600" valign="middle">
					<input type="radio" name="val[db_switch]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['db_switch']==0){?> checked="checked" <?php }?> />
					忽略好友关系
					<input type="radio" name="val[db_switch]"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['db_switch']==1){?> checked="checked" <?php }?> />
					普通数据库模式
					<!--<input type="radio" name="val[db_switch]"  value="2"  <?php if ($_smarty_tpl->getVariable('conf')->value['db_switch']==2){?> checked="checked" <?php }?> />
					高速数据库模式-->
				</td>
			</tr>
			<tr>
				<td width="240">说明：</td>
				<td width="1600" valign="middle">
				1、忽略好友关系，在首页不再获取好友动态，因为在一些低端的服务器上直接搜索数据库会效率很低，而且不能够安装高速版的一些底层支持插件，可以选择这种模式；<br>
				2、普通数据库模式，如果虚拟主机用户的注册用户量小于1000，可以采用这种模式，但是数据库效率会低一些；<br>
				3、高速数据库模式，这个要求服务器的一些插件支持，教程详见 穿越链接 。（正在测试中，会在近期放出，敬请期待）
				</td>
			</tr>
		</table>
		<h2>站点设置</h2>
		<table width="100%" class="table">
			<tr>
				<td width="60">站点标题</td>
				<td valign="middle"><input type="text" name="val[site_title]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
" /></td>
			</tr>
			<tr>
				<td>副标题</td>
				<td valign="middle"><input type="text" name="val[site_titlepre]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['site_titlepre'];?>
" /></td>
			</tr>    
			<tr>
				<td>备案号</td>
				<td valign="middle"><input type="text" name="val[site_icp]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['site_icp'];?>
" /></td>
			</tr>
			<tr>
				<td>统计代码</td>
				<td valign="middle"><textarea name="val[site_count]" cols="80" rows="5"><?php echo $_smarty_tpl->getVariable('conf')->value['site_count'];?>
</textarea></td>
			</tr>
			<tr>
				<td>分享代码</td>
				<td valign="middle"><textarea name="val[share_js]" cols="80" rows="5"><?php echo $_smarty_tpl->getVariable('conf')->value['share_js'];?>
</textarea></td>
			</tr>
		</table>
		
		<h2>模块设置</h2>
		<table width="100%" class="table">
			<tr>
				<td width="88">状态发布</td>
				<td width="1367" valign="middle"><input name="val[addstate_switch]" type="radio"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['addstate_switch']==1){?> checked="checked" <?php }?> />
				启用
				<input type="radio" name="val[addstate_switch]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['addstate_switch']==0){?> checked="checked" <?php }?> />
				关闭</td>
			</tr>
			<tr>
				<td width="88">文字发布</td>
				<td width="1367" valign="middle"><input name="val[addtext_switch]" type="radio"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['addtext_switch']==1){?> checked="checked" <?php }?> />
				启用
				<input type="radio" name="val[addtext_switch]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['addtext_switch']==0){?> checked="checked" <?php }?> />
				关闭</td>
			</tr>
			<tr>
				<td width="88">图片发布</td>
				<td width="1367" valign="middle"><input name="val[addimg_switch]" type="radio"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['addimg_switch']==1){?> checked="checked" <?php }?> />
				启用
				<input type="radio" name="val[addimg_switch]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['addimg_switch']==0){?> checked="checked" <?php }?> />
				关闭</td>
			</tr>
			<tr>
				<td width="88">音乐发布</td>
				<td width="1367" valign="middle"><input name="val[addmusic_switch]" type="radio"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['addmusic_switch']==1){?> checked="checked" <?php }?> />
				启用
				<input type="radio" name="val[addmusic_switch]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['addmusic_switch']==0){?> checked="checked" <?php }?> />
				关闭</td>
			</tr>
			<tr>
				<td width="88">视频发布</td>
				<td width="1367" valign="middle"><input name="val[addvideo_switch]" type="radio"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['addvideo_switch']==1){?> checked="checked" <?php }?> />
				启用
				<input type="radio" name="val[addvideo_switch]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['addvideo_switch']==0){?> checked="checked" <?php }?> />
				关闭</td>
			</tr>
			<tr>
				<td width="88">链接发布</td>
				<td width="1367" valign="middle"><input name="val[addlink_switch]" type="radio"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['addlink_switch']==1){?> checked="checked" <?php }?> />
				启用
				<input type="radio" name="val[addlink_switch]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['addlink_switch']==0){?> checked="checked" <?php }?> />
				关闭</td>
			</tr>
			<tr>
				<td><b>模块属性</b></td>
				<td valign="middle">&nbsp;</td>
			</tr>
			<tr>
				<td width="88">音乐上传</td>
				<td width="1367" valign="middle"><input name="val[addmusic_up_switch]" type="radio"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['addmusic_up_switch']==1){?> checked="checked" <?php }?> />
				开启本地音乐上传功能
				<input type="radio" name="val[addmusic_up_switch]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['addmusic_up_switch']==0){?> checked="checked" <?php }?> />
				关闭本地音乐上传功能</td>
			</tr>
			<tr>
				<td width="88">音乐大小</td>
				<td width="1367" valign="middle"><input type="text" name="val[addmusic_upsize]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['addmusic_upsize'];?>
" />byte 上传音乐的大小(默认为4M，建议不要超过8M)</td>
				</tr>
			<tr>
				<td width="88">上传张数</td>
				<td width="1367" valign="middle"><input type="text" name="val[addimg_count]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['addimg_count'];?>
" />张 上传图片一次允许的数量(默认为20张，建议不要超过40张)</td>
				</tr>
			<tr>
				<td width="88">图片大小</td>
				<td width="1367" valign="middle"><input type="text" name="val[addimg_upsize]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['addimg_upsize'];?>
" />byte 上传图片每张允许的大小(默认为2M，建议不要超过4M/张)</td>
				</tr>
			</table>
			
			<h2>个性化主题设置</h2>
			<table width="100%" class="table">
				<tr>
					<td width="60">上传背景</td>
					<td valign="middle"> <input type="radio" name="val[theme_upload]"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['theme_upload']==1){?> checked="checked" <?php }?> />  允许
					<input type="radio" name="val[theme_upload]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['theme_upload']==0){?> checked="checked" <?php }?> />禁止
					</td>
				</tr>
				<tr>
					<td>上传大小</td>
					<td valign="middle"><input name="val[theme_uploadsize]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['theme_uploadsize'];?>
" />byte 上传音乐的大小(默认为1M，建议不要超过1M)</td>
					</tr>
					<tr>
					<td>上传格式</td>
					<td valign="middle"><input name="val[theme_uploadtype]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['theme_uploadtype'];?>
" /></td>
				</tr>
			</table>
			
			<h2>首页设置</h2>
			<table width="100%" class="table">
				<tr>
					<td width="60">登录访问</td>
					<td valign="middle"><input name="val[show_login_mode]" type="radio"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['show_login_mode']==1){?> checked="checked" <?php }?> />
					未登录也可以访问
					<input type="radio" name="val[show_login_mode]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['show_login_mode']==0){?> checked="checked" <?php }?> />
					只允许会员登录访问</td>
				</tr>
				<tr>
					<td width="60">分页模式</td>
					<td valign="middle"><input name="val[show_page_mode]" type="radio"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['show_page_mode']==1){?> checked="checked" <?php }?> />
					ajax分页
					<input type="radio" name="val[show_page_mode]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['show_page_mode']==0){?> checked="checked" <?php }?> />
					正常分页</td>
				</tr>
				<tr>
					<td>加载次数</td>
					<td valign="middle"><input name="val[show_ajax_to]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['show_ajax_to'];?>
" />开启ajax模式 自动加载次数,超过次数将会出现点击查看更多提示</td>
				</tr>
				<tr>
					<td>分页数量</td>
					<td valign="middle"><input name="val[show_page_num]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['show_page_num'];?>
" />不管是正常分页还是ajax分页，每次读取多少条内容</td>
				</tr>
			</table>
			
			<h2>发信设置</h2>
			<table width="100%" class="table">
				<tr>
					<td width="60">邮件服务</td>
					<td valign="middle"> <input type="radio" name="val[mail_open]"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['mail_open']==1){?> checked="checked" <?php }?> />  开启
					<input type="radio" name="val[mail_open]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['mail_open']==0){?> checked="checked" <?php }?> />关闭 (是否开启系统邮件服务,测试发信也需要开启)
					</td>
				</tr>
				<tr>
					<td width="60">debug</td>
					<td valign="middle"> <input type="radio" name="val[mail_debug]"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['mail_debug']==1){?> checked="checked" <?php }?> />  开启debug
					<input type="radio" name="val[mail_debug]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['mail_debug']=='0'){?> checked="checked" <?php }?> />关闭debug (测试发信请开启)
					</td>
				</tr>
				<tr>
					<td width="60">邮件服务器</td>
					<td valign="middle"><input type="text" name="val[mail_host]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['mail_host'];?>
" /></td>
				</tr>
				<tr>
					<td>端口</td>
					<td valign="middle"><input name="val[mail_port]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['mail_port'];?>
" /></td>
				</tr>
				<tr>
					<td>账号</td>
					<td valign="middle"><input name="val[mail_user]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['mail_user'];?>
" /></td>
				</tr>
				<tr>
					<td>密码</td>
					<td valign="middle"><input name="val[mail_pwd]" type="password" value="<?php echo $_smarty_tpl->getVariable('conf')->value['mail_pwd'];?>
" /></td>
				</tr>
				<tr>
					<td>发信账号</td>
					<td valign="middle"><input name="val[mail_from]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['mail_from'];?>
" />邮件发送者，该账号将显示在用户接受邮件的发信方</td>
				</tr>
				<tr>
					<td>发信账号描述</td>
					<td valign="middle"><input name="val[mail_fromname]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['mail_fromname'];?>
" />
					邮件发送者名称，该账号将显示在用户接受邮件的发信地址后面 </td>
				</tr>
				<tr>
					<td>测试发信</td>
					<td valign="middle"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'system','testSendMail'=>'yes'),$_smarty_tpl);?>
" target="_blank">请先保存设置,然后点这里测试</a>
					系统会发一封邮件到您的 发信账号中,请注意查收。</td>
				</tr>
			</table>

			<h2>过滤和保留设置</h2>
			<table width="100%" class="table">
				<tr>
					<td width="60">邮箱保留<br />或限制</td>
					<td valign="middle">
					<textarea name="val[keep_email]" cols="80" rows="5"><?php echo $_smarty_tpl->getVariable('conf')->value['keep_email'];?>
</textarea>用户注册邮箱前缀保留</td>
				</tr>
				<tr>
					<td>昵称保留<br />或限制</td>
					<td valign="middle"><textarea name="val[keep_niname]" cols="80" rows="5"><?php echo $_smarty_tpl->getVariable('conf')->value['keep_niname'];?>
</textarea> 用户昵称保留</td>
				</tr>
				<tr>
					<td>域名保留<br />或限制</td>
					<td valign="middle"><textarea name="val[keep_domain]" cols="80" rows="5"><?php echo $_smarty_tpl->getVariable('conf')->value['keep_domain'];?>
</textarea>用户个性域名保留</td>
				</tr>
				<tr>
					<td>评论限制</td>
					<td valign="middle"><textarea name="val[keep_rep]" cols="80" rows="5"><?php echo $_smarty_tpl->getVariable('conf')->value['keep_rep'];?>
</textarea>评论限制</td>
				</tr>
				<tr>
					<td>说明：</td>
					<td valign="middle">所有词条请用逗号分隔</td>
				</tr>
			</table>
			
			<?php }elseif($_smarty_tpl->getVariable('tab')->value==1){?>
			<h2><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'system','BaseSetting'=>'yes'),$_smarty_tpl);?>
">站点配置</a> | 站点信息 | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'system','SEO'=>'yes'),$_smarty_tpl);?>
">SEO优化</a> | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'system','Bind'=>'yes'),$_smarty_tpl);?>
">绑定登陆</a></h2>

			<h2>网站版权</h2>
			<table width="100%" class="table">
				<tr>
					<td width="60">关于</td>
					<td valign="middle"><textarea name="val[about]" id="textarea" height="280" style="width:100%"><?php echo $_smarty_tpl->getVariable('conf')->value['about'];?>
</textarea></td>
				</tr>
				<tr>
					<td width="60">联系我们</td>
					<td valign="middle"><textarea name="val[call]" id="textarea2" height="280" style="width:100%"><?php echo $_smarty_tpl->getVariable('conf')->value['call'];?>
</textarea></td>
				</tr>
			</table>
			<?php }elseif($_smarty_tpl->getVariable('tab')->value==2){?>
			<h2><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'system','BaseSetting'=>'yes'),$_smarty_tpl);?>
">站点配置</a> | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'system','WebInfo'=>'yes'),$_smarty_tpl);?>
">站点信息</a> | SEO优化 | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'system','Bind'=>'yes'),$_smarty_tpl);?>
">绑定登陆</a></h2>

			<h2>SEO设置</h2>
			<table width="100%" class="table">
				<tr>
					<td width="60">关键字</td>
					<td valign="middle"><input type="text" name="val[site_keyword]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['site_keyword'];?>
" /></td>
				</tr>
				<tr>
					<td>描述</td>
					<td valign="middle"><input name="val[site_desc]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['site_desc'];?>
" /></td>
				</tr>
			</table>
		<?php }elseif($_smarty_tpl->getVariable('tab')->value==3){?>
		<h2><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'system','BaseSetting'=>'yes'),$_smarty_tpl);?>
">站点配置</a> | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'system','WebInfo'=>'yes'),$_smarty_tpl);?>
">站点信息</a> | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'system','SEO'=>'yes'),$_smarty_tpl);?>
">SEO优化</a> | 绑定登陆</h2>

		<h2>QQ登陆设置</h2>
		<table width="100%" class="table">
			<tr>
				<td width="111">是否开启</td>
				<td width="197" valign="middle">
				开启<input name="val[openlogin_qq_open]" type="radio" value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['openlogin_qq_open']==1){?> checked="checked" <?php }?>/>&nbsp;&nbsp;
				关闭 <input name="val[openlogin_qq_open]" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('conf')->value['openlogin_qq_open']==0){?> checked="checked" <?php }?>/></td>
				<td width="1188" valign="middle">是否开启QQ登陆按钮及登陆功能，开启后填写下面内容。<a href="http://connect.opensns.qq.com/apply" target="_blank">获取如下内容请点击</a></td>
			</tr>
			<tr>
				<td>APPID</td>
				<td valign="middle"><input name="val[openlogin_qq_appid]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['openlogin_qq_appid'];?>
" /></td>
				<td valign="middle">腾讯提供的APPID&nbsp;</td>
			</tr>
			<tr>
				<td>APP KEY</td>
				<td valign="middle"><input name="val[openlogin_qq_appkey]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['openlogin_qq_appkey'];?>
" /></td>
				<td valign="middle">腾讯提供的APP KEY&nbsp;</td>
			</tr>
			<tr>
				<td>回调地址</td>
				<td valign="middle"><input name="val[openlogin_qq_callback]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['openlogin_qq_callback'];?>
" /></td>
				<td valign="middle">请将回调地址写成如下形式，将我们的域名换成你的域名:(注意不要粘贴空格)<br />
				http://www.ditieker.com/index.php?c=openconnect&a=qq&callback=true <br/>
				你回调地址填的地址域名必须和申请的域名一样</td>
			</tr>
		</table>
		
		<h2>新浪微博登陆设置</h2>
		<table width="100%" class="table">
			<tr>
				<td width="78">是否开启</td>
				<td width="168" valign="middle">
				开启<input name="val[openlogin_weib_open]" type="radio" value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['openlogin_weib_open']==1){?> checked="checked" <?php }?>/>&nbsp;&nbsp;
				关闭 <input name="val[openlogin_weib_open]" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('conf')->value['openlogin_weib_open']==0){?> checked="checked" <?php }?>/></td>
				<td width="689" valign="middle">是否开启weib登陆按钮及登陆功能，开启后填写下面内容。<a href="http://open.weibo.com/apps/new?sort=website" target="_blank">获取如下内容请点击</a></td>
			</tr>
			<tr>
				<td>APPkey</td>
				<td valign="middle"><input name="val[openlogin_weib_appid]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['openlogin_weib_appid'];?>
" /></td>
				<td valign="middle">新浪提供的APPkey&nbsp;</td>
			</tr>
			<tr>
				<td>APPsecret</td>
				<td valign="middle"><input name="val[openlogin_weib_appkey]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['openlogin_weib_appkey'];?>
" /></td>
				<td valign="middle">新浪提供的APP secret</td>
			</tr>
			<tr>
				<td>回调地址</td>
				<td valign="middle"><input name="val[openlogin_weib_callback]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['openlogin_weib_callback'];?>
" /></td>
				<td valign="middle">请将回调地址写成如下形式，将我们的域名换成你的域名:(注意不要粘贴空格)<br />
				http://www.ditieker.com/index.php?c=openconnect&a=weibo&callback=true </td>
			</tr>
		</table>
		<?php }?>
		<input name="submit" type="submit" value="保存更改" />
    </form>
</div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
