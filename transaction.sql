-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2017 at 10:03 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `booze`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `username` varchar(15) DEFAULT NULL,
  `email` varchar(15) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `address1` varchar(15) DEFAULT NULL,
  `address2` varchar(15) DEFAULT NULL,
  `card` int(16) DEFAULT NULL,
  `cvv` int(3) DEFAULT NULL,
  `exp` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`username`, `email`, `phone`, `address1`, `address2`, `card`, `cvv`, `exp`) VALUES
('aavritti soni', 'aavritti.soni19', 2147483647, 'jfigtvvkm', 'rfjnrdkklfc', 2147483647, 123, '2017-07-14'),
('aavritti soni', 'aavritti.soni19', 2147483647, 'mig 563', 'maitri nagar', 2147483647, 123, '2017-07-25'),
('aavritti soni', 'aavritti.soni19', 2147483647, 'dgfertwjsh', 'furybdbd', 2147483647, 123, '2010-06-22'),
('aavritti soni', 'aavritti.soni19', 2147483647, 'xfdvawdj', 'jshgafesd', 2147483647, 123, '2013-05-19'),
('aavritti soni', 'aavritti.soni19', 2147483647, 'bhhdebhcf', 'vfgdbsjs', 2147483647, 123, '2008-05-12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
