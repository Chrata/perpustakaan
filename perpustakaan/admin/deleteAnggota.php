<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'];


    $sql = "DELETE FROM users WHERE nim = '$nim'";
    
    if ($koneksi->query($sql) === TRUE) {
        echo '<script language="javascript"> alert("Data anggota berhasil dihapus")</script>';
        header('Location: dashboard.php');
    } else {
        echo 'Error: ' . $sql . '<br>' . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Anggota</title>
</head>
<body>
    <div class="login-container">
        <h2>Edit Anggota</h2>
        <form action="deleteAnggota.php" method="post">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>
            <br>
            <button type="submit">Hapus</button>
        </form>
    </div>
</body>
</html>