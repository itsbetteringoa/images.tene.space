<?php
/* Smarty version 3.1.29, created on 2016-06-13 11:49:21
  from "/home/j/jakovlevz/test/public_html/subdomains/images/admin/themes/default/template/plugins_installed.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575e7391c28da3_12422754',
  'file_dependency' => 
  array (
    '65b5bd073ee0f56d9482a41d2f39588994da4614' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/admin/themes/default/template/plugins_installed.tpl',
      1 => 1462350722,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575e7391c28da3_12422754 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/home/j/jakovlevz/test/public_html/subdomains/images/include/smarty/libs/plugins/function.counter.php';
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.ajaxmanager','load'=>'footer','require'=>'jquery','path'=>'themes/default/js/plugins/jquery.ajaxmanager.js'),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_cache['tag_stack'][] = array('footer_script', array('require'=>'jquery.ajaxmanager')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ajaxmanager'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

/* incompatible message */
var incompatible_msg = '<?php echo strtr(l10n('WARNING! This plugin does not seem to be compatible with this version of Piwigo.'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
';
var activate_msg = '\n<?php echo strtr(l10n('Do you want to activate anyway?'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
';

/* group action */
var pwg_token = '<?php echo $_smarty_tpl->tpl_vars['PWG_TOKEN']->value;?>
';
var confirmMsg  = '<?php echo strtr(l10n('Are you sure?'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
';

var queuedManager = jQuery.manageAjax.create('queued', { 
  queue: true,  
  maxRequests: 1
});
var nb_plugins = jQuery('div.active').size();
var done = 0;

jQuery(document).ready(function() {
  /* group action */
  jQuery('div.deactivate_all a').click(function() {
    if (confirm(confirmMsg)) {
      jQuery('div.active').each(function() {
        performPluginDeactivate(jQuery(this).attr('id'));
      });
    }
  });
  function performPluginDeactivate(id) {
   queuedManager.add({
      type: 'GET',
      dataType: 'json',
      url: 'ws.php',
      data: { method: 'pwg.plugins.performAction', action: 'deactivate', plugin: id, pwg_token: pwg_token, format: 'json' },
      success: function(data) {
        if (data['stat'] == 'ok') jQuery("#"+id).removeClass('active').addClass('inactive');
        done++;
        if (done == nb_plugins) location.reload();
      }
    });
  };

  /* incompatible plugins */
  jQuery(document).ready(function() {
    jQuery.ajax({
      method: 'GET',
      url: 'admin.php',
      data: { page: 'plugins_installed', incompatible_plugins: true },
      dataType: 'json',
      success: function(data) {
        for (i=0;i<data.length;i++) {
          
<?php if ($_smarty_tpl->tpl_vars['show_details']->value) {?>
            jQuery('#'+data[i]+' .pluginBoxNameCell').prepend('<a class="warning" title="'+incompatible_msg+'"></a>')
<?php } else { ?>
            jQuery('#'+data[i]+' .pluginMiniBoxNameCell').prepend('<span class="warning" title="'+incompatible_msg+'"></span>')
<?php }?>
          
          jQuery('#'+data[i]).addClass('incompatible');
          jQuery('#'+data[i]+' .activate').attr('onClick', 'return confirm(incompatible_msg + activate_msg);');
        }
        jQuery('.warning').tipTip({
          'delay' : 0,
          'fadeIn' : 200,
          'fadeOut' : 200,
          'maxWidth':'250px'
        });
      }
    });
  });
  
  /* TipTips */
  jQuery('.plugin-restore').tipTip({
    'delay' : 0,
    'fadeIn' : 200,
    'fadeOut' : 200
  });
  jQuery('.showInfo').tipTip({
    'delay' : 0,
    'fadeIn' : 200,
    'fadeOut' : 200,
    'maxWidth':'300px',
    'keepAlive':true,
    'activation':'click'
  });
});

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ajaxmanager'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_cache['tag_stack']);?>


<div class="titrePage">
  <h2><?php echo l10n('Plugins');?>
</h2>
</div>

