<?php
defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

class polaroid_maintain extends PluginMaintain
{
  private $installed = false;

  function __construct($plugin_id)
  {
    parent::__construct($plugin_id);
  }

  function install($plugin_version, &$errors=array())
  {
    global $conf;
    
    // add a new column to existing table
    $result = pwg_query('SHOW COLUMNS FROM `'.CATEGORIES_TABLE.'` LIKE "polaroid_active";');
    if (!pwg_db_num_rows($result))
    {
      pwg_query('ALTER TABLE `'.CATEGORIES_TABLE.'` ADD `polaroid_active` enum(\'true\', \'false\') default \'false\';');
    }

    $config = array(
      'apply_to_albums' => 'all',
      );

    // load existing config parameters
    if (!empty($conf['polaroid']))
    {
      $conf['polaroid'] = safe_unserialize($conf['polaroid']);

      foreach ($conf['polaroid'] as $key => $value)
      {
        $config[$key] = $value;
      }
    }
    
    conf_update_param('polaroid', $config, true);
    
    $this->installed = true;
  }

  function activate($plugin_version, &$errors=array())
  {
    global $prefixeTable;
    
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
    // delete field
    pwg_query('ALTER TABLE `'. CATEGORIES_TABLE .'` DROP COLUMN polaroid_active;');
  }
}
?>
