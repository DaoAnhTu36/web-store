-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 14, 2025 lúc 12:25 AM
-- Phiên bản máy phục vụ: 10.11.11-MariaDB
-- Phiên bản PHP: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `taphoagi_store_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `best_selling_products`
--

CREATE TABLE `best_selling_products` (
  `record_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total_sold` int(11) NOT NULL DEFAULT 0,
  `last_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`) VALUES
(3, 'Tinh dầu', '<p><strong>Giới thiệu chung về tinh dầu</strong></p><p>Tinh dầu là chiết xuất từ các loài thực vật thông qua phương pháp chừng cất hơi nước hoặc ép lạnh. Chúng mang đặc tính hương thơm tự nhiên và những lợi ích sức khỏe đối với con người. Tinh dầu được sử dụng rộng rãi trong liệu pháp hương thơm, chăm sóc da, và thư giãn tinh thần.</p><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741326517_2a0f36da3b825fddb234.jpg\"></figure><p><strong>Các loại tinh dầu phổ biến</strong></p><ol><li><strong>Hoa oải hương</strong>: Giúp thư giãn, giảm căng thẳng và hỗ trợ giấc ngủ.</li><li><strong>Hoa hồng</strong>: Hỗ trợ dưỡng da, làm dịu và giảm viêm.</li><li><strong>Chanh vàng</strong>: Tăng cường hệ miễn dịch, thanh lọc không khí.</li><li><strong>Bạc hà</strong>: Tăng tập trung, giảm nghẹt mũi.</li><li><strong>Hoa nhài</strong>: Thư giãn, giảm căng thẳng và hỗ trợ cân bằng cảm xúc.</li><li><strong>Trà xanh</strong>: Giảm vi khuẩn, thanh lọc da.</li><li><strong>Vanilla</strong>: Tạo cảm giác ấm áp, dễ chịu.</li><li><strong>Cà phê</strong>: Giúp tỉnh táo, tăng năng lượng.</li><li><strong>Cam ngọt</strong>: Nâng cao tinh thần, giảm căng thẳng.</li><li><strong>Hoa lan Nam Phi</strong>: Tăng cảm giác thư giãn, hương thơm quyến rũ.</li></ol><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741326523_43b7b888bb5305f6c174.jpg\"></figure><p><strong>Hướng dẫn sử dụng tinh dầu</strong></p><ul><li><strong>Khuếch tán</strong>: Nhỏ vài giọt tinh dầu vào máy khuếch tán hoặc đèn xông tinh dầu.</li><li><strong>Mát-xa</strong>: Pha loãng tinh dầu với dầu dẫn xuất như dầu dừa hoặc dầu hạnh nhân, sau đó thoa lên da.</li><li><strong>Tẩm</strong>: Nhỏ vài giọt tinh dầu vào bồn tắm để giúp thư giãn cơ thể.</li><li><strong>Xít phong</strong>: Pha tinh dầu với nước để xít không gian hoặc lên quần áo.</li></ul><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741326530_9c8ee11aab9619de3844.jpg\"></figure><p><strong>Tại sao nên sử dụng tinh dầu?</strong></p><ol><li><strong>Thư giãn và giảm căng thẳng</strong>: Hương thơm tự nhiên giúp cơ thể và tinh thần thư giãn.</li><li><strong>Cải thiện chất lượng giấc ngủ</strong>: Nhiều loại tinh dầu như oải hương và cây hương thảo có tác dụng giúp dễ dàng đi vào giấc ngủ.</li><li><strong>Tăng tập trung</strong>: Tinh dầu bạc hà, cà phê giúp duy trì sự tỉnh táo và tăng hiệu suất làm việc.</li><li><strong>Từ nhiên và an toàn</strong>: Không chứa hóa chất độc hại như nước hoa hay sản phẩm khác.</li><li><strong>Khửa mùi và thanh lọc không khí</strong>: Cam ngọt, chanh, bạc hà giúp loại bỏ vi khuẩn và mang lại không gian sạch sẽ.</li></ol><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741326535_08e48e3a07757f220c81.jpg\"></figure><p><i><strong>Tinh dầu không chỉ là sản phẩm tự nhiên tuyệt vời cho làn da và tinh thần, mà còn là phương pháp chăm sóc sức khỏe hiệu quả cho cuộc sống hiện đại.</strong></i></p>', '2025-03-07 05:48:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `record_id`, `image_path`, `created_at`) VALUES
(4, 1, 'uploads/1741676926_3fecf6635b801ef0e6a5.png', '2025-03-11 07:08:46'),
(5, 1, 'uploads/1741676926_83dfba630038c97f397d.png', '2025-03-11 07:08:46'),
(6, 2, 'uploads/1741677744_dc1ceedb1df835730d41.png', '2025-03-11 07:22:24'),
(7, 2, 'uploads/1741677744_9e0f590b61be2f825c53.png', '2025-03-11 07:22:24'),
(8, 2, 'uploads/1741677744_c3141a9030e479bc6d94.png', '2025-03-11 07:22:24'),
(9, 2, 'uploads/1741677744_16e2ed307dec44793ffd.png', '2025-03-11 07:22:24'),
(10, 3, 'uploads/1741678051_791f8b4b6f8e6f84165f.png', '2025-03-11 07:27:31'),
(11, 3, 'uploads/1741678051_cd5359979ac10ff24373.png', '2025-03-11 07:27:31'),
(12, 3, 'uploads/1741678051_26acd5a44776de00f709.png', '2025-03-11 07:27:31'),
(13, 3, 'uploads/1741678051_a42f731cba108d4a0a14.png', '2025-03-11 07:27:31'),
(14, 3, 'uploads/1741678051_201f45597ec9b39aca5a.png', '2025-03-11 07:27:31'),
(15, 4, 'uploads/1741678312_b0658de9116f51275a0d.png', '2025-03-11 07:31:52'),
(16, 4, 'uploads/1741678312_570414ad6301d035a413.png', '2025-03-11 07:31:52'),
(17, 5, 'uploads/1741690108_bdbbe88ff41247ba47a5.png', '2025-03-11 10:48:28'),
(18, 5, 'uploads/1741690108_d67ca30be4e10f1440d4.png', '2025-03-11 10:48:28'),
(19, 5, 'uploads/1741690108_58c2e1170a4751110a22.png', '2025-03-11 10:48:28'),
(20, 5, 'uploads/1741690108_da51511e14ad8713bd78.png', '2025-03-11 10:48:28'),
(21, 6, 'uploads/1741748219_9f674a97d192295f4e33.jpg', '2025-03-12 02:56:59'),
(22, 6, 'uploads/1741748219_f498d78490fe70423ad5.jpg', '2025-03-12 02:56:59'),
(23, 6, 'uploads/1741748219_b126e7b5621b4fa7adce.jpg', '2025-03-12 02:56:59'),
(24, 6, 'uploads/1741748219_536e02890dd3cbc350c0.jpg', '2025-03-12 02:56:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory_movements`
--

