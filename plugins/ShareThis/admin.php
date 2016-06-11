<?php
/**
 * This is the main administration page, if you have only one admin page you can put
 * directly its code here or using the tabsheet system like bellow
 */

defined('SHARETHIS_PATH') or die('Hacking attempt!');

global $template, $page, $conf;

load_language('plugin.lang', SHARETHIS_PATH);
$params = $conf['sharethis'];

// Save configuration
if (isset($_POST['submit'])) {

  $params  = array(
    'facebook'   => !empty($_POST['inc_facebook']),
    'pinterest'  => !empty($_POST['inc_pinterest']),
    'twitter'    => !empty($_POST['inc_twitter']),
    'googleplus' => !empty($_POST['inc_googleplus']),
    'tumblr'     => !empty($_POST['inc_tumblr'])
  );

  conf_update_param('sharethis', $params, true);

  pwg_set_session_var( 'purge_template', 1 );

  array_push($page['infos'], l10n('Plugin Settings are saved'));
}

// Try to find GreyDragon Theme and use Theme's styles for admin area
$css_file = str_replace('/./', '/', dirname(dirname(dirname(__FILE__))) . '/' . GDTHEME_PATH . "admin/css/styles.css");
if (@file_exists($css_file)):
  $custom_css = "yes";
else:
  $custom_css = "no";
endif;

// template vars
$template->assign(array(
  'SHARETHIS_PATH'    => SHARETHIS_PATH, // used for images, scripts, ... access
  'SHARETHIS_ABS_PATH'=> realpath(SHARETHIS_PATH), // used for template inclusion (Smarty needs a real path)
  'SHARETHIS_ADMIN'   => SHARETHIS_ADMIN,
  'SHARETHIS_VERSION' => SHARETHIS_VERSION,
  'GDTHEME_PATH'      => GDTHEME_PATH,
  'CUSTOM_CSS'        => $custom_css,
  'PHPWG_ROOT_PATH'   => PHPWG_ROOT_PATH,

  'INC_FACEBOOK'      => isset($params['facebook']) && $params['facebook'],
  'INC_PINTEREST'     => isset($params['pinterest']) && $params['pinterest'],
  'INC_TWITTER'       => isset($params['twitter']) && $params['twitter'],
  'INC_GOOGLEPLUS'    => isset($params['googleplus']) && $params['googleplus'],
  'INC_TUMBLR'        => isset($params['tumblr']) && $params['tumblr']

));

// send page content
$template->set_filenames(array('plugin_admin_content' => dirname(__FILE__) . '/template/admin.tpl'));
$template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content');
