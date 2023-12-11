<?php
include '../koneksi.php';

session_start();

// If the user is already logged in, redirect them to the homepage
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user data based on the provided username
    $query = "SELECT * FROM customer WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password using password_verify
        if (password_verify($password, $user['password'])) {
            // Set user session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to the homepage after successful login
            header('Location: index.php');
            exit();
        }
    }

    // Redirect to the login page with an error message
    header('Location: login.php?error=1');
    exit();
} else {
    // Redirect to the login page if login form is not submitted
    header('Location: login.php');
    exit();
}
?>