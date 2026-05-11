<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Berhasil! - Destinasia</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .centered-body { display: flex; justify-content: center; align-items: center; height: 100vh; }
        .btn-logout-alt { margin-top: 15px; color: #e74c3c; border: 2px solid #e74c3c; padding: 10px; border-radius: 10px; display: block; text-decoration: none; text-align: center; }
    </style>
</head>
<body style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url('assets/img/tour-guide.png') center/cover; height: 100vh;" class="bg-success-page">
    <div class="success-card page-transition">
        <h1 style="color: #27ae60; margin-bottom: 20px;">Berhasil!</h1>
        
        <p style="margin-bottom: 30px; line-height: 1.6;">
            Terima kasih <b><?php echo $_SESSION['nama']; ?></b>, pesanan Anda sedang kami proses. 
            Pemandu akan segera menghubungi Anda setelah pembayaran selesai.
        </p>
        
        <a href="cs.php" class="btn-primary" style="width: 100%; margin-bottom: 10px;">
            Lakukan Pembayaran
        </a>
        
    </div>
</>
</html>