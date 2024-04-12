<?php
$daftar_page = ["Beranda", "Kategori", "Pakaian", "Transaksi", "Pencarian"];
$pakaian_page = ["Tambah Pakaian", "Edit Pakaian"];
$kategori_page = ["Tambah Kategori", "Edit Kategori"];

if (in_array($page, $daftar_page)) { ?>
<nav class="navbar">
    <a class="navbar-brand" href="penjual/beranda.php"><span
            style="text-transform: capitalize; margin-left: 20px;"><?= $page ?></span></a>
    <a href="../database/logout.php" class="logout">
        <img src="../assets/icons/profile.svg" alt="" width="30px" height="30px">
        <label><?= $_SESSION['nama']; ?> |</label>
        <span type="button">Keluar</span>
    </a>
</nav>
<?php } else { ?>
<nav class="navbar-form">
    <div class="navbar-form-brand">
        <?php if (in_array($page, $pakaian_page)) { ?>
        <a href="../pakaian.php">
            <img src="../../assets/icons/left-arrow.svg" alt="">
        </a>
        <a href="../pakaian.php"><?= $page ?></a>
        <?php } elseif (in_array($page, $kategori_page)) { ?>
        <a href="../kategori.php">
            <img src="../../assets/icons/left-arrow.svg" alt="">
        </a>
        <a href="../kategori.php"><?= $page ?></a>
        <?php } ?>
    </div>
    <div class="navbar-form-profile">
        <img src="../../assets/icons/profile.svg" alt="">
        <label><?= $_SESSION['username']; ?></label>
    </div>
</nav>
<?php } ?>