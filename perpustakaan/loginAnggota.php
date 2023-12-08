<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE nama = '$username' AND password = '$password'";
    $result = $koneksi->query($sql);

    if ($result->num_rows == 1) {
            $_SESSION['username'] = $username;
            header('Location: anggota/dashboard.php');
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
    <title>Login Anggota</title>
</head>
<body>
    <div class="login-container">
        <a href="index.php">Kembali</a><br>
        <h2>Login Anggota</h2>
        <form action="loginAnggota.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Login</button>
            <p> Belum punya akun? <a href="registerAnggota.php">Register</a></p>
        </form>
    </div>
</body>
</html>