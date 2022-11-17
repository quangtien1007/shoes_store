-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 04, 2022 at 06:54 AM
-- Server version: 5.7.25
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) UNSIGNED NOT NULL,
  `Username` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Username`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `Id` int(11) UNSIGNED NOT NULL,
  `Id_DonHang` int(11) UNSIGNED NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `DiaChi` varchar(60) NOT NULL,
  `Gia` varchar(11) NOT NULL,
  `GhiChu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`Id`, `Id_DonHang`, `TenKH`, `TenSP`, `DiaChi`, `Gia`, `GhiChu`) VALUES
(5, 10, 'Phu Quang Ti3n', 'Jordan 1 Retro High OG', 'Tan Chau An Giang', '$220', 'I luv u 3k'),
(6, 10, 'Tien Quan Phussss', 'Jordan 1 Retro High OG', 'TanChaussss', '$220', 'Khong có gì'),
(7, 12, 'Le Pham Phuong Vy', 'Nike Air Force 1 Low \'07', 'Nhà trọ hạnh phúc', '$87', 'Che tên');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `Id` int(11) UNSIGNED NOT NULL,
  `Ten` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gia` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MoTa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TheLoaiId` int(11) UNSIGNED DEFAULT NULL,
  `Anh1` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Anh2` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Anh3` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`Id`, `Ten`, `Gia`, `MoTa`, `TheLoaiId`, `Anh1`, `Anh2`, `Anh3`) VALUES
(9, 'JORDAN 1 MID LIGHT SMOKE', '133 $', 'JORDAN 1 MID LIGHT SMOKE - 2020', 3, 'images/JORDAN1MIDLIGHTSMOKE.jpg', 'images/JORDAN1MIDLIGHTSMOKE-back.jpeg', 'images/jordan1grey.jpg'),
(10, 'Jordan 1 Retro High OG', '$220', 'Taxi', 3, 'images/0jdtaxi.jpg', 'images/0jordan1taxi.jpg', 'images/0jordantaxi2.jpeg'),
(11, 'Jordan 1 Retro High OG', '$187', 'Dark Marina Blue', 3, 'images/0jordan1blue1.jpg', 'images/0jordan1blue.jpg', 'images/0jordan1blue2.jpg'),
(12, 'Nike Air Force 1 Low \'07', '$87', 'White', 3, 'images/0af1-07s.jpg', 'images/0af1-white1.jpg', 'images/0af1-white2.jpg'),
(13, 'Nike Air Force 1 Mid', '$150', 'Off-White Black', 3, 'images/0af1-offwhite.jpg', 'images/00af1offwhite1.jpg', 'images/00af1offwhite2.jpg'),
(14, 'adidas Yeezy 500 Blush', '$247', 'Blush', 3, 'images/00yeezy-blush.jpg', 'images/0yeezyblush1.jpg', 'images/0yeezyblush2.jpg'),
(15, 'Jordan 4 Retro Military Black', '$335', 'Military Black', 3, 'images/00jordan4military.jpg', 'images/00jordan4military1.jpg', 'images/00jordan4military2.jpg'),
(16, 'adidas Yeezy Boost 350 V2', '$350', 'Core Black White (2016/2022)', 3, 'images/0yeezy350v2.jpg', 'images/1yeezyblackwhite1.jpg', 'images/1yeezyblackwhite2.jpg'),
(19, 'Jordan 1 Retro High', '$212', 'Pine Green Black', 3, 'images/0jordan1green.jpg', 'images/0jordan1green1.jpg', 'images/0jordan1green2.jpg'),
(20, 'Nike Air Fear of God 1', '$657', 'String The Question', 3, 'images/0fogstring.jpeg', 'images/0fogstring1.jpeg', 'images/0fogstring2.jpeg'),
(21, 'Balenciaga Track Black', '$636', 'Black (W)', 3, 'images/00balentrack.jpg', 'images/00balentrack1.jpg', 'images/00balentrack2.jpg'),
(22, 'Jordan 1 Retro High', '$356', 'White University Blue Black', 3, 'images/0jordanuni.jpg', 'images/0jordanuni1.jpg', 'images/0jordanuni2.jpg'),
(23, 'Vans Old Skool Black White', '$53', 'Black White', 3, 'images/0vansos.jpg', 'images/0vansos1.jpg', 'images/0vansosq.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `Id` int(11) UNSIGNED NOT NULL,
  `Ten` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`Id`, `Ten`) VALUES
(3, 'Giày');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `DonHangId` (`Id_DonHang`) USING BTREE;

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `SanPhamId` (`TheLoaiId`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `Id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `Id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `Id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `iddonhang_fk_1` FOREIGN KEY (`Id_DonHang`) REFERENCES `sanpham` (`Id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`TheLoaiId`) REFERENCES `theloai` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
