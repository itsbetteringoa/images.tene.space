<?php
defined('EASYCAPTCHA_ID') or die('Hacking attempt!');

/*
 * crypt the name of an image, it use the Piwigo secret_key
 * and a random salt to prevent attacker to build a dictionnary
 */
function easycaptcha_encode_image_url($name)
{
  global $conf, $easycaptcha_uniqid;

  if (empty($easycaptcha_uniqid))
  {
    $easycaptcha_uniqid = uniqid(null, true);
  }

  $name.= '-'. $easycaptcha_uniqid;
  $name = simple_crypt($name, $conf['secret_key']);

  return $name;
}

/*
 * decrypt the image name
 */
function easycaptcha_decode_image_url($name)
{
  global $conf;

  $name = simple_decrypt($name, $conf['secret_key']);
  $name = strtok($name, '-');

  return $name;
}

/**
 * crypt a string using
 * http://stackoverflow.com/questions/800922/how-to-encrypt-string-without-mcrypt-library-in-php/802957#802957
 * @param: string value to crypt
 * @param: string key
 * @return: string
 */
function simple_crypt($value, $key)
{
  $result = null;
  for($i = 0; $i < strlen($value); $i++)
  {
    $char = substr($value, $i, 1);
    $keychar = substr($key, ($i % strlen($key))-1, 1);
    $char = chr(ord($char) + ord($keychar));
    $result .= $char;
  }

  $result = base64url_encode($result);
  return trim($result);
}

/**
 * decrypt a string crypted with previous function
 * @param: string value to decrypt
 * @param: string key
 * @return: string
 */
function simple_decrypt($value, $key)
{
  $value = base64url_decode($value);

  $result = null;
  for($i = 0; $i < strlen($value); $i++)
  {
    $char = substr($value, $i, 1);
    $keychar = substr($key, ($i % strlen($key))-1, 1);
    $char = chr(ord($char) - ord($keychar));
    $result .= $char;
  }

  return trim($result);
}

/**
 * variant of base64 functions usable into url
 * http://php.net/manual/en/function.base64-encode.php#103849
 */
if (!function_exists('base64url_encode'))
{
  function base64url_encode($data)
  {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
  }
  function base64url_decode($data)
  {
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
  }
}