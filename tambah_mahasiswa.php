<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['idUser'])) header("Location: login.php");
if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $q1 = mysqli_query($koneksi, "INSERT INTO tbl_mahasiswa (nim, nama, jurusan, alamat) VALUES ('$nim','$nama','$jurusan','$alamat')");
    if ($q1) {
        $idMhs = mysqli_insert_id($koneksi);
        $pass = password_hash($nim, PASSWORD_DEFAULT);
        mysqli_query($koneksi, "INSERT INTO tbl_user (username, password, idMhs) VALUES ('$nim', '$pass', '$idMhs')");
        $msg = "<div class='alert alert-success'>Data berhasil disimpan.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Aplikasi Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php">MahasiswaApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="tambah_mahasiswa.php">Tambah Mahasiswa</a></li>
        <li class="nav-item"><a class="nav-link" href="editprofile.php">Upload Foto</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <h3 class="mb-3">Tambah Mahasiswa</h3>
  <?= isset($msg) ? $msg : '' ?>
  <form method='POST' class="p-4 bg-light rounded shadow-sm">
    <input name='nim' class="form-control mb-2" placeholder='NIM' required>
    <input name='nama' class="form-control mb-2" placeholder='Nama' required>
    <input name='jurusan' class="form-control mb-2" placeholder='Jurusan'>
    <textarea name='alamat' class="form-control mb-3" placeholder='Alamat'></textarea>
    <button name='submit' class="btn btn-primary">Simpan</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>