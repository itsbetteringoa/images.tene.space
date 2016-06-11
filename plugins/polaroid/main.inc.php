<?php
/*
Plugin Name: Polaroid
Version: 2.7.a
Description: Turn Your Thumbnails Into Polaroids
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=812
Author: plg
Author URI: http://le-gall.net/pierrick
*/

global $conf;

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

if (mobile_theme()) return;

define('POLAROID_PATH' , PHPWG_PLUGINS_PATH . basename(dirname(__FILE__)) . '/');

add_event_handler('init', 'polaroid_init');
function polaroid_init()
{
  global $conf;
}

add_event_handler('get_admin_plugin_menu_links', 'polaroid_admin_menu');
function polaroid_admin_menu($menu)
{
  global $page;

  array_push(
    $menu,
    array(
      'NAME' => 'Polaroid',
      'URL'  => get_root_url().'admin.php?page=plugin-polaroid'
      )
    );

  return $menu;
}

add_event_handler('loc_begin_index', 'polaroid_index', 70);
function polaroid_index()
{
  global $template, $page, $conf;

  if ($conf['polaroid']['apply_to_albums'] == 'list')
  {
    if (!isset($page['category']))
    {
      return;
    }

    if (!$page['category']['polaroid_active'])
    {
      return;
    }
  }

  $template->set_prefilter('index', 'polaroid_prefilter');

  add_event_handler('loc_end_index_thumbnails', 'process_polaroid', 50, 2);
}

function process_polaroid($tpl_vars, $pictures)
{
  global $template, $conf;

  $template->set_filename( 'index_thumbnails', realpath(POLAROID_PATH.'template/polaroid.tpl'));

  return $tpl_vars;
}

function polaroid_prefilter($content, $smarty)
{
  $pattern = '#\<(div|ul).*?id\="thumbnails".*?\>\{\$THUMBNAILS\}\</(div|ul)\>#';
  $replacement = '<ul class="polaroid">{$THUMBNAILS}</ul>';

  return preg_replace($pattern, $replacement, $content);
}

?>