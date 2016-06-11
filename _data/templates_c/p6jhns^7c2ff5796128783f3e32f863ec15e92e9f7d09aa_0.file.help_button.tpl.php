<?php
/* Smarty version 3.1.29, created on 2016-06-11 16:33:40
  from "/home/j/jakovlevz/test/public_html/subdomains/images/plugins/ExtendedDescription/template/help_button.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575c13340643c0_55977966',
  'file_dependency' => 
  array (
    '7c2ff5796128783f3e32f863ec15e92e9f7d09aa' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/plugins/ExtendedDescription/template/help_button.tpl',
      1 => 1388832892,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575c13340643c0_55977966 ($_smarty_tpl) {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'core.scripts','load'=>'async','path'=>'themes/default/js/scripts.js'),$_smarty_tpl);?>

<a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
admin/popuphelp.php?page=extended_desc" onclick="popuphelp(this.href); return false;" title="<?php echo l10n('Use Extended Description tags...');?>
" style="vertical-align: middle; border: 0; margin: 0.5em;"><img src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;
echo $_smarty_tpl->tpl_vars['themeconf']->value['admin_icon_dir'];?>
/help.png" class="button" alt="<?php echo l10n('Use Extended Description tags...');?>
'"></a><?php }
}
