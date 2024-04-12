<?php
include "layouts/layout.php";

$id = $_GET["id"];

$query_hapus_keranjang = "DELETE FROM keranjang WHERE id_keranjang = $id";
$hapus_data_keranjang = mysqli_query($koneksi, $query_hapus_keranjang);
header("location: keranjang.php?pesan=berhasil_hapus_keranjang");