-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 04 Mar 2023 pada 13.40
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `detikcom_event`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_ticket`
--

CREATE TABLE `event_ticket` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `ticket` varchar(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event_ticket`
--

INSERT INTO `event_ticket` (`id`, `event_id`, `ticket`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'BDFp0bDafd', 'available', '2023-03-04 12:40:18', '2023-03-04 12:40:18'),
(2, 2, 'LQEmnZTCZ9', 'available', '2023-03-04 12:40:18', '2023-03-04 12:40:18'),
(3, 2, 'PZORwCJucN', 'available', '2023-03-04 12:40:18', '2023-03-04 12:40:18'),
(4, 2, 'QCG8KYybkv', 'available', '2023-03-04 12:40:18', '2023-03-04 12:40:18'),
(5, 2, 'QDOu5wuD6U', 'available', '2023-03-04 12:40:18', '2023-03-04 12:40:18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `event_ticket`
--
ALTER TABLE `event_ticket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket` (`ticket`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `event_ticket`
--
ALTER TABLE `event_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
