<?php 
session_start();
if ($_SESSION['role'] != 'user') { header("Location: login.php"); exit(); }
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Beranda - Destinasia</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .grid-container { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; padding: 40px; }
        .nav { background: white; padding: 20px 40px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    </style>
</head>
<body style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url('assets/img/tour-guide.png') center/cover; height: 110vh;">
<div class="nav">
    <h2>Destinasia.</h2>
    <div>
        <span>Halo, <b><?php echo $_SESSION['nama']; ?></b></span>
        <a href="cs.php" class="btn-primary" style="padding: 5px 15px; font-size: 13px;">Kritik & Saran</a>
        <a href="logout.php" class="btn-primary" style="padding: 5px 15px; font-size: 13px;">Keluar</a>
    </div>
</div>

<div class="bg-global page-transition">
    <h1 style="text-align:center; color:white; padding-top:50px; text-shadow: 2px 2px 10px rgba(0,0,0,0.5);">
        Pilih Pemandu Wisata Favoritmu
    </h1>

    <!-- Container yang sudah kita arahkan ke tengah -->
    <div class="grid-container">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM pemandu");
        while($row = mysqli_fetch_assoc($query)) {
        ?>
        <div class="card">
            <img src="assets/img/<?php echo $row['foto_profil']; ?>" alt="Profil">
            <h3><?php echo $row['nama_lengkap']; ?></h3>
            <p style="opacity: 0.8; font-size: 14px;"><?php echo $row['keahlian']; ?></p>
            <p style="margin: 15px 0; font-weight: bold;">Rp <?php echo number_format($row['harga_per_jam']); ?> / jam</p>
            <a href="detail.php?id=<?php echo $row['id_pemandu']; ?>" class="btn-primary" style="width: 100%;">Pesan Sekarang</a>
        </div>
        <?php } ?>
    </div>
</div>
</body>
</html>