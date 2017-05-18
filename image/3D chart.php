<?php
header("Content-Type: image/png");
$image = imagecreate(500, 500);
$white = imagecolorallocate($image, 255, 255, 255);
$red = imagecolorallocate($image, 255, 0, 0);
$blue = imagecolorallocate($image, 0, 0, 255);
$green = imagecolorallocate($image, 0, 255, 0);

$red2 = imagecolorallocate($image, 200, 50, 50);
$blue2 = imagecolorallocate($image, 50, 50, 200);
$green2 = imagecolorallocate($image, 50, 200, 50);
for ($i = 0; $i < 10; $i++) {
    imagefilledarc($image, 255, 255 - $i, 200, 100, 0, 20, $red, IMG_ARC_PIE);
    imagefilledarc($image, 255, 255 - $i, 200, 100, 20, 80, $blue, IMG_ARC_PIE);
    imagefilledarc($image, 255, 255 - $i, 200, 100, 80, 360, $green, IMG_ARC_PIE);
}
imagefilledarc($image, 255, 255 - 10, 200, 100, 0, 20, $red, IMG_ARC_PIE);
imagefilledarc($image, 255, 255 - 10, 200, 100, 20, 80, $blue2, IMG_ARC_PIE);
imagefilledarc($image, 255, 255 - 10, 200, 100, 80, 360, $green2, IMG_ARC_PIE);
imagepng($image);
imagepng($image, "images/pic.png");
imagedestroy($image);