<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

echo '<h1>Halo ' . $_SESSION['username'] . '!</h1>';

echo '<br>';
echo '<a href="../logout.php">Logout</a>';

$koneksi->close();
?>