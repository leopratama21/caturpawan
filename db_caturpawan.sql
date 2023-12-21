-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2023 pada 14.41
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_caturpawan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti`
--

CREATE TABLE `bukti` (
  `bukti_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `gmabar_bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bukti`
--

INSERT INTO `bukti` (`bukti_id`, `pesanan_id`, `gmabar_bukti`) VALUES
(14, 3, 'img/bukti/6571a1840fd3eCapture3.PNG'),

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `detail_pesanan_id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`detail_pesanan_id`, `id_pesanan`, `id_user`, `id_produk`, `nama_produk`, `harga`, `qty`, `tanggal`) VALUES
(20, 17, 6, 11, 'indomie rendang', 3000, 2, '2023-11-22 00:47:11'),
(21, 18, 6, 12, 'indomie goreng', 3000, 1, '2023-11-22 16:07:21'),
(22, 18, 6, 11, 'indomie rendang', 3000, 1, '2023-11-22 16:07:21'),
(23, 19, 6, 11, 'indomie rendang', 3000, 1, '2023-11-23 06:17:55'),
(24, 20, 6, 9, 'telur puyu', 500, 1, '2023-11-23 11:47:32'),
(25, 20, 6, 7, 'misedap cup', 4000, 1, '2023-11-23 11:47:32'),
(26, 21, 6, 10, 'Beras', 15000, 2, '2023-11-23 16:58:33'),
(27, 22, 7, 10, 'Beras', 15000, 3, '2023-11-23 17:42:44'),
(28, 22, 7, 7, 'misedap cup', 4000, 1, '2023-11-23 17:42:44'),
(29, 23, 6, 11, 'indomie rendang', 3000, 1, '2023-11-24 03:26:40'),
(30, 24, 6, 10, 'Beras', 15000, 1, '2023-11-24 03:55:06'),
(31, 25, 7, 10, 'Beras', 15000, 2, '2023-11-25 16:50:33'),
(32, 26, 7, 11, 'indomie rendang', 3000, 1, '2023-11-25 00:00:00'),
(33, 27, 7, 10, 'Beras', 15000, 1, '2023-11-25 18:54:02'),
(34, 28, 7, 11, 'indomie rendang', 3000, 1, '2023-11-25 18:55:44'),
(35, 29, 7, 10, 'Beras', 15000, 1, '2023-11-25 19:01:03'),
(36, 30, 7, 10, 'Beras', 15000, 1, '2023-11-25 19:19:14'),
(37, 31, 7, 10, 'Beras', 15000, 2, '2023-11-25 20:59:15'),
(38, 32, 7, 10, 'Beras', 15000, 2, '2023-11-30 07:44:45'),
(39, 33, 7, 10, 'Beras', 15000, 1, '2023-11-30 07:54:55'),
(40, 34, 7, 11, 'indomie rendang', 3000, 1, '2023-11-30 08:07:47'),
(41, 35, 7, 11, 'indomie rendang', 3000, 3, '2023-11-30 08:09:06'),
(42, 36, 7, 11, 'indomie rendang', 3000, 1, '2023-11-30 08:17:27'),
(43, 37, 7, 12, 'indomie goreng', 3000, 1, '2023-11-30 08:18:34'),
(44, 38, 7, 11, 'indomie rendang', 3000, 1, '2023-11-30 10:11:42'),
(45, 39, 7, 10, 'Beras', 15000, 1, '2023-11-30 10:15:46'),
(46, 40, 7, 11, 'indomie rendang', 3000, 1, '2023-11-30 10:36:54'),
(47, 41, 7, 12, 'indomie goreng', 3000, 1, '2023-12-07 10:55:46'),
(48, 42, 7, 11, 'indomie rendang', 3000, 2, '2023-12-07 10:56:29'),
(49, 43, 7, 12, 'indomie goreng', 3000, 2, '2023-12-07 10:58:33'),
(50, 1, 7, 10, 'Beras', 15000, 1, '2023-12-07 11:05:04'),
(51, 2, 7, 12, 'indomie goreng', 3000, 1, '2023-12-07 11:10:58'),
(52, 3, 7, 11, 'indomie rendang', 3000, 1, '2023-12-07 11:21:36'),
(53, 4, 7, 11, 'indomie rendang', 3000, 1, '2023-12-07 11:28:14'),
(54, 1, 7, 10, 'Beras', 15000, 1, '2023-12-07 11:32:46'),
(55, 2, 7, 12, 'indomie goreng', 3000, 1, '2023-12-07 11:33:24'),
(56, 3, 7, 10, 'Beras', 15000, 1, '2023-12-07 11:42:04'),
(57, 4, 7, 11, 'indomie rendang', 3000, 1, '2023-12-07 11:42:50'),
(58, 5, 7, 10, 'Beras', 15000, 1, '2023-12-08 14:37:51'),
(59, 6, 7, 9, 'telur puyu', 500, 2, '2023-12-08 14:44:49'),
(60, 7, 7, 10, 'Beras', 15000, 1, '2023-12-08 14:51:25'),
(61, 8, 7, 10, 'Beras', 15000, 1, '2023-12-10 11:04:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `gambar_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`, `slug_kategori`, `gambar_kategori`) VALUES
(16, 'Indomie', 'Indomie', 'img/kategori/655d35a0dcf8b1700215360-1.jpg'),
(17, 'Telur', 'Telur', 'img/kategori/655d3582846d91700214276-1.jpg'),
(18, 'Beras', 'Beras', 'img/kategori/655d356e273451700211061-1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `keranjang_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty_keranjang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `provinsi_id`, `kota_id`, `nama`) VALUES
(1, 12, 61, 'Bengkayang (Kabupaten) '),
(2, 12, 168, 'Kapuas Hulu (Kabupaten) '),
(3, 12, 176, 'Kayong Utara (Kabupaten) '),
(4, 12, 195, 'Ketapang (Kabupaten) '),
(5, 12, 208, 'Kubu Raya (Kabupaten) '),
(6, 12, 228, 'Landak (Kabupaten) '),
(7, 12, 279, 'Melawi (Kabupaten) '),
(8, 12, 364, 'Pontianak (Kabupaten) '),
(9, 12, 365, 'Pontianak (Kota) '),
(10, 12, 388, 'Sambas (Kabupaten) '),
(11, 12, 391, 'Sanggau (Kabupaten) '),
(12, 12, 395, 'Sekadau (Kabupaten) '),
(13, 12, 415, 'Singkawang (Kota) '),
(14, 12, 417, 'Sintang (Kabupaten) ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `pesanan_id` int(11) NOT NULL,
  `bukti_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_pesanan` varchar(255) NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `nama_pesanan` varchar(255) NOT NULL,
  `no_hp_pesanan` varchar(255) NOT NULL,
  `berat_pesanan` int(11) NOT NULL,
  `kurir_pesanan` varchar(255) NOT NULL,
  `layanan` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `ongkos_kirim` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `alamat_pesanan` text NOT NULL,
  `status_pesanan` enum('Sudah Bayar','Belum Bayar','','') NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `info_pesanan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`pesanan_id`, `bukti_id`, `id_user`, `no_pesanan`, `no_resi`, `nama_pesanan`, `no_hp_pesanan`, `berat_pesanan`, `kurir_pesanan`, `layanan`, `total_harga`, `ongkos_kirim`, `total_bayar`, `alamat_pesanan`, `status_pesanan`, `tanggal_pesanan`, `info_pesanan`) VALUES
(3, 0, 7, 'NP28908401201', '1234123413242134', 'leo', '08123456789', 1000, 'pos', '19500', 15000, 19500, 34500, 'asdfasd', 'Sudah Bayar', '2023-12-07 11:42:04', 'Paket Diterima'),

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_pemasok` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `keterangan_produk` text NOT NULL,
  `gambar_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`produk_id`, `id_kategori`, `id_pemasok`, `nama_produk`, `slug_produk`, `harga_produk`, `stok_produk`, `berat_produk`, `keterangan_produk`, `gambar_produk`) VALUES
(7, 16, 4, 'misedap cup', 'misedap cup', 4000, 48, 20, 'misedap cup', 'img/produk/655d36de959121700215746-1.jpg'),
(8, 16, 3, 'Indomie', 'Indomie', 3000, 50, 20, 'indomie santan enak', 'img/produk/655d3712e2cda1700215475-1.jpg'),
(9, 17, 2, 'telur puyu', 'telur puyu', 500, 47, 20, 'telur puyu pilihan', 'img/produk/655d373e59a141700215574-1.jpg'),
(10, 18, 2, 'Beras', 'Beras', 15000, 977, 1000, 'beras pulen enak', 'img/produk/655d3fcf3a9371700211061-1.jpg'),
(11, 16, 2, 'indomie rendang', 'indomie rendang', 3000, 981, 20, 'enak dan bergizi', 'img/produk/655d3fffe9b441700215360-1.jpg'),
(12, 16, 2, 'indomie goreng', 'indomie goreng', 3000, 994, 20, 'enak', 'img/produk/655d402c204f41700215266-1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `pemasok_id` int(11) NOT NULL,
  `nama_pemasok` varchar(255) NOT NULL,
  `alamat_pemasok` text NOT NULL,
  `keterangan_pemasok` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`pemasok_id`, `nama_pemasok`, `alamat_pemasok`, `keterangan_pemasok`) VALUES
(2, 'Ipin', 'Jl Parit Mayor', 'sembako'),
(3, 'Pupin', 'Pontianak kobar', 'sembako'),
(4, 'ucok', 'Pontianak', 'sembako'),
(6, 'ahmat', 'Jl karet', 'sembako'),
(7, 'Udin', 'Jl. gajah mada', 'sembako\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `nama_user`, `email_user`, `no_hp`, `password`, `foto`, `level`) VALUES
(3, 'leo', 'admin@gmail.com', '0895340823958', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'img/user/1652076402.png', 'admin'),
(7, 'leo', 'leo@gmail.com', '08123456789', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'img/user/1652076402.png', 'user');

--
-- Indeks untuk tabel `bukti`
--
ALTER TABLE `bukti`
  ADD PRIMARY KEY (`bukti_id`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`detail_pesanan_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`keranjang_id`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`pesanan_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`pemasok_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bukti`
--
ALTER TABLE `bukti`
  MODIFY `bukti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `detail_pesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `keranjang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `pesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `pemasok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
