<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM pemesanan WHERE id_pesan = '$id'");
header("Location: admin.php?view=pesanan");
?>