<?php
define('PHPWG_ROOT_PATH', '../../../');
include(PHPWG_ROOT_PATH . 'include/common.inc.php');

defined('EASYCAPTCHA_ID') or die('Hacking attempt!');
include_once(EASYCAPTCHA_PATH . 'tictac/functions_tictac.inc.php');

$props = array();

// special size when asking for cross only
$props['size'] = isset($_GET['cross']) ? intval($_GET['cross']) : $conf['EasyCaptcha']['tictac']['size'];

// compute various sizes
$props['bd_size'] = max(1, floor($props['size']*0.01));
$props['box_size'] = floor(($props['size']-4*$props['bd_size'])/3);
$props['size'] = 3*$props['box_size'] + 4*$props['bd_size'] + 1;
$props['pad'] = floor($props['box_size']*0.1);
$props['radius'] = floor($props['box_size']*0.2);


// return cross only
if (isset($_GET['cross']))
{
  $props['bd_size']/= 2;

  $img = imagecreatetruecolor($props['box_size'], $props['box_size']);
  imageantialias($img, true);

  $bg = imagecolorallocatehex($img, $conf['EasyCaptcha']['tictac']['bg1']);

  imagefilledrectangle($img, 0, 0, $props['box_size'], $props['box_size'], $bg);
  imagecolortransparent($img, $bg);

  drawcross($img, array(0,0), $conf['EasyCaptcha']['tictac']['sel']);

  header('Content-Type: image/png');
  imagepng($img);
  exit;
}


// pick a random config
$configs = get_configs();
$selection = $configs[ array_rand($configs) ];
pwg_set_session_var('easycaptcha', implode('', $selection['answer']));


// create image
$img = imagecreatetruecolor($props['size'], $props['size']);
imageantialias($img, true);

// background
$bg_start = hex2rgb($conf['EasyCaptcha']['tictac']['bg1']);
$bg_end = hex2rgb($conf['EasyCaptcha']['tictac']['bg2']);

imagegradientrectangle($img, $bg_start , $bg_end);
// $bg = imagecolorallocatehex($img, $conf['EasyCaptcha']['tictac']['bg1']);
// imagefilledrectangle($img, 0, 0, $props['size'], $props['size'], $bg);

// borders
$bd = imagecolorallocatehex($img, $conf['EasyCaptcha']['tictac']['bd']);
for ($i=0; $i<4; $i++)
{
  imagefilledrectangle($img, $i*($props['box_size']+$props['bd_size']), 0, $i*($props['box_size']+$props['bd_size'])+$props['bd_size'], $props['size'], $bd);
  imagefilledrectangle($img, 0, $i*($props['box_size']+$props['bd_size']), $props['size'], $i*($props['box_size']+$props['bd_size'])+$props['bd_size'], $bd);
}

// crosses
foreach ($selection['checked'] as $pos)
{
  drawcross($img, $pos, $conf['EasyCaptcha']['tictac']['obj']);
}

// circles
$protect = $selection['checked'];
$protect[] = $selection['answer'];
$i = rand(2,4);
$circles = array();

while ($i>0)
{
  $pos = array(rand(0, 2), rand(0, 2));

  foreach ($protect as $pro)
  {
    if ($pos[0]==$pro[0] && $pos[1]==$pro[1]) continue(2);
  }
  if (checkline($pos, $circles)) continue;

  $protect[] = $pos;
  $circles[$pos[0]][$pos[1]] = true;

  drawcircle($img, $pos, $conf['EasyCaptcha']['tictac']['obj']);
  $i--;
}


// output
header('Content-Type: image/png');
imagepng($img);