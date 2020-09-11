-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2020 at 05:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_suratk` int(15) NOT NULL,
  `no_suratk` varchar(15) NOT NULL,
  `id_suratm` int(15) NOT NULL,
  `tgl_suratkeluar` date NOT NULL,
  `file_suratk` varchar(100) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `id_user` int(15) NOT NULL,
  `tujuan_surat` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_suratk`, `no_suratk`, `id_suratm`, `tgl_suratkeluar`, `file_suratk`, `perihal`, `id_user`, `tujuan_surat`, `status`) VALUES
(8, 'SK1/PTP/24/7/20', 40, '2020-07-24', 'Company Profile 2019.pdf', 'Membalas Surat Disposisi', 10, 'Kebun Cimahi', 'Diterima'),
(9, 'SK2/PTP/24/7/20', 39, '2020-07-24', 'SURAT IZIN ORANG TUA.pdf', 'Membalas Surat Disposisis', 10, 'Kebun Cimahi', 'Menunggu'),
(10, 'SK/21/7/2020', 35, '2020-07-24', 'Muhammad Hanafi_1164092_D4TI3B.pdf', 'Membalas Surat Disposisi', 10, 'Kebun Cimahi', 'Menunggu'),
(11, 'SKK/29/2020', 43, '2020-07-29', 'Product Catalogue.pdf', 'Membalas Surat Disposisi', 10, 'Kebun Cimahi', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_suratm` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `no_suratm` varchar(20) NOT NULL,
  `tgl_suratmasuk` date NOT NULL,
  `disposisi_tujuan` varchar(30) NOT NULL,
  `file_surat` varchar(100) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `perihal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_suratm`, `id_user`, `no_suratm`, `tgl_suratmasuk`, `disposisi_tujuan`, `file_surat`, `keterangan`, `perihal`) VALUES
(35, 10, 'KT/21/2020', '2020-07-21', 'Audit Internal', 'SURAT IZIN ORANG TUA.pdf', 'Selesai', 'Kunjungan Industri'),
(36, 12, 'TK/21/2020', '2020-07-21', 'Teknologi Informasi', 'JURNAL GUNAWAN.pdf', 'Selesai', 'Pengajuan Tenda Payung'),
(39, 10, 'SK/2/12', '2020-07-22', 'Keuangan', 'cv gunawan.pdf', 'Selesai', 'ANGGARANDANA'),
(40, 10, 'SK/24/7/2020', '2020-07-24', 'Audit Internal', 'Ketentuan Absensi Karyawan WFH_29052020.pdf', 'Selesai', 'Kunjungan Industri'),
(41, 10, 'Sk/12/213', '2020-07-24', 'Sekretaris Perusahaan', '1-anand2013-ETL.pdf', 'Diproses', 'lomba1'),
(42, 10, '112233', '2020-07-25', 'Audit Internal', 'SURAT IZIN ORANG TUA.pdf', 'terkirim', 'asa'),
(43, 10, 'sk/29/2020', '2020-07-29', 'Hukum & Umum', '1-anand2013-ETL.pdf', 'Selesai', 'hukum dagang');

-- --------------------------------------------------------

--
-- Table structure for table `tracking_suratk`
--

CREATE TABLE `tracking_suratk` (
  `id_trackingsk` int(15) NOT NULL,
  `id_suratk` int(15) NOT NULL,
  `keterangan_trackingsk` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tgl_tracking` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking_suratk`
--

INSERT INTO `tracking_suratk` (`id_trackingsk`, `id_suratk`, `keterangan_trackingsk`, `status`, `tgl_tracking`) VALUES
(1, 8, 'Diterima Oleh Sekretariat', 'Diproses', '2020-08-07'),
(2, 8, 'Dikirim Kepada Kebun Cimahi', ' ', '2020-08-07'),
(3, 8, 'Diterima Oleh Kebun Cimahi', ' ', '2020-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `tracking_suratm`
--

CREATE TABLE `tracking_suratm` (
  `id_tracking` int(15) NOT NULL,
  `id_suratm` int(15) NOT NULL,
  `keterangan_tracking` varchar(200) NOT NULL,
  `tgl_tracking` date NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking_suratm`
--

INSERT INTO `tracking_suratm` (`id_tracking`, `id_suratm`, `keterangan_tracking`, `tgl_tracking`, `status`) VALUES
(64, 35, 'Diterima Oleh Sekretariat', '2020-07-21', 'Selesai'),
(65, 35, 'Dikirim Kepada Audit Internal', '2020-07-21', ' '),
(66, 35, 'Diterima Oleh Audit Internal', '2020-07-21', ' '),
(67, 36, 'Diterima Oleh Sekretariat', '2020-07-21', 'Selesai'),
(68, 36, 'Dikirim Kepada Teknologi Informasi', '2020-07-21', ' '),
(69, 36, 'Diterima Oleh Teknologi Informasi', '2020-07-21', ' '),
(70, 39, 'Diterima Oleh Sekretariat', '2020-07-22', 'Selesai'),
(71, 39, 'Dikirim Kepada Keuangan', '2020-07-22', ' '),
(72, 39, 'Diterima Oleh Keuangan', '2020-07-22', ' '),
(73, 40, 'Diterima Oleh Sekretariat', '2020-07-24', 'Selesai'),
(74, 40, 'Dikirim Kepada Audit Internal', '2020-07-24', ' '),
(75, 40, 'Diterima Oleh Audit Internal', '2020-07-24', ' '),
(76, 41, 'Diterima Oleh Sekretariat', '2020-07-24', 'Selesai'),
(77, 43, 'Diterima Oleh Sekretariat', '2020-07-29', 'Selesai'),
(78, 43, 'Dikirim Kepada Hukum & Umum', '2020-07-29', ' '),
(79, 43, 'Diterima Oleh Hukum & Umum', '2020-07-29', ' '),
(80, 35, 'Diterima Oleh Audit Internal', '2020-08-07', ' '),
(81, 35, 'Diterima Oleh Audit Internal', '2020-08-07', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `divisi` varchar(30) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `lokasi_kantor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `jabatan`, `divisi`, `hak_akses`, `lokasi_kantor`) VALUES
(8, 'gunawan maulana', 'gungun', '123', 'Kepala Sub Divisi', 'Sekretaris Perusahaan', 'sekretariat', 'Kantor Pusat'),
(10, 'ganawan malana', 'gangan', '123', 'Staff', 'Kebun Teh 1', 'pegawai kebun', 'Kebun Cimahi'),
(11, 'giniwin milini', 'gingin', '123', 'Kepala Divisi', 'Teknologi Informasi', 'kadiv', 'Kantor Pusat'),
(12, 'gonowon molono', 'gogon', '123', 'Staff', 'Kebun Teh 2', 'pegawai kebun', 'Kebun Cicaheum'),
(13, 'genewen melene', 'gengen', '123', 'Kepala Divisi', 'Audit Internal', 'kadiv', 'Kantor Pusat'),
(14, 'ilini', 'ilin', '123', 'Staff', 'Sekretaris Perusahaan', 'sekretariat', 'Kantor Pusat'),
(15, 'ulun', 'ulun', '123', 'Kepala Divisi', 'Perencanaan & Pengembangan Bis', 'kadiv', 'Kantor Pusat'),
(16, 'alan', 'alan', '123', 'Staff', 'Kebun Karet', 'pegawai kebun', 'Kebun cicades'),
(17, 'awan', 'awan', '123', 'Kepala Divisi', 'Hukum & Umum', 'kadiv', 'Kantor Pusat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_suratk`),
  ADD KEY `id_suratm` (`id_suratm`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_suratm`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tracking_suratk`
--
ALTER TABLE `tracking_suratk`
  ADD PRIMARY KEY (`id_trackingsk`),
  ADD KEY `id_suratk` (`id_suratk`);

--
-- Indexes for table `tracking_suratm`
--
ALTER TABLE `tracking_suratm`
  ADD PRIMARY KEY (`id_tracking`),
  ADD KEY `id_suratm` (`id_suratm`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_suratk` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_suratm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tracking_suratk`
--
ALTER TABLE `tracking_suratk`
  MODIFY `id_trackingsk` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tracking_suratm`
--
ALTER TABLE `tracking_suratm`
  MODIFY `id_tracking` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_ibfk_1` FOREIGN KEY (`id_suratm`) REFERENCES `surat_masuk` (`id_suratm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_keluar_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `surat_masuk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tracking_suratk`
--
ALTER TABLE `tracking_suratk`
  ADD CONSTRAINT `tracking_suratk_ibfk_1` FOREIGN KEY (`id_suratk`) REFERENCES `surat_keluar` (`id_suratk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tracking_suratm`
--
ALTER TABLE `tracking_suratm`
  ADD CONSTRAINT `tracking_suratm_ibfk_1` FOREIGN KEY (`id_suratm`) REFERENCES `surat_masuk` (`id_suratm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
