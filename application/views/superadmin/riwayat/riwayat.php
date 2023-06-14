<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Pengguna</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <?php if ($this->session->flashdata('flash')) {
                echo '<p class="warning" style="margin: 10px 20px;">' . $this->session->flashdata('flash') . '</p>';
            } ?>
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Penggunaan</h6>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <td>Jenis Kendaraan</td>
                                    <td>No Plat</td>
                                    <td>Sub Bagian / Komisi</td>
                                    <td>Penanggung Jawab</td>
                                    <td>Konfirmasi</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($riwayat as $riwayat) : ?>
                                    <tr>
                                        <td class="text-center"><?= $riwayat['jenis_mobil']; ?></td>
                                        <td class="text-center"><?= $riwayat['no_plat']; ?></td>
                                        <td class="text-center"><?= $riwayat['subbag']; ?></td>
                                        <td class="text-center"><?= $riwayat['penanggung_jawab']; ?></td>
                                        <td class="text-center"><?php if ($riwayat['konfirmasi'] == "Dikonfirmasi") {
                                                                    echo '<span class="badge badge-success">Dikonfirmasi</span>';
                                                                } else if ($riwayat['konfirmasi'] == "Menunggu") {
                                                                    echo '<span class="badge badge-info">Menunggu</span>';
                                                                } else if ($riwayat['konfirmasi'] == "Ditolak") {
                                                                    echo '<span class="badge badge-danger">Ditolak</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-danger">Dicancel</span>';
                                                                } ?></td>
                                        <td class="text-center"><b><a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#infoModal<?= $riwayat['no_pengajuan'] ?>"><i class="fas fa-solid fa-eye"></i></a></b>
                                            <!-- <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancelModal<?= $riwayat['no_pengajuan'] ?>"><i class="fa fa-times"></i></a> -->
                                            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                        </td>
                                        <!-- Modal Info -->
                                        <div class="modal fade" id="infoModal<?= $riwayat['no_pengajuan'] ?>" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="infoModalLabel">Detail Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('user/edit_riwayat/') . $riwayat['no_pengajuan']; ?>" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Jenis Kendaraan</label>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['jenis_mobil'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Nomer Plat</label>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['no_plat'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Tujuan</label>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['tujuan_1'] ?>" readonly><br>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['tujuan_2'] ?>" readonly><br>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['tujuan_3'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Alamat</label>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['alamat_1'] ?>" readonly><br>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['alamat_2'] ?>" readonly><br>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['alamat_3'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Kota</label>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['kota_1'] ?>" readonly><br>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['kota_2'] ?>" readonly><br>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['kota_3'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Kota</label>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['kota_1'] ?>" readonly><br>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['kota_2'] ?>" readonly><br>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['kota_3'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Banyak Penumpang</label>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['muatan'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Tanggal Digunakan</label>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['tgl_digunakan'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Tanggal Kembali</label>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['tgl_kembali'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">KM Awal</label>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $riwayat['km_awal'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="akhir">KM Akhir</label>
                                                                <input type="number" class="form-control" id="akhir" name="akhir" value="<?= $riwayat['km_akhir'] ?>" readonly>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Cancel -->
                                        <div class="modal fade" id="cancelModal<?= $riwayat['no_pengajuan'] ?>" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="cancelModalLabel">Perhatian !</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('user/edit_riwayat/') . $riwayat['no_pengajuan']; ?>" method="POST" enctype="multipart/form-data">
                                                            <p>Apakah anda yakin ingin meng cancel peminjaman? Jika iya klik oke untuk melanjutkan</p>
                                                            <input type="hidden" name="konfirmasi" value="Dicancel">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-success">Oke</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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