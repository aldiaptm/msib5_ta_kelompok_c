<?php
session_start();
include '../koneksi.php';

// Check if user is logged in
if (isset($_SESSION['username'])) {
    $loggedInUsername = $_SESSION['username'];

    // Retrieve id_customer based on the username
    $queryCustomer = mysqli_query($koneksi, "SELECT id_customer FROM customer WHERE username = '$loggedInUsername'");

    if ($queryCustomer && $customerData = mysqli_fetch_assoc($queryCustomer)) {
        $id_customer = $customerData['id_customer'];
    } else {
        // Handle the case where id_customer cannot be retrieved
        header("Location: logout.php"); // Redirect to logout page or another suitable page
        exit();
    }
} else {
    // If user is not logged in, redirect to login page
    header("Location: login.php"); // Redirect to the login page
    exit();
}

// Mendapatkan id_destinasi dari form
$id_destinasi = $_POST['id_destinasi'];

// Cek apakah customer sudah pernah like destinasi ini sebelumnya
$queryCheckLike = mysqli_query($koneksi, "SELECT * FROM customer_like WHERE id_customer = $id_customer AND id_destinasi = $id_destinasi");

if (mysqli_num_rows($queryCheckLike) == 0) {
    // Jika customer belum pernah like, tambahkan data ke tabel customer_like
    $insertQuery = "INSERT INTO customer_like (id_customer, id_destinasi) VALUES ('$id_customer', '$id_destinasi')";

    if (mysqli_query($koneksi, $insertQuery)) {
        // Redirect atau berikan respon sesuai kebutuhan
        echo '<script>alert("Destinasi berhasil disukai!"); window.location.href = "detail_destination.php?id_destinasi=' . $id_destinasi . '";</script>';
        exit();
    } else {
        // Handle error jika gagal eksekusi query INSERT
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika customer sudah pernah like, mungkin tampilkan pesan atau lakukan sesuatu yang sesuai kebutuhan
    echo '<script>alert("Anda telah menyukai destinasi tersebut!"); window.location.href = "detail_destination.php?id_destinasi=' . $id_destinasi . '";</script>';
    exit();
}
?>