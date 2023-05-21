<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Input Pengajuan Service </h1>
        <a href="<?= base_url('sopir/service') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-reply fa-sm text-white-50"></i> Kembali</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-solid fa-file"></i> Isi Form Dibawah ini</h6>
                </div>
                <?php if ($this->session->flashdata('flash')) {
                    echo '<p class="warning" style="margin: 10px 20px;">' . $this->session->flashdata('flash') . '</p>';
                } ?>
                <form action="<?= base_url('sopir/service_tambah') ?>" id="form_tambah" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-12 ml-6 mt-6">
                            <label for="kode"><strong>Jenis Kendaraan</strong></label>
                            <input type="text" name="jenis_mobil" value="<?= $service['jenis_mobil'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3">
                            <label for="email"><strong>No Polisi</strong></label>
                            <input type="text" name="no_plat" value="<?= $service['no_plat'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 ml-3">
                            <label for="email"><strong>Tanggal Pengajuan</strong></label>
                            <input type="date" name="tgl_service" placeholder="Masukkan Tanggal Pengajuan" autocomplete="off" class="form-control" required>
                        </div>
                    </div>
                    <input type="hidden" name="no_sopir" value="<?= $nama['no_sopir'] ?>">
                    <input type="hidden" name="konfirmasi" value="Menunggu">
                    <div class="form-group ml-4 mt-3">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
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