-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Sep 2022 pada 11.32
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_buku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kodebuku` varchar(20) DEFAULT NULL,
  `namabuku` varchar(50) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `tahunterbit` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `kodebuku`, `namabuku`, `kategori`, `penerbit`, `tahunterbit`, `jumlah`) VALUES
(5, 'BIND0912', 'bahasa indonesia', ' buku bahasa', 'erlangga', '2022-09-01', 20),
(6, 'B0928', 'bahasa jepang', 'buku bahasa', 'OS', '2022-09-01', 20),
(7, 'CR2122', 'Bawang merah dan Bawang putih', 'Cerita Rakyat', 'budi', '2016-10-04', 5),
(8, 'GA5241', 'Malin Kundang', 'Cerita Rakyat', 'crd', '2013-05-06', 5),
(9, 'YSK0271', 'pemograman web ', 'IT', 'Dsb', '2022-09-13', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjam`
--

CREATE TABLE `peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tanggalpinjam` date DEFAULT NULL,
  `tanggalkembali` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjam`
--

INSERT INTO `peminjam` (`id_peminjam`, `id_buku`, `nama`, `tanggalpinjam`, `tanggalkembali`, `status`) VALUES
(1, 6, 'faizal', '2022-09-02', '2022-09-09', 'belum dikembalikan'),
(2, 8, 'ega', '2022-09-03', '2022-09-12', 'belum dikembalikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'faizal', '$2y$10$Kuuh/1j/zaB3j091ZTU72OfUgn8kuPneHOxDfhlDqGBuofbZ3sWbm'),
(2, 'fadil', '$2y$10$34j9PoQD1fv4ZkFrl4Z5L.9dagL6feh3mrdQ7cIKSQQC8AmWPtZp2'),
(3, 'ainil', '$2y$10$5N3B/tej.G6ty7tbfIxu8enQTFH.xKrqgECDJLYgL06jgV2VZQB8G'),
(4, 'munir', '$2y$10$oHioxdHpuhVEMVvxIq.F/eDBOLlYcJRV.xuCKWS2Sbku1t.p.0PhK');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD KEY `peminjam` (`id_buku`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  ADD CONSTRAINT `peminjam` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
