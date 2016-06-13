<?php
/* Smarty version 3.1.29, created on 2016-06-13 11:52:18
  from "/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/infos_errors.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575e74426f2da3_67204658',
  'file_dependency' => 
  array (
    'bd8c3388d7f6bc004ae3a357c88ff1bbeedcedf4' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/infos_errors.tpl',
      1 => 1465315922,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575e74426f2da3_67204658 ($_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
<div class="container">
<?php
$_from = $_smarty_tpl->tpl_vars['errors']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_error_0_saved_item = isset($_smarty_tpl->tpl_vars['error']) ? $_smarty_tpl->tpl_vars['error'] : false;
$_smarty_tpl->tpl_vars['error'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['error']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
$__foreach_error_0_saved_local_item = $_smarty_tpl->tpl_vars['error'];
if (!strstr($_smarty_tpl->tpl_vars['error']->value,"Language Switch")) {?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    </div>
<?php }
$_smarty_tpl->tpl_vars['error'] = $__foreach_error_0_saved_local_item;
}
if ($__foreach_error_0_saved_item) {
$_smarty_tpl->tpl_vars['error'] = $__foreach_error_0_saved_item;
}
?>
</div>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['infos']->value)) {?>
<div class="container">
<?php
$_from = $_smarty_tpl->tpl_vars['infos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_info_1_saved_item = isset($_smarty_tpl->tpl_vars['info']) ? $_smarty_tpl->tpl_vars['info'] : false;
$_smarty_tpl->tpl_vars['info'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['info']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['info']->value) {
$_smarty_tpl->tpl_vars['info']->_loop = true;
$__foreach_info_1_saved_local_item = $_smarty_tpl->tpl_vars['info'];
?>
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <?php echo $_smarty_tpl->tpl_vars['info']->value;?>

    </div>
<?php
$_smarty_tpl->tpl_vars['info'] = $__foreach_info_1_saved_local_item;
}
if ($__foreach_info_1_saved_item) {
$_smarty_tpl->tpl_vars['info'] = $__foreach_info_1_saved_item;
}
?>
</div>
<?php }
}
}
