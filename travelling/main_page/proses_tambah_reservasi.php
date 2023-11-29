<?php 
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

// get variable from form input
$nama = $_POST["nama"];
$tanggal = date('Y-m-d h:i:s');
$destinasi = $_POST["destinasi"];
$fasilitas = $_POST["fasilitas"];
$pembayaran = $_POST["pembayaran"];

$result = mysqli_query($koneksi, "INSERT INTO `reservasi` (`id_reservasi`, `id_customer`, `reservasi_tanggal`, `id_destinasi`, `id_fasilitas`, `id_pembayaran`) VALUES (Null, '$nama', '$tanggal', '$destinasi', '$fasilitas', '$pembayaran');");

if ($result) {
    // Data berhasil dimasukkan, tampilkan alert dan kembali ke halaman reservation
    echo '<script>alert("Destinasi wisata berhasil dipesan!"); window.location.href = "reservation.php";</script>';
    die(); // tambahkan ini jika diperlukan
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    header("location:reservation.php");
}

?>