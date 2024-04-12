<?php
$page = "Edit Pakaian";
include "../layouts/layout_pakaian.php";

// Mengambil data pakaian yang dipilih
$query_pakaian = "SELECT * FROM pakaian JOIN kategori ON pakaian.id_kategori = kategori.id_kategori WHERE id_pakaian=$id";
$ambil_data_pakaian = mysqli_query($koneksi, $query_pakaian);
$data_pakaian = mysqli_fetch_assoc($ambil_data_pakaian);

// Mengambil data kategori
$query_kategori = "SELECT id_kategori, nama_kategori FROM kategori";
$ambil_data_kategori = mysqli_query($koneksi, $query_kategori);
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjual | <?= $page ?></title>
    <link rel="stylesheet" href="../../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/penjual.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <?php
    include "../layouts/navbar.php";
    include "../layouts/sidebar.php";
    ?>
    <!-- konten -->
    <main class="konten">
        <div class="card-tambah">
            <div class="card-tambah-title">
                <h1>Edit</h1>
            </div>
            <form action="edit_fitur.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_pakaian" value="<?= $data_pakaian["id_pakaian"] ?>">
                <input type="hidden" name="gambar_lama" value="<?= $data_pakaian["gambar_pakaian"] ?>">
                <div class="card-tambah-input">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama_pakaian" id="nama" placeholder="Masukkan nama pakaian" value="<?= $data_pakaian["nama_pakaian"] ?>">
                </div>
                <div class="card-tambah-input">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" name="deskripsi_pakaian" id="deskripsi" placeholder="Masukkan deskripsi pakaian" value="<?= $data_pakaian["deskripsi_pakaian"] ?>">
                </div>
                <div class="card-tambah-input">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga_pakaian" id="harga" placeholder="Masukkan harga pakaian" value="<?= $data_pakaian["harga_pakaian"] ?>">
                </div>
                <div class="card-tambah-select">
                    <label for="kategori">Kategori</label>
                    <select name="id_kategori" id="kategori">
                        <?php while ($data_kategori = mysqli_fetch_assoc($ambil_data_kategori)) : ?>
                            <option value="<?= $data_kategori["id_kategori"] ?>" <?php if ($data_kategori["id_kategori"] == $data_pakaian["id_kategori"]) {
                                                                                    ?> selected <?php
                                                                                            } ?>><?= $data_kategori["nama_kategori"] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="card-tambah-gambar">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar_pakaian" id="gambar">
                </div>
                <div class="card-preview">
                    <img id="preview" src="../../assets/img/pakaian/<?= $data_pakaian["gambar_pakaian"] ?>" alt=" <?= $data_pakaian["nama_pakaian"] ?>">
                </div>
                <button type="submit">Kirim</button>
            </form>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $("#gambar").change(function() {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>