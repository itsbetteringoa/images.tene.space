<?php
/* Smarty version 3.1.29, created on 2016-07-19 09:12:15
  from "/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578dc4bf167ab3_35737055',
  'file_dependency' => 
  array (
    '4f8a09f54621b1eded9c1542ee84b130b8dc7c85' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/index.tpl',
      1 => 1465893046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:infos_errors.tpl' => 1,
    'file:navigation_bar.tpl' => 2,
  ),
),false)) {
function content_578dc4bf167ab3_35737055 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_regex_replace')) require_once '/home/j/jakovlevz/test/public_html/subdomains/images/include/smarty/libs/plugins/modifier.regex_replace.php';
?>
<!-- Start of index.tpl -->
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'core.switchbox','require'=>'jquery','path'=>'themes/default/js/switchbox.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'cookie','require'=>'jquery','path'=>"themes/bootstrapdefault/js/jquery.cookie.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'equalheights','require'=>'jquery','path'=>"themes/bootstrapdefault/js/jquery.equalheights.js"),$_smarty_tpl);?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'ycalendar','require'=>'jquery','path'=>"themes/bootstrapdefault/js/fullcalendar.js"),$_smarty_tpl);?>

<?php if (!empty($_smarty_tpl->tpl_vars['PLUGIN_INDEX_CONTENT_BEFORE']->value)) {
echo $_smarty_tpl->tpl_vars['PLUGIN_INDEX_CONTENT_BEFORE']->value;
}?>

<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <div class="navbar-brand">
                <?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>

<?php if (isset($_smarty_tpl->tpl_vars['chronology']->value['TITLE'])) {?>
                <?php echo $_smarty_tpl->tpl_vars['LEVEL_SEPARATOR']->value;
echo $_smarty_tpl->tpl_vars['chronology']->value['TITLE'];?>

<?php }?>
            </div>
        </div>
        <div class="navbar-right glyph_bar">
            <ul class="nav navbar-nav">
<?php if (!empty($_smarty_tpl->tpl_vars['image_orders']->value)) {?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-sort"></span><span class="glyphicon-text"><?php echo l10n('Sort order');?>
</span><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
<?php
$_from = $_smarty_tpl->tpl_vars['image_orders']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_loop_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_loop']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_loop'] : false;
$__foreach_loop_0_saved_item = isset($_smarty_tpl->tpl_vars['image_order']) ? $_smarty_tpl->tpl_vars['image_order'] : false;
$_smarty_tpl->tpl_vars['image_order'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_loop'] = new Smarty_Variable(array());
$__foreach_loop_0_first = true;
$_smarty_tpl->tpl_vars['image_order']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['image_order']->value) {
$_smarty_tpl->tpl_vars['image_order']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_loop']->value['first'] = $__foreach_loop_0_first;
$__foreach_loop_0_first = false;
$__foreach_loop_0_saved_local_item = $_smarty_tpl->tpl_vars['image_order'];
?>
                        <li<?php if ($_smarty_tpl->tpl_vars['image_order']->value['SELECTED']) {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['image_order']->value['URL'];?>
" rel="nofollow"><?php echo $_smarty_tpl->tpl_vars['image_order']->value['DISPLAY'];?>
</a></li>
<?php
$_smarty_tpl->tpl_vars['image_order'] = $__foreach_loop_0_saved_local_item;
}
if ($__foreach_loop_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_loop'] = $__foreach_loop_0_saved;
}
if ($__foreach_loop_0_saved_item) {
$_smarty_tpl->tpl_vars['image_order'] = $__foreach_loop_0_saved_item;
}
?>
                    </ul>
                </li>
<?php }
if (!empty($_smarty_tpl->tpl_vars['image_derivatives']->value)) {?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-picture"></span><span class="glyphicon-text"><?php echo l10n('Photo sizes');?>
</span><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
<?php
$_from = $_smarty_tpl->tpl_vars['image_derivatives']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_loop_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_loop']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_loop'] : false;
$__foreach_loop_1_saved_item = isset($_smarty_tpl->tpl_vars['image_derivative']) ? $_smarty_tpl->tpl_vars['image_derivative'] : false;
$_smarty_tpl->tpl_vars['image_derivative'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_loop'] = new Smarty_Variable(array());
$__foreach_loop_1_first = true;
$_smarty_tpl->tpl_vars['image_derivative']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['image_derivative']->value) {
$_smarty_tpl->tpl_vars['image_derivative']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_loop']->value['first'] = $__foreach_loop_1_first;
$__foreach_loop_1_first = false;
$__foreach_loop_1_saved_local_item = $_smarty_tpl->tpl_vars['image_derivative'];
?>
                        <li<?php if ($_smarty_tpl->tpl_vars['image_derivative']->value['SELECTED']) {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['image_derivative']->value['URL'];?>
" rel="nofollow"><?php echo $_smarty_tpl->tpl_vars['image_derivative']->value['DISPLAY'];?>
</a></li>
<?php
$_smarty_tpl->tpl_vars['image_derivative'] = $__foreach_loop_1_saved_local_item;
}
if ($__foreach_loop_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_loop'] = $__foreach_loop_1_saved;
}
if ($__foreach_loop_1_saved_item) {
$_smarty_tpl->tpl_vars['image_derivative'] = $__foreach_loop_1_saved_item;
}
?>
                    </ul>
                </li>
<?php }
if (isset($_smarty_tpl->tpl_vars['favorite']->value)) {?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['favorite']->value['U_FAVORITE'];?>
" title="<?php echo l10n('Delete all photos from your favorites');?>
" rel="nofollow">
                        <span class="glyphicon glyphicon-heart"></span><span class="glyphicon-text"><?php echo l10n('Delete all photos from your favorites');?>
</span>
                    </a>
                </li>
<?php }
if (isset($_smarty_tpl->tpl_vars['U_EDIT']->value)) {?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['U_EDIT']->value;?>
" title="<?php echo l10n('Edit album');?>
">
                        <span class="glyphicon glyphicon-pencil"></span><span class="glyphicon-text"><?php echo l10n('Edit');?>
</span>
                    </a>
                </li>
<?php }
if (isset($_smarty_tpl->tpl_vars['U_CADDIE']->value)) {?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['U_CADDIE']->value;?>
" title="<?php echo l10n('Add to caddie');?>
">
                        <span class="glyphicon glyphicon-plus-sign"></span><span class="glyphicon-text"><?php echo l10n('Caddie');?>
</span>
                    </a>
                </li>
<?php }
if (isset($_smarty_tpl->tpl_vars['U_SEARCH_RULES']->value)) {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'core.scripts','load'=>'async','path'=>'themes/default/js/scripts.js'),$_smarty_tpl);?>

                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['U_SEARCH_RULES']->value;?>
" onclick="bd_popup(this.href); return false;" title="<?php echo l10n('Search rules');?>
" rel="nofollow">
                        <span class="glyphicon glyphicon-search"></span><span class="glyphicon-text">(?)</span>
                    </a>
                </li>
<?php }
if (isset($_smarty_tpl->tpl_vars['U_SLIDESHOW']->value)) {?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['U_SLIDESHOW']->value;?>
" title="<?php echo l10n('slideshow');?>
" rel="nofollow"> <span class="glyphicon glyphicon-play"></span><span class="glyphicon-text"><?php echo l10n('slideshow');?>
</span> </a>
                </li>
<?php }
if (isset($_smarty_tpl->tpl_vars['U_MODE_FLAT']->value)) {?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['U_MODE_FLAT']->value;?>
" title="<?php echo l10n('display all photos in all sub-albums');?>
" rel="nofollow"> <span class="glyphicon glyphicon-th-large"></span><span class="glyphicon-text"><?php echo l10n('display all photos in all sub-albums');?>
</span> </a>
                </li>
<?php }
if (isset($_smarty_tpl->tpl_vars['U_MODE_NORMAL']->value)) {?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['U_MODE_NORMAL']->value;?>
" title="<?php echo l10n('return to normal view mode');?>
"> <span class="glyphicon glyphicon-home"></span><span class="glyphicon-text"><?php echo l10n('return to normal view mode');?>
</span> </a>
                </li>
<?php }
if (isset($_smarty_tpl->tpl_vars['U_MODE_POSTED']->value)) {?>
                
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['U_MODE_POSTED']->value;?>
" title="<?php echo l10n('display a calendar by posted date');?>
" rel="nofollow"> <span class="glyphicon glyphicon-calendar"></span><span class="glyphicon-text"><?php echo l10n('Calendar');?>
</span> </a>
                </li>
                
<?php }
if (isset($_smarty_tpl->tpl_vars['U_MODE_CREATED']->value)) {?>
                
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['U_MODE_CREATED']->value;?>
" title="<?php echo l10n('display a calendar by creation date');?>
" rel="nofollow"> <span class="glyphicon glyphicon-calendar"></span><span class="glyphicon-text"><?php echo l10n('Calendar');?>
</span> </a>
                </li>
                
<?php }
if (!empty($_smarty_tpl->tpl_vars['PLUGIN_INDEX_BUTTONS']->value)) {
$_from = $_smarty_tpl->tpl_vars['PLUGIN_INDEX_BUTTONS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_button_2_saved_item = isset($_smarty_tpl->tpl_vars['button']) ? $_smarty_tpl->tpl_vars['button'] : false;
$_smarty_tpl->tpl_vars['button'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['button']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['button']->value) {
$_smarty_tpl->tpl_vars['button']->_loop = true;
$__foreach_button_2_saved_local_item = $_smarty_tpl->tpl_vars['button'];
?><li><?php echo $_smarty_tpl->tpl_vars['button']->value;?>
</li><?php
$_smarty_tpl->tpl_vars['button'] = $__foreach_button_2_saved_local_item;
}
if ($__foreach_button_2_saved_item) {
$_smarty_tpl->tpl_vars['button'] = $__foreach_button_2_saved_item;
}
}
if (!empty($_smarty_tpl->tpl_vars['PLUGIN_INDEX_ACTIONS']->value)) {
echo $_smarty_tpl->tpl_vars['PLUGIN_INDEX_ACTIONS']->value;
}
if ((!empty($_smarty_tpl->tpl_vars['CATEGORIES']->value) && !isset($_smarty_tpl->tpl_vars['GDThumb']->value)) || (!empty($_smarty_tpl->tpl_vars['THUMBNAILS']->value) && !isset($_smarty_tpl->tpl_vars['GThumb']->value) && !isset($_smarty_tpl->tpl_vars['GDThumb']->value))) {?>
                <li id="btn-grid"<?php if ($_COOKIE['view'] != 'list') {?> class="active"<?php }?>><a href="#"><span class="glyphicon glyphicon-th"></span></a></li>
                <li id="btn-list"<?php if ($_COOKIE['view'] == 'list') {?> class="active"<?php }?>><a href="#"><span class="glyphicon glyphicon-th-list"></span></a></li>
<?php }?>
            </ul>
        </div>
    </div>
</nav>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:infos_errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<a name="content"></a>
<div class="container <?php if (isset($_smarty_tpl->tpl_vars['chronology_views']->value)) {?>calender_container<?php }?>">
<?php if (!empty($_smarty_tpl->tpl_vars['PLUGIN_INDEX_CONTENT_BEGIN']->value)) {
echo $_smarty_tpl->tpl_vars['PLUGIN_INDEX_CONTENT_BEGIN']->value;
}?>

<?php if (isset($_smarty_tpl->tpl_vars['chronology_views']->value)) {?>
    <div class="calendarViews"><strong><?php echo l10n('View');?>
:</strong>
<ul class="nav navbar-nav">
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php
$_from = $_smarty_tpl->tpl_vars['chronology_views']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_view_3_saved_item = isset($_smarty_tpl->tpl_vars['view']) ? $_smarty_tpl->tpl_vars['view'] : false;
$_smarty_tpl->tpl_vars['view'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['view']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['view']->value) {
$_smarty_tpl->tpl_vars['view']->_loop = true;
$__foreach_view_3_saved_local_item = $_smarty_tpl->tpl_vars['view'];
if ($_smarty_tpl->tpl_vars['view']->value['SELECTED']) {
echo $_smarty_tpl->tpl_vars['view']->value['CONTENT'];
}
$_smarty_tpl->tpl_vars['view'] = $__foreach_view_3_saved_local_item;
}
if ($__foreach_view_3_saved_item) {
$_smarty_tpl->tpl_vars['view'] = $__foreach_view_3_saved_item;
}
?><span class="caret"></span></a>
    <ul class="dropdown-menu dropdown-menu-scrollable" role="menu">
        <?php
$_from = $_smarty_tpl->tpl_vars['chronology_views']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_loop_4_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_loop']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_loop'] : false;
$__foreach_loop_4_saved_item = isset($_smarty_tpl->tpl_vars['view']) ? $_smarty_tpl->tpl_vars['view'] : false;
$_smarty_tpl->tpl_vars['view'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_loop'] = new Smarty_Variable(array());
$__foreach_loop_4_first = true;
$_smarty_tpl->tpl_vars['view']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['view']->value) {
$_smarty_tpl->tpl_vars['view']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_loop']->value['first'] = $__foreach_loop_4_first;
$__foreach_loop_4_first = false;
$__foreach_loop_4_saved_local_item = $_smarty_tpl->tpl_vars['view'];
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_loop']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_loop']->value['first'] : null)) {?><br><?php }?>
        <li>
           <a href="<?php echo $_smarty_tpl->tpl_vars['view']->value['VALUE'];?>
"><?php echo $_smarty_tpl->tpl_vars['view']->value['CONTENT'];?>
</a>
<?php if (strstr($_smarty_tpl->tpl_vars['view']->value['VALUE'],'monthly-calendar')) {?>
            <?php $_smarty_tpl->tpl_vars['calendar_date'] = new Smarty_Variable(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['view']->value['VALUE'],"/.*-20/","20"), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'calendar_date', 0);?>            
<?php }?>
        </li>
<?php
$_smarty_tpl->tpl_vars['view'] = $__foreach_loop_4_saved_local_item;
}
if ($__foreach_loop_4_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_loop'] = $__foreach_loop_4_saved;
}
if ($__foreach_loop_4_saved_item) {
$_smarty_tpl->tpl_vars['view'] = $__foreach_loop_4_saved_item;
}
?>
    </ul>
    </li>
</ul>

</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['FILE_CHRONOLOGY_VIEW']->value)) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, $_smarty_tpl->tpl_vars['FILE_CHRONOLOGY_VIEW']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }?>


<?php if (!empty($_smarty_tpl->tpl_vars['CONTENT_DESCRIPTION']->value)) {?>
    <div class="bs-callout bs-callout-info">
        <?php echo $_smarty_tpl->tpl_vars['CONTENT_DESCRIPTION']->value;?>

    </div>
<?php }?>
    <div id="content" class="row <?php if ($_COOKIE['view'] == 'list') {?>content-list<?php } else { ?>content-grid<?php }?>">
<?php if (!empty($_smarty_tpl->tpl_vars['CONTENT']->value)) {?>
    <!-- Start of content -->
    <?php echo $_smarty_tpl->tpl_vars['CONTENT']->value;?>

    <!-- End of content -->
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['CATEGORIES']->value)) {?>
    <!-- Start of categories -->
<?php echo $_smarty_tpl->tpl_vars['CATEGORIES']->value;?>

<?php $_smarty_tpl->smarty->_cache['tag_stack'][] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
$(document).ready(function(){$('#content img').load(function(){$('#content .col-inner').equalHeights()})});<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_cache['tag_stack']);?>

    <!-- End of categories -->
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['THUMBNAILS']->value)) {?>
        <!-- Start of thumbnails -->
        <ul id="thumbnails"><?php echo $_smarty_tpl->tpl_vars['THUMBNAILS']->value;?>
</ul>
<?php $_smarty_tpl->smarty->_cache['tag_stack'][] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
$(document).ready(function(){$('#content img').load(function(){$('#content .col-inner').equalHeights()})});<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_cache['tag_stack']);?>

        <!-- End of thumbnails -->
<?php }?>
    </div>
</div>
<?php if (!empty($_smarty_tpl->tpl_vars['cats_navbar']->value) || !empty($_smarty_tpl->tpl_vars['thumb_navbar']->value)) {?>
<div class="container">
<?php if (!empty($_smarty_tpl->tpl_vars['cats_navbar']->value)) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:navigation_bar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('fragment'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent("content",'navbar'),'navbar'=>$_smarty_tpl->tpl_vars['cats_navbar']->value), 0, false);
?>

<?php }
if (!empty($_smarty_tpl->tpl_vars['thumb_navbar']->value)) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:navigation_bar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('fragment'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent("content",'navbar'),'navbar'=>$_smarty_tpl->tpl_vars['thumb_navbar']->value), 0, true);
?>

<?php }?>
</div>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['category_search_results']->value)) {?>
<div class="container">
    <h3 class="category_search_results"><?php echo l10n('Album results for');?>
 <em><strong><?php echo $_smarty_tpl->tpl_vars['QUERY_SEARCH']->value;?>
</strong></em></h3>
    <p>
        <em><strong>
<?php
$_from = $_smarty_tpl->tpl_vars['category_search_results']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_res_loop_5_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_res_loop']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_res_loop'] : false;
$__foreach_res_loop_5_saved_item = isset($_smarty_tpl->tpl_vars['res']) ? $_smarty_tpl->tpl_vars['res'] : false;
$_smarty_tpl->tpl_vars['res'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_res_loop'] = new Smarty_Variable(array());
$__foreach_res_loop_5_first = true;
$_smarty_tpl->tpl_vars['res']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
$_smarty_tpl->tpl_vars['res']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_res_loop']->value['first'] = $__foreach_res_loop_5_first;
$__foreach_res_loop_5_first = false;
$__foreach_res_loop_5_saved_local_item = $_smarty_tpl->tpl_vars['res'];
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_res_loop']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_res_loop']->value['first'] : null)) {?> &mdash; <?php }?>
            <?php echo $_smarty_tpl->tpl_vars['res']->value;?>

<?php
$_smarty_tpl->tpl_vars['res'] = $__foreach_res_loop_5_saved_local_item;
}
if ($__foreach_res_loop_5_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_res_loop'] = $__foreach_res_loop_5_saved;
}
if ($__foreach_res_loop_5_saved_item) {
$_smarty_tpl->tpl_vars['res'] = $__foreach_res_loop_5_saved_item;
}
?>
        </strong></em>
    </p>
</div>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['tag_search_results']->value)) {?>
<div class="container">
    <h3 class="tag_search_results"><?php echo l10n('Tag results for');?>
 <em><strong><?php echo $_smarty_tpl->tpl_vars['QUERY_SEARCH']->value;?>
</strong></em></h3>
    <p>
        <em><strong>
<?php
$_from = $_smarty_tpl->tpl_vars['tag_search_results']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_res_loop_6_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_res_loop']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_res_loop'] : false;
$__foreach_res_loop_6_saved_item = isset($_smarty_tpl->tpl_vars['tag']) ? $_smarty_tpl->tpl_vars['tag'] : false;
$_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_res_loop'] = new Smarty_Variable(array());
$__foreach_res_loop_6_first = true;
$_smarty_tpl->tpl_vars['tag']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_res_loop']->value['first'] = $__foreach_res_loop_6_first;
$__foreach_res_loop_6_first = false;
$__foreach_res_loop_6_saved_local_item = $_smarty_tpl->tpl_vars['tag'];
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_res_loop']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_res_loop']->value['first'] : null)) {?> &mdash; <?php }?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['tag']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</a>
<?php
$_smarty_tpl->tpl_vars['tag'] = $__foreach_res_loop_6_saved_local_item;
}
if ($__foreach_res_loop_6_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_res_loop'] = $__foreach_res_loop_6_saved;
}
if ($__foreach_res_loop_6_saved_item) {
$_smarty_tpl->tpl_vars['tag'] = $__foreach_res_loop_6_saved_item;
}
?>
        </strong></em>
    </p>
</div>
<?php }?>

<?php if (!isset($_smarty_tpl->tpl_vars['chronology_calendar']->value['calendar_bars'][0]['type'])) {?>
<div class="container">
<?php if (!empty($_smarty_tpl->tpl_vars['PLUGIN_INDEX_CONTENT_END']->value)) {
echo $_smarty_tpl->tpl_vars['PLUGIN_INDEX_CONTENT_END']->value;
}?>
</div>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['PLUGIN_INDEX_CONTENT_AFTER']->value)) {
echo $_smarty_tpl->tpl_vars['PLUGIN_INDEX_CONTENT_AFTER']->value;
}?>
<!-- End of index.tpl -->
<?php }
}
