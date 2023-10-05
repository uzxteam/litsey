<?php
header("Content-Type:text/css");

function checkhexcolor($color){
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if (isset($_GET['color']) AND $_GET['color'] != '') {
    $color = "#" . $_GET['color'];
}

function hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);
 
    if(strlen($hex) == 3) {
       $r = hexdec(substr($hex,0,1).substr($hex,0,1));
       $g = hexdec(substr($hex,1,1).substr($hex,1,1));
       $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
       $r = hexdec(substr($hex,0,2));
       $g = hexdec(substr($hex,2,2));
       $b = hexdec(substr($hex,4,2));
    }
    $rgb = array($r, $g, $b);
    return $rgb;
 }
 function rgb2hsl($r, $g, $b) {
    $oldR = $r;
    $oldG = $g;
    $oldB = $b;
    $r /= 255;
    $g /= 255;
    $b /= 255;
    $max = max($r, $g, $b);
    $min = min($r, $g, $b);
    $h;
    $s;
    $l = ($max + $min) / 2;
    $d = $max - $min;
    if($d == 0) {
       $h = $s = 0;
    } else {
       $s = $d / (1 - abs(2 * $l - 1));
       switch($max) {
          case $r:
             $h = 60 * fmod((($g - $b) / $d), 6);
             if ($b > $g) {
               $h += 360;
             }
             break;
          case $g:
             $h = 60 * (($b - $r) / $d + 2);
             break;
          case $b:
             $h = 60 * (($r - $g) / $d + 4);
             break;
       }
    }
    return array(round($h, 0), round($s*100, 0), round($l*100, 0));
 }

 $rgb = hex2rgb($color);
 $hsl = rgb2hsl($rgb[0], $rgb[1], $rgb[2]);
?>


:root{
    --base-h: <?php echo $hsl[0]; ?>;
    --base-s: <?php echo $hsl[1].'%'; ?>;
    --base-l: <?php echo $hsl[2].'%'; ?>;
} 