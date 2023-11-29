<?php 
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');
// get variable from form input
$nama = $_POST["nama"];
$pesan = $_POST["pesan"];
$tanggal_ulasan = date('Y-m-d h:i:s');

$result = mysqli_query($koneksi, "INSERT INTO `ulasan` (`id_ulasan`, `nama`, `pesan`, `tanggal_ulasan`) VALUES (Null, '$nama', '$pesan', '$tanggal_ulasan');");

if ($result) {
    // Data berhasil dimasukkan, tampilkan alert ke halaman testimonial
    echo '<script>alert("Ulasan berhasil di kirim!"); window.location.href = "testimonial.php";</script>';
    die(); // tambahkan ini jika diperlukan
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    header("location:testimonial.php");
}

?>