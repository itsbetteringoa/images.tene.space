<?php
/* Smarty version 3.1.29, created on 2016-06-11 16:35:10
  from "/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/menubar_tags.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575c138eac84b1_26781818',
  'file_dependency' => 
  array (
    'b12dc71e0efb97da7458360d50c020b38608e434' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/menubar_tags.tpl',
      1 => 1458476976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575c138eac84b1_26781818 ($_smarty_tpl) {
?>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo l10n('Related tags');?>
 <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
<?php
$_from = $_smarty_tpl->tpl_vars['block']->value->data;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_tag_0_saved_item = isset($_smarty_tpl->tpl_vars['tag']) ? $_smarty_tpl->tpl_vars['tag'] : false;
$_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['tag']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
$__foreach_tag_0_saved_local_item = $_smarty_tpl->tpl_vars['tag'];
?>
		<li>
            <a class="tagLevel<?php echo $_smarty_tpl->tpl_vars['tag']->value['level'];?>
" href=<?php if (isset($_smarty_tpl->tpl_vars['tag']->value['U_ADD'])) {?>"<?php echo $_smarty_tpl->tpl_vars['tag']->value['U_ADD'];?>
" title="<?php echo l10n_dec('%d photo is also linked to current tags','%d photos are also linked to current tags',$_smarty_tpl->tpl_vars['tag']->value['counter']);?>
" rel="nofollow">+<?php } else { ?>"<?php echo $_smarty_tpl->tpl_vars['tag']->value['URL'];?>
" title="<?php echo l10n('display photos linked to this tag');?>
"><?php }
echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</a>
        </li>
<?php
$_smarty_tpl->tpl_vars['tag'] = $__foreach_tag_0_saved_local_item;
}
if ($__foreach_tag_0_saved_item) {
$_smarty_tpl->tpl_vars['tag'] = $__foreach_tag_0_saved_item;
}
?>
    </ul>
</li><?php }
}
