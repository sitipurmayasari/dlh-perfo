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
  `pangkat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perfo.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `nip`, `email`, `email_verified_at`, `password`, `role`, `bidang_id`, `subbidang_id`, `pangkat`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'superadmin', '0', 'admin@mail.com', '2022-06-25 14:41:38', '$2y$10$Mkb.LpNKsgUWlrr4cUcn1u861rkICwbAwD.2SdNf5.EWd2ShtteRe', 1, 1, 1, 'penata', NULL, '2022-06-25 14:41:58', '2022-07-21 15:45:21', NULL),
	(2, 'Kabid TaLing', '0002', 'kabidtaling@mail.com', NULL, '$2y$10$ERdWUaGCR32NcU9QI.eb2.cPX5V3uxK8z/jwwzY9DrtOAFthvfyES', 2, 2, NULL, 'penata', NULL, '2022-07-21 07:46:06', '2022-07-21 07:46:06', NULL),
	(3, 'kasiePPPLH', '000002', 'kasiePPPLH@mail.com', NULL, '$2y$10$GxRUqc0tJBQRJFIgx03lG.PXxrd.z5vNdcoNXyVLEQjlaxkXJSjEm', 3, NULL, 4, 'penata', NULL, '2022-07-21 07:46:39', '2022-07-21 07:46:39', NULL),
	(4, 'Kadis', '0010', 'kadis@mail.com', NULL, '$2y$10$PYzUjUXvDwvtYc.ElznH9ugLjBCCgxQ8BdaFUrq/Ae0H0Nbz1amD.', 4, NULL, NULL, 'penata utama', NULL, '2022-07-21 07:47:29', '2022-07-21 07:47:29', NULL),
	(6, 'sekdis', '00009', 'sekdis@mail.com', NULL, '$2y$10$06EWsY7.pZqiYL7/bPF0v.A6XD0xgcw1rc/s2DdQulZuomH6vDjvC', 5, 1, NULL, 'penata', NULL, '2022-07-21 07:56:46', '2022-07-21 07:56:46', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_indicator: ~55 rows (approximately)
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
	(48, 36, 'Persentase luasan Mangrove kondisi baik', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(49, 37, 'Nilai Akuntabilitas kinerja', '2022-07-08 00:39:13', '2022-07-08 00:39:13', NULL),
	(50, 37, 'Nilai kepuasan pelayanan administrasi perkantoran dan kepegawaian', '2022-07-08 00:39:24', '2022-07-08 00:39:24', NULL),
	(51, 37, 'Persentase hasil temuan APIP/BPK yang ditindaklanjuti', '2022-07-08 00:39:34', '2022-07-08 00:39:34', NULL),
	(52, 38, 'Persentase pencapaian komponen perencanaan yang berkualitas sesuai sistem AKIP', '2022-07-08 00:40:07', '2022-07-08 00:40:07', NULL),
	(53, 39, 'Persentase pencapaian komponen evaluasi dan pelaporan yang berkualitas sesuai sistem AKIP', '2022-07-08 00:40:22', '2022-07-08 00:40:22', NULL),
	(54, 40, 'Persentase penyerapan anggaran yang sesuai dengan ketentuan', '2022-07-08 00:41:07', '2022-07-08 00:41:07', NULL),
	(55, 41, 'Presentase aset yang dikelola sesuai ketentuan', '2022-07-08 00:41:18', '2022-07-08 00:41:18', NULL),
	(56, 42, 'Persentase ASN yang terlayani dalam administrasi perkantoran', '2022-07-08 00:41:31', '2022-07-08 00:41:31', NULL),
	(57, 42, 'Persentase ASN yang terlayani dalam administrasi kepegawaian', '2022-07-08 00:41:43', '2022-07-08 00:41:43', NULL),
	(58, 42, 'Persentase sarana dan prasarana yang berfungsi dengan baik', '2022-07-08 00:41:57', '2022-07-08 00:41:57', NULL),
	(59, 42, 'Persentase dokumentasi pelayanan surat menyurat', '2022-07-08 00:42:06', '2022-07-08 00:42:06', NULL),
	(60, 43, 'Persentase PNS dengan IP ASN tinggi', '2022-07-08 00:42:20', '2022-07-08 00:42:20', NULL),
	(61, 44, 'Indeks Kualitas Lingkungan Hidup', '2022-07-21 01:31:57', '2022-07-21 01:31:57', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_kinerja: ~38 rows (approximately)
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
	(36, 'Meningkatnya luasan Mangrove Kondisi baik', 2, NULL, 11, 'Indeks Kualitas Air Laut', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(37, 'Meningkatnya Akuntabilitas dan Pelayanan pada Dinas LH Prov. Kalsel', 1, 1, NULL, NULL, '2022-07-08 00:36:49', '2022-07-08 00:36:49', NULL),
	(38, 'Meningkatnya kualitas perencanaan program dan kegiatan Dinas LH', 2, NULL, 1, NULL, '2022-07-08 00:37:11', '2022-07-08 00:37:11', NULL),
	(39, 'Meningkatnya kualitas evaluasi dan pelaporan Dinas LH', 2, NULL, 1, NULL, '2022-07-08 00:37:25', '2022-07-08 00:37:25', NULL),
	(40, 'Meningkatnya kualitas pelayanan administrasi keuangan', 2, NULL, 3, NULL, '2022-07-08 00:37:46', '2022-07-08 00:37:46', NULL),
	(41, 'Meningkatnya kualitas pengelolaan aset', 2, NULL, 3, NULL, '2022-07-08 00:38:02', '2022-07-08 00:38:02', NULL),
	(42, 'Meningkatnya pelayanan administrasi perkantoran', 2, NULL, 2, NULL, '2022-07-08 00:38:17', '2022-07-08 00:38:17', NULL),
	(43, 'Meningkatnya kapasitas ASN', 2, NULL, 2, NULL, '2022-07-08 00:38:46', '2022-07-08 00:38:46', NULL),
	(44, 'Menurunnya Pencemaran dan Kerusakan Lingkungan Hidup', 3, NULL, NULL, NULL, '2022-07-21 09:30:06', '2022-07-21 09:30:08', NULL);
/*!40000 ALTER TABLE `zo_kinerja` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_kinerja_skpd
CREATE TABLE IF NOT EXISTS `zo_kinerja_skpd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(200) NOT NULL,
  `skpd_id` int(11) DEFAULT NULL,
  `indicator` varchar(250) DEFAULT NULL,
  `iku` varchar(100) DEFAULT NULL,
  `bobot` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table perfo.zo_kinerja_skpd: ~30 rows (approximately)
