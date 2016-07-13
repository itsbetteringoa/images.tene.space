<?php
/*
  Plugin Name: Preload
  Version: 0.3.3
  Description: Preload next/previous images when in the photo view.
  Plugin URI: http://piwigo.org/ext/extension_view.php?eid=799
  Author: fifreb
  Author URI:
*/

/*
  Preload - A Piwigo Plugin that preloads images for a more responsive browsing experience.
  Copyright (C) 2015 Philippe Troin <phil@fifi.org>

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

defined('PHPWG_PLUGINS_PATH') or die('Hacking attempt!');

define('PRELOAD_ID',       basename(dirname(__FILE__)));
define('PRELOAD_PATH' ,    PHPWG_PLUGINS_PATH . PRELOAD_ID . '/');

if (defined('IN_ADMIN'))
  {
    add_event_handler('get_admin_plugin_menu_links', 'Preload_admin_menu');
  }
else
  {
    add_event_handler('loc_begin_picture', 'Preload_picture_pre_init');
  }

add_event_handler('init', 'Preload_init');

function Preload_init()
{
  global $conf, $template;

  $conf[PRELOAD_ID] = unserialize($conf[PRELOAD_ID]);
  if (!isset($conf[PRELOAD_ID]['imageCount'])) {
    $conf[PRELOAD_ID]['imageCount'] = 1;
  }
  if (!isset($conf[PRELOAD_ID]['squareThumbs'])) {
    $conf[PRELOAD_ID]['squareThumbs'] = true;
  }

  $template->set_prefilter('header', 'Preload_header_prefilter');
}

function Preload_admin_menu($menu)
{
  $menu[] = array(
		  'NAME' => 'Preload',
		  'URL'  => get_root_url() . 'admin.php?page=plugin-' . PRELOAD_ID,
		  );

  return $menu;
}

function Preload_picture_pre_init()
{
  global $template, $pwg_loaded_plugins;

  // Fotorama does its own preloading, do disable the module when in slideshow mode
  if (! (isset($_GET['slideshow']) && isset($pwg_loaded_plugins['Fotorama']))) {
    add_event_handler('loc_begin_page_header', 'Preload_populate_images');
    $template->set_prefilter('picture', 'Preload_picture_prefilter');
    $template->set_prefilter('slideshow', 'Preload_picture_prefilter');
  }
}

// Lifted from automatic_size, we should probably factorize this code out.
function Preload_asize_automatic_size($derivatives)
{
  global $conf;

  $unique_derivatives = array();
  $added = array();
  foreach($derivatives as $type => $derivative)
  {
    if ($type==IMG_SQUARE || $type==IMG_THUMB)
      continue;
    if (!array_key_exists($type, ImageStdParams::get_defined_type_map()))
      continue;
    $url = $derivative->get_url();
    if (isset($added[$url]))
      continue;
    $added[$url] = 1;
    $unique_derivatives[$type]= $derivative;

    if (isset($_COOKIE['available_size']))
    {
      $available_size = explode('x', $_COOKIE['available_size']);

      $size = $derivative->get_size();
      if ($size)
      {
	// if we have a very high picture (such as an infographic), we only try to match width
	if ($size[0]/$size[1] < $conf['automatic_size_min_ratio'])
	{
	  if ($size[0] <= $available_size[0])
	  {
	    $automatic_size = $type;
	  }
	}
	// if we have a very wide picture (panoramic), we only try to match height
	elseif ($size[0]/$size[1] > $conf['automatic_size_max_ratio'])
	{
	  if ($size[1] <= $available_size[1])
	  {
	    $automatic_size = $type;
	  }
	}
	else
	{
	  if ($size[0] <= $available_size[0] and $size[1] <= $available_size[1])
	  {
	    $automatic_size = $type;
	  }
	}
      }
    }
  }
  if (!isset($automatic_size)) {
    return null;
  }
  return $derivatives[$automatic_size];
}

function Preload_populate_images()
{
  global $user, $page, $template, $conf, $pwg_loaded_plugins;

  $conf_nb_images = $conf[PRELOAD_ID]['imageCount'];
  if ($conf_nb_images <= 0) {
    return;
  }

  $size = null;
  $is_automatic_size = false;
  if (isset($pwg_loaded_plugins['automatic_size'])) {
    // That's how automatic_size figures out if automatic sizing has been changed by the user
    if (@$_COOKIE['is_automatic_size'] != 'no') {
      $is_automatic_size = true;
    }
  }

  if (!$is_automatic_size) {
    $size = pwg_get_session_var('picture_deriv', $conf['derivative_default_size']);
  }

  $ranks = array();
  $min_rank = max(1, $page['current_rank']-$conf_nb_images);
  $max_rank = min($page['last_rank'], $page['current_rank']+$conf_nb_images);
  $next_rank = -1;
  $prev_rank = -1;
  if ($page['current_rank'] > 1) {
    $prev_rank = $page['current_rank']-1;
  }
  if ($page['current_rank'] < $page['last_rank']) {
    $next_rank = $page['current_rank']+1;
  }
  for ($n = $min_rank; $n <= $max_rank; $n++) {
    $ranks[ $page['items'][ $n ]] = $n;
  }
  if (count($ranks)==0) {
    return;
  }

  $query = '
	SELECT *
	  FROM '.IMAGES_TABLE.'
	  WHERE id IN ('.implode(',', array_keys($ranks)).')
	;';

  $result = pwg_query($query);

  $urls = array();
  while ($row = pwg_db_fetch_assoc($result))
    {
      $rank = $ranks[$row['id']];
      $srcImg = new SrcImage($row);
      if ($rank != $page['current_rank']) {
	if ($is_automatic_size) {
	  $img = Preload_asize_automatic_size(DerivativeImage::get_all($srcImg));
	} else {
	  $img = new DerivativeImage( $size, $srcImg);
	}
        if ($img != null) {
	  $urls[] = $img->get_url();
        }
      }
      if ($conf[PRELOAD_ID]['squareThumbs']
	  && ($rank != $prev_rank && $rank != $next_rank)) {
        $img = new DerivativeImage('square', $srcImg);
        if ($img != null) {
	  $urls[] = $img->get_url();
        }
      }
    }
  if (count($urls)==0) {
    return;
  }

  // Retrieve existing prefetch list
  $curUrls = array();
  if ($is_automatic_size !== true) {
    // The PREFETCH url that's generated with automatic_size is wrong, so ignore it
    $curPrefetch = $template->smarty->getTemplateVars('U_PREFETCH');
    if ($curPrefetch != null) {
      $curUrls[] = $curPrefetch;
    }
  }
  $addUrls = $curUrls;
  foreach ($urls as $url) {
    if (array_search($url, $curUrls) === false) {
      $addUrls[] = $url;
    }
  }
  $template->assign('U_PREFETCH_ARRAY', $addUrls );
}

function Preload_header_prefilter($content, &$smarty)
{
  // Replace the single prefetch entry in the header with a list of prefetch URLs.
  // The template will use U_PREFETCH_ARRAY if set (even if over U_PREFETCH is also set),
  // then fall back to U_PREFETCH.
  return preg_replace('/^([[:space:]]*\{if isset\(\$U_PREFETCH\).*\{\/if\}[[:space:]]*)$/m',
		      '{if isset($U_PREFETCH_ARRAY)}

{foreach from=$U_PREFETCH_ARRAY item=link key=id}<link rel="prefetch" href="{$link}">
{/foreach}{else}\1{/if}',
		      $content);
}

function Preload_picture_prefilter($content, &$smarty)
{
  // Inject some extra javascript to force prefetching.
  return "{combine_script id='preload' require='jquery' load='header' path='plugins/Preload/js/preload.js'}
".$content;
}

?>
