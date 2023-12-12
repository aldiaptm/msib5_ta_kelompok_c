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

    // Validate user credentials (you should implement secure password hashing)
    $query = "SELECT * FROM customer WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Set user session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Redirect to the homepage after successful login
        header('Location: index.php');
        exit();
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>


</html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - EDU TRAVEL</title>
    <link rel="icon" type="image/x-icon" href="../admin_page/img/logo-title.png">

    <!-- Custom fonts for this template-->
    <link href="../admin_page/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin_page/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <?php if (isset($error_message)): ?>
                            <p style="color: red;">
                                <?php echo $error_message; ?>
                            </p>
                        <?php endif; ?>
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang di <br>
                                            EDU-TRAVEL</h1>
                                    </div>
                                    <form class="user" action="proses_login.php" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username" name="username" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="Password" name="password"
                                                    required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="show-hide-password">
                                                        <i class="fa fa-eye" id="password-icon"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <h6>Belum memiliki akun? &nbsp <a href="registrasi.php"
                                            style="text-decoration: none;">Registrasi</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../admin_page/vendor/jquery/jquery.min.js"></script>
    <script src="../admin_page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../admin_pagevendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../admin_page/js/sb-admin-2.min.js"></script>
    <script>
        $(document).ready(function () {
            // Mengatur fungsi untuk menampilkan/menyembunyikan password saat ikon mata diklik
            $("#show-hide-password").click(function () {
                var passwordField = $("#exampleInputPassword");
                var passwordIcon = $("#password-icon");

                // Mengubah tipe input password ke text atau sebaliknya
                if (passwordField.attr("type") === "password") {
                    passwordField.attr("type", "text");
                    passwordIcon.removeClass("fa-eye").addClass("fa-eye-slash");
                } else {
                    passwordField.attr("type", "password");
                    passwordIcon.removeClass("fa-eye-slash").addClass("fa-eye");
                }
            });
        });
    </script>

</body>

</html>

</body>

</html>