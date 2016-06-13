<?php
/* Smarty version 3.1.29, created on 2016-06-13 08:22:15
  from "/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575e4307818c16_05013477',
  'file_dependency' => 
  array (
    'c5745be89420dbf6267dd04573f6ff766cb00e7d' => 
    array (
      0 => '/home/j/jakovlevz/test/public_html/subdomains/images/themes/bootstrapdefault/template/header.tpl',
      1 => 1465795331,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575e4307818c16_05013477 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/j/jakovlevz/test/public_html/subdomains/images/include/smarty/libs/plugins/modifier.replace.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['lang_info']->value['code'];?>
" dir="<?php echo $_smarty_tpl->tpl_vars['lang_info']->value['direction'];?>
">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['CONTENT_ENCODING']->value;?>
">
    <meta name="generator" content="Piwigo (aka PWG), see piwigo.org">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php if (isset($_smarty_tpl->tpl_vars['meta_ref']->value)) {
if (isset($_smarty_tpl->tpl_vars['INFO_AUTHOR']->value)) {?>
    <meta name="author" content="<?php echo smarty_modifier_replace(strip_tags($_smarty_tpl->tpl_vars['INFO_AUTHOR']->value),'"',' ');?>
">
<?php }
if (isset($_smarty_tpl->tpl_vars['related_tags']->value)) {?>
    <meta name="keywords" content="<?php
$_from = $_smarty_tpl->tpl_vars['related_tags']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_tag_loop_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_tag_loop']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tag_loop'] : false;
$__foreach_tag_loop_0_saved_item = isset($_smarty_tpl->tpl_vars['tag']) ? $_smarty_tpl->tpl_vars['tag'] : false;
$_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_tag_loop'] = new Smarty_Variable(array());
$__foreach_tag_loop_0_first = true;
$_smarty_tpl->tpl_vars['tag']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_tag_loop']->value['first'] = $__foreach_tag_loop_0_first;
$__foreach_tag_loop_0_first = false;
$__foreach_tag_loop_0_saved_local_item = $_smarty_tpl->tpl_vars['tag'];
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_tag_loop']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tag_loop']->value['first'] : null)) {?>, <?php }
echo $_smarty_tpl->tpl_vars['tag']->value['name'];
$_smarty_tpl->tpl_vars['tag'] = $__foreach_tag_loop_0_saved_local_item;
}
if ($__foreach_tag_loop_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_tag_loop'] = $__foreach_tag_loop_0_saved;
}
if ($__foreach_tag_loop_0_saved_item) {
$_smarty_tpl->tpl_vars['tag'] = $__foreach_tag_loop_0_saved_item;
}
?>">
<?php }
if (isset($_smarty_tpl->tpl_vars['COMMENT_IMG']->value)) {?>
    <meta name="description" content="<?php echo smarty_modifier_replace(strip_tags($_smarty_tpl->tpl_vars['COMMENT_IMG']->value),'"',' ');
if (isset($_smarty_tpl->tpl_vars['INFO_FILE']->value)) {?> - <?php echo $_smarty_tpl->tpl_vars['INFO_FILE']->value;
}?>">
<?php } else { ?>
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['PAGE_TITLE']->value;
if (isset($_smarty_tpl->tpl_vars['INFO_FILE']->value)) {?> - <?php echo $_smarty_tpl->tpl_vars['INFO_FILE']->value;
}?>">
<?php }
}?>

    <title><?php if ($_smarty_tpl->tpl_vars['PAGE_TITLE']->value != l10n('Home') && $_smarty_tpl->tpl_vars['PAGE_TITLE']->value != $_smarty_tpl->tpl_vars['GALLERY_TITLE']->value) {
echo $_smarty_tpl->tpl_vars['PAGE_TITLE']->value;?>
 | <?php }
echo $_smarty_tpl->tpl_vars['GALLERY_TITLE']->value;?>
</title>
    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="/favicon//favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon//favicon-194x194.png" sizes="194x194">
<link rel="icon" type="image/png" href="/favicon//favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/favicon/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="/favicon//favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/favicon/manifest.json">
<link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="/favicon//favicon.ico">
<meta name="apple-mobile-web-app-title" content="tene.space/monkey">
<meta name="application-name" content="tene.space/monkey">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="/favicon/mstile-144x144.png">
<meta name="msapplication-config" content="/favicon/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<meta property="og:image" content="http://images.tene.space/favicon/site_preview.jpg" />


<?php echo '<script'; ?>
 type="text/javascript">
    reformal_wdg_w    = "713";
                    reformal_wdg_h    = "460";
                    reformal_wdg_domain    = "spacemonkey";
                    reformal_wdg_mode    = 5;
                    reformal_wdg_title   = "Ideas and suggestions";
                    reformal_wdg_ltitle  = "Got ideas? Share!...";
                    reformal_wdg_lfont   = "Verdana, Geneva, sans-serif";
                    reformal_wdg_lsize   = "12px";
                    reformal_wdg_color   = "#0033ff";
                    reformal_wdg_bcolor  = "#516683";
                    reformal_wdg_tcolor  = "#FFFFFF";
                    reformal_wdg_align   = "";
                    reformal_wdg_waction = 0;
                    reformal_wdg_vcolor  = "#9FCE54";
                    reformal_wdg_cmline  = "#E0E0E0";
                    reformal_wdg_glcolor  = "#105895";
                    reformal_wdg_tbcolor  = "#FFFFFF";
<?php echo '</script'; ?>
>

    <!-- <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;
echo $_smarty_tpl->tpl_vars['themeconf']->value['icon_dir'];?>
/favicon.ico">; -->
    <link rel="start" title="<?php echo l10n('Home');?>
" href="<?php echo $_smarty_tpl->tpl_vars['U_HOME']->value;?>
" >
    <link rel="search" title="<?php echo l10n('Search');?>
" href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
search.php">
<?php if (isset($_smarty_tpl->tpl_vars['first']->value['U_IMG'])) {?>
    <link rel="first" title="<?php echo l10n('First');?>
" href="<?php echo $_smarty_tpl->tpl_vars['first']->value['U_IMG'];?>
">
<?php }
if (isset($_smarty_tpl->tpl_vars['previous']->value['U_IMG'])) {?>
    <link rel="prev" title="<?php echo l10n('Previous');?>
" href="<?php echo $_smarty_tpl->tpl_vars['previous']->value['U_IMG'];?>
">
<?php }
if (isset($_smarty_tpl->tpl_vars['next']->value['U_IMG'])) {?>
    <link rel="next" title="<?php echo l10n('Next');?>
" href="<?php echo $_smarty_tpl->tpl_vars['next']->value['U_IMG'];?>
">
<?php }
if (isset($_smarty_tpl->tpl_vars['last']->value['U_IMG'])) {?>
    <link rel="last" title="<?php echo l10n('Last');?>
" href="<?php echo $_smarty_tpl->tpl_vars['last']->value['U_IMG'];?>
">
<?php }
if (isset($_smarty_tpl->tpl_vars['U_UP']->value)) {?>
    <link rel="up" title="<?php echo l10n('Thumbnails');?>
" href="<?php echo $_smarty_tpl->tpl_vars['U_UP']->value;?>
">
<?php }?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/bootstrapdefault/fullcalendar.css",'order'=>20),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/bootstrapdefault/fullcalendar.print.css",'order'=>21),$_smarty_tpl);?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/bootstrapdefault/bootstrap/dist/css/bootstrap.min.css",'order'=>-20),$_smarty_tpl);?>


<?php
$_from = $_smarty_tpl->tpl_vars['themes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_theme_1_saved_item = isset($_smarty_tpl->tpl_vars['theme']) ? $_smarty_tpl->tpl_vars['theme'] : false;
$_smarty_tpl->tpl_vars['theme'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['theme']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['theme']->value) {
$_smarty_tpl->tpl_vars['theme']->_loop = true;
$__foreach_theme_1_saved_local_item = $_smarty_tpl->tpl_vars['theme'];
if ($_smarty_tpl->tpl_vars['theme']->value['load_css']) {?>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/".((string)$_smarty_tpl->tpl_vars['theme']->value['id'])."/theme.css",'order'=>-10),$_smarty_tpl);?>

<?php }
if (!empty($_smarty_tpl->tpl_vars['theme']->value['local_head'])) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, $_smarty_tpl->tpl_vars['theme']->value['local_head'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('load_css'=>$_smarty_tpl->tpl_vars['theme']->value['load_css']), 0, true);
}
$_smarty_tpl->tpl_vars['theme'] = $__foreach_theme_1_saved_local_item;
}
if ($__foreach_theme_1_saved_item) {
$_smarty_tpl->tpl_vars['theme'] = $__foreach_theme_1_saved_item;
}
?>

<?php if ($_smarty_tpl->tpl_vars['theme_config']->value->bootstrap_theme == 'default') {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/bootstrapdefault/bootstrap/dist/css/bootstrap-theme.min.css",'order'=>0),$_smarty_tpl);?>

<?php }
if (file_exists("local/bootstrapdefault/custom.css")) {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"local/bootstrapdefault/custom.css",'order'=>10),$_smarty_tpl);?>

<?php }
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/bootstrapdefault/fixplugins.css",'order'=>1000000),$_smarty_tpl);?>

<!-- COMBINED_CSS -->

<?php if (isset($_smarty_tpl->tpl_vars['U_PREFETCH']->value)) {?>
    <link rel="prefetch" href="<?php echo $_smarty_tpl->tpl_vars['U_PREFETCH']->value;?>
">
<?php }
if (!empty($_smarty_tpl->tpl_vars['page_refresh']->value)) {?>
    <meta http-equiv="refresh" content="<?php echo $_smarty_tpl->tpl_vars['page_refresh']->value['TIME'];?>
;url=<?php echo $_smarty_tpl->tpl_vars['page_refresh']->value['U_REFRESH'];?>
">
<?php }?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery-ajaxmanager','require'=>'jquery','path'=>'themes/default/js/plugins/jquery.ajaxmanager.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'thumbnails-loader','require'=>'jquery-ajaxmanager','path'=>'themes/default/js/thumbnails.loader.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'bootstrap','require'=>'jquery','path'=>"themes/bootstrapdefault/bootstrap/dist/js/bootstrap.min.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>$_smarty_tpl->tpl_vars['themeconf']->value['name'],'require'=>'bootstrap','path'=>"themes/bootstrapdefault/js/theme.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'amoment','require'=>'jquery','path'=>"themes/bootstrapdefault/js/moment.min.js"),$_smarty_tpl);?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'share42','require'=>'jquery','path'=>"themes/bootstrapdefault/js/share42.js"),$_smarty_tpl);?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_combined_scripts'][0][0]->func_get_combined_scripts(array('load'=>'header'),$_smarty_tpl);?>


    <!--[if lt IE 7]>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
themes/default/js/pngfix.js"><?php echo '</script'; ?>
>
    <![endif]-->

<?php if (!empty($_smarty_tpl->tpl_vars['head_elements']->value)) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['head_elements']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_elt_2_saved_item = isset($_smarty_tpl->tpl_vars['elt']) ? $_smarty_tpl->tpl_vars['elt'] : false;
$_smarty_tpl->tpl_vars['elt'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['elt']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['elt']->value) {
$_smarty_tpl->tpl_vars['elt']->_loop = true;
$__foreach_elt_2_saved_local_item = $_smarty_tpl->tpl_vars['elt'];
echo $_smarty_tpl->tpl_vars['elt']->value;?>

<?php
$_smarty_tpl->tpl_vars['elt'] = $__foreach_elt_2_saved_local_item;
}
if ($__foreach_elt_2_saved_item) {
$_smarty_tpl->tpl_vars['elt'] = $__foreach_elt_2_saved_item;
}
}?>
</head>

<body id="<?php echo $_smarty_tpl->tpl_vars['BODY_ID']->value;?>
">
<!-- Share42 widget  -->
    <div class="share42init" data-top1="100" data-top2="100" data-margin="0" data-url="http://images.tene.space" data-title="[tene.space.monkey] images from travel" data-image="http://images.tene.space/favicon/site_preview.jpg" data-description="BE THE CHANGE you wish to see in the world" data-path="http://images.tene.space/favicon/" data-zero-counter="0"></div> 
    <div id="the_page">
<?php if ($_smarty_tpl->tpl_vars['BODY_ID']->value != 'thePicturePage' || $_smarty_tpl->tpl_vars['theme_config']->value->picture_page == 'normal') {?>
        <!-- Bootstrap navbar, moved to the header as variables are missing in menubar.tpl, actual menus remain in menubar.tpl -->
        <nav class="navbar navbar-default navbar-main" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menubar-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['U_HOME']->value;?>
"><img src="/favicon/spacemonkey_logo_200.png" height="50" alt="monkey_logo" title="tene.space/monkey"> <span><?php echo $_smarty_tpl->tpl_vars['GALLERY_TITLE']->value;?>
<span></a>
                </div>
                <div class="collapse navbar-collapse navbar-right" id="menubar-navbar-collapse">
<?php echo $_smarty_tpl->tpl_vars['MENUBAR']->value;?>

                </div>
            </div>
        </nav>
<?php }?>
<!--
<?php if (!isset($_smarty_tpl->tpl_vars['slideshow']->value) && ($_smarty_tpl->tpl_vars['BODY_ID']->value != 'thePicturePage' || $_smarty_tpl->tpl_vars['theme_config']->value->picture_page == 'normal')) {?>
        <div class="jumbotron">
            <div class="container">
                <div id="theHeader"><?php echo $_smarty_tpl->tpl_vars['PAGE_BANNER']->value;?>
</div>
            </div>
        </div>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['header_msgs']->value)) {
$_from = $_smarty_tpl->tpl_vars['header_msgs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_msg_3_saved_item = isset($_smarty_tpl->tpl_vars['msg']) ? $_smarty_tpl->tpl_vars['msg'] : false;
$_smarty_tpl->tpl_vars['msg'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['msg']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->_loop = true;
$__foreach_msg_3_saved_local_item = $_smarty_tpl->tpl_vars['msg'];
$_smarty_tpl->tpl_vars['msg'] = $__foreach_msg_3_saved_local_item;
}
if ($__foreach_msg_3_saved_item) {
$_smarty_tpl->tpl_vars['msg'] = $__foreach_msg_3_saved_item;
}
}?>

<?php if (!empty($_smarty_tpl->tpl_vars['header_notes']->value)) {
$_from = $_smarty_tpl->tpl_vars['header_notes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_note_4_saved_item = isset($_smarty_tpl->tpl_vars['note']) ? $_smarty_tpl->tpl_vars['note'] : false;
$_smarty_tpl->tpl_vars['note'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['note']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['note']->value) {
$_smarty_tpl->tpl_vars['note']->_loop = true;
$__foreach_note_4_saved_local_item = $_smarty_tpl->tpl_vars['note'];
$_smarty_tpl->tpl_vars['note'] = $__foreach_note_4_saved_local_item;
}
if ($__foreach_note_4_saved_item) {
$_smarty_tpl->tpl_vars['note'] = $__foreach_note_4_saved_item;
}
}?>
<!-- End of header.tpl --><?php }
}
