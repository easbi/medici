-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Nov 2020 pada 05.10
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_medici`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pegawai`
--

CREATE TABLE `master_pegawai` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(90) NOT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `unit_kerja` varchar(13) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_pegawai`
--

INSERT INTO `master_pegawai` (`id`, `nama_pegawai`, `nip`, `jenis_kelamin`, `unit_kerja`, `created_at`, `updated_at`) VALUES
(1, 'ENI LESTARI NINGSIH,S.Si, M.A ', '', 'P', 'KAPUSDIKLAT ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Dr. AHMAD RISWAN NASUTION, S.Si,MT', '', 'L', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'ISNOVIA,  S.IP', '', 'P', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'ANDRI YAMIN, B.St', '', 'P', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'SAADAH, S.ST, M.Si', '', 'P', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'ARTATI PUJIASTUTI,SE, MM', '', 'P', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'YULI CAHYANINGRUM,A.Md.Stat,S.Sos', '', 'P', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'ARTUTI KUSUMANINGRUM, SE', '', 'P', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'SARI NOVIANTI, S.Psi', '', 'P', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'MUHAMMAD HATTA GUSSETIYO,A.Md', '', 'L', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'POETRIJANTI,S.Si', '', 'P', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'SOEKARNO,S.ST,SE,M.Si', '', 'L', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'RENI ANGGRAENI,SST', '', 'P', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'GAWAN DIKAPANDU, A.P.Kb.N ', '', 'L', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'FAUZAN AZIS, A,Md ', '', 'L', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'HUSIN S.Sos ', '', 'L', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'INDAH STYASTUTI,A.Md ', '', 'P', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'MARTINA NURMA DEWI,SST ', '', 'P', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'M.SOLEH ', '', 'L', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'MUHAMMAD KADDAFI S, SST ', '', 'L', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'ELSE HUSLIJAH, S.Tr.Stat ', '', 'P', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'EASBI IKHSAN, S,Tr.Stat ', '', 'L', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'RESTI AMELIA, SST ', '', 'P', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'SAFRUDIN ', '', 'L', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'NARTIM ', '', 'L', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'ACHMAD JUNAEDI ', '', 'L', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'SUPARDI ', '', 'L', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'KADAR SLAMET ', '', 'L', 'TATA USAHA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'TRI NUGRAHADI, S.Si, M.A., Ph. D ', '', 'L', 'DTF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'KARTIKA LISMAWATI, S.St', '', 'P', 'DTF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'SUHERMAN, S.Si, MM', '', 'L', 'DTF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'IKA VIRNARISTANTI, S.Si. M.Si ', '', '', 'DTF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'PUNGKI RESTIA NAWANGSARI, S. Si ', '', 'P', 'DTF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'RITA ANGGRIYANI, S.ST, SE, M.Si', '', 'P', 'DTF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'VALENTINA A. SIMBOLON, S.ST ', '', 'P', 'DTF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'ROHAYATI, S.Si, M.M ', '', 'P', 'DTF ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'CEPY RAMDHANI, SST, M.Stat ', '', 'L', 'DTF ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Dr. WATEKHI, S.Si, MSE ', '', 'L', 'DPK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'SYARIF HIDAYAT, M.Si ', '', 'L', 'DPK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'WINDY PRABOWO, S.Si,MA ', '', 'L', 'DPK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'LESTARI AMBAR KIRANA,S,ST,M.E.K.K', '', 'P', 'DPK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'AGUSTINA DWI WARDHANI,S.Si, M.Stat', '', 'P', 'DPK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'MARDI SANTOSO, S.AP', '', 'L', 'DPK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'FITRIA AGUSTINA,S.ST', '', 'P', 'DPK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'HENDRA YUSDIMAR, S.Kom', '', 'L', 'DPK ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'SYAFI\'I ', '', 'L', 'DPK ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'SAHRUM ', '', 'L', 'DPK ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'YULIANA RIA ULI SITANGGANG, S.Si, M.Si', '', 'P', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'Ir. RINALDO, MM ', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'SRISINTO, SE, MM', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Ir. SRI SAYEKTI, M.Sc ', '', 'P', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Ir. ERYA AFRIANUS ', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'BUDI SUBANDRIYO, SST, M.Stat', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'SUGIHARTO, S.Si, MAB ', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'BUDIYANTO,S.Si, MSE ', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'VERY BASUKI WIBOWO, S.ST, MM', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'YULIANTO,S.Si ', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'MUCHAMMAD YULIUS, SE,M.M,M.Sc.M.BA', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'JIMMY LUDIN, S.ST, M.Si ', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'MUHAMMAD YAHYA,S.ST ', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'DEDE TRINOVIE RAWUNG, S.Si, M.Stat ', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'DAUD ELIZAR, S.ST,M.Si', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'MOHAMMAD IRKHAM,S.Si', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'ARBI SETIAWAN, SST,Mt', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'EUIS NAYASARI,S.ST, M.Si', '', 'P', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'UTAMA ANDRI ARJITA, ST, MT ', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'ERWIN TANUR, M.Si ', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'EKO YULIAN, S.Si, M.Stat ', '', 'L', 'WI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'ANA ULUWIYAH, S.St, MT ', '', 'P', 'WI ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'EKO SAPUTRA ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'WINDY NURIZAL ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'DICKY HANEDA ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'EDA SYARIFUDDIN ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'ERLAN CAHYAN ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'YAYAN RUHIYANA ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'CHAERUDIN PANDI ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'IWAN SANTOSA ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'SONY HERYAMSYAH ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'MUHAMAD HARYADI ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'SAMIN ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'MARJUNI ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'MUHAMAD SOLEH ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'RUSWANDI ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'A. RAHMAT ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'NURMAN ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'ALI KOSIM ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'NASIR ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'HUSIN B ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'SOPIAN ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'RIZKY RUSANDI ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'IIS SULAEMAN ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'KOSASIH ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'SEKAR AYU NITISARI ', '', 'P', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'DEWI NURLITA ', '', 'P', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'IKSAN ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'TANTYO BAHARIAWAN ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'ANINDYA RIZQI WIDODO ', '', 'P', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'NURUL HANIFAH ', '', 'P', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'ADE FAROUK NEIDAWAN ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'BAGUS SUMADIYO ', '', 'L', 'MITRA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_petugas`
--

