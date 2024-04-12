<?php
$page = "Tambah Pakaian";
include "../layouts/layout_tambah.php";

// Mengambil data kategori
$query_kategori = "SELECT id_kategori, nama_kategori FROM kategori";
$ambil_data_kategori = mysqli_query($koneksi, $query_kategori);
?>

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
                <h1>Tambah</h1>
            </div>
            <form action="tambah_fitur.php" method="POST" enctype="multipart/form-data">
                <div class="card-tambah-input">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama_pakaian" id="nama" placeholder="Masukkan nama pakaian">
                </div>
                <div class="card-tambah-input">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" name="deskripsi_pakaian" id="deskripsi" placeholder="Masukkan deskripsi pakaian">
                </div>
                <div class="card-tambah-input">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga_pakaian" id="harga" placeholder="Masukkan harga pakaian">
                </div>
                <div class="card-tambah-select">
                    <label for="kategori">Kategori</label>
                    <select name="id_kategori" id="kategori">
                        <option disabled selected>Pilih Kategori</option>
                        <?php while ($data_kategori = mysqli_fetch_assoc($ambil_data_kategori)) : ?>
                            <option value="<?= $data_kategori["id_kategori"] ?>"><?= $data_kategori["nama_kategori"] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="card-tambah-gambar">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar_pakaian" id="gambar">
                </div>
                <div class="card-preview">
                    <img id="preview" alt="Preview Gambar">
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