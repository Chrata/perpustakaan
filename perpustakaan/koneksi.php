<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'perpustakaan';

$koneksi = new mysqli($host, $user, $password, $database);

if ($koneksi->connect_error) {
    die('Koneksi Gagal: ' . $koneksi->connect_error);
}

?>
