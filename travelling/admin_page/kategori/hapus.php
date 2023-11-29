<?php 
include '../../koneksi.php';
$result = mysqli_query($koneksi, "DELETE from customer where `id_customer` = '$_GET[id_customer]'");

echo "<script>alert('Data berhasil dihapus.'); window.location.href='customer.php';</script>";

?>