<?php
$page = "Pencarian";
include "layouts/layout.php";

if (!$_POST) {
    header("location: beranda.php?pesan=gagal_search");
}

// Mengambil data inputan
$search = $_POST["search"];

// Mengambil data pakaian sesuai inputan
$query_pakaian = "SELECT * FROM pakaian WHERE nama_pakaian LIKE '%$search%'";
$ambil_data_pakaian = mysqli_query($koneksi, $query_pakaian);
$jumlah_data_pakaian = mysqli_num_rows($ambil_data_pakaian);

// Mengambil data kategori sesuai inputan
$query_kategori = "SELECT * FROM kategori WHERE nama_kategori LIKE '%$search%'";
$ambil_data_kategori = mysqli_query($koneksi, $query_kategori);
$jumlah_data_kategori = mysqli_num_rows($ambil_data_kategori);
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
        <?php if ($jumlah_data_kategori == 0) {
        ?>
            <h1>Data kosong</h1>
        <?php
        }
        ?>

        <h2>Kategori</h2>
        <div class="row">
            <?php while ($data_kategori = mysqli_fetch_assoc($ambil_data_kategori)) : ?>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="card-produk">
                        <div class="card-produk-image">
                            <img src="../assets/img/kategori/<?= $data_kategori["gambar_kategori"] ?>" alt="">
                        </div>
                        <h1 class="card-produk-text"><?= $data_kategori["nama_kategori"] ?></h1>
                        <div class="card-produk-button">
                            <a href="kategori/edit.php?id=<?= $data_kategori["id_kategori"] ?>" class="button-edit">Edit</a> |
                            <a href="kategori/hapus.php?id=<?= $data_kategori["id_kategori"] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="button-hapus">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php if ($jumlah_data_pakaian == 0) {
        ?>
            <h1>Data kosong</h1>
        <?php
        }
        ?>
        <h2>Pakaian</h2>
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