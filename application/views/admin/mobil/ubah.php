<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Mobil Dinas</h1>
        <a href="<?= base_url('mobil') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-reply fa-sm text-white-50"></i> Kembali</a>
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
                    <input type="hidden" name="no_mobil" value="<?= $mobil['no_mobil']; ?>">
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3 mt-3">
                            <label for="kode"><strong>Jenis Mobil</strong></label>
                            <input type="text" name="jenis_mobil" placeholder="Masukkan Jenis Mobil" autocomplete="off" class="form-control" id="jenis_mobil" value="<?= $mobil['jenis_mobil']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3">
                            <label for="email"><strong>No Polisi</strong></label>
                            <input type="text" name="no_plat" placeholder="Masukkan No Plat" autocomplete="off" class="form-control" id="no_plat" value="<?= $mobil['no_plat']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3">
                            <label for="email"><strong>No Rangka</strong></label>
                            <input type="text" name="no_rangka" placeholder="Masukkan No Rangka" autocomplete="off" class="form-control" id="no_rangka" value="<?= $mobil['no_rangka']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3">
                            <label for="email"><strong>No Mesin</strong></label>
                            <input type="text" name="no_mesin" placeholder="Masukkan No Mesin" autocomplete="off" class="form-control" id="no_mesin" value="<?= $mobil['no_mesin']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3">
                            <label for="email"><strong>No STNK</strong></label>
                            <input type="text" name="no_stnk" placeholder="Masukkan No STNK" autocomplete="off" class="form-control" id="no_stnk" value="<?= $mobil['no_stnk']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3">
                            <label for="email"><strong>Warna</strong></label>
                            <input type="text" name="warna" placeholder="Masukkan Warna" autocomplete="off" class="form-control" id="warna" value="<?= $mobil['warna']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3">
                            <label for="email"><strong>Tanggal Pajak</strong></label>
                            <input type="date" name="tgl_pjk" placeholder="Masukkan Tanggal Pajak" autocomplete="off" class="form-control" id="tgl_pjk" value="<?= $mobil['tgl_pjk']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group col-md-8 ml-3">
                            <label for="status">Status Mobil</label>
                            <select id="status" class="form-control" name="status">
                                <option selected disabled>- Pilih -</option>
                                <option value="Digunakan">Digunakan</option>
                                <option value="Tidak_digunakan">Tidak Digunakan</option>
                            </select>
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