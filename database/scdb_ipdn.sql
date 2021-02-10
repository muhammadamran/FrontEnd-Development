-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 06:06 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scdb_ipdn`
--

-- --------------------------------------------------------

--
-- Table structure for table `output_sas`
--

CREATE TABLE `output_sas` (
  `No` int(11) NOT NULL,
  `kode_satker` varchar(50) DEFAULT NULL,
  `id_b` varchar(50) DEFAULT NULL,
  `id_c` varchar(50) DEFAULT NULL,
  `pagu` bigint(20) DEFAULT NULL,
  `realisasi` bigint(20) DEFAULT NULL,
  `ket` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `output_sas`
--

INSERT INTO `output_sas` (`No`, `kode_satker`, `id_b`, `id_c`, `pagu`, `realisasi`, `ket`) VALUES
(1, '677024', '1295', '101', 404205000, 190124350, 'Tanpa Sub Output'),
(2, '677024', '1295', '102', 36800000, 14670000, 'Pengabdian Masyarakat'),
(3, '677024', '1295', '102', 126205000, 118575000, 'Kajian dan Penelitian'),
(4, '677024', '1295', '103', 268973000, 120650700, 'Tanpa Sub Output'),
(5, '677024', '1295', '104', 23698000, 8160000, 'Tanpa Sub Output'),
(6, '677024', '1295', '105', 10456000, 477000, 'Tanpa Sub Output'),
(7, '677024', '1295', '106', 225000000, 198500000, 'Tanpa Sub Output'),
(8, '677024', '1295', '107', 848068000, 536661100, 'Tanpa Sub Output'),
(9, '677024', '1295', '108', 30000413000, 23519053778, 'Tanpa Sub Output'),
(10, '677024', '1295', '108', 9581416000, 6985955843, 'Gaji dan Tunjangan'),
(11, '677024', '1295', '108', 20418997000, 16533097935, 'Operasional dan Pemeliharaan Kantor'),
(12, '683070', '1295', '101', 434336000, 237219096, ' Sub Output'),
(13, '683070', '1295', '102', 69480000, 2550000, 'bdian Masyarakat'),
(14, '683070', '1295', '102', 102492000, 46609300, 'n dan Penelitian'),
(15, '683070', '1295', '103', 360324000, 219366550, ' Sub Output'),
(16, '683070', '1295', '104', 16446000, 10425200, ' Sub Output'),
(17, '683070', '1295', '105', 15890000, 0, ' Sub Output'),
(18, '683070', '1295', '106', 7328062000, 4996394500, ' Sub Output'),
(19, '683070', '1295', '107', 610961000, 352682707, ' Sub Output'),
(20, '683070', '1295', '108', 18706797000, 13470324330, ' Sub Output'),
(21, '683070', '1295', '108', 5887800000, 3853031703, 'dan Tunjangan'),
(22, '683070', '1295', '108', 12818997000, 9617292627, 'sional dan Pemeliharaan Kantor'),
(23, '448302', '1286', '401', 54457000, 54399400, 'Kerjasama Dengan Pemerintah Daerah'),
(24, '448302', '1286', '401', 68193000, 67923100, 'Kerjasama Dengan Perguruan Tinggi (PTN/PTS)'),
(25, '448302', '1286', '401', 232804000, 208550160, 'Kerjasama Dengan Lembaga Lainnya'),
(26, '448302', '1286', '402', 188468000, 166625402, 'Peraturan Menteri Dalam Negeri Terkait IPDN'),
(27, '448302', '1286', '402', 4545000, 4504750, 'Peraturan Rektor Terkait Tindak Lanjut dari permendagri Nomor 42 dan 43 Tahun 2018'),
(28, '448302', '1286', '403', 64121000, 56654000, 'Pelaksanaan Bantuan Hukum'),
(29, '448302', '1286', '404', 164512000, 141507300, 'Pengelolaan Informasi dan Pengaduan'),
(30, '448302', '1286', '404', 389440000, 326544994, 'Dokumentasi dan Publikasi'),
(31, '448302', '1286', '405', 408580000, 325996000, 'Pelaksanaan Reformasi Birokrasi'),
(32, '448302', '1286', '405', 87800000, 79410900, 'Pemantauan dan Evaluasi Reformasi Birokrasi'),
(33, '448302', '1286', '406', 367537000, 317781608, 'Pengelolaan kepegawaian'),
(34, '448302', '1292', '101', 1214627000, 855953707, 'Penyelenggaraan Administrasi Keakademikan'),
(35, '448302', '1292', '101', 1956559000, 1420923626, 'Penyelenggaraan Fakultas Politik Pemerintahan'),
(36, '448302', '1292', '101', 2031386000, 1012734367, 'Penyelenggaraan Fakultas Manajemen Pemerintahan'),
(37, '448302', '1292', '101', 1143371000, 865487844, 'Penyelenggaraan Pelatihan'),
(38, '448302', '1292', '101', 3339757000, 2782739451, 'Evaluasi Penyelenggaraan Pendidikan'),
(39, '448302', '1292', '101', 555534000, 310998113, 'Penyelenggaraan Fakultas Hukum Tata Pemerintahan'),
(40, '448302', '1292', '101', 21633000, 21632400, 'Peningkatan  dan Pengembangan Kualitas dan Kompetensi Tenaga Pendidik'),
(41, '448302', '1292', '101', 2924290000, 1645632679, 'Penyelenggaraan Administrasi Keakademikan Program Pasca Sarjana'),
(42, '448302', '1292', '101', 2421356000, 1043963251, 'Penyelenggaraan Pendidikan Program Magister (S2)'),
(43, '448302', '1292', '101', 3557269000, 2263101266, 'Penyelenggaraan Pendidikan Program Doktoral (S3)'),
(44, '448302', '1292', '101', 529068000, 508162671, 'Evaluasi Penyelenggaraan Pendidikan'),
(45, '448302', '1292', '101', 648440000, 136395797, 'Penyelenggaraan Administrasi Keakademikan Program Profesi Kepamongprajaan'),
(46, '448302', '1292', '101', 320345000, 33240000, 'Penyelenggaraan Pendidikan Program Profesi Kepamongprajaan'),
(47, '448302', '1292', '101', 48290000, 0, 'Evaluasi Penyelenggaraan Pendidikan'),
(48, '448302', '1292', '102', 673561000, 358446990, 'Akreditasi Pendidikan Kepamongprajaan'),
(49, '448302', '1292', '102', 589438000, 345223979, 'Audit Mutu Internal'),
(50, '448302', '1292', '103', 304425000, 187275709, 'Rencana Aksi, Kaji Tindak, Evaluasi, dan Seminar Hasil Pelaksanaan Pengabdian Masyarakat'),
(51, '448302', '1292', '103', 8800000, 8794500, 'Pelaksanaan Program Pengabdian Masyarakat Desa Binaan Berbasis Interdisipliner'),
(52, '448302', '1292', '103', 89957000, 44105000, 'Pelaksanaan Pengabdian Masyarakat Desa Binaan Berbasis Program Studi'),
(53, '448302', '1292', '103', 205930000, 71439500, 'Pelaksanaan Pengabdian Masyarakat Berbasis Riset dan Kajian'),
(54, '448302', '1292', '103', 87073000, 85779000, 'Pelaksanaan Pengabdian Masyarakat Bersinergi dengan Praktek Lapangan'),
(55, '448302', '1292', '103', 218110000, 216983020, 'Pelaksanaan Kajian Pemerintahan'),
(56, '448302', '1292', '103', 1204811000, 1058767940, 'Pelaksanaan Penelitian Mandiri, Kelompok dan Unggulan'),
(57, '448302', '1292', '103', 52679000, 0, 'Seminar Hasil Kajian dan Penelitian'),
(58, '448302', '1292', '103', 119160000, 27367980, 'Evaluasi, Rencana Aksi, dan Publikasi Hasil Pelaksanaan Penelitian'),
(59, '448302', '1292', '104', 194025000, 143584000, 'Administrasi Dan Layanan Perpustakaan'),
(60, '448302', '1292', '105', 609930000, 255767200, 'Pengelolaan Data dan Informasi'),
(61, '448302', '1292', '106', 473952000, 247736950, 'Jurnal Lembaga'),
(62, '448302', '1292', '106', 207391000, 54285000, 'Jurnal Fakultas'),
(63, '448302', '1292', '106', 531818000, 176765000, 'Jurnal Program Diploma'),
(64, '448302', '1292', '107', 254253000, 253529850, 'Laboratorium Bahasa'),
(65, '448302', '1292', '107', 141188000, 94499217, 'Laboratorium dan Museum Sejarah Pemerintahan'),
(66, '448302', '1292', '108', 39850000, 39597600, 'PENETAPAN TEMA LITERATUR, PENULISAN, EDITOR, SELEKSI PROPOSAL PENULISAN DAN KOMPILASI DATA'),
(67, '448302', '1292', '108', 642850000, 463862000, 'PENYUSUNAN LITERATUR'),
(68, '448302', '1292', '108', 76250000, 26963400, 'WORKSHOP PENYUSUNAN LITERATUR'),
(69, '448302', '1292', '108', 150000000, 0, 'PENCETAKAN BUKU LITERATUR'),
(70, '448302', '1292', '108', 500000, 0, 'PELAPORAN KEGIATAN'),
(71, '448302', '1292', '109', 1800000, 1800000, 'PENETAPAN PENULISAN  RPS DAN RTM PENGAJARAN'),
(72, '448302', '1292', '109', 136462000, 136012000, 'PENYUSUNAN RPS DAN RTM PENGAJARAN'),
(73, '448302', '1292', '109', 302229000, 76548800, 'WORKSHOP PENYUSUNAN RPS DAN RTM PENGAJARAN'),
(74, '448302', '1292', '109', 112500000, 111441600, 'PENCETAKAN BUKU RPS DAN RTM PENGAJARAN'),
(75, '448302', '1292', '109', 500000, 500000, 'PELAPORAN KEGIATAN'),
(76, '448302', '1292', '109', 1800000, 1800000, 'PENETAPAN PENULIS RPS DAN RTM PELATIHAN'),
(77, '448302', '1292', '109', 56145000, 53145000, 'PENYUSUNAN RPS DAN RTM PELATIHAN'),
(78, '448302', '1292', '109', 88275000, 45448800, 'WORKSHOP PENYUSUNAN RPS DAN RTM PELATIHAN'),
(79, '448302', '1292', '109', 90000000, 0, 'PENCETAKAN BUKU RPS DAN RTM PELATIHAN'),
(80, '448302', '1292', '109', 500000, 500000, 'LAPORAN KEGIATAN'),
(81, '448302', '1292', '110', 126966000, 92648050, 'Persiapan'),
(82, '448302', '1292', '110', 391079000, 225181850, 'Pelaksanaan'),
(83, '448302', '1292', '110', 28000000, 8232400, 'Pelaporan'),
(84, '448302', '1292', '110', 22015000, 16461700, 'Kompilasi'),
(85, '448302', '1292', '110', 50449000, 6375000, 'Persiapan'),
(86, '448302', '1292', '110', 63860000, 30631000, 'Pelaksanaan'),
(87, '448302', '1292', '110', 31250000, 16165000, 'Pelaporan'),
(88, '448302', '1292', '110', 65740000, 63740000, 'Kompilasi'),
(89, '448302', '1292', '111', 454024000, 284125050, 'Penyusunan rencana program dan Penyusunan rencana anggaran'),
(90, '448302', '1292', '111', 711833000, 514530800, 'Pelaksanaan pemantauan dan evaluasi'),
(91, '448302', '1293', '301', 1078416000, 677040835, 'Penyelenggaraan Bimbingan dan Pengawasan Praja'),
(92, '448302', '1293', '301', 1179297000, 1000668139, 'Penyelenggaraan Kegiatan Ekstrakurikuler Praja'),
(93, '448302', '1293', '301', 647269000, 329341160, 'Penyelenggaraan Administrasi Keprajaan dan Kemahasiswaan'),
(94, '448302', '1293', '301', 11907913000, 11004183431, 'Penerimaan Calon Praja IPDN'),
(95, '448302', '1293', '301', 87370000, 42257000, 'Pengelolaan Data Alumni'),
(96, '448302', '1293', '301', 84711000, 49457690, 'Survei Tingkat Kepuasan Stakeholder Terhadap Alumni Pendidikan Tinggi Kepamongprajaan'),
(97, '448302', '1293', '301', 1162541000, 51496200, 'Penyelenggaraan Penegakan Disiplin Praja'),
(98, '448302', '1294', '201', 3302144000, 2291115484, 'Pengadaan perangkat pengolah data dan komunikasi'),
(99, '448302', '1294', '201', 7361566000, 1386505000, 'Pengadaan peralatan fasilitas perkantoran'),
(100, '448302', '1294', '201', 1126100000, 677497000, 'Pembangunan/renovasi gedung dan bangunan'),
(101, '448302', '1294', '202', 457706000, 327236756, 'Pengelolaan keuangan dan perbendaharaan'),
(102, '448302', '1294', '202', 12012263000, 9295163234, 'Pelayanan umum, Pelayanan rumah tangga dan perlengkapan'),
(103, '448302', '1294', '203', 121863240000, 93656799482, 'Gaji dan Tunjangan'),
(104, '448302', '1294', '203', 130307746000, 87856768412, 'Operasional dan Pemeliharaan Kantor');

-- --------------------------------------------------------

--
-- Table structure for table `out_pok`
--

CREATE TABLE `out_pok` (
  `id` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pagu` bigint(20) NOT NULL,
  `realisasi` bigint(20) NOT NULL,
  `kembali` bigint(20) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `out_pok`
