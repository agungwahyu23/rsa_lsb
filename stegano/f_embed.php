<!DOCTYPE html>
<html lang="en">
<?php 
    include 'encode.php';
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
                            <div class="sb-sidenav-menu-heading">Kriptografi</div>
                            <a class="nav-link tablinks" href="../kripto/enkripsi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>Enkripsi
                            </a>
                            <a class="nav-link tablinks" href="../kripto/dekripsi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-lock-open"></i></div>Dekripsi
                            </a>
                            <!-- <button class="nav-link tablinks" onclick="openCity(event, 'Prima')">Cek Bilangan Prima</button> -->

                            <div class="sb-sidenav-menu-heading">Steganografi</div>
                            <a class="nav-link tablinks" href="../stegano/f_embed.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>Embedding
                            </a>
                            <a class="nav-link tablinks" href="f_ekstrak.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-lock-open"></i></div>Ekstraksi
                            </a>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
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
                            Sisipkan Pesan Rahasia
                        </div>
                        <div class="card-body">

                            <!-- Blok enkripsi -->
                            <div id="LSBenc" class="tabcontent">
                                <form method="post" action="proses_embed.php" enctype="multipart/form-data">

                                    <div class="row mb-3">
                                        <label for="nilaiP" class="col-sm-2 col-form-label">Masukkan Pesan</label>
                                        <div class="col-md-9">
                                            <textarea rows="4" cols="50" placeholder="Plainteks" name="pesan" id="pesan"
                                                class="form-control" required required></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="nilaiP" class="col-sm-2 col-form-label">Pilih Gambar Penampung</label>
                                        <div class="col-md-9">
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button type="submit" class="submit btn btn-primary" name="embed"
                                            id="embed" value="embed">Proses</button>
                                    </div>

                                </form>

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