<?php
defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

class sharethis_maintain extends PluginMaintain {

  private $default_conf = array(
    'facebook'   => false,
    'pinterest'  => false,
    'twitter'    => false,
    'googleplus' => false,
    'tumblr'     => false
  );

  function __construct($plugin_id) {
    parent::__construct($plugin_id); // always call parent constructor
  }

  /**** Plugin installation */
  function install($plugin_version, &$errors=array()) {
    global $conf;

    // add config parameter
    if (empty($conf['sharethis'])):
      conf_update_param('sharethis', $this->default_conf, true);
    else:
      $old_conf = safe_unserialize($conf['sharethis']);

      foreach ($this->default_conf as $key => $value):
        if (array_key_exists($key, $old_conf)):
        else:
          $old_conf[$key] = $value;
        endif;
      endforeach;

      conf_update_param('sharethis', $old_conf, true);
    endif;
  }

  /**** Plugin activation */
  function activate($plugin_version, &$errors=array()) { }

  /**** Plugin deactivation */
  function deactivate() { }

  /**** Plugin (auto)update */
  function update($old_version, $new_version, &$errors=array()) {
    $this->install($new_version, $errors);
  }

  /**** Plugin uninstallation */
  function uninstall() {
    // delete configuration
    conf_delete_param('sharethis');
  }
}