/*!40000 ALTER TABLE `zo_kinerja_skpd` DISABLE KEYS */;
INSERT INTO `zo_kinerja_skpd` (`id`, `names`, `skpd_id`, `indicator`, `iku`, `bobot`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Meningkatnya Infrastruktur dasar yang dapat di akses oleh masyarakat', 16, 'cakupan pelayanan air limbah', 'Indeks Kualitas Air', 10, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(2, 'Meningkatkan kualitas kawasan permukiman kumuh yang luasan wilayah kumuhnya antara 10-15 ha', 15, 'Persentase berkurangnya luasan kawasan permukiman kumuh', 'Indeks Kualitas Air', 7, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(3, 'Meningkatnya kapasitas SDM nelayan, pembudidaya ikan, pengolah dan pemasar hasil perikanan untuk memenuhi ketentuan teknis yang dianjurkan', 11, 'Peningkatan SDM pembudidaya ikan yang memahami cara pembudidayaan ikan sesuai ketentuan teknis', 'Indeks Kualitas Air', 7, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(4, 'Meningkatnya Indeks Kualitas Air', 1, 'Nilai peningkatan IKA Kab/Kota', 'Indeks Kualitas Air', 33, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(5, 'Meningkatnya kepatuhan pelaku usaha pertambangan', 14, 'Presentase luas lahan terganggu akibat usaha pertambangan yang di reklamasi dan di Revegatasi', 'Indeks Kualitas Air', 5, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(6, 'Meningkatnya Kelestarian Hutan', 10, 'Tutupan Hutan dan Lahan', 'Indeks Kualitas Air', 5, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(7, 'Meningkatnya status kesehatan masyarakat', 7, 'Cakupan Sanitasi Total Berbasis Masyarakat (STBM)', 'Indeks Kualitas Air', 5, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(8, 'Peningkatan kapasitas kelembagaan dan SDM penyuluhan', 6, 'Persentase peningkatan kelas BPP dan kelas Kelompok Tani', 'Indeks Kualitas Air', 3, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(9, 'Menurunkan emisi GRK', 17, 'Persentase penurunan emisi GRK dari Bussines As Usual ', 'Indeks Kualitas Udara', 0, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(10, 'Meningkatnya Ketahanan Energi', 14, 'Persentase Pemanfaatan Sumber Energi Baru Terbarukan', 'Indeks Kualitas Udara', 0, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(11, 'Pembangunan dan Rehabilitasi Sarana dan Prasarana Perhubungan', 8, 'Meningkatkan Pelayanan Bidang Transportasi ', 'Indeks Kualitas Udara', 0, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(12, 'Meningkatnya kelestarian hutan', 10, 'Tutupan Hutan dan Lahan', 'Indeks Kualitas Udara', 0, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(13, 'Peningkatan kpasitas kelembagaan dan SDM penyuluhan', 6, 'Persentase peningkatan kelas BPP dan kelas Kelompok Tani', 'Indeks Kualitas Udara', 0, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(14, 'Pengawasan dan Pengendalian Pupuk dan Pestisida', 10, 'Jumlah Pupuk, Pestisida, Alsintan dan Sarana Pendukung Perkebunan dan Peternakan yang terawasi', 'Indeks Kualitas Udara', 0, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(15, 'Meningkatnya Infrastruktur Daerah Dasar (Air Minum dan Air Limbah) yang dapat diakses oleh Masyarakat', 16, 'cakupan pelayanan air limbah', 'Indeks Kualitas Udara', 0, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(16, 'Meningkatkan Kualitas Prasarana, Sarana dan Utilitas Perumahan di permukiman', 15, 'Persentase meningkatnya kualitas Prasarana, Sarana dan Utilitas Umum ', 'Indeks Kualitas Udara', 0, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(17, '??Meningkatnya luasan tutupan lahan', 1, '??Luasan Taman Kehati', 'Indeks Kualitas Lahan', 0, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(18, 'Meningkatnya Rehabilitasi Hutan dan Lahan Untuk Perbaikan Lingkungan', 10, 'Persentase luas penanaman Rehabilitasi Hutan dan Lahan serta Rehabilitasi DAS', 'Indeks Kualitas Lahan', 0, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(19, 'Meningkatnya Kepatuhan Pelaku Usaha Pertambangan', 14, 'Persentase Luas Lahan Terganggu Akibat Usaha Pertambangan yang direklamasi dan direvegetasi', 'Indeks Kualitas Lahan', 0, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(20, 'Meningkatnya kualitas infrastruktur ke PU-an dan Tata Ruang', 16, 'Persentase Kesesuaian Tata Ruang', 'Indeks Kualitas Lahan', 0, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(21, 'Meningkatnya konservasi kawasan / rehabilitasi ekosistem', 3, 'Persentase luasan lahan gambut yang difasilitasi restorasi gambut', 'Indeks Kualitas Lahan', 0, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(22, '??Meningkatnya kinerja pengelolaan persampahan', 1, '??Pengelolaan sampah di daerah Pesisir', 'Indeks Kualitas Air Laut', 15, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(23, 'Meningkatnya pengelolaan sumber daya kelautan dan perikanan yang berkelanjutan (Sustainable Fisheries Management) ', 11, 'Peningkatan luas kawasan ekosistem pesisir dan laut kritis yang telah direhabilitasi', 'Indeks Kualitas Air Laut', 20, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(24, 'Meningkatkan Pengembangan Fasilitasi Destinasi Wisata di Provinsi Kalimantan Selatan', 12, 'Persentase Objek Wisata Dengan Fasilitas Pendukung Sesuai Standar Sapta Pesona', 'Indeks Kualitas Air Laut', 15, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(25, 'Melaksanakan pengelolaan sungai, pantai dan drainase', 16, 'Panjang dan jumlah bangunan pengendali banjir dan pengaman pantai yang dibangun dan direhabilitasi', 'Indeks Kualitas Air Laut', 5, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(26, 'Meningkatnya Keamanan dan Kelancaran Transportasi Perairan', 8, 'Persentase Pelabuhan sungai dan danau yang beroperasi sesuai standard', 'Indeks Kualitas Air Laut', 5, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(27, 'Meningkatnya pengawasan terhadap pelabuhan', 6, 'Persentase pengawasan terhadap pelabuhan', 'Indeks Kualitas Air Laut', 5, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(28, 'Peningkatan pembinaan, pengawasan, standarisasi mutu & kualitas benih perkebunan', 13, 'Persentase Pengawasan dan Pengendalian Pupuk dan Pestisida', 'Indeks Kualitas Air Laut', 5, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(29, 'Melaksanakan dan Mengelola Rehabilitasi Hutan dan Lahan di Provinsi Kalsel', 10, 'Persentase penanaman RHL di luar kawasan hutan', 'Indeks Kualitas Air Laut', 15, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(30, 'Pengawasan Terhadap Kepatuhan Usaha Industri', 4, 'Jumlah Pelaku Industri yang Dilaksanakan Pengawasan', 'Indeks Kualitas Air Laut', 5, '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL);
/*!40000 ALTER TABLE `zo_kinerja_skpd` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_realisasi: ~4 rows (approximately)
/*!40000 ALTER TABLE `zo_realisasi` DISABLE KEYS */;
INSERT INTO `zo_realisasi` (`id`, `dates`, `subbidang_id`, `targetsubbid_id`, `years`, `month`, `filename`, `users_id`, `files`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2022-07-21', 4, 1, 2022, 1, 'laporan pengukuran kinerja12022', 1, NULL, '2022-07-21 05:59:33', '2022-07-21 05:59:33', NULL),
	(2, '2022-07-21', 4, 1, 2022, 2, 'laporan pengukuran kinerja12022', 1, NULL, '2022-07-21 05:59:56', '2022-07-21 05:59:56', NULL),
	(3, '2022-07-21', 5, 2, 2022, 1, 'laporan pengukuran kinerja12022', 1, NULL, '2022-07-21 06:00:28', '2022-07-21 06:00:28', NULL),
	(4, '2022-07-21', 5, 2, 2022, 2, 'laporan pengukuran kinerja22022', 1, NULL, '2022-07-21 06:00:54', '2022-07-21 06:00:54', NULL);
/*!40000 ALTER TABLE `zo_realisasi` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_realisasibid
CREATE TABLE IF NOT EXISTS `zo_realisasibid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dates` date NOT NULL,
  `bidang_id` int(11) NOT NULL,
  `targetbid_id` int(11) NOT NULL,
  `years` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `files` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table perfo.zo_realisasibid: ~4 rows (approximately)
/*!40000 ALTER TABLE `zo_realisasibid` DISABLE KEYS */;
INSERT INTO `zo_realisasibid` (`id`, `dates`, `bidang_id`, `targetbid_id`, `years`, `month`, `filename`, `users_id`, `files`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2022-07-21', 2, 1, 2022, 1, 'laporan pengukuran kinerja12022', 1, NULL, '2022-07-21 05:42:56', '2022-07-21 05:42:56', NULL),
	(2, '2022-07-21', 2, 1, 2022, 2, 'laporan pengukuran kinerja12022', 1, NULL, '2022-07-21 05:55:42', '2022-07-21 05:55:42', NULL),
	(3, '2022-07-21', 2, 1, 2022, 3, 'laporan pengukuran kinerja32022', 1, NULL, '2022-07-21 05:56:43', '2022-07-21 05:56:43', NULL),
	(4, '2022-07-21', 3, 2, 2022, 1, 'laporan pengukuran kinerja12022', 1, NULL, '2022-07-21 05:57:28', '2022-07-21 05:57:28', NULL),
	(5, '2022-07-21', 3, 2, 2022, 2, 'laporan pengukuran kinerja22022', 1, NULL, '2022-07-21 05:57:59', '2022-07-21 05:57:59', NULL);
/*!40000 ALTER TABLE `zo_realisasibid` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_realisasibid_detail
CREATE TABLE IF NOT EXISTS `zo_realisasibid_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `realisasibid_id` int(11) DEFAULT NULL,
  `indicator_id` int(11) DEFAULT NULL,
  `capaian_akhir` float DEFAULT '0',
  `target` float DEFAULT '0',
  `real` float DEFAULT '0',
  `capaian` float DEFAULT '0',
  `target_akhir` float DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table perfo.zo_realisasibid_detail: ~14 rows (approximately)
/*!40000 ALTER TABLE `zo_realisasibid_detail` DISABLE KEYS */;
INSERT INTO `zo_realisasibid_detail` (`id`, `realisasibid_id`, `indicator_id`, `capaian_akhir`, `target`, `real`, `capaian`, `target_akhir`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 1, 24, 20, 20, 100, 20, 50, '-', '2022-07-21 05:43:34', '2022-07-21 05:55:15'),
	(2, 1, 29, 20, 20, 100, 20, 50, '-', '2022-07-21 05:43:34', '2022-07-21 05:55:15'),
	(3, 1, 32, 20, 20, 100, 20, 50, '--', '2022-07-21 05:43:34', '2022-07-21 05:55:15'),
	(4, 2, 24, 40, 20, 100, 40, 50, '-', '2022-07-21 05:56:15', '2022-07-21 05:56:15'),
	(5, 2, 29, 40, 20, 100, 40, 50, '-', '2022-07-21 05:56:15', '2022-07-21 05:56:15'),
	(6, 2, 32, 40, 20, 100, 40, 50, '-', '2022-07-21 05:56:15', '2022-07-21 05:56:15'),
	(7, 3, 24, 42, 20, 70, 42, 50, '-', '2022-07-21 05:57:15', '2022-07-21 05:57:15'),
	(8, 3, 29, 44, 20, 72, 44, 50, '-', '2022-07-21 05:57:15', '2022-07-21 05:57:15'),
	(9, 3, 32, 42, 20, 70, 42, 50, '-', '2022-07-21 05:57:15', '2022-07-21 05:57:15'),
	(10, 4, 3, 10, 40, 90, 10, 70, '-', '2022-07-21 05:57:51', '2022-07-21 05:57:51'),
	(11, 4, 4, 10, 40, 90, 10, 70, '-', '2022-07-21 05:57:51', '2022-07-21 05:57:51'),
	(12, 4, 5, 10, 40, 90, 10, 70, '-', '2022-07-21 05:57:51', '2022-07-21 05:57:51'),
	(13, 5, 3, 13, 40, 80, 13, 70, '-', '2022-07-21 05:58:32', '2022-07-21 05:58:32'),
	(14, 5, 4, 13, 40, 80, 13, 70, '-', '2022-07-21 05:58:32', '2022-07-21 05:58:32'),
	(15, 5, 5, 13, 40, 80, 13, 70, '-', '2022-07-21 05:58:32', '2022-07-21 05:58:32');
/*!40000 ALTER TABLE `zo_realisasibid_detail` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_realisasikadis
CREATE TABLE IF NOT EXISTS `zo_realisasikadis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dates` date NOT NULL,
  `targetkadis_id` int(11) NOT NULL,
  `years` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `files` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table perfo.zo_realisasikadis: ~0 rows (approximately)
/*!40000 ALTER TABLE `zo_realisasikadis` DISABLE KEYS */;
INSERT INTO `zo_realisasikadis` (`id`, `dates`, `targetkadis_id`, `years`, `month`, `filename`, `users_id`, `files`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2022-07-21', 1, 2022, 7, 'laporan pengukuran kinerja kadis72022', 1, NULL, '2022-07-21 02:20:42', '2022-07-21 02:20:42', NULL);
/*!40000 ALTER TABLE `zo_realisasikadis` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_realisasikadis_detail
CREATE TABLE IF NOT EXISTS `zo_realisasikadis_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `realisasikadis_id` int(11) DEFAULT NULL,
  `indicator_id` int(11) DEFAULT NULL,
  `capaian_akhir` float DEFAULT '0',
  `target` float DEFAULT '0',
  `real` float DEFAULT '0',
  `capaian` float DEFAULT '0',
  `target_akhir` float DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table perfo.zo_realisasikadis_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `zo_realisasikadis_detail` DISABLE KEYS */;
INSERT INTO `zo_realisasikadis_detail` (`id`, `realisasikadis_id`, `indicator_id`, `capaian_akhir`, `target`, `real`, `capaian`, `target_akhir`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 1, 61, 60, 70.58, 60, 60, 90, 'll', '2022-07-21 04:00:29', '2022-07-21 05:28:58');
/*!40000 ALTER TABLE `zo_realisasikadis_detail` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_realisasiskpd
CREATE TABLE IF NOT EXISTS `zo_realisasiskpd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dates` date NOT NULL,
  `skpd_id` int(11) NOT NULL,
  `years` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table perfo.zo_realisasiskpd: ~0 rows (approximately)
/*!40000 ALTER TABLE `zo_realisasiskpd` DISABLE KEYS */;
INSERT INTO `zo_realisasiskpd` (`id`, `dates`, `skpd_id`, `years`, `month`, `filename`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2022-07-21', 4, 2022, 1, 'laporan pengukuran kinerja SKPD12022', '2022-07-21 06:04:41', '2022-07-21 06:04:41', NULL);
/*!40000 ALTER TABLE `zo_realisasiskpd` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_realisasiskpd_detail
CREATE TABLE IF NOT EXISTS `zo_realisasiskpd_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `realisasiskpd_id` int(11) DEFAULT NULL,
  `kinerja_skpd_id` int(11) DEFAULT NULL,
  `target` float DEFAULT '0',
  `real` float DEFAULT '0',
  `capaian` float DEFAULT '0',
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table perfo.zo_realisasiskpd_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `zo_realisasiskpd_detail` DISABLE KEYS */;
INSERT INTO `zo_realisasiskpd_detail` (`id`, `realisasiskpd_id`, `kinerja_skpd_id`, `target`, `real`, `capaian`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 1, 30, 0.28, 90, 90, '-', '2022-07-21 06:06:02', '2022-07-21 06:06:02');
/*!40000 ALTER TABLE `zo_realisasiskpd_detail` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_realisasi_detail
CREATE TABLE IF NOT EXISTS `zo_realisasi_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `realisasi_id` int(11) DEFAULT NULL,
  `indicator_id` int(11) DEFAULT NULL,
  `capaian_akhir` float DEFAULT '0',
  `target` float DEFAULT '0',
  `real` float DEFAULT '0',
  `capaian` float DEFAULT '0',
  `target_akhir` float DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_realisasi_detail: ~6 rows (approximately)
/*!40000 ALTER TABLE `zo_realisasi_detail` DISABLE KEYS */;
INSERT INTO `zo_realisasi_detail` (`id`, `realisasi_id`, `indicator_id`, `capaian_akhir`, `target`, `real`, `capaian`, `target_akhir`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 1, 37, 10, 70, 10, 10, 100, '-', '2022-07-21 05:59:46', '2022-07-21 05:59:46'),
	(2, 2, 37, 15, 70, 15, 15, 100, '-', '2022-07-21 06:00:07', '2022-07-21 06:00:07'),
	(3, 3, 35, 10, 75, 100, 10, 100, '-', '2022-07-21 06:00:45', '2022-07-21 06:00:45'),
	(4, 3, 36, 10, 75, 100, 10, 100, '-', '2022-07-21 06:00:45', '2022-07-21 06:00:45'),
	(5, 4, 35, 15, 75, 100, 15, 100, '-', '2022-07-21 06:01:13', '2022-07-21 06:03:32'),
	(6, 4, 36, 15, 75, 100, 15, 100, '--', '2022-07-21 06:01:13', '2022-07-21 06:03:32');
/*!40000 ALTER TABLE `zo_realisasi_detail` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_skpd
CREATE TABLE IF NOT EXISTS `zo_skpd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `t2021` float DEFAULT '0',
  `t2022` float DEFAULT '0',
  `t2023` float DEFAULT '0',
  `t2024` float DEFAULT '0',
  `t2025` float DEFAULT '0',
  `t2026` float DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_skpd: ~16 rows (approximately)
/*!40000 ALTER TABLE `zo_skpd` DISABLE KEYS */;
INSERT INTO `zo_skpd` (`id`, `name`, `t2021`, `t2022`, `t2023`, `t2024`, `t2025`, `t2026`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'DLH Kabupaten', 0, 0, 0, 0, 0, 0, '2022-07-11 18:56:07', '2022-07-11 18:56:08', NULL),
	(2, 'BPBD', 0, 0, 0, 0, 0, 0, '2022-07-11 15:52:59', '2022-07-11 15:52:59', NULL),
	(3, 'BRG/TPRG', 0, 0, 0, 0, 0, 0, '2022-07-11 15:52:59', '2022-07-11 15:52:59', NULL),
	(4, 'Dinas Perindustrian', 0, 0, 0, 0, 0, 0, '2022-07-11 15:52:59', '2022-07-11 15:52:59', NULL),
	(5, 'DINAS PMD', 0, 0, 0, 0, 0, 0, '2022-07-11 15:52:59', '2022-07-11 15:52:59', NULL),
	(6, 'DINAS TPH', 0, 0, 0, 0, 0, 0, '2022-07-11 15:52:59', '2022-07-11 15:52:59', NULL),
	(7, 'DINKES', 0, 0, 0, 0, 0, 0, '2022-07-11 15:52:59', '2022-07-11 15:52:59', NULL),
	(8, 'DISHUB', 0, 0, 0, 0, 0, 0, '2022-07-11 15:52:59', '2022-07-11 15:52:59', NULL),
	(10, 'DISHUT', 0, 0, 0, 0, 0, 0, '2022-07-11 15:52:59', '2022-07-11 15:52:59', NULL),
	(11, 'DISLUTKAN', 0, 0, 0, 0, 0, 0, '2022-07-11 15:52:59', '2022-07-11 15:52:59', NULL),
	(12, 'DISPAR', 0, 0, 0, 0, 0, 0, '2022-07-11 15:52:59', '2022-07-11 15:52:59', NULL),
	(13, 'DSIBUNAK', 0, 0, 0, 0, 0, 0, '2022-07-11 15:52:59', '2022-07-11 15:52:59', NULL),
	(14, 'ESDM', 0, 0, 0, 0, 0, 0, '2022-07-11 15:52:59', '2022-07-11 15:52:59', NULL),
	(15, 'PERKIM', 0, 0, 0, 0, 0, 0, '2022-07-11 15:52:59', '2022-07-11 15:52:59', NULL),
	(16, 'PUPR', 0, 0, 0, 0, 0, 0, '2022-07-11 15:52:59', '2022-07-11 15:52:59', NULL),
	(17, 'DLH PROVINSI', 0, 0, 0, 0, 0, 0, '2022-07-11 15:52:59', '2022-07-11 15:52:59', NULL);
/*!40000 ALTER TABLE `zo_skpd` ENABLE KEYS */;

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
  `users_id` int(11) DEFAULT NULL,
  `bidang_id` int(11) DEFAULT NULL,
  `sk_number` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_targetbid: ~2 rows (approximately)
/*!40000 ALTER TABLE `zo_targetbid` DISABLE KEYS */;
INSERT INTO `zo_targetbid` (`id`, `dates`, `yearfrom`, `yearto`, `types`, `filename`, `users_id`, `bidang_id`, `sk_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2022-07-21', 2021, 2025, 'AWAL', 'ffd', 1, 2, NULL, '2022-07-21 05:35:09', '2022-07-21 05:35:09', NULL),
	(2, '2022-07-21', 2021, 2025, 'AWAL', 'test', 1, 3, NULL, '2022-07-21 05:36:04', '2022-07-21 05:36:04', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_targetbid_detail: ~30 rows (approximately)
/*!40000 ALTER TABLE `zo_targetbid_detail` DISABLE KEYS */;
INSERT INTO `zo_targetbid_detail` (`id`, `targetbid_id`, `indicator_id`, `years`, `percentages`, `initiative`, `created_at`, `updated_at`) VALUES
	(1, 1, 24, '2021', 10, '-', '2022-07-21 05:35:51', '2022-07-21 05:35:51'),
	(2, 1, 29, '2021', 10, '-', '2022-07-21 05:35:51', '2022-07-21 05:35:51'),
	(3, 1, 32, '2021', 10, '-', '2022-07-21 05:35:51', '2022-07-21 05:35:51'),
	(4, 1, 24, '2022', 20, '-', '2022-07-21 05:35:51', '2022-07-21 05:35:51'),
	(5, 1, 29, '2022', 20, '-', '2022-07-21 05:35:51', '2022-07-21 05:35:51'),
	(6, 1, 32, '2022', 20, '-', '2022-07-21 05:35:51', '2022-07-21 05:35:51'),
	(7, 1, 24, '2023', 30, '-', '2022-07-21 05:35:51', '2022-07-21 05:35:51'),
	(8, 1, 29, '2023', 30, '-', '2022-07-21 05:35:51', '2022-07-21 05:35:51'),
	(9, 1, 32, '2023', 30, '-', '2022-07-21 05:35:51', '2022-07-21 05:35:51'),
	(10, 1, 24, '2024', 40, '-', '2022-07-21 05:35:51', '2022-07-21 05:35:51'),
	(11, 1, 29, '2024', 40, '-', '2022-07-21 05:35:51', '2022-07-21 05:35:51'),
	(12, 1, 32, '2024', 40, '-', '2022-07-21 05:35:51', '2022-07-21 05:35:51'),
	(13, 1, 24, '2025', 50, '-', '2022-07-21 05:35:51', '2022-07-21 05:35:51'),
	(14, 1, 29, '2025', 50, '-', '2022-07-21 05:35:51', '2022-07-21 05:35:51'),
	(15, 1, 32, '2025', 50, '-', '2022-07-21 05:35:51', '2022-07-21 05:35:51'),
	(16, 2, 3, '2021', 30, '-', '2022-07-21 05:36:44', '2022-07-21 05:40:21'),
	(17, 2, 4, '2021', 30, '-', '2022-07-21 05:36:44', '2022-07-21 05:40:21'),
	(18, 2, 5, '2021', 30, '-', '2022-07-21 05:36:44', '2022-07-21 05:40:21'),
	(19, 2, 3, '2022', 40, '-', '2022-07-21 05:36:44', '2022-07-21 05:40:21'),
	(20, 2, 4, '2022', 40, '-', '2022-07-21 05:36:44', '2022-07-21 05:40:21'),
	(21, 2, 5, '2022', 40, '-', '2022-07-21 05:36:44', '2022-07-21 05:40:21'),
	(22, 2, 3, '2023', 50, '-', '2022-07-21 05:36:44', '2022-07-21 05:40:21'),
	(23, 2, 4, '2023', 50, '-', '2022-07-21 05:36:44', '2022-07-21 05:40:21'),
	(24, 2, 5, '2023', 50, '-', '2022-07-21 05:36:44', '2022-07-21 05:40:21'),
	(25, 2, 3, '2024', 60, '-', '2022-07-21 05:36:44', '2022-07-21 05:40:21'),
	(26, 2, 4, '2024', 60, '-', '2022-07-21 05:36:44', '2022-07-21 05:40:21'),
	(27, 2, 5, '2024', 60, '-', '2022-07-21 05:36:44', '2022-07-21 05:40:21'),
	(28, 2, 3, '2025', 70, '-', '2022-07-21 05:36:44', '2022-07-21 05:40:21'),
	(29, 2, 4, '2025', 70, '-', '2022-07-21 05:36:44', '2022-07-21 05:40:21'),
	(30, 2, 5, '2025', 70, '--', '2022-07-21 05:36:44', '2022-07-21 05:40:21');
/*!40000 ALTER TABLE `zo_targetbid_detail` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_targetkadis
CREATE TABLE IF NOT EXISTS `zo_targetkadis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dates` date NOT NULL,
  `yearfrom` int(11) NOT NULL,
  `yearto` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table perfo.zo_targetkadis: ~0 rows (approximately)
/*!40000 ALTER TABLE `zo_targetkadis` DISABLE KEYS */;
INSERT INTO `zo_targetkadis` (`id`, `dates`, `yearfrom`, `yearto`, `filename`, `users_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2022-07-21', 2021, 2026, 'renstra', 1, '2022-07-21 01:28:03', '2022-07-21 01:28:03', NULL);
/*!40000 ALTER TABLE `zo_targetkadis` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_targetkadis_detail
CREATE TABLE IF NOT EXISTS `zo_targetkadis_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `targetkadis_id` int(11) DEFAULT NULL,
  `indicator_id` int(11) DEFAULT NULL,
  `years` varchar(50) DEFAULT NULL,
  `percentages` float DEFAULT NULL,
  `initiative` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table perfo.zo_targetkadis_detail: ~6 rows (approximately)
/*!40000 ALTER TABLE `zo_targetkadis_detail` DISABLE KEYS */;
INSERT INTO `zo_targetkadis_detail` (`id`, `targetkadis_id`, `indicator_id`, `years`, `percentages`, `initiative`, `created_at`, `updated_at`) VALUES
	(1, 1, 61, '2021', 69, 'Indeks Kualitas Lingkungan Hidup dapat dilakukan perhitungan Ketika semua data pemantauan kualitas air, kulitas udara, kualitas Lahan dan    Kualitas air laut  sudah didapatkan', '2022-07-21 01:34:30', '2022-07-21 01:38:57'),
	(2, 1, 61, '2022', 70.58, 'Indeks Kualitas Lingkungan Hidup dapat dilakukan perhitungan Ketika semua data pemantauan kualitas air, kulitas udara, kualitas Lahan dan    Kualitas air laut  sudah didapatkan', '2022-07-21 01:34:30', '2022-07-21 01:38:57'),
	(3, 1, 61, '2023', 80.55, 'Indeks Kualitas Lingkungan Hidup dapat dilakukan perhitungan Ketika semua data pemantauan kualitas air, kulitas udara, kualitas Lahan dan    Kualitas air laut  sudah didapatkan', '2022-07-21 01:34:30', '2022-07-21 01:38:57'),
	(4, 1, 61, '2024', 80.55, 'Indeks Kualitas Lingkungan Hidup dapat dilakukan perhitungan Ketika semua data pemantauan kualitas air, kulitas udara, kualitas Lahan dan    Kualitas air laut  sudah didapatkan', '2022-07-21 01:34:30', '2022-07-21 01:38:57'),
	(5, 1, 61, '2025', 90, 'Indeks Kualitas Lingkungan Hidup dapat dilakukan perhitungan Ketika semua data pemantauan kualitas air, kulitas udara, kualitas Lahan dan    Kualitas air laut  sudah didapatkan', '2022-07-21 01:34:30', '2022-07-21 01:38:57'),
	(6, 1, 61, '2026', 90, 'Indeks Kualitas Lingkungan Hidup dapat dilakukan perhitungan Ketika semua data pemantauan kualitas air, kulitas udara, kualitas Lahan dan    Kualitas air laut  sudah didapatkan', '2022-07-21 01:34:30', '2022-07-21 01:38:57');
/*!40000 ALTER TABLE `zo_targetkadis_detail` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_targetsubbid
CREATE TABLE IF NOT EXISTS `zo_targetsubbid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dates` date NOT NULL,
  `yearfrom` int(11) NOT NULL,
  `yearto` int(11) NOT NULL,
  `types` varchar(10) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `subbidang_id` int(11) DEFAULT NULL,
  `sk_number` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table perfo.zo_targetsubbid: ~2 rows (approximately)
/*!40000 ALTER TABLE `zo_targetsubbid` DISABLE KEYS */;
INSERT INTO `zo_targetsubbid` (`id`, `dates`, `yearfrom`, `yearto`, `types`, `filename`, `users_id`, `subbidang_id`, `sk_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2022-07-21', 2021, 2025, 'AWAL', 'one', 1, 4, NULL, '2022-07-21 05:38:54', '2022-07-21 05:38:54', NULL),
	(2, '2022-07-21', 2021, 2026, 'AWAL', 'two', 1, 5, NULL, '2022-07-21 05:42:07', '2022-07-21 05:42:07', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table perfo.zo_targetsubbid_detail: ~17 rows (approximately)
/*!40000 ALTER TABLE `zo_targetsubbid_detail` DISABLE KEYS */;
INSERT INTO `zo_targetsubbid_detail` (`id`, `targetsubbid_id`, `indicator_id`, `years`, `percentages`, `initiative`, `created_at`, `updated_at`) VALUES
	(1, 1, 37, '2021', 60, '-', '2022-07-21 05:40:09', '2022-07-21 05:41:44'),
	(2, 1, 37, '2022', 70, '-', '2022-07-21 05:40:09', '2022-07-21 05:41:44'),
	(3, 1, 37, '2023', 80, '-', '2022-07-21 05:40:09', '2022-07-21 05:41:44'),
	(4, 1, 37, '2024', 90, '-', '2022-07-21 05:40:09', '2022-07-21 05:41:44'),
	(5, 1, 37, '2025', 100, '--', '2022-07-21 05:40:09', '2022-07-21 05:41:44'),
	(6, 2, 35, '2021', 70, '-', '2022-07-21 05:42:36', '2022-07-21 05:42:36'),
	(7, 2, 36, '2021', 70, '-', '2022-07-21 05:42:36', '2022-07-21 05:42:36'),
	(8, 2, 35, '2022', 75, '-', '2022-07-21 05:42:36', '2022-07-21 05:42:36'),
	(9, 2, 36, '2022', 75, '-', '2022-07-21 05:42:36', '2022-07-21 05:42:36'),
	(10, 2, 35, '2023', 80, '-', '2022-07-21 05:42:36', '2022-07-21 05:42:36'),
	(11, 2, 36, '2023', 80, '-', '2022-07-21 05:42:36', '2022-07-21 05:42:36'),
	(12, 2, 35, '2024', 90, '-', '2022-07-21 05:42:36', '2022-07-21 05:42:36'),
	(13, 2, 36, '2024', 90, '-', '2022-07-21 05:42:36', '2022-07-21 05:42:36'),
	(14, 2, 35, '2025', 95, '-', '2022-07-21 05:42:36', '2022-07-21 05:42:36'),
	(15, 2, 36, '2025', 95, '-', '2022-07-21 05:42:36', '2022-07-21 05:42:36'),
	(16, 2, 35, '2026', 100, '-', '2022-07-21 05:42:36', '2022-07-21 05:42:36'),
	(17, 2, 36, '2026', 100, '-', '2022-07-21 05:42:36', '2022-07-21 05:42:36');
/*!40000 ALTER TABLE `zo_targetsubbid_detail` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_target_skpd
CREATE TABLE IF NOT EXISTS `zo_target_skpd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kinerja_skpd_id` int(11) DEFAULT NULL,
  `years` int(11) DEFAULT NULL,
  `percentages` double DEFAULT NULL,
  `initiative` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_target_skpd: ~120 rows (approximately)
/*!40000 ALTER TABLE `zo_target_skpd` DISABLE KEYS */;
INSERT INTO `zo_target_skpd` (`id`, `kinerja_skpd_id`, `years`, `percentages`, `initiative`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 2021, 0.42, 'Pengelolaan dan Pengembangan SPAL', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(2, 2, 2021, 0.3, 'Pembangunan/ rehabilitasi infrastruktur permukiman baik skala lingkungan maupun skala kawasan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(3, 3, 2021, 0.3, 'Penyuluhan tentang Kelestarian Sumberdaya Kelautan dan Perikanan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(4, 4, 2021, 1.4, 'Pencegahan pencemaran dan pemulihan IKA', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(5, 5, 2021, 0.21, 'Pengawasan Teknis kaidah Pertambangan yang baik', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(6, 6, 2021, 0.21, 'Pelaksanaan Pengelolaan DAS Lintas Daerah Kabupaten/Kota dan dalam Daerah Kab/Kota dalam 1 (Satu) Daerah Provinsi', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(7, 7, 2021, 0.21, 'Penyelenggaraan Promosi Kesehatan dan Perilaku Hidup Bersih dan Sehat', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(8, 8, 2021, 0.13, 'Peningkatan kompetensi terhadap penyuluh dan Penyuluhan terhadap kelompok tani', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(9, 9, 2021, 16.5, 'RAD GRK, Inventarisasi GRK, Restorasi Gambut, Pengelolaan persampahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(10, 10, 2021, 14.7, 'Konversi penggunaan energi, Pengurangan penggunaan bahan bakar fosil', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(11, 11, 2021, 14.7, 'Efisiensi pemakaian bahan bakar untuk transportasi pengaturan alur transportasi darat', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(12, 12, 2021, 28.1, 'Gerakan Revolusi Hijau', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(13, 13, 2021, 14.9, 'Pengembangan budidaya padi sawah rendah emisi', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(14, 14, 2021, 14.9, 'pembinaan dan sosialisasi penggunaan pupuk, pengembangan peternakan rendah metan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(15, 15, 2021, 11.4, 'Pengembangan IPAL', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(16, 16, 2021, 11.4, 'Pengembangan sarpras limbah dan persampahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(17, 17, 2021, 0, 'Pengelolaan Kehati', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(18, 18, 2021, 81932.74, 'Gerakan Revolusi hijau', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(19, 19, 2021, 2365.41, 'Pengawasan Teknis kaidah Pertambangan yang baik', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(20, 20, 2021, 0, 'Pengelolaan RTH', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(21, 21, 2021, 0, 'Legalisasi RPPEG, Pembangunan IPG, Rehabilitasi dan Revegetasi, serta Revitalisasi Masyarakat di lokasi gambut', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(22, 22, 2021, 0.68, 'Pembinaan terhadap pengelolaan sampah di pesisir', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(23, 23, 2021, 0.9, 'rehabilitasi ekosistem pesisir yang kritis, misalnya penanaman mangrove', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(24, 24, 2021, 0.68, 'Melengkapi sarpras daerah wisata untuk mendukung saptapesona. Membina Pokdarwis', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(25, 25, 2021, 0.23, 'Pembangunan bangunan pengendali banjir/ pengaman pantai', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(26, 26, 2021, 0.23, 'Pengawasan terhadap operasional pada pelabuhan sungai dan danau', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(27, 27, 2021, 0.23, 'Pengawasan terhadap operasional pada pelabuhan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(28, 28, 2021, 0.23, 'Pengawasan Sebaran Pupuk, Pestisida, dan Sarana Pendukung Perkebunan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(29, 29, 2021, 0.68, 'Melaksanakan dan monitoring kegiatan RHL', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(30, 30, 2021, 0.23, 'Koordinasi dan Sinkronisasi Pengawasan Perizinan di Bidang Industri dalam Lingkup IUI, IPUI, IUKI, dan IPKI', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(31, 1, 2022, 0.43, 'Pengelolaan dan Pengembangan SPAL', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(32, 2, 2022, 0.3, 'Pembangunan/ rehabilitasi infrastruktur permukiman baik skala lingkungan maupun skala kawasan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(33, 3, 2022, 0.3, 'Penyuluhan tentang Kelestarian Sumberdaya Kelautan dan Perikanan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(34, 4, 2022, 1.42, 'Pencegahan pencemaran dan pemulihan IKA', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(35, 5, 2022, 0.22, 'Pengawasan Teknis kaidah Pertambangan yang baik', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(36, 6, 2022, 0.22, 'Pelaksanaan Pengelolaan DAS Lintas Daerah Kabupaten/Kota dan dalam Daerah Kab/Kota dalam 1 (Satu) Daerah Provinsi', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(37, 7, 2022, 0.22, 'Penyelenggaraan Promosi Kesehatan dan Perilaku Hidup Bersih dan Sehat', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(38, 8, 2022, 0.13, 'Peningkatan kompetensi terhadap penyuluh dan Penyuluhan terhadap kelompok tani', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(39, 9, 2022, 18, 'RAD GRK, Inventarisasi GRK, Restorasi Gambut, Pengelolaan persampahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(40, 10, 2022, 17.1, 'Konversi penggunaan energi, Pengurangan penggunaan bahan bakar fosil', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(41, 11, 2022, 17.1, 'Efisiensi pemakaian bahan bakar untuk transportasi pengaturan alur transportasi darat', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(42, 12, 2022, 32.5, 'Gerakan Revolusi Hijau', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(43, 13, 2022, 16.4, 'Pengembangan budidaya padi sawah rendah emisi', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(44, 14, 2022, 16.4, 'pembinaan dan sosialisasi penggunaan pupuk, pengembangan peternakan rendah metan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(45, 15, 2022, 15.8, 'Pengembangan IPAL', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(46, 16, 2022, 15.8, 'Pengembangan sarpras limbah dan persampahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(47, 17, 2022, 10, 'Pengelolaan Kehati', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(48, 18, 2022, 17555.66, 'Gerakan Revolusi hijau', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(49, 19, 2022, 17555.66, 'Pengawasan Teknis kaidah Pertambangan yang baik', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(50, 20, 2022, 10000, 'Pengelolaan RTH', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(51, 21, 2022, 0, 'Legalisasi RPPEG, Pembangunan IPG, Rehabilitasi dan Revegetasi, serta Revitalisasi Masyarakat di lokasi gambut', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(52, 22, 2022, 0.57, 'Pembinaan terhadap pengelolaan sampah di pesisir', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(53, 23, 2022, 1.13, 'rehabilitasi ekosistem pesisir yang kritis, misalnya penanaman mangrove', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(54, 24, 2022, 0.85, 'Melengkapi sarpras daerah wisata untuk mendukung saptapesona. Membina Pokdarwis', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(55, 25, 2022, 0.28, 'Pembangunan bangunan pengendali banjir/ pengaman pantai', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(56, 26, 2022, 0.28, 'Pengawasan terhadap operasional pada pelabuhan sungai dan danau', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(57, 27, 2022, 0.28, 'Pengawasan terhadap operasional pada pelabuhan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(58, 28, 2022, 0.57, 'Pengawasan Sebaran Pupuk, Pestisida, dan Sarana Pendukung Perkebunan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(59, 29, 2022, 0.85, 'Melaksanakan dan monitoring kegiatan RHL', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(60, 30, 2022, 0.28, 'Koordinasi dan Sinkronisasi Pengawasan Perizinan di Bidang Industri dalam Lingkup IUI, IPUI, IUKI, dan IPKI', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(61, 1, 2023, 0.44, 'Pengelolaan dan Pengembangan SPAL', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(62, 2, 2023, 0.31, 'Pembangunan/ rehabilitasi infrastruktur permukiman baik skala lingkungan maupun skala kawasan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(63, 3, 2023, 0.31, 'Penyuluhan tentang Kelestarian Sumberdaya Kelautan dan Perikanan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(64, 4, 2023, 1.44, 'Pencegahan pencemaran dan pemulihan IKA', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(65, 5, 2023, 0.22, 'Pengawasan Teknis kaidah Pertambangan yang baik', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(66, 6, 2023, 0.22, 'Pelaksanaan Pengelolaan DAS Lintas Daerah Kabupaten/Kota dan dalam Daerah Kab/Kota dalam 1 (Satu) Daerah Provinsi', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(67, 7, 2023, 0.22, 'Penyelenggaraan Promosi Kesehatan dan Perilaku Hidup Bersih dan Sehat', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(68, 8, 2023, 0.13, 'Peningkatan kompetensi terhadap penyuluh dan Penyuluhan terhadap kelompok tani', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(69, 9, 2023, 20.6, 'RAD GRK, Inventarisasi GRK, Restorasi Gambut, Pengelolaan persampahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(70, 10, 2023, 19.4, 'Konversi penggunaan energi, Pengurangan penggunaan bahan bakar fosil', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(71, 11, 2023, 19.4, 'Efisiensi pemakaian bahan bakar untuk transportasi pengaturan alur transportasi darat', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(72, 12, 2023, 37.9, 'Gerakan Revolusi Hijau', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(73, 13, 2023, 17.9, 'Pengembangan budidaya padi sawah rendah emisi', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(74, 14, 2023, 17.9, 'pembinaan dan sosialisasi penggunaan pupuk, pengembangan peternakan rendah metan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(75, 15, 2023, 20.5, 'Pengembangan IPAL', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(76, 16, 2023, 20.5, 'Pengembangan sarpras limbah dan persampahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(77, 17, 2023, 15, 'Pengelolaan Kehati', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(78, 18, 2023, 86593.34, 'Gerakan Revolusi hijau', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(79, 19, 2023, 155.66, 'Pengawasan Teknis kaidah Pertambangan yang baik', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(80, 20, 2023, 6700, 'Pengelolaan RTH', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(81, 21, 2023, 0, 'Legalisasi RPPEG, Pembangunan IPG, Rehabilitasi dan Revegetasi, serta Revitalisasi Masyarakat di lokasi gambut', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(82, 22, 2023, 0.57, 'Pembinaan terhadap pengelolaan sampah di pesisir', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(83, 23, 2023, 1.13, 'rehabilitasi ekosistem pesisir yang kritis, misalnya penanaman mangrove', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(84, 24, 2023, 0.85, 'Melengkapi sarpras daerah wisata untuk mendukung saptapesona. Membina Pokdarwis', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(85, 25, 2023, 0.28, 'Pembangunan bangunan pengendali banjir/ pengaman pantai', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(86, 26, 2023, 0.28, 'Pengawasan terhadap operasional pada pelabuhan sungai dan danau', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(87, 27, 2023, 0.28, 'Pengawasan terhadap operasional pada pelabuhan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(88, 28, 2023, 0.57, 'Pengawasan Sebaran Pupuk, Pestisida, dan Sarana Pendukung Perkebunan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(89, 29, 2023, 0.85, 'Melaksanakan dan monitoring kegiatan RHL', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(90, 30, 2023, 0.28, 'Koordinasi dan Sinkronisasi Pengawasan Perizinan di Bidang Industri dalam Lingkup IUI, IPUI, IUKI, dan IPKI', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(91, 1, 2024, 0.45, 'Pengelolaan dan Pengembangan SPAL', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(92, 2, 2024, 0.31, 'Pembangunan/ rehabilitasi infrastruktur permukiman baik skala lingkungan maupun skala kawasan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(93, 3, 2024, 0.31, 'Penyuluhan tentang Kelestarian Sumberdaya Kelautan dan Perikanan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(94, 4, 2024, 1.47, 'Pencegahan pencemaran dan pemulihan IKA', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(95, 5, 2024, 0.22, 'Pengawasan Teknis kaidah Pertambangan yang baik', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(96, 6, 2024, 0.22, 'Pelaksanaan Pengelolaan DAS Lintas Daerah Kabupaten/Kota dan dalam Daerah Kab/Kota dalam 1 (Satu) Daerah Provinsi', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(97, 7, 2024, 0.22, 'Penyelenggaraan Promosi Kesehatan dan Perilaku Hidup Bersih dan Sehat', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(98, 8, 2024, 0.13, 'Peningkatan kompetensi terhadap penyuluh dan Penyuluhan terhadap kelompok tani', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(99, 9, 2024, 22.2, 'RAD GRK, Inventarisasi GRK, Restorasi Gambut, Pengelolaan persampahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(100, 10, 2024, 21.7, 'Konversi penggunaan energi, Pengurangan penggunaan bahan bakar fosil', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(101, 11, 2024, 21.7, 'Efisiensi pemakaian bahan bakar untuk transportasi pengaturan alur transportasi darat', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(102, 12, 2024, 43.9, 'Gerakan Revolusi Hijau', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(103, 13, 2024, 19.3, 'Pengembangan budidaya padi sawah rendah emisi', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(104, 14, 2024, 19.3, 'pembinaan dan sosialisasi penggunaan pupuk, pengembangan peternakan rendah metan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(105, 15, 2024, 25.4, 'Pengembangan IPAL', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(106, 16, 2024, 25.4, 'Pengembangan sarpras limbah dan persampahan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(107, 17, 2024, 20, 'Pengelolaan Kehati', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(108, 18, 2024, 87733.67, 'Gerakan Revolusi hijau', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(109, 19, 2024, 280.33, 'Pengawasan Teknis kaidah Pertambangan yang baik', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(110, 20, 2024, 6000, 'Pengelolaan RTH', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(111, 21, 2024, 0, 'Legalisasi RPPEG, Pembangunan IPG, Rehabilitasi dan Revegetasi, serta Revitalisasi Masyarakat di lokasi gambut', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(112, 22, 2024, 0.63, 'Pembinaan terhadap pengelolaan sampah di pesisir', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(113, 23, 2024, 1.25, 'rehabilitasi ekosistem pesisir yang kritis, misalnya penanaman mangrove', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(114, 24, 2024, 0.94, 'Melengkapi sarpras daerah wisata untuk mendukung saptapesona. Membina Pokdarwis', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(115, 25, 2024, 0.31, 'Pembangunan bangunan pengendali banjir/ pengaman pantai', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(116, 26, 2024, 0.31, 'Pengawasan terhadap operasional pada pelabuhan sungai dan danau', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(117, 27, 2024, 0.31, 'Pengawasan terhadap operasional pada pelabuhan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(118, 28, 2024, 0.63, 'Pengawasan Sebaran Pupuk, Pestisida, dan Sarana Pendukung Perkebunan', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(119, 29, 2024, 0.94, 'Melaksanakan dan monitoring kegiatan RHL', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL),
	(120, 30, 2024, 0.31, 'Koordinasi dan Sinkronisasi Pengawasan Perizinan di Bidang Industri dalam Lingkup IUI, IPUI, IUKI, dan IPKI', '2022-07-05 11:38:32', '2022-07-05 11:38:32', NULL);
/*!40000 ALTER TABLE `zo_target_skpd` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_veribid
CREATE TABLE IF NOT EXISTS `zo_veribid` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `realisasibid_id` int(11) DEFAULT NULL,
  `perencana_id` int(11) DEFAULT NULL,
  `perencana_dates` date DEFAULT NULL,
  `validasi_perencana` enum('Y','N','R') DEFAULT 'N',
  `catatan_perencana` text,
  `sekdis_id` int(11) DEFAULT NULL,
  `sekdis_dates` date DEFAULT NULL,
  `validasi_sekdis` enum('Y','N','R') DEFAULT 'N',
  `catatan_sekdis` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table perfo.zo_veribid: ~4 rows (approximately)
/*!40000 ALTER TABLE `zo_veribid` DISABLE KEYS */;
INSERT INTO `zo_veribid` (`id`, `realisasibid_id`, `perencana_id`, `perencana_dates`, `validasi_perencana`, `catatan_perencana`, `sekdis_id`, `sekdis_dates`, `validasi_sekdis`, `catatan_sekdis`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '2022-07-21', 'R', 'perbaikan_ Tata Lingkungan 1', NULL, NULL, 'N', NULL, '2022-07-21 06:50:22', '2022-07-21 06:52:14'),
	(2, 2, 1, '2022-07-21', 'Y', 'ok_Tata Lingkungan', NULL, NULL, 'N', NULL, '2022-07-21 06:50:56', '2022-07-21 06:50:56'),
	(3, 3, 1, '2022-07-21', 'Y', 'ok_ Tata Lingkungan', NULL, NULL, 'N', NULL, '2022-07-21 06:51:19', '2022-07-21 06:51:19'),
	(4, 4, 1, '2022-07-21', 'Y', 'ok_Pengelolaan Sampah Limbah B3 & Kemitraan', NULL, NULL, 'N', NULL, '2022-07-21 06:51:39', '2022-07-21 06:51:39');
/*!40000 ALTER TABLE `zo_veribid` ENABLE KEYS */;

-- Dumping structure for table perfo.zo_verisubbid
CREATE TABLE IF NOT EXISTS `zo_verisubbid` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `validasi_sekdis` enum('Y','N','R') DEFAULT 'N',
  `catatan_sekdis` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table perfo.zo_verisubbid: ~2 rows (approximately)
/*!40000 ALTER TABLE `zo_verisubbid` DISABLE KEYS */;
INSERT INTO `zo_verisubbid` (`id`, `realisasi_id`, `kabid_id`, `kabid_dates`, `verifikasi_kabid`, `catatan_kabid`, `perencana_id`, `perencana_dates`, `validasi_perencana`, `catatan_perencana`, `sekdis_id`, `sekdis_dates`, `validasi_sekdis`, `catatan_sekdis`, `created_at`, `updated_at`) VALUES
	(2, 1, 1, '2022-07-21', 'R', 'catatan', NULL, NULL, 'N', NULL, NULL, NULL, 'N', NULL, '2022-07-21 07:10:59', '2022-07-21 07:10:59'),
	(3, 2, 1, '2022-07-21', 'Y', 'ok', 1, '2022-07-21', 'R', 'perbaikan_  Perencanaan Perlindungan dan Pengolahan LH', NULL, NULL, 'N', NULL, '2022-07-21 07:11:28', '2022-07-21 07:27:29'),
	(4, 3, 1, '2022-07-21', 'Y', 'ok', NULL, NULL, 'N', NULL, NULL, NULL, 'N', NULL, '2022-07-21 07:11:34', '2022-07-21 07:11:34');
/*!40000 ALTER TABLE `zo_verisubbid` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
