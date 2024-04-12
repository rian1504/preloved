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
            <li><a href="login.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
            <li><a href="../pembeli/daftar.php" class="navbar-tombol-daftar">Daftar</i></a></li>
            <li><a href="login.php" class="navbar-tombol-masuk">Masuk</a></li>
        </ul>
    </nav>
</div>