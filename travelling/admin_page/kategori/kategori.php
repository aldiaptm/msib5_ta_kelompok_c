<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tabel Kategori</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <?php
    session_start();

    // Periksa apakah sesi masih aktif atau sudah habis
    $sesi_waktu_hidup = 600; // Sesuaikan dengan waktu hidup sesi yang Anda atur pada proses_login.php
    if(isset($_SESSION['login_time'])){
        if ((time() - $_SESSION['login_time']) > $sesi_waktu_hidup) {
            // Jika sesi telah habis, hapus session dan beri pesan
            echo "masuk";
            session_unset();
            session_destroy();
            echo "<script>
                if(confirm('Sesi Anda telah habis. Apakah Anda ingin login kembali?')) {
                    window.location.href='../../login.php';
                } else {
                // Redirect atau lakukan tindakan tambahan jika pengguna memilih untuk tidak login lagi.
                    }
                </script>";
            exit();
        }
    }else{
        echo "<script>
        if(confirm('Sesi Anda telah habis. Apakah Anda ingin login kembali?')) {
            window.location.href='../../login.php';
        } else {
        // Redirect atau lakukan tindakan tambahan jika pengguna memilih untuk tidak login lagi.
            }
        </script>";
        exit();
    }
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar"
            style="width: 200px !important;">

            <!-- Sidebar - Brand -->
            <br>
            <a class="sidebar-brand d-flex align-items-center" href="../index.php">
                <img src="img/adminprofile.png" style="width: 60px; border-radius: 50%; margin-right: 20px;">
                <div class="sidebar-brand-text">Admin <br>Edu-Travel</div>
            </a>
            <br>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../customer/customer.php">Customer</a>
                        <a class="collapse-item" href="../fasilitas/fasilitas.php">Fasilitas</a>
                        <a class="collapse-item" href="kategori.php">Kategori</a>
                        <a class="collapse-item" href="../reservasi/reservasi.php">Reservasi</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Kategori</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 p-5">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Data Kategori</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <a class="btn btn-success" style="margin-bottom:10px; margin-top:10px"
                                    href="../index.php">Home</a>
                                <a class="btn btn-primary" style="margin-bottom:10px; margin-top:10px"
                                    href="tambah.php">Tambah Data</a>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="width: 200px;">Nama</th>
                                            <th>Gambar</th>
                                            <th style="width: 50px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once '../../koneksi.php';
                                        $sql = "SELECT * FROM kategori";
                                        $query = mysqli_query($koneksi, $sql);
                                        while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $data['nama_kategori']; ?>
                                                </td>
                                                <td>
                                                    <img src="<?= $data["gambar_kategori"]; ?>"
                                                        alt="<?= $data["gambar_kategori"]; ?>" style="width: 200px;">
                                                </td>
                                                <td>
                                                    <a href=" edit.php?id_kategori=<?php echo $data["id_kategori"] ?>"
                                                        class="label label-warning"> Edit
                                                    </a>
                                                    &nbsp;
                                                    <a href="hapus.php?id_kategori=<?php echo $data["id_kategori"] ?>"
                                                        class="label label-danger"> Delete
                                                    </a>
                                                </td>
                                            </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>
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
                        <span>Copyright &copy; Your Website 2020</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>