<?php
include "../layouts/layout_tambah.php";
if (!$_POST) {
    header("location: ../pakaian.php?pesan=tambah");
}

// Mengambil waktu sekarang
$tanggal_sekarang = date("Y-m-d");

// Mengambil data pakaian dari inputan
$nama_pakaian = $_POST["nama_pakaian"];
$harga_pakaian = $_POST["harga_pakaian"];
$deskripsi_pakaian = $_POST["deskripsi_pakaian"];
$gambar_pakaian = $_FILES["gambar_pakaian"]["name"];
$gambar_pakaian_tmp = $_FILES["gambar_pakaian"]["tmp_name"];
$id_kategori = $_POST["id_kategori"];

// Memisahkan tipe dan nama file
$pisah = explode(".", $gambar_pakaian);
$gambar_pakaian = $pisah[0];
$tipe = $pisah[1];

// Membuat nama gambar baru yang digabung dengan waktu
$gambar_pakaian = $gambar_pakaian . time() . '.' . $tipe;

// Memasukkan gambar pakaian ke folder 
move_uploaded_file($gambar_pakaian_tmp, "../../assets/img/pakaian/" . $gambar_pakaian);

// Memasukkan data pakaian kedatabase
$query_tambah_pakaian = "INSERT INTO pakaian VALUES('', '$nama_pakaian', $harga_pakaian, '$deskripsi_pakaian', '$gambar_pakaian', '$tanggal_sekarang', $id_kategori)";
$tambah_data_pakaian = mysqli_query($koneksi, $query_tambah_pakaian);
header("location: ../pakaian.php?pesan=berhasil_tambah_pakaian");