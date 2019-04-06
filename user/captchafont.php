<?php
	 // session_start();
     header ("Content-type: image/png");
	 
	 // $text = rand(10000,99999); 
	 $text = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
	 setcookie("Captcha",$text,time()+(86400*30),"/");
	 // $_SESSION["vercode"] = $text;
	 $font  = 'KGMakesYouStronger.ttf';
	
     $im = ImageCreate(100,45);
     $grey = ImageColorAllocate($im, 20, 100, 150);
     $black = ImageColorAllocate($im, 200, 230, 250);
   
     ImageTTFText($im, 25, 7, 12, 36, $black, $font,$text);
     ImagePng($im);
     ImageDestroy($im); 
?>

