-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2017 at 07:13 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `winect241`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CategoryId` int(12) NOT NULL,
  `CategoryName` text COLLATE utf8_unicode_ci NOT NULL,
  `CategoryDetails` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryId`, `CategoryName`, `CategoryDetails`) VALUES
(1, 'Trocken', 'Wine'),
(2, 'Beerenauslese', 'Wine'),
(3, 'Mateus', 'Wine'),
(4, 'Schilcher', 'Wine'),
(5, 'Pinard', 'Wine'),
(6, 'Nouveau', 'Wine'),
(7, 'Federweisser', 'Wine'),
(8, 'Vin jaune', 'Wine'),
(9, 'Lautrec Pink Garlic', 'Wine'),
(10, 'Tokaji', 'Wine');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `ContactId` int(11) NOT NULL,
  `Subject` int(11) NOT NULL,
  `FullName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Date` datetime NOT NULL,
  `Information` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ContactDetails`
--

CREATE TABLE IF NOT EXISTS `ContactDetails` (
  `ContactDetailsId` int(11) NOT NULL,
  `Details` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `CountryId` int(12) NOT NULL,
  `CountryName` text COLLATE utf8_unicode_ci,
  `CountryDetails` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryId`, `CountryName`, `CountryDetails`) VALUES
(1, 'Japanese', 'Country'),
(2, 'Frence', 'Country'),
(3, 'USA', 'Country'),
(4, 'UK', 'Country'),
(5, 'VietNam', 'Country'),
(6, 'Canada', 'Country'),
(7, 'Singapore', 'Country'),
(8, 'Korea', 'Country'),
(9, 'China', 'Country'),
(10, 'Italia', 'Country');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Sex` int(11) NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Birth_day` int(11) DEFAULT NULL,
  `Birth_month` int(11) DEFAULT NULL,
  `Birth_years` int(11) NOT NULL,
  `IC` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Active` varchar(244) COLLATE utf8_unicode_ci DEFAULT '0',
  `Status` int(11) NOT NULL DEFAULT '1',
  `Role` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Username`, `Password`, `Name`, `Sex`, `Address`, `Phone`, `Email`, `Birth_day`, `Birth_month`, `Birth_years`, `IC`, `Active`, `Status`, `Role`) VALUES
('dthuy', '90957dd92b9eb08aa00ba8a113a07f02', 'Dang Tuan Huy', 0, 'Tien Thuy, chau Thanh, Ben Tre', '012345678911', 'dthuy@dthuy.com', 1, 1, 1997, '', '8b6acd3795ce607f8acd53d6954ebcaa', 0, 1),
('hanakuy', '4a629e10d9e958992ea4202b345d16cd', 'Dang Hoang Khai', 0, 'Chau Thanh, Ben Tre', '0963505927', 'testmailweb02@gmail.com', 2, 1, 1997, '', '3812f9a59b634c2a9c574610eaba5bed', 0, 0),
('nguyenhuuly', 'b174c93589a49bdc658c859431c51b3b', 'Nguyen Huu Ly', 0, 'Sanana', '0963505927', 'testmailweb02@gmail.com', 2, 1, 1997, '', '49858c651ec3fa4fe935672241871834', 1, 0),
('tdloi', '0bb667f3c5e2d7643278f6c879042237', 'Lá»£i', 0, 'Cáº§n ThÆ¡', '012345678910', 'tdloi@tdloiinc.com', 1, 1, 1997, '', '01eee509ee2f68dc6014898c309e86bf', 0, 1),
('vuongvinhphat', '2d139ae7d2092c55fa9f88dd6aa7cebc', 'Vuong Vinh Phat', 0, 'Sanana', '0963505927', 'dthuy16057@cusc.ctu.edu.vn', 2, 9, 1986, '', '4e4f8804bf781c81ea45e97aecb24427', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `imgwine`
--

CREATE TABLE IF NOT EXISTS `imgwine` (
  `ImgWineId` int(11) NOT NULL,
  `ImgWine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `WineId` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imgwine`
--

INSERT INTO `imgwine` (`ImgWineId`, `ImgWine`, `WineId`) VALUES
(1, '2_j38g5wfwm1.jpg', 2),
(2, '2_mxo3dpi9gz.jpg', 2),
(3, '2_uol4mldqhl.jpg', 2),
(6, '21_60px8mm1gs.jpg', 21),
(7, '21_tbmxo3dpi9.jpg', 21),
(8, '21_gzuol4mldq.jpg', 21);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `OrderId` int(11) NOT NULL,
  `OrderCreateDate` datetime NOT NULL,
  `OrderDeliverDate` date DEFAULT NULL,
  `OrderDeliverPlace` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OrderStatus` int(11) NOT NULL,
  `PaymentMethodID` int(11) NOT NULL,
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderId`, `OrderCreateDate`, `OrderDeliverDate`, `OrderDeliverPlace`, `OrderStatus`, `PaymentMethodID`, `Username`) VALUES
(1, '2017-11-10 09:04:14', '2017-11-23', 'Tien Thuy, Chau Thanh, Ben Tre', 1, 2, 'dthuy'),
(2, '2017-11-10 14:38:16', '2017-11-30', 'Tien Thuy, Chau Thanh, Ben Tre', 0, 2, 'dthuy');

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE IF NOT EXISTS `paymentmethod` (
  `PaymentMethodID` int(11) NOT NULL,
  `PaymentMethodName` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`PaymentMethodID`, `PaymentMethodName`) VALUES
(1, 'Visa'),
(2, 'Master Card'),
(3, 'Bitcoin'),
(4, 'Direct'),
(5, 'COD'),
(6, 'others');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `PromotionId` int(12) NOT NULL,
  `PromotionName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PromotionDiscount` int(11) NOT NULL,
  `PromotionContent` text COLLATE utf8_unicode_ci,
  `PromotionActive` date DEFAULT NULL,
  `PromotionClose` date DEFAULT NULL,
  `PromotionOpen` int(12) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`PromotionId`, `PromotionName`, `PromotionDiscount`, `PromotionContent`, `PromotionActive`, `PromotionClose`, `PromotionOpen`) VALUES
