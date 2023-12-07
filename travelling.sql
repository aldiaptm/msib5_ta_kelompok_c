-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 02:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelling`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `profile`, `username`, `password`) VALUES
(1, 'Admin EDU-TRAVEL', 'img/adminprofile.png', 'admin', '$2y$10$iSeCP2LAgvRYHsmXxXpKQe8Qd8RDJvAytLA7yAdazRvWbcC13WyhG');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(50) NOT NULL,
  `nama_contact` varchar(50) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal_contact` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `nama_contact`, `subjek`, `pesan`, `tanggal_contact`) VALUES
(18, 'Andre', 'Kritik', 'Untuk menu registrasi sebaiknya dipindah ke bagian navbar agar tidak memusingkan customer!', '2023-12-07 05:56:29'),
(20, 'Luqman', 'Keluhan', 'Menu registrasi hanya terdapat di bagian index saja, sebaiknya ditambahkan di bagian navbar!', '2023-12-07 06:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `email`, `telepon`) VALUES
(1, 'Tono Topan', 'tono@gmail.com', '089742214221'),
(2, 'Tini Tita', 'tini@gmail.com', '089741241241'),
(6, 'Maman Racing Team', 'maman12@gmail.co.id', '0812381291241'),
(7, 'Saung Udjo', 'udjo@gmail.com', '08122831824');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `id_destinasi` int(11) NOT NULL,
  `nama_destinasi` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `lokasi` varchar(250) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`id_destinasi`, `nama_destinasi`, `gambar`, `lokasi`, `harga`, `deskripsi`, `id_kategori`) VALUES
(1, 'Kebun Raya Bogor', '../img/krb.jpeg', 'Bogor', '15000.00', 'Kebun Raya Bogor atau Kebun Botani Bogor adalah sebuah kebun botani besar yang terletak di Kota Bogor, Indonesia. Kebun ini dioperasikan oleh Badan Riset dan Inovasi Nasional. Kebun ini terletak di pusat kota Bogor dan bersebelahan dengan kompleks istana kepresidenan Istana Bogor.', 1),
(2, 'Pantai Sawarna', '../img/pantai.jpeg', 'Banten', '5000.00', 'Pantai Sawarna dikenal karena keindahan alamnya yang menakjubkan. Pantai ini memiliki pasir putih yang lembut, ombak yang besar, dan pemandangan laut yang menakjubkan. Vegetasi alami yang subur di sekitar pantai juga menambah pesona alam Pantai Sawarna.', 3),
(3, 'Kuliner Angkringan Malioboro', '../img/angkringan.jpeg', 'yogyakarta', '10000.00', 'Angkringan adalah warung makan jalanan yang populer di Malioboro. Warung ini menawarkan berbagai hidangan ringan dan nasi kucing dengan harga yang terjangkau. Pengunjung dapat memilih dari berbagai macam lauk-pauk, sambal, dan kerupuk untuk dinikmati bersama nasi kecil.', 2),
(4, 'Kuliner Gudeg Malioboro', '../img/gudeg.jpg', 'yogyakarta', '10000.00', 'Gudeg adalah makanan khas Yogyakarta, dan Anda dapat dengan mudah menemukannya di sekitar Malioboro. Gudeg terbuat dari nangka muda yang dimasak dengan santan, kemiri, kelapa, dan bumbu-bumbu lainnya. Biasanya disajikan dengan nasi, ayam, telur, dan sambal krecek.', 2),
(5, 'Gunung Semeru', '../img/semeru.jpg', 'Jawa Timur', '60000.00', 'Gunung tertinggi di pulau jawa.', 1),
(8, 'Pantai Ujung Genteng', '../img/ug.jpg', 'Jawa Barat', '60000.00', 'Pantai Ujung Genteng merupakan pantai yang terletak di sebelah barat pulau jawa.', 3),
(11, 'Makam Sunan Gunung Djati', '../img/gunung-jati.jpg', 'Cirebon', '60000.00', 'Sunan Gunung Djati di Cirebon', 9),
(12, 'Sunan Muria', '../img/muria.png', 'Kudus', '200000.00', 'Sunan Muria adalah Ulama yang termasuk dalam anggota dewan Wali Songo. Nama lahirnya adalah Umar Said.', 9),
(13, 'Pantai Pangandaran', '../img/pantai-pangandaran.jpg', 'Pangandaran, Jawa Barat', '60000.00', 'Pantai pangandaran merupakan sebuah destinasi wisata pantai terbaik di daerah selatan Jawa  Barat.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `tipe`, `keterangan`) VALUES
(1, 'Eksekutif', 'Melihat satwa, Menghadiri pertunjukan, Menggunakan fasilitas umum, dan Berpartisipasi dalam aktivitas edukasi.\r\n'),
(2, 'Reguler', 'Tempat parkir, Warung makan, Area bermain pantai.'),
(3, 'Ekonomi', 'Tempat parkir, Toilet, Mushola, Tempat makan, Kipas angin.'),
(5, 'VIP', 'Hotel bintang 5, Makan di restoran mewah');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `gambar_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar_kategori`) VALUES
(1, 'Wisata Alam', '../img/wa.jpeg'),
(2, 'Wisata Kuliner', '../img/gd.jpeg'),
(3, 'Wisata Pantai', '../img/krj.jpeg'),
(9, 'Wisata Religi', '../img/wr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `metode` varchar(25) NOT NULL,
  `biaya_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `metode`, `biaya_admin`) VALUES
(1, 'DANA', 2000),
(2, 'OVO', 1500),
(3, 'BCA', 1000),
(4, 'Mandiri', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `reservasi_tanggal` datetime NOT NULL,
  `id_destinasi` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_customer`, `reservasi_tanggal`, `id_destinasi`, `id_fasilitas`, `id_pembayaran`) VALUES
(5, 2, '2023-11-29 07:06:26', 1, 1, 3),
(8, 1, '2023-11-29 04:24:13', 2, 2, 4),
(9, 2, '2023-11-29 08:25:22', 3, 3, 2),
(11, 7, '2023-12-07 02:49:09', 12, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal_ulasan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `nama`, `pesan`, `tanggal_ulasan`) VALUES
(1, 'Ujang', 'Terus tingkatkan pelayanannya!', '2023-11-25 07:42:06'),
(2, 'Tati', 'Terus tingkatkan Pembayarannya!', '2023-11-25 07:43:06'),
(3, 'Tukul', 'Terus tingkatkan harganya!', '2023-11-25 07:43:00'),
(4, 'Rahmat', 'Semoga kedepannya diadakan wisata budaya', '2023-12-07 02:52:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`id_destinasi`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_destinasi` (`id_destinasi`),
  ADD KEY `id_fasilitas` (`id_fasilitas`),
  ADD KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `id_destinasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD CONSTRAINT `destinasi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`),
  ADD CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`id_destinasi`) REFERENCES `destinasi` (`id_destinasi`),
  ADD CONSTRAINT `reservasi_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `reservasi_ibfk_4` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
