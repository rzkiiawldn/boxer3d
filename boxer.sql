-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2021 pada 07.45
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boxer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id_about` int(11) NOT NULL,
  `about` text NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id_about`, `about`, `alamat`) VALUES
(1, 'KAMI MENJUAL PRODUK CELANA BOXER / KOLOR YANG DAPAT ANDA GUNAKAN UNTUK BERSANTAI DIRUMAH COCOK UNTUK YANG WFH COCOK JUGA UNTUK NONGKRONG DI DEKAT RUMAH', 'Tangerang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_motif` varchar(225) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `foto_barang` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_motif`, `harga_barang`, `stok_barang`, `foto_barang`) VALUES
(6, 'kesra', 23000, 4, 'WhatsApp_Image_2021-05-28_at_22_30_47.jpeg'),
(7, 'kesra', 23000, 4, 'WhatsApp_Image_2021-05-28_at_22_30_48_(1).jpeg'),
(8, 'kesra', 23000, 4, 'WhatsApp_Image_2021-05-28_at_22_30_48.jpeg'),
(9, 'kesra', 23000, 4, 'WhatsApp_Image_2021-05-28_at_22_30_49_(1).jpeg'),
(10, 'kesra', 23000, 4, 'WhatsApp_Image_2021-05-28_at_22_30_49.jpeg'),
(11, 'kesra', 23000, 4, 'WhatsApp_Image_2021-05-28_at_22_30_50_(1).jpeg'),
(12, 'kesra', 23000, 4, 'WhatsApp_Image_2021-05-28_at_22_30_50.jpeg'),
(13, 'kesra', 23000, 4, 'WhatsApp_Image_2021-05-28_at_22_30_51_(1).jpeg'),
(14, 'kesra', 23000, 4, 'WhatsApp_Image_2021-05-28_at_22_30_51_(2).jpeg'),
(15, 'kesra', 23000, 1, 'WhatsApp_Image_2021-05-28_at_22_30_51.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(225) NOT NULL,
  `isi_berita` text NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pengirim` varchar(100) NOT NULL,
  `view` int(11) NOT NULL,
  `foto_berita` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `isi_berita`, `tanggal_input`, `pengirim`, `view`, `foto_berita`) VALUES
(4, 'Batas Transfer', 'Batas Transfer sebelum lebaran', '2021-05-28 17:00:00', 'admin', 0, 'WhatsApp_Image_2021-05-28_at_22_43_26.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `foto_event` varchar(225) NOT NULL,
  `deskripsi_event` text NOT NULL,
  `tanggal_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `foto_event`, `deskripsi_event`, `tanggal_akhir`) VALUES
(4, 'WhatsApp_Image_2021-05-28_at_22_57_17.jpeg', 'Promo Boxer', '2021-05-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status_pengajuan` enum('terima','tolak','proses') NOT NULL,
  `foto_bukti` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `status` int(11) NOT NULL,
  `kode_bayar` int(11) NOT NULL,
  `total_harga` int(100) NOT NULL,
  `total_pesanan` int(11) NOT NULL,
  `bukti_pembayaran` varchar(225) NOT NULL,
  `no_tlp_pesanan` varchar(50) DEFAULT NULL,
  `alamat_pesanan` text DEFAULT NULL,
  `kecamatan_pesanan` varchar(100) DEFAULT NULL,
  `kode_pos_pesanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `user_id`, `tanggal_pesanan`, `status`, `kode_bayar`, `total_harga`, `total_pesanan`, `bukti_pembayaran`, `no_tlp_pesanan`, `alamat_pesanan`, `kecamatan_pesanan`, `kode_pos_pesanan`) VALUES
(34, 2, '2021-05-29', 3, 253, 184000, 8, 'WhatsApp_Image_2021-05-28_at_22_43_25.jpeg', '085781212292', 'jl. kp kelapa rt 03/005', 'tangerang', 15117);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `id_pesanan_detail` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `jumlah_harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`id_pesanan_detail`, `barang_id`, `pesanan_id`, `jumlah_barang`, `jumlah_harga`) VALUES
(47, 15, 34, 3, 69000),
(48, 14, 34, 2, 46000),
(49, 13, 34, 1, 23000),
(50, 11, 34, 2, 46000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `return_barang`
--

CREATE TABLE `return_barang` (
  `id_return` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_return` date NOT NULL,
  `alasan_return` text NOT NULL,
  `video` longtext NOT NULL,
  `status_return` enum('proses','terima','tolak') NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `rekening` varchar(100) NOT NULL,
  `foto_resi` varchar(225) NOT NULL,
  `alamat_pengembalian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `nama`) VALUES
(1, 'Dropshipper'),
(2, 'Reseller'),
(3, 'Return Barang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `syarat`
--

CREATE TABLE `syarat` (
  `id_syarat` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `syarat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `syarat`
--

INSERT INTO `syarat` (`id_syarat`, `role_id`, `syarat`) VALUES
(2, 1, 'minimal beli banyak'),
(3, 2, 'beli 20'),
(4, 3, 'foto yg benar ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `no_tlp` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(225) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `dropship` int(11) NOT NULL,
  `reseller` int(11) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `no_tlp`, `alamat`, `kecamatan`, `kode_pos`, `dropship`, `reseller`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '', '', '', 0, 0, 0, '$2y$10$AA0Yv15cUITbGG3jS4otwuSnd187JKKcMflBb8UOqoYIL1es98J.q', 'admin'),
(2, 'Rizki', 'user@gmail.com', '085781212292', 'jl. kp kelapa rt 03/005 Tangerang', 'tangerang', 15117, 1, 0, '$2y$10$AA0Yv15cUITbGG3jS4otwuSnd187JKKcMflBb8UOqoYIL1es98J.q', 'user'),
(3, 'Muhammad Rizki Awaludin', 'rizkiawaludin323@gmail.com', '1212', 'jl. kp kelapa rt 03/005', 'tgr', 15117, 0, 1, '$2y$10$AA0Yv15cUITbGG3jS4otwuSnd187JKKcMflBb8UOqoYIL1es98J.q', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_akses_menu`
--

CREATE TABLE `user_akses_menu` (
  `id_akses` int(11) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `role_akses` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_akses_menu`
--

INSERT INTO `user_akses_menu` (`id_akses`, `role`, `role_akses`) VALUES
(4, 'admin', 'admin'),
(5, 'admin', 'user'),
(6, 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`id_pesanan_detail`);

--
-- Indeks untuk tabel `return_barang`
--
ALTER TABLE `return_barang`
  ADD PRIMARY KEY (`id_return`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`id_syarat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  ADD PRIMARY KEY (`id_akses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `id_pesanan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `return_barang`
--
ALTER TABLE `return_barang`
  MODIFY `id_return` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `syarat`
--
ALTER TABLE `syarat`
  MODIFY `id_syarat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
