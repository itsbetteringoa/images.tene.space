<?php
/*
Plugin Name: ShareThis
Version: 1.0.4
Description: Add "Share This" functionality to your site
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=793
Author: Serguei Dosyukov
Author URI: http://blog.dragonsoft.us
*/

defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

// +-----------------------------------------------------------------------+
// | Define plugin constants                                               |
// +-----------------------------------------------------------------------+

define('SHARETHIS_VERSION', '1.0.4');
define('SHARETHIS_ID',      basename(dirname(__FILE__)));
define('SHARETHIS_PATH' ,   PHPWG_PLUGINS_PATH . SHARETHIS_ID . '/');
define('SHARETHIS_ADMIN',   get_root_url() . 'admin.php?page=plugin-' . SHARETHIS_ID);
define('SHARETHIS_PUBLIC',  get_absolute_root_url() . make_index_url(array('section' => 'sharethis')) . '/');
define('SHARETHIS_DIR',     PHPWG_ROOT_PATH . PWG_LOCAL_DIR . 'sharethis/');
if (!defined('GDTHEME_PATH')):
  define('GDTHEME_PATH' ,   PHPWG_THEMES_PATH . 'greydragon/');
endif;

// +-----------------------------------------------------------------------+
// | Add event handlers                                                    |
// +-----------------------------------------------------------------------+
// init the plugin
add_event_handler('init', 'sharethis_init');

/*
 * this is the common way to define event functions: create a new function for each event you want to handle
 */
if (defined('IN_ADMIN')):
  // file containing all admin handlers functions
  $admin_file = SHARETHIS_PATH . 'include/admin_events.inc.php';

  // admin plugins menu link
  add_event_handler('get_admin_plugin_menu_links', 'sharethis_admin_plugin_menu_links', EVENT_HANDLER_PRIORITY_NEUTRAL, $admin_file);
endif;

function sharethis_init() {
  global $conf;

  // prepare plugin configuration
  $conf['sharethis'] = safe_unserialize($conf['sharethis']);
  if ($conf['sharethis']['facebook'] || $conf['sharethis']['pinterest'] || $conf['sharethis']['twitter'] || $conf['sharethis']['googleplus'] || $conf['sharethis']['tumblr']):
    add_event_handler('loc_begin_picture', 'sharethis_picture_handler');
  endif;                                                                                                                                    
}

function sharethis_picture_handler()
{
  global $template, $conf, $current;

  if ($template->get_themeconf("name") == "greydragon"):
    add_event_handler('gd_get_metadata', 'sharethis_get_tab_metadata');
  else:
    $template->set_prefilter('picture', 'sharethis_append_content');
  endif;
  load_language('plugin.lang', SHARETHIS_PATH);

  $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
  $host     = $_SERVER['HTTP_HOST'];
  $script   = $_SERVER['SCRIPT_NAME'];
  $params   = $_SERVER['QUERY_STRING'];
  $curUrl   = $protocol . '://' . $host . $script . '?' . $params;

  $template->assign(
    array(
      'sharethis_facebook'   => $conf['sharethis']['facebook'],
      'sharethis_pinterest'  => $conf['sharethis']['pinterest'],
      'sharethis_twitter'    => $conf['sharethis']['twitter'],
      'sharethis_googleplus' => $conf['sharethis']['googleplus'],
      'sharethis_tumblr'     => $conf['sharethis']['tumblr'],
      'SHARETHIS_PATH'       => SHARETHIS_PATH,
      'CUR_PAGE'             => $curUrl
    ));

}

