-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 12:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_nang_cao`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) UNSIGNED NOT NULL,
  `meta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `meta`) VALUES
(1, 'Quần áo', 2, 'quan-ao'),
(2, 'Giày dép', 2, 'giay-dep'),
(3, 'Trang sức', 2, 'trang-suc'),
(4, 'Balo/Túi đeo chéo', 3, 'balo-tui-deo-cheo'),
(5, 'Mùi hương', 3, 'mui-huong'),
(6, 'Mũ/nón', 3, 'mu-non'),
(7, 'Self-help', 4, 'self-help'),
(8, 'Kiến thức', 4, 'kien-thuc'),
(9, 'Laptop', 5, 'laptop'),
(10, 'Điện thoại', 5, 'dien-thoai'),
(11, 'Linh kiện', 5, 'linh-kien');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `meta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `meta`) VALUES
(1, 'Trang chủ', '/'),
(2, 'Thời trang', 'shopping/thoi-trang'),
(3, 'Phụ kiện', 'shopping/phu-kien'),
(4, 'Sách', 'shopping/sach'),
(5, 'Công nghệ', 'shopping/cong-nghe'),
(6, 'Liên hệ', 'shopping/lien-he');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2024-01-30-155419', 'App\\Database\\Migrations\\CreateTableUser', 'default', 'App', 1709103496, 1),
(3, '2024-02-28-062439', 'App\\Database\\Migrations\\CreateMenuCateProTables', 'default', 'App', 1709103546, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) UNSIGNED NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `sale` decimal(10,0) NOT NULL,
  `detail` text NOT NULL,
  `view` int(25) NOT NULL,
  `total` int(25) NOT NULL,
  `sold` int(25) NOT NULL,
  `time` datetime NOT NULL,
  `meta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `parent`, `price`, `sale`, `detail`, `view`, `total`, `sold`, `time`, `meta`) VALUES
