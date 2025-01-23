-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 09:25 AM
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
-- Database: `pcmartbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `access` varchar(20) NOT NULL,
  `number` varchar(15) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `bio` text NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `presentaddress` text NOT NULL,
  `permanentaddress` text NOT NULL,
  `nidpic` text NOT NULL,
  `propic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `access`, `number`, `gender`, `bio`, `dob`, `doj`, `presentaddress`, `permanentaddress`, `nidpic`, `propic`) VALUES
(27, 'Alvi', 'alvi@aiub.edu', 'Alvi12#', 'Full Control', '01987987987', 'Male', 'www.github.com/sameer-at-git', '2001-05-26', '2025-01-15', 'Basundhara', 'Rajshahi', '../uploads/nid_67765c838ed15.jpg', '../uploads/pic_67765c838ed19.jpg'),
(29, 'Rifat Talukdar', '22-46428-1@aiub.edu', 'Rifat12#', 'Full Control', '01234567892', 'Male', 'www.github.com/rifat-at-git', '2000-01-01', '2025-01-01', 'Kuril', 'Tangail', '../uploads/nid_67913a0b99c5c.png', '../uploads/pic_67913a0b99c65.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `technician_id` int(50) NOT NULL,
  `customer_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `appointment_date`, `status`, `technician_id`, `customer_id`) VALUES
(1, '2025-01-10', 'Pending', 201, 101),
(2, '2025-01-11', 'Completed', 3, 102),
(3, '2025-01-12', 'Pending', 3, 103),
(4, '2025-01-13', 'Cancelled', 3, 104),
(5, '2025-01-14', 'Completed', 3, 105);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `email`, `password`, `name`, `address`, `phone`) VALUES
(1, 'clark0@example.com', 'pass1', 'Clark Kent', 'Dhaka, Bangladesh', '01478996685'),
(2, 'bruce1@example.com', 'pass2', 'Bruce Wayne', 'Cox\'s Bazar, Bangladesh', '01831178380'),
(3, 'diana2@example.com', 'pass3', 'Diana Prince', 'Narayanganj, Bangladesh', '01770244378'),
(4, 'barry3@example.com', 'pass4', 'Barry Allen', 'Gazipur, Bangladesh', '01834033271'),
(5, 'hal4@example.com', 'pass5', 'Hal Jordan', 'Rangpur, Bangladesh', '01690195666'),
(6, 'arthur5@example.com', 'pass6', 'Arthur Curry', 'Bogra, Bangladesh', '01571645812'),
(7, 'victor6@example.com', 'pass7', 'Victor Stone', 'Mymensingh, Bangladesh', '01398817763'),
(8, 'oliver7@example.com', 'pass8', 'Oliver Queen', 'Feni, Bangladesh', '01898875472'),
(9, 'john8@example.com', 'pass9', 'John Constantine', 'Feni, Bangladesh', '01659413242'),
(10, 'billy9@example.com', 'pass10', 'Billy Batson', 'Jessore, Bangladesh', '01732561482'),
(11, 'kara10@example.com', 'pass11', 'Kara Zor-El', 'Mymensingh, Bangladesh', '01933336696'),
(12, 'j\'onn11@example.com', 'pass12', 'J\'onn J\'onzz', 'Mymensingh, Bangladesh', '01699740268'),
(13, 'selina12@example.com', 'pass13', 'Selina Kyle', 'Dhaka, Bangladesh', '01493877821'),
(14, 'lois13@example.com', 'pass14', 'Lois Lane', 'Bogra, Bangladesh', '01893762679'),
(15, 'lex14@example.com', 'pass15', 'Lex Luthor', 'Comilla, Bangladesh', '01784159375'),
(16, 'harley15@example.com', 'pass16', 'Harley Quinn', 'Pabna, Bangladesh', '01431015780'),
(17, 'pamela16@example.com', 'pass17', 'Pamela Isley', 'Feni, Bangladesh', '01383157761'),
(18, 'jim17@example.com', 'pass18', 'Jim Gordon', 'Pabna, Bangladesh', '01780391900'),
(19, 'eobard18@example.com', 'pass19', 'Eobard Thawne', 'Mymensingh, Bangladesh', '01943984508'),
(20, 'slade19@example.com', 'pass20', 'Slade Wilson', 'Barisal, Bangladesh', '01384617632');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(100) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `pre_add` varchar(100) NOT NULL,
  `per_add` varchar(100) NOT NULL,
  `gender` text NOT NULL,
  `marital_status` text NOT NULL,
  `nid` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `joining_date` varchar(100) NOT NULL,
  `employment` text NOT NULL,
  `cv` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `approved` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `f_name`, `l_name`, `phone`, `dob`, `pre_add`, `per_add`, `gender`, `marital_status`, `nid`, `pic`, `joining_date`, `employment`, `cv`, `email`, `password`, `approved`) VALUES
(1, 'John', 'Doe', '01712345678', '1990-02-15', 'Dhaka, Bangladesh', 'Chittagong, Bangladesh', 'Male', 'Unmarried', '', '', '2023-02-01', 'Full', '', 'john.doe@gmail.com', 'password123', 1),
(2, 'Jane', 'Smith', '01623456789', '1995-11-25', 'Sylhet, Bangladesh', 'Rajshahi, Bangladesh', 'Female', 'Married', '', '', '2022-05-10', 'Part', '', 'jane.smith@yahoo.com', 'securepassword', 1),
(3, 'Alice', 'Brown', '01834567890', '1992-06-18', 'Barisal, Bangladesh', 'Dhaka, Bangladesh', 'Female', 'Unmarried', '', '', '2021-08-15', 'Intern', '', 'alice.brown@hotmail.com', 'mypassword', 1),
(4, 'Robert', 'Johnson', '01598765432', '1988-03-09', 'Khulna, Bangladesh', 'Khulna, Bangladesh', 'Male', 'Married', '', '', '2020-03-20', 'Full', '', 'robert.johnson@gmail.com', 'robert1234', 1),
(5, 'Emily', 'Davis', '01767890123', '1993-07-12', 'Comilla, Bangladesh', 'Barisal, Bangladesh', 'Female', 'Unmarried', '', '', '2023-01-10', 'Part', '', 'emily.davis@yahoo.com', 'emilysecure', 1),
(6, 'Michael', 'Clark', '01612348765', '1997-12-22', 'Dhaka, Bangladesh', 'Chittagong, Bangladesh', 'Male', 'Unmarried', '', '', '2021-11-01', 'Intern', '', 'michael.clark@hotmail.com', 'michael2024', 1),
(7, 'Sophia', 'Martinez', '01890187654', '1989-05-30', 'Sylhet, Bangladesh', 'Rajshahi, Bangladesh', 'Female', 'Married', '', '', '2019-06-25', 'Full', '', 'sophia.martinez@gmail.com', 'sophiapass', 1),
(8, 'William', 'Taylor', '01587654321', '1996-09-15', 'Khulna, Bangladesh', 'Dhaka, Bangladesh', 'Male', 'Unmarried', '', '', '2022-02-18', 'Part', '', 'william.taylor@yahoo.com', 'william789', 1),
(9, 'Olivia', 'Harris', '01745678901', '1994-01-10', 'Comilla, Bangladesh', 'Barisal, Bangladesh', 'Female', 'Married', '', '', '2023-03-05', 'Intern', '', 'olivia.harris@hotmail.com', 'olivia456', 1),
(10, 'David', 'Moore', '01634567892', '1991-08-08', 'Dhaka, Bangladesh', 'Rajshahi, Bangladesh', 'Male', 'Married', '', '', '2020-12-10', 'Full', '', 'david.moore@gmail.com', 'davidsecure', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faovourite`
--

CREATE TABLE `faovourite` (
  `favorite_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_per_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_method` varchar(200) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `brand` text NOT NULL,
  `quantity` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `about` varchar(100) NOT NULL,
  `price` int(200) NOT NULL,
  `added_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `type`, `brand`, `quantity`, `status`, `photo`, `about`, `price`, `added_by`) VALUES
(1, 'laptop', 'Dell', 10, 1, 'images/product/dell15.png', 'Dell Inspiron 15 i5 1235U, 8GB RAM, 256GB SSD', 75000, NULL),
(2, 'ram', 'Corsair', 20, 1, 'images/product/corsairram.png', 'Corsair Vengeance 16GB DDR4', 8000, NULL),
(3, 'laptop', 'HP', 5, 1, 'images/product/hppavilion.png', 'HP Pavilion i5 1455U, 16GB RAM, 512GB SSD', 95000, NULL),
(4, 'ram', 'XPG', 16, 1, 'images/product/xpgram.png', 'XPG 16GB DDR4', 7000, NULL),
(5, 'ssd', 'HP', 5, 1, '', 'HP EX900 512GB', 4500, NULL),
(6, 'gpu', 'INTEL', 10, 1, 'images/product/intela750.png', 'INTEL ARC A750 8GB', 28500, NULL),
(7, 'ssd', 'KINGSTON', 15, 1, '', 'KINGSTON NV3 256GB', 3000, NULL),
(8, 'gpu', 'Gigabyte', 10, 1, 'images/product/gigabyte4060.png', 'NVIDIA RX 4060 8GB', 46500, NULL),
(9, 'gpu', 'INTEL', 10, 1, 'images/product/b580.png', 'INTEL ARC B580 12GB', 35500, NULL),
(10, 'cpu', 'INTEL', 30, 1, 'images/product/i312100.png', 'INTEL i3 12100', 11000, NULL),
(11, 'motherboard', 'ASUS', 15, 1, '', 'ASUS B660 Intel 12thGEN Motherboard)', 13000, NULL),
(12, 'cpu', 'RYZEN', 25, 1, 'images/product/r55600.png', 'RYZEN 5 5600', 15000, NULL),
(13, 'cpu', 'INTEL', 15, 1, 'images/product/i513400.png', 'INTEL i5 13400f', 16500, NULL),
(14, 'laptop', 'Dell', 10, 1, 'images/product/dell16.png', 'Dell Inspiron 16, 8GB RAM, 256GB SSD', 75000, NULL),
(15, 'laptop', 'HP', 8, 1, 'images/product/dell16.png', 'HP Pavilion 14, 16GB RAM, 512GB SSD', 85000, NULL),
(16, 'laptop', 'Asus', 12, 1, 'images/product/asusroglaptop.png', 'Asus ROG Zephyrus, 32GB RAM, 1TB SSD', 120000, NULL),
(17, 'laptop', 'Lenovo', 0, 0, 'images/product/lenovoideapad.png', 'Lenovo IdeaPad, 8GB RAM, 1TB HDD', 55000, NULL),
(18, 'motherboard', 'Asus', 15, 1, 'images/product/asusz790.png', 'Asus ROG Strix Z790-E Gaming', 35000, NULL),
(19, 'motherboard', 'MSI', 20, 1, 'images/product/msib760.png', 'MSI MAG B660 TOMAHAWK', 28000, NULL),
(20, 'motherboard', 'Gigabyte', 0, 0, '', 'Gigabyte B550 AORUS ELITE', 25000, NULL),
(21, 'cpu', 'Intel', 25, 1, 'images/product/i312100.png', 'Intel Core i9-12900K, 12 Cores', 50000, NULL),
(22, 'cpu', 'AMD', 18, 1, 'images/product/r55600.png', 'AMD Ryzen 9 7900X, 12 Cores', 47000, NULL),
(23, 'gpu', 'NVIDIA', 7, 1, 'images/product/gigabyte4060.png', 'NVIDIA RTX 4090, 24GB GDDR6X', 180000, NULL),
(24, 'gpu', 'AMD', 10, 0, 'images/product/amd7900.png', 'AMD Radeon RX 7900 XTX, 20GB GDDR6', 160000, NULL),
(25, 'ssd', 'Samsung', 30, 1, 'images/product/corsairssd.png', 'Samsung 980 PRO, 1TB NVMe', 14000, NULL),
(26, 'ssd', 'Western Digital', 25, 1, 'images/product/corsairssd.png', 'WD Black SN850X, 2TB NVMe', 24000, NULL),
(27, 'ssd', 'Kingston', 20, 0, 'images/product/kingstonssd.png', 'Kingston NV2, 500GB NVMe', 6000, NULL),
(28, 'psu', 'Corsair', 15, 1, 'images/product/gigabyte4060.png', 'Corsair RM850x, 850W, 80+ Gold', 12500, NULL),
(29, 'psu', 'EVGA', 12, 1, 'images/product/gigabyte4060.png', 'EVGA SuperNOVA 750W, 80+ Gold', 10500, NULL),
(30, 'casing', 'NZXT', 10, 1, 'images/product/casing4.png', 'NZXT H510, Mid Tower, Tempered Glass', 7500, NULL),
(31, 'casing', 'Cooler Master', 8, 0, 'images/product/casing2.png', 'Cooler Master MasterBox Q300L', 4000, NULL),
(32, 'casing', 'NZXT', 10, 1, 'images/product/casing6.png', 'NZXT H7 Flow, Mid Tower, Tempered Glass', 10000, NULL),
(33, 'casing', 'Deepcool', 18, 1, 'images/product/casing3.png', 'Deepcool MACCUBE, Mid Tower, Tempered Glass', 5500, NULL),
(34, 'casing', 'Corsair', 12, 1, 'images/product/casing5.png', 'Corsair iBOX, Mid Tower, Tempered Glass', 8700, NULL),
(35, 'monitor', 'LG', 12, 1, 'images/product/monitor1.png', 'LG UltraGear 27GL850, 27\", QHD, 144Hz', 35000, NULL),
(36, 'monitor', 'Dell', 8, 1, 'images/product/monitor4.png', 'Dell S2721DGF, 27\", QHD, 165Hz', 33000, NULL),
(37, 'monitor', 'Samsung', 10, 1, 'images/product/monitor2.png', 'Samsung Odyssey G7, 32\", QHD, 240Hz', 55000, NULL),
(38, 'monitor', 'Samsung', 10, 1, 'images/product/monitor3.png', 'Samsung LF22, 22\", IPS, 100Hz', 15000, NULL),
(39, 'cooler', 'Noctua', 20, 1, 'images/product/cooler2.png', 'Noctua NH-D15, Air Cooler', 9000, NULL),
(40, 'cooler', 'Cooler Master', 15, 1, 'images/product/cooler1.png', 'Cooler Master Hyper 212 EVO', 3000, NULL),
(41, 'cooler', 'Deepcool', 15, 1, 'images/product/cooler3.png', 'Deepcool AK500', 5000, NULL),
(42, 'cooler', 'Deepcool', 15, 1, 'images/product/cooler4.png', 'Deepcool LS520', 9000, NULL),
(43, 'ram', 'Corsair', 25, 1, 'images/product/corsairram.png', 'Corsair Vengeance LPX, 16GB DDR4', 8000, NULL),
(44, 'ram', 'G.Skill', 18, 1, 'images/product/gskillram.png', 'G.Skill Trident Z RGB, 32GB DDR5', 18000, NULL),
(45, 'keyboard', 'Logitech', 20, 1, 'images/product/keyboard1.png', 'Logitech G Pro Mechanical Keyboard', 7500, NULL),
(46, 'keyboard', 'Razer', 15, 1, 'images/product/keyboard2.png', 'Razer BlackWidow V3 Pro, Wireless', 11000, NULL),
(47, 'keyboard', 'Ajazz', 25, 1, 'images/product/keyboard3.png', 'Ajazz AC081, Wireless', 8100, NULL),
(48, 'mouse', 'Logitech', 30, 1, 'images/product/mouse1.png', 'Logitech G502 HERO, Wired', 4500, NULL),
(49, 'mouse', 'Apple', 30, 1, 'images/product/mouse2.png', 'Apple Magic Mouse, Wireless', 8500, NULL),
(50, 'mouse', 'Razor', 30, 1, 'images/product/mouse3.png', 'Razor Viper Ultimate, Hybrid', 11500, NULL),
(51, 'mouse', 'SteelSeries', 20, 1, 'images/product/mouse4.png', 'SteelSeries Rival 600, Wired', 5500, NULL),
(53, 'ssd', 'Kingston', 23, 1, 'images/product/kingstonssd.png', '1TB SSD, Read 3500MB/s, Write 2000MB/s', 9000, NULL),
(54, 'gpu', 'Sapphire', 10, 1, 'images/product/gpu4.png', 'Sapphire Pulse AMD Radeon RX 6800XT 16 GB GDDR6 Graphics Card', 97000, NULL),
(55, 'psu', 'ASUS', 5, 1, 'images/product/psu3.png', 'Asus TUF Gaming 1000W Power Supply', 23000, NULL),
(56, 'cpu', 'AMD', 30, 1, 'images/product/amdcpu3.png', 'AMD Ryzen 5 8500G 6 Core 12 Thread Processor with Radeon 740M Graphics', 15500, NULL),
(58, 'psu', 'Antec', 20, 1, 'images/product/psu5.png', 'Antec CSK 550W Power Supply', 5000, NULL),
(59, 'ssd', 'HP', 12, 1, 'images/product/kingstonssd.png', 'HP EX500 256GB SSD', 3200, NULL),
(60, 'casing', 'MaxGreen', 10, 1, 'images/product/casing7.png', 'MaxGreen 350 Mid-Tower ARGB Case with 3 ARGB fans included', 3250, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `rating` double NOT NULL,
  `comment` varchar(200) NOT NULL,
  `review_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `technician_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `work_area` varchar(200) NOT NULL,
  `work_hour` varchar(200) NOT NULL,
  `nidpic` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `cv` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`technician_id`, `first_name`, `last_name`, `father_name`, `gender`, `dob`, `phone`, `address`, `experience`, `work_area`, `work_hour`, `nidpic`, `photo`, `cv`, `email`, `password`) VALUES
(1, 'Tamjid', 'Hossain', 'Motaher', 'Male', '2024-12-04', '01923', 'raj', 'n', 'Mirpur', 'Slot-1', '../uploads/nid_676ee80d326c1.png', '../uploads/photo_676ee80d326c3.png', '../uploads/cv_676ee80d326c4.png', 'tamjid@gmail.com', 'Tam@1'),
(3, 'Tamjid', 'Hossain', 'Motaher', 'Male', '2024-12-04', '01923', 'raj', 'n', 'Mirpur', 'Slot-1', '../uploads/nid_676ee8d79bf4c.png', '../uploads/photo_676ee8d79bf4f.png', '../uploads/cv_676ee8d79bf50.png', 'tamjid2@gmail.com', 'Tam@1'),
(201, 'Tamjid', 'Hossain', 'Motaher', 'Male', '2024-12-04', '01923', 'raj', 'n', 'Mirpur', 'Slot-1', '../uploads/nid_676ee8536c823.png', '../uploads/photo_676ee8536c825.png', '../uploads/cv_676ee8536c826.png', 'tamjid@gmail.com', 'Tam@1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('Admin','Customer','Technician','Employee') NOT NULL,
  `subtype` enum('Full Control','Product Control','Employee Control','Full','Part','Intern') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `user_type`, `subtype`) VALUES
(1, 'clark0@example.com', 'pass1', 'Customer', NULL),
(2, 'bruce1@example.com', 'pass2', 'Customer', NULL),
(3, 'diana2@example.com', 'pass3', 'Customer', NULL),
(4, 'barry3@example.com', 'pass4', 'Customer', NULL),
(5, 'hal4@example.com', 'pass5', 'Customer', NULL),
(6, 'arthur5@example.com', 'pass6', 'Customer', NULL),
(7, 'victor6@example.com', 'pass7', 'Customer', NULL),
(8, 'oliver7@example.com', 'pass8', 'Customer', NULL),
(9, 'john8@example.com', 'pass9', 'Customer', NULL),
(10, 'billy9@example.com', 'pass10', 'Customer', NULL),
(11, 'kara10@example.com', 'pass11', 'Customer', NULL),
(12, 'j\'onn11@example.com', 'pass12', 'Customer', NULL),
(13, 'selina12@example.com', 'pass13', 'Customer', NULL),
(14, 'lois13@example.com', 'pass14', 'Customer', NULL),
(15, 'lex14@example.com', 'pass15', 'Customer', NULL),
(16, 'harley15@example.com', 'pass16', 'Customer', NULL),
(17, 'pamela16@example.com', 'pass17', 'Customer', NULL),
(18, 'jim17@example.com', 'pass18', 'Customer', NULL),
(19, 'eobard18@example.com', 'pass19', 'Customer', NULL),
(20, 'slade19@example.com', 'pass20', 'Customer', NULL),
(92, 'john.doe@example.com', 'password123', 'Technician', NULL),
(93, 'jane.smith@example.com', 'password456', 'Technician', NULL),
(94, 'david.lee2@example.com', 'password789', 'Technician', NULL),
(95, 'olivia.taylor@example.com', 'password7890', 'Technician', NULL),
(96, 'james.anderson@example.com', 'password12345', 'Technician', NULL),
(97, 'jane.smith2@example.com', 'password456', 'Technician', NULL),
(98, 'david.lee@example.com', 'password789', 'Technician', NULL),
(99, 'sarah.jones@example.com', 'password1234', 'Technician', NULL),
(100, 'michael.brown@example.com', 'password5678', 'Technician', NULL),
(101, 'emily.davis@example.com', 'password9012', 'Technician', NULL),
(102, 'daniel.wilson@example.com', 'password3456', 'Technician', NULL),
(107, 'alvi@aiub.edu', 'Alvi12#', 'Admin', 'Full Control'),
(124, 'john.doe@gmail.com', 'password123', 'Employee', 'Full'),
(125, 'jane.smith@yahoo.com', 'securepassword', 'Employee', 'Part'),
(126, 'alice.brown@hotmail.com', 'mypassword', 'Employee', 'Intern'),
(127, 'robert.johnson@gmail.com', 'robert1234', 'Employee', 'Full'),
(128, 'emily.davis@yahoo.com', 'emilysecure', 'Employee', 'Part'),
(129, 'michael.clark@hotmail.com', 'michael2024', 'Employee', 'Intern'),
(130, 'sophia.martinez@gmail.com', 'sophiapass', 'Employee', 'Full'),
(131, 'william.taylor@yahoo.com', 'william789', 'Employee', 'Part'),
(132, 'olivia.harris@hotmail.com', 'olivia456', 'Employee', 'Intern'),
(133, 'david.moore@gmail.com', 'davidsecure', 'Employee', 'Full'),
(134, '22-47312-1@aiub.edu', 'Sam12#eer', 'Admin', 'Full Control'),
(135, '22-46428-1@aiub.edu', 'Rifat12#', 'Admin', 'Full Control');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `faovourite`
--
ALTER TABLE `faovourite`
  ADD PRIMARY KEY (`favorite_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`technician_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faovourite`
--
ALTER TABLE `faovourite`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `technician_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
