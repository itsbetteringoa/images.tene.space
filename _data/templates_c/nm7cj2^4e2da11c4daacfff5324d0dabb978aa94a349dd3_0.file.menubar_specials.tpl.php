<?php
/* Smarty version 3.1.29, created on 2016-06-13 11:52:18
  from "/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/menubar_specials.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575e74423374e1_41010786',
  'file_dependency' => 
  array (
    '4e2da11c4daacfff5324d0dabb978aa94a349dd3' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/menubar_specials.tpl',
      1 => 1458476976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575e74423374e1_41010786 ($_smarty_tpl) {
?>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo l10n('Specials');?>
 <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
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
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['link']->value['TITLE'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['link']->value['REL'])) {?> <?php echo $_smarty_tpl->tpl_vars['link']->value['REL'];
}?>><?php echo $_smarty_tpl->tpl_vars['link']->value['NAME'];?>
</a></li>
<?php
$_smarty_tpl->tpl_vars['link'] = $__foreach_link_0_saved_local_item;
}
if ($__foreach_link_0_saved_item) {
$_smarty_tpl->tpl_vars['link'] = $__foreach_link_0_saved_item;
}
?>
    </ul>
</li>
<?php }
}
