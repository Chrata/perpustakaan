<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['username'])) {
    header('Location: ../loginAdmin.php');
    exit();
}

echo '<h1>Halo ' . $_SESSION['username'] . '!</h1>';

$sql = "SELECT * FROM users";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    echo '<h2>Daftar Anggota</h2>';
    echo '<table border="1">';
    echo '<tr><th>NIM</th><th>Nama</th><th>Prodi</th><th>Semester</th><th>Nomor Handphone</th><th>Email</th><th>Password</th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['nim'] . '</td>';
        echo '<td>' . $row['nama'] . '</td>';
        echo '<td>' . $row['prodi'] . '</td>';
        echo '<td>' . $row['semester'] . '</td>';
        echo '<td>' . $row['handphone'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['password'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'Tidak Anggota.';
}
echo '<br>';
echo '<a href="editAnggota.php">Edit Anggota</a><br>';
echo '<a href="deleteAnggota.php">Delete Anggota</a><br>';
echo '<br>';
echo '<a href="logout.php">Logout</a>';

$koneksi->close();
?>