-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 31 Jan 2015 pada 13.36
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
('12346579809876432', 'Sri Iriani P', 'Jl. Panjang Dalam', '3A', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prosentase`
--

CREATE TABLE IF NOT EXISTS `prosentase` (
`id_pros` int(5) NOT NULL,
  `sikap` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pengetahuan` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ketrampilan` decimal(10,2) NOT NULL DEFAULT '0.00'
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id_user` int(10) NOT NULL,
  `group` enum('admin','guru','wali') NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `group`, `password`) VALUES
(1, 'admin', '57a260657919ceab7f987a7bd52bd79b');

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
MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prosentase`
--
ALTER TABLE `prosentase`
MODIFY `id_pros` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
ADD CONSTRAINT `FK_kelas_guru` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON UPDATE CASCADE;

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
