<?php
// Mulai sesi
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Hapus sesi secara menyeluruh
session_destroy();

// Redirect ke halaman login
header("location: login.php");
exit;
?>