--

INSERT INTO `out_pok` (`id`, `id_u`, `nama`, `pagu`, `realisasi`, `kembali`, `tgl`) VALUES
(1, 101, 'Penyelenggaraan Pendidikan Kepamongprajaan', 456694000, 429567400, 0, '2020-10-19'),
(2, 101, 'Layanan Perkantoran', 330000000, 243848021, 0, '2020-10-19'),
(3, 102, 'Penyelenggaraan Pendidikan Kepamongprajaan', 1353410000, 946259907, 0, '2020-10-19'),
(4, 102, 'Literatur', 909450000, 449583000, 0, '2020-10-19'),
(5, 102, 'RPS/RTM', 790211000, 385246800, 0, '2020-10-19'),
(6, 102, 'Layanan Perkantoran', 19000000, 19000000, 0, '2020-10-19'),
(7, 103, 'Perencanaan [SBKU]', 779359000, 449590000, 0, '2020-10-19'),
(8, 103, 'Layanan Dukungan Manajemen Satker', 1165857000, 814495850, 0, '2020-10-19'),
(9, 103, 'Layanan Perkantoran', 34200000, 17100000, 0, '2020-10-19'),
(10, 104, 'Penyelenggaraan Pendidikan Kepamongprajaan', 2540049000, 1914281526, 0, '2020-10-19'),
(11, 104, 'Jurnal', 220138000, 46890000, 0, '2020-10-19'),
(12, 104, 'Modul', 0, 0, 0, '2020-10-19'),
(13, 104, 'Layanan Perkantoran', 670476000, 582101172, 0, '2020-10-19'),
(14, 105, 'Penyelenggaraan Pendidikan Kepamongprajaan', 2648004000, 1405180354, 0, '2020-10-19'),
(15, 105, 'Jurnal', 325671000, 96663000, 0, '2020-10-19'),
(16, 105, 'Modul', 0, 0, 0, '2020-10-19'),
(17, 105, 'Layanan Perkantoran', 546008000, 335430438, 0, '2020-10-19'),
(18, 106, 'Penyelenggaraan Pendidikan Kepamongprajaan', 839240000, 492590165, 0, '2020-10-19'),
(19, 106, 'Jurnal', 193400000, 88750000, 0, '2020-10-19'),
(20, 106, 'Modul', 0, 0, 0, '2020-10-19'),
(21, 106, 'Layanan Perkantoran', 361496000, 279546802, 0, '2020-10-19'),
(22, 107, 'Penyelenggaraan Pendidikan Kepamongprajaan', 549054000, 298020900, 0, '2020-10-19'),
(23, 107, 'Layanan Perkantoran', 15200000, 13583000, 0, '2020-10-19'),
(24, 108, 'Audit Mutu Pendidikan/Akreditasi', 1262999000, 572979569, 0, '2020-10-19'),
(25, 108, 'Layanan Perkantoran', 19000000, 10905000, 0, '2020-10-19'),
(26, 109, 'Kajian, Penelitian dan Pengabdian Masyarakat Lingkup IPDN', 696185000, 390422709, 0, '2020-10-19'),
(27, 109, 'Layanan Perkantoran', 19000000, 4874500, 0, '2020-10-19'),
(28, 110, 'Kajian, Penelitian dan Pengabdian Masyarakat Lingkup IPDN', 1594760000, 1243442040, 0, '2020-10-19'),
(29, 110, 'Jurnal', 373952000, 213042550, 0, '2020-10-19'),
(30, 110, 'Layanan Perkantoran', 19000000, 15561200, 0, '2020-10-19'),
(31, 111, 'Pengelolaan Teknologi Informasi Kelembagaan Pendidikan Kepamongprajaan', 609930000, 251787200, 0, '2020-10-19'),
(32, 111, 'Layanan Perkantoran', 15200000, 15200000, 0, '2020-10-19'),
(33, 112, 'Pengelolaan Layanan Perpustakaan', 194025000, 143584000, 0, '2020-10-19'),
(34, 112, 'Layanan Perkantoran', 495386000, 420306000, 0, '2020-10-19'),
(35, 113, 'Pengelolaan Laboratorium Pendidikan Kepamongprajaan', 254253000, 233506850, 0, '2020-10-19'),
(36, 113, 'Layanan Perkantoran', 15200000, 15199000, 0, '2020-10-19'),
(37, 114, 'Pengelolaan Laboratorium Pendidikan Kepamongprajaan', 141188000, 94499217, 0, '2020-10-19'),
(38, 114, 'Layanan Perkantoran', 15200000, 12300000, 0, '2020-10-19'),
(39, 201, 'Layanan Dukungan Manajemen Satker', 100000000, 92966069, 0, '2020-10-16'),
(40, 201, 'Layanan Perkantoran', 275000000, 272790839, 0, '2020-10-16'),
(41, 202, 'Layanan Dukungan Manajemen Satker', 9654439000, 7607938533, 27982000, '2020-10-16'),
(42, 202, 'Layanan Perkantoran', 45401634000, 31359904854, 0, '2020-10-16'),
(43, 203, 'Layanan Dukungan Manajemen Satker', 457706000, 317959956, 0, '2020-10-16'),
(44, 203, 'Layanan Perkantoran', 157450665000, 115550209697, 8344000, '2020-10-16'),
(45, 203, 'Layanan Dukungan Manajemen Satker', 527706000, 302714956, 0, '2020-10-16'),
(46, 203, 'Layanan Perkantoran', 157240665000, 115550209697, 8344000, '2020-10-16'),
(47, 204, 'Penyelenggaraan Pendidikan Kepamongprajaan', 1876416000, 1819445281, 0, '2020-10-16'),
(48, 204, 'Pengelolaan Administrasi Keprajaan dan Alumni', 0, 0, 0, '2020-10-16'),
(49, 204, 'Layanan Sarana dan Prasarana Internal', 11789810000, 4355117484, 0, '2020-10-16'),
(50, 204, 'Layanan Dukungan Manajemen Satker', 1266142000, 1227206045, 0, '2020-10-16'),
(51, 204, 'Layanan Perkantoran', 41073979000, 24177711532, 0, '2020-10-16'),
(52, 205, 'Layanan Dukungan Manajemen Satker', 414697000, 247658556, 0, '2020-10-16'),
(53, 205, 'Layanan Perkantoran', 2401862000, 2287569986, 0, '2020-10-16'),
(54, 206, 'Layanan Dukungan Manajemen Satker', 576985000, 93858230, 0, '2020-10-16'),
(55, 206, 'Layanan Perkantoran', 1515380000, 1095468299, 0, '2020-10-16'),
(56, 301, 'Pengelolaan Administrasi Keprajaan dan Alumni', 175000000, 108112500, 0, '2020-10-16'),
(57, 301, 'Layanan Perkantoran', 250000000, 196372718, 0, '2020-10-16'),
(58, 302, 'Pengelolaan Administrasi Keprajaan dan Alumni', 12955101000, 10721831424, 0, '2020-10-16'),
(59, 302, 'Layanan Perkantoran', 22800000, 11400000, 0, '2020-10-16'),
(60, 303, 'Pengelolaan Administrasi Keprajaan dan Alumni', 835009000, 637689335, 0, '2020-10-16'),
(61, 303, 'Layanan Perkantoran', 72800000, 11400000, 0, '2020-10-16'),
(62, 305, 'Pengelolaan Administrasi Keprajaan dan Alumni', 1179297000, 996889139, 1850000, '2020-10-16'),
(63, 305, 'Revolusi Mental Di Lingkungan IPDN', 0, 0, 0, '2020-10-16'),
(64, 305, 'Layanan Perkantoran', 22800000, 11400000, 0, '2020-10-16'),
(65, 304, 'Pengelolaan Administrasi Keprajaan dan Alumni', 821956000, 14619000, 0, '2020-10-16'),
(66, 304, 'Layanan Perkantoran', 22800000, 11400000, 0, '2020-10-16'),
(67, 306, 'Pengelolaan Administrasi Keprajaan dan Alumni', 111397000, 36877200, 0, '2020-10-16'),
(68, 306, 'Layanan Perkantoran', 19000000, 9250000, 0, '2020-10-16'),
(69, 307, 'Pengelolaan Administrasi Keprajaan dan Alumni', 69757000, 36450000, 0, '2020-10-16'),
(70, 307, 'Layanan Perkantoran', 19000000, 14244700, 0, '2020-10-16'),
(71, 401, 'Kerjasama IPDN', 171280000, 125098160, 0, '2020-10-19'),
(72, 401, 'Layanan Perkantoran', 250000000, 237020927, 0, '2020-10-19'),
(73, 402, 'Kerjasama IPDN', 184174000, 178842500, 0, '2020-10-19'),
(74, 402, 'Publikasi Informasi dan Penanganan Pengaduan Lingkup IPDN', 553952000, 468052294, 0, '2020-10-19'),
(75, 402, 'Layanan Perkantoran', 622900000, 211640000, 0, '2020-10-19'),
(76, 403, 'Kebijakan/Regulasi Lingkup IPDN yang ditetapkan', 193013000, 171130152, 0, '2020-10-19'),
(77, 403, 'Penanganan Sengketa Hukum Terkait IPDN', 64121000, 56654000, 0, '2020-10-19'),
(78, 403, 'Nilai Capaian Kinerja Reformasi Birokrasi lingkup IPDN', 496380000, 405406900, 2440000, '2020-10-19'),
(79, 403, 'Layanan Perkantoran', 15200000, 10200000, 0, '2020-10-19'),
(80, 404, 'Nilai Capaian Kinerja Reformasi Birokrasi lingkup IPDN', 0, 0, 0, '2020-10-19'),
(81, 404, 'Layanan Dukungan Manajemen Satker', 367537000, 317781608, 0, '2020-10-19'),
(82, 404, 'Layanan Perkantoran', 22800000, 22795000, 0, '2020-10-19'),
(83, 115, 'Penyelenggaraan Pendidikan Kepamongprajaan', 9431983000, 5037697396, 0, '2020-10-16'),
(84, 115, 'Jurnal', 100000000, 0, 0, '2020-10-16'),
(85, 115, 'Layanan Perkantoran', 19000000, 19000000, 0, '2020-10-16'),
(86, 116, 'Penyelenggaraan Pendidikan Kepamongprajaan', 1017075000, 159487797, 0, '2020-10-16'),
(87, 116, 'Layanan Perkantoran', 119000000, 109738000, 0, '2020-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelatihan`
--

CREATE TABLE `tbl_pelatihan` (
  `id_pelatihan` int(11) NOT NULL,
  `nama_pelatihan` varchar(100) NOT NULL,
  `tanggal_pelatihan` date NOT NULL,
  `jumlah_jam` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendidikan`
--

CREATE TABLE `tbl_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `tingkat_pendidikan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pendidikan`
--

INSERT INTO `tbl_pendidikan` (`id_pendidikan`, `tingkat_pendidikan`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA'),
(4, 'SMK'),
(5, 'SLTA KEJURUAN'),
(6, 'SLTA UMUM'),
(7, 'DI'),
(8, 'DII'),
(9, 'DIII'),
(10, 'DIV'),
(11, 'SARJANA'),
(12, 'PASCA SARJANA'),
(13, 'S1'),
(14, 'S2'),
(15, 'S2 / MAGISTER / MASTER (DN)'),
(16, 'S2 / MASTER (LN)'),
(17, 'S3'),
(18, 'S3 / DOKTOR (DN)'),
(19, 'S3 / DOKTOR (LN)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pns`
--

CREATE TABLE `tbl_pns` (
  `no` int(11) NOT NULL,
  `nip` bigint(50) NOT NULL,
  `nama_lengkap` varchar(500) NOT NULL,
  `bagian` varchar(500) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_urut_pangkat` int(11) NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `gol_ruang` varchar(500) NOT NULL,
  `tmt_pangkat` date NOT NULL,
  `jabatan` varchar(500) NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `jurusan` varchar(500) NOT NULL,
  `nama_pt` varchar(500) NOT NULL,
  `tahun_lulus` int(100) NOT NULL,
  `tingkat_pendidikan` varchar(100) NOT NULL,
  `usia` varchar(100) NOT NULL,
  `masa_kerja` varchar(100) NOT NULL,
  `catatan_mutasi` varchar(500) NOT NULL,
  `no_kapreg` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pns`
--

INSERT INTO `tbl_pns` (`no`, `nip`, `nama_lengkap`, `bagian`, `tempat_lahir`, `tanggal_lahir`, `no_urut_pangkat`, `pangkat`, `gol_ruang`, `tmt_pangkat`, `jabatan`, `tmt_jabatan`, `jurusan`, `nama_pt`, `tahun_lulus`, `tingkat_pendidikan`, `usia`, `masa_kerja`, `catatan_mutasi`, `no_kapreg`) VALUES
(2, 1105011207970007, 'Maulyanda', 'Tes', 'Meulaboh', '1997-08-24', 12, '12', '12', '2020-11-16', '12', '2020-11-16', '12', '12', 2019, 'DIV', '23 Thn 2 Bln', '23 Thn 2 Bln', '12', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(150) NOT NULL,
  `role_name` varchar(150) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `role_name`, `keterangan`) VALUES
(1, 'Admin', 'Hak Akses Full Aplikasi'),
(2, 'Biro 1', 'Biro 1 Kampus Jatinangor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satker`
--

CREATE TABLE `tbl_satker` (
  `id_satker` int(11) NOT NULL,
  `kode_satker` varchar(150) NOT NULL,
  `nama_satker` varchar(150) NOT NULL,
  `alias` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_satker`
--

INSERT INTO `tbl_satker` (`id_satker`, `kode_satker`, `nama_satker`, `alias`) VALUES
(1, '448302', 'IPDN KAMPUS JATINANGOR', 'JATINANGOR'),
(2, '352593', 'IPDN KAMPUS JAKARTA', 'JAKARTA'),
(3, '677010', 'IPDN KAMPUS SULAWESI UTARA', 'SULUT'),
(4, '677024', 'IPDN KAMPUS SULAWESI SELATAN', 'SULSEL'),
(5, '677045', 'IPDN KAMPUS SUMATERA BARAT', 'SUMBAR'),
(6, '683070', 'IPDN KAMPUS KALIMANTAN BARAT', 'KALBAR'),
(7, '683084', 'IPDN KAMPUS NUSA TENGGARA BARAT', 'NTB'),
(8, '683091', 'IPDN KAMPUS PAPUA', 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satker_biro`
--

CREATE TABLE `tbl_satker_biro` (
  `id_satker_biro` int(11) NOT NULL,
  `kode_satker_biro` varchar(150) NOT NULL,
  `nama_satker_biro` varchar(150) NOT NULL,
  `alias` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_satker_biro`
--

INSERT INTO `tbl_satker_biro` (`id_satker_biro`, `kode_satker_biro`, `nama_satker_biro`, `alias`) VALUES
(1, '1292', 'Penyelenggaraan Administrasi Akademik dan Perencanaan Pendidikan Kepamongprajaan', 'BIRO I'),
(2, '1294', 'Pengelolaan Administrasi Umum dan Keuangan Pendidikan Kepamongprajaan', 'BIRO II'),
(3, '1293', 'Penyelenggaraan Administrasi Keprajaan dan Kemahasiswaan', 'BIRO III'),
(4, '1286', 'Penyelenggaraan Administrasi Kerjasama dan Hukum', 'BIRO IV');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_span`
--

CREATE TABLE `tbl_span` (
  `id_span` int(11) NOT NULL,
  `kode_satker` varchar(150) NOT NULL,
  `nama_satker` varchar(150) NOT NULL,
  `pagu_bp` bigint(150) NOT NULL,
  `realisasi_bp` bigint(150) NOT NULL,
  `persentase_bp` varchar(150) NOT NULL,
  `pagu_bb` bigint(150) NOT NULL,
  `realisasi_bb` bigint(150) NOT NULL,
  `persentase_bb` varchar(150) NOT NULL,
  `pagu_bm` bigint(150) NOT NULL,
  `realisasi_bm` bigint(150) NOT NULL,
  `persentase_bm` varchar(150) NOT NULL,
  `pagu_t` bigint(150) NOT NULL,
  `realisasi_t` bigint(150) NOT NULL,
  `persentase_t` varchar(150) NOT NULL,
  `sisa` bigint(150) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_span`
--

INSERT INTO `tbl_span` (`id_span`, `kode_satker`, `nama_satker`, `pagu_bp`, `realisasi_bp`, `persentase_bp`, `pagu_bb`, `realisasi_bb`, `persentase_bb`, `pagu_bm`, `realisasi_bm`, `persentase_bm`, `pagu_t`, `realisasi_t`, `persentase_t`, `sisa`, `created_date`) VALUES
(1, '448302', 'IPDN KAMPUS JATINANGOR', 112930090000, 94146054905, '83.37%', 201633066000, 136976848300, '67.93%', 17860660000, 4591617484, '25.71%', 332423816000, 235714520689, '70.91%', 96709295311, '2020-11-10'),
(2, '352593', 'IPDN KAMPUS JAKARTA', 23313047000, 20042609305, '85.97%', 22141734000, 16643278561, '75.17%', 1482844000, 1384867000, '93.39%', 46937625000, 38070754866, '81.11%', 8866870134, '2020-11-10'),
(3, '677010', 'IPDN KAMPUS SULAWESI UTARA', 6758697000, 5939761124, '87.88%', 25101764000, 19728244342, '78.59%', 322000000, 107886200, '33.51%', 32182461000, 25775891666, '80.09%', 6406569334, '2020-11-10'),
(4, '677024', 'IPDN KAMPUS SULAWESI SELATAN', 8374205000, 7645098861, '91.29%', 23132225000, 18353631505, '79.34%', 253500000, 198500000, '78.30%', 31759930000, 26197230366, '82.49%', 5562699634, '2020-11-10'),
(5, '677045', 'IPDN KAMPUS SUMATERA BARAT', 7285747000, 6141781780, '84.30%', 23053939000, 17266916839, '74.90%', 279920000, 245863000, '87.83%', 30619606000, 23654561619, '77.25%', 6965044381, '2020-11-10'),
(6, '683070', 'IPDN KAMPUS KALIMANTAN BARAT', 4756188000, 4222615623, '88.78%', 14462094000, 10950252652, '75.72%', 7073478000, 4996394500, '70.64%', 26291760000, 20169262775, '76.71%', 6122497225, '2020-11-10'),
(7, '683084', 'IPDN KAMPUS NUSA TENGGARA BARAT', 9856653000, 8911963776, '90.42%', 19481863000, 14474528733, '74.30%', 461417000, 180714350, '39.17%', 29799933000, 23567206859, '79.08%', 6232726141, '2020-11-10'),
(8, '683091', 'IPDN KAMPUS PAPUA', 5078831000, 4045150181, '79.65%', 25156863000, 19550500730, '77.71%', 1216600000, 750000000, '61.65%', 31452294000, 24345650911, '77.41%', 7106643089, '2020-11-10'),
(9, '448302', 'IPDN KAMPUS JATINANGOR', 112930090000, 94146054905, '83.37%', 201633066000, 136976848300, '67.93%', 17860660000, 4591617484, '25.71%', 332423816000, 235714520689, '70.91%', 96709295311, '2020-11-10'),
(10, '352593', 'IPDN KAMPUS JAKARTA', 23313047000, 20042609305, '85.97%', 22141734000, 16643278561, '75.17%', 1482844000, 1384867000, '93.39%', 46937625000, 38070754866, '81.11%', 8866870134, '2020-11-10'),
(11, '677010', 'IPDN KAMPUS SULAWESI UTARA', 6758697000, 5939761124, '87.88%', 25101764000, 19728244342, '78.59%', 322000000, 107886200, '33.51%', 32182461000, 25775891666, '80.09%', 6406569334, '2020-11-10'),
(12, '677024', 'IPDN KAMPUS SULAWESI SELATAN', 8374205000, 7645098861, '91.29%', 23132225000, 18353631505, '79.34%', 253500000, 198500000, '78.30%', 31759930000, 26197230366, '82.49%', 5562699634, '2020-11-10'),
(13, '677045', 'IPDN KAMPUS SUMATERA BARAT', 7285747000, 6141781780, '84.30%', 23053939000, 17266916839, '74.90%', 279920000, 245863000, '87.83%', 30619606000, 23654561619, '77.25%', 6965044381, '2020-11-10'),
(14, '683070', 'IPDN KAMPUS KALIMANTAN BARAT', 4756188000, 4222615623, '88.78%', 14462094000, 10950252652, '75.72%', 7073478000, 4996394500, '70.64%', 26291760000, 20169262775, '76.71%', 6122497225, '2020-11-10'),
(15, '683084', 'IPDN KAMPUS NUSA TENGGARA BARAT', 9856653000, 8911963776, '90.42%', 19481863000, 14474528733, '74.30%', 461417000, 180714350, '39.17%', 29799933000, 23567206859, '79.08%', 6232726141, '2020-11-10'),
(16, '683091', 'IPDN KAMPUS PAPUA', 5078831000, 4045150181, '79.65%', 25156863000, 19550500730, '77.71%', 1216600000, 750000000, '61.65%', 31452294000, 24345650911, '77.41%', 7106643089, '2020-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_span_biro`
--

CREATE TABLE `tbl_span_biro` (
  `id_span_biro` int(11) NOT NULL,
  `kode_satker_biro` varchar(150) NOT NULL,
  `nama_satker_biro` varchar(150) NOT NULL,
  `pagu_bp` varchar(150) NOT NULL,
  `realisasi_bp` bigint(150) NOT NULL,
  `persentase_bp` varchar(150) NOT NULL,
  `pagu_bb` bigint(150) NOT NULL,
  `realisasi_bb` bigint(150) NOT NULL,
  `persentase_bb` varchar(150) NOT NULL,
  `pagu_bm` bigint(150) NOT NULL,
  `realisasi_bm` bigint(150) NOT NULL,
  `persentase_bm` varchar(150) NOT NULL,
  `pagu_t` bigint(150) NOT NULL,
  `realisasi_t` bigint(150) NOT NULL,
  `persentase_t` varchar(150) NOT NULL,
  `sisa` varchar(150) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_span_biro`
--

INSERT INTO `tbl_span_biro` (`id_span_biro`, `kode_satker_biro`, `nama_satker_biro`, `pagu_bp`, `realisasi_bp`, `persentase_bp`, `pagu_bb`, `realisasi_bb`, `persentase_bb`, `pagu_bm`, `realisasi_bm`, `persentase_bm`, `pagu_t`, `realisasi_t`, `persentase_t`, `sisa`, `created_date`) VALUES
(1, '1286', 'Penyelenggaraan AdministrasinKerjasama dan Hukum', '0', 0, '0.00%', 2030457000, 1770049414, '87.17%', 0, 0, '0.00%', 2030457000, 1770049414, '87.17%', '260407586', '2020-11-10'),
(2, '1292', 'Penyelenggaraan Administrasi Akademik dan Perencanaan Pendidikan Kepamongprajaan', '0', 0, '0.00%', 28215394000, 19478824653, '69.04%', 180000000, 178000000, '98.89%', 28395394000, 19656824653, '69.23%', '8738569347', '2020-11-10'),
(3, '1293', 'Penyelenggaraan Administrasi Keprajaan dan Kemahasiswaa', '0', 0, '0.00%', 16147517000, 14053572682, '87.03%', 0, 0, '0.00%', 16147517000, 14053572682, '87.03%', '2093944318', '2020-11-10'),
(4, '1294', 'Pengelolaan Administrasi Umum dan Keuangan Pendidikan Kepamongprajaan', '112930090000', 94146054905, '83.37%', 155239698000, 101674401551, '65.50%', 17680660000, 4413617484, '24.96%', 285850448000, 200234073940, '70.05%', '85616374060', '2020-11-10'),
(5, '1286', 'Penyelenggaraan AdministrasinKerjasama dan Hukum', '0', 0, '0.00%', 2030457000, 1770049414, '87.17%', 0, 0, '0.00%', 2030457000, 1770049414, '87.17%', '260407586', '2020-11-10'),
(6, '1292', 'Penyelenggaraan Administrasi Akademik dan Perencanaan Pendidikan Kepamongprajaan', '0', 0, '0.00%', 28215394000, 19478824653, '69.04%', 180000000, 178000000, '98.89%', 28395394000, 19656824653, '69.23%', '8738569347', '2020-11-10'),
(7, '1293', 'Penyelenggaraan Administrasi Keprajaan dan Kemahasiswaa', '0', 0, '0.00%', 16147517000, 14053572682, '87.03%', 0, 0, '0.00%', 16147517000, 14053572682, '87.03%', '2093944318', '2020-11-10'),
(8, '1294', 'Pengelolaan Administrasi Umum dan Keuangan Pendidikan Kepamongprajaan', '112930090000', 94146054905, '83.37%', 155239698000, 101674401551, '65.50%', 17680660000, 4413617484, '24.96%', 285850448000, 200234073940, '70.05%', '85616374060', '2020-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thl`
--

CREATE TABLE `tbl_thl` (
  `id_thl` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `tempat_lahir` varchar(500) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `dik` varchar(100) NOT NULL,
  `penugasan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_thl`
--

INSERT INTO `tbl_thl` (`id_thl`, `nama`, `tempat_lahir`, `tanggal_lahir`, `dik`, `penugasan`) VALUES
(1, 'Maulyanda', 'Meulaboh', '1997-08-24', 'DIV', 'Staff Ahli IT'),
(3, 'Nunu', 'Bontang', '2020-11-10', 'S2 / MAGISTER / MASTER (DN)', 'Staff Ahli IT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(150) NOT NULL,
  `nip` varchar(150) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `nip`, `nama_user`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'Administrator', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', '2020-11-02 04:14:16'),
(20, '1105011207970006', 'Maulyanda', 'e10adc3949ba59abbe56e057f20f883e', 'Biro 1', '2020-11-11 06:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `unit_pok`
--

CREATE TABLE `unit_pok` (
  `id_b` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_pok`
--

INSERT INTO `unit_pok` (`id_b`, `id`, `nama`) VALUES
(1292, 101, 'TU BIRO I'),
(1292, 102, 'BAGIAN AKADEMIK '),
(1292, 103, 'BAGIAN PERENCANAAN '),
(1292, 104, 'FAKULTAS POLITIK PEMERINTAHAN '),
(1292, 105, 'FAKULTAS MANAJEMEN PEMERINTAHAN '),
(1292, 106, 'FAKULTAS HUKUM DAN PEMERINTAHAN '),
(1292, 107, 'SENAT INSTITUT '),
(1292, 108, 'LEMBAGA RISET DAN PENGKAJIAN STRATEGI PEMERINTAHAN '),
(1292, 109, 'LEMBAGA PENGABDIAN MASYARAKAT '),
(1292, 110, 'LEMBAGA PENGAWASAN DAN PENJAMINAN MUTU INTERNAL'),
(1292, 111, 'TEKNOLOGI PENDIDIKAN'),
(1292, 112, 'UNIT PERPUSTAKAAN'),
(1292, 113, 'LABORATORIUM BAHASA'),
(1292, 114, 'LABORATORIUM MUSEUM'),
(1292, 115, 'PROGRAM PASCASARJANA'),
(1292, 116, 'PROGRAM PROFESI KEPAMONGPRAJAAN'),
(1294, 201, 'TU BIRO II'),
(1294, 202, 'BAGIAN UMUM '),
(1294, 203, 'BAGIAN KEUANGAN '),
(1294, 204, 'BAGIAN PERLENGKAPAN DAN PENGELOLAAN BMN'),
(1294, 205, 'BAGIAN ADM. PIMPINAN DAN PROTOKOL'),
(1294, 206, 'UNIT POLIKLINIK'),
(1293, 301, 'TU BIRO III'),
(1293, 302, 'BAGIAN KEPRAJAAN'),
(1293, 303, 'BAGIAN PENGASUHAN PRAJA'),
(1293, 304, 'BAGIAN DISIPLIN PRAJA'),
(1293, 305, 'BAGIAN EKSTRAKURIKULER PRAJA'),
(1293, 306, 'KOMISI DISIPLIN PRAJA'),
(1293, 307, 'UNIT BIMBINGAN DAN KONSELING PRAJA'),
(1286, 401, 'TU BIRO IV'),
(1286, 402, 'BAGIAN KERJA SAMA DAN HUMAS'),
(1286, 403, 'BAGIAN HUKUM, ORGANISASI DAN TATA LAKSANA'),
(1286, 404, 'BAGIAN KEPEGAWAIAN');

-- --------------------------------------------------------

--
-- Table structure for table `unit_sas`
--

CREATE TABLE `unit_sas` (
  `id` int(11) NOT NULL,
  `kode_satker` varchar(50) NOT NULL,
  `id_c` varchar(50) NOT NULL,
  `id_b` varchar(50) NOT NULL,
  `ket` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_sas`
--

INSERT INTO `unit_sas` (`id`, `kode_satker`, `id_c`, `id_b`, `ket`) VALUES
(1, '448302', '401', '1286', 'Kerjasama IPDN'),
(2, '448302', '402', '1286', 'Kebijakan/Regulasi Lingkup IPDN yang ditetapkan'),
(3, '448302', '403', '1286', 'Penanganan Sengketa Hukum Terkait IPDN'),
(4, '448302', '404', '1286', 'Publikasi Informasi dan Penanganan Pengaduan Lingkup IPDN'),
(5, '448302', '405', '1286', 'Nilai Capaian Kinerja Reformasi Birokrasi lingkup IPDN'),
(6, '448302', '406', '1286', 'Layanan Dukungan Manajemen Satker'),
(7, '448302', '101', '1292', 'Penyelenggaraan Pendidikan Kepamongprajaan'),
(8, '448302', '102', '1292', 'Audit Mutu Pendidikan/Akreditasi'),
(9, '448302', '103', '1292', 'Kajian, Penelitian dan Pengabdian Masyarakat Lingkup IPDN'),
(10, '448302', '104', '1292', 'Pengelolaan Layanan Perpustakaan'),
(11, '448302', '105', '1292', 'Pengelolaan Teknologi Informasi Kelembagaan Pendidikan Kepamongprajaan'),
(12, '448302', '106', '1292', 'Jurnal'),
(13, '448302', '107', '1292', 'Pengelolaan Laboratorium Pendidikan Kepamongprajaan'),
(14, '448302', '108', '1292', 'Literatur'),
(15, '448302', '109', '1292', 'RPS/RTM'),
(16, '448302', '110', '1292', 'Perencanaan [SBKU]'),
(17, '448302', '111', '1292', 'Layanan Dukungan Manajemen Satker'),
(18, '448302', '301', '1293', 'Pengelolaan Administrasi Keprajaan dan Alumni'),
(19, '448302', '201', '1294', 'Layanan Sarana dan Prasarana Internal'),
(20, '448302', '202', '1294', 'Layanan Dukungan Manajemen Satker'),
(21, '448302', '203', '1294', 'Layanan Perkantoran'),
(22, '677024', '101', '1295', 'Pengelolaan Pendidikan Kepamongprajaan Kampus Daerah'),
(23, '677024', '102', '1295', 'Pengabdian Masyarakat, Kajian dan Penelitian'),
(24, '677024', '103', '1295', 'Pengelolaan Administrasi Keprajaan dan Kemahasiswaaan'),
(25, '677024', '104', '1295', 'Pengelolaan Unit Perpustakaan'),
(26, '677024', '105', '1295', 'Penyelenggaraan Kerjasama'),
(27, '677024', '106', '1295', 'Layanan Sarana dan Prasarana Internal'),
(28, '677024', '107', '1295', 'Layanan Dukungan Manajemen Satker'),
(29, '677024', '108', '1295', 'Layanan Perkantoran'),
(30, '683070', '101', '1295', 'Pengelolaan Pendidikan Kepamongprajaan Kampus Daerah'),
(31, '683070', '102', '1295', 'Pengabdian Masyarakat, Kajian dan Penelitian'),
(32, '683070', '103', '1295', 'Pengelolaan Administrasi Keprajaan dan Kemahasiswaaan'),
(33, '683070', '104', '1295', 'Pengelolaan Unit Perpustakaan'),
(34, '683070', '105', '1295', 'Penyelenggaraan Kerjasama'),
(35, '683070', '106', '1295', 'Layanan Sarana dan Prasarana Internal'),
(36, '683070', '107', '1295', 'Layanan Dukungan Manajemen Satker'),
(37, '683070', '108', '1295', 'Layanan Perkantoran'),
(38, '677024', '101', '1295', 'Pengelolaan Pendidikan Kepamongprajaan Kampus Daerah'),
(39, '677024', '102', '1295', 'Pengabdian Masyarakat, Kajian dan Penelitian'),
(40, '677024', '103', '1295', 'Pengelolaan Administrasi Keprajaan dan Kemahasiswaaan'),
(41, '677024', '104', '1295', 'Pengelolaan Unit Perpustakaan'),
(42, '677024', '105', '1295', 'Penyelenggaraan Kerjasama'),
(43, '677024', '106', '1295', 'Layanan Sarana dan Prasarana Internal'),
(44, '677024', '107', '1295', 'Layanan Dukungan Manajemen Satker'),
(45, '677024', '108', '1295', 'Layanan Perkantoran'),
(46, '677024', '101', '1295', 'Pengelolaan Pendidikan Kepamongprajaan Kampus Daerah'),
(47, '677024', '102', '1295', 'Pengabdian Masyarakat, Kajian dan Penelitian'),
(48, '677024', '103', '1295', 'Pengelolaan Administrasi Keprajaan dan Kemahasiswaaan'),
(49, '677024', '104', '1295', 'Pengelolaan Unit Perpustakaan'),
(50, '677024', '105', '1295', 'Penyelenggaraan Kerjasama'),
(51, '677024', '106', '1295', 'Layanan Sarana dan Prasarana Internal'),
(52, '677024', '107', '1295', 'Layanan Dukungan Manajemen Satker'),
(53, '677024', '108', '1295', 'Layanan Perkantoran'),
(54, '683070', '101', '1295', 'Pengelolaan Pendidikan Kepamongprajaan Kampus Daerah'),
(55, '683070', '102', '1295', 'Pengabdian Masyarakat, Kajian dan Penelitian'),
(56, '683070', '103', '1295', 'Pengelolaan Administrasi Keprajaan dan Kemahasiswaaan'),
(57, '683070', '104', '1295', 'Pengelolaan Unit Perpustakaan'),
(58, '683070', '105', '1295', 'Penyelenggaraan Kerjasama'),
(59, '683070', '106', '1295', 'Layanan Sarana dan Prasarana Internal'),
(60, '683070', '107', '1295', 'Layanan Dukungan Manajemen Satker'),
(61, '683070', '108', '1295', 'Layanan Perkantoran'),
(62, '448302', '401', '1286', 'Kerjasama IPDN'),
(63, '448302', '402', '1286', 'Kebijakan/Regulasi Lingkup IPDN yang ditetapkan'),
(64, '448302', '403', '1286', 'Penanganan Sengketa Hukum Terkait IPDN'),
(65, '448302', '404', '1286', 'Publikasi Informasi dan Penanganan Pengaduan Lingkup IPDN'),
(66, '448302', '405', '1286', 'Nilai Capaian Kinerja Reformasi Birokrasi lingkup IPDN'),
(67, '448302', '406', '1286', 'Layanan Dukungan Manajemen Satker'),
(68, '448302', '101', '1292', 'Penyelenggaraan Pendidikan Kepamongprajaan'),
(69, '448302', '102', '1292', 'Audit Mutu Pendidikan/Akreditasi'),
(70, '448302', '103', '1292', 'Kajian, Penelitian dan Pengabdian Masyarakat Lingkup IPDN'),
(71, '448302', '104', '1292', 'Pengelolaan Layanan Perpustakaan'),
(72, '448302', '105', '1292', 'Pengelolaan Teknologi Informasi Kelembagaan Pendidikan Kepamongprajaan'),
(73, '448302', '106', '1292', 'Jurnal'),
(74, '448302', '107', '1292', 'Pengelolaan Laboratorium Pendidikan Kepamongprajaan'),
(75, '448302', '108', '1292', 'Literatur'),
(76, '448302', '109', '1292', 'RPS/RTM'),
(77, '448302', '110', '1292', 'Perencanaan [SBKU]'),
(78, '448302', '111', '1292', 'Layanan Dukungan Manajemen Satker'),
(79, '448302', '301', '1293', 'Pengelolaan Administrasi Keprajaan dan Alumni'),
(80, '448302', '201', '1294', 'Layanan Sarana dan Prasarana Internal'),
(81, '448302', '202', '1294', 'Layanan Dukungan Manajemen Satker'),
(82, '448302', '203', '1294', 'Layanan Perkantoran');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `output_sas`
--
ALTER TABLE `output_sas`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `out_pok`
--
ALTER TABLE `out_pok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pelatihan`
--
ALTER TABLE `tbl_pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indexes for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tbl_pns`
--
ALTER TABLE `tbl_pns`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_satker`
--
ALTER TABLE `tbl_satker`
  ADD PRIMARY KEY (`id_satker`);

--
-- Indexes for table `tbl_satker_biro`
--
ALTER TABLE `tbl_satker_biro`
  ADD PRIMARY KEY (`id_satker_biro`);

--
-- Indexes for table `tbl_span`
--
ALTER TABLE `tbl_span`
  ADD PRIMARY KEY (`id_span`);

--
-- Indexes for table `tbl_span_biro`
--
ALTER TABLE `tbl_span_biro`
  ADD PRIMARY KEY (`id_span_biro`);

--
-- Indexes for table `tbl_thl`
--
ALTER TABLE `tbl_thl`
  ADD PRIMARY KEY (`id_thl`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `unit_pok`
--
ALTER TABLE `unit_pok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_sas`
--
ALTER TABLE `unit_sas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `output_sas`
--
ALTER TABLE `output_sas`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `out_pok`
--
ALTER TABLE `out_pok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tbl_pelatihan`
--
ALTER TABLE `tbl_pelatihan`
  MODIFY `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_pns`
--
ALTER TABLE `tbl_pns`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_satker`
--
ALTER TABLE `tbl_satker`
  MODIFY `id_satker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_satker_biro`
--
ALTER TABLE `tbl_satker_biro`
  MODIFY `id_satker_biro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_span`
--
ALTER TABLE `tbl_span`
  MODIFY `id_span` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_span_biro`
--
ALTER TABLE `tbl_span_biro`
  MODIFY `id_span_biro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_thl`
--
ALTER TABLE `tbl_thl`
  MODIFY `id_thl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `unit_sas`
--
ALTER TABLE `unit_sas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
