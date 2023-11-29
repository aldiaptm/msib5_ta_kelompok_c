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

    <?php
    session_start();

    // Periksa apakah sesi masih aktif atau sudah habis
    $sesi_waktu_hidup = 600; // Sesuaikan dengan waktu hidup sesi yang Anda atur pada proses_login.php
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
            color: black;
            font-size: bold;
        }

        h1 {
            font-size: 50px;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            color: darkgrey;
            padding: 40px;
            margin-bottom: 50px;
        }

        .logout {
            margin-top: 150px;
        }

        .table {
            border: 0px;
        }
    </style>

</head>

<body id="page-top">
    <?php
    include '../koneksi.php';
    ?>
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM admin;");
    $data = mysqli_fetch_array($query); ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar"
            style="width: 200px !important;">

            <!-- Sidebar - Brand -->
            <br>
            <a class="sidebar-brand d-flex align-items-center" href="index.php">
                <img src="<?php echo $data["profile"] ?>" style="width: 60px; border-radius: 50%; margin-right: 20px;">
                <div class="sidebar-brand-text">
                    <?php echo $data["nama_admin"] ?>
                </div>
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
        <div class="container">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT COUNT(id_contact) AS totalcontact FROM contact;");
                                    $data = mysqli_fetch_array($query); ?>
                                    <?php echo $data["totalcontact"] ?>
                                </span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown" style="width:">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM contact;");
                                ?>
                                <?php
                                if (mysqli_num_rows($query) > 0) {
                                    while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="font-weight-bold">
                                                <div class="text">
                                                    <?php echo $data["pesan"] ?>
                                                </div>
                                                <div class="text">
                                                    <i>
                                                        <?php echo $data["nama_contact"] ?>
                                                    </i>
                                                </div>
                                            </div>
                                        </a>
                                    <?php }
                                } ?>
                                <center>
                                    <a class="btn btn-danger mt-3 mb-3"
                                        style="width: 50px; height: 20px; font-size: 8px; padding: 5px;"
                                        href="hapus_pesan.php">Hapus</a>
                                </center>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM admin;");
                            $data = mysqli_fetch_array($query);
                            ?>
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $data["nama_admin"] ?>
                                </span>
                                <img class="img-profile rounded-circle" src="<?php echo $data["profile"] ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../logout.php" style="font-size: 12px; color: green;">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <h1>
                    SELAMAT DATANG DI HALAMAN ADMIN EDU-TRAVEL
                </h1>
            </div>
            <div class="container d-flex text-center" style="width: 80%;">
                <div class="col-6">
                    <a class="fas fa-fw fa-list fa-lg" href="tables.php"></a><br>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT COUNT(id_destinasi) AS totaldestinasi FROM destinasi;");
                    $data = mysqli_fetch_array($query); ?>
                    <a href="tables.php" style="text-decoration: none; font-weight: bold;">Jumlah Destinasi</a><br><br>
                    <b style="font-size: 18px;"><?php echo $data["totaldestinasi"] ?></b>
                </div>
                <div class="col-6">
                    <a class="fas fa-fw fa-file" href="fasilitas/fasilitas.php"></a><br>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT COUNT(id_fasilitas) AS totalfasilitas FROM fasilitas;");
                    $data = mysqli_fetch_array($query); ?>
                    <a href="fasilitas/fasilitas.php" style="text-decoration: none; font-weight: bold;">Jumlah Fasilitas</a><br><br>
                    <b style="font-size: 18px;"><?php echo $data["totalfasilitas"] ?></b>
                </div>
            </div>
            <br><br><br>
            <div class="container d-flex text-center" style="width: 80%;">
                <div class="col-6">
                    <a class="fa fa-fw fa-user fa-lg" href="customer/customer.php"></a><br>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT COUNT(id_customer) AS totalcustomer FROM customer;");
                    $data = mysqli_fetch_array($query); ?>
                    <a href="customer/customer.php" style="text-decoration: none; font-weight: bold;">Jumlah Customer</a><br><br>
                    <b style="font-size: 18px;"><?php echo $data["totalcustomer"] ?></b>
                </div>
                <div class="col-6">
                    <a class="fas fa-fw fa-address-book" href="reservasi/reservasi.php"></a><br>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT COUNT(id_reservasi) AS totalreservasi FROM reservasi;");
                    $data = mysqli_fetch_array($query); ?>
                    <a href="reservasi/reservasi.php" style="text-decoration: none; font-weight: bold;">Jumlah Reservasi</a><br><br>
                    <b style="font-size: 18px;"><?php echo $data["totalreservasi"] ?></b>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <div class="footer">
                <span style="color: grey">Copyright &copy; Edu-Travel</span>
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