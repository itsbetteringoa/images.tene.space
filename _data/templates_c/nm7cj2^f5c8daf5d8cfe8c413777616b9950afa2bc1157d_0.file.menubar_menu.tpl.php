<?php
/* Smarty version 3.1.29, created on 2016-06-11 16:35:10
  from "/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/menubar_menu.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575c138eb112b6_42779087',
  'file_dependency' => 
  array (
    'f5c8daf5d8cfe8c413777616b9950afa2bc1157d' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/menubar_menu.tpl',
      1 => 1458476976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575c138eb112b6_42779087 ($_smarty_tpl) {
?>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo l10n('Menu');?>
 <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
<?php if (isset($_smarty_tpl->tpl_vars['block']->value->data['qsearch']) && $_smarty_tpl->tpl_vars['block']->value->data['qsearch'] == true) {?>
    <div class="navbar-form-desktop">
        <form class="navbar-form" role="search" action="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
qsearch.php" method="get" id="quicksearch" onsubmit="return this.q.value!='' && this.q.value!=qsearch_prompt;">
            <div class="form-group">
                <input type="text" name="q" id="qsearchInput" class="form-control" placeholder="<?php echo l10n('Quick search');?>
" />
            </div>
        </form>
        <li class="divider"></li>
    </div>
<?php }
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
if (is_array($_smarty_tpl->tpl_vars['link']->value)) {?>
        <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['link']->value['TITLE'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['link']->value['REL'])) {?> <?php echo $_smarty_tpl->tpl_vars['link']->value['REL'];
}?>><?php echo $_smarty_tpl->tpl_vars['link']->value['NAME'];?>

                <?php if (isset($_smarty_tpl->tpl_vars['link']->value['COUNTER'])) {?><span class="badge"><?php echo $_smarty_tpl->tpl_vars['link']->value['COUNTER'];?>
</span><?php }?>
            </a>
        </li>
<?php }
$_smarty_tpl->tpl_vars['link'] = $__foreach_link_0_saved_local_item;
}
if ($__foreach_link_0_saved_item) {
$_smarty_tpl->tpl_vars['link'] = $__foreach_link_0_saved_item;
}
?>
    </ul>
</li><?php }
}
