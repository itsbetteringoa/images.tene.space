<?php
/*
Plugin Name: rightClick
Version: 2.8.a
Description: rightClick deactivates the context menu on websized pictures and more. 
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=401
Author: VDigital
Author URI: http://piwigo.org/
*/

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');
define('RIGHTCK_DIR' , basename(dirname(__FILE__)));
define('RIGHTCK_PATH' , PHPWG_PLUGINS_PATH . RIGHTCK_DIR . '/');

if ( !function_exists( 'rightClick_protect' ) )
{
	if ( defined('IN_ADMIN') and IN_ADMIN ) return false;

	add_event_handler('loc_after_page_header', 'rightClick_protect', 20);

	function  rightClick_protect()
  {
		global $template, $user, $conf;
		if (!isset($conf['rightClick_level']))
      $Maxlvl = max($conf['available_permission_levels']);
		else
      $Maxlvl = $conf['rightClick_level'];

		if ($user['level'] >= $Maxlvl) return;

                $default = array(
                  '#theImage img',
                  '#theImage area',
                  '#akPicture',
                  '#colorbox',
                  '#sb-container',
                  '#prevnext',
                  '#theMainImage',
                  '#theImgHigh', // Stripped, zoom on HD
                  '.thumbnailCategory img',
                  '.thumbnails img',
                  '#thumbnails img', // specific on Stripped
                  '#myHomePage img', // Homepage with Additional Pages
                  '.fotorama__img', // Fotorama
                  );
		if (!isset($conf['rightClick_selectors']))
      $conf['rightClick_selectors'] = array();

		$conf['rightClick_selectors'] = array_unique( array_merge($default, $conf['rightClick_selectors']) );
		
		$template->set_filenames(array(
		'rightClick_protect' => dirname(__FILE__) . '/template/rightClick_protect.tpl',
		));
		$Path = embellish_url($template->get_template_vars('ROOT_URL').RIGHTCK_PATH);
		$protect = array(
			'Dir' 				=> RIGHTCK_DIR,
			'Path' 				=> $Path,
			'Selectors'			=> $conf['rightClick_selectors'],
			);
		$template->assign( array( 'RIGHTCK' => $protect ) );
		$template->parse('rightClick_protect');
	}
}
?>
