<?php
include('func.php');

$teks = str_repeat('a', 1*23156);
$tbin = toBin($teks); 
$msgLength = strlen($tbin);
echo "panjang karakter : ".$msgLength."<br>";

$filename = "stegano/250x247.png";
$filename2 = "stegano/sample_640×426.bmp";

//payload
// ((N*M)/n)*3 -> N=width, M=height, n=jml bit yg diganti, 3=rgb
echo "========================PAYLOAD PNG=========================<br>";
$data = getimagesize($filename);
$w = $data[0];
$h = $data[1];
$luas = (($h*$w)/1)*3;
echo "Panjang : $h <br/>Lebar: $w <br/>payload: $luas <br/>";

echo "========================PAYLOAD BMP=========================<br>";
$data2 = getimagesize($filename2);
$w2 = $data2[0];
$h2 = $data2[1];
$luas2 = (($h2*$w2)/1)*3;
echo "Panjang : $h2 <br/>Lebar: $w2 <br/>payload: $luas2 <br/>";
echo "<br>";

echo "======================PSNR Image PNG===========================<br>";

$image1 = imagecreatefrompng("stegano/250x247.png");
$image2 = imagecreatefrompng("stegano/Hasil-250x247.png");

$mse = 0;
$width = imagesx($image1);
$height = imagesy($image1);
$tempr = 0;
$tempg = 0;
$tempb = 0;

for ($y=0; $y < $height; $y++) { 
    for ($x=0; $x < $width; $x++) { 
     $rgb1 = imagecolorat($image1, $x, $y);
     $r1 = ($rgb1 >> 16) & 0xFF;
     $g1 = ($rgb1 >>8) & 0xFF; 
     $b1 = $rgb1 & 0xFF;
     $qty1 = $r1 * $g1 * $b1;

     $rgb2 = imagecolorat($image2, $x, $y);
     $r2 = ($rgb2 >> 16) & 0xFF;
     $g2 = ($rgb2 >>8) & 0xFF; 
     $b2 = $rgb2 & 0xFF;
    //  $qty2 = $r2 * $g2 * $b2;
     
     //menghitung perbedaan pixel pada warna r,g,b
     $diffr = $r1 - $r2;
     $diffg = $g1 - $g2;
     $diffb = $b1 - $b2;

     //jika dihitung nilai r,g,b
    //  $diff = $qty1 - $qty2;
     // echo $diff." ";
     $tempr += pow($diffr, 2);
     $tempg += pow($diffg, 2);
     $tempb += pow($diffb, 2);
    }
}

// echo "<br> jmlh piksel error (kuadrat) = ".$temp."<br>";
$mser = $tempr / ($width * $height);
$mseg = $tempg / ($width * $height);
$mseb = $tempb / ($width * $height);

echo "MSE Red= ".$mser."<br>";
echo "MSE Green= ".$mseg."<br>";
echo "MSE Blue= ".$mseb."<br><br>";

$ratior = pow(255, 2) / $mser;
$ratiog = pow(255, 2) / $mseg;
$ratiob = pow(255, 2) / $mseb;
$psnrr = 10 * log10($ratior);
$psnrg = 10 * log10($ratiog);
$psnrb = 10 * log10($ratiob);

echo "PSNR Red= ".$psnrr."<br>PSNR Green= ".$psnrg."<br>PSNR Blue= ".$psnrb."<br><br>";

echo "======================PSNR Image BMP===========================<br>";

$imageBMP1 = imagecreatefrombmp("stegano/sample_640×426.bmp");
$imageBMP2 = imagecreatefrombmp("stegano/Hasil-sample_640×426.bmp");

$mse = 0;
$width2 = imagesx($imageBMP1);
$height2 = imagesy($imageBMP1);
$temr = 0;
$temg = 0;
$temb = 0;

for ($y=0; $y < $height2; $y++) { 
    for ($x=0; $x < $width2; $x++) { 
     $rgb3 = imagecolorat($imageBMP1, $x, $y);
     $r3 = ($rgb3 >> 16) & 0xFF;
     $g3 = ($rgb3 >>8) & 0xFF; 
     $b3 = $rgb3 & 0xFF;

     $rgb4 = imagecolorat($imageBMP2, $x, $y);
     $r4 = ($rgb4 >> 16) & 0xFF;
     $g4 = ($rgb4 >>8) & 0xFF; 
     $b4 = $rgb4 & 0xFF;
     
     //menghitung perbedaan pixel pada warna r,g,b
     $difr = $r3 - $r4;
     $difg = $g3 - $g4;
     $difb = $b3 - $b4;

     $temr += pow($difr, 2);
     $temg += pow($difg, 2);
     $temb += pow($difb, 2);
    }
}

// echo "<br> jmlh piksel error (kuadrat) = ".$temp."<br>";
$mr = $temr / ($width2 * $height2);
$mg = $temg / ($width2 * $height2);
$mb = $temb / ($width2 * $height2);

echo "MSE Red= ".$mr."<br>";
echo "MSE Green= ".$mg."<br>";
echo "MSE Blue= ".$mb."<br><br>";

$ratr = pow(255, 2) / $mr;
$ratg = pow(255, 2) / $mg;
$ratb = pow(255, 2) / $mb;
$pr = 10 * log10($ratr);
$pg = 10 * log10($ratg);
$pb = 10 * log10($ratb);

echo "PSNR Red= ".$pr."<br>PSNR Green= ".$pg."<br>PSNR Blue= ".$pb."<br>";

?>