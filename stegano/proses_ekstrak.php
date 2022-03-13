<?php
include "decode.php";

// $image = "LSB-1bit_sample.png"; //image yang akan diambil pesannya
$image = $_FILES['image'];

$lets_decode = new decode();
$lets_decode->printMsg($image);

?>