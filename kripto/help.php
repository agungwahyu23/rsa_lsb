<!DOCTYPE html>
<html lang="en">
<?php 
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
                            <a class="nav-link tablinks" href="enkripsi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>Enkripsi
                            </a>
                            <a class="nav-link tablinks" href="../stegano/f_embed.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>Embedding
                            </a>
                            
                            <!-- <button class="nav-link tablinks" onclick="openCity(event, 'Prima')">Cek Bilangan Prima</button> -->

                            <div class="sb-sidenav-menu-heading">Ekstraksi - Dekripsi</div>
                            <a class="nav-link tablinks" href="../stegano/f_ekstrak.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-lock-open"></i></div>Ekstraksi
                            </a>
                            <a class="nav-link tablinks" href="dekripsi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-lock-open"></i></div>Dekripsi
                            </a>

                            <div class="sb-sidenav-menu-heading">MSE & PSNR</div>
                            <a class="nav-link tablinks" href="../stegano/f_psnr.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>Hasil MSE & PSNR
                            </a>
                            <div class="sb-sidenav-menu-heading">Petunjuk</div>
                            <a class="nav-link tablinks" href="help.php">
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
                        <div class="mt-4 embed-responsive embed-responsive-21by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/nz-6kN2BHCs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/bpdagqH6dRA" allowfullscreen></iframe> -->
                        </div>
                        <div>
                            <a href="../file/PANDUAN-PENGGUNAAN-SISTEM.pdf" target="blank" class="btn btn-info mt-3"><i class="fa fa-book"></i>Unduh Manual Book</a>
                        </div>
                    </div>
                </main>
                
                <?php include('../_partials/footer.php') ?>

            </div>
        </div>
        
        <?php include('../_partials/js.php') ?>

    </body>
</html>
