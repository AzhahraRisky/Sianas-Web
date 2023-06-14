<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Perawatan Kendaraan Service</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Perawatan Service</h6>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <td class="text-center">Jenis Kendaraan</td>
                                    <td class="text-center">No Plat</td>
                                    <td class="text-center">Tanggal Perawatan</td>
                                    <td class="text-center">Bukti</td>
                                    <td class="text-center">Status</td>
                                    <td class="text-center">Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($service as $service) : ?>
                                    <tr>
                                        <td class="text-center"><?= $service['jenis_mobil']; ?></td>
                                        <td class="text-center"><?= $service['no_plat']; ?></td>
                                        <td class="text-center"><?php echo date('j M Y', strtotime($service['tgl_service'])) ?></td>
                                        <td class="text-center"><?php
                                                                if ($service['bukti'] == null) {
                                                                    echo '<span class="badge badge-secondary">No Data!</span>';
                                                                } else {
                                                                    echo '<img class="border-right rounded-lg shadow img-thumbnail" src="' . base_url('assets/data/service/' . $service['bukti']) . '" alt="foto_bukti" style="width:30px; height:30px;">';
                                                                }
                                                                ?></td>
                                        <td class="text-center"><?php if ($service['konfirmasi'] == "Dikonfirmasi") {
                                                                    echo '<span class="badge badge-success">Dikonfirmasi</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-danger">Dicancel</span>';
                                                                } ?></td>
                                        <td class="text-center"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#konfirmasiModal<?= $service['no_service'] ?>"><i class="fas fa edit"></i>Edit</button></td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="konfirmasiModal<?= $service['no_service'] ?>" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="konfirmasiModalLabel<?= $service['no_service'] ?>">Detail Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="<?= base_url('perawatan/konfirmasi/') . $service['no_service'] ?>" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Jenis Kendaraan</label>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $service['jenis_mobil'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">No Plat</label>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $service['no_plat'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Tanggal Perawatan</label>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo date('j M Y', strtotime($service['tgl_service'])) ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Status</label>
                                                                <select id="konfirmasi" class="form-control" name="konfirmasi">
                                                                    <option selected disabled>- Pilih -</option>
                                                                    <option value="Dikonfirmasi">Dikonfirmasi</option>
                                                                    <option value="Ditolak">Ditolak</option>
                                                                </select>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
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