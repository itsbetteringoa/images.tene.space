<?php
/* Smarty version 3.1.29, created on 2016-06-13 11:52:18
  from "/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/menubar.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575e74422e3b42_63572361',
  'file_dependency' => 
  array (
    '18101a9fa19340dd38826eed2a58658cd5272052' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/menubar.tpl',
      1 => 1465801426,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575e74422e3b42_63572361 ($_smarty_tpl) {
?>
            <!-- Start of menubar.tpl -->
            <ul class="nav navbar-nav">
            
<?php
$_from = $_smarty_tpl->tpl_vars['blocks']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_block_0_saved_item = isset($_smarty_tpl->tpl_vars['block']) ? $_smarty_tpl->tpl_vars['block'] : false;
$__foreach_block_0_saved_key = isset($_smarty_tpl->tpl_vars['id']) ? $_smarty_tpl->tpl_vars['id'] : false;
$_smarty_tpl->tpl_vars['block'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['id'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['block']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['block']->value) {
$_smarty_tpl->tpl_vars['block']->_loop = true;
$__foreach_block_0_saved_local_item = $_smarty_tpl->tpl_vars['block'];
if ($_smarty_tpl->tpl_vars['id']->value == 'mbBatchDownloader') {?> <?php continue 1;?> <?php }
if (!empty($_smarty_tpl->tpl_vars['block']->value->template)) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent($_smarty_tpl->tpl_vars['block']->value->template,$_smarty_tpl->tpl_vars['id']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php } else {
echo $_smarty_tpl->tpl_vars['block']->value->raw_content;?>

<?php }
$_smarty_tpl->tpl_vars['block'] = $__foreach_block_0_saved_local_item;
}
if ($__foreach_block_0_saved_item) {
$_smarty_tpl->tpl_vars['block'] = $__foreach_block_0_saved_item;
}
if ($__foreach_block_0_saved_key) {
$_smarty_tpl->tpl_vars['id'] = $__foreach_block_0_saved_key;
}
?>
            </ul>
            <!-- End of menubar.tpl -->
<?php }
}
