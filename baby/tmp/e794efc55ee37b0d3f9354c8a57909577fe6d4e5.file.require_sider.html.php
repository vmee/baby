<?php /* Smarty version Smarty-3.0.6, created on 2014-11-03 17:24:21
         compiled from "/home/kingkong/Projects/php/baby/tpl/require_sider.html" */ ?>
<?php /*%%SmartyHeaderCode:288480803545749c5d49e95-87202867%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e794efc55ee37b0d3f9354c8a57909577fe6d4e5' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/require_sider.html',
      1 => 1336881393,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '288480803545749c5d49e95-87202867',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!--右侧菜单组件-->
<?php if ($_SESSION['uid']!=''){?>

  <?php if (!$_smarty_tpl->getVariable('in_tagindex')->value){?>

  <div id="search"><input type="text" value="搜索标签,发现兴趣" class="ipt"><input type="button" class="btn" value="" onClick="searchTag()"></div>
  
  <ul class="sidemenu">
	<li><span class="myfollows"></span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main'),$_smarty_tpl);?>
">我关注<?php echo $_smarty_tpl->getVariable('user')->value['flow'];?>
个博客</a></li>
	<li><span class="setfollows"></span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'myfollow'),$_smarty_tpl);?>
">管理我的关注</a></li>
	<li><span class="discovery"></span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'discovery'),$_smarty_tpl);?>
">发现更多新博客</a></li>
   </ul>

    <ul class="sidemenu">
        <li><span class="mybestlike"></span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'mylikes'),$_smarty_tpl);?>
">我的最爱 <?php echo $_smarty_tpl->getVariable('user')->value['likenum'];?>
</a></li>
        <li><span class="mypublics"></span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'mypost'),$_smarty_tpl);?>
">我发布的 <?php echo $_smarty_tpl->getVariable('user')->value['num'];?>
</a></li>
        <li><span class="myreplays"></span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'myreplay'),$_smarty_tpl);?>
">我回复的</a></li>
    </ul>
  <?php }?>


    <?php if ($_smarty_tpl->getVariable('in_tagindex')->value){?>

         <?php if ($_smarty_tpl->getVariable('favatag')->value){?>
             <ul class="sidemenu">
             <li class="lable"><span class="space"></span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
" title="返回首页">返回首页</a></li>
             <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('favatag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
             	<?php if ($_smarty_tpl->tpl_vars['d']->value['tag']['title']==$_smarty_tpl->getVariable('tagname')->value){?>
                 <li><span class="itemtag"></span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'tag','tag'=>$_smarty_tpl->tpl_vars['d']->value['tag']['title']),$_smarty_tpl);?>
" title="最近更新<?php echo dtktime(array('time'=>$_smarty_tpl->tpl_vars['d']->value['tag']['updates']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['tag']['title'];?>
</a><?php if ($_smarty_tpl->tpl_vars['d']->value['tag']['num']){?>(<?php echo $_smarty_tpl->tpl_vars['d']->value['tag']['num'];?>
)<?php }?></li>
                <?php }else{ ?>
                <li><span class="itemtag"></span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'tag','tag'=>$_smarty_tpl->tpl_vars['d']->value['tag']['title']),$_smarty_tpl);?>
" title="最近更新<?php echo dtktime(array('time'=>$_smarty_tpl->tpl_vars['d']->value['tag']['updates']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['tag']['title'];?>
</a><?php if ($_smarty_tpl->tpl_vars['d']->value['tag']['num']){?>(<?php echo $_smarty_tpl->tpl_vars['d']->value['tag']['num'];?>
)<?php }?></li>
                <?php }?>
            <?php }} ?>
            <?php }else{ ?>
              <li><span class="space"></span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'recommend'),$_smarty_tpl);?>
">没有关注标签,发现一下吧</a></li>
         <?php }?>
		  </ul>
    <?php }else{ ?>
	
    	<?php if ($_smarty_tpl->getVariable('favatag')->value){?>
             <ul class="sidemenu">
             <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('favatag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
              <li><span class="itemtag"></span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'tag','tag'=>$_smarty_tpl->tpl_vars['d']->value['tag']['title']),$_smarty_tpl);?>
" title="最近更新<?php echo dtktime(array('time'=>$_smarty_tpl->tpl_vars['d']->value['tag']['updates']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['tag']['title'];?>
</a> <?php if ($_smarty_tpl->tpl_vars['d']->value['tag']['num']){?>(<?php echo $_smarty_tpl->tpl_vars['d']->value['tag']['num'];?>
)<?php }?></li>
            <?php }} ?>
             <li><span class="space"></span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'tag'),$_smarty_tpl);?>
">查看更多标签</a></li>
            </ul>
        <?php }else{ ?>
            <ul class="sidemenu">
              <li><span class="space"></span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'recommend'),$_smarty_tpl);?>
">没有关注标签,发现一下吧</a></li>
              <div class="clear"></div>
			  <script type="text/javascript">//<![CDATA[
			  Calendar.setup({
				inputField : "f_date1",
				trigger    : "f_btn1",
				onSelect   : function() { this.hide() },
				showTime   : 12,
				dateFormat : "%Y-%m-%d %I:%M %p"
			  });
			//]]></script>
            </ul>
        <?php }?>
    <?php }?>

 <?php }?>
	
	<h3>热门标签</h3>
	<div class="tagnew">
		<ul>
		<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('htag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'tag','tag'=>$_smarty_tpl->tpl_vars['d']->value['title']),$_smarty_tpl);?>
" target="_blank" ><?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
</a></li>
		<?php }} ?>
		</ul>
	</div>
	<!--放置热门杂志-->
	<div class="siderhr"></div>
	<ul class="sidemenu">
		<li class="lable"><span class="space"></span>热门杂志</li>
			<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars["j"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('HotBoards')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
 $_smarty_tpl->tpl_vars["j"]->value = $_smarty_tpl->tpl_vars['d']->key;
?>
			<li><span class="space"></span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'magazine','boid'=>$_smarty_tpl->getVariable('HotBoards')->value[$_smarty_tpl->getVariable('j')->value]['boid']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('j')->value+1;?>
.<?php echo $_smarty_tpl->tpl_vars['d']->value['boardname'];?>
&nbsp&nbsp(<?php echo $_smarty_tpl->getVariable('HotBoards')->value[$_smarty_tpl->getVariable('j')->value]['coins'];?>
热度)</a></li>
			<?php }} ?>
			<li ><span class="space"></span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'magazine','a'=>'all'),$_smarty_tpl);?>
" target="_blank">更多</a></li>
	</ul>
	
	
	<ul class="sidemenu">
		<li class="lable"><span class="space"></span>手机上 ditieker.com</li>
		<li class="vcode"><img src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/2code.gif"></li>
		<li class="contents"><span class="space"></span>↑手机拍二维码，或直接用手机进入ditieker.com，存书签，随时随地地铁客～</li>
	</ul>
	<h3>订阅是个好习惯</h3>
	<!-- Feedsky FEED发布代码开始 -->
	<!-- FEED自动发现标记开始 -->
	<link title="RSS 2.0" type="application/rss+xml" href="http://feed.feedsky.com/b469" rel="alternate" />
	<!-- FEED自动发现标记结束 -->
	<a href="http://feed.feedsky.com/b469" target="_blank"><img border="0" src="http://img.feedsky.com/images/icon_sub_c1s17.gif" alt="feedsky" vspace="2"  style="margin-bottom:3px" ></a><br />
	<a href="http://www.zhuaxia.com/add_channel.php?url=http://feed.feedsky.com/b469" target="_blank"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_zhuaxia.gif" alt="&#25235;&#34430;" vspace="2" style="margin-bottom:3px" ></a><br />
	<a href="http://www.rojo.com/add-subscription?resource=http://feed.feedsky.com/b469" target="_blank"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_rojo.gif" alt="Rojo" vspace="2" style="margin-bottom:3px" ></a><br />
	<a href="http://fusion.google.com/add?feedurl=http://feed.feedsky.com/b469" target="_blank"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_google.gif" alt="google reader" vspace="2" style="margin-bottom:3px" ></a><br />
	<a href="http://add.my.yahoo.com/rss?url=http://feed.feedsky.com/b469" target="_blank"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_yahoo.gif" alt="my yahoo" vspace="2" style="margin-bottom:3px" ></a><br />
	<a href="http://www.xianguo.com/subscribe.php?url=http://feed.feedsky.com/b469" target="_blank"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_xianguo.gif" alt="&#40092;&#26524;" vspace="2" style="margin-bottom:3px" ></a><br />
	<a href="http://inezha.com/add?url=http://feed.feedsky.com/b469" target="_blank"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_nazha.gif" alt="&#21738;&#21522;" vspace="2" style="margin-bottom:3px" ></a><br />
	<!-- Feedsky FEED发布代码结束 -->
	<div class="siderhr"></div>
	<h3>配套客户端下载</h3>
	<a href="http://mobile.91.com/Soft/Android/com.ditieker.dtk-1.6.html"><img src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/pboard.jpg" alt="猫扑狂搞笑下载地址"/></a>
	<!-- 放置新浪微博状态 -->
	<!--<iframe width="100%" height="24" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0" scrolling="no" border="0" src="http://widget.weibo.com/relationship/followbutton.php?language=zh_cn&width=100%&height=24&uid=1570967302&style=3&btn=red&dpc=1"></iframe>-->
	<div class="siderhr"></div>
	<h3>官方微博动态</h3>
	<iframe width="100%" height="550" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=0&height=550&fansRow=2&ptype=1&speed=0&skin=10&isTitle=1&noborder=1&isWeibo=1&isFans=1&uid=1570967302&verifier=b3700b1c&dpc=1"></iframe>






