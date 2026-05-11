<?php
session_start();
include 'config.php';

if (isset($_POST['submit'])) {
    $id_user = $_SESSION['id_user'];
    $id_pemandu = $_POST['id_pemandu'];
    $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);
    $tanggal = $_POST['tanggal'];
    $durasi = $_POST['durasi'];
    $metode = $_POST['metode_pembayaran']; 

    $query = "INSERT INTO pemesanan (id_user, id_pemandu, nomor_telepon, tanggal_kunjungan, durasi_jam, metode_pembayaran, status_pembayaran) 
              VALUES ('$id_user', '$id_pemandu', '$telepon', '$tanggal', '$durasi', '$metode', 'Belum Bayar')";

    if (mysqli_query($conn, $query)) {
        header("Location: success.php");
    } else {
        echo "Gagal memesan: " . mysqli_error($conn);
    }
}
?>