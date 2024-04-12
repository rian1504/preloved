<?php
$page = "Beranda";
include "layouts/layout.php";
include "../pesan.php";

// Mengambil jumlah data kategori
$query_kategori = "SELECT * FROM kategori";
$ambil_data_kategori = mysqli_query($koneksi, $query_kategori);
$jumlah_data_kategori = mysqli_num_rows($ambil_data_kategori);

// Mengambil jumlah data pakaian
$query_pakaian = "SELECT * FROM pakaian";
$ambil_data_pakaian = mysqli_query($koneksi, $query_pakaian);
$jumlah_data_pakaian = mysqli_num_rows($ambil_data_pakaian);

// Mengambil jumlah data transaksi
$query_transaksi = "SELECT * FROM transaksi";
$ambil_data_transaksi = mysqli_query($koneksi, $query_transaksi);
$jumlah_data_transaksi = mysqli_num_rows($ambil_data_transaksi);
?>

<style>
    .card {
        border-radius: 0 !important;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjual | <?= $page ?></title>
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/penjual.css">
</head>

<body>
    <?php
    include "layouts/navbar.php";
    include "layouts/sidebar.php";
    ?>
    <main class="konten">
        <div class="row">
            <div class="col-4">
                <div class="card-beranda">
                    <div class="card-beranda-icon">
                        <h3>Kategori</h3>
                        <img src="../assets/icons/kategori.svg" alt="">
                    </div>
                    <p class="card-text">Jumlah <?= $jumlah_data_kategori ?></p>
                    <div class="card-beranda-garis">
                        <a href="kategori.php">
                            <h4>Lihat Detail</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card-beranda">
                    <div class="card-beranda-icon">
                        <h3>Pakaian</h3>
                        <img src="../assets/icons/pakaian.svg" alt="">
                    </div>
                    <p class="card-text">Jumlah <?= $jumlah_data_pakaian ?></p>
                    <div class="card-beranda-garis">
                        <a href="pakaian.php">
                            <h4>Lihat Detail</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card-beranda">
                    <div class="card-beranda-icon">
                        <h3>Transaksi</h3>
                        <img src="../assets/icons/transaksi.svg" alt="">
                    </div>
                    <p class="card-text">Jumlah <?= $jumlah_data_transaksi ?></p>
                    <div class="card-beranda-garis">
                        <a href="transaksi.php">
                            <h4>Lihat Detail</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>