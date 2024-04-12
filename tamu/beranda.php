<?php
$page = "beranda";
include "layouts/layout.php";
include "../pesan.php";

// Mengambil data kategori
$query_kategori = "SELECT * FROM kategori LIMIT 3";
$ambil_data_kategori = mysqli_query($koneksi, $query_kategori);

// Mengambil data pakaian
$query_pakaian = "SELECT * FROM pakaian ORDER BY id_pakaian DESC LIMIT 3";
$ambil_data_pakaian = mysqli_query($koneksi, $query_pakaian);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tamu | Beranda</title>
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/pembeli.css">
</head>

<body>
    <div class="kontainer">
        <?php
        include "layouts/navbar.php";
        ?>
        <div class="konten">
            <div class="konten-header">
                <div class="konten-header-teks">
                    <h2>Diskon Spesial Musim Panas</h2>
                    <p>Dapatkan harga spesial dengan penawaran terbaik di musim panas.</p>
                    <p> Penawaran terbaik dengan stok terbatas yang kami berikan.</p>
                    <p> Ayo beli sebelum hari spesial musim panas berakhir.</p>
                </div>
                <div class="konten-header-review">
                    <div class="konten-header-review-video">
                        <!-- <iframe src="https://assets.pinterest.com/ext/embed.html?id=967218457451312476" frameborder="0" scrolling="no"></iframe> -->
                        <img src="../assets/img/download.jpeg" alt="">
                    </div>
                    <div class="konten-header-review-card-container">
                        <div class="konten-header-review-card">
                            <div class="konten-header-review-card-profile">
                                <img src="../assets/img/winwin.jpg" alt="">
                            </div>
                            <div class="konten-header-review-card-deskripsi">
                                <h3>Winwin</h3>
                                <p>Jaket nya baguss bangett!!</p>
                            </div>
                        </div>
                        <div class="konten-header-review-card2">
                            <div class="konten-header-review-card-profile">
                                <img src="../assets/img/tom.jpg" alt="">
                            </div>
                            <div class="konten-header-review-card-deskripsi">
                                <h3>Tom Holland</h3>
                                <p>Baju nya ademmm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="konten-kategori">
                <div class="konten-kategori-judul">
                    <p>favorit pembeli</p>
                    <h1>kategori popular</h1>
                </div>
                <div class="konten-kategori-card-kontainer">
                    <?php while ($data_kategori = mysqli_fetch_assoc($ambil_data_kategori)) : ?>
                        <a href="detail_kategori.php?id=<?= $data_kategori["id_kategori"] ?>">
                            <div class="konten-kategori-card">
                                <div class="konten-kategori-card-item">
                                    <div class="konten-kategori-card-item-image">
                                        <img src="../assets/img/kategori/<?= $data_kategori["gambar_kategori"] ?>" alt="" width="100px">
                                    </div>
                                    <h1><?= $data_kategori["nama_kategori"] ?></h1>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                    <a href="kategori.php">
                        <div class="konten-kategori-card">
                            <div class="konten-kategori-card-item">
                                <div class="konten-kategori-card-item-ikon">
                                    <i class="fas fa-arrow-right"></i>
                                    <h1>lihat lainnya</h1>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="konten-produk">
                <div class="konten-produk-judul">
                    <p>produk terbaru</p>
                    <h1>produk terbaru dari toko kami</h1>
                </div>
                <div class="konten-produk-card-kontainer">
                    <?php while ($data_pakaian = mysqli_fetch_assoc($ambil_data_pakaian)) : ?>
                        <a href="detail_pakaian.php?id=<?= $data_pakaian["id_pakaian"] ?>">
                            <div class="konten-produk-card" style="margin: 0 15px;">
                                <div class="konten-produk-card-item">
                                    <div class="konten-produk-card-item-image">
                                        <img src="../assets/img/pakaian/<?= $data_pakaian["gambar_pakaian"] ?>" alt="">
                                    </div>
                                    <div class="konten-produk-card-item-teks">
                                        <h1><?= $data_pakaian["nama_pakaian"] ?></h1>
                                        <h2><?= $data_pakaian["deskripsi_pakaian"] ?></h2>
                                        <p><?= format_rupiah($data_pakaian["harga_pakaian"]) ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="konten-testimoni">
                <div class="konten-testimoni-image">
                    <img src="../assets/logo/logo.png" alt="">
                </div>
                <div class="konten-testimoni-review">
                    <div class="konten-testimoni-review-teks">
                        <h1>Testimoni</h1>
                        <h2>apa kata pelanggan kami tentang kami</h2>
                        <p>“Baguss bangett, selalu teracuni sama produknya Clothes.id”
                            “Celananya sudah sampai pas dipinggang untuk aku yg BB 50kg”
                            “Baju blouse nya selalu bagus bangett, saya sudah 2x beli disini”
                        </p>
                    </div>
                    <div>
                        <div>
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include "layouts/footer.php"
        ?>
    </div>
</body>

</html>