<?php 
include '../../koneksi.php';
$result = mysqli_query($koneksi, "DELETE from kategori where `id_kategori` = '$_GET[id_kategori]'");

echo "<script>alert('Data berhasil dihapus.'); window.location.href='kategori.php';</script>";

?>