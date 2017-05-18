<?php
header("Content-Type: image/png");
//$image = imagecreate(300, 200);
$image = imagecreatetruecolor(300, 200);
$white = imagecolorallocate($image, 255, 255, 255);
$red = imagecolorallocate($image, 255, 0, 0);
$blue = imagecolorallocate($image, 0, 0, 255);
$green = imagecolorallocate($image, 0, 255, 0);
$transparentGreen = imagecolorallocatealpha($image, 0, 255, 0, 100);
imagefill($image, 27, 28, $white);
imagesetpixel($image, 2, 2, $green);
imageline($image, 5, 5, 30, 30, $red);
imagerectangle($image, 10, 10, 30, 30, $red);
imageellipse($image, 30, 30, 50, 50, $blue);
imagefilledellipse($image, 10, 5, 100, 100, $transparentGreen);
imagefilledarc($image, 50, 50, 100, 50, 0, 90, $green, IMG_ARC_PIE);
imagepolygon($image, array(10, 100, 20, 20, 50, 30), 3, $green);
imagefill($image, 27, 28, $blue);

imagepng($image, "images/pic.png");//save to file
imagejpeg($image, 'images/pic.jpg', 100);
imagepng($image);// output image
imagedestroy($image);