-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 28 Apr 2025 pada 09.28
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
-- Database: `learnify`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` int(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `judul`, `slug`, `deskripsi`, `gambar`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 'Pengenalan Word', 'pengenalan-word', 'Microsoft Word adalah aplikasi pengolah kata untuk membuat dokumen profesional seperti surat, laporan, dan lainnya.', '1745767271_60a54b6e7b65070a936a.jpg', 'VckqV2wC1gs?si=thzZJ4ji9PDPs8ND', NULL, '2025-04-27'),
(10, 'Membuat Grafik Penjualan', 'membuat-grafik-penjualan', 'Membuat grafik penjualan dari tabel data.', 'hero-bg.jpg', 'Y7HQfNaDVC8?si=QbEtI6cwhmBjgXEW', '2025-04-05', '2025-04-26'),
(11, 'Pengenalan RPL', 'pengenalan-rpl', 'bebas dulu', '1745767646_2c92d20131055ef1d3af.jpeg', 'FZ8S9ug5DsQ', '2025-04-27', '2025-04-27'),
(12, 'Pengenalan RPL Lanjutan', 'pengenalan-rpl-lanjutan', 'uji coba', '1745767783_37dd1bd366c71fb97cc5.jpeg', 'FZ8S9ug5DsQ', '2025-04-27', '2025-04-27'),
(13, 'Cara Membuat Grafik Penjualan di Microsoft Excel', 'cara-membuat-grafik-penjualan-di-microsoft-excel', 'Microsoft Excel memudahkan kita dalam membuat grafik penjualan yang menarik dan informatif. Grafik ini berguna untuk melihat tren penjualan dari waktu ke waktu.\r\nPada tutorial ini, kita akan belajar mulai dari menginput data, memilih jenis grafik, hingga mengubah tampilan grafik agar lebih profesional.\r\n\r\nLangkah-langkah akan dijelaskan dengan sederhana, cocok untuk pemula maupun yang ingin memperdalam kemampuan Excel.\r\n\r\nMicrosoft Excel memudahkan kita dalam membuat grafik penjualan yang menarik dan informatif. Grafik ini berguna untuk melihat tren penjualan dari waktu ke waktu.\r\nPada tutorial ini, kita akan belajar mulai dari menginput data, memilih jenis grafik, hingga mengubah tampilan grafik agar lebih profesional.\r\n\r\nLangkah-langkah akan dijelaskan dengan sederhana, cocok untuk pemula maupun yang ingin memperdalam kemampuan Excel.\r\n\r\nMicrosoft Excel memudahkan kita dalam membuat grafik penjualan yang menarik dan informatif. Grafik ini berguna untuk melihat tren penjualan dari waktu ke waktu.\r\nPada tutorial ini, kita akan belajar mulai dari menginput data, memilih jenis grafik, hingga mengubah tampilan grafik agar lebih profesional.\r\n\r\nLangkah-langkah akan dijelaskan dengan sederhana, cocok untuk pemula maupun yang ingin memperdalam kemampuan Excel.', '1745767920_8b9da68395e9159fc3d1.jpg', 'zGJ5BlbKfLM', '2025-04-27', '2025-04-27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
