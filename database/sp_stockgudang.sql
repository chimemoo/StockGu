-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2018 at 02:33 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp_stockgudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_item`
--

CREATE TABLE `m_item` (
  `item_id` int(11) NOT NULL,
  `item_code` varchar(20) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_item`
--

INSERT INTO `m_item` (`item_id`, `item_code`, `item_name`, `item_quantity`, `item_price`, `item_supplier_id`) VALUES
(1, 'HKB001', 'Hem Kemeja Batik Motif Brintik', 30, 35000, 1),
(3, 'HKB002', 'Hem Kemeja Batik Motif Nitik', 40, 35000, 1),
(5, 'HKB003', 'Hem Kemeja Batik Motif Mega Mendung', 40, 40000, 1),
(6, 'HKB004', 'Hem Kemeja Batik Motif Hijau Daun', 40, 35000, 1),
(7, 'HKB005', 'Hem Kemeja Batik Motif Daun Parang', 25, 35000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_mutasi`
--

CREATE TABLE `m_mutasi` (
  `mutasi_id` int(11) NOT NULL,
  `mutasi_item_id` int(11) NOT NULL,
  `mutasi_date` date NOT NULL,
  `mutasi_quantity` int(11) NOT NULL,
  `mutasi_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_mutasi`
--

INSERT INTO `m_mutasi` (`mutasi_id`, `mutasi_item_id`, `mutasi_date`, `mutasi_quantity`, `mutasi_price`) VALUES
(7, 1, '2018-05-06', 20, 700000);

-- --------------------------------------------------------

--
-- Table structure for table `m_supplier`
--

CREATE TABLE `m_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(30) NOT NULL,
  `supplier_contact` varchar(100) NOT NULL,
  `supplier_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_supplier`
--

INSERT INTO `m_supplier` (`supplier_id`, `supplier_name`, `supplier_contact`, `supplier_address`) VALUES
(1, 'RAGAMJOGJA', 'WA : 0888-8888-8888', 'Jogjakarta, Indonesia'),
(2, 'AKSESORISHAPE', 'WA : 0898-9898-8989', 'Bandung, Indonesia'),
(3, 'BAJUWANITA', 'WA : 0812-1234-5678', 'Jakarta, Indonesia'),
(4, 'FASHIONCHILD', 'WA : 0821-1233-5233', 'Cirebon, Indonesia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_item`
--
ALTER TABLE `m_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `m_mutasi`
--
ALTER TABLE `m_mutasi`
  ADD PRIMARY KEY (`mutasi_id`);

--
-- Indexes for table `m_supplier`
--
ALTER TABLE `m_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_item`
--
ALTER TABLE `m_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_mutasi`
--
ALTER TABLE `m_mutasi`
  MODIFY `mutasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
