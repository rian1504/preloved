<?php
include "../layouts/layout_tambah.php";
if (!$_POST) {
    header("location: ../kategori.php?pesan=edit");
}

// Mengambil data kategori dari inputan
$id = $_POST["id"];
$nama_kategori = $_POST["nama_kategori"];
$gambar_kategori = $_FILES["gambar_kategori"]["name"];
$gambar_kategori_tmp = $_FILES["gambar_kategori"]["tmp_name"];
$gambar_lama = $_POST["gambar_lama"];

if ($gambar_kategori == "") {
    // Query jika menggunakan gambar lama
    $query_edit_kategori = "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = $id";
} else {
    // Query jika menggunakan gambar baru
    if ($gambar_lama != 0) {
        unlink("../../assets/img/kategori/" . $gambar_lama);
    }
    // Memisahkan tipe dan nama file
    $pisah = explode(".", $gambar_kategori);
    $gambar_kategori = $pisah[0];
    $tipe = $pisah[1];

    // Membuat nama gambar baru yang digabung dengan waktu
    $gambar_kategori = $gambar_kategori . time() . '.' . $tipe;

    // Memasukkan gambar kategori ke folder
    move_uploaded_file($gambar_kategori_tmp, "../../assets/img/kategori/" . $gambar_kategori);

    $query_edit_kategori = "UPDATE kategori SET nama_kategori = '$nama_kategori', gambar_kategori = '$gambar_kategori' WHERE id_kategori = $id";
}

// Mengedit data kategori dari database
$edit_data_kategori = mysqli_query($koneksi, $query_edit_kategori);
header("location: ../kategori.php?pesan=berhasil_edit_kategori");
