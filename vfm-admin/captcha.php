<?php
/**
 * VFM - veno file manager: captcha.php
 *
 * PHP version >= 5.3
 *
 * @category  PHP
 * @package   VenoFileManager
 * @author    Nicola Franchini <support@veno.it>
 * @copyright 2013 Nicola Franchini
 * @license   Exclusively sold on CodeCanyon: http://bit.ly/veno-file-manager
 * @link      http://filemanager.veno.it/
 */
require 'config.php';
session_name($_CONFIG["session_name"]);
session_start();
header("Expires: Tue, 01 Jan 2013 00:00:00 GMT"); 
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

function rand_str($length) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $str = '';
    for($i = 0; $i < $length; $i++){
        $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
}

function rand_color($image){
    return imagecolorallocate($image, rand(127, 255), rand(127, 255), rand(127, 255));
}

$image = imagecreate(90, 34);
imagecolorallocate($image, 0, 0, 0);
for ($i=0; $i <= 9; $i++) {
    imageline($image, rand(0, 92), rand(0, 50), rand(0, 92), rand(0, 50), rand_color($image));
}
for ($i=0; $i <= 100; $i++) {
    imagesetpixel($image, rand(0, 92), rand(0, 50), rand_color($image));
}
$length = 4;
$str = rand_str($length);
$font = 'C:\Windows\Fonts\simhei.ttf';
$_SESSION['captcha'] = strtolower($str);
for ($i=0; $i < $length; $i++) {
    imagettftext($image, rand(14, 18), rand(0, 60), $i*18+9, rand(15,25), rand_color($image), $font, $str[$i]);
}

header('Content-type:image/jpeg');
imagejpeg($image);
imagedestroy($image);
