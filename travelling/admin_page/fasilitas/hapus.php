<?php 
include '../../koneksi.php';
$result = mysqli_query($koneksi, "DELETE from fasilitas where `id_fasilitas` = '$_GET[id_fasilitas]'");

echo "<script>alert('Data berhasil dihapus.'); window.location.href='fasilitas.php';</script>";

?>