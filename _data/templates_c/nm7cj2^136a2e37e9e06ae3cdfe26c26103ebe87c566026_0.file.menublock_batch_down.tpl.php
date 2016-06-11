<?php
/* Smarty version 3.1.29, created on 2016-06-11 16:35:10
  from "/home/j/jakovlevz/test/public_html/subdomains/images/plugins/BatchDownloader/template/menublock_batch_down.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575c138eb2ab75_01246155',
  'file_dependency' => 
  array (
    '136a2e37e9e06ae3cdfe26c26103ebe87c566026' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/plugins/BatchDownloader/template/menublock_batch_down.tpl',
      1 => 1424954618,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575c138eb2ab75_01246155 ($_smarty_tpl) {
?>
<dt><?php echo $_smarty_tpl->tpl_vars['block']->value->get_title();?>
</dt>
<dd>
	<ul>
<?php
$_from = $_smarty_tpl->tpl_vars['block']->value->data;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_link_0_saved_item = isset($_smarty_tpl->tpl_vars['link']) ? $_smarty_tpl->tpl_vars['link'] : false;
$_smarty_tpl->tpl_vars['link'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['link']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->_loop = true;
$__foreach_link_0_saved_local_item = $_smarty_tpl->tpl_vars['link'];
?>
		<li>
      <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['link']->value['TITLE'];?>
" rel="nofollow"><?php echo $_smarty_tpl->tpl_vars['link']->value['NAME'];?>
</a>
      <span class="menuInfoCat">[<?php echo $_smarty_tpl->tpl_vars['link']->value['COUNT'];?>
]</span>
    </li>
<?php
$_smarty_tpl->tpl_vars['link'] = $__foreach_link_0_saved_local_item;
}
if ($__foreach_link_0_saved_item) {
$_smarty_tpl->tpl_vars['link'] = $__foreach_link_0_saved_item;
}
?>
	</ul>
</dd>
<?php }
}
