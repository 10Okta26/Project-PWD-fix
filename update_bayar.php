<?php
include 'config.php';
$id = $_GET['id'];
$status_lama = $_GET['status'];
$status_baru = ($status_lama == 'Belum Bayar') ? 'Lunas' : 'Belum Bayar';

mysqli_query($conn, "UPDATE pemesanan SET status_pembayaran = '$status_baru' WHERE id_pesan = '$id'");
header("Location: admin.php?view=pesanan");
?>