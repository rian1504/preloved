<?php
$page = "Tambah Kategori";
include "../layouts/layout_tambah.php";
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
                    <input type="text" name="nama_kategori" id="nama" placeholder="Masukkan nama kategori">
                </div>
                <div class="card-tambah-gambar">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar_kategori" id="gambar">
                </div>
                <div class="card-preview">
                    <img id="preview" alt="Preview Gambar">
                </div>
                <button type="submit">Kirim</button>
            </form>

        </div>

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