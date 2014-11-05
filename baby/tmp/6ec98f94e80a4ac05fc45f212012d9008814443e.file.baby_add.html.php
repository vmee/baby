<?php /* Smarty version Smarty-3.0.6, created on 2014-11-05 16:06:15
         compiled from "/home/kingkong/Projects/php/baby/tpl/baby_add.html" */ ?>
<?php /*%%SmartyHeaderCode:8171171915459da7738def7-96425235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ec98f94e80a4ac05fc45f212012d9008814443e' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/baby_add.html',
      1 => 1415174773,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8171171915459da7738def7-96425235',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('addcss','yes');$_template->assign('editor','yes');$_template->assign('titlepre',"发布文字"); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div class="contentTop"></div>
<div class="content">
<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'baby','a'=>'post'),$_smarty_tpl);?>
" id="form1" method="post">
  <div id="hearder_bg">

    <div id="main">
  
      <h2 id="title">宝宝入驻</h2>
      <div id="pb-post-area">
        <div>
          <h3 class="title"> 宝宝名字 </h3>
          <input type="text" name="baby[name]" id="pb-text-title" class="input" tabindex="1" value="<?php echo $_smarty_tpl->getVariable('baby')->value['name'];?>
">
        </div>
          <div>
              <h3 class="title"> 出生时间 </h3>
              <input type="text" name="baby[birth_time]" class="input" tabindex="1" value="<?php echo $_smarty_tpl->getVariable('baby')->value['birth_time'];?>
">
          </div>

          <div>
              <h3 class="title"> 出生地 </h3>
              <input type="text" name="baby[birthplace]" class="input" tabindex="1" value="<?php echo $_smarty_tpl->getVariable('baby')->value['birthplace'];?>
">
          </div>

      <div id="pb-action-holder"> 
          <a id="submit" class="blue-button">提交</a>
          <a id="cancel" class="gray-button">取消</a> 
       <span style="display:none;" id="pb-submiting-tip">正在保存...</span>
      </div>
    </div>





      <!--
        <div class="aside-item pb-side-opt" id="top-post-holder">
         <label> <input name="pb-sync-to-qqweibo" type="checkbox" id="pb-sync-to-qqweibo" value="1">转发腾讯微薄</label>
      </div>
      -->

      <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('baby')->value['babyid'];?>
" />
   
      
    </div>

      <div id="aside">
          <div class="aside-item" id="post-privacy-holder">
              <h4>宝宝头像  <div class="uploadBtn" id="upload_photo"><span>上传头像</span><input type="file" size="1" name="filedata" ext="jpg,jpeg,gif,png" /></div></h4>
              <hr class="separator">
              <img name="" src="<?php echo avatar(array('uid'=>$_SESSION['uid'],'babyid'=>0,'size'=>'big','time'=>1),$_smarty_tpl);?>
" alt="" style="max-width:170px" />
          </div>

          <hr class="separator">
      </div>
    <div class="clear"></div>
  </div>
</form>
</div>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
