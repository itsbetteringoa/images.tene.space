<?php
defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

class download_permissions_maintain extends PluginMaintain
{
  private $installed = false;

  function __construct($plugin_id)
  {
    parent::__construct($plugin_id);
  }

  function install($plugin_version, &$errors=array())
  {
    // create categories.downloadable (true/false)
    $result = pwg_query('SHOW COLUMNS FROM `'.CATEGORIES_TABLE.'` LIKE "downloadable";');
    if (!pwg_db_num_rows($result))
    {
      pwg_query('ALTER TABLE `'.CATEGORIES_TABLE.'` ADD `downloadable` enum("true", "false") DEFAULT "true";');
    }

    $this->installed = true;
  }

  function activate($plugin_version, &$errors=array())
  {
    if (!$this->installed)
    {
      $this->install($plugin_version, $errors);
    }
  }

  function update($old_version, $new_version, &$errors=array())
  {
    $this->install($new_version, $errors);
  }

  function deactivate()
  {
  }

  function uninstall()
  {
    pwg_query('ALTER TABLE '.CATEGORIES_TABLE.' DROP COLUMN downloadable;');
  }
}
