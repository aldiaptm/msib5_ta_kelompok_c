<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    $result = mysqli_query($koneksi, "INSERT INTO customer (nama, email, telepon) VALUES ('$nama', '$email', '$telepon')");

    echo "<script>alert('Data berhasil ditambahkan.'); window.location.href='index.php';</script>";
}
?>