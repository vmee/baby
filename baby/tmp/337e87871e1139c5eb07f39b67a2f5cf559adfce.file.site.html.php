<?php /* Smarty version Smarty-3.0.6, created on 2014-11-05 17:44:37
         compiled from "/home/kingkong/Projects/php/baby/tpl/site.html" */ ?>
<?php /*%%SmartyHeaderCode:12184658905459f1854a4ad8-85923137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '337e87871e1139c5eb07f39b67a2f5cf559adfce' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/site.html',
      1 => 1332340332,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12184658905459f1854a4ad8-85923137',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php if ($_smarty_tpl->getVariable('show')->value=='about'){?>
<div id="article">
    <div class="box" style="margin-left:0px; width:600px">
        <div class="site">
        <?php echo $_smarty_tpl->getVariable('conf')->value['about'];?>

        </div>
    </div>
</div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('show')->value=='help'){?>
<div id="article">
    <div class="box" style="margin-left:0px; width:600px">
        <div class="site">
			<div class="h1">使用帮助</div>
			<div class="info">
				<h2>发布内容</h2>
				<p>登陆后点击右侧 文字链接，即可进入发布文字功能。可输入内容，并可插入单张图片</p>
			</div>
			<div class="info">
				<h2>发布音乐</h2>
				<p>登陆后点击右侧 音乐，即可进入发布音乐功能。您可以选择网络音乐 和 本地上传两种方式。</p>
				<p>网络音乐引用地址可以输入虾米、雅燃音乐、音悦台、优酷、土豆、6间房、腾讯播客、新浪博客、56.com等诸多网站播放地址。 也可以直接粘贴网络后缀为mp3的歌曲。</p>
				<p>本地上传您可以上传本地的MP3文件，但请注意的是您需要拥有该媒体的著作权，也就是说您自己录或者制作的音乐皆可，但不能上传网络上不属于您的版权的音乐。如果被查出或举报或版权纠纷我们将不负任何责任，并且删除该媒体资源。</p>
			</div>
			<div class="info">
				<h2>发布图片</h2>
				<p>您可以同时上传最多20张照片作为博客内容，并且也可以编写介绍。</p>
			</div>
			<div class="info">
				<h2>发布视频</h2>
				<p>视频引用地址可以输入虾米、雅燃音乐、音悦台、优酷、土豆、6间房、腾讯播客、新浪博客、56.com等诸多网站播放地址。建议您可以将录制好的视频传至以上媒体然后填写引用地址。</p>
				<p>同时您也可以编写介绍</p>
			</div>
			<div class="info">
				<h2>关于标签</h2>
				<p>不管发布任何内容您都需要填写至少一个标签，轻博内容将根据标签来进行区分。因此填写一个或多个合适的标签是非常不错的选择。</p>
			</div>
			<div class="info">
				<h2>关注和喜欢</h2>
				<p>加为关注的用户将会在您的首页显示最新发布动态</p>
				<p>加为喜欢的博客可方便您在右侧导航中快速的查找</p>
			</div>
        </div>
    </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->getVariable('show')->value=='call'){?>
<div id="article">
    <div class="box" style="margin-left:0px; width:600px">
        <div class="site">
            <?php echo $_smarty_tpl->getVariable('conf')->value['call'];?>

        </div>
    </div>
</div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('show')->value=='service'){?>
<div id="article">
    <div class="box" style="margin-left:0px; width:600px">
        <div class="site">
			<div class="h1">服务条款</div>
			<div class="info">
				<p>本协议适用于<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
开发的<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台。使用<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台以及与其相关联的各项技术服务和网络服务之前，您必须同意接受本协议。若不接受本协议，您将无法使用<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台及相关服务。</p>
				<p>您可以通过以下方式接受本协议：一旦您注册<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
账户并且发布第一条信息起，您对<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台及其他相关服务的使用将被视为您自实际使用起便接受了本协议的全部条款。如果需要注销用户请发送注销申请邮件，我们将删除与您有关的全部内容，您与<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
所有服务都将被终止。注册账户需要用户本人电子邮件作为注册账号，如果用户使用他人邮件账号注册并被邮件归属人举证成功者将删除用户账号及所有内容，并且一切法律责任自行承担，本站不承担任何责任。</p>
				<p><?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
网络平台的所有权和运营权归<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
所有，并保留随时变更平台提供的信息和服务的权利。<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
所提供的相关信息和服务的使用者（以下简称“用户”）在使用之前必须同意以下的所有条款。</p>
				<p>用户在<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台上发布的信息内容由用户及<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
共同所有，任何其他组织或个人未经用户本人授权同意，不得复制、转载、擅改其内容。用户不得在<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台发布和散播任何形式的含有下列内容的信息：<br />
				1）为相关法律法规所禁止；<br />
				2）有悖于社会公共秩序和善良风俗；<br />
				3）损害他人合法权益；<br />
				4）其他<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
认为不适当在本平台发布的内容。 <br />
				5）通过发布音乐的上传功能上传非用户本人拥有版权的音频媒体。       		      <br />
				<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
保留删除和变更上述相关信息的权利。</p>
				<p>用户应保证在<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台的注册信息的真实、准确和完整，并在资料变更时及时更新相关信息。对于任何信息不实所导致的用户本人或第三方损害，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
不承担任何责任。用户应妥善保管个人注册信息及登录密码等资料，用户将对以其注册用户名进行的所有活动和事件负法律责任。</p>
				<p><?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
非常强调保护用户的隐私。<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
将致力于为用户提供最可靠的隐私保护措施。未经用户的特别授权，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
不会将用户信息公开或透露给任何第三  方个人或机构，但在下列情形除外：<br />
				1) 根据司法机关、政府部门的强制命令提供涉及用户信息的相关资料； <br />
				2) 不可抗力与不可控因素导致的信息外泄；<br />
				3) <?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
基于自身的合法维权需要而使用用户的相关信息。</p>
				<p>用户同意使用<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台服务所潜在的风险及其一切可能的后果将完全由自己承担，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
对这些可能的风险和后果不承担任何责任。</p>
				<p><?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
不保证<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台提供的服务能够满足用户的所有要求，也不保证已存在的服务不会中断，对这些服务的及时性、安全性、准确性也不作保证。对于因系统维护或升级的需要而需暂停网络服务的情形，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
将视具体情形尽可能事先在重要页面发布通知。同时，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
保留在不事先通知用户的情况下中断或终止部分或全部服务的权利，对于因服务的中断或终止而造成的用户或第三方的任何损失，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
不承担任何责任。</p>
				<p>用户同意尊重和维护<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台以及其他用户的合法权益。用户因违反有关法律、法规或协议规定中的任何条款而给<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
或任何第三方造成的损失，用户同意承担由此造成的一切损害赔偿责任。</p>
				<p>在适用法律允许的范围内，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
保留对本协议任何条款的解释权和随时变更的权利。 <?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
可能会随时根据需要修改本协议的任一条款。如发生此类变更，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
会提供新版本的条款。用户在变更后对<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台服务的使用将视为已完全接受变更后的条款。</p>
				<p>本协议在根据下述规定终止前，将会一直适用。当下列情况出现时，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
可以随时中止与用户的协议：<br />
				1) 用户违反了本协议中的任何规定；<br />
				2) 法律法规要求终止本协议;<br />
				3) <?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
认为实际情形不再适宜继续执行本协议。</p>
				<p>本协议及因本协议产生的一切法律关系及纠纷，均适用中华人民共和国法律。用户与<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
在此同意以<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
营业所在地法院管辖。</p>
				<p>&nbsp;</p>
			</div>
        </div>
    </div>
</div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('show')->value=='privacy'){?>
<div id="article">
    <div class="box" style="margin-left:0px; width:600px">
        <div class="site">
			<div class="h1">隐私政策</div>
			<div class="info">
				<h2>隐私政策</h2>
				<p>当您在使用我们的服务时，我们将致力于为您提供最可靠的隐私保护措施。未经用户的特别授权，我们承诺不会将用户信息  公开或透露给任何第三方个人或机构，但在下列情形除外：<br />
				1) 根据司法机关、政府部门的强制命令提供涉及用户信息的相关资料；<br />
				2) 不可抗力与不可控因素导致的信息外泄； <br />
				3) <?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
基于自身的合法维权需要而使用用户的相关信息。</p>
				<p>为了更好地提升<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
的服务质量和进行更精准的网络数据分析，我们将在充分保护用户个人隐私的前提下，对用户数据库进行分析和处理。所有相关的数据分析结果都将被用于有价值的新产品的研发和用户体验的进一步改进。</p>
			</div>
			<div class="info">
			<h2>法律声明</h2>
				<p><?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
网络平台的所有权和运营权归<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
所有，并保留随时变更平台提供的信息和服务的权利。<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
所提供的相关信息和服务的使用者（以下简称“用户”）在使用之前必须同意以下的所有条款。</p>
				<p>用户在<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台上发布的信息内容由用户及<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
共同所有，任何其他组织或个人未经用户本人授权同意，不得复制、转载、擅改其内容。用户不得在点  点网平台发布和散播任何形式的含有下列内容的信息：1）为相关法律法规所禁止；2）有悖于社会公共秩序和善良风俗；3）损害他人合法权益；4）其他<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
  认为不适当在本平台发布的内容。 <?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
保留删除和变更上述相关信息的权利。</p>
				<p>用户应保证在<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台的注册信息的真实、准确和完整，并在资料变更时及时更新相关信息。对于任何信息不实所导致的用户本人或第三方损害，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
不承担任何责任。用户应妥善保管个人注册信息及登录密码等资料，用户将对以其注册用户名进行的所有活动和事件负法律责任。</p>
				<p><?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
非常强调保护用户的隐私。<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
将致力于为用户提供最可靠的隐私保护措施。未经用户的特别授权，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
不会将用户信息公开或透露给任何第三  方个人或机构，但在下列情形除外：1) 根据司法机关、政府部门的强制命令提供涉及用户信息的相关资料； 2) 不可抗力与不可控因素导致的信息外泄；   3) <?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
基于自身的合法维权需要而使用用户的相关信息。</p>
				<p>用户同意使用<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台服务所潜在的风险及其一切可能的后果将完全由自己承担，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
对这些可能的风险和后果不承担任何责任。</p>
				<p><?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
不保证<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台提供的服务能够满足用户的所有要求，也不保证已存在的服务不会中断，对这些服务的及时性、安全性、准确性也不作保证。对于  因系统维护或升级的需要而需暂停网络服务的情形，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
将视具体情形尽可能事先在重要页面发布通知。同时，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
保留在不事先通知用户的情况下中断或终止  部分或全部服务的权利，对于因服务的中断或终止而造成的用户或第三方的任何损失，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
不承担任何责任。</p>
				<p>用户同意尊重和维护<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台以及其他用户的合法权益。用户因违反有关法律、法规或协议规定中的任何条款而给<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
或任何第三方造成的损失，用户同意承担由此造成的一切损害赔偿责任。</p>
				<p>在适用法律允许的范围内，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
保留对本协议任何条款的解释权和随时变更的权利。 <?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
可能会随时根据需要修改本协议的任一条款。如发生此类变更，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
会提供新版本的条款。用户在变更后对<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
平台服务的使用将视为已完全接受变更后的条款。</p>
				<p>本协议在根据下述规定终止前，将会一直适用。当下列情况出现时，<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
可以随时中止与用户的协议：1) 用户违反了本协议中的任何规定；2) 法律法规要求终止本协议;3) <?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
认为实际情形不再适宜继续执行本协议。</p>
				<p>本协议及因本协议产生的一切法律关系及纠纷，均适用中华人民共和国法律。用户与<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
在此同意以<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
营业所在地法院管辖。</p>
          </div>
        </div>
    </div>
</div>
<?php }?>
<div id="about">
    <ul>
        <li class="top <?php echo $_smarty_tpl->getVariable('curr_about')->value;?>
"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','a'=>'about'),$_smarty_tpl);?>
"><span></span>关于<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
</a></li>
        <li class="<?php echo $_smarty_tpl->getVariable('curr_help')->value;?>
"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','a'=>'help'),$_smarty_tpl);?>
"><span></span>使用帮助</a></li>
        <li class="<?php echo $_smarty_tpl->getVariable('curr_call')->value;?>
"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','a'=>'call'),$_smarty_tpl);?>
"><span></span>联系我们</a></li>
        <li class="<?php echo $_smarty_tpl->getVariable('curr_service')->value;?>
"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','a'=>'service'),$_smarty_tpl);?>
"><span></span>服务条款</a></li>
        <li class="<?php echo $_smarty_tpl->getVariable('curr_privacy')->value;?>
"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','a'=>'privacy'),$_smarty_tpl);?>
"><span></span>隐私申明</a> </li>
        <li class="bottom"><a href="<?php echo goUserHome(array('uid'=>1),$_smarty_tpl);?>
"><span></span>官方博客</a> </li>
    </ul>
    <div class="clear"></div>
</div>
<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>