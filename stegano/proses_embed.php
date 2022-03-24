<?php
require_once('encode.php');

$pesan = $_POST['pesan'];
$image = $_FILES['image'];

// // ambil data file
// $image = $_FILES['image'];
// $namaSementara = $_FILES['image']['tmp_name'];

// // tentukan lokasi file akan dipindahkan
// $dirUpload = "file/";

// // pindahkan file
// $terupload = move_uploaded_file($namaSementara, $dirUpload.$image);



$lets_encode = new encode();

$lets_encode->executeLSB($pesan,$image);

?>