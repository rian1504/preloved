<?php
$pembeli = $_SESSION['id_pengguna'];
$query_jumlah_keranjang = mysqli_query($koneksi,"SELECT COUNT(*) as jumlah_keranjang FROM keranjang WHERE id_pengguna = $pembeli");
$data_jumlah_keranjang = mysqli_fetch_assoc($query_jumlah_keranjang);
?>
<div class="navbar">
    <h1 class="judul">Clothes.id</h1>
    <nav class="navbar-utama">
        <ul>
            <li <?php if ($page == "beranda") echo "class='active'"; ?>>
                <a href="beranda.php">Beranda</a>
            </li>
            <li <?php if ($page == "pakaian") echo "class='active'"; ?>>
                <a href="pakaian.php">Pakaian</a>
            </li>
            <li <?php if ($page == "kategori") echo "class='active'"; ?>>
                <a href="kategori.php">Kategori</a>
            </li>
            <li>
                <form action="search.php" method="post">
                    <div class="pencarian">
                        <i class="fa-solid fa-search"></i>
                        <input type="text" name="search">
                    </div>
                </form>
            </li>
            <li><a href="keranjang.php"><i
                        class="fa-solid fa-cart-shopping"><span><?= $data_jumlah_keranjang['jumlah_keranjang'] ?></span></i></a>
            </li>
            <li><a href="transaksi.php"><i class="fa-solid fa-history"></i></a></li>
            <li>
                <div class="logout">
                    <a href="../database/logout.php">
                        <i class="fa-solid fa-user"></i>
                        <label><?= $_SESSION['username']; ?></label>|
                        <button>Keluar</button>
                    </a>
                </div>
            </li>
        </ul>
    </nav>
</div>