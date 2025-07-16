<?php
$koneksi = mysqli_connect("sql202.infinityfree.com", "if0_39484164", "donikun2025rawr", "if0_39484164_epiz_12345678_db_mahasiswa");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>