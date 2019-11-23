-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2019 lúc 04:10 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `giohang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MaHang` int(11) NOT NULL,
  `TenHang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` bigint(20) NOT NULL,
  `Gia` bigint(20) NOT NULL,
  `MaLoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MaHang`, `TenHang`, `SoLuong`, `Gia`, `MaLoai`, `Anh`) VALUES
(1, 'Sứ mệnh yêu thương', 50, 40000, 'S01', 'img/b14.jpg'),
(2, 'Tìm lại chính mình', 50, 50000, 'S02', 'img/b11.jpg'),
(3, 'Quà tặng tinh thần dành cho phụ nữ', 30, 30000, 'S03', 'img/b8.jpg'),
(4, 'Con sẽ làm được', 30, 40000, 'S04', 'img/b16.jpg\r\n'),
(5, 'Đi tìm ý nghĩa cuộc sống', 20, 25000, 'S05', 'img/b17.jpg'),
(6, 'Hạt giống tâm hồn', 15, 35000, 'S06', 'img/b21.jpg'),
(7, 'Cảm ơn ký ức', 20, 20000, 'S07', 'img/b18.jpg'),
(8, 'Danh tác Triết học', 20, 30000, 'S08', 'img/c8.jpg'),
(9, 'Triết học Đông Phương', 15, 30000, 'S09', 'img/c9.jpg'),
(10, 'Địa lý hành chính', 40, 25000, 'S10', 'img/d2.jpg'),
(11, 'Alat địa lý Việt Nam', 100, 15000, 'S11', 'img/d5.jpg'),
(12, 'Hóa học 12', 30, 25000, 'S12', 'img/h2.jpg'),
(13, 'Hóa học 11', 14, 23000, 'S13', 'img/h4.jpg'),
(14, 'Chiến lược thương hiệu Châu Á', 10, 50000, 'S14', 'img/k7.jpg'),
(15, 'Phần cứng tin học', 24, 35000, 'S15', 'img/tin10.jpg'),
(16, 'Luyện thi Sinh học', 100, 30000, 'S16', 'img/o8.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MaHang`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MaHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
