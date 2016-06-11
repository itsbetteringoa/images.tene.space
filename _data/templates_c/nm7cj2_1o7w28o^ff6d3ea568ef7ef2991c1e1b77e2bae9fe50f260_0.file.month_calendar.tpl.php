<?php
/* Smarty version 3.1.29, created on 2016-06-11 16:35:11
  from "/home/j/jakovlevz/test/public_html/subdomains/images/themes/default/template/month_calendar.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575c138f26fdd0_22914974',
  'file_dependency' => 
  array (
    'ff6d3ea568ef7ef2991c1e1b77e2bae9fe50f260' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/themes/default/template/month_calendar.tpl',
      1 => 1462350722,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575c138f26fdd0_22914974 ($_smarty_tpl) {
if (!empty($_smarty_tpl->tpl_vars['chronology_navigation_bars']->value)) {
$_from = $_smarty_tpl->tpl_vars['chronology_navigation_bars']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_bar_0_saved_item = isset($_smarty_tpl->tpl_vars['bar']) ? $_smarty_tpl->tpl_vars['bar'] : false;
$_smarty_tpl->tpl_vars['bar'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['bar']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['bar']->value) {
$_smarty_tpl->tpl_vars['bar']->_loop = true;
$__foreach_bar_0_saved_local_item = $_smarty_tpl->tpl_vars['bar'];
?>
<div class="calendarBar">
<?php if (isset($_smarty_tpl->tpl_vars['bar']->value['previous'])) {?>
		<div style="float:left;margin-right:5px">&laquo; <a href="<?php echo $_smarty_tpl->tpl_vars['bar']->value['previous']['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['bar']->value['previous']['LABEL'];?>
</a></div>
<?php }
if (isset($_smarty_tpl->tpl_vars['bar']->value['next'])) {?>
		<div style="float:right;margin-left:5px"><a href="<?php echo $_smarty_tpl->tpl_vars['bar']->value['next']['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['bar']->value['next']['LABEL'];?>
</a> &raquo;</div>
<?php }
if (empty($_smarty_tpl->tpl_vars['bar']->value['items'])) {?>
		&nbsp;
<?php } else {
$_from = $_smarty_tpl->tpl_vars['bar']->value['items'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_1_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_1_saved_local_item = $_smarty_tpl->tpl_vars['item'];
if (!isset($_smarty_tpl->tpl_vars['item']->value['URL'])) {?>
		<span class="calItem"><?php echo $_smarty_tpl->tpl_vars['item']->value['LABEL'];?>
</span>
<?php } else { ?>
		<a class="calItem"<?php if (isset($_smarty_tpl->tpl_vars['item']->value['NB_IMAGES'])) {?> title="<?php echo l10n_dec('%d photo','%d photos',$_smarty_tpl->tpl_vars['item']->value['NB_IMAGES']);?>
"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['item']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['LABEL'];?>
</a>
<?php }
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved_local_item;
}
if ($__foreach_item_1_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved_item;
}
}?>
</div>
<?php
$_smarty_tpl->tpl_vars['bar'] = $__foreach_bar_0_saved_local_item;
}
if ($__foreach_bar_0_saved_item) {
$_smarty_tpl->tpl_vars['bar'] = $__foreach_bar_0_saved_item;
}
}?>

<?php if (!empty($_smarty_tpl->tpl_vars['chronology_calendar']->value['calendar_bars'])) {
$_from = $_smarty_tpl->tpl_vars['chronology_calendar']->value['calendar_bars'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_bar_2_saved_item = isset($_smarty_tpl->tpl_vars['bar']) ? $_smarty_tpl->tpl_vars['bar'] : false;
$_smarty_tpl->tpl_vars['bar'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['bar']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['bar']->value) {
$_smarty_tpl->tpl_vars['bar']->_loop = true;
$__foreach_bar_2_saved_local_item = $_smarty_tpl->tpl_vars['bar'];
?>
<div class="calendarCalBar">
	<span class="calCalHead"><a href="<?php echo $_smarty_tpl->tpl_vars['bar']->value['U_HEAD'];?>
"><?php echo $_smarty_tpl->tpl_vars['bar']->value['HEAD_LABEL'];?>
</a>  (<?php echo $_smarty_tpl->tpl_vars['bar']->value['NB_IMAGES'];?>
)</span><br>
<?php
$_from = $_smarty_tpl->tpl_vars['bar']->value['items'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_3_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_3_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
	<span class="calCal<?php if (!isset($_smarty_tpl->tpl_vars['item']->value['URL'])) {?>Empty<?php }?>">
<?php if (isset($_smarty_tpl->tpl_vars['item']->value['URL'])) {?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['LABEL'];?>
</a>
<?php } else { ?>
	<?php echo $_smarty_tpl->tpl_vars['item']->value['LABEL'];?>

<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['item']->value['NB_IMAGES'])) {?>(<?php echo $_smarty_tpl->tpl_vars['item']->value['NB_IMAGES'];?>
)<?php }?>
	</span>
<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_3_saved_local_item;
}
if ($__foreach_item_3_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_3_saved_item;
}
?>
</div>
<?php
$_smarty_tpl->tpl_vars['bar'] = $__foreach_bar_2_saved_local_item;
}
if ($__foreach_bar_2_saved_item) {
$_smarty_tpl->tpl_vars['bar'] = $__foreach_bar_2_saved_item;
}
}?>

<?php if (isset($_smarty_tpl->tpl_vars['chronology_calendar']->value['month_view'])) {?>
<table class="calMonth">
 <thead>
 <tr>
<?php
$_from = $_smarty_tpl->tpl_vars['chronology_calendar']->value['month_view']['wday_labels'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_wday_4_saved_item = isset($_smarty_tpl->tpl_vars['wday']) ? $_smarty_tpl->tpl_vars['wday'] : false;
$_smarty_tpl->tpl_vars['wday'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['wday']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['wday']->value) {
$_smarty_tpl->tpl_vars['wday']->_loop = true;
$__foreach_wday_4_saved_local_item = $_smarty_tpl->tpl_vars['wday'];
?>
	<th><?php echo $_smarty_tpl->tpl_vars['wday']->value;?>
</th>
<?php
$_smarty_tpl->tpl_vars['wday'] = $__foreach_wday_4_saved_local_item;
}
if ($__foreach_wday_4_saved_item) {
$_smarty_tpl->tpl_vars['wday'] = $__foreach_wday_4_saved_item;
}
?>
 </tr>
 </thead>
<?php $_smarty_tpl->smarty->_cache['tag_stack'][] = array('html_style', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['html_style'][0][0]->block_html_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

.calMonth TD, .calMonth .calImg{
	width:<?php echo $_smarty_tpl->tpl_vars['chronology_calendar']->value['month_view']['CELL_WIDTH'];?>
px;height:<?php echo $_smarty_tpl->tpl_vars['chronology_calendar']->value['month_view']['CELL_HEIGHT'];?>
px
}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['html_style'][0][0]->block_html_style(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_cache['tag_stack']);?>

<?php
$_from = $_smarty_tpl->tpl_vars['chronology_calendar']->value['month_view']['weeks'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_week_5_saved_item = isset($_smarty_tpl->tpl_vars['week']) ? $_smarty_tpl->tpl_vars['week'] : false;
$_smarty_tpl->tpl_vars['week'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['week']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['week']->value) {
$_smarty_tpl->tpl_vars['week']->_loop = true;
$__foreach_week_5_saved_local_item = $_smarty_tpl->tpl_vars['week'];
?>
 <tr>
<?php
$_from = $_smarty_tpl->tpl_vars['week']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_day_6_saved_item = isset($_smarty_tpl->tpl_vars['day']) ? $_smarty_tpl->tpl_vars['day'] : false;
$_smarty_tpl->tpl_vars['day'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['day']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
$_smarty_tpl->tpl_vars['day']->_loop = true;
$__foreach_day_6_saved_local_item = $_smarty_tpl->tpl_vars['day'];
if (!empty($_smarty_tpl->tpl_vars['day']->value)) {
if (isset($_smarty_tpl->tpl_vars['day']->value['IMAGE'])) {?>
 			<td class="calDayCellFull">
	 			<div class="calBackDate"><?php echo $_smarty_tpl->tpl_vars['day']->value['DAY'];?>
</div><div class="calForeDate"><?php echo $_smarty_tpl->tpl_vars['day']->value['DAY'];?>
</div>
	 			<div class="calImg">
					<a href="<?php echo $_smarty_tpl->tpl_vars['day']->value['U_IMG_LINK'];?>
">
 						<img src="<?php echo $_smarty_tpl->tpl_vars['day']->value['IMAGE'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['day']->value['IMAGE_ALT'];?>
" title="<?php echo l10n_dec('%d photo','%d photos',$_smarty_tpl->tpl_vars['day']->value['NB_ELEMENTS']);?>
">
					</a>
				</div>
<?php } else { ?>
 			<td class="calDayCellEmpty"><?php echo $_smarty_tpl->tpl_vars['day']->value['DAY'];?>

<?php }?>
 	<?php } else { ?>
 		<td>
<?php }?>
 	</td>
 	<?php
$_smarty_tpl->tpl_vars['day'] = $__foreach_day_6_saved_local_item;
}
if ($__foreach_day_6_saved_item) {
$_smarty_tpl->tpl_vars['day'] = $__foreach_day_6_saved_item;
}
?>
 </tr>
 <?php
$_smarty_tpl->tpl_vars['week'] = $__foreach_week_5_saved_local_item;
}
if ($__foreach_week_5_saved_item) {
$_smarty_tpl->tpl_vars['week'] = $__foreach_week_5_saved_item;
}
?>
</table>
<?php }?>

<?php }
}
