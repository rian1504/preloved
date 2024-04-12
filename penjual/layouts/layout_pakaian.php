<?php
include "../../database/koneksi.php";
session_start();
if ($_SESSION["peran"] != "penjual") {
    header("location: ../tamu/login.php");
}

$nama = $_SESSION["nama"];

// Mengambil data id pakaian
$query_id_pakaian = "SELECT id_pakaian FROM pakaian";
$ambil_data_id_pakaian = mysqli_query($koneksi, $query_id_pakaian);

$id = $_GET["id"];

while ($data_id_pakaian = mysqli_fetch_assoc($ambil_data_id_pakaian)) {
    $id_pakaian[] = $data_id_pakaian["id_pakaian"];
}

if (!isset($id)) {
    header("location: ../pakaian.php");
} elseif (!in_array($id, $id_pakaian)) {
    header("location: ../pakaian.php");
}
