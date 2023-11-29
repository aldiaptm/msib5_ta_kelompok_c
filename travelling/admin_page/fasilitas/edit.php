<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script>
        function validateForm() {
            var tipe = document.getElementById("tipe").value;
            var keterangan = document.getElementById("keterangan").value;

            if (tipe.trim() === '' || keterangan.trim() === '') {
                alert("Harap isi semua kolom!");
                return false;
            } else {
                return true;
            }
        }
    </script>

    <?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("location: ../../login.php");
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
    <div class="container" style="width: 500px;">
        <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-success" style="margin-bottom:5px; margin-top:20px;" href="fasilitas.php"> Kembali
                </a><br><br>
                <?php
                include '../../koneksi.php';
                date_default_timezone_set('Asia/Jakarta');

                if (isset($_GET['id_fasilitas'])) {
                    $id_fasilitas = $_GET['id_fasilitas'];
                    $query = mysqli_query($koneksi, "SELECT * FROM fasilitas WHERE id_fasilitas = $id_fasilitas");

                    if (mysqli_num_rows($query) > 0) {
                        $fasilitas = mysqli_fetch_assoc($query);
                    } else {
                        echo "Produk tidak ditemukan.";
                        exit;
                    }
                } else {
                    echo "ID Produk tidak ditemukan.";
                    exit;
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $tipe = $_POST['tipe'];
                    $keterangan = $_POST['keterangan'];

                    $update_query = "UPDATE fasilitas SET tipe='$tipe', keterangan='$keterangan' WHERE id_fasilitas = $id_fasilitas";
                    $update_result = mysqli_query($koneksi, $update_query);

                    echo "<script>alert('Data berhasil diubah.'); window.location.href='fasilitas.php';</script>";
                }
                ?>

                <h1>Edit Fasilitas</h1>
                <form method="post" onsubmit="return validateForm();">
                    <div class="form-group">
                        <label for="tipe">Tipe:</label>
                        <input type="text" class="form-control" id="tipe" name="tipe"
                            value="<?php echo $fasilitas['tipe']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan:</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                            value="<?php echo $fasilitas['keterangan']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>