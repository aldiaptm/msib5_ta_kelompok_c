<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Destinasi Berdasarkan Like</title>
    <link rel="icon" type="image/x-icon" href="../img/logo-title.png">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <!-- <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "order": [[2, "desc"]],
                "paging": true,
                "searching": true,
                "info": true,
                "lengthChange": true
            });
        });
    </script>
    <style>
        table {
            border: 1px solid #f2f2f2;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #f2f2f2;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>

    <?php
    session_start();

    // Periksa apakah sesi masih aktif atau sudah habis
    $sesi_waktu_hidup = 1200; // Sesuaikan dengan waktu hidup sesi yang Anda atur pada proses_login.php
    if (isset($_SESSION['login_time'])) {
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
    } else {
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
            <a class="sidebar-brand d-flex align-items-center" href="../index.php">
                <img src="img/adminprofile.png" style="width: 60px; border-radius: 50%; margin-right: 20px;">
                <div class="sidebar-brand-text">Admin <br>Edu-Travel</div>
            </a>
            <br>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
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
            <li class="nav-item">
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
                    <div class="card shadow mb-4 mt-5">
                        <div class="card-body">
                            <div class="table">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="font-size: 12px">
                                            <th>Nama Destinasi</th>
                                            <th>Gambar Destinasi</th>
                                            <th>Jumlah Disukai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once '../koneksi.php';
                                        $sql = "SELECT c.id_destinasi, COUNT(c.id_destinasi) as jumlahlike, d.nama_destinasi, d.gambar FROM customer_like as c join destinasi as d on c.id_destinasi=d.id_destinasi group by id_destinasi";
                                        $query = mysqli_query($koneksi, $sql);
                                        while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                            <tr>
                                                <td style="font-size: 12px; padding-top: 120px">
                                                    <?= $data['nama_destinasi']; ?>
                                                </td>
                                                <td style="text-align: center">
                                                    <img src="<?= $data['gambar']; ?>" alt="<?= $data['gambar']; ?>"
                                                        style="width:250px; height: 250px">
                                                </td>
                                                <td style="font-size: 18px; padding: 100px; padding-left:px; width: 50px">
                                                    <?= $data['jumlahlike']; ?>
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