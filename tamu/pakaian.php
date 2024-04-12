<?php
include "layouts/layout.php";
$page = "pakaian";

// Mengambil data pakaian
$query_pakaian = "SELECT * FROM pakaian ORDER BY id_pakaian DESC";
$ambil_data_pakaian = mysqli_query($koneksi, $query_pakaian);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tamu | Pakaian</title>
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/pembeli.css">
</head>

<body>
    <div class="kontainer">
        <?php
        include "layouts/navbar.php"
        ?>
        <div class="konten">
            <div class="konten-produk">
                <div class="konten-produk-judul">
                    <h1>produk kami</h1>
                </div>
                <div class="konten-produk-card-kontainer">
                    <div class="row">
                        <?php while ($data_pakaian = mysqli_fetch_assoc($ambil_data_pakaian)) : ?>
                            <!-- <div class="col-lg-4 col-md-6 col-sm-12 col-12"> -->
                            <div class="col-pakaian">
                                <a href="detail_pakaian.php?id=<?= $data_pakaian["id_pakaian"] ?>">
                                    <div class="konten-produk-card">
                                        <div class="konten-produk-card-item">
                                            <div class="konten-produk-card-item-image">
                                                <img src="../assets/img/pakaian/<?= $data_pakaian["gambar_pakaian"] ?>" alt="">
                                            </div>
                                            <div class="konten-produk-card-item-teks">
                                                <h1><?= $data_pakaian["nama_pakaian"] ?></h1>
                                                <div class="konten-produk-card-item-teks-keranjang">
                                                    <p><?= format_rupiah($data_pakaian["harga_pakaian"]) ?></p>
                                                    <form action="login.php" method="POST">
                                                        <button type="submit"><i class="fa-solid fa-cart-shopping"></i></button>
                                                    </form>
                                                </div>
                                            </div>
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