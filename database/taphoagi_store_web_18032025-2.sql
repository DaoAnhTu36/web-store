-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2025 at 12:32 PM
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
  `role` enum('admin','customer') DEFAULT 'customer',
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

INSERT INTO `accounts` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `role`, `created_at`, `user_name`, `is_active`, `created_by`, `updated_by`, `role_id`) VALUES
(15, 'Nguyen Thi Dao', 'nguyenthidao@gmail.com', '$2y$10$dJk8z9JqZUgUC/.Kv3gbhOw.QHnVgtP9gw5rpXR7.zu6ckyUXO9.i', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', 'admin', '2025-03-17 09:29:51', 'ntd060404', 1, 1, 1, NULL),
(17, 'Nguyen Thi Dao', 'nguyenthidao@gmail.com', '$2y$10$.C8Co0uxWk9O4DfqgZ0XbuogfB5n0YrRiEbxzUxyfxrrv2FMgfDVe', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', 'admin', '2025-03-17 11:23:29', 'tester1', 1, 1, 1, NULL),
(18, 'Tran Van Tu', 'trailangnd96@gmail.com', '$2y$10$rRokxRU1Qp0QLNTep1RaK.Zg7nz8/XabDMmQ0SmGien8ezwhqPwVi', '0975924428', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', 'customer', '2025-03-18 08:23:40', 'trantu029', 1, 1, 1, NULL),
(19, 'Tran Thi My', 'tranmy@gmail.com', '$2y$10$UYCXSKgNsCvfhooCq5NNxe4KLPFXvkd5grt9Ev1tuC5tNO157s6hy', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', 'customer', '2025-03-18 08:23:47', 'tranmy', 1, 1, 1, NULL),
(20, 'Nguyen Thi Dao 2', 'nguyenthidao@gmail.com', '$2y$10$dl0Z.pSsPLqjvgPejLvVUOItarVLexyUo8YURY8gwO0EoR94/QY6S', '0947270032', 'Số 5a ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', 'customer', '2025-03-18 08:23:51', 'ntd060404', 1, 1, 1, NULL);

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
(55, 14, 'uploads/1742292289_c01c634ed30ad08e2ca5.jpg', '2025-03-18 10:04:49', 'product', 1, 1, 1);

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
  `permission_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(1, 'Tinh dầu hương chanh sả', 3, 'uploads/1742290034_43d5e550ee57e6b8a940.jpg', '2025-03-11 07:08:46', 1, 1, 1),
(2, 'Tinh dầu hương nước hoa', 3, 'uploads/1742290034_43d5e550ee57e6b8a940.jpg', '2025-03-11 07:22:24', 1, 1, 1),
(3, 'Tinh dầu hương hoa nhài', 3, 'uploads/1742290034_43d5e550ee57e6b8a940.jpg', '2025-03-11 07:27:31', 1, 1, 1),
(4, 'Tinh dầu gỗ đàn hương', 3, 'uploads/1742290034_43d5e550ee57e6b8a940.jpg', '2025-03-11 07:31:52', 1, 1, 1),
(5, 'Tinh dầu hương hoa anh đào', 3, 'uploads/1742290034_43d5e550ee57e6b8a940.jpg', '2025-03-11 10:48:28', 1, 1, 1),
(13, 'Máy xông tinh dầu dạng hồ lô', 5, 'uploads/1742291294_d903aa761aad8bfebd0d.jpeg', '2025-03-18 09:48:14', 1, 1, 1),
(14, 'tessttt', 3, 'uploads/1742292289_441d1249d9c782631b4d.jpg', '2025-03-18 10:04:49', 1, 1, 1);

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
  `role_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(21, 'import', '2025-03-17 00:00:00', NULL, 1, NULL, '2025-03-16 23:43:31', '2025-03-16 23:43:31', 0, 1, 1, 1),
(22, 'export', '2025-03-17 00:00:00', NULL, 4, NULL, '2025-03-16 23:46:45', '2025-03-16 23:46:45', 0, 1, 1, 1),
(23, 'import', '2025-03-17 00:00:00', NULL, 3, NULL, '2025-03-16 23:50:19', '2025-03-16 23:50:19', 0, 1, 1, 1),
(24, 'import', '2025-03-17 00:00:00', 14, 2, NULL, '2025-03-16 23:52:17', '2025-03-16 23:52:17', 0, 1, 1, 1),
(25, 'import', '2025-03-17 00:00:00', 15, 1, NULL, '2025-03-16 23:54:45', '2025-03-16 23:54:45', 0, 1, 1, 1),
(26, 'import', '2025-03-17 00:00:00', 12, 1, NULL, '2025-03-16 23:58:01', '2025-03-16 23:58:01', 0, 1, 1, 1),
(27, 'import', '2025-03-17 00:00:00', 12, 4, NULL, '2025-03-17 00:10:48', '2025-03-17 00:10:48', 0, 1, 1, 1),
(28, 'import', '2025-03-17 00:00:00', 12, 1, NULL, '2025-03-18 07:02:57', '2025-03-18 07:02:57', 0, 1, 1, 1),
(29, 'export', '2025-03-17 00:00:00', 12, 1, NULL, '2025-03-18 07:02:54', '2025-03-18 07:02:54', 0, 1, 1, 1),
(30, 'import', '2025-03-17 00:00:00', 12, 5, NULL, '2025-03-18 07:02:57', '2025-03-18 07:02:57', 0, 1, 1, 1),
(31, 'import', '2025-03-17 00:00:00', 12, 1, NULL, '2025-03-18 07:02:58', '2025-03-18 07:02:58', 0, 1, 1, 1);

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
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`, `is_active`, `created_by`, `updated_by`) VALUES
(51, 21, 1, 100, 25000.00, '2025-03-16 23:43:31', '2025-03-16 23:43:31', 1, 1, 1),
(52, 22, 1, 50, 30000.00, '2025-03-16 23:46:45', '2025-03-16 23:46:45', 1, 1, 1),
(53, 23, 2, 1000, 20000.00, '2025-03-16 23:50:19', '2025-03-16 23:50:19', 1, 1, 1),
(54, 24, 4, 250, 21000.00, '2025-03-16 23:52:17', '2025-03-16 23:52:17', 1, 1, 1),
(55, 25, 5, 150, 30000.00, '2025-03-16 23:54:45', '2025-03-16 23:54:45', 1, 1, 1),
(56, 26, 2, 500, 35000.00, '2025-03-16 23:58:01', '2025-03-16 23:58:01', 1, 1, 1),
(57, 27, 2, 250, 30000.00, '2025-03-17 00:10:48', '2025-03-17 00:10:48', 1, 1, 1),
(58, 27, 3, 50, 25000.00, '2025-03-17 00:10:48', '2025-03-17 00:10:48', 1, 1, 1),
(59, 27, 5, 200, 25000.00, '2025-03-17 00:10:48', '2025-03-17 00:10:48', 1, 1, 1),
(60, 28, 5, 12, 30000.00, '2025-03-17 00:17:52', '2025-03-17 00:17:52', 1, 1, 1),
(61, 28, 2, 35, 25000.00, '2025-03-17 00:17:52', '2025-03-17 00:17:52', 1, 1, 1),
(62, 29, 2, 1, 25000.00, '2025-03-17 00:18:32', '2025-03-17 00:18:32', 1, 1, 1),
(63, 30, 1, 100, 25000.00, '2025-03-17 00:19:40', '2025-03-17 00:19:40', 1, 1, 1),
(64, 31, 1, 50, 15000.00, '2025-03-17 00:22:01', '2025-03-17 00:22:01', 1, 1, 1);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_name` (`permission_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_discounts`
--
ALTER TABLE `product_discounts`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_prices`
--
ALTER TABLE `product_prices`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
