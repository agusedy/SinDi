-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 31 Jan 2015 pada 12.59
-- Versi Server: 5.5.40-0ubuntu1
-- PHP Version: 5.5.12-2ubuntu4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kelas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `alamat_guru` varchar(100) NOT NULL,
  `gol` varchar(5) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `alamat_guru`, `gol`, `id_user`) VALUES
('109876543211234567', 'Sri Indarti', 'Jam Merah', '3A', 34),
('123456787654321234', 'Juki', 'Pilo', '5A', 35),
('123456789098765432', 'Sri Iriani Zulaekah', 'Jl. Kalingga Dalam Raya I', '3A', 16),
('12345678964554664', 'Rois', 'Jl Apa', '3C', 38),
('19720205200701101', 'Iswinardi', 'Jl. Kalingga Dalam No. 9', '3A', 22),
('212354515962126462', 'angga', 'demak', '3C', 63),
('213654566221264554', 'emma', 'semarang', '3A', 65),
('231564597855216663', 'nadib', 'demak', '3A', 64),
('240401111300359876', 'Serty', 'Jl. Gajah Raya I No. 18', '3A', 36),
('321264564894126128', 'dwi', 'salatiga', '3A', 61),
('355446215651355625', 'artia  putri', 'semarang', '3A', 66),
('362745630985671236', 'SUTEKNO', 'JL.SAPTA PRASETYA', '3A', 56),
('437659823756390187', 'JUMADI', 'JL.SAPTA PRASETYA UTARA', '3C', 57),
('564654223123545656', 'ratna', 'demak', '3A', 67),
('654532156899584231', 'dani', 'demak', '3C', 62),
('789456325431287674', 'nhghjk', 'kljhgffd', '3A', 59),
('856374562847561243', 'adi', 'jl.gubug raya', '3C', 60),
('918273645039476387', 'Pudjiastuti', 'Jl. Parang baraong VIII No. 11', '3B', 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`id_kelas` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `kelas` int(5) NOT NULL,
  `ruang` varchar(5) NOT NULL,
  `thn_ajaran` varchar(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nip`, `kelas`, `ruang`, `thn_ajaran`) VALUES
(5, '19720205200701101', 1, 'A', '2014'),
(10, '109876543211234567', 1, 'B', '2014'),
(11, '123456787654321234', 2, 'A', '2014'),
(13, '240401111300359876', 2, 'A', '2015'),
(14, '918273645039476387', 2, 'B', '2015'),
(15, '109876543211234567', 1, 'A', '2015'),
(18, '109876543211234567', 1, 'A', '2013'),
(25, '564654223123545656', 1, 'A', '2010'),
(26, '654532156899584231', 1, 'B', '2010'),
(27, '212354515962126462', 1, 'C', '2010');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
`id_nilai` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `observa` int(1) NOT NULL DEFAULT '1',
  `pdiri` int(1) NOT NULL DEFAULT '1',
  `pteman` int(1) NOT NULL DEFAULT '1',
  `cttnguru` int(1) NOT NULL DEFAULT '1',
  `ntulis` int(1) NOT NULL DEFAULT '1',
  `nlisan` int(1) NOT NULL DEFAULT '1',
  `pnguasaan` int(1) NOT NULL DEFAULT '1',
  `kinerja` int(1) NOT NULL DEFAULT '1',
  `project` int(1) NOT NULL DEFAULT '1',
  `pfolio` int(1) NOT NULL DEFAULT '1',
  `sikp` decimal(10,2) NOT NULL,
  `ptauan` decimal(10,2) NOT NULL,
  `trampilan` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `rankkls` int(11) NOT NULL,
  `rankpar` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_kelas`, `nisn`, `observa`, `pdiri`, `pteman`, `cttnguru`, `ntulis`, `nlisan`, `pnguasaan`, `kinerja`, `project`, `pfolio`, `sikp`, `ptauan`, `trampilan`, `total`, `rankkls`, `rankpar`) VALUES
(1, 5, '9988776601', 5, 2, 3, 3, 1, 3, 4, 4, 1, 4, 1.30, 0.80, 0.90, 1.00, 3, 5),
(2, 13, '9988776601', 4, 4, 5, 5, 5, 4, 3, 3, 4, 5, 1.80, 1.20, 1.20, 4.20, 3, 3),
(3, 5, '9988776602', 5, 3, 3, 2, 4, 2, 4, 1, 4, 5, 1.30, 1.00, 1.00, 1.10, 2, 4),
(4, 13, '9988776602', 5, 5, 4, 5, 5, 4, 5, 5, 5, 4, 1.90, 1.40, 1.40, 4.70, 1, 1),
(5, 5, '9988776604', 4, 5, 5, 5, 3, 2, 2, 5, 5, 5, 1.90, 0.70, 1.50, 1.37, 1, 2),
(8, 15, '9988776603', 5, 5, 5, 3, 1, 1, 2, 2, 4, 3, 1.80, 0.40, 0.90, 1.03, 2, 0),
(9, 15, '9988776611', 5, 5, 4, 1, 4, 4, 4, 3, 1, 1, 1.50, 1.20, 0.50, 1.07, 1, 0),
(10, 15, '9988776612', 5, 4, 2, 1, 1, 2, 1, 2, 3, 5, 1.20, 0.40, 1.00, 0.87, 3, 0),
(11, 10, '9988776605', 5, 5, 3, 3, 2, 4, 5, 4, 4, 5, 1.60, 1.10, 1.30, 4.00, 2, 3),
(12, 10, '9988776610', 4, 5, 5, 5, 5, 5, 5, 4, 4, 3, 1.90, 1.50, 1.10, 4.50, 1, 1),
(13, 13, '9988776604', 4, 4, 4, 4, 4, 5, 5, 4, 4, 5, 1.60, 1.40, 1.30, 4.30, 2, 2),
(14, 14, '9988776605', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0, 4),
(15, 14, '9988776610', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0, 5),
(31, 15, '9988776616', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0, 0),
(45, 25, '9988776617', 5, 4, 5, 5, 5, 5, 5, 4, 4, 4, 1.90, 1.50, 1.20, 4.60, 1, 0),
(46, 25, '9988776618', 5, 1, 1, 1, 1, 1, 4, 3, 2, 4, 0.80, 0.60, 0.90, 2.30, 5, 0),
(47, 25, '9988776619', 4, 4, 1, 5, 5, 2, 5, 5, 5, 5, 1.40, 1.20, 1.50, 4.10, 3, 0),
(50, 26, '9988776622', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0, 0),
(51, 26, '9988776623', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0, 0),
(52, 26, '9988776624', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0, 0),
(53, 26, '9988776625', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0, 0),
(55, 27, '9988776627', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0, 0),
(56, 27, '9988776628', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0, 0),
(57, 27, '9988776626', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0, 0),
(58, 27, '9988776629', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0, 0),
(59, 27, '9988776630', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0, 0),
(61, 25, '9988776620', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0, 0),
(62, 25, '9988776621', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0, 0),
(63, 27, '9988776631', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prosentase`
--

CREATE TABLE IF NOT EXISTS `prosentase` (
`id_pros` int(5) NOT NULL,
  `sikap` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pengetahuan` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ketrampilan` decimal(10,2) DEFAULT '0.00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `prosentase`
--

INSERT INTO `prosentase` (`id_pros`, `sikap`, `pengetahuan`, `ketrampilan`) VALUES
(1, 0.40, 0.30, 0.30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nisn` varchar(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `alamat_siswa` varchar(100) NOT NULL,
  `ortu` varchar(50) NOT NULL,
  `thn_masuk` varchar(5) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama_siswa`, `alamat_siswa`, `ortu`, `thn_masuk`, `id_user`) VALUES
('9988776601', 'Dwana Yoan', 'Jl. Sendangsari Utara VI No.14', 'Paijo', '2014', 17),
('9988776602', 'Riardi Dirgantara', 'Jl. Sendang Sari Utara VIII No. 10', 'Petrus Setyo Widodo', '2014', 19),
('9988776603', 'Poedjoko Hermanto', 'Jl. Perum Korpri Kalicari No. 11', 'Parno', '2015', 18),
('9988776604', 'Aji Widhi', 'Jl. Gajah Dalam V No. 4', 'Widhi', '2014', 20),
('9988776605', 'M Dwi Nuryanto', 'Jl. Singa Dalam Raya', 'Nuryanto', '2014', 21),
('9988776606', 'Kevin Budi Hartadi', 'Jl. Parang Jeruk Raya', 'Siti Nur Arifah', '2013', 24),
('9988776607', 'Setyo', 'Sendang', 'Wid', '2013', 26),
('9988776608', 'Aryo', 'Sendang ijo ', 'Ijo', '2013', 27),
('9988776609', 'Sema Langden', 'Rantepao', 'Saratu', '2013', 28),
('9988776610', 'Hira', 'Sampangan', 'Satryo', '2014', 29),
('9988776611', 'Bagas', 'Sendang Merah', 'Tri', '2015', 30),
('9988776612', 'Rytes', 'kolam merah', 'Roald K', '2015', 31),
('9988776613', 'Rest', 'Pedurungan', 'Tunggo', '2012', 32),
('9988776614', 'Jiku', 'Kolam BIru', 'kepo', '2012', 33),
('9988776615', 'Topek', 'Sendang', 'Ahmad', '2012', 37),
('9988776616', 'Ami Nur Nidiana', 'JL. Palapa Raya', 'Edy Mulyanto', '2015', 40),
('9988776617', 'vian', 'JL.PEDURUNGAN KIDUL', 'BUDI', '2010', 41),
('9988776618', 'ENI', 'JL.SINARWALUYO', 'AGUS', '2010', 42),
('9988776619', 'TINA', 'JL.SENDANG GUWO', 'ENI', '2010', 43),
('9988776620', 'RISA', 'JL.SINAR', 'UMI', '2010', 44),
('9988776621', 'BUDI', 'JL.HIKMAH', 'SANTOSO', '2010', 45),
('9988776622', 'ANGGRAENI', 'JL.PEDURUNGAN', 'NUGROHO', '2010', 46),
('9988776623', 'RIFQI', 'JL.ALHIKMAH', 'RIDLO', '2010', 47),
('9988776624', 'ROSYID', 'JL.ALHIKMAH RAYA', 'AHMAD', '2010', 48),
('9988776625', 'AHMAD', 'JL.PEDURUNGAN', 'EDY', '2010', 49),
('9988776626', 'UCHA', 'JL.SENDANG GUWO RAYA', 'INTAN', '2010', 50),
('9988776627', 'TOMO', 'JL.HIKMAH RAYA', 'ALLY', '2010', 51),
('9988776628', 'BAMBANG', 'JL.PEDURUNGAN RAYA', 'FATIMAH', '2010', 52),
('9988776629', 'ABI', 'JL.PEDURUNGAN', 'OGAH', '2010', 53),
('9988776630', 'UMI', 'JL.ALHIKMAH', 'EDO', '2010', 54),
('9988776631', 'WIBI', 'JL.HIKMAH', 'TEGUH', '2010', 55);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id_user` int(10) NOT NULL,
  `group` enum('admin','guru','wali') NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `group`, `password`) VALUES
(16, 'admin', '4209facdda71a98f8c8a942564ad07d4'),
(17, 'wali', '889752dcb81b4ad98ad6e36e9db2cd43'),
(18, 'wali', '4209facdda71a98f8c8a942564ad07d4'),
(19, 'wali', '79c765d12709c241fb9004adc46209c7'),
(20, 'wali', '8d045450ae16dc81213a75b725ee2760'),
(21, 'wali', '7aa2602c588c05a93baf10128861aeb9'),
(22, 'guru', '1996b97f5732a056542036235a55ea2f'),
(23, 'guru', 'd41d8cd98f00b204e9800998ecf8427e'),
(24, 'wali', '580cc107aff211987a19cdfd5b1b3457'),
(25, 'wali', 'edc20c2cf9748c4130f28cc6258893f5'),
(26, 'wali', 'e23b1738985819268dd7b165bc836b09'),
(27, 'wali', 'da078e3438588f596eb34346a8fd68ba'),
(28, 'wali', 'ab330f7533cbbdf16799afb1a541f825'),
(29, 'wali', '935c0cb0999e29cf05e320a999bdfd3d'),
(30, 'wali', '7d6ffd3f29290ff05c1c59c919663e11'),
(31, 'wali', '078d8e599247255b6abdc33180971d0e'),
(32, 'wali', 'b741bab39ad703016ff7cfc0c56b6103'),
(33, 'wali', '88711d5024bc77381c69d7e62b635755'),
(34, 'guru', '4209facdda71a98f8c8a942564ad07d4'),
(35, 'guru', 'd41d8cd98f00b204e9800998ecf8427e'),
(36, 'guru', '4209facdda71a98f8c8a942564ad07d4'),
(37, 'wali', '646e761214124cd82bddd6e738da7585'),
(38, 'guru', 'd41d8cd98f00b204e9800998ecf8427e'),
(39, 'wali', 'c775fe030b836892c307a91021365271'),
(40, 'wali', 'c775fe030b836892c307a91021365271'),
(41, 'wali', '37b5a62c54411916e78dc1b60afc2158'),
(42, 'wali', 'cdd7f83b29cbda3b2e1fd6d6793602bb'),
(43, 'wali', '656f8fb96fbe2ed553e8cff8a8bd0368'),
(44, 'wali', '572724de899b4009ff880476ad89bf44'),
(45, 'wali', '769b949ad9ecd8916c47cf1d542c8f48'),
(46, 'wali', 'baa42502d99a694f3f95d257908c424f'),
(47, 'wali', '34a27145af1f332f2ebb33cf2bf5b453'),
(48, 'wali', '4e779c7711d863e814de39b615465a54'),
(49, 'wali', '360db8d8d893826b8165dcd56485181b'),
(50, 'wali', 'e8f084345ebc197b0f2488c18115adb8'),
(51, 'wali', '95e85f5c610678706d4fecde09a49104'),
(52, 'wali', '02bac476fc4512539dbd35902d124700'),
(53, 'wali', '68a74c96d6975638a9fbc4ccf822d0a5'),
(54, 'wali', '7f557c8910eb6b9f60b78a4a6986e540'),
(55, 'wali', 'af48e73372219f3cc43e523b270c6dfc'),
(56, 'guru', '4209facdda71a98f8c8a942564ad07d4'),
(57, 'guru', '4209facdda71a98f8c8a942564ad07d4'),
(58, 'guru', 'd41d8cd98f00b204e9800998ecf8427e'),
(59, 'guru', 'd41d8cd98f00b204e9800998ecf8427e'),
(60, 'guru', '0467824f506719dac4456f8f81149fe3'),
(61, 'guru', 'd39934ce111a864abf40391f3da9cdf5'),
(62, 'guru', '25bbdcd06c32d477f7fa1c3e4a91b032'),
(63, 'guru', '8479c86c7afcb56631104f5ce5d6de62'),
(64, 'guru', '7cd86ecb09aa48c6e620b340f6a74592'),
(65, 'guru', '81dc9bdb52d04dc20036dbd8313ed055'),
(66, 'guru', '81dc9bdb52d04dc20036dbd8313ed055'),
(67, 'guru', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
 ADD PRIMARY KEY (`nip`), ADD UNIQUE KEY `nama_guru` (`nama_guru`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id_kelas`), ADD KEY `nip` (`nip`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
 ADD PRIMARY KEY (`id_nilai`), ADD KEY `id_kelas` (`id_kelas`), ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `prosentase`
--
ALTER TABLE `prosentase`
 ADD PRIMARY KEY (`id_pros`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`nisn`), ADD UNIQUE KEY `nama_siswa` (`nama_siswa`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `prosentase`
--
ALTER TABLE `prosentase`
MODIFY `id_pros` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
ADD CONSTRAINT `FK_guru_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
ADD CONSTRAINT `FK_wali_kelas_guru` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
ADD CONSTRAINT `FK_nilai_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_nilai_siswa` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
ADD CONSTRAINT `FK_siswa_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
