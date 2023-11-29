<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Customer</title>
    <link rel="icon" type="image/x-icon" href="../img/logo-title.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <?php
    session_start();

    // Periksa apakah sesi masih aktif atau sudah habis
    $sesi_waktu_hidup = 600; // Sesuaikan dengan waktu hidup sesi yang Anda atur pada proses_login.php
    if (time() - $_SESSION['login_time'] > $sesi_waktu_hidup) {
        // Jika sesi telah habis, hapus session dan beri pesan
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
    ?>

    <style>
        body {
            padding: 20px;
            background-color: lightcyan;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <a class="btn btn-success" style="margin-bottom:5px; margin-top:20px;" href="customer.php"> Kembali </a>
                <h1 style="margin-bottom:5px">Tambah Data User</h1>
                <?php
                include '../../koneksi.php';
                ?>
                <form style="margin-top: 20px" action="proses_tambah.php" method="post" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon:</label>
                        <input type="text" class="form-control" id="telepon" name="telepon">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>