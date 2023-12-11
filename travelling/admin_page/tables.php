<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Destinasi</title>
    <link rel="icon" type="image/x-icon" href="img/logo-title.png">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    window.location.href='../login.php';
                } else {
                // Redirect atau lakukan tindakan tambahan jika pengguna memilih untuk tidak login lagi.
                    }
                </script>";
            exit();
        }
    }else{
        echo "<script>
        if(confirm('Sesi Anda telah habis. Apakah Anda ingin login kembali?')) {
            window.location.href='../login.php';
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
            <a class="sidebar-brand d-flex align-items-center" href="index.php">
                <img src="img/adminprofile.png" style="width: 60px; border-radius: 50%; margin-right: 20px;">
                <div class="sidebar-brand-text">Admin <br>Edu-Travel</div>
            </a>
            <br>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
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
                        <a class="collapse-item" href="customer/customer.php">Customer</a>
                        <a class="collapse-item" href="fasilitas/fasilitas.php">Fasilitas</a>
                        <a class="collapse-item" href="kategori/kategori.php">Kategori</a>
                        <a class="collapse-item" href="reservasi/reservasi.php">Reservasi</a>
                        <a class="collapse-item" href="disukai.php">Destinasi Berdasarkan Like</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Destinasi</span></a>
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
                <div class="container">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Data Destinasi</h6>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-success" style="margin-bottom:10px; margin-top:10px"
                                href="index.php">Home</a>
                            <a class="btn btn-primary" style="margin-bottom:10px; margin-top:10px"
                                href="tambah.php">Tambah
                                Data</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Nama</th>
                                            <th>Gambar</th>
                                            <th>Lokasi</th>
                                            <th>HTM</th>
                                            <th>Deskripsi</th>
                                            <th>Kategori</th>
                                            <th style="width: 30px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once '../koneksi.php';
                                        $sql = "SELECT d.*,k.nama_kategori FROM destinasi AS d join kategori AS k ON d.id_kategori=k.id_kategori";
                                        $query = mysqli_query($koneksi, $sql);
                                        while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $data['nama_destinasi']; ?>
                                                </td>
                                                <td><img src="<?= $data['gambar']; ?>" alt="<?= $data['gambar']; ?>"
                                                        style="width:100px"></td>
                                                <td>
                                                    <?= $data['lokasi']; ?>
                                                </td>
                                                <td>
                                                    <?= $data['harga']; ?>
                                                </td>
                                                <td>
                                                    <?= $data['deskripsi']; ?>
                                                </td>
                                                <td>
                                                    <?= $data['nama_kategori']; ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="edit.php?id_destinasi=<?php echo $data["id_destinasi"] ?>"
                                                        class="label label-warning"> <span
                                                            class="glyphicon glyphicon-pencil"></span>
                                                    </a>
                                                    &nbsp;
                                                    <a href="hapus.php?id_destinasi=<?php echo $data["id_destinasi"] ?>"
                                                        class="label label-danger"> <span
                                                            class="glyphicon glyphicon-trash"></span>
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
                        <span>Copyright &copy; Edu-Travel</span>
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


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>