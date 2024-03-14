-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Mar 2023 pada 08.08
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sensor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `putaran`
--

CREATE TABLE `putaran` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `jumlah_putaran` int(11) NOT NULL DEFAULT 0,
  `waktu_total` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_lari`
--

CREATE TABLE `rekap_lari` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `nomor` varchar(225) NOT NULL,
  `putaran` varchar(225) NOT NULL,
  `jarak` varchar(225) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `renang`
--

CREATE TABLE `renang` (
  `id` int(11) NOT NULL,
  `nomor` int(225) NOT NULL,
  `waktu` float NOT NULL,
  `skor` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `renang`
--

INSERT INTO `renang` (`id`, `nomor`, `waktu`, `skor`) VALUES
(1, 1, 12, 100),
(2, 2, 11, 80),
(3, 4, 11, 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sensordata`
--

CREATE TABLE `sensordata` (
  `id` int(6) UNSIGNED NOT NULL,
  `nodeID` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sensordata`
--

INSERT INTO `sensordata` (`id`, `nodeID`, `tag`, `reading_time`) VALUES
(13, '1', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 0A', '2023-03-12 18:57:59'),
(14, '2', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 0A', '2023-03-12 18:59:44'),
(15, '3', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 0A', '2023-03-12 18:59:52'),
(16, '4', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 0A', '2023-03-12 19:00:00'),
(17, '1', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 0A', '2023-03-12 19:00:09'),
(18, '2', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 0A', '2023-03-12 19:00:20'),
(19, '3', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 0A', '2023-03-12 19:00:27'),
(20, '4', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 0A', '2023-03-12 19:00:34'),
(21, '1', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 0A', '2023-03-12 19:00:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_id`
--

CREATE TABLE `tag_id` (
  `id` int(11) NOT NULL,
  `no_tag` varchar(225) NOT NULL,
  `tag_id` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `putaran` int(10) NOT NULL,
  `jarak` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tag_id`
--

INSERT INTO `tag_id` (`id`, `no_tag`, `tag_id`, `nama`, `putaran`, `jarak`) VALUES
(1, 'TAG 1', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 0A', 'baba', 2, 800),
(2, 'TAG 2', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 1A', 'bibi', -1, -100),
(3, 'TAG 3', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 2A', 'bubu', -1, -100),
(4, 'TAG 4', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 3A', 'bebe', -1, -100),
(5, 'TAG 5', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 4A', 'bobo', -1, -100),
(6, 'TAG 6', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 5A', 'caca', -1, -100),
(7, 'TAG 7', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 6A', 'cici', -1, -100),
(8, 'TAG 8', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 7A', 'cucu', -1, -100),
(9, 'TAG 9', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 8A', 'cece', -1, -100),
(10, 'TAG 10', 'CC FF FF 20 05 10 00 34 00 E2 00 47 04 13 10 68 21 C7 65 01 9A', 'coco', -1, -100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_sensor`
--

CREATE TABLE `waktu_sensor` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `sensor_id` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `waktu_sensor`
--

INSERT INTO `waktu_sensor` (`id`, `tag_id`, `sensor_id`, `waktu`) VALUES
(1, 0, 1, '2023-03-11 19:16:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `putaran`
--
ALTER TABLE `putaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_id` (`tag_id`);

--
-- Indeks untuk tabel `rekap_lari`
--
ALTER TABLE `rekap_lari`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `renang`
--
ALTER TABLE `renang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sensordata`
--
ALTER TABLE `sensordata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tag_id`
--
ALTER TABLE `tag_id`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `waktu_sensor`
--
ALTER TABLE `waktu_sensor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `putaran`
--
ALTER TABLE `putaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rekap_lari`
--
ALTER TABLE `rekap_lari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `renang`
--
ALTER TABLE `renang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sensordata`
--
ALTER TABLE `sensordata`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tag_id`
--
ALTER TABLE `tag_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `waktu_sensor`
--
ALTER TABLE `waktu_sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