function sharethis_get_tab_metadata($metadata) {
  // pinterest &media=<logo>

  $url   = '{$CUR_PAGE|escape:\'url\'}';
  $image = '{if $current.selected_derivative}{$U_HOME|escape:\'url\'}{"/"|escape:\'url\'}{$current.selected_derivative->get_url()|escape:\'url\'}{/if}';
  $title = '{$GALLERY_TITLE|escape:\'url\'}{" | "|escape:\'url\'}{$PAGE_TITLE|escape:\'url\'}{if $current->author}{" | by "|escape:\'url\'}{$current->author|escape:\'url\'}{/if}';
  $content = '{$CONTENT_DESCRIPTION|urlencode}';

  $metadata[] = array(
    "id"          => "sharethis",
    "icon_class"  => "fa fa-share-alt",
    "title"       => "{'Share This'|@translate}",
    "content"     => '<span>{\'Share This\'|@translate}:</span>'
                       . '{html_head}<!-- START OPEN GRAPH TAGS-->{"\n"}'
                       . '<meta property="og:title" content="{$GALLERY_TITLE} | {$PAGE_TITLE}{if $current->author} | by {$current->author}{/if}" />{"\n"}'
                       . '<meta property="og:type" content="article" />{"\n"}'
                       . '<meta property="og:url" content="{$CUR_PAGE}" />{"\n"}'
                       . '{if $current.selected_derivative}<meta property="og:image" content="{$U_HOME}/{$current.selected_derivative->get_url()}" />{"\n"}{/if}'
                       . '<meta property="og:description" content="{$CONTENT_DESCRIPTION}" />{"\n"}'
                       . '<!-- END OPEN GRAPH TAGS-->{"\n"}' 
                       . '{if $sharethis_pinterest}<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>{/if}'
                       . '{/html_head}'

                   . '{if $sharethis_facebook}<a href="http://www.facebook.com/sharer/sharer.php?p[url]=' . $url . '{if $current.selected_derivative}&amp;p[images][0]=' . $image . '{/if}&amp;p[summary]=' . $content . '" onclick="window.open(this.href, \'\', \'toolbar=0,status=0,width=700,height=500\'); return false;" title="{\'Share on Facebook\'|@translate}" target="_blank"><i class="fa fa-facebook-square"></i> <span>{\'Facebook\'|@translate}</span></a>{/if}'
                   . '{if $sharethis_pinterest}<a href="http://pinterest.com/pin/create/button/?url=' . $url . '&media=' . $image . '&description=' . $title . '" title="{\'Share on Pinterest\'|@translate}" target="_blank" data-pin-do="none" data-pin-config="none"><i class="fa fa-pinterest"></i> <span>{\'Pinterest\'|@translate}</span></a>{/if}'
                   . '{if $sharethis_twitter}<a href="https://twitter.com/intent/tweet?text=' . $title . '&url=' . $url .'" title="{\'Share on Twitter\'|@translate}" target="_blank"><i class="fa fa-twitter"></i> <span>{\'Twitter\'|@translate}</span></a>{/if}'
                   . '{if $sharethis_googleplus}<a href="https://plus.google.com/share?url=' . $url . '" title="{\'Share on Google+\'|@translate}" target="_blank" onclick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;"><i class="fa fa-google-plus-square"></i> <span>{\'Google+\'|@translate}</span></a>{/if}'
                   . '{if $sharethis_tumblr}<a href="http://www.tumblr.com/share/photo?source=' . $image . '&caption=' . $title . '&click_thru=' . $url . '" title="{\'Share on Tumblr\'|@translate}" target="_blank"><i class="fa fa-tumblr"></i> <span>{\'Tumblr\'|@translate}</span></a>{/if}',

    "combine"     => '{combine_css id=\'fa\' path=$SHARETHIS_PATH|cat:"/css/font-awesome.min.css"}'                                                                                                            
                   . '{combine_css id=\'sharethis\' path=$SHARETHIS_PATH|cat:"/css/styles.css"}',
    "no_overlay"  => TRUE
  );
  return $metadata;
}

function sharethis_append_content($tpl_source, &$smarty){

  $metadata = array();
  $metadata = sharethis_get_tab_metadata($metadata);

  $pattern = '#<div id=\"imageTitle\".*>#';

  if (!preg_match($pattern, $tpl_source)):
    $pattern = '#<div id=\"imageInfos\".*>#';
    $replacement = '$0
      <dl class="imageInfoTable" id="static-sharethis" >
      ' . $metadata[0]["content"] . '
      </dl>
      ' . $metadata[0]["combine"] . '
          
    ';
  else:
    $replacement = '
      <div id="static-sharethis">
      ' . $metadata[0]["content"] . '
      </div>
      ' . $metadata[0]["combine"] . '
      $0    
    ';
  endif;

  return preg_replace($pattern, $replacement, $tpl_source, 1);
}
