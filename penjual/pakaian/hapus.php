<?php
include "../layouts/layout_pakaian.php";

// Mengambil gambar pakaian
$query_pakaian = "SELECT gambar_pakaian FROM pakaian WHERE id_pakaian = $id";
$ambil_data_pakaian = mysqli_query($koneksi, $query_pakaian);
$data_pakaian = mysqli_fetch_assoc($ambil_data_pakaian);

$gambar_pakaian = $data_pakaian["gambar_pakaian"];

// Menghapus gambar dari folder
unlink("../../assets/img/pakaian/" . $gambar_pakaian);

// Menghapus data pakaian dari database
$query_hapus_pakaian = "DELETE FROM pakaian WHERE id_pakaian = $id";
$hapus_data_pakaian = mysqli_query($koneksi, $query_hapus_pakaian);
header("location: ../pakaian.php?pesan=berhasil_hapus_pakaian");
