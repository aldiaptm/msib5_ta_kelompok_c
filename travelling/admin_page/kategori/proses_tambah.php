<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_kategori = $_POST['nama_kategori'];
    $gambar_kategori_kategori = $_FILES["gambar_kategori"]["name"];

    // Upload Proses
    $target_dir = "../../img/"; // path directory image akan di simpan
    $target_file = $target_dir . basename($_FILES["gambar_kategori"]["name"]); // full path dari image yg akan di simpan
    if (move_uploaded_file($_FILES["gambar_kategori"]["tmp_name"], $target_file)) {
        // echo "The file " . htmlspecialchars(basename($_FILES["gambar"]["name"])) . " has been uploaded.<br>";
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }


    $result = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori, gambar_kategori) VALUES ('$nama_kategori', '$target_file')");

    echo "<script>alert('Data berhasil ditambahkan.'); window.location.href='kategori.php';</script>";
}
?>