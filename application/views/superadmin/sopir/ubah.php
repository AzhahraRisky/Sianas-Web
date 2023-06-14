<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Sopir</h1>
        <a href="<?= base_url('sopir/sopir') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-reply fa-sm text-white-50"></i> Kembali</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah data</h6>
                </div>
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger m-2" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
                <form action="" method="POST">
                    <input type="hidden" name="no_mobil" value="<?= $sopir['no_mobil']; ?>">
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3 mt-3">
                            <label for="kode"><strong>Jenis Mobil</strong></label>
                            <input type="text" name="jenis_mobil" placeholder="Masukkan Jenis Mobil" autocomplete="off" class="form-control" id="subbag" value="<?= $sopir['jenis_mobil']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3 mt-3">
                            <label for="kode"><strong>No Polisi</strong></label>
                            <input type="text" name="no_plat" placeholder="Masukkan No Polisi" autocomplete="off" class="form-control" id="subbag" value="<?= $sopir['no_plat']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3 mt-3">
                            <label for="kode"><strong>Nama</strong></label>
                            <input type="text" name="nama" placeholder="Masukkan Nama" autocomplete="off" class="form-control" id="nama" value="<?= $sopir['nama']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3 mt-3">
                            <label for="kode"><strong>No Telpon</strong></label>
                            <input type="text" name="no_hp" placeholder="Masukkan No Telpon" autocomplete="off" class="form-control" id="no_hp" value="<?= $sopir['no_hp']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3 mt-3">
                            <label for="kode"><strong>Alamat</strong></label>
                            <input type="text" name="alamat" placeholder="Masukkan Alamat" autocomplete="off" class="form-control" id="no_hp" value="<?= $sopir['alamat']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3 mt-3">
                            <label for="kode"><strong>Username</strong></label>
                            <input type="text" name="username" placeholder="Masukkan Username" autocomplete="off" class="form-control" id="username" value="<?= $sopir['username']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3 mt-3">
                            <label for="kode"><strong>Password</strong></label>
                            <input type="text" name="password" placeholder="Masukkan Password" autocomplete="off" class="form-control" id="password" value="<?= $sopir['password']; ?>">
                        </div>
                    </div>
                    <div class="form-group ml-4">
                        <button type="ubah" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; SIANAS 2022</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Anda Yakin Keluar?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url(); ?>login/logout">Logout</a>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html><!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Sopir</h1>
        <a href="<?= base_url('sopir/sopir') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-reply fa-sm text-white-50"></i> Kembali</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah data</h6>
                </div>
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger m-2" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
                <form action="" method="POST">
                    <input type="hidden" name="no_mobil" value="<?= $sopir['no_mobil']; ?>">
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3 mt-3">
                            <label for="kode"><strong>Jenis Mobil</strong></label>
                            <input type="text" name="jenis_mobil" placeholder="Masukkan Jenis Mobil" autocomplete="off" class="form-control" id="subbag" value="<?= $sopir['jenis_mobil']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3 mt-3">
                            <label for="kode"><strong>No Polisi</strong></label>
                            <input type="text" name="no_plat" placeholder="Masukkan No Polisi" autocomplete="off" class="form-control" id="subbag" value="<?= $sopir['no_plat']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3 mt-3">
                            <label for="kode"><strong>Nama</strong></label>
                            <input type="text" name="nama" placeholder="Masukkan Nama" autocomplete="off" class="form-control" id="nama" value="<?= $sopir['nama']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3 mt-3">
                            <label for="kode"><strong>No Telpon</strong></label>
                            <input type="text" name="no_hp" placeholder="Masukkan No Telpon" autocomplete="off" class="form-control" id="no_hp" value="<?= $sopir['no_hp']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3 mt-3">
                            <label for="kode"><strong>Alamat</strong></label>
                            <input type="text" name="alamat" placeholder="Masukkan Alamat" autocomplete="off" class="form-control" id="no_hp" value="<?= $sopir['alamat']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3 mt-3">
                            <label for="kode"><strong>Username</strong></label>
                            <input type="text" name="username" placeholder="Masukkan Username" autocomplete="off" class="form-control" id="username" value="<?= $sopir['username']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3 mt-3">
                            <label for="kode"><strong>Password</strong></label>
                            <input type="text" name="password" placeholder="Masukkan Password" autocomplete="off" class="form-control" id="password" value="<?= $sopir['password']; ?>">
                        </div>
                    </div>
                    <div class="form-group ml-4">
                        <button type="ubah" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; SIANAS 2022</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Anda Yakin Keluar?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url(); ?>login/logout">Logout</a>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>