(1, 'None', 0, 'No Promotion', '0000-00-00', '0000-00-00', 0),
(2, '20/11 Event', 20, '<p>20% off all product</p>', '2017-11-10', '2017-11-20', 1),
(3, 'Haloween 2017', 30, '<p>30% off all product</p>', '2017-10-30', '2017-10-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `PublisherId` int(12) NOT NULL,
  `PublisherName` text COLLATE utf8_unicode_ci,
  `PublisherDetail` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`PublisherId`, `PublisherName`, `PublisherDetail`) VALUES
(1, 'Sakaya Inc', 'Publisher'),
(2, 'Kuro Inc', 'Publisher'),
(3, 'Arisu Inc', 'Publisher'),
(4, 'Clara Inc', 'Publisher'),
(5, 'Alide Inc', 'Publisher'),
(6, 'Karen Inc', 'Publisher'),
(7, 'Alice Inc', 'Publisher'),
(8, 'Roxy Inc', 'Publisher'),
(9, 'Mashi Inc', 'Publisher'),
(10, 'Shiro Inc', 'Publisher');

-- --------------------------------------------------------

--
-- Table structure for table `wine`
--

CREATE TABLE IF NOT EXISTS `wine` (
  `WineId` int(12) NOT NULL,
  `WineName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `WineStrength` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `WinePrice` decimal(12,2) DEFAULT NULL,
  `WineShortDetails` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `WineDetails` text COLLATE utf8_unicode_ci,
  `WineUpdateDate` date NOT NULL,
  `WineQuantity` int(11) DEFAULT NULL,
  `WineSold` int(10) NOT NULL DEFAULT '0',
  `CategoryId` int(12) DEFAULT NULL,
  `PublisherId` int(11) DEFAULT NULL,
  `CountryId` int(11) DEFAULT NULL,
  `PromotionId` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wine`
--

INSERT INTO `wine` (`WineId`, `WineName`, `WineStrength`, `WinePrice`, `WineShortDetails`, `WineDetails`, `WineUpdateDate`, `WineQuantity`, `WineSold`, `CategoryId`, `PublisherId`, `CountryId`, `PromotionId`) VALUES
(2, 'Wine Example 2', '23', '25.50', 'Wine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 20, 3, 1, 1, 1, 1),
(3, 'Wine Example 3', '23', '25.50', 'Wine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 23, 0, 1, 1, 1, 1),
(4, 'Wine Example 4', '23', '25.50', 'Wine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 23, 0, 10, 1, 1, 1),
(5, 'Wine Example 5', '23', '25.50', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 45, 0, 1, 1, 1, 2),
(6, 'Wine Example 6', '23', '25.50', 'Wine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 23, 0, 5, 1, 1, 1),
(7, 'Wine Example 7 ', '23', '25.50', 'Wine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 23, 0, 1, 1, 1, 1),
(8, 'Wine Example 8', '23', '52.30', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 23, 0, 3, 4, 4, 3),
(9, 'Wine Example 9', '23', '25.50', 'Wine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 23, 0, 7, 1, 1, 1),
(10, 'Wine Example 10', '23', '25.50', 'Wine', 'Wine', '2017-11-09', 30, 23, 1, 1, 1, 1),
(11, 'Wine Example 11', '23', '25.50', 'Wine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 23, 0, 1, 1, 1, 1),
(12, 'Wine Example 12', '23', '25.50', 'Wine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 23, 0, 1, 1, 1, 1),
(13, 'Wine Example 13', '23', '25.50', 'Wine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 23, 0, 1, 1, 1, 1),
(14, 'Wine Example 14', '23', '25.50', 'Wine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 23, 0, 1, 1, 1, 1),
(15, 'Wine Example 15', '23', '25.50', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 0, 25, 1, 1, 1, 2),
(16, 'Wine Example 16', '23', '25.50', 'Wine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 23, 0, 1, 1, 1, 1),
(17, 'Wine Example 17', '23', '25.50', 'Wine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 23, 0, 1, 1, 1, 1),
(18, 'Wine Example 18', '23', '25.50', 'Wine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 23, 0, 1, 1, 1, 1),
(19, 'Wine Example 19', '23', '25.50', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 23, 0, 1, 1, 1, 3),
(20, 'Wine Example 20', '23', '25.50', 'Wine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis metus erat, sit amet venenatis libero ullamcorper facilisis. Cras at tempus massa, quis dapibus metus. Duis malesuada porta nunc, ut gravida odio vulputate vel. Proin imperdiet, enim ac laoreet condimentum, sem purus cursus nisi, nec euismod diam massa ac purus. Phasellus ultrices tortor nisl. Maecenas dictum scelerisque auctor. Ut aliquam magna in ante lacinia malesuada. Aenean id accumsan odio. Mauris ut condimentum est. Etiam sodales purus vestibulum malesuada ornare. Nam ut dolor et augue vestibulum vulputate. Aenean ultrices porta nisi, ac facilisis massa consequat non. Maecenas dapibus fermentum convallis. Etiam interdum lectus sit amet mi ultrices fermentum.', '2017-11-09', 23, 0, 1, 1, 1, 1),
(21, 'Ruou Sake', '15', '25.00', '', '', '2017-11-10', 1, 0, 2, 1, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `wineorder`
--

CREATE TABLE IF NOT EXISTS `wineorder` (
  `WineOrderId` int(12) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `WineOrderQuantity` int(11) NOT NULL,
  `WineSoldPrice` decimal(12,2) unsigned NOT NULL,
  `WineOriginalPrice` decimal(12,2) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wineorder`
--

INSERT INTO `wineorder` (`WineOrderId`, `OrderId`, `WineOrderQuantity`, `WineSoldPrice`, `WineOriginalPrice`) VALUES
(2, 1, 1, '25.50', '25.50'),
(2, 2, 2, '25.50', '25.50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactId`),
  ADD KEY `Subject` (`Subject`);

--
-- Indexes for table `ContactDetails`
--
ALTER TABLE `ContactDetails`
  ADD PRIMARY KEY (`ContactDetailsId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`CountryId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `imgwine`
--
ALTER TABLE `imgwine`
  ADD PRIMARY KEY (`ImgWineId`),
  ADD KEY `imgwine_ibfk_1` (`WineId`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `PaymentMethodID` (`PaymentMethodID`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`PaymentMethodID`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`PromotionId`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`PublisherId`);

--
-- Indexes for table `wine`
--
ALTER TABLE `wine`
  ADD PRIMARY KEY (`WineId`),
  ADD KEY `CategoryId` (`CategoryId`),
  ADD KEY `CountryId` (`CountryId`),
  ADD KEY `PublisherId` (`PublisherId`),
  ADD KEY `PromotionId` (`PromotionId`);

--
-- Indexes for table `wineorder`
--
ALTER TABLE `wineorder`
  ADD PRIMARY KEY (`WineOrderId`,`OrderId`),
  ADD KEY `OrderId` (`OrderId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryId` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `CountryId` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `imgwine`
--
ALTER TABLE `imgwine`
  MODIFY `ImgWineId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `PaymentMethodID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `PromotionId` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `PublisherId` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `wine`
--
ALTER TABLE `wine`
  MODIFY `WineId` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`Subject`) REFERENCES `ContactDetails` (`ContactDetailsId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imgwine`
--
ALTER TABLE `imgwine`
  ADD CONSTRAINT `imgwine_ibfk_1` FOREIGN KEY (`WineId`) REFERENCES `wine` (`WineId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`PaymentMethodID`) REFERENCES `paymentmethod` (`PaymentMethodID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `customer` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wine`
--
ALTER TABLE `wine`
  ADD CONSTRAINT `wine_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `category` (`CategoryId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wine_ibfk_2` FOREIGN KEY (`CountryId`) REFERENCES `country` (`CountryId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wine_ibfk_3` FOREIGN KEY (`PublisherId`) REFERENCES `publisher` (`PublisherId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wine_ibfk_4` FOREIGN KEY (`PromotionId`) REFERENCES `promotion` (`PromotionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wineorder`
--
ALTER TABLE `wineorder`
  ADD CONSTRAINT `wineorder_ibfk_1` FOREIGN KEY (`OrderId`) REFERENCES `order` (`OrderId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wineorder_ibfk_2` FOREIGN KEY (`WineOrderId`) REFERENCES `wine` (`WineId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
