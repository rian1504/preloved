<?php
include "layouts/layout.php";

if (!$_POST) {
    header("location: beranda.php?pesan=fitur_bayar");
}

// Mengambil data inputan
$list_pakaian = $_POST["list_pakaian"];
$total_harga = $_POST["total_harga"];
$tanggal = date("Y-m-d");

// Mengubah array menjadi string
$id_list_pakaian = implode(",", $list_pakaian);

// Menambah data transaksi
$query_transaksi = "INSERT INTO transaksi VALUES('', '$tanggal', '$total_harga', '$id_pengguna')";
$tambah_data_transaksi = mysqli_query($koneksi, $query_transaksi);

// Mengambil id transaksi
$query_id_transaksi = "SELECT id_transaksi FROM transaksi WHERE id_pengguna = $id_pengguna AND tanggal_transaksi = '$tanggal' AND total_harga = $total_harga";
$ambil_id_transaksi = mysqli_query($koneksi, $query_id_transaksi);
$id_transaksi = mysqli_fetch_assoc($ambil_id_transaksi);
$id_transaksi = $id_transaksi["id_transaksi"];

// Mengambil data pakaian
$query_pakaian = "SELECT * FROM pakaian WHERE id_pakaian IN ($id_list_pakaian)";
$ambil_data_pakaian = mysqli_query($koneksi, $query_pakaian);

// Looping data pakaian
while ($data_pakaian = mysqli_fetch_assoc($ambil_data_pakaian)) {
    $id_pakaian = $data_pakaian["id_pakaian"];
    $nama_pakaian = $data_pakaian["nama_pakaian"];
    $harga_pakaian = $data_pakaian["harga_pakaian"];
    $gambar_pakaian = $data_pakaian["gambar_pakaian"];

    copy("../assets/img/pakaian/" . $gambar_pakaian, "../assets/img/transaksi/" . $gambar_pakaian);

    // Menambah data detail transaksi
    $query_detail_transaksi = "INSERT INTO detail_transaksi VALUES('', '$nama_pakaian', '$harga_pakaian', '$gambar_pakaian', '$id_transaksi')";
    $tambah_data_detail_transaksi = mysqli_query($koneksi, $query_detail_transaksi);

    // Menghapus data keranjang
    $query_hapus_keranjang = "DELETE FROM keranjang WHERE id_pakaian = $id_pakaian";
    $hapus_data_keranjang = mysqli_query($koneksi, $query_hapus_keranjang);

    unlink("../assets/img/pakaian/" . $gambar_pakaian);

    // Menghapus data pakaian
    $query_hapus_pakaian = "DELETE FROM pakaian WHERE id_pakaian = $id_pakaian";
    $hapus_data_pakaian = mysqli_query($koneksi, $query_hapus_pakaian);
}

header("location: transaksi.php?pesan=berhasil_bayar");
