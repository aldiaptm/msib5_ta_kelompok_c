<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipe = $_POST['tipe'];
    $keterangan = $_POST['keterangan'];

    $result = mysqli_query($koneksi, "INSERT INTO fasilitas (tipe, keterangan) VALUES ('$tipe', '$keterangan')");

    echo "<script>alert('Data berhasil ditambahkan.'); window.location.href='fasilitas.php';</script>";
}
?>