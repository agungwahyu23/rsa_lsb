<!DOCTYPE html>
<html lang="en">
<?php 
    include 'decode.php';
    include('../_partials/head.php');
    ?>

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
                                Buat Pesan Rahasia
                            </div>
                            <div class="card-body">
                                <!-- Blok enkripsi -->
                                <div id="ekstrak" class="tabcontent">
                                    <form method="post" action="f_ekstrak.php" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <label for="nilaiP" class="col-sm-2 col-form-label">Pilih Gambar</label>
                                            <div class="col-md-9">
                                                <input type="file" name="image" id="image" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <button type="submit" class="submit btn btn-primary" name="ekstrak" id="ekstrak" value="ekstrak">Ekstrak</button>
                                        </div>
                                    </form>


                                    <hr><h3 align="center">Hasil Ekstraksi</h3>
                                    <p><b>Pesan : </b></p>
                                    <textarea class="form-control" id="teks" name="teks" rows="5" disabled>

                                    <?php if (isset($_POST['ekstrak'])){
                                        // $image = "LSB-1bit_sample.png"; //image yang akan diambil pesannya
                                        $image = $_FILES['image'];
                                        
                                        $lets_decode = new decode();
                                        $lets_decode->printMsg($image);
                                    }?>
                                    
                                    </textarea>
                                    
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
z