<div class="showDetails">
<?php if ($_smarty_tpl->tpl_vars['show_details']->value) {?>
  <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
&amp;show_details=0"><?php echo l10n('hide details');?>
</a>
<?php } else { ?>
  <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
&amp;show_details=1"><?php echo l10n('show details');?>
</a>
<?php }?>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['plugins']->value)) {?>

<?php $_smarty_tpl->tpl_vars['field_name'] = new Smarty_Variable('null', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'field_name', 0);?> 
<?php echo smarty_function_counter(array('start'=>0,'assign'=>'i'),$_smarty_tpl);?>
 
<?php
$_from = $_smarty_tpl->tpl_vars['plugins']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_plugins_loop_0_saved_item = isset($_smarty_tpl->tpl_vars['plugin']) ? $_smarty_tpl->tpl_vars['plugin'] : false;
$_smarty_tpl->tpl_vars['plugin'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['plugin']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['plugin']->value) {
$_smarty_tpl->tpl_vars['plugin']->_loop = true;
$__foreach_plugins_loop_0_saved_local_item = $_smarty_tpl->tpl_vars['plugin'];
?>
    
<?php if ($_smarty_tpl->tpl_vars['field_name']->value != $_smarty_tpl->tpl_vars['plugin']->value['STATE']) {
if ($_smarty_tpl->tpl_vars['field_name']->value != 'null') {?>
  </fieldset>
<?php }?>
  <fieldset class="pluginBoxes">
    <legend>
<?php if ($_smarty_tpl->tpl_vars['plugin']->value['STATE'] == 'active') {?>
      <?php echo l10n('Active Plugins');?>

<?php } elseif ($_smarty_tpl->tpl_vars['plugin']->value['STATE'] == 'inactive') {?>
      <?php echo l10n('Inactive Plugins');?>

<?php } elseif ($_smarty_tpl->tpl_vars['plugin']->value['STATE'] == 'missing') {?>
      <?php echo l10n('Missing Plugins');?>

<?php } elseif ($_smarty_tpl->tpl_vars['plugin']->value['STATE'] == 'merged') {?>
      <?php echo l10n('Obsolete Plugins');?>

<?php }?>
    </legend>
  <?php $_smarty_tpl->tpl_vars['field_name'] = new Smarty_Variable($_smarty_tpl->tpl_vars['plugin']->value['STATE'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'field_name', 0);
}?>
  
<?php if (!empty($_smarty_tpl->tpl_vars['plugin']->value['AUTHOR'])) {
if (!empty($_smarty_tpl->tpl_vars['plugin']->value['AUTHOR_URL'])) {?>
      <?php $_smarty_tpl->tpl_vars['author'] = new Smarty_Variable(sprintf("<a href='%s'>%s</a>",$_smarty_tpl->tpl_vars['plugin']->value['AUTHOR_URL'],$_smarty_tpl->tpl_vars['plugin']->value['AUTHOR']), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'author', 0);
} else { ?>
      <?php $_smarty_tpl->tpl_vars['author'] = new Smarty_Variable((('<u>').($_smarty_tpl->tpl_vars['plugin']->value['AUTHOR'])).('</u>'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'author', 0);
}
}
if ($_smarty_tpl->tpl_vars['show_details']->value) {?>
    <div id="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['ID'];?>
" class="pluginBox <?php echo $_smarty_tpl->tpl_vars['plugin']->value['STATE'];?>
">
      <table>
        <tr>
          <td class="pluginBoxNameCell">
            <?php echo $_smarty_tpl->tpl_vars['plugin']->value['NAME'];?>

          </td>
          <td><?php echo $_smarty_tpl->tpl_vars['plugin']->value['DESC'];?>
</td>
        </tr>
        <tr class="pluginActions">
          <td>
<?php if ($_smarty_tpl->tpl_vars['plugin']->value['STATE'] == 'active') {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=deactivate"><?php echo l10n('Deactivate');?>
</a>
            | <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=restore" class="plugin-restore" title="<?php echo l10n('Restore default configuration. You will lose your plugin settings!');?>
" onclick="return confirm(confirmMsg);"><?php echo l10n('Restore');?>
</a>

<?php } elseif ($_smarty_tpl->tpl_vars['plugin']->value['STATE'] == 'inactive') {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=activate" class="activate"><?php echo l10n('Activate');?>
</a>
            | <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=delete" onclick="return confirm(confirmMsg);"><?php echo l10n('Delete');?>
</a>

<?php } elseif ($_smarty_tpl->tpl_vars['plugin']->value['STATE'] == 'missing') {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=uninstall" onclick="return confirm(confirmMsg);"><?php echo l10n('Uninstall');?>
</a>

<?php } elseif ($_smarty_tpl->tpl_vars['plugin']->value['STATE'] == 'merged') {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=delete"><?php echo l10n('Delete');?>
</a>
<?php }?>
          </td>
          <td>
            <?php echo l10n('Version');?>
 <?php echo $_smarty_tpl->tpl_vars['plugin']->value['VERSION'];?>

            
<?php if (!empty($_smarty_tpl->tpl_vars['author']->value)) {?>
            | <?php echo l10n('By %s',$_smarty_tpl->tpl_vars['author']->value);?>

<?php }
if (!empty($_smarty_tpl->tpl_vars['plugin']->value['VISIT_URL'])) {?>
            | <a class="externalLink" href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['VISIT_URL'];?>
"><?php echo l10n('Visit plugin site');?>
</a>
<?php }?>
          </td>
        </tr>
      </table>
    </div> 
    
<?php } else {
if (!empty($_smarty_tpl->tpl_vars['plugin']->value['VISIT_URL'])) {?>
      <?php $_smarty_tpl->tpl_vars['version'] = new Smarty_Variable((((("<a class='externalLink' href='").($_smarty_tpl->tpl_vars['plugin']->value['VISIT_URL'])).("'>")).($_smarty_tpl->tpl_vars['plugin']->value['VERSION'])).("</a>"), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'version', 0);
} else { ?>
      <?php $_smarty_tpl->tpl_vars['version'] = new Smarty_Variable($_smarty_tpl->tpl_vars['plugin']->value['VERSION'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'version', 0);
}?>
    <div id="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['ID'];?>
" class="pluginMiniBox <?php echo $_smarty_tpl->tpl_vars['plugin']->value['STATE'];?>
">
      <div class="pluginMiniBoxNameCell">
        <?php echo $_smarty_tpl->tpl_vars['plugin']->value['NAME'];?>

        <a class="icon-info-circled-1 showInfo" title="<?php if (!empty($_smarty_tpl->tpl_vars['author']->value)) {
echo l10n('By %s',$_smarty_tpl->tpl_vars['author']->value);?>
 | <?php }
echo l10n('Version');?>
 <?php echo $_smarty_tpl->tpl_vars['version']->value;?>
<br/><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['plugin']->value['DESC'], ENT_QUOTES, 'UTF-8', true);?>
"></a>
      </div>
      <div class="pluginActions">
        <div>
<?php if ($_smarty_tpl->tpl_vars['plugin']->value['STATE'] == 'active') {?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=deactivate"><?php echo l10n('Deactivate');?>
</a>
          | <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=restore" class="plugin-restore" title="<?php echo l10n('Restore default configuration. You will lose your plugin settings!');?>
" onclick="return confirm(confirmMsg);"><?php echo l10n('Restore');?>
</a>

<?php } elseif ($_smarty_tpl->tpl_vars['plugin']->value['STATE'] == 'inactive') {?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=activate" class="activate"><?php echo l10n('Activate');?>
</a>
          | <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=delete" onclick="return confirm(confirmMsg);"><?php echo l10n('Delete');?>
</a>

<?php } elseif ($_smarty_tpl->tpl_vars['plugin']->value['STATE'] == 'missing') {?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=uninstall" onclick="return confirm(confirmMsg);"><?php echo l10n('Uninstall');?>
</a>

<?php } elseif ($_smarty_tpl->tpl_vars['plugin']->value['STATE'] == 'merged') {?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=delete"><?php echo l10n('Delete');?>
</a>
<?php }?>
        </div>
      </div>
    </div> 
    
<?php }
if ($_smarty_tpl->tpl_vars['plugin']->value['STATE'] == 'active') {?>
  <?php echo smarty_function_counter(array(),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['active_plugins']->value == $_smarty_tpl->tpl_vars['i']->value) {?>
    <div class="deactivate_all"><a><?php echo l10n('Deactivate all');?>
</a></div>
    <?php echo smarty_function_counter(array(),$_smarty_tpl);?>

<?php }
}?>
  
<?php
$_smarty_tpl->tpl_vars['plugin'] = $__foreach_plugins_loop_0_saved_local_item;
}
if ($__foreach_plugins_loop_0_saved_item) {
$_smarty_tpl->tpl_vars['plugin'] = $__foreach_plugins_loop_0_saved_item;
}
?>
  </fieldset>

<?php }
}
}
