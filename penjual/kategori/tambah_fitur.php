<?php
include "../layouts/layout_tambah.php";
if (!$_POST) {
    header("location: ../kategori.php?pesan=tambah");
}

// Mengambil data kategori dari inputan
$nama_kategori = $_POST["nama_kategori"];
$gambar_kategori = $_FILES["gambar_kategori"]["name"];
$gambar_kategori_tmp = $_FILES["gambar_kategori"]["tmp_name"];

// Memisahkan tipe dan nama file
$pisah = explode(".", $gambar_kategori);
$gambar_kategori = $pisah[0];
$tipe = $pisah[1];

// Membuat nama gambar baru yang digabung dengan waktu
$gambar_kategori = $gambar_kategori . time() . '.' . $tipe;

// Memasukkan gambar kategori ke folder
move_uploaded_file($gambar_kategori_tmp, "../../assets/img/kategori/" . $gambar_kategori);

// Memasukkan data kategori ke database
$query_tambah_kategori = "INSERT INTO kategori VALUES('', '$nama_kategori', '$gambar_kategori')";
$tambah_data_kategori = mysqli_query($koneksi, $query_tambah_kategori);
header("location: ../kategori.php?pesan=berhasil_tambah_kategori");
