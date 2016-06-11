<?php
/* Smarty version 3.1.29, created on 2016-06-11 16:35:11
  from "/home/j/jakovlevz/test/public_html/subdomains/images/plugins/BatchDownloader/template/download_button.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575c138f045f59_57369837',
  'file_dependency' => 
  array (
    '50a5d39bee394ac8de4819d82274ef66580b7d0f' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/plugins/BatchDownloader/template/download_button.tpl',
      1 => 1424954618,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575c138f045f59_57369837 ($_smarty_tpl) {
?>
<a href="<?php echo $_smarty_tpl->tpl_vars['BATCH_DWN_URL']->value;
echo $_smarty_tpl->tpl_vars['BATCH_DWN_SIZE']->value;?>
" id="batchDownloadLink" title="<?php echo l10n('Download all pictures of this selection');?>
" class="pwg-state-default pwg-button" rel="nofollow">
  <span class="pwg-icon batch-downloader-icon" style="background:url('<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;
echo $_smarty_tpl->tpl_vars['BATCH_DOWNLOAD_PATH']->value;?>
template/images/zip.png') center center no-repeat;">&nbsp;</span><span class="pwg-button-text"><?php echo l10n('Download');?>
</span>
</a>

<?php if (isset($_smarty_tpl->tpl_vars['BATCH_DWN_SIZES']->value)) {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'core.switchbox','load'=>'async','require'=>'jquery','path'=>'themes/default/js/switchbox.js'),$_smarty_tpl);?>


<div id="batchDownloadBox" class="switchBox" style="display:none">
  <div class="switchBoxTitle"><?php echo l10n('Download');?>
 - <?php echo l10n('Photo sizes');?>
</div>
  <?php
$_from = $_smarty_tpl->tpl_vars['BATCH_DWN_SIZES']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_loop_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_loop']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_loop'] : false;
$__foreach_loop_0_saved_item = isset($_smarty_tpl->tpl_vars['size']) ? $_smarty_tpl->tpl_vars['size'] : false;
$_smarty_tpl->tpl_vars['size'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_loop'] = new Smarty_Variable(array());
$__foreach_loop_0_first = true;
$_smarty_tpl->tpl_vars['size']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['size']->value) {
$_smarty_tpl->tpl_vars['size']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_loop']->value['first'] = $__foreach_loop_0_first;
$__foreach_loop_0_first = false;
$__foreach_loop_0_saved_local_item = $_smarty_tpl->tpl_vars['size'];
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_loop']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_loop']->value['first'] : null)) {?><br><?php }?>
  <a href="<?php echo $_smarty_tpl->tpl_vars['BATCH_DWN_URL']->value;
echo $_smarty_tpl->tpl_vars['size']->value['TYPE'];?>
" rel="nofollow">
    <?php echo $_smarty_tpl->tpl_vars['size']->value['DISPLAY'];?>
 <?php if ($_smarty_tpl->tpl_vars['size']->value['SIZE']) {?><span class="downloadSizeDetails">(<?php echo $_smarty_tpl->tpl_vars['size']->value['SIZE'];?>
)</span><?php }?>
  </a>
<?php
$_smarty_tpl->tpl_vars['size'] = $__foreach_loop_0_saved_local_item;
}
if ($__foreach_loop_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_loop'] = $__foreach_loop_0_saved;
}
if ($__foreach_loop_0_saved_item) {
$_smarty_tpl->tpl_vars['size'] = $__foreach_loop_0_saved_item;
}
?>
</div>
<?php }?>

<?php $_smarty_tpl->smarty->_cache['tag_stack'][] = array('footer_script', array('require'=>'jquery')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

var batchdown_count = <?php echo $_smarty_tpl->tpl_vars['BATCH_DWN_COUNT']->value;?>
;
var batchdown_string = "<?php echo l10n('Confirm the download of %d pictures?');?>
";

<?php if (isset($_smarty_tpl->tpl_vars['BATCH_DWN_SIZES']->value)) {?>
  (SwitchBox=window.SwitchBox||[]).push("#batchDownloadLink", "#batchDownloadBox");

  jQuery("#batchDownloadBox a").click(function() {
    return confirm(batchdown_string.replace('%d', batchdown_count));
  });
<?php } else { ?>
  jQuery("#batchDownloadLink").click(function() {
    return confirm(batchdown_string.replace('%d', batchdown_count));
  });
<?php }
$_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_cache['tag_stack']);?>


<?php $_smarty_tpl->smarty->_cache['tag_stack'][] = array('html_style', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['html_style'][0][0]->block_html_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

.downloadSizeDetails { font-style:italic; font-size:80%; }
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['html_style'][0][0]->block_html_style(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_cache['tag_stack']);
}
}
