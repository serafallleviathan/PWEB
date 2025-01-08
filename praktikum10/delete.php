<?php
// Menyertakan file koneksi.php untuk menghubungkan ke database
include 'koneksi.php';
// Mengambil parameter 'nim' dari URL yang digunakan untuk mengidentifikasi data mahasiswa yang akan dihapus

$nim = $_GET['nim'];
// Membuat query untuk menghapus data mahasiswa berdasarkan NIM yang diterima
$query = "DELETE FROM tbmahasiswa WHERE nim = '$nim'";
// Menjalankan query untuk menghapus data
if (mysqli_query($koneksi, $query)) {
// Jika berhasil, arahkan ke halaman index.php
header('Location: index.php');
} else {
// Jika gagal, tampilkan pesan error
echo "Error: " . mysqli_error($koneksi);
}
?>