<?php
/* Smarty version 3.1.29, created on 2016-07-19 06:31:55
  from "/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578d9f2b3f47c5_95563396',
  'file_dependency' => 
  array (
    '1e5ded44fb4823e4a232cfcc8cba8b8b82125ab3' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/footer.tpl',
      1 => 1465893336,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578d9f2b3f47c5_95563396 ($_smarty_tpl) {
?>
        <!-- Start of footer.tpl -->
        <div class="copyright container">
            <div class="text-center">
<?php if (isset($_smarty_tpl->tpl_vars['debug']->value['TIME'])) {?>
                <?php echo l10n('Page generated in');?>
 <?php echo $_smarty_tpl->tpl_vars['debug']->value['TIME'];?>
 (<?php echo $_smarty_tpl->tpl_vars['debug']->value['NB_QUERIES'];?>
 <?php echo l10n('SQL queries in');?>
 <?php echo $_smarty_tpl->tpl_vars['debug']->value[SQL_TIME];?>
) -
<?php }?>
                
                <?php echo l10n('Powered by');?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['PHPWG_URL']->value;?>
" class="Piwigo">Piwigo</a> | Bootstrap Default <?php echo l10n('theme by');?>
 <a href="https://philio.me/">Phil Bayfield</a>
<?php echo $_smarty_tpl->tpl_vars['VERSION']->value;?>
 
 <!-- 
                | <a href="<?php echo $_smarty_tpl->tpl_vars['CONTACT_FORM_PUBLIC']->value;?>
"><?php echo l10n('Contact webmaster');?>
</a> -->
 
<!-- 
<?php if (isset($_smarty_tpl->tpl_vars['TOGGLE_MOBILE_THEME_URL']->value)) {?>
                | <?php echo l10n('View in');?>
 : <a href="<?php echo $_smarty_tpl->tpl_vars['TOGGLE_MOBILE_THEME_URL']->value;?>
"><?php echo l10n('Mobile');?>
</a> | <b><?php echo l10n('Desktop');?>
</b>
<?php }?>
-->

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_combined_scripts'][0][0]->func_get_combined_scripts(array('load'=>'footer'),$_smarty_tpl);?>


<?php if (isset($_smarty_tpl->tpl_vars['footer_elements']->value)) {
$_from = $_smarty_tpl->tpl_vars['footer_elements']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
echo $_smarty_tpl->tpl_vars['v']->value;?>

<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
}?>
            </div>
        </div>
<?php if (isset($_smarty_tpl->tpl_vars['debug']->value['QUERIES_LIST'])) {?>
        <div id="debug">
<?php echo $_smarty_tpl->tpl_vars['debug']->value['QUERIES_LIST'];?>

        </div>
<?php }?>
    </div>
     <div class="flag_counter">
<a href="http://info.flagcounter.com/Cbbk"><img src="http://s06.flagcounter.com/count2/Cbbk/bg_FFFFFF/txt_000000/border_CCCCCC/columns_1/maxflags_5/viewers_0/labels_1/pageviews_1/flags_0/percent_0/" alt="Flag Counter" target=
_blank" border="0" style="display: none;"></a>     
    </div>
    
</body>
</html><?php }
}
