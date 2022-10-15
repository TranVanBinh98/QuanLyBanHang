-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2022 at 02:45 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbh`
--

-- --------------------------------------------------------

--
-- Table structure for table `dktv`
--

CREATE TABLE `dktv` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `ngaydangki` date DEFAULT NULL,
  `lever` tinyint(4) DEFAULT NULL COMMENT '1:Admin,0:Thành viên'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dktv`
--

INSERT INTO `dktv` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `phone`, `ngaydangki`, `lever`) VALUES
(4, 'TRẦN', 'BÌNH', 'Admin', '123', 'binh111@gmail.com', '11111', '2011-11-11', 1),
(5, 'Lê', 'Hải', 'Haile', '123', '123@gmail.com', '0984848283', '2009-02-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MADH` char(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `MAKHACH` int(11) NOT NULL,
  `TENKHACH` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `EMAIL` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `DIENTHOAI` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `DIACHI` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `NGAYDAT` date DEFAULT NULL,
  `TONGTIEN` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MADH`, `MAKHACH`, `TENKHACH`, `EMAIL`, `DIENTHOAI`, `DIACHI`, `NGAYDAT`, `TONGTIEN`) VALUES
('DH01', 1, 'Trần Văn Khánh', 'khanhb@gmail.com', '0994949494', 'Hải Phòng', '2020-03-10', '4000'),
('DH02', 2, 'Vũ Thị Mai', 'maicc@gmail.com', '0994933394', 'Hải Phòng', '2020-03-10', '7200'),
('DH03', 3, 'Lê Thị Hà', 'ha@gmail.com', '0994911133', 'Bắc Giang', '2020-03-10', '2200'),
('DH04', 4, 'Nguyễn Văn Hùng', 'hung@gmail.com', '0994933312', 'Hà Nội', '2020-03-10', '3000'),
('DH05', 5, 'Lê Thanh Ngọc', 'ngoc@gmail.com', '0994931444', 'Bắc Ninh', '2020-03-10', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `donhangct`
--

CREATE TABLE `donhangct` (
  `MADH` char(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `MAHANG` char(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `SOLUONG` int(11) DEFAULT NULL,
  `DONGIA` int(11) DEFAULT NULL,
  `THANHTIEN` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `donhangct`
--

INSERT INTO `donhangct` (`MADH`, `MAHANG`, `SOLUONG`, `DONGIA`, `THANHTIEN`) VALUES
('DH01', 'MH03', 400, 3000, '12000'),
('DH02', 'MH02', 120, 1230, '10000'),
('DH03', 'MH02', 510, 1230, '11200'),
('DH04', 'MH01', 100, 2000, '8000'),
('DH05', 'MH04', 250, 5100, '13000');

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MAHANG` char(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `TENHANG` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MALOAI` char(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `DONGIA` int(11) DEFAULT NULL,
  `SOLUONG` int(11) DEFAULT NULL,
  `MOTA` varchar(150) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ANH` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MAHANG`, `TENHANG`, `MALOAI`, `DONGIA`, `SOLUONG`, `MOTA`, `ANH`) VALUES
('MH01', 'Cam Tươi', 'B', 2000, 20, 'Hàng loại 1', 'cam.jpg'),
('MH02', 'Cà rốt', 'A', 1230, 90, 'Hàng loại 3', 'carot.jpg'),
('MH03', 'Dưa đỏ', 'B', 3000, 200, 'Hàng loại 1', 'duahau.jpg'),
('MH04', 'Thịt bò', 'C', 5100, 120, 'Hàng loại 2', 'thit_1.jpg'),
('MH05', 'Tôm', 'C', 3000, 68, 'Hàng loại 1', 'thit_2.jpg'),
('MHR5', 'Qủa chanh', 'A', 5000, 50, 'Hàng loại 3', 'chanh4.jpg'),
('R01', 'Rau cải', 'A', 1200, 204, 'Hàng loại 1', 'cai.jpg'),
('SCJ', 'Mâm xôi', 'B', 12000, 3311, 'Hàng loại 2', 'mamxoi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loaihang`
--

CREATE TABLE `loaihang` (
  `MALOAI` char(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `TENLOAI` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `loaihang`
--

INSERT INTO `loaihang` (`MALOAI`, `TENLOAI`) VALUES
('A', 'Rau củ'),
('B', 'Trái cây'),
('C', 'Thực phẩm tươi sống'),
('CLH', 'Các loại hạt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dktv`
--
ALTER TABLE `dktv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MADH`,`MAKHACH`);

--
-- Indexes for table `donhangct`
--
ALTER TABLE `donhangct`
  ADD PRIMARY KEY (`MADH`,`MAHANG`),
  ADD KEY `MAHANG` (`MAHANG`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MAHANG`,`MALOAI`),
  ADD KEY `MALOAI` (`MALOAI`);

--
-- Indexes for table `loaihang`
--
ALTER TABLE `loaihang`
  ADD PRIMARY KEY (`MALOAI`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dktv`
--
ALTER TABLE `dktv`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donhangct`
--
ALTER TABLE `donhangct`
  ADD CONSTRAINT `donhangct_ibfk_1` FOREIGN KEY (`MADH`) REFERENCES `donhang` (`MADH`),
  ADD CONSTRAINT `donhangct_ibfk_2` FOREIGN KEY (`MAHANG`) REFERENCES `hanghoa` (`MAHANG`);

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MALOAI`) REFERENCES `loaihang` (`MALOAI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
