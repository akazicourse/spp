-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2020 at 02:57 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppku`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bayar`
--

CREATE TABLE `jenis_bayar` (
  `th_pelajaran` char(9) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `tingkat` varchar(3) NOT NULL,
  `jumlah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_bayar`
--

INSERT INTO `jenis_bayar` (`th_pelajaran`, `jenis`, `tingkat`, `jumlah`) VALUES
('2014/2015', 'PTS', 'II', 9000),
('2019/2020', 'Manasik', 'III', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas` varchar(8) NOT NULL DEFAULT '',
  `wali_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas`, `wali_kelas`) VALUES
('I B', ''),
('I C', ''),
('IG', 'Badak'),
('II A', ''),
('II B', ''),
('II C', ''),
('III A', ''),
('III B', ''),
('III C', ''),
('IV A', ''),
('IV B', ''),
('IV C', ''),
('IZ', 'Afrizal Umar'),
('V A', ''),
('V B', ''),
('V C', ''),
('VI A', ''),
('VI B', ''),
('VI C', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kelas` varchar(8) NOT NULL,
  `nis` char(10) NOT NULL,
  `bulan` varchar(45) NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`kelas`, `nis`, `bulan`, `tgl_bayar`, `jumlah`) VALUES
('X-MIF', '2014201504', 'December', '2014-12-27', 90000),
('X-MIF', '2014201507', 'December', '2014-12-27', 90000),
('X-MIF', '2014201508', 'December', '2014-12-27', 90000),
('X-TIP', '2014201535', 'December', '2014-12-27', 90000),
('X-TKJ', '2014201513', 'December', '2014-12-27', 90000),
('X-TKJ', '2014201536', 'December', '2014-12-27', 90000),
('XI-MIF', '2014201501', 'December', '2014-12-30', 85000);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `idprodi` varchar(4) NOT NULL,
  `prodi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`idprodi`, `prodi`) VALUES
('MIF', 'Manajemen Informatika'),
('TIP', 'Teknologi Industri Pangan'),
('TKJ', 'Teknik Komputer Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` char(10) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kelas` varchar(5) NOT NULL,
  `orang_tua` varchar(50) NOT NULL,
  `no_telp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `kelas`, `orang_tua`, `no_telp`) VALUES
('2014201501', 'MUHAMMAD ALDIN IRFANI', 'VI C', 'Andi', ''),
('2014201503', 'DIMAS SAWONG LAGA', 'VI A', '', ''),
('2014201506', 'ARIEF MAHPUTRA ARDIANSYAH', '', '', ''),
('2014201507', 'ANDRIK KUSNIAWAN', '', '', ''),
('2014201508', 'EKO SUHARTOYO', '', '', ''),
('2014201509', 'JAYIT SETYO PUTRO', '', '', ''),
('2014201510', 'ERIK KURNIAWAN', '', '', ''),
('2014201511', 'RAHMADYAN AZHAR', '', '', ''),
('2014201512', 'VINDRA ABBI BUANA', '', '', ''),
('2014201513', 'CAHYA PRASETYA', '', '', ''),
('2014201514', 'HANIF AROSY AULIYA', '', '', ''),
('2014201515', 'RENDRA ALFATHRIDHO', '', '', ''),
('2014201516', 'AHMAD BADARRUDDIN', '', '', ''),
('2014201517', 'DHIMAS SUNAR MULYONO', '', '', ''),
('2014201518', 'MOH. RIDWAN', '', '', ''),
('2014201519', 'RISTANTO ARYAN PRATAMA', '', '', ''),
('2014201520', 'BAGAS SATRIA PRAKOSO', '', '', ''),
('2014201521', 'M. ALVIAN CAHYA PRADANA', '', '', ''),
('2014201522', 'AGUNG PRASTIYO', '', '', ''),
('2014201523', 'MOHAMAD IHSAN', '', '', ''),
('2014201524', 'MUHAMMAD ZAIQ FAKHRUDDIN', '', '', ''),
('2014201525', 'SULIS STYAWATI', '', '', ''),
('2014201526', 'ALDA SATRIA SUMINAR', '', '', ''),
('2014201527', 'ADIMAS SINTO DEWO', '', '', ''),
('2014201528', 'ENIK SUHARTINI', '', '', ''),
('2014201529', 'DEVI PUSPITASARI', '', '', ''),
('2014201530', 'DEWI ASMAUL SOLEKAH', '', '', ''),
('2014201531', 'YAYUK MARIYANTI', '', '', ''),
('2014201532', 'ELSA TANTRIANA YUNITA DEWI', '', '', ''),
('2014201533', 'RINA SURYANI', '', '', ''),
('2014201534', 'EVI SULISTYONINGRUM', '', '', ''),
('2014201535', 'IDA ZUBAIDAH', '', '', ''),
('2014201536', 'SILVIA MARIANA MUSTIKA', '', '', ''),
('2014201537', 'SISKA KUSUMANING ARUM', '', '', ''),
('2014201538', 'DEWI AFIFAH', '', '', ''),
('2014201539', 'NIKEN LAILATUL ROSYDAWATI', '', '', ''),
('2014201540', 'NINE ANZULKARINA RAMADHANI', '', '', ''),
('2014201541', 'SITI NUR HIMALAYA', '', '', ''),
('2014201542', 'PUTRI PUSPITASARI', '', '', ''),
('2014201543', 'ANA KHOIRUN NISA', '', '', ''),
('2014201544', 'MUHAMMAD MUFFIT KHOIRUDDIN', '', '', ''),
('2014201545', 'YUCKE PRAKOSO', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tapel`
--

CREATE TABLE `tapel` (
  `id` int(11) NOT NULL,
  `tapel` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tapel`
--

INSERT INTO `tapel` (`id`, `tapel`) VALUES
(1, '2012/2013'),
(2, '2013/2014'),
(4, '2014/2015');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `fullname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `admin`, `fullname`) VALUES
(1, 'admin', 'admin', 1, 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_bayar`
--
ALTER TABLE `jenis_bayar`
  ADD PRIMARY KEY (`th_pelajaran`,`tingkat`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kelas`,`nis`,`bulan`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`idprodi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tapel`
--
ALTER TABLE `tapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tapel`
--
ALTER TABLE `tapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
