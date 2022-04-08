<!DOCTYPE html>
<html lang="en">
<?php 
    include 'encode.php';
    include('../_partials/head.php');
    ?>

<!-- Proses MSE & PSNR -->
<?php
    $image1 = imagecreatefrompng("sample_640×426.png");
    $image2 = imagecreatefrompng("Hasil-sample_640×426.png");
    
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
    // mse
    $mse = $temp / ($width * $height);
    // psnr
    $ratio = pow(255, 2) / $mse;
    $psnr = 10 * log10($ratio);
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
                            Hasil MSE dan PSNR
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
                                <hr>
                                <h4><u>Hasil MSE dan PSNR</u></h3>
                                    <div class="row mb-3">
                                        <label for="nilaiP" class="col-sm-2 col-form-label">MSE</label>
                                        <p>: <?= $mse?></p>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="nilaiP" class="col-sm-2 col-form-label">PSNR</label>
                                        <p>: <?= $psnr ?> dB</p>
                                    </div>
                            </div>
                            <!-- / end enkripsi -->

                        </div>
                    </div>

                </div>
            </main>

            <?php include('../_partials/footer.php') ?>

        </div>
    </div>

    <?php include('../_partials/js.php') ?>

</body>

</html>
