<?php 
session_start();
include 'config.php';
if (!isset($_SESSION['role'])) { header("Location: login.php"); exit(); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Service - Destinasia</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url('assets/img/tour-guide.png') center/cover; height: 100vh;" class="bg-success-page" class="bg-global" style="display:flex; justify-content:center; align-items:center; min-height:100vh;">
    <div class="glass-card page-transition" style="max-width:500px; text-align:center;">
        <h2>Admin & Pembayaran</h2>
        <p>Silakan klik tombol di bawah untuk konfirmasi pembayaran melalui WhatsApp Admin.</p>
        
        <a href="https://wa.me/6288232672904" class="btn-primary" style="background:#25d366; width:100%; margin:15px 0;">
            Chat Admin (WhatsApp)
        </a>

        <hr style="margin:20px 0; border:0; border-top:1px solid #ddd;">

        <h3>Kritik & Saran</h3>
        <form action="proses_cs.php" method="POST">
            <textarea name="isi_saran" placeholder="Kritik dan saran Anda akan sangat berarti bagi pengembangan web kami" required style="width:100%; height:100px; padding:10px; border-radius:10px; margin-top:10px;"></textarea>
            <button type="submit" name="kirim_saran" class="btn-primary" style="width:100%; margin-top:10px;">Kirim Masukan</button>
        </form>
        <br>
        <a href="index.php" style="text-decoration:none; color:#7f8c8d; font-size:14px;">Kembali ke Beranda</a>
    </div>
</body>
</html>