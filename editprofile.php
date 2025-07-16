<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['idUser'])) header("Location: login.php");
$idUser = $_SESSION['idUser'];
if (isset($_POST['upload'])) {
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "uploads/" . $foto);
    mysqli_query($koneksi, "INSERT INTO tbl_foto (idUser, foto) VALUES ('$idUser', '$foto')");
    $msg = "<div class='alert alert-success'>Upload berhasil.</div>";
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
  <h3 class="mb-3">Upload Foto Profil</h3>
  <?= isset($msg) ? $msg : '' ?>
  <form method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
    <input type="file" name="foto" class="form-control mb-3" required>
    <button name="upload" class="btn btn-success">Upload</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>