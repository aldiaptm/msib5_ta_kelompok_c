<?php 
include '../koneksi.php';

// get variable from form input
$nama = $_POST["nama"];
$pesan = $_POST["pesan"];
$tanggal_ulasan = date('Y-m-d h:i:s');

$result = mysqli_query($koneksi, "INSERT INTO `ulasan` (`id_ulasan`, `nama`, `pesan`, `tanggal_ulasan`) VALUES (Null, '$nama', '$pesan', '$tanggal_ulasan');");

header("location:testimonial.php");

?>