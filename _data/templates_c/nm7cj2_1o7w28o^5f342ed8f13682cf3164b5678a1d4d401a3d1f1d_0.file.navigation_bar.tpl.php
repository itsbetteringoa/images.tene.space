<?php
/* Smarty version 3.1.29, created on 2016-06-11 16:35:11
  from "/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/navigation_bar.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575c138f2c7552_43751157',
  'file_dependency' => 
  array (
    '5f342ed8f13682cf3164b5678a1d4d401a3d1f1d' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/navigation_bar.tpl',
      1 => 1458476976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575c138f2c7552_43751157 ($_smarty_tpl) {
?>
<div class="text-center">
    <ul class="pagination pagination-centered">
<?php if (isset($_smarty_tpl->tpl_vars['navbar']->value['URL_FIRST'])) {?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['navbar']->value['URL_FIRST'];
if ($_smarty_tpl->tpl_vars['fragment']->value) {?>#<?php echo $_smarty_tpl->tpl_vars['fragment']->value;
}?>" rel="first"><?php echo l10n('First');?>
</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['navbar']->value['URL_PREV'];
if ($_smarty_tpl->tpl_vars['fragment']->value) {?>#<?php echo $_smarty_tpl->tpl_vars['fragment']->value;
}?>" rel="prev"><?php echo l10n('Previous');?>
</a></li>
<?php } else { ?>
        <li class="disabled"><a href="#"><?php echo l10n('First');?>
</a></li>
        <li class="disabled"><a href="#"><?php echo l10n('Previous');?>
</a></li>
<?php }
$_smarty_tpl->tpl_vars['prev_page'] = new Smarty_Variable(0, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'prev_page', 0);
$_from = $_smarty_tpl->tpl_vars['navbar']->value['pages'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_url_0_saved_item = isset($_smarty_tpl->tpl_vars['url']) ? $_smarty_tpl->tpl_vars['url'] : false;
$__foreach_url_0_saved_key = isset($_smarty_tpl->tpl_vars['page']) ? $_smarty_tpl->tpl_vars['page'] : false;
$_smarty_tpl->tpl_vars['url'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['page'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['url']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['page']->value => $_smarty_tpl->tpl_vars['url']->value) {
$_smarty_tpl->tpl_vars['url']->_loop = true;
$__foreach_url_0_saved_local_item = $_smarty_tpl->tpl_vars['url'];
if ($_smarty_tpl->tpl_vars['page']->value == $_smarty_tpl->tpl_vars['navbar']->value['CURRENT_PAGE']) {?>
        <li class="active"><a href="#"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
<?php } else { ?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_smarty_tpl->tpl_vars['fragment']->value) {?>#<?php echo $_smarty_tpl->tpl_vars['fragment']->value;
}?>"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
<?php }
$_smarty_tpl->tpl_vars['prev_page'] = new Smarty_Variable($_smarty_tpl->tpl_vars['page']->value, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'prev_page', 0);
$_smarty_tpl->tpl_vars['url'] = $__foreach_url_0_saved_local_item;
}
if ($__foreach_url_0_saved_item) {
$_smarty_tpl->tpl_vars['url'] = $__foreach_url_0_saved_item;
}
if ($__foreach_url_0_saved_key) {
$_smarty_tpl->tpl_vars['page'] = $__foreach_url_0_saved_key;
}
?>

<?php if (isset($_smarty_tpl->tpl_vars['navbar']->value['URL_NEXT'])) {?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['navbar']->value['URL_NEXT'];
if ($_smarty_tpl->tpl_vars['fragment']->value) {?>#<?php echo $_smarty_tpl->tpl_vars['fragment']->value;
}?>" rel="next"><?php echo l10n('Next');?>
</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['navbar']->value['URL_LAST'];
if ($_smarty_tpl->tpl_vars['fragment']->value) {?>#<?php echo $_smarty_tpl->tpl_vars['fragment']->value;
}?>" rel="last"><?php echo l10n('Last');?>
</a></li>
<?php } else { ?>
        <li class="disabled"><a href="#"><?php echo l10n('Next');?>
</a></li>
        <li class="disabled"><a href="#"><?php echo l10n('Last');?>
</a></li>
<?php }?>
    </ul>
</div><?php }
}
