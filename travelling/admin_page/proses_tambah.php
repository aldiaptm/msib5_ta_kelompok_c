<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_destinasi = $_POST['nama_destinasi'];
    $gambar = $_POST['gambar'];
    $lokasi = $_POST['lokasi'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $id_kategori = $_POST['id_kategori'];

    // Upload Proses
    $target_dir = "../img/"; // path directory image akan di simpan
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]); // full path dari image yg akan di simpan
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["gambar"]["name"])) . " has been uploaded.<br>";
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }


    $result = mysqli_query($koneksi, "INSERT INTO destinasi (nama_destinasi, gambar, lokasi, harga, deskripsi, id_kategori) VALUES ('$nama_destinasi', '$target_file', '$lokasi', '$harga', '$deskripsi', '$id_kategori')");
}
header("Location:tables.php");
?>