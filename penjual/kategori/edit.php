<?php
$page = "Edit Kategori";
include "../layouts/layout_kategori.php";

// Mengambil data kategori yang dipilih
$query_kategori = "SELECT * FROM kategori WHERE id_kategori=$id";
$ambil_data_kategori = mysqli_query($koneksi, $query_kategori);
$data_kategori = mysqli_fetch_assoc($ambil_data_kategori);
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
                <h1>Edit</h1>
            </div>
            <form action="edit_fitur.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="gambar_lama" value="<?= $data_kategori["gambar_kategori"] ?>">

                <div class="card-tambah-nama">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama_kategori" value="<?= $data_kategori["nama_kategori"] ?>">
                </div>
                <div class="card-tambah-gambar">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar_kategori" id="gambar">
                </div>
                <div class="card-preview">
                    <img id="preview" src="../../assets/img/kategori/<?= $data_kategori["gambar_kategori"] ?>" alt="<?= $data_kategori["nama_kategori"] ?>">
                </div>
                <button type="submit">Kirim</button>
            </form>

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