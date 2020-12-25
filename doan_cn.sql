-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 25, 2020 lúc 06:38 AM
-- Phiên bản máy phục vụ: 8.0.21
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan_cn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adMa` int NOT NULL AUTO_INCREMENT,
  `adTen` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `adEmail` text NOT NULL,
  `adMatkhau` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `adQuyen` int NOT NULL,
  `adTinhtrang` int NOT NULL,
  PRIMARY KEY (`adMa`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adMa`, `adTen`, `adEmail`, `adMatkhau`, `adQuyen`, `adTinhtrang`) VALUES
(7, 'master', 'b@b.com', '202cb962ac59075b964b07152d234b70', 1, 0),
(17, 'admin', 'adminkinhdoanh@gmail.com', '202cb962ac59075b964b07152d234b70', 100, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitiethoadon`
--

DROP TABLE IF EXISTS `tbl_chitiethoadon`;
CREATE TABLE IF NOT EXISTS `tbl_chitiethoadon` (
  `hdMa` varchar(250) NOT NULL,
  `spMa` varchar(50) NOT NULL,
  `spGia` int NOT NULL,
  `cthdSoluongsp` int NOT NULL,
  KEY `fk_cthd_sp` (`spMa`),
  KEY `fk_cthd_hd` (`hdMa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitiethoadon`
--

INSERT INTO `tbl_chitiethoadon` (`hdMa`, `spMa`, `spGia`, `cthdSoluongsp`) VALUES
('43Ngh5580000', 'GVN', 5580000, 1),
('43Ngh115800000', 'GamingMSI', 57900000, 2),
('41Ngh18900000', 'HPPavilion', 18900000, 1),
('98Ngh18900000', 'HPPavilion', 18900000, 1),
('47Ngh18990000', 'gamingMSIBravo', 18990000, 1),
('60Ngh17599000', 'ASUSExpertbook', 17599000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoadon`
--

DROP TABLE IF EXISTS `tbl_hoadon`;
CREATE TABLE IF NOT EXISTS `tbl_hoadon` (
  `hdMa` varchar(250) NOT NULL,
  `hdSoluongsp` int NOT NULL,
  `hdNgaytao` date NOT NULL,
  `hdTongtien` int NOT NULL,
  `khMa` int NOT NULL,
  `hdTinhtrang` int NOT NULL,
  PRIMARY KEY (`hdMa`),
  KEY `fk_hd_kh` (`khMa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoadon`
--

INSERT INTO `tbl_hoadon` (`hdMa`, `hdSoluongsp`, `hdNgaytao`, `hdTongtien`, `khMa`, `hdTinhtrang`) VALUES
('41Ngh18900000', 1, '2020-12-23', 18900000, 9, 0),
('43Ngh115800000', 2, '2020-12-23', 115800000, 9, 0),
('43Ngh5580000', 1, '2020-12-23', 5580000, 9, 0),
('47Ngh18990000', 1, '2020-12-25', 18990000, 9, 0),
('60Ngh17599000', 1, '2020-12-25', 17599000, 9, 0),
('98Ngh18900000', 1, '2020-12-25', 18900000, 9, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

DROP TABLE IF EXISTS `tbl_khachhang`;
CREATE TABLE IF NOT EXISTS `tbl_khachhang` (
  `khMa` int NOT NULL AUTO_INCREMENT,
  `khTen` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `khDiachi` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `khNgaysinh` date NOT NULL,
  `khEmail` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `khGioitinh` int NOT NULL,
  `khSdt` text NOT NULL,
  `khHinh` text NOT NULL,
  `khMatkhau` text NOT NULL,
  `khQuyen` int NOT NULL,
  `khTinhtrang` int NOT NULL,
  PRIMARY KEY (`khMa`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`khMa`, `khTen`, `khDiachi`, `khNgaysinh`, `khEmail`, `khGioitinh`, `khSdt`, `khHinh`, `khMatkhau`, `khQuyen`, `khTinhtrang`) VALUES
(9, 'Nghia2', '135trung quoc', '1999-06-01', 'nguyenchinghia199916@gmail.com', 0, '321654', '044a78f85cfd05892a4381f0d7d0a477.jpg', '202cb962ac59075b964b07152d234b70', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loai`
--

DROP TABLE IF EXISTS `tbl_loai`;
CREATE TABLE IF NOT EXISTS `tbl_loai` (
  `loaiMa` int NOT NULL AUTO_INCREMENT,
  `loaiTen` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`loaiMa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_loai`
--

INSERT INTO `tbl_loai` (`loaiMa`, `loaiTen`) VALUES
(1, 'Laptop'),
(3, 'Pc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

DROP TABLE IF EXISTS `tbl_sanpham`;
CREATE TABLE IF NOT EXISTS `tbl_sanpham` (
  `spMa` varchar(50) NOT NULL,
  `spTen` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `spMota` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `spGia` int NOT NULL,
  `spHinh` text NOT NULL,
  `spTinhtrang` int NOT NULL,
  `spNgaytao` date NOT NULL,
  `loaiMa` int NOT NULL,
  `thMa` int NOT NULL,
  PRIMARY KEY (`spMa`),
  KEY `fk_sp_th` (`thMa`),
  KEY `fk_sp_loai` (`loaiMa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`spMa`, `spTen`, `spMota`, `spGia`, `spHinh`, `spTinhtrang`, `spNgaytao`, `loaiMa`, `thMa`) VALUES
('ASUSExpertbook', 'Laptop ASUS Expertbook P1410CJA EK354T', '<p><strong>CPU Intel Core i3-1005G1 (1.20 GHz up to 3.40 GHz, 4MB)</strong></p>\r\n\r\n<p>RAM 4GB onboard DDR4/ 2666MHz + [1 x 4GB DDR4/ 2666MHz (1 slot)]</p>\r\n\r\n<p>Ổ cứng 512GB SSD PCIe (M.2 2280) Card đồ họa Intel UHD Graphics</p>\r\n\r\n<p>M&agrave;n h&igrave;nh 14.0&quot; inch (16:9) LED-backlit FHD (1920 x 1080) 60Hz Anti-Glare Panel with 45% NTSC</p>\r\n\r\n<p>Cổng giao tiếp 2 x USB 2.0 1 x USB 3.1 Gen 1 Type-A 1 x USB 3.1 Gen 1 Type-C 1 x HDMI 1 x Headphone/Microphone combo audio jack 1 x SATA3 Micro-SD card reader</p>\r\n\r\n<p>&nbsp;</p>\r\n', 17599000, 'laptop-asus-experbook-p1410cja-ek354t-2_379f608b6de644479b132717d612a797.webp', 1, '2020-12-04', 1, 1),
('AsusVivobook', 'Laptop Asus Vivobook A515EA BQ489T', 'CPU	Intel Core i3-1115G4 1.7GHz up to 4.1GHz 8MB\r\nRAM	4GB DDR4 2666MHz Onboard (1x SO-DIMM socket, up to 12GB SDRAM)\r\nỔ lưu trữ:	512GB SSD M.2 PCIE G3X4\r\nCard đồ họa	Intel® UHD Graphics for 11th Gen Intel® Processors\r\nMàn hình	15.6\" FHD (1920 x 1080) Anti-Glare with 45% NTSC, NanoEdge\r\nBàn phím	Fullsize\r\nAudio	Harman Kardon\r\nĐọc thẻ nhớ	Micro SD card reader\r\nKết nối có dây (LAN)	None\r\nKết nối không dây	802.11AC (2x2), bluetooth v5.0\r\nWebcam	HD Web Camera\r\nCổng giao tiếp	\r\n1x Type-A USB 3.2 Gen 1\r\n1x Type-C USB 3.2\r\n2x USB 2.0 port(s)\r\n1x HDMI 1.4', 15600000, '1_679c4b8a3ff4484ba35c6274a8f86dca.webp', 1, '2020-12-04', 1, 1),
('gamingLenovo', 'Laptop gaming Lenovo Legion 5 15IMH05 82AU004YVN', '<p>CPU Intel Core i7-10750H RAM 8GB DDR4 2933MHz (2x SO-DIMM socket, up to 16GB SDRAM) &Ocirc;̉ cứng 512GB SSD M.2 NVMe, x1 slot 2.5&quot; SATA (HDD/SSD) Card đồ họa NVIDIA GeForce GTX 1650 4GB GDDR6 + Intel UHD Graphics M&agrave;n h&igrave;nh 15.6&quot; FHD (1920x1080), IPS, anti-glare, 120Hz, LED backlight, 250 nits, 16:9 aspect ratio, 45% NTSC Cổng giao tiếp 4x USB 3.1 Gen 1 (Always On) 2x USB 3.1 Gen 2 1x USB 3.1 Type-C Gen 1 (with the function of DisPlay 1.4) 1x USB 3.1 Type-C Gen 2 / Thunderbolt 3 (with the function of DP 1.4) 1x HDMI 2.0 1x Ethernet (RJ-45) 1x headphone / microphone combo jack Audio Harman&reg; Speakers with Dolby Atmos&reg; for Gaming Đọc thẻ nhớ None Chu&acirc;̉n LAN Gb LAN Chuẩn WIFI 802.11ax 2x2 Bluetooth v5.0 Webcam HD 720p Hệ điều h&agrave;nh Windows 10 Home Pin 4 Cell 60 WHr Trọng lượng 2.3 kg M&agrave;u sắc Phantom Black Kích thước 363.06 x 259.61 x 23.57-26.1 (mm)</p>\r\n', 27990000, 'usecaseTongquat.jpg', 1, '2020-12-04', 1, 7),
('GamingMSI', 'Laptop Gaming MSI GE66 Raider 10SFS 474VN', '<p>Bộ vi xử l&yacute; (CPU) T&ecirc;n bộ vi xử l&yacute; Intel&reg; Core&trade; i7-10875H Processor Tốc độ 2.30GHz up to 5.10GHz, 8 nh&acirc;n 16 luồng Bộ nhớ đệm 16MB Intel&reg; Smart Cache Chipset Intel&reg; HM470 Bộ nhớ trong (RAM Laptop) Dung lượng 32GB DDR4 3200MHz (2 x 16GB) Số khe ram 2 Slots, Max 64GB Ổ cứng (SSD Laptop) Dung lượng 1TB SSD NVMe PCIe Gen3x4 Khả năng lưu trữ 1 x M.2 SSD slot (NVMe PCIe Gen3) 1 x M.2 SSD Combo slot (NVMe PCIe Gen3 / SATA) Ổ đĩa quang (ODD) None Hiển thị (M&agrave;n h&igrave;nh Laptop) M&agrave;n h&igrave;nh 15.6 Inch FHD IPS, 300Hz Thin Bezel, close to 100%sRGB Độ ph&acirc;n giải FHD (1920 x 1080) Đồ Họa (VGA) Bộ xử l&yacute; NVIDIA&reg; GeForce RTX&trade; 2070 Super 8GB GDDR6 C&ocirc;ng nghệ Kết nối (Network) LAN 1 x RJ45 - Killer Gb LAN Wireless Killer Wi-Fi 6 AX1650i (2*2 ax) Bluetooth Bluetooth v5.1</p>\r\n', 57900000, 'gearvn.webp', 1, '2020-12-04', 1, 2),
('gamingMSIBravo', 'Laptop gaming MSI Bravo 15 A4DCR 270VN', ' CPU	AMD Ryzen 5 – 4600H\r\nRAM	DDR4 8GB (1 x 8GB) 3200MHz; 2 slots, up to 32GB\r\nỔ cứng	256GB SSD NVMe M.2 PCIe Gen 3×2, 1 slot SSD NVMe M.2 PCIe hoặc M.2 SATA III\r\nCard đồ họa	Radeon RX5300M 3GB\r\nMàn hình	15.6\" FHD (1920×1080), IPS, tần số quét 144Hz\r\nCổng giao tiếp	\r\n1x (4K @ 30Hz) HDMI\r\n\r\n1x RJ45\r\n\r\n1x Type-C USB3.2 Gen1\r\n\r\n3x Type-A USB3.2 Gen1\r\n\r\nBàn phím 	Backlight Keyboard ( Red )\r\nChuẩn WIFI	Intel Wi-Fi 6 AX201(2*2 ax)\r\nBluetooth	v5.0\r\nWebcam	HD 720p CMOS module\r\nHệ điều hành	Windows 10 Home\r\nPin	3 Cell\r\nTrọng lượng	1.88 kg\r\nMàu sắc	Đen \r\nKích thước	359 x 254 x 21.7 mm', 18990000, '2_f29c2792fd7f4e79b429f0133c6a8006.webp', 1, '2020-12-04', 1, 2),
('GVN', 'GVN Usopp', '- Mainboard	MSI H410M-A PRO	36 Tháng\r\n- CPU 	Intel Pentium G6400 / 4MB / 4.0GHz / 2 Nhân 4 Luồng / LGA 1200	36 Tháng\r\n- RAM 	G.SKILL Ripjaws V 1x8gb 2800MHz	36 Tháng\r\n- HDD	Có thể tùy chọn Nâng cấp	24 Tháng\r\n- SSD 	PNY SSD CS900 120G 2.5\" Sata 3	36 Tháng\r\n- PSU	Deepcool DN450 80 Plus	36 Tháng\r\n- Case	XIGMATEK XA-20 (ATX)	12 Tháng', 5580000, 'usopp_5d7af703a15640068df37891f46785a7.webp', 1, '2020-12-04', 3, 5),
('GVNAORUS', 'GVN AORUS S', '- Mainboard	GIGABYTE B365M AORUS ELITE LGA1151v2	36 Tháng\r\n- CPU 	INTEL Core i5 9400F 6C6T Coffeelake 4.1GHz	36 Tháng\r\n- RAM	Kingston HyperX Fury 2x8Gb 2666MHz DDR4	36 Tháng\r\n- VGA 	GIGABYTE GeForce RTX™ 2060 SUPER WINDFORCE OC 8G	36 Tháng\r\n- HDD	Tùy chọn mua thêm Tại Đây	24 Tháng\r\n- SSD	APACER AS340 Panther 2.5\" SATA III 240GB	36 Tháng\r\n- PSU	Gigabyte P650B 80 PLUS Bronze	36 Tháng\r\n- Case Deepcool MATREXX 55 Mid-Tower12 Tháng\r\n- Cooling DEEPCOOL GAMMAXX GTE V212 Tháng', 24300000, 'gvn_aorus_m_6334cf94ef4c41a0a89fe9640770fb93.webp', 1, '2020-12-04', 3, 6),
('GVNDariusS', 'GVN Darius S', 'Mainboard	MSI B450M Mortar MAX (AMD Socket AM4)	36 Tháng\r\nCPU	AMD Ryzen 5 3600x /6 nhân 12 luồng AM4	36 Tháng\r\nRAM	ADATA SPECTRIX D41 TUF Gaming RGB 1x8 BUS 3200	36 Tháng\r\nVGA - Card đồ họa	MSI GeForce® GTX 1660 SUPER Ventus OC 6GB GDDRA	36 Tháng\r\nHDD	Có thể tùy chọn Nâng cấp	24Tháng\r\nSSD	PNY SSD CS900 120G 2.5\" Sata 3	36 Tháng\r\nPSU	SILVERSTONE ST50F-ES230 500W 80Plus	36 Tháng\r\nCase 	Case XIGMATEK GEMINI (Mini Tower)	12 Tháng\r\n', 1659000, 'darius_6e62645c326f4672abf1616a66b94257.webp', 1, '2020-12-04', 3, 1),
('GVNGhosts', 'GVN Ghosts S', 'Mainboard	ASUS TUF GAMING B460M-PLUS	36 Tháng\r\nCPU	Intel Core i5 10400F / 12MB / 2.9GHz / 6 Nhân 12 Luồng / LGA 1200	36 Tháng\r\nRAM	Kingston HyperX Fury Black 2666 1x8 BUS 	36 Tháng\r\nVGA - Card đồ họa	GIGABYTE GeForce RTX™ 2060 SUPER WINDFORCE OC 8G	36 Tháng\r\nHDD	Có thể tùy chọn Nâng cấp	24Tháng\r\nSSD	PNY SSD CS900 240G 2.5\" Sata 3	36 Tháng\r\nPSU	SilverStone ST65F-ES230 80 Plus	36 Tháng\r\nCooling	DEEPCOOL GAMMAXX GTE V2	12 Tháng\r\nCase	XIGMATEK OMG QUEEN (EN45631) - GAMING M-ATX	12 Tháng', 21990000, 'ghosts_900x603_copy_c28346fde2354bab956e32383bfe0b75.webp', 1, '2020-12-04', 3, 2),
('GVNMystic', 'GVN Mystic M', 'Mainboard	Gigabyte H310M DS2 LGA 1151v2	36 Tháng\r\nCPU	Intel Core i3 9100F 4C4T 6M 3.6GHz	36 Tháng\r\nRAM	G.SKILL Ripjaws V 1x8GB 2800	36 Tháng\r\nVGA - Card đồ họa	MSI GTX 1650 Super VENTUS XS OC 4GB GDDR6	36 Tháng\r\nHDD	Có thể tùy chọn Nâng cấp	24Tháng\r\nSSD	PNY SSD CS900 120G 2.5\" Sata 3	36 Tháng\r\nPSU	Deepcool DN450 80 Plus	36 Tháng\r\nCase 	Case XIGMATEK GEMINI (Mini Tower)	12 Tháng', 10690000, 'mystic_c638a431a5c2400e8329ab04e39ac7fd.jpg', 1, '2020-12-04', 3, 1),
('GVNSonaPro', 'GVN Sona Pro S', 'Mainboard	GIGABYTE B460M AORUS PRO (rev. 1.0)	36 Tháng\r\nCPU	Intel Core i5 10400F / 12MB / 2.9GHz / 6 Nhân 12 Luồng / LGA 1200	36 Tháng\r\nRAM	Gigabyte Memory 1x8GB 2666	36 Tháng\r\nVGA - Card đồ họa	GIGABYTE GeForce RTX™ 3060 Ti Aorus M (Master) 8G	36 Tháng\r\nHDD	Có thể tùy chọn Nâng cấp	24 Tháng\r\nSSD	GIGABYTE GeForce RGigabyte SSD 240GB 2.5\" Sata 3	36 Tháng\r\nPSU	Gigabyte P650B 80 PLUS bronze	36 Tháng\r\nCase 	GIGABYTE C200 Glass	12 Tháng', 26490000, 'sona_pro_e917c26a120042899e58839ac1a1ded8.webp', 1, '2020-12-04', 3, 1),
('GVNVolibear', 'GVN Volibear S', 'Mainboard 	MSI MAG Z490 TOMAHAWK	36 Tháng\r\nCPU	Intel Core i7 10700F / 16MB / 2.9GHz / 8 Nhân 16 Luồng / LGA 1200	36 Tháng\r\nRAM 	HyperX Fury RGB 1x8 BUS 3200	36 Tháng\r\nVGA 	MSI GeForce GTX 1660 SUPER GAMINGX 6GB GDDR6	36 Tháng\r\nHDD 	TÙY CHỌN	24 Tháng\r\nSSD 	Gigabyte SSD 240GB 2.5\" Sata 3	60 Tháng\r\nPSU 	SilverStone ST65F-ES230 80 Plus	36 Tháng\r\nCase 	MSI MAG VAMPIRIC 100R	12 Tháng\r\nCooling	DEEPCOOL GAMMAXX GTE V2	72 Tháng', 25590000, 'volibear_52fabc7af20b460ab4ed7722c5289af5.webp', 1, '2020-12-04', 3, 1),
('GVNYuumi', 'GVN Yuumi S', '- Mainboard 	MSI MAG B460M MORTAR	36 Tháng\r\n- CPU 	Intel Core i5 10400F / 12MB / 2.9GHz / 6 Nhân 12 Luồng / LGA 1200	36 Tháng\r\n- RAM 	Kingston HyperX Fury Black 1x8GB 2666	36 Tháng\r\n- VGA 	MSI GeForce RTX™ 2060 VENTUS XS 6G OCV1 GDDR6	36 Tháng\r\n- HDD	Có thể tùy chọn Nâng cấp	24 Tháng\r\n- SSD	PNY SSD CS900 120G 2.5\" Sata 3	36 Tháng\r\n- PSU 	SilverStone ST50F-ES230 80 Plus	36 Tháng\r\n- Case 	XIGMATEK OMG AQUA (EN45808) - GAMING M-ATX	12 Tháng', 18550000, 'post_fb_900x603_541c2d337c2b40e7a2f2bb1c82186899.webp', 1, '2020-12-04', 3, 4),
('HPPavilion', 'Laptop HP Pavilion Gaming 15 ', '<p>CPU AMD Ryzen 5 4600H 3.0GHz up to 4.0GHz 8MB RAM 8GB DDR4 3200MHz (2x SO-DIMM socket, up to 32GB SDRAM) &Ocirc;̉ cứng HDD 1TB 7200rpm + 128GB SSD M.2 PCIe Card đồ họa NVIDIA GeForce GTX 1650 4GB GDDR6 + AMD Radeon&trade; Graphics M&agrave;n h&igrave;nh 15.6&quot; FHD (1920 x 1080) 144Hz, IPS, Anti-Glare, Micro-Edge, WLED-backlit, 250nits, 45% NTSC Cổng giao tiếp 1x USB Type-C&reg; 5Gbps signaling rate 1x USB Type-A 5Gbps signaling rate 1x USB 2.0 Type-A (HP Sleep and Charge) 1x HDMI 2.0 1x RJ-45 Audio B&amp;O PLAY, dual speakers, HP Audio Boost Đọc thẻ nhớ 1 multi-format SD media card reader Chu&acirc;̉n LAN 10/100/1000 GbE LAN Chuẩn WIFI Realtek RTL8822CE 802.11a/b/g/n/ac (2x2) Bluetooth v5.0 Webcam HP TrueVision 720p HD camera Hệ điều h&agrave;nh Windows 10 Home Pin 3 Cell 52.5WHr Trọng lượng 1.98 kg M&agrave;u sắc Shadow Black Kích thước 36 x 25.7 x 2.35 cm</p>\r\n', 18900000, 'tải xuống.jpg', 1, '2020-12-04', 1, 5),
('MSIGL65Leopard', 'Laptop MSI GL65 Leopard 10SCXK 089VN', '<p>CPU Intel Core i7-10750H 2.6GHz up to 5.0GHz 12MB RAM 8GB DDR4 2666MHz (2x SO-DIMM socket, up to 32GB SDRAM) Ổ cứng 512GB SSD M.2 PCIE, x1 slot 2.5&quot; SATA (HDD/SSD) Card đồ họa NVIDIA GeForce GTX 1650 4GB GDDR6 + Intel UHD Graphics M&agrave;n h&igrave;nh 15.6&quot; FHD (1920 x 1080) IPS with Anti-Glare, 144Hz, Thin Bezel, 45% NTSC Cổng giao tiếp 1x Type-C USB3.2 Gen1 3x Type-A USB3.2 Gen1 1x Mini-DisplayPort 1x (4K @ 30Hz) HDMI 1x RJ45 Audio Nahimic 3 Audio Technology B&agrave;n ph&iacute;m Per-Key RGB Đọc thẻ nhớ SD (XC/HC) Card Reader</p>\r\n', 24990000, '1_16b2f999bc734c929733cc09ac95fe63.webp', 1, '2020-12-04', 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thuonghieu`
--

DROP TABLE IF EXISTS `tbl_thuonghieu`;
CREATE TABLE IF NOT EXISTS `tbl_thuonghieu` (
  `thMa` int NOT NULL AUTO_INCREMENT,
  `thTen` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`thMa`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_thuonghieu`
--

INSERT INTO `tbl_thuonghieu` (`thMa`, `thTen`) VALUES
(1, 'ASUS'),
(2, 'MSI'),
(3, 'APPLE'),
(4, 'ACER'),
(5, 'HP'),
(6, 'DELL'),
(7, 'LENOVO');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  ADD CONSTRAINT `fk_cthd_hd` FOREIGN KEY (`hdMa`) REFERENCES `tbl_hoadon` (`hdMa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cthd_sp` FOREIGN KEY (`spMa`) REFERENCES `tbl_sanpham` (`spMa`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD CONSTRAINT `fk_hd_kh` FOREIGN KEY (`khMa`) REFERENCES `tbl_khachhang` (`khMa`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `fk_sp_loai` FOREIGN KEY (`loaiMa`) REFERENCES `tbl_loai` (`loaiMa`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_sp_th` FOREIGN KEY (`thMa`) REFERENCES `tbl_thuonghieu` (`thMa`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
