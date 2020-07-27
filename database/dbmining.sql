-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 06:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmining`
--

-- --------------------------------------------------------

--
-- Table structure for table `atribut`
--

CREATE TABLE `atribut` (
  `id_atribut` int(5) NOT NULL,
  `atribut` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atribut`
--

INSERT INTO `atribut` (`id_atribut`, `atribut`) VALUES
(104, 'IPK'),
(105, 'Kompensasi'),
(106, 'Total');

-- --------------------------------------------------------

--
-- Table structure for table `data_keputusan`
--

CREATE TABLE `data_keputusan` (
  `id_data_keputusan` int(10) NOT NULL,
  `id_rule` bigint(10) NOT NULL,
  `nim_mhs` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_keputusan_kinerja`
--

CREATE TABLE `data_keputusan_kinerja` (
  `id_data_kinerja` int(10) NOT NULL,
  `id_rule_c45` int(5) NOT NULL,
  `nim` int(10) NOT NULL,
  `keputusan_asli` varchar(50) NOT NULL,
  `keputusan_c45` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `nim` bigint(10) NOT NULL,
  `nama_mahasiswa` varchar(34) DEFAULT NULL,
  `nilai_ipk` decimal(3,2) DEFAULT NULL,
  `kompensasi` int(5) DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`nim`, `nama_mahasiswa`, `nilai_ipk`, `kompensasi`, `class`, `status`) VALUES
(4817070013, 'MUHAMMAD ADIPRAWIRA RUDIYAT', '3.24', 0, 'AKTIF', 'DATA TESTING'),
(4817070022, 'FAZEL JUNIO PRIYADITAMA', '3.05', 2700, 'DO', 'DATA TRAINING'),
(4817070023, 'ANIS SINTYA', '3.00', 350, 'AKTIF', 'DATA TRAINING'),
(4817070039, 'BUDI HARTANTO', '3.45', 200, 'AKTIF', 'DATA TRAINING'),
(4817070044, 'MUHAMMAD RAMDAN ANGGADIAKSA', '2.89', 2950, 'DO', 'DATA TRAINING'),
(4817070045, 'REZA HARDIANSYAH', '3.75', 500, 'AKTIF', 'DATA TESTING'),
(4817070053, 'MUHAMMAD RASHAD', '3.46', 0, 'AKTIF', 'DATA TESTING'),
(4817070066, 'MUHAMMAD RIFKY HAIKAL', '3.74', 250, 'AKTIF', 'DATA TESTING'),
(4817070067, 'ZAYN MALIK', '2.55', 500, 'AKTIF', 'DATA TESTING'),
(4817070075, 'IRVAN LAZUARDI', '3.64', 0, 'AKTIF', 'DATA TRAINING'),
(4817070078, 'NIAL HORAN', '3.65', 150, 'AKTIF', 'DATA TESTING'),
(4817070083, 'CHANDRA SINUNGGALIH', '1.79', 12600, 'DO', 'DATA TRAINING'),
(4817070097, 'IRVANSYAH MAULANA', '3.23', 0, 'AKTIF', 'DATA TRAINING'),
(4817070108, 'NAUFAL ARIF WIDODO', '3.19', 900, 'AKTIF', 'DATA TESTING'),
(4817070119, 'BONDAN SATRIO KUKUH DEWANTORO', '3.32', 1400, 'AKTIF', 'DATA TRAINING'),
(4817070122, 'MUHAMMAD THORIQ', '3.82', 0, 'AKTIF', 'DATA TESTING'),
(4817070131, 'DENNYS NABILLA KIRANA PUTRI', '3.43', 250, 'AKTIF', 'DATA TRAINING'),
(4817070143, 'NOR HAFIZ', '3.14', 0, 'AKTIF', 'DATA TESTING'),
(4817070152, 'DHIMAS BAGASKARA GIEN', '3.10', 9400, 'DO', 'DATA TRAINING'),
(4817070161, 'M. RIPKI MUSTOPA', '3.60', 0, 'AKTIF', 'DATA TRAINING'),
(4817070174, 'MOCHAMAD CHIKAL ULUNG PERKASA', '3.17', 2950, 'DO', 'DATA TRAINING'),
(4817070183, 'NOVIA ARUM DEWANDARI', '3.48', 900, 'AKTIF', 'DATA TESTING'),
(4817070196, 'IBNU HUMAJAH', '3.40', 7450, 'DO', 'DATA TRAINING'),
(4817070213, 'SILVESTER SIMBOLON', '3.58', 900, 'AKTIF', 'DATA TESTING'),
(4817070227, 'WIGATI WARIGALIT', '3.83', 6300, 'DO', 'DATA TESTING'),
(4817070238, 'MUHAMMAD FITRAH ALGHIFFARI', '3.68', 2550, 'DO', 'DATA TRAINING'),
(4817070249, 'ACHMAD RIZKY MAULUDI', '3.77', 0, 'AKTIF', 'DATA TRAINING'),
(4817070252, 'ALYANI ZHAFARINA', '3.08', 2700, 'DO', 'DATA TRAINING'),
(4817070261, 'FARHAN YUSUF JANO PUTRA', '3.46', 4500, 'DO', 'DATA TRAINING'),
(4817070273, 'MIFTA M.K', '3.44', 1800, 'DO', 'DATA TRAINING'),
(4817070282, 'AMJAD ALBERTAMA ALJAWAD', '3.54', 900, 'AKTIF', 'DATA TRAINING'),
(4817070291, 'AIDA MAHMUDAH', '3.57', 0, 'AKTIF', 'DATA TRAINING'),
(4817070304, 'MUHAMAD HAEKAL AINUN RAFI', '3.16', 900, 'AKTIF', 'DATA TRAINING'),
(4817070313, 'REZA A.F', '3.44', 0, 'AKTIF', 'DATA TESTING'),
(4817070326, 'FATMA', '3.44', 0, 'AKTIF', 'DATA TRAINING'),
(4817070357, 'FADHIL BASKORO UTOMO', '3.14', 2125, 'DO', 'DATA TRAINING'),
(4817070368, 'GILANG SEGARA BENING', '3.49', 50, 'AKTIF', 'DATA TRAINING'),
(4817070379, 'FIKRI NURFADILLAH', '3.04', 3000, 'DO', 'DATA TRAINING'),
(4817070382, 'RHEA DAVIN ADHISKARA', '3.54', 900, 'AKTIF', 'DATA TESTING'),
(4817070391, 'MUHAMAD ARIJAL', '3.66', 2700, 'DO', 'DATA TRAINING'),
(4817070403, 'AINUN YASSER YULIANTO', '3.95', 2050, 'DO', 'DATA TRAINING'),
(4817070412, 'HAEKAL AKMAL TSAQIF', '3.27', 900, 'AKTIF', 'DATA TRAINING'),
(4817070421, 'MUHAMMAD HIDAYAT', '3.84', 3800, 'DO', 'DATA TRAINING'),
(4817070434, 'RIFQI NAUFAL HUWAIDI', '3.98', 1200, 'AKTIF', 'DATA TESTING'),
(4817070443, 'HALIDZA ESFANDANIA  DAVISYA', '3.87', 300, 'AKTIF', 'DATA TRAINING'),
(4817070456, 'HANA KHAIRUNISA', '3.37', 0, 'AKTIF', 'DATA TRAINING'),
(4817070465, 'RYAN PALEVI ZAKARIA', '2.24', 2950, 'DO', 'DATA TESTING'),
(4817070473, 'MUHAMMAD ILAUDDIN ZHAFRAN', '3.53', 1800, 'DO', 'DATA TRAINING'),
(4817070487, 'FAHMIA AMELIA', '3.64', 1075, 'AKTIF', 'DATA TRAINING'),
(4817070509, 'FATHAN JUNDI RABBANI', '3.96', 1825, 'DO', 'DATA TRAINING'),
(4817070512, 'SULTAN MUHAMMAD DHIYA ULHAQ', '2.89', 4700, 'DO', 'DATA TESTING'),
(4817070521, 'MUHAMMAD NAUFAL RIFQI', '3.03', 2725, 'AKTIF', 'DATA TESTING'),
(4817070542, 'SUTAN DAFFA SATRIA HERTANTO', '3.65', 0, 'AKTIF', 'DATA TESTING'),
(4817070564, 'HAYYU HUDOYO DWIPRADITYO', '3.47', 10000, 'DO', 'DATA TRAINING'),
(4817070573, 'FINA SETIANINGRUM', '3.53', 0, 'AKTIF', 'DATA TRAINING'),
(4817070586, 'TAUFIK MAULANA', '2.98', 7400, 'DO', 'DATA TESTING'),
(4817070595, 'THALHAH AL FAYYADL', '3.06', 2700, 'DO', 'DATA TESTING'),
(4817070603, 'YUDHA PAPUA SETYO ATMAJI', '1.86', 11050, 'DO', 'DATA TESTING'),
(4817070617, 'ZAINUL ARIFIN', '1.78', 12600, 'DO', 'DATA TESTING'),
(4817070639, 'KAISAR PAJAR OKTAVIANUS ENTIMAN', '3.15', 250, 'AKTIF', 'DATA TRAINING'),
(4817070642, 'ALVIANA VINDA APRIYANI', '3.68', 900, 'AKTIF', 'DATA TRAINING'),
(4817070651, 'MUHAMMAD RIFQI RABBANI', '1.99', 8350, 'DO', 'DATA TESTING'),
(4817070663, 'HISANAH SALSABILA', '3.50', 50, 'AKTIF', 'DATA TRAINING'),
(4817070672, 'HUBBAKA GHOYATI', '3.34', 2300, 'DO', 'DATA TRAINING'),
(4817070681, 'AMIN NUGROHO', '3.93', 0, 'AKTIF', 'DATA TRAINING'),
(4817070703, 'NARENDRA NUR WINAHYU', '3.41', 1800, 'DO', 'DATA TESTING'),
(4817070716, 'LIDIA TRI JUNI', '3.02', 0, 'AKTIF', 'DATA TRAINING'),
(4817070725, 'ILHAM SAIFUL AZIS', '3.41', 3650, 'DO', 'DATA TRAINING'),
(4817070747, 'AHMAD FARID MUHARRAM', '3.12', 1800, 'DO', 'DATA TRAINING'),
(4817070758, 'IRFAN EVANDIO', '3.24', 4500, 'DO', 'DATA TRAINING'),
(4817070769, 'MOCHAMAD RAFLI NURFAUZAN', '3.83', 2075, 'DO', 'DATA TRAINING'),
(4817070772, 'ANREL PUTRA', '3.77', 250, 'AKTIF', 'DATA TRAINING'),
(4817070781, 'ANDI NAUFAL SALSABILA', '3.63', 0, 'AKTIF', 'DATA TRAINING'),
(4817070793, 'ARFIYANTO BISMANTORO', '3.77', 1800, 'DO', 'DATA TRAINING'),
(4817070802, 'MUHAMAD NAHROWI', '3.62', 0, 'AKTIF', 'DATA TESTING'),
(4817070811, 'MUHAMMAD RADEN NAUFAL SUHENDI', '1.97', 9250, 'DO', 'DATA TRAINING'),
(4817070824, 'ANISA RAHMAWATI', '3.36', 2700, 'DO', 'DATA TRAINING'),
(4817070833, 'IRWANDI', '3.49', 0, 'AKTIF', 'DATA TRAINING'),
(4817070846, 'EDON SIMON HARIANJA', '3.77', 0, 'AKTIF', 'DATA TRAINING'),
(4817070855, 'BANGKIT AMSAL SULAEMAN GULTOM', '3.99', 1075, 'AKTIF', 'DATA TRAINING'),
(4817070863, 'MUHAMMAD RASHYID MISHBAHUDDIN', '3.93', 900, 'AKTIF', 'DATA TESTING'),
(4817070877, 'ARDHELIA ERWANDA', '3.79', 900, 'AKTIF', 'DATA TRAINING'),
(4817070899, 'ARGYA HERIANTO PUTRA', '3.35', 0, 'AKTIF', 'DATA TRAINING'),
(4817070902, 'ARIO SUTRISNO', '3.97', 1150, 'AKTIF', 'DATA TRAINING'),
(4817070911, 'PANJI DWIJO SUKARNO', '3.96', 900, 'AKTIF', 'DATA TESTING'),
(4817070923, 'BISMA KEMAL HERLAMBANG', '3.38', 900, 'AKTIF', 'DATA TRAINING'),
(4817070932, 'CINDI WIDARINI', '3.74', 0, 'AKTIF', 'DATA TRAINING'),
(4817070941, 'ITA AUGUSTINA TARIGAN', '3.15', 1825, 'DO', 'DATA TRAINING'),
(4817070954, 'DENDY MUHAMMAD ALFAREZ', '3.46', 1800, 'DO', 'DATA TRAINING'),
(4817070973, 'DAFFA MUHAMAD ALMEYDA', '3.16', 1800, 'DO', 'DATA TRAINING'),
(4817070982, 'DAFFA SHIDIQI', '3.23', 14850, 'DO', 'DATA TRAINING'),
(4817070991, 'MUHAMMAD RIDHO PANGESTU', '3.95', 5175, 'DO', 'DATA TRAINING'),
(4817071004, 'FADHYL PRAMADIPTA', '3.12', 0, 'AKTIF', 'DATA TRAINING'),
(4817071013, 'LAILA LUTFIAH', '3.63', 0, 'AKTIF', 'DATA TRAINING'),
(4817071026, 'LAILATUL FITRI', '3.20', 0, 'AKTIF', 'DATA TRAINING'),
(4817071035, 'MOHAMMAD ARIQ MAULANA RAMDHANI', '3.42', 250, 'AKTIF', 'DATA TRAINING'),
(4817071043, 'MUH. IWAN ULINUHA', '3.48', 900, 'AKTIF', 'DATA TRAINING'),
(4817071057, 'MUHAMMAD IMAM FAROUQI', '3.93', 2700, 'DO', 'DATA TRAINING'),
(4817071068, 'FERRIAN REDHIA PRATAMA', '3.66', 1800, 'DO', 'DATA TRAINING'),
(4817071079, 'DIANA ANGGRAINI', '3.99', 0, 'AKTIF', 'DATA TRAINING'),
(4817071082, 'ELGAMES AGUSTIMAN', '3.82', 10450, 'DO', 'DATA TRAINING'),
(4817071091, 'FAHRINI AYUSATIA KUSUMA', '3.53', 0, 'AKTIF', 'DATA TRAINING'),
(4817071103, 'PHIEDO RACHMADIAN YUSFENDRI', '3.10', 925, 'AKTIF', 'DATA TESTING'),
(4817071112, 'GIOVANDY ELDIES', '3.13', 0, 'AKTIF', 'DATA TRAINING'),
(4817071121, 'NADIA NOOR NASHITA', '3.80', 250, 'AKTIF', 'DATA TESTING'),
(4817071134, 'PRABOWO CHANDRA DHINATA', '3.37', 900, 'AKTIF', 'DATA TESTING'),
(4817071143, 'MARYAM HAFIIZHATUL KARIIMAH', '3.36', 0, 'AKTIF', 'DATA TRAINING'),
(4817071173, 'MUHAMMAD KEISHA BANGSAWAN PUTRANTA', '3.00', 0, 'AKTIF', 'DATA TESTING'),
(4817071187, 'RIZKY EKA PAMBUDI', '3.55', 2950, 'DO', 'DATA TESTING'),
(4817071209, 'MIFTA CAHYA ANGGRAINI', '3.85', 0, 'AKTIF', 'DATA TRAINING'),
(4817071221, 'SANDRO HAMONANGAN', '1.89', 3850, 'DO', 'DATA TESTING'),
(4817071251, 'PUTRA PADILAH', '3.30', 1800, 'DO', 'DATA TESTING'),
(4817071264, 'AFI AL FAHRIZ', '3.23', 900, 'AKTIF', 'DATA TRAINING'),
(4817071286, 'RAFIALDY CAKRA MUSSAFA', '3.66', 3850, 'DO', 'DATA TESTING'),
(4817071295, 'AHMAD ALDIEN NURRACHMAN', '3.59', 900, 'AKTIF', 'DATA TRAINING'),
(4817071317, 'RAIHAN AGRO LESTARI', '4.00', 0, 'AKTIF', 'DATA TESTING'),
(4817071339, 'REVA HINDAMI FARIZI', '3.12', 500, 'AKTIF', 'DATA TESTING'),
(4817071342, 'WAHYU MULYADI', '3.48', 0, 'AKTIF', 'DATA TESTING'),
(4817071351, 'MIFTA RAMADHANTY', '3.72', 0, 'AKTIF', 'DATA TRAINING'),
(4817071363, 'MUHAMMAD ALFIS RAMADHAN', '3.55', 2050, 'DO', 'DATA TRAINING'),
(4817071372, 'MUHAMMAD IQBAL', '3.60', 250, 'AKTIF', 'DATA TESTING'),
(4817071381, 'HANIFAH ZAHRO', '4.00', 0, 'AKTIF', 'DATA TRAINING'),
(4817071394, 'HASANAH NUSA AN NAFI', '3.94', 0, 'AKTIF', 'DATA TRAINING'),
(4817071403, 'ALDYANSYAH CHANDRA', '3.93', 0, 'AKTIF', 'DATA TRAINING'),
(4817071416, 'YUSUF NURUL IZZAH', '3.85', 1800, 'DO', 'DATA TESTING'),
(4817071425, 'ALIA ISMAYANTI', '3.82', 0, 'AKTIF', 'DATA TRAINING'),
(4817071433, 'LUTHFIA NABILLA AFRA', '3.55', 1800, 'DO', 'DATA TRAINING'),
(4817071447, 'DANIA AL AZRI MUSYAFIRA', '3.44', 0, 'AKTIF', 'DATA TRAINING'),
(4817071458, 'ARI RAMADHAN', '3.20', 900, 'AKTIF', 'DATA TRAINING'),
(4817071469, 'KALVIAN DI CAHYO', '3.20', 1150, 'AKTIF', 'DATA TRAINING'),
(4817071474, 'FARAH IMANIAR RETTYANA', '3.17', 0, 'AKTIF', 'DATA TRAINING'),
(4817071483, 'PRIMA AGHNIA ADIYATI', '3.07', 6550, 'DO', 'DATA TESTING'),
(4817071496, 'MELENIA WINDA SARI', '3.15', 0, 'AKTIF', 'DATA TRAINING'),
(4817071505, 'ZULIAN ZAM ZAM', '3.36', 2700, 'DO', 'DATA TESTING'),
(4817071668, 'AHLUL ALMUSTAQFIRI', '1.87', 2950, 'DO', 'DATA TRAINING'),
(4817071831, 'AHMAD FAUZAN NAJY', '3.45', 0, 'AKTIF', 'DATA TRAINING'),
(4817071994, 'AMOS CHRIST KEVIN', '3.56', 0, 'AKTIF', 'DATA TRAINING'),
(4817072157, 'ARYA FIKRYHUDA NURFATRIA', '2.95', 1400, 'AKTIF', 'DATA TRAINING'),
(4817072320, 'DWI LUSIANA RAHAYU', '3.22', 1150, 'AKTIF', 'DATA TRAINING'),
(4817072483, 'ADAM NIZAM KUSMARA', '3.23', 1150, 'AKTIF', 'DATA TRAINING'),
(4817072646, 'DIKA ARRODU', '1.86', 1825, 'DO', 'DATA TRAINING'),
(4817072809, 'FAJAR HADID ARIZAL', '3.32', 1050, 'AKTIF', 'DATA TRAINING'),
(4817072819, 'HAMZAH TSABATUL AQDAM', '3.42', 900, 'AKTIF', 'DATA TRAINING');

-- --------------------------------------------------------

--
-- Table structure for table `mining_c45`
--

CREATE TABLE `mining_c45` (
  `id_mining` int(10) NOT NULL,
  `id_data_atribut2` int(5) NOT NULL,
  `jml_kasus_total` int(10) NOT NULL,
  `jml_kasus_do` varchar(5) NOT NULL,
  `jml_kasus_aktif` varchar(5) NOT NULL,
  `entropy` varchar(10) NOT NULL,
  `info_gain` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mining_c45`
--

INSERT INTO `mining_c45` (`id_mining`, `id_data_atribut2`, `jml_kasus_total`, `jml_kasus_do`, `jml_kasus_aktif`, `entropy`, `info_gain`) VALUES
(1, 29, 100, '38', '62', '0.958', ''),
(2, 28, 41, '0', '41', '0', '0.958'),
(3, 27, 20, '0', '20', '0', '0.958'),
(4, 26, 37, '37', '0', '0', '0.958'),
(5, 25, 89, '29', '60', '0.9106', '0.12'),
(6, 24, 3, '2', '1', '0.9183', '0.12'),
(7, 23, 5, '5', '0', '0', '0.12');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_atribut`
--

CREATE TABLE `nilai_atribut` (
  `id_data_atribut` int(11) NOT NULL,
  `id_atribut2` int(5) NOT NULL,
  `nilai` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_atribut`
--

INSERT INTO `nilai_atribut` (`id_data_atribut`, `id_atribut2`, `nilai`) VALUES
(23, 104, 'Kurang Memuaskan'),
(24, 104, 'Memuaskan'),
(25, 104, 'Sangat Memuaskan'),
(26, 105, 'Tidak Baik'),
(27, 105, 'Baik'),
(28, 105, 'Sangat Baik'),
(29, 106, 'Total');

-- --------------------------------------------------------

--
-- Table structure for table `partisi_data`
--

CREATE TABLE `partisi_data` (
  `id_partisi` int(5) NOT NULL,
  `partisi` int(5) NOT NULL,
  `training_do` int(5) NOT NULL,
  `testing_do` int(5) NOT NULL,
  `training_aktif` int(5) NOT NULL,
  `testing_aktif` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partisi_data`
--

INSERT INTO `partisi_data` (`id_partisi`, `partisi`, `training_do`, `testing_do`, `training_aktif`, `testing_aktif`) VALUES
(1, 70, 38, 16, 62, 27);

-- --------------------------------------------------------

--
-- Stand-in structure for view `perbandingan`
-- (See below for the actual view)
--
CREATE TABLE `perbandingan` (
`nim` bigint(10)
,`nama_mahasiswa` varchar(34)
,`nilai_ipk` decimal(3,2)
,`kompensasi` int(5)
,`class` varchar(10)
,`keputusan` varchar(25)
,`status` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pohon`
-- (See below for the actual view)
--
CREATE TABLE `pohon` (
`id_rule_c45` bigint(10)
,`atribut` varchar(30)
,`nilai` varchar(30)
,`keputusan` varchar(25)
);

-- --------------------------------------------------------

--
-- Table structure for table `rule_c45`
--

CREATE TABLE `rule_c45` (
  `id_rule_c45` bigint(10) NOT NULL,
  `id_nilaiatribut` int(5) NOT NULL,
  `keputusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rule_c45`
--

INSERT INTO `rule_c45` (`id_rule_c45`, `id_nilaiatribut`, `keputusan`) VALUES
(478, 28, 'AKTIF'),
(479, 26, 'DO'),
(480, 27, 'AKTIF'),
(481, 26, 'DO'),
(482, 27, 'AKTIF'),
(483, 28, 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','Mahasiswa') NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `nim` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`, `nama_lengkap`, `nim`) VALUES
('admin', 'admin', 'Administrator', 'Shafira Julie', NULL);

-- --------------------------------------------------------

--
-- Structure for view `perbandingan`
--
DROP TABLE IF EXISTS `perbandingan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `perbandingan`  AS  select `u`.`nim` AS `nim`,`u`.`nama_mahasiswa` AS `nama_mahasiswa`,`u`.`nilai_ipk` AS `nilai_ipk`,`u`.`kompensasi` AS `kompensasi`,`u`.`class` AS `class`,`a`.`keputusan` AS `keputusan`,`u`.`status` AS `status` from ((`data_mahasiswa` `u` join `data_keputusan` `i` on(`u`.`nim` = `i`.`nim_mhs`)) join `rule_c45` `a` on(`i`.`id_rule` = `a`.`id_rule_c45`)) ;

-- --------------------------------------------------------

--
-- Structure for view `pohon`
--
DROP TABLE IF EXISTS `pohon`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pohon`  AS  select `a`.`id_rule_c45` AS `id_rule_c45`,`i`.`atribut` AS `atribut`,`u`.`nilai` AS `nilai`,`a`.`keputusan` AS `keputusan` from ((`nilai_atribut` `u` join `atribut` `i` on(`u`.`id_atribut2` = `i`.`id_atribut`)) join `rule_c45` `a` on(`u`.`id_data_atribut` = `a`.`id_nilaiatribut`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atribut`
--
ALTER TABLE `atribut`
  ADD PRIMARY KEY (`id_atribut`);

--
-- Indexes for table `data_keputusan`
--
ALTER TABLE `data_keputusan`
  ADD PRIMARY KEY (`id_data_keputusan`),
  ADD KEY `id_rule` (`id_rule`),
  ADD KEY `id_rule_2` (`id_rule`),
  ADD KEY `nim_mhs` (`nim_mhs`);

--
-- Indexes for table `data_keputusan_kinerja`
--
ALTER TABLE `data_keputusan_kinerja`
  ADD PRIMARY KEY (`id_data_kinerja`),
  ADD KEY `id_rule_c45` (`id_rule_c45`);

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mining_c45`
--
ALTER TABLE `mining_c45`
  ADD PRIMARY KEY (`id_mining`),
  ADD KEY `id_data_atribut2` (`id_data_atribut2`);

--
-- Indexes for table `nilai_atribut`
--
ALTER TABLE `nilai_atribut`
  ADD PRIMARY KEY (`id_data_atribut`),
  ADD KEY `id_atribut2` (`id_atribut2`);

--
-- Indexes for table `partisi_data`
--
ALTER TABLE `partisi_data`
  ADD PRIMARY KEY (`id_partisi`);

--
-- Indexes for table `rule_c45`
--
ALTER TABLE `rule_c45`
  ADD PRIMARY KEY (`id_rule_c45`),
  ADD KEY `id_parent` (`id_nilaiatribut`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_keputusan`
--
ALTER TABLE `data_keputusan`
  MODIFY `id_data_keputusan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mining_c45`
--
ALTER TABLE `mining_c45`
  MODIFY `id_mining` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nilai_atribut`
--
ALTER TABLE `nilai_atribut`
  MODIFY `id_data_atribut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `partisi_data`
--
ALTER TABLE `partisi_data`
  MODIFY `id_partisi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rule_c45`
--
ALTER TABLE `rule_c45`
  MODIFY `id_rule_c45` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=484;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_keputusan`
--
ALTER TABLE `data_keputusan`
  ADD CONSTRAINT `data_keputusan_ibfk_3` FOREIGN KEY (`nim_mhs`) REFERENCES `data_mahasiswa` (`nim`),
  ADD CONSTRAINT `data_keputusan_ibfk_4` FOREIGN KEY (`id_rule`) REFERENCES `rule_c45` (`id_rule_c45`);

--
-- Constraints for table `nilai_atribut`
--
ALTER TABLE `nilai_atribut`
  ADD CONSTRAINT `nilai_atribut_ibfk_1` FOREIGN KEY (`id_atribut2`) REFERENCES `atribut` (`id_atribut`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
