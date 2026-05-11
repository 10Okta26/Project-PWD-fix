-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Bulan Mei 2026 pada 16.12
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_destinasia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id_saran` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `isi_saran` text DEFAULT NULL,
  `tanggal_kirim` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kritik_saran`
--

INSERT INTO `kritik_saran` (`id_saran`, `id_user`, `isi_saran`, `tanggal_kirim`) VALUES
(1, 3, 'percobaan kritik apakah masuk?', '2026-05-06 12:05:38'),
(2, 4, 'apa ya', '2026-05-07 15:04:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemandu`
--

CREATE TABLE `pemandu` (
  `id_pemandu` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `keahlian` varchar(255) DEFAULT NULL,
  `harga_per_jam` int(11) DEFAULT NULL,
  `foto_profil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemandu`
--

INSERT INTO `pemandu` (`id_pemandu`, `nama_lengkap`, `keahlian`, `harga_per_jam`, `foto_profil`) VALUES
(1, 'Beni Setiawan', 'Sejarah & Budaya', 75000, 'guide1.png'),
(2, 'Sinta Lydia', 'Wisata Kuliner', 60000, 'guide2.png'),
(3, 'Andi Wijaya', 'Fotografi & Alam', 90000, 'guide3.png'),
(4, 'Dodi Nurcahyo', 'Wisata Religi', 80000, 'guide4.webp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_pemandu` int(11) DEFAULT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL,
  `tanggal_kunjungan` date DEFAULT NULL,
  `durasi_jam` int(11) DEFAULT NULL,
  `status_pembayaran` enum('Belum Bayar','Lunas') DEFAULT 'Belum Bayar',
  `metode_pembayaran` enum('Tunai','Transfer Bank','E-Wallet') DEFAULT 'Tunai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesan`, `id_user`, `id_pemandu`, `nomor_telepon`, `tanggal_kunjungan`, `durasi_jam`, `status_pembayaran`, `metode_pembayaran`) VALUES
(1, 2, 1, '088754342753', '2026-08-23', 1, 'Lunas', 'Tunai'),
(4, 3, 2, '089754322341', '2026-10-11', 1, 'Belum Bayar', 'Tunai'),
(7, 4, 4, '088765443238', '2026-12-20', 2, 'Lunas', 'Transfer Bank'),
(8, 3, 4, '088754342753', '2026-05-24', 1, 'Belum Bayar', 'E-Wallet'),
(9, 4, 4, '089754322341', '2026-05-31', 1, 'Belum Bayar', 'Tunai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama_lengkap`, `role`) VALUES
(1, 'admin', 'admin123', 'Admin Destinasia', 'admin'),
(2, 'coba_1', 'coba1', 'Percobaan 1', 'user'),
(3, 'coba_2', 'coba2', 'Percobaan 2', 'user'),
(4, 'okta_10', 'okta10', 'okta', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id_saran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pemandu`
--
ALTER TABLE `pemandu`
  ADD PRIMARY KEY (`id_pemandu`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pemandu` (`id_pemandu`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pemandu`
--
ALTER TABLE `pemandu`
  MODIFY `id_pemandu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD CONSTRAINT `kritik_saran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_pemandu`) REFERENCES `pemandu` (`id_pemandu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
