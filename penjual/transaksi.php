<?php
$page = "Transaksi";
include "layouts/layout.php";

// Mengambil data transaksi
$query_transaksi = "SELECT * FROM transaksi JOIN pengguna ON pengguna.id_pengguna = transaksi.id_pengguna";
$ambil_data_transaksi = mysqli_query($koneksi, $query_transaksi);

// Mengambil jumlah data keranjang
$jumlah_data_transaksi = mysqli_num_rows($ambil_data_transaksi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjual | <?= $page ?></title>
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/penjual.css">
</head>

<body>
    <?php
    include "layouts/navbar.php";
    include "layouts/sidebar.php";
    ?>
    <main class="konten">
        <!-- Kondisi jika datanya kosong -->
        <?php if ($jumlah_data_transaksi == 0) { ?>
            <center style="margin-top: 250px;">
                <h2>Data Kosong</h2>
            </center>
        <?php exit;
        } ?>
        <!-- Looping data transaksi -->
        <?php while ($data_transaksi = mysqli_fetch_assoc($ambil_data_transaksi)) : ?>
            <div class="card-transaksi">
                <div class="card-transaksi-title">
                    <h1><?= $data_transaksi["nama"] ?></h1>
                    <h1><?= date("d F Y", strtotime($data_transaksi["tanggal_transaksi"])) ?></h1>
                </div>
                <?php
                $id_transaksi = $data_transaksi["id_transaksi"];

                // Mengambil data detail_transaksi
                $query_detail_transaksi = "SELECT * FROM detail_transaksi JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi WHERE transaksi.id_transaksi = $id_transaksi";
                $ambil_data_detail_transaksi = mysqli_query($koneksi, $query_detail_transaksi);
                while ($data_detail_transaksi = mysqli_fetch_assoc($ambil_data_detail_transaksi)) :
                ?>
                    <div class="card-transaksi-body-kontainer">
                        <div class="card-transaksi-body">
                            <div class="card-transaksi-body-image">
                                <img src="../assets/img/transaksi/<?= $data_detail_transaksi["gambar_pakaian"] ?>" alt="" width="100px">
                            </div>
                            <div class="card-transaksi-body-keterangan">
                                <h1><?= $data_detail_transaksi["nama_pakaian"] ?></h1>
                                <h1><?= format_rupiah($data_detail_transaksi["harga_pakaian"]) ?></h1>
                            </div>
                        </div>
                    <?php endwhile ?>
                    </div>
                    <div class="card-transaksi-footer">
                        <h1>Total : <?= format_rupiah($data_transaksi["total_harga"]) ?></h1>
                        <p>Selesai</p>
                    </div>
            </div>
        <?php endwhile; ?>
        <hr>
    </main>
</body>

</html>