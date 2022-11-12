<?php

// $testGD = get_extension_funcs("gd"); // Grab function list 
// if (!$testGD){ echo "GD not even installed."; exit; }
// echo"<pre>".print_r($testGD,true)."</pre>";

// We start a session to access
// the captcha externally!
session_start();

// Generate a random number
// from 1000-9999
$captcha = rand(11111, 99999);

// The captcha will be stored
// for the session
$_SESSION["captcha"] = $captcha;

// Generate a 50x24 standard captcha image
$im = imagecreatetruecolor(90, 30);

// Black color for captcha text
$black = imagecolorallocate($im, 0, 0, 0);

// White color for captcha background
$white = imagecolorallocate($im, 255, 160, 120);

// Give the image a white background
imagefill($im, 0, 0, $white);

// Print the captcha text in the image
// with random position & size
imagestring($im, 5,5,5, $captcha, $black); //imagestring(image,font-size,x-pos,y-pos,string,color)

// The PHP-file will be rendered as image
header('Content-type: image/png');

// Finally output the captcha as
// PNG image the browser
imagejpeg($im);

// Free memory
imagedestroy($im);
?>