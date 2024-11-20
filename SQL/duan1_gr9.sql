-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2024 at 02:58 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1_gr9`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` int NOT NULL DEFAULT '0',
  `reset_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `token_expixy` datetime DEFAULT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name_user`, `pass`, `email`, `phone`, `address`, `role`, `reset_token`, `token_expixy`, `create_at`, `update_at`) VALUES
(1, 'sondinh1', 'sonplay2', 'nguyendinhson92005@gmail.com', '0579641651', 'Tân Hội', 1, NULL, NULL, '0000-00-00 00:00:00', '2024-11-19 02:18:58'),
(2, 'sondinh2', 'sondinh18', 'dinhson9@gmail.com', '0955948485', 'Tân Lập', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'sondinh3', 'sondinh100', 'sonplay@gmail.com', '029368276', 'Hà Nội', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'sondinh4', '1234', 'nguye92005@gmail.com', '038474737', '', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'sondinh45', '22333', 'sdhbhf@gmail.com', '0237672872', '', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'sondinh45', '22333', 'sdhbhf@gmail.com', '0237672872', '', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'sondinh45', '22333', 'sdhbhf@gmail.com', '0237672872', '', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'son16', 'soniii', 'nsdbv@gmail.com', '029374873', 'hà nội', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'sondinh222', 'sondinh222', 'anjkd@gmail.com', '0291546897', 'ha noi', 0, NULL, NULL, '2024-11-18 14:29:47', '2024-11-18 14:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int NOT NULL,
  `id_user` int NOT NULL,
  `pro_id` int NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `price` double NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `cate_name` varchar(255) DEFAULT NULL,
  `trang_thai` tinyint NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `color_variant`
--

CREATE TABLE `color_variant` (
  `color_variant_id` int NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_cmt` int NOT NULL,
  `id` int NOT NULL,
  `content` int NOT NULL,
  `date` date NOT NULL,
  `id_pro` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` int NOT NULL,
  `id_us` int NOT NULL,
  `name_us` varchar(255) NOT NULL,
  `total` double NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1. Đang chờ duyệt\r\n2. Đã xác nhận\r\n3. Đang vận chuyển\r\n4. Hoàn thành',
  `payment` int NOT NULL COMMENT '1. Thanh toán khi nhận hàng\r\n2. Chuyển khoản',
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id_ordt` int NOT NULL,
  `id_orders` int NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `en_argen` int NOT NULL,
  `id_pro` int NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_pro` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `id_cate` int NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `variant_id` int NOT NULL,
  `price` double NOT NULL,
  `quantity_va` int NOT NULL,
  `pro_id` int NOT NULL,
  `variant_color_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `color_variant`
--
ALTER TABLE `color_variant`
  ADD PRIMARY KEY (`color_variant_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_cmt`),
  ADD KEY `id_pro` (`id_pro`),
  ADD KEY `comment_usfk_1` (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `fk_order_acc` (`id_us`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id_ordt`),
  ADD KEY `id_orders` (`id_orders`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `fk_pro_cate` (`id_cate`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`variant_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `variant_color_id` (`variant_color_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color_variant`
--
ALTER TABLE `color_variant`
  MODIFY `color_variant_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_cmt` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id_ordt` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_pro` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `variant_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id_pro`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `products` (`id_pro`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_usfk_1` FOREIGN KEY (`id`) REFERENCES `account` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_acc` FOREIGN KEY (`id_us`) REFERENCES `account` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id_orders`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_detail_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `products` (`id_pro`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_pro_cate` FOREIGN KEY (`id_cate`) REFERENCES `category` (`category_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `variant`
--
ALTER TABLE `variant`
  ADD CONSTRAINT `variant_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id_pro`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `variant_ibfk_2` FOREIGN KEY (`variant_color_id`) REFERENCES `color_variant` (`color_variant_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
