<?php
include "layouts/layout.php";
$page = "kategori";

// Mengambil data kategori
$query_kategori = "SELECT * FROM kategori";
$ambil_data_kategori = mysqli_query($koneksi, $query_kategori);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembeli | Kategori</title>
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
            <div class="konten-kategori">
                <div class="konten-kategori-judul">
                    <h1>kategori produk</h1>
                </div>
                <div class="konten-kategori-card-kontainer">
                    <div class="row">
                        <?php while ($data_kategori = mysqli_fetch_assoc($ambil_data_kategori)) : ?>
                            <!-- <div class="col-lg-3 col-md-4 col-sm-6 col-12"> -->
                            <div class="col-kategori">
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
                            </div>
                        <?php endwhile; ?>
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