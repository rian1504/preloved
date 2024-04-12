<?php
if (!$_POST) {
    header("location: ../penjual/daftar.php");
} else {
    include "koneksi.php";

    // ambil data inputan
    $nama = mysqli_escape_string($koneksi, $_POST["nama"]);
    $email = mysqli_escape_string($koneksi, $_POST["email"]);
    $no_hp = mysqli_escape_string($koneksi, $_POST["no_hp"]);
    $tanggal_lahir = mysqli_escape_string($koneksi, $_POST["tanggal_lahir"]);
    $username = mysqli_escape_string($koneksi, $_POST["username"]);
    $password = mysqli_escape_string($koneksi, $_POST["password"]);
    $konfirmasi_password = mysqli_escape_string($koneksi, $_POST["konfirmasi_password"]);

    // ambil data username
    $query_username = "SELECT username FROM pengguna WHERE peran='penjual' AND username='$username'";
    $ambil_data_username = mysqli_query($koneksi, $query_username);
    $data_username = mysqli_fetch_assoc($ambil_data_username);

    // cek username
    if ($username == $data_username["username"]) {
        header("location: ../penjual/daftar.php?pesan=gagal_username");
    } else {
        // Validasi email
        $is_email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$is_email) {
            header("location: ../penjual/daftar.php?pesan=gagal_email");
            exit;
        }

        // Validasi password
        if ($password != $konfirmasi_password) {
            header("location: ../penjual/daftar.php?pesan=gagal_konfirmasi");
            exit;
        }

        // hashing password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // insert data ke database
        // $query_tambah_pengguna = "INSERT INTO pengguna VALUES('', '$nama', '$email', '', '$no_hp', '$tanggal_lahir', '$username', '$password', 'penjual')";
        // $tambah_data_pengguna = mysqli_query($koneksi, $query_tambah_pengguna);
        // header("location: ../tamu/login.php?pesan=berhasil");

        // SQL Prepare
        $query_tambah_pengguna = "INSERT INTO `pengguna`(nama, email, no_hp, tanggal_lahir, username, password, peran) VALUES(?, ?, ?, ?, ?, ?, 'penjual')";
        $stmt = mysqli_prepare($koneksi, $query_tambah_pengguna);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssss", $nama, $email, $no_hp, $tanggal_lahir, $username, $password);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                header("location: ../tamu/login.php?pesan=berhasil_daftar");
            } else {
                header("location: ../penjual/daftar.php?pesan=gagal_daftar");
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Prepare statement Error";
        }
    }
}