<?php
/**
 * Project:     Securimage: A PHP class for creating and managing form CAPTCHA images
 * File:        securimage_show.php
 *
 * Copyright (c) 2011, Drew Phillips
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 * 
 *  - Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *  - Redistributions in binary form must reproduce the above copyright notice,
 *    this list of conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * Any modifications to the library should be indicated clearly in the source code
 * to inform users that the changes are not a part of the original software.
 *
 * If you found this script useful, please take a quick moment to rate it.
 * http://www.hotscripts.com/rate/49400.html  Thanks.
 *
 * @link http://www.phpcaptcha.org Securimage PHP CAPTCHA
 * @link http://www.phpcaptcha.org/latest.zip Download Latest Version
 * @link http://www.phpcaptcha.org/Securimage_Docs/ Online Documentation
 * @copyright 2011 Drew Phillips
 * @author Drew Phillips <drew@drew-phillips.com>
 * @version 3.0 (October 2011)
 * @package Securimage
 *
 */

define('PHPWG_ROOT_PATH','../../../');
include_once(PHPWG_ROOT_PATH.'include/common.inc.php');


// randomize colors
function randomColor()
{
  mt_srand((double)microtime()*1000000);
  $c = null;
  while(strlen($c)<6)
  {
      $c .= sprintf("%02X", mt_rand(0, 255));
  }
  return $c;
}

foreach (array('bg_color','text_color','line_color','noise_color') as $color)
{
  if ($conf['cryptographp'][$color] == 'random') $conf['cryptographp'][$color] = randomColor();
}


require_once dirname(__FILE__) . '/securimage.php';
$img = new securimage();

$img->ttf_file        = './fonts/'.$conf['cryptographp']['ttf_file'].'.ttf';
$img->captcha_type    = ($conf['cryptographp']['captcha_type'] == 'string') ? Securimage::SI_CAPTCHA_STRING : Securimage::SI_CAPTCHA_MATHEMATIC;
// $img->case_sensitive  = get_boolean($conf['cryptographp']['case_sensitive']);
$img->image_width     = $conf['cryptographp']['width']; 
$img->image_height    = $conf['cryptographp']['height'];
$img->perturbation    = $conf['cryptographp']['perturbation'];
$img->text_color      = new Securimage_Color('#'.$conf['cryptographp']['text_color']); 
$img->num_lines       = $conf['cryptographp']['num_lines'];
$img->line_color      = new Securimage_Color('#'.$conf['cryptographp']['line_color']);
$img->noise_level     = $conf['cryptographp']['noise_level'];
$img->noise_color     = new Securimage_Color('#'.$conf['cryptographp']['noise_color']);
$img->code_length     = $conf['cryptographp']['code_length'];

if ($conf['cryptographp']['background'] == 'image')
{
  if ($conf['cryptographp']['bg_image'] == 'random')
  {
    $img->background_directory = realpath(CRYPTO_PATH . 'securimage/backgrounds/');
    $img->show();
  }
  else
  {
    $img->show(realpath(CRYPTO_PATH . 'securimage/backgrounds/' . $conf['cryptographp']['bg_image']));
  }
}
else
{
  $img->image_bg_color  = new Securimage_Color('#'.$conf['cryptographp']['bg_color']);
  $img->show();
}
