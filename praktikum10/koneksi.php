<?php
// Mendefinisikan informasi koneksi ke database
$host = "localhost";  // Alamat host
$user = "root";       // Username untuk akses database
$pass = "";           // Password (kosong jika default XAMPP)
$db = "dbmahasiswa";  // Nama database yang akan digunakan

// Membuat koneksi ke database MySQL
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Mengecek apakah koneksi berhasil atau gagal
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi berhasil!";
}
?>
