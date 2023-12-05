<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="icon" type="image/x-icon" href="../img/logo-title.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script>
        function validateForm() {
            var nama = document.getElementById("nama_kategori").value;

            if (nama.trim() === '') {
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
                <a class="btn btn-success" style="margin-bottom:5px; margin-top:20px;" href="kategori.php"> Kembali
                </a><br><br>
                <?php
                include '../../koneksi.php';
                date_default_timezone_set('Asia/Jakarta');

                if (isset($_GET['id_kategori'])) {
                    $id_kategori = $_GET['id_kategori'];
                    $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori = $id_kategori");

                    if (mysqli_num_rows($query) > 0) {
                        $kategori = mysqli_fetch_assoc($query);
                    } else {
                        echo "Produk tidak ditemukan.";
                        exit;
                    }
                } else {
                    echo "ID Produk tidak ditemukan.";
                    exit;
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nama_kategori = $_POST['nama_kategori'];
                    
                    $update_query = "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori = $id_kategori";
                    $update_result = mysqli_query($koneksi, $update_query);

                    echo "<script>alert('Data berhasil diubah.'); window.location.href='kategori.php';</script>";
                }
                ?>

                <h1>Edit Kategori</h1>
                <form method="post" onsubmit="return validateForm();">
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori:</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                            value="<?php echo $kategori['nama_kategori']; ?>">
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