<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $koneksi->query($sql);

    if ($result->num_rows == 1) {
            $_SESSION['username'] = $username;
            $role = $result->fetch_assoc()['role'];
            if($role == 'Admin'){
                header('Location: adminDashboard.php');
            } else {
                header('Location: userDashboard.php');
            }
    } else {
        echo '<script language="javascript"> alert("Login Gagal. Periksa kembali username dan password Anda.")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <h2>Siapa kamu?</h2>
        <a href="loginAdmin.php">Admin</a><br>
        <a href="loginAnggota.php">Anggota</a><br>
    </div>
</body>
</html>