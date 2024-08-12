-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 12, 2024 lúc 10:34 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `duanmot` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `duanmot`;

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_bl` int(10) NOT NULL AUTO_INCREMENT,
  `nd_bl` varchar(255) NOT NULL,
  `tg_bl` date NOT NULL,
  `id_sp` int(10) NOT NULL,
  `id_tk` int(10) NOT NULL,
  PRIMARY KEY (`id_bl`),
  KEY `fk_binhluan_sanpham` (`id_sp`),
  KEY `fk_binhluan_taikhoan` (`id_tk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_bl`, `nd_bl`, `tg_bl`, `id_sp`, `id_tk`) VALUES
(1, 'Sản phẩm chất lượng tốt!', '2024-08-05', 17, 1),
(2, 'Áo khoác rất ấm!', '2024-08-05', 19, 2),
(3, 'Quần đùi rất thoáng mát!', '2024-08-05', 22, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_donhang`
--

CREATE TABLE `chitiet_donhang` (
  `id_ct` int(10) NOT NULL AUTO_INCREMENT,
  `id_dh` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `ten_sp` varchar(100) NOT NULL,
  `gia` int(10) NOT NULL,
  `sl` int(10) NOT NULL,
  `tongtien` int(10) NOT NULL,
  `id_tk` int(10) NOT NULL,
  PRIMARY KEY (`id_ct`),
  KEY `fk_chitiet_donhang_donhang` (`id_dh`),
  KEY `fk_chitiet_donhang_sanpham` (`id_sp`),
  KEY `fk_chitiet_donhang_taikhoan` (`id_tk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_donhang`
--

INSERT INTO `chitiet_donhang` (`id_ct`, `id_dh`, `id_sp`, `ten_sp`, `gia`, `sl`, `tongtien`, `id_tk`) VALUES
(1, 18, 19, 'Áo khoác lông cừu nam', 1350000, 1, 1350000, 1),
(2, 19, 21, 'Áo sơ mi TOPGU họa tiết Khóm Cọ thời trang', 169000, 1, 169000, 2),
(3, 19, 17, 'Special - Áo nỉ chui đầu Lifewear', 259000, 1, 259000, 2),
(4, 19, 22, 'Quần đùi stussy', 49000, 1, 49000, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_dm` int(10) NOT NULL AUTO_INCREMENT,
  `ten_dm` varchar(50) NOT NULL,
  `trangthai` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_dm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_dm`, `ten_dm`, `trangthai`) VALUES
(1, 'Quần áo mùa xuân', '0'),
(2, 'Quần áo mùa hè', '0'),
(3, 'Quần áo mùa thu', '0'),
(4, 'Quần áo mùa đông', '0'),
(8, 'Hàng mới', '1'),
(9, 'Hàng hiệu', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_dh` int(10) NOT NULL AUTO_INCREMENT,
  `ngay_dat` date NOT NULL,
  `ten_nd` varchar(50) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dia_chi` varchar(100) NOT NULL,
  `trangthai` int(10) NOT NULL DEFAULT 0,
  `payment_method` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_dh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id_dh`, `ngay_dat`, `ten_nd`, `sdt`, `email`, `dia_chi`, `trangthai`, `payment_method`) VALUES
(18, '2024-08-07', 'Nguyễn Văn A', '0987654321', 'a@example.com', 'Địa chỉ A', 0, 0),
(19, '2024-08-07', 'Nguyễn Văn B', '0976543210', 'b@example.com', 'Địa chỉ B', 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(10) NOT NULL AUTO_INCREMENT,
  `ten_sp` varchar(50) NOT NULL,
  `gia` int(10) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `so_luong` int(10) NOT NULL,
  `mo_ta` varchar(255) NOT NULL,
  `lx` int(10) NOT NULL DEFAULT 0,
  `trangthai` int(11) NOT NULL DEFAULT 0,
  `id_dm` int(10) NOT NULL,
  PRIMARY KEY (`id_sp`),
  KEY `fk_sanpham_danhmuc` (`id_dm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `ten_sp`, `gia`, `anh`, `so_luong`, `mo_ta`, `lx`, `trangthai`, `id_dm`) VALUES
(17, 'Special - Áo nỉ chui đầu Lifewear', 259000, 'ST002.2_45.webp', 5, 'Mô tả', 0, 0, 4),
(19, 'Áo khoác lông cừu nam', 1350000, '20171214_6daa1321710d9d5146a89c4a4cf0c93d_1513221299.jfif', 5, 'Áo khoác mùa đông', 0, 0, 4),
(20, 'Bộ Đồ Nam AVIANO Cổ Tròn Tay Ngắn', 175000, 'vn-11134207-7qukw-lh9xkr2dkveb86.jfif', 5, 'Quần áo mùa hè', 0, 0, 2),
(21, 'Áo sơ mi TOPGU họa tiết Khóm Cọ thời trang', 169000, 'vn-11134207-7r98o-lsimst4g0slg8b.jfif', 5, 'Thoáng mát', 0, 0, 2),
(22, 'Quần đùi stussy', 49000, 'vn-11134207-7grh8-dkoovf4q89ty7b.jpg', 5, 'Thể thao', 0, 0, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_tk` int(10) NOT NULL AUTO_INCREMENT,
  `ten` varchar(50) NOT NULL,
  `mk` varchar(100) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dia_chi` varchar(100) NOT NULL,
  `ten_nd` varchar(50) NOT NULL,
  `trangthai` int(10) NOT NULL DEFAULT 1,
  `role` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_tk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_tk`, `ten`, `mk`, `sdt`, `email`, `dia_chi`, `ten_nd`, `trangthai`, `role`) VALUES
(1, 'Nguyễn Văn A', 'a12345', '0987654321', 'a@example.com', 'Địa chỉ A', 'Nguyễn Văn A', 1, 1),
(2, 'Nguyễn Văn B', 'b12345', '0976543210', 'b@example.com', 'Địa chỉ B', 'Nguyễn Văn B', 1, 1);

COMMIT;
