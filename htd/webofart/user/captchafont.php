<?php
	 // session_start();
     header ("Content-type: image/png");
	 
$text = rand(10000,99999); 
	 setcookie("Captcha",$text,time()+(86400*30),"/");
$font  = 10;
$width  = imagefontwidth($font) * strlen($text)*1.5;
$height = imagefontheight($font)*2;

$image = imagecreatetruecolor ($width,$height);
$white = imagecolorallocate ($image, 20, 100, 150);
$black = imagecolorallocate ($image, 200, 230, 250);
imagefill($image,0,0,$white);

imagestring ($image,$font,10,8,$text,$black);

imagepng ($image);
 
?>

