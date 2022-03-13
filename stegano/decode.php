<?php
require_once('../fungsi/converter.php');

class decode extends converter {

private $count=0; 
private $message=''; 

/* method untuk menterjemahkan bit-bit warna
 * ke dalam bit-bit pesan sesuai tipe LSB
 * */
  public function findMsg(){
    
    for ($x = 0; $x < ($this->width*$this->height); $x++) { 
        if($this->pixelX === $this->width-1){ 
          $this->pixelY++;
          $this->pixelX=0;
        }
      
        if($this->pixelY=== ($this->height-10)){ 
        // echo "Tidak ada pesan...";
        //   die();
        echo "<script>alert('Tidak ada pesan');window.location='f_ekstrak.php'</script>";
        }

        $rgb = imagecolorat($this->img,$this->pixelX,$this->pixelY); 
        $r = ($rgb >>16) & 0xFF; 
        $g = ($rgb >>8) & 0xFF; 
        $b = $rgb & 0xFF;

        $R = $this->dec2bin($r);
        $G = $this->dec2bin($g);
        $B = $this->dec2bin($b); 

        for($j=1;$j>0;$j--){

          $this->message .= $R[strlen($R) - $j]; 
          $this->count++;
            if ($this->count == 8) { 
                if (parent::bin2str(substr($this->message, -8)) === '|') { 
                  
                    $this->message = parent::bin2str(substr($this->message,0,-8)); 
                    
                    
                      $message_1 = $this->message;
                      echo $message_1;
                      die;
                    
                }
                $this->count = 0; 
            }
        }
      
      for($j=1;$j>0;$j--){

        $this->message .= $G[strlen($G) - $j]; 
        $this->count++;
        if ($this->count == 8) { 
            if (parent::bin2str(substr($this->message, -8)) === '|') { 
              
                $this->message = parent::bin2str(substr($this->message,0,-8)); 
                
                  $message_2 = $this->message;
                  echo $message_2;
                  die;
                
            }
            $this->count = 0; 
        }
      }
      
      for($j=1;$j>0;$j--){

        $this->message .= $B[strlen($B) - $j]; 
        $this->count++;
        if ($this->count == 8) { 
            if (parent::bin2str(substr($this->message, -8)) === '|') { 
              
                $this->message = parent::bin2str(substr($this->message,0,-8)); 
                
                  $message_3 = $this->message;
                  echo $message_3;
                  die;
                
            }
            $this->count = 0; 
        }
      }

      $this->pixelX++; 
    }
  } //akhir method findMSg

  public function printMsg($img){
    
    parent::getImg($img);
    self::findMsg();
    // imagedestroy($this->img); 
    
  } //akhir method printMsg

} //akhir class
?>
