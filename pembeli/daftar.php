<?php
include "../pesan.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/daftar.css">
</head>

<body>
    <div class="kontainer-daftar">
        <div class="halaman-daftar">
            <div class="judul">
                <h1>buat akunmu!</h1>
                <h2>buka kunci semua fitur!</h2>
            </div>
            <form action="../database/daftar_pembeli.php" method="POST" class="form-login-daftar">
                <div class="input-kontainer-daftar">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="nama" placeholder="Nama">
                </div>
                <div class="input-kontainer-daftar">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="input-kontainer-daftar">
                    <i class="fa-solid fa-address-card"></i>
                    <input type="text" name="alamat" placeholder="Alamat">
                </div>
                <div class="input-kontainer-daftar">
                    <i class="fa-solid fa-contact-book"></i>
                    <input type="text" name="no_hp" placeholder="Nomor HP">
                </div>
                <div class="input-kontainer-daftar">
                    <i class="fa-solid fa-calendar"></i>
                    <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir">
                </div>
                <div class="input-kontainer-daftar">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="input-kontainer-daftar">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="input-kontainer-daftar">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="konfirmasi_password" placeholder="Konfirmasi Password">
                </div>
                <button type="submit">Kirim</button>
                <p>anda punya akun? <a href="../tamu/login.php"><span>masuk sekarang</span></a></p>
            </form>
        </div>
    </div>
</body>

</html>