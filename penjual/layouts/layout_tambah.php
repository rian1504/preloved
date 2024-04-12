<?php
include "../../database/koneksi.php";
session_start();
if ($_SESSION["peran"] != "penjual") {
    header("location: ../tamu/login.php");
}

$nama = $_SESSION["nama"];
?>
