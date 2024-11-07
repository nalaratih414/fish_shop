-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2024 pada 07.42
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fish_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
('A001', 'Nalar Rati', 'nalaratih414', '12345'),
('A002', 'Nina Alisyah', 'ninasyah123', 'nina123'),
('A003', 'Rangga L', 'rangga123', 'rang123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` varchar(10) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `tanggal_pembayaran` varchar(20) NOT NULL,
  `total_harga` varchar(20) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `id_ongkir` varchar(10) NOT NULL,
  `id_metode` varchar(10) NOT NULL,
  `id_status` varchar(10) NOT NULL,
  `alamat_pengiriman` varchar(100) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `penilaian_produk` varchar(500) NOT NULL,
  `komplain` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faktur`
--

INSERT INTO `faktur` (`id_faktur`, `tanggal_pembelian`, `tanggal_pembayaran`, `total_harga`, `id_pelanggan`, `id_ongkir`, `id_metode`, `id_status`, `alamat_pengiriman`, `bukti_pembayaran`, `penilaian_produk`, `komplain`) VALUES
('F001', '2024-10-30', '', '61000', 'P001', 'O002', 'M002', 'S001', 'Jl. H. Hasan. No. 14, Jakarta Selatan', '', '', ''),
('F002', '2024-10-30', '2024-10-30', '191000', 'P002', 'O003', 'M001', 'S005', 'Jl. Manggala Raya No. 10, Bandung', 'bukticontoh1.jpg', 'Ikannya sehat-sehat', ''),
('F003', '2024-10-31', '', '65000', 'P002', 'O003', 'M001', 'S006', 'Jl. Manggala Raya No. 10, Bandung', '', '', ''),
('F004', '2024-10-31', '', '72000', 'P002', 'O003', 'M001', 'S001', 'Jl. Manggala Raya No. 10, Bandung', '', '', ''),
('F005', '2024-10-31', '2024-10-31', '118000', 'P002', 'O003', 'M002', 'S008', 'Jl. Manggal Raya, Bandung', 'bukticontoh2.jpg', '', 'Plastik pembungkus kurang tebal, khawatir mudah pecah atau robek'),
('F006', '2024-10-31', '2024-10-31', '137000', 'P002', 'O003', 'M001', 'S007', 'Jal. Manggala Raya, Bandung', '20241031050913logo.png', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikan`
--

CREATE TABLE `ikan` (
  `id_ikan` varchar(10) NOT NULL,
  `nama_ikan` varchar(50) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `stok` int(20) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `tanggal_masuk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ikan`
--

INSERT INTO `ikan` (`id_ikan`, `nama_ikan`, `harga`, `foto`, `deskripsi`, `stok`, `id_kategori`, `tanggal_masuk`) VALUES
('I001', 'Ikan Koi ukuran 5-6 cm', '55000', 'koi.jpg', 'Dapatkan Bibit Ikan Koi berkualitas dengan ukuran 5-6 cm, ideal untuk kamu yang ingin memulai usaha ternak! Setiap paket berisi 10 ekor bibit ikan koi yang siap tumbuh dan berkembang. Dengan harga hanya Rp 55.000, kamu dapat memulai hobi atau bisnis yang menguntungkan.\n\nIkan koi terkenal dengan keindahan coraknya dan daya tariknya sebagai ikan hias. Selain itu, ikan ini juga mudah dirawat dan dapat memperindah kolam kamu. Dengan perawatan yang baik, bibit ini akan tumbuh menjadi ikan koi yang sehat dan menawan.\n\nSegera pesan Bibit Ikan Koi ini dan mulailah perjalanan ternak yang penuh warna!', 993, '1', '2024-10-24'),
('I002', 'Ikan Gurame Padang ukuran 4 jari', '37000', 'guramepadang.jpg', 'Dapatkan Ikan Gurame Padang ukuran 4 jari yang ideal untuk ternak! Setiap paket berisi 2 ekor ikan gurame berkualitas tinggi, siap untuk dibudidayakan. Dengan harga hanya Rp 37.000, kamu bisa memulai usaha ternak yang menguntungkan.\r\n\r\nIkan gurame terkenal dengan pertumbuhannya yang cepat dan rasa dagingnya yang lezat, menjadikannya pilihan tepat bagi peternak maupun pecinta ikan. Ikan ini mudah dirawat dan cocok untuk berbagai jenis kolam.\r\n\r\nSegera pesan Ikan Gurame Padang ini dan kembangkan usaha ternak kamu! Investasi yang cerdas untuk masa depan!', 495, '2', '2024-10-25'),
('I003', 'Bibit Nila Merah ukuran 3-4 cm', '58000', 'nilamerah.jpg', 'Siap memulai usaha budidaya ikan? Kami menawarkan bibit ikan nila merah berkualitas, ukuran 3-4 cm, dengan isi 100 ekor hanya seharga Rp 58.000!\r\n\r\nIkan nila merah merupakan salah satu jenis ikan yang populer untuk diternak karena pertumbuhannya yang cepat dan rasa dagingnya yang lezat. Dengan pengelolaan yang baik, Anda bisa mendapatkan hasil panen yang melimpah.\r\n\r\nKeunggulan:\r\n\r\nUkuran ideal: Siap untuk diternak.\r\nKualitas terbaik: Bibit sehat dan aktif.\r\nMudah dalam perawatan: Cocok untuk pemula dan peternak berpengalaman.\r\nJangan lewatkan kesempatan ini! Segera dapatkan bibit ikan nila merah dan mulai usaha budidaya Anda sekarang juga! Hubungi kami untuk pemesanan dan informasi lebih lanjut.', 997, 'KA004', '2024-10-30'),
('I004', 'Bibit Gabus ukuran 3-4 cm', '75000', 'gabus.jpg', 'Siapkan usaha ternak ikan yang menguntungkan dengan Bibit Ikan Gabus ukuran 3-4 cm! Setiap paket berisi 100 ekor bibit ikan gabus berkualitas, siap untuk dibudidayakan. Dengan harga hanya Rp 75.000, kamu bisa memulai perjalanan sukses dalam budidaya ikan.\r\n\r\nIkan gabus dikenal memiliki pertumbuhan yang cepat dan daya tahan yang tinggi, menjadikannya pilihan ideal untuk peternak pemula maupun berpengalaman. Dengan perawatan yang tepat, bibit ini akan tumbuh menjadi ikan yang sehat dan siap dipasarkan.\r\n\r\nJangan lewatkan kesempatan ini! Pesan bibit ikan gabus sekarang dan tingkatkan hasil ternak kamu!', 1499, 'KA005', '2024-10-30'),
('I005', 'Gurame Soang seukuran kuku', '65000', 'guramesoang.jpg', 'Tingkatkan usaha budidaya Anda dengan bibit ikan gurame soang yang seukuran kuku! Dalam setiap paket, Anda akan mendapatkan 30 ekor bibit berkualitas dengan harga hanya Rp 65.000.\r\n\r\nIkan gurame soang dikenal dengan rasa dagingnya yang lezat dan pertumbuhannya yang optimal, menjadikannya pilihan tepat untuk para peternak. Bibit ini cocok untuk semua tingkat pengalaman, dari pemula hingga yang sudah berpengalaman.\r\n\r\nKeunggulan:\r\n\r\nUkuran Ideal: Mudah dipelihara dan siap untuk diternak.\r\nKualitas Terbaik: Bibit sehat, aktif, dan siap tumbuh.\r\nRamah Budidaya: Cocok untuk kolam kecil maupun besar.\r\nJangan lewatkan kesempatan ini! Dapatkan bibit ikan gurame soang dan mulai usaha budidaya Anda sekarang. Hubungi kami untuk pemesanan dan informasi lebih lanjut!', 699, 'KA002', '2024-10-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `kategori` varchar(59) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
('KA001', 'Koi'),
('KA002', 'Gurame'),
('KA003', 'Lele'),
('KA004', 'Nila'),
('KA005', 'Gabus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` varchar(10) NOT NULL,
  `kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `kota`) VALUES
('KO001', 'Depok'),
('KO002', 'Jakarta'),
('KO003', 'Bandung'),
('KO004', 'Surabaya'),
('KO005', 'Yogyakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_metode` varchar(10) NOT NULL,
  `metode` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id_metode`, `metode`, `keterangan`) VALUES
('M001', 'BNI', '157-768765-2314 a.n Nina Alisyah'),
('M002', 'Gopay', '08578344553 a.n Nina Alisyah'),
('M003', 'Dana', '08578344553 a.n Nina Alisyah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` varchar(10) NOT NULL,
  `ongkir` varchar(20) NOT NULL,
  `id_kota` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `ongkir`, `id_kota`) VALUES
('O001', '6000', 'KO001'),
('O002', '6000', 'KO002'),
('O003', '7000', 'KO003'),
('O004', '7500', 'KO005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `email`, `telepon`, `alamat`, `password`) VALUES
('P001', 'Mutiara Putri', 'mutiarap@gmail.com', '085673652345', 'Jl. M. Nasir, Cilodong', 'muti123'),
('P002', 'Andi', 'andi123@gmail.com', '08543654223', 'Bandung, Jawa Barat', 'andi08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pemesanan`
--

CREATE TABLE `status_pemesanan` (
  `id_status` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_pemesanan`
--

INSERT INTO `status_pemesanan` (`id_status`, `status`) VALUES
('S001', 'belum dibayar'),
('S002', 'dikemas'),
('S003', 'dikirim'),
('S004', 'sudah dibayar'),
('S005', 'selesai'),
('S006', 'dibatalkan'),
('S007', 'belum diverifikasi'),
('S008', 'komplain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `jumlah_pesanan` int(11) NOT NULL,
  `id_faktur` varchar(10) NOT NULL,
  `id_ikan` varchar(10) NOT NULL,
  `ikan` varchar(50) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `subharga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`jumlah_pesanan`, `id_faktur`, `id_ikan`, `ikan`, `harga`, `subharga`) VALUES
(1, 'F001', 'I001', 'Ikan Koi ukuran 5-6 cm', '55000', '55000'),
(2, 'F002', 'I002', 'Ikan Gurame Padang ukuran 4 jari', '37000', '74000'),
(2, 'F002', 'I001', 'Ikan Koi ukuran 5-6 cm', '55000', '110000'),
(1, 'F003', 'I003', 'Bibit Nila Merah ukuran 3-4 cm', '58000', '58000'),
(1, 'F004', 'I005', 'Gurame Soang seukuran kuku', '65000', '65000'),
(3, 'F005', 'I002', 'Ikan Gurame Padang ukuran 4 jari', '37000', '111000'),
(1, 'F006', 'I001', 'Ikan Koi ukuran 5-6 cm', '55000', '55000'),
(1, 'F006', 'I004', 'Bibit Gabus ukuran 3-4 cm', '75000', '75000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id_faktur`),
  ADD KEY `id_pelanggan` (`id_pelanggan`) USING BTREE,
  ADD KEY `id_ongkir` (`id_ongkir`) USING BTREE,
  ADD KEY `id_status` (`id_status`) USING BTREE,
  ADD KEY `id_metode` (`id_metode`) USING BTREE;

--
-- Indeks untuk tabel `ikan`
--
ALTER TABLE `ikan`
  ADD PRIMARY KEY (`id_ikan`),
  ADD KEY `id_kategori` (`id_kategori`) USING BTREE;

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`),
  ADD KEY `id_kota` (`id_kota`) USING BTREE;

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `status_pemesanan`
--
ALTER TABLE `status_pemesanan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `id_ikan` (`id_ikan`) USING BTREE,
  ADD KEY `id_faktur` (`id_faktur`) USING BTREE;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD CONSTRAINT `faktur_ibfk_6` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_ibfk_7` FOREIGN KEY (`id_ongkir`) REFERENCES `ongkir` (`id_ongkir`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_ibfk_8` FOREIGN KEY (`id_metode`) REFERENCES `metode_pembayaran` (`id_metode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_ibfk_9` FOREIGN KEY (`id_status`) REFERENCES `status_pemesanan` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD CONSTRAINT `ongkir_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_faktur`) REFERENCES `faktur` (`id_faktur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_ikan`) REFERENCES `ikan` (`id_ikan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
