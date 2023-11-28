<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

// get variable from form input
$nama_contact = mysqli_real_escape_string($koneksi, $_POST["nama_contact"]);
$subjek = mysqli_real_escape_string($koneksi, $_POST["subjek"]);
$pesan = mysqli_real_escape_string($koneksi, $_POST["pesan"]);
$tanggal_contact = date('Y-m-d h:i:s');

$query = "INSERT INTO `contact` (`nama_contact`, `subjek`, `pesan`, `tanggal_contact`) VALUES ('$nama_contact', '$subjek', '$pesan', '$tanggal_contact')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Data berhasil dimasukkan, tampilkan alert dan kembali ke halaman contact
    echo '<script>alert("Pesan berhasil dikirim!"); window.location.href = "contact.php";</script>';
    die(); // tambahkan ini jika diperlukan
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    header("location:contact.php");
}
?>
