<?php
include '../koneksi.php';
date_default_timezone_set('asia/Jakarta');

// get variable from form inputt
$nama_contact = $_POST["nama_contact"];
$subjek = $_POST["subjek"];
$pesan = $_POST["pesan"];
$tanggal_contact = date('Y-m-d h:i:s');

$query = "INSERT INTO `contact` (`nama_contact`, `subjek`, `pesan`, `tanggal_contact`) VALUES ('$nama_contact', '$subjek', '$pesan', '$tanggal_contact')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "Pesan berhasil dikirim!";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}


header("location:contact.php");

?>
