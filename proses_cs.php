<?php
session_start();
include 'config.php';

if (isset($_POST['kirim_saran'])) {
    $id_user = $_SESSION['id_user'];
    $isi = mysqli_real_escape_string($conn, $_POST['isi_saran']);

    $query = "INSERT INTO kritik_saran (id_user, isi_saran) VALUES ('$id_user', '$isi')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Terima kasih atas masukannya!'); window.location='index.php';</script>";
    }
}
?>