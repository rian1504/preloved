<?php
session_start();

include "../pesan.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11"> -->
</head>

<body>
    <div class="kontainer">
        <div class="halaman-login">
            <div class="judul">
                <h1>Masuk ke Akun Anda</h1>
            </div>
            <form action="../database/login.php" method="POST" class="form-login-daftar">
                <div class="input-kontainer">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="input-kontainer">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <!-- <div class="ingat-saya">
                    <input type="checkbox" id="ingat-saya">
                    <label for="ingat-saya">Ingat saya</label>
                    <a href="lupa-sandi.html">Lupa Kata Sandi?</a>
                </div> -->
                <button type="submit">Masuk</button>
                <p>Tidak Punya Akun? <a href="../pembeli/daftar.php"><span>Buat Akun</span></a></p>
            </form>
        </div>
    </div>
</body>

</html>