<?php
defined('EASYCAPTCHA_ID') or die('Hacking attempt!');

function hex2rgb($hex)
{
  $hex = ltrim($hex, '#');

  if (strlen($hex) == 3)
  {
    $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
  }
  else if (strlen($hex) != 6)
  {
    return array(0,0,0);
  }

  $int = hexdec($hex);
  return array(0xFF&($int>>0x10), 0xFF&($int>>0x8), 0xFF&$int);
}

function imagecolorallocatehex(&$img, $hex)
{
  $rgb = hex2rgb($hex);
  return imagecolorallocate($img, $rgb[0], $rgb[1], $rgb[2]);
}

function imagegradientrectangle(&$img, $start, $end)
{
  $line_numbers = imagesx($img);
  $line_width = imagesy($img);

  list($r1,$g1,$b1) = $start;
  list($r2,$g2,$b2) = $end;
  list($r,$g,$b) = $end;

  $fill = imagecolorallocate($img, $r, $g, $b);

  for ($i=0; $i<$line_numbers; $i++)
  {
    $old_r = $r;
    $old_g = $g;
    $old_b = $b;

    $r = ( $r2 - $r1 != 0 ) ? intval( $r1 + ( $r2 - $r1 ) * ( $i / $line_numbers ) ): $r1;
    $g = ( $g2 - $g1 != 0 ) ? intval( $g1 + ( $g2 - $g1 ) * ( $i / $line_numbers ) ): $g1;
    $b = ( $b2 - $b1 != 0 ) ? intval( $b1 + ( $b2 - $b1 ) * ( $i / $line_numbers ) ): $b1;

    if ("$old_r $old_g $old_b" != "$r $g $b")
    {
      $fill = imagecolorallocate($img, $r, $g, $b);
    }
    imagefilledrectangle($img, 0, $i, $line_width, $i, $fill);
  }
}

function drawcircle(&$img, $pos, $color)
{
  global $conf, $props, $img_circle;

  if (!is_resource($img_circle))
  {
    $img_circle = imagecreatetruecolor($props['box_size'], $props['box_size']);

    $bg = imagecolorallocatehex($img_circle, $conf['EasyCaptcha']['tictac']['bg1']);
    $obj = imagecolorallocatehex($img_circle, $color);

    imagefilledrectangle($img_circle, 0, 0, $props['box_size'], $props['box_size'], $bg);
    imagecolortransparent($img_circle, $bg);

    $radius = $props['box_size'] - $props['pad']*2;
    $radius2 = $radius - 2*sqrt(2*$props['pad']*$props['pad']);

    imagefilledellipse($img_circle, $props['box_size']/2, $props['box_size']/2, $radius, $radius, $obj);
    imagefilledellipse($img_circle, $props['box_size']/2, $props['box_size']/2, $radius2, $radius2, $bg);
  }

  $pos = array(
    $pos[0]*($props['bd_size']+$props['box_size']) + $props['bd_size'],
    $pos[1]*($props['bd_size']+$props['box_size']) + $props['bd_size'],
    );

  imagecopymerge($img, $img_circle, $pos[0], $pos[1], 0, 0, $props['box_size'], $props['box_size'], 100);
}

function drawcross(&$img, $pos, $color)
{
  global $conf, $props, $img_cross;

  if (!is_resource($img_cross))
  {
    $img_cross = imagecreatetruecolor($props['box_size'], $props['box_size']);

    $bg = imagecolorallocatehex($img_cross, $conf['EasyCaptcha']['tictac']['bg1']);
    $obj = imagecolorallocatehex($img_cross, $color);

    imagefilledrectangle($img_cross, 0, 0, $props['box_size'], $props['box_size'], $bg);
    imagecolortransparent($img_cross, $bg);

    $points1 = array(
      $props['pad']*2,             $props['pad'],
      $props['box_size'] - $props['pad'],   $props['box_size'] - $props['pad']*2,
      $props['box_size'] - $props['pad']*2, $props['box_size'] - $props['pad'],
      $props['pad'],               $props['pad']*2,
      );

    $points2 = array(
      $props['box_size'] - $props['pad']*2, $props['pad'],
      $props['box_size'] - $props['pad'],   $props['pad']*2,
      $props['pad']*2,             $props['box_size'] - $props['pad'],
      $props['pad'],               $props['box_size'] - $props['pad']*2,
      );

    imagefilledpolygon($img_cross, $points1, 4, $obj);
    imagefilledpolygon($img_cross, $points2, 4, $obj);
  }

  $pos = array(
    $pos[0]*($props['bd_size']+$props['box_size']) + $props['bd_size'],
    $pos[1]*($props['bd_size']+$props['box_size']) + $props['bd_size'],
    );

  imagecopymerge($img, $img_cross, $pos[0], $pos[1], 0, 0, $props['box_size'], $props['box_size'], 100);
}

