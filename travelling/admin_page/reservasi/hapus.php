<?php 
include '../../koneksi.php';
$result = mysqli_query($koneksi, "DELETE from reservasi where `id_reservasi` = '$_GET[id_reservasi]'");

echo "<script>alert('Data berhasil dihapus.'); window.location.href='reservasi.php';</script>";

?>