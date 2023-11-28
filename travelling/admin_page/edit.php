<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script>
        function validateForm() {
            var nama_kategori = document.getElementById("nama_kategori").value;
            var lokasi = document.getElementById("lokasi").value;
            var harga = document.getElementById("harga").value;
            var deskripsi = document.getElementById("deskripsi").value;

            if (nama_kategori.trim() === '' || lokasi.trim() === '' || harga.trim() === '' || deskripsi.trim() === '') {
                alert("Harap isi semua kolom!");
                return false;
            } else {
                alert("Data Berhasil Ditambahkan");
                return true;
            }
        }
    </script>

    <?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("location: ../login.php");
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
                <a class="btn btn-success" style="margin-bottom:5px; margin-top:20px;" href="tables.php"> HOME
                </a><br><br>
                <?php
                include '../koneksi.php';
                date_default_timezone_set('Asia/Jakarta');

                if (isset($_GET['id_destinasi'])) {
                    $id_destinasi = $_GET['id_destinasi'];
                    $query = mysqli_query($koneksi, "SELECT * FROM destinasi WHERE id_destinasi = $id_destinasi");

                    if (mysqli_num_rows($query) > 0) {
                        $destinasi = mysqli_fetch_assoc($query);
                    } else {
                        echo "Produk tidak ditemukan.";
                        exit;
                    }
                } else {
                    echo "ID Produk tidak ditemukan.";
                    exit;
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nama_destinasi = $_POST['nama_destinasi'];
                    $lokasi = $_POST['lokasi'];
                    $harga = $_POST['harga'];
                    $deskripsi = $_POST['deskripsi'];

                    $update_query = "UPDATE destinasi SET nama_destinasi='$nama_destinasi', lokasi='$lokasi', harga='$harga', deskripsi='$deskripsi' WHERE id_destinasi = $id_destinasi";
                    $update_result = mysqli_query($koneksi, $update_query);

                    echo "<script>alert('Data berhasil diubah.'); window.location.href='tables.php';</script>";
                }
                ?>

                <h1>Edit Produk</h1>
                <form method="post" onsubmit="return validateForm();">
                    <div class="form-group">
                        <label for="nama_destinasi">Nama:</label>
                        <input type="text" class="form-control" id="nama_destinasi" name="nama_destinasi"
                            value="<?php echo $destinasi['nama_destinasi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi:</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi"
                            value="<?php echo $destinasi['lokasi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga:</label>
                        <input type="text" class="form-control" id="harga" name="harga"
                            value="<?php echo $destinasi['harga']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                            value="<?php echo $destinasi['deskripsi']; ?>">
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