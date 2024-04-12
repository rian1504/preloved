<?php
$home_page = ["Beranda", "Kategori", "Pakaian", "Transaksi", "Pencarian"];
$side_page = ["Edit Kategori","Tambah Kategori", "Edit Pakaian", "Tambah Pakaian"];
?>
<aside class="sidebar">
    <ul>
        <?php if (in_array($page, $home_page)) { ?>
            <img src="../assets/logo/logo.png" alt="">
        <?php } else { ?>
            <img src="../../assets/logo/logo.png" alt="">
        <?php } ?>
        <?php if (in_array($page, $home_page)) { ?>
            <li <?php if ($page == "Beranda") echo "class='active'"; ?>>
                <a href="beranda.php">Beranda</a>
            </li>
            <li <?php if ($page == "Kategori") echo "class='active'"; ?>>
                <a href="kategori.php">Kategori</a>
            </li>
            <li <?php if ($page == "Pakaian") echo "class='active'"; ?>>
                <a href="pakaian.php">Pakaian</a>
            </li>
            <li <?php if ($page == "Transaksi") echo "class='active'"; ?>>
                <a href="transaksi.php">Transaksi</a>
            </li>
            <form action="search.php" method="POST">
                <input type="search" placeholder="Pencarian" name="search">
            </form>
        <?php } else { ?>
            <li <?php if ($page == "Beranda") echo "class='active'"; ?>>
                <a href="../beranda.php">Beranda</a>
            </li>
            <li <?php if ($page == "Kategori") echo "class='active'"; ?>>
                <a href="../kategori.php">Kategori</a>
            </li>
            <li <?php if ($page == "Pakaian") echo "class='active'"; ?>>
                <a href="../pakaian.php">Pakaian</a>
            </li>
            <li <?php if ($page == "Transaksi") echo "class='active'"; ?>>
                <a href="../transaksi.php">Transaksi</a>
            </li>
            <form action="../search.php" method="POST">
                <input type="search" placeholder="Pencarian" name="search">
            </form>
        <?php } ?>
    </ul>
</aside>
<?php
?>