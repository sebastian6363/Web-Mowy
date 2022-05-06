-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2022 pada 16.05
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_bahan_produksi`
--

CREATE TABLE `data_bahan_produksi` (
  `id_bahan` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `perisa` varchar(50) NOT NULL,
  `jumlah_perisa` int(5) NOT NULL,
  `jumlah_susu` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_informasi_website`
--

CREATE TABLE `data_informasi_website` (
  `id_informasi` int(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `konten` varchar(200) NOT NULL,
  `gambar` blob NOT NULL,
  `waktu_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_produk`
--

CREATE TABLE `data_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `gambar_produk` varchar(50) NOT NULL,
  `rasa_produk` varchar(50) NOT NULL,
  `harga_produk` int(50) NOT NULL,
  `berat_produk` int(50) NOT NULL,
  `tanggal_kedaluwarsa` datetime NOT NULL,
  `if_sesudah` text NOT NULL,
  `if_sebelum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_produk`
--

INSERT INTO `data_produk` (`id_produk`, `nama_produk`, `gambar_produk`, `rasa_produk`, `harga_produk`, `berat_produk`, `tanggal_kedaluwarsa`, `if_sesudah`, `if_sebelum`) VALUES
(1, 'Susu Coklat Belgium', 'coklat_belgium.png', 'Coklat Belgium', 5000, 200, '2023-03-22 00:00:00', 'Kemasan harus ditutup rapat dan disimpan dalam lemari pendingin. Produk harus dihabiskan maksimal dalam 7 hari, namun sebaiknya langsung diminum habis setelah dibuka, supaya tetap terjaga kesegarannya.', 'Sebaiknya disimpan dalam suhu kamar meskipun tanpa disimpan dalam pendingin. Jangka waktu penyimpanan yaitu maksimum 10 bulan. Produk juga sebaiknya disimpan dalam kondisi kering, bersih dan di tempat yang sejuk.'),
(2, 'Susu Pisang Enak', 'susu_pisang.png', 'Pisang', 5000, 200, '2022-05-30 20:12:00', 'Kemasan harus ditutup rapat dan disimpan dalam lemari pendingin. Produk harus dihabiskan maksimal dalam 7 hari, namun sebaiknya langsung diminum habis setelah dibuka, supaya tetap terjaga kesegarannya.', 'Sebaiknya disimpan dalam suhu kamar meskipun tanpa disimpan dalam pendingin. Jangka waktu penyimpanan yaitu maksimum 10 bulan. Produk juga sebaiknya disimpan dalam kondisi kering, bersih dan di tempat yang sejuk.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_rekapitulasi`
--

CREATE TABLE `data_rekapitulasi` (
  `id_rekapitulasi` int(5) NOT NULL,
  `id_transaksi` int(5) NOT NULL,
  `id_bahan` int(5) NOT NULL,
  `hasil` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `waktu_transaksi` datetime NOT NULL,
  `bukti_transaksi` varchar(255) NOT NULL,
  `id_pembeli` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jumlah_produk` int(5) NOT NULL,
  `total` int(10) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `status` enum('Ongoing','Riwayat','Berlangsung') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_transaksi`
--

INSERT INTO `data_transaksi` (`id_transaksi`, `waktu_transaksi`, `bukti_transaksi`, `id_pembeli`, `id_produk`, `jumlah_produk`, `total`, `id_pegawai`, `status`) VALUES
(27, '2022-05-06 05:30:07', '4c334116074943dd56459d4d6660ce95.jpg', 6, 1, 3, 15000, 4, 'Riwayat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ulasan_produk`
--

CREATE TABLE `data_ulasan_produk` (
  `id_ulasan` int(5) NOT NULL,
  `id_pembeli` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `ulasan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Pegawai','Pembeli') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id`, `nama`, `alamat`, `no_hp`, `gender`, `email`, `username`, `password`, `level`) VALUES
(1, 'Andini Ike Budi Pramudita', 'Mojokerto', '082132943415', 'Perempuan', 'andiniike45@gmail.com', 'AndiniPM', 'andini123', 'Pegawai'),
(2, 'Daffa Aliffatur Rahman', 'Blitar', '085745709978', 'Laki - laki', 'daffaaliffatur96@gmail.com', 'DaffaTester', 'daffa123', 'Pegawai'),
(3, 'Adinda Salsabila Zahrah', 'Probolinggo', '081934800013', 'Perempuan', 'adindasalsabila3@gmail.com', 'AdindaDesign', 'adinda123', 'Pegawai'),
(4, 'Sebastian Gavin Haryaka', 'Bali', '08813430521', 'Laki - laki', 'sebastiangavin80@gmail.com', 'GavinProgrammer', 'gavin123', 'Pegawai'),
(5, 'Renji Rizky Maulana', 'Jember', '089505363237', 'Laki - laki', 'renjirizki@gmail.com', 'RenjiAnalyst', 'renji123', 'Pegawai'),
(6, 'Mario Jola', 'Jakarta', '082132949876', 'Laki - laki', 'mariojola123@gmail.com', 'mariojol', 'mario123', 'Pembeli'),
(7, 'Endang Maria', 'Situbondo', '092124564455', 'Perempuan', 'endangmaria123@gmail.com', 'EndangMaria12', 'endang123', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_transaksi` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('Ongoing') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_transaksi`, `id_pembeli`, `id_produk`, `jumlah_produk`, `total`, `status`) VALUES
(4, 6, 1, 3, 15000, 'Ongoing');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_bahan_produksi`
--
ALTER TABLE `data_bahan_produksi`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indeks untuk tabel `data_informasi_website`
--
ALTER TABLE `data_informasi_website`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `data_produk`
--
ALTER TABLE `data_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `data_rekapitulasi`
--
ALTER TABLE `data_rekapitulasi`
  ADD PRIMARY KEY (`id_rekapitulasi`);

--
-- Indeks untuk tabel `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `data_ulasan_produk`
--
ALTER TABLE `data_ulasan_produk`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_bahan_produksi`
--
ALTER TABLE `data_bahan_produksi`
  MODIFY `id_bahan` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_informasi_website`
--
ALTER TABLE `data_informasi_website`
  MODIFY `id_informasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_produk`
--
ALTER TABLE `data_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `data_rekapitulasi`
--
ALTER TABLE `data_rekapitulasi`
  MODIFY `id_rekapitulasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `data_ulasan_produk`
--
ALTER TABLE `data_ulasan_produk`
  MODIFY `id_ulasan` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
