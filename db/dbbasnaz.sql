-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 03:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbasnaz`
--

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `judul_buku` varchar(50) NOT NULL,
  `peminjam` varchar(50) NOT NULL,
  `tgl_pinjam` varchar(25) NOT NULL,
  `tgl_kembali` varchar(25) NOT NULL,
  `lama_pinjam` int(5) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`judul_buku`, `peminjam`, `tgl_pinjam`, `tgl_kembali`, `lama_pinjam`, `keterangan`, `id`) VALUES
('Kancil dan Buaya', 'Kamil', '2018-12-03', '2018-12-19', 16, 'Untuk Anak', 9),
('hidup sehat', 'Yanto', '2019-01-15', '2019-01-17', 2, 'untuk anak', 10);

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `KK` int(16) NOT NULL,
  `no_kk` varchar(255) NOT NULL,
  `jenis_penerima` varchar(25) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `jumlah_bantuan` varchar(255) NOT NULL,
  `penanggung` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_bantuan` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `penerima`
--

INSERT INTO `penerima` (`KK`, `no_kk`, `jenis_penerima`, `nama_penerima`, `nik`, `gender`, `jumlah_bantuan`, `penanggung`, `tanggal`, `jenis_bantuan`, `status`, `keterangan`) VALUES
(49, '123', 'Gharim', 'reasdasad', '123123', 'Laki Laki', '2147483647', 'asdasda', '1111-11-11', '', 'Di Batalkan', 'habis'),
(50, '123', 'Miskin', 'reasda', '123123', 'Laki Laki', '2147483647', 'sdsd', '1111-11-11', '', 'Selesai', 'sadada'),
(51, '123', 'Amil', 'reasda', '123123', 'Laki Laki', '2147483647', 'sdsd', '2412-02-13', '', 'Selesai', 'habis'),
(52, '12313', 'Fakir', 'fsdgsgds', '34266345', 'Perempuan', '2147483647', 'asdasda', '1111-11-11', '', 'Dalam Proses', 'qfdsgsdg'),
(53, '12313', 'Ibnu Sabil', 'reasdaqewq', '123123', 'Laki Laki', '2147483647', 'asdasda', '4444-04-04', '', 'Di Batalkan', 'sadada'),
(54, '2147483647', 'Fisabilillah', 'renaldi magumalam asahajnan', '2147483647', 'Perempuan', '1000000000', 'renaldi magumalam asahajnan', '1111-11-11', '', 'Selesai', 'renaldi magumalam asahajnanrenaldi magumalam asahajnanrenaldi magumalam asahajnanrenaldi magumalam a'),
(55, '2147483647', 'Fisabilillah', 'renaldi magumalam asahajnan', '2147483647', 'Perempuan', '1000000000', 'asdasda', '1111-11-11', '', 'Selesai', 'renaldi magumalam asahajnanrenaldi magumalam asahajnanrenaldi magumalam asahajnanrenaldi magumalam a'),
(56, '2147483647', 'Fisabilillah', 'renaldi magumalam asahajnan', '2147483647', 'Perempuan', '2147483647', 'renaldi magumalam asahajnan', '1111-11-11', '', 'Selesai', 'renaldi magumalam asahajnanrenaldi magumalam asahajnanrenaldi magumalam asahajnanrenaldi magumalam a'),
(57, '3201012301010002', 'Fisabilillah', 'renaldi magumalam asahajnan', '1111111111111111', 'Perempuan', '1000000000000000', 'renaldi magumalam asahajnan', '1111-11-11', '', 'Dalam Proses', 'renaldi magumalam asahajnanrenaldi magumalam asahajnanrenaldi magumalam asahajnanrenaldi magumalam a'),
(58, 'asdad', 'Fakir', 'asdasd', 'asdasd', 'Laki Laki', 'asdasd', 'asdasd', '1111-11-11', '', 'Selesai', 'asdasd'),
(59, 'asdasda', 'Fakir', 'sadsdas', 'dasdasd', 'Laki Laki', 'adasdasd', 'asqweqweqwe', '2222-02-22', '', 'Selesai', 'asdsfdssdg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `paswd` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `paswd`, `email`, `nama`, `level`, `ket`) VALUES
('Baznas Asahan', '21232f297a57a5a743894a0e4a801fc3', 'Baznas Asahan@gmail.com', 'Staff Super User Baznas', 1, 'Staff Super User Data');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`KK`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penerima`
--
ALTER TABLE `penerima`
  MODIFY `KK` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
