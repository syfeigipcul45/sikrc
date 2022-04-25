-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 05:18 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikrc`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni_krcs`
--

CREATE TABLE `alumni_krcs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tema_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alumni_krcs`
--

INSERT INTO `alumni_krcs` (`id`, `name`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `instansi`, `no_hp`, `tema_id`, `created_at`, `updated_at`) VALUES
(1, 'Syafei Karim', 'Samarinda', '1992-12-07', 'Jalan Kemangi Blok WW 27, Kota Samarinda', 'Politeknik Pertanian Negeri Samarinda', '082236265992', 1, '2022-04-23 01:01:55', '2022-04-23 01:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_kerjasamas`
--

CREATE TABLE `dokumen_kerjasamas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kerjasama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumen_kerjasamas`
--

INSERT INTO `dokumen_kerjasamas` (`id`, `id_kerjasama`, `name`, `link_file`, `created_at`, `updated_at`) VALUES
(1, '1', 'Dokumen 1', 'http://localhost:8000/storage/dokumen-kerjasama/03. Profil-PEGAS_v1.pdf', NULL, '2022-04-23 01:06:41'),
(2, '1', 'Proposal Kerjasama', 'http://localhost:8000/storage/dokumen-kerjasama/1650679501_02. Draft_Proposal Kerjasama DLH-PEGAS Politani Samarinda_2022_v2.pdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` bigint(20) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `name`, `slug`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Gedung Belajar', 'gedung-belajar', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', 1, '2022-04-23 01:28:20', '2022-04-23 01:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `hero_images`
--

CREATE TABLE `hero_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` bigint(20) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_images`
--

INSERT INTO `hero_images` (`id`, `title`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 'KENDILO BEE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut', 1, '2022-04-22 06:13:50', '2022-04-22 06:13:50'),
(2, 'PROPOLIS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut', 3, '2022-04-22 06:14:59', '2022-04-23 01:24:28'),
(3, 'MINYAK SEREH', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut', 2, '2022-04-22 06:16:01', '2022-04-23 01:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelatihans`
--

CREATE TABLE `jadwal_pelatihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tema_id` bigint(20) UNSIGNED NOT NULL,
  `lokasi_pelatihan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_pelatihan` date DEFAULT NULL,
  `jam_mulai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jam_berakhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peserta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_undangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_pelatihans`
--

INSERT INTO `jadwal_pelatihans` (`id`, `tema_id`, `lokasi_pelatihan`, `waktu_pelatihan`, `jam_mulai`, `jam_berakhir`, `peserta`, `file_undangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gedung Belajar', '2022-04-23', NULL, NULL, 'Kelompok Tani', 'http://localhost:8000/storage/file-undangan/1650681222_03. Profil-PEGAS_v1.pdf', '2022-04-23 01:33:42', '2022-04-23 01:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pengajars`
--

CREATE TABLE `kategori_pengajars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_pengajar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_pengajars`
--

INSERT INTO `kategori_pengajars` (`id`, `kategori_pengajar`, `created_at`, `updated_at`) VALUES
(1, 'Pengajar Akademisi', '2022-04-23 00:53:43', '2022-04-23 00:53:43'),
(2, 'Pengajar Instansi', '2022-04-23 00:53:52', '2022-04-23 00:53:52'),
(3, 'Pengajar Praktisi', '2022-04-23 00:54:02', '2022-04-23 00:54:02'),
(4, 'Pengajar NGO', '2022-04-23 00:54:09', '2022-04-23 00:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `kerja_samas`
--

CREATE TABLE `kerja_samas` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kerja_samas`
--

INSERT INTO `kerja_samas` (`id`, `name`, `slug`, `description`, `link_file`, `created_at`, `updated_at`) VALUES
('1', 'Kerja Sama Pembuatan Lebah Madu', 'kerja-sama-pembuatan-lebah-madu', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', NULL, '2022-04-23 01:05:01', '2022-04-23 01:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `kontaks`
--

CREATE TABLE `kontaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materi_pelatihans`
--

CREATE TABLE `materi_pelatihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tema_id` bigint(20) UNSIGNED NOT NULL,
  `link_media` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materi_pelatihans`
--

INSERT INTO `materi_pelatihans` (`id`, `tema_id`, `link_media`, `caption`, `type`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 1, 'http://localhost:8000/storage/materi/1650286245_947-File Proposal Penelitian_Pengabdian [Word] [Doc_docx]-2415-1-2-20220415.docx', 'Dokumentasi Pelatihan Budidaya Madu', 'presentasi', 0, '2022-04-18 11:50:45', '2022-04-23 00:16:59'),
(2, 1, 'http://localhost:8000/storage/materi/1650610943_03. Profil-PEGAS_v1.pdf', 'Kegiatan Sensus Tanaman RHL Tahun 2021 Di Desa Saing Prupuk Kabupaten Paser Kalimantan Timur', 'presentasi', 1, '2022-04-22 06:02:23', '2022-04-22 06:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\Option', 1, '22b2f863-dd7c-4740-bb9a-675b1cfd25e1', 'banner', '18771', '18771.jpg', 'image/jpeg', 'public', 'public', 26899, '[]', '[]', '{\"cover\":true}', '[]', 3, '2022-04-15 13:22:14', '2022-04-15 13:22:15'),
(4, 'App\\Models\\Option', 1, '978a97d8-d37a-43a8-a675-db7ff89388a9', 'banner-login', 'flat-lay-laptop-with-lock-key', 'flat-lay-laptop-with-lock-key.jpg', 'image/jpeg', 'public', 'public', 1649073, '[]', '[]', '{\"cover\":true}', '[]', 4, '2022-04-15 13:22:15', '2022-04-15 13:22:20'),
(5, 'App\\Models\\Post', 1, '86b04a6b-6081-4283-88ee-7f7a2b871f87', 'posts', 'M7OrdaKD91l6C3sTiOSIoYnGKPDWZfY5qKXLKT6N', 'M7OrdaKD91l6C3sTiOSIoYnGKPDWZfY5qKXLKT6N.jpg', 'image/jpeg', 'public', 'public', 120593, '[]', '[]', '{\"preview\":true,\"thumb\":true,\"cover\":true}', '[]', 5, '2022-04-15 13:32:50', '2022-04-15 13:32:54'),
(6, 'App\\Models\\TemaPelatihan', 1, '86ba6bfb-6787-434e-afad-64920b15b8b7', 'tema-pelatihan', 'data', 'data.jpeg', 'image/jpeg', 'public', 'public', 48151, '[]', '[]', '{\"preview\":true,\"thumb\":true,\"cover\":true}', '[]', 6, '2022-04-18 11:50:04', '2022-04-18 11:50:09'),
(7, 'App\\Models\\HeroImage', 1, 'bfc02b71-8ed5-46ec-a477-fe49dfec2f22', 'hero-image', 'kendilo-bee', 'kendilo-bee.jpg', 'image/jpeg', 'public', 'public', 2865838, '[]', '[]', '{\"preview\":true,\"thumb\":true,\"cover\":true}', '[]', 7, '2022-04-22 06:13:53', '2022-04-22 06:14:10'),
(8, 'App\\Models\\HeroImage', 2, '6955122a-4df7-490e-87b5-e60a6a4e658b', 'hero-image', 'propolis', 'propolis.jpg', 'image/jpeg', 'public', 'public', 926303, '[]', '[]', '{\"preview\":true,\"thumb\":true,\"cover\":true}', '[]', 8, '2022-04-22 06:14:59', '2022-04-22 06:15:15'),
(9, 'App\\Models\\HeroImage', 3, 'a5d72122-fd18-4345-a7ef-d3ed0583e3ac', 'hero-image', 'minyak-sereh', 'minyak-sereh.jpg', 'image/jpeg', 'public', 'public', 807581, '[]', '[]', '{\"preview\":true,\"thumb\":true,\"cover\":true}', '[]', 9, '2022-04-22 06:16:01', '2022-04-22 06:16:16'),
(10, 'App\\Models\\Pengajar', 1, '6f0309cf-5800-4bf7-afcd-b20ad30ce5f2', 'pengajars', '4x6 merah', '4x6-merah.jpg', 'image/jpeg', 'public', 'public', 192141, '[]', '[]', '{\"thumb\":true}', '[]', 10, '2022-04-23 00:55:08', '2022-04-23 00:55:12'),
(11, 'App\\Models\\AlumniKrc', 1, 'e1f0abd7-4201-4025-ac45-35bf5e0b427e', 'avatars', 'Syafei Karim', 'Syafei-Karim.jpg', 'image/jpeg', 'public', 'public', 456774, '[]', '[]', '{\"avatar\":true}', '[]', 11, '2022-04-23 01:01:55', '2022-04-23 01:01:56'),
(12, 'App\\Models\\KerjaSama', 0, '8356fbc6-2de4-408e-a1c1-cd75c00f0a1f', 'kerja-sama', '6737836_541c12d3-0278-4f6b-9bc4-6a7dd0c558cf_700_700', '6737836_541c12d3-0278-4f6b-9bc4-6a7dd0c558cf_700_700.jpg', 'image/jpeg', 'public', 'public', 64774, '[]', '[]', '{\"preview\":true,\"thumb\":true,\"cover\":true}', '[]', 12, '2022-04-23 01:05:01', '2022-04-23 01:05:05'),
(13, 'App\\Models\\KerjaSama', 1, '58f807ce-39f4-4832-8bf1-f105e172b186', 'kerja-sama', '6737836_541c12d3-0278-4f6b-9bc4-6a7dd0c558cf_700_700', '6737836_541c12d3-0278-4f6b-9bc4-6a7dd0c558cf_700_700.jpg', 'image/jpeg', 'public', 'public', 64774, '[]', '[]', '{\"preview\":true,\"thumb\":true,\"cover\":true}', '[]', 13, '2022-04-23 01:05:34', '2022-04-23 01:05:37'),
(14, 'App\\Models\\Fasilitas', 1, '80473b67-515a-475a-b742-e88334f1dc43', 'fasilitas', 'img-bundaran-ub-768x573', 'img-bundaran-ub-768x573.jpg', 'image/jpeg', 'public', 'public', 114156, '[]', '[]', '{\"preview\":true,\"thumb\":true,\"cover\":true}', '[]', 14, '2022-04-23 01:28:20', '2022-04-23 01:28:25'),
(15, 'App\\Models\\Fasilitas', 1, '0ee0fd3a-1b8e-4c22-8099-21b288591c39', 'fasilitas', 'gor-UB', 'gor-UB.jpg', 'image/jpeg', 'public', 'public', 35876, '[]', '[]', '{\"preview\":true,\"thumb\":true,\"cover\":true}', '[]', 15, '2022-04-23 01:28:25', '2022-04-23 01:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `media_galleries`
--

CREATE TABLE `media_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link_media` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_10_062029_create_permission_tables', 1),
(6, '2022_02_14_022909_create_posts_table', 1),
(7, '2022_02_14_023042_create_media_table', 1),
(8, '2022_02_14_064330_create_profils_table', 1),
(9, '2022_02_15_053435_create_kategori_pengajars_table', 1),
(10, '2022_02_15_053818_create_pengajars_table', 1),
(11, '2022_02_15_114656_create_fasilitas_table', 1),
(12, '2022_02_16_122848_create_tema_pelatihans_table', 1),
(13, '2022_02_16_201813_create_jadwal_pelatihans_table', 1),
(14, '2022_02_17_131038_create_materi_pelatihans_table', 1),
(15, '2022_02_24_105053_create_media_galleries_table', 1),
(16, '2022_02_24_161501_create_options_table', 1),
(17, '2022_02_24_165427_create_hero_images_table', 1),
(18, '2022_02_24_181638_add_hit_to_tema_pelatihans', 1),
(19, '2022_02_28_161500_add_slug_to_fasilitas', 1),
(20, '2022_03_01_205723_add_jam_pelatihans_to_jadwal_pelatihans', 1),
(21, '2022_03_03_105314_add_slug_to_tema_pelatihans', 1),
(22, '2022_03_03_205908_create_kontaks_table', 1),
(23, '2022_03_04_192216_create_alumni_krcs_table', 1),
(24, '2022_03_05_082442_create_products_table', 1),
(25, '2022_03_05_194328_add_slug_to_products', 1),
(26, '2022_03_07_141052_create_kerja_samas_table', 1),
(27, '2022_03_16_153301_create_testimonials_table', 1),
(28, '2022_03_26_131559_add_order_to_hero_images_table', 1),
(29, '2022_03_26_133208_add_order_to_pengajars_table', 1),
(30, '2022_03_26_204535_add_order_to_fasilitas_table', 1),
(31, '2022_04_05_133757_add_profil_to_options_table', 1),
(32, '2022_04_08_202015_add_pelatihans_to_jadwal_pelatihans', 1),
(33, '2022_04_09_125724_add_is_published_to_materi_pelatihans_table', 1),
(34, '2022_04_10_142642_create_dokumen_kerjasamas_table', 1),
(35, '2022_04_10_205833_add_dokumen_kerjasama_to_kerja_samas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `logo`, `favicon`, `phone`, `whatsapp`, `email`, `address`, `twitter`, `facebook`, `instagram`, `youtube`, `profile_url`, `created_at`, `updated_at`, `profile_title`, `profile_description`) VALUES
(1, 'http://localhost:8000/storage/logo/9Y1e6FgR9eQG7DmADQfDKE6xuTNIK5pSwfVHfRYW.png', 'http://localhost:8000/storage/favicon/XxVlEEcLNCJTS0Cxn5beyjuYNLxOPnXFoRHSmpkF.png', '-', '085389615738', 'kphp.kendilo@gmail.com', 'Jalan Jenderal Sudirman Km 1 No. 09 RT. 009 / RW. 003 Kel. Tanah Grogot Kec. Tanah Grogot Kab. Paser', 'https://twitter.com/', 'https://facebook.com/Kphp Kendilo', 'https://instagram.com/kphpkendilo', 'https://www.youtube.com/channel/UC3EuD4lmQxa2ijJcv9oxTOg', 'https://www.youtube.com/watch?v=UN3f628tJ4U', '2022-04-14 12:55:59', '2022-04-14 13:00:46', 'Selamat Datang di SI-KRC', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajars`
--

CREATE TABLE `pengajars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_menu` bigint(20) UNSIGNED NOT NULL,
  `order` bigint(20) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajars`
--

INSERT INTO `pengajars` (`id`, `name`, `description`, `parent_menu`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Syafei Karim', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', 1, 1, '2022-04-23 00:55:06', '2022-04-23 01:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `title`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rapat Koordinasi REHAB DAS PT. Kideco Jaya Agung di Desa Suweto dan Desa Muara Andeh', 'rapat-koordinasi-rehab-das-pt-kideco-jaya-agung-di-desa-suweto-dan-desa-muara-andeh', '<p style=\"text-align: justify;\">Tana Paser, 2 Februari 2022 &ndash; Sehubungan dengan adanya kegiatan Rehab DAS yang di laksanakan PT. Kideco Jaya Agung, Dilaksanakan rapat koordinasi antara Pt. Kideco Jaya Agung, Para Perusahaan yang menjadi vendor, dan UPTD KPHP Kendilo yang berlangsung di Ruang Aula Rimbawan KPHP Kendilo dan rapat di pmpin langsung oleh Kepala UPTD KPHP Kendilo Bapak Muhammad Hijrafie, S.T, M.T.</p>\r\n<p style=\"text-align: justify;\">Rehab DAS PT. Kideco Jaya Agung di laksankan di dua desa yaitu Desa Suweto dan Desa Muara Andeh Kabupaten Paser.&nbsp; Beberapa vendor yang mengikuti kegiatan ini adalah PT. Bumindo Artha Taka, PT. Anugerah Rimba Kalimantan, CV. Tepian Jawara, CV. Rindang Sari Persada. Setiap vendor akan melaksanakan penanaman di setiap-tiap bagian blok-blok di lahan yang sudah di sediakan oleh PT. Kideco Jaya Agung.</p>\r\n<p style=\"text-align: justify;\">Nantinya para vendor akan melaksanakan&nbsp;<em>Ground Check</em>&nbsp;Bersama tim dari KPPHP Kendilo ke Desa Suweto dan Desa Muara Andeh di mulai dari minggu pertama hingga minggu ke dua di bulan Maret 2022. Bapak Hijrafie pun mengingatkan untuk setiap vendor bahwa diharapkan untuk setiap bibit yang nantinya akan di bawa ke lapangan adalah bibit yang sudah benar-benar siap tanam, dan mengharapkan agar kegiatan ini merupakan upaya kita Bersama dalam upaya melakukan pemulihan longkungan untuk mendapatkan lingkungan hidup yang lebih baik.</p>', '2022-04-15 13:32:49', '2022-04-15 13:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profils`
--

CREATE TABLE `profils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` bigint(20) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2022-04-14 12:55:54', '2022-04-14 12:55:54'),
(2, 'admin', 'web', '2022-04-14 12:55:54', '2022-04-14 12:55:54'),
(3, 'pemateri', 'web', '2022-04-14 12:55:54', '2022-04-14 12:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tema_pelatihans`
--

CREATE TABLE `tema_pelatihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tema_pelatihans`
--

INSERT INTO `tema_pelatihans` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `hit`) VALUES
(1, 'Pengolahan Madu', 'pengolahan-madu', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2022-04-18 11:50:02', '2022-04-18 11:50:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tema_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Syafei Karim', 'syfei.karim@gmail.com', NULL, '$2y$10$gV2ZqtU6embgAOa3vhZB1.VWM3Zrzy6zIN2EtfT/Jw0CIii2dQU5C', NULL, '2022-04-14 12:55:54', '2022-04-14 12:55:54'),
(2, 'Bahrul Muhid', 'bahrul.muhid@gmail.com', NULL, '$2y$10$WFi1/5Wuw1ROyExtACwVRO7psin9//nE0mZZzxbVeV1W4G/AMlOMa', NULL, '2022-04-23 01:47:17', '2022-04-23 01:47:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni_krcs`
--
ALTER TABLE `alumni_krcs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumni_krcs_tema_id_foreign` (`tema_id`);

--
-- Indexes for table `dokumen_kerjasamas`
--
ALTER TABLE `dokumen_kerjasamas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokumen_kerjasamas_id_kerjasama_foreign` (`id_kerjasama`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_images`
--
ALTER TABLE `hero_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_pelatihans`
--
ALTER TABLE `jadwal_pelatihans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_pelatihans_tema_id_foreign` (`tema_id`);

--
-- Indexes for table `kategori_pengajars`
--
ALTER TABLE `kategori_pengajars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kerja_samas`
--
ALTER TABLE `kerja_samas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontaks`
--
ALTER TABLE `kontaks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi_pelatihans`
--
ALTER TABLE `materi_pelatihans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materi_pelatihans_tema_id_foreign` (`tema_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `media_galleries`
--
ALTER TABLE `media_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengajars`
--
ALTER TABLE `pengajars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajars_parent_menu_foreign` (`parent_menu`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_author_id_foreign` (`author_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tema_pelatihans`
--
ALTER TABLE `tema_pelatihans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tema_pelatihans_slug_unique` (`slug`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_tema_id_foreign` (`tema_id`);

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
-- AUTO_INCREMENT for table `alumni_krcs`
--
ALTER TABLE `alumni_krcs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokumen_kerjasamas`
--
ALTER TABLE `dokumen_kerjasamas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hero_images`
--
ALTER TABLE `hero_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_pelatihans`
--
ALTER TABLE `jadwal_pelatihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_pengajars`
--
ALTER TABLE `kategori_pengajars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kontaks`
--
ALTER TABLE `kontaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materi_pelatihans`
--
ALTER TABLE `materi_pelatihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `media_galleries`
--
ALTER TABLE `media_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengajars`
--
ALTER TABLE `pengajars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profils`
--
ALTER TABLE `profils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tema_pelatihans`
--
ALTER TABLE `tema_pelatihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni_krcs`
--
ALTER TABLE `alumni_krcs`
  ADD CONSTRAINT `alumni_krcs_tema_id_foreign` FOREIGN KEY (`tema_id`) REFERENCES `tema_pelatihans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dokumen_kerjasamas`
--
ALTER TABLE `dokumen_kerjasamas`
  ADD CONSTRAINT `dokumen_kerjasamas_id_kerjasama_foreign` FOREIGN KEY (`id_kerjasama`) REFERENCES `kerja_samas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal_pelatihans`
--
ALTER TABLE `jadwal_pelatihans`
  ADD CONSTRAINT `jadwal_pelatihans_tema_id_foreign` FOREIGN KEY (`tema_id`) REFERENCES `tema_pelatihans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materi_pelatihans`
--
ALTER TABLE `materi_pelatihans`
  ADD CONSTRAINT `materi_pelatihans_tema_id_foreign` FOREIGN KEY (`tema_id`) REFERENCES `tema_pelatihans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengajars`
--
ALTER TABLE `pengajars`
  ADD CONSTRAINT `pengajars_parent_menu_foreign` FOREIGN KEY (`parent_menu`) REFERENCES `kategori_pengajars` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_tema_id_foreign` FOREIGN KEY (`tema_id`) REFERENCES `tema_pelatihans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
