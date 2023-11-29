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
            var nama = document.getElementById("nama").value;
            var email = document.getElementById("email").value;
            var telepon = document.getElementById("telepon").value;

            if (nama.trim() === '' || email.trim() === '' || telepon.trim() === '') {
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
                <a class="btn btn-success" style="margin-bottom:5px; margin-top:20px;" href="customer.php"> Kembali
                </a><br><br>
                <?php
                include '../../koneksi.php';
                date_default_timezone_set('Asia/Jakarta');

                if (isset($_GET['id_customer'])) {
                    $id_customer = $_GET['id_customer'];
                    $query = mysqli_query($koneksi, "SELECT * FROM customer WHERE id_customer = $id_customer");

                    if (mysqli_num_rows($query) > 0) {
                        $customer = mysqli_fetch_assoc($query);
                    } else {
                        echo "Produk tidak ditemukan.";
                        exit;
                    }
                } else {
                    echo "ID Produk tidak ditemukan.";
                    exit;
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nama = $_POST['nama'];
                    $email = $_POST['email'];
                    $telepon = $_POST['telepon'];

                    $update_query = "UPDATE customer SET nama='$nama', email='$email', telepon='$telepon' WHERE id_customer = $id_customer";
                    $update_result = mysqli_query($koneksi, $update_query);

                    echo "<script>alert('Data berhasil diubah.'); window.location.href='customer.php';</script>";
                }
                ?>

                <h1>Edit Customer</h1>
                <form method="post" onsubmit="return validateForm();">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="<?php echo $customer['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="<?php echo $customer['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon:</label>
                        <input type="text" class="form-control" id="telepon" name="telepon"
                            value="<?php echo $customer['telepon']; ?>">
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