<?php
session_start();
include '../koneksi.php';

// Check if user is logged in
if (isset($_SESSION['username'])) {
    $loggedInUsername = $_SESSION['username'];
} else {
    // If user is not logged in, redirect to login page
    header("Location: login.php"); // Ganti "login.php" dengan halaman login yang sesuai
    exit(); // Pastikan tidak ada kode HTML atau PHP yang dieksekusi setelah header
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EDU - TRAVELER</title>
    <link rel="icon" type="image/x-icon" href="img/logo-title.png">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <?php
    // Generate Nonce
    $nonce = uniqid();

    // Tambahkan nonce ke URL di Facebook SDK
    ?>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0&appId=843220474218882&autoLogAppEvents=1&status=1&cookie=1&oauth=1&nonce=<?php echo $nonce; ?>&accessToken=9ee6a140d64b70171b2e2879789ac516"></script>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>edutravel@gmail.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+622 540 12</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" href="https://www.facebook.com">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary px-3" href="https://www.twitter.com">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary px-3" href="https://www.linkedin.com">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-primary px-3" href="https://www.instagram.com">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-primary pl-3" href="https://www.youtube.com">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="index.php" class="navbar-brand">
                    <h1 class="m-0 text-primary"><span class="text-dark">EDU</span>TRAVEL</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="reservation.php" class="nav-item nav-link">Reservation</a>
                        <a href="destination.php" class="nav-item nav-link">Destination</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="category.php" class="dropdown-item">Category</a>
                                <a href="developer.php" class="dropdown-item">Developer</a>
                                <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                        <?php
                        if (isset($loggedInUsername)) {
                            ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    <?php echo $loggedInUsername; ?>
                                </a>
                                <div class="dropdown-menu border-0 rounded-0 m-0">
                                    <a href="logout.php" class="dropdown-item">Logout</a>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Customer</a>
                                <div class="dropdown-menu border-0 rounded-0 m-0">
                                    <a href="logout.php" class="dropdown-item">Logout</a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Detail Destinasi</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="index.php">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase"><a class="text-white" href="destination.php">Destination</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Destination Detail</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!--Detail Destination Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <?php
                include '../koneksi.php';
                $id_terima = $_GET['id_destinasi'];
                $destinasi = mysqli_query($koneksi, "SELECT * FROM `destinasi` as d JOIN `kategori` as k ON d.id_kategori=k.id_kategori where d.id_destinasi=$id_terima;");

                if (mysqli_num_rows($destinasi) > 0) {
                    while ($d = mysqli_fetch_array($destinasi)) {
                        $gambar = $d["gambar"];
                        $id_destinasi = $d["id_destinasi"];
                        $nama_kategori = $d["id_kategori"];
                        $nama_kategori = $d["nama_kategori"];
                        $lokasi = $d["lokasi"];
                        $harga = $d["harga"];
                        $nama_destinasi = $d["nama_destinasi"];
                        $deskripsi = $d["deskripsi"];
                    }
                }
                ?>
                <div class="col-lg-8">
                    <!-- Destination Detail Start -->
                    <div class="pb-3">
                        <div class="blog-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="<?php echo $gambar ?>" style="height:600px">
                                <div class="blog-date">
                                    <h6 class="font-weight-bold mb-n1">
                                        <?php echo $id_destinasi ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="text-primary text-decoration-none"><i
                                        class="fas fa-tag text-primary mr-2"></i>
                                    <?php echo $nama_kategori ?>
                                </div>
                                <div class="text-primary  text-decoration-none"><i
                                        class="fa fa-map-marker-alt text-primary mr-2"></i>
                                    <?php echo $lokasi ?>
                                </div>
                                <div class="text-primary text-decoration-none"><i class="fas text-primary mr-2">HTM :
                                    </i>
                                    <?php echo "Rp. " . number_format($harga, 0, ',', '.') ?>
                                </div>
                            </div>
                            <h2 class="mb-3">
                                <?php echo $nama_destinasi ?>
                            </h2>
                            <p>
                                <?php echo $deskripsi ?>
                            </p>
                        </div>
                        <!-- Like Button Start -->
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <!-- Tambahkan Button dengan Icon Like -->
                            <form id="likeForm" action="proses_like_destinasi.php" method="post">
                                <input type="hidden" name="id_customer" value="<?php echo $id_customer; ?>">
                                <input type="hidden" name="id_destinasi" value="<?php echo $id_destinasi; ?>">
                                <?php
                                $query = mysqli_query($koneksi, "SELECT COUNT(id_like) as jumlah FROM `customer_like` where id_destinasi=$id_destinasi;");
                                $data = mysqli_fetch_array($query); ?>
                                <p> Disukai oleh
                                    <b>
                                        <?php echo $data["jumlah"] ?>
                                    </b>
                                    orang
                                </p>
                                <button type="submit" class="btn btn-primary">
                                    Like <i class="fas fa-thumbs-up"></i>
                                </button>

                                <div class="bg-white mb-3 mt-3" style="padding: 0px;">
                                    <div class="fb-share-button" data-layout="button" data-size="large"
                                        data-href="localhost/msib5_ta_kelompok_c/travelling/main_page/detail_destination.php?id_destinasi=<?php echo $id_destinasi; ?>">
                                        <a target="_blank"
                                            href="https://www.facebook.com/sharer/sharer.php?u=localhost/msib5_ta_kelompok_c/travelling/main_page/detail_destination.php?id_destinasi=<?php echo $id_destinasi; ?>&amp;src=sdkpreparse"
                                            class="fb-xfbml-parse-ignore">Share To Facebook</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Like Button End -->
                    </div>
                    <!-- Destination Detail End -->

                    <!-- Fasilitas Destination Start -->
                    <div class="d-flex flex-column bg-white mb-5 py-5 px-4">
                        <h4 class="text-uppercase mb-3" style="letter-spacing: 5px;">Fasilitas Yang Tersedia</h4>
                        <div class="bg-white">
                            <?php
                            include '../koneksi.php';
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM `fasilitas` where id_fasilitas=id_fasilitas;");
                            ?>
                            <?php
                            if (mysqli_num_rows($query) > 0) {
                                while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                    <p class="text-primary">Tipe Fasilitas
                                        <?php echo $no ?> :
                                    </p>
                                    <p>
                                        <?php echo $data["tipe"] ?>
                                    </p>
                                    <p class="text-primary">Deskripsi Fasilitas :</p>
                                    <p>
                                        <?php echo $data["keterangan"] ?>
                                    </p> <br>
                                    <?php $no++;
                                } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Fasilitas Destination End -->

                    <!-- Comment Form Start -->
                    <div class="bg-white mb-3" style="padding: 30px;">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Berikan Ulasan</h4>
                        <?php
                        include '../koneksi.php';
                        ?>
                        <form action="proses_tambah_ulasan.php" method="post" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="nama" class="text-primary">Nama <span style="color:red">*</span></label>
                                <input type="text" class="form-control" name="nama" id="nama">
                            </div>
                            <div class="form-group">
                                <label for="pesan" class="text-primary">Komentar <span
                                        style="color:red">*</span></label>
                                <textarea id="pesan" cols="30" rows="5" name="pesan" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Simpan" name="submit"
                                    class="btn btn-primary font-weight-semi-bold py-2 px-3">
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End -->
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Category List -->
                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Kategori</h4>
                        <div class="bg-white" style="padding: 30px;">
                            <?php
                            include '../koneksi.php';

                            $query = mysqli_query($koneksi, "SELECT * FROM `kategori` where id_kategori=id_kategori;");

                            if (mysqli_num_rows($query) > 0) {
                                while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                    <ul class="list-inline m-0">
                                        <li class="mb-3 d-flex justify-content-between align-items-center">
                                            <a class="text-dark"
                                                href="detail_kategori.php?id_kategori=<?php echo $data["id_kategori"] ?>"><i
                                                    class="fa fa-angle-right text-primary mr-2"></i>
                                                <?php echo $data["nama_kategori"] ?>
                                            </a>
                                        </li>
                                    </ul>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Category List End -->

                    <!-- Tag Cloud -->
                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Tag Cloud</h4>
                        <div class="d-flex flex-wrap m-n1">
                            <a href="index.php" class="btn btn-light m-1">Home</a>
                            <a href="about.php" class="btn btn-light m-1">About</a>
                            <a href="reservation.php" class="btn btn-light m-1">Reservation</a>
                            <a href="category.php" class="btn btn-light m-1">Category</a>
                            <a href="destination.php" class="btn btn-light m-1">Destination</a>
                            <a href="developer.php" class="btn btn-light m-1">Developer</a>
                            <a href="testimonial.php" class="btn btn-light m-1">Testimonial</a>
                            <a href="contact.php" class="btn btn-light m-1">Contact</a>
                        </div>
                    </div>
                    <!-- Category List End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Detail Destination End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">EDU</span>TRAVEL</h1>
                </a>
                <p>Sed ipsum clita tempor ipsum ipsum amet sit ipsum lorem amet labore rebum lorem ipsum dolor. No sed
                    vero lorem dolor dolor</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-outline-primary btn-square mr-2" href="https://www.twitter.com"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="https://www.facebook.com"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="https://www.linkedin.com"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary btn-square" href="https://www.instagram.com"><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Our Services</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="about.php"><i class="fa fa-angle-right mr-2"></i>About</a>
                    <a class="text-white-50 mb-2" href="destination.php"><i
                            class="fa fa-angle-right mr-2"></i>Destination</a>
                    <a class="text-white-50 mb-2" href="reservation.php"><i
                            class="fa fa-angle-right mr-2"></i>Reservation</a>
                    <a class="text-white-50 mb-2" href="category.php"><i class="fa fa-angle-right mr-2"></i>Category</a>
                    <a class="text-white-50 mb-2" href="developer.php"><i
                            class="fa fa-angle-right mr-2"></i>Developer</a>
                    <a class="text-white-50 mb-2" href="testimonial.php"><i
                            class="fa fa-angle-right mr-2"></i>Testimonial</a>
                    <a class="text-white-50 mb-2" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Usefull Links</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="about.php"><i class="fa fa-angle-right mr-2"></i>About</a>
                    <a class="text-white-50 mb-2" href="destination.php"><i
                            class="fa fa-angle-right mr-2"></i>Destination</a>
                    <a class="text-white-50 mb-2" href="reservation.php"><i
                            class="fa fa-angle-right mr-2"></i>Reservation</a>
                    <a class="text-white-50 mb-2" href="category.php"><i class="fa fa-angle-right mr-2"></i>Category</a>
                    <a class="text-white-50 mb-2" href="developer.php"><i
                            class="fa fa-angle-right mr-2"></i>Developer</a>
                    <a class="text-white-50 mb-2" href="testimonial.php"><i
                            class="fa fa-angle-right mr-2"></i>Testimonial</a>
                    <a class="text-white-50 mb-2" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contact Us</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Indonesia</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+622 540 12</p>
                <p><i class="fa fa-envelope mr-2"></i>edutravel@gmail.com</p>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5"
        style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="index.php">Edu-Travel</a>.
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <p class="m-0 text-white-50">Designed by <a href="developer.php">Developer</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

<!-- Validasi menggunakan javascript-->
<script>
    function validateForm() {
        var nama = document.getElementById('nama').value;
        var pesan = document.getElementById('pesan').value;

        if (nama == "" || pesan == "") {
            alert('Form tidak boleh kosong!');
            return false;
        }
        return true;
    }
</script>

<!-- JavaScript untuk Like -->
<script>
    // Fungsi untuk menangani tombol Like
    function likeDestination() {
        // Submit form saat tombol Like ditekan
        document.getElementById("likeForm").submit();
    }

    // Menambahkan event listener ke tombol Like
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("likeForm").addEventListener("submit", function (event) {
            event.preventDefault(); // Menghentikan perilaku default form
            likeDestination();
        });
    });
</script>
<?php
// Mendapatkan nonce dari permintaan
$receivedNonce = $_GET['nonce']; // atau $_POST['nonce'] tergantung metode permintaan

// Membandingkan dengan nilai yang dihasilkan sebelumnya
if ($receivedNonce === $nonce) {
    // Nonce valid, lanjutkan pemrosesan
    // ...
} else {
    // Nonce tidak valid, tangani kesalahan atau tolak permintaan
    // ...
}
?>

</html>