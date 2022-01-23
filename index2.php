<!DOCTYPE html>
<html lang="en">
    <?php include('_partials/head.php') ?>
    <body class="sb-nav-fixed">
        
    <?php include('_partials/navbar.php'); ?>
    
        <div id="layoutSidenav">

            <?php include('_partials/sidenav.php') ?>
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Key Generator</h1>
                        
                        <!-- Form Generator -->
                        <div class="card mb-4 mt-3">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Buat Kunci RSA
                            </div>
                            <form action="p_keygen.php" method="post"></form>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label for="nilaiP" class="col-sm-2 col-form-label">Masukkan P (Prima)</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="p" placeholder="Masukkan Bilangan Prima" id="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nilaiQ" class="col-sm-2 col-form-label">Masukkan Q (Prima)</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="q" id="" placeholder="Masukkan Bilangan Prima">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nilaiN" class="col-sm-2 col-form-label">Nilai n (p*q)</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="n" id="" readonly="" placeholder="Nilai n">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nilaiE" class="col-sm-2 col-form-label">Kunci Publik (e)</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="e" id="" placeholder="Masukkan Kunci Publik (enkripsi e)">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nilaiD" class="col-sm-2 col-form-label">Kunci Privat/Dekripsi (d)</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="d" id="" placeholder="Kunci Dekripsi" readonly="">
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label"></label>
                                <input type="button" value="generate" name="generate" class="btn btn-primary">
                                <input type="button" value="simpan" name="simpan" class="btn btn-success">
                            </div>
                        </div>

                        <!-- Table Key -->
                        <div class="card mb-4 mt-3">
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
                        </div>
                    </div>
                </main>
                
                <?php include('_partials/footer.php') ?>

            </div>
        </div>
        
        <?php include('_partials/js.php') ?>

    </body>
</html>
