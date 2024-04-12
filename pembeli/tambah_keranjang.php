<?php
include "layouts/layout.php";

if (!$_POST) {
    header("location: pakaian.php?pesan=gagal_keranjang");
} else {
    $id_pengguna = $_POST["id_pengguna"];
    $id_pakaian = $_POST["id_pakaian"];

    // Cek apakah data pakaian sudah ada di keranjang
    $query_keranjang = "SELECT id_keranjang FROM keranjang WHERE id_pakaian = $id_pakaian AND id_pengguna = $id_pengguna";
    $ambil_data_pakaian = mysqli_query($koneksi, $query_keranjang);
    $jumlah_pakaian = mysqli_num_rows($ambil_data_pakaian);

    if ($jumlah_pakaian > 0) {
        header("location: pakaian.php?pesan=gagal_keranjang");
        exit;
    }

    $query_tambah_keranjang = "INSERT INTO keranjang VALUES('', '$id_pengguna', '$id_pakaian')";
    $tambah_data_keranjang = mysqli_query($koneksi, $query_tambah_keranjang);
    header("location: pakaian.php?pesan=berhasil_keranjang");
}
