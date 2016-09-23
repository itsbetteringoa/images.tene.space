<?php
defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

class EasyCaptcha_maintain extends PluginMaintain
{
  function install($plugin_version, &$errors=array())
  {
    global $conf;

    if (empty($conf['EasyCaptcha']))
    {
      $default_config = array(
        'activate_on' => array(
          'picture'     => true,
          'category'    => true,
          'register'    => true,
          'contactform' => true,
          'guestbook'   => true,
          ),
        'comments_action' => 'reject',
        'guest_only'      => true,
        'challenge' => 'random',
        'drag' => array(
          'theme' => 'icons',
          'size'  => 50,
          'nb'    => 5,
          'bg1'   => '#F7F7F7',
          'bg2'   => '#E5E5E5',
          'obj'   => '#FFFFFF',
          'sel'   => '#C8FF96',
          'bd1'   => '#DDDDDD',
          'bd2'   => '#555555',
          'txt'   => '#222222',
          ),
        'tictac' => array(
          'size'  => 128,
          'bg1'   => '#F7F7F7',
          'bg2'   => '#E5E5E5',
          'bd'    => '#DDDDDD',
          'obj'   => '#00B4F7',
          'sel'   => '#F7B400',
          ),
        'lastmod' => time(),
        );

      conf_update_param('EasyCaptcha', $default_config, true);
    }
    else
    {
      $old_conf = safe_unserialize($conf['EasyCaptcha']);

      if (empty($old_conf['lastmod']))
      {
        $old_conf['lastmod'] = time();
      }
      if (!isset($old_conf['guest_only']))
      {
        $old_conf['guest_only'] = true;
      }

      conf_update_param('EasyCaptcha', $old_conf, true);
    }
  }

  function update($old_version, $new_version, &$errors=array())
  {
    $this->install($new_version, $errors);
  }

  function uninstall()
  {
    conf_delete_param('EasyCaptcha');
  }
}