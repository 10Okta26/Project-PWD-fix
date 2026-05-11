<?php
include 'config.php';

if (isset($_POST['register'])) {
    // Sanitasi input untuk mencegah SQL Injection
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    // Cek apakah username sudah digunakan
    $cek_username = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user'");
    
    if (mysqli_num_rows($cek_username) > 0) {
        // Jika username sudah ada
        echo "<script>
                alert('Username sudah digunakan, silakan pilih username lain!');
                window.location='register.php';
              </script>";
    } else {
        // Simpan ke database dengan role default 'user'
        $query = "INSERT INTO users (username, password, nama_lengkap, role) 
                  VALUES ('$user', '$pass', '$nama', 'user')";
        
        if (mysqli_query($conn, $query)) {
            echo "<script>
                    alert('Pendaftaran berhasil! Silakan login untuk melanjutkan.');
                    window.location='login.php';
                  </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>