-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Feb 2020 pada 17.18
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_barcode` varchar(100) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `id_user`, `kode_barcode`, `nama_barang`, `harga_beli`, `harga_jual`, `profit`, `stok`, `satuan`, `foto`) VALUES
(9, 2, '89981108111', 'filter', 4000, 10000, 6000, 93, 'Lusin', 'Penguins.jpg'),
(10, 16, '0213102', 'Rokok camel yellow', 16000, 20000, 4000, 61, 'Pack', ''),
(11, 16, '2000100012', 'Rokok gudang garam 12', 16000, 19000, 3000, 98, 'Pack', ''),
(12, 2, '8997217370199', 'camel kuning', 3000, 15000, 12000, 82, 'Pack', 'Jellyfish.jpg'),
(13, 16, '8997217370199', 'camel', 5500, 10000, 4500, 15, 'Pack', ''),
(14, 20, '0123456789', 'Buku Gambar', 5000, 10000, 5000, 47, 'Lusin', ''),
(15, 20, '0987654321', 'Buku Tuis', 15000, 30000, 15000, 30, 'Pack', ''),
(16, 20, '01', 'Kertas HVS 70gram', 40000, 60000, 20000, 14, 'Pack', ''),
(17, 21, '12345', 'lampu', 5000, 10000, 5000, 17, 'Pack', ''),
(18, 21, '56789', 'Kabel roll', 40000, 55000, 15000, 18, 'Pack', ''),
(19, 21, '1234567890', 'Speaker JBL', 300000, 500000, 200000, 9, 'Pack', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `kode_barcode` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_user`, `kode_transaksi`, `kode_barcode`, `jumlah`, `total`, `tgl_transaksi`, `id_pelanggan`) VALUES
(16, 21, 'PJ-9986286225', '12345', 3, 30000, '2019-12-12', 0),
(17, 21, 'PJ-9986286225', '56789', 1, 55000, '2019-12-12', 0),
(18, 21, 'PJ-9986286225', '1234567890', 1, 500000, '2019-12-12', 0),
(19, 20, 'PJ-3304788388', '0123456789', 1, 10000, '2019-12-13', 0),
(20, 2, 'PJ-3746947783', '899811081111', 3, 60000, '2009-12-31', 0),
(21, 2, 'PJ-3746947783', '899811081111', 1, 20000, '2009-12-31', 0),
(22, 2, 'PJ-4424059844', '8992772311014', 1, 2000, '2019-12-17', 0),
(23, 2, 'PJ-4424059844', '8992772311014', 1, 2000, '2019-12-17', 0),
(24, 2, 'PJ-4424059844', '89981108', 1, 10000, '2019-12-17', 0),
(25, 2, 'PJ-0083095188', '89981108', 1, 10000, '2019-12-17', 0),
(26, 2, 'PJ-0095944737', '89981108111', 3, 30000, '2019-12-18', 0),
(27, 2, 'PJ-0095944737', '8997217370199', 1, 15000, '2019-12-18', 0),
(28, 2, 'PJ-7557370826', '89981108111', 1, 10000, '2019-12-18', 0),
(29, 2, 'PJ-7557370826', '8997217370199', 1, 15000, '2019-12-18', 0),
(30, 2, 'PJ-7950797268', '8997217370199', 1, 15000, '2019-12-18', 0),
(31, 2, 'PJ-7531020651', '8997217370199', 1, 15000, '2019-12-18', 0),
(32, 2, 'PJ-2762623865', '89981108111', 1, 10000, '2019-12-18', 0),
(33, 2, 'PJ-2762623865', '8997217370199', 1, 15000, '2019-12-18', 0),
(34, 21, 'PJ-7426875640', '56789', 1, 55000, '2020-01-17', 0);

--
-- Trigger `tb_transaksi`
--
DELIMITER $$
CREATE TRIGGER `jual` AFTER INSERT ON `tb_transaksi` FOR EACH ROW BEGIN 
UPDATE tb_barang
SET stok = stok - NEW.jumlah
WHERE 
kode_barcode = NEW.kode_barcode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_detail`
--

CREATE TABLE `tb_transaksi_detail` (
  `id_user` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `total_b` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi_detail`
--

INSERT INTO `tb_transaksi_detail` (`id_user`, `kode_transaksi`, `bayar`, `kembali`, `diskon`, `potongan`, `total_b`) VALUES
(21, 'PJ-9986286225', 600000, 73500, 10, 58500, 526500),
(20, 'PJ-3304788388', 10000, 1000, 10, 1000, 9000),
(2, 'PJ-3746947783', 0, 0, 0, 0, 0),
(2, 'PJ-0095944737', 100000, 59500, 10, 4500, 40500),
(2, 'PJ-7557370826', 150000, 127500, 10, 2500, 22500),
(2, 'PJ-7950797268', 0, 0, 0, 0, 0),
(2, 'PJ-7950797268', 100000, 86500, 10, 1500, 13500),
(2, 'PJ-7950797268', 0, 0, 0, 0, 0),
(2, 'PJ-7531020651', 20000, 9500, 30, 4500, 10500),
(21, 'PJ-7426875640', 100000, 50500, 10, 5500, 49500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'penjual',
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `password`, `nama_toko`, `level`, `no_hp`, `alamat`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '-', 'admin', '0', ''),
(2, 'rheza', 'rheza@gmail.com', 'rheza', 'toko doang', 'penjual', '08992403108', 'kp. pulo'),
(16, 'Fajri', 'fajri@gmail.com', 'fajri', 'Toko Fajri', 'penjual', '0812456764', 'Bekasi Barat'),
(20, 'Rheza Fajrian', 'rhezafajrian@gmail.com', '12345', 'Toko Jaya Abadi', 'penjual', '0899292999', 'Kp. Poncol Jaya No.12 RT.04 RW.19 Jakasampurna, Bekasi Barat'),
(21, 'alberto', 'alberto@gmail.com', '12345', 'Toko Lae', 'penjual', '089998889', 'Perwira, bekasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indeks untuk tabel `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  ADD KEY `kode_user` (`id_user`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  ADD CONSTRAINT `tb_transaksi_detail_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_transaksi` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
