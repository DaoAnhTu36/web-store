-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 06:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taphoagi_store_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `created_at`, `user_name`, `is_active`, `created_by`, `updated_by`, `role_id`) VALUES
(15, 'Nguyen Thi Dao', 'nguyenthidao@gmail.com', '$2y$10$dJk8z9JqZUgUC/.Kv3gbhOw.QHnVgtP9gw5rpXR7.zu6ckyUXO9.i', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-17 09:29:51', 'ntd060404', 1, 1, 1, 2),
(17, 'Nguyen Thi Dao', 'nguyenthidao@gmail.com', '$2y$10$WkuwYfIDT55KyHAgajwf1.9gOUOLGwkq5TqiFIzdG0MhMo6a1tZA.', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-17 11:23:29', 'tester1', 1, 1, 1, 1),
(18, 'Tran Van Tu', 'trailangnd96@gmail.com', '$2y$10$rRokxRU1Qp0QLNTep1RaK.Zg7nz8/XabDMmQ0SmGien8ezwhqPwVi', '0975924428', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-18 08:23:40', 'trantu029', 1, 1, 1, 1),
(19, 'Tran Thi My', 'tranmy@gmail.com', '$2y$10$UYCXSKgNsCvfhooCq5NNxe4KLPFXvkd5grt9Ev1tuC5tNO157s6hy', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-18 08:23:47', 'tranmy', 1, 1, 1, 2),
(20, 'Nguyen Thi Dao 2', 'nguyenthidao@gmail.com', '$2y$10$dl0Z.pSsPLqjvgPejLvVUOItarVLexyUo8YURY8gwO0EoR94/QY6S', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-18 08:23:51', 'ntd060404', 1, 1, 1, 1),
(22, 'Tran Van Tuan', 'tuantv19@gmail.com', '$2y$10$S0x/rC0UDzQbdgACumc27.NvuSdvBiMjIcZSXigfc3LJCI7/lXI/m', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-20 03:04:01', 'tuantv19', 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `best_selling_products`
--

CREATE TABLE `best_selling_products` (
  `record_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total_sold` int(11) NOT NULL DEFAULT 0,
  `last_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `is_active`, `created_by`, `updated_by`) VALUES
(3, 'Tinh dầu', '<p><strong>Giới thiệu chung về tinh dầu</strong></p><p>Tinh dầu là chiết xuất từ các loài thực vật thông qua phương pháp chừng cất hơi nước hoặc ép lạnh. Chúng mang đặc tính hương thơm tự nhiên và những lợi ích sức khỏe đối với con người. Tinh dầu được sử dụng rộng rãi trong liệu pháp hương thơm, chăm sóc da, và thư giãn tinh thần.</p><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741326517_2a0f36da3b825fddb234.jpg\"></figure><p><strong>Các loại tinh dầu phổ biến</strong></p><ol><li><strong>Hoa oải hương</strong>: Giúp thư giãn, giảm căng thẳng và hỗ trợ giấc ngủ.</li><li><strong>Hoa hồng</strong>: Hỗ trợ dưỡng da, làm dịu và giảm viêm.</li><li><strong>Chanh vàng</strong>: Tăng cường hệ miễn dịch, thanh lọc không khí.</li><li><strong>Bạc hà</strong>: Tăng tập trung, giảm nghẹt mũi.</li><li><strong>Hoa nhài</strong>: Thư giãn, giảm căng thẳng và hỗ trợ cân bằng cảm xúc.</li><li><strong>Trà xanh</strong>: Giảm vi khuẩn, thanh lọc da.</li><li><strong>Vanilla</strong>: Tạo cảm giác ấm áp, dễ chịu.</li><li><strong>Cà phê</strong>: Giúp tỉnh táo, tăng năng lượng.</li><li><strong>Cam ngọt</strong>: Nâng cao tinh thần, giảm căng thẳng.</li><li><strong>Hoa lan Nam Phi</strong>: Tăng cảm giác thư giãn, hương thơm quyến rũ.</li></ol><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741326523_43b7b888bb5305f6c174.jpg\"></figure><p><strong>Hướng dẫn sử dụng tinh dầu</strong></p><ul><li><strong>Khuếch tán</strong>: Nhỏ vài giọt tinh dầu vào máy khuếch tán hoặc đèn xông tinh dầu.</li><li><strong>Mát-xa</strong>: Pha loãng tinh dầu với dầu dẫn xuất như dầu dừa hoặc dầu hạnh nhân, sau đó thoa lên da.</li><li><strong>Tẩm</strong>: Nhỏ vài giọt tinh dầu vào bồn tắm để giúp thư giãn cơ thể.</li><li><strong>Xít phong</strong>: Pha tinh dầu với nước để xít không gian hoặc lên quần áo.</li></ul><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741326530_9c8ee11aab9619de3844.jpg\"></figure><p><strong>Tại sao nên sử dụng tinh dầu?</strong></p><ol><li><strong>Thư giãn và giảm căng thẳng</strong>: Hương thơm tự nhiên giúp cơ thể và tinh thần thư giãn.</li><li><strong>Cải thiện chất lượng giấc ngủ</strong>: Nhiều loại tinh dầu như oải hương và cây hương thảo có tác dụng giúp dễ dàng đi vào giấc ngủ.</li><li><strong>Tăng tập trung</strong>: Tinh dầu bạc hà, cà phê giúp duy trì sự tỉnh táo và tăng hiệu suất làm việc.</li><li><strong>Từ nhiên và an toàn</strong>: Không chứa hóa chất độc hại như nước hoa hay sản phẩm khác.</li><li><strong>Khửa mùi và thanh lọc không khí</strong>: Cam ngọt, chanh, bạc hà giúp loại bỏ vi khuẩn và mang lại không gian sạch sẽ.</li></ol><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741326535_08e48e3a07757f220c81.jpg\"></figure><p><i><strong>Tinh dầu không chỉ là sản phẩm tự nhiên tuyệt vời cho làn da và tinh thần, mà còn là phương pháp chăm sóc sức khỏe hiệu quả cho cuộc sống hiện đại.</strong></i></p>', '2025-03-07 05:48:57', 1, 1, 1),
(5, 'Máy xông tinh dầu', '<h2>???? <strong>Giới thiệu về Máy Xông Tinh Dầu</strong></h2><p>Máy xông tinh dầu là thiết bị hiện đại, giúp khuếch tán tinh dầu tự nhiên vào không khí, mang lại không gian thơm mát, dễ chịu và thư giãn. Đây là sản phẩm được rất nhiều gia đình, spa, văn phòng và khách sạn yêu thích vì những lợi ích tuyệt vời cho sức khỏe và tinh thần.</p><h2>???? <strong>Công dụng nổi bật của máy xông tinh dầu</strong></h2><p><strong>Làm thơm phòng tự nhiên:</strong><br>Máy khuếch tán mùi hương tinh dầu đều khắp phòng, loại bỏ mùi hôi khó chịu mà không cần dùng hóa chất độc hại.</p><p><strong>Thanh lọc không khí:</strong><br>Một số loại tinh dầu như tràm, sả chanh, bạch đàn còn có khả năng diệt khuẩn, kháng viêm, đuổi muỗi, làm sạch không khí.</p><p><strong>Giảm căng thẳng, stress:</strong><br>Hương thơm dịu nhẹ từ tinh dầu giúp bạn thư giãn, ngủ ngon hơn và giảm mệt mỏi sau một ngày dài làm việc.</p><p><strong>Tạo điểm nhấn thẩm mỹ:</strong><br>Máy xông tinh dầu ngày nay có thiết kế đẹp mắt, sang trọng, phù hợp làm vật trang trí cho không gian sống.</p><h2>???? <strong>Vì sao nên chọn máy xông tinh dầu?</strong></h2><ul><li><strong>Tiết kiệm tinh dầu:</strong> Máy sử dụng công nghệ sóng siêu âm, khuếch tán nhanh, tiết kiệm hơn so với đốt nến truyền thống.</li><li><strong>An toàn:</strong> Không sinh nhiệt, không khói, an toàn tuyệt đối cho trẻ nhỏ và người già.</li><li><strong>Dễ sử dụng:</strong> Chỉ cần vài giọt tinh dầu, đổ nước vào máy và nhấn nút là bạn đã có ngay không gian thơm mát.</li><li><strong>Tích hợp nhiều chức năng:</strong> Một số dòng máy còn có đèn LED đổi màu, hẹn giờ, điều chỉnh chế độ phun sương.</li></ul><h2>???? <strong>Kết luận</strong></h2><p>Máy xông tinh dầu không chỉ giúp mang lại hương thơm dễ chịu mà còn nâng cao chất lượng cuộc sống, bảo vệ sức khỏe. Nếu bạn đang tìm một giải pháp làm thơm và làm sạch không gian sống một cách tự nhiên, an toàn thì máy xông tinh dầu chắc chắn là lựa chọn không thể thiếu.</p>', '2025-03-18 09:47:11', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`, `is_active`, `created_by`, `updated_by`) VALUES
(1, 'Khách hàng X', 'khachX@example.com', '0321654987', 'Hà Nội', '2025-03-15 11:26:09', '2025-03-15 11:26:09', 1, 1, 1),
(2, 'Khách hàng Y', 'khachY@example.com', '0934567890', 'TP. Hồ Chí Minh', '2025-03-15 11:26:09', '2025-03-15 11:26:09', 1, 1, 1),
(3, 'Khách hàng Z', 'khachZ@example.com', '0977888999', 'Đà Nẵng', '2025-03-15 11:26:09', '2025-03-15 11:26:09', 1, 1, 1),
(4, 'Khách hàng A', 'khachA@example.com', '0911223344', 'Hải Phòng', '2025-03-15 11:26:09', '2025-03-15 11:26:09', 1, 1, 1),
(5, 'Khách hàng B', 'khachB@example.com', '0905111222', 'Cần Thơ', '2025-03-15 11:26:09', '2025-03-15 11:26:09', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `record_id`, `image_path`, `created_at`, `type`, `is_active`, `created_by`, `updated_by`) VALUES
(4, 1, 'uploads/1741676926_3fecf6635b801ef0e6a5.png', '2025-03-11 07:08:46', 'product', 1, 1, 1),
(5, 1, 'uploads/1741676926_83dfba630038c97f397d.png', '2025-03-11 07:08:46', 'product', 1, 1, 1),
(6, 2, 'uploads/1741677744_dc1ceedb1df835730d41.png', '2025-03-11 07:22:24', 'product', 1, 1, 1),
(7, 2, 'uploads/1741677744_9e0f590b61be2f825c53.png', '2025-03-11 07:22:24', 'product', 1, 1, 1),
(8, 2, 'uploads/1741677744_c3141a9030e479bc6d94.png', '2025-03-11 07:22:24', 'product', 1, 1, 1),
(9, 2, 'uploads/1741677744_16e2ed307dec44793ffd.png', '2025-03-11 07:22:24', 'product', 1, 1, 1),
(10, 3, 'uploads/1741678051_791f8b4b6f8e6f84165f.png', '2025-03-11 07:27:31', 'category', 1, 1, 1),
(11, 3, 'uploads/1741678051_cd5359979ac10ff24373.png', '2025-03-11 07:27:31', 'product', 1, 1, 1),
(12, 3, 'uploads/1741678051_26acd5a44776de00f709.png', '2025-03-11 07:27:31', 'product', 1, 1, 1),
(13, 3, 'uploads/1741678051_a42f731cba108d4a0a14.png', '2025-03-11 07:27:31', 'product', 1, 1, 1),
(14, 3, 'uploads/1741678051_201f45597ec9b39aca5a.png', '2025-03-11 07:27:31', 'product', 1, 1, 1),
(15, 4, 'uploads/1741678312_b0658de9116f51275a0d.png', '2025-03-11 07:31:52', 'product', 1, 1, 1),
(16, 4, 'uploads/1741678312_570414ad6301d035a413.png', '2025-03-11 07:31:52', 'product', 1, 1, 1),
(17, 5, 'uploads/1741690108_bdbbe88ff41247ba47a5.png', '2025-03-11 10:48:28', 'product', 1, 1, 1),
(18, 5, 'uploads/1741690108_d67ca30be4e10f1440d4.png', '2025-03-11 10:48:28', 'product', 1, 1, 1),
(19, 5, 'uploads/1741690108_58c2e1170a4751110a22.png', '2025-03-11 10:48:28', 'product', 1, 1, 1),
(20, 5, 'uploads/1741690108_da51511e14ad8713bd78.png', '2025-03-11 10:48:28', 'product', 1, 1, 1),
(21, 6, 'uploads/1741748219_9f674a97d192295f4e33.jpg', '2025-03-12 02:56:59', 'product', 1, 1, 1),
(22, 6, 'uploads/1741748219_f498d78490fe70423ad5.jpg', '2025-03-12 02:56:59', 'product', 1, 1, 1),
(23, 6, 'uploads/1741748219_b126e7b5621b4fa7adce.jpg', '2025-03-12 02:56:59', 'product', 1, 1, 1),
(24, 6, 'uploads/1741748219_536e02890dd3cbc350c0.jpg', '2025-03-12 02:56:59', 'product', 1, 1, 1),
(25, 6, 'uploads/1742049404_d2bb1802d67cc8c1af0a.jpg', '2025-03-15 14:36:44', 'supplier', 1, 1, 1),
(26, 6, 'uploads/1742049404_707686375226871dca49.jpg', '2025-03-15 14:36:44', 'supplier', 1, 1, 1),
(29, 12, 'uploads/1742051543_4a0e9264ad48c8a36c99.png', '2025-03-15 15:12:23', 'supplier', 1, 1, 1),
(30, 15, 'uploads/1742052685_8b9ce76b15ba05da5519.png', '2025-03-15 15:31:25', 'supplier', 1, 1, 1),
(31, 16, 'uploads/1742052864_e8541c8e777334ab54d1.jpg', '2025-03-15 15:34:24', 'supplier', 1, 1, 1),
(32, 17, 'uploads/1742053018_cccb8030adfdec4ee9d4.jpg', '2025-03-15 15:36:58', 'supplier', 1, 1, 1),
(33, 18, 'uploads/1742053027_5073003388286187958b.jpg', '2025-03-15 15:37:07', 'supplier', 1, 1, 1),
(34, 19, 'uploads/1742053035_21984120a955ffcb05e6.png', '2025-03-15 15:37:15', 'supplier', 1, 1, 1),
(35, 20, 'uploads/1742053059_6d7ff062df79416a46fc.jpg', '2025-03-15 15:37:39', 'supplier', 1, 1, 1),
(36, 21, 'uploads/1742053065_4176d2a96e2ffd0f391c.jpg', '2025-03-15 15:37:45', 'supplier', 1, 1, 1),
(37, 22, 'uploads/1742053072_81caa956f72f5d9e9bfc.jpg', '2025-03-15 15:37:52', 'supplier', 1, 1, 1),
(38, 23, 'uploads/1742053149_434c258d78b93e64d73c.jpg', '2025-03-15 15:39:09', 'supplier', 1, 1, 1),
(39, 24, 'uploads/1742053220_686d6fdddc044c3d4f0d.jpg', '2025-03-15 15:40:20', 'supplier', 1, 1, 1),
(40, 4, 'uploads/1742192491_f80277c1944e6c5ad25f.jpg', '2025-03-17 06:21:31', 'category', 1, 1, 1),
(41, 7, 'uploads/1742289639_c110752708f5f66a293f.jpg', '2025-03-18 09:20:39', 'product', 1, 1, 1),
(42, 8, 'uploads/1742289776_d9d6ea3750ab2f7c184d.jpg', '2025-03-18 09:22:56', 'product', 1, 1, 1),
(43, 9, 'uploads/1742289913_3467e61dd4a76e7fd1c7.jpg', '2025-03-18 09:25:13', 'product', 1, 1, 1),
(44, 10, 'uploads/1742289940_ae1a31c650d0801aaa45.jpg', '2025-03-18 09:25:40', 'product', 1, 1, 1),
(45, 11, 'uploads/1742290034_43d5e550ee57e6b8a940.jpg', '2025-03-18 09:27:14', 'product', 1, 1, 1),
(46, 12, 'uploads/1742290766_96112a5e30fbba045c00.jpg', '2025-03-18 09:39:26', 'product', 1, 1, 1),
(47, 5, 'uploads/1742291231_334027b321fc5b16c16c.jpg', '2025-03-18 09:47:11', 'category', 1, 1, 1),
(48, 13, 'uploads/1742291294_d903aa761aad8bfebd0d.jpeg', '2025-03-18 09:48:14', 'product', 1, 1, 1),
(49, 14, 'uploads/1742292289_441d1249d9c782631b4d.jpg', '2025-03-18 10:04:49', 'product', 1, 1, 1),
(50, 14, 'uploads/1742292289_4085cd213b025a76e650.jpg', '2025-03-18 10:04:49', 'product', 1, 1, 1),
(51, 14, 'uploads/1742292289_2d859816821881b6ea4b.jpg', '2025-03-18 10:04:49', 'product', 1, 1, 1),
(52, 14, 'uploads/1742292289_e15528ae5080366e20cb.jpg', '2025-03-18 10:04:49', 'product', 1, 1, 1),
(53, 14, 'uploads/1742292289_33515135040b5a093a29.jpg', '2025-03-18 10:04:49', 'product', 1, 1, 1),
(54, 14, 'uploads/1742292289_0312ce601ee802107a52.jpg', '2025-03-18 10:04:49', 'product', 1, 1, 1),
(55, 14, 'uploads/1742292289_c01c634ed30ad08e2ca5.jpg', '2025-03-18 10:04:49', 'product', 1, 1, 1),
(56, 15, 'uploads/1742553894_1c07139a1f7b91ce38b5.jpg', '2025-03-21 10:44:54', 'product', 1, 1, 1),
(57, 16, 'uploads/1742571420_c2893aede11cd9d50cbd.jpg', '2025-03-21 15:37:00', 'product', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `product_attribute_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `last_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_id`, `warehouse_id`, `product_attribute_id`, `quantity`, `last_updated`) VALUES
(1, 16, 1, 6, 150, '2025-03-23 14:10:58'),
(2, 15, 1, 7, 50, '2025-03-23 14:09:59'),
(3, 15, 1, 6, 20, '2025-03-23 14:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','processing','shipped','delivered','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `subtotal` decimal(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_method` enum('cod','bank_transfer','credit_card') NOT NULL,
  `status` enum('pending','paid','failed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `is_active`, `created_by`, `updated_by`, `updated_at`) VALUES
(1, 'Thêm danh mục mới', '2025-03-18 16:20:11', 1, NULL, NULL, '2025-03-19 02:04:36'),
(2, 'Chỉnh sửa danh mục', '2025-03-18 16:21:46', 1, NULL, NULL, '2025-03-19 02:04:36'),
(3, 'Xóa danh mục', '2025-03-19 01:58:27', 1, NULL, NULL, '2025-03-19 02:04:36'),
(4, 'Thêm sản phẩm', '2025-03-19 01:58:42', 1, NULL, NULL, '2025-03-19 02:04:36'),
(5, 'Chỉnh sửa sản phẩm', '2025-03-19 01:58:50', 1, NULL, NULL, '2025-03-19 02:04:36'),
(6, 'Xóa sản phẩm', '2025-03-19 01:58:57', 1, NULL, NULL, '2025-03-19 02:04:36'),
(7, 'Thêm kho hàng', '2025-03-19 01:59:12', 1, NULL, NULL, '2025-03-19 02:04:36'),
(8, 'Chỉnh sửa kho hàng', '2025-03-19 01:59:20', 1, NULL, NULL, '2025-03-19 02:04:36'),
(9, 'Xóa kho hàng', '2025-03-19 01:59:30', 1, NULL, NULL, '2025-03-19 02:04:36'),
(10, 'Thêm giao dịch nhập hàng', '2025-03-19 01:59:39', 1, NULL, NULL, '2025-03-19 02:04:36'),
(11, 'Chỉnh sửa giao dịch nhập hàng', '2025-03-19 01:59:48', 1, NULL, NULL, '2025-03-19 02:04:36'),
(12, 'Xóa giao dịch nhập hàng', '2025-03-19 01:59:54', 1, NULL, NULL, '2025-03-19 02:04:36'),
(13, 'Danh sách đơn hàng', '2025-03-19 02:07:35', 1, NULL, NULL, '2025-03-19 02:08:20'),
(14, 'Xem chi tiết đơn hàng', '2025-03-19 02:09:12', 1, NULL, NULL, '2025-03-19 02:09:12'),
(15, 'Danh sách khách hàng', '2025-03-19 02:09:31', 1, NULL, NULL, '2025-03-19 02:09:31'),
(16, 'Xem chi tiết khách hàng', '2025-03-19 02:09:41', 1, NULL, NULL, '2025-03-19 02:09:41'),
(17, 'Chỉnh sửa thông tin khách hàng', '2025-03-19 02:09:58', 1, NULL, NULL, '2025-03-19 02:09:58'),
(18, 'Xóa khách hàng', '2025-03-19 02:10:05', 1, NULL, NULL, '2025-03-19 02:10:05'),
(19, 'Thêm mới nhà cung cấp', '2025-03-19 02:10:18', 1, NULL, NULL, '2025-03-20 05:17:29'),
(20, 'Lưu chỉnh sửa nhà cung cấp', '2025-03-19 02:10:26', 1, NULL, NULL, '2025-03-20 05:17:12'),
(21, 'Xóa nhà cung cấp', '2025-03-19 02:10:34', 1, NULL, NULL, '2025-03-19 02:10:34'),
(22, 'Thêm tài khoản người dùng', '2025-03-19 02:10:54', 1, NULL, NULL, '2025-03-19 02:17:13'),
(23, 'Chỉnh sửa tài khoản người dùng', '2025-03-19 02:11:00', 1, NULL, NULL, '2025-03-19 02:18:00'),
(24, 'Xóa tài khoản người dùng', '2025-03-19 02:11:09', 1, NULL, NULL, '2025-03-19 02:18:11'),
(25, 'Thay đổi trạng thái danh mục', '2025-03-19 02:13:10', 1, NULL, NULL, '2025-03-19 02:13:10'),
(26, 'Thay đổi trạng thái sản phẩm', '2025-03-19 02:13:14', 1, NULL, NULL, '2025-03-19 02:13:14'),
(27, 'Thay đổi trạng thái kho  hàng', '2025-03-19 02:13:20', 1, NULL, NULL, '2025-03-19 02:13:20'),
(28, 'Thay đổi trạng thái giao dịch nhập', '2025-03-19 02:15:27', 1, NULL, NULL, '2025-03-19 02:15:27'),
(29, 'Thay đổi trạng thái giao dịch xuất hàng', '2025-03-19 02:15:47', 1, NULL, NULL, '2025-03-19 02:23:37'),
(30, 'Thay đổi trạng thái khách hàng', '2025-03-19 02:15:56', 1, NULL, NULL, '2025-03-19 02:15:56'),
(31, 'Thay đổi trạng thái tài khoản người dùng', '2025-03-19 02:16:07', 1, NULL, NULL, '2025-03-19 02:16:30'),
(32, 'Thay đổi trạng thái quản trị viên', '2025-03-19 02:16:37', 1, NULL, NULL, '2025-03-19 02:16:37'),
(33, 'Danh sách cấu hình route của website', '2025-03-20 02:34:33', 1, NULL, NULL, '2025-03-20 03:29:33'),
(34, 'Thêm mới route', '2025-03-20 03:29:40', 1, NULL, NULL, '2025-03-20 03:29:40'),
(35, 'Chi tiết route', '2025-03-20 03:29:50', 1, NULL, NULL, '2025-03-20 03:29:50'),
(36, 'Chỉnh sửa route', '2025-03-20 03:29:58', 1, NULL, NULL, '2025-03-20 03:29:58'),
(37, 'Xóa route', '2025-03-20 03:30:04', 1, NULL, NULL, '2025-03-20 03:30:04'),
(38, 'Trang chủ dashboard', '2025-03-20 04:25:26', 1, NULL, NULL, '2025-03-20 04:25:26'),
(39, 'Xem danh sách tài khoản', '2025-03-20 04:33:10', 1, NULL, NULL, '2025-03-20 04:33:10'),
(40, 'Trang chủ website bán hàng', '2025-03-20 04:36:30', 1, NULL, NULL, '2025-03-20 04:36:30'),
(41, 'Quản lý file(ảnh, tệp tin,...)', '2025-03-20 04:37:34', 1, NULL, NULL, '2025-03-20 04:37:34'),
(42, 'Trang administrator', '2025-03-20 04:42:32', 1, NULL, NULL, '2025-03-20 04:42:32'),
(43, 'Đổi ngôn ngữ', '2025-03-20 04:43:25', 1, NULL, NULL, '2025-03-20 04:43:25'),
(44, 'Các function common', '2025-03-20 04:45:57', 1, NULL, NULL, '2025-03-20 04:45:57'),
(45, 'Nhóm kho hàng', '2025-03-20 04:46:37', 1, NULL, NULL, '2025-03-20 04:46:37'),
(46, 'Xem danh sách kho hàng', '2025-03-20 04:47:11', 1, NULL, NULL, '2025-03-20 04:47:11'),
(47, 'Xem thông tin chi tiết kho hàng', '2025-03-20 04:49:44', 1, NULL, NULL, '2025-03-20 04:49:44'),
(48, 'Nhóm sản phẩm, hàng hóa', '2025-03-20 04:51:50', 1, NULL, NULL, '2025-03-20 04:51:50'),
(49, 'Danh sách sản phẩm, hàng hóa', '2025-03-20 04:52:30', 1, NULL, NULL, '2025-03-20 04:52:30'),
(50, 'Lưu sản phẩm, hàng hóa mới', '2025-03-20 04:53:41', 1, NULL, NULL, '2025-03-20 04:53:41'),
(51, 'Xem thông tin chi tiết sản phẩm, hàng hóa', '2025-03-20 04:54:42', 1, NULL, NULL, '2025-03-20 04:54:42'),
(52, 'Xem danh sách sản phẩm bán chạy', '2025-03-20 05:03:02', 1, NULL, NULL, '2025-03-20 05:03:02'),
(53, 'Xem danh sách quản lý giá sản phẩm, hàng hóa', '2025-03-20 05:03:29', 1, NULL, NULL, '2025-03-20 05:03:29'),
(54, 'Danh sách sản phẩm có khuyến mại, giảm giá', '2025-03-20 05:03:44', 1, NULL, NULL, '2025-03-20 05:03:44'),
(55, 'Nhóm danh mục sản phẩm', '2025-03-20 05:05:04', 1, NULL, NULL, '2025-03-20 05:05:04'),
(56, 'Xem danh sách danh mục sản phẩm', '2025-03-20 05:05:30', 1, NULL, NULL, '2025-03-20 11:46:41'),
(57, 'Xem chi tiết danh mục hàng hóa sản phẩm', '2025-03-20 05:05:57', 1, NULL, NULL, '2025-03-20 05:05:57'),
(58, 'Lưu danh mục mới', '2025-03-20 05:06:59', 1, NULL, NULL, '2025-03-20 05:06:59'),
(59, 'Nhóm đơn hàng', '2025-03-20 05:07:56', 1, NULL, NULL, '2025-03-20 05:07:56'),
(60, 'Nhóm giao dịch', '2025-03-20 05:08:09', 1, NULL, NULL, '2025-03-20 05:08:09'),
(61, 'Lưu giao dịch mới', '2025-03-20 05:09:41', 1, NULL, NULL, '2025-03-20 05:09:41'),
(62, 'Xem chi tiết giao dịch', '2025-03-20 05:10:03', 1, NULL, NULL, '2025-03-20 05:10:03'),
(63, 'Xem danh sách giao dịch nhập hàng', '2025-03-20 05:11:00', 1, NULL, NULL, '2025-03-20 05:11:00'),
(64, 'Xem danh sách giao dịch xuất hàng', '2025-03-20 05:11:10', 1, NULL, NULL, '2025-03-20 05:11:10'),
(65, 'Nhóm nhà cung cấp', '2025-03-20 05:16:28', 1, NULL, NULL, '2025-03-20 05:16:28'),
(66, 'Lưu nhà cung cấp', '2025-03-20 05:17:45', 1, NULL, NULL, '2025-03-20 05:21:22'),
(67, 'Xem danh sách nhà cung cấp', '2025-03-20 05:21:59', 1, NULL, NULL, '2025-03-20 05:21:59'),
(68, 'Xem chi tiết nhà cung cấp', '2025-03-20 05:23:05', 1, NULL, NULL, '2025-03-20 05:23:05'),
(69, 'Nhóm khách hàng', '2025-03-20 05:24:27', 1, NULL, NULL, '2025-03-20 05:24:27'),
(70, 'Xem danh sách khác hàng', '2025-03-20 05:24:43', 1, NULL, NULL, '2025-03-20 05:24:43'),
(71, 'Lưu thông tin khách hàng', '2025-03-20 05:25:07', 1, NULL, NULL, '2025-03-20 05:25:07'),
(72, 'Lưu chỉnh sửa thông tin khách hàng', '2025-03-20 05:25:25', 1, NULL, NULL, '2025-03-20 05:25:25'),
(73, 'Thêm mới khách hàng', '2025-03-20 05:27:37', 1, NULL, NULL, '2025-03-20 05:27:37'),
(74, 'Nhóm tài khoản', '2025-03-20 06:14:59', 1, NULL, NULL, '2025-03-20 06:14:59'),
(75, 'Danh sách admin', '2025-03-20 06:16:02', 1, NULL, NULL, '2025-03-20 06:17:24'),
(76, 'Thêm mới admin', '2025-03-20 06:17:34', 1, NULL, NULL, '2025-03-20 06:17:34'),
(77, 'Lưu thông tin admin', '2025-03-20 06:17:44', 1, NULL, NULL, '2025-03-20 06:17:49'),
(78, 'Xem thông tin admin', '2025-03-20 06:17:59', 1, NULL, NULL, '2025-03-20 06:17:59'),
(79, 'Lưu chỉnh sửa thông tin admin', '2025-03-20 06:18:10', 1, NULL, NULL, '2025-03-20 06:18:10'),
(80, 'Xóa admin', '2025-03-20 06:18:18', 1, NULL, NULL, '2025-03-20 06:18:18'),
(81, 'Nhóm chức vụ', '2025-03-20 06:24:28', 1, NULL, NULL, '2025-03-20 06:24:28'),
(82, 'Xem danh sách vai trò, chức vụ', '2025-03-20 06:25:18', 1, NULL, NULL, '2025-03-20 06:25:18'),
(83, 'Thêm vai trò, chức vụ', '2025-03-20 06:28:07', 1, NULL, NULL, '2025-03-20 06:28:07'),
(84, 'Lưu thông tin vai trò, chức vụ', '2025-03-20 06:29:25', 1, NULL, NULL, '2025-03-20 06:29:25'),
(85, 'Xem chi tiết vai trò, chức vụ', '2025-03-20 06:29:34', 1, NULL, NULL, '2025-03-20 06:29:34'),
(86, 'Lưu chỉnh sửa vai trò, chức vụ', '2025-03-20 06:29:40', 1, NULL, NULL, '2025-03-20 06:29:40'),
(87, 'Xóa vai trò, chức vụ', '2025-03-20 06:29:44', 1, NULL, NULL, '2025-03-20 06:29:44'),
(88, 'Danh sách quyền', '2025-03-20 06:54:04', 1, NULL, NULL, '2025-03-20 06:54:04'),
(89, 'Thêm mới quyền', '2025-03-20 06:54:08', 1, NULL, NULL, '2025-03-20 06:54:08'),
(90, 'Lưu quyền mới', '2025-03-20 06:54:18', 1, NULL, NULL, '2025-03-20 06:54:18'),
(91, 'Xem chi tiết quyền', '2025-03-20 06:54:26', 1, NULL, NULL, '2025-03-20 06:54:26'),
(92, 'Lưu chỉnh sử thông tin quyền', '2025-03-20 06:54:33', 1, NULL, NULL, '2025-03-20 06:54:33'),
(93, 'Xóa quyền', '2025-03-20 06:54:37', 1, NULL, NULL, '2025-03-20 06:54:37'),
(94, 'Nhóm quyền', '2025-03-20 06:55:06', 1, NULL, NULL, '2025-03-20 06:55:06'),
(95, 'Nhóm chức vụ và quyền', '2025-03-20 06:56:55', 1, NULL, NULL, '2025-03-20 06:56:55'),
(96, 'Danh sách chức vụ và quyền', '2025-03-20 06:57:04', 1, NULL, NULL, '2025-03-20 06:57:04'),
(97, 'Thêm mới chức vụ và quyền', '2025-03-20 06:57:08', 1, NULL, NULL, '2025-03-20 06:57:08'),
(98, 'Lưu thông tin chức vụ và quyền', '2025-03-20 06:57:12', 1, NULL, NULL, '2025-03-20 06:57:12'),
(99, 'Xem chi tiết chức vụ và quyền', '2025-03-20 06:57:28', 1, NULL, NULL, '2025-03-20 06:57:28'),
(100, 'Lưu chỉnh sửa thông tin chức vụ và quyền', '2025-03-20 06:57:36', 1, NULL, NULL, '2025-03-20 06:57:36'),
(101, 'Xóa chức vụ và quyền', '2025-03-20 06:57:40', 1, NULL, NULL, '2025-03-20 06:57:40'),
(102, 'Thay đổi trạng thái bảng role_permission', '2025-03-20 07:00:35', 1, NULL, NULL, '2025-03-20 07:00:35'),
(103, 'Nhóm cấu hình route', '2025-03-20 07:01:10', 1, NULL, NULL, '2025-03-20 07:01:10'),
(104, 'Lưu thông tin của route', '2025-03-20 07:01:37', 1, NULL, NULL, '2025-03-20 07:01:37'),
(105, 'Nhóm đơn hàng', '2025-03-20 07:01:59', 1, NULL, NULL, '2025-03-20 07:01:59'),
(106, 'Xem danh sách đơn hàng', '2025-03-20 07:02:26', 1, NULL, NULL, '2025-03-20 07:02:26'),
(107, 'Thay đổi trạng thái is_active của các bảng', '2025-03-20 07:03:34', 1, NULL, NULL, '2025-03-20 07:03:34'),
(108, 'Danh sách thuộc tính sản phẩm', '2025-03-21 05:49:51', 1, NULL, NULL, '2025-03-21 05:49:51'),
(109, 'Tạo mới thuộc tính sản phẩm', '2025-03-21 05:50:01', 1, NULL, NULL, '2025-03-21 05:50:01'),
(110, 'Lưu thông tin thuộc tính sản phẩm mới', '2025-03-21 05:50:10', 1, NULL, NULL, '2025-03-21 05:50:10'),
(111, 'Chi tiết thuộc tính sản phẩm', '2025-03-21 05:50:16', 1, NULL, NULL, '2025-03-21 05:50:16'),
(112, 'Lưu thông tinh sửa đổi thuộc tính sản phẩm', '2025-03-21 05:50:24', 1, NULL, NULL, '2025-03-21 05:50:24'),
(113, 'Xóa thuộc tính sản phẩm', '2025-03-21 05:50:28', 1, NULL, NULL, '2025-03-21 05:50:28'),
(114, 'Nhóm thuộc tính sản phẩm', '2025-03-21 06:03:44', 1, NULL, NULL, '2025-03-21 06:03:44'),
(115, 'Lưu thông tin kho hàng mới', '2025-03-21 07:03:35', 1, NULL, NULL, '2025-03-21 07:03:35'),
(116, 'Lấy thông tin thuộc tính sản phẩm hàng hóa', '2025-03-21 15:20:01', 1, NULL, NULL, '2025-03-21 15:20:01'),
(117, 'Lịch sử giá sản phẩm hàng hóa', '2025-03-23 14:35:06', 1, NULL, NULL, '2025-03-23 14:35:06'),
(118, 'Thiết lập giá sản phẩm, hàng hóa', '2025-03-23 15:08:34', 1, NULL, NULL, '2025-03-23 15:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `image`, `created_at`, `is_active`, `created_by`, `updated_by`) VALUES
(15, 'Tinh dầu hương bạc hà', 3, 'uploads/1742553894_1c07139a1f7b91ce38b5.jpg', '2025-03-21 10:44:54', 1, 17, 17),
(16, 'Tinh dầu hương hoa hồng', 3, 'uploads/1742571420_c2893aede11cd9d50cbd.jpg', '2025-03-21 15:37:00', 1, 17, 17);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(11) NOT NULL,
  `attribute_name` varchar(50) NOT NULL,
  `attribute_value` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `attribute_name`, `attribute_value`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Size', 'S', 1, 1, '2025-03-21 13:10:51', 1, '2025-03-21 13:12:52'),
(2, 'Size', 'M', 1, 1, '2025-03-21 13:10:51', 1, '2025-03-21 13:10:51'),
(3, 'Size', 'L', 1, 1, '2025-03-21 13:10:51', 1, '2025-03-21 13:10:51'),
(4, 'Size', 'XL', 1, 1, '2025-03-21 13:10:51', 1, '2025-03-21 13:10:51'),
(5, 'Size', 'XXL', 1, 1, '2025-03-21 13:10:51', 1, '2025-03-21 13:10:51'),
(6, 'Volume', '10ml', 1, 1, '2025-03-21 13:10:51', 1, '2025-03-21 13:10:51'),
(7, 'Volume', '50ml', 1, 1, '2025-03-21 13:10:51', 1, '2025-03-21 13:10:51'),
(8, 'Volume', '75ml', 1, 1, '2025-03-21 13:10:51', 1, '2025-03-21 13:10:51'),
(9, 'Color', 'Red', 1, 1, '2025-03-21 13:10:51', 1, '2025-03-21 13:10:51'),
(10, 'Color', 'Blue', 1, 1, '2025-03-21 13:10:51', 1, '2025-03-21 13:10:51'),
(11, 'Color', 'Green', 1, 1, '2025-03-21 13:10:51', 1, '2025-03-21 13:10:51'),
(12, 'Material', 'Cotton', 1, 1, '2025-03-21 13:10:51', 1, '2025-03-21 13:10:51'),
(13, 'Material', 'Polyester', 1, 1, '2025-03-21 13:10:51', 1, '2025-03-21 13:10:51'),
(14, 'Material', 'Leather', 1, 1, '2025-03-21 13:10:51', 1, '2025-03-21 13:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_values`
--

CREATE TABLE `product_attribute_values` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_attribute_values`
--

INSERT INTO `product_attribute_values` (`id`, `product_id`, `attribute_id`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 15, 6, 1, 17, '2025-03-21 10:44:54', 17, '2025-03-21 10:44:54'),
(2, 15, 7, 1, 17, '2025-03-21 10:44:54', 17, '2025-03-21 10:44:54'),
(3, 15, 8, 1, 17, '2025-03-21 10:44:54', 17, '2025-03-21 10:44:54'),
(4, 16, 6, 1, 17, '2025-03-21 15:37:00', 17, '2025-03-21 15:37:00'),
(5, 16, 7, 1, 17, '2025-03-21 15:37:00', 17, '2025-03-21 15:37:00'),
(6, 16, 8, 1, 17, '2025-03-21 15:37:00', 17, '2025-03-21 15:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_discounts`
--

CREATE TABLE `product_discounts` (
  `discount_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `discount_type` enum('percentage','fixed') NOT NULL,
  `discount_value` decimal(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_prices`
--

CREATE TABLE `product_prices` (
  `price_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_prices`
--

INSERT INTO `product_prices` (`price_id`, `product_id`, `price`, `start_date`, `end_date`, `created_at`, `is_active`, `created_by`, `updated_by`) VALUES
(1, 16, 25000.00, '0000-00-00', NULL, '2025-03-23 15:18:13', 1, 17, 17),
(2, 15, 20000.00, '0000-00-00', NULL, '2025-03-23 15:19:32', 1, 17, 17);

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `is_active`, `created_by`, `updated_by`, `updated_at`) VALUES
(1, 'Quản lý cấp cao', '2025-03-18 14:18:22', 1, NULL, NULL, '2025-03-19 02:04:36'),
(2, 'Nhân viên bán hàng', '2025-03-18 14:18:37', 1, NULL, NULL, '2025-03-19 02:04:36'),
(3, 'Nhân viên kho', '2025-03-18 14:42:03', 1, NULL, NULL, '2025-03-19 02:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `is_active`, `created_by`, `updated_by`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(2, 1, 2, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(3, 1, 3, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(4, 1, 4, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(5, 1, 5, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(6, 1, 6, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(7, 1, 7, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(8, 1, 8, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(9, 1, 9, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(10, 1, 10, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(11, 1, 11, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(12, 1, 12, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(13, 1, 13, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(14, 1, 14, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(15, 1, 15, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(16, 1, 16, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(17, 1, 17, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(18, 1, 18, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(19, 1, 19, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(20, 1, 20, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(21, 1, 21, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(22, 1, 22, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(23, 1, 23, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(24, 1, 24, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(25, 1, 25, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(26, 1, 26, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(27, 1, 27, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(28, 1, 28, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(29, 1, 29, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(30, 1, 30, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(31, 1, 31, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(32, 1, 32, 1, NULL, NULL, '2025-03-19 02:45:12', '2025-03-19 02:47:47'),
(33, 2, 4, 1, NULL, NULL, '2025-03-19 02:49:17', '2025-03-19 02:49:17'),
(34, 2, 10, 0, NULL, NULL, '2025-03-20 12:41:16', '2025-03-20 12:41:16'),
(35, 2, 13, 1, NULL, NULL, '2025-03-19 02:49:18', '2025-03-19 02:49:18'),
(36, 2, 14, 1, NULL, NULL, '2025-03-19 02:49:18', '2025-03-19 02:49:18'),
(37, 2, 15, 1, NULL, NULL, '2025-03-19 02:49:18', '2025-03-19 02:49:18'),
(38, 2, 16, 1, NULL, NULL, '2025-03-19 02:49:18', '2025-03-19 02:49:18'),
(39, 2, 19, 1, NULL, NULL, '2025-03-19 02:49:18', '2025-03-19 02:49:18'),
(68, 3, 7, 1, NULL, NULL, '2025-03-19 06:35:11', '2025-03-19 06:35:11'),
(69, 3, 8, 1, NULL, NULL, '2025-03-19 06:35:12', '2025-03-19 06:35:12'),
(70, 1, 33, 1, NULL, NULL, '2025-03-20 03:27:59', '2025-03-20 03:27:59'),
(71, 1, 34, 1, NULL, NULL, '2025-03-20 03:30:25', '2025-03-20 03:30:25'),
(72, 1, 35, 1, NULL, NULL, '2025-03-20 04:22:45', '2025-03-20 04:22:45'),
(73, 1, 36, 1, NULL, NULL, '2025-03-20 04:22:45', '2025-03-20 04:22:45'),
(74, 1, 37, 1, NULL, NULL, '2025-03-20 04:22:46', '2025-03-20 04:22:46'),
(75, 1, 38, 1, NULL, NULL, '2025-03-20 04:25:37', '2025-03-20 04:25:37'),
(76, 2, 38, 1, NULL, NULL, '2025-03-20 04:27:41', '2025-03-20 04:27:41'),
(77, 3, 38, 1, NULL, NULL, '2025-03-20 04:27:54', '2025-03-20 04:27:54'),
(78, 1, 39, 1, NULL, NULL, '2025-03-20 04:33:18', '2025-03-20 04:33:18'),
(79, 1, 40, 1, NULL, NULL, '2025-03-20 04:36:37', '2025-03-20 04:36:37'),
(80, 1, 41, 1, NULL, NULL, '2025-03-20 04:37:45', '2025-03-20 04:37:45'),
(81, 1, 42, 1, NULL, NULL, '2025-03-20 04:42:43', '2025-03-20 04:42:43'),
(82, 1, 43, 1, NULL, NULL, '2025-03-20 04:43:32', '2025-03-20 04:43:32'),
(83, 1, 44, 1, NULL, NULL, '2025-03-20 04:46:03', '2025-03-20 04:46:03'),
(84, 1, 45, 1, NULL, NULL, '2025-03-20 04:47:27', '2025-03-20 04:47:27'),
(85, 1, 46, 1, NULL, NULL, '2025-03-20 04:47:27', '2025-03-20 04:47:27'),
(86, 1, 47, 1, NULL, NULL, '2025-03-20 04:49:52', '2025-03-20 04:49:52'),
(87, 1, 51, 1, NULL, NULL, '2025-03-20 05:03:51', '2025-03-20 05:03:51'),
(88, 1, 52, 1, NULL, NULL, '2025-03-20 05:03:52', '2025-03-20 05:03:52'),
(89, 1, 53, 1, NULL, NULL, '2025-03-20 05:03:52', '2025-03-20 05:03:52'),
(90, 1, 54, 1, NULL, NULL, '2025-03-20 05:03:52', '2025-03-20 05:03:52'),
(91, 1, 48, 1, NULL, NULL, '2025-03-20 05:03:55', '2025-03-20 05:03:55'),
(92, 1, 49, 1, NULL, NULL, '2025-03-20 05:03:55', '2025-03-20 05:03:55'),
(93, 1, 50, 1, NULL, NULL, '2025-03-20 05:03:56', '2025-03-20 05:03:56'),
(94, 1, 55, 1, NULL, NULL, '2025-03-20 07:05:05', '2025-03-20 07:05:05'),
(95, 1, 56, 1, NULL, NULL, '2025-03-20 07:05:05', '2025-03-20 07:05:05'),
(96, 1, 57, 1, NULL, NULL, '2025-03-20 07:05:05', '2025-03-20 07:05:05'),
(97, 1, 58, 1, NULL, NULL, '2025-03-20 07:05:06', '2025-03-20 07:05:06'),
(98, 1, 59, 1, NULL, NULL, '2025-03-20 07:05:07', '2025-03-20 07:05:07'),
(99, 1, 60, 1, NULL, NULL, '2025-03-20 07:05:07', '2025-03-20 07:05:07'),
(100, 1, 61, 1, NULL, NULL, '2025-03-20 07:05:10', '2025-03-20 07:05:10'),
(101, 1, 62, 1, NULL, NULL, '2025-03-20 07:05:10', '2025-03-20 07:05:10'),
(102, 1, 63, 1, NULL, NULL, '2025-03-20 07:05:10', '2025-03-20 07:05:10'),
(103, 1, 64, 1, NULL, NULL, '2025-03-20 07:05:11', '2025-03-20 07:05:11'),
(104, 1, 65, 1, NULL, NULL, '2025-03-20 07:05:11', '2025-03-20 07:05:11'),
(105, 1, 66, 1, NULL, NULL, '2025-03-20 07:05:11', '2025-03-20 07:05:11'),
(106, 1, 67, 1, NULL, NULL, '2025-03-20 07:05:12', '2025-03-20 07:05:12'),
(107, 1, 68, 1, NULL, NULL, '2025-03-20 07:05:13', '2025-03-20 07:05:13'),
(108, 1, 69, 1, NULL, NULL, '2025-03-20 07:05:14', '2025-03-20 07:05:14'),
(109, 1, 70, 1, NULL, NULL, '2025-03-20 07:05:14', '2025-03-20 07:05:14'),
(110, 1, 80, 1, NULL, NULL, '2025-03-20 07:05:16', '2025-03-20 07:05:16'),
(111, 1, 79, 1, NULL, NULL, '2025-03-20 07:05:16', '2025-03-20 07:05:16'),
(112, 1, 78, 1, NULL, NULL, '2025-03-20 07:05:16', '2025-03-20 07:05:16'),
(113, 1, 77, 1, NULL, NULL, '2025-03-20 07:05:17', '2025-03-20 07:05:17'),
(114, 1, 76, 1, NULL, NULL, '2025-03-20 07:05:17', '2025-03-20 07:05:17'),
(115, 1, 75, 1, NULL, NULL, '2025-03-20 07:05:18', '2025-03-20 07:05:18'),
(116, 1, 74, 1, NULL, NULL, '2025-03-20 07:05:19', '2025-03-20 07:05:19'),
(117, 1, 73, 1, NULL, NULL, '2025-03-20 07:05:19', '2025-03-20 07:05:19'),
(118, 1, 72, 1, NULL, NULL, '2025-03-20 07:05:20', '2025-03-20 07:05:20'),
(119, 1, 71, 1, NULL, NULL, '2025-03-20 07:05:21', '2025-03-20 07:05:21'),
(120, 1, 90, 1, NULL, NULL, '2025-03-20 07:05:24', '2025-03-20 07:05:24'),
(121, 1, 89, 1, NULL, NULL, '2025-03-20 07:05:24', '2025-03-20 07:05:24'),
(122, 1, 88, 1, NULL, NULL, '2025-03-20 07:05:24', '2025-03-20 07:05:24'),
(123, 1, 87, 1, NULL, NULL, '2025-03-20 07:05:25', '2025-03-20 07:05:25'),
(124, 1, 86, 1, NULL, NULL, '2025-03-20 07:05:26', '2025-03-20 07:05:26'),
(125, 1, 85, 1, NULL, NULL, '2025-03-20 07:05:26', '2025-03-20 07:05:26'),
(126, 1, 84, 1, NULL, NULL, '2025-03-20 07:05:27', '2025-03-20 07:05:27'),
(127, 1, 83, 1, NULL, NULL, '2025-03-20 07:05:28', '2025-03-20 07:05:28'),
(128, 1, 82, 1, NULL, NULL, '2025-03-20 07:05:28', '2025-03-20 07:05:28'),
(129, 1, 81, 1, NULL, NULL, '2025-03-20 07:05:29', '2025-03-20 07:05:29'),
(130, 1, 100, 1, NULL, NULL, '2025-03-20 07:05:31', '2025-03-20 07:05:31'),
(131, 1, 99, 1, NULL, NULL, '2025-03-20 07:05:32', '2025-03-20 07:05:32'),
(132, 1, 98, 1, NULL, NULL, '2025-03-20 07:05:32', '2025-03-20 07:05:32'),
(133, 1, 97, 1, NULL, NULL, '2025-03-20 07:05:33', '2025-03-20 07:05:33'),
(134, 1, 96, 1, NULL, NULL, '2025-03-20 07:05:33', '2025-03-20 07:05:33'),
(135, 1, 95, 1, NULL, NULL, '2025-03-20 07:05:34', '2025-03-20 07:05:34'),
(136, 1, 92, 1, NULL, NULL, '2025-03-20 07:05:35', '2025-03-20 07:05:35'),
(137, 1, 93, 1, NULL, NULL, '2025-03-20 07:05:35', '2025-03-20 07:05:35'),
(138, 1, 94, 1, NULL, NULL, '2025-03-20 07:05:36', '2025-03-20 07:05:36'),
(139, 1, 91, 1, NULL, NULL, '2025-03-20 07:05:36', '2025-03-20 07:05:36'),
(140, 1, 107, 1, NULL, NULL, '2025-03-20 07:05:39', '2025-03-20 07:05:39'),
(141, 1, 106, 1, NULL, NULL, '2025-03-20 07:05:40', '2025-03-20 07:05:40'),
(142, 1, 105, 1, NULL, NULL, '2025-03-20 07:05:40', '2025-03-20 07:05:40'),
(143, 1, 104, 1, NULL, NULL, '2025-03-20 07:05:41', '2025-03-20 07:05:41'),
(144, 1, 103, 1, NULL, NULL, '2025-03-20 07:05:41', '2025-03-20 07:05:41'),
(145, 1, 102, 1, NULL, NULL, '2025-03-20 07:05:42', '2025-03-20 07:05:42'),
(146, 1, 101, 1, NULL, NULL, '2025-03-20 07:05:42', '2025-03-20 07:05:42'),
(147, 2, 49, 1, NULL, NULL, '2025-03-20 07:19:56', '2025-03-20 07:19:56'),
(148, 2, 1, 1, NULL, NULL, '2025-03-20 11:43:34', '2025-03-20 11:43:34'),
(149, 2, 56, 1, NULL, NULL, '2025-03-20 11:43:53', '2025-03-20 11:43:53'),
(150, 2, 69, 1, NULL, NULL, '2025-03-20 12:44:17', '2025-03-20 12:44:17'),
(151, 1, 113, 1, NULL, NULL, '2025-03-21 05:50:37', '2025-03-21 05:50:37'),
(152, 1, 112, 1, NULL, NULL, '2025-03-21 05:50:37', '2025-03-21 05:50:37'),
(153, 1, 111, 1, NULL, NULL, '2025-03-21 05:50:38', '2025-03-21 05:50:38'),
(154, 1, 110, 1, NULL, NULL, '2025-03-21 05:50:40', '2025-03-21 05:50:40'),
(155, 1, 109, 1, NULL, NULL, '2025-03-21 05:50:40', '2025-03-21 05:50:40'),
(156, 1, 108, 1, NULL, NULL, '2025-03-21 05:50:40', '2025-03-21 05:50:40'),
(157, 1, 115, 1, NULL, NULL, '2025-03-21 07:04:34', '2025-03-21 07:04:34'),
(158, 1, 114, 1, NULL, NULL, '2025-03-21 07:04:35', '2025-03-21 07:04:35'),
(159, 1, 116, 1, NULL, NULL, '2025-03-21 15:20:09', '2025-03-21 15:20:09'),
(160, 1, 117, 1, NULL, NULL, '2025-03-23 14:35:14', '2025-03-23 14:35:14'),
(161, 1, 118, 1, NULL, NULL, '2025-03-23 15:08:41', '2025-03-23 15:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `method` varchar(10) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `controller` varchar(255) NOT NULL,
  `filters` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_group` tinyint(4) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `method`, `uri`, `controller`, `filters`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`, `is_group`, `parent_id`, `level`, `permission_id`) VALUES
(98, '', 'admin', '', '', '2025-03-19 08:52:25', '2025-03-20 04:43:04', '17', '17', 1, 1, NULL, 1, 42),
(99, 'GET', '', 'Admin\\DashboardController::index', '', '2025-03-19 08:56:17', '2025-03-20 04:26:00', '17', '17', 1, NULL, 98, 2, 38),
(100, 'GET', 'dashboard', 'Admin\\DashboardController::index', 'DashboardControllerIndex', '2025-03-19 08:56:43', '2025-03-20 04:26:12', '17', '17', 1, NULL, 98, 2, 38),
(101, 'GET', 'language/(:segment)', 'Admin\\LanguageController::switch/$1', '', '2025-03-19 08:57:01', '2025-03-20 04:43:47', '17', '17', 1, NULL, 98, 2, 43),
(102, '', 'common', '', '', '2025-03-19 08:57:21', '2025-03-20 04:46:10', '17', '17', 1, 1, 98, 2, 44),
(103, '', 'warehouse', '', '', '2025-03-19 08:57:39', '2025-03-20 04:47:56', '17', '17', 1, 1, 98, 2, 45),
(104, 'GET', '', 'Admin\\WarehouseController::index', '', '2025-03-19 08:59:21', '2025-03-20 04:48:15', '17', '17', 1, NULL, 103, 3, 46),
(105, 'GET', 'create', 'Admin\\WarehouseController::create', '', '2025-03-19 08:59:58', '2025-03-20 04:48:30', '17', '17', 1, NULL, 103, 3, 7),
(106, 'POST', 'save', 'Admin\\WarehouseController::save', '', '2025-03-19 09:00:10', '2025-03-21 10:01:35', '17', '17', 1, NULL, 103, 3, 115),
(107, 'GET', 'detail/(:num)', 'Admin\\WarehouseController::detail/$1', '', '2025-03-19 09:00:52', '2025-03-20 04:50:06', '17', '17', 1, NULL, 103, 3, 47),
(108, 'POST', 'update/(:num)', 'Admin\\WarehouseController::update/$1', '', '2025-03-19 09:01:07', '2025-03-20 04:50:22', '17', '17', 1, NULL, 103, 3, 8),
(109, 'GET', 'delete/(:num)', 'Admin\\WarehouseController::delete/$1', '', '2025-03-19 09:01:42', '2025-03-20 04:50:32', '17', '17', 1, NULL, 103, 3, 9),
(110, '', 'product', '', '', '2025-03-19 09:02:46', '2025-03-20 04:52:54', '17', '17', 1, 1, 98, 2, 48),
(111, 'GET', '', 'Admin\\ProductController::index', '', '2025-03-19 09:03:01', '2025-03-20 04:53:02', '17', '17', 1, NULL, 110, 3, 49),
(112, 'GET', 'index', 'Admin\\ProductController::index', '', '2025-03-19 09:03:22', '2025-03-20 04:53:08', '17', '17', 1, NULL, 110, 3, 49),
(113, 'GET', 'create', 'Admin\\ProductController::create', '', '2025-03-19 09:03:33', '2025-03-20 04:53:53', '17', '17', 1, NULL, 110, 3, 4),
(114, 'POST', 'save', 'Admin\\ProductController::save', '', '2025-03-19 09:03:51', '2025-03-21 10:01:57', '17', '17', 1, NULL, 110, 3, 50),
(115, 'GET', 'detail/(:num)', 'Admin\\ProductController::detail/$1', '', '2025-03-19 09:04:15', '2025-03-21 05:34:19', '17', '17', 1, NULL, 110, 3, 51),
(116, 'POST', 'update/(:num)', 'Admin\\WarehouseController::update/$1', '', '2025-03-19 09:04:27', '2025-03-21 09:59:32', '17', '17', 1, NULL, 110, 3, 8),
(124, 'POST', 'update/(:num)', 'Admin\\ProductController::update/$1', '', '2025-03-19 09:08:25', '2025-03-20 05:02:31', '17', '17', 1, NULL, 110, 3, 5),
(125, 'GET', 'delete/(:num)', 'Admin\\ProductController::delete/$1', '', '2025-03-19 09:08:40', '2025-03-23 16:15:35', '17', '17', 1, NULL, 110, 3, 6),
(126, 'GET', 'best-selling-management', 'Admin\\ProductController::bestSellingProduct', '', '2025-03-19 09:08:50', '2025-03-20 05:04:16', '17', '17', 1, NULL, 110, 3, 52),
(127, 'GET', 'price-management', 'Admin\\ProductController::priceProductManagement', '', '2025-03-19 09:08:58', '2025-03-20 05:04:26', '17', '17', 1, NULL, 110, 3, 53),
(128, 'GET', 'discount-management', 'Admin\\ProductController::discountProductManagement', '', '2025-03-19 09:09:07', '2025-03-20 05:04:32', '17', '17', 1, NULL, 110, 3, 54),
(130, '', 'category', '', '', '2025-03-19 09:10:17', '2025-03-20 05:06:09', '17', '17', 1, 1, 98, 2, 55),
(131, 'GET', '', 'Admin\\CategoryController::index', '', '2025-03-19 09:10:29', '2025-03-20 05:06:17', '17', '17', 1, NULL, 130, 3, 56),
(132, 'GET', 'index', 'Admin\\CategoryController::index', '', '2025-03-19 09:10:35', '2025-03-20 05:06:24', '17', '17', 1, NULL, 130, 3, 56),
(133, 'GET', 'create', 'Admin\\CategoryController::create', '', '2025-03-19 09:10:54', '2025-03-20 05:06:44', '17', '17', 1, NULL, 130, 3, 1),
(134, 'POST', 'save', 'Admin\\CategoryController::save', '', '2025-03-19 09:11:06', '2025-03-20 05:07:08', '17', '17', 1, NULL, 130, 3, 58),
(135, 'GET', 'detail/(:num)', 'Admin\\CategoryController::detail/$1', '', '2025-03-19 09:11:41', '2025-03-20 05:07:13', '17', '17', 1, NULL, 130, 3, 57),
(136, 'POST', 'update/(:num)', 'Admin\\CategoryController::update/$1', '', '2025-03-19 09:11:52', '2025-03-20 05:07:33', '17', '17', 1, NULL, 130, 3, 2),
(137, 'GET', 'delete/(:num)', 'Admin\\CategoryController::delete/$1', '', '2025-03-19 09:12:00', '2025-03-20 05:07:42', '17', '17', 1, NULL, 130, 3, 3),
(138, '', 'order', '', '', '2025-03-19 09:12:13', '2025-03-20 05:08:55', '17', '17', 1, 1, 98, 2, 59),
(139, '', 'transaction', '', '', '2025-03-19 09:12:26', '2025-03-20 05:09:01', '17', '17', 1, 1, 98, 2, 60),
(140, 'GET', 'create', 'Admin\\TransactionController::create', '', '2025-03-19 09:12:37', '2025-03-20 05:09:26', '17', '17', 1, NULL, 139, 3, 10),
(141, 'POST', 'save', 'Admin\\TransactionController::save', '', '2025-03-19 09:12:47', '2025-03-20 05:09:50', '17', '17', 1, NULL, 139, 3, 61),
(142, 'GET', 'detail/(:num)', 'Admin\\TransactionController::detail/$1', '', '2025-03-19 09:12:57', '2025-03-20 05:10:16', '17', '17', 1, NULL, 139, 3, 62),
(143, 'POST', 'update/(:num)', 'Admin\\TransactionController::update/$1', '', '2025-03-19 09:13:09', '2025-03-20 05:10:25', '17', '17', 1, NULL, 139, 3, 11),
(144, 'GET', 'delete/(:num)', 'Admin\\TransactionController::delete/$1', '', '2025-03-19 09:13:20', '2025-03-20 05:10:34', '17', '17', 1, NULL, 139, 3, 12),
(145, 'GET', 'export-list', 'Admin\\TransactionController::exportList', '', '2025-03-19 09:13:29', '2025-03-20 05:11:18', '17', '17', 1, NULL, 139, 3, 64),
(146, 'GET', 'import-list', 'Admin\\TransactionController::importList', '', '2025-03-19 09:13:38', '2025-03-20 05:11:25', '17', '17', 1, NULL, 139, 3, 63),
(147, '', 'supplier', '', '', '2025-03-19 09:14:08', '2025-03-20 05:21:31', '17', '17', 1, 1, 98, 2, 65),
(148, 'GET', '', 'Admin\\SupplierController::index', '', '2025-03-19 09:14:42', '2025-03-20 05:22:10', '17', '17', 1, NULL, 147, 3, 67),
(149, 'GET', 'index', 'Admin\\SupplierController::index', '', '2025-03-19 09:14:48', '2025-03-20 05:22:16', '17', '17', 1, NULL, 147, 3, 67),
(150, 'GET', 'create', 'Admin\\SupplierController::create', '', '2025-03-19 09:14:56', '2025-03-20 05:22:27', '17', '17', 1, NULL, 147, 3, 19),
(151, 'POST', 'save', 'Admin\\SupplierController::save', '', '2025-03-19 09:15:05', '2025-03-20 05:22:40', '17', '17', 1, NULL, 147, 3, 66),
(152, 'GET', 'detail/(:num)', 'Admin\\SupplierController::detail/$1', '', '2025-03-19 09:15:15', '2025-03-20 05:23:15', '17', '17', 1, NULL, 147, 3, 68),
(153, 'POST', 'update/(:num)', 'Admin\\SupplierController::update/$1', '', '2025-03-19 09:15:27', '2025-03-20 05:23:34', '17', '17', 1, NULL, 147, 3, 20),
(154, 'GET', 'delete/(:num)', 'Admin\\SupplierController::delete/$1', '', '2025-03-19 09:15:35', '2025-03-20 05:23:41', '17', '17', 1, NULL, 147, 3, 21),
(155, '', 'customer', '', '', '2025-03-19 09:16:13', '2025-03-20 05:25:40', '17', '17', 1, 1, 98, 2, 69),
(156, 'GET', '', 'Admin\\CustomerController::index', '', '2025-03-19 09:16:23', '2025-03-20 16:30:54', '17', '17', 1, NULL, 155, 3, 15),
(157, 'GET', 'index', 'Admin\\CustomerController::index', '', '2025-03-19 09:16:27', '2025-03-20 05:26:00', '17', '17', 1, NULL, 155, 3, 70),
(158, 'GET', 'create', 'Admin\\CustomerController::create', '', '2025-03-19 09:16:35', '2025-03-20 05:27:48', '17', '17', 1, NULL, 155, 3, 73),
(159, 'POST', 'save', 'Admin\\CustomerController::save', '', '2025-03-19 09:16:43', '2025-03-20 06:13:33', '17', '17', 1, NULL, 155, 3, 71),
(160, 'GET', 'detail/(:num)', 'Admin\\CustomerController::detail/$1', '', '2025-03-19 09:16:51', '2025-03-20 06:13:46', '17', '17', 1, NULL, 155, 3, 16),
(161, 'POST', 'update/(:num)', 'Admin\\CustomerController::update/$1', '', '2025-03-19 09:17:01', '2025-03-20 06:14:02', '17', '17', 1, NULL, 155, 3, 72),
(162, 'GET', 'delete/(:num)', 'Admin\\CustomerController::delete/$1', '', '2025-03-19 09:17:20', '2025-03-20 06:14:11', '17', '17', 1, NULL, 155, 3, 18),
(163, '', 'account', '', '', '2025-03-19 09:17:31', '2025-03-20 06:18:51', '17', '17', 1, 1, 98, 2, 74),
(164, 'GET', 'index', 'Admin\\AccountController::index', '', '2025-03-19 09:17:46', '2025-03-20 06:19:01', '17', '17', 1, NULL, 163, 3, 75),
(165, 'GET', 'index', 'Admin\\AccountController::index', '', '2025-03-19 09:17:54', '2025-03-20 04:33:48', '17', '17', 1, NULL, 163, 3, 39),
(166, 'GET', 'create', 'Admin\\AccountController::create', '', '2025-03-19 09:18:02', '2025-03-20 06:19:06', '17', '17', 1, NULL, 163, 3, 76),
(167, 'POST', 'save', 'Admin\\AccountController::save', '', '2025-03-19 09:18:13', '2025-03-20 06:19:12', '17', '17', 1, NULL, 163, 3, 77),
(168, 'GET', 'detail/(:num)', 'Admin\\AccountController::detail/$1', '', '2025-03-19 09:18:23', '2025-03-20 06:19:20', '17', '17', 1, NULL, 163, 3, 78),
(169, 'POST', 'update/(:num)', 'Admin\\AccountController::update/$1', '', '2025-03-19 09:18:32', '2025-03-20 04:32:24', '17', '17', 1, NULL, 163, 3, 23),
(170, 'GET', 'delete/(:num)', 'Admin\\AccountController::delete/$1', '', '2025-03-19 09:18:41', '2025-03-20 06:19:34', '17', '17', 1, NULL, 163, 3, 80),
(171, 'GET', 'login', 'Admin\\AccountController::login', '', '2025-03-19 09:18:51', '2025-03-19 09:18:51', '17', '17', 1, NULL, 163, 3, 0),
(172, 'GET', 'logout', 'Admin\\AccountController::logout', '', '2025-03-19 09:18:59', '2025-03-19 09:18:59', '17', '17', 1, NULL, 163, 3, 0),
(173, 'POST', 'sign-in', 'Admin\\AccountController::signIn', '', '2025-03-19 09:19:10', '2025-03-19 09:19:10', '17', '17', 1, NULL, 163, 3, 0),
(174, '', 'role', '', '', '2025-03-19 09:19:37', '2025-03-20 06:31:10', '17', '17', 1, 1, 98, 2, 81),
(175, 'GET', '', 'Admin\\RoleController::index', '', '2025-03-19 09:19:45', '2025-03-20 06:31:22', '17', '17', 1, NULL, 174, 3, 82),
(176, 'GET', 'index', 'Admin\\RoleController::index', '', '2025-03-19 09:19:49', '2025-03-20 06:36:39', '17', '17', 1, NULL, 174, 3, 82),
(177, 'GET', 'create', 'Admin\\RoleController::create', '', '2025-03-19 09:19:56', '2025-03-20 06:36:47', '17', '17', 1, NULL, 174, 3, 83),
(178, 'POST', 'save', 'Admin\\RoleController::save', '', '2025-03-19 09:20:05', '2025-03-20 06:36:54', '17', '17', 1, NULL, 174, 3, 84),
(179, 'GET', 'detail/(:num)', 'Admin\\RoleController::detail/$1', '', '2025-03-19 09:20:17', '2025-03-20 06:37:04', '17', '17', 1, NULL, 174, 3, 85),
(180, 'POST', 'update/(:num)', 'Admin\\RoleController::update/$1', '', '2025-03-19 09:20:21', '2025-03-20 06:37:13', '17', '17', 1, NULL, 174, 3, 86),
(181, 'GET', 'delete/(:num)', 'Admin\\RoleController::delete/$1', '', '2025-03-19 09:20:47', '2025-03-20 06:37:20', '17', '17', 1, NULL, 174, 3, 87),
(182, '', 'permission', '', '', '2025-03-19 09:21:05', '2025-03-20 06:55:19', '17', '17', 1, 1, 98, 2, 94),
(183, 'GET', '', 'Admin\\PermissionController::index', '', '2025-03-19 09:21:23', '2025-03-20 06:54:54', '17', '17', 1, NULL, 182, 3, 88),
(184, 'GET', 'index', 'Admin\\PermissionController::index', '', '2025-03-19 09:21:28', '2025-03-20 06:55:29', '17', '17', 1, NULL, 182, 3, 88),
(185, 'GET', 'create', 'Admin\\PermissionController::create', '', '2025-03-19 09:21:42', '2025-03-20 06:55:35', '17', '17', 1, NULL, 182, 3, 89),
(186, 'POST', 'save', 'Admin\\PermissionController::save', '', '2025-03-19 09:21:48', '2025-03-20 06:55:44', '17', '17', 1, NULL, 182, 3, 90),
(187, 'GET', 'detail/(:num)', 'Admin\\PermissionController::detail/$1', '', '2025-03-19 09:21:57', '2025-03-20 06:55:53', '17', '17', 1, NULL, 182, 3, 91),
(188, 'POST', 'update/(:num)', 'Admin\\PermissionController::update/$1', '', '2025-03-19 09:22:08', '2025-03-20 06:56:07', '17', '17', 1, NULL, 182, 3, 92),
(189, '', 'role-permission', '', '', '2025-03-19 09:22:25', '2025-03-20 06:58:03', '17', '17', 1, 1, 98, 2, 95),
(190, 'GET', '', 'Admin\\RolePermissionController::index', '', '2025-03-19 09:22:33', '2025-03-20 06:58:14', '17', '17', 1, NULL, 189, 3, 96),
(191, 'GET', 'index', 'Admin\\RolePermissionController::index', '', '2025-03-19 09:22:36', '2025-03-20 06:58:22', '17', '17', 1, NULL, 189, 3, 96),
(192, 'GET', 'create', 'Admin\\RolePermissionController::create', '', '2025-03-19 09:22:55', '2025-03-20 06:58:30', '17', '17', 1, NULL, 189, 3, 97),
(193, 'POST', 'save', 'Admin\\RolePermissionController::save', '', '2025-03-19 09:23:03', '2025-03-20 06:58:38', '17', '17', 1, NULL, 189, 3, 98),
(194, 'GET', 'detail/(:num)', 'Admin\\RolePermissionController::detail/$1', '', '2025-03-19 09:23:17', '2025-03-20 06:58:46', '17', '17', 1, NULL, 189, 3, 99),
(195, 'POST', 'update/(:num)', 'Admin\\RolePermissionController::update/$1', '', '2025-03-19 09:23:37', '2025-03-20 06:58:54', '17', '17', 1, NULL, 189, 3, 100),
(196, 'POST', 'change-role-permission', 'Admin\\RolePermissionController::changeRolePermission', '', '2025-03-19 09:23:47', '2025-03-20 07:00:47', '17', '17', 1, NULL, 189, 3, 102),
(197, '', 'route', '', '', '2025-03-19 09:23:59', '2025-03-20 07:01:17', '17', '17', 1, 1, 98, 2, 103),
(198, 'GET', '', 'Admin\\RouteController::index', '', '2025-03-19 09:24:07', '2025-03-20 03:31:30', '17', '17', 1, NULL, 197, 3, 33),
(199, 'GET', 'index', 'Admin\\RouteController::index', '', '2025-03-19 09:24:11', '2025-03-20 03:31:39', '17', '17', 1, NULL, 197, 3, 33),
(200, 'GET', 'create', 'Admin\\RouteController::create', '', '2025-03-19 09:24:17', '2025-03-20 03:31:46', '17', '17', 1, NULL, 197, 3, 34),
(201, 'POST', 'save', 'Admin\\RouteController::save', '', '2025-03-19 09:24:24', '2025-03-20 07:02:15', '17', '17', 1, NULL, 197, 3, 104),
(202, 'GET', 'detail/(:num)', 'Admin\\RouteController::detail/$1', '', '2025-03-19 09:24:39', '2025-03-20 03:32:18', '17', '17', 1, NULL, 197, 3, 35),
(203, 'POST', 'update/(:num)', 'Admin\\RouteController::update/$1', '', '2025-03-19 09:24:54', '2025-03-20 03:32:26', '17', '17', 1, NULL, 197, 3, 36),
(204, 'GET', 'delete/(:num)', 'Admin\\RouteController::delete/$1', '', '2025-03-19 09:25:11', '2025-03-20 03:32:32', '17', '17', 1, NULL, 197, 3, 37),
(205, '', 'order', '', '', '2025-03-19 10:07:45', '2025-03-20 07:02:08', '17', '17', 1, 1, 98, 2, 105),
(206, 'GET', '', 'Admin\\OrderController::index', 'OrderControllerIndex', '2025-03-19 10:08:48', '2025-03-20 07:03:48', '17', '17', 1, NULL, 205, 3, 106),
(207, 'POST', 'change-status', 'Admin\\CommonController::changeStatusRecordCommon', '', '2025-03-19 11:10:42', '2025-03-20 07:03:55', '17', '17', 1, NULL, 102, 3, 107),
(208, 'GET', '/', 'Portal\\HomeController::index', '', '2025-03-19 16:47:35', '2025-03-20 04:36:52', '17', '17', 1, NULL, NULL, 1, 40),
(209, 'GET', 'home', 'Portal\\HomeController::index', '', '2025-03-19 16:47:56', '2025-03-20 07:04:44', '17', '17', 1, NULL, NULL, 1, 40),
(210, 'GET', 'upload', 'Admin\\UploadController::uploadImage', '', '2025-03-19 16:48:17', '2025-03-19 19:41:34', '17', '17', 1, NULL, NULL, 1, 0),
(211, 'GET', 'manager-file', 'Admin\\UploadController::managerFile', '', '2025-03-19 16:48:37', '2025-03-20 04:41:16', '17', '17', 1, NULL, NULL, 1, 41),
(212, 'GET', '', 'Admin\\AccountController::index', '', '2025-03-20 02:53:51', '2025-03-20 04:33:33', '17', '17', 1, NULL, 163, 3, 39),
(214, 'GET', 'index', 'Admin\\ProductAttributeController::index', '', '2025-03-21 05:46:45', '2025-03-21 06:04:15', '17', '17', 1, NULL, 220, 3, 108),
(215, 'GET', 'create', 'Admin\\ProductAttributeController::create', '', '2025-03-21 05:47:00', '2025-03-21 06:04:22', '17', '17', 1, NULL, 220, 3, 109),
(216, 'POST', 'save', 'Admin\\ProductAttributeController::save', '', '2025-03-21 05:47:10', '2025-03-21 06:04:31', '17', '17', 1, NULL, 220, 3, 110),
(217, 'GET', 'detail/(:num)', 'Admin\\ProductAttributeController::detail/$1', '', '2025-03-21 05:47:52', '2025-03-21 06:04:41', '17', '17', 1, NULL, 220, 3, 111),
(218, 'POST', 'update/(:num)', 'Admin\\ProductAttributeController::update/$1', '', '2025-03-21 05:48:25', '2025-03-21 06:04:49', '17', '17', 1, NULL, 220, 3, 112),
(219, 'GET', 'delete/(:num)', 'Admin\\ProductAttributeController::delete/$1', '', '2025-03-21 05:48:46', '2025-03-21 06:04:57', '17', '17', 1, NULL, 220, 3, 113),
(220, '', 'product-attributes', '', '', '2025-03-21 06:03:19', '2025-03-21 06:03:55', '17', '17', 1, 1, 98, 2, 114),
(222, '', 'product-attribute-value', '', '', '2025-03-21 15:34:02', '2025-03-21 15:34:02', '17', '17', 1, 1, 98, 2, 0),
(223, 'POST', 'get-product-attribute-value', 'Admin\\ProductAttributeValueController::getProductAttributeValue', '', '2025-03-21 15:34:28', '2025-03-21 15:35:18', '17', '17', 1, NULL, 222, 3, 116),
(224, 'POST', 'get-price-history', 'Admin\\TransactionController::getPriceHistory', '', '2025-03-23 14:35:47', '2025-03-23 14:35:47', '17', '17', 1, NULL, 139, 3, 117),
(225, 'POST', 'set-price-product', 'Admin\\ProductController::setPriceProduct', '', '2025-03-23 15:09:23', '2025-03-23 15:17:53', '17', '17', 1, NULL, 110, 3, 118);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`, `is_active`, `created_by`, `updated_by`) VALUES
(12, 'Nguyen Thi Dao', 'nguyenthidao@gmail.com', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-15 15:12:23', '2025-03-15 15:12:23', 1, 1, 1),
(13, 'Nguyen Thi Dao 1', 'nguyenthidao@gmail.com', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-15 15:12:35', '2025-03-15 15:12:35', 1, 1, 1),
(14, 'Nguyen Thi Dao 2', 'nguyenthidao@gmail.com', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-15 15:15:55', '2025-03-15 15:15:55', 1, 1, 1),
(15, 'Nguyen Thi Dao 3', 'nguyenthidao@gmail.com', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-15 15:31:25', '2025-03-18 07:19:47', 0, 1, 1),
(16, 'Nguyen Thi Dao 5', 'nguyenthidao@gmail.com', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-15 15:34:24', '2025-03-15 15:34:24', 1, 1, 1),
(17, 'Nguyen Thi Dao 6', 'nguyenthidao@gmail.com', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-15 15:36:58', '2025-03-18 07:19:47', 0, 1, 1),
(18, 'Nguyen Thi Dao 7', 'nguyenthidao@gmail.com', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-15 15:37:07', '2025-03-15 15:37:07', 1, 1, 1),
(19, 'Nguyen Thi Dao 8', 'nguyenthidao@gmail.com', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-15 15:37:15', '2025-03-18 07:19:46', 0, 1, 1),
(20, 'Nguyen Thi Dao 9', 'nguyenthidao@gmail.com', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-15 15:37:39', '2025-03-15 15:37:39', 1, 1, 1),
(21, 'Nguyen Thi Dao 10', 'nguyenthidao@gmail.com', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-15 15:37:45', '2025-03-15 15:37:45', 1, 1, 1),
(22, 'Nguyen Thi Dao 11', 'nguyenthidao@gmail.com', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-15 15:37:52', '2025-03-18 07:19:45', 0, 1, 1),
(23, 'Nguyen Thi Dao 11', 'nguyenthidao@gmail.com', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-15 15:39:09', '2025-03-18 07:19:45', 0, 1, 1),
(24, 'Nguyen Thi Dao 12', 'nguyenthidao@gmail.com', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', '2025-03-15 15:40:20', '2025-03-18 07:22:14', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_type` enum('import','export') NOT NULL,
  `transaction_date` datetime DEFAULT current_timestamp(),
  `supplier_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `warehouse_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_type`, `transaction_date`, `supplier_id`, `customer_id`, `note`, `created_at`, `updated_at`, `warehouse_id`, `is_active`, `created_by`, `updated_by`) VALUES
(1, 'import', '2025-03-23 00:00:00', 12, NULL, NULL, '2025-03-23 00:09:59', '2025-03-23 00:09:59', 1, 1, 1, 1),
(2, 'import', '2025-03-23 00:00:00', 12, NULL, NULL, '2025-03-23 00:10:58', '2025-03-23 00:10:58', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) GENERATED ALWAYS AS (`quantity` * `unit_price`) STORED,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1,
  `product_attribute_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`, `is_active`, `created_by`, `updated_by`, `product_attribute_id`) VALUES
(1, 1, 16, 100, 5000.00, '2025-03-23 00:09:59', '2025-03-23 00:09:59', 1, 1, 1, 6),
(2, 1, 15, 50, 6000.00, '2025-03-23 00:09:59', '2025-03-23 00:09:59', 1, 1, 1, 7),
(3, 2, 16, 50, 6000.00, '2025-03-23 00:10:58', '2025-03-23 00:10:58', 1, 1, 1, 6),
(4, 2, 15, 20, 4000.00, '2025-03-23 00:10:58', '2025-03-23 00:10:58', 1, 1, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `location`, `account_id`, `created_at`, `is_active`, `created_by`, `updated_by`) VALUES
(1, 'Kho Yên Xá', 'Số 5A ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', 15, '2025-03-17 11:53:41', 1, 1, 1),
(2, 'Kho Yên Xá 1', 'Số 5 ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', 17, '2025-03-17 12:00:19', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `best_selling_products`
--
ALTER TABLE `best_selling_products`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `product_attribute_id` (`product_attribute_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `attribute_id` (`attribute_id`);

--
-- Indexes for table `product_discounts`
--
ALTER TABLE `product_discounts`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `product_prices`
--
ALTER TABLE `product_prices`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `best_selling_products`
--
ALTER TABLE `best_selling_products`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_discounts`
--
ALTER TABLE `product_discounts`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_prices`
--
ALTER TABLE `product_prices`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`),
  ADD CONSTRAINT `inventory_ibfk_3` FOREIGN KEY (`product_attribute_id`) REFERENCES `product_attributes` (`id`);

--
-- Constraints for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD CONSTRAINT `product_attribute_values_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_attribute_values_ibfk_2` FOREIGN KEY (`attribute_id`) REFERENCES `product_attributes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
