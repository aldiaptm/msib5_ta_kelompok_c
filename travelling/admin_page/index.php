<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EDU - TRAVEL</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
        .footer {
            padding-left: 10px;
            line-height: 50px;
            position: absolute;
            bottom: 0px;
            right: 20px;
        }

        th {
            width: 500px;
            text-align: center;
        }

        td {
            text-align: center;
            color: red;
            font-size: bold;
        }

        h1 {
            font-size: 50px;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            color: darkgrey;
            padding: 40px;
            margin-bottom: 100px;
        }

        .logout {
            margin-top: 150px;
        }

    </style>

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
                    </div>
                </div>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
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
        <div class="container">

            <!-- Main Content -->
            <div id="content">
                <h1>
                    SELAMAT DATANG DI HALAMAN ADMIN EDU-TRAVEL
                </h1>
            </div>

            <?php
            include '../koneksi.php';
            ?>
            <table class="table table-bordered" style="">
                <thead>
                    <tr>
                        <th>
                            <a href="tables.php">Jumlah Destinasi Wisata</a>
                        </th>
                        <th>
                            <a href="fasilitas/fasilitas.php">Jumlah Fasilitas</a>
                        </th>
                        <th>
                            <a href="reservasi/reservasi.php">Jumlah Reservasi</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    ?>
                    <tr>
                        <td>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT COUNT(id_destinasi) AS totaldestinasi FROM destinasi;");
                            $data = mysqli_fetch_array($query); ?>
                            <?php echo $data["totaldestinasi"] ?>
                        </td>
                        <td>
                            <?php
                            $ambil = mysqli_query($koneksi, "SELECT COUNT(id_fasilitas) AS totalfasilitas FROM fasilitas;");
                            $isi = mysqli_fetch_array($ambil); ?>
                            <?php echo $isi["totalfasilitas"] ?>
                        </td>
                        <td>
                            <?php
                            $cokot = mysqli_query($koneksi, "SELECT COUNT(id_reservasi) AS totalreservasi FROM reservasi;");
                            $eusi = mysqli_fetch_array($cokot); ?>
                            <?php echo $eusi["totalreservasi"] ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="logout">
                <a class="btn btn-success" style="margin-bottom:10px; margin-top:10px" href="../logout.php">Logout</a>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <div class="footer">
                <span>Copyright &copy; Edu-Travel</span>
            </div>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

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