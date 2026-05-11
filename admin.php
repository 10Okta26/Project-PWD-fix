<?php 
session_start();
if ($_SESSION['role'] != 'admin') { header("Location: login.php"); exit(); }
include 'config.php';

$view = isset($_GET['view']) ? $_GET['view'] : ''; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Destinasia</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .tab-menu { text-align:center; margin: 50px 0; }
        .tab-btn { padding: 12px 25px; text-decoration:none; background: #fff; color: #333; border-radius: 8px; margin: 0 10px; font-weight: 600; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: 0.3s; }
        .tab-active { background: #3498db; color: white; }
        .tab-btn:hover { transform: translateY(-3px); }
        
        table { width: 90%; margin: 20px auto; background: white; border-collapse: collapse; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        th, td { padding: 18px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #2c3e50; color: white; }
        
        .empty-state { text-align: center; color: white; margin-top: 100px; text-shadow: 2px 2px 10px rgba(0,0,0,0.5); }
        .badge { padding: 6px 12px; border-radius: 6px; font-size: 12px; font-weight: bold; }
        .bg-unpaid { background: #e74c3c; color: white; }
        .bg-paid { background: #2ecc71; color: white; }
    </style>
</head>
<body style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url('assets/img/tour-guide.png') center/cover; height: 100vh;" class="bg-global page-transition">

    <div class="tab-menu">
        <a href="admin.php?view=pesanan" class="tab-btn <?php echo $view == 'pesanan' ? 'tab-active' : ''; ?>">Daftar Pemesanan</a>
        <a href="admin.php?view=saran" class="tab-btn <?php echo $view == 'saran' ? 'tab-active' : ''; ?>">Kritik & Saran</a>
        <a href="logout.php" class="tab-btn" style="background:#e74c3c; color:white;">Logout</a>
    </div>


    <?php if ($view == 'pesanan'): ?>

        <table>
            <thead>
                <tr>
                    <th>Wisatawan</th>
                    <th>Pemandu</th>
                    <th>Tanggal</th>
                    <th>Metode Bayar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT pemesanan.*, users.nama_lengkap AS u_nama, pemandu.nama_lengkap AS p_nama 
                        FROM pemesanan 
                        JOIN users ON pemesanan.id_user = users.id_user 
                        JOIN pemandu ON pemesanan.id_pemandu = pemandu.id_pemandu";
                $res = mysqli_query($conn, $sql);
                while($d = mysqli_fetch_assoc($res)):
                ?>
                <tr>
                    <td><?php echo $d['u_nama']; ?></td>
                    <td><?php echo $d['p_nama']; ?></td>
                    <td><?php echo date('d M Y', strtotime($d['tanggal_kunjungan'])); ?></td>
                    <td><?php echo $d['metode_pembayaran']; ?></td>
                    <td>
                        <span class="badge <?php echo $d['status_pembayaran'] == 'Lunas' ? 'bg-paid' : 'bg-unpaid'; ?>">
                            <?php echo $d['status_pembayaran']; ?>
                        </span>
                    </td>
                    <td>
                        <a href="update_bayar.php?id=<?php echo $d['id_pesan']; ?>&status=<?php echo $d['status_pembayaran']; ?>" style="color:#3498db; text-decoration:none; font-weight:bold;">Update Bayar</a> | 
                        <a href="hapus_pesanan.php?id=<?php echo $d['id_pesan']; ?>" onclick="return confirm('Hapus pesanan ini?')" style="color:#e74c3c; text-decoration:none; font-weight:bold;">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    <?php elseif ($view == 'saran'): ?>

        <table>
            <thead>
                <tr>
                    <th>Pengguna</th>
                    <th>Isi Kritik & Saran</th>
                    <th>Waktu Kirim</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_saran = "SELECT kritik_saran.*, users.nama_lengkap FROM kritik_saran 
                              JOIN users ON kritik_saran.id_user = users.id_user 
                              ORDER BY tanggal_kirim DESC";
                $res_saran = mysqli_query($conn, $sql_saran);
                while($s = mysqli_fetch_assoc($res_saran)):
                ?>
                <tr>
                    <td><b><?php echo $s['nama_lengkap']; ?></b></td>
                    <td><?php echo $s['isi_saran']; ?></td>
                    <td style="font-size:13px; color:#7f8c8d;"><?php echo date('d/m/Y H:i', strtotime($s['tanggal_kirim'])); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    <?php else: ?>

        <div class="empty-state">
            <h2>Selamat Datang di Panel Admin Destinasia</h2>
            <p>Silakan pilih menu di atas untuk mengelola data operasional website.</p>
        </div>
    <?php endif; ?>

</body>
</html>