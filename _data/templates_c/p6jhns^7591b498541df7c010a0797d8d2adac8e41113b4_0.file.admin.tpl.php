<?php
/* Smarty version 3.1.29, created on 2016-06-11 16:33:40
  from "/home/j/jakovlevz/test/public_html/subdomains/images/admin/themes/default/template/admin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575c1334376ad8_50542466',
  'file_dependency' => 
  array (
    '7591b498541df7c010a0797d8d2adac8e41113b4' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/admin/themes/default/template/admin.tpl',
      1 => 1462350722,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575c1334376ad8_50542466 ($_smarty_tpl) {
$_smarty_tpl->smarty->_cache['tag_stack'][] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery.fn.lightAccordion = function(options) {
  var settings = $.extend({
    header: 'dt',
    content: 'dd',
    active: 0
  }, options);
  
  return this.each(function() {
    var self = jQuery(this);
    
    var contents = self.find(settings.content),
        headers = self.find(settings.header);
    
    contents.not(contents[settings.active]).hide();
  
    self.on('click', settings.header, function() {
        var content = jQuery(this).next(settings.content);
        content.slideDown();
        contents.not(content).slideUp();
    });
  });
};

$('#menubar').lightAccordion({
  active: <?php echo $_smarty_tpl->tpl_vars['ACTIVE_MENU']->value;?>

});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_cache['tag_stack']);?>


<div id="menubar">
  <div id="adminHome"><a href="<?php echo $_smarty_tpl->tpl_vars['U_ADMIN']->value;?>
"><?php echo l10n('Administration Home');?>
</a></div>

	<dl>
		<dt><i class="icon-picture"> </i><span><?php echo l10n('Photos');?>
&nbsp;</span></dt>
		<dd>
			<ul>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_ADD_PHOTOS']->value;?>
"><i class="icon-plus-circled"></i><?php echo l10n('Add');?>
</a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_RATING']->value;?>
"><i class="icon-star"></i><?php echo l10n('Rating');?>
</a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_TAGS']->value;?>
"><i class="icon-tags"></i><?php echo l10n('Tags');?>
</a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_RECENT_SET']->value;?>
"><i class="icon-clock"></i><?php echo l10n('Recent photos');?>
</a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_BATCH']->value;?>
"><i class="icon-pencil"></i><?php echo l10n('Batch Manager');?>
</a></li>
<?php if ($_smarty_tpl->tpl_vars['NB_PHOTOS_IN_CADDIE']->value > 0) {?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_CADDIE']->value;?>
"><i class="icon-flag"></i><?php echo l10n('Caddie');?>
<span class="adminMenubarCounter"><?php echo $_smarty_tpl->tpl_vars['NB_PHOTOS_IN_CADDIE']->value;?>
</span></a></li>
<?php }
if ($_smarty_tpl->tpl_vars['NB_ORPHANS']->value > 0) {?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_ORPHANS']->value;?>
"><i class="icon-heart-broken"></i><?php echo l10n('Orphans');?>
<span class="adminMenubarCounter"><?php echo $_smarty_tpl->tpl_vars['NB_ORPHANS']->value;?>
</span></a></li>
<?php }?>
			</ul>
		</dd>
  </dl>
  <dl>
		<dt><i class="icon-sitemap"> </i><span><?php echo l10n('Albums');?>
&nbsp;</span></dt>
    <dd>
      <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_CATEGORIES']->value;?>
"><i class="icon-folder-open"></i><?php echo l10n('Manage');?>
</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_CAT_OPTIONS']->value;?>
"><i class="icon-pencil"></i><?php echo l10n('Properties');?>
</a></li>
      </ul>
    </dd>
  </dl>
  <dl>
		<dt><i class="icon-users"> </i><span><?php echo l10n('Users');?>
&nbsp;</span></dt>
		<dd>
      <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_USERS']->value;?>
"><i class="icon-user-add"></i><?php echo l10n('Manage');?>
</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_GROUPS']->value;?>
"><i class="icon-group"></i><?php echo l10n('Groups');?>
</a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_NOTIFICATION_BY_MAIL']->value;?>
"><i class="icon-mail-1"></i><?php echo l10n('Notification');?>
</a></li>
      </ul>
		</dd>
  </dl>
  <dl>
		<dt><i class="icon-puzzle"> </i><span><?php echo l10n('Plugins');?>
&nbsp;</span></dt>
		<dd>
      <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_PLUGINS']->value;?>
"><i class="icon-equalizer"></i><?php echo l10n('Manage');?>
</a></li>
      </ul>
      <div id="pluginsMenuSeparator"></div>
<?php if (!empty($_smarty_tpl->tpl_vars['plugin_menu_items']->value)) {?>
      <ul class="scroll">
<?php
$_from = $_smarty_tpl->tpl_vars['plugin_menu_items']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_menu_item_0_saved_item = isset($_smarty_tpl->tpl_vars['menu_item']) ? $_smarty_tpl->tpl_vars['menu_item'] : false;
$_smarty_tpl->tpl_vars['menu_item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['menu_item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['menu_item']->value) {
$_smarty_tpl->tpl_vars['menu_item']->_loop = true;
$__foreach_menu_item_0_saved_local_item = $_smarty_tpl->tpl_vars['menu_item'];
?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['menu_item']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu_item']->value['NAME'];?>
</a></li>
<?php
$_smarty_tpl->tpl_vars['menu_item'] = $__foreach_menu_item_0_saved_local_item;
}
if ($__foreach_menu_item_0_saved_item) {
$_smarty_tpl->tpl_vars['menu_item'] = $__foreach_menu_item_0_saved_item;
}
?>
      </ul>
<?php }?>
		</dd>
  </dl>
  <dl>
		<dt><i class="icon-wrench"> </i><span><?php echo l10n('Tools');?>
&nbsp;</span></dt>
		<dd>
      <ul>
<?php if ($_smarty_tpl->tpl_vars['ENABLE_SYNCHRONIZATION']->value) {?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_CAT_UPDATE']->value;?>
"><i class="icon-exchange"></i><?php echo l10n('Synchronize');?>
</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_SITE_MANAGER']->value;?>
"><i class="icon-flow-branch"></i><?php echo l10n('Site manager');?>
</a></li>
<?php }?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_HISTORY_STAT']->value;?>
"><i class="icon-signal"></i><?php echo l10n('History');?>
</a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MAINTENANCE']->value;?>
"><i class="icon-tools"></i><?php echo l10n('Maintenance');?>
</a></li>
<?php if (isset($_smarty_tpl->tpl_vars['U_COMMENTS']->value)) {?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_COMMENTS']->value;?>
"><i class="icon-chat"></i><?php echo l10n('Comments');?>

<?php if ($_smarty_tpl->tpl_vars['NB_PENDING_COMMENTS']->value > 0) {?>
          <span class="adminMenubarCounter" title="<?php echo l10n('%d waiting for validation',$_smarty_tpl->tpl_vars['NB_PENDING_COMMENTS']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['NB_PENDING_COMMENTS']->value;?>
</span>
        <?php }?></a></li>
<?php }?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_UPDATES']->value;?>
"><i class="icon-arrows-cw"></i><?php echo l10n('Updates');?>
</a></li>
      </ul>
		</dd>
  </dl>
  <dl>
		<dt><i class="icon-cog"> </i><span><?php echo l10n('Configuration');?>
&nbsp;</span></dt>
		<dd>
      <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_CONFIG_GENERAL']->value;?>
"><i class="icon-cog-alt"></i><?php echo l10n('Options');?>
</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_CONFIG_MENUBAR']->value;?>
"><i class="icon-menu"></i><?php echo l10n('Menu Management');?>
</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_CONFIG_EXTENTS']->value;?>
"><i class="icon-code"></i><?php echo l10n('Templates');?>
</a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_CONFIG_LANGUAGES']->value;?>
"><i class="icon-language"></i><?php echo l10n('Languages');?>
</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_CONFIG_THEMES']->value;?>
"><i class="icon-brush"></i><?php echo l10n('Themes');?>
</a></li>
      </ul>
    </dd>
  </dl>
</div> <!-- menubar -->

<div id="content" class="content">

<?php if (isset($_smarty_tpl->tpl_vars['TABSHEET']->value)) {?>
  <?php echo $_smarty_tpl->tpl_vars['TABSHEET']->value;?>

<?php }
if (isset($_smarty_tpl->tpl_vars['U_HELP']->value)) {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'core.scripts','load'=>'async','path'=>'themes/default/js/scripts.js'),$_smarty_tpl);?>

  <ul class="HelpActions">
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_HELP']->value;?>
" onclick="popuphelp(this.href); return false;" title="<?php echo l10n('Help');?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;
echo $_smarty_tpl->tpl_vars['themeconf']->value['admin_icon_dir'];?>
/help.png" alt="(?)"></a></li>
  </ul>
<?php }
if (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
  <div class="errors">
    <ul>
<?php
$_from = $_smarty_tpl->tpl_vars['errors']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_error_1_saved_item = isset($_smarty_tpl->tpl_vars['error']) ? $_smarty_tpl->tpl_vars['error'] : false;
$_smarty_tpl->tpl_vars['error'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['error']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
$__foreach_error_1_saved_local_item = $_smarty_tpl->tpl_vars['error'];
?>
      <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
<?php
$_smarty_tpl->tpl_vars['error'] = $__foreach_error_1_saved_local_item;
}
if ($__foreach_error_1_saved_item) {
$_smarty_tpl->tpl_vars['error'] = $__foreach_error_1_saved_item;
}
?>
    </ul>
  </div>
<?php }
if (isset($_smarty_tpl->tpl_vars['infos']->value)) {?>
  <div class="infos">
    <ul>
<?php
$_from = $_smarty_tpl->tpl_vars['infos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_info_2_saved_item = isset($_smarty_tpl->tpl_vars['info']) ? $_smarty_tpl->tpl_vars['info'] : false;
$_smarty_tpl->tpl_vars['info'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['info']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['info']->value) {
$_smarty_tpl->tpl_vars['info']->_loop = true;
$__foreach_info_2_saved_local_item = $_smarty_tpl->tpl_vars['info'];
?>
      <li><?php echo $_smarty_tpl->tpl_vars['info']->value;?>
</li>
<?php
$_smarty_tpl->tpl_vars['info'] = $__foreach_info_2_saved_local_item;
}
if ($__foreach_info_2_saved_item) {
$_smarty_tpl->tpl_vars['info'] = $__foreach_info_2_saved_item;
}
?>
    </ul>
  </div>
<?php }
if (isset($_smarty_tpl->tpl_vars['warnings']->value)) {?>
  <div class="warnings">
    <ul>
<?php
$_from = $_smarty_tpl->tpl_vars['warnings']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_warning_3_saved_item = isset($_smarty_tpl->tpl_vars['warning']) ? $_smarty_tpl->tpl_vars['warning'] : false;
$_smarty_tpl->tpl_vars['warning'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['warning']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['warning']->value) {
$_smarty_tpl->tpl_vars['warning']->_loop = true;
$__foreach_warning_3_saved_local_item = $_smarty_tpl->tpl_vars['warning'];
?>
      <li><?php echo $_smarty_tpl->tpl_vars['warning']->value;?>
</li>
<?php
$_smarty_tpl->tpl_vars['warning'] = $__foreach_warning_3_saved_local_item;
}
if ($__foreach_warning_3_saved_item) {
$_smarty_tpl->tpl_vars['warning'] = $__foreach_warning_3_saved_item;
}
?>
    </ul>
  </div>
<?php }?>
  <?php echo $_smarty_tpl->tpl_vars['ADMIN_CONTENT']->value;?>

</div>
<?php }
}
