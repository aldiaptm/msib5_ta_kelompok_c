<?php
$password = "admin";
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

echo "Hashed Password: " . $hashedPassword;
?>