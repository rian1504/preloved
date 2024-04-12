<?php
include "layouts/layout.php";

if (!$_POST) {
    header("location: keranjang.php?pesan=gagal_ceklis_keranjang");
}

// Mengambil data array dari keranjang
$list_pakaian = $_POST["list_pakaian"];
$jumlah_pesanan = count($list_pakaian);

// Mengubah array menjadi string
$id_list_pakaian = implode(",", $list_pakaian);

// Mengambil data pakaian
$query_pakaian = "SELECT * FROM pakaian WHERE id_pakaian IN ($id_list_pakaian)";
$ambil_data_pakaian = mysqli_query($koneksi, $query_pakaian);

// Mengambil total harga pakaian
$query_harga_pakaian = "SELECT SUM(harga_pakaian) AS total_harga FROM pakaian WHERE id_pakaian IN ($id_list_pakaian)";
$ambil_data_harga_pakaian = mysqli_query($koneksi, $query_harga_pakaian);
$total_harga_pakaian = mysqli_fetch_assoc($ambil_data_harga_pakaian);

// Mengambil data pengguna
$query_pengguna = "SELECT alamat FROM pengguna WHERE id_pengguna = $id_pengguna";
$ambil_data_pengguna = mysqli_query($koneksi, $query_pengguna);
$data_pengguna = mysqli_fetch_assoc($ambil_data_pengguna);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembeli | Pembayaran</title>
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <!-- <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../assets/css/pembeli.css">
</head>

<body>
    <div class="kontainer">
        <div class="konten-tombol-kembali">
            <a href="keranjang.php"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="konten-kontainer">
            <div class="konten-bayar">
                <div class="konten-bayar-judul">
                    <h1>pembayaran</h1>
                    <hr>
                </div>
                <div class="konten-bayar-alamat">
                    <h1>alamat:</h1>
                    <div class="konten-bayar-alamat-deskripsi">
                        <h2><?= $nama ?></h2>
                        <h3><?= $data_pengguna["alamat"] ?></h3>
                    </div>
                </div>
                <?php while ($data_pakaian = mysqli_fetch_assoc($ambil_data_pakaian)) : ?>
                    <div class="konten-bayar-produk">
                        <div class="konten-bayar-produk-image">
                            <img src="../assets/img/pakaian/<?= $data_pakaian["gambar_pakaian"] ?>" alt="" width="100">
                        </div>
                        <div class="konten-bayar-produk-deskripsi">
                            <h1><?= $data_pakaian["nama_pakaian"] ?></h1>
                            <h2><?= $data_pakaian["deskripsi_pakaian"] ?></h2>
                            <h2><?= format_rupiah($data_pakaian["harga_pakaian"]) ?></h2>
                        </div>
                    </div>
                <?php endwhile; ?>
                <div class="konten-bayar-pesan">
                    <h1>pesan:</h1>
                    <input type="text" name="" id="">
                </div>
                <div class="konten-bayar-total">
                    <div class="konten-bayar-total-deskripsi">
                        <h1>total pesanan (<?= $jumlah_pesanan ?> produk)</h1>
                        <h1>total pembayaran</h1>
                    </div>
                    <div class="konten-bayar-total-harga">
                        <h1><?= format_rupiah($total_harga_pakaian["total_harga"]) ?></h1>
                        <form action="fitur_bayar.php" method="POST">
                            <?php for ($x = 0; $x < $jumlah_pesanan; $x++) { ?>
                                <input type="hidden" name="list_pakaian[]" value="<?= $list_pakaian[$x] ?>">
                            <?php } ?>
                            <input type="hidden" name="total_harga" value="<?= $total_harga_pakaian["total_harga"] ?>">
                            <button type="submit">bayar sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>