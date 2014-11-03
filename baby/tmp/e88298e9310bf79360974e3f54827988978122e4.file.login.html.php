<?php /* Smarty version Smarty-3.0.6, created on 2014-11-03 17:55:17
         compiled from "/home/kingkong/Projects/php/baby/tpl/login.html" */ ?>
<?php /*%%SmartyHeaderCode:27849448954575105e1d3e3-54284395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e88298e9310bf79360974e3f54827988978122e4' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/login.html',
      1 => 1415008513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27849448954575105e1d3e3-54284395',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<title><?php echo $_smarty_tpl->getVariable('dtk')->value['site_title'];?>
 - <?php echo $_smarty_tpl->getVariable('dtk')->value['site_titlepre'];?>
 - Powered by <?php echo $_smarty_tpl->getVariable('dtk')->value['soft'];?>
</title>
<meta name="author" content="<?php echo $_smarty_tpl->getVariable('dtk')->value['author'];?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->getVariable('dtk')->value['site_desc'];?>
" />
<meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('dtk')->value['site_keyword'];?>
" />
<link href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/css/login.css" rel="stylesheet" type="text/css"  class="cssfx"/>
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/favicon.ico" type="image/x-icon">
</head>
<body>
<div id="wrap">
  <div id="main">
    <div style="height:0px; clear:both">
    <!--[if lte IE 6]>
    	<div class="ie6">
        <h1>请不要再使用IE6</h1>
        <div>虽然我们试图努力让各个浏览器的浏览效果达到最佳，但是IE6我们实在无能为力。<br />
        我们的开发人员花了大量时间来保证IE6的界面不乱，但无法保证所有功能都能正常使用。<br />
        因此我们建议您更换掉已经淘汰很久的IE6浏览器。<br />
        您可以使用 ie7,ie8,ie9,firefox,chrome,opera,safari</div>
        </div>
        <![endif]-->
    </div>
    <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" id="logbox">
      <tr>
        <td>
              <!--<h1>登陆<?php echo $_smarty_tpl->getVariable('dtk')->value['site_title'];?>
网</h1>-->
			  <!--<div id="logo"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/login/logo.gif" width="240" height="150" alt="地铁客" /></a></div> <!--<div id="BalloonA"></div><div id="BalloonB">--></div>
          <form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
" method="post" onSubmit="return checkLogin()">
        <?php if ($_smarty_tpl->getVariable('errmsg')->value){?>
        <div id="errmsg"><?php echo $_smarty_tpl->getVariable('errmsg')->value;?>
</div>
        <?php }?>
                <input type="hidden" value="<?php echo $_smarty_tpl->getVariable('callback')->value;?>
" name="callback">
                <input type="hidden" value="" name="formKey">
                <div id="loginarea">
                    <div class="filed">
                    	<label for="email" class="nocontent">邮箱</label>
                        <input type="text" id="email" name="email" class="input round" tabindex="1" value="<?php if ($_POST['email']){?><?php echo $_POST['email'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('email')->value;?>
<?php }?>">
                    </div>
                    <div class="filed"><label for="password" class="nocontent">密码</label><input type="password" id="password" class="input round" value="<?php echo $_POST['password'];?>
" name="password" tabindex="2"></div>
                    <div class="filedBtn"><input class="subBtn" type="submit" name="submit" value=""/></div>
					<div class="filedBtn"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'reg'),$_smarty_tpl);?>
"><img class="regBtn" name="reg"/></a><div class="clear"></div>
                    <table width="400" border="0" cellspacing="0" cellpadding="0" class="remember">
                      <tr>
                        <td width="190"> <input name="savename" type="hidden" id="savename" value="1" /></td>
                        <td  align="left" valign="middle">  <!--<a href="#">忘记密码?</a>--></td>
                      </tr>
                    </table>
                   <?php if ($_smarty_tpl->getVariable('dtk')->value['loginCodeSwitch']!='close'){?>
                    <table width="400" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="195">
                        <div class="filed"><label for="verifycode" class="nocontent">验证码</label><input type="text" id="verifycode" class="input"  name="verifycode" tabindex="3"></div></td>
                        <td width="205" align="left" valign="middle">
                        <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'vcode','t'=>$_smarty_tpl->getVariable('time')->value),$_smarty_tpl);?>
" class="vericode" onClick="javascript:reloadcode(this,this.src);" title="看不清楚，换一张" style="cursor:pointer;" /></td>
                      </tr>
                    </table>
                   <?php }?>
             </div>

       <?php if ($_smarty_tpl->getVariable('dtk')->value['openlogin_qq_open']==1||$_smarty_tpl->getVariable('dtk')->value['openlogin_weib_open']==1){?>
      <div id="openconnent">
      <h1>用合作账户登陆</h1>
          <div id="area">
              <?php if ($_smarty_tpl->getVariable('dtk')->value['openlogin_qq_open']==1){?>
              <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'openconnect','a'=>'qq'),$_smarty_tpl);?>
"><img src="tpl/image/qq_login.gif" border="0" style="margin-top:10px"/></a></li>
              <?php }?>
              <?php if ($_smarty_tpl->getVariable('dtk')->value['openlogin_weib_open']==1){?>
              <li> <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'openconnect','a'=>'weibo'),$_smarty_tpl);?>
"><img src="tpl/image/weib_login.gif" border="0" style="margin-top:10px"/></a></li>
              <?php }?>
          </div>
      </div>
       <?php }?>
          </form>
        </td>
      </tr>
    </table>
  </div>
	<div id="copyright">
		<div class="nav clearfix">
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','a'=>'about'),$_smarty_tpl);?>
">关于地铁客</a></li>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','a'=>'call'),$_smarty_tpl);?>
">联系我们</a></li>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','a'=>'help'),$_smarty_tpl);?>
">获取帮助</a></li>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','a'=>'service'),$_smarty_tpl);?>
">服务条款</a></li>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','a'=>'privacy'),$_smarty_tpl);?>
">隐私政策</a></li>
		</div>
		<div class="copy"><a href="http://www.thinksaas.cn/index.php/group/group/groupid-129" target="_blank">Powered by <?php echo $_smarty_tpl->getVariable('dtk')->value['soft'];?>
 </a>&nbsp;2011-2012 <?php echo $_smarty_tpl->getVariable('dtk')->value['site_icp'];?>
 <?php echo $_smarty_tpl->getVariable('dtk')->value['site_count'];?>
</small></div>
	</div>
</div>
<script>

// login and reg
$(document).ready(function(){
	if($('#email').val() != ''){$('#email').parent().find('label').hide();}
	if($('#password').val() != ''){$('#password').parent().find('label').hide();}
	if($('#loginarea #verifycode').val() != ''){$('#loginarea #verifycode').parent().find('label').hide();}
	$('#email,#password,#loginarea #verifycode').focus(function(){
		$(this).parent().find('label').hide();
	}).blur(function(){
		if($(this).val() ==''){$(this).parent().find('label').show();}
	})

	setTimeout(function(){$('#BalloonB').fadeIn('slow');},800);
	setTimeout(function(){ $('#BalloonA').fadeIn('slow');},1100);

	$('#email').keyup(function(){if ($(this).hasClass('warn')) {$(this).removeClass('warn');}});
	$('#password').keyup(function(){if ($(this).hasClass('warn')) {$(this).removeClass('warn');}});
})
function reloadcode(obj,url)
{
	obj.src = url+ '&nowtime=' + new Date().getTime();
}
function checkLogin()
{
	if ($('#email').val() == ''){ $('#email').addClass('warn',500);}
	if ($('#password').val() == ''){ $('#password').addClass('warn',500);}
	if (($('#email').val() == '') || ($('#password').val() == '')) return false;
	$('.subBtn').addClass('loading');
	return true;
}

</script>
</body>
</html>