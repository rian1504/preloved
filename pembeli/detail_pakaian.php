<?php
include "layouts/layout.php";

// Mengambil total data pakaian
$query_id_pakaian = "SELECT id_pakaian FROM pakaian";
$ambil_data_id_pakaian = mysqli_query($koneksi, $query_id_pakaian);

$id = $_GET["id"];

while ($data_id_pakaian = mysqli_fetch_assoc($ambil_data_id_pakaian)) {
    $id_pakaian[] = $data_id_pakaian["id_pakaian"];
}

if (!isset($id)) {
    header("location: pakaian.php");
} elseif (!in_array($id, $id_pakaian)) {
    header("location: pakaian.php");
}

// Mengambil data pakaian
$query_pakaian = "SELECT * FROM pakaian WHERE id_pakaian=$id";
$ambil_data_pakaian = mysqli_query($koneksi, $query_pakaian);
$data_pakaian = mysqli_fetch_assoc($ambil_data_pakaian);

$id_kategori = $data_pakaian['id_kategori'];
// mengambil data kategori
$query_kategori = "SELECT * FROM kategori WHERE id_kategori=$id_kategori";
$ambil_data_kategori = mysqli_query($koneksi, $query_kategori);
$data_kategori = mysqli_fetch_assoc($ambil_data_kategori);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembeli | Detail Pakaian</title>
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <!-- <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../assets/css/pembeli.css">
</head>

<body>
    <div class="kontainer">
        <div class="konten-tombol-kembali">
            <a href="pakaian.php"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="konten-kontainer">
            <div class="konten-detail">
                <div class="konten-detail-image">
                    <img src="../assets/img/pakaian/<?= $data_pakaian["gambar_pakaian"] ?>" alt="" width="100px">
                </div>
                <div class="konten-detail-deskripsi">
                    <h1><?= $data_pakaian["nama_pakaian"] ?></h1>
                    <h2><?= $data_pakaian["deskripsi_pakaian"] ?></h2>
                    <h3><?= format_rupiah($data_pakaian["harga_pakaian"]) ?></h3>
                    <div class="konten-detail-deskripsi-tombol">
                        <form action="tambah_keranjang.php" method="POST">
                            <input type="hidden" name="id_pengguna" value="<?= $id_pengguna ?>">
                            <input type="hidden" name="id_pakaian" value="<?= $data_pakaian["id_pakaian"] ?>">
                            <button type="submit"><i class="fa-solid fa-cart-shopping"></i></button>
                        </form>
                    </div>
                    <h4>kategori: <span><?= $data_kategori["nama_kategori"] ?></span></h4>
                </div>
            </div>
        </div>
        <?php
        include "layouts/footer.php"
        ?>
    </div>
</body>

</html>