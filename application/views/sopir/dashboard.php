<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hai, <?= $session ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-4 mb-4">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User Sedang Login</h6>
                </div>
                <div class="col-md-12">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nama</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $session ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Username</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" value="<?= $nama['username'] ?>" readonly>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-paste"></i> Daftar Konfirmasi Peminjaman</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataRiw" id="dataRiw" width="100%" cellspacing="0">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <td>Sub Bagian</td>
                                    <td>Penanggung Jawab</td>
                                    <td>No Telpon</td>
                                    <td>Tanggal Digunakan</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($riwayat as $riwayat) : ?>
                                    <tr>
                                        <td class="text-center"><?= $riwayat['subbag']; ?></td>
                                        <td class="text-center"><?= $riwayat['nama_anggota']; ?></td>
                                        <td class="text-center"><?= $riwayat['no_hp']; ?></td>
                                        <td class="text-center"><?= $riwayat['tgl_digunakan'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

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