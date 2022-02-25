-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Mar 2021 pada 14.48
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp_stockgudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_item`
--

CREATE TABLE `m_item` (
  `item_id` int(11) NOT NULL,
  `item_code` varchar(20) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_item`
--

INSERT INTO `m_item` (`item_id`, `item_code`, `item_name`, `item_quantity`, `item_price`, `item_supplier_id`) VALUES
(1, 'KB101', 'Baju Putih', 30, 50000, 1),
(3, 'KB102', 'Baju Hitam', 30, 50000, 1),
(5, 'KB201', 'Kemeja Putih', 40, 80000, 1),
(6, 'KB202', 'Kemeja Hitam', 35, 80000, 1),
(7, 'KB301', 'Kaos Putih', 20, 35000, 1),
(8, 'KB302', 'Kaos Hitam', 40, 35000, 1),
(9, 'KC101', 'Celana Pendek Putih', 40, 50000, 1),
(10, 'KC102', 'Celana Pendek Hitam', 40, 50000, 1),
(13, 'KM001', 'Meja', 50, 200000, 1),
(14, 'KK001', 'Kursi', 50, 100000, 1),
(15, 'KR001', 'Rak', 30, 500000, 1),
(16, 'KR002', 'Loker', 20, 300000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_mutasi`
--

CREATE TABLE `m_mutasi` (
  `mutasi_id` int(11) NOT NULL,
  `mutasi_item_id` int(11) NOT NULL,
  `mutasi_date` date NOT NULL,
  `mutasi_quantity` int(11) NOT NULL,
  `mutasi_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_mutasi`
--

INSERT INTO `m_mutasi` (`mutasi_id`, `mutasi_item_id`, `mutasi_date`, `mutasi_quantity`, `mutasi_price`) VALUES
(8, 7, '2021-02-23', 5, 175000),
(9, 6, '2021-02-25', 5, 175000),
(10, 9, '2021-03-16', 10, 500000),
(11, 10, '2021-03-16', 10, 500000),
(12, 3, '2021-03-18', 10, 500000),
(13, 3, '2021-03-18', 10, 500000),
(14, 8, '2021-03-22', 10, 350000),
(15, 8, '2021-03-22', 10, 350000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_supplier`
--

CREATE TABLE `m_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(30) NOT NULL,
  `supplier_contact` varchar(100) NOT NULL,
  `supplier_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_supplier`
--

INSERT INTO `m_supplier` (`supplier_id`, `supplier_name`, `supplier_contact`, `supplier_address`) VALUES
(1, 'SUPPLIER A', 'WA : 0888-8888-8888', 'Pemalang, Indonesia'),
(2, 'SUPPLIER B', 'WA : 0898-9898-8989', 'Pemalang, Indonesia'),
(3, 'SUPPLIER C', 'WA : 0812-1234-5678', 'Pemalang, Indonesia'),
(4, 'SUPPLIER D', 'WA : 0821-1233-5233', 'Pemalang, Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `username`, `password`, `user_level`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_item`
--
ALTER TABLE `m_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indeks untuk tabel `m_mutasi`
--
ALTER TABLE `m_mutasi`
  ADD PRIMARY KEY (`mutasi_id`);

--
-- Indeks untuk tabel `m_supplier`
--
ALTER TABLE `m_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_item`
--
ALTER TABLE `m_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `m_mutasi`
--
ALTER TABLE `m_mutasi`
  MODIFY `mutasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
