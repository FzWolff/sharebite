-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2026 at 07:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharebite`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Nasi Bungkus', '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
(2, 'Snack', '2026-06-16 01:25:57', '2026-06-16 01:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `donation_requests`
--

CREATE TABLE `donation_requests` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donation_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `quantity_requested` int UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `pickup_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donation_requests`
--

INSERT INTO `donation_requests` (`id`, `recipient_id`, `donation_id`, `message`, `quantity_requested`, `status`, `pickup_time`, `created_at`, `updated_at`) VALUES
('45e29361-29b4-4c14-ac81-b11abe23d3cb', 'rrrrrrrr-0000-0000-0000-000000000001', 'fd000000-0000-0000-0000-000000000005', 'Kami membutuhkan makanan ini untuk kegiatan panti asuhan.', 5, 'approved', '2026-06-17 03:00:00', '2026-06-15 22:04:08', '2026-06-15 22:12:24'),
('769e2d3e-3b85-44ff-91df-ce492646fdea', 'e8de37b7-8e73-44e0-bb11-7eee06d257de', '88433224-2e00-4ae7-9c39-164423a35301', 'asd', 5, 'approved', '2026-06-16 10:00:00', '2026-06-16 02:28:56', '2026-06-16 02:29:22'),
('9b27c293-e61d-4b5c-892e-693478ffebce', 'rrrrrrrr-0000-0000-0000-000000000001', 'fd000000-0000-0000-0000-000000000005', 'Test request normal', 2, 'approved', NULL, '2026-06-15 22:32:19', '2026-06-15 22:35:53'),
('f1993074-da8a-455a-8151-2383b04b0167', 'e8de37b7-8e73-44e0-bb11-7eee06d257de', '4eb60bab-37da-4cc8-ad58-77bbd1c98736', 'aku butuh', 5, 'pending', '2026-06-16 12:25:00', '2026-06-16 01:25:45', '2026-06-16 01:25:45'),
('rq000000-0000-0000-0000-000000000001', 'rrrrrrrr-0000-0000-0000-000000000001', 'fd000000-0000-0000-0000-000000000001', 'Kami dari Panti Asuhan Harapan Bangsa ingin mengajukan permohonan 10 bungkus untuk anak-anak kami.', 10, 'approved', '2026-06-16 03:25:57', '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('rq000000-0000-0000-0000-000000000002', 'rrrrrrrr-0000-0000-0000-000000000002', 'fd000000-0000-0000-0000-000000000001', 'Yayasan kami membutuhkan 5 bungkus untuk lansia binaan kami di wilayah Jakarta Barat.', 5, 'approved', NULL, '2026-06-16 01:25:57', '2026-06-15 22:24:29'),
('rq000000-0000-0000-0000-000000000003', 'rrrrrrrr-0000-0000-0000-000000000003', 'fd000000-0000-0000-0000-000000000002', 'Komunitas kami siap ambil semua. Ada 30 anak yang akan sangat senang mendapat kue ini.', 30, 'completed', '2026-06-15 01:25:57', '2026-06-15 01:25:57', '2026-06-15 01:25:57'),
('rq000000-0000-0000-0000-000000000004', 'rrrrrrrr-0000-0000-0000-000000000004', 'fd000000-0000-0000-0000-000000000003', 'Kami mewakili Rumah Singgah Cahaya mengajukan permohonan 8 bungkus untuk penghuni kami.', 8, 'approved', '2026-06-16 02:25:57', '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('rq000000-0000-0000-0000-000000000005', 'rrrrrrrr-0000-0000-0000-000000000005', 'fd000000-0000-0000-0000-000000000003', 'Mohon izin mengajukan 5 bungkus nasi padang untuk kegiatan sosial lembaga kami.', 5, 'pending', NULL, '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('rq000000-0000-0000-0000-000000000006', 'rrrrrrrr-0000-0000-0000-000000000001', 'fd000000-0000-0000-0000-000000000005', 'Anak-anak panti kami sangat antusias menerima nasi kuning. Kami bisa ambil 15 porsi.', 15, 'approved', '2026-06-16 04:25:57', '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('rq000000-0000-0000-0000-000000000007', 'rrrrrrrr-0000-0000-0000-000000000002', 'fd000000-0000-0000-0000-000000000007', 'Yayasan kami ingin mengajukan 10 potong brownies untuk anak-anak di TPA binaan kami.', 10, 'pending', NULL, '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('rq000000-0000-0000-0000-000000000008', 'rrrrrrrr-0000-0000-0000-000000000003', 'fd000000-0000-0000-0000-000000000008', 'Komunitas kami bersedia mengambil seluruh 12 bungkus nasi ikan bakar.', 12, 'completed', '2026-06-15 01:25:57', '2026-06-14 01:25:57', '2026-06-15 01:25:57'),
('rq000000-0000-0000-0000-000000000009', 'rrrrrrrr-0000-0000-0000-000000000004', 'fd000000-0000-0000-0000-000000000010', 'Lembaga kami membutuhkan 20 box untuk makan siang penghuni rumah singgah.', 20, 'approved', '2026-06-16 03:25:57', '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('rq000000-0000-0000-0000-000000000010', 'rrrrrrrr-0000-0000-0000-000000000005', 'fd000000-0000-0000-0000-000000000010', 'Kami mengajukan 30 box untuk kegiatan berbagi di wilayah Bekasi Timur.', 30, 'rejected', NULL, '2026-06-16 01:25:57', '2026-06-16 01:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `food_donations`
--

CREATE TABLE `food_donations` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donor_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `quantity` int UNSIGNED NOT NULL,
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'porsi',
  `status` enum('available','partially_taken','completed','expired','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `photo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_at` timestamp NOT NULL,
  `pickup_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_donations`
--

INSERT INTO `food_donations` (`id`, `donor_id`, `category_id`, `title`, `description`, `quantity`, `unit`, `status`, `photo_url`, `expired_at`, `pickup_address`, `created_at`, `updated_at`) VALUES
('4eb60bab-37da-4cc8-ad58-77bbd1c98736', '986748aa-910b-4603-8692-ac40ce85c044', 1, 'Nasi Uduk Test', 'Masih layak konsumsi', 10, 'bungkus', 'available', NULL, '2026-06-17 05:00:00', 'Depok', '2026-06-15 21:54:08', '2026-06-15 21:54:08'),
('88433224-2e00-4ae7-9c39-164423a35301', '8de6be37-4ce5-4afc-871e-5474a2aec448', 1, 'nasi udukk', 'test', 10, 'bungkus', 'partially_taken', NULL, '2026-06-16 14:00:00', 'depok', '2026-06-16 00:50:07', '2026-06-16 02:29:21'),
('918d52c5-06a3-4453-8c65-fb0d2d1d768f', 'dddddddd-0000-0000-0000-000000000001', 1, 'Test Validasi', NULL, 5, 'box', 'available', NULL, '2026-12-31 05:00:00', 'Depok', '2026-06-15 22:59:29', '2026-06-15 22:59:29'),
('9b7d1cdc-229c-4ed8-a8e2-e4de7225a96d', '8de6be37-4ce5-4afc-871e-5474a2aec448', 1, 'nasi uduk test', 'test', 10, 'box', 'cancelled', NULL, '2026-06-17 07:43:00', 'depok', '2026-06-16 00:43:27', '2026-06-16 01:07:22'),
('fd000000-0000-0000-0000-000000000001', 'dddddddd-0000-0000-0000-000000000001', 1, 'Nasi Bungkus Ayam Goreng', 'Nasi bungkus dengan lauk ayam goreng, sambal, dan lalapan. Dibuat pagi ini masih hangat.', 15, 'bungkus', 'partially_taken', NULL, '2026-06-16 07:25:57', 'Jl. Kebon Jeruk No.12, Jakarta Barat', '2026-06-16 01:25:57', '2026-06-15 22:24:29'),
('fd000000-0000-0000-0000-000000000002', 'dddddddd-0000-0000-0000-000000000001', 2, 'Kue Risoles dan Pastel', 'Sisa kue dari acara arisan, masih fresh. Ada risoles mayo dan pastel isi ragout.', 30, 'pcs', 'completed', NULL, '2026-06-15 01:25:57', 'Jl. Kebon Jeruk No.12, Jakarta Barat', '2026-06-15 01:25:57', '2026-06-15 01:25:57'),
('fd000000-0000-0000-0000-000000000003', 'dddddddd-0000-0000-0000-000000000002', 1, 'Nasi Padang Komplit', 'Nasi padang dengan rendang, sayur nangka, dan gulai telur. Sisa acara keluarga.', 15, 'bungkus', 'partially_taken', NULL, '2026-06-16 05:25:57', 'Jl. Raya Bogor KM.25, Bogor', '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('fd000000-0000-0000-0000-000000000004', 'dddddddd-0000-0000-0000-000000000002', 2, 'Snack Kering Campur', 'Keripik singkong, makaroni goreng, dan kacang telur. Kemasan masih tersegel semua.', 50, 'pcs', 'available', NULL, '2026-06-19 01:25:57', 'Jl. Raya Bogor KM.25, Bogor', '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('fd000000-0000-0000-0000-000000000005', 'dddddddd-0000-0000-0000-000000000003', 1, 'Nasi Kuning Tumpeng Mini', 'Sisa tumpeng ulang tahun kantor. Ada nasi kuning, ayam goreng, tempe orek, dan perkedel.', 23, 'porsi', 'partially_taken', NULL, '2026-06-16 06:25:57', 'Jl. Margonda Raya No.88, Depok', '2026-06-16 01:25:57', '2026-06-15 22:35:53'),
('fd000000-0000-0000-0000-000000000006', 'dddddddd-0000-0000-0000-000000000003', 1, 'Nasi Goreng Spesial', 'Nasi goreng buatan sendiri pakai telur dan sayuran segar.', 10, 'bungkus', 'cancelled', NULL, '2026-06-15 23:25:57', 'Jl. Margonda Raya No.88, Depok', '2026-06-15 01:25:57', '2026-06-15 23:25:57'),
('fd000000-0000-0000-0000-000000000007', 'dddddddd-0000-0000-0000-000000000004', 2, 'Brownies Kukus Coklat', 'Brownies kukus homemade, baru dipanggang tadi pagi. Tidak mengandung pengawet.', 20, 'potong', 'available', NULL, '2026-06-17 01:25:57', 'Jl. Pahlawan No.5, Tangerang', '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('fd000000-0000-0000-0000-000000000008', 'dddddddd-0000-0000-0000-000000000004', 1, 'Nasi Bungkus Ikan Bakar', 'Nasi bungkus ikan bakar dengan sambal mangga dan lalapan. Sisa acara syukuran.', 12, 'bungkus', 'completed', NULL, '2026-06-15 01:25:57', 'Jl. Pahlawan No.5, Tangerang', '2026-06-14 01:25:57', '2026-06-15 01:25:57'),
('fd000000-0000-0000-0000-000000000009', 'dddddddd-0000-0000-0000-000000000005', 2, 'Roti Tawar dan Selai Stroberi', 'Roti tawar satu bal beserta selai stroberi, kemasan belum dibuka sama sekali.', 5, 'bungkus', 'available', NULL, '2026-06-18 01:25:57', 'Jl. Gatot Subroto No.22, Bekasi', '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('fd000000-0000-0000-0000-000000000010', 'dddddddd-0000-0000-0000-000000000005', 1, 'Nasi Box Catering Seminar', 'Sisa nasi box catering seminar kantor. Tiap box isi nasi, ayam, tahu, tempe, dan buah.', 40, 'box', 'partially_taken', NULL, '2026-06-16 04:25:57', 'Jl. Gatot Subroto No.22, Bekasi', '2026-06-16 01:25:57', '2026-06-16 01:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviewer_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviewee_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint UNSIGNED NOT NULL COMMENT '1-5',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `reviewer_id`, `reviewee_id`, `request_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
('rv000000-0000-0000-0000-000000000001', 'rrrrrrrr-0000-0000-0000-000000000003', 'dddddddd-0000-0000-0000-000000000001', 'rq000000-0000-0000-0000-000000000003', 5, 'Donaturnya sangat ramah dan kuenya masih sangat fresh saat kami ambil. Anak-anak senang sekali!', '2026-06-15 01:25:58', '2026-06-15 01:25:58'),
('rv000000-0000-0000-0000-000000000002', 'dddddddd-0000-0000-0000-000000000001', 'rrrrrrrr-0000-0000-0000-000000000003', 'rq000000-0000-0000-0000-000000000003', 5, 'Komunitas yang sangat responsif dan datang tepat waktu. Senang bisa berbagi dengan mereka.', '2026-06-15 01:25:58', '2026-06-15 01:25:58'),
('rv000000-0000-0000-0000-000000000003', 'rrrrrrrr-0000-0000-0000-000000000003', 'dddddddd-0000-0000-0000-000000000004', 'rq000000-0000-0000-0000-000000000008', 4, 'Nasi ikan bakarnya lezat dan lokasinya mudah ditemukan. Overall sangat memuaskan.', '2026-06-15 01:25:58', '2026-06-15 01:25:58'),
('rv000000-0000-0000-0000-000000000004', 'dddddddd-0000-0000-0000-000000000004', 'rrrrrrrr-0000-0000-0000-000000000003', 'rq000000-0000-0000-0000-000000000008', 5, 'Komunitasnya sangat tertib dan terorganisir. Pengambilannya lancar dan mereka sangat berterima kasih.', '2026-06-15 01:25:58', '2026-06-15 01:25:58'),
('rv000000-0000-0000-0000-000000000005', 'dddddddd-0000-0000-0000-000000000001', 'rrrrrrrr-0000-0000-0000-000000000001', 'rq000000-0000-0000-0000-000000000001', 5, 'Panti Harapan Bangsa adalah lembaga yang luar biasa. Koordinatornya ramah dan proses pengambilan sangat rapi.', '2026-06-16 01:25:58', '2026-06-16 01:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('donor','recipient','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'recipient',
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `organization_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_address` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `phone`, `address`, `organization_name`, `organization_email`, `organization_phone`, `organization_address`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
('2b9abe55-9645-4be0-ae39-ea10a10b702c', 'dsadas', 'register@gmail.com', '$2y$12$3Z1UO9j7jXzeM.Mg/85JRe.kJksRDPNy8LgFtOGTbgIZ5kAuNLzp2', 'donor', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2026-06-15 23:40:34', '2026-06-15 23:40:34'),
('7186b4b2-241c-44c1-a70f-6c128505db30', 'fazru', 'test.regis@gmail.com', '$2y$12$QYIp4zeTR2fwqVXYpyxdA.j896G2vh.VC015RaUrO0gOMwKxk4hmG', 'donor', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2026-06-15 23:31:27', '2026-06-15 23:31:27'),
('8de6be37-4ce5-4afc-871e-5474a2aec448', 'Donor Test', 'donor.test@gmail.com', '$2y$12$XO7YNv3AKnGT1kcA13i6mOw3.5jFkZjjbpUWnWigTofDbVB59gEx6', 'donor', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2026-06-15 23:38:30', '2026-06-15 23:38:30'),
('976bb65c-b783-476c-b0a3-b41b13dfb067', 'fazru', 'fazru@gmail.com', '$2y$12$lzFGyhdqVjEK48h3lQsC3e74qdwUQnA6OANGXtucZnsUkU71z56ai', 'donor', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2026-06-15 23:32:55', '2026-06-15 23:32:55'),
('986748aa-910b-4603-8692-ac40ce85c044', 'Fazru Test', 'fazru.test@gmail.com', '$2y$12$Pt1BZvHPf5nFAVk5D3jCruqKx8kQw.qTujOL10EUJj5AJykocwnDu', 'donor', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2026-06-15 21:46:19', '2026-06-15 21:46:19'),
('aaaaaaaa-0000-0000-0000-000000000001', 'Admin ShareBite', 'admin@sharebite.id', '$2y$12$vVwLoDIqd8EFABI28X1ugOLc0OQMF5q20HNGa8d9wBKD14yx7E3Wy', 'admin', '081200000001', 'Jl. Sudirman No.1, Jakarta Pusat', NULL, NULL, NULL, NULL, 1, NULL, '2026-06-16 01:25:57', '2026-06-15 21:19:35'),
('dddddddd-0000-0000-0000-000000000001', 'Budi Santoso', 'budi@gmail.com', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'donor', '081311111001', 'Jl. Kebon Jeruk No.12, Jakarta Barat', NULL, NULL, NULL, NULL, 1, NULL, '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('dddddddd-0000-0000-0000-000000000002', 'Siti Rahayu', 'siti@gmail.com', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'donor', '081311111002', 'Jl. Raya Bogor KM.25, Bogor', NULL, NULL, NULL, NULL, 1, NULL, '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('dddddddd-0000-0000-0000-000000000003', 'Ahmad Fauzi', 'ahmad@gmail.com', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'donor', '081311111003', 'Jl. Margonda Raya No.88, Depok', NULL, NULL, NULL, NULL, 1, NULL, '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('dddddddd-0000-0000-0000-000000000004', 'Dewi Lestari', 'dewi@gmail.com', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'donor', '081311111004', 'Jl. Pahlawan No.5, Tangerang', NULL, NULL, NULL, NULL, 1, NULL, '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('dddddddd-0000-0000-0000-000000000005', 'Rizky Pratama', 'rizky@gmail.com', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'donor', '081311111005', 'Jl. Gatot Subroto No.22, Bekasi', NULL, NULL, NULL, NULL, 1, NULL, '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('e8de37b7-8e73-44e0-bb11-7eee06d257de', 'Recipient Test', 'recipient.test@gmail.com', '$2y$12$WoHf8kR307CTdhmpYVtdYeySETmiiJES0b/2124FpAwGwkakVHDF6', 'recipient', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2026-06-15 23:38:39', '2026-06-15 23:38:39'),
('rrrrrrrr-0000-0000-0000-000000000001', 'Koordinator Panti Harapan Bangsa', 'panti.harapan@gmail.com', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'recipient', '081422221001', 'Jl. Anggrek No.3, Jakarta Selatan', 'Panti Asuhan Harapan Bangsa', 'info@pantihb.org', '02144445501', 'Jl. Anggrek No.3, Jakarta Selatan 12345', 1, NULL, '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('rrrrrrrr-0000-0000-0000-000000000002', 'Koordinator Yayasan Bangun Harapan', 'yayasan.bangun@gmail.com', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'recipient', '081422221002', 'Jl. Mawar No.7, Bogor Selatan', 'Yayasan Bangun Harapan', 'info@bangunharapan.org', '02515556702', 'Jl. Mawar No.7, Bogor Selatan 16001', 1, NULL, '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('rrrrrrrr-0000-0000-0000-000000000003', 'Koordinator Komunitas Peduli Sesama', 'peduli.sesama@gmail.com', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'recipient', '081422221003', 'Jl. Melati No.15, Depok', 'Komunitas Peduli Sesama Depok', 'kontak@pedulisesama.id', '02198887703', 'Jl. Melati No.15, Depok 16411', 1, NULL, '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('rrrrrrrr-0000-0000-0000-000000000004', 'Koordinator Rumah Singgah Cahaya', 'rumah.cahaya@gmail.com', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'recipient', '081422221004', 'Jl. Dahlia No.9, Tangerang Selatan', 'Rumah Singgah Cahaya', 'info@rumahcahaya.org', '02177774404', 'Jl. Dahlia No.9, Tangerang Selatan 15414', 1, NULL, '2026-06-16 01:25:57', '2026-06-16 01:25:57'),
('rrrrrrrr-0000-0000-0000-000000000005', 'Koordinator Lembaga Amanah Sejahtera', 'amanah.sejahtera@gmail.com', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'recipient', '081422221005', 'Jl. Cempaka No.21, Bekasi Timur', 'Lembaga Amanah Sejahtera', 'admin@amanahsejahtera.id', '02166665505', 'Jl. Cempaka No.21, Bekasi Timur 17111', 1, NULL, '2026-06-16 01:25:57', '2026-06-16 01:25:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `donation_requests`
--
ALTER TABLE `donation_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_recipient_status` (`recipient_id`,`status`),
  ADD KEY `idx_donation_status` (`donation_id`,`status`);

--
-- Indexes for table `food_donations`
--
ALTER TABLE `food_donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_donor_status` (`donor_id`,`status`),
  ADD KEY `idx_status_expiry` (`status`,`expired_at`),
  ADD KEY `idx_category` (`category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reviews_reviewer_request_unique` (`reviewer_id`,`request_id`),
  ADD KEY `idx_reviewee` (`reviewee_id`),
  ADD KEY `fk_rv_request` (`request_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation_requests`
--
ALTER TABLE `donation_requests`
  ADD CONSTRAINT `fk_dr_donation` FOREIGN KEY (`donation_id`) REFERENCES `food_donations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_dr_recipient` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `food_donations`
--
ALTER TABLE `food_donations`
  ADD CONSTRAINT `fk_fd_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `fk_fd_donor` FOREIGN KEY (`donor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_rv_request` FOREIGN KEY (`request_id`) REFERENCES `donation_requests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_rv_reviewee` FOREIGN KEY (`reviewee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_rv_reviewer` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
