<?php

class converter {
protected $pixelX=0; 
protected $pixelY=0; 
protected $msgBin;
protected $msgLength;
protected $img;
protected $imgName;
protected $width;
protected $height;
protected $ekstensi;


//method konversi string ke binary
protected function str2bin($str){
     $str = (string)$str;
     $l = strlen($str);
     $result = '';
     while($l--){
       $result = str_pad(decbin(ord($str[$l])),8,"0",STR_PAD_LEFT).$result;
     }
     return $result;
   }

//method konversi binary ke string
protected function bin2str($str) {
    $text_array = explode("\r\n", chunk_split($str, 8)); //pisahkan string menurut tanda pemisah(enter&new line) lalu bagi kalimat kedalam bagian lebih kecil dgn pjg chuncks 8
    $newstring = '';
    for ($n = 0; $n < count($text_array) - 1; $n++) {
        $newstring .= chr(base_convert($text_array[$n], 2, 10));
    }
    return $newstring;
}


//method konversi decimal ke binary
protected function dec2bin($d) {
	
  $b = decbin($d);
  $l = strlen($b);
  if ($l == 1)
  {
	  $newBin = "000".$b;
  }else if ($l == 2)
		{
			$newBin = "00".$b;
		}else if ($l == 3)
			{
				$newBin = "0".$b;
			}else{
					$newBin = $b;
				}
  
	return $newBin;
}


//method konversi binary ke decimal
protected function bin2dec($b) {
	$newDec = bindec($b);
	return $newDec;
}

protected function getImg($img)
{
 $img = $_FILES['image']['name'];
 $x = explode('.', $img);
 $ekstensi = strtolower(end($x));
 $ekstensi_type = $_FILES['image']['type'];
 $file_tmp = $_FILES['image']['tmp_name'];
 if ($ekstensi == "bmp" OR $ekstensi == "BMP")
  {
	move_uploaded_file($file_tmp, '../file/'.$img);
	  $direktori = "../file/";
	  	$this->ekstensi = $ekstensi;
		$this->imgName = $img;
		$this->img = imagecreatefrombmp($direktori.$img);
	    
	list($this->width, $this->height) = getimagesize($direktori.$img); 
  }elseif ($ekstensi == "png" OR $ekstensi == "PNG")
  {
	move_uploaded_file($file_tmp, '../file/'.$img);
	  $direktori = "../file/";
	  	$this->ekstensi = $ekstensi;
		$this->imgName = $img;
		$this->img = imagecreatefrompng($direktori.$img);
	    
	list($this->width, $this->height) = getimagesize($direktori.$img); 
  }else{
	//  echo "Gambar harus bertipe PNG";
	//  die();
	echo "<script>alert('Gambar harus bertipe PNG atau BMP');window.location='../stegano/f_embed.php'</script>";
 }
	
}

protected function getMsg($msg)
{
	//konversi pesan ke binary, karakter '|' penanda akhir pesan
	$this->msgBin = $this->str2bin($msg.'|'); 
	$this->msgLength = strlen($this->msgBin); 
	
}

/*
protected function postResult($data_to_post)
{
	echo $data_to_post;
	
}*/ //akhir method postMsg

function __destruct()
{
	unset($this->msgBin);
	unset($this->msgLength);
	unset($this->width);
	unset($this->height);
	
}

} //akhir class

?>
