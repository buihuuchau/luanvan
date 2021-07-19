-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 18, 2021 lúc 08:59 PM
-- Phiên bản máy phục vụ: 5.7.24
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanly`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ban`
--

CREATE TABLE `ban` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idquan` bigint(20) UNSIGNED NOT NULL,
  `idkhuvuc` bigint(20) UNSIGNED NOT NULL,
  `tenban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` bigint(20) NOT NULL DEFAULT '0' COMMENT '0: Rãnh - 1: Bận',
  `hidden` bigint(20) NOT NULL DEFAULT '0' COMMENT '0: Hiện - 1: Ẩn',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ban`
--

INSERT INTO `ban` (`id`, `idquan`, `idkhuvuc`, `tenban`, `trangthai`, `hidden`, `created_at`, `updated_at`) VALUES
(10, 1, 3, 'Bàn 1', 0, 0, NULL, NULL),
(11, 1, 3, 'Bàn 2', 0, 0, NULL, NULL),
(12, 1, 3, 'Bàn 3', 0, 0, NULL, NULL),
(13, 1, 2, 'Bàn 1 Sân thượng', 0, 0, NULL, NULL),
(14, 1, 2, 'Bàn 2 Sân thượng', 0, 0, NULL, NULL),
(15, 1, 2, 'Bàn 3 Sân thượng', 0, 0, NULL, NULL),
(16, 1, 3, 'Bàn 4', 0, 0, NULL, NULL),
(17, 1, 3, 'Bàn 5', 0, 1, NULL, NULL),
(18, 1, 4, 'Bàn 1 Sân trước', 0, 0, NULL, NULL),
(19, 1, 4, 'Bàn 2 Sân trước', 0, 0, NULL, NULL),
(21, 1, 2, 'Bàn 4 Sân thượng', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `calam`
--

CREATE TABLE `calam` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idquan` bigint(20) UNSIGNED NOT NULL,
  `tencalam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tu` time NOT NULL,
  `den` time NOT NULL,
  `hidden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0: Hiện - 1: Ẩn',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `calam`
--

INSERT INTO `calam` (`id`, `idquan`, `tencalam`, `tu`, `den`, `hidden`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sáng', '05:00:00', '10:00:00', '0', NULL, NULL),
(2, 1, 'Trưa', '10:00:00', '15:00:00', '0', NULL, NULL),
(3, 1, 'Chiều', '15:00:00', '20:00:00', '0', NULL, NULL),
(4, 1, 'Tối', '20:00:00', '12:00:00', '0', NULL, NULL),
(5, 1, 'Khuya', '01:13:00', '02:13:00', '0', NULL, NULL),
(6, 1, 'Giữa trưa', '15:19:00', '16:20:00', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet`
--

CREATE TABLE `chitiet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idhoadon` bigint(20) UNSIGNED NOT NULL,
  `idthucdon` bigint(20) UNSIGNED NOT NULL,
  `soluong` bigint(20) UNSIGNED NOT NULL,
  `gia` bigint(20) NOT NULL,
  `ghichu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trangthai` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idquan` bigint(20) UNSIGNED NOT NULL,
  `idkhuvuc` bigint(20) UNSIGNED NOT NULL,
  `idban` bigint(20) UNSIGNED NOT NULL,
  `idthanhvien` bigint(20) UNSIGNED NOT NULL,
  `idkhachhang` bigint(20) UNSIGNED DEFAULT NULL,
  `thoigian` datetime NOT NULL,
  `giamgia` bigint(20) NOT NULL DEFAULT '0',
  `thanhtien` bigint(20) NOT NULL DEFAULT '0',
  `trangthai` bigint(20) NOT NULL DEFAULT '0' COMMENT '0: Chưa xong - 1: Đã thanh toán',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonluu`
--

CREATE TABLE `hoadonluu` (
  `id` bigint(20) NOT NULL,
  `idquan` bigint(20) DEFAULT NULL,
  `idhoadon` bigint(20) DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL,
  `tenkhuvuc` varchar(255) DEFAULT NULL,
  `tenban` varchar(255) DEFAULT NULL,
  `tenthanhvien` varchar(255) DEFAULT NULL,
  `tenkhachhang` varchar(255) DEFAULT NULL,
  `sdtkh` bigint(20) DEFAULT NULL,
  `loaimon` varchar(255) DEFAULT NULL,
  `tenmon` varchar(255) DEFAULT NULL,
  `dongia` bigint(20) DEFAULT NULL,
  `soluong` bigint(20) DEFAULT NULL,
  `gia` bigint(20) DEFAULT NULL,
  `giamgia` bigint(20) DEFAULT NULL,
  `thanhtien` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoadonluu`
--

INSERT INTO `hoadonluu` (`id`, `idquan`, `idhoadon`, `thoigian`, `tenkhuvuc`, `tenban`, `tenthanhvien`, `tenkhachhang`, `sdtkh`, `loaimon`, `tenmon`, `dongia`, `soluong`, `gia`, `giamgia`, `thanhtien`) VALUES
(51, 1, 10, '2021-07-14 15:16:03', NULL, NULL, NULL, NULL, NULL, '1', 'Nước chanh', 18000, 4, 72000, NULL, NULL),
(52, 1, 10, '2021-07-14 15:16:03', NULL, NULL, NULL, NULL, NULL, '2', 'Cơm sườn', 35000, 2, 70000, NULL, NULL),
(53, 1, 10, '2021-07-14 15:16:03', 'Phòng lạnh', 'Bàn 1', 'Bùi Hữu Châu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 142000),
(54, 1, 11, '2021-07-14 15:16:06', NULL, NULL, NULL, NULL, NULL, '1', 'Nước chanh', 18000, 4, 72000, NULL, NULL),
(55, 1, 11, '2021-07-14 15:16:06', NULL, NULL, NULL, NULL, NULL, '2', 'Cơm sườn', 35000, 1, 35000, NULL, NULL),
(56, 1, 11, '2021-07-14 15:16:06', 'Phòng lạnh', 'Bàn 2', 'Bùi Hữu Châu', 'Bùi Hữu Chánh', 918624198, NULL, NULL, NULL, NULL, NULL, 30000, 77000),
(57, 1, 12, '2021-04-14 15:16:07', NULL, NULL, NULL, NULL, NULL, '1', 'Nước chanh', 18000, 3, 54000, NULL, NULL),
(58, 1, 12, '2021-04-14 15:16:07', NULL, NULL, NULL, NULL, NULL, '2', 'Cơm sườn', 35000, 9, 315000, NULL, NULL),
(59, 1, 12, '2021-04-14 15:16:07', 'Phòng lạnh', 'Bàn 3', 'Bùi Hữu Châu', 'Bùi Hữu Chánh', 918624198, NULL, NULL, NULL, NULL, NULL, 100000, 269000),
(60, 1, 13, '2021-07-14 15:16:07', NULL, NULL, NULL, NULL, NULL, '1', 'Nước chanh', 18000, 1, 18000, NULL, NULL),
(61, 1, 13, '2021-07-14 15:16:07', NULL, NULL, NULL, NULL, NULL, '2', 'Cơm sườn', 35000, 1, 35000, NULL, NULL),
(62, 1, 13, '2021-07-14 15:16:07', 'Phòng lạnh', 'Bàn 4', 'Bùi Hữu Châu', 'Bùi Thị Trà My', 763232505, NULL, NULL, NULL, NULL, NULL, 10000, 43000),
(63, 1, 14, '2021-07-14 22:49:51', NULL, NULL, NULL, NULL, NULL, '1', 'Nước chanh', 18000, 1, 18000, NULL, NULL),
(64, 1, 14, '2021-07-14 22:49:51', 'Phòng lạnh', 'Bàn 1', 'Bùi Hữu Châu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 18000),
(65, 1, 21, '2021-07-18 01:06:07', NULL, NULL, NULL, NULL, NULL, '1', 'Nước chanh', 18000, 1, 18000, NULL, NULL),
(66, 1, 21, '2021-07-18 01:06:07', NULL, NULL, NULL, NULL, NULL, '1', 'Nước chanh', 18000, 1, 18000, NULL, NULL),
(67, 1, 21, '2021-07-18 01:06:07', 'Phòng lạnh', 'Bàn 2', 'Bùi Hữu Châu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 36000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idquan` bigint(20) UNSIGNED NOT NULL,
  `hotenkh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` bigint(20) NOT NULL,
  `ngaydangky` date NOT NULL,
  `diem` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `idquan`, `hotenkh`, `sdt`, `ngaydangky`, `diem`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bùi Hữu Chánh', 918624198, '2021-07-02', 807, NULL, NULL),
(2, 1, 'Võ Thị Quý Mỹ', 899152095, '2021-07-01', 500, NULL, NULL),
(3, 1, 'Bùi Thị Trà My', 763232505, '2021-07-11', 357, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idquan` bigint(20) UNSIGNED NOT NULL,
  `idnguyenlieu` bigint(20) UNSIGNED NOT NULL,
  `dongia` bigint(20) NOT NULL,
  `soluong` bigint(20) NOT NULL,
  `thanhtien` bigint(20) NOT NULL,
  `ngaynhap` date NOT NULL,
  `ngayhet` date DEFAULT NULL,
  `trangthai` bigint(20) NOT NULL DEFAULT '1' COMMENT '1: còn hàng, 0: hết hàng',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kho`
--

INSERT INTO `kho` (`id`, `idquan`, `idnguyenlieu`, `dongia`, `soluong`, `thanhtien`, `ngaynhap`, `ngayhet`, `trangthai`, `created_at`, `updated_at`) VALUES
(12, 1, 2, 3000, 2000, 6000000, '2021-02-13', NULL, 1, NULL, NULL),
(13, 1, 1, 18000, 250, 4500000, '2021-03-13', NULL, 1, NULL, NULL),
(14, 1, 4, 50000, 110, 5500000, '2021-04-13', NULL, 1, NULL, NULL),
(15, 1, 2, 5000, 1000, 5000000, '2021-05-13', NULL, 1, NULL, NULL),
(16, 1, 1, 20000, 250, 5000000, '2021-06-13', NULL, 1, NULL, NULL),
(17, 1, 4, 45000, 99, 4455000, '2021-07-13', NULL, 1, NULL, NULL),
(18, 1, 2, 6000, 900, 5400000, '2021-08-13', '2021-07-18', 0, NULL, NULL),
(19, 1, 1, 22000, 170, 3740000, '2021-09-13', '2021-07-18', 0, NULL, NULL),
(20, 1, 4, 45000, 80, 3600000, '2021-10-13', '2021-07-18', 0, NULL, NULL),
(21, 1, 2, 2000, 1500, 3000000, '2021-11-13', '2021-07-18', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuvuc`
--

CREATE TABLE `khuvuc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idquan` bigint(20) UNSIGNED NOT NULL,
  `tenkhuvuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hidden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0: Hiện - 1: Ẩn',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khuvuc`
--

INSERT INTO `khuvuc` (`id`, `idquan`, `tenkhuvuc`, `hidden`, `created_at`, `updated_at`) VALUES
(1, 1, 'Vỉa hè', '0', NULL, NULL),
(2, 1, 'Sân thượng', '0', NULL, NULL),
(3, 1, 'Phòng lạnh', '0', NULL, NULL),
(4, 1, 'Sân trước', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichlamviec`
--

CREATE TABLE `lichlamviec` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idquan` bigint(20) UNSIGNED NOT NULL,
  `idcalam` bigint(20) UNSIGNED NOT NULL,
  `idkhuvuc` bigint(20) UNSIGNED NOT NULL,
  `idthanhvien` bigint(20) UNSIGNED NOT NULL,
  `thoigian` date NOT NULL,
  `diemdanh` bigint(20) NOT NULL DEFAULT '0' COMMENT '0: Vắng - 1: Có mặt',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_25_164657_create_quan_table', 1),
(5, '2021_06_26_014953_create_ban_table', 1),
(6, '2021_06_26_022913_create_sessions_table', 1),
(7, '2021_06_26_022932_create_thanhvien_table', 1),
(8, '2021_06_27_152924_create_khuvuc_table', 1),
(9, '2021_06_27_153156_create_calam_table', 1),
(10, '2021_06_27_154703_create_lichlamviec_table', 1),
(11, '2021_06_27_155354_create_thucdon_table', 1),
(12, '2021_06_27_160512_create_hoadon_table', 1),
(13, '2021_06_27_161731_create_chitiet_table', 1),
(14, '2021_06_27_163444_create_nguyenlieu_table', 1),
(15, '2021_06_27_164020_create_kho_table', 1),
(16, '2021_06_28_124955_create_quyen_table', 1),
(17, '2021_06_28_131930_create_vaitro_table', 1),
(18, '2021_06_28_132116_create_vaitro_quyen_table', 1),
(19, '2021_07_01_162154_create_khachhang_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyenlieu`
--

CREATE TABLE `nguyenlieu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idquan` bigint(20) UNSIGNED NOT NULL,
  `tennguyenlieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xuatxu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donvitinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hidden` bigint(20) NOT NULL DEFAULT '0' COMMENT '0: Hiện - 1: Ẩn',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyenlieu`
--

INSERT INTO `nguyenlieu` (`id`, `idquan`, `tennguyenlieu`, `xuatxu`, `donvitinh`, `hidden`, `created_at`, `updated_at`) VALUES
(1, 1, 'Đường hạt to', 'Việt Nam', 'Kg', 0, NULL, NULL),
(2, 1, 'Đá xay', 'Việt Nam', 'Kg', 0, NULL, NULL),
(3, 1, 'Mía', 'Việt Nam', 'Cây', 1, NULL, NULL),
(4, 1, 'Bánh pía', 'Sóc Trăng, Việt Nam', 'Cây', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan`
--

CREATE TABLE `quan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accquan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwdquan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenquan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhquan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachiquan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdtquan` bigint(20) NOT NULL,
  `ngaythanhlap` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quan`
--

INSERT INTO `quan` (`id`, `accquan`, `pwdquan`, `tenquan`, `hinhquan`, `diachiquan`, `website`, `sdtquan`, `ngaythanhlap`, `created_at`, `updated_at`) VALUES
(1, 'quan1', '68cdfa363160dfae3f255f470145a82a', 'quan1', 'storage/hinhanh/2RrLLzHYjeK7t9Lsr6dyt3q5X2jQW9ahs9Q6WlNc.jpg', 'Cần Thơ', 'http://quan1.com.vn', 1234567890, '2021-07-01', NULL, NULL),
(2, 'quan2', '68cdfa363160dfae3f255f470145a82a', 'quan2', 'storage/hinhanh/cO2XcmkiFqZBvjTGMRiapjSTiLmSIkf9g7rLFyTs.jpg', 'Cần Thơ', 'http://quan1.com.vn', 1234567890, '1111-11-11', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenquyen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`id`, `tenquyen`, `created_at`, `updated_at`) VALUES
(1, 'Xem bàn', NULL, NULL),
(2, 'Thêm bàn', NULL, NULL),
(3, 'Sửa bàn', NULL, NULL),
(4, 'Xóa bàn', NULL, NULL),
(5, 'Xem ca làm', NULL, NULL),
(6, 'Thêm ca làm', NULL, NULL),
(7, 'Sửa ca làm', NULL, NULL),
(8, 'Xóa ca làm', NULL, NULL),
(9, 'Xem hóa đơn', NULL, NULL),
(10, 'Thêm hóa đơn', NULL, NULL),
(11, 'Sửa hóa đơn', NULL, NULL),
(12, 'Xóa hóa đơn', NULL, NULL),
(13, 'Xem khách hàng', NULL, NULL),
(14, 'Thêm khách hàng', NULL, NULL),
(15, 'Sửa khách hàng', NULL, NULL),
(16, 'Xóa khách hàng', NULL, NULL),
(17, 'Xem kho', NULL, NULL),
(18, 'Thêm kho', NULL, NULL),
(19, 'Sửa kho', NULL, NULL),
(20, 'Xóa kho', NULL, NULL),
(21, 'Xem khu vực', NULL, NULL),
(22, 'Thêm khu vực', NULL, NULL),
(23, 'Sửa khu vực', NULL, NULL),
(24, 'Xóa khu vực', NULL, NULL),
(25, 'Xem lịch làm việc', NULL, NULL),
(26, 'Thêm lịch làm việc', NULL, NULL),
(27, 'Sửa lịch làm việc', NULL, NULL),
(28, 'Xóa lịch làm việc', NULL, NULL),
(29, 'Xem nguyên liệu', NULL, NULL),
(30, 'Thêm nguyên liệu', NULL, NULL),
(31, 'Sửa nguyên liệu', NULL, NULL),
(32, 'Xóa nguyên liệu', NULL, NULL),
(33, 'Xem quán', NULL, NULL),
(34, 'Thêm quán', NULL, NULL),
(35, 'Sửa quán', NULL, NULL),
(36, 'Xóa quán', NULL, NULL),
(37, 'Xem thành viên', NULL, NULL),
(38, 'Thêm thành viên', NULL, NULL),
(39, 'Sửa thành viên', NULL, NULL),
(40, 'Xóa thành viên', NULL, NULL),
(41, 'Xem thực đơn', NULL, NULL),
(42, 'Thêm thực đơn', NULL, NULL),
(43, 'Sửa thực đơn', NULL, NULL),
(44, 'Xóa thực đơn', NULL, NULL),
(45, 'Xem vai trò', NULL, NULL),
(46, 'Thêm vai trò', NULL, NULL),
(47, 'Sửa vai trò', NULL, NULL),
(48, 'Xóa vai trò', NULL, NULL),
(49, 'Quản lý ngân sách', NULL, NULL),
(50, 'Quản lý nhập hàng', NULL, NULL),
(51, 'Quản lý bán hàng', NULL, NULL),
(52, 'Quản lý lương nhân viên', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idquan` bigint(20) UNSIGNED NOT NULL,
  `acc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhtv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namsinh` date NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` bigint(20) NOT NULL,
  `ngayvaolam` date NOT NULL,
  `luong` bigint(20) NOT NULL,
  `idvaitro` bigint(20) UNSIGNED NOT NULL,
  `hidden` bigint(20) NOT NULL DEFAULT '1' COMMENT '0: Hiện - 1: Ẩn',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id`, `idquan`, `acc`, `pwd`, `hoten`, `hinhtv`, `namsinh`, `sex`, `diachi`, `sdt`, `ngayvaolam`, `luong`, `idvaitro`, `hidden`, `created_at`, `updated_at`) VALUES
(1, 1, 'quan1_chuquan', '68cdfa363160dfae3f255f470145a82a', 'Bùi Hữu Châu', 'storage/hinhanh/2PfulEA7vi8oTtBJVgsUHmZBgIVgH6XfQ0zjhIU8.jpg', '1999-04-21', '0', 'B1-6 KDC An Thới P Bui huu nghia', 763232505, '2021-07-03', 200000, 1, 0, NULL, NULL),
(2, 1, 'quan1_quanly', '68cdfa363160dfae3f255f470145a82a', 'Bùi Hữu Châu 2', 'storage/hinhanh/mK4hWv6loK8lm4YyBao1fFSXWY3GvO3pOJ0x8pq2.jpg', '1999-04-22', '1', 'B1-6 KDC An Thới P Bui huu nghia', 763232505, '2021-07-03', 110000, 2, 0, NULL, NULL),
(3, 1, 'quan1_phache', '68cdfa363160dfae3f255f470145a82a', 'Bùi Hữu Châu3', 'storage/hinhanh/XbxdxpQcQPqRptHlfuBi8XsNogbK8zDy8bjyNOvk.jpg', '1999-04-21', '0', 'B1-6 KDC An Thới', 763232505, '2021-07-01', 30000, 8, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thucdon`
--

CREATE TABLE `thucdon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idquan` bigint(20) UNSIGNED NOT NULL,
  `loaimon` bigint(20) NOT NULL COMMENT '1-món nước, 2-món ăn, 3-món phụ',
  `tenmon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dongia` bigint(20) NOT NULL,
  `hinhmon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hidden` bigint(20) NOT NULL DEFAULT '0' COMMENT '0: Hiện - 1: Ẩn',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thucdon`
--

INSERT INTO `thucdon` (`id`, `idquan`, `loaimon`, `tenmon`, `dongia`, `hinhmon`, `mota`, `hidden`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'Cơm sườn', 35000, 'storage/hinhanh/AjBIjfuwGQGFXK55YF0oZLPB4qxyrrqCQklspRN6.jpg', 'Cơm sườn', 0, NULL, NULL),
(3, 1, 3, 'Cooktail', 25000, 'storage/hinhanh/TnyOKcPu51G3GF1ZnccXAzk28np5uWCaXRIhB1xP.jpg', 'Cooktail', 1, NULL, NULL),
(4, 1, 1, 'Nước chanh', 18000, 'storage/hinhanh/yufv1USphjDW5YCmh3wKlZSWYmhpurehweb6X96O.jpg', 'Nước chanh', 0, NULL, NULL),
(5, 1, 2, 'a', 1, 'storage/hinhanh/cGmWQO8kqY8Vz1NmukCqUEAhq5klrr1F1Ocnl3Pf.jpg', '321', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idquan` bigint(20) UNSIGNED NOT NULL,
  `tenvaitro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`id`, `idquan`, `tenvaitro`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chủ quán', NULL, NULL),
(2, 1, 'Quản lý', NULL, NULL),
(8, 1, 'Pha chế', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro_quyen`
--

CREATE TABLE `vaitro_quyen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idvaitro` bigint(20) UNSIGNED NOT NULL,
  `idquyen` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro_quyen`
--

INSERT INTO `vaitro_quyen` (`id`, `idvaitro`, `idquyen`, `created_at`, `updated_at`) VALUES
(77, 2, 5, NULL, NULL),
(78, 2, 9, NULL, NULL),
(79, 2, 13, NULL, NULL),
(80, 2, 21, NULL, NULL),
(81, 2, 25, NULL, NULL),
(82, 2, 41, NULL, NULL),
(83, 2, 6, NULL, NULL),
(84, 2, 10, NULL, NULL),
(85, 2, 14, NULL, NULL),
(86, 2, 22, NULL, NULL),
(87, 2, 26, NULL, NULL),
(88, 2, 42, NULL, NULL),
(89, 2, 7, NULL, NULL),
(90, 2, 11, NULL, NULL),
(91, 2, 15, NULL, NULL),
(92, 2, 23, NULL, NULL),
(93, 2, 27, NULL, NULL),
(94, 2, 43, NULL, NULL),
(95, 2, 8, NULL, NULL),
(96, 2, 12, NULL, NULL),
(97, 2, 16, NULL, NULL),
(98, 2, 24, NULL, NULL),
(99, 2, 28, NULL, NULL),
(100, 2, 44, NULL, NULL),
(151, 1, 1, NULL, NULL),
(152, 1, 5, NULL, NULL),
(153, 1, 9, NULL, NULL),
(154, 1, 13, NULL, NULL),
(155, 1, 17, NULL, NULL),
(156, 1, 21, NULL, NULL),
(157, 1, 25, NULL, NULL),
(158, 1, 29, NULL, NULL),
(159, 1, 33, NULL, NULL),
(160, 1, 37, NULL, NULL),
(161, 1, 41, NULL, NULL),
(162, 1, 45, NULL, NULL),
(163, 1, 49, NULL, NULL),
(164, 1, 2, NULL, NULL),
(165, 1, 6, NULL, NULL),
(166, 1, 10, NULL, NULL),
(167, 1, 14, NULL, NULL),
(168, 1, 18, NULL, NULL),
(169, 1, 22, NULL, NULL),
(170, 1, 26, NULL, NULL),
(171, 1, 30, NULL, NULL),
(172, 1, 34, NULL, NULL),
(173, 1, 38, NULL, NULL),
(174, 1, 42, NULL, NULL),
(175, 1, 46, NULL, NULL),
(176, 1, 50, NULL, NULL),
(177, 1, 3, NULL, NULL),
(178, 1, 7, NULL, NULL),
(179, 1, 11, NULL, NULL),
(180, 1, 15, NULL, NULL),
(181, 1, 19, NULL, NULL),
(182, 1, 23, NULL, NULL),
(183, 1, 27, NULL, NULL),
(184, 1, 31, NULL, NULL),
(185, 1, 35, NULL, NULL),
(186, 1, 39, NULL, NULL),
(187, 1, 43, NULL, NULL),
(188, 1, 47, NULL, NULL),
(189, 1, 51, NULL, NULL),
(190, 1, 4, NULL, NULL),
(191, 1, 8, NULL, NULL),
(192, 1, 12, NULL, NULL),
(193, 1, 16, NULL, NULL),
(194, 1, 20, NULL, NULL),
(195, 1, 24, NULL, NULL),
(196, 1, 28, NULL, NULL),
(197, 1, 32, NULL, NULL),
(198, 1, 36, NULL, NULL),
(199, 1, 40, NULL, NULL),
(200, 1, 44, NULL, NULL),
(201, 1, 48, NULL, NULL),
(202, 1, 52, NULL, NULL),
(340, 8, 1, NULL, NULL),
(341, 8, 2, NULL, NULL),
(342, 8, 4, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banfkquan` (`idquan`),
  ADD KEY `banfkkhuvuc` (`idkhuvuc`);

--
-- Chỉ mục cho bảng `calam`
--
ALTER TABLE `calam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calamfkquan` (`idquan`);

--
-- Chỉ mục cho bảng `chitiet`
--
ALTER TABLE `chitiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietfkhoadon` (`idhoadon`),
  ADD KEY `chitietfkmon` (`idthucdon`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoadonfkquan` (`idquan`),
  ADD KEY `hoadonfkkhuvuc` (`idkhuvuc`),
  ADD KEY `hoadonfkban` (`idban`),
  ADD KEY `hoadonfkthanhvien` (`idthanhvien`),
  ADD KEY `hoadonfkkhachhang` (`idkhachhang`);

--
-- Chỉ mục cho bảng `hoadonluu`
--
ALTER TABLE `hoadonluu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khachhangfkquan` (`idquan`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khofkquan` (`idquan`),
  ADD KEY `khofknguyenlieu` (`idnguyenlieu`);

--
-- Chỉ mục cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khuvucfkquan` (`idquan`);

--
-- Chỉ mục cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lichlamviecfkquan` (`idquan`),
  ADD KEY `lichlamviecfkcalam` (`idcalam`),
  ADD KEY `lichlamviecfkkhuvuc` (`idkhuvuc`),
  ADD KEY `lichlamviecfkthanhvien` (`idthanhvien`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguyenlieufkquan` (`idquan`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `quan`
--
ALTER TABLE `quan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thanhvienfkquan` (`idquan`),
  ADD KEY `thanhvienfkvaitro` (`idvaitro`);

--
-- Chỉ mục cho bảng `thucdon`
--
ALTER TABLE `thucdon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thucdonfkquan` (`idquan`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `va` (`idquan`);

--
-- Chỉ mục cho bảng `vaitro_quyen`
--
ALTER TABLE `vaitro_quyen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkvaitro` (`idvaitro`),
  ADD KEY `fkquyen` (`idquyen`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ban`
--
ALTER TABLE `ban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `calam`
--
ALTER TABLE `calam`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `chitiet`
--
ALTER TABLE `chitiet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadonluu`
--
ALTER TABLE `hoadonluu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `quan`
--
ALTER TABLE `quan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thucdon`
--
ALTER TABLE `thucdon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `vaitro_quyen`
--
ALTER TABLE `vaitro_quyen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ban`
--
ALTER TABLE `ban`
  ADD CONSTRAINT `banfkkhuvuc` FOREIGN KEY (`idkhuvuc`) REFERENCES `khuvuc` (`id`),
  ADD CONSTRAINT `banfkquan` FOREIGN KEY (`idquan`) REFERENCES `quan` (`id`);

--
-- Các ràng buộc cho bảng `calam`
--
ALTER TABLE `calam`
  ADD CONSTRAINT `calamfkquan` FOREIGN KEY (`idquan`) REFERENCES `quan` (`id`);

--
-- Các ràng buộc cho bảng `chitiet`
--
ALTER TABLE `chitiet`
  ADD CONSTRAINT `chitietfkhoadon` FOREIGN KEY (`idhoadon`) REFERENCES `hoadon` (`id`),
  ADD CONSTRAINT `chitietfkthucdon` FOREIGN KEY (`idthucdon`) REFERENCES `thucdon` (`id`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadonfkban` FOREIGN KEY (`idban`) REFERENCES `ban` (`id`),
  ADD CONSTRAINT `hoadonfkkhachhang` FOREIGN KEY (`idkhachhang`) REFERENCES `khachhang` (`id`),
  ADD CONSTRAINT `hoadonfkkhuvuc` FOREIGN KEY (`idkhuvuc`) REFERENCES `khuvuc` (`id`),
  ADD CONSTRAINT `hoadonfkquan` FOREIGN KEY (`idquan`) REFERENCES `quan` (`id`),
  ADD CONSTRAINT `hoadonfkthanhvien` FOREIGN KEY (`idthanhvien`) REFERENCES `thanhvien` (`id`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhangfkquan` FOREIGN KEY (`idquan`) REFERENCES `quan` (`id`);

--
-- Các ràng buộc cho bảng `kho`
--
ALTER TABLE `kho`
  ADD CONSTRAINT `khofknguyenlieu` FOREIGN KEY (`idnguyenlieu`) REFERENCES `nguyenlieu` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `khofkquan` FOREIGN KEY (`idquan`) REFERENCES `quan` (`id`);

--
-- Các ràng buộc cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  ADD CONSTRAINT `khuvucfkquan` FOREIGN KEY (`idquan`) REFERENCES `quan` (`id`);

--
-- Các ràng buộc cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD CONSTRAINT `lichlamviecfkcalam` FOREIGN KEY (`idcalam`) REFERENCES `calam` (`id`),
  ADD CONSTRAINT `lichlamviecfkkhuvuc` FOREIGN KEY (`idkhuvuc`) REFERENCES `khuvuc` (`id`),
  ADD CONSTRAINT `lichlamviecfkquan` FOREIGN KEY (`idquan`) REFERENCES `quan` (`id`),
  ADD CONSTRAINT `lichlamviecfkthanhvien` FOREIGN KEY (`idthanhvien`) REFERENCES `thanhvien` (`id`);

--
-- Các ràng buộc cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD CONSTRAINT `nguyenlieufkquan` FOREIGN KEY (`idquan`) REFERENCES `quan` (`id`);

--
-- Các ràng buộc cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD CONSTRAINT `thanhvienfkquan` FOREIGN KEY (`idquan`) REFERENCES `quan` (`id`),
  ADD CONSTRAINT `thanhvienfkvaitro` FOREIGN KEY (`idvaitro`) REFERENCES `vaitro` (`id`);

--
-- Các ràng buộc cho bảng `thucdon`
--
ALTER TABLE `thucdon`
  ADD CONSTRAINT `thucdonfkquan` FOREIGN KEY (`idquan`) REFERENCES `quan` (`id`);

--
-- Các ràng buộc cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD CONSTRAINT `vaitrofkquan` FOREIGN KEY (`idquan`) REFERENCES `quan` (`id`);

--
-- Các ràng buộc cho bảng `vaitro_quyen`
--
ALTER TABLE `vaitro_quyen`
  ADD CONSTRAINT `fkquyen` FOREIGN KEY (`idquyen`) REFERENCES `quyen` (`id`),
  ADD CONSTRAINT `fkvaitro` FOREIGN KEY (`idvaitro`) REFERENCES `vaitro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
