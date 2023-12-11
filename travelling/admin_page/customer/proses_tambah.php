<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    // Hash password sebelum menyimpan ke database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $result = mysqli_query($koneksi, "INSERT INTO customer (username, password, nama, email, telepon) VALUES ('$username', '$hashedPassword', '$nama', '$email', '$telepon')");

    echo "<script>alert('Data berhasil ditambahkan.'); window.location.href='customer.php';</script>";
}
?>