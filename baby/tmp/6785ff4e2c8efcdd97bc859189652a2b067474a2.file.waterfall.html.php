<?php /* Smarty version Smarty-3.0.6, created on 2014-11-03 17:31:50
         compiled from "/home/kingkong/Projects/php/baby/tpl/waterfall.html" */ ?>
<?php /*%%SmartyHeaderCode:157737355154574b86bc4b98-89363211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6785ff4e2c8efcdd97bc859189652a2b067474a2' => 
    array (
      0 => '/home/kingkong/Projects/php/baby/tpl/waterfall.html',
      1 => 1336899822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157737355154574b86bc4b98-89363211',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('header','yes');$_template->assign('waterfall','yes');$_template->assign('gallery','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div id="container">
	<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
	<div class="col">
		<div class="image" onMouseOver="show(<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
)" onMouseOut="none(<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
)">
			<div class="highslide-gallery">
				<a class="highslide" href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/<?php echo $_smarty_tpl->tpl_vars['d']->value['img_url'];?>
" onclick="return hs.expand(this)"><img src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/<?php echo $_smarty_tpl->tpl_vars['d']->value['img_url'];?>
" class="feedimg" alt="<?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
"/></a>
			</div>
			<div class="user-interaction" id="user-interaction-<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
" style="display:none">
				<dl class="user-interaction interaction-good">
					<dt mark="<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
" uid="<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
" id="interaction-good-container-<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
">
					<a onClick="sEval(<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
,1)" title="顶">顶</a>
					</dt>
					<dd id="<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['good'];?>
</dd>
				</dl>
				<dl class="user-interaction interaction-bad">
					<dt mark="<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
" uid="<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
" id="interaction-bad-container-<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
"> 
					<a onClick="sEval(<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
,2)" title="踩">踩</a>                             
					</dt>                             
					<dd id="<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['bad'];?>
</dd>
				</dl>
				<?php if (islogin()){?>
				<dl class="user-interaction interaction-collect">
					<dt mark="<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
" uid="<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
" id="interaction-collect-container-<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
"> 
					<a href="javascript:void(0)" onclick="collect('<?php echo $_smarty_tpl->getVariable('url')->value;?>
/index.php?c=main&a=collect&bid=<?php echo $_smarty_tpl->tpl_vars['d']->value['blog_id'];?>
')" title="收集">收集</a>                             
					</dt>
				</dl>
				<?php }?>
			</div>
		</div>
		
		<div class="bottombar">
			<div class="title"><?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
 <a href=<?php echo goUserBlog(array('bid'=>$_smarty_tpl->tpl_vars['d']->value['blog_id']),$_smarty_tpl);?>
>评论(<?php echo $_smarty_tpl->tpl_vars['d']->value['commentcount'];?>
)</a></div>
			
			<div class="user_bar">
				<div class="user_avatar">
				<a href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/index.php?c=userblog&a=index&domain=<?php echo $_smarty_tpl->tpl_vars['d']->value['domain'];?>
"><img  src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/avatar/<?php echo $_smarty_tpl->tpl_vars['d']->value['avatar'];?>
"/>
				<?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
</a>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['d']->value['ctime'];?>

				
				</div>
			</div>
		</div>
	</div>
	
	<?php }} ?>
	
</div>
<!--<div class="page clear">
	<div class="pages">
		<div class="nav"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
</div>
    </div>
</div>-->
<div id="page_nav">
    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'waterfall','page'=>$_smarty_tpl->getVariable('page')->value+1),$_smarty_tpl);?>
">下一页</a>
</div>
<div id="ajax-loader" style="width: 120px; height: 20px; margin-top: 0px; margin-right: auto; margin-bottom: 0px; margin-left: auto; display: none; ">加载中···</div>

<script type="text/javascript">
function show(id){
    document.getElementById('user-interaction-'+id).style.display='block';
}
function none(id){
    document.getElementById('user-interaction-'+id).style.display='none';
}
$(document).ready(function(){
	/*$('#container').masonry({
	itemSelector : '.col',
	columnWidth : 245
	});*/
	// #thumbs 为包含所有图片的容器
    var $container = $('#container');
	$container.masonry({
	itemSelector : '.col',
	columnWidth : 245
	});
    // 使用 imagesLoaded() 修复该插件在 chrome 下的问题
    /*$container.imagesLoaded(function(){
      $container.masonry({
        // 每一列数据的宽度，若所有栏目块的宽度相同，可以不填这段
        columnWidth: 245,
        // .imgbox 为各个图片的容器
        itemSelector : '.col',
		isAnimated: !Modernizr.csstransitions
      });
    });*/
	nextHref = $("#page_nav a").attr("href");
	// 给浏览器窗口绑定 scroll 事件
	$(window).bind("scroll",function(){
		// 判断窗口的滚动条是否接近页面底部
		if( $(document).scrollTop() + $(window).height() > $(document).height() - 10 ) {
			// 判断下一页链接是否为空
			if( nextHref != undefined ) {
				// 显示正在加载模块
				$("#ajax-loader").show("slow");
				// Ajax 翻页
				$.ajax( {
					url: $("#page_nav a").attr("href"),
					type: "POST",
					success: function(data) {
						result = $(data).find("#container .col");
						nextHref = $(data).find("#page_nav a").attr("href");
						$("#page_nav a").attr("href", nextHref);
						$("#container").append(result);
						// 把新的内容设置为透明
						$newElems = result.css({ opacity: 0 });
						//$newElems = result;
						$newElems.imagesLoaded(function(){
							$container.masonry( 'appended', $newElems, true);
							// 渐显新的内容
							$newElems.animate({ opacity: 1 });
							// 隐藏正在加载模块
							$("#ajax-loader").hide("slow");
						});
	 
					}
				});
			} else {
				$("#ajax-loader span").text("木有了噢，最后一页了！");
				$("#ajax-loader").show("fast");
				setTimeout("$('#ajax-loader').hide()",1000);
				setTimeout("$('#ajax-loader').remove()",1100);
			}
		}
	});
});

</script>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>