<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $semester = $_POST['semester'];
    $email = $_POST['email'];
    $handphone = $_POST['handphone'];
    $password = $_POST['password'];

    $sql = "INSERT INTO 
    users (nim, nama, prodi, semester, email, handphone, password) 
    VALUES ('$nim', '$nama', '$prodi', '$semester', '$email', '$handphone', '$password')";

    if ($koneksi->query($sql) === TRUE) {
        echo '<script language="javascript"> alert("Registerasi Anggota berhasil")</script>';
        header('Location: loginAnggota.php');
    } else {
        echo '<script language="javascript"> alert("Error")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register Anggota</title>
</head>
<body>
    <div class="login-container">
        <h2>Register Anggota</h2>
        <form action="registerAnggota.php" method="post">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>
            <br>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            <br>
            <label for="prodi">Prodi:</label>
            <input type="text" id="prodi" name="prodi" required>
            <br>
            <label for="semester">Semester:</label>
            <input type="text" id="semester" name="semester" required>
            <br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <br>
            <label for="handphone">Handphone:</label>
            <input type="text" id="handphone" name="handphone" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Register</button>
            <p>Sudah punya akun? <a href="loginAnggota.php">Login</a></p>
        </form>
    </div>
</body>
</html>