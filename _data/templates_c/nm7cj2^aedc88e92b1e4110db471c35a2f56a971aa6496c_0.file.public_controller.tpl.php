<?php
/* Smarty version 3.1.29, created on 2016-06-13 06:08:04
  from "/home/j/jakovlevz/test/public_html/subdomains/images/plugins/AdminTools/template/public_controller.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575e2394820b60_93538642',
  'file_dependency' => 
  array (
    'aedc88e92b1e4110db471c35a2f56a971aa6496c' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/plugins/AdminTools/template/public_controller.tpl',
      1 => 1462350728,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575e2394820b60_93538642 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/home/j/jakovlevz/test/public_html/subdomains/images/include/smarty/libs/plugins/function.html_options.php';
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>($_smarty_tpl->tpl_vars['ADMINTOOLS_PATH']->value).('template/public_style.css')),$_smarty_tpl);
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>'admin/themes/default/fontello/css/fontello.css'),$_smarty_tpl);
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>($_smarty_tpl->tpl_vars['ADMINTOOLS_PATH']->value).('template/fontello/css/fontello-ato.css')),$_smarty_tpl);
if (isset($_smarty_tpl->tpl_vars['ato']->value['QUICK_EDIT'])) {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'mousetrap','load'=>'footer','path'=>($_smarty_tpl->tpl_vars['ADMINTOOLS_PATH']->value).('template/mousetrap.min.js')),$_smarty_tpl);
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.colorbox','load'=>'footer','require'=>'jquery','path'=>'themes/default/js/plugins/jquery.colorbox.min.js'),$_smarty_tpl);
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('id'=>'colorbox','path'=>'themes/default/js/plugins/colorbox/style2/colorbox.css'),$_smarty_tpl);
if (isset($_smarty_tpl->tpl_vars['ato']->value['IS_PICTURE'])) {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.tokeninput','load'=>'footer','require'=>'jquery','path'=>'themes/default/js/plugins/jquery.tokeninput.js'),$_smarty_tpl);
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>'themes/default/js/plugins/jquery.tokeninput.css'),$_smarty_tpl);
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.ui.datepicker','load'=>'footer','path'=>'themes/default/js/ui/jquery.ui.datepicker.js'),$_smarty_tpl);
$_smarty_tpl->tpl_vars['datepicker_language'] = new Smarty_Variable((('themes/default/js/ui/i18n/jquery.ui.datepicker-').($_smarty_tpl->tpl_vars['lang_info']->value['code'])).('.js'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'datepicker_language', 0);
if (file_exists((constant('PHPWG_ROOT_PATH')).($_smarty_tpl->tpl_vars['datepicker_language']->value))) {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>('jquery.ui.datepicker-').($_smarty_tpl->tpl_vars['lang_info']->value['code']),'load'=>'footer','path'=>$_smarty_tpl->tpl_vars['datepicker_language']->value),$_smarty_tpl);
}
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>'themes/default/js/ui/theme/jquery.ui.core.css'),$_smarty_tpl);
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>'themes/default/js/ui/theme/jquery.ui.theme.css'),$_smarty_tpl);
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>'themes/default/js/ui/theme/jquery.ui.datepicker.css'),$_smarty_tpl);
}
}
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'admintools.controller','load'=>'footer','require'=>'jquery','path'=>($_smarty_tpl->tpl_vars['ADMINTOOLS_PATH']->value).('template/public_controller.js')),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_cache['tag_stack'][] = array('footer_script', array('require'=>'admintools.controller')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'admintools.controller'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

AdminTools.urlWS = '<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ws.php?format=json&method=';
AdminTools.urlSelf = '<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
';

<?php if (isset($_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW'])) {?>
AdminTools.multiView = {
  view_as: <?php echo $_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['view_as'];?>
,
  theme: '<?php echo $_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['theme'];?>
',
  lang: '<?php echo $_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['lang'];?>
'
};
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['ato']->value['DELETE_CACHE']) {?>
  AdminTools.deleteCache();
<?php }?>
  AdminTools.init(<?php echo intval($_smarty_tpl->tpl_vars['ato']->value['DEFAULT_OPEN']);?>
);
<?php if (isset($_smarty_tpl->tpl_vars['themeconf']->value['mobile']) && $_smarty_tpl->tpl_vars['themeconf']->value['mobile']) {?>
  AdminTools.initMobile();
<?php }
if (isset($_smarty_tpl->tpl_vars['ato']->value['U_SET_REPRESENTATIVE'])) {?>
  AdminTools.initRepresentative(<?php echo $_smarty_tpl->tpl_vars['current']->value['id'];?>
, <?php echo $_smarty_tpl->tpl_vars['ato']->value['CATEGORY_ID'];?>
);
<?php }
if (isset($_smarty_tpl->tpl_vars['ato']->value['U_CADDIE']) && isset($_smarty_tpl->tpl_vars['ato']->value['IS_PICTURE'])) {?>
  AdminTools.initCaddie(<?php echo $_smarty_tpl->tpl_vars['current']->value['id'];?>
);
<?php }
if (isset($_smarty_tpl->tpl_vars['ato']->value['QUICK_EDIT'])) {?>
  AdminTools.initQuickEdit(<?php echo intval(isset($_smarty_tpl->tpl_vars['ato']->value['IS_PICTURE']));?>
, {
    hintText: '<?php echo strtr(l10n('Type in a search term'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
    noResultsText: '<?php echo strtr(l10n('No results'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
    searchingText: '<?php echo strtr(l10n('Searching...'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
    newText: ' (<?php echo strtr(l10n('new'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
)'
  });
<?php }
$_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'admintools.controller'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_cache['tag_stack']);?>


<div id="ato_header_closed"<?php if ($_smarty_tpl->tpl_vars['ato']->value['POSITION'] == 'right') {?> class="right"<?php }?>><a href="#" class="icon-tools"></a></div>

<div id="ato_header">
  <ul>
    <li<?php if ($_smarty_tpl->tpl_vars['ato']->value['POSITION'] == 'right') {?> class="right"<?php }?>><a href="#" class="icon-ato-cancel close-panel"></a></li>
<?php if (isset($_smarty_tpl->tpl_vars['ato']->value['U_SITE_ADMIN'])) {?>
    <li class="parent"><a href="#" class="icon-menu ato-min-1"><?php echo l10n('Administration');?>
</a>
      <ul>
        <li><a class="icon-home" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SITE_ADMIN'];?>
intro"><?php echo l10n('Home');?>
</a></li>
        <li><a class="icon-picture" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SITE_ADMIN'];?>
batch_manager"><?php echo l10n('Photos');?>
</a></li>
        <li><a class="icon-sitemap" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SITE_ADMIN'];?>
cat_list"><?php echo l10n('Albums');?>
</a></li>
        <li><a class="icon-users" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SITE_ADMIN'];?>
user_list"><?php echo l10n('Users');?>
</a></li>
        <li><a class="icon-puzzle" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SITE_ADMIN'];?>
plugins"><?php echo l10n('Plugins');?>
</a></li>
        <li><a class="icon-wrench" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SITE_ADMIN'];?>
maintenance"><?php echo l10n('Tools');?>
</a></li>
        <li><a class="icon-cog" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SITE_ADMIN'];?>
configuration"><?php echo l10n('Configuration');?>
</a></li>
      </ul>
    </li>
<?php }
if (isset($_smarty_tpl->tpl_vars['ato']->value['U_ADMIN_EDIT'])) {?>
    <li class="parent"><a href="#" class="icon-pencil ato-min-2"><?php echo l10n('Edit');?>
</a>
      <ul>
        <li><a href="#ato_quick_edit" class="icon-ato-flash edit-quick"><?php echo l10n('Quick edit');?>
</a></li>
        <li><a class="icon-ato-doc-text-inv" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_ADMIN_EDIT'];?>
"><?php echo l10n('Properties page');?>
</a></li>
<?php if (isset($_smarty_tpl->tpl_vars['ato']->value['U_DELETE'])) {?>
				<li style="margin-top:1em;"><a class="icon-ato-cancel" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_DELETE'];?>
" onclick="return confirm('<?php echo strtr(l10n('Are you sure?'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
')"><?php echo ucfirst(l10n('delete photo'));?>
</a></li>
<?php }?>
      </ul>
    </li>
<?php } elseif (isset($_smarty_tpl->tpl_vars['ato']->value['QUICK_EDIT'])) {?>
    <li><a href="#ato_quick_edit" class="icon-pencil edit-quick ato-min-2"><?php echo l10n('Edit');?>
</a></li>
<?php if (isset($_smarty_tpl->tpl_vars['ato']->value['U_DELETE'])) {?>
      <li><a class="icon-ato-cancel ato-min-2" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_DELETE'];?>
" onclick="return confirm('<?php echo strtr(l10n('Are you sure?'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
')"><?php echo ucfirst(l10n('delete photo'));?>
</a></li>
<?php }
}
if (isset($_smarty_tpl->tpl_vars['ato']->value['U_SET_REPRESENTATIVE'])) {?>
    <li <?php if ($_smarty_tpl->tpl_vars['ato']->value['IS_REPRESENTATIVE']) {?>class="disabled"<?php }?>><a class="icon-ato-trophy set-representative ato-min-2" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SET_REPRESENTATIVE'];?>
"><?php echo ucfirst(l10n('representative'));?>
</a></li>
<?php }
if (isset($_smarty_tpl->tpl_vars['ato']->value['U_CADDIE'])) {?>
    <li <?php if ($_smarty_tpl->tpl_vars['ato']->value['IS_IN_CADDIE']) {?>class="disabled"<?php }?>><a class="icon-flag add-caddie ato-min-2" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_CADDIE'];?>
"><?php echo l10n('Add to caddie');?>
</a></li>
<?php }
if (isset($_smarty_tpl->tpl_vars['ato']->value['IS_CATEGORY'])) {?>
    <li><a class="icon-plus-circled ato-min-2" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SITE_ADMIN'];?>
photos_add&amp;album=<?php echo $_smarty_tpl->tpl_vars['ato']->value['CATEGORY_ID'];?>
"><?php echo l10n('Add Photos');?>
</a></li>
<?php }?>
    <li class="saved"><span class="icon-ato-ok ato-min-1"><?php echo l10n('Saved');?>
</span></li>

<?php if (isset($_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW'])) {?>
    <li class="parent right multiview"><a class="icon-cog-alt ato-min-1" href="#"><?php echo l10n('Tools');?>
</a>
      <ul>
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
      </ul>
    </li>
<?php if ($_smarty_tpl->tpl_vars['ato']->value['USER']['id'] != $_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['view_as']) {?>
    <li class="right ato-hide-2"><span>
      <?php echo l10n('Viewing as <b>%s</b>.',$_smarty_tpl->tpl_vars['ato']->value['CURRENT_USERNAME']);?>

      <a href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
ato_view_as=<?php echo $_smarty_tpl->tpl_vars['ato']->value['USER']['id'];?>
"><?php echo l10n('Revert');?>
</a>
    </span></li>
<?php }
}?>
  </ul>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['ato']->value['QUICK_EDIT'])) {?>
<div style="display:none;">
  <div id="ato_quick_edit" title="<?php echo l10n('Quick edit');?>
">
    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
">
      <fieldset class="left">
        <?php if (isset($_smarty_tpl->tpl_vars['ato']->value['QUICK_EDIT']['img'])) {?><img src="<?php echo $_smarty_tpl->tpl_vars['ato']->value['QUICK_EDIT']['img'];?>
" width="100" height="100"><?php }?>
        <input type="submit" value="<?php echo l10n('Save');?>
">
        <a href="#" class="icon-ato-cancel close-edit"><?php echo l10n('Cancel');?>
</a>
      </fieldset>

      <fieldset class="main">
        <label for="quick_edit_name"><?php echo l10n('Name');?>
</label>
        <input type="text" name="name" id="quick_edit_name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ato']->value['QUICK_EDIT']['name'], ENT_QUOTES, 'UTF-8', true);?>
">

<?php if (isset($_smarty_tpl->tpl_vars['ato']->value['IS_PICTURE'])) {?>
        <label for="quick_edit_author"><?php echo l10n('Author');?>
</label>
        <input type="text" name="author" id="quick_edit_author" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ato']->value['QUICK_EDIT']['author'], ENT_QUOTES, 'UTF-8', true);?>
">

        <label for="quick_edit_date_creation"><?php echo l10n('Creation date');?>
</label>
        <input type="text" name="date_creation" id="quick_edit_date_creation" class="datepicker" value="<?php echo $_smarty_tpl->tpl_vars['ato']->value['QUICK_EDIT']['date_creation'];?>
">
        <input type="hidden" name="date_creation_time" value="<?php echo $_smarty_tpl->tpl_vars['ato']->value['QUICK_EDIT']['date_creation_time'];?>
">

        <label for="quick_edit_tags"><?php echo l10n('Tags');?>
</label>
        <select name="tags" id="quick_edit_tags" class="tags">
<?php
$_from = $_smarty_tpl->tpl_vars['ato']->value['QUICK_EDIT']['tag_selection'];
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
          <option value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
" class="selected"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</option>
<?php
$_smarty_tpl->tpl_vars['tag'] = $__foreach_tag_0_saved_local_item;
}
if ($__foreach_tag_0_saved_item) {
$_smarty_tpl->tpl_vars['tag'] = $__foreach_tag_0_saved_item;
}
?>
        </select>

<?php if (isset($_smarty_tpl->tpl_vars['available_permission_levels']->value)) {?>
        <label for="quick_edit_level"><?php echo l10n('Who can see this photo?');?>
</label>
        <select name="level" size="1">
          <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['available_permission_levels']->value,'selected'=>$_smarty_tpl->tpl_vars['ato']->value['QUICK_EDIT']['level']),$_smarty_tpl);?>

        </select>
<?php }
}?>
        <label for="quick_edit_comment"><?php echo l10n('Description');?>
</label>
        <textarea name="comment" id="quick_edit_comment"><?php echo $_smarty_tpl->tpl_vars['ato']->value['QUICK_EDIT']['comment'];?>
</textarea>
      </fieldset>

      <input type="hidden" name="action" value="quick_edit">
    </form>
  </div>
</div>
<?php }
}
}
