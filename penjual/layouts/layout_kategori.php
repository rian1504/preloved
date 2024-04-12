<?php
include "../../database/koneksi.php";
session_start();
if ($_SESSION["peran"] != "penjual") {
    header("location: ../tamu/login.php");
}

$nama = $_SESSION["nama"];

// Mengambil total data kategori
$query_id_kategori = "SELECT id_kategori FROM kategori";
$ambil_data_id_kategori = mysqli_query($koneksi, $query_id_kategori);

$id = $_GET["id"];

while ($data_id_kategori = mysqli_fetch_assoc($ambil_data_id_kategori)) {
    $id_kategori[] = $data_id_kategori["id_kategori"];
}

if (!isset($id)) {
    header("location: ../kategori.php");
} elseif (!in_array($id, $id_kategori)) {
    header("location: ../kategori.php");
}
