<?php
// Menyertakan file koneksi.php untuk menghubungkan ke database
include 'koneksi.php';
// Melakukan query ke database untuk mengambil semua data dari tabel tbmahasiswa
$result = mysqli_query($koneksi, "SELECT * FROM tbmahasiswa");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"> <!-- Mengatur karakter encoding halaman menjadi UTF-8 -->
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--
Membuat halaman responsif -->

<title>CRUD Mahasiswa</title> <!-- Judul halaman -->
<link rel="stylesheet" href="style.css"> <!-- Menghubungkan ke file CSS eksternal -->
</head>
<body>
<h1>Data Mahasiswa</h1> <!-- Menampilkan judul halaman -->
<!-- Tombol untuk menambahkan data baru, mengarahkan ke halaman tambah.php -->
<a href="tambah.php" class="btn">Tambah Data</a>
<!-- Membuat tabel untuk menampilkan data mahasiswa -->
<table border="1" cellpadding="10" cellspacing="0">
<thead>
<tr>
<th>NIM</th> <!-- Kolom NIM -->
<th>Nama</th> <!-- Kolom Nama -->
<th>Alamat</th> <!-- Kolom Alamat -->
<th>Tanggal Lahir</th> <!-- Kolom Tanggal Lahir -->
<th>Jenis Kelamin</th> <!-- Kolom Jenis Kelamin -->
<th>Email</th> <!-- Kolom Email -->
<th>Prodi</th> <!-- Kolom Program Studi -->
<th>Foto</th> <!-- Kolom Foto -->
<th>Aksi</th> <!-- Kolom untuk tombol Edit dan Hapus -->
</tr>
</thead>
<tbody>
<?php while ($row = mysqli_fetch_assoc($result)): ?> <!-- Looping untuk setiap
baris data mahasiswa -->
<tr>
<td><?= $row['nim']; ?></td> <!-- Menampilkan NIM -->
<td><?= $row['nama']; ?></td> <!-- Menampilkan Nama -->
<td><?= $row['alamat']; ?></td> <!-- Menampilkan Alamat -->
<td><?= $row['tanggallahir']; ?></td> <!-- Menampilkan Tanggal Lahir -->
<td><?= $row['jeniskelamin']; ?></td> <!-- Menampilkan Jenis Kelamin -->
<td><?= $row['email']; ?></td> <!-- Menampilkan Email -->
<td><?= $row['prodi']; ?></td> <!-- Menampilkan Program Studi -->
<td>
<img src="uploads/<?= $row['foto']; ?>" alt="Foto" width="250"> <!--
Menampilkan Foto -->
</td>
<td>
<!-- Tombol Edit mengarahkan ke halaman edit.php dengan parameter NIM
-->
<a href="edit.php?nim=<?= $row['nim']; ?>" class="btn-edit">Edit</a>
<!-- Tombol Hapus mengarahkan ke halaman hapus.php dengan parameter
NIM dan konfirmasi -->
<a href="hapus.php?nim=<?= $row['nim']; ?>" onclick="return
confirm('Yakin ingin menghapus?');" class="btn-delete">Hapus</a>
</td>
</tr>
<?php endwhile; ?> <!-- Akhir dari looping -->
</tbody>
</table>
</body>
</html>