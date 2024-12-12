-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2024 lúc 06:03 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybenhvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bacsi`
--

CREATE TABLE `bacsi` (
  `MaBacSi` int(11) NOT NULL,
  `MaChuyenkhoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bacsi`
--

INSERT INTO `bacsi` (`MaBacSi`, `MaChuyenkhoa`) VALUES
(1, 1),
(90, 1),
(2, 2),
(92, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `benhnhan`
--

CREATE TABLE `benhnhan` (
  `maBenhNhan` int(11) NOT NULL,
  `HoTen` varchar(70) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `diaChi` varchar(255) DEFAULT NULL,
  `ngaySinh` varchar(10) DEFAULT NULL,
  `gioiTinh` varchar(3) NOT NULL,
  `mucBHYT` varchar(30) DEFAULT '0',
  `CCCD` int(11) DEFAULT NULL,
  `maBHYT` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `benhnhan`
--

INSERT INTO `benhnhan` (`maBenhNhan`, `HoTen`, `SoDienThoai`, `email`, `diaChi`, `ngaySinh`, `gioiTinh`, `mucBHYT`, `CCCD`, `maBHYT`) VALUES
(1, 'Trần Phát Đạt', '0787750973', 'datsieucapvippro@gmail.com', '14/16 Đường số 4 khu phố 2 TP. Thủ Đức', '1111-11-11', 'Nam', '0', NULL, '1234567892'),
(5, 'fdhdfh', '0787750973', 'datsieucapvippro@gmail.com', 'NULL', '1111-11-11', 'Nữ', '0', NULL, '1234567890'),
(101, 'Nguyen Thi A', '0787750973', 'a.nguyen@example.com', '123 Đường ABC, Quận 1, TP. Hồ Chí Minh', '1990-05-15', 'Nữ', '80', NULL, '1234567891'),
(102, 'Tran Minh B', '0787750974', 'b.tran@example.com', '30 Phú lập, Tân phú, Đồng Nai', '1985-08-20', 'Nam', '50', NULL, NULL),
(103, 'Le Thi C', '0787750975', 'c.le@example.com', 'Đà Nẵng', '1992-12-25', 'Nữ', '0', NULL, NULL),
(104, 'Pham Minh D', '0787750976', 'd.pham@example.com', 'Cần Thơ', '1988-03-10', 'Nam', NULL, NULL, NULL),
(105, 'Hoang Thi E', '0787750977', 'e.hoang@example.com', 'Hải Phòng', '1995-07-30', 'Nữ', NULL, NULL, NULL),
(106, 'fdhdfh', '0934841644', 'xbb78py@gmail.com', 'Phu', '1111-11-11', 'Nam', '0.8', 24324, '02423'),
(107, 'Datle', '0934841644', 'xbb78py@gmail.com', 'Phu', '1111-11-11', 'Nữ', '0.8', 1234, '0242377');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catruckham`
--

