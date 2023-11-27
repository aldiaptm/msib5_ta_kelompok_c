<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Lakukan query ke database untuk mencari user dengan username dan password yang sesuai
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    $user = mysqli_fetch_assoc($query);

    if ($user) {
        // Jika user ditemukan, redirect ke halaman admin
        header("location: admin_page/index.php");
    } else {
        // Jika user tidak ditemukan, tampilkan pesan error
        $error_message = "Username atau password salah";
        header("location: login.php?error=$error_message");
    }
}
?>