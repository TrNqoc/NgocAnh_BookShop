-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 11:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblchitiethd`
--

CREATE TABLE tblchitiethd (
  MaHD varchar(30) NOT NULL,
  idSach varchar(30) NOT NULL,
  SoLuong varchar(30) NOT NULL,
  GiaBan varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table tblchitiethd
--

INSERT INTO tblchitiethd (MaHD, idSach, SoLuong, GiaBan) VALUES
('HD3', '10', '1', '12000'),
('HD4', '10', '1', '12000'),
('HD5', '11', '1', '20000'),
('HD6', '12', '2', '35000'),
('HD7', '12', '2', '35000');

-- --------------------------------------------------------

--
-- Table structure for table `tblhoadon`
--

CREATE TABLE tblhoadon (
  MaHD varchar(30) NOT NULL,
  Email varchar(30) NOT NULL,
  TongTien varchar(30) NOT NULL,
  TinhTrang varchar(30) NOT NULL,
  NgayThang date NOT NULL,
  Email_NhanVien varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblhoadon`
--

INSERT INTO tblhoadon (MaHD, Email, TongTien, TinhTrang, NgayThang, Email_NhanVien) VALUES
(HD1, 'khachhang@gmail.com', '90000', 'Đã hoàn thành', '2024-04-14', 'tuanh@gmail.com'),
('HD2', 'khachhang@gmail.com', '52000', 'Đã hoàn thành', '2024-04-14', 'tuanh@gmail.com'),
('HD3', 'lethi@gmail.com', '12000', 'Đang thanh toán', '2024-05-10', 'khachhang@gmail.com'),
('HD4', 'khachhang@gmail.com', '12000', 'Đã hoàn thành', '2024-05-10', 'nhanvien@gmail.com'),
('HD5', 'tutu@gmail.com', '20000', 'Đang thanh toán', '2024-05-18', 'tutu@gmail.com'),
('HD6', 'customer@gmail.com', '70000', 'Đang thanh toán', '2024-05-19', 'customer@gmail.com'),
('HD7', 'customer@gmail.com', '70000', 'Đã hoàn thành', '2024-05-19', 'nhanvien@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblsach`
--

CREATE TABLE `tblsach` (
  `idSach` varchar(30) NOT NULL,
  `tensach` varchar(255) NOT NULL,
  `idTheLoai` varchar(30) NOT NULL,
  `GiaBan` varchar(30) NOT NULL,
  `urlHinh` varchar(255) NOT NULL,
  `ThongTin` varchar(200) NOT NULL,
  `HienThi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsach`
--

INSERT INTO `tblsach` (`idSach`, `tensach`, `idTheLoai`, `GiaBan`, `urlHinh`, `ThongTin`, `HienThi`) VALUES
('1', 'Đám trẻ ở đại dương đen', '1', '40000', 'đám trẻ ở đdđ_2023.jpg', 'CHÂU SA ĐÁY MẮT', 1),
('10', 'Mong mẹ hãy yêu lấy chính mình', '7', '12000', 'mong-mẹ-hãy-yêu-lấy-chính-mình.jpg', 'JAENG HAE JOO', 0),
('11', 'Mùa hè không tên', '2', '20000', 'mùa-hè-không-tên.jpg', 'NGUYỄN NHẬT ÁNH', 0),
('12', 'Data Visualization with Python & Javascript', '6', '35000', 'data visualization with python & javascript.jpg', 'KYRAN DALE', 0),
('13', 'Nói một cách đơn giản', '1', '14000', 'nói một cách đơn giản.jpg', 'RHEE DONGWO', 0),
('14', 'Rừng Na Uy', '2', '18000', 'rừng-na-uy.jpg', 'MURAKAMI HARUKI', 0),
('15', 'Tâm lý học hành vi', '1', '17000', 'tâm lý học hành vi.jpg', 'KHƯƠNG NGUY', 0),
('154', 'Tạm biệt tôi của nhiều năm về trước', '2', '15000', 'sach-tam-biet-toi-cua-nhieu-nam-ve-truoc.jpg', '', 0),
('16', 'Tắt đèn', '2', '38000', 'tắt đèn.jpg', 'NGÔ TẤT TỐ', 0),
('17', 'Tây du ký', '2', '23000', 'tây-du-ký.jpg', 'NGÔ THỪA ÂN', 0),
('18', 'Thần thoại Sisyphus', '2', '15000', 'thần thoại sisyphus.jpg', 'ALBERT COMPUS', 0),
('19', 'Thiên tài bên trái kẻ điên bên phải', '2', '23000', 'thiên-tài-bt-kẻ-điên-bp.jpg', 'CAO MINH', 0),
('2', 'Công nghệ Block Chain', '6', '21000', 'công-nghệ-blockchain.jpg', 'NHIỀU TÁC GIẢ', 0),
('20', 'Thượng kinh ký sự', '4', '23000', 'thượng-kinh-ký-sự.jpg', 'LÊ HỮU TRÁC', 0),
('21', 'Vang bóng một thời', '2', '36000', 'vang bóng một thời.jpg', 'NGUYỄN TUÂN', 0),
('22', 'Việt Nam lược sử', '4', '19000', 'việt-nam-sử-lược.jpg', 'TRẦN TRỌNG KIM', 0),
('23', 'Thế giới có chắc vận hành như bạn nghĩ ?', '1', '20000', 'thế giới ccvhnbn_2023.jpg', 'VƯƠNG DUYỆT', 0),
('24', 'Chiến thắng con quỷ trong bạn', '5 ', '50000', 'chiến-thắng-con-quỷ-trong-bạn.jpg', 'NAPOLEON HILL', 0),
('25', 'Cây cam ngọt của tôi', '2', '40000', 'cây-cam-ngọt-ct.jpg', 'JOSÉ MAURO DE VASCONCELOS ', 0),
('26', 'Bí mật ngôi mộ cổ', '2', '30000', 'bí-mật-ngôi-mộ-cổ.jpg', 'LẠI NHĨ', 0),
('27', 'Lạc giữa tần số không người nghe', '5 ', '27000', 'lạc giữa tần số knn_2023.jpg', 'macmart', 0),
('28', 'Cha mẹ độc hại', '7', '31000', 'cha-me-doc-hai.jpg', 'TOMODA AKEMI ', 0),
('29', 'Chiến tranh tiền tệ', '5 ', '29000', 'chiến-tranh-tiền-tệ.jpg', 'SONG HONGBING\r\n\r\n', 0),
('3', 'Đi tìm lẽ sống', '2', '13000', 'đi-tìm-lẽ-sống.jpg', 'VIKTON EMIL FRANK', 0),
('30', 'Có một ngày bố mẹ sẽ già đi', '7', '18000', 'có-1-ngày-bố-mẹ-sẽ-già-đi.jpg', 'NHIỀU TÁC GIẢ', 0),
('4', 'Học làm cha mẹ hiệu quả', '7', '37000', 'học-làm-cha-mẹ-hiệu-quả.jpg', 'THOMAS GORDON', 0),
('5', 'How the body works', '6', '52000', 'how-the-body-works.jpg', 'D.K.PUBLISHING', 0),
('6', 'Không gia đình', '2', '15000', 'không-gia-đình.jpg', 'HECTOR MALOT', 0),
('7', 'Khu vườn bí mật', '2', '32000', 'khu-vườn-bí-mật.jpg', 'FRANCES HUDGSON BURNETT', 0),
('8', 'Lược sử thế giới', '4', '41000', 'lược-sử-thế-giới.jpg', 'E.H.GOMBIRCH', 0),
('9', 'Mộ đom đóm', '2', '25000', 'mộ-đom-đóm.jpg', 'NOSAKA AKIYUKI', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbltaikhoan`
--

CREATE TABLE `tbltaikhoan` (
  `email` varchar(30) NOT NULL,
  `matkhau` varchar(30) NOT NULL,
  `capbac` varchar(30) NOT NULL,
  `Del` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltaikhoan`
--

INSERT INTO `tbltaikhoan` (`email`, `matkhau`, `capbac`, `Del`) VALUES
('admin@gmail.com', 'admin', 'admin', 0),
('customer@gmail.com', 'khachhang', 'khachhang', 0),
('hacker@gmail.com', 'hacker', 'khachhang', 1),
('khachhang@gmail.com', 'khachhang', 'khachhang', 0),
('khanhngoc@gmail.com', 'nhanvien', 'nhanvien', 0),
('khtuanh@gmail.com', '123', 'khachhang', 0),
('lethi@gmail.com', '123', 'khachhang', 0),
('ngocanh@gmail.com', 'admin', 'admin', 0),
('nhanvien@gmail.com', 'nhanvien', 'nhanvien', 0),
('tuanh@gmail.com', 'nhanvien', 'nhanvien', 0),
('tutu@gmail.com', '123', 'khachhang', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbltangsach`
--

CREATE TABLE `tbltangsach` (
  `matang` int(11) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `gioitinh` varchar(255) NOT NULL,
  `tensach` varchar(255) NOT NULL,
  `tinhtrangsach` varchar(255) NOT NULL,
  `yeucau` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `dienthoai` int(10) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltangsach`
--

INSERT INTO `tbltangsach` (`matang`, `hoten`, `gioitinh`, `tensach`, `tinhtrangsach`, `yeucau`, `diachi`, `dienthoai`, `email`) VALUES
(1, 'tuanh', 'on', 'Có một nỗi buồn vừa ngang qua đây', 'Còn mới', 'Không có', 'BCTECH', 987654321, 'ta@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbltheloai`
--

CREATE TABLE `tbltheloai` (
  `idTheLoai` varchar(30) NOT NULL,
  `tenTheLoai` varchar(30) NOT NULL,
  `HienThi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltheloai`
--

INSERT INTO `tbltheloai` (`idTheLoai`, `tenTheLoai`, `HienThi`) VALUES
('1', 'Sách Kỹ Năng', 0),
('2', 'Sách Văn Học', 0),
('4', 'Sách Lịch Sử', 0),
('5 ', 'Sách Kinh Tế', 0),
('6', 'Sách Học Tập', 0),
('7', 'Sách Gia Đình', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblthongtin`
--

CREATE TABLE `tblthongtin` (
  `hovaten` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gioitinh` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblthongtin`
--

INSERT INTO `tblthongtin` (`hovaten`, `email`, `gioitinh`) VALUES
('admin', 'admin@gmail.com', 'nam'),
('customer', 'customer@gmail.com', 'nam'),
('hacker', 'hacker@gmail.com', 'nam'),
('khachhang', 'khachhang@gmail.com', 'nữ'),
('truongthikhanhngoc', 'khanhngoc@gmail.com', 'nu'),
('Tú Anh', 'khtuanh@gmail.com', 'nữ'),
('tuanhlethi', 'lethi@gmail.com', 'nữ'),
('admin', 'ngocanh@gmail.com', 'nu'),
('nhanvien', 'nhanvien@gmail.com', 'nam'),
('lethituanh', 'tuanh@gmail.com', 'nu'),
('Lê Thị Tú Anh', 'tutu@gmail.com', 'nữ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblchitiethd`
--
ALTER TABLE `tblchitiethd`
  ADD PRIMARY KEY (`MaHD`,`idSach`),
  ADD KEY `FKCTHDISSACH` (`idSach`),
  ADD KEY `FKCTHDMAHD` (`MaHD`);

--
-- Indexes for table `tblhoadon`
--
ALTER TABLE `tblhoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `FKEmail_HD` (`Email`),
  ADD KEY `FKNAHAsd` (`Email_NhanVien`);

--
-- Indexes for table `tblsach`
--
ALTER TABLE `tblsach`
  ADD PRIMARY KEY (`idSach`),
  ADD KEY `FKTL` (`idTheLoai`);

--
-- Indexes for table `tbltaikhoan`
--
ALTER TABLE `tbltaikhoan`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tbltangsach`
--
ALTER TABLE `tbltangsach`
  ADD PRIMARY KEY (`matang`);

--
-- Indexes for table `tbltheloai`
--
ALTER TABLE `tbltheloai`
  ADD PRIMARY KEY (`idTheLoai`);

--
-- Indexes for table `tblthongtin`
--
ALTER TABLE `tblthongtin`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbltangsach`
--
ALTER TABLE `tbltangsach`
  MODIFY `matang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblchitiethd`
--
ALTER TABLE `tblchitiethd`
  ADD CONSTRAINT `FKCTHDISSACH` FOREIGN KEY (`idSach`) REFERENCES `tblsach` (`idSach`),
  ADD CONSTRAINT `FKCTHDMAHD` FOREIGN KEY (`MaHD`) REFERENCES `tblhoadon` (`MaHD`);

--
-- Constraints for table `tblhoadon`
--
ALTER TABLE `tblhoadon`
  ADD CONSTRAINT `FKEmail_HD` FOREIGN KEY (`Email`) REFERENCES `tblthongtin` (`email`),
  ADD CONSTRAINT `FKNAHAsd` FOREIGN KEY (`Email_NhanVien`) REFERENCES `tbltaikhoan` (`email`);

--
-- Constraints for table `tblsach`
--
ALTER TABLE `tblsach`
  ADD CONSTRAINT `FKTL` FOREIGN KEY (`idTheLoai`) REFERENCES `tbltheloai` (`idTheLoai`);

--
-- Constraints for table `tbltaikhoan`
--
ALTER TABLE `tbltaikhoan`
  ADD CONSTRAINT `fk_tk` FOREIGN KEY (`email`) REFERENCES `tblthongtin` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
