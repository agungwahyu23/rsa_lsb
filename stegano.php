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
                        <h1 class="mt-4">Steganography</h1>
                        
                        <div class="card mb-4 mt-3">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Sisipkan Pesan
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label for="pesan" class="col-sm-2 col-form-label">Unggah <i>Cover Image</i></label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="cover" id="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="pesan" class="col-sm-2 col-form-label">Unggah Pesan terenkripsi</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="chiper" id="">
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label"></label>
                                <input type="button" value="Enkripsi" class="btn btn-primary">
                            </div>
                        </div>

                        <div class="card mb-4 mt-3">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Ekstraksi
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label for="pesan" class="col-sm-2 col-form-label">Unggah <i>Stego Image</i></label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="stego" id="">
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label"></label>
                                <input type="button" value="Dekripsi" class="btn btn-primary">
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
