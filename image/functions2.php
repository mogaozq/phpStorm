<?php
$image = imagecreatefromjpeg("images/picture.jpg");
$image2 = imagecreatefromjpeg("images/picture.jpg");
//echo imagesx($image) . " * " . imagesy($image);
//$color = imagecolorat($image, 1000, 1000);
//imagecolortransparent($image, $color);
//imagepng($image, "images/picture(modified).jpg");
imagecopy($image2, $image, 10, 10, 1000, 1000, 1000, 1000);
imagecopymerge($image2, $image, 10, 500, 1000, 100, 1000, 1000, 50);
imagecopyresized($image2, $image, 10, 1000, 1000, 1000, 100, 100, 1000, 1000);
imagecopyresampled($image2, $image, 10, 1110, 1000, 1000, 100, 100, 1000, 1000);//slower but better quality
imagepng($image2, "images/picture(modified2).jpg");