function checkline($pos, $existing)
{
  $existing[$pos[0]][$pos[1]] = true;

  // check col
  $nb = 0;
  for ($l=0; $l<3; $l++)
  {
    if (isset($existing[$pos[0]][$l])) $nb++;
  }
  if ($nb==3) return true;

  // check line
  $nb = 0;
  for ($c=0; $c<3; $c++)
  {
    if (isset($existing[$c][$pos[1]])) $nb++;
  }
  if ($nb==3) return true;

  // check diag 1
  $nb = 0;
  for ($i=0; $i<3; $i++)
  {
    if (isset($existing[$i][$i])) $nb++;
  }
  if ($nb==3) return true;

  // check diag 2
  $nb = 0;
  for ($i=0; $i<3; $i++)
  {
    if (isset($existing[$i][2-$i])) $nb++;
  }
  if ($nb==3) return true;

  return false;
}

function get_configs()
{
  return array(
    // line 1
    array(
      'checked' => array(array(0,0),array(0,1)),
      'answer' => array(0,2),
      ),
    array(
      'checked' => array(array(0,0),array(0,2)),
      'answer' => array(0,1),
      ),
    array(
      'checked' => array(array(0,1),array(0,2)),
      'answer' => array(0,0),
      ),
    // line 2
    array(
      'checked' => array(array(1,0),array(1,1)),
      'answer' => array(1,2),
      ),
    array(
      'checked' => array(array(1,0),array(1,2)),
      'answer' => array(1,1),
      ),
    array(
      'checked' => array(array(1,1),array(1,2)),
      'answer' => array(1,0),
      ),
    // line 3
    array(
      'checked' => array(array(2,0),array(2,1)),
      'answer' => array(2,2),
      ),
    array(
      'checked' => array(array(2,0),array(2,2)),
      'answer' => array(2,1),
      ),
    array(
      'checked' => array(array(2,1),array(2,2)),
      'answer' => array(2,0),
      ),
    // col 1
    array(
      'checked' => array(array(0,0),array(1,0)),
      'answer' => array(2,0),
      ),
    array(
      'checked' => array(array(0,0),array(2,0)),
      'answer' => array(1,0),
      ),
    array(
      'checked' => array(array(1,0),array(2,0)),
      'answer' => array(0,0),
      ),
    // col 2
    array(
      'checked' => array(array(0,1),array(1,1)),
      'answer' => array(2,1),
      ),
    array(
      'checked' => array(array(0,1),array(2,1)),
      'answer' => array(1,1),
      ),
    array(
      'checked' => array(array(1,1),array(2,1)),
      'answer' => array(0,1),
      ),
    // col 3
    array(
      'checked' => array(array(0,2),array(1,2)),
      'answer' => array(2,2),
      ),
    array(
      'checked' => array(array(0,2),array(2,2)),
      'answer' => array(1,2),
      ),
    array(
      'checked' => array(array(1,2),array(2,2)),
      'answer' => array(0,2),
      ),
    // diag 1
    array(
      'checked' => array(array(0,0),array(1,1)),
      'answer' => array(2,2),
      ),
    array(
      'checked' => array(array(0,0),array(2,2)),
      'answer' => array(1,1),
      ),
    array(
      'checked' => array(array(1,1),array(2,2)),
      'answer' => array(0,0),
      ),
    // diag 2
    array(
      'checked' => array(array(2,0),array(1,1)),
      'answer' => array(0,2),
      ),
    array(
      'checked' => array(array(2,0),array(0,2)),
      'answer' => array(1,1),
      ),
    array(
      'checked' => array(array(1,1),array(0,2)),
      'answer' => array(2,0),
      ),
    );
}