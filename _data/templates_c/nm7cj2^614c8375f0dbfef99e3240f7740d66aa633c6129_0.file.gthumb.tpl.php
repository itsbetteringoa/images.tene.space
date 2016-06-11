<?php
/* Smarty version 3.1.29, created on 2016-06-11 16:35:10
  from "/home/j/jakovlevz/test/public_html/subdomains/images/plugins/GThumb/template/gthumb.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575c138ebf7d00_34383405',
  'file_dependency' => 
  array (
    '614c8375f0dbfef99e3240f7740d66aa633c6129' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/plugins/GThumb/template/gthumb.tpl',
      1 => 1457083376,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575c138ebf7d00_34383405 ($_smarty_tpl) {
if (!empty($_smarty_tpl->tpl_vars['thumbnails']->value)) {
$_from = $_smarty_tpl->tpl_vars['thumbnails']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_thumbnail_0_saved_item = isset($_smarty_tpl->tpl_vars['thumbnail']) ? $_smarty_tpl->tpl_vars['thumbnail'] : false;
$_smarty_tpl->tpl_vars['thumbnail'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['thumbnail']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['thumbnail']->value) {
$_smarty_tpl->tpl_vars['thumbnail']->_loop = true;
$__foreach_thumbnail_0_saved_local_item = $_smarty_tpl->tpl_vars['thumbnail'];
$_smarty_tpl->tpl_vars['derivative'] = new Smarty_Variable($_smarty_tpl->tpl_vars['pwg']->value->derivative($_smarty_tpl->tpl_vars['GThumb_derivative_params']->value,$_smarty_tpl->tpl_vars['thumbnail']->value['src_image']), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'derivative', 0);?>
<li class="gthumb">
<?php if ($_smarty_tpl->tpl_vars['SHOW_THUMBNAIL_CAPTION']->value) {?>
    <span class="thumbLegend">
      <span class="thumbName">
        <?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['NAME'];?>

<?php if (!empty($_smarty_tpl->tpl_vars['thumbnail']->value['icon_ts'])) {?>
        <img title="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['icon_ts']['TITLE'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;
echo $_smarty_tpl->tpl_vars['themeconf']->value['icon_dir'];?>
/recent.png" alt="(!)">
<?php }?>
      </span>
<?php if (isset($_smarty_tpl->tpl_vars['thumbnail']->value['NB_COMMENTS'])) {?>
      <span class="<?php if (0 == $_smarty_tpl->tpl_vars['thumbnail']->value['NB_COMMENTS']) {?>zero <?php }?>nb-comments">
        <?php echo $_smarty_tpl->tpl_vars['pwg']->value->l10n_dec('%d comment','%d comments',$_smarty_tpl->tpl_vars['thumbnail']->value['NB_COMMENTS']);?>

      </span>
<?php }?>
      <?php if (isset($_smarty_tpl->tpl_vars['thumbnail']->value['NB_COMMENTS']) && isset($_smarty_tpl->tpl_vars['thumbnail']->value['NB_HITS'])) {?> - <?php }
if (isset($_smarty_tpl->tpl_vars['thumbnail']->value['NB_HITS'])) {?>
      <span class="<?php if (0 == $_smarty_tpl->tpl_vars['thumbnail']->value['NB_HITS']) {?>zero <?php }?>nb-hits">
        <?php echo $_smarty_tpl->tpl_vars['pwg']->value->l10n_dec('%d hit','%d hits',$_smarty_tpl->tpl_vars['thumbnail']->value['NB_HITS']);?>

      </span>
<?php }
if (isset($_smarty_tpl->tpl_vars['thumbnail']->value['rating_score']) && $_smarty_tpl->tpl_vars['GThumb']->value['show_score_in_caption']) {?>
        <?php if (isset($_smarty_tpl->tpl_vars['thumbnail']->value['NB_COMMENTS']) || isset($_smarty_tpl->tpl_vars['thumbnail']->value['NB_HITS'])) {?> - <?php }?>
      <span class="nb-hits">
        <?php echo l10n('Rating score');?>
 <?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['rating_score'];?>

      </span>
<?php }?>
    </span>
<?php }?>
  <a href="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['URL'];?>
">
    <img class="thumbnail" <?php if (!$_smarty_tpl->tpl_vars['derivative']->value->is_cached()) {?>data-<?php }?>src="<?php echo $_smarty_tpl->tpl_vars['derivative']->value->get_url();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['TN_ALT'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['TN_TITLE'];?>
" <?php echo $_smarty_tpl->tpl_vars['derivative']->value->get_size_htm();?>
>
  </a>
</li>
<?php
$_smarty_tpl->tpl_vars['thumbnail'] = $__foreach_thumbnail_0_saved_local_item;
}
if ($__foreach_thumbnail_0_saved_item) {
$_smarty_tpl->tpl_vars['thumbnail'] = $__foreach_thumbnail_0_saved_item;
}
?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"plugins/GThumb/template/gthumb.css"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.ajaxmanager','path'=>'themes/default/js/plugins/jquery.ajaxmanager.js','load'=>'footer'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'thumbnails.loader','path'=>'themes/default/js/thumbnails.loader.js','require'=>'jquery.ajaxmanager','load'=>'footer'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.ba-resize','path'=>'plugins/GThumb/js/jquery.ba-resize.min.js','load'=>"footer"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'gthumb','require'=>'jquery,jquery.ba-resize','path'=>'plugins/GThumb/js/gthumb.js','load'=>"footer"),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_cache['tag_stack'][] = array('footer_script', array('require'=>"gthumb")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>"gthumb"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

GThumb.max_height = <?php echo $_smarty_tpl->tpl_vars['GThumb']->value['height'];?>
;
GThumb.margin = <?php echo $_smarty_tpl->tpl_vars['GThumb']->value['margin'];?>
;
GThumb.method = '<?php echo $_smarty_tpl->tpl_vars['GThumb']->value['method'];?>
';

<?php if (isset($_smarty_tpl->tpl_vars['GThumb_big']->value)) {
$_smarty_tpl->tpl_vars['gt_size'] = new Smarty_Variable($_smarty_tpl->tpl_vars['GThumb_big']->value->get_size(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'gt_size', 0);?>
GThumb.big_thumb = {id:<?php echo $_smarty_tpl->tpl_vars['GThumb_big']->value->src_image->id;?>
,src:'<?php echo $_smarty_tpl->tpl_vars['GThumb_big']->value->get_url();?>
',width:<?php echo $_smarty_tpl->tpl_vars['gt_size']->value[0];?>
,height:<?php echo $_smarty_tpl->tpl_vars['gt_size']->value[1];?>
};
<?php }?>

GThumb.build();
jQuery(window).bind('RVTS_loaded', GThumb.build);
jQuery('#thumbnails').resize(GThumb.process);
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>"gthumb"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_cache['tag_stack']);?>


<?php $_smarty_tpl->smarty->_cache['tag_stack'][] = array('html_head', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['html_head'][0][0]->block_html_head(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<style type="text/css">#thumbnails .gthumb { margin:0 0 <?php echo $_smarty_tpl->tpl_vars['GThumb']->value['margin'];?>
px <?php echo $_smarty_tpl->tpl_vars['GThumb']->value['margin'];?>
px !important; }</style>
<!--[if IE 8]>
<style type="text/css">#thumbnails .gthumb a { right: 0px; }</style>
<![endif]-->
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['html_head'][0][0]->block_html_head(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_cache['tag_stack']);?>

<?php }
}
}
