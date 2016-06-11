<?php
defined('DLPERMS_PATH') or die('Hacking attempt!');

global $template, $page;
load_language('plugin.lang', DLPERMS_PATH);

$page['tab'] = (isset($_GET['tab'])) ? $_GET['tab'] : 'cat_options';

// include page
include(DLPERMS_PATH.$page['tab'].'.php');

$template->assign_var_from_handle('ADMIN_CONTENT', 'download_permissions');
