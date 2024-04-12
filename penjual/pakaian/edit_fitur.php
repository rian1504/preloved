<?php
include "../layouts/layout_tambah.php";
if (!$_POST) {
    header("location: ../pakaian.php?pesan=edit");
}

// Mengambil data pakaian dari inputan
$id = $_POST["id_pakaian"];
$nama_pakaian = $_POST["nama_pakaian"];
$harga_pakaian = $_POST["harga_pakaian"];
$deskripsi_pakaian = $_POST["deskripsi_pakaian"];
$gambar_pakaian = $_FILES["gambar_pakaian"]["name"];
$gambar_pakaian_tmp = $_FILES["gambar_pakaian"]["tmp_name"];
$id_kategori = $_POST["id_kategori"];
$gambar_lama = $_POST["gambar_lama"];

if ($gambar_pakaian == "") {
    // Query jika menggunakan gambar lama
    $query_edit_pakaian = "UPDATE pakaian SET nama_pakaian = '$nama_pakaian', harga_pakaian = $harga_pakaian, deskripsi_pakaian = '$deskripsi_pakaian', id_kategori = $id_kategori WHERE id_pakaian = $id";
} else {
    // Query jika menggunakan gambar baru
    if ($gambar_lama != 0) {
        unlink("../../assets/img/pakaian/" . $gambar_lama);
    }
    // Memisahkan tipe dan nama file
    $pisah = explode(".", $gambar_pakaian);
    $gambar_pakaian = $pisah[0];
    $tipe = $pisah[1];

    // Membuat nama gambar baru yang digabung dengan waktu
    $gambar_pakaian = $gambar_pakaian . time() . '.' . $tipe;

    // Memasukkan gambar pakaian ke folder 
    move_uploaded_file($gambar_pakaian_tmp, "../../assets/img/pakaian/" . $gambar_pakaian);

    $query_edit_pakaian = "UPDATE pakaian SET nama_pakaian = '$nama_pakaian', harga_pakaian = $harga_pakaian, deskripsi_pakaian = '$deskripsi_pakaian', gambar_pakaian = '$gambar_pakaian', id_kategori = $id_kategori WHERE id_pakaian = $id";
}

// Mengedit data pakaian dari database
$edit_data_pakaian = mysqli_query($koneksi, $query_edit_pakaian);
header("location: ../pakaian.php?pesan=berhasil_edit_pakaian");