(7, 'Đồ bộ thể thao nam màu gradient', 1, '550000', '490000', 'Thông tin sản phẩm<br>\r\n- Hàng Full tag, mác cực sang chảnh (xem video trên ảnh sản phẩm).<br>\r\n- Chất liệu: thun cotton 100%, vải dày, vải mềm, vải mịn, thoáng mát, không xù lông (không nhàu)<br>\r\n- Đường may tỉ mỉ, chắc chắn<br>\r\n- Công dụng: mặc ở nhà, mặc đi chơi, khi vận động thể thao, đi du lịch,...<br>\r\n- Thiết kế hiện đại, trẻ trung, năng động. Dễ phối đồ<br>\r\n- 5 size XS,S, M,L,XL,XXL<br>\r\nSIZE S: < 35KG <br>\r\nSIZE M: 35 - 55KG <br>\r\nSIZE L: 55 - 68KG <br>\r\nSIZE XL: > 68KG<br>\r\nHướng dẫn sử dụng sản phẩm :<br>\r\n\r\n- Giặt ở nhiệt độ bình thường, với đồ có màu tương tự.<br>\r\n- Không được dùng hóa chất tẩy.<br>\r\n- Hạn chế sử dụng máy sấy và ủi ở nhiệt độ thích hợp.<br>\r\n\r\nKatty\'s Campus KẾT<br>\r\nSản phẩm Đồ bộ thể thao nam màu gradient form rộng 100% giống mô tả. Hình ảnh sản phẩm là ảnh thật do shop tự chụp và giữ bản quyền hình ảnh<br>\r\nĐảm bảo vải chất lượng 100%<br>\r\nÁo được kiểm tra kĩ càng, cẩn thận và tư vấn nhiệt tình trước khi gói hàng giao cho Quý Khách<br>\r\nHàng có sẵn, giao hàng ngay khi nhận được đơn \r\nHoàn tiền nếu sản phẩm không giống với mô tả\r\nChấp nhận đổi hàng khi size không vừa<br>\r\nGiao hàng trên toàn quốc, nhận hàng trả tiền <br>\r\nHỗ trợ đổi trả theo quy định của Katty\'s Campus.<br>\r\n\r\n1. Điều kiện áp dụng (trong vòng 07 ngày kể từ khi nhận sản phẩm) <br>\r\n- Hàng hoá vẫn còn mới, chưa qua sử dụng <br>\r\n- Hàng hoá bị lỗi hoặc hư hỏng do vận chuyển hoặc do nhà sản xuất<br> \r\n2. Trường hợp được chấp nhận: <br>\r\n- Hàng không đúng size, kiểu dáng như quý khách đặt hàng <br>\r\n- Không đủ số lượng, không đủ bộ như trong đơn hàng <br>\r\n3. Trường hợp không đủ điều kiện áp dụng chính sách: <br>\r\n- Quá 07 ngày kể từ khi Quý khách nhận hàng <br>\r\n- Gửi lại hàng không đúng mẫu mã, không phải sản phẩm của Katty\'s Campus\r\n- Không thích, không hợp, đặt nhầm mã, nhầm màu,... <br>\r\nDo màn hình và điều kiện ánh sáng khác nhau, màu sắc thực tế của sản phẩm có thể chênh lệch khoảng 3-5%', 3, 123, 32, '2023-12-13 14:44:00', 'assets/img/thoi-trang/ao-the-thao.jpg'),
(12, 'Dép lê hình chú cừu phối màu trắng xanh đáng yêu', 2, '99000', '0', '', 3, 123, 54, '1900-01-07 00:00:00', 'assets/img/thoi-trang/dep-le-hinh-cuu-trang.jpg'),
(13, 'Dép lê đi trong nhà mùa lạnh xù lông êm ái', 2, '109000', '99000', '', 5, 12, 5, '1900-01-08 00:00:00', 'assets/img/thoi-trang/dep-long-di-trong-nha.jpg'),
(16, 'Giày thể thao phong cách đường phố màu xám tráng', 2, '339000', '329000', '', 4, 43, 23, '1900-01-01 00:00:00', 'assets/img/thoi-trang/giay-phong-cach.jpg'),
(17, 'Giày thời trang phong cách đường phố cho nữ', 2, '279000', '249000', '', 5, 32, 23, '1900-01-07 00:00:00', 'assets/img/thoi-trang/giay-phong-cach-duong-pho-cho-nu.jpg'),
(18, 'Nhẫn hình bông tuyết dành cho nữ', 3, '19000', '1000', '', 123, 321, 12, '1900-01-08 00:00:00', 'assets/img/thoi-trang/nhan-hinh-bong-tuyet.jpg'),
(19, 'Nhẫn thời trang inox chống gỉ', 3, '17000', '0', '', 53, 443, 21, '1900-01-15 00:00:00', 'assets/img/thoi-trang/nhan-khong-gi.jpg'),
(20, 'Mũ tròn vành lót lông ấm áp', 6, '55000', '49000', '', 1, 21, 2, '1900-01-22 00:00:00', 'assets/img/thoi-trang/non-trang.jpg'),
(21, 'Quần tây âu Nam phong cách hàn quốc', 1, '399000', '199000', '', 52, 22, 44, '1900-01-14 14:45:16', 'assets/img/thoi-trang/quan-au-ong-rong.jpg'),
(22, 'Quần baggy ống rộng màu nâu', 1, '99000', '0', '', 54, 12, 55, '1900-01-07 00:00:00', 'assets/img/thoi-trang/quan-baggy-nau.jpg'),
(24, 'Quần đùi nam trắng có dây rút', 1, '99000', '0', '', 32, 2, 33, '1900-01-02 14:45:23', 'assets/img/thoi-trang/quan-short-trang.jpg'),
(25, 'Dép quai hậu đen chắc chắn dùng đi học đi làm', 2, '249000', '0', '', 12, 33, 11, '1900-01-22 00:00:00', 'assets/img/thoi-trang/sandal-den.jpg'),
(26, 'Dép quai trắng xinh xắn nhỏ gọn dành cho nữ', 2, '199000', '145000', '', 76, 34, 43, '1900-01-15 00:00:00', 'assets/img/thoi-trang/sandal-trang-cho-nu.jpg'),
(27, 'Đừng bao giờ đi ăn một mình', 7, '222000', '99000', '', 4, 432, 32, '1900-01-16 00:00:00', 'assets/img/sach/dung-bao-gio-di-an-mot-minh.jpg'),
(28, 'Hack não 1500 từ tiếng anh', 8, '199000', '149000', '', 45, 65, 5, '1900-01-02 00:00:00', 'assets/img/sach/hack-nao-1500-tu.jpg'),
(29, 'Khi tài năng không theo kịp giấc mơ', 7, '115000', '79000', '', 76, 4, 5, '1900-01-08 00:00:00', 'assets/img/sach/khi-tai-nang-khong-theo-kip-giac-mo.jpg'),
(30, 'Ba lô đi học phong cách trẻ trung năng động', 4, '339000', '330000', '', 67, 3, 44, '1900-01-08 00:00:00', 'assets/img/phu-kien/ba-lo-xanh.jpg'),
(31, 'Lăn khử mùi chống tiết mồ hôi', 5, '115000', '109000', '', 54, 34, 43, '1900-01-07 14:45:39', 'assets/img/phu-kien/lan-khu-mui.jpg'),
(32, 'Nước hoa dạng lăn mùi hương nhẹ nhàng trái cây', 5, '49000', '42000', '', 45, 43, 43, '1900-01-08 00:00:00', 'assets/img/phu-kien/nuoc-hoa-dang-lan.jpg'),
(33, 'Sáp thơm quần áo bỏ tủ hoặc túi quần', 5, '29000', '15000', '', 6, 2, 3, '1900-01-02 00:00:00', 'assets/img/phu-kien/sap-thom.jpg'),
(34, 'Túi đeo chéo phong cách dành cho cả nam và nữ', 4, '129000', '69000', '', 87, 3, 333, '1900-01-08 00:00:00', 'assets/img/phu-kien/tui-deo-cheo.jpg'),
(35, 'Iphone 12 mini 99% màu trắng', 9, '12000000', '9999000', '', 56, 432, 2, '1900-01-01 00:00:00', 'assets/img/cong-nghe/iphone12.jpg'),
(36, 'Iphone 14 promax nguyên hộp', 9, '29000000', '28000000', '', 2, 32, 33, '1900-01-09 00:00:00', 'assets/img/cong-nghe/iphone14-pro-max.jpg'),
(37, 'Laptop Tuf gaming chuyên mọi loại game và đồ họa', 9, '24000000', '21000000', '', 87, 12, 22, '1900-01-07 00:00:00', 'assets/img/cong-nghe/laptop-gaming-i5.jpg'),
(38, 'Laptop gaming chip ryzen 5 hiệu năng cao', 9, '27000000', '25000000', '', 2, 33, 3, '1900-01-01 14:46:03', 'assets/img/cong-nghe/laptop-gaming-tuf.jpg'),
(39, 'Laptop văn phòng mỏng nhẹ dành cho sinh viên', 9, '17000000', '12000000', '', 32, 12, 44, '1900-01-08 00:00:00', 'assets/img/cong-nghe/laptop-van-phong-i5h.jpg'),
(40, 'Laptop văn phòng chip core i9 mỏng nhẹ làm đồ họa', 9, '39000000', '25000000', '', 432, 3, 54, '1900-01-03 00:00:00', 'assets/img/cong-nghe/laptop-van-phong-i9h.jpg'),
(41, 'Điện thoại Reno 7', 10, '7900000', '6900000', '', 2, 23, 43, '1900-01-29 00:00:00', 'assets/img/cong-nghe/reno7-android.jpg'),
(42, 'Điện thoại Reno 8', 10, '10900000', '9999000', '', 55, 43, 43, '1900-01-15 00:00:00', 'assets/img/cong-nghe/reno8-android.jpg'),
(43, 'Sạc laptop văn phòng 180W', 11, '750000', '1000', '', 25, 54, 12, '1900-01-01 06:37:19', 'assets/img/cong-nghe/sac-lap-top-180w.jpg'),
(44, 'Sạc laptop gaming 225W', 11, '790000', '740000', '', 11, 432, 12, '1900-01-22 00:00:00', 'assets/img/cong-nghe/sac-laptop-asus.jpg'),
(45, 'Điện thoại Xiaomi Redme camera siêu nét', 10, '4900000', '3990000', 'fgggggggggggggggggggg', 76, 43, 12, '1900-01-22 00:00:00', 'assets/img/cong-nghe/xiaomi-redmi.jpg'),
(46, 'Áo khoác lông ấm áp mùa đông cho nữ', 1, '399000', '299000', 'fffffffffffffffffff', 65, 65, 234, '1900-01-01 00:00:00', 'assets/img/thoi-trang/ao_khoac_long_am_ap_mua_dong_cho_nu.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `loai` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `loai`) VALUES
(1, 'admin@gmail.com', '$2y$10$l2fbaTZwPPvIUO4dkPmPY.eOGvhA62k.2F6m7Dm28AWHO63X7OT3m', 'Phạm Hữu Lợi', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_parent_foreign` (`parent`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_parent_foreign` (`parent`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
