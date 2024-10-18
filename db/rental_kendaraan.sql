-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 10:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_kendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kend` int(11) NOT NULL,
  `nama_cus` varchar(255) DEFAULT NULL,
  `booking_date` date NOT NULL,
  `rent_start_date` date NOT NULL,
  `rent_end_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `total_sewa` double DEFAULT NULL,
  `return_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_user`, `id_kend`, `nama_cus`, `booking_date`, `rent_start_date`, `rent_end_date`, `return_date`, `total_sewa`, `return_status`) VALUES
(90, 2, 1, '', '2023-07-07', '2023-07-07', '2023-07-12', '2023-07-13', 100000, 'R'),
(91, 2, 4, '', '2023-07-07', '2023-07-07', '2023-07-12', NULL, NULL, 'NR');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kend` int(11) NOT NULL,
  `Merk` varchar(30) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `tipe_kend` varchar(32) NOT NULL,
  `harga_sewa` varchar(15) NOT NULL,
  `no_polisi` varchar(15) NOT NULL,
  `status` enum('tersedia','tidak_tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kend`, `Merk`, `kapasitas`, `foto`, `tipe_kend`, `harga_sewa`, `no_polisi`, `status`) VALUES
(1, 'Audi A4', 4, 'assets/img/cars/audi-a4.jpg', 'mobil', '100000', 'BP 1234 FG', 'tersedia'),
(2, 'BMW', 4, 'assets/img/cars/bmw6.jpg', 'mobil', '1500000', 'BP 66 GG', 'tidak_tersedia'),
(4, 'Yamaha Nmax', 2, 'assets/img/cars/yamaha.jpg', 'motor', '75.000', 'BP 9564 TY', 'tidak_tersedia'),
(5, 'Honda Genio', 0, 'assets/img/cars/genio.jpg', 'motor', '75.000', 'BP 3312 UY', 'tersedia'),
(6, 'Honda Supra X 125 FI', 0, 'assets/img/cars/supra.jpg', 'motor', '75000', 'BP 9123 AI', 'tersedia'),
(7, 'Honda Beat Street', 0, 'assets/img/cars/beat.jpg', 'motor', '75000', 'BP 2276 AT', 'tersedia'),
(8, 'Honda Scoopy', 0, 'assets/img/cars/scoopy.jpg', 'motor', '75000', 'BP 1278 RY', 'tersedia'),
(9, 'Honda Vario 125', 0, 'assets/img/cars/vario.jpg', 'motor', '75000', 'BP 7651 GU', 'tersedia'),
(10, 'Toyota Avanza', 0, 'assets/img/cars/avanza.jpg', 'mobil', '150000', 'BP 1547 UJ', 'tersedia'),
(11, 'Suzuki Ignis', 0, 'assets/img/cars/suzuki ignis.jpg', 'mobil', '200000', 'BP 6539 PK', 'tersedia'),
(12, 'Daihatsu Terios', 0, 'assets/img/cars/daihatsu.jpg', 'mobil', '200000', 'BP 2908 TS', 'tersedia'),
(13, 'Kia Picanco', 0, 'assets/img/cars/kia picanto.jpg', 'mobil', '200000', 'BP 4876 BK', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', '$2y$10$hkqOc1HJooXVa28qHdlosejr/.vuEkpg.cZUemY3fov8rneM6Zy6i', 'admin'),
(2, 'user', 'user', '$2y$10$vRAPAdioX99JkUeW.lG/cufeJQ/PydpiKGS/M86mFvxJj1LeHd8le', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kend` (`id_kend`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kend`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_kend`) REFERENCES `kendaraan` (`id_kend`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
