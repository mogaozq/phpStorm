<?php
session_start();
header("Content-type: image/png");
$captchaChars = array();
$captchaString = "";
for ($i = 0; $i < 6; $i++) {
    $captchaChars[] = getRandomChar();
    $captchaString .= $captchaChars[$i];
}
$_SESSION['captcha'] = $captchaString;
$imgWidth = 50 * strlen($captchaString) + 30;
$imgHeight = 100;
$fontSize = 50;
$image = imagecreate($imgWidth, $imgHeight);
$white = imagecolorallocate($image, 255, 255, 255);
$x = 0;
foreach ($captchaChars as $char) {
    $color = imagecolorallocate($image, rand(0, 250), rand(0, 250), rand(0, 250));
    imagefttext($image, $fontSize, rand(-45, 45), 30 + $x, $imgHeight - 25, $color, "fonts/COOPBL.TTF", $char);
    $x += $fontSize - $fontSize / 10;
}
imagepng($image);

function getRandomChar()
{
    $item = rand(0, 2);
    switch ($item) {
        case 0;
            $ascii = rand(48, 57);
            break;
        case 1;
            $ascii = rand(65, 90);
            break;
        case 2;
            $ascii = rand(97, 122);
            break;
    }
    return chr($ascii);
}