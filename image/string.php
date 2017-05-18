<?php

header("Content-Type: image/png");
$image = imagecreate(500, 500);
$white = imagecolorallocate($image, 255, 255, 255);
$red = imagecolorallocate($image, 255, 0, 0);
$blue = imagecolorallocate($image, 0, 0, 255);
$green = imagecolorallocate($image, 0, 255, 0);
imagestring($image, 4, 10, 10, "mohammad barbast", $red);
imagefttext($image, 20, -30, 20, 20, $blue, "fonts/COOPBL.TTF", "mohammad barbast");
imagepng($image);
imagedestroy($image);