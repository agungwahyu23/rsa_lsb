<?php

// $image = "stegano/sample_640×426.png";
// $noisyImage = "stegano/LSB-1bit_sample_640×426.png";

// $width = imagesx($image);
// $height = imagesy($image);

// for($x = 0; $x < $width; $x++) {
//     for($y = 0; $y < $height; $y++) {
//         // pixel color at (x, y)
//         $color = imagecolorat($image, $x, $y);
//     }
// }

// var_dump($color);

// $im = imagecreatefrompng("stegano/sample_640×426.png");
// $width = imagesx($im);
// $height = imagesy($im);
// $r = $g =$b = 0;

// for ($i=0; $i < $width ; $i++) { 
//     for ($j=0; $j < $height; $j++) { 
//         $rgb = imagecolorat($im, $i, $j);
//         $r += $rgb >> 16;
//         $g += $rgb >> 8 & 255;
//         $b += $rgb & 255;

//     }
// }
// $qtyPixel = $r+$g+$b;
// var_dump($qtyPixel);

// $squaredErrorImage = pow((doubleval($a) - doubleval($b)), 2);
// echo "MSE = ".$squaredErrorImage;
// ===============================================================================

$image1 = imagecreatefrompng("stegano/sample_640×426.png");
$image2 = imagecreatefrompng("stegano/LSB-1bit_sample_640×426.png");

$mse = 0;
$width = imagesx($image1);
$height = imagesy($image1);
$temp = 0;

for ($y=0; $y < $height; $y++) { 
    for ($x=0; $x < $width; $x++) { 
     $rgb1 = imagecolorat($image1, $x, $y);
     $r1 = ($rgb1 >> 16) & 0xFF;

     $rgb2 = imagecolorat($image2, $x, $y);
     $r2 = ($rgb2 >> 16) & 0xFF;

     $diff = $r1 - $r2;
     // echo $diff." ";
     $temp += pow($diff, 2);
    }
}

// echo "<br> jmlh piksel error (kuadrat) = ".$temp."<br>";
$mse = $temp / ($width * $height);

echo "MSE = ".$mse."<br>";

echo "====================================================<br>";

$ratio = pow(255, 2) / $mse;
$psnr = 10 * log10($ratio);

echo "PSNR = ".$psnr;

?>