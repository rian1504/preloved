<?php
include "../layouts/layout_kategori.php";

// Mengambil gambar kategori
$query_kategori = "SELECT gambar_kategori FROM kategori WHERE id_kategori = $id";
$ambil_data_kategori = mysqli_query($koneksi, $query_kategori);
$data_kategori = mysqli_fetch_assoc($ambil_data_kategori);

$gambar_kategori = $data_kategori["gambar_kategori"];

// Menghapus gambar dari folder
unlink("../../assets/img/kategori/" . $gambar_kategori);

// Menghapus data kategori dari database
$query_hapus_kategori = "DELETE FROM kategori WHERE id_kategori = $id";
$hapus_data_kategori = mysqli_query($koneksi, $query_hapus_kategori);
header("location: ../kategori.php?pesan=berhasil_hapus_kategori");
