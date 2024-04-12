<?php
$page = "Pakaian";
include "layouts/layout.php";
include "../pesan.php";

// Mengambil data pakaian
$query_pakaian = "SELECT * FROM pakaian ORDER BY id_pakaian DESC";
$ambil_data_pakaian = mysqli_query($koneksi, $query_pakaian);
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
        <a href="pakaian/tambah.php" class="button-tambah">Tambah</a>

        <div class="row">

            <?php while ($data_pakaian = mysqli_fetch_assoc($ambil_data_pakaian)) : ?>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="card-produk">
                        <div class="card-produk-image">
                            <img src="../assets/img/pakaian/<?= $data_pakaian["gambar_pakaian"] ?>" alt="">
                        </div>
                        <h1 class="card-produk-text"><?= $data_pakaian["nama_pakaian"] ?></h1>
                        <p class="card-produk-deskripsi"><?= $data_pakaian["deskripsi_pakaian"] ?></p>
                        <h2 class="card-produk-text"><?= format_rupiah($data_pakaian["harga_pakaian"]) ?></h2>
                        <div class="card-produk-button">
                            <a href="pakaian/edit.php?id=<?= $data_pakaian["id_pakaian"] ?>" class="button-edit">Edit</a> |
                            <a href="pakaian/hapus.php?id=<?= $data_pakaian["id_pakaian"] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="button-hapus">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </main>

</body>

</html>