-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 24, 2024 lúc 07:39 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `da1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_bl` int(10) NOT NULL,
  `nd_bl` varchar(255) NOT NULL,
  `tg_bl` date NOT NULL,
  `id_sp` int(10) NOT NULL,
  `id_tk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `id_ct_hd` int(10) NOT NULL,
  `sl` int(10) NOT NULL,
  `tong_tien` int(10) NOT NULL,
  `ten_nd` varchar(50) NOT NULL,
  `sdt` int(15) NOT NULL,
  `dia_chi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `trangthai` int(10) NOT NULL DEFAULT 0,
  `id_hd` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`id_ct_hd`, `sl`, `tong_tien`, `ten_nd`, `sdt`, `dia_chi`, `email`, `trangthai`, `id_hd`, `id_sp`) VALUES
(1, 1, 60000, 'Sinhtv', 123456789, '85 Xuân Thủy', 'sinhtv@gmail.com', 0, 1, 21),
(2, 1, 70000, 'TVS', 123456789, 'KTX Mĩ Đình', 'stv@gmail.com', 1, 1, 21),
(3, 1, 80000, 'STV', 123456789, 'Cầu Giấy', 'tvs@gmail.com', 2, 1, 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_dm` int(10) NOT NULL,
  `ten_dm` varchar(50) NOT NULL,
  `trangthai` varchar(50) NOT NULL DEFAULT '0'
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
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hd` int(10) NOT NULL,
  `ngay` date NOT NULL,
  `ten` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dia_chi` varchar(50) NOT NULL,
  `sdt` int(15) NOT NULL,
  `id_tk` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id_hd`, `ngay`, `ten`, `email`, `dia_chi`, `sdt`, `id_tk`, `id_sp`) VALUES
(1, '2024-07-21', 'stv', 'stv@gmail.com', 'Ngõ 85', 123456789, 1, 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(10) NOT NULL,
  `ten_sp` varchar(50) NOT NULL,
  `gia` int(10) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `so_luong` int(10) NOT NULL,
  `mo_ta` varchar(255) NOT NULL,
  `lx` int(10) NOT NULL DEFAULT 0,
  `trangthai` int(11) NOT NULL DEFAULT 0,
  `id_dm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `ten_sp`, `gia`, `anh`, `so_luong`, `mo_ta`, `lx`, `trangthai`, `id_dm`) VALUES
(17, 'Special - Áo nỉ chui đầu Lifewear', 259000, 'ST002.2_45.webp', 5, 'Hàng tốt', 0, 0, 4),
(19, 'Aó khoác lông cừu nam', 1350000, '20171214_6daa1321710d9d5146a89c4a4cf0c93d_1513221299.jfif', 5, 'Áo khoác mùa đông', 0, 0, 4),
(20, 'Bộ Đồ Nam AVIANO Cổ Tròn Tay Ngắn', 175000, 'vn-11134207-7qukw-lh9xkr2dkveb86.jfif', 5, 'Quần áo mùa hè', 0, 0, 2),
(21, 'Áo sơ mi TOPGU họa tiết Khóm Cọ thời trang', 169000, 'vn-11134207-7r98o-lsimst4g0slg8b.jfif', 5, 'Thoáng mát', 0, 0, 2),
(22, 'Quần đùi stussy', 49000, 'vn-11134207-7r98o-lttnta7vv40a74.jfif', 5, 'Thoáng mát', 0, 0, 2),
(23, 'Bộ thể thao nam thu đông STYLE MARVEN', 109000, 'vn-11134201-23030-z2jdau5ajpov1c.jfif', 5, 'Quần áo thu đông', 0, 0, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_tk` int(10) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `mk` varchar(50) NOT NULL,
  `sdt` int(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `ten_nd` varchar(50) DEFAULT NULL,
  `trangthai` int(10) DEFAULT 0,
  `role` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_tk`, `ten`, `mk`, `sdt`, `email`, `dia_chi`, `ten_nd`, `trangthai`, `role`) VALUES
(1, 'TVS', '123456', 336648156, 'sinhtv@gmail.com', 'Ngõ 85-Xuân Thủy', 'Tống Văn Sinh', 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_bl`),
  ADD KEY `lk_bl_tk` (`id_tk`),
  ADD KEY `lk_bl_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`id_ct_hd`),
  ADD KEY `lk_cthd_sp` (`id_sp`),
  ADD KEY `lk_cthd_hd` (`id_hd`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id_hd`),
  ADD KEY `lk_hd_tk` (`id_tk`),
  ADD KEY `lk_hd_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `lk_sanpham_danhmuc` (`id_dm`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_tk`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_bl` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  MODIFY `id_ct_hd` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id_hd` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_tk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `lk_bl_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `lk_bl_tk` FOREIGN KEY (`id_tk`) REFERENCES `taikhoan` (`id_tk`);

--
-- Các ràng buộc cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `lk_cthd_hd` FOREIGN KEY (`id_hd`) REFERENCES `hoadon` (`id_hd`),
  ADD CONSTRAINT `lk_cthd_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `lk_hd_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `lk_hd_tk` FOREIGN KEY (`id_tk`) REFERENCES `taikhoan` (`id_tk`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`id_dm`) REFERENCES `danhmuc` (`id_dm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
