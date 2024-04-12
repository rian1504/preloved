<?php
$page = "Kategori";
include "layouts/layout.php";
include "../pesan.php";

// Mengambil data kategori
$query_kategori = "SELECT * FROM kategori ORDER BY id_kategori DESC";
$ambil_data_kategori = mysqli_query($koneksi, $query_kategori);
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
        <a href="kategori/tambah.php" class="button-tambah">Tambah</a>

        <div class="row">
            <?php while ($data_kategori = mysqli_fetch_assoc($ambil_data_kategori)) : ?>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="card-produk">
                        <div class="card-produk-image">
                            <img src="../assets/img/kategori/<?= $data_kategori["gambar_kategori"] ?>" alt="">
                        </div>
                        <h1 class="card-produk-text"><?= $data_kategori["nama_kategori"] ?></h1>
                        <div class="card-produk-button">
                            <a href="kategori/edit.php?id=<?= $data_kategori["id_kategori"] ?>" class="button-edit">Edit</a>
                            |
                            <a href="kategori/hapus.php?id=<?= $data_kategori["id_kategori"] ?>" onclick="return showConfirmation(event)" class="button-hapus">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
</body>

</html>