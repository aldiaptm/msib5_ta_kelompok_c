<?php 
include '../koneksi.php';
$result = mysqli_query($koneksi, "DELETE FROM contact");

echo "<script>alert('Pesan berhasil dihapus.'); window.location.href='index.php';</script>";

?>