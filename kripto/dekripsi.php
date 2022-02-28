<!DOCTYPE html>
<html lang="en">
    <?php 
    include '../fungsi/fungsi_rsa.php';
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
                                <div class="sb-sidenav-menu-heading">Enkripsi</div>
                                <button class="nav-link tablinks" onclick="openCity(event, 'Enkripsi')">
                                    <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>Enkripsi
                                </button>
                                <button class="nav-link tablinks" onclick="openCity(event, 'Dekripsi')" id="defaultOpen">
                                    <div class="sb-nav-link-icon"><i class="fas fa-lock-open"></i></div>Dekripsi
                                </button>
                                <!-- <button class="nav-link tablinks" onclick="openCity(event, 'Prima')">Cek Bilangan Prima</button> -->

                                <div class="sb-sidenav-menu-heading">Steganografi</div>
                                <a class="nav-link tablinks" onclick="openCity(event, 'Dekripsi')">
                                <div class="sb-nav-link-icon"><i class="fas fa-lock-open"></i></div>Dekripsi
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
                        <h1 class="mt-4">Kriptografi</h1>
                        
                        <!-- Form Generator -->
                        <div class="card mb-4 mt-3">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Buat Pesan Rahasia
                            </div>
                            <div class="card-body">
                                
                                <!-- Blok enkripsi -->
                                <div id="Enkripsi" class="tabcontent">
                                    <form method="post" action="enkripsi.php">

                                    <div class="row mb-3">
                                        <label for="nilaiP" class="col-sm-2 col-form-label">Masukkan P (Prima)</label>
                                        <div class="col-md-9">
                                        <input type="number" placeholder="p (bilangan prima)" name="p" required class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nilaiP" class="col-sm-2 col-form-label">Masukkan Q (Prima)</label>
                                        <div class="col-md-9">
                                        <input type="number" placeholder="q (bilangan prima)" name="q" required class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="nilaiP" class="col-sm-2 col-form-label">Masukkan Pesan</label>
                                        <div class="col-md-9">
                                        <textarea rows="4" cols="50" placeholder="Plainteks" name="teks" id="teks" class="form-control" required required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <button type="submit" class="submit btn btn-primary" name="enkripsi" id="enkripsi" value="enkripsi">Enkripsi</button>  
                                    </div>
                                    
                                    </form>
                                </div>
                                <!-- / end enkripsi -->

                                <!-- Blok Dekripsi -->
                                <div id="Dekripsi" class="tabcontent">
                                    <h3 align="center">Proses Dekripsi</h3><hr>
                                    <p><b>Kunci privat (d, N) :</b></p> 
                                    <form method="post" action="dekripsi.php">
                                    <input type="number" class="form-control mb-3" placeholder="d" name="d" required>
                                    <input type="number" class="form-control mb-3" placeholder="N" name="n" required>
                                    <p><b>Pesan :</b></p> 
                                    <textarea rows="4" class="form-control mb-3" cols="50" placeholder="Chiperteks" name="teks" id="teks" required></textarea>
                                    <button type="submit" class="submit" name="dekripsi" id="dekripsi" value="dekripsi">Dekripsi</button>
                                    </form>

                                    <?php
                                    if (isset($_POST['dekripsi'])){
                                        echo '
                                            <hr><h3 align="center">Hasil Dekripsi</h3><hr>
                                            <p><b>Pesan chiperteks :</b></p>
                                            <textarea rows="4" cols="50" placeholder="Chiperteks" name="teks" id="teks" disabled>'.$teks.' </textarea>
                                            <p><b>Pesan (ASCII) :</b></p>
                                            <textarea rows="4" cols="50" placeholder="Chiperteks" name="teks" id="teks" disabled>'.$teks2.' </textarea>
                                            <p><b>Kunci yang digunakan :</b></p>
                                            <P>Kunci privat (d, N) = (<span style="color:blue;">'.$d.'</span>, <span style="color:blue;">'.$n.'</span>)</p>
                                            </p><br/><b>Hasil dekripsi pesan :</b></p> <textarea rows="4" cols="50" placeholder="Chiperteks" name="teks" id="teks" disabled>'.$hasildekripsi.' </textarea>
                                            <p style="color:gray;"><i>'.$duration.' detik</i></p>';
                                    }
                                    ?>
                                </div>
                                <!-- / end dekripsi -->

                            </div>
                        </div>

                        <!-- Table Key -->
                        <!-- <div class="card mb-4 mt-3">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Kunci RSA
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Kunci Publik (Tidak rahasia)</th>
                                                <th>Kunci Privat (Rahasia)</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>10</td>
                                                <td>9</td>
                                                <td>
                                                    <a href="#"><i class="fas fa-edit" style="color:#444"></i></a>
                                                    <a href="#"><i class="fas fa-trash" style="color:#444"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </main>
                
                <?php include('../_partials/footer.php') ?>

            </div>
        </div>
        
        <?php include('../_partials/js.php') ?>

    </body>
</html>