CREATE TABLE `catruckham` (
  `maCa` int(11) NOT NULL,
  `khungGio` varchar(70) NOT NULL,
  `maNhanVien` int(11) NOT NULL,
  `ghiChu` varchar(255) DEFAULT NULL,
  `trangThai` varchar(20) NOT NULL DEFAULT 'Đang hoạt động',
  `loaiCV` varchar(50) NOT NULL,
  `maPhong` int(11) NOT NULL,
  `maChuyenKhoa` int(11) NOT NULL,
  `ngayTruc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `catruckham`
--

INSERT INTO `catruckham` (`maCa`, `khungGio`, `maNhanVien`, `ghiChu`, `trangThai`, `loaiCV`, `maPhong`, `maChuyenKhoa`, `ngayTruc`) VALUES
(4, '08:00 - 12:00', 90, 'Sáng', 'Chờ duyệt đổi ca', 'Ca trực', 1, 1, '2024-12-10'),
(5, '08:00 - 12:00', 90, 'Chiều', 'Đã xác nhận', 'Ca trực', 1, 1, '2024-12-19'),
(6, '13:00-15:00', 92, 'Chiều', 'Đang hoạt động', 'Ca trực', 4, 3, '2024-12-14'),
(7, '4:00 - 11:00', 1, 'Sáng', 'Đang hoạt động', 'Ca Trực', 1, 2, '2024-12-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiettoathuoc`
--

CREATE TABLE `chitiettoathuoc` (
  `maCTTT` int(11) NOT NULL,
  `maToaThuoc` int(11) NOT NULL,
  `maThuoc` int(11) NOT NULL,
  `lieuLuong` varchar(40) NOT NULL,
  `tanSuat` varchar(40) NOT NULL,
  `thoiGianSuDung` varchar(50) NOT NULL,
  `huongDanSuDung` varchar(50) NOT NULL,
  `soLuongCapPhat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiettoathuoc`
--

INSERT INTO `chitiettoathuoc` (`maCTTT`, `maToaThuoc`, `maThuoc`, `lieuLuong`, `tanSuat`, `thoiGianSuDung`, `huongDanSuDung`, `soLuongCapPhat`) VALUES
(1, 5, 100, '500 mg', '2 lần/ngày', '14 ngày', 'Uống sau bữa ăn sáng và tối', 28),
(2, 5, 80, '1 viên', '2 lần/ngày', '14 ngày', 'Uống sau bữa ăn sáng và tối', 28),
(3, 5, 1, '50 mg', '1 lần/ngày', '14 ngày', 'Uống sau bữa ăn tối', 14),
(16, 4, 1, '500mg', '2 lần/ngày', '7 ngày', 'Uống sau bữa ăn', 14),
(17, 4, 2, '1 viên', '1 lần/ngày', '7 ngày', 'Uống vào buổi sáng', 7),
(18, 4, 3, '250mg', '3 lần/ngày', '7 ngày', 'Uống trước bữa ăn', 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyenkhoa`
--

CREATE TABLE `chuyenkhoa` (
  `maChuyenKhoa` int(11) NOT NULL,
  `tenChuyenKhoa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyenkhoa`
--

INSERT INTO `chuyenkhoa` (`maChuyenKhoa`, `tenChuyenKhoa`) VALUES
(2, 'Bệnh lý cột sống'),
(3, 'Chuyên gia thần kinh'),
(4, 'Da liễu'),
(5, 'Dị ứng - Miễn dịch lâm sàng'),
(6, 'Hậu môn học'),
(7, 'HEN-COPD'),
(8, 'Hình ảnh học can thiệp'),
(9, 'Hóa trị'),
(10, 'Huyết học'),
(11, 'Khám và tư vấn dinh dưỡng '),
(12, 'Lồng ngực - Mạch máu '),
(13, 'Mắt'),
(14, 'Nam khoa'),
(15, 'Ngoại thần kinh'),
(16, 'Ngoại tim mạch'),
(17, 'Nhi'),
(18, 'Nội cơ xương khớp'),
(19, 'Nội thận'),
(20, 'Nội tiết'),
(21, 'Phổi'),
(23, 'Phục hồi chức năng'),
(22, 'Sản - Phụ khoa'),
(24, 'Sơ sinh'),
(1, 'Tai - Mũi - Họng'),
(25, 'Thần kinh'),
(26, 'Tim mạch');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dieuduong`
--

CREATE TABLE `dieuduong` (
  `maDieuDuong` int(11) NOT NULL,
  `maChuyenKhoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dieuduong`
--

INSERT INTO `dieuduong` (`maDieuDuong`, `maChuyenKhoa`) VALUES
(93, 2),
(94, 16),
(95, 19),
(96, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giuongbenh`
--

CREATE TABLE `giuongbenh` (
  `maGiuong` int(11) NOT NULL,
  `maPhong` int(11) NOT NULL,
  `TrangThai` varchar(100) NOT NULL DEFAULT 'Trống'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giuongbenh`
--

INSERT INTO `giuongbenh` (`maGiuong`, `maPhong`, `TrangThai`) VALUES
(1, 3, 'Đang sử dụng'),
(2, 2, 'Đang sử dụng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `maHoaDon` int(11) NOT NULL,
  `maThuNgan` int(11) DEFAULT NULL,
  `maBenhNhan` int(11) NOT NULL,
  `NgayLap` date NOT NULL DEFAULT curdate(),
  `TongTien` decimal(20,2) NOT NULL,
  `TrangThaiThanhToan` varchar(50) NOT NULL DEFAULT 'Chưa Thanh Toán',
  `NgayThanhToan` date DEFAULT NULL,
  `LoaiHoaDon` varchar(50) NOT NULL DEFAULT 'Đăng Ký'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`maHoaDon`, `maThuNgan`, `maBenhNhan`, `NgayLap`, `TongTien`, `TrangThaiThanhToan`, `NgayThanhToan`, `LoaiHoaDon`) VALUES
(1, NULL, 5, '2024-12-10', 500000.00, 'Đã thanh toán', '2024-12-12', 'Khám bệnh'),
(2, NULL, 106, '2024-12-11', 500000.00, 'Đã thanh toán', '2024-12-12', 'Khám bệnh'),
(3, NULL, 107, '2024-12-11', 500000.00, 'Đã thanh toán', '2024-12-12', 'Khám bệnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hosobenhannoitru`
--

CREATE TABLE `hosobenhannoitru` (
  `maHSBANT` int(11) NOT NULL,
  `maBenhNhan` int(11) DEFAULT NULL,
  `maBacSi` int(11) DEFAULT NULL,
  `maChuyenKhoa` int(11) NOT NULL,
  `maPhacDoDieuTri` int(11) DEFAULT NULL,
  `maGiuong` int(11) DEFAULT NULL,
  `maHoaDon` int(11) DEFAULT NULL,
  `maDieuDuong` int(11) DEFAULT NULL,
  `NgayNhapVien` date DEFAULT NULL,
  `TrieuChung` varchar(100) DEFAULT NULL,
  `ChuanDoan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hosobenhannoitru`
--

INSERT INTO `hosobenhannoitru` (`maHSBANT`, `maBenhNhan`, `maBacSi`, `maChuyenKhoa`, `maPhacDoDieuTri`, `maGiuong`, `maHoaDon`, `maDieuDuong`, `NgayNhapVien`, `TrieuChung`, `ChuanDoan`) VALUES
(1, 5, 1, 2, 1, 1, NULL, 93, '0000-00-00', 'â', 'a'),
(3, 5, 90, 6, NULL, 2, NULL, 95, '0000-00-00', 'Khó nói', 'Khám nhưng không nói âu'),
(4, 5, 90, 7, NULL, NULL, NULL, 94, '0000-00-00', 'kkkk', 'hihi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(11) NOT NULL,
  `Hoten` varchar(50) NOT NULL,
  `SDT` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Diachi` varchar(100) DEFAULT NULL,
  `Chucvu` varchar(50) NOT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `Hoten`, `SDT`, `Email`, `Diachi`, `Chucvu`, `iduser`) VALUES
(1, 'Trần Việt Quân', '0987654321', 'lan.nguyen@example.com', '123 Nguyen Trai, HCM', 'Admin', 4),
(2, 'Xuân An', '0912345678', 'tu.tran@example.com', '45 Le Lai, Ha Noi', 'Thu ngân', 2),
(90, 'Đoàn Hửu Nhuận', '0988373223', 'nhuandoan2003@gmail.com', '12/23 Trần Khai Nguyên, Phường 5, Quận 6, TP.HCM', 'Bác sĩ', 6),
(92, 'Hà Anh', '0988373211', 'nguyena@gmail.com', '12/3 Trần Bá Giao, Phường 3, Quận 4, TP.HCM', 'Bác sĩ', 16),
(93, 'Nguyễn Thị A', '0909878765', 'anan@gmail.com', NULL, 'Điều dưỡng', 17),
(94, 'Đỗ Thị Như', '0337997655', 'nhu@gmail.com', NULL, 'Điều dưỡng', 18),
(95, 'Huỳnh Thanh Tú', '0776553422', 'tu@gmail.com', NULL, 'Điều dưỡng', 19),
(96, 'Nguyễn Như Quỳnh', '0904765778', 'quynh@gmail.com', NULL, 'Điều dưỡng', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phacdodieutri`
--

CREATE TABLE `phacdodieutri` (
  `maPhacDoDieuTri` int(11) NOT NULL,
  `maBenhNhan` int(11) DEFAULT NULL,
  `maToaThuoc` int(11) DEFAULT NULL,
  `HuongDieuTri` varchar(255) NOT NULL,
  `DieuTriCuThe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phacdodieutri`
--

INSERT INTO `phacdodieutri` (`maPhacDoDieuTri`, `maBenhNhan`, `maToaThuoc`, `HuongDieuTri`, `DieuTriCuThe`) VALUES
(1, 5, 5, 'Chuyên sâu', 'Truyền nước biển, theo dõi hằng ngày');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudangkykham`
--

CREATE TABLE `phieudangkykham` (
  `maPhieuDangKyKham` int(11) NOT NULL,
  `maBenhNhan` int(11) NOT NULL,
  `maCa` int(11) NOT NULL,
  `maHoaDon` int(11) NOT NULL,
  `maTiepTan` int(11) DEFAULT NULL,
  `NgayDangKy` date NOT NULL,
  `TrangThai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieudangkykham`
--

INSERT INTO `phieudangkykham` (`maPhieuDangKyKham`, `maBenhNhan`, `maCa`, `maHoaDon`, `maTiepTan`, `NgayDangKy`, `TrangThai`) VALUES
(1, 5, 4, 1, NULL, '2024-12-10', 'Đã thanh toán'),
(2, 106, 4, 2, NULL, '2024-12-11', 'Đã thanh toán'),
(3, 107, 4, 3, NULL, '2024-12-11', 'Đã thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieukham`
--

CREATE TABLE `phieukham` (
  `MaPK` int(11) NOT NULL,
  `maPhieuDangKyKham` int(11) NOT NULL,
  `MaBenhNhan` int(11) NOT NULL,
  `MaBacSi` int(11) DEFAULT NULL,
  `MaToaThuoc` int(11) DEFAULT NULL,
  `MaCa` int(11) NOT NULL,
  `MaChuyenKhoa` int(11) NOT NULL,
  `TrieuChung` varchar(100) NOT NULL,
  `ChuanDoan` varchar(100) NOT NULL,
  `GhiChu` varchar(100) DEFAULT NULL,
  `NgayTaiKham` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieukham`
--

INSERT INTO `phieukham` (`MaPK`, `maPhieuDangKyKham`, `MaBenhNhan`, `MaBacSi`, `MaToaThuoc`, `MaCa`, `MaChuyenKhoa`, `TrieuChung`, `ChuanDoan`, `GhiChu`, `NgayTaiKham`) VALUES
(17, 1, 1, 1, 4, 4, 1, 'Ho, sốt', 'Cảm cúm', 'Nghỉ ngơi, giữ ấm cơ thể', '2024-12-15'),
(18, 1, 5, 90, 4, 5, 2, 'Nản vãi ò', 'Suyyyyyy', 'To be ko tình yêu', '0000-00-00'),
(19, 1, 5, 1, 4, 4, 2, 'sdfs', 'sdfs', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieutheogioinoitru`
--

CREATE TABLE `phieutheogioinoitru` (
  `MaPhieuTheoDoi` int(11) NOT NULL,
  `MaHSBANT` int(11) NOT NULL,
  `HuyetAp` int(11) DEFAULT NULL,
  `NhipTim` int(11) DEFAULT NULL,
  `ThuocDaCap` varchar(100) NOT NULL,
  `GhiChu` varchar(100) DEFAULT NULL,
  `NgayGhiNhan` date NOT NULL DEFAULT current_timestamp(),
  `TrangThaiSucKhoe` varchar(50) NOT NULL,
  `maNhanVien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieutheogioinoitru`
--

INSERT INTO `phieutheogioinoitru` (`MaPhieuTheoDoi`, `MaHSBANT`, `HuyetAp`, `NhipTim`, `ThuocDaCap`, `GhiChu`, `NgayGhiNhan`, `TrangThaiSucKhoe`, `maNhanVien`) VALUES
(1, 1, 12, 12, 'adasd', 'adasd', '0000-00-00', 'đâ', 93),
(2, 1, 12, 12, 'adasd', 'adasd', '0000-00-00', 'đâ', 93),
(3, 3, NULL, NULL, '', NULL, '2024-12-12', '', 0),
(4, 1, 12, 12, 'adasd', 'adasd', '2024-12-12', 'đâ', 93);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuyeucaudoilich`
--

CREATE TABLE `phieuyeucaudoilich` (
  `maPhieuYCDL` int(11) NOT NULL,
  `maCaDoi` int(11) NOT NULL,
  `maCaThay` int(11) NOT NULL,
  `trangThai` varchar(20) NOT NULL DEFAULT 'Đang chờ',
  `lyDo` varchar(255) DEFAULT NULL,
  `maNhanVien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuyeucaudoilich`
--

INSERT INTO `phieuyeucaudoilich` (`maPhieuYCDL`, `maCaDoi`, `maCaThay`, `trangThai`, `lyDo`, `maNhanVien`) VALUES
(2, 4, 6, 'Đang chờ', 'Bệnh', 90);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `maPhong` int(11) NOT NULL,
  `tenPhong` varchar(50) DEFAULT NULL,
  `loaiPhong` varchar(50) DEFAULT NULL,
  `maChuyenKhoa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`maPhong`, `tenPhong`, `loaiPhong`, `maChuyenKhoa`) VALUES
(1, 'Phòng Cấp Cứu', 'Phòng Cấp Cứu', 1),
(2, 'Phòng Mổ', 'Phòng Phẫu Thuật', 2),
(3, 'Phòng Hậu Sản', 'Phòng Điều Trị', 3),
(4, 'Phòng Nội Soi', 'Phòng Kiểm Tra', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `namerole` varchar(100) NOT NULL,
  `mota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`idrole`, `namerole`, `mota`) VALUES
(1, 'Admin', 'Quản lý'),
(2, 'Bác sĩ', ''),
(3, 'Điều dưỡng', 'Điều dưỡng'),
(4, 'Thu ngân', ''),
(5, 'Dược sĩ', ''),
(6, 'Tiếp Tân', 'Tiếp Tân'),
(7, 'Quản lý khoa', ''),
(10, 'Bệnh Nhân', ''),
(11, 'Không chức năng', 'Không chức năng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuoc`
--

CREATE TABLE `thuoc` (
  `maThuoc` int(11) NOT NULL,
  `tenThuoc` varchar(100) NOT NULL,
  `LoaiThuoc` varchar(100) NOT NULL,
  `Hang` varchar(100) NOT NULL,
  `ThanhPhan` varchar(100) NOT NULL,
  `Gia` float NOT NULL,
  `SoLuongTonKho` int(11) NOT NULL DEFAULT 0,
  `PhanTramBHYT` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thuoc`
--

INSERT INTO `thuoc` (`maThuoc`, `tenThuoc`, `LoaiThuoc`, `Hang`, `ThanhPhan`, `Gia`, `SoLuongTonKho`, `PhanTramBHYT`) VALUES
(1, 'Paracetamol', 'Thuốc giảm đau', 'ABC Pharma', 'Paracetamol', 15000, 100, 50.00),
(2, 'Ibuprofen', 'Thuốc chống viêm', 'XYZ Pharma', 'Ibuprofen', 20000, 150, 60.00),
(3, 'Aspirin', 'Thuốc giảm đau', 'DEF Pharma', 'Aspirin', 10000, 200, 40.00),
(4, 'Amoxicillin', 'Kháng sinh', 'GHI Pharma', 'Amoxicillin', 30000, 50, 70.00),
(5, 'Cetirizine', 'Thuốc dị ứng', 'JKL Pharma', 'Cetirizine', 12000, 80, 30.00),
(6, 'Metformin', 'Thuốc tiểu đường', 'MNO Pharma', 'Metformin', 25000, 120, 80.00),
(7, 'Lisinopril', 'Thuốc huyết áp', 'PQR Pharma', 'Lisinopril', 22000, 90, 50.00),
(8, 'Losartan', 'Thuốc huyết áp', 'STU Pharma', 'Losartan', 18000, 110, 60.00),
(9, 'Simvastatin', 'Thuốc hạ cholesterol', 'VWX Pharma', 'Simvastatin', 35000, 60, 90.00),
(10, 'Omeprazole', 'Thuốc dạ dày', 'YZA Pharma', 'Omeprazole', 25000, 70, 75.00),
(11, 'Atorhasan', 'Thuốc hạ cholesterol', 'Hasan', 'Atorvastatin', 120000, 150, 90.00),
(12, 'atorlip', 'Thuốc hạ cholesterol', 'Lip', 'Atorvastatin', 110000, 200, 85.00),
(13, 'Atorlog', 'Thuốc hạ cholesterol', 'Log', 'Atorvastatin', 130000, 100, 90.00),
(14, 'Atorpa-E', 'Thuốc hạ cholesterol', 'Pa-E', 'Atorvastatin', 140000, 120, 85.00),
(15, 'Atorvastatin', 'Thuốc hạ cholesterol', 'Generic', 'Atorvastatin', 100000, 250, 90.00),
(16, 'Atorvastatin T.V Pharm', 'Thuốc hạ cholesterol', 'T.V Pharm', 'Atorvastatin', 125000, 180, 90.00),
(17, 'Atussin', 'Thuốc ho', 'Atussin', 'Ambroxol', 45000, 500, 85.00),
(18, 'Auclanityl', 'Thuốc kháng sinh', 'Auclanityl', 'Clindamycin', 200000, 50, 80.00),
(19, 'Audocals', 'Thuốc bổ xương', 'Audocals', 'Canxi', 90000, 300, 85.00),
(20, 'Augbactam', 'Thuốc kháng sinh', 'Augbactam', 'Amoxicillin', 200000, 100, 90.00),
(21, 'Augbidil', 'Thuốc kháng sinh', 'Augbidil', 'Ceftriaxone', 150000, 120, 85.00),
(22, 'Augen extra', 'Thuốc kháng sinh', 'Augen', 'Amoxicillin', 180000, 150, 90.00),
(23, 'Augmentin', 'Thuốc kháng sinh', 'GSK', 'Amoxicillin, Clavulanic acid', 200000, 200, 90.00),
(24, 'Augmentin 625 mg', 'Thuốc kháng sinh', 'GSK', 'Amoxicillin, Clavulanic acid', 230000, 150, 85.00),
(25, 'Augtipha', 'Thuốc kháng sinh', 'Augtipha', 'Azithromycin', 180000, 100, 90.00),
(26, 'Austriol Mebiphar', 'Thuốc nội tiết', 'Mebiphar', 'Estradiol', 250000, 50, 80.00),
(27, 'Avalo', 'Thuốc điều trị tim mạch', 'Avalo', 'Amlodipine', 120000, 200, 85.00),
(28, 'Avamys', 'Thuốc xịt mũi', 'Avamys', 'Fluticasone', 150000, 150, 90.00),
(29, 'Avarino 300 Mega', 'Thuốc bổ não', 'Avarino', 'Piracetam', 100000, 120, 85.00),
(30, 'Avastin', 'Thuốc điều trị ung thư', 'Genentech', 'Bevacizumab', 5000000, 30, 80.00),
(31, 'Avelox', 'Thuốc kháng sinh', 'Bayer', 'Moxifloxacin', 300000, 100, 90.00),
(32, 'Avisure Safoli', 'Thuốc bổ mắt', 'Safoli', 'Vitamin A, Vitamin C', 80000, 200, 85.00),
(33, 'Avi-O5', 'Thuốc bổ não', 'Avi-O5', 'Ginkgo biloba', 70000, 150, 90.00),
(34, 'Avodart', 'Thuốc điều trị tuyến tiền liệt', 'GlaxoSmithKline', 'Dutasteride', 200000, 100, 85.00),
(35, 'Axit axetic', 'Thuốc kháng sinh', 'Generic', 'Acetic acid', 50000, 200, 90.00),
(36, 'Axit glutamic', 'Thuốc bổ não', 'Generic', 'Glutamic acid', 60000, 150, 80.00),
(37, 'Axit salicylic', 'Thuốc trị mụn', 'Generic', 'Salicylic acid', 40000, 300, 90.00),
(38, 'Ayite', 'Thuốc trị ho', 'Ayite', 'Dextromethorphan', 30000, 100, 85.00),
(39, 'Azaduo', 'Thuốc điều trị ung thư', 'Azaduo', 'Azacitidine', 2000000, 30, 80.00),
(40, 'Azanex', 'Thuốc kháng sinh', 'Azanex', 'Azithromycin', 120000, 200, 85.00),
(41, 'Azargra', 'Thuốc kháng sinh', 'Azargra', 'Azithromycin', 130000, 150, 90.00),
(42, 'Azaroin gel', 'Thuốc trị mụn', 'Azaroin', 'Azelaic acid', 80000, 180, 85.00),
(43, 'Azibiotic', 'Thuốc kháng sinh', 'Azibiotic', 'Azithromycin', 150000, 120, 90.00),
(44, 'Azicine', 'Thuốc kháng sinh', 'Azicine', 'Azithromycin', 180000, 100, 90.00),
(45, 'Azithromycin DHG', 'Thuốc kháng sinh', 'DHG Pharma', 'Azithromycin', 120000, 250, 85.00),
(46, 'azitnic', 'Thuốc kháng sinh', 'Azitnic', 'Azithromycin', 110000, 180, 90.00),
(47, 'azoltel', 'Thuốc kháng sinh', 'Azoltel', 'Azithromycin', 140000, 150, 85.00),
(48, 'A.t Ambroxol', 'Thuốc trị ho', 'A.t', 'Ambroxol', 45000, 300, 85.00),
(49, 'Acarbose', 'Thuốc hạ đường huyết', 'Bayer', 'Acarbose', 100000, 10, 50.00),
(50, 'ACC 200', 'Giảm ho, long đờm', 'Hexal', 'Acetylcysteine 200mg', 70000, 20, 50.00),
(51, 'Aceclofenac', 'Kháng viêm, giảm đau', 'Mediphar', 'Aceclofenac', 50000, 15, 40.00),
(52, 'Acecyst', 'Giảm ho, long đờm', 'Stada', 'Acetylcysteine', 75000, 25, 50.00),
(53, 'Acehasan', 'Giảm ho, long đờm', 'Hasan', 'Acetylcysteine', 72000, 18, 45.00),
(54, 'Acemol 325 mg', 'Giảm đau, hạ sốt', 'Pharimexco', 'Paracetamol', 30000, 50, 30.00),
(55, 'Acemuc', 'Giảm ho, long đờm', 'Sanofi', 'Acetylcysteine', 60000, 30, 50.00),
(56, 'Acenocoumarol', 'Thuốc chống đông máu', 'Sandoz', 'Acenocoumarol', 120000, 5, 60.00),
(57, 'Acenocoumarol 1mg', 'Thuốc chống đông máu', 'Sandoz', 'Acenocoumarol', 130000, 8, 60.00),
(58, 'Acepron', 'Giảm đau, hạ sốt', 'Mediplantex', 'Paracetamol', 40000, 25, 30.00),
(59, 'Acetazolamid', 'Thuốc lợi tiểu', 'Stada', 'Acetazolamid', 90000, 10, 50.00),
(60, 'Acetylcysteine 200mg Stada', 'Giảm ho, long đờm', 'Stada', 'Acetylcysteine', 70000, 20, 50.00),
(61, 'Acetylcystein 200 mg', 'Giảm ho, long đờm', 'Hexal', 'Acetylcysteine', 68000, 22, 50.00),
(62, 'Aciclovir', 'Kháng virus', 'Stada', 'Acyclovir', 50000, 15, 40.00),
(63, 'Aciclovir 200mg', 'Kháng virus', 'Stada', 'Acyclovir', 52000, 15, 40.00),
(64, 'Acid nalidixic', 'Kháng khuẩn', 'Sanofi', 'Nalidixic acid', 85000, 10, 50.00),
(65, 'Aclasta', 'Thuốc điều trị loãng xương', 'Novartis', 'Zoledronic acid', 3200000, 5, 60.00),
(66, 'Acnekyn', 'Giảm đau, hạ sốt', 'Đông Nam Dược', 'Paracetamol', 55000, 20, 0.00),
(67, 'Acnequidt 20 ml', 'Dung dịch trị mụn', 'Rohto', 'Acid Salicylic', 65000, 12, 0.00),
(68, 'Acnotin', 'Điều trị mụn trứng cá', 'Medisun', 'Isotretinoin', 300000, 7, 0.00),
(69, 'Acritel', 'Thuốc kháng histamin', 'Sanofi', 'Cetirizine', 50000, 10, 30.00),
(70, 'Actapulgite', 'Điều trị tiêu chảy', 'Ipsen', 'Dioctahedral smectite', 40000, 25, 50.00),
(71, 'Actemra', 'Điều trị viêm khớp dạng thấp', 'Roche', 'Tocilizumab', 2500000, 2, 70.00),
(72, 'Actiso Ladophar', 'Hỗ trợ tiêu hóa', 'Ladophar', 'Cao Actiso', 120000, 50, 0.00),
(73, 'Acyclovir Boston 200', 'Kháng virus', 'Boston Pharma', 'Acyclovir', 45000, 30, 50.00),
(74, 'Acyclovir Boston 800', 'Kháng virus', 'Boston Pharma', 'Acyclovir', 75000, 20, 50.00),
(75, 'Acyclovir Stada 200 mg', 'Kháng virus', 'Stada', 'Acyclovir', 50000, 15, 50.00),
(76, 'Acyclovir Stella Cream', 'Kháng virus', 'Stella', 'Acyclovir', 60000, 10, 50.00),
(77, 'Acyclovir Stella 400 mg', 'Kháng virus', 'Stella', 'Acyclovir', 80000, 12, 50.00),
(78, 'Babi B.O.N', 'Dược phẩm hỗ trợ', 'Unknown', 'Thành phần không xác định', 100000, 10, 0.00),
(79, 'Baburol', 'Hỗ trợ tiêu hóa', 'Sanofi', 'Lactobacillus', 50000, 20, 50.00),
(80, 'Babytrim - New TW1', 'Hỗ trợ tiêu hóa', 'Tw1 Pharma', 'Chất xơ hòa tan', 60000, 15, 40.00),
(81, 'Baby Septol', 'Dung dịch sát khuẩn', 'Mediphar', 'Chlorhexidine gluconate', 70000, 25, 30.00),
(82, 'Baclofen', 'Giãn cơ, chống co thắt', 'Sandoz', 'Baclofen', 90000, 10, 50.00),
(83, 'Bactamox', 'Kháng sinh', 'Boston Pharma', 'Amoxicillin + Clavulanic acid', 120000, 8, 70.00),
(84, 'BACTROBAN', 'Kháng sinh dạng bôi', 'GlaxoSmithKline', 'Mupirocin', 80000, 15, 50.00),
(85, 'Bagocit', 'Điều trị tiêu chảy', 'Bagopharm', 'Cao Smecta', 40000, 30, 50.00),
(86, 'Bambec 10 mg', 'Điều trị hen suyễn', 'AstraZeneca', 'Bambuterol', 250000, 5, 70.00),
(87, 'Banitase', 'Chống co thắt dạ dày', 'Sanofi', 'Tiemonium methylsulfate', 45000, 20, 50.00),
(88, 'Bar', 'Thuốc giảm đau', 'Unknown', 'Thành phần không xác định', 30000, 10, 0.00),
(89, 'Barole', 'Điều trị trào ngược dạ dày', 'Stada', 'Omeprazole', 70000, 20, 40.00),
(90, 'Bart', 'Kháng viêm', 'Unknown', 'Thành phần không xác định', 60000, 15, 0.00),
(91, 'Barudon', 'Giảm đau, chống viêm', 'Unknown', 'Thành phần không xác định', 100000, 10, 0.00),
(92, 'Batigan', 'Thuốc chống dị ứng', 'Sanofi', 'Loratadine', 50000, 25, 30.00),
(93, 'Bazato', 'Hỗ trợ tiêu hóa', 'Mediplantex', 'Cao Actiso', 55000, 15, 40.00),
(94, 'Beatil', 'Thuốc điều trị tăng huyết áp', 'Stella', 'Amlodipine + Perindopril', 250000, 8, 70.00),
(95, 'Becozyme', 'Vitamin tổng hợp', 'Bayer', 'Vitamin nhóm B', 45000, 30, 0.00),
(96, 'Begenderm', 'Thuốc bôi ngoài da', 'Stada', 'Betamethasone + Gentamicin', 75000, 15, 50.00),
(97, 'Belaf', 'Thuốc nhỏ mắt', 'Rohto', 'Cromoglycic acid', 50000, 20, 0.00),
(98, 'Belara', 'Thuốc tránh thai', 'Jenapharm', 'Ethinylestradiol + Chlormadinone', 120000, 10, 0.00),
(99, 'Benate Fort Ointment', 'Thuốc bôi ngoài da', 'Glenmark', 'Betamethasone', 85000, 12, 50.00),
(100, 'Benda', 'Thuốc trị giun sán', 'Stada', 'Albendazole', 40000, 25, 30.00),
(101, 'Bentarcin', 'Thuốc chống viêm', 'Stella', 'Diclofenac', 60000, 20, 50.00),
(102, 'Cadifast', 'Hỗ trợ tiêu hóa', 'Cadila', 'Domperidone', 75000, 15, 50.00),
(103, 'Cafein', 'Kích thích thần kinh trung ương', 'Generic', 'Caffeine', 50000, 25, 30.00),
(104, 'Caffeine (hoạt chất)', 'Kích thích thần kinh', 'Generic', 'Caffeine', 45000, 20, 30.00),
(105, 'Calcigenol', 'Bổ sung canxi', 'Pharmax', 'Canxi gluconat', 120000, 10, 70.00),
(106, 'Calcium Boston', 'Bổ sung canxi', 'Boston Pharma', 'Calcium carbonate', 100000, 12, 50.00),
(107, 'Calcium Corbiere Extra', 'Bổ sung canxi', 'Sanofi', 'Calcium glubionate', 150000, 8, 70.00),
(108, 'Calcium Stada Vitamin D', 'Bổ sung canxi và vitamin D', 'Stada', 'Calcium + Vitamin D', 140000, 10, 70.00),
(109, 'Calci D Hasan', 'Bổ sung canxi', 'Hasan', 'Calcium + Vitamin D', 130000, 15, 50.00),
(110, 'Calci D Mekophar', 'Bổ sung canxi', 'Mekophar', 'Calcium + Vitamin D', 125000, 18, 50.00),
(111, 'Calcrem', 'Thuốc bôi ngoài da', 'Rohto', 'Calamine', 65000, 10, 30.00),
(112, 'Cammic', 'Hỗ trợ tiêu hóa', 'Mediphar', 'Cao hương nhu', 45000, 25, 40.00),
(113, 'Candesartan', 'Điều trị tăng huyết áp', 'AstraZeneca', 'Candesartan cilexetil', 250000, 8, 70.00),
(114, 'Canditral', 'Thuốc chống nấm', 'Janssen', 'Itraconazole', 300000, 5, 70.00),
(115, 'Canesten', 'Thuốc chống nấm', 'Bayer', 'Clotrimazole', 75000, 12, 50.00),
(116, 'Cao dán Yaguchi', 'Thuốc giảm đau', 'Yaguchi Pharma', 'Menthol', 35000, 20, 40.00),
(117, 'Cao Sao Vàng', 'Thuốc xoa ngoài da', 'Xí nghiệp Dược phẩm 1', 'Tinh dầu bạc hà, long não', 20000, 50, 0.00),
(118, 'Caplor', 'Thuốc kháng sinh', 'Boston Pharma', 'Cefaclor', 120000, 10, 70.00),
(119, 'Captopril', 'Điều trị tăng huyết áp', 'Stada', 'Captopril', 75000, 15, 70.00),
(120, 'Carbimazol', 'Điều trị cường giáp', 'Generic', 'Carbimazole', 90000, 8, 50.00),
(121, 'Carbocistein', 'Điều trị ho, long đờm', 'Stada', 'Carbocisteine', 70000, 20, 50.00),
(122, 'Carbogast', 'Thuốc hỗ trợ tiêu hóa', 'Mekophar', 'Activated charcoal', 45000, 15, 40.00),
(123, 'Carbomango', 'Thuốc hỗ trợ tiêu hóa', 'Unknown', 'Activated charcoal', 50000, 12, 30.00),
(124, 'Carbomint', 'Thuốc hỗ trợ tiêu hóa', 'Generic', 'Activated charcoal', 48000, 18, 30.00),
(125, 'Carbotrim', 'Thuốc hỗ trợ tiêu hóa', 'Generic', 'Activated charcoal', 47000, 16, 30.00),
(126, 'Cardilopin', 'Điều trị tăng huyết áp', 'Stella', 'Amlodipine', 140000, 10, 70.00),
(127, 'Carflem', 'Thuốc long đờm', 'Stada', 'Ambroxol', 65000, 15, 50.00),
(128, 'Carsantin', 'Thuốc giãn mạch não', 'Stella', 'Pentoxifylline', 95000, 8, 50.00),
(129, 'Casalmux', 'Thuốc long đờm', 'Boston Pharma', 'Acetylcysteine', 70000, 20, 50.00),
(130, 'Cataflam', 'Thuốc giảm đau kháng viêm', 'Novartis', 'Diclofenac potassium', 95000, 12, 50.00),
(131, 'Cavinton', 'Điều trị thiểu năng tuần hoàn não', 'Gedeon Richter', 'Vinpocetine', 125000, 10, 50.00),
(132, 'Ca - C 1000 Sandoz Orange', 'Bổ sung vitamin C', 'Sandoz', 'Vitamin C + Calcium', 50000, 25, 40.00),
(133, 'Cebraton', 'Bổ não', 'Traphaco', 'Cao bạch quả', 90000, 18, 30.00),
(134, 'Cebrex', 'Thuốc giảm đau', 'Generic', 'Ibuprofen', 65000, 15, 50.00),
(135, 'Daflon', 'Hỗ trợ tĩnh mạch', 'Servier', 'Diosmin + Hesperidin', 150000, 10, 70.00),
(136, 'Daktarin', 'Thuốc chống nấm', 'Janssen', 'Miconazole', 95000, 15, 50.00),
(137, 'Dalacin T', 'Thuốc kháng sinh', 'Pfizer', 'Clindamycin', 120000, 12, 70.00),
(138, 'Dalfusin', 'Thuốc kháng viêm', 'Generic', 'Hydrocortisone', 75000, 20, 50.00),
(139, 'Danapha Trihex', 'Thuốc chống co thắt', 'Danapha', 'Trihexyphenidyl', 60000, 18, 50.00),
(140, 'Danospan', 'Thuốc hỗ trợ tiêu hóa', 'Generic', 'Simethicone', 55000, 25, 40.00),
(141, 'Davibest', 'Thuốc bổ gan', 'Mediplantex', 'Cao Actiso', 130000, 8, 30.00),
(142, 'Davita Bone Sugar Free', 'Bổ sung canxi', 'Vita', 'Calcium carbonate', 110000, 10, 70.00),
(143, 'Davyca', 'Thuốc kháng sinh', 'Stada', 'Cefadroxil', 125000, 12, 50.00),
(144, 'Debby', 'Thuốc giảm đau', 'Generic', 'Paracetamol', 40000, 50, 30.00),
(145, 'Decolgen Forte', 'Thuốc cảm cúm', 'United Pharma', 'Paracetamol + Phenylephrine', 70000, 20, 40.00),
(146, 'Decolic', 'Thuốc giảm đau bụng', 'Mekophar', 'Alverine citrate', 85000, 15, 50.00),
(147, 'Decontractyl', 'Thuốc giãn cơ', 'Sanofi', 'Mephenesin', 95000, 12, 50.00),
(148, 'Deferasirox', 'Thuốc điều trị thải sắt', 'Novartis', 'Deferasirox', 850000, 5, 70.00),
(149, 'Dentanalgi', 'Thuốc bôi giảm đau răng', 'Generic', 'Benzocaine', 45000, 30, 40.00),
(150, 'Depakin', 'Thuốc điều trị động kinh', 'Sanofi', 'Valproic acid', 250000, 10, 70.00),
(151, 'Depo-Medrol', 'Thuốc kháng viêm', 'Pfizer', 'Methylprednisolone acetate', 150000, 8, 50.00),
(152, 'Derma Forte', 'Kem trị mụn', 'Gamma', 'Azelaic acid', 85000, 25, 40.00),
(153, 'Dermovate', 'Thuốc bôi kháng viêm', 'GSK', 'Clobetasol propionate', 100000, 12, 50.00),
(154, 'Desloratadin', 'Thuốc chống dị ứng', 'Stada', 'Desloratadine', 85000, 20, 50.00),
(155, 'Destacure', 'Thuốc chống dị ứng', 'Generic', 'Fexofenadine', 90000, 15, 50.00),
(156, 'Devastin', 'Thuốc giảm cholesterol', 'Generic', 'Atorvastatin', 180000, 8, 70.00),
(157, 'Devodil', 'Thuốc chống viêm', 'Generic', 'Diclofenac', 85000, 18, 50.00),
(158, 'Deworm', 'Thuốc tẩy giun', 'Generic', 'Albendazole', 30000, 50, 30.00),
(159, 'Dexacin', 'Thuốc kháng viêm', 'Stada', 'Dexamethasone', 65000, 15, 50.00),
(160, 'Dexamethasone', 'Thuốc kháng viêm', 'Generic', 'Dexamethasone', 50000, 20, 50.00),
(161, 'Dexlacyl', 'Thuốc kháng viêm', 'Generic', 'Dexamethasone', 55000, 15, 50.00),
(162, 'Dextromethorphan', 'Thuốc giảm ho', 'Generic', 'Dextromethorphan', 30000, 25, 40.00),
(163, 'Dextrose', 'Bổ sung dinh dưỡng', 'Generic', 'Dextrose', 40000, 30, 50.00),
(164, 'Diacerein', 'Thuốc điều trị thoái hóa khớp', 'Generic', 'Diacerein', 250000, 10, 70.00),
(165, 'Diamicron®', 'Thuốc điều trị tiểu đường', 'Servier', 'Gliclazide', 120000, 15, 70.00),
(166, 'Diane-35', 'Thuốc tránh thai', 'Bayer', 'Cyproterone acetate + Ethinylestradiol', 200000, 8, 50.00),
(167, 'Doxycycline', 'Kháng sinh', 'Generic', 'Doxycycline', 70000, 12, 60.00),
(168, 'Drimy', 'Thuốc chống viêm', 'Generic', 'Flurbiprofen', 85000, 15, 50.00),
(169, 'Drosperin', 'Thuốc nội tiết', 'Bayer', 'Drospirenone', 200000, 10, 70.00),
(170, 'Dung dịch Argistad Stella', 'Dung dịch kháng viêm', 'Stella', 'Arginine', 50000, 20, 50.00),
(171, 'DuoPlavin', 'Thuốc tim mạch', 'Pfizer', 'Clopidogrel + Aspirin', 350000, 8, 70.00),
(172, 'Duphalac', 'Thuốc nhuận tràng', 'Abbott', 'Lactulose', 60000, 25, 50.00),
(173, 'Duphaston', 'Thuốc nội tiết', 'Abbott', 'Dydrogesterone', 130000, 10, 70.00),
(174, 'Dydrogesterone', 'Thuốc nội tiết', 'Generic', 'Dydrogesterone', 85000, 12, 60.00),
(175, 'D-Cure', 'Thuốc bổ sung vitamin D', 'Generic', 'Vitamin D3', 60000, 30, 50.00),
(176, 'Dạ dày Mộc Hoa', 'Thuốc dạ dày', 'Mộc Hoa', 'Chiết xuất cây thuốc', 45000, 20, 30.00),
(177, 'Dầu cây Búa', 'Dầu xoa bóp', 'Generic', 'Cây búa', 35000, 50, 40.00),
(178, 'Dầu cù là Thiên Thảo', 'Dầu xoa bóp', 'Thiên Thảo', 'Tinh dầu', 45000, 40, 50.00),
(179, 'Dầu gió Cheng Cheng oil', 'Dầu xoa bóp', 'Cheng Cheng', 'Tinh dầu bạc hà', 55000, 50, 60.00),
(180, 'Dầu gió Eagle Lavender Singapore', 'Dầu xoa bóp', 'Eagle', 'Tinh dầu lavender', 60000, 30, 50.00),
(181, 'Dầu gió Hàn Quốc Antiphlamine', 'Dầu xoa bóp', 'Antiphlamine', 'Tinh dầu thảo dược', 70000, 20, 60.00),
(182, 'Dầu gió Khuynh Diệp', 'Dầu xoa bóp', 'Generic', 'Khuynh diệp', 50000, 45, 50.00),
(183, 'Dầu gió Kim', 'Dầu xoa bóp', 'Kim', 'Tinh dầu gừng', 60000, 40, 50.00),
(184, 'Dầu gió Kim Chuông', 'Dầu xoa bóp', 'Kim Chuông', 'Tinh dầu thảo dược', 65000, 30, 50.00),
(185, 'Dầu gió Kim Linh', 'Dầu xoa bóp', 'Kim Linh', 'Tinh dầu', 50000, 25, 40.00),
(186, 'Dầu gió Nâu', 'Dầu xoa bóp', 'Generic', 'Tinh dầu gừng', 35000, 60, 40.00),
(187, 'Dầu gió Nhị Thiên Đường', 'Dầu xoa bóp', 'Nhị Thiên Đường', 'Tinh dầu thảo dược', 55000, 55, 50.00),
(188, 'Dầu gió Phật Linh', 'Dầu xoa bóp', 'Phật Linh', 'Tinh dầu thảo dược', 60000, 50, 50.00),
(189, 'Dầu gió sư tử Singapore', 'Dầu xoa bóp', 'Sư Tử', 'Tinh dầu bạc hà', 65000, 30, 60.00),
(190, 'Dầu gió Thái Lan Siang Pure Oil', 'Dầu xoa bóp', 'Siang Pure', 'Tinh dầu thảo dược', 70000, 40, 60.00),
(191, 'Dầu gió thảo dược Thái Lan', 'Dầu xoa bóp', 'Thái Lan', 'Tinh dầu thảo dược', 50000, 50, 50.00),
(192, 'Ebastine', 'Thuốc kháng histamine', 'Generic', 'Ebastine', 45000, 30, 70.00),
(193, 'Ednyt', 'Thuốc giảm đau', 'Generic', 'Ibuprofen', 55000, 20, 50.00),
(194, 'Efferalgan', 'Thuốc giảm đau', 'Sanofi', 'Paracetamol', 60000, 40, 60.00),
(195, 'Efferalgan Codein', 'Thuốc giảm đau', 'Sanofi', 'Paracetamol + Codeine', 80000, 15, 50.00),
(196, 'Efferalgan (Bột sủi)', 'Thuốc giảm đau', 'Sanofi', 'Paracetamol', 50000, 35, 60.00),
(197, 'Efferalgan (Đặt hậu môn)', 'Thuốc giảm đau', 'Sanofi', 'Paracetamol', 70000, 20, 50.00),
(198, 'Effer Paralmax Extra', 'Thuốc giảm đau', 'Sanofi', 'Paracetamol + Caffeine', 75000, 18, 50.00),
(199, 'Eganin', 'Thuốc kháng viêm', 'Generic', 'Diclofenac', 60000, 30, 60.00),
(200, 'Egilok', 'Thuốc tim mạch', 'Generic', 'Metoprolol', 85000, 25, 70.00),
(201, 'Elitan', 'Thuốc điều trị huyết áp', 'Generic', 'Lisinopril', 65000, 20, 60.00),
(202, 'Elovess', 'Thuốc điều trị cholesterol', 'Generic', 'Ezetimibe', 90000, 15, 60.00),
(203, 'Eloxatin®', 'Thuốc điều trị ung thư', 'Sanofi', 'Oxaliplatin', 1500000, 5, 50.00),
(204, 'Elthon', 'Thuốc giảm đau', 'Generic', 'Paracetamol', 50000, 40, 60.00),
(205, 'Emla', 'Thuốc gây tê tại chỗ', 'AstraZeneca', 'Lidocaine + Prilocaine', 130000, 10, 70.00),
(206, 'Emzinc', 'Thuốc bổ sung kẽm', 'Generic', 'Zinc', 25000, 50, 80.00),
(207, 'Encorate', 'Thuốc chống co giật', 'Sun Pharma', 'Sodium Valproate', 95000, 12, 70.00),
(208, 'Enoti', 'Thuốc chống viêm', 'Generic', 'Ibuprofen', 60000, 30, 50.00),
(209, 'Enterogermina', 'Thuốc bổ sung lợi khuẩn', 'Biocodex', 'Bacillus clausii', 75000, 40, 60.00),
(210, 'Enterpass', 'Thuốc chống tiêu chảy', 'Generic', 'Loperamide', 35000, 50, 70.00),
(211, 'Eperison', 'Thuốc giãn cơ', 'Generic', 'Eperisone', 45000, 20, 60.00),
(212, 'Epiduo', 'Thuốc điều trị mụn', 'Galderma', 'Adapalene + Benzoyl Peroxide', 100000, 10, 60.00),
(213, 'Epinephrine', 'Thuốc cấp cứu', 'Generic', 'Epinephrine', 120000, 5, 50.00),
(214, 'Farzincol', 'Thuốc bổ sung kẽm', 'Generic', 'Zinc', 50000, 40, 60.00),
(215, 'Favipiravir', 'Thuốc điều trị virus', 'Generic', 'Favipiravir', 250000, 10, 70.00),
(216, 'Feburic', 'Thuốc giảm acid uric', 'Generic', 'Febuxostat', 80000, 25, 50.00),
(217, 'Febuxostat', 'Thuốc giảm acid uric', 'Generic', 'Febuxostat', 75000, 30, 60.00),
(218, 'Fefasdin 60', 'Thuốc chống dị ứng', 'Generic', 'Fexofenadine', 50000, 20, 70.00),
(219, 'Femara', 'Thuốc điều trị ung thư', 'Novartis', 'Letrozole', 250000, 5, 50.00),
(220, 'Fenaflam', 'Thuốc giảm đau', 'Generic', 'Flurbiprofen', 60000, 15, 60.00),
(221, 'Fenofibrat', 'Thuốc giảm cholesterol', 'Generic', 'Fenofibrate', 70000, 30, 50.00),
(222, 'Ferlatum', 'Thuốc bổ sung sắt', 'Laboratoires', 'Ferric Saccharate', 55000, 25, 60.00),
(223, 'Ferrovit', 'Thuốc bổ sung sắt', 'Generic', 'Iron + Vitamin C', 45000, 40, 70.00),
(224, 'Fexofenadin', 'Thuốc kháng histamine', 'Generic', 'Fexofenadine', 35000, 30, 60.00),
(225, 'Fexofenadine', 'Thuốc kháng histamine', 'Generic', 'Fexofenadine', 40000, 20, 70.00),
(226, 'Fexostad', 'Thuốc giảm dị ứng', 'Generic', 'Fexofenadine', 45000, 25, 60.00),
(227, 'Finasteride', 'Thuốc điều trị tóc', 'Generic', 'Finasteride', 100000, 20, 50.00),
(228, 'Flagyl', 'Thuốc kháng khuẩn', 'Sanofi', 'Metronidazole', 80000, 35, 70.00),
(229, 'Flecainide', 'Thuốc tim mạch', 'Generic', 'Flecainide', 150000, 10, 60.00),
(230, 'Flemex', 'Thuốc điều trị ho', 'Generic', 'Dextromethorphan', 40000, 50, 70.00),
(231, 'Flixotide', 'Thuốc điều trị hen suyễn', 'GlaxoSmithKline', 'Fluticasone', 120000, 20, 80.00),
(232, 'Flucinar', 'Thuốc điều trị viêm da', 'Generic', 'Fluocinolone', 65000, 25, 60.00),
(233, 'Flucort-N', 'Thuốc chống viêm', 'Generic', 'Fluocinolone + Neomycin', 70000, 15, 60.00),
(234, 'Flumazenil', 'Thuốc chống độc', 'Generic', 'Flumazenil', 200000, 5, 50.00),
(235, 'Flumetholon', 'Thuốc chống viêm', 'Generic', 'Flumetholone', 85000, 20, 60.00),
(236, 'Fluomizin', 'Thuốc điều trị nhiễm khuẩn', 'Generic', 'Dequalinium', 50000, 30, 60.00),
(237, 'Fluoroquinolone', 'Thuốc kháng sinh', 'Generic', 'Ciprofloxacin', 70000, 40, 70.00),
(238, 'Fluoxetin', 'Thuốc điều trị trầm cảm', 'Generic', 'Fluoxetine', 80000, 50, 60.00),
(239, 'Galvus', 'Thuốc điều trị tiểu đường', 'Novartis', 'Vildagliptin', 320000, 30, 80.00),
(240, 'Galvus Met', 'Thuốc điều trị tiểu đường', 'Novartis', 'Vildagliptin + Metformin', 350000, 25, 75.00),
(241, 'Gamalate B6', 'Thuốc bổ não', 'DHG Pharma', 'Vitamin B6', 50000, 40, 60.00),
(242, 'Gastropulgite', 'Thuốc điều trị dạ dày', 'Generic', 'Magnesium hydroxide', 70000, 35, 70.00),
(243, 'Gaviscon', 'Thuốc giảm đau dạ dày', 'Reckitt Benckiser', 'Alginic acid', 90000, 50, 80.00),
(244, 'Gel Dermatix Ultra', 'Gel điều trị sẹo', 'Bioskin', 'Silicone', 250000, 20, 90.00),
(245, 'Gel Hiruscar', 'Gel điều trị sẹo', 'Hiruscar', 'Allium cepa extract', 180000, 30, 80.00),
(246, 'Gel nghệ nano Decumar', 'Gel điều trị sẹo', 'Dược phẩm Dược Tâm', 'Curcumin', 120000, 40, 85.00),
(247, 'Gel Pepsane', 'Gel điều trị viêm loét', 'Generic', 'Simethicone', 50000, 50, 70.00),
(248, 'Gel subạc', 'Gel điều trị vết thương', 'Generic', 'Neomycin', 55000, 30, 60.00),
(249, 'Gentamicin Sulfate', 'Kháng sinh', 'Generic', 'Gentamicin', 70000, 40, 60.00),
(250, 'Gentamicin (hoạt chất)', 'Kháng sinh', 'Generic', 'Gentamicin', 65000, 35, 70.00),
(251, 'Gentamicin (thuốc)', 'Kháng sinh', 'Generic', 'Gentamicin', 75000, 30, 65.00),
(252, 'Gentrisone', 'Thuốc điều trị viêm', 'Generic', 'Gentamicin + Betamethasone', 120000, 25, 60.00),
(253, 'Ginkor Fort', 'Thuốc điều trị tuần hoàn', 'Laboratoires', 'Ginkgo biloba', 150000, 20, 70.00),
(254, 'Giảm đau', 'Thuốc giảm đau', 'Generic', 'Acetaminophen', 30000, 100, 50.00),
(255, 'Gliatilin', 'Thuốc điều trị đột quỵ', 'Generic', 'Cerebrolysin', 200000, 15, 65.00),
(256, 'Glimepiride', 'Thuốc điều trị tiểu đường', 'Generic', 'Glimepiride', 80000, 40, 70.00),
(257, 'Glivec®', 'Thuốc điều trị ung thư', 'Novartis', 'Imatinib', 1500000, 10, 60.00),
(258, 'Glotadol', 'Thuốc điều trị viêm', 'Generic', 'Paracetamol', 35000, 50, 75.00),
(259, 'Glucophage', 'Thuốc điều trị tiểu đường', 'Bristol-Myers Squibb', 'Metformin', 150000, 50, 80.00),
(260, 'Halixol', 'Thuốc điều trị viêm', 'Generic', 'Ambroxol', 80000, 40, 70.00),
(261, 'Haloperidol', 'Thuốc chống loạn thần', 'Janssen', 'Haloperidol', 120000, 30, 50.00),
(262, 'Hapacol', 'Thuốc giảm đau', 'DHG Pharma', 'Paracetamol', 50000, 50, 80.00),
(263, 'Hatabtrypsin', 'Thuốc hỗ trợ tiêu hóa', 'Generic', 'Trypsin', 70000, 35, 60.00),
(264, 'Hemblood', 'Thuốc bổ máu', 'Generic', 'Iron', 120000, 30, 65.00),
(265, 'Hemopoly', 'Thuốc bổ máu', 'Generic', 'Iron + Folic Acid', 80000, 45, 75.00),
(266, 'HemoQ Mom', 'Thuốc bổ máu', 'HemoQ', 'Iron + Vitamin B12', 150000, 20, 70.00),
(267, 'Hepbest', 'Thuốc điều trị viêm gan', 'Generic', 'Tenofovir', 250000, 30, 60.00),
(268, 'Herbesser', 'Thuốc điều trị ung thư', 'Novartis', 'Lapatinib', 2500000, 15, 50.00),
(269, 'Herceptin', 'Thuốc điều trị ung thư', 'Genentech', 'Trastuzumab', 5000000, 10, 60.00),
(270, 'Hidrasec', 'Thuốc điều trị tiêu chảy', 'Sanofi', 'Racecadotril', 150000, 40, 70.00),
(271, 'Hirmen', 'Thuốc bổ não', 'Generic', 'Ginkgo biloba', 120000, 50, 80.00),
(272, 'Homtamin Ginseng', 'Thuốc bổ não', 'Generic', 'Ginseng', 100000, 30, 75.00),
(273, 'Hoạt huyết dưỡng não', 'Thuốc bổ não', 'Generic', 'Ginkgo biloba', 70000, 60, 85.00),
(274, 'Hoạt Huyết Nhất Nhất', 'Thuốc bổ não', 'Nhất Nhất', 'Tinh chất từ thảo dược', 80000, 50, 80.00),
(275, 'Humira Pen', 'Thuốc điều trị viêm khớp', 'AbbVie', 'Adalimumab', 1500000, 10, 65.00),
(276, 'Hydrocortisone', 'Thuốc giảm viêm', 'Generic', 'Hydrocortisone', 90000, 70, 75.00),
(277, 'Ibuprofen', 'Thuốc giảm đau', 'Generic', 'Ibuprofen', 35000, 60, 80.00),
(278, 'Idarac', 'Thuốc chống ung thư', 'Generic', 'Idarubicin', 1200000, 20, 50.00),
(279, 'Imidu', 'Thuốc chống viêm', 'Generic', 'Dimethyl sulfoxide', 45000, 40, 70.00),
(280, 'Imodium', 'Thuốc điều trị tiêu chảy', 'Janssen', 'Loperamide', 55000, 50, 75.00),
(281, 'Insulin', 'Thuốc điều trị tiểu đường', 'Novo Nordisk', 'Insulin', 150000, 30, 90.00),
(282, 'Invanz', 'Thuốc kháng sinh', 'Merck', 'Ertapenem', 800000, 15, 50.00),
(283, 'Iressa', 'Thuốc điều trị ung thư', 'AstraZeneca', 'Gefitinib', 2500000, 10, 60.00),
(284, 'Isotretinoin', 'Thuốc điều trị mụn', 'Generic', 'Isotretinoin', 120000, 40, 70.00),
(285, 'Ivermectin', 'Thuốc điều trị ký sinh trùng', 'Generic', 'Ivermectin', 60000, 70, 85.00),
(286, 'Ibuprofen', 'Thuốc giảm đau', 'Generic', 'Ibuprofen', 35000, 60, 80.00),
(287, 'Idarac', 'Thuốc chống ung thư', 'Generic', 'Idarubicin', 1200000, 20, 50.00),
(288, 'Imidu', 'Thuốc chống viêm', 'Generic', 'Dimethyl sulfoxide', 45000, 40, 70.00),
(289, 'Imodium', 'Thuốc điều trị tiêu chảy', 'Janssen', 'Loperamide', 55000, 50, 75.00),
(290, 'Insulin', 'Thuốc điều trị tiểu đường', 'Novo Nordisk', 'Insulin', 150000, 30, 90.00),
(291, 'Invanz', 'Thuốc kháng sinh', 'Merck', 'Ertapenem', 800000, 15, 50.00),
(292, 'Iressa', 'Thuốc điều trị ung thư', 'AstraZeneca', 'Gefitinib', 2500000, 10, 60.00),
(293, 'Isotretinoin', 'Thuốc điều trị mụn', 'Generic', 'Isotretinoin', 120000, 40, 70.00),
(294, 'Ivermectin', 'Thuốc điều trị ký sinh trùng', 'Generic', 'Ivermectin', 60000, 70, 85.00),
(295, 'Lactacyd', 'Sữa rửa phụ khoa', 'Generic', 'Lactic acid', 60000, 100, 90.00),
(296, 'Lactomin', 'Thuốc bổ sung probiotic', 'Generic', 'Lactobacillus', 150000, 80, 85.00),
(297, 'Lamisil', 'Thuốc điều trị nấm', 'Novartis', 'Terbinafine', 120000, 50, 75.00),
(298, 'Lansoprazol', 'Thuốc điều trị dạ dày', 'Generic', 'Lansoprazole', 70000, 70, 80.00),
(299, 'Lantus', 'Insulin điều trị tiểu đường', 'Sanofi', 'Insulin glargine', 250000, 30, 60.00),
(300, 'Laroscorbine', 'Vitamin C', 'Dược phẩm Trung ương', 'Ascorbic acid', 40000, 120, 90.00),
(301, 'Legalon', 'Thuốc bảo vệ gan', 'Meda Pharma', 'Silymarin', 95000, 50, 80.00),
(302, 'LevoDHG 750', 'Kháng sinh', 'DHG Pharma', 'Levofloxacin', 90000, 60, 85.00),
(303, 'Levofloxacin', 'Kháng sinh', 'Generic', 'Levofloxacin', 80000, 80, 75.00),
(304, 'Levothyrox', 'Thuốc điều trị suy giáp', 'Merck', 'Levothyroxine', 150000, 40, 70.00),
(305, 'Lexomil', 'Thuốc an thần', 'Roche', 'Bromazepam', 110000, 50, 80.00),
(306, 'Lidocain', 'Thuốc gây tê', 'Generic', 'Lidocaine', 50000, 100, 90.00),
(307, 'Lincomycin', 'Kháng sinh', 'Generic', 'Lincomycin', 60000, 70, 75.00),
(308, 'Lipanthyl (fenofibrat)', 'Thuốc điều trị rối loạn lipid máu', 'Novartis', 'Fenofibrate', 130000, 60, 85.00),
(309, 'Lisinopril', 'Thuốc điều trị tăng huyết áp', 'Generic', 'Lisinopril', 40000, 100, 90.00),
(310, 'Liverstad', 'Thuốc bảo vệ gan', 'Liverstad', 'Silymarin', 120000, 50, 80.00),
(311, 'Liverton 140', 'Thuốc bảo vệ gan', 'Generic', 'Silymarin', 100000, 60, 75.00),
(312, 'Locacid', 'Thuốc trị mụn', 'Generic', 'Clindamycin', 85000, 40, 70.00),
(313, 'Lomac', 'Thuốc điều trị dạ dày', 'Sandoz', 'Lansoprazole', 70000, 80, 80.00),
(314, 'Lopid (gemfibrozil)', 'Thuốc điều trị lipid máu cao', 'Generic', 'Gemfibrozil', 95000, 50, 75.00),
(315, 'Lornoxicam', 'Thuốc giảm đau', 'Generic', 'Lornoxicam', 85000, 60, 80.00),
(316, 'Maalox', 'Thuốc dạ dày', 'Sanofi', 'Magnesium hydroxide, Aluminum hydroxide', 60000, 100, 90.00),
(317, 'MabThera', 'Thuốc điều trị ung thư', 'Roche', 'Rituximab', 1000000, 30, 70.00),
(318, 'Madopar', 'Thuốc điều trị Parkinson', 'Sandoz', 'Levodopa, Benserazide', 200000, 50, 80.00),
(319, 'Magne - B6 Corbiere', 'Thuốc bổ sung Magie', 'Corbiere', 'Magnesium, Vitamin B6', 120000, 80, 85.00),
(320, 'Maltofer', 'Thuốc bổ sung sắt', 'Vifor Pharma', 'Iron polymaltose complex', 80000, 70, 75.00),
(321, 'Marvelon', 'Thuốc tránh thai', 'Organon', 'Desogestrel, Ethinylestradiol', 150000, 60, 90.00),
(322, 'Maxitrol', 'Thuốc kháng sinh', 'Novartis', 'Neomycin, Polymyxin B, Dexamethasone', 200000, 50, 70.00),
(323, 'Mecobalamin', 'Vitamin B12', 'Generic', 'Mecobalamin', 30000, 120, 80.00),
(324, 'Medoral', 'Thuốc chống viêm', 'Generic', 'Methylprednisolone', 150000, 50, 75.00),
(325, 'Medrol', 'Thuốc chống viêm', 'Pfizer', 'Methylprednisolone', 200000, 40, 70.00),
(326, 'Medskin clovir', 'Thuốc trị mụn', 'Medskin', 'Aciclovir', 60000, 90, 85.00),
(327, 'Medskin Ery', 'Thuốc trị mụn', 'Medskin', 'Erythromycin', 55000, 100, 80.00),
(328, 'Megaduo', 'Thuốc trị mụn', 'Megaduo', 'Clindamycin, Benzoyl peroxide', 75000, 80, 70.00),
(329, 'Mekocetin', 'Thuốc điều trị cảm cúm', 'Generic', 'Chlorpheniramine', 35000, 120, 85.00),
(330, 'Meko INH 150', 'Thuốc điều trị lao', 'Meko', 'Isoniazid', 100000, 60, 80.00),
(331, 'Melamin', 'Thuốc điều trị ung thư', 'Generic', 'Methotrexate', 400000, 50, 70.00),
(332, 'Melatonin', 'Thuốc giúp ngủ', 'Generic', 'Melatonin', 120000, 80, 90.00),
(333, 'Meloflam', 'Thuốc giảm đau', 'Meloflam', 'Aceclofenac', 90000, 70, 85.00),
(334, 'Melopower', 'Thuốc giảm đau', 'Melopower', 'Meloxicam', 110000, 50, 80.00),
(335, 'Meloxicam', 'Thuốc giảm đau', 'Generic', 'Meloxicam', 95000, 100, 75.00),
(336, 'Menison', 'Thuốc chống viêm', 'Generic', 'Methylprednisolone', 150000, 60, 70.00),
(337, 'Nabifar', 'Thuốc điều trị viêm', 'Generic', 'Nabumetone', 70000, 100, 75.00),
(338, 'Naltrexone', 'Thuốc điều trị nghiện', 'Generic', 'Naltrexone', 500000, 50, 80.00),
(339, 'Naphacogyl', 'Thuốc giảm đau', 'Generic', 'Paracetamol, Caffeine', 60000, 120, 85.00),
(340, 'Nasolspray', 'Thuốc xịt mũi', 'Generic', 'Xylometazoline', 25000, 150, 90.00),
(341, 'Natrilix SR', 'Thuốc hạ huyết áp', 'Servier', 'Indapamide', 85000, 90, 80.00),
(342, 'Natrixam', 'Thuốc điều trị tim mạch', 'Generic', 'Ramipril', 100000, 80, 85.00),
(343, 'NattoEnzym', 'Thuốc tiêu hóa', 'Generic', 'Nattokinase', 55000, 100, 70.00),
(344, 'Nautamine', 'Thuốc chống say tàu xe', 'Generic', 'Dimenhydrinate', 40000, 120, 75.00),
(345, 'Nebilet', 'Thuốc điều trị huyết áp cao', 'AstraZeneca', 'Nebivolol', 120000, 60, 85.00),
(346, 'Nebivolol', 'Thuốc điều trị huyết áp cao', 'Generic', 'Nebivolol', 100000, 100, 90.00),
(347, 'Neopeptine', 'Thuốc tiêu hóa', 'Generic', 'Pancreatin', 30000, 150, 80.00),
(348, 'NeoRecormon®', 'Thuốc điều trị thiếu máu', 'Roche', 'Epoetin beta', 200000, 40, 70.00),
(349, 'Neosporin', 'Thuốc kháng sinh', 'Johnson & Johnson', 'Neomycin, Polymyxin B, Bacitracin', 90000, 100, 75.00),
(350, 'Neo-Codion', 'Thuốc ho', 'Generic', 'Codeine', 35000, 150, 85.00),
(351, 'Neo-Tergynan', 'Thuốc kháng sinh', 'Therabel', 'Neomycin, Nystatin, Tetracycline', 120000, 80, 70.00),
(352, 'Nephrosteril', 'Thuốc hỗ trợ thận', 'Generic', 'Urethane', 150000, 50, 60.00),
(353, 'Neurobion', 'Vitamin nhóm B', 'Roche', 'Vitamin B1, B6, B12', 60000, 100, 85.00),
(354, 'Neurontin', 'Thuốc chống động kinh', 'Pfizer', 'Gabapentin', 220000, 60, 80.00),
(355, 'Nevanac', 'Thuốc điều trị viêm mắt', 'Alcon', 'Nepafenac', 150000, 50, 70.00),
(356, 'New Ameflu C Day time OPV', 'Thuốc cảm cúm', 'Generic', 'Paracetamol, Caffeine, Phenylephrine', 70000, 150, 80.00),
(357, 'New V.Rohto', 'Thuốc nhỏ mắt', 'Rohto', 'Vitamin B12', 45000, 120, 90.00),
(358, 'Nexavar', 'Thuốc điều trị ung thư', 'Bayer', 'Sorafenib', 2500000, 30, 60.00),
(359, 'Nexium', 'Thuốc điều trị dạ dày', 'AstraZeneca', 'Esomeprazole', 180000, 80, 85.00),
(360, 'Nexium-mups', 'Thuốc điều trị dạ dày', 'AstraZeneca', 'Esomeprazole', 200000, 70, 80.00),
(361, 'NextG Cal', 'Thuốc bổ sung Canxi', 'NextG', 'Calcium, Vitamin D', 120000, 100, 90.00),
(362, 'Panactol', 'Thuốc giảm đau', 'Medipharco', 'Acetaminophen', 50000, 100, 80.00),
(363, 'Panadol Cảm Cúm', 'Thuốc cảm cúm', 'GSK', 'Paracetamol, Caffeine, Phenylephrine', 60000, 150, 85.00),
(364, 'Panadol Extra', 'Thuốc giảm đau', 'GSK', 'Paracetamol, Caffeine', 45000, 120, 90.00),
(365, 'Panangin', 'Thuốc bổ sung kali', 'Gedeon Richter', 'Potassium, Magnesium', 120000, 80, 75.00),
(366, 'Pantoloc', 'Thuốc điều trị dạ dày', 'AstraZeneca', 'Pantoprazole', 150000, 70, 85.00),
(367, 'Pantyrase', 'Thuốc điều trị dạ dày', 'Mekophar', 'Pantoprazole', 100000, 90, 80.00),
(368, 'Papulex', 'Kem trị mụn', 'Papulex', 'Sodium chloride', 120000, 100, 80.00),
(369, 'Paracetamol', 'Thuốc giảm đau', 'Generic', 'Paracetamol', 30000, 200, 90.00),
(370, 'Pariet', 'Thuốc điều trị dạ dày', 'Janssen', 'Rabeprazole', 200000, 80, 75.00),
(371, 'Partamol', 'Thuốc giảm đau', 'Generic', 'Paracetamol', 50000, 150, 85.00),
(372, 'Partamol tab.', 'Thuốc giảm đau', 'Generic', 'Paracetamol', 45000, 130, 80.00),
(373, 'Pedonase', 'Thuốc dị ứng', 'Generic', 'Dexchlorpheniramine', 70000, 100, 85.00),
(374, 'Penicillin', 'Kháng sinh', 'Generic', 'Penicillin', 80000, 200, 90.00),
(375, 'Pentasa', 'Thuốc điều trị viêm loét đại tràng', 'Ferring', 'Mesalazine', 250000, 50, 70.00),
(376, 'Pentoxifylline', 'Thuốc điều trị tuần hoàn', 'Generic', 'Pentoxifylline', 120000, 120, 75.00),
(377, 'Peritol', 'Thuốc chống dị ứng', 'Novartis', 'Cyproheptadine', 60000, 100, 80.00),
(378, 'Permethrin', 'Kem điều trị nấm', 'Generic', 'Permethrin', 90000, 80, 70.00),
(379, 'Phaanedol', 'Thuốc giảm đau', 'Generic', 'Paracetamol', 35000, 150, 85.00),
(380, 'Pharmaton Kiddi', 'Vitamin bổ sung cho trẻ', 'Pharmaton', 'Vitamin B, Vitamin C, Vitamin D', 80000, 120, 90.00),
(381, 'Pharmox', 'Kháng sinh', 'Generic', 'Amoxicillin', 40000, 200, 80.00),
(382, 'Phenergan', 'Thuốc chống dị ứng', 'Phenergan', 'Promethazine', 120000, 100, 75.00),
(383, 'Phenobarbital', 'Thuốc điều trị động kinh', 'Generic', 'Phenobarbital', 80000, 60, 70.00),
(384, 'Phenytoin', 'Thuốc điều trị động kinh', 'Generic', 'Phenytoin', 150000, 80, 80.00),
(385, 'Phezam', 'Thuốc điều trị rối loạn tuần hoàn', 'Sanofi', 'Piracetam, Caffeine', 140000, 90, 75.00),
(386, 'Phosphalugel', 'Thuốc dạ dày', 'Generic', 'Aluminum phosphate', 60000, 100, 85.00),
(387, 'Piascledine', 'Thuốc hỗ trợ khớp', 'Genévrier', 'Avocado-soya unsaponifiables', 180000, 70, 80.00),
(388, 'Pimozide', 'Thuốc điều trị tâm thần', 'Generic', 'Pimozide', 250000, 40, 60.00),
(389, 'Pipolphen', 'Thuốc chống dị ứng', 'Sanofi', 'Promethazine', 70000, 120, 75.00),
(390, 'Piroxicam', 'Thuốc giảm đau', 'Generic', 'Piroxicam', 120000, 100, 80.00),
(391, 'Racecadotril', 'Thuốc chống tiêu chảy', 'Sanofi', 'Racecadotril', 150000, 100, 80.00),
(392, 'Rectiofar', 'Thuốc giảm đau', 'Rectiofar', 'Lidocaine', 70000, 150, 85.00),
(393, 'Refresh Tears', 'Thuốc nhỏ mắt', 'Allergan', 'Carboxymethylcellulose', 200000, 80, 90.00),
(394, 'Regulon', 'Thuốc tránh thai', 'Bayer', 'Ethinylestradiol, Desogestrel', 250000, 60, 75.00),
(395, 'Relactagel', 'Gel hỗ trợ nuôi con bằng sữa mẹ', 'Relactagel', 'Gellan gum, Xanthan gum', 350000, 100, 80.00),
(396, 'Retinoids', 'Thuốc trị mụn', 'Generic', 'Tretinoin', 180000, 70, 75.00),
(397, 'Retinol', 'Thuốc trị mụn', 'Generic', 'Retinol', 220000, 80, 85.00),
(398, 'Revia', 'Thuốc điều trị nghiện', 'Mylan', 'Naltrexone', 300000, 50, 80.00),
(399, 'Rezoclav', 'Kháng sinh', 'Generic', 'Amoxicillin, Clavulanate', 120000, 200, 85.00),
(400, 'Rhinocort', 'Thuốc điều trị dị ứng', 'AstraZeneca', 'Budesonide', 150000, 100, 90.00),
(401, 'Rhumenol Flu 500', 'Thuốc giảm đau cảm cúm', 'Generic', 'Paracetamol, Phenylephrine', 70000, 120, 85.00),
(402, 'Rifampicin', 'Kháng sinh', 'Roche', 'Rifampicin', 250000, 100, 75.00),
(403, 'Rigevidon', 'Thuốc tránh thai', 'Bayer', 'Ethinylestradiol, Levonorgestrel', 180000, 80, 80.00),
(404, 'Ringer Lactate', 'Dung dịch tiêm truyền', 'Baxter', 'Sodium chloride, Potassium chloride', 60000, 150, 90.00),
(405, 'Risperdal', 'Thuốc điều trị tâm thần', 'Janssen', 'Risperidone', 300000, 60, 70.00),
(406, 'Ritalin', 'Thuốc điều trị ADHD', 'Novartis', 'Methylphenidate', 250000, 100, 75.00),
(407, 'Rivaroxaban', 'Thuốc chống đông máu', 'Bayer', 'Rivaroxaban', 400000, 50, 80.00),
(408, 'Rocephin', 'Kháng sinh', 'Roche', 'Ceftriaxone', 350000, 90, 85.00),
(409, 'Rodogyl', 'Kháng sinh', 'Mekophar', 'Metronidazole, Spiramycin', 150000, 120, 80.00),
(410, 'Rotudin', 'Thuốc trị ho', 'Generic', 'Dextromethorphan', 50000, 200, 90.00),
(411, 'Rotunda', 'Thuốc trị cảm cúm', 'Rotunda', 'Paracetamol', 70000, 150, 80.00),
(412, 'Tacrolimus (thuốc mỡ)', 'Thuốc mỡ', 'Astellas', 'Tacrolimus', 500000, 60, 80.00),
(413, 'Tacrolimus (viên nang)', 'Thuốc viên', 'Astellas', 'Tacrolimus', 350000, 80, 75.00),
(414, 'Tadimax', 'Thuốc giảm đau', 'Generic', 'Tadimax', 100000, 100, 70.00),
(415, 'Tamik', 'Thuốc điều trị dị ứng', 'Tamik', 'Tamik', 200000, 50, 80.00),
(416, 'Tamoxifen Sandoz', 'Thuốc điều trị ung thư', 'Sandoz', 'Tamoxifen', 500000, 40, 85.00),
(417, 'Tamsulosin', 'Thuốc điều trị phì đại tuyến tiền liệt', 'Generic', 'Tamsulosin', 300000, 60, 80.00),
(418, 'Tanakan', 'Thuốc hỗ trợ điều trị tuần hoàn não', 'Generic', 'Ginkgo biloba', 150000, 100, 85.00),
(419, 'Tanakan', 'Thuốc hỗ trợ điều trị tuần hoàn não', 'Generic', 'Ginkgo biloba', 150000, 120, 85.00),
(420, 'Tanatril', 'Thuốc điều trị cao huyết áp', 'Generic', 'Ramipril', 120000, 90, 80.00),
(421, 'Tanganil', 'Thuốc điều trị chóng mặt', 'Tanganil', 'Tanganil', 200000, 50, 75.00),
(422, 'Tarceva', 'Thuốc điều trị ung thư', 'Roche', 'Erlotinib', 600000, 30, 90.00),
(423, 'Tardyferon B9', 'Thuốc bổ sung sắt', 'Sanofi', 'Sắt, Axit folic', 150000, 100, 80.00),
(424, 'Tasigna', 'Thuốc điều trị ung thư', 'Novartis', 'Nilotinib', 800000, 50, 85.00),
(425, 'Tinidazol', 'Thuốc kháng sinh', 'Generic', 'Tinidazol', 100000, 120, 80.00),
(426, 'Tizanidine', 'Thuốc giãn cơ', 'Generic', 'Tizanidine', 250000, 80, 75.00),
(427, 'Tobicom', 'Thuốc trị mụn', 'Generic', 'Tobicom', 180000, 90, 80.00),
(428, 'Tobradex (thuốc mỡ tra mắt)', 'Thuốc nhỏ mắt', 'Alcon', 'Dexamethasone, Tobramycin', 250000, 50, 85.00),
(429, 'Tobradex (thuốc nhỏ mắt)', 'Thuốc nhỏ mắt', 'Alcon', 'Dexamethasone, Tobramycin', 200000, 80, 85.00),
(430, 'Tobrex', 'Thuốc nhỏ mắt', 'Alcon', 'Tobramycin', 180000, 100, 90.00),
(431, 'Tonicalcium', 'Thuốc bổ sung canxi', 'Generic', 'Canxi', 120000, 150, 90.00),
(432, 'Tonka', 'Thuốc bổ sung vitamin', 'Generic', 'Vitamin A, D', 50000, 200, 95.00),
(433, 'Topamax', 'Thuốc điều trị động kinh', 'Janssen', 'Topiramate', 400000, 60, 80.00),
(434, 'Topbrain', 'Thuốc hỗ trợ tuần hoàn não', 'Generic', 'Piracetam', 150000, 120, 75.00),
(435, 'Topralsin', 'Thuốc trị ho', 'Generic', 'Topralsin', 70000, 150, 80.00),
(436, 'Tottri', 'Thuốc bổ sung vitamin', 'Generic', 'Vitamin A, D, E', 90000, 200, 85.00),
(437, 'Tot\'hema', 'Thuốc bổ máu', 'Generic', 'Sắt, Vitamin B12', 120000, 100, 90.00),
(438, 'Viagra', 'Thuốc điều trị rối loạn cương dương', 'Pfizer', 'Sildenafil', 800000, 60, 85.00),
(439, 'Viagra', 'Thuốc điều trị rối loạn cương dương', 'Pfizer', 'Sildenafil', 800000, 80, 85.00),
(440, 'Viartril-S', 'Thuốc giảm đau', 'Sandoz', 'Glucosamine sulfate', 400000, 100, 80.00),
(441, 'Viên sủi Pharmaton Plusssz', 'Viên sủi', 'Pharmaton', 'Vitamin, khoáng chất', 150000, 120, 90.00),
(442, 'Viên sủi SCurma Fizzy', 'Viên sủi', 'SCurma', 'Vitamin C', 120000, 150, 85.00),
(443, 'Viên sủi Yakumi', 'Viên sủi', 'Yakumi', 'Vitamin C, E', 200000, 80, 90.00),
(444, 'Viên sủi Zextor', 'Viên sủi', 'Zextor', 'Vitamin B, C', 100000, 100, 85.00),
(445, 'Viên xông Euca-OPC', 'Viên xông', 'Generic', 'Tinh dầu khuynh diệp', 50000, 150, 80.00),
(446, 'Vigadexa', 'Thuốc nhỏ mắt', 'Vigadexa', 'Dexamethasone, Tobramycin', 250000, 60, 90.00),
(447, 'Vigamox', 'Thuốc nhỏ mắt', 'Alcon', 'Moxifloxacin', 220000, 80, 90.00),
(448, 'Vincomid', 'Thuốc điều trị ho', 'Vincomid', 'Vincomid', 70000, 120, 75.00),
(449, 'Vitamins A&D ointment', 'Thuốc mỡ', 'Generic', 'Vitamin A, D', 100000, 80, 85.00),
(450, 'Vitamin A 5000IU', 'Vitamin', 'Generic', 'Vitamin A', 150000, 200, 90.00),
(451, 'Vitamin B2', 'Vitamin', 'Generic', 'Riboflavin', 50000, 150, 90.00),
(452, 'Vitamin B5', 'Vitamin', 'Generic', 'Pantothenic acid', 70000, 200, 85.00),
(453, 'Vitamin B6', 'Vitamin', 'Generic', 'Pyridoxine', 60000, 180, 85.00),
(454, 'Vitamin C MKP 500mg', 'Vitamin', 'MKP', 'Vitamin C', 120000, 150, 90.00),
(455, 'Vitamin K2', 'Vitamin', 'Generic', 'Vitamin K2', 250000, 100, 80.00),
(456, 'Vitamin PP', 'Vitamin', 'Generic', 'Niacin', 80000, 200, 85.00),
(457, 'Vivitrol', 'Thuốc điều trị nghiện', 'Alkermes', 'Naltrexone', 1000000, 40, 90.00),
(458, 'Voltaren', 'Thuốc giảm đau', 'Novartis', 'Diclofenac', 250000, 90, 85.00),
(459, 'Voltaren Emulgel', 'Thuốc giảm đau', 'Novartis', 'Diclofenac', 150000, 80, 85.00),
(460, 'Vorifend Forte', 'Thuốc điều trị nhiễm trùng', 'Generic', 'Ciprofloxacin', 180000, 60, 80.00),
(461, 'V.Rohto Dryeye', 'Thuốc nhỏ mắt', 'Rohto', 'Rohto', 70000, 150, 90.00),
(462, 'Vắc-xin HPV', 'Vắc-xin', 'Generic', 'HPV', 1500000, 30, 95.00),
(463, 'Viagra', 'Thuốc điều trị rối loạn cương dương', 'Pfizer', 'Sildenafil', 800000, 60, 85.00),
(464, 'Viagra', 'Thuốc điều trị rối loạn cương dương', 'Pfizer', 'Sildenafil', 800000, 80, 85.00),
(465, 'Viartril-S', 'Thuốc giảm đau', 'Sandoz', 'Glucosamine sulfate', 400000, 100, 80.00),
(466, 'Viên sủi Pharmaton Plusssz', 'Viên sủi', 'Pharmaton', 'Vitamin, khoáng chất', 150000, 120, 90.00),
(467, 'Viên sủi SCurma Fizzy', 'Viên sủi', 'SCurma', 'Vitamin C', 120000, 150, 85.00),
(468, 'Viên sủi Yakumi', 'Viên sủi', 'Yakumi', 'Vitamin C, E', 200000, 80, 90.00),
(469, 'Viên sủi Zextor', 'Viên sủi', 'Zextor', 'Vitamin B, C', 100000, 100, 85.00),
(470, 'Viên xông Euca-OPC', 'Viên xông', 'Generic', 'Tinh dầu khuynh diệp', 50000, 150, 80.00),
(471, 'Vigadexa', 'Thuốc nhỏ mắt', 'Vigadexa', 'Dexamethasone, Tobramycin', 250000, 60, 90.00),
(472, 'Vigamox', 'Thuốc nhỏ mắt', 'Alcon', 'Moxifloxacin', 220000, 80, 90.00),
(473, 'Vincomid', 'Thuốc điều trị ho', 'Vincomid', 'Vincomid', 70000, 120, 75.00),
(474, 'Vitamins A&D ointment', 'Thuốc mỡ', 'Generic', 'Vitamin A, D', 100000, 80, 85.00),
(475, 'Vitamin A 5000IU', 'Vitamin', 'Generic', 'Vitamin A', 150000, 200, 90.00),
(476, 'Vitamin B2', 'Vitamin', 'Generic', 'Riboflavin', 50000, 150, 90.00),
(477, 'Vitamin B5', 'Vitamin', 'Generic', 'Pantothenic acid', 70000, 200, 85.00),
(478, 'Vitamin B6', 'Vitamin', 'Generic', 'Pyridoxine', 60000, 180, 85.00),
(479, 'Vitamin C MKP 500mg', 'Vitamin', 'MKP', 'Vitamin C', 120000, 150, 90.00),
(480, 'Vitamin K2', 'Vitamin', 'Generic', 'Vitamin K2', 250000, 100, 80.00),
(481, 'Vitamin PP', 'Vitamin', 'Generic', 'Niacin', 80000, 200, 85.00),
(482, 'Vivitrol', 'Thuốc điều trị nghiện', 'Alkermes', 'Naltrexone', 1000000, 40, 90.00),
(483, 'Voltaren', 'Thuốc giảm đau', 'Novartis', 'Diclofenac', 250000, 90, 85.00),
(484, 'Voltaren Emulgel', 'Thuốc giảm đau', 'Novartis', 'Diclofenac', 150000, 80, 85.00),
(485, 'Vorifend Forte', 'Thuốc điều trị nhiễm trùng', 'Generic', 'Ciprofloxacin', 180000, 60, 80.00),
(486, 'V.Rohto Dryeye', 'Thuốc nhỏ mắt', 'Rohto', 'Rohto', 70000, 150, 90.00),
(487, 'Vắc-xin HPV', 'Vắc-xin', 'Generic', 'HPV', 1500000, 30, 95.00),
(488, 'Ibuprofen', 'Thuốc giảm đau', 'Generic', 'Ibuprofen', 35000, 60, 80.00),
(489, 'Idarac', 'Thuốc chống ung thư', 'Generic', 'Idarubicin', 1200000, 20, 50.00),
(490, 'Imidu', 'Thuốc chống viêm', 'Generic', 'Dimethyl sulfoxide', 45000, 40, 70.00),
(491, 'Imodium', 'Thuốc điều trị tiêu chảy', 'Janssen', 'Loperamide', 55000, 50, 75.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `toathuoc`
--

CREATE TABLE `toathuoc` (
  `maToaThuoc` int(11) NOT NULL,
  `maBenhNhan` int(11) NOT NULL,
  `maBacSi` int(11) NOT NULL,
  `ngayKeToa` date NOT NULL,
  `trangthai` varchar(20) DEFAULT NULL,
  `ketLuan` varchar(40) DEFAULT NULL,
  `chuanDoan` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `toathuoc`
--

INSERT INTO `toathuoc` (`maToaThuoc`, `maBenhNhan`, `maBacSi`, `ngayKeToa`, `trangthai`, `ketLuan`, `chuanDoan`) VALUES
(4, 1, 2, '2024-12-10', 'Đã thanh toán', 'Điều trị bằng kháng sinh trong 7 ngày', 'Viêm amidan'),
(5, 101, 1, '2024-12-11', 'Đã thanh toán', 'Cần nghỉ ngơi và uống thuốc', 'Viêm họng cấp'),
(7, 1, 2, '2024-12-10', 'Đã thanh toán', 'Điều trị kháng sinh', 'Viêm tai giữa chảy dịch');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nameuser` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idrole` int(11) NOT NULL DEFAULT 10,
  `vaiTro` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`iduser`, `nameuser`, `password`, `idrole`, `vaiTro`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1, NULL),
(2, 'xuanan', '202cb962ac59075b964b07152d234b70', 4, NULL),
(3, 'dat', '202cb962ac59075b964b07152d234b70', 3, NULL),
(4, 'quan', '202cb962ac59075b964b07152d234b70', 5, NULL),
(6, 'nhuan', '202cb962ac59075b964b07152d234b70', 2, NULL),
(7, 'bao', '202cb962ac59075b964b07152d234b70', 2, NULL),
(8, 'chanh', '202cb962ac59075b964b07152d234b70', 7, NULL),
(10, '0787750973', 'e10adc3949ba59abbe56e057f20f883e', 10, NULL),
(11, '0787750973', 'e10adc3949ba59abbe56e057f20f883e', 10, NULL),
(12, '0787750973', 'e10adc3949ba59abbe56e057f20f883e', 10, NULL),
(13, '0934841644', 'e10adc3949ba59abbe56e057f20f883e', 10, NULL),
(14, '0934841644', 'e10adc3949ba59abbe56e057f20f883e', 10, NULL),
(15, 'datlee', '202cb962ac59075b964b07152d234b70', 6, 'tieptan'),
(16, 'haanh', '202cb962ac59075b964b07152d234b70', 2, 'Bác sĩ'),
(17, 'dieuduong1', '202cb962ac59075b964b07152d234b70', 3, NULL),
(18, 'dieuduong2', '202cb962ac59075b964b07152d234b70', 3, NULL),
(19, 'dieuduong3', '202cb962ac59075b964b07152d234b70', 3, NULL),
(20, 'dieuduong4', '202cb962ac59075b964b07152d234b70', 3, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bacsi`
--
ALTER TABLE `bacsi`
  ADD PRIMARY KEY (`MaBacSi`),
  ADD KEY `MaChuyenkhoa` (`MaChuyenkhoa`);

--
-- Chỉ mục cho bảng `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`maBenhNhan`);

--
-- Chỉ mục cho bảng `catruckham`
--
ALTER TABLE `catruckham`
  ADD PRIMARY KEY (`maCa`),
  ADD KEY `maChuyenKhoa` (`maChuyenKhoa`),
  ADD KEY `maNhanVien` (`maNhanVien`),
  ADD KEY `maPhong` (`maPhong`);

--
-- Chỉ mục cho bảng `chitiettoathuoc`
--
ALTER TABLE `chitiettoathuoc`
  ADD PRIMARY KEY (`maCTTT`),
  ADD KEY `maThuoc` (`maThuoc`),
  ADD KEY `maToaThuoc` (`maToaThuoc`);

--
-- Chỉ mục cho bảng `chuyenkhoa`
--
ALTER TABLE `chuyenkhoa`
  ADD PRIMARY KEY (`maChuyenKhoa`),
  ADD UNIQUE KEY `tenChuyenKhoa` (`tenChuyenKhoa`);

--
-- Chỉ mục cho bảng `dieuduong`
--
ALTER TABLE `dieuduong`
  ADD PRIMARY KEY (`maDieuDuong`),
  ADD KEY `maChuyenKhoa` (`maChuyenKhoa`);

--
-- Chỉ mục cho bảng `giuongbenh`
--
ALTER TABLE `giuongbenh`
  ADD PRIMARY KEY (`maGiuong`),
  ADD KEY `maPhong` (`maPhong`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maHoaDon`),
  ADD KEY `maBenhNhan` (`maBenhNhan`),
  ADD KEY `maThuNgan` (`maThuNgan`);

--
-- Chỉ mục cho bảng `hosobenhannoitru`
--
ALTER TABLE `hosobenhannoitru`
  ADD PRIMARY KEY (`maHSBANT`),
  ADD KEY `maBenhNhan` (`maBenhNhan`),
  ADD KEY `maDieuDuong` (`maDieuDuong`),
  ADD KEY `maGiuong` (`maGiuong`),
  ADD KEY `maHoaDon` (`maHoaDon`),
  ADD KEY `maPhacDoDieuTri` (`maPhacDoDieuTri`),
  ADD KEY `maBacSi` (`maBacSi`),
  ADD KEY `maChuyenKhoa` (`maChuyenKhoa`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD UNIQUE KEY `SDT` (`SDT`),
  ADD KEY `user_01` (`iduser`);

--
-- Chỉ mục cho bảng `phacdodieutri`
--
ALTER TABLE `phacdodieutri`
  ADD PRIMARY KEY (`maPhacDoDieuTri`),
  ADD KEY `maBenhNhan` (`maBenhNhan`),
  ADD KEY `maToaThuoc` (`maToaThuoc`);

--
-- Chỉ mục cho bảng `phieudangkykham`
--
ALTER TABLE `phieudangkykham`
  ADD PRIMARY KEY (`maPhieuDangKyKham`),
  ADD KEY `maBenhNhan` (`maBenhNhan`),
  ADD KEY `maCa` (`maCa`),
  ADD KEY `maHoaDon` (`maHoaDon`),
  ADD KEY `maTiepTan` (`maTiepTan`);

--
-- Chỉ mục cho bảng `phieukham`
--
ALTER TABLE `phieukham`
  ADD PRIMARY KEY (`MaPK`),
  ADD KEY `MaBacSi` (`MaBacSi`),
  ADD KEY `MaBenhNhan` (`MaBenhNhan`),
  ADD KEY `MaCa` (`MaCa`),
  ADD KEY `MaChuyenKhoa` (`MaChuyenKhoa`),
  ADD KEY `MaToaThuoc` (`MaToaThuoc`),
  ADD KEY `maPhieuDangKyKham` (`maPhieuDangKyKham`);

--
-- Chỉ mục cho bảng `phieutheogioinoitru`
--
ALTER TABLE `phieutheogioinoitru`
  ADD PRIMARY KEY (`MaPhieuTheoDoi`),
  ADD KEY `MaHSBANT` (`MaHSBANT`);

--
-- Chỉ mục cho bảng `phieuyeucaudoilich`
--
ALTER TABLE `phieuyeucaudoilich`
  ADD PRIMARY KEY (`maPhieuYCDL`),
  ADD KEY `maNhanVien` (`maNhanVien`),
  ADD KEY `maCaDoi` (`maCaDoi`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`maPhong`),
  ADD KEY `maChuyenKhoa` (`maChuyenKhoa`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Chỉ mục cho bảng `thuoc`
--
ALTER TABLE `thuoc`
  ADD PRIMARY KEY (`maThuoc`);

--
-- Chỉ mục cho bảng `toathuoc`
--
ALTER TABLE `toathuoc`
  ADD PRIMARY KEY (`maToaThuoc`),
  ADD KEY `maBacSi` (`maBacSi`),
  ADD KEY `maBenhNhan` (`maBenhNhan`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `Role_01` (`idrole`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `benhnhan`
--
ALTER TABLE `benhnhan`
  MODIFY `maBenhNhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT cho bảng `catruckham`
--
ALTER TABLE `catruckham`
  MODIFY `maCa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `chitiettoathuoc`
--
ALTER TABLE `chitiettoathuoc`
  MODIFY `maCTTT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `chuyenkhoa`
--
ALTER TABLE `chuyenkhoa`
  MODIFY `maChuyenKhoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `dieuduong`
--
ALTER TABLE `dieuduong`
  MODIFY `maDieuDuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `giuongbenh`
--
ALTER TABLE `giuongbenh`
  MODIFY `maGiuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `maHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hosobenhannoitru`
--
ALTER TABLE `hosobenhannoitru`
  MODIFY `maHSBANT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `phacdodieutri`
--
ALTER TABLE `phacdodieutri`
  MODIFY `maPhacDoDieuTri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `phieudangkykham`
--
ALTER TABLE `phieudangkykham`
  MODIFY `maPhieuDangKyKham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `phieukham`
--
ALTER TABLE `phieukham`
  MODIFY `MaPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `phieutheogioinoitru`
--
ALTER TABLE `phieutheogioinoitru`
  MODIFY `MaPhieuTheoDoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phieuyeucaudoilich`
--
ALTER TABLE `phieuyeucaudoilich`
  MODIFY `maPhieuYCDL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `maPhong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT cho bảng `thuoc`
--
ALTER TABLE `thuoc`
  MODIFY `maThuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;

--
-- AUTO_INCREMENT cho bảng `toathuoc`
--
ALTER TABLE `toathuoc`
  MODIFY `maToaThuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bacsi`
--
ALTER TABLE `bacsi`
  ADD CONSTRAINT `bacsi_ibfk_1` FOREIGN KEY (`MaChuyenkhoa`) REFERENCES `chuyenkhoa` (`maChuyenKhoa`),
  ADD CONSTRAINT `bacsi_ibfk_2` FOREIGN KEY (`MaBacSi`) REFERENCES `nhanvien` (`MaNV`);

--
-- Các ràng buộc cho bảng `catruckham`
--
ALTER TABLE `catruckham`
  ADD CONSTRAINT `catruckham_ibfk_1` FOREIGN KEY (`maChuyenKhoa`) REFERENCES `chuyenkhoa` (`maChuyenKhoa`),
  ADD CONSTRAINT `catruckham_ibfk_2` FOREIGN KEY (`maNhanVien`) REFERENCES `nhanvien` (`MaNV`),
  ADD CONSTRAINT `catruckham_ibfk_3` FOREIGN KEY (`maPhong`) REFERENCES `phong` (`maPhong`);

--
-- Các ràng buộc cho bảng `chitiettoathuoc`
--
ALTER TABLE `chitiettoathuoc`
  ADD CONSTRAINT `chitiettoathuoc_ibfk_1` FOREIGN KEY (`maThuoc`) REFERENCES `thuoc` (`maThuoc`),
  ADD CONSTRAINT `chitiettoathuoc_ibfk_2` FOREIGN KEY (`maToaThuoc`) REFERENCES `toathuoc` (`maToaThuoc`);

--
-- Các ràng buộc cho bảng `dieuduong`
--
ALTER TABLE `dieuduong`
  ADD CONSTRAINT `dieuduong_ibfk_1` FOREIGN KEY (`maChuyenKhoa`) REFERENCES `chuyenkhoa` (`maChuyenKhoa`),
  ADD CONSTRAINT `dieuduong_ibfk_2` FOREIGN KEY (`maDieuDuong`) REFERENCES `nhanvien` (`MaNV`);

--
-- Các ràng buộc cho bảng `giuongbenh`
--
ALTER TABLE `giuongbenh`
  ADD CONSTRAINT `giuongbenh_ibfk_1` FOREIGN KEY (`maPhong`) REFERENCES `phong` (`maPhong`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`maBenhNhan`) REFERENCES `benhnhan` (`maBenhNhan`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`maThuNgan`) REFERENCES `nhanvien` (`MaNV`);

--
-- Các ràng buộc cho bảng `hosobenhannoitru`
--
ALTER TABLE `hosobenhannoitru`
  ADD CONSTRAINT `hosobenhannoitru_ibfk_1` FOREIGN KEY (`maBenhNhan`) REFERENCES `benhnhan` (`maBenhNhan`),
  ADD CONSTRAINT `hosobenhannoitru_ibfk_2` FOREIGN KEY (`maDieuDuong`) REFERENCES `dieuduong` (`maDieuDuong`),
  ADD CONSTRAINT `hosobenhannoitru_ibfk_3` FOREIGN KEY (`maGiuong`) REFERENCES `giuongbenh` (`maGiuong`),
  ADD CONSTRAINT `hosobenhannoitru_ibfk_4` FOREIGN KEY (`maHoaDon`) REFERENCES `hoadon` (`maHoaDon`),
  ADD CONSTRAINT `hosobenhannoitru_ibfk_5` FOREIGN KEY (`maPhacDoDieuTri`) REFERENCES `phacdodieutri` (`maPhacDoDieuTri`),
  ADD CONSTRAINT `hosobenhannoitru_ibfk_6` FOREIGN KEY (`maBacSi`) REFERENCES `bacsi` (`MaBacSi`),
  ADD CONSTRAINT `hosobenhannoitru_ibfk_7` FOREIGN KEY (`maChuyenKhoa`) REFERENCES `chuyenkhoa` (`maChuyenKhoa`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `user_01` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Các ràng buộc cho bảng `phacdodieutri`
--
ALTER TABLE `phacdodieutri`
  ADD CONSTRAINT `phacdodieutri_ibfk_1` FOREIGN KEY (`maBenhNhan`) REFERENCES `benhnhan` (`maBenhNhan`),
  ADD CONSTRAINT `phacdodieutri_ibfk_2` FOREIGN KEY (`maToaThuoc`) REFERENCES `toathuoc` (`maToaThuoc`);

--
-- Các ràng buộc cho bảng `phieudangkykham`
--
ALTER TABLE `phieudangkykham`
  ADD CONSTRAINT `phieudangkykham_ibfk_1` FOREIGN KEY (`maBenhNhan`) REFERENCES `benhnhan` (`maBenhNhan`),
  ADD CONSTRAINT `phieudangkykham_ibfk_2` FOREIGN KEY (`maCa`) REFERENCES `catruckham` (`maCa`),
  ADD CONSTRAINT `phieudangkykham_ibfk_3` FOREIGN KEY (`maHoaDon`) REFERENCES `hoadon` (`maHoaDon`),
  ADD CONSTRAINT `phieudangkykham_ibfk_4` FOREIGN KEY (`maTiepTan`) REFERENCES `nhanvien` (`MaNV`);

--
-- Các ràng buộc cho bảng `phieukham`
--
ALTER TABLE `phieukham`
  ADD CONSTRAINT `phieukham_ibfk_1` FOREIGN KEY (`MaBacSi`) REFERENCES `bacsi` (`MaBacSi`),
  ADD CONSTRAINT `phieukham_ibfk_2` FOREIGN KEY (`MaBenhNhan`) REFERENCES `benhnhan` (`maBenhNhan`),
  ADD CONSTRAINT `phieukham_ibfk_3` FOREIGN KEY (`MaCa`) REFERENCES `catruckham` (`maCa`),
  ADD CONSTRAINT `phieukham_ibfk_4` FOREIGN KEY (`MaChuyenKhoa`) REFERENCES `chuyenkhoa` (`maChuyenKhoa`),
  ADD CONSTRAINT `phieukham_ibfk_5` FOREIGN KEY (`MaToaThuoc`) REFERENCES `toathuoc` (`maToaThuoc`),
  ADD CONSTRAINT `phieukham_ibfk_6` FOREIGN KEY (`maPhieuDangKyKham`) REFERENCES `phieudangkykham` (`maPhieuDangKyKham`);

--
-- Các ràng buộc cho bảng `phieutheogioinoitru`
--
ALTER TABLE `phieutheogioinoitru`
  ADD CONSTRAINT `phieutheogioinoitru_ibfk_1` FOREIGN KEY (`MaHSBANT`) REFERENCES `hosobenhannoitru` (`maHSBANT`);

--
-- Các ràng buộc cho bảng `phieuyeucaudoilich`
--
ALTER TABLE `phieuyeucaudoilich`
  ADD CONSTRAINT `phieuyeucaudoilich_ibfk_1` FOREIGN KEY (`maNhanVien`) REFERENCES `nhanvien` (`MaNV`),
  ADD CONSTRAINT `phieuyeucaudoilich_ibfk_2` FOREIGN KEY (`maCaDoi`) REFERENCES `catruckham` (`maCa`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`maChuyenKhoa`) REFERENCES `chuyenkhoa` (`maChuyenKhoa`);

--
-- Các ràng buộc cho bảng `toathuoc`
--
ALTER TABLE `toathuoc`
  ADD CONSTRAINT `toathuoc_ibfk_1` FOREIGN KEY (`maBacSi`) REFERENCES `bacsi` (`MaBacSi`),
  ADD CONSTRAINT `toathuoc_ibfk_2` FOREIGN KEY (`maBenhNhan`) REFERENCES `benhnhan` (`maBenhNhan`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Role_01` FOREIGN KEY (`idrole`) REFERENCES `role` (`idrole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
