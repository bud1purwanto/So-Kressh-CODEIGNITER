-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2018 at 04:23 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sik`
--

-- --------------------------------------------------------

--
-- Table structure for table `gudangbahanjadi`
--

CREATE TABLE `gudangbahanjadi` (
  `idGudangBahanJadi` int(25) NOT NULL,
  `namaProduk` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `idProduksi` int(25) NOT NULL,
  `idKualitas` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudangbahanjadi`
--

INSERT INTO `gudangbahanjadi` (`idGudangBahanJadi`, `namaProduk`, `jumlah`, `harga`, `idProduksi`, `idKualitas`) VALUES
(2, 'keripik mangga', 21, 21000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `idPengadaan` int(10) NOT NULL,
  `namaBahan` varchar(50) NOT NULL,
  `jumlah` int(25) NOT NULL,
  `harga` int(25) NOT NULL,
  `idKualitas` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`idPengadaan`, `namaBahan`, `jumlah`, `harga`, `idKualitas`) VALUES
(1, 'mangga', 200, 200000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `idProduksi` int(25) NOT NULL,
  `namaBarang` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `idPengadaan` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`idProduksi`, `namaBarang`, `harga`, `idPengadaan`) VALUES
(1, 'keripik mangga', 20000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `qualitycontrol`
--

CREATE TABLE `qualitycontrol` (
  `idKualitas` int(25) NOT NULL,
  `kualitasBarang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualitycontrol`
--

INSERT INTO `qualitycontrol` (`idKualitas`, `kualitasBarang`) VALUES
(1, 'bagus'),
(2, 'buruk');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gudangbahanjadi`
--
ALTER TABLE `gudangbahanjadi`
  ADD PRIMARY KEY (`idGudangBahanJadi`),
  ADD KEY `idProduksi` (`idProduksi`),
  ADD KEY `gudangBahanJadi_ibfk_2` (`idKualitas`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`idPengadaan`),
  ADD KEY `idKualitas` (`idKualitas`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`idProduksi`),
  ADD KEY `idPengadaan` (`idPengadaan`);

--
-- Indexes for table `qualitycontrol`
--
ALTER TABLE `qualitycontrol`
  ADD PRIMARY KEY (`idKualitas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gudangbahanjadi`
--
ALTER TABLE `gudangbahanjadi`
  MODIFY `idGudangBahanJadi` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `idPengadaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `idProduksi` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `qualitycontrol`
--
ALTER TABLE `qualitycontrol`
  MODIFY `idKualitas` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gudangbahanjadi`
--
ALTER TABLE `gudangbahanjadi`
  ADD CONSTRAINT `gudangBahanJadi_ibfk_1` FOREIGN KEY (`idProduksi`) REFERENCES `produksi` (`idProduksi`),
  ADD CONSTRAINT `gudangBahanJadi_ibfk_2` FOREIGN KEY (`idKualitas`) REFERENCES `qualitycontrol` (`idKualitas`);

--
-- Constraints for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD CONSTRAINT `pengadaan_ibfk_1` FOREIGN KEY (`idKualitas`) REFERENCES `qualitycontrol` (`idKualitas`);

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `produksi_ibfk_1` FOREIGN KEY (`idPengadaan`) REFERENCES `pengadaan` (`idPengadaan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
