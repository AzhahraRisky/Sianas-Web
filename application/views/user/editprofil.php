<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profil</h1>
        <a href="<?= base_url('user/index') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-reply fa-sm text-white-50"></i> Kembali</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger m-2" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <form action="" method="POST">
                <input type="hidden" name="no_anggota" value="<?= $anggota['no_anggota']; ?>">
                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/') . $anggota['foto']; ?> " style="width: 200px; height: 200px; align: center;">
                <div class="form-row">
                    <div class="form-group col-md-8 ml-3 mt-3">
                        <label for="kode"><strong>Sub Bagian / Komisi</strong></label>
                        <input type="text" name="subbag" placeholder="Masukkan Sub Bagian / Komisi" autocomplete="off" class="form-control" id="subbag" value="<?= $anggota['subbag']; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8 ml-3 mt-3">
                        <label for="kode"><strong>Nama</strong></label>
                        <input type="text" name="nama" placeholder="Masukkan Nama" autocomplete="off" class="form-control" id="nama" value="<?= $anggota['nama']; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8 ml-3 mt-3">
                        <label for="kode"><strong>NIP</strong></label>
                        <input type="text" name="nip" placeholder="Masukkan NIP" autocomplete="off" class="form-control" id="nama" value="<?= $anggota['nip']; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8 ml-3 mt-3">
                        <label for="kode"><strong>No Telpon</strong></label>
                        <input type="text" name="no_hp" placeholder="Masukkan No Telpon" autocomplete="off" class="form-control" id="nama" value="<?= $anggota['no_hp']; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8 ml-3 mt-3">
                        <label for="kode"><strong>Jabatan</strong></label>
                        <input type="text" name="jabatan" placeholder="Masukkan Nama" autocomplete="off" class="form-control" id="nama" value="<?= $anggota['jabatan']; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8 ml-3 mt-3">
                        <label for="kode"><strong>Username</strong></label>
                        <input type="text" name="username" placeholder="Masukkan Username" autocomplete="off" class="form-control" id="username" value="<?= $anggota['username']; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8 ml-3 mt-3">
                        <label for="kode"><strong>Password</strong></label>
                        <input type="text" name="password" placeholder="Masukkan Password" autocomplete="off" class="form-control" id="password" value="<?= $anggota['password']; ?>">
                    </div>
                </div>
                <div class="form-group ml-4">
                    <button type="ubah" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Ubah</button>
                </div>
            </form>
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