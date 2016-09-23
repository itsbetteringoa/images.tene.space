<?php
defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

class CryptograPHP_maintain extends PluginMaintain
{
  function install($plugin_version, &$errors=array())
  {
    global $conf;
    
    if (isset($conf['cryptograph_theme']))
    {
      conf_delete_param('cryptograph_theme');
    }
    
    if (empty($conf['cryptographp']))
    {
      $default_config = array(
        'activate_on'     => array(
          'picture'     => true,
          'category'    => true,
          'register'    => true,
          'contactform' => true,
          'guestbook'   => true,
          ),
        'comments_action' => 'reject',
        'guest_only'      => true,
        'theme'           => 'gray',
        'captcha_type'    => 'string',
        'case_sensitive'  => 'false',
        'code_length'     => 6,
        'width'           => 180, 
        'height'          => 70,
        'perturbation'    => 1,
        'background'      => 'color',
        'bg_color'        => 'ffffff', 
        'bg_image'        => '', 
        'text_color'      => '8a8a8a', 
        'num_lines'       => 2, 
        'line_color'      => '8a8a8a', 
        'noise_level'     => 0.1, 
        'noise_color'     => '8a8a8a', 
        'ttf_file'        => 'TopSecret',
        'button_color'    => 'dark',
        );
    
      conf_update_param('cryptographp', $default_config, true);
    }
    else
    {
      $old_conf = safe_unserialize($conf['cryptographp']);
      
      if (!isset($old_conf['activate_on']))
      {
        $old_conf['activate_on'] = array(
          'picture'     => $old_conf['comments_action'] != 'inactive',
          'category'    => $old_conf['comments_action'] != 'inactive',
          'register'    => true,
          'contactform' => true,
          'guestbook'   => true,
          );
      }
      if (!isset($old_conf['button_color']))
      {
        $old_conf['button_color'] = 'dark';
      }
      if (!isset($old_conf['background']))
      {
        $old_conf['background'] = 'color';
        $old_conf['bg_color'] = $old_conf['image_bg_color'];
        $old_conf['bg_image'] = '';
        unset($old_conf['image_bg_color']);
      }
      if (!isset($old_conf['guest_only']))
      {
        $old_conf['guest_only'] = true;
      }
      
      conf_update_param('cryptographp', $old_conf, true);
    }
  }

  function update($old_version, $new_version, &$errors=array())
  {
    $this->install($new_version, $errors);
  }

  function uninstall()
  {
    conf_delete_param('cryptographp');
  }
}