CREATE TABLE `inventory_movements` (
  `movement_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `movement_type` enum('import','export') NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','processing','shipped','delivered','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_method` enum('cod','bank_transfer','credit_card') NOT NULL,
  `status` enum('pending','paid','failed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `description`, `price`, `stock`, `image`, `created_at`) VALUES
(1, 'Tinh dầu hương chanh sả', 3, '<p><strong>Tinh Dầu Hương Chanh Sả – Công Dụng và Cách Sử Dụng</strong></p><p>Tinh dầu hương chanh sả là một trong những loại tinh dầu thiên nhiên được ưa chuộng nhờ mùi hương tươi mát, dễ chịu cùng nhiều công dụng tuyệt vời đối với sức khỏe và đời sống. Được chiết xuất từ cây sả chanh (Cymbopogon citratus), loại tinh dầu này mang đến nhiều lợi ích như khử mùi, thư giãn tinh thần và hỗ trợ chăm sóc sức khỏe.</p><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741676914_f240213d5eb47054905d.png\"></figure><h2>1. Công Dụng Của Tinh Dầu Chanh Sả</h2><h3><strong>1.1. Thanh Lọc Không Khí và Khử Mùi</strong></h3><p>Tinh dầu chanh sả có đặc tính kháng khuẩn mạnh, giúp khử mùi hôi trong không gian sống, đặc biệt là phòng ngủ, phòng khách hoặc xe hơi. Việc khuếch tán tinh dầu trong không khí không chỉ làm sạch mà còn mang lại cảm giác dễ chịu, thư giãn.</p><h3><strong>1.2. Xua Đuổi Côn Trùng</strong></h3><p>Mùi hương của tinh dầu chanh sả có khả năng đuổi muỗi và các loại côn trùng khác hiệu quả. Bạn có thể dùng tinh dầu này để pha loãng với nước và xịt quanh nhà hoặc nhỏ vài giọt lên quần áo, màn cửa để ngăn chặn muỗi.</p><h3><strong>1.3. Giảm Căng Thẳng, Cải Thiện Tâm Trạng</strong></h3><p>Hương thơm tươi mát của chanh sả giúp thư giãn, giảm căng thẳng và cải thiện tinh thần. Khi cảm thấy mệt mỏi, bạn có thể xông tinh dầu để tạo không gian dễ chịu, giúp tinh thần thoải mái hơn.</p><h3><strong>1.4. Hỗ Trợ Giảm Đau Nhức Cơ Bắp</strong></h3><p>Tinh dầu chanh sả có đặc tính chống viêm, giúp giảm đau cơ, đau khớp. Bạn có thể pha loãng tinh dầu với dầu nền (dầu dừa, dầu ô liu) để massage vùng bị đau nhức.</p><h3><strong>1.5. Hỗ Trợ Chăm Sóc Da và Tóc</strong></h3><p>Với tính kháng khuẩn và chống oxy hóa, tinh dầu chanh sả có thể hỗ trợ điều trị mụn trứng cá, kiểm soát dầu nhờn trên da. Ngoài ra, khi gội đầu, thêm vài giọt tinh dầu vào dầu gội sẽ giúp tóc chắc khỏe, giảm gàu và kích thích mọc tóc.</p><h2>2. Cách Sử Dụng Tinh Dầu Chanh Sả</h2><p><strong>Khuếch tán trong không gian</strong>: Nhỏ 3-5 giọt tinh dầu vào máy khuếch tán hoặc đèn xông để làm sạch không khí và thư giãn tinh thần.</p><p><strong>Pha với nước để xịt phòng</strong>: Pha 10 giọt tinh dầu với 100ml nước rồi xịt quanh phòng để khử mùi và xua đuổi côn trùng.</p><p><strong>Massage giảm đau nhức</strong>: Pha loãng tinh dầu chanh sả với dầu nền theo tỷ lệ 1:10 rồi massage lên vùng cơ bị đau.</p><p><strong>Tắm thư giãn</strong>: Nhỏ 5 giọt tinh dầu vào bồn tắm nước ấm để thư giãn sau một ngày dài làm việc.</p><p><strong>Chăm sóc da và tóc</strong>: Thêm vài giọt tinh dầu vào sữa rửa mặt, kem dưỡng hoặc dầu gội để tăng hiệu quả làm sạch và nuôi dưỡng.</p><h2>3. Lưu Ý Khi Sử Dụng</h2><p>Không bôi trực tiếp tinh dầu nguyên chất lên da vì có thể gây kích ứng.</p><p>Tránh tiếp xúc với mắt và vết thương hở.</p><p>Không uống hoặc sử dụng cho phụ nữ mang thai, trẻ sơ sinh nếu chưa có hướng dẫn của chuyên gia.</p><p>Bảo quản tinh dầu ở nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp.</p><p>Tinh dầu hương chanh sả là một lựa chọn tuyệt vời để cải thiện không gian sống, chăm sóc sức khỏe và làm đẹp. Với những công dụng đa dạng và cách sử dụng đơn giản, loại tinh dầu này chắc chắn sẽ là một trợ thủ đắc lực cho bạn trong cuộc sống hàng ngày.</p><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741676923_9846ba639c12a680abd8.png\"></figure><p>&nbsp;</p>', 24000.00, 1000, NULL, '2025-03-11 07:08:46'),
(2, 'Tinh dầu hương nước hoa', 3, '<p><strong>Tinh Dầu Hương Hoa Hồng – Công Dụng và Cách Sử Dụng</strong></p><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741677720_9d0610a3d5173d1b90f9.png\"></figure><p><img src=\"https://example.com/image1.jpg\" alt=\"Tinh Dầu Hoa Hồng\"></p><p>Tinh dầu hương hoa hồng là một trong những loại tinh dầu quý giá, mang đến hương thơm quyến rũ và nhiều lợi ích cho sức khỏe cũng như làm đẹp. Được chiết xuất từ cánh hoa hồng tự nhiên, loại tinh dầu này không chỉ giúp thư giãn tinh thần mà còn có tác dụng chăm sóc da, cân bằng cảm xúc và hỗ trợ cải thiện giấc ngủ.</p><h2>1. Công Dụng Của Tinh Dầu Hoa Hồng</h2><h3><strong>1.1. Cải Thiện Tâm Trạng và Giảm Căng Thẳng</strong></h3><p>Hương thơm dịu nhẹ của hoa hồng có tác dụng làm dịu tâm trí, giảm căng thẳng và giúp cải thiện tâm trạng. Việc khuếch tán tinh dầu hoa hồng trong không gian sống giúp mang lại cảm giác thư thái, dễ chịu.</p><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741677728_59036b257aa5b7c77e0a.png\"></figure><h3><strong>1.2. Hỗ Trợ Giấc Ngủ Ngon</strong></h3><p>Tinh dầu hoa hồng có khả năng thư giãn thần kinh, giúp bạn dễ đi vào giấc ngủ và ngủ sâu hơn. Bạn có thể xông tinh dầu trong phòng ngủ hoặc nhỏ một vài giọt lên gối để có giấc ngủ ngon hơn.</p><p><img src=\"https://example.com/image2.jpg\" alt=\"Giấc ngủ thư giãn\"></p><h3><strong>1.3. Chăm Sóc Da Hiệu Quả</strong></h3><p>Với đặc tính dưỡng ẩm và chống oxy hóa, tinh dầu hoa hồng giúp làm mềm da, giảm nếp nhăn và ngăn ngừa lão hóa. Nó còn có tác dụng kháng viêm, giúp làm dịu da nhạy cảm và hỗ trợ điều trị mụn trứng cá.</p><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741677733_f4093af83a31aab0c69e.png\"></figure><h3><strong>1.4. Cân Bằng Hormone và Hỗ Trợ Sức Khỏe Phụ Nữ</strong></h3><p>Tinh dầu hoa hồng được biết đến với công dụng hỗ trợ cân bằng nội tiết tố, giảm căng thẳng trong chu kỳ kinh nguyệt và giảm các triệu chứng khó chịu ở phụ nữ mãn kinh.</p><h3><strong>1.5. Khử Mùi và Tạo Hương Thơm Tự Nhiên</strong></h3><p>Tinh dầu hoa hồng có thể được sử dụng để làm nước hoa tự nhiên hoặc tạo hương thơm cho không gian sống, giúp khử mùi hôi hiệu quả và mang lại cảm giác sang trọng, thư thái.</p><h2>2. Cách Sử Dụng Tinh Dầu Hoa Hồng</h2><ul><li><strong>Khuếch tán trong không gian</strong>: Nhỏ 3-5 giọt tinh dầu vào máy khuếch tán hoặc đèn xông để tạo hương thơm dễ chịu.</li><li><strong>Massage thư giãn</strong>: Pha loãng tinh dầu với dầu nền (dầu dừa, dầu jojoba) và massage nhẹ nhàng để thư giãn cơ thể.</li><li><strong>Tắm hương hoa hồng</strong>: Thêm vài giọt tinh dầu vào nước tắm để thư giãn và làm mềm da.</li><li><strong>Chăm sóc da mặt</strong>: Pha loãng tinh dầu với nước hoa hồng hoặc kem dưỡng để tăng hiệu quả dưỡng ẩm và chống lão hóa.</li><li><strong>Xịt thơm tự nhiên</strong>: Pha tinh dầu với nước và xịt lên quần áo, chăn gối để tạo hương thơm tự nhiên.</li></ul><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741677742_b2192a07d8a3efe09b0c.png\"></figure><p><img src=\"https://example.com/image3.jpg\" alt=\"Cách sử dụng tinh dầu\"></p><h2>3. Lưu Ý Khi Sử Dụng</h2><ul><li>Không bôi trực tiếp tinh dầu nguyên chất lên da để tránh kích ứng.</li><li>Tránh tiếp xúc với mắt và vết thương hở.</li><li>Không sử dụng cho phụ nữ mang thai, trẻ nhỏ mà không có hướng dẫn của chuyên gia.</li><li>Bảo quản tinh dầu nơi khô ráo, tránh ánh nắng trực tiếp để duy trì chất lượng.</li></ul><p>Tinh dầu hương hoa hồng là một lựa chọn hoàn hảo để chăm sóc sức khỏe, cải thiện tâm trạng và làm đẹp. Với những công dụng tuyệt vời và cách sử dụng đơn giản, đây chắc chắn là sản phẩm đáng có trong bộ sưu tập tinh dầu của bạn.</p>', 30000.00, 100, NULL, '2025-03-11 07:22:24'),
(3, 'Tinh dầu hương hoa nhài', 3, '<p><strong>Tinh Dầu Hương Hoa Nhài – Công Dụng và Cách Sử Dụng</strong></p><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741678026_e7a64f9d4f5a8a8ac401.png\"></figure><p>Tinh dầu hương hoa nhài là một trong những loại tinh dầu thiên nhiên được yêu thích bởi hương thơm ngọt ngào, quyến rũ và mang lại nhiều lợi ích cho sức khỏe, tinh thần cũng như làm đẹp. Được chiết xuất từ những bông hoa nhài trắng tinh khôi, tinh dầu hoa nhài không chỉ giúp thư giãn mà còn có tác dụng tuyệt vời trong chăm sóc da và cân bằng cảm xúc.</p><h2>1. Công Dụng Của Tinh Dầu Hoa Nhài</h2><h3><strong>1.1. Giúp Thư Giãn và Cải Thiện Tâm Trạng</strong></h3><p>Hương thơm ngọt ngào của hoa nhài giúp giảm căng thẳng, lo âu và cải thiện tâm trạng. Khuếch tán tinh dầu hoa nhài trong không gian giúp tạo cảm giác dễ chịu, thư thái và mang lại sự lạc quan.</p><h3><strong>1.2. Hỗ Trợ Giấc Ngủ Ngon</strong></h3><p>Tinh dầu hoa nhài có tác dụng làm dịu thần kinh, giúp bạn dễ dàng đi vào giấc ngủ và ngủ sâu hơn. Bạn có thể xông tinh dầu trong phòng ngủ hoặc nhỏ vài giọt lên gối để tạo không gian thư giãn.</p><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741678038_4cd1f6d6aa6f06282b4a.png\"></figure><h3><strong>1.3. Chăm Sóc Da và Chống Lão Hóa</strong></h3><p>Tinh dầu hoa nhài có đặc tính dưỡng ẩm, chống viêm và kháng khuẩn, giúp làm dịu làn da nhạy cảm, giảm mụn và làm mờ nếp nhăn. Nó còn hỗ trợ tái tạo da, giúp da luôn tươi trẻ và rạng rỡ.</p><h3><strong>1.4. Hỗ Trợ Cân Bằng Nội Tiết Tố</strong></h3><p>Tinh dầu hoa nhài được biết đến với công dụng cân bằng hormone, giảm các triệu chứng căng thẳng và khó chịu trong chu kỳ kinh nguyệt cũng như thời kỳ mãn kinh.</p><h3><strong>1.5. Tăng Cường Sức Khỏe Tình Dục</strong></h3><p>Hương thơm quyến rũ của hoa nhài giúp kích thích cảm giác thư giãn và tăng cường sự tự tin, góp phần cải thiện đời sống tình cảm và tinh thần.</p><h2>2. Cách Sử Dụng Tinh Dầu Hoa Nhài</h2><ul><li><strong>Khuếch tán trong không gian</strong>: Nhỏ 3-5 giọt tinh dầu vào máy khuếch tán hoặc đèn xông để tạo không gian thư giãn.</li><li><strong>Massage thư giãn</strong>: Pha loãng tinh dầu với dầu nền (dầu dừa, dầu jojoba) để massage giúp làm mềm da và giảm căng thẳng.</li><li><strong>Chăm sóc da</strong>: Pha loãng tinh dầu với nước hoa hồng hoặc kem dưỡng để tăng cường dưỡng ẩm và chống lão hóa.</li><li><strong>Tắm thư giãn</strong>: Thêm vài giọt tinh dầu vào nước tắm để giúp cơ thể thư giãn và làm dịu làn da.</li><li><strong>Xịt phòng và tạo hương thơm tự nhiên</strong>: Pha tinh dầu với nước để xịt lên quần áo, chăn gối, giúp mang lại hương thơm dịu nhẹ.</li></ul><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741678048_08dac98bf341e5aa3a09.png\"></figure><p><img src=\"https://example.com/image3.jpg\" alt=\"Cách sử dụng tinh dầu\"></p><h2>3. Lưu Ý Khi Sử Dụng</h2><ul><li>Không bôi trực tiếp tinh dầu nguyên chất lên da để tránh</li></ul>', 30000.00, 150, NULL, '2025-03-11 07:27:31'),
(4, 'Tinh dầu gỗ đàn hương', 3, '<p><strong>Tinh Dầu Gỗ Đàn Hương – Công Dụng và Cách Sử Dụng</strong></p><p>&nbsp;</p><p>Tinh dầu gỗ đàn hương là một trong những loại tinh dầu quý hiếm, được đánh giá cao nhờ hương thơm trầm ấm, sang trọng cùng nhiều lợi ích tuyệt vời cho sức khỏe, làm đẹp và thư giãn tinh thần. Được chiết xuất từ lõi gỗ của cây đàn hương, tinh dầu này không chỉ mang đến sự thư thái mà còn có tác dụng hỗ trợ chăm sóc da, giảm căng thẳng và cải thiện giấc ngủ.</p><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741678305_e74c91523e96eb023852.png\"></figure><h2>1. Công Dụng Của Tinh Dầu Gỗ Đàn Hương</h2><h3><strong>1.1. Thư Giãn Tinh Thần và Giảm Căng Thẳng</strong></h3><p>Hương thơm ấm áp của gỗ đàn hương có khả năng làm dịu tâm trí, giúp giảm lo âu, căng thẳng và tạo cảm giác thư thái. Việc khuếch tán tinh dầu đàn hương trong không gian giúp cân bằng cảm xúc và nâng cao tinh thần.</p><h3><strong>1.2. Hỗ Trợ Giấc Ngủ Ngon</strong></h3><p>Tinh dầu gỗ đàn hương có tác dụng làm dịu hệ thần kinh, giúp bạn dễ dàng đi vào giấc ngủ và ngủ sâu hơn. Bạn có thể xông tinh dầu trong phòng ngủ hoặc nhỏ vài giọt lên gối để có giấc ngủ thư giãn.</p><p>&nbsp;</p><h3><strong>1.3. Chăm Sóc Da và Chống Lão Hóa</strong></h3><p>Tinh dầu đàn hương có đặc tính dưỡng ẩm và kháng khuẩn, giúp làm mềm da, giảm viêm, làm dịu kích ứng và hỗ trợ điều trị mụn. Nó còn có khả năng chống oxy hóa, giúp ngăn ngừa lão hóa và giữ cho làn da tươi trẻ.</p><h3><strong>1.4. Hỗ Trợ Hệ Hô Hấp</strong></h3><p>Tinh dầu đàn hương có tác dụng làm sạch đường hô hấp, giúp giảm ho, nghẹt mũi và hỗ trợ điều trị các bệnh liên quan đến viêm phế quản, cảm lạnh.</p><h3><strong>1.5. Tạo Hương Thơm Tự Nhiên và Khử Mùi</strong></h3><p>Tinh dầu đàn hương thường được sử dụng trong nước hoa, sản phẩm dưỡng thể và nến thơm nhờ mùi hương sang trọng, giúp khử mùi hôi và mang lại không gian thư giãn.</p><h2>2. Cách Sử Dụng Tinh Dầu Gỗ Đàn Hương</h2><ul><li><strong>Khuếch tán trong không gian</strong>: Nhỏ 3-5 giọt tinh dầu vào máy khuếch tán hoặc đèn xông để tạo không gian thư giãn.</li><li><strong>Massage thư giãn</strong>: Pha loãng tinh dầu với dầu nền (dầu dừa, dầu jojoba) để massage giúp làm mềm da và giảm căng thẳng.</li><li><strong>Chăm sóc da</strong>: Pha loãng tinh dầu với kem dưỡng hoặc serum để tăng cường độ ẩm và giảm kích ứng da.</li><li><strong>Xông mặt</strong>: Thêm vài giọt tinh dầu vào nước nóng để xông mặt, giúp làm sạch lỗ chân lông và thư giãn da.</li><li><strong>Xịt thơm tự nhiên</strong>: Pha tinh dầu với nước và xịt lên quần áo, chăn gối để tạo hương thơm nhẹ nhàng.</li></ul><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741678310_30a81949243e161d3c0b.png\"></figure><h2>3. Lưu Ý Khi Sử</h2>', 32000.00, 100, NULL, '2025-03-11 07:31:52'),
(5, 'Tinh dầu hương hoa anh đào', 3, '<h2><strong>Tinh Dầu Hương Hoa Anh Đào – Công Dụng và Cách Sử Dụng</strong></h2><p>Tinh dầu hương hoa anh đào mang đến hương thơm dịu nhẹ, tinh tế và thanh khiết, giúp thư giãn tinh thần, chăm sóc làn da và tạo không gian sống dễ chịu. Được chiết xuất từ những cánh hoa anh đào mong manh, tinh dầu này là sự lựa chọn hoàn hảo cho những ai yêu thích hương thơm nhẹ nhàng và sang trọng.</p><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741690091_39c7078adf4139289b8a.png\"></figure><h3><strong>1. Công Dụng Của Tinh Dầu Hoa Anh Đào</strong></h3><h4><strong>1.1. Thư Giãn Tinh Thần và Cải Thiện Tâm Trạng</strong></h4><p>Hương thơm thanh thoát của hoa anh đào giúp làm dịu tâm trí, giảm căng thẳng và mang lại cảm giác thư thái. Khuếch tán tinh dầu hoa anh đào trong không gian sống giúp tạo bầu không khí lãng mạn và thư giãn.</p><h4><strong>1.2. Hỗ Trợ Giấc Ngủ Sâu</strong></h4><p>Tinh dầu hoa anh đào có tác dụng an thần nhẹ, giúp bạn dễ đi vào giấc ngủ và ngủ sâu hơn. Xông tinh dầu trong phòng ngủ hoặc nhỏ vài giọt lên gối giúp cải thiện chất lượng giấc ngủ.</p><h4><strong>1.3. Dưỡng Ẩm và Chăm Sóc Da</strong></h4><p>Tinh dầu hoa anh đào có chứa các hợp chất chống oxy hóa và dưỡng ẩm, giúp làm mềm da, làm dịu kích ứng và cải thiện độ đàn hồi của da. Nó còn có tác dụng hỗ trợ làm sáng da và ngăn ngừa lão hóa.</p><h4><strong>1.4. Tạo Hương Thơm Tự Nhiên và Khử Mùi</strong></h4><p>Tinh dầu hoa anh đào có thể được sử dụng như một loại nước hoa thiên nhiên, giúp tạo mùi hương dịu nhẹ cho quần áo, chăn ga và không gian sống.</p><h4><strong>1.5. Cân Bằng Cảm Xúc và Tạo Cảm Giác Dễ Chịu</strong></h4><p>Hương thơm của hoa anh đào có tác dụng cân bằng cảm xúc, giảm lo âu và giúp tinh thần luôn lạc quan, yêu đời.</p><h3><strong>2. Cách Sử Dụng Tinh Dầu Hoa Anh Đào</strong></h3><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741690100_36cda2d491c1a72fb98a.png\"></figure><p>Khuếch tán trong không gian: Nhỏ 3-5 giọt tinh dầu vào máy khuếch tán hoặc đèn xông để tạo không gian thơm mát, dễ chịu.<br>Massage thư giãn: Pha loãng tinh dầu với dầu nền (dầu dừa, dầu hạnh nhân) để massage giúp giảm căng thẳng và làm mềm da.<br>Dưỡng da: Pha loãng tinh dầu với kem dưỡng hoặc serum để tăng cường độ ẩm và làm sáng da.<br>Tắm thư giãn: Thêm vài giọt tinh dầu vào nước tắm để thư giãn cơ thể và mang lại hương thơm dễ chịu.<br>Xịt phòng và tạo hương thơm tự nhiên: Pha tinh dầu với nước và xịt lên quần áo, chăn gối để tạo hương thơm thanh mát.</p><h3><strong>3. Lưu Ý Khi Sử Dụng</strong></h3><figure class=\"image\"><img src=\"http://localhost/web-store/public/uploads/1741690106_0be4e24b40d864d7a10f.png\"></figure><p>Không bôi trực tiếp tinh dầu nguyên chất lên da để tránh kích ứng.<br>Tránh tiếp xúc với mắt và vết thương hở.<br>Không sử dụng cho phụ nữ mang thai và trẻ nhỏ nếu không có hướng dẫn của chuyên gia.<br>Bảo quản tinh dầu nơi khô ráo, tránh ánh nắng trực tiếp để duy trì chất lượng.</p><p>Tinh dầu hương hoa anh đào là sự kết hợp hoàn hảo giữa hương thơm nhẹ nhàng và công dụng tuyệt vời cho sức khỏe, tinh thần và làm đẹp. Với những lợi ích vượt trội, đây chắc chắn là sản phẩm không thể thiếu trong bộ sưu tập tinh dầu thiên nhiên của bạn.</p>', 30000.00, 100, NULL, '2025-03-11 10:48:28'),
(6, 'Tinh dầu hương trè xanh', 3, '<h3>Tinh Dầu Hương Trà Xanh – Làn Gió Tươi Mát Từ Thiên Nhiên</h3><figure class=\"image\"><img src=\"https://taphoagiadinh.info.vn/public/uploads/1741748200_bc969eaf65fec0be47b3.jpg\"></figure><p>Tinh dầu trà xanh, chiết xuất từ lá trà xanh tươi (Camellia sinensis), là một trong những sản phẩm thiên nhiên được yêu thích nhờ hương thơm thanh mát và nhiều công dụng tuyệt vời. Không chỉ mang lại cảm giác thư giãn, tinh dầu này còn là “vũ khí bí mật” trong chăm sóc sức khỏe và sắc đẹp.</p><h4>Lợi ích của tinh dầu hương trà xanh</h4><ol><li><strong>Thư giãn tinh thần</strong>: Hương thơm nhẹ nhàng, tươi mới của trà xanh giúp giảm căng thẳng, xua tan mệt mỏi và mang lại cảm giác sảng khoái. Đây là lựa chọn lý tưởng sau những giờ làm việc căng thẳng.</li><li><strong>Kháng khuẩn tự nhiên</strong>: Với đặc tính chống oxy hóa và kháng khuẩn mạnh mẽ, tinh dầu trà xanh có thể được dùng để làm sạch không khí hoặc hỗ trợ điều trị các vấn đề về da như mụn trứng cá.</li><li><strong>Chăm sóc da và tóc</strong>: Khi pha loãng với dầu nền, tinh dầu trà xanh giúp làm dịu da dầu, giảm viêm và kích thích mọc tóc, mang lại mái tóc bóng khỏe.</li></ol><h4>Cách sử dụng tinh dầu trà xanh</h4><ul><li><strong>Khuếch tán hương thơm</strong>: Nhỏ 3-5 giọt vào máy khuếch tán để làm mới không gian sống hoặc văn phòng.</li><li><strong>Dưỡng da</strong>: Pha 1-2 giọt với dầu dừa, thoa lên vùng da mụn hoặc da dầu để cải thiện tình trạng da.</li><li><strong>Tắm thư giãn</strong>: Thêm vài giọt vào nước tắm hoặc bồn ngâm chân để tận hưởng cảm giác dễ chịu.</li></ul><h4>Lưu ý khi sử dụng</h4><p>Tinh dầu trà xanh nguyên chất khá đậm đặc, vì vậy không nên dùng trực tiếp lên da mà cần pha loãng. Hãy thử một lượng nhỏ trên da tay để kiểm tra phản ứng trước khi sử dụng rộng rãi.</p><h4>Kết luận</h4><p>Tinh dầu hương trà xanh không chỉ là một mùi hương mà còn là một liệu pháp tự nhiên giúp bạn chăm sóc cả cơ thể và tâm hồn. Với sự tươi mới và tinh tế, đây chắc chắn là sản phẩm đáng để thử trong bộ sưu tập tinh dầu của bạn!</p>', 25000.00, 100, NULL, '2025-03-12 02:56:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_discounts`
--

CREATE TABLE `product_discounts` (
  `discount_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `discount_type` enum('percentage','fixed') NOT NULL,
  `discount_value` decimal(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_prices`
--

CREATE TABLE `product_prices` (
  `price_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `last_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `created_at`) VALUES
(1, 'Nguyễn Văn A', 'a@gmail.com', 'hashed_password_here', '0901234567', 'Hà Nội', 'customer', '2025-03-03 10:44:41'),
(2, 'Trần Thị B', 'b@gmail.com', 'hashed_password_here', '0912345678', 'TP HCM', 'admin', '2025-03-03 10:44:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouses`
--

CREATE TABLE `warehouses` (
  `warehouse_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `manager` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `best_selling_products`
--
ALTER TABLE `best_selling_products`
  ADD PRIMARY KEY (`record_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `inventory_movements`
--
ALTER TABLE `inventory_movements`
  ADD PRIMARY KEY (`movement_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `product_discounts`
--
ALTER TABLE `product_discounts`
  ADD PRIMARY KEY (`discount_id`);

--
-- Chỉ mục cho bảng `product_prices`
--
ALTER TABLE `product_prices`
  ADD PRIMARY KEY (`price_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`warehouse_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `best_selling_products`
--
ALTER TABLE `best_selling_products`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `inventory_movements`
--
ALTER TABLE `inventory_movements`
  MODIFY `movement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product_discounts`
--
ALTER TABLE `product_discounts`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_prices`
--
ALTER TABLE `product_prices`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `warehouse_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
