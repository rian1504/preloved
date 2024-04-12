<?php
if (!$_POST) {
    header("location: ../tamu/login.php");
} else {
    include "koneksi.php";

    // ambil data inputan
    $username = $_POST["username"];
    $password = $_POST["password"];

    // ambil data user
    $query_ambil_pengguna = "SELECT * FROM pengguna WHERE username='$username'";
    $ambil_data_pengguna = mysqli_query($koneksi, $query_ambil_pengguna);
    $jumlah_data_pengguna = mysqli_num_rows($ambil_data_pengguna);

    // cek data user
    if ($jumlah_data_pengguna > 0) {
        $data_pengguna = mysqli_fetch_assoc($ambil_data_pengguna);
        session_start();

        // cek password
        $is_password = password_verify($password, $data_pengguna["password"]);

        if ($is_password) {
            // cek peran
            if ($data_pengguna["peran"] == "penjual") {
                $_SESSION["nama"] = $data_pengguna["nama"];
                $_SESSION["username"] = $data_pengguna["username"];
                $_SESSION["peran"] = "penjual";
                header("location: ../penjual/beranda.php?pesan=berhasil_login");
            } elseif ($data_pengguna["peran"] == "pembeli") {
                $_SESSION["id_pengguna"] = $data_pengguna["id_pengguna"];
                $_SESSION["nama"] = $data_pengguna["nama"];
                $_SESSION["username"] = $data_pengguna["username"];
                $_SESSION["peran"] = "pembeli";
                header("location: ../pembeli/beranda.php?pesan=berhasil_login");
            } else {
                header("location: ../tamu/login.php?pesan=gagal_peran");
            }
        } else {
            header("location: ../tamu/login.php?pesan=gagal_password");
        }
    } else {
        header("location: ../tamu/login.php?pesan=gagal_pengguna");
    }
}