<?php
include "layouts/layout.php";
include "../pesan.php";

// Mengambil data transaksi
$query_transaksi = "SELECT * FROM transaksi WHERE id_pengguna = $id_pengguna";
$ambil_data_transaksi = mysqli_query($koneksi, $query_transaksi);

// Mengambil jumlah data transaksi
$jumlah_data_transaksi = mysqli_num_rows($ambil_data_transaksi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembeli | Transaksi</title>
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <!-- <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../assets/css/pembeli.css">
</head>

<body>
    <div class="kontainer">
        <div class="konten-tombol-kembali">
            <a href="beranda.php"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="konten-kontainer">
            <div class="konten-transaksi">
                <div class="konten-transaksi-judul">
                    <h1>transaksi</h1>
                    <hr>
                </div>
                <!-- Kondisi jika datanya kosong -->
                <?php if ($jumlah_data_transaksi == 0) { ?>
                    <h2>Data Kosong</h2>
                <?php } ?>
                <!-- Looping data transaksi -->
                <div class="konten-transaksi-produk-kontainer">
                    <?php while ($data_transaksi = mysqli_fetch_assoc($ambil_data_transaksi)) : ?>
                        <div class="konten-transaksi-produk-tanggal">
                            <h1><?= date("d F Y", strtotime($data_transaksi["tanggal_transaksi"])) ?></h1>
                        </div>
                        <?php
                        $id_transaksi = $data_transaksi["id_transaksi"];
                        // Mengambil data detail_transaksi
                        $query_detail_transaksi = "SELECT * FROM detail_transaksi WHERE id_transaksi = $id_transaksi";
                        $ambil_data_detail_transaksi = mysqli_query($koneksi, $query_detail_transaksi);
                        ?>
                        <!-- Looping data detail transaksi -->
                        <?php while ($data_detail_transaksi = mysqli_fetch_assoc($ambil_data_detail_transaksi)) : ?>
                            <div class="konten-transaksi-produk">
                                <div class="konten-transaksi-produk-image">
                                    <img src="../assets/img/transaksi/<?= $data_detail_transaksi["gambar_pakaian"] ?>" alt="" width="100px">
                                </div>
                                <div class="konten-transaksi-produk-deskripsi">
                                    <h1><?= $data_detail_transaksi["nama_pakaian"] ?></h2>
                                        <h2><?= format_rupiah($data_detail_transaksi["harga_pakaian"]) ?></h2>
                                </div>
                            </div>
                        <?php endwhile ?>
                        <div class="konten-transaksi-total">
                            <div class="konten-transaksi-total-deskripsi">
                                <h1>total pesanan produk</h1>
                            </div>
                            <div class="konten-transaksi-total-harga">
                                <h1><?= format_rupiah($data_transaksi["total_harga"]) ?></h1>
                                <h2>pesanan selesai</h2>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <hr style="margin-bottom: 50px;">
            </div>
        </div>
    </div>
</body>

</html>