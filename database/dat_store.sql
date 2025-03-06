-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2025 at 03:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dat_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`) VALUES
(13, 'Tinh dầu', '<p><strong>Giới Thiệu Về Tinh Dầu: C&aacute;c Loại M&ugrave;i Hương V&agrave; C&ocirc;ng Dụng</strong></p>\r\n\r\n<h3>1. Tinh Dầu L&agrave; G&igrave;?</h3>\r\n\r\n<p>Tinh dầu l&agrave; chiết xuất từ c&aacute;c loại thực vật, hoa, l&aacute;, vỏ c&acirc;y hoặc rễ c&acirc;y th&ocirc;ng qua qu&aacute; tr&igrave;nh chưng cất hoặc &eacute;p lạnh. Đ&acirc;y l&agrave; sản phẩm thi&ecirc;n nhi&ecirc;n c&oacute; m&ugrave;i hương đậm đặc, mang lại nhiều lợi &iacute;ch cho sức khỏe v&agrave; tinh thần.</p>\r\n\r\n<hr />\r\n<h3>2. C&aacute;c Loại M&ugrave;i Hương Tinh Dầu Phổ Biến</h3>\r\n\r\n<h4><strong>2.1. Tinh Dầu Hoa</strong></h4>\r\n\r\n<ul>\r\n	<li><strong>Hoa oải hương (Lavender)</strong>: Hương thơm dịu nhẹ, gi&uacute;p thư gi&atilde;n, giảm căng thẳng v&agrave; cải thiện giấc ngủ.</li>\r\n	<li><strong>Hoa hồng (Rose)</strong>: Hương quyến rũ, tạo cảm gi&aacute;c thư th&aacute;i, chống trầm cảm v&agrave; c&acirc;n bằng cảm x&uacute;c.</li>\r\n	<li><strong>Hoa nh&agrave;i (Jasmine)</strong>: Hương thơm nồng n&agrave;n, gi&uacute;p k&iacute;ch th&iacute;ch sự tự tin, giảm stress v&agrave; l&agrave;m dịu da.</li>\r\n</ul>\r\n\r\n<h4><strong>2.2. Tinh Dầu Gỗ</strong></h4>\r\n\r\n<ul>\r\n	<li><strong>Gỗ đ&agrave;n hương (Sandalwood)</strong>: Hương trầm ấm, gi&uacute;p giảm căng thẳng, hỗ trợ thiền định v&agrave; l&agrave;m dịu tinh thần.</li>\r\n	<li><strong>Gỗ tuyết t&ugrave;ng (Cedarwood)</strong>: Hương thơm ấm &aacute;p, c&oacute; t&aacute;c dụng l&agrave;m dịu thần kinh, hỗ trợ giấc ngủ v&agrave; giảm căng thẳng.</li>\r\n</ul>\r\n\r\n<h4><strong>2.3. Tinh Dầu Cam Qu&yacute;t</strong></h4>\r\n\r\n<ul>\r\n	<li><strong>Cam ngọt (Sweet Orange)</strong>: Hương tươi m&aacute;t, gi&uacute;p tăng cường năng lượng, giảm căng thẳng.</li>\r\n	<li><strong>Chanh (Lemon)</strong>: Hương thơm thanh khiết, c&oacute; t&aacute;c dụng l&agrave;m sạch kh&ocirc;ng kh&iacute;, k&iacute;ch th&iacute;ch tr&iacute; &oacute;c v&agrave; tăng cường miễn dịch.</li>\r\n	<li><strong>Bưởi (Grapefruit)</strong>: Hương thơm tươi s&aacute;ng, hỗ trợ giảm c&acirc;n, giảm stress v&agrave; thanh lọc cơ thể.</li>\r\n</ul>\r\n\r\n<h4><strong>2.4. Tinh Dầu Thảo Mộc</strong></h4>\r\n\r\n<ul>\r\n	<li><strong>Bạc h&agrave; (Peppermint)</strong>: Hương thơm m&aacute;t lạnh, gi&uacute;p tỉnh t&aacute;o, giảm đau đầu v&agrave; hỗ trợ ti&ecirc;u h&oacute;a.</li>\r\n	<li><strong>Hương thảo (Rosemary)</strong>: Gi&uacute;p tăng cường tr&iacute; nhớ, cải thiện tập trung v&agrave; giảm stress.</li>\r\n	<li><strong>Tr&agrave;m tr&agrave; (Tea Tree)</strong>: C&oacute; t&iacute;nh kh&aacute;ng khuẩn mạnh, gi&uacute;p l&agrave;m sạch da, trị mụn v&agrave; thanh lọc kh&ocirc;ng kh&iacute;.</li>\r\n</ul>\r\n\r\n<h4><strong>2.5. Tinh Dầu Gia Vị</strong></h4>\r\n\r\n<ul>\r\n	<li><strong>Quế (Cinnamon)</strong>: Hương thơm ấm nồng, gi&uacute;p tăng cường tuần ho&agrave;n m&aacute;u, giảm căng thẳng.</li>\r\n	<li><strong>Gừng (Ginger)</strong>: Hỗ trợ ti&ecirc;u h&oacute;a, giảm buồn n&ocirc;n v&agrave; l&agrave;m ấm cơ thể.</li>\r\n</ul>\r\n\r\n<hr />\r\n<h3>3. C&ocirc;ng Dụng Của Tinh Dầu</h3>\r\n\r\n<ul>\r\n	<li><strong>Thư gi&atilde;n v&agrave; giảm stress</strong>: Sử dụng tinh dầu oải hương, cam ngọt, hoặc gỗ đ&agrave;n hương gi&uacute;p giảm căng thẳng, hỗ trợ giấc ngủ.</li>\r\n	<li><strong>Tăng cường tập trung</strong>: Tinh dầu bạc h&agrave; v&agrave; hương thảo gi&uacute;p cải thiện tr&iacute; nhớ, giảm mệt mỏi.</li>\r\n	<li><strong>Chăm s&oacute;c da</strong>: Tinh dầu tr&agrave;m tr&agrave; trị mụn, hoa hồng dưỡng ẩm da.</li>\r\n	<li><strong>Thanh lọc kh&ocirc;ng kh&iacute;</strong>: Sử dụng tinh dầu chanh, tr&agrave;m tr&agrave; để l&agrave;m sạch kh&ocirc;ng gian sống.</li>\r\n</ul>\r\n\r\n<hr />\r\n<h3>4. C&aacute;ch Sử Dụng Tinh Dầu</h3>\r\n\r\n<ul>\r\n	<li><strong>Khuếch t&aacute;n hương thơm</strong>: D&ugrave;ng m&aacute;y khuếch t&aacute;n hoặc đ&egrave;n x&ocirc;ng tinh dầu.</li>\r\n	<li><strong>X&ocirc;ng hơi</strong>: Nhỏ v&agrave;i giọt tinh dầu v&agrave;o nước n&oacute;ng để thư gi&atilde;n.</li>\r\n	<li><strong>Massage</strong>: Pha lo&atilde;ng với dầu nền (dầu dừa, dầu hạnh nh&acirc;n) để thoa l&ecirc;n da.</li>\r\n	<li><strong>Nhỏ v&agrave;o bồn tắm</strong>: Tạo kh&ocirc;ng gian thư gi&atilde;n tuyệt vời.</li>\r\n</ul>\r\n\r\n<hr />\r\n<p>Tinh dầu l&agrave; m&oacute;n qu&agrave; thi&ecirc;n nhi&ecirc;n mang lại nhiều lợi &iacute;ch cho sức khỏe v&agrave; tinh thần. H&atilde;y chọn loại tinh dầu ph&ugrave; hợp để tận hưởng sự thư th&aacute;i v&agrave; c&acirc;n bằng trong cuộc sống!</p>\r\n\r\n<p><img alt=\"Tên các loại tinh dầu tiếng Anh ( Có hình ảnh minh họa)\" src=\"https://khotinhdau.com/wp-content/uploads/2023/05/ten-cac-loai-tinh-dau-bang-tieng-anh-640x1615.jpg\" /></p>\r\n\r\n<p><img alt=\"Hình ảnh Tinh Dầu Thơm Hoa Trong Suốt PNG , Hương Liệu, Tinh Dầu, Nhưng ...\" src=\"https://png.pngtree.com/png-clipart/20230417/original/pngtree-aromatherapy-essential-oil-flowers-transparent-png-image_9062801.png\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Sự kết hợp hoàn hảo của các loại tinh dầu - iCare Pharma\" src=\"https://icarepharma.com.vn/wp-content/uploads/2019/09/half2-880x800.jpg\" /></p>\r\n\r\n<p><img alt=\"3 loại Tinh dầu thơm phòng thư giãn cho tinh thần sảng khoái ...\" src=\"https://hillsbeauty.vn/wp-content/uploads/2022/04/tinh-dau-thom-phong.jpg\" /></p>\r\n', '2025-03-05 09:08:51'),
(14, 'Máy xông tinh dầu', '<h3>5. M&aacute;y X&ocirc;ng Tinh Dầu V&agrave; C&aacute;ch Sử Dụng</h3>\r\n\r\n<p>M&aacute;y x&ocirc;ng tinh dầu l&agrave; thiết bị gi&uacute;p khuếch t&aacute;n hương thơm của tinh dầu v&agrave;o kh&ocirc;ng gian, mang lại kh&ocirc;ng kh&iacute; trong l&agrave;nh, thư gi&atilde;n v&agrave; gi&uacute;p tận hưởng tối đa c&ocirc;ng dụng của tinh dầu.</p>\r\n\r\n<h4><strong>5.1. C&aacute;c Loại M&aacute;y X&ocirc;ng Tinh Dầu</strong></h4>\r\n\r\n<ul>\r\n	<li><strong>M&aacute;y khuếch t&aacute;n si&ecirc;u &acirc;m</strong>: Sử dụng s&oacute;ng si&ecirc;u &acirc;m để ph&aacute; vỡ tinh dầu th&agrave;nh hơi sương mịn, gi&uacute;p tinh dầu lan tỏa hiệu quả m&agrave; kh&ocirc;ng l&agrave;m biến đổi đặc t&iacute;nh.</li>\r\n	<li><strong>Đ&egrave;n x&ocirc;ng tinh dầu bằng nến</strong>: D&ugrave;ng nhiệt từ nến để l&agrave;m n&oacute;ng tinh dầu, tạo hương thơm nhẹ nh&agrave;ng.</li>\r\n	<li><strong>M&aacute;y khuếch t&aacute;n nhiệt</strong>: Sử dụng nhiệt để khuếch t&aacute;n tinh dầu nhanh ch&oacute;ng, ph&ugrave; hợp cho kh&ocirc;ng gian nhỏ.</li>\r\n	<li><strong>M&aacute;y khuếch t&aacute;n phun sương</strong>: Kh&ocirc;ng sử dụng nước, chỉ phun tinh dầu nguy&ecirc;n chất dưới dạng hạt nhỏ, gi&uacute;p hương thơm mạnh mẽ v&agrave; tinh khiết hơn.</li>\r\n</ul>\r\n\r\n<h4><strong>5.2. C&aacute;ch Sử Dụng M&aacute;y X&ocirc;ng Tinh Dầu Hiệu Quả</strong></h4>\r\n\r\n<ol>\r\n	<li><strong>Đổ nước v&agrave;o b&igrave;nh chứa (đối với m&aacute;y si&ecirc;u &acirc;m)</strong>: D&ugrave;ng nước sạch, kh&ocirc;ng vượt qu&aacute; mức quy định.</li>\r\n	<li><strong>Nhỏ 3-5 giọt tinh dầu v&agrave;o nước</strong>: T&ugrave;y theo diện t&iacute;ch ph&ograve;ng v&agrave; sở th&iacute;ch c&aacute; nh&acirc;n.</li>\r\n	<li><strong>Bật m&aacute;y v&agrave; điều chỉnh chế độ khuếch t&aacute;n</strong>: Một số m&aacute;y c&oacute; chế độ phun li&ecirc;n tục hoặc ngắt qu&atilde;ng.</li>\r\n	<li><strong>Vệ sinh m&aacute;y thường xuy&ecirc;n</strong>: Giữ m&aacute;y sạch sẽ để tr&aacute;nh tắc nghẽn v&agrave; đảm bảo hiệu quả sử dụng.</li>\r\n</ol>\r\n\r\n<h4><strong>5.3. Lợi &Iacute;ch Của M&aacute;y X&ocirc;ng Tinh Dầu</strong></h4>\r\n\r\n<ul>\r\n	<li>Gi&uacute;p kh&ocirc;ng gian lu&ocirc;n thơm m&aacute;t v&agrave; thư gi&atilde;n.</li>\r\n	<li>Thanh lọc kh&ocirc;ng kh&iacute;, khử m&ugrave;i kh&oacute; chịu.</li>\r\n	<li>Hỗ trợ giấc ngủ, giảm stress v&agrave; cải thiện tinh thần.</li>\r\n	<li>Một số loại tinh dầu c&ograve;n gi&uacute;p xua đuổi c&ocirc;n tr&ugrave;ng.</li>\r\n</ul>\r\n', '2025-03-05 09:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `record_id`, `image_path`, `created_at`) VALUES
(7, 13, 'uploads/1741165731_d86efbef6f8d9d8ed534.jpg', '2025-03-05 09:08:51'),
(8, 14, 'uploads/1741165885_542948ce3db1c543a19d.jpg', '2025-03-05 09:11:25'),
(9, 14, 'uploads/1741165885_86867c65ef7d9444f1d6.jpeg', '2025-03-05 09:11:25'),
(10, 14, 'uploads/1741165885_e088db7f2f121fdf1dde.jpg', '2025-03-05 09:11:25'),
(11, 14, 'uploads/1741165885_c39b8a6673206f051384.jpeg', '2025-03-05 09:11:25'),
(12, 14, 'uploads/1741165885_0c0e44524c3b6c600daf.jpg', '2025-03-05 09:11:25'),
(13, 14, 'uploads/1741165885_b0718ca3104b0b74f9c6.jpg', '2025-03-05 09:11:25'),
(14, 14, 'uploads/1741165885_1ea10c0977137eed2ac9.jpg', '2025-03-05 09:11:25'),
(15, 14, 'uploads/1741165885_f9b025113d39e4a401b4.png', '2025-03-05 09:11:25'),
(16, 14, 'uploads/1741165885_c3e364fc11c535531c21.jpg', '2025-03-05 09:11:25'),
(17, 14, 'uploads/1741165885_e395c59c27f6389fac3a.jpg', '2025-03-05 09:11:25'),
(18, 15, 'uploads/1741166440_ce4843c0bcbfc049760d.jpg', '2025-03-05 09:20:40'),
(19, 16, 'uploads/1741166484_d70a99575445f780bd78.jpg', '2025-03-05 09:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','processing','shipped','delivered','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_method` enum('cod','bank_transfer','credit_card') NOT NULL,
  `status` enum('pending','paid','failed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `description`, `price`, `stock`, `image`, `created_at`) VALUES
(25, 'Tinh dầu sả chanh', NULL, 'Tinh dầu thiên nhiên giúp thư giãn và xua đuổi côn trùng.', 120000.00, 5000, 'https://sasana.com.vn/product/tinh-dau-chanh-sa-10ml/', '2025-03-05 03:23:51'),
(26, 'Tinh dầu tràm', NULL, 'Tinh dầu nguyên chất giúp kháng khuẩn và hỗ trợ hô hấp.', 150000.00, 40, 'https://www.medigoapp.com/hoat-chat/tinh-dau-tram', '2025-03-05 03:23:51'),
(27, 'Tinh dầu oải hương', NULL, 'Tinh dầu giúp giảm căng thẳng, hỗ trợ giấc ngủ.', 180000.00, 30, 'https://naturesense.vn/san-pham/tinh-dau-hoa-oai-huong-lavender/', '2025-03-05 03:23:51'),
(28, 'Tinh dầu bạc hà', NULL, 'Tinh dầu mang lại cảm giác sảng khoái, giảm đau đầu.', 130000.00, 60, 'https://www.novaco.vn/tinh-dau-bac-ha-dementholized-peppermint-oil-50-s511.html', '2025-03-05 03:23:51'),
(29, 'Tinh dầu cam ngọt', NULL, 'Tinh dầu hương cam tươi mát giúp thư giãn tinh thần.', 110000.00, 70, 'https://thaiduhoa.com/san-pham/tinh-dau-cam-ngot-sweet-orange-oil/', '2025-03-05 03:23:51'),
(30, 'Máy xông tinh dầu siêu âm', NULL, 'Máy khuếch tán tinh dầu công nghệ siêu âm.', 450000.00, 25, 'https://www.thietbidiendgp.vn/products/may-xong-tinh-dau-sieu-am-anh-sao-hong-150ml', '2025-03-05 03:23:51'),
(31, 'Máy khuếch tán gỗ', NULL, 'Máy xông tinh dầu thiết kế vân gỗ sang trọng.', 550000.00, 20, 'https://www.tinhdauhangphan.com/san-pham/may-khuech-tan-tinh-dau-binh-ruou-go/', '2025-03-05 03:23:51'),
(32, 'Máy xông mini USB', NULL, 'Máy xông tinh dầu nhỏ gọn, tiện lợi dùng cổng USB.', 350000.00, 30, 'https://phongvans.com/san-pham/may-khuech-tan-tinh-dau-van-go-hinh-giot-nuoc-mini/', '2025-03-05 03:23:51'),
(33, 'Máy xông tinh dầu cao cấp', NULL, 'Máy xông tinh dầu sang trọng dành cho không gian lớn.', 800000.00, 8, 'https://example.com/images/may-xong-cao-cap.jpg', '2025-03-05 03:23:51'),
(34, 'Tinh dầu sả chanh', NULL, 'Tinh dầu thiên nhiên giúp thư giãn và xua đuổi côn trùng.', 120000.00, 50, 'https://sasana.com.vn/product/tinh-dau-chanh-sa-10ml/', '2025-03-05 03:26:50'),
(35, 'Tinh dầu tràm', NULL, 'Tinh dầu nguyên chất giúp kháng khuẩn và hỗ trợ hô hấp.', 150000.00, 40, 'https://www.medigoapp.com/hoat-chat/tinh-dau-tram', '2025-03-05 03:26:50'),
(36, 'Tinh dầu oải hương', NULL, 'Tinh dầu giúp giảm căng thẳng, hỗ trợ giấc ngủ.', 180000.00, 30, 'https://naturesense.vn/san-pham/tinh-dau-hoa-oai-huong-lavender/', '2025-03-05 03:26:50'),
(37, 'Tinh dầu bạc hà', NULL, 'Tinh dầu mang lại cảm giác sảng khoái, giảm đau đầu.', 130000.00, 60, 'https://www.novaco.vn/tinh-dau-bac-ha-dementholized-peppermint-oil-50-s511.html', '2025-03-05 03:26:50'),
(38, 'Tinh dầu cam ngọt', NULL, 'Tinh dầu hương cam tươi mát giúp thư giãn tinh thần.', 110000.00, 70, 'https://thaiduhoa.com/san-pham/tinh-dau-cam-ngot-sweet-orange-oil/', '2025-03-05 03:26:50'),
(39, 'Máy xông tinh dầu siêu âm', NULL, 'Máy khuếch tán tinh dầu công nghệ siêu âm.', 450000.00, 25, 'https://www.thietbidiendgp.vn/products/may-xong-tinh-dau-sieu-am-anh-sao-hong-150ml', '2025-03-05 03:26:50'),
(40, 'Máy khuếch tán gỗ', NULL, 'Máy xông tinh dầu thiết kế vân gỗ sang trọng.', 550000.00, 20, 'https://www.tinhdauhangphan.com/san-pham/may-khuech-tan-tinh-dau-binh-ruou-go/', '2025-03-05 03:26:50'),
(41, 'Máy xông mini USB', NULL, 'Máy xông tinh dầu nhỏ gọn, tiện lợi dùng cổng USB.', 350000.00, 30, 'https://phongvans.com/san-pham/may-khuech-tan-tinh-dau-van-go-hinh-giot-nuoc-mini/', '2025-03-05 03:26:50'),
(42, 'Tinh dầu quế', NULL, 'Tinh dầu mang lại cảm giác ấm áp, giúp lưu thông máu.', 125000.00, 55, 'https://example.com/images/tinh-dau-que.jpg', '2025-03-05 03:26:50'),
(43, 'Tinh dầu gừng', NULL, 'Tinh dầu giúp giữ ấm cơ thể, tăng cường tuần hoàn.', 140000.00, 45, 'https://example.com/images/tinh-dau-gung.jpg', '2025-03-05 03:26:50'),
(44, 'Máy xông hình giọt nước', NULL, 'Máy khuếch tán tinh dầu thiết kế giọt nước đẹp mắt.', 600000.00, 15, 'https://example.com/images/may-xong-giot-nuoc.jpg', '2025-03-05 03:26:50'),
(45, 'Tinh dầu hoa hồng', NULL, 'Tinh dầu thiên nhiên giúp dưỡng da, làm đẹp.', 200000.00, 25, 'https://example.com/images/tinh-dau-hoa-hong.jpg', '2025-03-05 03:26:50'),
(46, 'Tinh dầu bưởi', NULL, 'Tinh dầu giúp kích thích mọc tóc và giảm stress.', 170000.00, 35, 'https://example.com/images/tinh-dau-buoi.jpg', '2025-03-05 03:26:50'),
(47, 'Máy xông tinh dầu thông minh', NULL, 'Máy khuếch tán thông minh điều khiển từ xa.', 700000.00, 10, 'https://example.com/images/may-xong-thong-minh.jpg', '2025-03-05 03:26:50'),
(48, 'Tinh dầu chanh leo', NULL, 'Tinh dầu giúp thư giãn và giảm căng thẳng.', 130000.00, 40, 'https://example.com/images/tinh-dau-chanh-leo.jpg', '2025-03-05 03:26:50'),
(49, 'Tinh dầu hương thảo', NULL, 'Tinh dầu giúp tăng cường trí nhớ và tập trung.', 160000.00, 30, 'https://example.com/images/tinh-dau-huong-thao.jpg', '2025-03-05 03:26:50'),
(50, 'Máy xông bằng gốm', NULL, 'Máy xông tinh dầu bằng gốm sứ thủ công.', 500000.00, 18, 'https://example.com/images/may-xong-gom.jpg', '2025-03-05 03:26:50'),
(51, 'Tinh dầu gỗ đàn hương', NULL, 'Tinh dầu quý hiếm giúp thư giãn và giảm lo âu.', 250000.00, 20, 'https://example.com/images/tinh-dau-dan-huong.jpg', '2025-03-05 03:26:50'),
(52, 'Máy xông kiêm đèn ngủ', NULL, 'Máy xông tinh dầu tích hợp đèn ngủ dịu nhẹ.', 650000.00, 12, 'https://example.com/images/may-xong-den-ngu.jpg', '2025-03-05 03:26:50'),
(53, 'Tinh dầu thiên nhiên hỗn hợp', NULL, 'Bộ tinh dầu thiên nhiên với nhiều hương thơm khác nhau.', 220000.00, 22, 'https://example.com/images/tinh-dau-hon-hop.jpg', '2025-03-05 03:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('admin','customer') DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `created_at`) VALUES
(1, 'Nguyễn Văn A', 'a@gmail.com', 'hashed_password_here', '0901234567', 'Hà Nội', 'customer', '2025-03-03 10:44:41'),
(2, 'Trần Thị B', 'b@gmail.com', 'hashed_password_here', '0912345678', 'TP HCM', 'admin', '2025-03-03 10:44:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
