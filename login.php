<!DOCTYPE html>
<html>
<head>
    <title>Login - Destinasia</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url('assets/img/tour-guide.png') center/cover; height: 100vh;">
    <div class="auth-wrapper page-transition">
        <div class="auth-visual bg-global">
            <h1>Destinasia.</h1>
            <p>Eksplorasi wisata lokal dengan pemandu profesional pilihanmu.</p>
        </div>
        <div class="auth-form-container">
            <div class="glass-card">
                <h2>Selamat Datang</h2>
                <form action="proses_login.php" method="POST">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="login" class="btn-primary" style="width:100%">Masuk Sekarang</button>
                </form>
                <p style="margin-top:20px; font-size:14px;">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
            </div>
        </div>
    </div>
</body>
</html>