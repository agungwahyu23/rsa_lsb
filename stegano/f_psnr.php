<!DOCTYPE html>
<html lang="en">
<?php 
    include 'encode.php';
    include('../_partials/head.php');
    ?>

<!-- Proses MSE & PSNR -->
<?php
    $image1 = imagecreatefrompng("250x247.png");
    $image2 = imagecreatefrompng("Hasil-250x247.png");
    
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
    
    // echo "MSE Red= ".$mser."<br>";
    // echo "MSE Green= ".$mseg."<br>";
    // echo "MSE Blue= ".$mseb."<br><br>";
    
    $ratior = pow(255, 2) / $mser;
    $ratiog = pow(255, 2) / $mseg;
    $ratiob = pow(255, 2) / $mseb;
    $psnrr = 10 * log10($ratior);
    $psnrg = 10 * log10($ratiog);
    $psnrb = 10 * log10($ratiob);
    
    // echo "PSNR Red= ".$psnrr."<br>PSNR Green= ".$psnrg."<br>PSNR Blue= ".$psnrb."<br><br>";
    
    
    $imageBMP1 = imagecreatefrombmp("sample_640×426.bmp");
    $imageBMP2 = imagecreatefrombmp("Hasil-sample_640×426.bmp");
    
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
    
    // echo "MSE Red= ".$mr."<br>";
    // echo "MSE Green= ".$mg."<br>";
    // echo "MSE Blue= ".$mb."<br><br>";
    
    $ratr = pow(255, 2) / $mr;
    $ratg = pow(255, 2) / $mg;
    $ratb = pow(255, 2) / $mb;
    $pr = 10 * log10($ratr);
    $pg = 10 * log10($ratg);
    $pb = 10 * log10($ratb);
    
    // echo "PSNR Red= ".$pr."<br>PSNR Green= ".$pg."<br>PSNR Blue= ".$pb."<br>";
?>
<!-- End Proses MSE & PSNR -->

<body class="sb-nav-fixed">

    <?php include('../_partials/navbar.php'); ?>

    <div id="layoutSidenav">

        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="tab">
                            <div class="sb-sidenav-menu-heading">Enkripsi - Embedding</div>
                            <a class="nav-link tablinks" href="../kripto/enkripsi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>Enkripsi
                            </a>
                            <a class="nav-link tablinks" href="../stegano/f_embed.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>Embedding
                            </a>
                            <!-- <button class="nav-link tablinks" onclick="openCity(event, 'Prima')">Cek Bilangan Prima</button> -->

                            <div class="sb-sidenav-menu-heading">Ekstraksi - Dekripsi</div>
                            <a class="nav-link tablinks" href="f_ekstrak.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-lock-open"></i></div>Ekstraksi
                            </a>
                            <a class="nav-link tablinks" href="../kripto/dekripsi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-lock-open"></i></div>Dekripsi
                            </a>

                            <div class="sb-sidenav-menu-heading">MSE & PSNR</div>
                            <a class="nav-link tablinks" href="f_psnr.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>Hasil MSE & PSNR
                            </a>
                            <div class="sb-sidenav-menu-heading">Petunjuk</div>
                            <a class="nav-link tablinks" href="../kripto/help.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>Panduan
                            </a>
                        </div>
                    </div>
                </div>
               
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Steganografi</h1>

                    <!-- Form Generator -->
                    <div class="card mb-4 mt-3">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            MSE dan PSNR
                        </div>
                        <div class="card-body">

                            <!-- Blok enkripsi -->
                            <div id="LSBenc" class="tabcontent">
                                <h4><u>Rumus MSE dan PSNR</u></h3>
                                    <div class="row mb-3">
                                        <label for="nilaiP" class="col-sm-2 col-form-label">MSE</label>
                                        <p>(Image1<sub>(i,j)</sub> - Image2<sub>(i,j)</sub>)<sup>2</sup>   dimana Image1 adalah gambar original dan Image2 adalah cover image</p>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="nilaiP" class="col-sm-2 col-form-label">PSNR</label>
                                        <img src="../assets/img/psnr.JPG" alt="">
                                    </div>
                            </div>
                            <!-- / end enkripsi -->
                        </div>
                    </div>

                    <!-- Table MSE -->
                    <div class="box">
                        <div class="box-header">
                            <h5 class="box-title">MSE</h5>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="table1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:5%;">No</th>
                                        <th>Ekstensi</th>
                                        <th>Cover Image</th>
                                        <th>Stego Image</th>
                                        <th>Pixel Red</th>
                                        <th>Pixel Green</th>
                                        <th>Pixel Blue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>PNG</td>
                                        <td><img src="250x247.png" alt="" style="width:100px"></td>
                                        <td><img src="Hasil-250x247.png" alt="" style="width:100px"></td>
                                        <td><?= $mser ?></td>
                                        <td><?= $mseg ?></td>
                                        <td><?= $mseb ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>BMP</td>
                                        <td><img src="sample_640×426.bmp" alt="" style="width:100px"></td>
                                        <td><img src="Hasil-sample_640×426.bmp" alt="" style="width:100px"></td>
                                        <td><?= $mr ?></td>
                                        <td><?= $mg ?></td>
                                        <td><?= $mb ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <!-- ENd Table -->

                    <!-- Table PSNR -->
                    <div class="box">
                        <div class="box-header">
                            <h5 class="box-title">PSNR</h5>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="table1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:5%;">No</th>
                                        <th>Ekstensi</th>
                                        <th>Cover Image</th>
                                        <th>Stego Image</th>
                                        <th>Pixel Red</th>
                                        <th>Pixel Green</th>
                                        <th>Pixel Blue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>PNG</td>
                                        <td><img src="250x247.png" alt="" style="width:100px"></td>
                                        <td><img src="Hasil-250x247.png" alt="" style="width:100px"></td>
                                        <td><?= $psnrr ?></td>
                                        <td><?= $psnrg ?></td>
                                        <td><?= $psnrb ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>BMP</td>
                                        <td><img src="sample_640×426.bmp" alt="" style="width:100px"></td>
                                        <td><img src="Hasil-sample_640×426.bmp" alt="" style="width:100px"></td>
                                        <td><?= $pr ?></td>
                                        <td><?= $pg ?></td>
                                        <td><?= $pb ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- End Table PSNR -->

                </div>
            </main>

            <?php include('../_partials/footer.php') ?>

        </div>
    </div>

    <?php include('../_partials/js.php') ?>

</body>

</html>
