-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2025 at 07:23 AM
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
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `start_date`, `end_date`, `created_by`, `updated_by`, `is_active`, `created_at`, `updated_at`) VALUES
(5, 'Hương hoa hồng', 'Đắm mình trong hương hoa hồng, tận hưởng sự thư giãn tuyệt vời.', NULL, NULL, '', '', 1, '2025-03-29 02:17:05', '2025-03-29 02:17:05'),
(6, 'Hương cam ngọt', 'Cam ngọt trong từng giọt tinh dầu, cho bạn cảm giác yêu đời.', NULL, NULL, '', '', 1, '2025-03-29 03:21:40', '2025-03-29 03:21:40'),
(7, 'Hương chanh', 'Hương chanh nồng nàn, cho cuộc sống thêm thăng hoa.', NULL, NULL, '', '', 1, '2025-03-29 03:27:53', '2025-03-29 03:27:53'),
(12, 'Hương bạc hà', 'Hương bạc hà mát lạnh, đánh thức tinh thần, tràn đầy năng lượng.', NULL, NULL, '', '', 1, '2025-03-29 03:35:41', '2025-03-29 03:35:41');

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
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `password_hash`, `address`, `city`, `state`, `country`, `postal_code`, `date_of_birth`, `gender`, `profile_picture`, `verification_token`, `is_verified`, `is_active`, `created_at`, `updated_at`) VALUES
(30, 'Tran', 'Tu', 'tutran.mta.it@gmail.com', '0975924428', '$2y$10$hS/W5SODbZ9RNPtBXfEb9OsQXYzutL2NCj0wQPpZcAwUv7GcaSAGu', 'Số 5A ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b4602cd265b3e2b831435df1195482ff9c3287bb8eacc352eb1872d8f9b8b470', 1, 1, '2025-03-27 08:56:54', '2025-03-29 06:16:19'),
(31, 'Nguyen', 'Dao', 'nguyenthidao0604@gmail.com', '0964270032', '$2y$10$gLKn.RHBDu1nUvGNa372q.41qWGLbcZmf5bHaIOvb5Dgmmsol0IBC', 'Số 5A ngõ 221 Yên Xá Tân Triều Thanh Trì Hà Nội', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '524e9309a242055d7eaf31131c03bf5d52d70d91a5b1d63d1e4acbf154007415', 0, 1, '2025-03-27 08:58:06', '2025-03-28 10:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `discount_type_id` int(11) NOT NULL,
  `discount_value` decimal(10,2) DEFAULT 0.00,
  `min_order_amount` decimal(10,2) DEFAULT 0.00,
  `max_discount` decimal(10,2) DEFAULT NULL,
  `coupon_code` varchar(50) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `usage_limit` int(11) DEFAULT NULL,
  `used_count` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `name`, `discount_type_id`, `discount_value`, `min_order_amount`, `max_discount`, `coupon_code`, `start_date`, `end_date`, `usage_limit`, `used_count`, `is_active`, `created_at`, `created_by`, `updated_by`, `updated_at`) VALUES
