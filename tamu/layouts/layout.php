<?php
include "../database/koneksi.php";

function format_rupiah($harga)
{
    $hasil = "Rp" . number_format($harga, 0, ",", ".");
    return $hasil;
}