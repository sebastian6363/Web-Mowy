-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 09:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

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
-- Table structure for table `data_bahan_produksi`
--

CREATE TABLE `data_bahan_produksi` (
  `id_bahan` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `perisa` varchar(50) NOT NULL,
  `jumlah_perisa` int(5) NOT NULL,
  `jumlah_susu` float NOT NULL,
  `jumlah_botol` int(255) NOT NULL,
  `ukuran` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `waktu_bahan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_bahan_produksi`
--

INSERT INTO `data_bahan_produksi` (`id_bahan`, `id_pegawai`, `nama_produksi`, `perisa`, `jumlah_perisa`, `jumlah_susu`, `jumlah_botol`, `ukuran`, `total`, `waktu_bahan`) VALUES
(1, 1, 'Susu Coklat Belgium', 'Coklat', 5, 2.5, 10, 250, 3125, '2022-06-19 19:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `data_informasi_website`
--

CREATE TABLE `data_informasi_website` (
  `id_informasi` int(5) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `waktu_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_informasi_website`
--

INSERT INTO `data_informasi_website` (`id_informasi`, `menu`, `judul`, `konten`, `gambar`, `waktu_pembuatan`) VALUES
(1, 'Selengkapnya', 'Nutrisi lengkap dan seimbang', 'Dari sapi-sapi bahagia yang diberikan perhatian\r\nekstra 24 jam tanpa henti.', 'gambal_capi.jpeg', '2022-06-19 19:11:13'),
(2, 'Tentang Kami', '', 'Mowy adalah website sistem informasi yang berfungsi membantu proses pengelolaan dan penjualan susu sapi pada mitra Dairy Farm Margo Utomo, Banyuwangi, Jawa Timur. Margo Utomo dalam bahasa Jawa berarti', 'tentangKami.jpeg', '2022-06-19 19:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `data_produk`
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
-- Dumping data for table `data_produk`
--

INSERT INTO `data_produk` (`id_produk`, `nama_produk`, `gambar_produk`, `rasa_produk`, `harga_produk`, `berat_produk`, `tanggal_kedaluwarsa`, `if_sesudah`, `if_sebelum`) VALUES
(1, 'Susu Coklat Belgium', 'coklat_belgium.png', 'Coklat Belgium', 3000, 200, '2022-05-27 21:03:00', 'Kemasan harus ditutup rapat dan disimpan dalam lemari pendingin. Produk harus dihabiskan maksimal dalam 7 hari, namun sebaiknya langsung diminum habis setelah dibuka, supaya tetap terjaga kesegarannya.', 'Sebaiknya disimpan dalam suhu kamar meskipun tanpa disimpan dalam pendingin. Jangka waktu penyimpanan yaitu maksimum 10 bulan. Produk juga sebaiknya disimpan dalam kondisi kering, bersih dan di tempat yang sejuk.'),
(2, 'Susu Pisang Enak', 'susu_pisang.png', 'Pisang', 5000, 200, '2022-05-30 20:12:00', 'Kemasan harus ditutup rapat dan disimpan dalam lemari pendingin. Produk harus dihabiskan maksimal dalam 7 hari, namun sebaiknya langsung diminum habis setelah dibuka, supaya tetap terjaga kesegarannya.', 'Sebaiknya disimpan dalam suhu kamar meskipun tanpa disimpan dalam pendingin. Jangka waktu penyimpanan yaitu maksimum 10 bulan. Produk juga sebaiknya disimpan dalam kondisi kering, bersih dan di tempat yang sejuk.');

-- --------------------------------------------------------

--
-- Table structure for table `data_rekapitulasi`
--

CREATE TABLE `data_rekapitulasi` (
  `id_rekapitulasi` int(5) NOT NULL,
  `tanggal` datetime NOT NULL,
  `transaksi` int(255) NOT NULL,
  `biaya` int(255) NOT NULL,
  `hasil` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_rekapitulasi`
--

INSERT INTO `data_rekapitulasi` (`id_rekapitulasi`, `tanggal`, `transaksi`, `biaya`, `hasil`) VALUES
(1, '2022-06-01 00:00:00', 400000, 100000, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `data_transaksi`
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
-- Dumping data for table `data_transaksi`
--

INSERT INTO `data_transaksi` (`id_transaksi`, `waktu_transaksi`, `bukti_transaksi`, `id_pembeli`, `id_produk`, `jumlah_produk`, `total`, `id_pegawai`, `status`) VALUES
(1, '2022-06-19 01:42:02', 'koneksi.png', 12, 1, 2, 6000, 1, 'Riwayat'),
(2, '2022-06-19 01:44:17', 'Screenshot 2022-04-23 121245.png', 13, 2, 1, 5000, 1, 'Riwayat'),
(3, '2022-06-19 01:54:33', 'wallhaven-28w6l9.png', 6, 1, 12, 36000, 0, 'Ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `data_ulasan_produk`
--

CREATE TABLE `data_ulasan_produk` (
  `id_ulasan` int(5) NOT NULL,
  `id_pembeli` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `ulasan` varchar(100) NOT NULL,
  `status` enum('sudah','belum','berlangsung') NOT NULL,
  `rating` int(10) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `waktu` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_ulasan_produk`
--

INSERT INTO `data_ulasan_produk` (`id_ulasan`, `id_pembeli`, `id_produk`, `nama_pembeli`, `ulasan`, `status`, `rating`, `gambar`, `jumlah`, `waktu`) VALUES
(1, 12, 1, 'Adit', 'Tidak ada ulasan', 'sudah', 4, 'WhatsApp Image 2022-05-16 at 7.43.16 PM.jpeg', 2, '2022-06-19 13:42:02'),
(2, 13, 2, 'Daffa', '', 'berlangsung', 0, '', 1, '2022-06-19 13:44:17'),
(3, 6, 1, 'Mario Jola', '', 'belum', 0, '', 12, '2022-06-19 13:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
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
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `nama`, `alamat`, `no_hp`, `gender`, `email`, `username`, `password`, `level`) VALUES
(1, 'Andini Ike Budi Pramudita', 'Mojokerto', '082132943415', 'Perempuan', 'andiniike45@gmail.com', 'AndiniPM', 'andini123', 'Pegawai'),
(2, 'Daffa Aliffatur Rahman', 'Blitar', '085745709978', 'Laki - laki', 'daffaaliffatur96@gmail.com', 'DaffaTester', 'daffa123', 'Pegawai'),
(3, 'Adinda Salsabila Zahrah', 'Probolinggo', '081934800013', 'Perempuan', 'adindasalsabila3@gmail.com', 'AdindaDesign', 'adinda123', 'Pegawai'),
(4, 'Sebastian Gavin Haryaka', 'Bali', '08813430521', 'Laki - laki', 'sebastiangavin80@gmail.com', 'GavinProgrammer', 'gavin123', 'Pegawai'),
(5, 'Renji Rizky Maulana', 'Jember', '089505363237', 'Laki - laki', 'renjirizki@gmail.com', 'RenjiAnalyst', 'renji123', 'Pegawai'),
(6, 'Mario Jola', 'Jakarta', '082132949876', 'Laki - laki', 'mariojola123@gmail.com', 'mariojol', 'mario123', 'Pembeli'),
(7, 'Endang Maria Satya', 'Banyuwangi', '092124564455', 'Perempuan', 'endangmaria123@gmail.com', 'EndangMaria12', 'endang123', 'Admin'),
(12, 'Adit', 'Jombang', '0812322323', 'Laki - laki', 'oke123@gmail.com', 'aditgans', 'adit123', 'Pembeli'),
(13, 'Daffa', 'Madiun', '08123431412', 'Laki - laki', 'email@gmail.com', 'daffa12', 'daffa123', 'Pembeli'),
(14, 'Albie', 'Madiun', '08120714927', 'Perempuan', 'albie@gmail.com', 'albie12', 'albie123', 'Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
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
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_transaksi`, `id_pembeli`, `id_produk`, `jumlah_produk`, `total`, `status`) VALUES
(7, 11, 1, 10, 50000, 'Ongoing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_bahan_produksi`
--
ALTER TABLE `data_bahan_produksi`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `data_informasi_website`
--
ALTER TABLE `data_informasi_website`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `data_produk`
--
ALTER TABLE `data_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `data_rekapitulasi`
--
ALTER TABLE `data_rekapitulasi`
  ADD PRIMARY KEY (`id_rekapitulasi`);

--
-- Indexes for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `data_ulasan_produk`
--
ALTER TABLE `data_ulasan_produk`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_bahan_produksi`
--
ALTER TABLE `data_bahan_produksi`
  MODIFY `id_bahan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_informasi_website`
--
ALTER TABLE `data_informasi_website`
  MODIFY `id_informasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_produk`
--
ALTER TABLE `data_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `data_rekapitulasi`
--
ALTER TABLE `data_rekapitulasi`
  MODIFY `id_rekapitulasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_ulasan_produk`
--
ALTER TABLE `data_ulasan_produk`
  MODIFY `id_ulasan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