(3, 'Giảm giá sập sàn', 1, 35.00, 300000.00, 70000.00, 'SS35', '2025-03-24 00:00:00', '2025-03-24 00:00:00', 2000, 1, 1, '2025-03-24 10:42:26', 17, NULL, '2025-03-25 12:07:48'),
(4, 'Giảm giá sập sàn', 2, 20.00, 150.00, 0.00, 'SS20', '2025-03-24 00:00:00', '2025-03-24 00:00:00', 20, 0, 1, '2025-03-24 13:14:20', 17, NULL, '2025-03-24 13:14:20'),
(5, 'GIảm 20k cho đơn từ 200k', 2, 20.00, 200.00, 0.00, 'KM20MAX', '2025-03-24 00:00:00', '2025-03-24 00:00:00', 20, 1, 1, '2025-03-24 13:15:58', 17, NULL, '2025-03-25 12:08:07'),
(6, 'Khuyến mại test', 1, 20.00, 300000.00, 50000.00, 'DATS20', '2025-03-25 06:13:00', '2025-03-26 00:00:00', 100, 1, 1, '2025-03-25 06:16:47', 17, NULL, '2025-03-25 15:01:01'),
(7, 'Khuyến mại 20%', 1, 20.00, 200000.00, 50000.00, 'KM20PER', '2025-03-25 14:28:00', '2025-03-25 23:59:00', 120, 0, 1, '2025-03-25 14:29:36', 17, 17, '2025-03-25 16:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `discount_types`
--

CREATE TABLE `discount_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `discount_types`
--

INSERT INTO `discount_types` (`id`, `name`, `description`, `is_active`, `created_at`, `created_by`, `updated_by`, `updated_at`) VALUES
(1, 'Phần trăm', NULL, 1, '2025-03-24 09:07:21', NULL, NULL, '2025-03-24 17:27:58'),
(2, 'Giảm số tiền cố định', NULL, 1, '2025-03-24 09:08:35', NULL, NULL, '2025-03-24 09:08:35'),
(3, 'Miễn phí vận chuyển', NULL, 1, '2025-03-24 09:08:44', NULL, NULL, '2025-03-24 09:08:44'),
(4, 'Giảm giá combo', NULL, 1, '2025-03-24 09:08:54', NULL, NULL, '2025-03-24 09:08:54'),
(5, 'Mã giảm giá', NULL, 1, '2025-03-24 09:08:59', NULL, NULL, '2025-03-24 09:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `subject`, `body`, `is_active`, `created_at`, `created_by`, `updated_by`, `updated_at`) VALUES
(2, 'mail_verify_account', 'Chúc mừng bạn đã đăng ký thành công là người dùng của website chúng tôi.', '<p>&lt;!DOCTYPE html&gt;&lt;html&gt;<br>&lt;head&gt; &lt;meta charset=\"UTF-8\"&gt; &lt;meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"&gt; &lt;title&gt;Xác Nhận Đăng Ký Tài Khoản&lt;/title&gt;<br>&lt;/head&gt;<br>&lt;body style=\"margin: 0; padding: 0; background-color: #f4f4f4; text-align: center; font-family: Arial, sans-serif;\"&gt; &lt;table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" style=\"background-color: #f4f4f4; padding: 20px;\"&gt; &lt;tr&gt; &lt;td&gt; &lt;table width=\"600px\" cellspacing=\"0\" cellpadding=\"0\" style=\"background-color: #ffffff; margin: auto; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);\"&gt; &lt;tr&gt; &lt;td style=\"background-color: #4CAF50; padding: 15px; color: #ffffff; font-size: 24px; font-weight: bold; border-top-left-radius: 10px; border-top-right-radius: 10px;\"&gt; Xác Nhận Đăng Ký &lt;/td&gt; &lt;/tr&gt; &lt;tr&gt; &lt;td style=\"padding: 20px; text-align: center; font-size: 16px; color: #333;\"&gt; &lt;p&gt;Xin chào &lt;strong&gt;{username}&lt;/strong&gt;,&lt;/p&gt; &lt;p&gt;Bạn đã đăng ký tài khoản tại &lt;strong&gt;{website_name}&lt;/strong&gt;. Vui lòng nhấn vào nút dưới đây để xác nhận tài khoản của bạn:&lt;/p&gt; &lt;a href=\"{verification_link}\" style=\"display: inline-block; background-color: #4CAF50; color: white; padding: 12px 24px; text-decoration: none; font-size: 16px; border-radius: 5px; margin-top: 10px;\"&gt;Xác Nhận Tài Khoản&lt;/a&gt; &lt;p style=\"margin-top: 20px; color: #777; font-size: 14px;\"&gt;Nếu bạn không thực hiện yêu cầu này, vui lòng bỏ qua email này.&lt;/p&gt; &lt;/td&gt; &lt;/tr&gt; &lt;tr&gt; &lt;td style=\"background-color: #f4f4f4; padding: 10px; font-size: 12px; color: #777; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;\"&gt; © 2025 {website_name}. All rights reserved. &lt;/td&gt; &lt;/tr&gt; &lt;/table&gt; &lt;/td&gt; &lt;/tr&gt; &lt;/table&gt;&lt;/body&gt;<br>&lt;/html&gt;</p>', 1, '2025-03-26 19:39:44', 17, 17, '2025-03-26 23:27:42'),
(3, 'mail_order_successful', 'Đơn hàng của bạn đã được xác nhận.', '', 1, '2025-03-29 11:14:44', 17, 17, '2025-03-29 11:21:05');

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
(57, 16, 'uploads/1742571420_c2893aede11cd9d50cbd.jpg', '2025-03-21 15:37:00', 'product', 1, 1, 1),
(58, 17, 'uploads/1742789068_0fef2ddb38da3ffa5147.png', '2025-03-24 04:04:28', 'product', 1, 1, 1),
(59, 17, 'uploads/1742789068_379c7323ee5e0e5004c2.png', '2025-03-24 04:04:28', 'product', 1, 1, 1),
(60, 17, 'uploads/1742789068_f16c1dd392c73588557c.png', '2025-03-24 04:04:28', 'product', 1, 1, 1),
(61, 17, 'uploads/1742789068_64c4bc97baa764d267ea.png', '2025-03-24 04:04:28', 'product', 1, 1, 1),
(62, 18, 'uploads/1742789094_9495af3e418021f4ab3f.jpg', '2025-03-24 04:04:54', 'product', 1, 1, 1),
(63, 18, 'uploads/1742789094_3ce6b576af7258a94747.jpg', '2025-03-24 04:04:54', 'product', 1, 1, 1),
(64, 18, 'uploads/1742789094_e27bde76e6fced3fe04d.jpg', '2025-03-24 04:04:54', 'product', 1, 1, 1),
(65, 18, 'uploads/1742789094_902fbfbe86d4c743d5f3.jpg', '2025-03-24 04:04:54', 'product', 1, 1, 1),
(66, 19, 'uploads/1742789115_720593bbaddca0ab27dc.png', '2025-03-24 04:05:15', 'product', 1, 1, 1),
(67, 19, 'uploads/1742789115_9e4aaef1f88ec49a4e5f.png', '2025-03-24 04:05:15', 'product', 1, 1, 1),
(68, 19, 'uploads/1742789115_860376feeb6a6946c020.png', '2025-03-24 04:05:15', 'product', 1, 1, 1),
(69, 19, 'uploads/1742789115_c6bce9b125dfc8541394.png', '2025-03-24 04:05:15', 'product', 1, 1, 1),
(70, 20, 'uploads/1742789143_30bea010de609fc0915c.png', '2025-03-24 04:05:43', 'product', 1, 1, 1),
(71, 20, 'uploads/1742789143_4f135afeb95e58f13a52.png', '2025-03-24 04:05:43', 'product', 1, 1, 1),
(72, 20, 'uploads/1742789143_acf5852b1ce94255f5d4.png', '2025-03-24 04:05:43', 'product', 1, 1, 1),
(73, 20, 'uploads/1742789143_5e6f48c28398407bdb3b.png', '2025-03-24 04:05:43', 'product', 1, 1, 1),
(74, 21, 'uploads/1742789167_3eb17e904d37faa037ed.jpg', '2025-03-24 04:06:07', 'product', 1, 1, 1),
(75, 21, 'uploads/1742789167_9242dd2652d2d0cb89c6.jpg', '2025-03-24 04:06:07', 'product', 1, 1, 1),
(76, 21, 'uploads/1742789167_72dc15024fd46c14d3f7.jpg', '2025-03-24 04:06:07', 'product', 1, 1, 1),
(77, 21, 'uploads/1742789167_c8d80e9c220db713189d.jpg', '2025-03-24 04:06:07', 'product', 1, 1, 1),
(78, 22, 'uploads/1742789187_7e22271bf729c02d1623.png', '2025-03-24 04:06:27', 'product', 1, 1, 1),
(79, 22, 'uploads/1742789187_456fb4ab239e489d1522.png', '2025-03-24 04:06:27', 'product', 1, 1, 1),
(80, 22, 'uploads/1742789187_ed7e35ae37fbcb9e4640.png', '2025-03-24 04:06:27', 'product', 1, 1, 1),
(81, 22, 'uploads/1742789187_9378cb8484900e65dda6.jpg', '2025-03-24 04:06:27', 'product', 1, 1, 1),
(82, 23, 'uploads/1742789213_018c8a6019bceaaeb784.jpg', '2025-03-24 04:06:53', 'product', 1, 1, 1),
(83, 23, 'uploads/1742789213_56ff9175ad6d941b77c1.jpg', '2025-03-24 04:06:53', 'product', 1, 1, 1),
(84, 23, 'uploads/1742789213_ae8f1e8fb657e40adfbb.jpg', '2025-03-24 04:06:53', 'product', 1, 1, 1),
(85, 24, 'uploads/1742789253_b2ba195d9899e9956efb.png', '2025-03-24 04:07:33', 'product', 1, 1, 1),
(86, 24, 'uploads/1742789253_ab08f015c4c7371d771d.png', '2025-03-24 04:07:33', 'product', 1, 1, 1),
(87, 25, 'uploads/tinh-dau-huong-hoa-hong-1', '2025-03-24 05:00:31', 'product', 1, 1, 1),
(88, 26, 'uploads/tinh-dau-huong-hoa-hong-1', '2025-03-24 05:02:14', 'product', 1, 1, 1),
(89, 26, 'uploads/tinh-dau-huong-hoa-hong-2', '2025-03-24 05:02:14', 'product', 1, 1, 1),
(90, 26, 'uploads/tinh-dau-huong-hoa-hong-3', '2025-03-24 05:02:14', 'product', 1, 1, 1),
(91, 26, 'uploads/tinh-dau-huong-hoa-hong-4', '2025-03-24 05:02:14', 'product', 1, 1, 1),
(98, 23, 'uploads/1742965854_b36c883cec57c8fe0b0e.jpg', '2025-03-26 05:10:54', 'website_config', 1, 1, 1),
(99, 22, 'uploads/1742978377_c7a40d1afee91bef494f.png', '2025-03-26 08:39:37', 'website_configs', 1, 1, 1),
(100, 29, 'uploads/1743063949_097066becc34830ed79d.png', '2025-03-27 08:25:49', 'website_config', 1, 1, 1),
(102, 30, 'uploads/1743064033_bad938ee2cd9a03fd09b.png', '2025-03-27 08:27:13', 'website_config', 1, 1, 1),
(104, 31, 'uploads/1743064185_b432167ace3830dfab3e.png', '2025-03-27 08:29:45', 'website_configs', 1, 1, 1),
(105, 1, 'uploads/1743183890_b18cabbd87b4220a1b07.jpg', '2025-03-28 17:44:50', 'banner', 1, 1, 1),
(106, 2, 'uploads/1743184197_2ec327edea46cbed05cd.webp', '2025-03-28 17:49:57', 'banner', 1, 1, 1),
(107, 3, 'uploads/1743184286_5f51730417366f2e3be0.webp', '2025-03-28 17:51:26', 'banner', 1, 1, 1),
(108, 5, 'uploads/1743214423_43edb9f1522f98152dde.jpeg', '2025-03-29 02:13:43', 'banner', 1, 1, 1),
(109, 6, 'uploads/1743214514_767c088c3b20f804739c.jpg', '2025-03-29 02:15:14', 'banner', 1, 1, 1),
(110, 7, 'uploads/1743218873_4f22b3a381acd1059d6e.jpg', '2025-03-29 03:27:53', 'banner', 1, 1, 1),
(111, 12, 'uploads/1743219341_ab50a82b45a63c4d0af4.jpg', '2025-03-29 03:35:41', 'banner', 1, 1, 1);

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
(3, 15, 1, 6, 20, '2025-03-23 14:10:58'),
(4, 17, 1, 6, 100, '2025-03-24 11:09:43'),
(5, 18, 1, 6, 100, '2025-03-24 11:09:43'),
(6, 19, 1, 6, 100, '2025-03-24 11:09:43'),
(7, 20, 1, 6, 100, '2025-03-24 11:09:43'),
(8, 21, 1, 6, 100, '2025-03-24 11:09:43'),
(9, 22, 1, 6, 100, '2025-03-24 11:09:43'),
(10, 23, 1, 6, 100, '2025-03-24 11:09:43'),
(11, 24, 1, 6, 100, '2025-03-24 11:09:43');

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
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `created_at`, `is_active`, `created_by`, `updated_by`, `note`, `updated_at`) VALUES
(18, 30, 550000.00, 'pending', '2025-03-29 06:09:45', 1, 30, NULL, '', '2025-03-29 06:09:45'),
(19, 30, 300000.00, 'pending', '2025-03-29 06:11:37', 1, 30, NULL, '', '2025-03-29 06:11:37'),
(20, 30, 175000.00, 'pending', '2025-03-29 06:13:31', 1, 30, NULL, '', '2025-03-29 06:13:31'),
(21, 30, 375000.00, 'pending', '2025-03-29 06:16:19', 1, 30, NULL, '', '2025-03-29 06:16:19');

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
  `sub_total` decimal(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `sub_total`, `is_active`, `created_by`, `updated_by`) VALUES
(42, 18, 22, 6, 25000.00, 150000.00, 1, 30, NULL),
(43, 18, 21, 7, 25000.00, 175000.00, 1, 30, NULL),
(44, 18, 18, 2, 25000.00, 50000.00, 1, 30, NULL),
(45, 18, 17, 3, 25000.00, 75000.00, 1, 30, NULL),
(46, 18, 19, 4, 25000.00, 100000.00, 1, 30, NULL),
(47, 19, 24, 3, 25000.00, 75000.00, 1, 30, NULL),
(48, 19, 23, 3, 25000.00, 75000.00, 1, 30, NULL),
(49, 19, 22, 6, 25000.00, 150000.00, 1, 30, NULL),
(50, 20, 23, 1, 25000.00, 25000.00, 1, 30, NULL),
(51, 20, 22, 3, 25000.00, 75000.00, 1, 30, NULL),
(52, 20, 21, 3, 25000.00, 75000.00, 1, 30, NULL),
(53, 21, 18, 10, 25000.00, 250000.00, 1, 30, NULL),
(54, 21, 19, 2, 25000.00, 50000.00, 1, 30, NULL),
(55, 21, 20, 3, 25000.00, 75000.00, 1, 30, NULL);

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
(118, 'Thiết lập giá sản phẩm, hàng hóa', '2025-03-23 15:08:34', 1, NULL, NULL, '2025-03-23 15:08:34'),
(119, 'Lấy lịch sử giá sản phẩm', '2025-03-24 05:50:07', 1, NULL, NULL, '2025-03-24 05:50:07'),
(120, 'Nhóm khuyến mại', '2025-03-24 08:13:37', 1, NULL, NULL, '2025-03-24 08:13:37'),
(121, 'Danh sách khuyến mại', '2025-03-24 08:14:06', 1, NULL, NULL, '2025-03-24 08:14:06'),
(122, 'Thêm mới khuyến mại', '2025-03-24 08:14:13', 1, NULL, NULL, '2025-03-24 08:14:13'),
(123, 'Lưu thêm mới khuyến mại', '2025-03-24 08:14:29', 1, NULL, NULL, '2025-03-24 08:14:29'),
(124, 'Chỉnh sửa khuyến mại', '2025-03-24 08:14:34', 1, NULL, NULL, '2025-03-24 08:14:34'),
(125, 'Cập nhật thông tin khuyến mại', '2025-03-24 08:14:46', 1, NULL, NULL, '2025-03-24 08:14:46'),
(126, 'Xóa khuyến mại', '2025-03-24 08:14:51', 1, NULL, NULL, '2025-03-24 08:14:51'),
(127, 'Danh sách loại khuyến mại', '2025-03-24 09:00:44', 1, NULL, NULL, '2025-03-24 09:00:44'),
(128, 'Thêm mới loại khuyến mại', '2025-03-24 09:00:48', 1, NULL, NULL, '2025-03-24 09:00:48'),
(129, 'Lưu thông tin loại khuyến mại', '2025-03-24 09:00:55', 1, NULL, NULL, '2025-03-24 09:00:55'),
(130, 'Chi tiết loại khuyến mại', '2025-03-24 09:01:00', 1, NULL, NULL, '2025-03-24 09:01:00'),
(131, 'Cập nhật loại khuyến mại', '2025-03-24 09:01:08', 1, NULL, NULL, '2025-03-24 09:01:08'),
(132, 'Xóa loại khuyến mại', '2025-03-24 09:01:11', 1, NULL, NULL, '2025-03-24 09:01:11'),
(133, 'Nhóm loại khuyến mại', '2025-03-24 09:16:13', 1, NULL, NULL, '2025-03-24 09:16:13'),
(134, 'Danh sách sản phẩm khuyến mại', '2025-03-24 10:54:47', 1, NULL, NULL, '2025-03-24 10:54:47'),
(135, 'Tạo mới sản phẩm khuyến mại', '2025-03-24 10:54:52', 1, NULL, NULL, '2025-03-24 10:54:52'),
(136, 'Lưu thông tin sản phẩm khuyến mại', '2025-03-24 10:55:00', 1, NULL, NULL, '2025-03-24 10:55:00'),
(137, 'Chi tiết sản phẩm khuyến mại', '2025-03-24 10:55:05', 1, NULL, NULL, '2025-03-24 10:55:05'),
(138, 'Cập nhật thông tin sản phẩm khuyến mại', '2025-03-24 10:55:10', 1, NULL, NULL, '2025-03-24 10:55:10'),
(139, 'Xóa sản phẩm khuyến mại', '2025-03-24 10:55:13', 1, NULL, NULL, '2025-03-24 10:55:13'),
(140, 'Nhóm sản phẩm khuyến mại', '2025-03-24 10:55:40', 1, NULL, NULL, '2025-03-24 10:55:40'),
(141, 'Cập nhật  trạng thái chi tiết sản phẩm khuyến mại', '2025-03-24 16:50:41', 1, NULL, NULL, '2025-03-24 16:50:41'),
(142, 'Danh sách settings', '2025-03-26 03:18:52', 1, NULL, NULL, '2025-03-26 03:18:52'),
(143, 'Thêm mới settings', '2025-03-26 03:19:03', 1, NULL, NULL, '2025-03-26 03:19:03'),
(144, 'Lưu thông tin thêm mới settings', '2025-03-26 03:19:11', 1, NULL, NULL, '2025-03-26 03:19:11'),
(145, 'Chi tiết settings', '2025-03-26 03:19:16', 1, NULL, NULL, '2025-03-26 03:19:16'),
(146, 'Cập nhật thông tin settings', '2025-03-26 03:19:21', 1, NULL, NULL, '2025-03-26 03:19:21'),
(147, 'Xóa settings', '2025-03-26 03:19:26', 1, NULL, NULL, '2025-03-26 03:19:26'),
(148, 'Nhóm settings', '2025-03-26 03:19:55', 1, NULL, NULL, '2025-03-26 03:19:55'),
(149, 'Nhóm email template', '2025-03-26 12:19:09', 1, NULL, NULL, '2025-03-26 12:19:09'),
(150, 'Danh sách email template', '2025-03-26 12:19:24', 1, NULL, NULL, '2025-03-26 12:19:24'),
(151, 'Tạo mới email template', '2025-03-26 12:19:31', 1, NULL, NULL, '2025-03-26 12:19:31'),
(152, 'Lưu thông tin mới email template', '2025-03-26 12:19:42', 1, NULL, NULL, '2025-03-26 12:19:42'),
(153, 'Chi tiết email template', '2025-03-26 12:19:50', 1, NULL, NULL, '2025-03-26 12:19:50'),
(154, 'Cập nhật thông tin email template', '2025-03-26 12:20:01', 1, NULL, NULL, '2025-03-26 12:20:01'),
(155, 'Xóa email template', '2025-03-26 12:20:10', 1, NULL, NULL, '2025-03-26 12:20:10'),
(156, 'Gửi mail', '2025-03-26 12:40:47', 1, NULL, NULL, '2025-03-26 12:40:47'),
(157, 'Active tài khoản người dùng', '2025-03-26 17:36:15', 1, NULL, NULL, '2025-03-26 17:36:15'),
(158, 'Đăng nhập khách hàng', '2025-03-27 03:12:21', 1, NULL, NULL, '2025-03-27 03:12:21'),
(159, 'Đăng ký khách hàng', '2025-03-27 03:12:31', 1, NULL, NULL, '2025-03-27 03:12:31'),
(160, 'Kích hoạt tài khoản khách hàng từ portal', '2025-03-27 06:53:23', 1, NULL, NULL, '2025-03-27 06:53:23'),
(161, 'Người dùng đăng nhập', '2025-03-27 09:32:30', 1, NULL, NULL, '2025-03-27 09:32:30'),
(162, 'Logout customer', '2025-03-27 12:17:20', 1, NULL, NULL, '2025-03-27 12:17:20'),
(163, 'Customer client', '2025-03-27 15:07:23', 1, NULL, NULL, '2025-03-27 15:07:23'),
(164, 'Trang portal', '2025-03-28 02:19:56', 1, NULL, NULL, '2025-03-28 02:19:56'),
(165, 'Lấy thông tin chi tiết khách hàng', '2025-03-28 02:46:29', 1, NULL, NULL, '2025-03-28 02:46:29'),
(166, 'Giỏ hàng client', '2025-03-28 04:08:42', 1, NULL, NULL, '2025-03-28 04:08:42'),
(167, 'Thêm sản phẩm vào giỏ hàng client', '2025-03-28 04:08:59', 1, NULL, NULL, '2025-03-28 04:08:59'),
(168, 'Đặt hàng client', '2025-03-28 04:09:08', 1, NULL, NULL, '2025-03-28 04:09:08'),
(169, 'Xem giỏ hàng client', '2025-03-28 04:20:52', 1, NULL, NULL, '2025-03-28 04:20:52'),
(170, 'Đơn hàng thành công', '2025-03-28 14:23:49', 1, NULL, NULL, '2025-03-28 14:23:49'),
(171, 'Nhóm banner', '2025-03-28 15:51:07', 1, NULL, NULL, '2025-03-28 15:51:07'),
(172, 'Danh sách banner', '2025-03-28 15:51:14', 1, NULL, NULL, '2025-03-28 15:51:14'),
(173, 'Tạo mới banner', '2025-03-28 15:51:17', 1, NULL, NULL, '2025-03-28 15:51:17'),
(174, 'Lưu thông tin banner', '2025-03-28 15:51:32', 1, NULL, NULL, '2025-03-28 15:51:32'),
(175, 'Chi tiết banner', '2025-03-28 15:51:39', 1, NULL, NULL, '2025-03-28 15:51:39'),
(176, 'Cập nhật banner', '2025-03-28 15:52:11', 1, NULL, NULL, '2025-03-28 15:52:11'),
(177, 'Xóa banner', '2025-03-28 15:52:17', 1, NULL, NULL, '2025-03-28 15:52:17');

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
(17, 'Tinh dầu hương hoa hồng', 3, 'uploads/1742789068_0fef2ddb38da3ffa5147.png', '2025-03-24 04:04:28', 1, 17, 17),
(18, 'Tinh dầu hương oải hương', 3, 'uploads/1742789094_9495af3e418021f4ab3f.jpg', '2025-03-24 04:04:54', 1, 17, 17),
(19, 'Tinh dầu hương hoa nhài', 3, 'uploads/1742789115_720593bbaddca0ab27dc.png', '2025-03-24 04:05:15', 1, 17, 17),
(20, 'Tinh dầu hương hoa anh đào', 3, 'uploads/1742789143_30bea010de609fc0915c.png', '2025-03-24 04:05:43', 1, 17, 17),
(21, 'Tinh dầu hương trà xanh', 3, 'uploads/1742789167_3eb17e904d37faa037ed.jpg', '2025-03-24 04:06:07', 1, 17, 17),
(22, 'Tinh dầu hương cam ngọt', 3, 'uploads/1742789187_7e22271bf729c02d1623.png', '2025-03-24 04:06:27', 1, 17, 17),
(23, 'Tinh dầu hương vàng chanh', 3, 'uploads/1742789213_018c8a6019bceaaeb784.jpg', '2025-03-24 04:06:53', 1, 17, 17),
(24, 'Tinh dầu hương chanh xả', 3, 'uploads/1742789253_b2ba195d9899e9956efb.png', '2025-03-24 04:07:33', 1, 17, 17),
(26, 'Tinh dầu hương  hoa hồng', 3, 'uploads/tinh-dau-huong-hoa-hong-1', '2025-03-24 05:02:14', 1, 17, 17);

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
(7, 17, 6, 1, 17, '2025-03-24 04:04:28', 17, '2025-03-24 04:04:28'),
(8, 17, 7, 1, 17, '2025-03-24 04:04:28', 17, '2025-03-24 04:04:28'),
(9, 17, 8, 1, 17, '2025-03-24 04:04:28', 17, '2025-03-24 04:04:28'),
(10, 18, 6, 1, 17, '2025-03-24 04:04:54', 17, '2025-03-24 04:04:54'),
(11, 18, 7, 1, 17, '2025-03-24 04:04:54', 17, '2025-03-24 04:04:54'),
(12, 18, 8, 1, 17, '2025-03-24 04:04:54', 17, '2025-03-24 04:04:54'),
(13, 19, 6, 1, 17, '2025-03-24 04:05:15', 17, '2025-03-24 04:05:15'),
(14, 19, 7, 1, 17, '2025-03-24 04:05:15', 17, '2025-03-24 04:05:15'),
(15, 19, 8, 1, 17, '2025-03-24 04:05:15', 17, '2025-03-24 04:05:15'),
(16, 20, 6, 1, 17, '2025-03-24 04:05:43', 17, '2025-03-24 04:05:43'),
(17, 20, 7, 1, 17, '2025-03-24 04:05:43', 17, '2025-03-24 04:05:43'),
(18, 20, 8, 1, 17, '2025-03-24 04:05:43', 17, '2025-03-24 04:05:43'),
(19, 21, 6, 1, 17, '2025-03-24 04:06:07', 17, '2025-03-24 04:06:07'),
(20, 21, 7, 1, 17, '2025-03-24 04:06:07', 17, '2025-03-24 04:06:07'),
(21, 21, 8, 1, 17, '2025-03-24 04:06:07', 17, '2025-03-24 04:06:07'),
(22, 22, 6, 1, 17, '2025-03-24 04:06:27', 17, '2025-03-24 04:06:27'),
(23, 22, 7, 1, 17, '2025-03-24 04:06:27', 17, '2025-03-24 04:06:27'),
(24, 22, 8, 1, 17, '2025-03-24 04:06:27', 17, '2025-03-24 04:06:27'),
(25, 23, 6, 1, 17, '2025-03-24 04:06:53', 17, '2025-03-24 04:06:53'),
(26, 23, 7, 1, 17, '2025-03-24 04:06:53', 17, '2025-03-24 04:06:53'),
(27, 23, 8, 1, 17, '2025-03-24 04:06:53', 17, '2025-03-24 04:06:53'),
(28, 24, 6, 1, 17, '2025-03-24 04:07:33', 17, '2025-03-24 04:07:33'),
(29, 24, 7, 1, 17, '2025-03-24 04:07:33', 17, '2025-03-24 04:07:33'),
(30, 24, 8, 1, 17, '2025-03-24 04:07:33', 17, '2025-03-24 04:07:33'),
(34, 26, 6, 1, 17, '2025-03-24 05:02:14', 17, '2025-03-24 05:02:14'),
(35, 26, 7, 1, 17, '2025-03-24 05:02:14', 17, '2025-03-24 05:02:14'),
(36, 26, 8, 1, 17, '2025-03-24 05:02:14', 17, '2025-03-24 05:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_discounts`
--

CREATE TABLE `product_discounts` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) DEFAULT NULL,
  `discount_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_discounts`
