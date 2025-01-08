-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql312.infinityfree.com
-- Generation Time: Jan 03, 2025 at 05:53 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_37981230_easyride`
--

-- --------------------------------------------------------

--
-- Table structure for table `cek_pesanan`
--

CREATE TABLE `cek_pesanan` (
  `kode_pesanan` varchar(25) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `tgl_pesanan` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cek_pesanan`
--

INSERT INTO `cek_pesanan` (`kode_pesanan`, `id_kendaraan`, `tgl_pesanan`, `status`) VALUES
('29', 13, '2024-12-31', 'Selesai'),
('29', 13, '2025-01-01', 'Selesai'),
('29', 13, '2025-01-02', 'Selesai'),
('53', 13, '2025-01-03', 'Dibatalkan'),
('53', 13, '2025-01-04', 'Dibatalkan'),
('36', 13, '2025-01-05', 'Selesai'),
('36', 13, '2025-01-06', 'Selesai'),
('36', 13, '2025-01-07', 'Selesai'),
('43', 13, '2025-01-13', 'Dibatalkan'),
('43', 13, '2025-01-14', 'Dibatalkan'),
('43', 13, '2025-01-15', 'Dibatalkan'),
('59', 13, '2025-01-29', 'Dibatalkan'),
('59', 13, '2025-01-30', 'Dibatalkan'),
('62', 13, '2025-02-14', 'Dibatalkan'),
('62', 13, '2025-02-15', 'Dibatalkan'),
('62', 13, '2025-02-16', 'Dibatalkan'),
('62', 13, '2025-02-17', 'Dibatalkan'),
('48', 13, '2025-12-12', 'Dibatalkan'),
('48', 13, '2025-12-13', 'Dibatalkan'),
('48', 13, '2025-12-14', 'Dibatalkan'),
('48', 13, '2025-12-15', 'Dibatalkan'),
('57', 13, '2500-12-25', 'Dibatalkan'),
('57', 13, '2500-12-26', 'Dibatalkan'),
('57', 13, '2500-12-27', 'Dibatalkan'),
('57', 13, '2500-12-28', 'Dibatalkan'),
('57', 13, '2500-12-29', 'Dibatalkan'),
('57', 13, '2500-12-30', 'Dibatalkan'),
('57', 13, '2500-12-31', 'Dibatalkan'),
('30', 14, '2024-12-30', 'Dibatalkan'),
('30', 14, '2024-12-31', 'Dibatalkan'),
('30', 14, '2025-01-01', 'Dibatalkan'),
('28', 16, '2024-12-30', 'Dibatalkan'),
('28', 16, '2024-12-31', 'Dibatalkan'),
('28', 16, '2025-01-01', 'Dibatalkan'),
('42', 19, '2024-12-30', 'Dibatalkan'),
('42', 19, '2024-12-31', 'Dibatalkan'),
('35', 20, '2024-12-30', 'Menunggu Pembayaran'),
('35', 20, '2024-12-31', 'Menunggu Pembayaran'),
('35', 20, '2025-01-01', 'Menunggu Pembayaran'),
('61', 20, '2025-01-03', 'Dibatalkan'),
('61', 20, '2025-01-04', 'Dibatalkan'),
('40', 27, '2024-12-30', 'Selesai'),
('40', 27, '2024-12-31', 'Selesai'),
('40', 27, '2025-01-01', 'Selesai'),
('31', 28, '2024-12-30', 'Selesai'),
('31', 28, '2024-12-31', 'Selesai'),
('31', 28, '2025-01-01', 'Selesai'),
('60', 28, '2025-01-02', 'Dibatalkan'),
('60', 28, '2025-01-03', 'Dibatalkan'),
('60', 28, '2025-01-04', 'Dibatalkan'),
('60', 28, '2025-01-05', 'Dibatalkan'),
('60', 28, '2025-01-06', 'Dibatalkan'),
('60', 28, '2025-01-07', 'Dibatalkan'),
('60', 28, '2025-01-08', 'Dibatalkan'),
('60', 28, '2025-01-09', 'Dibatalkan'),
('60', 28, '2025-01-10', 'Dibatalkan'),
('49', 30, '2024-12-30', 'Selesai'),
('49', 30, '2024-12-31', 'Selesai'),
('49', 30, '2025-01-01', 'Selesai'),
('41', 31, '2024-12-30', 'Sudah Dibayar'),
('41', 31, '2024-12-31', 'Sudah Dibayar'),
('27', 36, '2024-12-29', 'Sudah Dibayar'),
('27', 36, '2024-12-30', 'Sudah Dibayar'),
('27', 36, '2024-12-31', 'Sudah Dibayar'),
('50', 38, '2024-12-31', 'Selesai'),
('50', 38, '2025-01-01', 'Selesai'),
('50', 38, '2025-01-02', 'Selesai'),
('32', 40, '2024-12-30', 'Dibatalkan'),
('26', 40, '2024-12-31', 'Dibatalkan'),
('26', 40, '2025-01-01', 'Dibatalkan'),
('26', 40, '2025-01-02', 'Dibatalkan'),
('39', 40, '2025-01-09', 'Dibatalkan'),
('39', 40, '2025-01-10', 'Dibatalkan'),
('39', 40, '2025-01-11', 'Dibatalkan'),
('56', 53, '2025-12-12', 'Sudah Dibayar'),
('56', 53, '2025-12-13', 'Sudah Dibayar'),
('56', 53, '2025-12-14', 'Sudah Dibayar'),
('56', 53, '2025-12-15', 'Sudah Dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama_kendaraan` varchar(100) NOT NULL,
  `tipe_kendaraan` varchar(15) NOT NULL,
  `harga_per_hari` decimal(10,0) NOT NULL,
  `status` varchar(15) NOT NULL,
  `tanggal_di_tambah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `gambar`, `nama_kendaraan`, `tipe_kendaraan`, `harga_per_hari`, `status`, `tanggal_di_tambah`) VALUES
(13, 'toyota_supra.jpg', 'Toyota Supra', 'Mobil', '1000000', 'Sedia', '2024-12-16 04:43:04'),
(14, 'daihatsu ayla 1.0 X 2017.png', 'Daihatsu Ayla 2017', 'Mobil', '200000', 'Sedia', '2024-12-17 14:52:29'),
(16, 'daihatsu xenia 2020.png', 'Daihatsu Xenia 2020', 'Mobil', '180000', 'Sedia', '2024-12-17 14:53:27'),
(17, 'fixie TSUNAMI SNM100.jpg', 'Fixie Tsunami SNM100', 'Sepeda', '80000', 'Sedia', '2024-12-17 14:54:24'),
(18, 'fixie united soloist reborn.jpg', 'Fixie United Soloist', 'Sepeda', '80000', 'Sedia', '2024-12-17 14:55:25'),
(19, 'Hi-ace commuter 2022.png', 'Hi-ace Commuter 2022', 'Mobil', '200000', 'Sedia', '2024-12-17 14:56:11'),
(20, 'honda beat deluxe 2022.jpg', 'Beat Deluxe 2022', 'Motor', '40000', 'Sedia', '2024-12-17 14:57:08'),
(24, 'honda supra X 2021.jpg', 'Supra X 2021', 'Motor', '20000', 'Sedia', '2024-12-19 07:51:15'),
(25, 'honda brio rs cvt 2018.png', 'Brio RS CVT 2018', 'Mobil', '130000', 'Sedia', '2024-12-19 07:51:58'),
(26, 'yamaha Nmax 2017.jpg', 'Yamaha Nmax 2017', 'Motor', '35000', 'Sedia', '2024-12-19 07:53:06'),
(27, 'sepeda lipat.jpeg', 'Sepeda lipat', 'Sepeda', '20000', 'Sedia', '2024-12-19 07:54:23'),
(28, 'Honda scoopy 2020.jpg', 'Honda Scoopy 2020', 'Motor', '50000', 'Sedia', '2024-12-19 07:55:03'),
(29, 'toyota avanza 2019.png', 'Toyota Avanza 2019', 'Mobil', '200000', 'Sedia', '2024-12-19 07:55:49'),
(30, 'pacific X-men.jpg', 'Pacific X-men', 'Sepeda', '20000', 'Sedia', '2024-12-19 07:56:49'),
(31, 'yamaha mio m3 2021.png', 'Yamaha Mio M3 2021', 'Motor', '35000', 'Sedia', '2024-12-21 11:06:57'),
(36, 'hrv.png', 'Honda HRV', 'Mobil', '250000', 'Sedia', '2024-12-28 04:44:30'),
(38, 'pajero.png', 'Pajero Sport 2022', 'Mobil', '250000', 'Sedia', '2024-12-28 04:46:55'),
(40, 'zx25r.png', 'Kawasaki ZX 25R', 'Motor', '250000', 'Sedia', '2024-12-28 07:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `masukan`
--

CREATE TABLE `masukan` (
  `user_name` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masukan`
--

INSERT INTO `masukan` (`user_name`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
('sek', 'lidya@gmail.com', 'random', 'met tahun baru', '2025-01-01 11:12:45'),
('amar', 'amar2@gmail.com', 'Bug Pesanan', 'Gagal membuat pesanan', '2025-01-02 10:11:41'),
('danish', 'danish@gmail.com', 'Saran', 'Saran untuk menambahkan fitur notifikasi pengingat', '2025-01-02 10:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `kode_pesanan` int(100) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `pickup` varchar(30) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`kode_pesanan`, `id_kendaraan`, `tgl_mulai`, `tgl_selesai`, `durasi`, `status`, `user_name`, `pickup`, `tgl_pesanan`, `bukti_bayar`) VALUES
(26, 40, '2024-12-31', '2025-01-01', 2, 'Dibatalkan', 'sasa', 'Ambil Sendiri', '2024-12-28', ''),
(27, 36, '2024-12-29', '2024-12-30', 2, 'Sudah Dibayar', 'yaaa', 'Ambil Sendiri', '2024-12-28', '17354480509668203162783798157347.jpg'),
(28, 16, '2024-12-30', '2024-12-31', 2, 'Dibatalkan', 'fufufafa', 'Ambil Sendiri', '2024-12-28', '710E088A-CBEA-43C3-9FF7-5FA9D505688B.jpeg'),
(29, 13, '2024-12-31', '2025-01-01', 2, 'Selesai', 'user14', 'Ambil Sendiri', '2024-12-29', 'IMG_20241030_092800_768.jpg'),
(30, 14, '2024-12-30', '2024-12-31', 2, 'Dibatalkan', 'arthur', 'Ambil Sendiri', '2024-12-29', ''),
(31, 28, '2024-12-30', '2024-12-31', 2, 'Selesai', 'eci', 'Ambil Sendiri', '2024-12-29', 'kampus Merdeka.png'),
(32, 40, '2024-12-30', '2024-12-30', 1, 'Dibatalkan', 'yaaa', 'Pickup Sesuai Alamat', '2024-12-29', ''),
(33, 40, '2024-12-30', '2024-12-30', 1, 'Dibatalkan', 'yaaa', 'Pickup Sesuai Alamat', '2024-12-29', ''),
(34, 40, '2024-12-30', '2024-12-30', 1, 'Dibatalkan', 'yaaa', 'Pickup Sesuai Alamat', '2024-12-29', ''),
(35, 20, '2024-12-30', '2024-12-31', 2, 'Menunggu Pembayaran', 'yaaa', 'Ambil Sendiri', '2024-12-29', ''),
(36, 13, '2025-01-05', '2025-01-06', 2, 'Selesai', 'budi', 'Ambil Sendiri', '2024-12-29', 'IMG_20241030_092800_768.jpg'),
(37, 13, '2025-01-05', '2025-01-07', 3, 'Dibatalkan', 'danial', 'Ambil Sendiri', '2024-12-29', ''),
(38, 40, '2024-12-30', '2024-12-30', 1, 'Dibatalkan', 'danial', 'Ambil Sendiri', '2024-12-29', ''),
(39, 40, '2025-01-09', '2025-01-10', 2, 'Dibatalkan', 'danial', 'Ambil Sendiri', '2024-12-29', ''),
(40, 27, '2024-12-30', '2024-12-31', 2, 'Selesai', 'lidya', 'Ambil Sendiri', '2024-12-29', 'flowers.png'),
(41, 31, '2024-12-30', '2024-12-30', 1, 'Sudah Dibayar', 'briannnriskii', 'Pickup Sesuai Alamat', '2024-12-29', 'Screenshot_20241229.jpg'),
(42, 19, '2024-12-30', '2024-12-30', 1, 'Dibatalkan', 'briannnriskii', 'Pickup Sesuai Alamat', '2024-12-29', ''),
(43, 13, '2025-01-13', '2025-01-14', 2, 'Dibatalkan', 'user14', 'Ambil Sendiri', '2024-12-29', ''),
(44, 13, '2025-01-13', '2025-01-14', 2, 'Dibatalkan', 'user14', 'Ambil Sendiri', '2024-12-29', ''),
(45, 13, '2025-01-13', '2025-01-14', 2, 'Dibatalkan', 'user14', 'Ambil Sendiri', '2024-12-29', ''),
(46, 13, '2025-01-13', '2025-01-14', 2, 'Dibatalkan', 'user14', 'Ambil Sendiri', '2024-12-29', ''),
(47, 13, '2024-12-31', '2024-12-31', 1, 'Dibatalkan', 'danial', 'Ambil Sendiri', '2024-12-29', ''),
(48, 13, '2025-12-12', '2026-12-12', 366, 'Dibatalkan', 'user14', 'Ambil Sendiri', '2024-12-29', 'Toyota-86-GT-Black-Limited-Official-14.jpg'),
(49, 30, '2024-12-30', '2024-12-31', 2, 'Selesai', 'fufufafa', 'Ambil Sendiri', '2024-12-29', 'Screenshot 2024-11-12 213805.png'),
(50, 38, '2024-12-31', '2025-01-01', 2, 'Selesai', 'danial', 'Ambil Sendiri', '2024-12-29', 'admin.png'),
(51, 14, '2024-12-31', '2025-06-30', 182, 'Dibatalkan', 'fufufafa', 'Ambil Sendiri', '2024-12-30', ''),
(52, 14, '2024-12-31', '2024-12-31', 1, 'Dibatalkan', 'lidya', 'Ambil Sendiri', '2024-12-30', 'WhatsApp Image 2024-12-30 at 11.31.49_bb9ed93f.jpg'),
(53, 13, '2025-01-01', '2025-01-03', 3, 'Dibatalkan', 'fufufafa', 'Ambil Sendiri', '2024-12-30', ''),
(54, 13, '2024-12-31', '2025-01-01', 2, 'Dibatalkan', 'budi', 'Ambil Sendiri', '2024-12-30', ''),
(55, 13, '2024-12-31', '2024-12-31', 1, 'Dibatalkan', 'arthur', 'Pickup Sesuai Alamat', '2024-12-30', ''),
(56, 53, '2025-12-12', '2026-12-12', 366, 'Sudah Dibayar', 'budi', 'Ambil Sendiri', '2024-12-30', 'Toyota-86-GT-Black-Limited-Official-14.jpg'),
(57, 13, '2500-12-25', '2500-12-30', 6, 'Dibatalkan', 'samsul', 'Pickup Sesuai Alamat', '2024-12-30', ''),
(58, 13, '2024-12-31', '2025-01-01', 2, 'Dibatalkan', 'pajar', 'Ambil Sendiri', '2024-12-30', ''),
(59, 13, '2025-01-29', '2025-02-07', 10, 'Dibatalkan', 'budi', 'Pickup Sesuai Alamat', '2025-01-01', ''),
(60, 28, '2025-01-02', '2025-01-09', 8, 'Dibatalkan', 'lidya', 'Pickup Sesuai Alamat', '2025-01-01', ''),
(61, 20, '2025-01-03', '2025-01-03', 1, 'Dibatalkan', 'andri0204', 'Pickup Sesuai Alamat', '2025-01-02', ''),
(62, 13, '2025-02-14', '2025-03-20', 35, 'Dibatalkan', 'fufufafa', 'Pickup Sesuai Alamat', '2025-01-03', ''),
(63, 13, '2025-01-04', '2025-02-07', 35, 'Menunggu Konfirmasi', 'fufufafa', 'Ambil Sendiri', '2025-01-03', 'foto nasrul.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(10) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `role` varchar(30) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `foto`, `user_name`, `full_name`, `email`, `password`, `tgl_lahir`, `no_telepon`, `alamat`, `jenis_kelamin`, `role`, `tgl_daftar`) VALUES
(20, '', 'admin', '', 'admin123@gmail.com', '$2y$10$l2SYFKRXIR4b5TBYDzZYpu8fKJUxPTaz60Vab8VtOejf8lCisTmFS', '2002-05-07', '085763564321', '', '', 'admin', '2024-12-16 10:50:36'),
(28, 'Picture2.jpg', 'sasa', 'Salsabila Rahayu', 'sasa@gmail.com', '$2y$10$waX4Ti2IxxxEXbGZOw1.Z.2sQYFQXBhN3JKkXAdfkc6NKnZ1EKyAe', '2000-11-12', '0857654321', 'Teluk tering Jl. Ahmad Yani no 11', 'perempuan', 'user', '2024-12-29 03:04:41'),
(30, 'WhatsApp Image 2024-11-14 at 2.57.07 PM.jpeg', 'danial', 'Muhammad Danial', 'danial123@gmail.com', '$2y$10$XZ02UtUBgSiOvFnwtRFUeeNvnpxcgxg34LwzKQgDG.RPMcDbuEOm6', '2005-05-09', '085763188633', 'Kavling Senjulung punggur ', 'laki-laki', 'user', '2024-12-29 04:34:46'),
(31, '', 'fufufafa', '', 'chilipari@gmail.com', '$2y$10$J/btjpkp7ABzQlgpclSHGuBniC1/Ma/w.LmAaVOKBst.IOCqA47pO', '1979-12-29', '08136568976', '', '', 'user', '2024-12-29 04:39:14'),
(32, '', 'asep', '', 'asep61@gmail.com', '$2y$10$3RTMIaWUQOZMeins3oH5..2Fm.Cg9U7nlxTlfLi2bdTPn95z.tgM.', '2000-01-14', '081398726722', '', '', 'user', '2024-12-29 06:12:39'),
(33, '', 'agus', '', 'agus1@gmail.com', '$2y$10$kUO7xMv8MXLU/hzxUT81ku6y2eohjTeqt0aj0qO.emjOsxSEErDuO', '2000-01-25', '08123456789', '', '', 'user', '2024-12-29 06:24:48'),
(34, '', 'user9', '', 'user9@gmail.com', '$2y$10$UKjbjRpz73wMb0wjNFpl7O1VygfjIflWL23hIxnY8TtI7oQsgLHeS', '2000-01-12', '08123456789', '', '', 'user', '2024-12-29 06:29:02'),
(35, '', 'user5', '', 'user5@gmail.com', '$2y$10$DeruL96wK4bi6P7.3iW8P.1xRCuAuK.w7ICXa6Lifkl1Ehsxy0TiC', '2000-12-12', '08123456789', '', '', 'user', '2024-12-29 06:31:53'),
(36, '', 'test1', '', 'test1@gmail.com', '$2y$10$8K2q02O1oVbrHt6xFK2TSuVTxKwRuc55BQBS51WUa3seTlW5ORcTy', '2000-12-12', '081398726722', '', '', 'user', '2024-12-29 06:40:42'),
(37, '', 'user77', '', 'user77@gmail.com', '$2y$10$TbnsKugrIg4mjfQrBvx7sOOcJpdj6/lODgKWfXXsRIcwcmvPN6g8K', '2000-12-12', '08123456782', '', '', 'user', '2024-12-29 06:46:17'),
(38, '', 'udin', '', 'udin@gmail.com', '$2y$10$Ix6mQqhGE.DfkO5pYgDnlOQMf84.j2/lAPTq.6q4Bp18XXpHumvcW', '2000-12-12', '081398726712', '', '', 'user', '2024-12-29 06:55:59'),
(39, '', 'yin', '', 'yin123@gmail.com', '$2y$10$AcAaJTdHg7ND8lVX8BljjOKK.x7nLRewmenvk2Q4QfVCl36x9jnEi', '2000-02-12', '081398726700', '', '', 'user', '2024-12-29 07:03:08'),
(40, '', 'bayu123', '', 'bayu123@gmail.com', '$2y$10$TFd91q9RUK7fWFl/gBj7ZO4OEaxAkU4.FdMX1DqLrmB0QG6F4in6K', '2004-12-12', '08123423344', '', '', 'user', '2024-12-29 07:07:51'),
(41, 'images.jpeg', 'user14', 'user14', 'user14@gmail.com', '$2y$10$MnMI9vYTV6m3IfsMXZXlTOFt4kklTvMcDJ16uUSk0tAjcVfCl96pG', '2000-12-12', '08123456789', 'Jl.Ahmad Yani\r\nAsrama Politeknik Negri Batam', 'laki-laki', 'user', '2024-12-29 07:10:27'),
(42, '', 'eci', '', 'putrichelseamaharani@gmail.com', '$2y$10$L8zIkuSYZ2tusCDwX2TchuWyTEjD.Icpr9wTKBrI3Qlg9Yu8EG.jK', '2006-03-20', '089523777134', '', '', 'user', '2024-12-29 07:40:32'),
(43, '', 'arthur', '', 'arthurganteng@gmail.com', '$2y$10$a2hgkrAFGXwVWVUQ3umj4OF1Z9jvg4KNE3m6NhZ8djaQqHkYtyGWe', '2000-08-29', '019727', '', '', 'user', '2024-12-29 07:41:15'),
(44, '', 'budi', '', 'budi123@gmail.com', '$2y$10$9S55XF1vLMz0vo4BjQmjD.Z.rWtcm9AJp1L9pDNNncMYz5NTQaOHm', '2000-03-12', '08123456123', '', '', 'user', '2024-12-29 08:53:13'),
(45, '', 'ecai', '', 'putrichelseamaharani@gmail.com', '$2y$10$d1gfzYI6cyvftD.6vpHzDuR7v4RPdf245uT4gK/o56.iThAqXWQu6', '2024-12-04', '089523777134', '', '', 'user', '2024-12-29 09:57:30'),
(48, 'IMG-20241227-WA0023.jpg', 'lidya', 'lidya nur', 'apasih@gmail.com', '$2y$10$cg0oT20NdD3.yw3tiONVCuue4j0pa6GWM1x/teMmEEZymhEKwpDVS', '2006-06-28', '085588', 'buana vista 1', 'perempuan', 'user', '2024-12-29 15:56:39'),
(49, '', 'samsul', '', 'samsulganteng217@gmail.com', '$2y$10$uYAVleCFDw05UAQIc5bH7.RW7zSTWP/J0ufdO0QEonnozkbh6csna', '2000-12-20', '087964321079', '', '', 'user', '2024-12-30 14:34:40'),
(50, '', 'pajar', '', 'pajar@gmail.com', '$2y$10$HnKjZljb48134aqaQppLAOojs028t3wYblE6l5BY/HTvQePEMCDCO', '2000-12-12', '081398726712', '', '', 'user', '2024-12-31 04:23:36'),
(51, '', 'andriyani', '', 'yaanii0204@gmail.com', '$2y$10$FLRHzA04XXdwE2DuXP1H5.682XPDwRF9yjDAD6nZzUJn8PngAWcbC', '2025-01-03', '082383276076', '', '', 'user', '2025-01-03 01:23:09'),
(52, '', 'andri0204', '', 'andriyanimeuraxa@gmail.com', '$2y$10$6aAdosQGnQlfVadSozdyK.y6hj6oJPqFCn6cXUKVQ4DWLIUCNg65i', '2025-01-03', '082383276076', '', '', 'user', '2025-01-03 01:25:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cek_pesanan`
--
ALTER TABLE `cek_pesanan`
  ADD UNIQUE KEY `id_kendaraan` (`id_kendaraan`,`tgl_pesanan`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`kode_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `kode_pesanan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
