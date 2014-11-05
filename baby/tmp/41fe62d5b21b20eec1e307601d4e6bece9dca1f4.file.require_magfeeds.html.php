<?php /* Smarty version Smarty-3.0.6, created on 2014-11-05 11:09:07
         compiled from "/home/kingkong/Projects/php/baby/tpl/require_magfeeds.html" */ ?>
<?php /*%%SmartyHeaderCode:434567671545994d34e7ff9-65513559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41fe62d5b21b20eec1e307601d4e6bece9dca1f4' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/require_magfeeds.html',
      1 => 1336888573,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '434567671545994d34e7ff9-65513559',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
<div class="box" id="blog_<?php echo $_smarty_tpl->tpl_vars['d']->value['boardinfo']['id'];?>
">
     <div class="top">
     	<a href="<?php echo goUserHome(array('domain'=>$_smarty_tpl->tpl_vars['d']->value['blog']['domain'],'uid'=>$_smarty_tpl->tpl_vars['d']->value['blog']['uid']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['user']['username'];?>
" target="_blank"> 
     	<div class="face"><img src="<?php echo avatar(array('uid'=>$_smarty_tpl->tpl_vars['d']->value['blog']['uid'],'size'=>'middle'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['user']['username'];?>
"/></div></a>
     </div>
     <div class="header">
      <?php if ($_smarty_tpl->tpl_vars['d']->value['boardinfo']['title']){?> <h1><a href="<?php echo goUserBlog(array('bid'=>$_smarty_tpl->tpl_vars['d']->value['blog']['bid']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['d']->value['boardinfo']['title'];?>
</a></h1> <?php }?>
	  <span id="pubtime"><?php echo dtktime(array('time'=>$_smarty_tpl->tpl_vars['d']->value['blog']['time']),$_smarty_tpl);?>
</span>
     </div>
     
     <div id="feedText_<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
" class="content">
           <?php echo feeds(array('item'=>$_smarty_tpl->tpl_vars['d']->value['blog']['body'],'type'=>$_smarty_tpl->tpl_vars['d']->value['blog']['type'],'limit'=>$_smarty_tpl->getVariable('limits')->value,'bid'=>$_smarty_tpl->tpl_vars['d']->value['blog']['bid']),$_smarty_tpl);?>

     </div>
     
     <div class="footer">
	  <div class="tag"><div class="lable">标签:</div><?php echo tag(array('tag'=>$_smarty_tpl->tpl_vars['d']->value['blog']['tag'],'c'=>'tag'),$_smarty_tpl);?>
</div>
	  <div class="mark">
			<div id="mark0" onmouseover="this.style.backgroundPosition='0 0'" onmouseout="this.style.backgroundPosition='-67px 0'" onfocus="this.blur()" onClick="sEval(<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
,1)">
				<span id="barnum1"><span id="<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['good_num'];?>
</span></span>
			</div>
			<div id="mark1" onmouseover="this.style.backgroundPosition='-202px 0'" onmouseout="this.style.backgroundPosition='-135px 0'" onfocus="this.blur()" onclick="sEval(<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
,2)">
				<span id="barnum2"><span id="s<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bad_num'];?>
</span></span>
			</div>
		</div>
      <div class="menu">
      <?php if ($_smarty_tpl->tpl_vars['d']->value['blog']['title']==''){?><a href="<?php echo goUserBlog(array('bid'=>$_smarty_tpl->tpl_vars['d']->value['blog']['bid']),$_smarty_tpl);?>
">全文</a><?php }?>
      
       
           <a href="javascript:void(0)" onclick="indexPostTab('feeds','<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
','<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'getFeeds'),$_smarty_tpl);?>
')" id="hid_btn_<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
">动态<em><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['feedcount'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1!=0){?>(<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['feedcount'];?>
)<?php }?></em></a>
               <?php if (islogin()){?>
               	
                	<a href="javascript:void(0)" onclick="indexPostTab('comment','<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
','<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'getReplay'),$_smarty_tpl);?>
')" id="comment_btn_<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
">
      				评论<em><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['replaycount'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2!=0){?>(<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['replaycount'];?>
)<?php }?></em></a>
       
                	<?php if ($_smarty_tpl->tpl_vars['d']->value['boardinfo']['uid']!=$_SESSION['uid']){?>
                       <?php if ($_smarty_tpl->tpl_vars['d']->value['blog']['followid']!=''){?> <a href="javascript:void(0)" onclick="follows('<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['uid'];?>
','<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'follows'),$_smarty_tpl);?>
')">已关注</a> <?php }else{ ?>
                       <a href="javascript:void(0)" onclick="follows('<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['uid'];?>
','<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'follows'),$_smarty_tpl);?>
')">关注</a>
                       <?php }?>
                    <?php }?>
                   
                    <a href="javascript:void(0)" onclick="collect(<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
,<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['uid'];?>
)">收集</a> 
					<?php if (!isset($_smarty_tpl->tpl_vars['d']) || !is_array($_smarty_tpl->tpl_vars['d']->value)) $_smarty_tpl->createLocalArrayVariable('d');
if ($_smarty_tpl->tpl_vars['d']->value['boardinfo']['uid'] = $_SESSION['uid']){?>
					<a href="javascript:void(0)" onclick="edit_magazine(<?php echo $_smarty_tpl->tpl_vars['d']->value['boardinfo']['id'];?>
,<?php echo $_smarty_tpl->getVariable('url')->value;?>
)">编辑</a>
					
					<?php }?>
                
                   <?php if ($_smarty_tpl->tpl_vars['d']->value['blog']['uid']==$_SESSION['uid']||$_SESSION['admin']==1){?>
                    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'add','a'=>'edit','id'=>$_smarty_tpl->tpl_vars['d']->value['blog']['bid']),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/edit.gif" title="编辑<?php if ($_smarty_tpl->tpl_vars['d']->value['blog']['open']==0){?>草稿<?php }?>" /></a> 
                    <span class="delrep"><a href="javascript:void(0)" onclick="delcollects('<?php echo $_smarty_tpl->tpl_vars['d']->value['boardinfo']['id'];?>
','<?php echo $_smarty_tpl->getVariable('url')->value;?>
/index.php?c=magazine&a=del&id=<?php echo $_smarty_tpl->tpl_vars['d']->value['boardinfo']['id'];?>
')" title="删除">&nbsp;&nbsp;&nbsp;</a></span>
					
                   <?php }?>
               <?php }?>
   
      </div>
        <div class="clear"></div>
     </div>

 
                    <div style="display:none" id="comment_<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
">
                      <div class="comment">
                      <?php if (islogin()){?>
                          <textarea id="replyInput_<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
"></textarea>
                          <input type="hidden" id="replyTo_<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
" />
                          <div class="submit">
                           <em class="green" id="replyInput_lengthinf_<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
"></em>
                           <input type="button" value="提交评论" onclick="sendReplay('<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
','<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'replay'),$_smarty_tpl);?>
')" class="btn" />
                       </div>
                          <?php }?>
                        <ul class="commentList" id="commentList_<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
"></ul>
                      </div>
                    </div>
                    
                     <div id="feeds_<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
"  style="display:none">
                      <div class="comment">


                        <ul class="feedList" id="feedList_<?php echo $_smarty_tpl->tpl_vars['d']->value['blog']['bid'];?>
">
                        </ul>
                      </div>
                    </div>
     
   
    </div>
<?php }} ?>
