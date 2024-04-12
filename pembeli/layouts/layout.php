<?php
include "../database/koneksi.php";
session_start();
if ($_SESSION["peran"] != "pembeli") {
    header("location: ../tamu/login.php");
}

$nama = $_SESSION["nama"];
$id_pengguna = $_SESSION["id_pengguna"];

function format_rupiah($harga)
{
    $hasil = "Rp" . number_format($harga, 0, ",", ".");
    return $hasil;
}