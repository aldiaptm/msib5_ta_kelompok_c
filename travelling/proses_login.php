<?php
include 'koneksi.php';

// Set sesi menjadi 5 menit (300 detik)
$sesi_waktu_hidup = 60;
session_set_cookie_params($sesi_waktu_hidup);
session_start(); // Mulai session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Lakukan query ke database untuk mencari user dengan username dan password yang sesuai
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    $user = mysqli_fetch_assoc($query);

    if ($user) {
        // Jika user ditemukan, set session dan redirect ke halaman admin
        $_SESSION['username'] = $username;
        $_SESSION['login_time'] = time(); // Catat waktu login

        // Tambahan: Perbarui waktu hidup sesi setelah login
        session_regenerate_id(true);

        header("location: admin_page/index.php");
        exit(); // Pastikan untuk keluar setelah melakukan redirect
    } else {
        // Jika user tidak ditemukan, tampilkan pesan error
        echo "<script>alert('Username atau Password salah.'); window.location.href='login.php';</script>";
        exit(); // Pastikan untuk keluar setelah melakukan redirect
    }
}

// Tambahan: Perbarui waktu hidup sesi jika sesi masih aktif
if (isset($_SESSION['username']) && (time() - $_SESSION['login_time'] > $sesi_waktu_hidup)) {
    session_regenerate_id(true);
    $_SESSION['login_time'] = time();
}
?>