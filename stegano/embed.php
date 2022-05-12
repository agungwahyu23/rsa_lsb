<?php

use function PHPSTORM_META\type;

require_once('../fungsi/converter.php');

class encode extends converter {

private $qtyPxl = array();
protected $stmt;

/**method untuk mengubah digit bit warna 
 * dengan digit bit pesan pada 1 bit terakhir
 * */
private function lsb_1_bit()
{
	
for($x=0,$f=0;$x<$this->msgLength;$x=$x+3,$f++){ 

  if($this->pixelX === $this->width){ 
    $this->pixelY++;
    $this->pixelX=0;
  }

  if($this->pixelY===($this->height)){ 
    $pY = $this->pixelY;
    $hght = $this->height;
    $pX = $this->pixelX;
    $widt = $this->width;
    echo "Max! Y: $pY H: $hght X: $pX W: $widt $this->msgLength";
    die();
  }
  
  $rgb = imagecolorat($this->img,$this->pixelX,$this->pixelY); 
  $r = ($rgb >>16) & 0xFF; 
  $g = ($rgb >>8) & 0xFF; 
  $b = $rgb & 0xFF;
  $this->qtyPxl[0][$f] = $r + $g + $b;
  $y = $x + 1;
  $z = $x + 2;

  //proses mengubah nilai Red
  $newR = parent::dec2bin($r); 
  $newR[strlen($newR)-1] = $this->msgBin[$x]; 
  $newR = parent::bin2dec($newR); 
  
  //proses mengubah nilai Green
  $newG = parent::dec2bin($g); 
  if ($y<$this->msgLength)
  {
	$newG[strlen($newG)-1] = $this->msgBin[$y]; 
	}
	$newG = parent::bin2dec($newG); 
  
  //proses mengubah nilai Blue
  $newB = parent::dec2bin($b);
  if ($z<$this->msgLength)
  { 
	$newB[strlen($newB)-1] = $this->msgBin[$z]; 
	}
	$newB = parent::bin2dec($newB); 
	
   $this->qtyPxl[1][$f] = $newR + $newG + $newB;

  $new_color = imagecolorallocate($this->img,$newR,$newG,$newB); 
  imagesetpixel($this->img,$this->pixelX,$this->pixelY,$new_color); 
  $this->pixelX++; 

}	
  $direktori = "../file/";
	$this->imgName = ($direktori."Hasil-".$this->imgName);
  
} // akhir method lsb1bit

private function newImg()
{
  if ($this->ekstensi == "png" || $this->ekstensi == "PNG") {
    if(imagepng($this->img,$this->imgName))
    {
      echo "Berhasil melakukan embedding PNG <br>
      <a class='btn btn-xs btn-primary' href='$this->imgName' download>Download</a> <br>
      <a class='btn btn-xs btn-primary' href='f_embed.php'>Kembali</a>";
      // echo "<script>alert('Berhasil enkripsi file PNG');window.location='f_embed.php'</script>";   
    }
  }else{
    if(imagebmp($this->img,$this->imgName))
    {
      echo "Berhasil melakukan embedding BMP <br>
      <a class='btn btn-xs btn-primary' href='$this->imgName' download>Download</a> <br>
      <a class='btn btn-xs btn-primary' href='f_embed.php'>Kembali</a>";
      // echo "<script>alert('Berhasil enkripsi file BMP');window.location='f_embed.php'</script>";   
    }
  }
	
	imagedestroy($this->img);

	$this->pixelX=0; 
	$this->pixelY=0; 

} // akhir method newImg

public function executeLSB($msg,$img)
{

parent::getMsg($msg);
parent::getImg($img);

if($this->msgLength > ($this->width*$this->height)*3){ 
    $cap = (($this->width * $this->height)/1)*3;
    $msgL = $this->msgLength;
  echo "Pesan melebihi daya! <br> $cap <br> $msgL";
  die();
}

  self::lsb_1_bit();
  self::newImg();
  
die;

} // akhir method executeLSB
	
}//akhir class

?>
