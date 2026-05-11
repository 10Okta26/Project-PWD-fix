<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun - Destinasia</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url('assets/img/tour-guide.png') center/cover; height: 100vh;">
    <div class="auth-wrapper page-transition">
        <!-- Sisi Kiri: Visual Branding -->
        <div class="auth-visual bg-global">
            <h1>Destinasia.</h1>
            <p>Bergabunglah dengan ribuan wisatawan lainnya dan temukan pengalaman perjalanan terbaik Anda.</p>
        </div>

        <!-- Sisi Kanan: Formulir Pendaftaran -->
        <div class="auth-form-container">
            <div class="glass-card">
                <h2>Daftar Akun Baru</h2>
                <p style="margin-bottom: 20px; color: #7f8c8d;">Lengkapi data diri Anda untuk mulai memesan pemandu.</p>
                
                <form action="proses_register.php" method="POST">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>
                    
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Buat username unik" required>
                    
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Buat password minimal 6 karakter" required>
                    
                    <button type="submit" name="register" class="btn-primary" style="width:100%; margin-top: 10px;">
                        Daftar Sekarang
                    </button>
                </form>

                <div style="margin-top: 25px; text-align: center; font-size: 14px;">
                    <p>Sudah punya akun? <a href="login.php" style="color: #3498db; font-weight: 600; text-decoration: none;">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>