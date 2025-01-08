<?php
// Menyertakan file koneksi.php untuk menghubungkan ke database
include 'koneksi.php';
// Mengambil parameter 'nim' dari URL untuk digunakan sebagai referensi data mahasiswa yang akan diedit
$nim = $_GET['nim'];
// Melakukan query ke database untuk mengambil data mahasiswa berdasarkan NIM yang diterima
$result = mysqli_query($koneksi, "SELECT * FROM tbmahasiswa WHERE nim =
'$nim'");
// Mengambil hasil query sebagai array asosiatif
$row = mysqli_fetch_assoc($result);
// Mengecek apakah form telah disubmit melalui metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Mengambil data yang dikirimkan melalui form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tanggallahir = $_POST['tanggallahir'];
$jeniskelamin = $_POST['jeniskelamin'];
$email = $_POST['email'];
$prodi = $_POST['prodi'];
// Memeriksa apakah ada foto baru yang diupload
if ($_FILES['foto']['name']) {
// Menyimpan nama foto baru dan file sementara
$foto = $_FILES['foto']['name'];
$tmp_name = $_FILES['foto']['tmp_name'];
// Memindahkan foto yang diupload ke folder "uploads"
move_uploaded_file($tmp_name, "uploads/" . $foto);
} else {
// Jika tidak ada foto baru, gunakan foto lama yang ada di database
$foto = $row['foto'];
}
// Membuat query untuk memperbarui data mahasiswa
$query = "UPDATE tbmahasiswa SET
nama='$nama', alamat='$alamat', tanggallahir='$tanggallahir',
jeniskelamin='$jeniskelamin', email='$email', prodi='$prodi', foto='$foto'
WHERE nim='$nim'";
// Mengeksekusi query dan memeriksa apakah berhasil
if (mysqli_query($koneksi, $query)) {
// Jika berhasil, arahkan ke halaman index.php
header('Location: index.php');
} else {
// Jika gagal, tampilkan pesan error
echo "Error: " . mysqli_error($koneksi);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8"> <!-- Mengatur karakter encoding halaman menjadi UTF-8 -->
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--
Membuat halaman responsif -->
<title>Edit Data</title> <!-- Judul halaman -->
</head>
<body>
<h1>Edit Data Mahasiswa</h1> <!-- Menampilkan judul halaman -->
<!-- Form untuk mengedit data mahasiswa -->
<form action="" method="post" enctype="multipart/form-data">
<!-- Input untuk Nama mahasiswa dengan nilai default sesuai data lama -->
<label>Nama: <input type="text" name="nama" value="<?= $row['nama']; ?>"
required></label><br>
<!-- Input untuk Alamat mahasiswa dengan nilai default sesuai data lama -->
<label>Alamat: <textarea name="alamat" required><?= $row['alamat'];
?></textarea></label><br>
<!-- Input untuk Tanggal Lahir dengan nilai default sesuai data lama -->
<label>Tanggal Lahir: <input type="date" name="tanggallahir" value="<?=
$row['tanggallahir']; ?>" required></label><br>
<!-- Input untuk Jenis Kelamin dengan pilihan yang disesuaikan dengan data lama -->
<label>Jenis Kelamin:
<select name="jeniskelamin">

<option value="L" <?= $row['jeniskelamin'] == 'L' ? 'selected' : ''; ?>>Laki-
laki</option>

<option value="P" <?= $row['jeniskelamin'] == 'P' ? 'selected' : '';
?>>Perempuan</option>
</select>
</label><br>
<!-- Input untuk Email mahasiswa dengan nilai default sesuai data lama -->
<label>Email: <input type="email" name="email" value="<?= $row['email']; ?>"
required></label><br>
<!-- Input untuk Program Studi mahasiswa dengan nilai default sesuai data lama -->
<label>Prodi: <input type="text" name="prodi" value="<?= $row['prodi']; ?>"
required></label><br>
<!-- Input untuk Foto mahasiswa, jika foto baru diupload -->
<label>Foto: <input type="file" name="foto"></label><br>
<!-- Tombol untuk menyimpan perubahan -->
<button type="submit">Simpan</button>
</form>
</body>
</html>