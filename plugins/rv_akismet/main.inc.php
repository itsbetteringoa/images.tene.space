<?php /*
Plugin Name: RV Akismet
Version: 2.7.a
Description: Uses Akismet online service to check comments agains spam
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=192
Author: rvelices
Author URI: http://www.modusoptimus.com
*/

define('AKIS_DIR' , basename(dirname(__FILE__)));
define('AKIS_PATH' , PHPWG_PLUGINS_PATH . AKIS_DIR . '/');

add_event_handler('user_comment_check', 'akismet_user_comment_check_wrapper', EVENT_HANDLER_PRIORITY_NEUTRAL+10, 3);
if (!isset($_SESSION['csi']))
	add_event_handler('loc_begin_page_tail', 'akismet_page_tail' );


add_event_handler('get_admin_plugin_menu_links', 'akismet_plugin_admin_menu' );

function akismet_plugin_admin_menu($menu)
{
	global $page,$conf;
	if ( empty($conf['akismet_api_key']) and in_array($page['page'], array('intro','plugins_list')) )
	{
		load_language('plugin.lang', AKIS_PATH);
		$page['errors'][] = l10n('You need to define the Akismet api key');
	}
	$admin_url = get_admin_plugin_menu_link(dirname(__FILE__).'/admin.php');
	$menu[] = array(
				'NAME' => 'Akismet',
				'URL' => $admin_url
			);
	return $menu;
}


function akismet_user_comment_check_wrapper($action, $comment, $where=null)
{
	include_once( dirname(__FILE__).'/check.inc.php' );
	$action = akismet_user_comment_check($action, $comment, $where);
	return $action;
}

/*add_event_handler('init', 'akismet_init' );

function akismet_init()
{
	global $template;
	$template->smarty->register_prefilter('akismet_prefilter_comment_form');
}

function akismet_prefilter_comment_form($source, $smarty)
{
	if ( ($pos=strpos($source, '<textarea'))!==false
		&& ($pos2=strpos($source, 'comment', $pos))!==false
		&& $pos2-$pos <300)
	{
		$source= substr_replace($source, '{html_style}#urlid{ldelim}display:none}{/html_style}<input type="text" name="url" id="urlid">', $pos,0);
	}
	return $source;
}*/

function akismet_page_tail()
{
	global $template;

	$ua = @$_SERVER['HTTP_USER_AGENT'];
	foreach(array('bot','crawl','spider','slurp') as $needle)
		if (stripos($ua, $needle)!==false)
				return;

	$src = get_root_url().'plugins/'.AKIS_DIR.'/csi.php';
	$template->append( 'footer_elements', '<img src="'.$src.'" width=0 height=0>');
}

?>