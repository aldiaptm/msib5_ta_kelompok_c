<?php 
include '../koneksi.php';
$result = mysqli_query($koneksi, "DELETE from destinasi where `id_destinasi` = '$_GET[id_destinasi]'");

echo "<script>alert('Data berhasil dihapus.'); window.location.href='tables.php';</script>";

?>