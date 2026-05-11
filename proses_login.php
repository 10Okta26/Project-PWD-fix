<?php
session_start();
include 'config.php';
if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = $_POST['password'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE username='$user' AND password='$pass'");
    if (mysqli_num_rows($sql) > 0) {
        $d = mysqli_fetch_assoc($sql);
        $_SESSION['id_user'] = $d['id_user'];
        $_SESSION['nama'] = $d['nama_lengkap'];
        $_SESSION['role'] = $d['role'];
        header($d['role'] == 'admin' ? "Location: admin.php" : "Location: index.php");
    } else {
        echo "<script>alert('Gagal!'); window.location='login.php';</script>";
    }
}
?>