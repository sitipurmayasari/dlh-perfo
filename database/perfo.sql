-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table perfo.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perfo.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table perfo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perfo.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table perfo.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perfo.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table perfo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `bidang_id` int(11) DEFAULT NULL,
  `subbidang_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perfo.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `nip`, `email`, `email_verified_at`, `password`, `role`, `bidang_id`, `subbidang_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'superadmin', '0', 'admin@mail.com', '2022-06-25 14:41:38', '$2y$10$Mkb.LpNKsgUWlrr4cUcn1u861rkICwbAwD.2SdNf5.EWd2ShtteRe', 1, 1, 1, NULL, '2022-06-25 14:41:58', NULL, NULL),
	(2, 'lala1', '001', 'kabid@mail.com', NULL, '$2y$10$AzAghizDE/kqvxdtHVL8sO4tNzdvpofKzhVaJ0OuoeISSAEbT7L2u', 2, 1, NULL, NULL, '2022-07-04 06:31:50', '2022-07-04 06:43:23', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_bidang
CREATE TABLE IF NOT EXISTS `zo_bidang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_bidang: ~5 rows (approximately)
/*!40000 ALTER TABLE `zo_bidang` DISABLE KEYS */;
INSERT INTO `zo_bidang` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Sekertariat', '2022-06-25 10:03:42', '2022-06-25 10:03:43'),
	(2, 'Tata Lingkungan', '2022-06-25 10:03:58', '2022-06-25 10:03:58'),
	(3, 'Pengelolaan Sampah Limbah B3 & Kemitraan', '2022-06-25 10:04:39', '2022-06-25 10:04:40'),
	(4, 'Pengendalian Pencemaran dan Kerusakan Lingkungan Hidup', '2022-06-25 10:05:10', '2022-06-25 10:05:11'),
	(5, 'Penataan dan Peningkatan Kapasitas dan Peraturan LH', '2022-05-25 10:05:35', '2022-06-25 10:05:35');
/*!40000 ALTER TABLE `zo_bidang` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_indicator
CREATE TABLE IF NOT EXISTS `zo_indicator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kinerja_id` int(11) NOT NULL DEFAULT '0',
  `names` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_indicator: ~48 rows (approximately)
/*!40000 ALTER TABLE `zo_indicator` DISABLE KEYS */;
INSERT INTO `zo_indicator` (`id`, `kinerja_id`, `names`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'Persentase titik pantau sungai dengan status memenuhi parameter Indeks Kualitas Air', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(2, 2, 'Persentase dunia usaha yang taat terhadap pengelolaan lingkungan ', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(3, 3, 'Persentase usaha dan/ kegiatan yang menerapkan pengelolaan Limbah B3 sesuai ketentuan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(4, 4, 'Persentase pengelolaan sampah di Kalsel', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(5, 5, 'Persentase peran serta mitra dan masyarakat dalam pelestarian LH', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(6, 6, 'Persentase penurunan Indeks Pencemar Sungai', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(7, 7, 'Persentase lokasi yang dilakukan pemulihan ', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(8, 8, 'Persentase dunia usaha yang menerapkan dokumen lingkungan ', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(9, 9, 'Persentase dunia usaha yang memenuhi kriteria lebih dari yang disyaratkan  ', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(10, 9, 'Persentase Sumber Pencemaran dan/atau kerusakan LH yang diisolasi', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(11, 10, 'Persentase tindak lanjut (penanganan) kasus LH ', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(12, 10, 'Persentase penyelesaian kasus LH yang dilimpahkan pada pihak berwenang ', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(13, 11, 'Persentase pemenuhan komitmen aturan pengumpulan Limbah B3', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(14, 11, 'Persentase ketaatan penghasil, pengangkut, penimbun dan pengolah limbah B3', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(15, 12, 'Persentase Pengurangan sampah rumah tangga dan sampah sejenis rumah Tangga ', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(16, 12, 'Persentase Penanganan sampah rumah tangga dan Sampah sejenis Rumah Tangga ', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(17, 12, 'Persentase penanganan sampah pada kondisi khusus', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(18, 13, 'Presentase dunia usaha yang terlibat dalam kegiatan pelestarian LH', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(19, 13, 'Persentase kampung atau desa yang melakukan adaptasi dan mitigasi perubahan iklim', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(20, 13, 'Persentase sekolah yang berbudaya lingkungan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(21, 13, 'Persentase partisipasi komunitas yang melakukan kegiatan pelestarian lingkungan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(22, 13, 'Persentase peningkatan pelestari lingkungan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(23, 14, 'Persentase kualitas udara dengan kategori baik dan sangat baik   ', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(24, 15, 'Persentase penurunan emisi GRK dari Bussines As Usual ', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(25, 16, 'Persentase titik pantau kualitas udara yang memenuhi baku mutu', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(26, 17, 'Persentase pengurangan emisi sektor GRK di Sektor Energi', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(27, 17, 'Persentase pengurangan emisi sektor GRK di Sektor Tutupan Lahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(28, 18, 'Persentase luas tutupan lahan    ', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(29, 19, 'Persentase luasan lahan terdampak yang dikendalikan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(30, 23, 'Persentase MHA yang diakui terkait dengan PPLH', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(31, 24, 'Nilai Indeks Kualitas Ekosistem Gambut', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(32, 25, 'Persentase Peningkatan keanakearagaman hayati', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(33, 26, 'Persentase Luas Lahan Akses Terbuka yang dipulihkan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(34, 26, 'Persentase luasan Riparian / Sempadan Sungai yang terkelola', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(35, 27, 'Presentase Luasan lahan terganggu yang terkendali', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(36, 28, 'Persentase luasan yang dijamin pengamanan lingkungannya', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(37, 29, 'Persentase Jasa Lingkungan yang ditingkatkan/dipertahankan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(38, 30, 'Persentase luas kawasan MHA yang diusulkan untuk mendapatkan pengakuan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(39, 31, 'Persentase lahan gambut rusak yang direstorasi', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(40, 31, 'Persentase IPG yang berfungsi', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(41, 31, 'Persentase luasan revegetasi lahan gambut', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(42, 32, 'Persentase pelestarian spesies Endemik Kalimantan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(43, 32, 'Persentase pengelolaan keanekaragaman hayati', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(44, 32, 'Persentase penambahan Luas Ruang Terbuka Hijau (RTH) ', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(45, 33, 'Persentase air laut dengan kualitas kategori baik', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(46, 34, 'Persentase pengurangan timbulan sampah di pantai', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(47, 35, 'Persentase jumlah parameter kualitas air laut yang memenuhi baku mutu', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(48, 36, 'Persentase luasan Mangrove kondisi baik', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL);
/*!40000 ALTER TABLE `zo_indicator` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_kinerja
CREATE TABLE IF NOT EXISTS `zo_kinerja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(200) NOT NULL,
  `owned` int(11) DEFAULT NULL COMMENT '1= bidang , 2 subbidang',
  `bidang_id` int(11) DEFAULT NULL,
  `subbidang_id` int(11) DEFAULT NULL,
  `iku` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_kinerja: ~33 rows (approximately)
/*!40000 ALTER TABLE `zo_kinerja` DISABLE KEYS */;
INSERT INTO `zo_kinerja` (`id`, `names`, `owned`, `bidang_id`, `subbidang_id`, `iku`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Meningkatnya status mutu air sungai', 1, 4, NULL, 'Indeks Kualitas Air', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(2, 'Meningkatnya ketaatan dunia usaha dalam tata kelola lingkungan hidup', 1, 5, NULL, 'Indeks Kualitas Air', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(3, 'Meningkatnya pengelolaan limbah B3', 1, 3, NULL, 'Indeks Kualitas Air', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(4, 'Meningkatnya kinerja pengelolaan sampah', 1, 3, NULL, 'Indeks Kualitas Air', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(5, 'Meningkatnya peran serta institusi maupun masyarakat di bidang lingkungan hidup', 1, 3, NULL, 'Indeks Kualitas Air', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(6, 'Meningkatnya Kualitas air sungai yang memenuhi baku mutu', 2, NULL, 10, 'Indeks Kualitas Air', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(7, 'Meningkatnya luasan yang terpulihkan dari kerusakan lingkungan hidup.', 2, NULL, 11, 'Indeks Kualitas Air', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(8, 'Meningkatnya dunia usaha yang menerapkan dokumen lingkungan', 2, NULL, 14, 'Indeks Kualitas Air', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(9, 'Meningkatnya kinerja perusahaan dalam pengelolaan kualitas lingkungan', 2, NULL, 12, 'Indeks Kualitas Air', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(10, 'Meningkatnya penyelesaian terhadap kasus lingkungan hidup.', 2, NULL, 13, 'Indeks Kualitas Air', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(11, 'Meningkatnya  persentase pemenuhan komitmen ijin pengumpulan LB3', 2, NULL, 8, 'Indeks Kualitas Air', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(12, 'Meningkatnya pengurangan dan penanganan sampah', 2, NULL, 7, 'Indeks Kualitas Air', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(13, 'Meningkatnya partisipasi dunia usaha, dunia pendidikan,komunitas dan masyarakat dalam pelestarian LH', 2, NULL, 9, 'Indeks Kualitas Air', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(14, 'Meningkatnya kualitas Udara menjadi kategori Baik dan Sangat Baik', 1, 4, NULL, 'Indeks Kualitas Udara', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(15, 'Menurunkan emisi GRK', 1, 2, NULL, 'Indeks Kualitas Udara', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(16, 'Meningkatnya Kualitas Udara yang memenuhi baku mutu', 2, NULL, 10, 'Indeks Kualitas Udara', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(17, 'Menurunnya Emisi Gas Rumah Kaca (GRK) Sektor Energi dan Tutupan Lahan', 2, NULL, 6, 'Indeks Kualitas Udara', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(18, 'Meningkatnya luasan tutupan lahan', 1, 4, NULL, 'Indeks Kualitas Lahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(19, 'Meningkatnya Pengendalian Terhadap Lahan/Ekoregion yang Terdampak', 1, 2, NULL, 'Indeks Kualitas Lahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(23, 'Meningkatnya pengakuan MHA terkait dengan PPLH', 1, 5, NULL, 'Indeks Kualitas Lahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(24, 'Meningkatnya pengelolaan ekosistem gambut', 1, 4, NULL, 'Indeks Kualitas Lahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(25, 'Meningkatnya pengelolaan Keanekaragaman Hayati (Kehati)', 1, 2, NULL, 'Indeks Kualitas Lahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(26, 'Meningkatnya luasan yang terpulihkan dari kerusakan lingkungan hidup.', 2, NULL, 11, 'Indeks Kualitas Lahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(27, 'Meningkatnya luasan dampak lingkungan yang terkendali', 2, NULL, 5, 'Indeks Kualitas Lahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(28, 'Meningkatnya penjaminan resiko pengamanan lingkungan', 2, NULL, 5, 'Indeks Kualitas Lahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(29, 'Meningkatnya penjaminan Jasa Lingkungan', 2, NULL, 4, 'Indeks Kualitas Lahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(30, 'Meningkatnya MHA yang diusulkan', 2, NULL, 15, 'Indeks Kualitas Lahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(31, 'Meningkatnya restorasi lahan gambut  ', 2, NULL, 11, 'Indeks Kualitas Lahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(32, 'Meningkatnya Keanekaragaman hayati yg dilestarikan', 2, NULL, 6, 'Indeks Kualitas Lahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(33, 'Meningkatnya kualitas air laut di lokasi pantau dengan kategori baik  ', 1, 4, NULL, 'Indeks Kualitas Air Laut', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(34, 'Meningkatnya pengurangan dan penanganan sampah', 2, NULL, 7, 'Indeks Kualitas Air Laut', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(35, 'Meningkatnya jumlah parameter kualitas air laut yang memenuhi baku mutu', 2, NULL, 10, 'Indeks Kualitas Air Laut', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(36, 'Meningkatnya luasan Mangrove Kondisi baik', 2, NULL, 11, 'Indeks Kualitas Air Laut', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL);
/*!40000 ALTER TABLE `zo_kinerja` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_realisasi
CREATE TABLE IF NOT EXISTS `zo_realisasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dates` date NOT NULL,
  `subbidang_id` int(11) NOT NULL,
  `targetsubbid_id` int(11) NOT NULL,
  `years` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `files` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_realisasi: ~0 rows (approximately)
/*!40000 ALTER TABLE `zo_realisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `zo_realisasi` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_realisasi_detail
CREATE TABLE IF NOT EXISTS `zo_realisasi_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `realisasi_id` int(11) DEFAULT NULL,
  `indicator_id` int(11) DEFAULT NULL,
  `capaian_akhir` float DEFAULT '0',
  `target` float DEFAULT '0',
  `real` float DEFAULT '0',
  `capaian` float DEFAULT '0',
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_realisasi_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `zo_realisasi_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `zo_realisasi_detail` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_subbidang
CREATE TABLE IF NOT EXISTS `zo_subbidang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bidang_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table perfo.zo_subbidang: ~14 rows (approximately)
/*!40000 ALTER TABLE `zo_subbidang` DISABLE KEYS */;
INSERT INTO `zo_subbidang` (`id`, `bidang_id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Perencanaan dan Pelaporan', '2022-06-25 10:05:51', '2022-06-25 10:05:52'),
	(2, 1, 'Umum dan Kepegawaian', '2022-06-25 10:06:43', '2022-06-25 10:06:43'),
	(3, 1, 'Keuangan dan Asset', '2022-06-25 10:06:58', '2022-06-25 10:06:58'),
	(4, 2, 'Perencanaan Perlindungan dan Pengolahan LH', '2022-06-25 10:07:33', '2022-06-25 10:07:33'),
	(5, 2, 'Kajian Dampak Lingkungan', '2022-06-25 10:07:51', '2022-06-25 10:07:51'),
	(6, 2, 'Pemeliharaan Lingkungan Hidup', '2022-06-25 10:08:06', '2022-06-25 10:08:07'),
	(7, 3, 'Pengolahan Persampahan', '2022-06-25 10:08:20', '2022-06-25 10:08:20'),
	(8, 3, 'Pengolahan Limbah B3', '2022-06-25 10:08:34', '2022-06-25 10:08:35'),
	(9, 3, 'Kemitraan dan Peran Serta Masyarakat', '2022-06-25 10:08:55', '2022-06-25 10:08:55'),
	(10, 4, 'Pemantauan Lingkungan Hidup', '2022-06-25 10:09:10', '2022-06-25 10:09:10'),
	(11, 4, 'Pemulihan Lingkungan Hidup', '2022-06-25 10:09:33', '2022-06-25 10:09:33'),
	(12, 4, 'Peniliaian Kinerja Pengelolaan Lingkungan Hidup', '2022-06-25 10:10:07', '2022-06-25 10:10:07'),
	(13, 5, 'Pengaduan Kasus Lingkungan Hidup & Penegakan Hukum', '2022-06-25 10:10:47', '2022-06-25 10:10:47'),
	(14, 5, 'Pembinaan dan Pengawasan Lingkungan Hidup', '2022-06-25 10:11:12', '2022-06-25 10:11:12'),
	(15, 5, 'Peningkatan Kapasitas dan Peraturan Lingkungan Hidup', '2022-06-25 10:11:33', '2022-06-25 10:11:33');
/*!40000 ALTER TABLE `zo_subbidang` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_targetbid
CREATE TABLE IF NOT EXISTS `zo_targetbid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dates` date NOT NULL,
  `yearfrom` int(11) NOT NULL,
  `yearto` int(11) NOT NULL,
  `types` varchar(10) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `sk_number` varchar(50) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `bidang_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_targetbid: ~0 rows (approximately)
/*!40000 ALTER TABLE `zo_targetbid` DISABLE KEYS */;
/*!40000 ALTER TABLE `zo_targetbid` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_targetbid_detail
CREATE TABLE IF NOT EXISTS `zo_targetbid_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `targetbid_id` int(11) DEFAULT NULL,
  `indicator_id` int(11) DEFAULT NULL,
  `years` varchar(50) DEFAULT NULL,
  `percentages` float DEFAULT NULL,
  `initiative` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_targetbid_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `zo_targetbid_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `zo_targetbid_detail` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_targetsubbid
CREATE TABLE IF NOT EXISTS `zo_targetsubbid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dates` date NOT NULL,
  `yearfrom` int(11) NOT NULL,
  `yearto` int(11) NOT NULL,
  `types` varchar(10) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `sk_number` varchar(50) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `subbidang_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table perfo.zo_targetsubbid: ~0 rows (approximately)
/*!40000 ALTER TABLE `zo_targetsubbid` DISABLE KEYS */;
/*!40000 ALTER TABLE `zo_targetsubbid` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_targetsubbid_detail
CREATE TABLE IF NOT EXISTS `zo_targetsubbid_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `targetsubbid_id` int(11) DEFAULT NULL,
  `indicator_id` int(11) DEFAULT NULL,
  `years` varchar(50) DEFAULT NULL,
  `percentages` float DEFAULT NULL,
  `initiative` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table perfo.zo_targetsubbid_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `zo_targetsubbid_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `zo_targetsubbid_detail` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_verisubbid
CREATE TABLE IF NOT EXISTS `zo_verisubbid` (
  `id` int(11) NOT NULL,
  `realisasi_id` int(11) DEFAULT NULL,
  `kabid_id` int(11) DEFAULT NULL,
  `kabid_dates` date DEFAULT NULL,
  `verifikasi_kabid` enum('Y','N','R') DEFAULT 'N',
  `catatan_kabid` text,
  `perencana_id` int(11) DEFAULT NULL,
  `perencana_dates` date DEFAULT NULL,
  `validasi_perencana` enum('Y','N','R') DEFAULT 'N',
  `catatan_perencana` text,
  `sekdis_id` int(11) DEFAULT NULL,
  `sekdis_dates` date DEFAULT NULL,
  `verifikasi_sekdis` enum('Y','N','R') DEFAULT 'N',
  `catatan_sekdis` text,
  `kadis_id` int(11) DEFAULT NULL,
  `validasi_kadis` enum('Y','N','R') DEFAULT 'N',
  `kadis_dates` date DEFAULT NULL,
  `catatan_kadis` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_verisubbid: ~0 rows (approximately)
/*!40000 ALTER TABLE `zo_verisubbid` DISABLE KEYS */;
/*!40000 ALTER TABLE `zo_verisubbid` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
