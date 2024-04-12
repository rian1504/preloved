-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Des 2023 pada 17.53
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `preloved`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `nama_pakaian` varchar(100) NOT NULL,
  `harga_pakaian` int(11) NOT NULL,
  `gambar_pakaian` varchar(100) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `nama_pakaian`, `harga_pakaian`, `gambar_pakaian`, `id_transaksi`) VALUES
(1, 'Celana Pendek Hijau', 80000, 'hijau1703504156.png', 1),
(2, 'Hoodie Hitam', 120000, 'hitam1703503857.png', 2),
(3, 'Kaos Hijau Cream', 80000, 'garis hijau1703509106.png', 2),
(4, 'Kaos Hitam', 80000, 'spiderman1703508627.png', 3),
(5, 'Jaket Abu Cream', 150000, 'abu1703509051.png', 3),
(6, 'Jaket Varsity', 150000, 'varsity1703504116.png', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `gambar_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar_kategori`) VALUES
(1, 'Blouse', 'blouse pink crincle1703503235.png'),
(2, 'Jeans', 'jeans-removebg-preview1703503252.png'),
(3, 'Celana Pendek', 'cream1703503280.png'),
(4, 'Kaos', 'TALISHKO_-_Butterfly_Letter_Print_Tee_-_Green___S-removebg-preview1703503426.png'),
(5, 'Hoodie', 'hoodie1703503539.png'),
(6, 'Jaket', 'putih1703503561.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_pakaian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pakaian`
--

CREATE TABLE `pakaian` (
  `id_pakaian` int(11) NOT NULL,
  `nama_pakaian` varchar(100) NOT NULL,
  `harga_pakaian` int(11) NOT NULL,
  `deskripsi_pakaian` varchar(100) NOT NULL,
  `gambar_pakaian` varchar(100) NOT NULL,
  `tanggal_pakaian` date NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pakaian`
--

INSERT INTO `pakaian` (`id_pakaian`, `nama_pakaian`, `harga_pakaian`, `deskripsi_pakaian`, `gambar_pakaian`, `tanggal_pakaian`, `id_kategori`) VALUES
(1, 'kaos cream new york', 80000, 'Terbuat dari material pilihan yang soft dan nyaman dikenakan seharian.', 'new york1703503759.png', '2023-12-25', 4),
(3, 'Blouse Putih', 60000, 'Kain berbahan tipis tidak terawang, dan tidak gampang kusut', 'blouse putih tulang1703504058.png', '2023-12-25', 1),
(6, 'Jeans Cream', 120000, 'Jeans model pinggang High Waist (diatas pinggang) dengan bawahan lebar yang over bakalan buat kamu k', 'cream1703504277.png', '2023-12-25', 2),
(7, 'Hoodie Biru', 150000, 'Kain berbahan tebal, cocok digunakan saat cuaca dingin', 'biru chicago1703508588.png', '2023-12-25', 5),
(9, 'Jeans Putih', 150000, 'Terbuat dari material pilihan yang soft dan nyaman dikenakan seharian.', 'putih1703508680.png', '2023-12-25', 2),
(10, 'Blouse Hijau', 90000, 'Kain berbahan tipis tidak terawang, dan tidak gampang kusut', 'blouse hijau1703508727.png', '2023-12-25', 1),
(11, 'Jaket Coklat', 120000, 'Kain berbahan tebal, adem, dan cocok digunakan saat musim dingin', 'coklat1703508868.png', '2023-12-25', 6),
(12, 'Hoodie Cream', 120000, 'Kain berbahan tebal, cocok digunakan saat cuaca dingin', 'cream miami1703508910.png', '2023-12-25', 5),
(13, 'Jeans Hitam', 150000, 'Terbuat dari kain pilihan yang soft dan nyaman dikenakan seharian.', 'hitam1703508973.png', '2023-12-25', 2),
(16, 'Kaos Hitam Polos', 80000, 'Kain berbahan tipis tidak terawang, dan tidak gampang kusut', 'kaos1703509301.png', '2023-12-25', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `peran` enum('penjual','pembeli') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `email`, `alamat`, `no_hp`, `tanggal_lahir`, `username`, `password`, `peran`) VALUES
(1, 'Alia Pramestia Nurdenia', 'alialily782@gmail.com', 'tj piayu', '085264138300', '2024-01-04', 'alia', '$2y$10$VQPheI7dw9VeCpAG1Aj.V.S/P3BwX201idGdiHz.PAlPw0AmV7a5W', 'pembeli'),
(2, 'umi', 'umi@gmail.com', '', '0876654512430', '2023-12-25', 'umi', '$2y$10$3k8m3fo08qsFjwRM6w1WsOfEEU5voovajhlSfqi9OrTYlpPKm3Eby', 'penjual'),
(3, 'rian', 'rian@gmail.com', 'Batu Ampar', '089522718438', '2023-12-25', 'rian', '$2y$10$aVAOg8yQtNIRVti57XEQ8.3g/ud.EcaMPm13SwYmulWD33MqGxNby', 'pembeli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_transaksi`, `total_harga`, `id_pengguna`) VALUES
(1, '2023-12-25', 80000, 1),
(2, '2023-12-25', 200000, 1),
(3, '2023-12-25', 230000, 3),
(4, '2023-12-25', 150000, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_user` (`id_pengguna`),
  ADD KEY `id_pakaian` (`id_pakaian`);

--
-- Indeks untuk tabel `pakaian`
--
ALTER TABLE `pakaian`
  ADD PRIMARY KEY (`id_pakaian`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pakaian`
--
ALTER TABLE `pakaian`
  MODIFY `id_pakaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_pakaian`) REFERENCES `pakaian` (`id_pakaian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pakaian`
--
ALTER TABLE `pakaian`
  ADD CONSTRAINT `pakaian_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
