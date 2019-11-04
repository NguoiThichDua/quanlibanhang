-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 02:43 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlibanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `maadmin` int(11) NOT NULL,
  `tentaikhoan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hovaten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kieuadmin` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`maadmin`, `tentaikhoan`, `matkhau`, `hovaten`, `kieuadmin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Sơn Nguyễn', 'admin'),
(2, 'admin_2', 'a122f83629ba3cf34c5953c1f6a6511b', 'Thanh Thoại', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethanghoadonhang`
--

CREATE TABLE `chitiethanghoadonhang` (
  `machitiethanghoadonhang` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `ngaysanxuat` date NOT NULL,
  `mahanghoa` int(11) NOT NULL,
  `madonhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitiethanghoadonhang`
--

INSERT INTO `chitiethanghoadonhang` (`machitiethanghoadonhang`, `soluong`, `ngaysanxuat`, `mahanghoa`, `madonhang`) VALUES
(6, 50, '2019-11-04', 1, 3),
(7, 30, '2019-11-03', 2, 3),
(8, 150, '2019-11-04', 3, 4),
(9, 200, '2019-11-19', 1, 4),
(10, 500, '2019-11-14', 2, 5),
(11, 500, '2019-11-05', 3, 5),
(12, 500, '2019-11-05', 1, 5),
(15, 999, '2019-11-04', 1, 7),
(16, 888, '2019-11-06', 2, 7),
(17, 777, '2019-11-07', 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `chitiethanghoahangton`
--

CREATE TABLE `chitiethanghoahangton` (
  `machitiethanghoahangton` int(11) NOT NULL,
  `mahanghoa` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `mahangton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `madonhang` int(11) NOT NULL,
  `mabill` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ngaytao` date NOT NULL,
  `ghichu` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `makhachhang` int(11) NOT NULL,
  `maadmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`madonhang`, `mabill`, `ngaytao`, `ghichu`, `makhachhang`, `maadmin`) VALUES
(3, '1652480201050', '2019-11-04', 'Công nợ đơn hàng', 5, 1),
(4, '1652480201065', '2019-11-04', '', 6, 1),
(5, '1652480201055', '2019-11-04', 'Đây là demo', 7, 1),
(7, '1652480201045', '2019-11-04', '', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mahanghoa` int(11) NOT NULL,
  `tenhanghoa` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`mahanghoa`, `tenhanghoa`) VALUES
(1, 'Mỡ trăn chai'),
(2, 'Mỡ trăn hũ'),
(3, 'Kem rửa mặt');

-- --------------------------------------------------------

--
-- Table structure for table `hangton`
--

CREATE TABLE `hangton` (
  `mahangton` int(11) NOT NULL,
  `ngaytao` date NOT NULL,
  `makhachhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `makhachhang` int(11) NOT NULL,
  `hovaten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoai` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cmnd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `capbac` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tructhuoc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mahopdong` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macuahang` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hethongnhaphanphoi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `danghi` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'chuanghi',
  `loaikhachhang` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'khachquaduong',
  `maadmin` int(11) DEFAULT '0',
  `ngaysua` date DEFAULT NULL,
  `maadminsua` int(11) DEFAULT NULL,
  `ngaytao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makhachhang`, `hovaten`, `sodienthoai`, `cmnd`, `diachi`, `capbac`, `tructhuoc`, `mahopdong`, `macuahang`, `hethongnhaphanphoi`, `danghi`, `loaikhachhang`, `maadmin`, `ngaysua`, `maadminsua`, `ngaytao`) VALUES
(5, 'Nguyễn Bình Hồng Sơn', '0766899363', '352389249', 'Cần Thơ', 'nhaphanphoivang', 'Trường Đại học Tây Đô', 'HD-21546546', 'CH-5485485', 'An Giang', 'chuanghi', 'khachlaunam', 1, '2019-11-03', 1, '2019-11-02'),
(6, 'Lê Trung Nam', '0916524328', '356248954', 'Cần Thơ', 'tongdaili', 'Trường Đại học Cần Thơ', 'HD-21546546', 'CH-548789', 'Vĩnh Long', 'chuanghi', 'khachlaunam', 2, '2019-11-02', 1, '2019-11-02'),
(7, 'Lê Thanh Thoại', '0939505813', '548348961', 'Cần Thơ', 'giamdockinhdoanh', 'Trường Đại học Nam Cần Thơ', 'HS-5485764', 'CH-548789', 'Vĩnh Long', 'chuanghi', 'khachlaunam', 1, '2019-11-02', 1, '2019-11-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`maadmin`);

--
-- Indexes for table `chitiethanghoadonhang`
--
ALTER TABLE `chitiethanghoadonhang`
  ADD PRIMARY KEY (`machitiethanghoadonhang`);

--
-- Indexes for table `chitiethanghoahangton`
--
ALTER TABLE `chitiethanghoahangton`
  ADD PRIMARY KEY (`machitiethanghoahangton`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madonhang`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`mahanghoa`);

--
-- Indexes for table `hangton`
--
ALTER TABLE `hangton`
  ADD PRIMARY KEY (`mahangton`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makhachhang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `maadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chitiethanghoadonhang`
--
ALTER TABLE `chitiethanghoadonhang`
  MODIFY `machitiethanghoadonhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `chitiethanghoahangton`
--
ALTER TABLE `chitiethanghoahangton`
  MODIFY `machitiethanghoahangton` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `madonhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `mahanghoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hangton`
--
ALTER TABLE `hangton`
  MODIFY `mahangton` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makhachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
