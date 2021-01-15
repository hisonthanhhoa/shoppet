-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 15, 2021 lúc 06:57 PM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopthucung`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `ten_dang_nhap`, `mat_khau`, `level`) VALUES
(1, 'admin', '$1$hHXfCc0W$8D50uNuNTRXbepGlZLyij1', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(50) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten_dang_nhap`, `mat_khau`, `ho_ten`, `so_dien_thoai`, `email`, `dia_chi`) VALUES
(26, 'sonson', '542f8f409d204feadcc75e71e8ef7d75', 'hoàng Sơn', '123456', 'alo123@gmail.com', 'HN'),
(27, 'alo12', 'd9ebc2c2f25d540180d558f8d3da2160', '', '0123456789', '', 'HN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_li_chi_tiet_hoa_don`
--

CREATE TABLE `quan_li_chi_tiet_hoa_don` (
  `id_hoa_don` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `gia` float NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quan_li_chi_tiet_hoa_don`
--

INSERT INTO `quan_li_chi_tiet_hoa_don` (`id_hoa_don`, `id_san_pham`, `gia`, `so_luong`) VALUES
(1, 30, 123213000, 1),
(1, 34, 12000000, 1),
(2, 30, 123213000, 1),
(2, 31, 10000000, 1),
(2, 32, 12000000, 1),
(3, 30, 123213000, 2),
(4, 31, 10000000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_li_hoa_don`
--

CREATE TABLE `quan_li_hoa_don` (
  `id` int(11) NOT NULL,
  `id_khach_hang` int(11) NOT NULL,
  `so_dien_thoai` text NOT NULL,
  `dia_chi` text NOT NULL,
  `ngay_dat_don` date NOT NULL DEFAULT current_timestamp(),
  `tinh_trang` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quan_li_hoa_don`
--

INSERT INTO `quan_li_hoa_don` (`id`, `id_khach_hang`, `so_dien_thoai`, `dia_chi`, `ngay_dat_don`, `tinh_trang`) VALUES
(1, 26, '', '', '2021-01-15', 0),
(2, 26, '', '', '2021-01-15', 0),
(3, 26, '', '', '2021-01-15', 0),
(4, 26, '', '', '2021-01-15', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_li_loai_san_pham`
--

CREATE TABLE `quan_li_loai_san_pham` (
  `id` int(11) NOT NULL,
  `ten_loai_san_pham` varchar(255) NOT NULL,
  `is_phu_kien` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quan_li_loai_san_pham`
--

INSERT INTO `quan_li_loai_san_pham` (`id`, `ten_loai_san_pham`, `is_phu_kien`) VALUES
(10, 'Chó', 0),
(11, 'Mèo', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_li_san_pham`
--

CREATE TABLE `quan_li_san_pham` (
  `id` int(11) NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `anh_san_pham` varchar(255) NOT NULL,
  `gia` float NOT NULL,
  `so_luong` int(11) NOT NULL,
  `mo_ta` text NOT NULL,
  `tinh_trang` tinyint(1) NOT NULL,
  `id_loai_san_pham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quan_li_san_pham`
--

INSERT INTO `quan_li_san_pham` (`id`, `ten_san_pham`, `anh_san_pham`, `gia`, `so_luong`, `mo_ta`, `tinh_trang`, `id_loai_san_pham`) VALUES
(30, 'Mèo Khó Chịu', '../images/1412021-1610649794.jpg', 123213000, 4, '<p>12wef</p>\r\n', 1, 11),
(31, 'Mèo sa mu rai', '../images/1512021-1610700745.jpg', 10000000, 1, '<h1>M&egrave;o Scottish &ndash; Th&ocirc;ng tin cơ bản về m&egrave;o tai cụp Scottish</h1>\r\n\r\n<p><a href=\"https://petmaster.vn/petroom/meo-canh/scottish/\" target=\"_blank\"><em>M&egrave;o scottish</em></a><em>&nbsp;l&agrave; một trong những giống m&egrave;o được y&ecirc;u th&iacute;ch nhất hiện nay. Cũng l&agrave; lo&agrave;i được lựa chọn để phối giống với nhiều lo&agrave;i m&egrave;o qu&yacute; kh&aacute;c, tạo n&ecirc;n những ch&uacute; m&egrave;o mang bộ gen lạ, độc đ&aacute;o. Hiện nay, m&egrave;o Scottish nhận được sự quan t&acirc;m lớn từ những người nu&ocirc;i th&uacute; cưng. Vậy giống m&egrave;o Scottish tại sao lại c&oacute; sức h&uacute;t kỳ lạ đến vậy? Địa chỉ n&agrave;o uy t&iacute;n để mua m&egrave;o Scottish tai cụp thuần chủng? H&atilde;y c&ugrave;ng Petroom t&igrave;m hiểu trong b&agrave;i viết dưới đ&acirc;y.</em>&nbsp;</p>\r\n\r\n<p><a href=\"https://petmaster.vn/petroom/wp-content/uploads/2020/05/1.-1.jpg\" target=\"_blank\"><img alt=\"Mèo Scottish\" src=\"https://petmaster.vn/petroom/wp-content/uploads/2020/05/1.-1.jpg\" style=\"height:300px; width:600px\" title=\"Mèo Scottish\" /></a></p>\r\n', 1, 11),
(32, 'Mèo Trần Đức Bo', '../images/1512021-1610701148.jpg', 12000000, 1, '<h1>M&egrave;o Scottish &ndash; Th&ocirc;ng tin cơ bản về m&egrave;o tai cụp Scottish</h1>\r\n\r\n<p><a href=\"https://petmaster.vn/petroom/meo-canh/scottish/\" target=\"_blank\"><em>M&egrave;o scottish</em></a><em>&nbsp;l&agrave; một trong những giống m&egrave;o được y&ecirc;u th&iacute;ch nhất hiện nay. Cũng l&agrave; lo&agrave;i được lựa chọn để phối giống với nhiều lo&agrave;i m&egrave;o qu&yacute; kh&aacute;c, tạo n&ecirc;n những ch&uacute; m&egrave;o mang bộ gen lạ, độc đ&aacute;o. Hiện nay, m&egrave;o Scottish nhận được sự quan t&acirc;m lớn từ những người nu&ocirc;i th&uacute; cưng. Vậy giống m&egrave;o Scottish tại sao lại c&oacute; sức h&uacute;t kỳ lạ đến vậy? Địa chỉ n&agrave;o uy t&iacute;n để mua m&egrave;o Scottish tai cụp thuần chủng? H&atilde;y c&ugrave;ng Petroom t&igrave;m hiểu trong b&agrave;i viết dưới đ&acirc;y.</em>&nbsp;</p>\r\n\r\n<p><a href=\"https://petmaster.vn/petroom/wp-content/uploads/2020/05/1.-1.jpg\" target=\"_blank\"><img alt=\"Mèo Scottish\" src=\"https://petmaster.vn/petroom/wp-content/uploads/2020/05/1.-1.jpg\" style=\"height:300px; width:600px\" title=\"Mèo Scottish\" /></a></p>\r\n', 1, 11),
(33, 'Mèo', '../images/1512021-1610701293.jpg', 8000000, 10, '<h1>M&egrave;o Scottish &ndash; Th&ocirc;ng tin cơ bản về m&egrave;o tai cụp Scottish</h1>\r\n\r\n<p><a href=\"https://petmaster.vn/petroom/meo-canh/scottish/\" target=\"_blank\"><em>M&egrave;o scottish</em></a><em>&nbsp;l&agrave; một trong những giống m&egrave;o được y&ecirc;u th&iacute;ch nhất hiện nay. Cũng l&agrave; lo&agrave;i được lựa chọn để phối giống với nhiều lo&agrave;i m&egrave;o qu&yacute; kh&aacute;c, tạo n&ecirc;n những ch&uacute; m&egrave;o mang bộ gen lạ, độc đ&aacute;o. Hiện nay, m&egrave;o Scottish nhận được sự quan t&acirc;m lớn từ những người nu&ocirc;i th&uacute; cưng. Vậy giống m&egrave;o Scottish tại sao lại c&oacute; sức h&uacute;t kỳ lạ đến vậy? Địa chỉ n&agrave;o uy t&iacute;n để mua m&egrave;o Scottish tai cụp thuần chủng? H&atilde;y c&ugrave;ng Petroom t&igrave;m hiểu trong b&agrave;i viết dưới đ&acirc;y.</em>&nbsp;</p>\r\n\r\n<p><a href=\"https://petmaster.vn/petroom/wp-content/uploads/2020/05/1.-1.jpg\" target=\"_blank\"><img alt=\"Mèo Scottish\" src=\"https://petmaster.vn/petroom/wp-content/uploads/2020/05/1.-1.jpg\" style=\"height:300px; width:600px\" title=\"Mèo Scottish\" /></a></p>\r\n', 1, 11),
(34, 'Chó Dúi', '../images/1512021-1610701439.jpg', 12000000, 1, '', 1, 10),
(35, 'Chó alaska trắng', '../images/1512021-1610701675.jfif', 12000000, 10, '<h1>Ch&oacute; Alaska &ndash; T&igrave;m hiểu đặc điểm, gi&aacute; b&aacute;n, c&aacute;ch chăm s&oacute;c ch&oacute; Alaska</h1>\r\n\r\n<p><em>Alaska l&agrave; loại ch&oacute; được y&ecirc;u th&iacute;ch tr&ecirc;n to&agrave;n thế giới bởi d&aacute;ng vẻ oai h&ugrave;ng nhưng kh&ocirc;ng k&eacute;m phần đ&aacute;ng y&ecirc;u. Kế thừa bộ gen của d&ograve;ng ch&oacute; s&oacute;i tuyết hoang d&atilde; v&agrave; được thuần ho&aacute; bởi tộc Malamute,&nbsp;</em><em>Alaska</em><em>&nbsp;nhanh ch&oacute;ng trở th&agrave;nh một trong những giống ch&oacute; được nhiều người y&ecirc;u th&iacute;ch nhất. Để hiểu r&otilde; hơn về giống&nbsp;</em><a href=\"https://petmaster.vn/petroom/cho-canh/alaska/\" target=\"_blank\"><em>ch&oacute; Alaska</em></a><em>&nbsp;huyền thoại n&agrave;y, h&atilde;y c&ugrave;ng Petroom t&igrave;m hiểu tất tần tật c&aacute;c th&ocirc;ng tin về ch&uacute;ng qua b&agrave;i viết dưới đ&acirc;y.</em></p>\r\n\r\n<p><a href=\"https://petmaster.vn/petroom/wp-content/uploads/2020/03/hinh-anh-cho-alaska.jpg\" rel=\"nofollow\" target=\"_blank\"><img alt=\"Chó Alaska\" src=\"https://petmaster.vn/petroom/wp-content/uploads/2020/03/hinh-anh-cho-alaska.jpg\" style=\"height:412px; width:600px\" title=\"hinh-anh-cho-alaska\" /></a></p>\r\n\r\n<p><em>Tất tần tật về si&ecirc;u ch&oacute; Alaska</em></p>\r\n', 1, 10),
(36, 'Phốc', '../images/1512021-1610702045.jpg', 12000000, 10, '<h1>Ch&oacute; Alaska &ndash; T&igrave;m hiểu đặc điểm, gi&aacute; b&aacute;n, c&aacute;ch chăm s&oacute;c ch&oacute; Alaska</h1>\r\n\r\n<p><em>Alaska l&agrave; loại ch&oacute; được y&ecirc;u th&iacute;ch tr&ecirc;n to&agrave;n thế giới bởi d&aacute;ng vẻ oai h&ugrave;ng nhưng kh&ocirc;ng k&eacute;m phần đ&aacute;ng y&ecirc;u. Kế thừa bộ gen của d&ograve;ng ch&oacute; s&oacute;i tuyết hoang d&atilde; v&agrave; được thuần ho&aacute; bởi tộc Malamute,&nbsp;</em><em>Alaska</em><em>&nbsp;nhanh ch&oacute;ng trở th&agrave;nh một trong những giống ch&oacute; được nhiều người y&ecirc;u th&iacute;ch nhất. Để hiểu r&otilde; hơn về giống&nbsp;</em><a href=\"https://petmaster.vn/petroom/cho-canh/alaska/\" target=\"_blank\"><em>ch&oacute; Alaska</em></a><em>&nbsp;huyền thoại n&agrave;y, h&atilde;y c&ugrave;ng Petroom t&igrave;m hiểu tất tần tật c&aacute;c th&ocirc;ng tin về ch&uacute;ng qua b&agrave;i viết dưới đ&acirc;y.</em></p>\r\n\r\n<p><a href=\"https://petmaster.vn/petroom/wp-content/uploads/2020/03/hinh-anh-cho-alaska.jpg\" rel=\"nofollow\" target=\"_blank\"><img alt=\"Chó Alaska\" src=\"https://petmaster.vn/petroom/wp-content/uploads/2020/03/hinh-anh-cho-alaska.jpg\" style=\"height:412px; width:600px\" title=\"hinh-anh-cho-alaska\" /></a></p>\r\n\r\n<p><em>Tất tần tật về si&ecirc;u ch&oacute; Alaska</em></p>\r\n', 1, 10),
(37, 'cậu vàng', '../images/1512021-1610702310.jfif', 12000000, 5, '<h1>Ch&oacute; Alaska &ndash; T&igrave;m hiểu đặc điểm, gi&aacute; b&aacute;n, c&aacute;ch chăm s&oacute;c ch&oacute; Alaska</h1>\r\n\r\n<p><em>Alaska l&agrave; loại ch&oacute; được y&ecirc;u th&iacute;ch tr&ecirc;n to&agrave;n thế giới bởi d&aacute;ng vẻ oai h&ugrave;ng nhưng kh&ocirc;ng k&eacute;m phần đ&aacute;ng y&ecirc;u. Kế thừa bộ gen của d&ograve;ng ch&oacute; s&oacute;i tuyết hoang d&atilde; v&agrave; được thuần ho&aacute; bởi tộc Malamute,&nbsp;</em><em>Alaska</em><em>&nbsp;nhanh ch&oacute;ng trở th&agrave;nh một trong những giống ch&oacute; được nhiều người y&ecirc;u th&iacute;ch nhất. Để hiểu r&otilde; hơn về giống&nbsp;</em><a href=\"https://petmaster.vn/petroom/cho-canh/alaska/\" target=\"_blank\"><em>ch&oacute; Alaska</em></a><em>&nbsp;huyền thoại n&agrave;y, h&atilde;y c&ugrave;ng Petroom t&igrave;m hiểu tất tần tật c&aacute;c th&ocirc;ng tin về ch&uacute;ng qua b&agrave;i viết dưới đ&acirc;y.</em></p>\r\n\r\n<p><a href=\"https://petmaster.vn/petroom/wp-content/uploads/2020/03/hinh-anh-cho-alaska.jpg\" rel=\"nofollow\" target=\"_blank\"><img alt=\"Chó Alaska\" src=\"https://petmaster.vn/petroom/wp-content/uploads/2020/03/hinh-anh-cho-alaska.jpg\" style=\"height:412px; width:600px\" title=\"hinh-anh-cho-alaska\" /></a></p>\r\n\r\n<p><em>Tất tần tật về si&ecirc;u ch&oacute; Alaska</em></p>\r\n', 1, 10),
(38, 'husky ngáo', '../images/1512021-1610706805.jfif', 8000000, 5, '<h3 dir=\"ltr\">&nbsp;Đặc điểm về ngoại h&igrave;nh</h3>\r\n\r\n<p dir=\"ltr\">V&igrave; c&oacute; tổ ti&ecirc;n l&agrave; ch&oacute; s&oacute;i tuyết n&ecirc;n ngoại h&igrave;nh của ch&oacute; Alaska c&oacute; kh&aacute; nhiều n&eacute;t tương đồng. Những ch&uacute; ch&oacute; Alaska thường cao lớn, dũng m&atilde;nh. Ch&oacute; Alaska được chia l&agrave;m 3 loại ch&iacute;nh:</p>\r\n\r\n<ul>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Ch&oacute; Alaska Standard.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Ch&oacute; Alaska Large Standard.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p dir=\"ltr\">Chiều cao, c&acirc;n nặng trung b&igrave;nh của lo&agrave;i ch&oacute; n&agrave;y rơi v&agrave;o khoảng 65 đến 70cm v&agrave; 45 đến 50kg. Đối với những Alaska Giant c&oacute; thể cao tới 1m v&agrave; nặng 80kg. Nh&igrave;n chung, loại ch&oacute; n&agrave;y c&oacute; th&acirc;n h&igrave;nh kh&aacute; c&acirc;n đối, khung xương lớn với c&aacute;c khớp ch&acirc;n cực kỳ chắc chắn do đ&atilde; được t&ocirc;i luyện bởi c&ocirc;ng việc k&eacute;o xe từ xa xưa.</p>\r\n\r\n<p dir=\"ltr\">Bộ l&ocirc;ng của ch&oacute; Alaska cũng l&agrave; điểm đ&aacute;ng lưu &yacute;. Ch&oacute; Alaska sở hữu nhiều m&agrave;u l&ocirc;ng đa dạng như: Trắng, đen trắng, n&acirc;u đỏ, v&agrave;ng đồng, hồng phấn,... Tuy nhi&ecirc;n d&ugrave; th&acirc;n h&igrave;nh ch&uacute;ng c&oacute; m&agrave;u g&igrave; đi chăng nữa th&igrave; phần m&otilde;m v&agrave; 4 ch&acirc;n của ch&uacute;ng lu&ocirc;n c&oacute; m&agrave;u trắng đặc trưng kh&ocirc;ng thay đổi. Đ&acirc;y cũng l&agrave; dấu hiệu để nhận biết ch&oacute; Alaska thuần chủng.</p>\r\n\r\n<p dir=\"ltr\">Tương tự như lo&agrave;i ch&oacute; Husky, ch&oacute; Alaska cũng c&oacute; 2 bộ l&ocirc;ng để th&iacute;ch nghi với thời tiết lạnh gi&aacute; bao gồm lớp l&ocirc;ng d&agrave;y b&ecirc;n trong gi&uacute;p giữ cho cơ thể được ấm &aacute;p v&agrave; lớp l&ocirc;ng b&ecirc;n ngo&agrave;i d&agrave;i hơn, b&ocirc;ng x&ugrave; để chống thấm nước.</p>\r\n\r\n<p dir=\"ltr\">Khi nh&igrave;n trực diện những ch&uacute; ch&oacute; Alaska bạn sẽ thấy ch&uacute;ng to&aacute;t l&ecirc;n vẻ dễ thương v&ocirc; cũng bởi 2 b&ecirc;n m&aacute; bạnh to, mắt h&igrave;nh quả hạnh nh&acirc;n xi&ecirc;n ch&eacute;o l&ecirc;n tr&ecirc;n hộp sọ, Mắt Alaska thuần chủng thương c&oacute; m&agrave;u n&acirc;u đen hoặc hạt dẻ, ngược lại nếu ch&oacute; Alaska c&oacute; mắt m&agrave;u xanh sẽ được coi l&agrave; kh&ocirc;ng thuần chủng. 2 chiếc tai của ch&uacute;ng c&oacute; độ to vừa phải v&agrave; c&oacute; l&ocirc;ng tơ ở v&agrave;nh tai.</p>\r\n\r\n<p dir=\"ltr\">M&otilde;m ch&oacute; Alaska kh&ocirc;ng qu&aacute; d&agrave;i cũng kh&ocirc;ng qu&aacute; ngắn, thậm ch&iacute; tr&ocirc;ng c&ograve;n hơi mập, l&ocirc;ng ở phần m&otilde;m của ch&uacute;ng c&oacute; m&agrave;u trắng. Phần lỗ mũi kh&aacute; to v&agrave; c&oacute; m&agrave;u hồng phớt ở giữa tr&ocirc;ng cực kỳ đ&aacute;ng y&ecirc;u.&nbsp;</p>\r\n\r\n<p dir=\"ltr\">Về phần đu&ocirc;i, c&oacute; lẽ đ&acirc;y l&agrave; phần dễ thương nhất tr&ecirc;n cơ thể ch&oacute; Alaska bởi nh&igrave;n ch&uacute;ng giống như chiếc chổi b&ocirc;ng lau với lớp l&ocirc;ng si&ecirc;u d&agrave;y v&agrave; x&ugrave;. Đu&ocirc;i của ch&oacute; Alaska thường cuộn tr&ograve;n người về ph&iacute;a th&acirc;n. Nếu bạn nh&igrave;n thấy một ch&uacute; ch&oacute; Alaska m&agrave; đu&ocirc;i của n&oacute; cụp xuống dưới th&igrave; chứng tỏ ch&uacute; ch&oacute; Alaska n&agrave;y đ&atilde; bị lai giống.</p>\r\n\r\n<p><a href=\"https://petmaster.vn/petroom/wp-content/uploads/2020/03/dac-diem-ngoai-hinh-cho-alaska.jpg\" rel=\"nofollow\" target=\"_blank\"><img alt=\"Đặc điểm về ngoại hình cho Alaska\" src=\"https://petmaster.vn/petroom/wp-content/uploads/2020/03/dac-diem-ngoai-hinh-cho-alaska.jpg\" style=\"height:425px; width:600px\" title=\"dac-diem-ngoai-hinh-cho-alaska\" /></a></p>\r\n', 1, 10),
(39, 'Mồn Lèo', '../images/1512021-1610731464.jpg', 121, 12, '<h2>M&ocirc; tả</h2>\r\n\r\n<p><img alt=\"\" src=\"https://petsily.vn/wp-content/uploads/2020/01/meo-munchkin-petsily-bam-duc-2.jpg\" style=\"height:453px; width:680px\" /></p>\r\n\r\n<p>Bam ch&uacute; m&egrave;o munchkin x&aacute;m xanh nh&agrave; petsily</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://petsily.vn/wp-content/uploads/2020/01/meo-munchkin-petsily-bam-duc-7.jpg\" style=\"height:453px; width:680px\" /></p>\r\n\r\n<p>Bam ch&uacute; m&egrave;o munchkin x&aacute;m xanh nh&agrave; petsily</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://petsily.vn/wp-content/uploads/2020/01/meo-munchkin-petsily-bam-duc-6.jpg\" style=\"height:453px; width:680px\" /></p>\r\n\r\n<p>Bam ch&uacute; m&egrave;o munchkin x&aacute;m xanh nh&agrave; petsily</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://petsily.vn/wp-content/uploads/2020/01/meo-munchkin-petsily-bam-duc-5.jpg\" style=\"height:453px; width:680px\" /></p>\r\n\r\n<p>Bam ch&uacute; m&egrave;o munchkin x&aacute;m xanh nh&agrave; petsily</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://petsily.vn/wp-content/uploads/2020/01/meo-munchkin-petsily-bam-duc-4.jpg\" style=\"height:453px; width:680px\" /></p>\r\n\r\n<p>Bam ch&uacute; m&egrave;o munchkin x&aacute;m xanh nh&agrave; petsily</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://petsily.vn/wp-content/uploads/2020/01/meo-munchkin-petsily-bam-duc-3.jpg\" style=\"height:453px; width:680px\" /></p>\r\n\r\n<p>Bam ch&uacute; m&egrave;o munchkin x&aacute;m xanh nh&agrave; petsily</p>\r\n', 1, 11);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`);

--
-- Chỉ mục cho bảng `quan_li_chi_tiet_hoa_don`
--
ALTER TABLE `quan_li_chi_tiet_hoa_don`
  ADD KEY `id_hoa_don` (`id_hoa_don`),
  ADD KEY `id_san_pham` (`id_san_pham`);

--
-- Chỉ mục cho bảng `quan_li_hoa_don`
--
ALTER TABLE `quan_li_hoa_don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hang` (`id_khach_hang`);

--
-- Chỉ mục cho bảng `quan_li_loai_san_pham`
--
ALTER TABLE `quan_li_loai_san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quan_li_san_pham`
--
ALTER TABLE `quan_li_san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loai_san_pham` (`id_loai_san_pham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `quan_li_hoa_don`
--
ALTER TABLE `quan_li_hoa_don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `quan_li_loai_san_pham`
--
ALTER TABLE `quan_li_loai_san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `quan_li_san_pham`
--
ALTER TABLE `quan_li_san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `quan_li_chi_tiet_hoa_don`
--
ALTER TABLE `quan_li_chi_tiet_hoa_don`
  ADD CONSTRAINT `quan_li_chi_tiet_hoa_don_ibfk_1` FOREIGN KEY (`id_hoa_don`) REFERENCES `quan_li_hoa_don` (`id`),
  ADD CONSTRAINT `quan_li_chi_tiet_hoa_don_ibfk_2` FOREIGN KEY (`id_san_pham`) REFERENCES `quan_li_san_pham` (`id`);

--
-- Các ràng buộc cho bảng `quan_li_hoa_don`
--
ALTER TABLE `quan_li_hoa_don`
  ADD CONSTRAINT `quan_li_hoa_don_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id`);

--
-- Các ràng buộc cho bảng `quan_li_san_pham`
--
ALTER TABLE `quan_li_san_pham`
  ADD CONSTRAINT `quan_li_san_pham_ibfk_1` FOREIGN KEY (`id_loai_san_pham`) REFERENCES `quan_li_loai_san_pham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
