<?php
// Menghubungkan ke file koneksi.php untuk mendapatkan koneksi ke database
include 'koneksi.php';
// Mengecek apakah request yang dikirim adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari formulir menggunakan metode POST
    $nim = $_POST['nim']; // NIM mahasiswa
    $nama = $_POST['nama']; // Nama mahasiswa
    $alamat = $_POST['alamat']; // Alamat mahasiswa
    $tanggallahir = $_POST['tanggallahir']; // Tanggal lahir mahasiswa
    $jeniskelamin = $_POST['jeniskelamin']; // Jenis kelamin mahasiswa
    $email = $_POST['email']; // Email mahasiswa
    $prodi = $_POST['prodi']; // Program studi mahasiswa
    // Mengambil informasi file foto yang diunggah
    $foto = $_FILES['foto']['name']; // Nama file foto
    $tmp_name = $_FILES['foto']['tmp_name']; // Lokasi sementara file di server
    move_uploaded_file($tmp_name, "uploads/" . $foto); // Memindahkan file ke folder 'uploads'
    // Membuat query SQL untuk menambahkan data mahasiswa ke tabel tbmahasiswa
    $query = "INSERT INTO tbmahasiswa (nim, nama, alamat, tanggallahir, jeniskelamin, email, prodi, foto)
        VALUES ('$nim', '$nama', '$alamat', '$tanggallahir', '$jeniskelamin', '$email', '$prodi', '$foto')";
    // Menjalankan query ke database
    if (mysqli_query($koneksi, $query)) {
    // Jika query berhasil, pengguna akan diarahkan ke halaman index.php
    header('Location: index.php');
    } else {
    // Jika terjadi kesalahan, akan menampilkan pesan error
    echo "Error: " . mysqli_error($koneksi);
    }
}
?>