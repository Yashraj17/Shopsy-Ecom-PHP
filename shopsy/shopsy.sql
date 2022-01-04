-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 09:29 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopsy`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `name`, `contact`, `email`, `address`, `password`) VALUES
(6, 'Yash Raj', '6207888026', 'yashraj172000@gmail.com', 'Rajendra Nagar Madhubani , Purnea', '202cb962ac59075b964b07152d234b70'),
(7, 'sandeep', '6543665435', 'sandeepjaydeep@gmail.com', 'Rajendra Nagar Madhubani , Purnea', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `addcart`
--

CREATE TABLE `addcart` (
  `addcart_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_title` varchar(200) NOT NULL,
  `pro_sub_title` varchar(200) NOT NULL,
  `account_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addcart`
--

INSERT INTO `addcart` (`addcart_id`, `pro_id`, `pro_title`, `pro_sub_title`, `account_id`, `qty`) VALUES
(26, 6, 'Men', 'Shirts', 7, 2),
(27, 12, 'Women', 'Sarees', 7, 2),
(31, 18, 'Kids', 'Toys', 6, 1),
(32, 9, 'Men', 'Shirts', 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_name` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `id_name`, `username`, `password`) VALUES
(1, 'YASH', 'yashraj172000@gmail.com', '123'),
(2, 'SANDEEP', 'sandeep@gmail.com', '321');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_title`) VALUES
(1, 'Men'),
(2, 'Women'),
(4, 'Kids'),
(5, 'Sports'),
(6, 'Books'),
(8, 'Shoes'),
(10, 'Mobile'),
(11, 'Electronics & Appliances');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `p_cat` int(11) NOT NULL,
  `p_sub` int(12) NOT NULL,
  `price` varchar(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `title`, `p_cat`, `p_sub`, `price`, `quantity`, `description`, `image`, `brand`, `status`) VALUES
(6, 'Men Slim Fit  Casual Shirt', 1, 8, '399', 3, 'Made with fine fabric . made in india product', 'shirt4.jpeg', 'Majestic Man ', 0),
(7, 'Men Striped Casual Shirt', 1, 8, '363', 2, 'Comfortable and the best fabric used.\r\nIts bit shiny but that give it a very amoozing look !\r\nFabric is really up to the mark .', 'shirt3.jpeg', 'icome ', 0),
(8, 'Men Slim Collar Casual Shirt', 1, 8, '455', 4, 'Nice colour & comfortable to wear...Short chinese collor shirt', 'shirt2.jpeg', 'Dennis Lingo ', 0),
(9, 'Men Checkered Casual Shirt', 1, 8, '380', 6, '100 percentage cotton shirt . no polyter use . easy to wash', 'shirt1.jpeg', 'Surhi ', 0),
(10, 'Banarasi Pure Silk (Pink)', 2, 1, '499', 5, 'Nice colour saree & Very beautifully colourful saree..\r\n100 percentage silk saare', 'saree4.jpeg', 'FABREXA ', 0),
(11, 'Solid Bollywood Blend (Magenta)', 2, 1, '656', 3, 'Party wear Solid Bollywood Blend saree with fine fabric', 'saree3.jpeg', 'Ejoty Fashion ', 0),
(12, 'Jacquard, Cotton Silk Saree  (Light Blue)', 2, 1, '710', 2, 'This is indian traditional sarees of women cotton banarsi saree', 'saree1.jpeg', 'Toriox ', 0),
(13, 'Printed Bhagalpuri Silk Saree(Green)', 2, 1, '876', 3, 'This saree is so beautiful. It give fantastic look. My mom very happy when see this saree.', 'saree2.jpeg', 'Fabwomen ', 0),
(14, 'Revolution Twenty20  (English Novel)', 6, 9, '177', 3, 'Awesome book , awesome story. its like I m watching a love story movie. but I didnt like the end  gopal deserved arti of course he was good person.\r\n', 'revolution2020.jpeg', 'Ruby Publication', 0),
(15, 'The Great Gatsby  (Fitzgerald F. Scott)', 6, 9, '119', 5, 'Its the Roaring Twenties, and New York City is the place to be. Everything can be purchased, everyone can be bought. But can you make money erase your past . Its the Roaring Twenties and it is the time of over indulgence.', 'the-great-gatsby.jpeg', 'Diamonds book publication', 0),
(16, 'ReactJS Blueprints ', 6, 10, '2719', 2, 'Create powerful applications with ReactJS the most popular platform for web developers todayAbout .', 'Reactjs.jpg', 'Packt Publishing Limited', 0),
(17, 'Harry Potter and the Cursed Child', 6, 9, '332', 3, 'The official playscript of the original West End production of Harry Potter and the Cursed Child. It was always difficult being Harry Potter', 'harry-potter.jpeg', ' Sphere publication', 0),
(18, 'Puzzle toy cube  (24 Pieces)', 4, 11, '120', 3, '\r\nThis Cube is designed with smooth surfaces; this cube can be easily and quickly turned without much effort.', 'toy2.jpeg', 'Plastic work and crafts', 0),
(19, 'Dancing Cactus Toy Talking Cactus ', 4, 11, '899', 4, 'Singing,Dancing and Light-emitting function It can sing 120 different Language songs and can dance with rhythmic snake-like twists and emit rhythmic flashing colored lights', 'toy1.jpeg', ' Baby Musical Toy', 0),
(20, ' Building Blocks Creative Educational Toys', 4, 11, '298', 2, 'The color of some product parts may vary from what is shown in the image. safe for children use anti bacterial', 'toys3.jpeg', ' Block Construction', 0),
(21, 'NIVIA Rabona Pro Football', 5, 12, '681', 3, 'Nivia Rabona Pro Football is fusion of Moulded Ball & machine Stiched Technologies.Re-Infoced and Wounded with polyster Nylon Yarns Building a Stron and Precise Core.', 'sports2.jpeg', 'nivia', 0),
(22, 'NIVIA Country Colour Football', 5, 12, '410', 5, '\r\nMade with high quality Rubber & Butyl Bladder. Built for Maximum Output, Ensures Good Performance and High Durability', 'sports1.jpeg', 'nivia', 0),
(23, 'KOOKABURRA Kahuna Cricket Bat', 5, 13, '389', 5, 'This Cricket Bat is a high-quality Grade 1 Poplar Willow bat. It has traditional bat profile for all-round play and dominance.', 'sports4.jpeg', 'ironspots', 0),
(24, 'Ceat Hitman Cricket Bat', 5, 13, '347', 5, 'The color and design of this product may vary from what is shown in the image, as the product is sourced in mixed batches.', 'sports3.jpeg', 'ceat', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_id`, `cat_id`, `sub_title`) VALUES
(1, 1, 'Sarees'),
(6, 4, 'kids jeans'),
(7, 5, 'Football'),
(8, 1, 'Shirts'),
(9, 6, 'Novels'),
(10, 6, 'Programming'),
(11, 4, 'Toys'),
(12, 5, 'Football'),
(13, 8, 'Cricket Bats');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `addcart`
--
ALTER TABLE `addcart`
  ADD PRIMARY KEY (`addcart_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `addcart`
--
ALTER TABLE `addcart`
  MODIFY `addcart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
