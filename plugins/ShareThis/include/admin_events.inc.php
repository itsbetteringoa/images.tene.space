<?php
defined('SHARETHIS_PATH') or die('Hacking attempt!');

/**
 * admin plugins menu link
 */
function sharethis_admin_plugin_menu_links($menu)
{
  $menu[] = array(
    'NAME' => l10n('ShareThis'),
    'URL' => SHARETHIS_ADMIN,
    );

  return $menu;
}

