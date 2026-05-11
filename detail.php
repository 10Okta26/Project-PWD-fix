<?php 
session_start();

if ($_SESSION['role'] != 'user') { 
    header("Location: login.php"); 
    exit(); 
}

include 'config.php';

$id_pemandu = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM pemandu WHERE id_pemandu = '$id_pemandu'");
$guide = mysqli_fetch_assoc($query);

if (!$guide) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Booking Pemandu - Destinasia</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .booking-container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .guide-info {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        .guide-info img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url('assets/img/tour-guide.png') center/cover; height: 100vh;" class="bg-success-page">
    <div class="booking-container">
        <div class="guide-info">
            <img src="assets/img/<?php echo $guide['foto_profil']; ?>" alt="Foto Profil">
            <div>
                <h2 style="margin:0;"><?php echo $guide['nama_lengkap']; ?></h2>
                <p style="color:#7f8c8d; margin:5px 0;"><?php echo $guide['keahlian']; ?></p>
                <span style="color:#27ae60; font-weight:bold;">Rp <?php echo number_format($guide['harga_per_jam']); ?> / jam</span>
            </div>
        </div>

        <form action="proses_booking.php" method="POST">
            <!-- Kirim ID Pemandu secara tersembunyi -->
            <input type="hidden" name="id_pemandu" value="<?php echo $id_pemandu; ?>">

            <label><b>Nama Wisatawan</b></label>
            <input type="text" value="<?php echo $_SESSION['nama']; ?>" disabled style="background:#f9f9f9;">

            <label><b>Nomor Telepon / WhatsApp</b></label>
            <input type="tel" name="telepon" placeholder="Contoh: 08123456789" required>

            <label><b>Tanggal Kunjungan</b></label>
            <input type="date" name="tanggal" required>

            <label><b>Durasi (Jam)</b></label>
            <input type="number" name="durasi" min="1" max="12" value="1" required>

            <label><b>Metode Pembayaran</b></label>
            <select name="metode_pembayaran" required style="width: 100%; padding: 12px; margin-top: 10px; border-radius: 10px; border: 1px solid #ddd;">
            <option value="Tunai" selected>Tunai (Bayar di Tempat)</option>
            <option value="Transfer Bank">Transfer Bank</option>
            <option value="E-Wallet">E-Wallet (OVO/Dana/Gopay)</option>
            </select>

            <div style="margin-top: 20px;">
                <button type="submit" name="submit" class="btn-primary" style="width:100%;">Konfirmasi Pemesanan</button>
                <a href="index.php" style="display:block; text-align:center; margin-top:15px; color:#7f8c8d; text-decoration:none;">Batal & Kembali</a>
            </div>
        </form>
    </div>

</body>
</html>