<?php
include "layouts/layout.php";
include "../pesan.php";
$page = "";

// Mengambil data keranjang
$query_keranjang = "SELECT * FROM keranjang JOIN pakaian ON pakaian.id_pakaian = keranjang.id_pakaian WHERE id_pengguna = $id_pengguna";
$ambil_data_keranjang = mysqli_query($koneksi, $query_keranjang);

// Mengambil jumlah data keranjang
$jumlah_data_keranjang = mysqli_num_rows($ambil_data_keranjang);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembeli | Keranjang</title>
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <!-- <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../assets/css/pembeli.css">
</head>

<body>
    <div class="kontainer">
        <?php
        include "layouts/navbar.php";
        ?>
        <div class="konten-keranjang">
            <!-- Kondisi jika datanya kosong -->
            <?php if ($jumlah_data_keranjang == 0) { ?>
                <center style="margin-top: 150px;">
                    <h2>Data Kosong</h2>
                </center>
                <footer class="keranjang-footer" style="margin-top: 315px;">
                    <div>
                    </div>
                    <div>
                        <button type="submit">Bayar</button>
                    </div>
                </footer>
            <?php exit;
            } ?>
            <!-- Jika datanya ada -->
            <div class="konten-keranjang-kontainer">
                <form action="bayar.php" method="POST">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Produk</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data_keranjang = mysqli_fetch_assoc($ambil_data_keranjang)) : ?>
                                <tr>
                                    <td><input type="checkbox" name="list_pakaian[]" value="<?= $data_keranjang["id_pakaian"] ?>"></td>
                                    <td>
                                        <div class="keranjang-image-kontainer"><img src="../assets/img/pakaian/<?= $data_keranjang["gambar_pakaian"]; ?>" alt="" width="100px"></div>
                                    </td>
                                    <td>
                                        <h1><?= $data_keranjang["nama_pakaian"]; ?></h1>
                                    </td>
                                    <td>
                                        <h2><?= format_rupiah($data_keranjang["harga_pakaian"]); ?></h2>
                                    </td>
                                    <td><a href="hapus_keranjang.php?id=<?= $data_keranjang["id_keranjang"]; ?>" id="hapus_keranjang" onclick="return showConfirmation(event)">Hapus</a></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <footer class="keranjang-footer">
                        <div>
                        </div>
                        <div>
                            <button type="submit">Bayar</button>
                        </div>
                    </footer>
                </form>
            </div>
        </div>
    </div>
</body>

</html>