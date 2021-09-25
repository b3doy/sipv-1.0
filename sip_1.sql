-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 22, 2021 at 04:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sip_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'Superuser', 'owner'),
(2, 'Admin', 'site-administrator'),
(3, 'User', 'regular-user');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(2, 4),
(3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'tobias', 1, '2021-09-10 20:32:47', 0),
(2, '::1', 'tobias@mail.com', 4, '2021-09-10 20:34:36', 1),
(3, '::1', 'tobias@mail.com', 4, '2021-09-10 21:07:37', 1),
(4, '::1', 'tobias@mail.com', 4, '2021-09-10 21:11:06', 1),
(5, '::1', 'tobias@mail.com', 4, '2021-09-10 21:33:34', 1),
(6, '::1', 'tobias@mail.com', 4, '2021-09-10 21:36:19', 1),
(7, '::1', 'tobias@mail.com', 4, '2021-09-10 21:49:21', 1),
(8, '::1', 'tobias@mail.com', 4, '2021-09-10 22:19:02', 1),
(9, '::1', 'tobias@mail.com', 4, '2021-09-11 02:19:33', 1),
(10, '::1', 'ncup@mail.com', 7, '2021-09-11 02:32:20', 1),
(11, '::1', 'tobias@mail.com', 4, '2021-09-11 02:32:42', 1),
(12, '::1', 'ncup@mail.com', 7, '2021-09-11 02:33:05', 1),
(13, '::1', 'tobias@mail.com', 4, '2021-09-11 02:33:22', 1),
(14, '::1', 'tobias@mail.com', 4, '2021-09-11 04:46:45', 1),
(15, '::1', 'tobias@mail.com', 4, '2021-09-11 04:47:55', 1),
(16, '::1', 'tobias@mail.com', 4, '2021-09-11 05:14:54', 1),
(17, '::1', 'ncup@mail.com', 8, '2021-09-11 05:18:36', 1),
(18, '::1', 'tobias@mail.com', 4, '2021-09-11 05:25:27', 1),
(19, '::1', 'tobias@mail.com', 4, '2021-09-12 06:38:15', 1),
(20, '::1', 'tobias@mail.com', 4, '2021-09-13 04:30:42', 1),
(21, '::1', 'tobias@mail.com', 4, '2021-09-13 08:46:09', 1),
(22, '::1', 'tobias@mail.com', 4, '2021-09-13 21:25:47', 1),
(23, '::1', 'tobias@mail.com', 4, '2021-09-14 00:15:19', 1),
(24, '::1', 'tobias@mail.com', 4, '2021-09-14 06:42:36', 1),
(25, '::1', 'tobias@mail.com', 4, '2021-09-15 03:04:03', 1),
(26, '::1', 'tobias@mail.com', 4, '2021-09-15 06:30:15', 1),
(27, '::1', 'tobias@mail.com', 4, '2021-09-16 01:59:29', 1),
(28, '::1', 'tobias@mail.com', 4, '2021-09-16 07:32:55', 1),
(29, '::1', 'tobias@mail.com', 4, '2021-09-16 17:40:25', 1),
(30, '::1', 'tobias@mail.com', 4, '2021-09-17 06:32:00', 1),
(31, '::1', 'tobias@mail.com', 4, '2021-09-17 09:06:01', 1),
(32, '::1', 'tobias@mail.com', 4, '2021-09-17 11:41:21', 1),
(33, '::1', 'tobias@mail.com', 4, '2021-09-17 17:42:59', 1),
(34, '::1', 'tobias@mail.com', 4, '2021-09-18 02:21:14', 1),
(35, '::1', 'tobias@mail.com', 4, '2021-09-18 05:43:42', 1),
(36, '::1', 'tobias@mail.com', 4, '2021-09-18 09:48:47', 1),
(37, '::1', 'tobias@mail.com', 4, '2021-09-18 17:30:43', 1),
(38, '::1', 'tobias@mail.com', 4, '2021-09-19 03:35:26', 1),
(39, '::1', 'tobias@mail.com', 4, '2021-09-19 11:01:16', 1),
(40, '::1', 'tobias@mail.com', 4, '2021-09-20 07:35:13', 1),
(41, '::1', 'tobias@mail.com', 4, '2021-09-20 13:07:39', 1),
(42, '::1', 'tobias@mail.com', 4, '2021-09-20 19:25:33', 1),
(43, '::1', 'tobias@mail.com', 4, '2021-09-21 04:52:48', 1),
(44, '::1', 'tobias@mail.com', 4, '2021-09-21 17:01:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) UNSIGNED NOT NULL,
  `plu` varchar(155) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `harga_beli` int(12) NOT NULL,
  `margin` float(5,2) NOT NULL,
  `harga_jual` int(12) NOT NULL,
  `stok` int(11) NOT NULL,
  `kode_supplier` varchar(155) DEFAULT NULL,
  `kategori_id` int(11) UNSIGNED DEFAULT NULL,
  `satuan_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `plu`, `nama_barang`, `barcode`, `harga_beli`, `margin`, `harga_jual`, `stok`, `kode_supplier`, `kategori_id`, `satuan_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Min00001', 'Madu Hutan Riau', '8988464320037', 60300, 24.63, 80000, 87, 'SUP-770', 2, 2, '2021-09-17 08:22:09', '2021-09-17 08:22:09', NULL),
(3, 'Oba00002', 'Betadine 5ml', '8992843103050', 4800, 31.43, 7000, 67, 'SUP-973', 4, 2, '2021-09-17 08:37:24', '2021-09-17 08:37:24', NULL),
(4, 'ATK00003', 'Stapler HD-30', '8993988350026', 17900, 28.40, 25000, 44, 'SUP-526', 3, 2, '2021-09-17 08:37:59', '2021-09-17 08:37:59', NULL),
(5, 'Oba00003', 'Hot Cream', '8997021870328', 9700, 19.17, 12000, 52, 'SUP-973', 4, 2, '2021-09-17 08:39:01', '2021-09-17 10:56:42', NULL),
(6, 'Ala00004', 'Terminal 3 hole 3m', '899873463734', 13870, 30.65, 20000, 29, 'SUP-526', 6, 2, '2021-09-17 10:59:18', '2021-09-17 10:59:29', '2021-09-17 10:59:29'),
(7, 'Oba00004', 'Betadine 10ml', '8998372928347', 7600, 36.67, 12000, 39, 'SUP-973', 4, 7, '2021-09-18 16:25:55', '2021-09-18 16:25:55', NULL),
(8, 'Mak00005', 'Gula Pasir 250gr', '0', 2000, 33.33, 3000, 0, 'SUP-770', 1, 2, '2021-09-19 09:48:35', '2021-09-19 09:48:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', '2021-09-16 11:07:14', '2021-09-16 11:07:14'),
(2, 'Minuman', '2021-09-16 11:15:12', '2021-09-16 11:15:12'),
(3, 'ATK', '2021-09-16 11:15:20', '2021-09-16 11:34:20'),
(4, 'Obat-obatan', '2021-09-16 11:15:33', '2021-09-16 11:15:33'),
(6, 'Alat-alat Listrik', '2021-09-16 11:16:16', '2021-09-16 11:16:16'),
(7, 'Elektronik', '2021-09-16 11:16:27', '2021-09-16 11:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_konsumen` varchar(155) NOT NULL,
  `nama_konsumen` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telpon_konsumen` varchar(99) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id`, `kode_konsumen`, `nama_konsumen`, `alamat`, `telpon_konsumen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CUST-258', 'Makmur Sejahtera', 'Sukabumi', '085657585960', '2021-09-14 09:17:38', '2021-09-15 08:05:36', NULL),
(2, 'CUST-195', 'Maju Bersama', 'Sukabumi', '085708570857', '2021-09-15 06:32:03', '2021-09-15 06:32:03', NULL),
(3, 'CUST-782', 'Berkah Jaya', 'Cibentang, Sukabumi', '088893472942', '2021-09-15 08:25:41', '2021-09-15 08:28:28', '2021-09-15 08:28:28'),
(4, 'CUST-000', '-', '-', '-', '2021-09-17 13:57:55', '2021-09-17 13:57:55', '2021-09-17 13:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1631255095, 1),
(2, '2021-09-11-063608', 'App\\Database\\Migrations\\AlterTableUsers', 'default', 'App', 1631342264, 2),
(3, '2021-09-12-134637', 'App\\Database\\Migrations\\CreateTableInventory', 'default', 'App', 1631455443, 3),
(4, '2021-09-12-143922', 'App\\Database\\Migrations\\AddFieldInventoryTable', 'default', 'App', 1631457826, 4),
(5, '2021-09-12-152010', 'App\\Database\\Migrations\\AddFieldsToInventoryTable', 'default', 'App', 1631460094, 5),
(6, '2021-09-12-162151', 'App\\Database\\Migrations\\ChangeAttributesInventoryTable', 'default', 'App', 1631464095, 6),
(7, '2021-09-12-164205', 'App\\Database\\Migrations\\ChangeAttributesInventoryTable01', 'default', 'App', 1631465115, 7),
(8, '2021-09-14-033659', 'App\\Database\\Migrations\\CreateTableSupplier', 'default', 'App', 1631591051, 8),
(9, '2021-09-14-034540', 'App\\Database\\Migrations\\AddSupplierColumnToInventoryTable', 'default', 'App', 1631591215, 9),
(10, '2021-09-14-135611', 'App\\Database\\Migrations\\CreateTableKonsumen', 'default', 'App', 1631627878, 10),
(11, '2021-09-16-144607', 'App\\Database\\Migrations\\CreateTableKategori', 'default', 'App', 1631803688, 11),
(12, '2021-09-16-145843', 'App\\Database\\Migrations\\CreateSatuanTable', 'default', 'App', 1631805293, 12),
(13, '2021-09-16-151217', 'App\\Database\\Migrations\\AddForeinKeyInventoryTable', 'default', 'App', 1631805976, 13),
(14, '2021-09-17-133041', 'App\\Database\\Migrations\\CreatePenjualanTable', 'default', 'App', 1631886256, 14),
(15, '2021-09-17-143316', 'App\\Database\\Migrations\\CreateTablePenjualanDetail', 'default', 'App', 1631889663, 15),
(16, '2021-09-17-144402', 'App\\Database\\Migrations\\CreateTablePenjualanTemp', 'default', 'App', 1631890036, 16);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) UNSIGNED NOT NULL,
  `faktur_penjualan` varchar(20) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `kode_konsumen_penjualan` varchar(25) NOT NULL,
  `diskon_persen_penjualan` double(11,2) NOT NULL DEFAULT 0.00,
  `diskon_nominal_penjualan` double(11,2) NOT NULL DEFAULT 0.00,
  `total_kotor_penjualan` double(11,2) NOT NULL DEFAULT 0.00,
  `total_bersih_penjualan` double(11,2) NOT NULL DEFAULT 0.00,
  `jumlah_uang` double(11,2) NOT NULL DEFAULT 0.00,
  `sisa_uang` double(11,2) NOT NULL DEFAULT 0.00,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `faktur_penjualan`, `tanggal_penjualan`, `kode_konsumen_penjualan`, `diskon_persen_penjualan`, `diskon_nominal_penjualan`, `total_kotor_penjualan`, `total_bersih_penjualan`, `jumlah_uang`, `sisa_uang`, `created_at`, `updated_at`) VALUES
(1, 'S-1709210001', '2021-09-17', 'CUST-000', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2021-09-17 16:24:11', '2021-09-17 16:24:11'),
(7, 'FJ-1909210001', '2021-09-19', 'CUST-000', 0.00, 2000.00, 327000.00, 325000.00, 350000.00, 25000.00, '2021-09-19 22:36:00', '2021-09-19 22:36:00'),
(8, 'FJ-1909210002', '2021-09-19', 'CUST-000', 0.00, 0.00, 60000.00, 60000.00, 70000.00, 10000.00, '2021-09-19 23:02:05', '2021-09-19 23:02:05'),
(9, 'FJ-1909210003', '2021-09-19', 'CUST-000', 0.00, 0.00, 160000.00, 160000.00, 170000.00, 10000.00, '2021-09-19 23:03:06', '2021-09-19 23:03:06'),
(10, 'FJ-1909210004', '2021-09-19', 'CUST-000', 0.00, 0.00, 25000.00, 25000.00, 25000.00, 0.00, '2021-09-19 23:03:45', '2021-09-19 23:03:45'),
(11, 'FJ-2009210001', '2021-09-20', 'CUST-000', 0.00, 0.00, 7000.00, 7000.00, 10000.00, 3000.00, '2021-09-20 20:20:08', '2021-09-20 20:20:08'),
(12, 'FJ-2009210002', '2021-09-20', 'CUST-000', 0.00, 0.00, 12000.00, 12000.00, 12000.00, 0.00, '2021-09-20 20:31:01', '2021-09-20 20:31:01'),
(13, 'FJ-2009210003', '2021-09-20', 'CUST-000', 0.00, 0.00, 80000.00, 80000.00, 100000.00, 20000.00, '2021-09-20 20:32:30', '2021-09-20 20:32:30'),
(14, 'FJ-2009210004', '2021-09-20', 'CUST-000', 0.00, 0.00, 25000.00, 25000.00, 40000.00, 15000.00, '2021-09-20 20:33:35', '2021-09-20 20:33:35'),
(15, 'FJ-2009210005', '2021-09-20', 'CUST-000', 0.00, 0.00, 20000.00, 20000.00, 20000.00, 0.00, '2021-09-20 20:34:04', '2021-09-20 20:34:04'),
(16, 'FJ-2009210006', '2021-09-20', 'CUST-000', 0.00, 0.00, 80000.00, 80000.00, 80000.00, 0.00, '2021-09-20 20:34:21', '2021-09-20 20:34:21'),
(17, 'FJ-2009210007', '2021-09-20', 'CUST-000', 0.00, 0.00, 92000.00, 92000.00, 100000.00, 8000.00, '2021-09-20 20:51:57', '2021-09-20 20:51:57'),
(18, 'FJ-2009210008', '2021-09-20', 'CUST-000', 0.00, 0.00, 320000.00, 320000.00, 350000.00, 30000.00, '2021-09-20 21:14:14', '2021-09-20 21:14:14'),
(19, 'FJ-2109210001', '2021-09-21', 'CUST-000', 0.00, 0.00, 80000.00, 80000.00, 100000.00, 20000.00, '2021-09-21 01:25:37', '2021-09-21 01:25:37'),
(20, 'FJ-2109210002', '2021-09-21', 'CUST-000', 0.00, 0.00, 20000.00, 20000.00, 20000.00, 0.00, '2021-09-21 07:27:05', '2021-09-21 07:27:05'),
(21, 'FJ-2109210003', '2021-09-21', 'CUST-000', 0.00, 0.00, 12000.00, 12000.00, 12000.00, 0.00, '2021-09-21 08:35:15', '2021-09-21 08:35:15'),
(22, 'FJ-2109210004', '2021-09-21', 'CUST-000', 0.00, 0.00, 7000.00, 7000.00, 10000.00, 3000.00, '2021-09-21 08:35:35', '2021-09-21 08:35:35'),
(23, 'FJ-2109210005', '2021-09-21', 'CUST-000', 0.00, 0.00, 14000.00, 14000.00, 15000.00, 1000.00, '2021-09-21 08:43:21', '2021-09-21 08:43:21'),
(24, 'FJ-2109210006', '2021-09-21', 'CUST-000', 0.00, 0.00, 20000.00, 20000.00, 20000.00, 0.00, '2021-09-21 08:44:05', '2021-09-21 08:44:05'),
(25, 'FJ-2109210007', '2021-09-21', 'CUST-000', 0.00, 0.00, 107000.00, 107000.00, 120000.00, 13000.00, '2021-09-21 09:55:12', '2021-09-21 09:55:12'),
(26, 'FJ-2109210008', '2021-09-21', 'CUST-000', 0.00, 0.00, 100000.00, 100000.00, 100000.00, 0.00, '2021-09-21 11:25:45', '2021-09-21 11:25:45'),
(27, 'FJ-2109210009', '2021-09-21', 'CUST-000', 0.00, 0.00, 80000.00, 80000.00, 100000.00, 20000.00, '2021-09-21 11:30:00', '2021-09-21 11:30:00'),
(28, 'FJ-2109210010', '2021-09-21', 'CUST-000', 0.00, 0.00, 80000.00, 80000.00, 100000.00, 20000.00, '2021-09-21 11:31:30', '2021-09-21 11:31:30'),
(29, 'FJ-2109210011', '2021-09-21', 'CUST-000', 0.00, 0.00, 99000.00, 99000.00, 100000.00, 1000.00, '2021-09-21 11:32:41', '2021-09-21 11:32:41'),
(30, 'FJ-2109210012', '2021-09-21', 'CUST-000', 0.00, 0.00, 87000.00, 87000.00, 100000.00, 13000.00, '2021-09-21 11:35:41', '2021-09-21 11:35:41'),
(31, 'FJ-2109210013', '2021-09-21', 'CUST-000', 0.00, 0.00, 12000.00, 12000.00, 20000.00, 8000.00, '2021-09-21 12:23:09', '2021-09-21 12:23:09'),
(32, 'FJ-2109210014', '2021-09-21', 'CUST-000', 0.00, 0.00, 156000.00, 156000.00, 200000.00, 44000.00, '2021-09-21 13:04:24', '2021-09-21 13:04:24'),
(33, 'FJ-2209210001', '2021-09-22', 'CUST-000', 0.00, 0.00, 350000.00, 350000.00, 350000.00, 0.00, '2021-09-22 08:00:35', '2021-09-22 08:00:35'),
(34, 'FJ-2209210002', '2021-09-22', 'CUST-000', 0.00, 0.00, 355000.00, 355000.00, 370000.00, 15000.00, '2021-09-22 08:11:03', '2021-09-22 08:11:03'),
(35, 'FJ-2209210003', '2021-09-22', 'CUST-000', 0.00, 0.00, 120000.00, 120000.00, 120000.00, 0.00, '2021-09-22 08:11:58', '2021-09-22 08:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` int(11) NOT NULL,
  `faktur_penjualan_detail` varchar(20) NOT NULL,
  `barcode_penjualan_detail` varchar(50) NOT NULL,
  `harga_beli_penjualan_detail` double(11,2) NOT NULL DEFAULT 0.00,
  `harga_jual_penjualan_detail` double(11,2) NOT NULL DEFAULT 0.00,
  `jumlah_penjualan_detail` double(11,2) NOT NULL DEFAULT 0.00,
  `sub_total_penjualan_detail` double(11,2) NOT NULL DEFAULT 0.00,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `faktur_penjualan_detail`, `barcode_penjualan_detail`, `harga_beli_penjualan_detail`, `harga_jual_penjualan_detail`, `jumlah_penjualan_detail`, `sub_total_penjualan_detail`, `created_at`, `updated_at`) VALUES
(1, 'FJ-1909210001', '8992843103050', 4800.00, 7000.00, 1.00, 7000.00, NULL, NULL),
(2, 'FJ-1909210001', '8988464320037', 60300.00, 80000.00, 4.00, 320000.00, NULL, NULL),
(3, 'FJ-1909210002', '899873463734', 13870.00, 20000.00, 3.00, 60000.00, NULL, NULL),
(4, 'FJ-1909210003', '8988464320037', 60300.00, 80000.00, 2.00, 160000.00, NULL, NULL),
(5, 'FJ-1909210004', '8993988350026', 17900.00, 25000.00, 1.00, 25000.00, NULL, NULL),
(6, 'FJ-2009210001', '8992843103050', 4800.00, 7000.00, 1.00, 7000.00, NULL, NULL),
(7, 'FJ-2009210002', '8998372928347', 7600.00, 12000.00, 1.00, 12000.00, NULL, NULL),
(8, 'FJ-2009210003', '8988464320037', 60300.00, 80000.00, 1.00, 80000.00, NULL, NULL),
(9, 'FJ-2009210004', '8993988350026', 17900.00, 25000.00, 1.00, 25000.00, NULL, NULL),
(10, 'FJ-2009210005', '899873463734', 13870.00, 20000.00, 1.00, 20000.00, NULL, NULL),
(11, 'FJ-2009210006', '8988464320037', 60300.00, 80000.00, 1.00, 80000.00, NULL, NULL),
(12, 'FJ-2009210007', '8988464320037', 60300.00, 80000.00, 1.00, 80000.00, NULL, NULL),
(13, 'FJ-2009210007', '8997021870328', 9700.00, 12000.00, 1.00, 12000.00, NULL, NULL),
(14, 'FJ-2009210008', '8988464320037', 60300.00, 80000.00, 4.00, 320000.00, NULL, NULL),
(15, 'FJ-2109210001', '8988464320037', 60300.00, 80000.00, 1.00, 80000.00, NULL, NULL),
(16, 'FJ-2109210002', '899873463734', 13870.00, 20000.00, 1.00, 20000.00, NULL, NULL),
(17, 'FJ-2109210003', '8997021870328', 9700.00, 12000.00, 1.00, 12000.00, NULL, NULL),
(18, 'FJ-2109210004', '8992843103050', 4800.00, 7000.00, 1.00, 7000.00, NULL, NULL),
(19, 'FJ-2109210005', '8992843103050', 4800.00, 7000.00, 2.00, 14000.00, NULL, NULL),
(20, 'FJ-2109210006', '899873463734', 13870.00, 20000.00, 1.00, 20000.00, NULL, NULL),
(21, 'FJ-2109210007', '899873463734', 13870.00, 20000.00, 1.00, 20000.00, NULL, NULL),
(22, 'FJ-2109210007', '8992843103050', 4800.00, 7000.00, 1.00, 7000.00, NULL, NULL),
(23, 'FJ-2109210007', '8988464320037', 60300.00, 80000.00, 1.00, 80000.00, NULL, NULL),
(24, 'FJ-2109210008', '8988464320037', 60300.00, 80000.00, 1.00, 80000.00, NULL, NULL),
(25, 'FJ-2109210008', '899873463734', 13870.00, 20000.00, 1.00, 20000.00, NULL, NULL),
(26, 'FJ-2109210009', '8988464320037', 60300.00, 80000.00, 1.00, 80000.00, NULL, NULL),
(27, 'FJ-2109210010', '8988464320037', 60300.00, 80000.00, 1.00, 80000.00, NULL, NULL),
(28, 'FJ-2109210011', '8992843103050', 4800.00, 7000.00, 1.00, 7000.00, NULL, NULL),
(29, 'FJ-2109210011', '8997021870328', 9700.00, 12000.00, 1.00, 12000.00, NULL, NULL),
(30, 'FJ-2109210011', '8988464320037', 60300.00, 80000.00, 1.00, 80000.00, NULL, NULL),
(31, 'FJ-2109210012', '8992843103050', 4800.00, 7000.00, 1.00, 7000.00, NULL, NULL),
(32, 'FJ-2109210012', '8988464320037', 60300.00, 80000.00, 1.00, 80000.00, NULL, NULL),
(33, 'FJ-2109210013', '8997021870328', 9700.00, 12000.00, 1.00, 12000.00, NULL, NULL),
(34, 'FJ-2109210014', '8988464320037', 60300.00, 80000.00, 1.00, 80000.00, NULL, NULL),
(35, 'FJ-2109210014', '8992843103050', 4800.00, 7000.00, 1.00, 7000.00, NULL, NULL),
(36, 'FJ-2109210014', '8993988350026', 17900.00, 25000.00, 1.00, 25000.00, NULL, NULL),
(37, 'FJ-2109210014', '8997021870328', 9700.00, 12000.00, 1.00, 12000.00, NULL, NULL),
(38, 'FJ-2109210014', '899873463734', 13870.00, 20000.00, 1.00, 20000.00, NULL, NULL),
(39, 'FJ-2109210014', '8998372928347', 7600.00, 12000.00, 1.00, 12000.00, NULL, NULL),
(40, 'FJ-2209210001', '8993988350026', 17900.00, 25000.00, 10.00, 250000.00, NULL, NULL),
(41, 'FJ-2209210001', '899873463734', 13870.00, 20000.00, 5.00, 100000.00, NULL, NULL),
(42, 'FJ-2209210002', '8992843103050', 4800.00, 7000.00, 25.00, 175000.00, NULL, NULL),
(43, 'FJ-2209210002', '8998372928347', 7600.00, 12000.00, 15.00, 180000.00, NULL, NULL),
(44, 'FJ-2209210003', '8997021870328', 9700.00, 12000.00, 10.00, 120000.00, NULL, NULL);

--
-- Triggers `penjualan_detail`
--
DELIMITER $$
CREATE TRIGGER `trigger_delete_penjualan_detail` AFTER DELETE ON `penjualan_detail` FOR EACH ROW UPDATE inventory SET stok = stok + old.jumlah_penjualan_detail WHERE barcode = old.barcode_penjualan_detail
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_insert_penjualan_detail` AFTER INSERT ON `penjualan_detail` FOR EACH ROW UPDATE inventory SET stok = stok - new.jumlah_penjualan_detail WHERE barcode = new.barcode_penjualan_detail
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_update_penjualan_detail` AFTER UPDATE ON `penjualan_detail` FOR EACH ROW UPDATE inventory SET stok = (stok + old.jumlah_penjualan_detail) - new.jumlah_penjualan_detail WHERE barcode = new.barcode_penjualan_detail
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_temp`
--

CREATE TABLE `penjualan_temp` (
  `id` int(11) NOT NULL,
  `faktur_penjualan_detail` varchar(55) NOT NULL,
  `barcode_penjualan_detail` varchar(50) NOT NULL,
  `harga_beli_penjualan_detail` double(11,2) NOT NULL DEFAULT 0.00,
  `harga_jual_penjualan_detail` double(11,2) NOT NULL DEFAULT 0.00,
  `jumlah_penjualan_detail` double(11,2) NOT NULL DEFAULT 0.00,
  `sub_total_penjualan_detail` double(11,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `penjualan_temp`
--
DELIMITER $$
CREATE TRIGGER `trigger_delete_penjualan_temp` AFTER DELETE ON `penjualan_temp` FOR EACH ROW UPDATE inventory SET stok = stok + old.jumlah_penjualan_detail WHERE barcode = old.barcode_penjualan_detail
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_insert_penjualan_temp` AFTER INSERT ON `penjualan_temp` FOR EACH ROW UPDATE inventory SET stok = stok - new.jumlah_penjualan_detail WHERE barcode = new.barcode_penjualan_detail
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_update_penjualan_temp` AFTER UPDATE ON `penjualan_temp` FOR EACH ROW UPDATE inventory SET stok = (stok + old.jumlah_penjualan_detail) - new.jumlah_penjualan_detail WHERE barcode = new.barcode_penjualan_detail
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_satuan` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `nama_satuan`, `created_at`, `updated_at`) VALUES
(2, 'Unit', '2021-09-16 11:53:55', '2021-09-16 11:53:55'),
(3, 'Lusin', '2021-09-16 11:54:02', '2021-09-16 11:54:02'),
(4, 'Kodi', '2021-09-16 11:54:12', '2021-09-16 11:54:12'),
(5, 'Gross', '2021-09-16 11:54:20', '2021-09-16 11:54:20'),
(6, 'Carton', '2021-09-16 11:54:31', '2021-09-16 11:54:31'),
(7, 'Pcs', '2021-09-16 22:59:55', '2021-09-16 22:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_supplier` varchar(155) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telpon_supplier` varchar(99) NOT NULL,
  `nama_sales` varchar(255) NOT NULL,
  `telpon_sales` varchar(99) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `kode_supplier`, `nama_supplier`, `alamat`, `telpon_supplier`, `nama_sales`, `telpon_sales`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SUP-770', 'Ath-Thoifah', 'Bekasi', '02178893432', 'Jeki', '089923236549', '2021-09-13 23:20:32', '2021-09-13 23:20:32', NULL),
(2, 'SUP-973', 'Bina San Prima', 'Sukabumi', '0266222890', 'Remon', '083823457184', '2021-09-13 23:44:01', '2021-09-13 23:44:01', NULL),
(3, 'SUP-973', 'Bina Sa Kan', 'Sukabumi', '0266222890', 'Sungkowo', '08991374382', '2021-09-14 06:52:30', '2021-09-14 07:05:31', '2021-09-14 07:05:31'),
(4, 'SUP-973', 'MSP', 'Sukabumi', '0266210743', 'Budi', '083823457184', '2021-09-14 06:54:09', '2021-09-14 07:05:42', '2021-09-14 07:05:42'),
(5, 'SUP-973', 'Bina San Prima', 'Sukabumi', '0266222890', 'Reynaldi', '088899990000', '2021-09-14 06:58:28', '2021-09-14 07:05:20', '2021-09-14 07:05:20'),
(6, 'SUP-526', 'MSM', 'Sukabumi', '0266210749', 'Nano', '087824789366', '2021-09-14 07:06:49', '2021-09-16 03:08:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(155) DEFAULT NULL,
  `telpon` varchar(63) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `user_image` varchar(155) NOT NULL DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `telpon`, `alamat`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'tobias@mail.com', 'tobias', 'Tobias', '085808580858', 'Sukabumi', 'default.svg', '$2y$10$NeIpp/1CDg.P20P/o89iAOjPGR926.DA2LDReS3FNZd5Dmfiy5Qsa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-10 20:34:25', '2021-09-10 20:34:25', NULL),
(8, 'ncup@mail.com', 'ncup', 'Ncup Jansen', '088899900011', 'Sukabumi', 'default.svg', '$2y$10$ilR2vR3m2G/6uLhSNB9AZO.zHcznU9trCnpm1gphxXrAzHbgOI.6O', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-11 05:17:05', '2021-09-11 05:17:05', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `satuan_id` (`satuan_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_konsumen_penjualan` (`kode_konsumen_penjualan`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faktur_penjualan_detail` (`faktur_penjualan_detail`),
  ADD KEY `barcode_penjualan_detail` (`barcode_penjualan_detail`);

--
-- Indexes for table `penjualan_temp`
--
ALTER TABLE `penjualan_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `penjualan_temp`
--
ALTER TABLE `penjualan_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
