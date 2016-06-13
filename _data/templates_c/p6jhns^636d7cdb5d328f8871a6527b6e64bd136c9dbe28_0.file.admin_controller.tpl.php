<?php
/* Smarty version 3.1.29, created on 2016-06-13 06:06:56
  from "/home/j/jakovlevz/test/public_html/subdomains/images/plugins/AdminTools/template/admin_controller.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575e2350c9fa72_43469275',
  'file_dependency' => 
  array (
    '636d7cdb5d328f8871a6527b6e64bd136c9dbe28' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/plugins/AdminTools/template/admin_controller.tpl',
      1 => 1462350728,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575e2350c9fa72_43469275 ($_smarty_tpl) {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>($_smarty_tpl->tpl_vars['ADMINTOOLS_PATH']->value).('template/admin_style.css')),$_smarty_tpl);
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>($_smarty_tpl->tpl_vars['ADMINTOOLS_PATH']->value).('template/fontello/css/fontello-ato.css')),$_smarty_tpl);
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'admintools.controller','load'=>'footer','require'=>'jquery','path'=>($_smarty_tpl->tpl_vars['ADMINTOOLS_PATH']->value).('template/admin_controller.js')),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_cache['tag_stack'][] = array('footer_script', array('require'=>'admintools.controller')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'admintools.controller'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

AdminTools.urlWS = '<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ws.php?format=json&method=';
AdminTools.urlSelf = '<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
';

AdminTools.multiView = {
  view_as: <?php echo $_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['view_as'];?>
,
  theme: '<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['name'];?>
',
  lang: '<?php echo $_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['lang'];?>
'
};

<?php if ($_smarty_tpl->tpl_vars['ato']->value['DELETE_CACHE']) {?>
  AdminTools.deleteCache();
<?php }?>
  AdminTools.init();
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'admintools.controller'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_cache['tag_stack']);?>


<ul class="multiview">
  <li><label><?php echo l10n('View as');?>
</label>
    <select class="switcher" data-type="view_as"></select>
  </li>
  <li><label><?php echo l10n('Theme');?>
</label>
    <select class="switcher" data-type="theme"></select>
  </li>
  <li><label><?php echo l10n('Language');?>
</label>
    <select class="switcher" data-type="lang"></select>
  </li>
  <li><a class="icon-check<?php if (!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['show_queries']) {?>-empty<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
ato_show_queries=<?php echo (int)!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['show_queries'];?>
"><?php echo l10n('Show SQL queries');?>
</a></li>
  <li><a class="icon-check<?php if (!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['debug_l10n']) {?>-empty<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
ato_debug_l10n=<?php echo (int)!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['debug_l10n'];?>
"><?php echo l10n('Debug languages');?>
</a></li>
  <li><a class="icon-check<?php if (!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['debug_template']) {?>-empty<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
ato_debug_template=<?php echo (int)!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['debug_template'];?>
"><?php echo l10n('Debug template');?>
</a></li>
  <li><a class="icon-check<?php if (!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['template_combine_files']) {?>-empty<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
ato_template_combine_files=<?php echo (int)!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['template_combine_files'];?>
"><?php echo l10n('Combine JS&CSS');?>
</a></li>
  <li><a class="icon-check<?php if ($_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['no_history']) {?>-empty<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
ato_no_history=<?php echo (int)!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['no_history'];?>
"><?php echo l10n('Save visit in history');?>
</a></li>
  <li><a class="icon-ato-null" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
ato_purge_template=1"><?php echo l10n('Purge compiled templates');?>
</a></li>
</ul><?php }
}
