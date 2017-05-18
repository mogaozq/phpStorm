<?php
header("Content-Type: image/png");
$image = imagecreate(500, 500);
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
for ($i = 0; $i < 5000; $i++) {
    imagesetpixel($image, $i / 5, (sin($i / 100) * 100) + 100, $black);
}
imagepng($image);
imagedestroy($image);