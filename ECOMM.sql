-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2023 at 06:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ECOMM`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(1, 'Alpha', 'aditya@gmail.com', 'Aditya', 'none.jpg', '7982813728', 'India', 'None', 'NIjbjhbcjhsabcjasbcjasc');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `size`) VALUES
(48, '::1', 1, 'Medium');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(2, 'WOMEN', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(3, 'KIDS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum '),
(4, 'OTHERS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(5, 'Jeans', 'dsfsdfsdf sdfsdf sdfsd fsd fse fwe fwe fwe fwef'),
(6, 'Mens', 'hsdjsbbsvhjsbdhjkbsvdkbvsdsdvsdv\r\nsdvbsdvhsdvhsdmvsd\r\nvsdvbsdbvhjbsjdbvsdknvlnsdvsd vdsa\r\nvsdvnskdjvbnjksdkjvbsdv');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(3, 'Aditya', 'sdasd', 'asdassadsad', 'asdasdas', 'sdasdasd', '2323', 'asdasa', 'Screenshot 2023-03-27 at 11.36.13 AM.png', '::1'),
(4, 'asxas', 'xasxasxsax', 'asxasxasxasxasx', 'asxasxasxasxax', 'xasasxasxasxas32223', '23232323232332', 'xasxasxasxsas', 'Screenshot 2023-03-18 at 11.09.59 PM.png', '::1'),
(5, 'asxas', 'xasxasxsax', 'asxasxasxasxasx', 'asxasxasxasxax', 'xasasxasxasxas32223', '23232323232332', 'xasxasxasxsas', 'Screenshot 2023-03-18 at 11.09.59 PM.png', '::1'),
(6, 'adss', 'dasdasdasas', 'dasdasdasdas', 'dasdasdasdasd', 'weqweqweqw', '3243434', 'asdasdasdq', 'Screenshot 2023-03-18 at 11.09.59 PM.png', '::1'),
(8, 'Alpha', 'sdasd@gmIL.COM', '1234', 'India', 'asdasdasdasdasd', '32423423', 'sadadd', 'Screenshot 2023-04-27 at 11.49.34 PM.png', '::1'),
(10, 'Aditya', 'sdasd@gmIL.COM', 'Aditya090', 'India', 'NA', '234234213423', 'asdasdasdq', 'Screenshot 2023-04-27 at 11.49.34 PM.png', '::1'),
(11, 'Aditya', 'Aditya@gmail.com', '1234', 'INDIA', 'FBD', '91825553532', 'xasxasxasxsas', 'saree003.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(100) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `product_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(6, 3, 48, 399, 616755102, 1, 'Select a Size', '2023-05-17 18:44:54', 'complete'),
(8, 8, 1, 401, 2067081194, 1, 'Medium', '2023-05-21 10:19:24', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `Loginpage`
--

CREATE TABLE `Loginpage` (
  `uid` int(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Loginpage`
--

INSERT INTO `Loginpage` (`uid`, `Email`, `password`) VALUES
(1, 'Aditya@hmsdjnf.combh', 'aDadamn'),
(2, 'Aditya@hmsdjnf.combhaSa', 'aDadamn');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `invoice_id` int(100) NOT NULL,
  `invoice_amount` int(100) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(255) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_id`, `invoice_amount`, `payment_mode`, `ref_no`, `payment_date`) VALUES
(2, 326478233, 399, 'UPI', 232342341, '2023-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `pending_order`
--

CREATE TABLE `pending_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_order`
--

INSERT INTO `pending_order` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(2, 9, 889008186, '48', 1, 'Select a Size', 'complete'),
(3, 9, 889008186, '47', 2, 'Select a Size', 'pending'),
(4, 9, 2115128365, '47', 4, 'Select a Size', 'pending'),
(5, 4, 1554088612, '48', 1, 'Medium', 'pending'),
(6, 3, 616755102, '48', 1, 'Select a Size', 'complete'),
(7, 8, 1811338592, '47', 1, 'Small', 'pending'),
(8, 8, 2067081194, '1', 1, 'Medium', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keyword`) VALUES
(1, 4, 4, '2023-05-21 09:51:08', 'NOTHING FRST', 'Dumble02.jpg', 'dumble001.jpg', 'Dumble01.jpg', 401, '<p>N/A this is nothsing</p>', 'dumbless'),
(48, 2, 2, '2023-05-18 20:04:37', 'Products', 'suit001.jpg', 'suit002.jpeg', 'suit003.jpeg', 399, 'sadnsdf sdlf ', 'ethinic-wear'),
(49, 4, 6, '2023-05-21 17:45:54', 'Red Tape Men White Sneaker', 'Shoes001.jpg', 'shoes002.jpg', 'shoes003.jpg', 999, '<p>&nbsp;</p>\n<ul class=\"a-unordered-list a-vertical a-spacing-none\">\n<li><span class=\"a-list-item\">Designed For Utmost Comfort With RUBBER Sole. It Provides Dynamic Feet Support, Arch Support, Slip- Resistance For Negating Accidental Falls, Firm Grip &amp; Stability.</span></li>\n<li><span class=\"a-list-item\">LIFESTYLE: Sneaker Shoes</span></li>\n</ul>\n<div class=\"a-row a-expander-container a-expander-inline-container\">\n<div class=\"a-expander-content a-expander-extend-content a-expander-content-expanded\" aria-expanded=\"true\">&nbsp;</div>\n</div>', 'shoes-dragon'),
(50, 5, 6, '2023-05-21 17:54:31', 'Veirdo® Oversized Loose Baggy Fit Drop Shoulder Round Neck Half Sleeve Cool Punk Graphic Printed Pure Cotton T-Shirt for Men', 't-shirts.jpg', 't-shirts-01.jpg', 't-shirts-02.jpg', 449, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\">\r\n<li><span class=\"a-list-item\">Care Instructions: Machine Wash</span></li>\r\n<li><span class=\"a-list-item\">Fit Type: Oversized Fit</span></li>\r\n<li><span class=\"a-list-item\">Care Instructions: Wash with similar colours &middot; Wash cold &middot; Wash (and dry) inside out</span></li>\r\n<li><span class=\"a-list-item\">Fit Type: Oversized | Loose Fit | Relaxed | Wide Fit | Baggy Fit</span></li>\r\n<li><span class=\"a-list-item\">Material and quality: Premium bio-washed soft and smooth skin friendly 100% Cotton material and well stitched with cotton threads for long lasting use.</span></li>\r\n<li><span class=\"a-list-item\">Design and style: Trending Color combination design with gives extra ordinary casual look. Pairing: Pair this Oversize casual half sleeve printed t-shirt with jeans and get noticeable and eye catching look.</span></li>\r\n</ul>', 'baggy');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'JACKETS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(2, 'ETHNIC-WEAR', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(3, 'WATCH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(4, 'SHOES', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(5, 'ACCESSORIES', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_name`, `slider_image`) VALUES
(1, 'slider number 1', 'shoes.jpeg'),
(2, 'slider number 2', 'wtch001.jpeg'),
(3, 'slider number 3', 'dove.jpeg'),
(4, 'slider number 4', 'clth.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `Loginpage`
--
ALTER TABLE `Loginpage`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_order`
--
ALTER TABLE `pending_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Loginpage`
--
ALTER TABLE `Loginpage`
  MODIFY `uid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pending_order`
--
ALTER TABLE `pending_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
