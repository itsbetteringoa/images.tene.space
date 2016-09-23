<?php
define('PHPWG_ROOT_PATH', '../../../');
include(PHPWG_ROOT_PATH . 'include/common.inc.php');

defined('EASYCAPTCHA_ID') or die('Hacking attempt!');
include_once(EASYCAPTCHA_PATH . 'drag/functions_drag.inc.php');

if (count($_GET) != 2) die('Hacking attempt!');

list($theme, $image) = array_keys($_GET);

$image = easycaptcha_decode_image_url($image);

if (@file_exists(EASYCAPTCHA_PATH.'drag/'.$theme.'/'.$image))
{
  $ext = get_extension($image);
  if ($ext == 'jpg') $ext = 'jpeg';

  header('Content-Type: image/'.$ext);
  readfile(EASYCAPTCHA_PATH.'drag/'.$theme.'/'.$image);
}