--

INSERT INTO `product_discounts` (`id`, `created_at`, `is_active`, `created_by`, `updated_by`, `name`, `discount_id`) VALUES
(1, '2025-03-24 15:51:44', 1, 17, 17, 'Flash sale 4', 5),
(2, '2025-03-24 15:53:45', 1, 17, 1, 'Flash sale  1', 5),
(3, '2025-03-24 15:54:09', 1, 17, 1, 'Flash sale  2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_discount_details`
--

CREATE TABLE `product_discount_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_discount_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_discount_details`
--

INSERT INTO `product_discount_details` (`id`, `product_id`, `is_active`, `created_at`, `created_by`, `updated_by`, `updated_at`, `product_discount_id`) VALUES
(1, 24, 1, '2025-03-24 15:51:44', 17, NULL, '2025-03-24 15:51:44', 1),
(2, 22, 1, '2025-03-24 15:51:44', 17, NULL, '2025-03-25 04:49:19', 1),
(3, 20, 1, '2025-03-24 15:51:44', 17, NULL, '2025-03-25 04:49:19', 1),
(4, 18, 1, '2025-03-24 15:51:44', 17, NULL, '2025-03-25 04:49:20', 1),
(5, 24, 1, '2025-03-24 15:53:45', 17, NULL, '2025-03-24 15:53:45', 2),
(6, 22, 1, '2025-03-24 15:53:45', 17, NULL, '2025-03-24 15:53:45', 2),
(7, 20, 1, '2025-03-24 15:53:45', 17, NULL, '2025-03-24 15:53:45', 2),
(8, 18, 1, '2025-03-24 15:53:45', 17, NULL, '2025-03-24 15:53:45', 2),
(9, 24, 1, '2025-03-24 15:54:09', 17, NULL, '2025-03-24 15:54:09', 3),
(10, 22, 1, '2025-03-24 15:54:09', 17, NULL, '2025-03-24 15:54:09', 3),
(11, 20, 1, '2025-03-24 15:54:09', 17, NULL, '2025-03-24 15:54:09', 3),
(12, 18, 1, '2025-03-24 15:54:09', 17, NULL, '2025-03-24 15:54:09', 3),
(13, 23, 0, '2025-03-24 16:51:40', 17, NULL, '2025-03-24 16:57:22', 1),
(14, 21, 0, '2025-03-24 16:51:42', 17, NULL, '2025-03-24 16:57:22', 1),
(15, 19, 0, '2025-03-24 16:51:43', 17, NULL, '2025-03-24 16:57:28', 1),
(16, 17, 0, '2025-03-24 16:51:43', 17, NULL, '2025-03-24 16:57:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_prices`
--

CREATE TABLE `product_prices` (
  `id` int(11) NOT NULL,
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

INSERT INTO `product_prices` (`id`, `product_id`, `price`, `start_date`, `end_date`, `created_at`, `is_active`, `created_by`, `updated_by`) VALUES
(1, 16, 25000.00, '0000-00-00', NULL, '2025-03-23 15:18:13', 1, 17, 17),
(2, 15, 20000.00, '0000-00-00', NULL, '2025-03-23 15:19:32', 1, 17, 17),
(3, 24, 25000.00, '0000-00-00', NULL, '2025-03-24 04:10:15', 1, 17, 17),
(4, 23, 25000.00, '0000-00-00', NULL, '2025-03-24 04:10:29', 1, 17, 17),
(5, 22, 25000.00, '0000-00-00', NULL, '2025-03-24 04:10:31', 1, 17, 17),
(6, 21, 25000.00, '0000-00-00', NULL, '2025-03-24 04:10:33', 1, 17, 17),
(7, 20, 25000.00, '0000-00-00', NULL, '2025-03-24 04:10:35', 1, 17, 17),
(8, 19, 25000.00, '0000-00-00', NULL, '2025-03-24 04:10:37', 1, 17, 17),
(9, 18, 25000.00, '0000-00-00', NULL, '2025-03-24 04:10:39', 1, 17, 17),
(10, 17, 25000.00, '0000-00-00', NULL, '2025-03-24 04:10:41', 1, 17, 17);

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
(161, 1, 118, 1, NULL, NULL, '2025-03-23 15:08:41', '2025-03-23 15:08:41'),
(162, 1, 119, 1, NULL, NULL, '2025-03-24 05:50:50', '2025-03-24 05:50:50'),
(163, 1, 121, 1, NULL, NULL, '2025-03-24 08:14:58', '2025-03-24 08:14:58'),
(164, 1, 122, 1, NULL, NULL, '2025-03-24 08:14:58', '2025-03-24 08:14:58'),
(165, 1, 123, 1, NULL, NULL, '2025-03-24 08:15:00', '2025-03-24 08:15:00'),
(166, 1, 124, 1, NULL, NULL, '2025-03-24 08:15:01', '2025-03-24 08:15:01'),
(167, 1, 125, 1, NULL, NULL, '2025-03-24 08:15:01', '2025-03-24 08:15:01'),
(168, 1, 126, 1, NULL, NULL, '2025-03-24 10:38:27', '2025-03-24 10:38:27'),
(169, 1, 132, 1, NULL, NULL, '2025-03-24 09:01:17', '2025-03-24 09:01:17'),
(170, 1, 131, 1, NULL, NULL, '2025-03-24 09:01:17', '2025-03-24 09:01:17'),
(171, 1, 130, 1, NULL, NULL, '2025-03-24 09:01:20', '2025-03-24 09:01:20'),
(172, 1, 129, 1, NULL, NULL, '2025-03-24 09:01:20', '2025-03-24 09:01:20'),
(173, 1, 128, 1, NULL, NULL, '2025-03-24 09:01:21', '2025-03-24 09:01:21'),
(174, 1, 127, 1, NULL, NULL, '2025-03-24 09:01:21', '2025-03-24 09:01:21'),
(175, 1, 133, 1, NULL, NULL, '2025-03-24 09:16:19', '2025-03-24 09:16:19'),
(176, 1, 120, 1, NULL, NULL, '2025-03-24 09:16:22', '2025-03-24 09:16:22'),
(177, 1, 139, 1, NULL, NULL, '2025-03-24 10:55:21', '2025-03-24 10:55:21'),
(178, 1, 138, 1, NULL, NULL, '2025-03-24 10:55:21', '2025-03-24 10:55:21'),
(179, 1, 137, 1, NULL, NULL, '2025-03-24 10:55:22', '2025-03-24 10:55:22'),
(180, 1, 136, 1, NULL, NULL, '2025-03-24 10:55:22', '2025-03-24 10:55:22'),
(181, 1, 135, 1, NULL, NULL, '2025-03-24 10:55:23', '2025-03-24 10:55:23'),
(182, 1, 134, 1, NULL, NULL, '2025-03-24 10:55:23', '2025-03-24 10:55:23'),
(183, 1, 140, 1, NULL, NULL, '2025-03-24 10:55:47', '2025-03-24 10:55:47'),
(184, 1, 141, 1, NULL, NULL, '2025-03-24 16:50:46', '2025-03-24 16:50:46'),
(185, 1, 147, 1, NULL, NULL, '2025-03-26 03:19:34', '2025-03-26 03:19:34'),
(186, 1, 146, 1, NULL, NULL, '2025-03-26 03:19:35', '2025-03-26 03:19:35'),
(187, 1, 145, 1, NULL, NULL, '2025-03-26 03:19:35', '2025-03-26 03:19:35'),
(188, 1, 144, 1, NULL, NULL, '2025-03-26 03:19:35', '2025-03-26 03:19:35'),
(189, 1, 143, 1, NULL, NULL, '2025-03-26 03:19:36', '2025-03-26 03:19:36'),
(190, 1, 142, 1, NULL, NULL, '2025-03-26 03:19:36', '2025-03-26 03:19:36'),
(191, 1, 148, 1, NULL, NULL, '2025-03-26 03:20:02', '2025-03-26 03:20:02'),
(192, 1, 155, 1, NULL, NULL, '2025-03-26 12:20:15', '2025-03-26 12:20:15'),
(193, 1, 154, 1, NULL, NULL, '2025-03-26 12:20:15', '2025-03-26 12:20:15'),
(194, 1, 153, 1, NULL, NULL, '2025-03-26 12:20:16', '2025-03-26 12:20:16'),
(195, 1, 152, 1, NULL, NULL, '2025-03-26 12:20:17', '2025-03-26 12:20:17'),
(196, 1, 151, 1, NULL, NULL, '2025-03-26 12:20:17', '2025-03-26 12:20:17'),
(197, 1, 150, 1, NULL, NULL, '2025-03-26 12:20:18', '2025-03-26 12:20:18'),
(198, 1, 149, 1, NULL, NULL, '2025-03-26 12:20:19', '2025-03-26 12:20:19'),
(199, 1, 156, 1, NULL, NULL, '2025-03-26 12:40:52', '2025-03-26 12:40:52'),
(200, 1, 157, 1, NULL, NULL, '2025-03-26 17:36:21', '2025-03-26 17:36:21'),
(201, 1, 158, 1, NULL, NULL, '2025-03-27 03:12:37', '2025-03-27 03:12:37'),
(202, 1, 159, 1, NULL, NULL, '2025-03-27 03:12:38', '2025-03-27 03:12:38'),
(203, 1, 160, 1, NULL, NULL, '2025-03-27 06:53:29', '2025-03-27 06:53:29'),
(204, 1, 161, 1, NULL, NULL, '2025-03-27 09:32:35', '2025-03-27 09:32:35'),
(205, 1, 162, 1, NULL, NULL, '2025-03-27 12:17:28', '2025-03-27 12:17:28'),
(206, 1, 163, 1, NULL, NULL, '2025-03-27 15:07:28', '2025-03-27 15:07:28'),
(207, 1, 164, 1, NULL, NULL, '2025-03-28 02:20:03', '2025-03-28 02:20:03'),
(208, 1, 165, 1, NULL, NULL, '2025-03-28 02:46:34', '2025-03-28 02:46:34'),
(209, 1, 166, 1, NULL, NULL, '2025-03-28 04:09:16', '2025-03-28 04:09:16'),
(210, 1, 167, 1, NULL, NULL, '2025-03-28 04:09:16', '2025-03-28 04:09:16'),
(211, 1, 168, 1, NULL, NULL, '2025-03-28 04:09:16', '2025-03-28 04:09:16'),
(212, 1, 169, 1, NULL, NULL, '2025-03-28 04:21:09', '2025-03-28 04:21:09'),
(213, 1, 170, 1, NULL, NULL, '2025-03-28 14:23:54', '2025-03-28 14:23:54'),
(214, 1, 177, 1, NULL, NULL, '2025-03-28 15:52:25', '2025-03-28 15:52:25'),
(215, 1, 176, 1, NULL, NULL, '2025-03-28 15:52:26', '2025-03-28 15:52:26'),
(216, 1, 175, 1, NULL, NULL, '2025-03-28 15:52:27', '2025-03-28 15:52:27'),
(217, 1, 174, 1, NULL, NULL, '2025-03-28 15:52:27', '2025-03-28 15:52:27'),
(218, 1, 173, 1, NULL, NULL, '2025-03-28 15:52:27', '2025-03-28 15:52:27'),
(219, 1, 172, 1, NULL, NULL, '2025-03-28 15:52:28', '2025-03-28 15:52:28'),
(220, 1, 171, 1, NULL, NULL, '2025-03-28 15:52:28', '2025-03-28 15:52:28');

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
  `permission_id` int(11) NOT NULL,
  `is_ignore` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `method`, `uri`, `controller`, `filters`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`, `is_group`, `parent_id`, `level`, `permission_id`, `is_ignore`) VALUES
(98, '', 'admin', '', '', '2025-03-19 08:52:25', '2025-03-20 04:43:04', '17', '17', 1, 1, NULL, 1, 42, 0),
(99, 'GET', '', 'Admin\\DashboardController::index', '', '2025-03-19 08:56:17', '2025-03-20 04:26:00', '17', '17', 1, NULL, 98, 2, 38, 0),
(100, 'GET', 'dashboard', 'Admin\\DashboardController::index', 'DashboardControllerIndex', '2025-03-19 08:56:43', '2025-03-20 04:26:12', '17', '17', 1, NULL, 98, 2, 38, 0),
(101, 'GET', 'language/(:segment)', 'Admin\\LanguageController::switch/$1', '', '2025-03-19 08:57:01', '2025-03-20 04:43:47', '17', '17', 1, NULL, 98, 2, 43, 0),
(102, '', 'common', '', '', '2025-03-19 08:57:21', '2025-03-20 04:46:10', '17', '17', 1, 1, 98, 2, 44, 0),
(103, '', 'warehouse', '', '', '2025-03-19 08:57:39', '2025-03-20 04:47:56', '17', '17', 1, 1, 98, 2, 45, 0),
(104, 'GET', '', 'Admin\\WarehouseController::index', '', '2025-03-19 08:59:21', '2025-03-20 04:48:15', '17', '17', 1, NULL, 103, 3, 46, 0),
(105, 'GET', 'create', 'Admin\\WarehouseController::create', '', '2025-03-19 08:59:58', '2025-03-20 04:48:30', '17', '17', 1, NULL, 103, 3, 7, 0),
(106, 'POST', 'save', 'Admin\\WarehouseController::save', '', '2025-03-19 09:00:10', '2025-03-21 10:01:35', '17', '17', 1, NULL, 103, 3, 115, 0),
(107, 'GET', 'detail/(:num)', 'Admin\\WarehouseController::detail/$1', '', '2025-03-19 09:00:52', '2025-03-20 04:50:06', '17', '17', 1, NULL, 103, 3, 47, 0),
(108, 'POST', 'update/(:num)', 'Admin\\WarehouseController::update/$1', '', '2025-03-19 09:01:07', '2025-03-20 04:50:22', '17', '17', 1, NULL, 103, 3, 8, 0),
(109, 'GET', 'delete/(:num)', 'Admin\\WarehouseController::delete/$1', '', '2025-03-19 09:01:42', '2025-03-20 04:50:32', '17', '17', 1, NULL, 103, 3, 9, 0),
(110, '', 'product', '', '', '2025-03-19 09:02:46', '2025-03-20 04:52:54', '17', '17', 1, 1, 98, 2, 48, 0),
(111, 'GET', '', 'Admin\\ProductController::index', '', '2025-03-19 09:03:01', '2025-03-20 04:53:02', '17', '17', 1, NULL, 110, 3, 49, 0),
(112, 'GET', 'index', 'Admin\\ProductController::index', '', '2025-03-19 09:03:22', '2025-03-20 04:53:08', '17', '17', 1, NULL, 110, 3, 49, 0),
(113, 'GET', 'create', 'Admin\\ProductController::create', '', '2025-03-19 09:03:33', '2025-03-20 04:53:53', '17', '17', 1, NULL, 110, 3, 4, 0),
(114, 'POST', 'save', 'Admin\\ProductController::save', '', '2025-03-19 09:03:51', '2025-03-21 10:01:57', '17', '17', 1, NULL, 110, 3, 50, 0),
(115, 'GET', 'detail/(:num)', 'Admin\\ProductController::detail/$1', '', '2025-03-19 09:04:15', '2025-03-21 05:34:19', '17', '17', 1, NULL, 110, 3, 51, 0),
(116, 'POST', 'update/(:num)', 'Admin\\WarehouseController::update/$1', '', '2025-03-19 09:04:27', '2025-03-21 09:59:32', '17', '17', 1, NULL, 110, 3, 8, 0),
(124, 'POST', 'update/(:num)', 'Admin\\ProductController::update/$1', '', '2025-03-19 09:08:25', '2025-03-20 05:02:31', '17', '17', 1, NULL, 110, 3, 5, 0),
(125, 'GET', 'delete/(:num)', 'Admin\\ProductController::delete/$1', '', '2025-03-19 09:08:40', '2025-03-23 16:15:35', '17', '17', 1, NULL, 110, 3, 6, 0),
(126, 'GET', 'best-selling-management', 'Admin\\ProductController::bestSellingProduct', '', '2025-03-19 09:08:50', '2025-03-20 05:04:16', '17', '17', 1, NULL, 110, 3, 52, 0),
(127, 'GET', 'price-management', 'Admin\\ProductController::priceProductManagement', '', '2025-03-19 09:08:58', '2025-03-20 05:04:26', '17', '17', 1, NULL, 110, 3, 53, 0),
(128, 'GET', 'discount-management', 'Admin\\ProductController::discountProductManagement', '', '2025-03-19 09:09:07', '2025-03-20 05:04:32', '17', '17', 1, NULL, 110, 3, 54, 0),
(130, '', 'category', '', '', '2025-03-19 09:10:17', '2025-03-20 05:06:09', '17', '17', 1, 1, 98, 2, 55, 0),
(131, 'GET', '', 'Admin\\CategoryController::index', '', '2025-03-19 09:10:29', '2025-03-20 05:06:17', '17', '17', 1, NULL, 130, 3, 56, 0),
(132, 'GET', 'index', 'Admin\\CategoryController::index', '', '2025-03-19 09:10:35', '2025-03-20 05:06:24', '17', '17', 1, NULL, 130, 3, 56, 0),
(133, 'GET', 'create', 'Admin\\CategoryController::create', '', '2025-03-19 09:10:54', '2025-03-27 10:27:07', '17', '17', 1, NULL, 130, 3, 1, 0),
(134, 'POST', 'save', 'Admin\\CategoryController::save', '', '2025-03-19 09:11:06', '2025-03-20 05:07:08', '17', '17', 1, NULL, 130, 3, 58, 0),
(135, 'GET', 'detail/(:num)', 'Admin\\CategoryController::detail/$1', '', '2025-03-19 09:11:41', '2025-03-20 05:07:13', '17', '17', 1, NULL, 130, 3, 57, 0),
(136, 'POST', 'update/(:num)', 'Admin\\CategoryController::update/$1', '', '2025-03-19 09:11:52', '2025-03-20 05:07:33', '17', '17', 1, NULL, 130, 3, 2, 0),
(137, 'GET', 'delete/(:num)', 'Admin\\CategoryController::delete/$1', '', '2025-03-19 09:12:00', '2025-03-20 05:07:42', '17', '17', 1, NULL, 130, 3, 3, 0),
(139, '', 'transaction', '', '', '2025-03-19 09:12:26', '2025-03-20 05:09:01', '17', '17', 1, 1, 98, 2, 60, 0),
(140, 'GET', 'create', 'Admin\\TransactionController::create', '', '2025-03-19 09:12:37', '2025-03-20 05:09:26', '17', '17', 1, NULL, 139, 3, 10, 0),
(141, 'POST', 'save', 'Admin\\TransactionController::save', '', '2025-03-19 09:12:47', '2025-03-20 05:09:50', '17', '17', 1, NULL, 139, 3, 61, 0),
(142, 'GET', 'detail/(:num)', 'Admin\\TransactionController::detail/$1', '', '2025-03-19 09:12:57', '2025-03-20 05:10:16', '17', '17', 1, NULL, 139, 3, 62, 0),
(143, 'POST', 'update/(:num)', 'Admin\\TransactionController::update/$1', '', '2025-03-19 09:13:09', '2025-03-20 05:10:25', '17', '17', 1, NULL, 139, 3, 11, 0),
(144, 'GET', 'delete/(:num)', 'Admin\\TransactionController::delete/$1', '', '2025-03-19 09:13:20', '2025-03-20 05:10:34', '17', '17', 1, NULL, 139, 3, 12, 0),
(145, 'GET', 'export-list', 'Admin\\TransactionController::exportList', '', '2025-03-19 09:13:29', '2025-03-20 05:11:18', '17', '17', 1, NULL, 139, 3, 64, 0),
(146, 'GET', 'import-list', 'Admin\\TransactionController::importList', '', '2025-03-19 09:13:38', '2025-03-20 05:11:25', '17', '17', 1, NULL, 139, 3, 63, 0),
(147, '', 'supplier', '', '', '2025-03-19 09:14:08', '2025-03-20 05:21:31', '17', '17', 1, 1, 98, 2, 65, 0),
(148, 'GET', '', 'Admin\\SupplierController::index', '', '2025-03-19 09:14:42', '2025-03-20 05:22:10', '17', '17', 1, NULL, 147, 3, 67, 0),
(149, 'GET', 'index', 'Admin\\SupplierController::index', '', '2025-03-19 09:14:48', '2025-03-20 05:22:16', '17', '17', 1, NULL, 147, 3, 67, 0),
(150, 'GET', 'create', 'Admin\\SupplierController::create', '', '2025-03-19 09:14:56', '2025-03-20 05:22:27', '17', '17', 1, NULL, 147, 3, 19, 0),
(151, 'POST', 'save', 'Admin\\SupplierController::save', '', '2025-03-19 09:15:05', '2025-03-20 05:22:40', '17', '17', 1, NULL, 147, 3, 66, 0),
(152, 'GET', 'detail/(:num)', 'Admin\\SupplierController::detail/$1', '', '2025-03-19 09:15:15', '2025-03-20 05:23:15', '17', '17', 1, NULL, 147, 3, 68, 0),
(153, 'POST', 'update/(:num)', 'Admin\\SupplierController::update/$1', '', '2025-03-19 09:15:27', '2025-03-20 05:23:34', '17', '17', 1, NULL, 147, 3, 20, 0),
(154, 'GET', 'delete/(:num)', 'Admin\\SupplierController::delete/$1', '', '2025-03-19 09:15:35', '2025-03-20 05:23:41', '17', '17', 1, NULL, 147, 3, 21, 0),
(155, '', 'customer', '', '', '2025-03-19 09:16:13', '2025-03-20 05:25:40', '17', '17', 1, 1, 98, 2, 69, 0),
(156, 'GET', '', 'Admin\\CustomerController::index', '', '2025-03-19 09:16:23', '2025-03-20 16:30:54', '17', '17', 1, NULL, 155, 3, 15, 0),
(157, 'GET', 'index', 'Admin\\CustomerController::index', '', '2025-03-19 09:16:27', '2025-03-20 05:26:00', '17', '17', 1, NULL, 155, 3, 70, 0),
(158, 'GET', 'create', 'Admin\\CustomerController::create', '', '2025-03-19 09:16:35', '2025-03-20 05:27:48', '17', '17', 1, NULL, 155, 3, 73, 0),
(159, 'POST', 'save', 'Portal\\CustomerClientController::save', '', '2025-03-19 09:16:43', '2025-03-27 22:09:32', '17', '17', 1, NULL, 273, 3, 71, 1),
(160, 'GET', 'detail/(:num)', 'Admin\\CustomerController::detail/$1', '', '2025-03-19 09:16:51', '2025-03-20 06:13:46', '17', '17', 1, NULL, 155, 3, 16, 0),
(161, 'POST', 'update/(:num)', 'Admin\\CustomerController::update/$1', '', '2025-03-19 09:17:01', '2025-03-20 06:14:02', '17', '17', 1, NULL, 155, 3, 72, 0),
(162, 'GET', 'delete/(:num)', 'Admin\\CustomerController::delete/$1', '', '2025-03-19 09:17:20', '2025-03-20 06:14:11', '17', '17', 1, NULL, 155, 3, 18, 0),
(163, '', 'account', '', '', '2025-03-19 09:17:31', '2025-03-20 06:18:51', '17', '17', 1, 1, 98, 2, 74, 0),
(164, 'GET', 'index', 'Admin\\AccountController::index', '', '2025-03-19 09:17:46', '2025-03-20 06:19:01', '17', '17', 1, NULL, 163, 3, 75, 0),
(165, 'GET', 'index', 'Admin\\AccountController::index', '', '2025-03-19 09:17:54', '2025-03-20 04:33:48', '17', '17', 1, NULL, 163, 3, 39, 0),
(166, 'GET', 'create', 'Admin\\AccountController::create', '', '2025-03-19 09:18:02', '2025-03-20 06:19:06', '17', '17', 1, NULL, 163, 3, 76, 0),
(167, 'POST', 'save', 'Admin\\AccountController::save', '', '2025-03-19 09:18:13', '2025-03-20 06:19:12', '17', '17', 1, NULL, 163, 3, 77, 0),
(168, 'GET', 'detail/(:num)', 'Admin\\AccountController::detail/$1', '', '2025-03-19 09:18:23', '2025-03-20 06:19:20', '17', '17', 1, NULL, 163, 3, 78, 0),
(169, 'POST', 'update/(:num)', 'Admin\\AccountController::update/$1', '', '2025-03-19 09:18:32', '2025-03-20 04:32:24', '17', '17', 1, NULL, 163, 3, 23, 0),
(170, 'GET', 'delete/(:num)', 'Admin\\AccountController::delete/$1', '', '2025-03-19 09:18:41', '2025-03-20 06:19:34', '17', '17', 1, NULL, 163, 3, 80, 0),
(171, 'GET', 'login', 'Admin\\AccountController::login', '', '2025-03-19 09:18:51', '2025-03-27 10:19:25', '17', '17', 1, NULL, 163, 3, 0, 1),
(172, 'GET', 'logout', 'Admin\\AccountController::logout', '', '2025-03-19 09:18:59', '2025-03-27 10:19:32', '17', '17', 1, NULL, 163, 3, 0, 1),
(174, '', 'role', '', '', '2025-03-19 09:19:37', '2025-03-20 06:31:10', '17', '17', 1, 1, 98, 2, 81, 0),
(175, 'GET', '', 'Admin\\RoleController::index', '', '2025-03-19 09:19:45', '2025-03-20 06:31:22', '17', '17', 1, NULL, 174, 3, 82, 0),
(176, 'GET', 'index', 'Admin\\RoleController::index', '', '2025-03-19 09:19:49', '2025-03-20 06:36:39', '17', '17', 1, NULL, 174, 3, 82, 0),
(177, 'GET', 'create', 'Admin\\RoleController::create', '', '2025-03-19 09:19:56', '2025-03-20 06:36:47', '17', '17', 1, NULL, 174, 3, 83, 0),
(178, 'POST', 'save', 'Admin\\RoleController::save', '', '2025-03-19 09:20:05', '2025-03-20 06:36:54', '17', '17', 1, NULL, 174, 3, 84, 0),
(179, 'GET', 'detail/(:num)', 'Admin\\RoleController::detail/$1', '', '2025-03-19 09:20:17', '2025-03-20 06:37:04', '17', '17', 1, NULL, 174, 3, 85, 0),
(180, 'POST', 'update/(:num)', 'Admin\\RoleController::update/$1', '', '2025-03-19 09:20:21', '2025-03-20 06:37:13', '17', '17', 1, NULL, 174, 3, 86, 0),
(181, 'GET', 'delete/(:num)', 'Admin\\RoleController::delete/$1', '', '2025-03-19 09:20:47', '2025-03-20 06:37:20', '17', '17', 1, NULL, 174, 3, 87, 0),
(182, '', 'permission', '', '', '2025-03-19 09:21:05', '2025-03-20 06:55:19', '17', '17', 1, 1, 98, 2, 94, 0),
(183, 'GET', '', 'Admin\\PermissionController::index', '', '2025-03-19 09:21:23', '2025-03-20 06:54:54', '17', '17', 1, NULL, 182, 3, 88, 0),
(184, 'GET', 'index', 'Admin\\PermissionController::index', '', '2025-03-19 09:21:28', '2025-03-20 06:55:29', '17', '17', 1, NULL, 182, 3, 88, 0),
(185, 'GET', 'create', 'Admin\\PermissionController::create', '', '2025-03-19 09:21:42', '2025-03-20 06:55:35', '17', '17', 1, NULL, 182, 3, 89, 0),
(186, 'POST', 'save', 'Admin\\PermissionController::save', '', '2025-03-19 09:21:48', '2025-03-20 06:55:44', '17', '17', 1, NULL, 182, 3, 90, 0),
(187, 'GET', 'detail/(:num)', 'Admin\\PermissionController::detail/$1', '', '2025-03-19 09:21:57', '2025-03-20 06:55:53', '17', '17', 1, NULL, 182, 3, 91, 0),
(188, 'POST', 'update/(:num)', 'Admin\\PermissionController::update/$1', '', '2025-03-19 09:22:08', '2025-03-20 06:56:07', '17', '17', 1, NULL, 182, 3, 92, 0),
(189, '', 'role-permission', '', '', '2025-03-19 09:22:25', '2025-03-20 06:58:03', '17', '17', 1, 1, 98, 2, 95, 0),
(190, 'GET', '', 'Admin\\RolePermissionController::index', '', '2025-03-19 09:22:33', '2025-03-20 06:58:14', '17', '17', 1, NULL, 189, 3, 96, 0),
(191, 'GET', 'index', 'Admin\\RolePermissionController::index', '', '2025-03-19 09:22:36', '2025-03-20 06:58:22', '17', '17', 1, NULL, 189, 3, 96, 0),
(192, 'GET', 'create', 'Admin\\RolePermissionController::create', '', '2025-03-19 09:22:55', '2025-03-20 06:58:30', '17', '17', 1, NULL, 189, 3, 97, 0),
(193, 'POST', 'save', 'Admin\\RolePermissionController::save', '', '2025-03-19 09:23:03', '2025-03-20 06:58:38', '17', '17', 1, NULL, 189, 3, 98, 0),
(194, 'GET', 'detail/(:num)', 'Admin\\RolePermissionController::detail/$1', '', '2025-03-19 09:23:17', '2025-03-20 06:58:46', '17', '17', 1, NULL, 189, 3, 99, 0),
(195, 'POST', 'update/(:num)', 'Admin\\RolePermissionController::update/$1', '', '2025-03-19 09:23:37', '2025-03-20 06:58:54', '17', '17', 1, NULL, 189, 3, 100, 0),
(196, 'POST', 'change-role-permission', 'Admin\\RolePermissionController::changeRolePermission', '', '2025-03-19 09:23:47', '2025-03-20 07:00:47', '17', '17', 1, NULL, 189, 3, 102, 0),
(197, '', 'route', '', '', '2025-03-19 09:23:59', '2025-03-20 07:01:17', '17', '17', 1, 1, 98, 2, 103, 0),
(198, 'GET', '', 'Admin\\RouteController::index', '', '2025-03-19 09:24:07', '2025-03-20 03:31:30', '17', '17', 1, NULL, 197, 3, 33, 0),
(199, 'GET', 'index', 'Admin\\RouteController::index', '', '2025-03-19 09:24:11', '2025-03-20 03:31:39', '17', '17', 1, NULL, 197, 3, 33, 0),
(200, 'GET', 'create', 'Admin\\RouteController::create', '', '2025-03-19 09:24:17', '2025-03-20 03:31:46', '17', '17', 1, NULL, 197, 3, 34, 0),
(201, 'POST', 'save', 'Admin\\RouteController::save', '', '2025-03-19 09:24:24', '2025-03-20 07:02:15', '17', '17', 1, NULL, 197, 3, 104, 0),
(202, 'GET', 'detail/(:num)', 'Admin\\RouteController::detail/$1', '', '2025-03-19 09:24:39', '2025-03-20 03:32:18', '17', '17', 1, NULL, 197, 3, 35, 0),
(203, 'POST', 'update/(:num)', 'Admin\\RouteController::update/$1', '', '2025-03-19 09:24:54', '2025-03-20 03:32:26', '17', '17', 1, NULL, 197, 3, 36, 0),
(204, 'GET', 'delete/(:num)', 'Admin\\RouteController::delete/$1', '', '2025-03-19 09:25:11', '2025-03-20 03:32:32', '17', '17', 1, NULL, 197, 3, 37, 0),
(205, '', 'order', '', '', '2025-03-19 10:07:45', '2025-03-20 07:02:08', '17', '17', 1, 1, 98, 2, 105, 0),
(206, 'GET', '', 'Admin\\OrderController::index', 'OrderControllerIndex', '2025-03-19 10:08:48', '2025-03-20 07:03:48', '17', '17', 1, NULL, 205, 3, 106, 0),
(207, 'POST', 'change-status', 'Admin\\CommonController::changeStatusRecordCommon', '', '2025-03-19 11:10:42', '2025-03-20 07:03:55', '17', '17', 1, NULL, 102, 3, 107, 0),
(208, 'GET', '/', 'Portal\\HomeController::index', '', '2025-03-19 16:47:35', '2025-03-27 10:51:47', '17', '17', 1, NULL, NULL, 1, 40, 1),
(209, 'GET', 'home', 'Portal\\HomeController::index', '', '2025-03-19 16:47:56', '2025-03-28 11:44:14', '17', '17', 1, NULL, 275, 1, 40, 1),
(210, 'GET', 'upload', 'Admin\\UploadController::uploadImage', '', '2025-03-19 16:48:17', '2025-03-27 10:40:34', '17', '17', 1, NULL, NULL, 1, 0, 1),
(211, 'GET', 'manager-file', 'Admin\\UploadController::managerFile', '', '2025-03-19 16:48:37', '2025-03-20 04:41:16', '17', '17', 1, NULL, NULL, 1, 41, 0),
(212, 'GET', '', 'Admin\\AccountController::index', '', '2025-03-20 02:53:51', '2025-03-20 04:33:33', '17', '17', 1, NULL, 163, 3, 39, 0),
(214, 'GET', 'index', 'Admin\\ProductAttributeController::index', '', '2025-03-21 05:46:45', '2025-03-21 06:04:15', '17', '17', 1, NULL, 220, 3, 108, 0),
(215, 'GET', 'create', 'Admin\\ProductAttributeController::create', '', '2025-03-21 05:47:00', '2025-03-21 06:04:22', '17', '17', 1, NULL, 220, 3, 109, 0),
(216, 'POST', 'save', 'Admin\\ProductAttributeController::save', '', '2025-03-21 05:47:10', '2025-03-21 06:04:31', '17', '17', 1, NULL, 220, 3, 110, 0),
(217, 'GET', 'detail/(:num)', 'Admin\\ProductAttributeController::detail/$1', '', '2025-03-21 05:47:52', '2025-03-21 06:04:41', '17', '17', 1, NULL, 220, 3, 111, 0),
(218, 'POST', 'update/(:num)', 'Admin\\ProductAttributeController::update/$1', '', '2025-03-21 05:48:25', '2025-03-21 06:04:49', '17', '17', 1, NULL, 220, 3, 112, 0),
(219, 'GET', 'delete/(:num)', 'Admin\\ProductAttributeController::delete/$1', '', '2025-03-21 05:48:46', '2025-03-21 06:04:57', '17', '17', 1, NULL, 220, 3, 113, 0),
(220, '', 'product-attributes', '', '', '2025-03-21 06:03:19', '2025-03-21 06:03:55', '17', '17', 1, 1, 98, 2, 114, 0),
(222, '', 'product-attribute-value', '', '', '2025-03-21 15:34:02', '2025-03-24 09:15:53', '17', '17', 1, 1, 98, 2, 114, 0),
(223, 'POST', 'get-product-attribute-value', 'Admin\\ProductAttributeValueController::getProductAttributeValue', '', '2025-03-21 15:34:28', '2025-03-21 15:35:18', '17', '17', 1, NULL, 222, 3, 116, 0),
(224, 'POST', 'get-price-history', 'Admin\\TransactionController::getPriceHistory', '', '2025-03-23 14:35:47', '2025-03-23 14:35:47', '17', '17', 1, NULL, 139, 3, 117, 0),
(225, 'POST', 'set-price-product', 'Admin\\ProductController::setPriceProduct', '', '2025-03-23 15:09:23', '2025-03-23 15:17:53', '17', '17', 1, NULL, 110, 3, 118, 0),
(226, 'POST', 'show-history-price', 'Admin\\ProductController::showHistoryPrice', '', '2025-03-24 05:50:43', '2025-03-24 05:50:43', '17', '17', 1, NULL, 110, 3, 119, 0),
(227, '', 'discount', '', '', '2025-03-24 08:15:50', '2025-03-24 09:15:36', '17', '17', 1, 1, 98, 2, 120, 0),
(228, 'GET', 'index', 'Admin\\DiscountController::index', '', '2025-03-24 08:16:33', '2025-03-24 08:16:33', '17', '17', 1, NULL, 227, 3, 121, 0),
(229, 'GET', 'create', 'Admin\\DiscountController::create', '', '2025-03-24 08:16:57', '2025-03-24 08:16:57', '17', '17', 1, NULL, 227, 3, 122, 0),
(230, 'POST', 'save', 'Admin\\DiscountController::save', '', '2025-03-24 08:17:11', '2025-03-24 08:17:11', '17', '17', 1, NULL, 227, 3, 123, 0),
(231, 'GET', 'detail/(:num)', 'Admin\\DiscountController::detail/$1', '', '2025-03-24 08:17:44', '2025-03-24 10:40:56', '17', '17', 1, NULL, 227, 3, 124, 0),
(232, 'POST', 'update/(:num)', 'Admin\\DiscountController::update/$1', '', '2025-03-24 08:18:16', '2025-03-24 08:18:16', '17', '17', 1, NULL, 227, 3, 125, 0),
(233, 'GET', 'delete/(:num)', 'Admin\\DiscountController::delete/$1', '', '2025-03-24 08:18:35', '2025-03-24 10:41:24', '17', '17', 1, NULL, 227, 3, 126, 0),
(234, '', 'discount-type', '', '', '2025-03-24 09:02:15', '2025-03-24 09:16:41', '17', '17', 1, 1, 98, 2, 133, 0),
(235, 'GET', '', 'Admin\\DiscountTypeController::index', '', '2025-03-24 09:03:00', '2025-03-24 09:03:00', '17', '17', 1, NULL, 234, 3, 127, 0),
(236, 'GET', 'index', 'Admin\\DiscountTypeController::index', '', '2025-03-24 09:03:10', '2025-03-24 09:03:10', '17', '17', 1, NULL, 234, 3, 127, 0),
(237, 'GET', 'create', 'Admin\\DiscountTypeController::create', '', '2025-03-24 09:03:26', '2025-03-24 09:03:26', '17', '17', 1, NULL, 234, 3, 128, 0),
(238, 'POST', 'save', 'Admin\\DiscountTypeController::save', '', '2025-03-24 09:03:38', '2025-03-24 09:03:38', '17', '17', 1, NULL, 234, 3, 129, 0),
(239, 'GET', 'detail/(:num)', 'Admin\\DiscountTypeController::detail/$1', '', '2025-03-24 09:04:06', '2025-03-24 09:04:06', '17', '17', 1, NULL, 234, 3, 130, 0),
(240, 'POST', 'update/(:num)', 'Admin\\DiscountTypeController::update/$1', '', '2025-03-24 09:04:38', '2025-03-24 09:04:38', '17', '17', 1, NULL, 234, 3, 131, 0),
(241, 'GET', 'delete/(:num)', 'Admin\\DiscountTypeController::delete/$1', '', '2025-03-24 09:04:54', '2025-03-24 09:18:15', '17', '17', 1, NULL, 234, 3, 132, 0),
(242, 'GET', '', 'Admin\\DiscountController::index', '', '2025-03-24 09:31:45', '2025-03-24 09:31:45', '17', '17', 1, NULL, 227, 3, 127, 0),
(243, '', 'product-discount', '', '', '2025-03-24 10:56:23', '2025-03-24 10:57:44', '17', '17', 1, 1, 98, 2, 140, 0),
(244, 'GET', '', 'Admin\\ProductDiscountController::index', '', '2025-03-24 10:58:19', '2025-03-24 10:58:19', '17', '17', 1, NULL, 243, 3, 134, 0),
(245, 'GET', 'index', 'Admin\\ProductDiscountController::index', '', '2025-03-24 10:58:32', '2025-03-24 10:58:32', '17', '17', 1, NULL, 243, 3, 134, 0),
(246, 'GET', 'create', 'Admin\\ProductDiscountController::create', '', '2025-03-24 10:58:43', '2025-03-24 10:58:43', '17', '17', 1, NULL, 243, 3, 135, 0),
(247, 'POST', 'save', 'Admin\\ProductDiscountController::save', '', '2025-03-24 10:58:56', '2025-03-24 10:58:56', '17', '17', 1, NULL, 243, 3, 136, 0),
(248, 'GET', 'detail/(:num)', 'Admin\\ProductDiscountController::detail/$1', '', '2025-03-24 10:59:24', '2025-03-24 10:59:24', '17', '17', 1, NULL, 243, 3, 137, 0),
(249, 'POST', 'update/(:num)', 'Admin\\ProductDiscountController::update/$1', '', '2025-03-24 11:00:04', '2025-03-24 11:00:04', '17', '17', 1, NULL, 243, 3, 138, 0),
(250, 'GET', 'delete/(:num)', 'Admin\\ProductDiscountController::delete/$1', '', '2025-03-24 11:00:26', '2025-03-24 11:00:26', '17', '17', 1, NULL, 243, 3, 139, 0),
(251, 'POST', 'update-product-discount-detail', 'Admin\\ProductDiscountController::updateProductDiscountedDetail', '', '2025-03-24 16:51:30', '2025-03-24 16:51:30', '17', '17', 1, NULL, 243, 3, 141, 0),
(252, '', 'website-config', '', '', '2025-03-26 10:21:04', '2025-03-26 10:21:04', '17', '17', 1, 1, 98, 2, 148, 0),
(253, 'GET', '', 'Admin\\WebsiteConfigController::index', '', '2025-03-26 10:21:50', '2025-03-26 10:21:50', '17', '17', 1, NULL, 252, 3, 142, 0),
(254, 'GET', 'index', 'Admin\\WebsiteConfigController::index', '', '2025-03-26 10:22:06', '2025-03-26 10:22:06', '17', '17', 1, NULL, 252, 3, 142, 0),
(255, 'GET', 'create', 'Admin\\WebsiteConfigController::create', '', '2025-03-26 10:22:19', '2025-03-26 10:22:19', '17', '17', 1, NULL, 252, 3, 143, 0),
(256, 'POST', 'save', 'Admin\\WebsiteConfigController::save', '', '2025-03-26 10:22:34', '2025-03-26 10:22:34', '17', '17', 1, NULL, 252, 3, 144, 0),
(257, 'GET', 'detail/(:num)', 'Admin\\WebsiteConfigController::detail/$1', '', '2025-03-26 10:23:15', '2025-03-26 10:23:15', '17', '17', 1, NULL, 252, 3, 145, 0),
(258, 'POST', 'update/(:num)', 'Admin\\WebsiteConfigController::update/$1', '', '2025-03-26 10:23:39', '2025-03-26 10:23:39', '17', '17', 1, NULL, 252, 3, 146, 0),
(259, 'GET', 'delete/(:num)', 'Admin\\WebsiteConfigController::delete/$1', '', '2025-03-26 10:23:58', '2025-03-26 10:23:58', '17', '17', 1, NULL, 252, 3, 147, 0),
(260, '', 'email-template', '', '', '2025-03-26 19:20:45', '2025-03-26 19:20:45', '17', '17', 1, 1, 98, 2, 149, 0),
(261, 'GET', '', 'Admin\\EmailTemplateController::index', '', '2025-03-26 19:21:01', '2025-03-26 19:21:01', '17', '17', 1, NULL, 260, 3, 150, 0),
(262, 'GET', 'index', 'Admin\\EmailTemplateController::index', '', '2025-03-26 19:21:10', '2025-03-26 19:21:10', '17', '17', 1, NULL, 260, 3, 150, 0),
(263, 'GET', 'create', 'Admin\\EmailTemplateController::create', '', '2025-03-26 19:21:25', '2025-03-26 19:21:25', '17', '17', 1, NULL, 260, 3, 151, 0),
(264, 'POST', 'save', 'Admin\\EmailTemplateController::save', '', '2025-03-26 19:21:36', '2025-03-26 19:21:36', '17', '17', 1, NULL, 260, 3, 152, 0),
(265, 'GET', 'detail/(:num)', 'Admin\\EmailTemplateController::detail/$1', '', '2025-03-26 19:22:04', '2025-03-26 19:22:04', '17', '17', 1, NULL, 260, 3, 153, 0),
(266, 'POST', 'update/(:num)', 'Admin\\EmailTemplateController::update/$1', '', '2025-03-26 19:22:22', '2025-03-26 19:22:22', '17', '17', 1, NULL, 260, 3, 154, 0),
(267, 'GET', 'delete/(:num)', 'Admin\\EmailTemplateController::delete/$1', '', '2025-03-26 19:22:38', '2025-03-26 19:22:38', '17', '17', 1, NULL, 260, 3, 155, 0),
(268, 'POST', 'send-mail', 'Admin\\EmailTemplateController::sendMail', '', '2025-03-26 19:41:24', '2025-03-26 19:41:24', '17', '17', 1, NULL, 260, 3, 156, 0),
(269, 'GET', 'verify', 'Portal\\CustomerClientController::verify', '', '2025-03-27 00:37:04', '2025-03-27 22:07:05', '17', '17', 1, NULL, 273, 3, 69, 1),
(270, 'POST', 'verify_from_portal', 'Portal\\CustomerClientController::verify_from_portal', '', '2025-03-27 13:54:19', '2025-03-27 22:08:10', '17', '17', 1, NULL, 273, 3, 160, 1),
(271, 'POST', 'sign-in', 'Portal\\CustomerClientController::sign_in', '', '2025-03-27 16:33:41', '2025-03-27 22:08:33', '17', '17', 1, NULL, 273, 3, 161, 1),
(272, 'POST', 'sign-out', 'Portal\\CustomerClientController::sign_out', '', '2025-03-27 19:18:03', '2025-03-27 22:09:11', '17', '17', 1, NULL, 273, 3, 162, 1),
(273, '', 'customer-client', '', '', '2025-03-27 22:06:00', '2025-03-28 09:20:42', '17', '17', 1, 1, 275, 2, 163, 1),
(274, 'POST', 'sign-in', 'Admin\\AccountController::signIn', '', '2025-03-27 22:18:29', '2025-03-27 22:19:19', '', '', 1, NULL, 163, 3, 158, 1),
(275, '', 'portal', '', '', '2025-03-28 09:17:49', '2025-03-28 09:20:55', '17', '17', 1, 1, NULL, 1, 164, 1),
(276, 'POST', 'get-customer-infor', 'Portal\\CustomerClientController::get_customer_infor', '', '2025-03-28 09:47:15', '2025-03-28 09:47:15', '17', '17', 1, NULL, 273, 3, 165, 1),
(277, '', 'cart-client', '', '', '2025-03-28 11:10:11', '2025-03-28 11:27:53', '17', '17', 1, 1, 275, 1, 166, 1),
(278, 'GET', '', 'Portal\\CartClientController::index', '', '2025-03-28 11:17:46', '2025-03-28 11:22:01', '17', '17', 1, NULL, 277, 3, 169, 1),
(279, 'GET', 'index', 'Portal\\CartClientController::index', '', '2025-03-28 11:19:14', '2025-03-28 11:21:50', '17', '17', 1, NULL, 277, 3, 169, 1),
(280, 'POST', 'add-to-cart', 'Portal\\CartClientController::add_to_cart', '', '2025-03-28 12:20:01', '2025-03-28 12:23:00', '17', '17', 1, NULL, 277, 3, 0, 1),
(281, 'GET', 'clear-cart', 'Portal\\CartClientController::clear_cart', '', '2025-03-28 12:48:05', '2025-03-28 14:15:23', '17', '17', 1, NULL, 277, 3, 0, 1),
(282, 'POST', 'change-quantity', 'Portal\\CartClientController::change_quantity', '', '2025-03-28 12:58:25', '2025-03-28 12:58:25', '17', '17', 1, NULL, 277, 3, 0, 1),
(283, 'POST', 'remove-item-cart', 'Portal\\CartClientController::remove_item_cart', '', '2025-03-28 12:58:55', '2025-03-28 12:58:55', '17', '17', 1, NULL, 277, 3, 0, 1),
(284, 'POST', 'complete-order', 'Portal\\CartClientController::complete_order', '', '2025-03-28 14:32:34', '2025-03-28 19:22:25', '17', '17', 1, NULL, 277, 3, 0, 1),
(285, 'GET', 'order-successfull', 'Portal\\CartClientController::order_successfull', '', '2025-03-28 21:24:44', '2025-03-28 21:24:44', '17', '17', 1, NULL, 277, 3, 170, 1),
(286, '', 'banner', '', '', '2025-03-28 22:53:40', '2025-03-28 22:53:40', '17', '17', 1, 1, 98, 2, 171, NULL),
(287, 'GET', '', 'Admin\\BannerController::index', '', '2025-03-28 22:54:18', '2025-03-28 22:54:18', '17', '17', 1, NULL, 286, 3, 172, NULL),
(288, 'GET', 'index', 'Admin\\BannerController::index', '', '2025-03-28 22:55:01', '2025-03-28 22:55:01', '17', '17', 1, NULL, 286, 3, 172, NULL),
(289, 'GET', 'create', 'Admin\\BannerController::create', '', '2025-03-28 22:55:29', '2025-03-28 22:55:47', '17', '17', 1, NULL, 286, 3, 173, NULL),
(290, 'POST', 'save', 'Admin\\BannerController::save', '', '2025-03-28 23:00:14', '2025-03-28 23:00:14', '17', '17', 1, NULL, 286, 3, 174, NULL),
(291, 'GET', 'detail/(:num)', 'Admin\\BannerController::detail/$1', '', '2025-03-28 23:00:59', '2025-03-28 23:00:59', '17', '17', 1, NULL, 286, 3, 175, NULL),
(292, 'POST', 'update/(:num)', 'Admin\\BannerController::update/$1', '', '2025-03-28 23:01:27', '2025-03-28 23:01:27', '17', '17', 1, NULL, 286, 3, 176, NULL),
(293, 'GET', 'delete/(:num)', 'Admin\\BannerController::delete/$1', '', '2025-03-28 23:01:44', '2025-03-28 23:01:44', '17', '17', 1, NULL, 286, 3, 177, NULL);

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
(3, 'import', '2025-03-24 00:00:00', 12, NULL, NULL, '2025-03-23 21:09:43', '2025-03-23 21:09:43', 1, 1, 1, 1);

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
(5, 3, 17, 100, 5000.00, '2025-03-23 21:09:43', '2025-03-23 21:09:43', 1, 1, 1, 6),
(6, 3, 18, 100, 6000.00, '2025-03-23 21:09:43', '2025-03-23 21:09:43', 1, 1, 1, 6),
(7, 3, 19, 100, 4500.00, '2025-03-23 21:09:43', '2025-03-23 21:09:43', 1, 1, 1, 6),
(8, 3, 20, 100, 5000.00, '2025-03-23 21:09:43', '2025-03-23 21:09:43', 1, 1, 1, 6),
(9, 3, 21, 100, 5000.00, '2025-03-23 21:09:43', '2025-03-23 21:09:43', 1, 1, 1, 6),
(10, 3, 22, 100, 5000.00, '2025-03-23 21:09:43', '2025-03-23 21:09:43', 1, 1, 1, 6),
(11, 3, 23, 100, 5500.00, '2025-03-23 21:09:43', '2025-03-23 21:09:43', 1, 1, 1, 6),
(12, 3, 24, 100, 4000.00, '2025-03-23 21:09:43', '2025-03-23 21:09:43', 1, 1, 1, 6);

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

-- --------------------------------------------------------

--
-- Table structure for table `website_configs`
--

CREATE TABLE `website_configs` (
  `id` int(11) NOT NULL,
  `config_key` varchar(255) NOT NULL,
  `config_value` text NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `website_configs`
--

INSERT INTO `website_configs` (`id`, `config_key`, `config_value`, `description`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Peatun Essence of Nature', 'Tên của website', '2025-03-26 02:59:40', '2025-03-27 08:15:54'),
(2, 'site_url', 'http://localhost/web-store/', 'URL chính của website', '2025-03-26 02:59:40', '2025-03-26 09:06:01'),
(3, 'admin_email', 'trailangnd96@gmail.com', 'Email quản trị viên', '2025-03-26 02:59:40', '2025-03-26 09:03:46'),
(4, 'default_language', 'vi', 'Ngôn ngữ mặc định', '2025-03-26 02:59:40', '2025-03-26 02:59:40'),
(5, 'timezone', 'Asia/Ho_Chi_Minh', 'Múi giờ của website', '2025-03-26 02:59:40', '2025-03-26 02:59:40'),
(6, 'maintenance_mode', 'false', 'Chế độ bảo trì (true = bật, false = tắt)', '2025-03-26 02:59:40', '2025-03-26 02:59:40'),
(7, 'max_upload_size', '150', 'Giới hạn dung lượng file tải lên', '2025-03-26 02:59:40', '2025-03-26 04:21:40'),
(8, 'allowed_file_types', 'jpg, png, jpeg', 'Các định dạng file được phép upload', '2025-03-26 02:59:40', '2025-03-26 04:11:18'),
(9, 'enable_cache', 'true', 'Bật/tắt bộ nhớ đệm', '2025-03-26 02:59:40', '2025-03-26 02:59:40'),
(10, 'cache_lifetime', '3600', 'Thời gian sống của cache (tính bằng giây)', '2025-03-26 02:59:40', '2025-03-26 02:59:40'),
(11, 'enable_ssl', 'true', 'Bật/tắt chế độ SSL', '2025-03-26 02:59:40', '2025-03-26 02:59:40'),
(12, 'google_analytics_id', 'UA-12345678-9', 'Mã theo dõi Google Analytics', '2025-03-26 02:59:40', '2025-03-26 02:59:40'),
(13, 'facebook_pixel_id', '1234567890', 'Mã Facebook Pixel', '2025-03-26 02:59:40', '2025-03-26 02:59:40'),
(14, 'smtp_host', 'smtp.gmail.com', 'Máy chủ SMTP để gửi email', '2025-03-26 02:59:40', '2025-03-26 09:05:01'),
(15, 'smtp_port', '587', 'Cổng SMTP', '2025-03-26 02:59:40', '2025-03-26 10:27:59'),
(16, 'smtp_user', 'peatunessenceofnature@gmail.com', 'Tài khoản SMTP', '2025-03-26 02:59:40', '2025-03-26 10:38:40'),
(17, 'smtp_password', 'fwno vgfd vjmc cqdh', 'Mật khẩu SMTP', '2025-03-26 02:59:40', '2025-03-26 11:00:40'),
(18, 'contact_phone', '+84 123 456 789', 'Số điện thoại hỗ trợ', '2025-03-26 02:59:40', '2025-03-26 02:59:40'),
(19, 'contact_address', '123 Đường ABC, Quận X, TP.HCM', 'Địa chỉ liên hệ', '2025-03-26 02:59:40', '2025-03-26 02:59:40'),
(22, 'logo', 'logo', 'logo', '2025-03-26 04:24:43', '2025-03-26 05:10:06'),
(24, 'site_name_admin', 'Admin', '', '2025-03-26 05:29:14', '2025-03-26 05:29:14'),
(25, 'app_password', 'fwno vgfd vjmc cqdh', '', '2025-03-26 08:49:25', '2025-03-26 11:00:30'),
(26, 'smtp_timeout', '30', '', '2025-03-26 08:54:13', '2025-03-26 08:54:13'),
(27, 'protocol', 'smtp', '', '2025-03-26 08:55:12', '2025-03-26 08:55:12'),
(28, 'smtp_crypto', 'tls', '', '2025-03-26 10:25:22', '2025-03-26 10:27:51'),
(31, 'banner_mail_logo', 'banner_mail', 'banner_mail', '2025-03-27 08:29:45', '2025-03-27 08:32:04'),
(32, 'slogan_head', 'Sản phẩm đến từ thiên nhiên', '', '2025-03-28 03:59:02', '2025-03-28 03:59:31'),
(33, 'slogan_body', 'Nhẹ như sương sớm, thơm như ánh ban mai', '', '2025-03-28 03:59:20', '2025-03-28 03:59:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
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
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_types`
--
ALTER TABLE `discount_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_discount_details`
--
ALTER TABLE `product_discount_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_prices`
--
ALTER TABLE `product_prices`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `website_configs`
--
ALTER TABLE `website_configs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `config_key` (`config_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `discount_types`
--
ALTER TABLE `discount_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_discounts`
--
ALTER TABLE `product_discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_discount_details`
--
ALTER TABLE `product_discount_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_prices`
--
ALTER TABLE `product_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `website_configs`
--
ALTER TABLE `website_configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
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
