-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2023 pada 11.35
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(50) NOT NULL,
  `nama_contact` varchar(50) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal_contact` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id_contact`, `nama_contact`, `subjek`, `pesan`, `tanggal_contact`) VALUES
(4, '', '', '', '2023-11-27 10:44:49'),
(5, '', '', '', '2023-11-27 04:46:30'),
(6, '', '', '', '2023-11-27 04:48:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `email`, `telepon`) VALUES
(1, 'tono', 'tono@gmail.com', '089742214221'),
(2, 'tini', 'tini@gmail.com', '089741241241');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi`
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
-- Dumping data untuk tabel `destinasi`
--

INSERT INTO `destinasi` (`id_destinasi`, `nama_destinasi`, `gambar`, `lokasi`, `harga`, `deskripsi`, `id_kategori`) VALUES
(1, 'Kebun Raya Bogor', '../img/krb.jpeg', 'Bogor', 15000.00, 'Kebun Raya Bogor atau Kebun Botani Bogor adalah sebuah kebun botani besar yang terletak di Kota Bogor, Indonesia. Kebun ini dioperasikan oleh Badan Riset dan Inovasi Nasional. Kebun ini terletak di pusat kota Bogor dan bersebelahan dengan kompleks istana kepresidenan Istana Bogor.', 1),
(2, 'Pantai Sawarna', '../img/pantai.jpeg', 'Banten', 5000.00, 'Pantai Sawarna dikenal karena keindahan alamnya yang menakjubkan. Pantai ini memiliki pasir putih yang lembut, ombak yang besar, dan pemandangan laut yang menakjubkan. Vegetasi alami yang subur di sekitar pantai juga menambah pesona alam Pantai Sawarna.', 3),
(3, 'Kuliner Angkringan Malioboro', '../img/angkringan.jpeg', 'yogyakarta', 10000.00, 'Angkringan adalah warung makan jalanan yang populer di Malioboro. Warung ini menawarkan berbagai hidangan ringan dan nasi kucing dengan harga yang terjangkau. Pengunjung dapat memilih dari berbagai macam lauk-pauk, sambal, dan kerupuk untuk dinikmati bersama nasi kecil.', 2),
(4, 'Kuliner Gudeg Malioboro', '../img/gudeg.jpg', 'yogyakarta', 10000.00, 'Gudeg adalah makanan khas Yogyakarta, dan Anda dapat dengan mudah menemukannya di sekitar Malioboro. Gudeg terbuat dari nangka muda yang dimasak dengan santan, kemiri, kelapa, dan bumbu-bumbu lainnya. Biasanya disajikan dengan nasi, ayam, telur, dan sambal krecek.', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `tipe`, `keterangan`) VALUES
(1, 'Reguler', 'Melihat satwa, Menghadiri pertunjukan, Menggunakan fasilitas umum, dan Berpartisipasi dalam aktivitas edukasi.\r\n'),
(2, 'Reguler', 'Tempat parkir, Warung makan, Area bermain pantai.'),
(3, 'Ekonomi', 'Tempat parkir, Toilet, Mushola, Tempat makan, Kipas angin.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `gambar_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar_kategori`) VALUES
(1, 'Wisata Alam', 'img/wa.jpeg'),
(2, 'Wisata Kuliner', 'img/gd.jpeg'),
(3, 'Wisata Pantai', 'img/krj.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `reservasi_tanggal` datetime NOT NULL,
  `id_destinasi` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_customer`, `reservasi_tanggal`, `id_destinasi`, `id_fasilitas`) VALUES
(1, 1, '2023-11-24 05:33:18', 1, 1),
(2, 2, '2023-11-24 07:53:45', 2, 2),
(3, 2, '2023-11-24 08:01:04', 3, 3),
(4, 1, '2023-11-24 08:02:09', 4, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal_ulasan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `nama`, `pesan`, `tanggal_ulasan`) VALUES
(1, 'Ujang', 'Terus tingkatkan pelayanannya!', '2023-11-25 07:42:06'),
(2, 'Tati', 'Terus tingkatkan Pembayarannya!', '2023-11-25 07:43:06'),
(3, 'Tukul', 'Terus tingkatkan harganya!', '2023-11-25 07:43:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`id_destinasi`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_destinasi` (`id_destinasi`),
  ADD KEY `id_fasilitas` (`id_fasilitas`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `id_destinasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD CONSTRAINT `destinasi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`),
  ADD CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`id_destinasi`) REFERENCES `destinasi` (`id_destinasi`),
  ADD CONSTRAINT `reservasi_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