CREATE TABLE `master_petugas` (
  `id` int(11) NOT NULL,
  `nama_petugas` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_petugas`
--

INSERT INTO `master_petugas` (`id`, `nama_petugas`) VALUES
(1, 'Sekar'),
(2, 'Astri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mcu_pemeriksaan`
--

CREATE TABLE `mcu_pemeriksaan` (
  `id` int(11) NOT NULL,
  `pemeriksaan_ke` int(11) NOT NULL,
  `id_user_diperiksa` int(11) NOT NULL,
  `umur` int(11) NOT NULL,
  `tgl_pemeriksaan` date NOT NULL,
  `petugas` int(11) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `suhu` decimal(3,1) NOT NULL,
  `nadi` int(11) NOT NULL,
  `pernapasan` int(11) NOT NULL,
  `saturasi` int(11) NOT NULL,
  `tensi_sistol` int(11) NOT NULL,
  `tensi_diastol` int(11) NOT NULL,
  `asam_urat` decimal(3,1) NOT NULL,
  `gula_puasa` int(11) NOT NULL,
  `gula_sewaktu` int(11) DEFAULT NULL,
  `kolestrol` int(11) NOT NULL,
  `rekomendasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mcu_pemeriksaan`
--

INSERT INTO `mcu_pemeriksaan` (`id`, `pemeriksaan_ke`, `id_user_diperiksa`, `umur`, `tgl_pemeriksaan`, `petugas`, `tinggi_badan`, `berat_badan`, `suhu`, `nadi`, `pernapasan`, `saturasi`, `tensi_sistol`, `tensi_diastol`, `asam_urat`, `gula_puasa`, `gula_sewaktu`, `kolestrol`, `rekomendasi`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 56, '2020-11-09', 1, 155, 40, '36.4', 100, 100, 100, 120, 90, '10.0', 100, 100, 300, '<p>123</p>', '2020-11-09 00:05:12', '2020-11-09 00:05:12'),
(2, 1, 2, 47, '2020-10-13', 1, 164, 67, '36.5', 78, 20, 92, 120, 90, '7.1', 91, NULL, 205, '<p>Asam Urat</p>', '2020-11-09 00:27:12', '2020-11-09 00:27:12'),
(3, 1, 4, 56, '2020-11-14', 1, 176, 65, '36.3', 80, 18, 96, 100, 70, '9.2', 160, NULL, 160, '<p>wq</p>', '2020-11-09 00:32:48', '2020-11-09 00:32:48'),
(4, 1, 11, 56, '2020-10-14', 1, 152, 54, '36.7', 98, 20, 98, 130, 100, '8.2', 63, NULL, 211, '<p>12</p>', '2020-11-09 00:34:40', '2020-11-09 00:34:40'),
(5, 1, 23, 37, '2020-11-09', 1, 159, 44, '36.9', 12, 88, 99, 140, 110, '10.1', 100, NULL, 290, '<p>WW</p>', '2020-11-09 03:43:41', '2020-11-09 03:43:41'),
(6, 2, 23, 38, '2020-11-09', 1, 26, 100, '36.7', 100, 100, 100, 200, 110, '8.9', 100, 100, 500, '<p>100</p>', '2020-11-09 03:47:36', '2020-11-09 03:47:36'),
(9, 2, 2, 55, '2020-11-10', 1, 155, 55, '36.0', 121, 12, 21, 150, 120, '6.0', 12, 12, 344, '<p>WW</p>', '2020-11-09 21:53:47', '2020-11-09 21:53:47'),
(10, 1, 7, 40, '2020-11-10', 1, 155, 66, '36.0', 15, 66, 88, 125, 89, '11.0', 100, 100, 300, '<p>wa</p>', '2020-11-10 06:59:33', '2020-11-10 06:59:33'),
(11, 2, 4, 35, '2020-11-11', 1, 166, 88, '29.0', 100, 100, 100, 300, 400, '50.0', 11, 120, 450, '<p>12</p>', '2020-11-10 21:07:13', '2020-11-10 21:07:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_pegawai`
--
ALTER TABLE `master_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_petugas`
--
ALTER TABLE `master_petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mcu_pemeriksaan`
--
ALTER TABLE `mcu_pemeriksaan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_pegawai`
--
ALTER TABLE `master_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `master_petugas`
--
ALTER TABLE `master_petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mcu_pemeriksaan`
--
ALTER TABLE `mcu_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
