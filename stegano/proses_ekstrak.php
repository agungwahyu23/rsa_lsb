<?php
require_once('encode.php');

$pesan = $_POST['pesan'];
$image = $_FILES['image'];
$lets_encode = new encode();

$lets_encode->executeLSB($pesan,$image);

?>