-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 10:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbfarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `contact_number` bigint(20) NOT NULL,
  `licence_key` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`contact_number`, `licence_key`) VALUES
(234567, 'wert'),
(234567, 'wert');

-- --------------------------------------------------------

--
-- Table structure for table `plot`
--

CREATE TABLE `plot` (
  `pid` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `mh_no` bigint(10) NOT NULL,
  `site` varchar(30) NOT NULL,
  `soil_type` varchar(30) NOT NULL,
  `plantation_year` int(11) NOT NULL,
  `fruit_name` varchar(30) NOT NULL,
  `variety` varchar(30) NOT NULL,
  `sp1` int(11) NOT NULL,
  `sp2` int(11) NOT NULL,
  `spacing` int(11) NOT NULL,
  `vines` int(11) NOT NULL,
  `stucture` varchar(30) NOT NULL,
  `area` varchar(35) NOT NULL,
  `harvesting_days` int(11) NOT NULL,
  `water_source` varchar(35) NOT NULL,
  `gat_no` int(11) NOT NULL,
  `motor` varchar(20) NOT NULL,
  `lateral` varchar(30) NOT NULL,
  `dripper` varchar(20) NOT NULL,
  `discharge` varchar(20) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `no_of_drip` int(11) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plot`
--

INSERT INTO `plot` (`pid`, `plot_no`, `pname`, `mh_no`, `site`, `soil_type`, `plantation_year`, `fruit_name`, `variety`, `sp1`, `sp2`, `spacing`, `vines`, `stucture`, `area`, `harvesting_days`, `water_source`, `gat_no`, `motor`, `lateral`, `dripper`, `discharge`, `unit`, `no_of_drip`, `ses_id`) VALUES
(3528, 1, 'Vrushabh more', 23456, 'malegaon', 'Sandy Clay Loam', 2011, 'grapes', 'flame', 5, 5, 0, 10, 'T', '0.01 acre', 110, 'well', 123, '5hp', 'Inline', 'Jian P.C.', '344', 'lit', 456, 18),
(3529, 2, 'Harish More', 23456, 'malegaon', 'Sand', 2017, 'apple', 'flame', 2, 5, 0, 80, ' Bawar', '0.02 acre', 110, 'well', 123, '5hp', 'Inline', 'Netafim P.C.', '90', 'lit', 2, 18),
(3530, 1, 'Vrushabh More', 123345678, 'Malegaon', 'Sandy  Clay', 2011, 'addnew', 'thomson', 5, 6, 0, 5600, 'Y', '3.86 acre', 5, 'well,river', 12345, '5 hp', 'Inline', 'Jian P.C.', '345', 'lit', 34, 9),
(3531, 2, 'Harish More', 45, 'Pimpalgaon', 'Silty Clay', 2013, 'Grapes', 'thomson', 46, 23, 0, 5600, ' Bawar', '136.01 acre', 5, 'well', 12345, '5 hp', 'Online', 'Ordinary', '345', 'lit', 34, 9),
(3536, 45, 'ASDSSSS', 545, 'Pimpalgaon', 'Sandy Clay Loam', 2013, 'vv', 'eee', 45, 45, 0, 3455, 'text', '160.61 acre', 5, 'well', 34, '5hp', 'Inline', 'Netafim P.C.', '67', 'min', 45, 9),
(3537, 1, 'harish', 12345657, 'Pimpalgaon', 'Sand', 2013, 'aaaaaa', 'eee', 45, 45, 2025, 3455, ' Bawar', '160.61 acre', 5, 'well,river', 12343456, '5hp', 'Online', 'Netafim P.C.', '67', 'min', 45, 20),
(3538, 1, 'Nashik', 78, 'Malegaon', 'Sandy  Clay', 2011, 'Grapes', 'tho', 5, 5, 0, 5000, ' Bawar', '2.87 acre', 30, 'well', 456, '5hp', 'Online', 'Netafim P.C.', '3', 'lit', 554, 21),
(3539, 2, 'Dhule', 678, 'Malegaon', 'Sandy Clay Loam', 2011, 'Orange', 'thomson', 5, 5, 0, 10000, ' Bawar', '5.74 acre', 30, 'river', 456, '5hp', 'Online', 'Netafim P.C.', '3', 'min', 554, 21),
(3541, 1, 'Sharad', 11110, 'Nashik', 'Sandy  Clay', 2011, 'Apple', 'Thomson', 5, 4, 0, 7000, 'Y', '3.21 acre', 6, 'well', 45676, '5hp', 'Inline', 'Netafim P.C.', '10', 'min', 6, 22),
(3542, 2, 'Nashik', 11110, 'Nashik', 'Sandy Clay Loam', 2011, 'addnew', 'Thomson', 6, 76, 456, 788, ' Bawar', '8.25 acre', 6, 'well', 45676, '5hp', 'Inline', 'Netafim P.C.', '7', 'lit', 6, 22),
(3544, 1, 'Nashik', 7899, 'Nashik', 'Clay Loam', 2011, 'Apple', 'Thomson', 78, 778, 60684, 100, 'T', '139.31 acre', 3, 'well', 688, '6 hp', 'Inline', 'Netafim P.C.', '4', 'min', 5, 23);

-- --------------------------------------------------------

--
-- Table structure for table `soil`
--

CREATE TABLE `soil` (
  `id` int(11) NOT NULL,
  `soil_type` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `aid` int(11) NOT NULL,
  `acc_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`aid`, `acc_name`) VALUES
(1, 'Current assets'),
(4, 'Current liabilities'),
(5, 'direct expenses'),
(6, 'indirect expenses'),
(7, 'sales account   '),
(8, 'fixed assets'),
(9, 'investments'),
(10, 'investments');

-- --------------------------------------------------------

--
-- Table structure for table `tblacc_select`
--

CREATE TABLE `tblacc_select` (
  `acc_id` int(11) NOT NULL,
  `curr_asset` varchar(30) NOT NULL,
  `curr_lib` varchar(30) NOT NULL,
  `direct_exp` varchar(30) NOT NULL,
  `indirect_exp` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblacc_select`
--

INSERT INTO `tblacc_select` (`acc_id`, `curr_asset`, `curr_lib`, `direct_exp`, `indirect_exp`, `ses_id`) VALUES
(4, 'Sundry Debtors', 'creditors', 'diesel expenses', 'travel', 0),
(5, 'cash in-hand  ', 'Duties and Taxes', 'labour expenses', 'transportation', 5),
(6, 'Sundry Debtors', 'ssdfg', 'equipment maintenance', 'vehicle expenses', 5),
(7, 'deposits', 'Duties and Taxes', 'labour expenses', 'transportation', 5),
(8, 'Bank Accounts', 'Loans & other liabilities', 'equipment maintenance', 'vehicle expenses', 18),
(9, 'Sundry Debtors', 'Loans & other liabilities', 'diesel expenses', 'transportation', 9),
(10, 'cash in-hand  ', 'Duties and Taxes', 'labour expenses', 'home expenses', 9),
(11, '', '', '', '', 9),
(12, 'Bank Accounts', 'Loans & other liabilities', 'electric bills', 'vehicle expenses', 9),
(13, '', '', '', '', 9),
(14, 'Bank Accounts', '', '', '', 9),
(15, 'Bank Accounts', 'Loans & other liabilities', 'diesel expenses', 'vehicle expenses', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `aid` int(11) NOT NULL,
  `aname` varchar(30) NOT NULL,
  `aemail` varchar(30) NOT NULL,
  `apass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`aid`, `aname`, `aemail`, `apass`) VALUES
(2, 'vrushabh more', 'vrushabm17@gmail.com', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `tblcassets`
--

CREATE TABLE `tblcassets` (
  `assets_id` int(11) NOT NULL,
  `asset_name` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcassets`
--

INSERT INTO `tblcassets` (`assets_id`, `asset_name`, `ses_id`) VALUES
(2, 'Sundry Debitors', 0),
(3, 'Bank Accounts', 0),
(4, 'cash in-hand  ', 0),
(5, 'deposits', 0),
(7, 'deposits', 0),
(8, 'deposits', 0),
(12, 'a', 5),
(14, 'aaaa', 5),
(15, 'a', 9),
(16, 'fhbh', 9),
(17, 'a', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontra`
--

CREATE TABLE `tblcontra` (
  `cid` int(11) NOT NULL,
  `cno` int(11) NOT NULL,
  `date` date NOT NULL,
  `account` varchar(30) NOT NULL,
  `particuler` text NOT NULL,
  `amount` text NOT NULL,
  `narration` varchar(30) NOT NULL,
  `total` int(11) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontra`
--

INSERT INTO `tblcontra` (`cid`, `cno`, `date`, `account`, `particuler`, `amount`, `narration`, `total`, `ses_id`) VALUES
(68, 1, '2021-05-04', 'hdfc', 'cash,Shree', '10,10', 'aa', 20, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tblcoreno`
--

CREATE TABLE `tblcoreno` (
  `cid` int(11) NOT NULL,
  `core_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcoreno`
--

INSERT INTO `tblcoreno` (`cid`, `core_no`) VALUES
(1, 25),
(2, 45),
(5, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tblcrop`
--

CREATE TABLE `tblcrop` (
  `cid` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `duration` int(11) NOT NULL,
  `prunning_day` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `observation` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcrop`
--

INSERT INTO `tblcrop` (`cid`, `plot_no`, `pname`, `date`, `stime`, `etime`, `duration`, `prunning_day`, `title`, `observation`, `ses_id`, `status`) VALUES
(25, 1, 'Malegaon', '2021-04-15', '02:07:00', '03:07:00', 1, -5, 'What is Friendship?', 'asdxf ', 21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldexpense`
--

CREATE TABLE `tbldexpense` (
  `did` int(11) NOT NULL,
  `exp_name` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldexpense`
--

INSERT INTO `tbldexpense` (`did`, `exp_name`, `ses_id`) VALUES
(2, 'diesel expenses', 0),
(3, 'labour expenses', 0),
(4, 'equipment maintenance', 0),
(5, 'electric bills', 0),
(7, 'packing expenses  ', 0),
(9, 'diesel expenses', 0),
(15, 'a', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbldiscno`
--

CREATE TABLE `tbldiscno` (
  `discno_id` int(11) NOT NULL,
  `disc_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldiscno`
--

INSERT INTO `tbldiscno` (`discno_id`, `disc_no`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbldisease1`
--

CREATE TABLE `tbldisease1` (
  `did` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `sdate` date DEFAULT NULL,
  `days_after_prunning` int(11) NOT NULL,
  `preventive` varchar(30) NOT NULL,
  `equipment` varchar(30) NOT NULL,
  `no_of_nozzle` int(11) NOT NULL,
  `pressure` varchar(30) NOT NULL,
  `discharge` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `water_required` int(11) NOT NULL,
  `water_used` int(11) NOT NULL,
  `moa` varchar(30) NOT NULL,
  `oworker` varchar(30) NOT NULL,
  `dor` varchar(30) NOT NULL,
  `temp` varchar(30) NOT NULL,
  `humidity` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldisease1`
--

INSERT INTO `tbldisease1` (`did`, `plot_no`, `pname`, `sdate`, `days_after_prunning`, `preventive`, `equipment`, `no_of_nozzle`, `pressure`, `discharge`, `duration`, `water_required`, `water_used`, `moa`, `oworker`, `dor`, `temp`, `humidity`, `ses_id`, `status`) VALUES
(35, 1, 'Vrushabh more', '2021-02-22', 1, 'curative', 'ess', 5, '10', 345, 78, 26910, 8, 'drip', 'shruti', 'Drainage', '56', '90', 18, 0),
(46, 1, 'Vrushabh More', '2021-02-23', -6, 'preventive', 'ess', 6, '10', 67, 5, 335, 78, 'paste', 'niki', 'secftg', '4', '4', 9, 0),
(48, 45, 'ASDSSSS', '2021-03-31', 9, 'preventive', 'ess', 4, '10', 3, 7, 21, 34, 'irrigation', 'niki', 'Drainage', '7', 'w', 9, 0),
(49, 45, 'ASDSSSS', '2021-04-20', 29, 'preventive', 'dragone', 4, '10', 0, 51, 0, 34, 'drip', 'niki', 'Drainage', '89', 'w', 9, 0),
(59, 1, 'Nashik', '2021-04-24', 4, 'preventive', 'ess', 7, '10', 0, 4, 0, 9, 'irrigation', 'Shruti', 'Drainage', '5', '8', 21, 0),
(60, 1, 'Nashik', '2021-05-05', 15, 'curative', 'ess', 7, '10', 0, 4, 0, 9, 'drip', 'Shruti', 'Drainage', '5', '8', 21, 0),
(62, 1, 'Nashik', '2021-04-22', 2, 'preventive', 'cafini', 5, '20', 8, 7, 53, 45, 'irrigation', 'Shruti', 'Drainage', '3', '3', 21, 0),
(65, 1, 'Nashik', '2021-04-29', 9, 'preventive', 'ess', 6, '20', 0, 4, 0, 6, 'drip', 'Shruti', 'Drainage', '6', '6', 21, 0),
(67, 1, 'Nashik', '2021-05-05', 8, 'preventive', 'ads', 6, '20', 4, 3, 12, 6, 'drip', 'shruti', 'Drainage', '6', '6', 23, 0),
(70, 1, 'Nashik', '2021-04-21', 6, 'preventive', 'ads', 6, '10', 4, 3, 12, 6, 'irrigation', 'shruti', 'Drainage', '6', '6', 23, 0),
(76, 1, 'Nashik', '2021-05-27', 28, 'preventive', 'ads', 5, '10', 4, 6, 24, 6, 'drip', 'shruti', 'Drainage', '45', 'rt', 23, 0),
(77, 1, 'Nashik', '2021-05-28', 29, 'preventive', 'ads', 5, '10', 4, 5, 20, 6, 'irrigation', 'shruti', 'Drainage', '45', 'rt', 23, 0),
(80, 1, 'Nashik', '2021-06-01', 33, 'curative', 'ads', 5, '20', 4, 5, 20, 6, 'paste', 'shruti', 'Drainage', '45', 'rt', 23, 0),
(82, 1, 'Nashik', '2021-06-01', 33, 'preventive', 'ads', 5, '10', 4, 6, 24, 6, 'irrigation', 'shruti', 'Drainage', '45', 'rt', 23, 0),
(83, 1, 'Nashik', '2021-05-25', 26, 'preventive', 'ads', 5, '10', 4, 4, 16, 6, 'irrigation', 'shruti', 'Drainage', '45', 'rt', 23, 0),
(86, 1, 'Nashik', '2021-05-26', 27, 'curative', 'ads', 5, '20', 5, 6, 30, 56, 'irrigation', 'shruti', 'Drainage', '56', '7', 23, 0),
(87, 1, 'Nashik', '2021-05-27', 28, 'preventive', 'ads', 5, '10', 5, 3, 15, 3, 'drip', 'shruti', 'Drainage', '56', '7', 23, 0),
(89, 1, 'Nashik', '2021-07-01', 63, 'curative', 'ads', 5, '10', 5, 1, 5, 56, 'drip', 'shruti', 'Drainage', '56', '7', 23, 0),
(92, 1, 'Nashik', '2021-06-23', 55, 'preventive', 'ads', 5, '20', 5, 1, 5, 3, 'irrigation', 'shruti', 'Drainage', '56', '7', 23, 0),
(93, 1, 'Nashik', '2021-06-30', 62, 'preventive', 'ads', 5, '20', 5, 1, 5, 3, 'paste', 'shruti', 'Drainage', '56', '7', 23, 0),
(95, 1, 'Nashik', '2021-06-16', 48, 'curative', 'ads', 5, '', 5, 2, 10, 56, 'drip', 'shruti', 'Drainage', '56', '7', 23, 0),
(97, 1, 'Nashik', '2021-06-30', 62, 'preventive', 'ads', 5, '20', 5, 1, 5, 56, 'irrigation', 'shruti', '4', '56', '1', 23, 0),
(99, 1, 'Nashik', '2021-06-24', 56, 'preventive', 'ads', 5, '20', 5, 1, 5, 56, 'irrigation', 'shruti', 'Drainage', '56', '1', 23, 0),
(100, 1, 'Nashik', '2021-06-23', 55, 'preventive', 'ads', 5, '10', 5, 2, 10, 56, 'drip', 'shruti', 'Drainage', '56', '7', 23, 0),
(101, 1, 'Nashik', '2021-06-23', 55, 'curative', 'ads', 5, '20', 5, 6, 30, 56, 'drip', 'shruti', 'Drainage', '56', '7', 23, 0),
(102, 1, 'Nashik', '2021-07-06', 68, 'preventive', 'ads', 5, '20', 5, 2, 10, 56, 'paste', 'shruti', 'Drainage', '56', '7', 23, 0),
(103, 1, 'Nashik', '2021-07-07', 69, 'preventive', 'ads', 5, '20', 5, 3, 15, 56, 'irrigation', 'shruti', '', '56', '7', 23, 0),
(104, 1, 'Nashik', '2021-07-07', 69, 'preventive', 'ads', 5, '20', 5, 3, 15, 56, 'irrigation', 'shruti', '4', '56', '7', 23, 0),
(105, 1, 'Nashik', '2021-06-16', 48, 'preventive', 'ads', 5, '20', 5, 2, 10, 56, 'spray', 'shruti', 'Drainage', '56', '7', 23, 0),
(106, 1, 'Nashik', '2021-07-07', 69, 'preventive', 'ads', 5, '20', 5, 3, 15, 56, 'irrigation', 'shruti', 'Drainage', '56', '7', 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldissession`
--

CREATE TABLE `tbldissession` (
  `d_id` int(11) NOT NULL,
  `sdate` date NOT NULL,
  `item_name` text NOT NULL,
  `bno` text NOT NULL,
  `edate` text NOT NULL,
  `disease` text NOT NULL,
  `phi` text NOT NULL,
  `Arqty` text NOT NULL,
  `Auqty` text NOT NULL,
  `Aaqty` text NOT NULL,
  `rqty` text NOT NULL,
  `uqty` text NOT NULL,
  `aqty` text NOT NULL,
  `reduce_qty` float NOT NULL,
  `aunit` text NOT NULL,
  `act_unit` text NOT NULL,
  `purchase_rate` text NOT NULL,
  `item_type` varchar(50) NOT NULL,
  `total` text NOT NULL,
  `ses_id` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `draft_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldissession`
--

INSERT INTO `tbldissession` (`d_id`, `sdate`, `item_name`, `bno`, `edate`, `disease`, `phi`, `Arqty`, `Auqty`, `Aaqty`, `rqty`, `uqty`, `aqty`, `reduce_qty`, `aunit`, `act_unit`, `purchase_rate`, `item_type`, `total`, `ses_id`, `plot_no`, `status`, `did`, `draft_status`) VALUES
(132, '2021-02-18', 'shraa', '67', '2021-02-15', 'Red Mites', '3', '45', '87', '65', '0.065', '0.045', '0.087', 0, 'kg', 'g', '5000', 'Pesticide', '325', 9, 2, 1, 32, 0),
(134, '2021-02-23', 'FFF', '67', '2021-02-21', 'Jeside', '45', '107 ', '6 ', '0.2', '0.0002', '0.107', '0.006', 0.0048, 'ltr', 'ml', '670', 'Fungicide', '0.134', 9, 2, 1, 33, 0),
(135, '2021-02-27', 'Nisco', '67', '2021-02-22', 'Early bite', '45', '10 ', '6 ', '5', '0.005', '0.01', '0.006', 0, 'ltr', 'ml', '670', 'Insecticide', '3.35', 9, 2, 1, 33, 0),
(136, '2021-02-21', 'mak', '90', '2021-02-15', 'Jeside', '3', '10 ', '6 ', '5', '0.005', '0.01', '0.006', 0, 'ltr', 'ml', '5000', 'Fungicide', '25', 18, 2, 1, 34, 0),
(137, '2021-02-21', 'nisco', '345', '2021-02-22', 'Red Mites', '66', '10 ', '6 ', '5', '0.005', '0.01', '0.006', 0, 'ltr', 'ml', '5000', 'Insecticide', '25', 18, 2, 1, 34, 0),
(138, '2021-02-22', 'nisco', '345', '2021-02-22', 'Red Mites', '66', '10 ', '6 ', '5', '0.005', '0.01', '0.006', 0, 'ltr', 'ml', '5000', 'Insecticide', '25', 18, 1, 1, 35, 0),
(140, '2021-02-22', 'mak', '90', '2021-02-15', 'Jeside', '3', '10 ', '6 ', '5', '0.005', '0.01', '0.006', 0, 'ltr', 'ml', '5000', 'Fungicide', '25', 18, 1, 1, 35, 0),
(141, '2021-02-22', 'nisco', '345', '2021-02-22', 'Red Mites', '66', '10 ', '6 ', '5', '0.005', '0.01', '0.006', 0, 'ltr', 'ml', '5000', 'Insecticide', '25', 18, 1, 1, 35, 0),
(142, '2021-02-22', 'nisco', '345', '2021-02-22', 'Red Mites', '66', '10 ', '6 ', '5', '0.005', '0.01', '0.006', 0, 'ltr', 'ml', '5000', 'Insecticide', '25', 18, 1, 1, 35, 0),
(143, '2021-03-02', 'PEST', '67', '2021-02-22', 'Jeside', '67', '10 ', '6 ', '5', '0.005', '0.01', '0.006', 0, 'ltr', 'ml', '670', 'Pesticide', '3.35', 9, 2, 1, 36, 0),
(144, '2021-02-27', 'PEST', '7', '2021-02-15', 'Jeside', '67', '8', '89', '500', '0.5', '0.008', '0.089', 0, 'kg', 'g', '678', 'Pesticide', '339', 9, 2, 1, 33, 0),
(145, '2021-02-27', 'PEST', '7', '2021-02-15', 'Jeside', '67', '78', '7', '500', '0.5', '0.078', '0.007', 0, 'kg', 'g', '678', 'Pesticide', '339', 9, 2, 1, 0, 0),
(148, '0000-00-00', 'PEST', '7', '2021-02-15', 'Jeside', '67', '22', '11', '100', '0.1', '0.022', '0.011', 0, 'kg', 'g', '678', 'Pesticide', '67.8', 9, 0, 1, 0, 0),
(149, '2021-03-02', 'PEST', '7', '2021-02-15', 'Jeside', '67', '100', '220', '300', '0.3', '0.1', '0.22', 0, 'kg', 'g', '678', 'Pesticide', '203.4', 9, 2, 1, 36, 0),
(150, '2021-02-28', 'PEST', '7', '2021-02-15', 'Jeside', '67', '22', '220', '900', '0.9', '0.022', '0.22', 10.1, 'kg', 'g', '678', 'Pesticide', '610.2', 9, 3, 1, 40, 0),
(155, '2021-02-16', 'FFF', '67', '2021-02-21', 'Jeside', '45', '89', '7', '1', '0.089', '0.007', '0.001', 0.0038, 'ltr', 'ml', '670', 'Fungicide', '0.67', 9, 2, 1, 33, 0),
(156, '2021-03-06', 'PEST', '7', '2021-02-15', 'Jeside', '67', '2', '7', '1', '0.002', '0.007', '0.001', 0.407, 'kg', 'g', '678', 'Pesticide', '0.678', 9, 2, 1, 43, 0),
(157, '2021-03-06', 'PEST', '7', '2021-02-15', 'Jeside', '67', '0', '7', '2', '0', '0.007', '0.002', 0.405, 'kg', 'g', '678', 'Pesticide', '1.356', 9, 2, 1, 43, 0),
(158, '2021-03-06', 'PEST', '7', '2021-02-15', 'Jeside', '67', '0', '7', '2', '0', '0.007', '0.002', 0.405, 'kg', 'g', '678', 'Pesticide', '1.356', 9, 2, 1, 43, 0),
(159, '2021-03-06', 'PEST', '7', '2021-02-15', 'Jeside', '67', '0', '7', '2', '0', '0.007', '0.002', 0.405, 'kg', 'g', '678', 'Pesticide', '1.356', 9, 2, 1, 43, 0),
(160, '2021-02-16', 'FFF', '67', '2021-02-21', 'Jeside', '45', '89', '89', '0.2', '0.089', '0.089', '0.0002', 0.0036, 'ltr', 'ml', '670', 'Fungicide', '0.134', 9, 3, 1, 0, 0),
(161, '2021-03-22', 'FFF', '67', '2021-02-21', 'Jeside', '45', '1', '1', '0', '0.001', '0.001', '0', 0.0036, 'ltr', 'ml', '670', 'Fungicide', '0', 9, 2, 1, 44, 0),
(162, '2021-02-16', 'FFF', '67', '2021-02-21', 'Jeside', '45', '89', '7', '000', '0', '0.089', '0.007', 0.0036, 'ltr', 'ml', '670', 'Fungicide', '0', 9, 2, 1, 42, 0),
(163, '2021-02-23', 'FFF', '67', '2021-02-21', 'Jeside', '45', '89', '7', '0.7', '0.0007', '0.089', '0.007', 0.0029, 'ltr', 'ml', '670', 'Fungicide', '0.469', 9, 2, 1, 45, 0),
(164, '2021-02-23', 'FFF', '67', '2021-02-21', 'Jeside', '45', '2345', '23', '0', '0', '2.345', '0.023', 0.0026, 'ltr', 'ml', '670', 'Fungicide', '0', 9, 1, 1, 46, 0),
(165, '2021-02-23', 'FFF', '67', '2021-02-21', 'Jeside', '45', '56', '1', '0', '0.056', '0.001', '0', 0.0026, 'ltr', 'ml', '670', 'Fungicide', '0', 9, 1, 1, 46, 0),
(166, '2021-03-31', 'addnew', '7', '2021-02-15', 'Jeside', '67', '6', '0.78', '0.6', '0.0006', '0.006', '0.00078', 0.4084, 'kg', 'g', '678', 'Pesticide', '0.4068', 9, 45, 1, 48, 0),
(167, '2021-03-31', 'iii', '37', '2021-03-14', 'Jeside', '67', '7', '0.8', '0.2', '0.007', '0.0008', '0.0002', 0.0028, 'ltr', 'ml', '4567', 'Fungicide', '0.9134', 9, 45, 1, 48, 0),
(168, '2021-03-31', 'yuuiii', '3', '2021-03-08', 'Jeside', '67', '7', '0.78', '7', '7', '0.78', '7', 293, 'kg', 'kg', '289', 'Fungicide', '2023', 9, 45, 1, 48, 0),
(169, '2021-04-20', 'oxfo', '3', '2021-05-01', 'Powdery mildew', '67', '5', '23', '1', '5', '23', '1', 2, 'kg', 'kg', '100', 'Pesticide', '100', 9, 45, 1, 49, 0),
(173, '2021-04-28', 'greengo', '3', '2021-04-13', 'Red Mites', '67', '3', '0', '0', '0.003', '0', '0', 0, 'kg', 'g', '4567', 'Insecticide', '0', 21, 2, 1, 51, 0),
(174, '2021-04-23', 'joomla', '4', '2021-04-16', 'Red Mites', '22', '6', '8', '0.5', '6', '8', '0.5', 9.503, 'ltr', 'ltr', '5000', 'Fungicide', '2500', 21, 1, 1, 59, 0),
(175, '2021-05-05', 'Macc', '4', '2021-04-14', 'Early bite', '67', '77', '8', '0.5', '0.077', '0.008', '0.0005', 0.0015, 'kg', 'g', '5000', 'Pesticide', '2.5', 21, 1, 1, 60, 0),
(180, '2021-04-22', 'kih', '42', '2021-04-21', 'Thrips', '56', '7', '5', '0', '0.007', '0.005', '0', 0.002, 'ltr', 'ml', '300', 'Insecticide', '0', 21, 1, 1, 62, 0),
(181, '2021-04-22', 'greengo', '4', '2021-04-12', 'Red Mites', '67', '6', '5', '0', '6', '5', '0', 2, 'ltr', 'ltr', '5000', 'Insecticide', '0', 21, 1, 1, 62, 0),
(182, '2021-04-22', 'FFFFFFFGGGGGyyyyyyyyyyy', '4', '2021-04-21', 'Powdery mildew', '56', '0', '5', '0', '0', '0.005', '0', 0.007, 'ltr', 'ml', '5000', 'Fungicide', '0', 21, 1, 1, 62, 0),
(201, '2021-04-29', 'Green-peas', '6', '2021-04-21', 'Milibug', '34', '3', '9', '1', '3', '9', '1', 3, 'kg', 'kg', '100', 'Pesticide', '100', 21, 1, 1, 65, 0),
(202, '2021-04-29', 'Green-peas', '6', '2021-04-21', 'Milibug', '34', '4', '9', '0.5', '4', '9', '0.5', 2.5, 'kg', 'kg', '100', 'Pesticide', '50', 21, 1, 1, 65, 0),
(203, '2021-04-29', 'Green-peas', '6', '2021-04-21', 'Milibug', '34', '4', '9', '0.5', '4', '9', '0.5', 2, 'kg', 'kg', '100', 'Pesticide', '50', 21, 1, 1, 65, 0),
(213, '2021-04-22', 'joomla', '4', '2021-04-16', 'Red Mites', '22', '4', '9', '0.5', '0.5', '4', '9', 7.003, 'ltr', 'ltr', '5000', 'Fungicide', '2500', 21, 1, 1, 62, 0),
(228, '0000-00-00', 'fert1', '8', '2021-06-14', 'Powdery mildew', '45', '5gm', '1', '3', '0.005', '0.001', '0.003', 0.001, 'kg', 'g', '7', 'Fertilizer', '0.021', 23, 0, 1, 0, 0),
(241, '2021-07-06', 'fert1', '8', '2021-06-14', 'Powdery mildew', '45', '5gm', '1', '0', '5gm', '1', '0', 14, 'kg', 'kg', '7', 'Fertilizer', '0', 23, 1, 1, 102, 0),
(242, '2021-07-06', 'dis1', '8', '2021-06-01', 'Downy mildwe', '45', '5gm', '1', '0', '5gm', '1', '0', 14, 'kg', 'kg', '700', 'Pesticide', '0', 23, 1, 1, 102, 0),
(243, '2021-07-06', 'growth1', '8', '2021-06-16', 'Powdery mildew', '45', '10gm', '0', '0', '10gm', '0', '0', 14, 'kg', 'kg', '7', 'Growth Regulator', '0', 23, 1, 1, 102, 0),
(244, '2021-07-06', 'hkll', '8', '2021-06-16', 'Thrips', '4', '10gm', '7', '1', '10gm', '7', '1', 13, 'kg', 'kg', '7', 'Growth Regulator', '7', 23, 1, 1, 102, 0),
(245, '2021-07-06', 'Vakhar', '8', '2021-06-09', 'Jeside', '4', '4', '0', '1', '4', '0', '1', 13, 'kg', 'kg', '7', 'Insecticide', '7', 23, 1, 1, 102, 0),
(246, '2021-07-06', 'UUU', '8', '2021-06-16', 'Thrips', '4', '4', '3', '0', '0.004', '0.003', '0', 0.014, 'kg', 'g', '7', 'Insecticide', '0', 23, 1, 1, 102, 0),
(247, '2021-07-07', 'yyiiiiioo', '8', '2021-06-22', 'Jeside', '4', '10gm', '7', '3', '0.01', '0.007', '0.003', 0.011, 'kg', 'g', '700', 'Insecticide', '2.1', 23, 1, 1, 104, 0),
(248, '2021-07-07', 'yyiiiiioo', '8', '2021-06-22', 'Jeside', '4', '10gm', '7', '3', '0.01', '0.007', '0.003', 0.011, 'kg', 'g', '700', 'Insecticide', '2.1', 23, 1, 1, 104, 0),
(249, '2021-06-16', 'growth1', '8', '2021-06-16', 'Powdery mildew', '45', '10gm', '1', '0', '10gm', '1', '0', 14, 'kg', 'kg', '7', 'Growth Regulator', '0', 23, 1, 1, 105, 0),
(250, '2021-06-16', 'growth1', '8', '2021-06-16', 'Powdery mildew', '45', '10gm', '1', '0', '10gm', '1', '0', 14, 'kg', 'kg', '7', 'Growth Regulator', '0', 23, 1, 1, 105, 0),
(251, '2021-06-16', 'growth1', '8', '2021-06-16', 'Powdery mildew', '45', '10gm', '1', '0', '10gm', '1', '0', 14, 'kg', 'kg', '7', 'Growth Regulator', '0', 23, 1, 1, 105, 0),
(252, '2021-06-16', 'growth1', '8', '2021-06-16', 'Powdery mildew', '45', '10gm', '1', '0', '10gm', '1', '0', 14, 'kg', 'kg', '7', 'Growth Regulator', '0', 23, 1, 1, 105, 0),
(253, '2021-06-16', 'dis1', '8', '2021-06-01', 'Downy mildwe', '45', '5gm', '5', '0', '5gm', '5', '0', 14, 'kg', 'kg', '700', 'Pesticide', '0', 23, 1, 1, 105, 0),
(254, '2021-06-16', 'dis1', '8', '2021-06-01', 'Downy mildwe', '45', '5gm', '5', '0', '5gm', '5', '0', 14, 'kg', 'kg', '700', 'Pesticide', '0', 23, 1, 1, 105, 0),
(255, '2021-06-16', 'dis1', '8', '2021-06-01', 'Downy mildwe', '45', '5gm', '5', '0', '5gm', '5', '0', 14, 'kg', 'kg', '700', 'Pesticide', '0', 23, 1, 1, 105, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldrip`
--

CREATE TABLE `tbldrip` (
  `did` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `duration` int(11) NOT NULL,
  `prunning_day` int(30) NOT NULL,
  `corrective` text NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldrip`
--

INSERT INTO `tbldrip` (`did`, `plot_no`, `pname`, `date`, `stime`, `etime`, `duration`, `prunning_day`, `corrective`, `ses_id`, `status`) VALUES
(27, 1, 'Vrushabh More', '2021-02-15', '00:00:00', '04:00:00', 4, 0, 'fh', 9, 0),
(28, 1, 'Vrushabh More', '2021-02-24', '18:32:00', '19:32:00', 1, 3, 'sf', 9, 0),
(31, 1, 'Nashik', '2021-04-21', '19:20:00', '18:20:00', -1, 1, '6', 21, 0),
(32, 1, 'Nashik', '2021-05-01', '19:06:00', '12:06:00', -7, 2, '78', 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldropleaf`
--

CREATE TABLE `tbldropleaf` (
  `leaf_did` int(11) NOT NULL,
  `leaf_type` varchar(50) NOT NULL,
  `l1` varchar(30) NOT NULL,
  `l2` varchar(30) NOT NULL,
  `l3` varchar(30) NOT NULL,
  `l4` varchar(30) NOT NULL,
  `l5` varchar(30) NOT NULL,
  `l6` varchar(30) NOT NULL,
  `l7` varchar(30) NOT NULL,
  `l8` varchar(30) NOT NULL,
  `l9` varchar(30) NOT NULL,
  `l10` varchar(30) NOT NULL,
  `l11` varchar(30) NOT NULL,
  `l12` varchar(30) NOT NULL,
  `l13` varchar(30) NOT NULL,
  `l14` varchar(30) NOT NULL,
  `l15` varchar(30) NOT NULL,
  `l16` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldropleaf`
--

INSERT INTO `tbldropleaf` (`leaf_did`, `leaf_type`, `l1`, `l2`, `l3`, `l4`, `l5`, `l6`, `l7`, `l8`, `l9`, `l10`, `l11`, `l12`, `l13`, `l14`, `l15`, `l16`) VALUES
(1, 'april', '0.91-1.61', '700-1200', '400-700', '0.21-0.51', '1.21-2.51', '1.51-2.51', '0.31-0.61', '0.15-0.51', '80-120', '25-100', '20-50', '5.0-15.0', '15-30', '0.25-1.51', '0.01-0.51', '0.05-0.25'),
(2, 'recut', '0.91-1.60', '700-1200', '400-700', '0.2-0.5', '1.2-2.5', '1.0-2.50', '0.3-0.60', '0.21-0.60', '80-120', '25-100', '20-50', '5.0-15.0', '15-30', '0.25-1.50', '0.01-0.25', '0.05-0.25'),
(3, 'bloom', '1.01-1.21', '700-1000', '300-600', '0.31-0.51', '1.51-2.51', '0.81-1.51', '0.25-0.51', '0.15-0.51', '80-120', '40-100', '30-60', '5-15', '30-50', '0.25-0.51', '0.01-0.51', '0.05-0.25'),
(4, 'prebloom', '1.01-1.61', '700-1200', '700-1000', '0.25-0.51', '1.51-3.01', '0.80-1.2', '0.25-0.51', '0.15-0.51', '80-120', '40-100', '50-80', '5-15', '30-50', '0.25-0.51', '0.01-0.51', '0.05-0.25'),
(5, 'verasain', '0.91-1.51', '400-700', '300-600', '0.16-0.40', '2.01-2.51', '1.51-2.51', '0.31-0.61', '0.15-0.51', '80-120', '40-100', '30-60', '5-15', '25-50', '0.25-0.51', '0.01-0.51', '0.05-0.25'),
(6, 'berry development', '1.51-2.21', '700-1000', '400-700', '0.31-0.51', '1.51-2.01', '1.51-2.21', '0.31-0.61', '0.15-0.51', '80-120', '40-100', '50-80', '5-15', '25-50', '0.25-0.51', '0.01-0.51', '0.05-0.25'),
(7, 'post harvest', '0.91-1.21', '700-1200', '400-700', '0.15-0.41', '1.61-2.01', '2.01-3.01', '0.41-0.61', '0.21-0.61', '40-120', '40-150', '30-60', '5-15', '25-50', '0.25-1.51', '0.01-0.51', '0.05-0.25');

-- --------------------------------------------------------

--
-- Table structure for table `tblfarmreport`
--

CREATE TABLE `tblfarmreport` (
  `fam_id` int(11) NOT NULL,
  `item_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfarmreport`
--

INSERT INTO `tblfarmreport` (`fam_id`, `item_type`) VALUES
(1, 'Pesticide'),
(2, 'Fertilizer'),
(3, 'Assets'),
(4, 'Insecticide'),
(5, 'Growth Regulator'),
(6, 'Fungicide');

-- --------------------------------------------------------

--
-- Table structure for table `tblfert1`
--

CREATE TABLE `tblfert1` (
  `fert_id` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `fdate` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `duration` int(11) NOT NULL,
  `prunning_day` varchar(30) NOT NULL,
  `method_app` varchar(30) NOT NULL,
  `equipment_used` varchar(30) NOT NULL,
  `worker_name` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfert1`
--

INSERT INTO `tblfert1` (`fert_id`, `plot_no`, `pname`, `fdate`, `stime`, `etime`, `duration`, `prunning_day`, `method_app`, `equipment_used`, `worker_name`, `ses_id`, `status`) VALUES
(20, 1, 'Vrushabh more', '2021-02-28', '01:55:00', '16:55:00', 15, '7days', 'Soil', 'martigni', 'shruti', 18, 0),
(21, 1, 'Vrushabh more', '2021-02-28', '01:55:00', '16:55:00', 15, '7days', 'Soil', 'martigni', 'shruti', 18, 0),
(29, 1, 'Vrushabh More', '2021-02-24', '18:25:00', '19:25:00', 1, '-5days', 'Fertigation', 'cima', 'niki', 9, 0),
(30, 1, 'Vrushabh More', '2021-03-30', '05:44:00', '20:44:00', 15, '29days', 'Fertigation', 'JCB', 'shruti', 9, 0),
(35, 1, 'Nashik', '2021-04-30', '07:55:00', '18:55:00', 11, '10days', 'Soil', 'kubota', 'Shruti', 21, 0),
(37, 1, 'Nashik', '2021-04-21', '09:15:00', '20:15:00', 11, '1days', 'Soil', 'kubota', 'Shruti', 21, 0),
(39, 1, 'Nashik', '2021-04-22', '06:13:00', '16:15:00', 10, '2days', 'Fertigation', 'Liaa', 'Shruti', 21, 0),
(40, 1, 'Nashik', '2021-04-08', '17:19:00', '18:19:00', 1, '-12days', 'Fertigation', 'Liaa', 'Shruti', 21, 0),
(41, 1, 'Nashik', '2021-04-28', '19:25:00', '14:30:00', -4, '8days', 'Fertigation', 'cafini', 'Shruti', 21, 0),
(42, 1, 'Nashik', '2021-04-23', '19:34:00', '20:34:00', 1, '3days', 'Fertigation', 'Liaa', 'Shruti', 21, 0),
(44, 1, 'Nashik', '2021-04-22', '02:04:00', '03:04:00', 1, '6 days', 'Fertigation', 'ads', 'shruti', 23, 0),
(46, 1, 'Nashik', '2021-04-29', '16:23:00', '17:23:00', 1, 'NaNdays', 'Soil', 'ads', 'shruti', 23, 0),
(47, 1, 'Nashik', '2021-04-29', '16:23:00', '17:23:00', 1, 'NaNdays', 'Soil', 'ads', 'shruti', 23, 0),
(54, 1, 'Nashik', '2021-04-28', '14:21:00', '18:17:00', 3, 'NaNdays', 'Soil', 'ads', 'shruti', 23, 0),
(56, 1, 'Nashik', '2021-05-27', '21:08:00', '22:08:00', 1, '28days', 'Soil', 'ads', 'shruti', 23, 0),
(57, 1, 'Nashik', '2021-05-25', '18:11:00', '21:08:00', 2, '26days', 'Fertigation', 'ads', 'shruti', 23, 0),
(60, 1, 'Nashik', '2021-07-06', '13:18:00', '04:14:00', -9, '68days', 'Soil', 'ads', 'shruti', 23, 0),
(61, 1, 'Nashik', '2021-07-01', '17:11:00', '14:15:00', -2, '63days', 'Fertigation', 'ads', 'shruti', 23, 0),
(62, 1, 'Nashik', '2021-06-23', '14:20:00', '18:17:00', 3, '55days', 'Fertigation', 'ads', 'shruti', 23, 0),
(64, 1, 'Nashik', '2021-06-30', '08:20:00', '00:16:00', -8, '62days', 'Soil', 'ads', 'shruti', 23, 0),
(66, 1, 'Nashik', '2021-06-29', '01:26:00', '03:26:00', 2, '61days', 'Soil', 'ads', 'shruti', 23, 0),
(67, 1, 'Nashik', '2021-06-22', '18:29:00', '17:29:00', -1, '54days', 'Fertigation', 'ads', 'shruti', 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblfertsession`
--

CREATE TABLE `tblfertsession` (
  `fid` int(11) NOT NULL,
  `fdate` date NOT NULL,
  `fert_name` varchar(30) NOT NULL,
  `Aqty_app` text NOT NULL,
  `ARec_qty` text NOT NULL,
  `qty_app` float NOT NULL,
  `Rec_qty` text NOT NULL,
  `reduce_qty` float NOT NULL,
  `unit` text NOT NULL,
  `act_unit` text NOT NULL,
  `fert_reason` text NOT NULL,
  `purchase_rate` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `fert_id` int(11) NOT NULL,
  `draft_status` int(11) NOT NULL,
  `method_app` varchar(30) NOT NULL,
  `plot_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfertsession`
--

INSERT INTO `tblfertsession` (`fid`, `fdate`, `fert_name`, `Aqty_app`, `ARec_qty`, `qty_app`, `Rec_qty`, `reduce_qty`, `unit`, `act_unit`, `fert_reason`, `purchase_rate`, `total`, `ses_id`, `status`, `fert_id`, `draft_status`, `method_app`, `plot_no`) VALUES
(66, '2021-03-02', 'FERT', '0.2', '89', 0.0002, '0.089', 0.003, 'ltr', 'ml', 'any', 289, 0, 9, 1, 27, 0, 'Fertigation', 1),
(69, '2021-02-24', 'FERT', '0', '1', 0, '0.001', 1, 'kg', 'g', '1', 678, 0, 9, 1, 29, 0, 'Fertigation', 1),
(70, '2021-03-30', 's', '0.6', '7', 0.0006, '0.007', 0.0024, 'kg', 'g', 'er', 4567, 3, 9, 1, 30, 0, 'Fertigation', 1),
(76, '2021-04-30', 'FFFFFFFGGGGG', '1', '6', 1, '6', 1, 'ltr', 'ltr', 'growh', 5000, 5000, 21, 1, 35, 0, 'Soil', 1),
(79, '2021-04-21', 'Acroj', '0.3', '4', 0.3, '4', 1.7, 'kg', 'kg', 'gowth', 5000, 1500, 21, 1, 37, 0, '', 1),
(80, '2021-04-22', 'oxfo', '0', '6', 0, '0.006', 0.5, 'kg', 'g', 'groeth', 100, 0, 21, 1, 39, 0, 'Fertigation', 1),
(81, '2021-04-08', 'no', '0', '6', 0, '0.006', 0.002, 'kg', 'g', 'groeth', 5000, 0, 21, 1, 40, 0, 'Fertigation', 1),
(82, '2021-04-08', 'ii8888', '0', '6', 0, '0.006', 0.002, 'kg', 'g', 'groeth', 200, 0, 21, 1, 40, 0, 'Fertigation', 1),
(83, '2021-04-28', 'oxfo', '0', '6', 0, '0.006', 0.5, 'kg', 'g', 'groeth', 100, 0, 21, 1, 41, 0, 'Fertigation', 1),
(84, '2021-04-23', 'oxfo', '0', '6', 0, '0.006', 0.5, 'kg', 'g', 'groeth', 100, 0, 21, 1, 42, 0, 'Fertigation', 1),
(85, '2021-04-23', 'mmmmmm', '0', '6', 0, '0.006', 0.002, 'ltr', 'ml', 'groeth', 300, 0, 21, 1, 42, 0, 'Fertigation', 1),
(87, '2021-04-23', 'YYYUYT', '0', '6', 0, '0.006', 0.002, 'ltr', 'ml', 'groeth', 200, 0, 21, 1, 42, 0, 'Fertigation', 1),
(88, '2021-04-23', 'YYYUYT', '0', '6', 0, '0.006', 0.002, 'ltr', 'ml', 'groeth', 200, 0, 21, 1, 42, 0, 'Fertigation', 1),
(100, '2021-04-28', 'Clone', '0.5', '4', 0.5, '4', 3.5, 'kg', 'kg', 'growwth', 100, 50, 23, 1, 53, 0, 'Fertigation', 1),
(109, '2021-07-01', 'fert1', '3', '5gm', 0.003, '0.005', 0.004, 'kg', 'g', 'GOOD', 7, 0, 23, 1, 61, 0, 'Fertigation', 1),
(110, '2021-07-01', 'chi', '3', '5gm', 0.003, '0.005', 0.011, 'kg', 'g', 'GOOD', 7, 0, 23, 1, 61, 0, 'Fertigation', 1),
(111, '2021-07-01', 'chi', '3', '5gm', 0.003, '0.005', 0.011, 'kg', 'g', 'GOOD', 7, 0, 23, 1, 61, 0, 'Fertigation', 1),
(115, '2021-06-30', 'chi', '3', '5gm', 0.003, '0.005', 0.009, 'kg', 'g', 'GOOD', 7, 0, 23, 1, 64, 0, 'Soil', 1),
(117, '2021-06-30', 'fert1', '0', '5gm', 0, '0.005', 0, 'kg', 'g', 'Nice', 0, 0, 23, 1, 64, 0, 'Soil', 1),
(119, '2021-06-29', 'chi', '0', '5gm', 0, '0.005', 0, 'kg', 'g', 'GOOD', 7, 0, 23, 1, 66, 0, 'Soil', 1),
(120, '2021-06-22', 'fert1', '3', '5gm', 3, '5gm', 11, 'kg', 'kg', 'Nice', 7, 21, 23, 0, 67, 0, 'Fertigation', 1),
(121, '2021-06-22', 'chi', '3', '5gm', 0.003, '0.005', 0.011, 'ltr', 'ml', 'GOOD', 7, 0, 23, 0, 67, 0, 'Fertigation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblfruit`
--

CREATE TABLE `tblfruit` (
  `fid` int(11) NOT NULL,
  `fruit_name` varchar(35) NOT NULL,
  `variety_name` varchar(35) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfruit`
--

INSERT INTO `tblfruit` (`fid`, `fruit_name`, `variety_name`, `ses_id`) VALUES
(29, 'apple', 'thomson', 6),
(33, 'grape', 'flame', 5),
(34, 'grape', 'sudhakar', 5),
(53, 'apple', 'thomson', 18),
(54, 'grapes', 'thomson', 18),
(65, 'Apple', 'Thomson', 9),
(66, 'Manuka', 'as', 9),
(67, 'aaa', 'aaaa', 9),
(68, 'aaddaa', 'aa', 9),
(69, 'aaddaa', 'aa', 9),
(71, 'vv', 'a', 9),
(72, 'Manuka', 'as', 0),
(73, 'Manuka', 'as', 0),
(74, 'a', 'as', 0),
(76, 'aaaaaa', 'adrftg', 20),
(77, 'Manuka', '34', 20),
(79, 'Apple', 'Thomson', 21),
(82, 'Orange', 'aaa', 21),
(83, 'Apple', 'Thomson', 22),
(84, 'Orange', 'Thomson', 22),
(87, 'banana', 'thomson', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tblgrowth1`
--

CREATE TABLE `tblgrowth1` (
  `gr_id` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `duration` varchar(30) NOT NULL,
  `days_after_prunning` varchar(30) NOT NULL,
  `equipment_used` varchar(30) NOT NULL,
  `worker_name` varchar(30) NOT NULL,
  `water_ph` int(11) NOT NULL,
  `moa` varchar(30) NOT NULL,
  `water_used` varchar(30) NOT NULL,
  `temp` varchar(30) NOT NULL,
  `humidity` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblgrowth1`
--

INSERT INTO `tblgrowth1` (`gr_id`, `plot_no`, `pname`, `date`, `stime`, `etime`, `duration`, `days_after_prunning`, `equipment_used`, `worker_name`, `water_ph`, `moa`, `water_used`, `temp`, `humidity`, `ses_id`, `status`) VALUES
(14, 1, 'Vrushabh more', '2021-03-04', '13:33:00', '19:29:00', '5 Hour', '11days', 'CVBN', 'shruti', 90, 'Fertigation Foliar', '1530', '8', '70', 18, 0),
(25, 1, 'Vrushabh More', '2021-02-22', '04:00:00', '00:00:00', '-4 Hour', '-7days', 'martigni', 'niki', 10, 'Soil', '201', '4', '45', 9, 0),
(31, 1, 'Nashik', '2021-04-27', '13:27:00', '17:23:00', '3 Hour', '7days', 'Liaa', 'Shruti', 78, 'Fertigation Foliar', '10', '5', '7', 21, 0),
(32, 1, 'Nashik', '2021-04-22', '06:25:00', '18:26:00', '12 Hour', '2days', 'Liaa', 'Shruti', 5, 'Soil', '10', '1', 'ty', 21, 0),
(33, 1, 'Nashik', '2021-04-23', '13:33:00', '18:30:00', '4 Hour', '3days', 'ess', 'Shruti', 5, 'Soil', '10', '1', 'ty', 21, 0),
(34, 1, 'Nashik', '2021-04-16', '21:01:00', '21:01:00', '0 Hour', '-4days', 'Liaa', 'Shruti', 5, 'Soil', '52.5', '3', 'ty', 21, 0),
(36, 1, 'Nashik', '2021-04-22', '02:09:00', '05:09:00', '3 Hour', '6 days', 'ads', 'shruti', 78, 'Soil', '12', '6', '4', 23, 0),
(38, 1, 'Nashik1', '2021-04-28', '11:14:00', '04:10:00', '-7 Hour', '3 days', 'ads', 'shruti', 78, 'Soil', '12', '6', '4', 23, 0),
(40, 1, 'Nashik', '2021-04-28', '17:49:00', '18:49:00', '1 Hour', 'NaNdays', 'ads', 'shruti', 78, 'Soil', '24', '6', '4', 23, 0),
(48, 1, 'Nashik', '2021-05-27', '13:15:00', '13:16:00', '0 Hour', '28days', 'ads', 'shruti', 6, 'Fertigation Foliar', '8', '45', '45', 23, 0),
(49, 1, 'Nashik1', '2021-05-13', '11:20:00', '07:20:00', '-4 Hour', '14days', 'ads', 'shruti', 6, 'Soil', '12', '45', '45', 23, 0),
(51, 1, 'Nashik', '2021-06-22', '00:37:00', '11:37:00', '11 Hour', '54days', 'ads', 'shruti', 34, 'Soil', '5', '56', '4', 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblgrowthsession`
--

CREATE TABLE `tblgrowthsession` (
  `gid` int(11) NOT NULL,
  `date` date NOT NULL,
  `gr_name` varchar(30) NOT NULL,
  `ppm` int(11) NOT NULL,
  `Aqty` float NOT NULL,
  `qty` float NOT NULL,
  `reduce_qty` float NOT NULL,
  `water` int(11) NOT NULL,
  `used_solvent` varchar(30) NOT NULL,
  `Aquantity` float NOT NULL,
  `quantity` float NOT NULL,
  `unit` varchar(30) NOT NULL,
  `act_unit` varchar(30) NOT NULL,
  `purchase_rate` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `draft_status` int(11) NOT NULL,
  `gr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblgrowthsession`
--

INSERT INTO `tblgrowthsession` (`gid`, `date`, `gr_name`, `ppm`, `Aqty`, `qty`, `reduce_qty`, `water`, `used_solvent`, `Aquantity`, `quantity`, `unit`, `act_unit`, `purchase_rate`, `total`, `ses_id`, `plot_no`, `status`, `draft_status`, `gr_id`) VALUES
(28, '2021-02-18', 'nisco', 233, 2, 0.002, 0, 34, '899', 566, 0.566, 'ltr', 'ml', 5000, 2830, 18, 2, 1, 0, 13),
(29, '2021-02-18', 'nisco', 233, 20, 0.02, 0, 34, '90', 566, 0.566, 'ltr', 'ml', 5000, 2830, 18, 1, 1, 0, 13),
(30, '2021-03-04', 'nisco', 233, 2, 0.002, 0, 34, '90', 566, 0.566, 'ltr', 'ml', 5000, 2830, 18, 1, 1, 0, 14),
(31, '2021-03-04', 'nisco', 233, 2, 0.002, 0, 34, '90', 90, 0.09, 'ltr', 'ml', 5000, 450, 18, 1, 1, 0, 14),
(32, '2021-03-04', 'nisco', 233, 2, 0.002, 0, 34, '90', 90, 0.09, 'ltr', 'ml', 5000, 450, 18, 1, 1, 0, 14),
(33, '2021-03-01', 'assssss', 5, 2, 0.002, 0, 34, 'AS', 566, 0.566, 'kg', 'g', 354, 200, 9, 5, 1, 0, 15),
(34, '2021-03-01', 'assssss', 233, 2, 0.002, 0, 34, '90', 566, 0.566, 'kg', 'g', 354, 200, 9, 5, 1, 0, 15),
(35, '2021-03-01', 'GR', 78, 89, 0.089, 2.089, 89, '89', 2000, 2, 'kg', 'g', 670, 1340, 9, 2, 1, 0, 16),
(36, '2021-03-01', 'GR', 78, 78, 0.078, 0, 89, '89', 89, 0.089, 'kg', 'g', 670, 60, 9, 2, 1, 0, 16),
(37, '2021-03-01', 'GR', 78, 6, 0.006, 0, 89, '8990', 89, 0.089, 'kg', 'g', 670, 60, 9, 2, 1, 0, 16),
(38, '2021-02-16', 'yyyyy', 78, 6, 0.006, 2991, 89, '89', 89, 89, 'kg', 'kg', 289, 25721, 9, 2, 1, 0, 17),
(39, '2021-02-16', 'GR', 78, 6, 0.006, 0, 89, '8990', 89, 0.089, 'kg', 'g', 670, 60, 9, 2, 1, 0, 17),
(40, '2021-02-16', 'GR', 78, 6, 0.006, 0, 89, '89', 89, 0.089, 'kg', 'g', 670, 60, 9, 2, 1, 0, 17),
(42, '2021-03-01', 'GR', 3, 500, 0.5, 4, 32, '22', 1000, 1, 'kg', 'g', 670, 670, 9, 2, 1, 0, 16),
(43, '2021-02-22', 'GR', 56, 1000, 1, 9.994, 5, '3', 3, 0.003, 'kg', 'g', 670, 2, 9, 2, 1, 0, 19),
(44, '2021-02-22', 'GR', 56, 1000, 1, 9.991, 5, '3', 3, 0.003, 'kg', 'g', 670, 2, 9, 2, 1, 0, 19),
(45, '2021-02-22', 'GR', 56, 8, 0.008, 9.989, 5, '2', 2, 0.002, 'kg', 'g', 670, 1, 9, 2, 1, 0, 19),
(46, '2021-03-01', 'GR', 56, 10, 0.01, 9.989, 5, '3', 0, 0, 'kg', 'g', 670, 0, 9, 2, 1, 0, 16),
(47, '2021-02-16', 'GR', 56, 8, 0.008, 9.986, 5, '3', 3, 0.003, 'kg', 'g', 670, 2, 9, 2, 1, 0, 17),
(48, '2021-03-12', 'GR', 56, 8, 0.008, 9.983, 5, '3', 3, 0.003, 'kg', 'g', 670, 2, 9, 2, 1, 0, 20),
(49, '2021-02-26', 'GR', 56, 1000, 1, 9.983, 5, '3', 3, 0.003, 'kg', 'g', 670, 2, 9, 2, 1, 0, 21),
(50, '2021-03-01', 'GR', 56, 0, 0, 9.896, 5, '3', 90, 0.09, 'kg', 'g', 670, 60, 9, 2, 1, 0, 22),
(51, '2021-02-22', 'GR', 56, 1, 0.001, 9.893, 5, '3', 3, 0.003, 'kg', 'g', 670, 2, 9, 2, 1, 0, 23),
(52, '2021-02-22', 'GR', 56, 1000, 1, 9.884, 5, '3', 9, 0.009, 'kg', 'g', 670, 6, 9, 1, 1, 0, 25),
(53, '2021-02-22', 'yyyyy', 89, 3, 0.003, 2991, 8, '9', 9, 9, 'kg', 'kg', 289, 2601, 9, 1, 1, 0, 25),
(54, '2021-04-15', 'joomla', 89, 3, 0.003, 1, 8, '9', 1, 1, 'kg', 'kg', 4567, 4567, 9, 2, 1, 0, 28),
(56, '2021-04-20', 'yuuiii', 89, 3, 0.003, 0.091, 8, '9', 9, 0.009, 'kg', 'g', 4567, 41, 21, 2, 1, 0, 29),
(57, '2021-04-20', 'gggg', 89, 3, 0.003, 0.1, 8, '9', 0, 0, 'ltr', 'ml', 4567, 0, 21, 2, 1, 0, 29),
(60, '2021-04-27', 'aaaaaaaaa', 7, 2, 0.002, 0.0015, 78, '89', 0.5, 0.0005, 'ltr', 'ml', 5000, 3, 21, 1, 1, 0, 31),
(61, '2021-04-22', 'joomla', 2, 2, 0.002, 9.503, 4, '45', 2, 2, 'ltr', 'ltr', 5000, 10000, 21, 1, 1, 0, 32),
(62, '2021-04-23', 'gggg', 2, 2, 0.002, 0.001, 4, '45', 2, 0.002, 'kg', 'g', 300, 1, 21, 1, 1, 0, 33),
(63, '2021-04-22', 'YYYUUII', 2, 2, 0.002, 0, 4, '45', 2, 2, 'ltr', 'ltr', 200, 400, 21, 1, 1, 0, 32),
(64, '2021-04-16', 'joomla', 2, 2, 0.002, 7.503, 4, '45', 2, 2, 'ltr', 'ltr', 5000, 10000, 21, 1, 1, 0, 34),
(65, '2021-04-16', 'maccccccccccccccc', 2, 0, 0, 0.002, 4, '0', 0, 0, 'kg', 'g', 5000, 0, 21, 1, 1, 0, 34),
(66, '2021-04-16', 'aaaaaaaaa', 2, 0, 0, 0.0015, 4, '45', 0, 0, 'ltr', 'ml', 5000, 0, 21, 1, 1, 0, 34),
(67, '2021-04-16', 'joomla', 2, 0, 0, 7.503, 4, '45', 0, 0, 'ltr', 'ltr', 5000, 0, 21, 1, 1, 0, 34),
(81, '2021-06-22', 'growth1', 4, 2, 0.002, 6.003, 30, '4', 1, 0.001, 'ltr', 'ml', 700, 1, 23, 1, 1, 0, 51),
(82, '2021-06-22', 'hkll', 4, 2, 0.002, 0.001, 30, '4', 1, 0.001, 'kg', 'g', 7, 0, 23, 1, 1, 0, 51),
(88, '2021-06-22', 'growth1', 4, 2, 0.002, 6.002, 30, '4', 1, 0.001, 'ltr', 'ml', 700, 1, 23, 1, 1, 0, 51);

-- --------------------------------------------------------

--
-- Table structure for table `tblharvest`
--

CREATE TABLE `tblharvest` (
  `h_id` int(11) NOT NULL,
  `srno` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `end_date` date NOT NULL,
  `days_till_harvest` int(11) NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `fruit_name` varchar(30) NOT NULL,
  `variety` varchar(30) NOT NULL,
  `package` text NOT NULL,
  `NOS` text NOT NULL,
  `total` text NOT NULL,
  `total_amount` int(11) NOT NULL,
  `export` int(11) NOT NULL,
  `local` int(11) NOT NULL,
  `scrap` int(11) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblharvest`
--

INSERT INTO `tblharvest` (`h_id`, `srno`, `plot_no`, `date`, `end_date`, `days_till_harvest`, `stime`, `etime`, `fruit_name`, `variety`, `package`, `NOS`, `total`, `total_amount`, `export`, `local`, `scrap`, `ses_id`) VALUES
(5, 1, 2, '2020-12-25', '2021-01-20', 0, '07:25:00', '07:20:00', 'apple1', 'thomson', '90', '10', '900', 900, 10, 3, 887, 5),
(6, 3, 1, '2020-12-23', '2020-12-10', 3, '09:56:00', '09:54:00', 'grape', 'hjjkkl', '100', '2', '180', 180, 9, 9, 162, 5),
(7, 4, 3, '2020-12-21', '2020-12-23', 0, '00:17:00', '10:20:00', 'apple1', 'sharad', '1000', '8,5', '8000,5000', 13000, 7, 8, 12985, 5),
(12, 5, 2, '2021-01-24', '2021-01-20', 0, '18:41:00', '20:41:00', 'apple1', 'thomson', '8,5', '2,2', '16,10', 26, 5, 5, 16, 5),
(13, 6, 3, '2021-01-19', '2021-01-21', 0, '12:41:00', '12:41:00', 'apple1', 'sharad', '8,8,8', '5,3,20', '40,24,160', 224, 110, 13, 101, 5),
(14, 8, 2, '2021-03-01', '2021-03-30', 0, '21:05:00', '21:05:00', 'Grapes', 'thomson', '34,3,8,10009,5,8,8,8', '5,5,5,10,2,3,3,8', '170,15,40,100090,10,24,24,64', 100437, 48, 6440, 93949, 9),
(15, 8, 2, '2021-01-21', '2021-01-27', 0, '02:59:00', '02:59:00', 'grapes', 'flame', '89,90', '8,5', '712,450', 1162, 80, 80, 1002, 9),
(16, 3, 2, '2021-01-21', '0000-00-00', 35, '03:04:00', '04:04:00', 'grapes', 'flame', '59,59', '10,8', '590,472', 1062, 10, 4, 1048, 9),
(17, 5, 2, '2021-01-26', '2021-01-20', 0, '03:50:00', '04:50:00', 'grapes', 'flame', '10,10', '8,80', '80,800', 160, 9, 1, 150, 9),
(18, 2, 2, '2021-02-18', '2021-02-26', 0, '20:12:00', '19:11:00', 'apple', 'flame', '90', '10', '900', 900, 8, 8, 884, 18),
(19, 6, 2, '2021-02-23', '2021-02-09', 0, '16:34:00', '18:31:00', 'Grapes', 'thomson', '90', '7', '630', 630, 7, 2, 621, 9),
(20, 6, 2, '2021-03-03', '0000-00-00', 3, '23:20:00', '22:20:00', 'Grapes', 'thomson', '8,8', '3,3', '24,24', 48, 4, 4, 40, 9),
(21, 8, 2, '2021-02-17', '2021-03-21', 0, '19:55:00', '20:55:00', 'Grapes', 'thomson', '8', '3', '24', 24, 4, 6, 14, 9),
(22, 2, 1, '2021-04-14', '2021-04-23', 0, '01:40:00', '01:41:00', 'Grapes', 'tho', '4', '4', '16', 16, 2, 2, 12, 21),
(24, 1, 1, '2021-04-29', '0000-00-00', 0, '16:12:00', '17:12:00', 'Apple', 'Thomson', '6', '3', '18', 18, 4, 4, 10, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tblidiscno`
--

CREATE TABLE `tblidiscno` (
  `idisc_id` int(11) NOT NULL,
  `idisc_no` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblidiscno`
--

INSERT INTO `tblidiscno` (`idisc_id`, `idisc_no`) VALUES
(1, 0.6),
(2, 0.8),
(3, 1),
(4, 1.2),
(5, 1.4);

-- --------------------------------------------------------

--
-- Table structure for table `tbliexpense`
--

CREATE TABLE `tbliexpense` (
  `iexp_id` int(11) NOT NULL,
  `iexp_name` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbliexpense`
--

INSERT INTO `tbliexpense` (`iexp_id`, `iexp_name`, `ses_id`) VALUES
(2, 'travel', 0),
(3, 'transportation', 0),
(4, 'vehicle expenses', 0),
(5, 'home expenses', 0),
(6, 'personal expenses', 0),
(10, 'sa', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tblinhouse`
--

CREATE TABLE `tblinhouse` (
  `in_id` int(11) NOT NULL,
  `srno` int(30) NOT NULL,
  `machine_name` varchar(30) NOT NULL,
  `used_interval` varchar(30) NOT NULL,
  `date_interval` date DEFAULT NULL,
  `time_interval` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `remark` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblinhouse`
--

INSERT INTO `tblinhouse` (`in_id`, `srno`, `machine_name`, `used_interval`, `date_interval`, `time_interval`, `title`, `remark`, `ses_id`, `status`) VALUES
(20, 2, 'Hpm', '6', '2020-12-23', 10, 'prunning', 'dfvgf', 5, 0),
(26, 4, 'local', '6', '2021-01-06', 8, 'prunning', 'good', 5, 0),
(29, 3, 'agrofab', '0', '2021-01-12', 5, 'paste', 'regular', 5, 0),
(30, 2, 'kubota', 'one year', '2021-01-12', -1, 'subcane', 'fgood', 5, 0),
(35, 1, 'kubota', 'one year', '2021-02-22', 0, 'Niki', 'good', 18, 0),
(36, 2, 'CVBN', '6', '2021-02-17', -6, 'Niki', 'good', 18, 0),
(37, 10, 'ess', '5', '2021-02-25', 0, 'crop', 'good', 9, 0),
(39, 3, 'cafini', '5', '2021-02-18', -1, 'crop', 'good', 9, 0),
(40, 8, 'ess', '5', '2021-02-28', -1, 'Niki', 'good', 9, 0),
(41, 1, 'Liaa', '5', '2021-04-09', 0, 'Prunning', 'Good', 21, 0),
(42, 12, 'cafini', '5', '2021-04-21', -1, 'Prunning', 'Good', 21, 0),
(43, 1, 'ads', '2', '2021-05-13', 0, 'Prunning', 'good', 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblinhousecal`
--

CREATE TABLE `tblinhousecal` (
  `inid` int(11) NOT NULL,
  `srno` int(11) NOT NULL,
  `machine_name` varchar(30) NOT NULL,
  `used_interval` varchar(30) NOT NULL,
  `time_interval` int(11) NOT NULL,
  `date_interval` date NOT NULL,
  `title` varchar(30) NOT NULL,
  `remark` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblinhousecal`
--

INSERT INTO `tblinhousecal` (`inid`, `srno`, `machine_name`, `used_interval`, `time_interval`, `date_interval`, `title`, `remark`, `ses_id`) VALUES
(48, 2, 'kubota', 'one year', -1, '2021-01-12', 'oil change', 'fgood', 5),
(53, 5, 'kubota', 'One year', 4, '2021-01-22', 'Work', 'Good', 5),
(54, 6, 'kubota', 'G', 1, '2021-01-24', 'Vj', 'Gj', 5),
(58, 9, 'martigni', '6', 3, '2021-02-17', 'downey sited', 'dfvgf', 18),
(59, 3, 'ess', '6', -1, '2021-02-21', 'ghjmn,dfcgfjmn', 'good', 18),
(60, 5, 'JCB', '5', -4, '2021-02-09', 'prunning', 'good', 9),
(61, 3, 'cafini', '5', 8, '2021-02-10', 'prunning4', 'good', 9),
(62, 3, 'Kubota', '3', 14, '2021-02-25', 'aa', 'good', 9),
(63, 4, 'Kubota', '3', 1, '2021-02-27', 'aa', 'good', 9),
(64, 2, 'kubota', '5', 40, '2021-04-09', 'Prunninhg', 'Good', 21),
(66, 1, 'Kubota', '6', 1, '2021-04-11', 'prunning', 'good', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tblirrigation`
--

CREATE TABLE `tblirrigation` (
  `iid` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `duration` int(11) NOT NULL,
  `prunning_day` int(11) NOT NULL,
  `moisure` varchar(30) NOT NULL,
  `water_dis` int(11) NOT NULL,
  `pressure_read` int(11) NOT NULL,
  `tot_water` int(11) NOT NULL,
  `temp` varchar(30) NOT NULL,
  `remark` text NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblirrigation`
--

INSERT INTO `tblirrigation` (`iid`, `plot_no`, `pname`, `date`, `stime`, `etime`, `duration`, `prunning_day`, `moisure`, `water_dis`, `pressure_read`, `tot_water`, `temp`, `remark`, `ses_id`, `status`) VALUES
(35, 1, 'Vrushabh more', '2021-02-23', '15:07:00', '20:04:00', 4, 2, '40', 627456, 2128, 6274560, 'Thre', 'INTERVAL IN BETWEEN', 18, 0),
(39, 1, 'Vrushabh More', '2021-02-26', '17:28:00', '18:28:00', 1, 5, '56', 11730, 3, 65688000, '89', 'good', 9, 0),
(40, 1, 'Vrushabh More', '2021-02-25', '19:29:00', '18:29:00', -1, 4, '56', -11730, 3, -65688000, '89', 'good', 9, 0),
(42, 1, 'Malegaon', '2021-04-30', '00:54:00', '02:54:00', 2, 10, '8', 3324, 89, 16620000, '4', 'Good', 21, 0),
(44, 1, 'Nashik', '2021-04-27', '16:52:00', '20:47:00', 3, -2, '3', 60, 3, 6000, '6', 'S', 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblitem`
--

CREATE TABLE `tblitem` (
  `id` int(11) NOT NULL,
  `item_name` varchar(35) NOT NULL,
  `item_type` varchar(35) NOT NULL,
  `ingredient` varchar(30) NOT NULL,
  `qty` float NOT NULL,
  `unit` varchar(30) NOT NULL,
  `PHI` int(11) NOT NULL,
  `MRI` varchar(30) NOT NULL,
  `dose` varchar(30) NOT NULL,
  `runit` varchar(30) NOT NULL,
  `pest` varchar(35) NOT NULL,
  `company` varchar(20) NOT NULL,
  `GST` int(30) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblitem`
--

INSERT INTO `tblitem` (`id`, `item_name`, `item_type`, `ingredient`, `qty`, `unit`, `PHI`, `MRI`, `dose`, `runit`, `pest`, `company`, `GST`, `ses_id`) VALUES
(60, 'ACROBAT', 'Growth Regulator', 'altheminin', 0.1, 'ltr', 66, '45645', '3 ml', 'per acre', 'Thrips', 'basaf', 12, 5),
(77, 'mobile1', 'item_type', 'dfsd', 4, 'ml', 3, '4', '0gm', 'per acre', 'Jeside', 'infosys', 5, 0),
(139, 'Acro', 'Pesticide', 'ert', 0.002, 'kg', 3, '345', '80 gm', 'per litter', 'Red Mites', 'redmi', 12, 18),
(140, 'nisco', 'Insecticide', 'ert', 0.002, 'kg', 66, '345', '80 gm', 'per acre', 'Red Mites', 'basaf', 20, 18),
(141, 'JCB', 'Assets', 'ert', 67, 'kg', 66, '3456', '80 gm', 'per acre', 'Steam borer', 'kthm', 12, 18),
(142, 'mak', 'Fungicide', 'zxcdv', 500, 'kg', 3, '345', '78', 'per litter', 'Jeside', 'redmi', 18, 18),
(143, 'aaaaa', 'Fertilizer', 'asd', 0.067, 'kg', 66, '345', '80 gm', 'per acre', 'Steam borer', 'redmi', 20, 18),
(144, 'sss', 'Growth Regulator', 'zxcdv', 0.002, 'ltr', 66, '3456', '80 gm', 'per litter', 'Red Mites', 'redmi', 12, 18),
(145, 'mobile3', 'Pesticide', 'dfsd', 0.004, 'ltr', 3, '4', '40gm', 'per litter', 'Jeside', 'kthm', 12, 18),
(146, 'Acrobat', 'Pesticide', 'ert', 6, 'kg', 45, '5676', '10gm', 'per acre', 'Early bite', 'Winjit', 12, 9),
(147, 'Nisco', 'Insecticide', 'ert', 0.006, 'ltr', 45, '5676', '10gm', 'per litter', 'Early bite', 'Infosys', 18, 9),
(148, 'FFF', 'Fungicide', 'ert', 6, 'kg', 45, '5676', '10gm', 'per acre', 'Jeside', 'TCA', 18, 9),
(149, 'FERT', 'Fertilizer', 'ert', 0.006, 'ltr', 45, '5676', '30gm', 'per acre', 'Thrips', 'MODERN I', 20, 9),
(150, 'GR', 'Growth Regulator', 'ert', 78, 'kg', 67, '5676', '30gm', 'per litter', 'Early bite', 'TRIOR Q', 18, 9),
(151, 'JCB', 'Assets', 'ert', 78, 'kg', 67, '5676', '30gm', 'per acre', 'Red Mites', 'BUILT', 20, 9),
(152, 'ACRO', 'Pesticide', 'RT', 0.067, 'ltr', 67, '567', '10 gm', 'per litter', 'Jeside', 'TRIOR Q', 18, 9),
(153, 'defg', 'Fertilizer', 'RT', 0.067, 'ltr', 67, '567', '10 gm', 'per acre', 'Milibug', 'BUILT', 18, 9),
(154, 'PEST', 'Pesticide', 'RT', 0.067, 'ltr', 67, '567', '10 gm', 'per acre', 'Jeside', 'MODERN I', 18, 9),
(155, 'qqqqq', 'Assets', '12', 34, 'ltr', 345, '344', '10gm', 'per acre', 'Thrips', 'infosys', 12, 9),
(156, 'qqqqq', 'Fungicide', 'wert', 1, 'kg', 67, '45', '10gm', 'per litter', 'Red Mites', 'infosys', 12, 9),
(157, 'yuuiii', 'Fungicide', '56', 0.056, 'ltr', 67, '78', '8gm', 'per acre', 'Jeside', 'fg', 12, 9),
(158, 'yuuiii', 'Fungicide', '56', 0.056, 'ltr', 67, '78', '8gm', 'per acre', 'Jeside', 'fg', 12, 9),
(159, 'yuuiii', 'Fungicide', '56', 0.056, 'ltr', 67, '78', '8gm', 'per acre', 'Jeside', 'fg', 12, 9),
(160, 's', 'Fertilizer', '56', 0.056, 'ltr', 67, '78', '8gm', 'per acre', 'Milibug', 'fg', 5, 9),
(161, 's', 'Fertilizer', '56', 0.056, 'ltr', 67, '78', '8gm', 'per acre', 'Milibug', 'fg', 5, 9),
(162, 's', 'Fertilizer', '56', 0.056, 'ltr', 67, '78', '8gm', 'per acre', 'Milibug', 'fg', 5, 9),
(163, 's', 'Fertilizer', '56', 0.056, 'ltr', 67, '78', '8gm', 'per acre', 'Milibug', 'fg', 5, 9),
(164, 'iii', 'Fungicide', '56', 56, 'ltr', 67, '78', '8gm', 'per litter', 'Jeside', 'fg', 12, 9),
(165, 'yyyyy', 'Growth Regulator', '56', 56, 'kg', 67, '78', '8gm', 'per acre', 'Powdery mildew', 'fg', 12, 9),
(166, 'yyyyy', 'Growth Regulator', '56', 56, 'kg', 67, '78', '8gm', 'per acre', 'Powdery mildew', 'fg', 12, 9),
(167, 'oxfo', 'Pesticide', '56', 10, 'kg', 67, '78', '8gm', 'per acre', 'Powdery mildew', 'fg', 5, 9),
(168, 'greengo', 'Fertilizer', '56', 10, 'kg', 67, '78', '8gm', 'per litter', 'Downy mildwe', 'fgg', 18, 9),
(169, 'joomla', 'Growth Regulator', '56', 5, 'kg', 67, '78', '8gm', 'per litter', 'Thrips', 'fgiii', 12, 9),
(170, 'Macc', 'Pesticide', 'ert', 100, 'kg', 67, '45', '10gm', 'per acre', 'Early bite', 'fgiii', 5, 21),
(171, 'Buldozzer', 'Assets', 'err', 3, 'kg', 45, '45', '10gm', 'per acre', 'Red Mites', 'fgg', 12, 21),
(172, 'greengo', 'Insecticide', 'err', 0.003, 'kg', 67, '45', '10gm', 'per litter', 'Red Mites', 'fgg', 18, 21),
(173, 'joomla', 'Fungicide', 'ert', 3, 'ltr', 67, '45', '10gm', 'per litter', 'Red Mites', 'fgg', 18, 21),
(174, 'oxfo', 'Fertilizer', 'err', 100, 'kg', 345, '45', '10gm', 'per acre', 'Early bite', 'fg', 18, 21),
(175, 'yuuiii', 'Growth Regulator', 'ert', 100, 'kg', 45, '45', '10gm', 'per acre', 'Red Mites', 'fgg', 20, 21),
(177, 'gggg', 'Growth Regulator', '56', 0.056, 'ltr', 67, '78', '8gm', 'per acre', 'Early bite', 'fg', 18, 21),
(178, 'kkkkk', 'Fertilizer', '56', 5, 'kg', 67, '78', '8gm', 'per litter', 'Red Mites', 'fgg', 20, 21),
(179, 'IIIIIIIIIIIIIIIIIIooooooooo', 'Insecticide', 'err', 0, '', 67, '45', '10gm', 'per acre', 'Early bite', 'fgg', 12, 9),
(180, 'astyyy', 'Insecticide', '23', 0, '', 67, '78', '8gm', 'per litter', 'Jeside', 'fgg', 12, 9),
(181, 'tttttttttttttttttt', 'Fungicide', '23', 0, '', 67, '78', '8gm', 'per acre', 'Milibug', 'fg', 18, 9),
(182, 'tttttttttttttttttt', 'Fungicide', '23', 0, '', 67, '78', '8gm', 'per acre', 'Milibug', 'fg', 18, 9),
(183, 'nnnnnnnnnnnn', 'Fertilizer', '56', 0, '', 67, '78', '8gm', 'per litter', 'Powdery mildew', 'fg', 12, 9),
(184, 'FFFFFFFGGGGG', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Powdery mildew', 'ggg', 12, 21),
(185, 'gggggggggg', 'Growth Regulator', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Thrips', 'ggg', 18, 21),
(186, 'Acrobat', 'Pesticide', 'ert', 0, '', 10, '89', '56', 'per acre', 'Early bite', 'ggg', 12, 22),
(187, 'Acro', 'Insecticide', 'er', 0, '', 56, '89', '56', 'per litter', 'Early bite', 'kkk', 5, 22),
(188, 'greengo', 'Fungicide', 'ert', 0, '', 56, '89', '56', 'per acre', 'Red Mites', 'ggg', 12, 22),
(190, 'yyyyyyyyyyyyyyyyyyyyyy', 'Growth Regulator', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Thrips', 'kkk', 12, 21),
(191, 'yyyyyyyyyyyyyyyyyyyyyy', 'Growth Regulator', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Thrips', 'kkk', 12, 21),
(192, 'yyyyyyyyyyyyyyyyyyyyyy', 'Growth Regulator', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Thrips', 'kkk', 12, 21),
(193, 'u', 'Insecticide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Powdery mildew', 'ggg', 5, 21),
(194, 'u', 'Insecticide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Powdery mildew', 'ggg', 5, 21),
(195, 'u', 'Insecticide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Powdery mildew', 'ggg', 5, 21),
(196, 'u', 'Insecticide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Powdery mildew', 'ggg', 5, 21),
(197, 'n', 'Fungicide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Thrips', 'kkk', 5, 21),
(198, 'k', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Milibug', 'kkk', 12, 21),
(199, 'u', 'Fungicide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Downy mildwe', 'ggg', 18, 21),
(200, 's', 'Insecticide', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Milibug', 'kkk', 18, 21),
(201, 'll', 'Fungicide', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Milibug', 'ggg', 5, 21),
(202, 'nn', 'Fungicide', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Powdery mildew', 'ggg', 5, 21),
(203, 'jjj', 'Fungicide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Jeside', 'kkk', 18, 21),
(204, 'aaaaaaaaa', 'Growth Regulator', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Jeside', ' Compahgny Name:', 18, 21),
(205, 'FFFFFFFGGGGGkkkk', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Milibug', 'ggg', 12, 21),
(206, 'kih', 'Insecticide', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Thrips', 'ggg', 18, 21),
(207, 'Acrooo', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Powdery mildew', 'kkk', 12, 21),
(208, 'no', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Powdery mildew', 'ggg', 20, 21),
(209, 'uuuuuuuuuuu', 'Fungicide', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Powdery mildew', 'kkk', 18, 21),
(210, 'uuuuuuuuuuu', 'Fungicide', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Powdery mildew', 'kkk', 18, 21),
(211, 'r', 'Insecticide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Early bite', 'kkk', 18, 21),
(212, 'iiiimmmm', 'Insecticide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Early bite', 'ggg', 18, 21),
(213, 'ytre', 'Fungicide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Thrips', 'kkk', 5, 21),
(214, 'FFFFFFFGGGGGjjjjjj', 'Fungicide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Powdery mildew', 'ggg', 5, 21),
(215, 'iiiiiiiiiitttttttttttttt', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Powdery mildew', 'kkk', 5, 21),
(216, 'uuuuuuuuuuukkkkkkkkkkk', 'Fungicide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Milibug', 'ggg', 12, 21),
(217, 'maccccccccccccccc', 'Growth Regulator', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Downy mildwe', 'ggg', 12, 21),
(218, 'iiiigggggg', 'Insecticide', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Thrips', 'ggg', 18, 21),
(219, 'FFFFFFFGGGGGyyyyyyyyyyy', 'Fungicide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Powdery mildew', 'ggg', 18, 21),
(220, 'rrrrrrrrrrrrrrrrrrrreeeeeeeeee', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Jeside', 'kkk', 18, 21),
(221, 'yutrtyu', 'Fungicide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Downy mildwe', ' Compahgny Nameii', 12, 21),
(222, '9iuytgfg', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Early bite', 'ggg', 12, 21),
(223, '9iuytgfg', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Early bite', 'ggg', 12, 21),
(224, 'ttttttttttttttttttt', 'Assets', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Jeside', 'ggg', 20, 21),
(225, 'eeeeeeeeeeeeeeeewwwwwwww', 'Fungicide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Powdery mildew', 'kkk', 12, 21),
(226, 'qqqqqqqqqqddddddddddd', 'Insecticide', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Thrips', 'ggg', 18, 21),
(227, 'resdsf', 'Fungicide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Powdery mildew', 'ggg', 5, 21),
(228, 'Acroj', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Milibug', 'ggg', 12, 21),
(229, 'yyyy33', 'Fungicide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Jeside', 'kkk', 18, 21),
(230, 'ggggggggggyyy', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'text', 'Thrips', 'ggg', 20, 21),
(231, 'iiiiyyyuuu', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Powdery mildew', 'ggg', 12, 21),
(232, 'ii8888', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Milibug', 'ggg', 18, 21),
(233, 'uu88', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Milibug', 'kkk', 12, 21),
(234, 'uu88', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Milibug', 'kkk', 12, 21),
(235, 'redfgg', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Powdery mildew', 'kkk', 20, 21),
(236, '777oo', 'Fungicide', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Thrips', 'ggg', 12, 21),
(237, 'ytrte', 'Fertilizer', 'e', 0, '', 56, '10', '10gm', 'per acre', 'Thrips', 'ggg', 12, 21),
(238, 'FFFFFFFGGGGGkkk', 'Insecticide', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Thrips', ' Compahgny Name:', 18, 21),
(239, 'FFFFFFFGGGGGkkk', 'Insecticide', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Thrips', ' Compahgny Name:', 18, 21),
(240, 'hhhhhhhhh', 'Insecticide', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Thrips', 'ggg', 12, 21),
(241, 'hhhhhhhhh', 'Insecticide', 'e', 0, '', 56, '10', '10gm', 'per litter', 'Thrips', 'ggg', 12, 21),
(242, 'YYYU', 'Insecticide', 'ERT', 0, '', 78, '5', '7', 'per acre', 'Thrips', 'INFOSYS', 12, 21),
(243, 'YYYUYT', 'Fertilizer', 'ERT', 0, '', 78, '5', '7', 'per litter', 'Powdery mildew', 'INFOSYS', 12, 21),
(244, 'YYYUUII', 'Growth Regulator', 'ERT', 0, '', 78, '5', '7', 'per litter', 'Red Mites', 'INFOSYS', 20, 21),
(245, 'YYYUYTmm', 'Fungicide', 'ERT', 0, '', 78, '5', '7', 'per acre', 'Thrips', 'INFOSYS', 12, 21),
(246, 'mmmmmm', 'Fertilizer', 'ERT', 0, '', 78, '5', '7', 'per acre', 'Powdery mildew', 'INFOSYS', 12, 21),
(247, 'SNEHA', 'Insecticide', 'ERT', 0, '', 78, '5', '7', 'per acre', 'Thrips', 'INFOSYS', 18, 21),
(248, 'SNEHA', 'Insecticide', 'ERT', 0, '', 78, '5', '7', 'per acre', 'Thrips', 'INFOSYS', 18, 21),
(249, 'dfgt', 'Fungicide', 'ERT', 0, '', 78, '5', '7', 'per acre', 'Powdery mildew', 'INFOSYS', 12, 21),
(250, 'hyioo', 'Growth Regulator', 'ERT', 0, '', 78, '5', '7', 'per litter', 'Milibug', 'INFOSYS', 18, 21),
(251, 'Tanu', 'Fungicide', 'ERT', 0, '', 78, '5', '7', 'per acre', 'Milibug', 'INFOSYS', 20, 21),
(252, '6yuiei', 'Fungicide', 'ERT', 0, '', 78, '5', '7', 'per acre', 'Milibug', 'INFOSYS', 12, 21),
(253, '7u', 'Fertilizer', 'ERT', 0, '', 78, '5', '7', 'per acre', 'Milibug', 'INFOSYS', 5, 21),
(254, 'potash', 'Pesticide', 'ty', 0, '', 67, '6', '5gm', 'per litter', 'Steam borer', 'in', 20, 21),
(255, 'Green-peas', 'Pesticide', 'ert', 0, '', 34, '3', '10gm', 'per litter', 'Milibug', 'in', 18, 21),
(279, 'fert1', 'Fertilizer', 'ert', 0, '', 45, '4', '5gm', 'per acre', 'Powdery mildew', 'info', 5, 23),
(282, 'dis1', 'Pesticide', 'ert', 0, '', 45, '4', '5gm', 'per litter', 'Downy mildwe', 'info', 5, 23),
(283, 'growth1', 'Growth Regulator', 'ert', 0, '', 45, '4', '10gm', 'text', 'Powdery mildew', 'info', 5, 23),
(299, 'hkll', 'Growth Regulator', '34', 0, '', 4, '3', '10gm', 'per acre', 'Thrips', 'UI', 12, 23),
(308, 'QQQQQQ', 'Pesticide', '34', 0, '', 4, '3', '10gm', 'per litter', 'Jeside', 'UI', 5, 23),
(309, 'gb', 'Fungicide', '34', 0, '', 4, '3', '4gm', 'per litter', 'Early bite', 'UI', 18, 23),
(310, 'gb', 'Fungicide', '34', 0, '', 4, '3', '4gm', 'per litter', 'Early bite', 'UI', 18, 23),
(311, 'QQQQ', 'Fungicide', '34', 0, '', 4, '3', '10gm', 'text', 'Milibug', 'UI', 18, 23),
(312, 'QQQQw', 'Fungicide', '34', 0, '', 4, '3', '4', 'per litter', 'Powdery mildew', 'UI', 5, 23),
(313, 'Vakhar', 'Insecticide', '34', 0, '', 4, '3', '4', 'per litter', 'Jeside', 'UI', 5, 23),
(314, 'chi', 'Fertilizer', '34', 0, '', 4, '3', '4', 'per acre', 'Jeside', 'UI', 12, 23),
(315, 'yyiiiiioo', 'Insecticide', '34', 0, '', 4, '3', '10gm', 'per acre', 'Jeside', 'UI', 5, 23),
(316, 'UUU', 'Insecticide', '34', 0, '', 4, '3', '4', 'per litter', 'Thrips', 'UI', 12, 23),
(317, 'UUU', 'Insecticide', '34', 0, '', 4, '3', '4', 'per litter', 'Thrips', 'UI', 12, 23),
(318, 'QQQQ', 'Fungicide', '34', 0, '', 4, '3', '4', 'per litter', 'Powdery mildew', 'UI', 12, 23),
(319, 'QQQQ', 'Insecticide', '34', 0, '', 4, '3', '4', 'per litter', 'Milibug', 'UI', 12, 23),
(320, 'QQQQ', 'Pesticide', '34', 0, '', 4, '3', '4gm', 'per litter', 'Thrips', 'UI', 12, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbljournal`
--

CREATE TABLE `tbljournal` (
  `jid` int(11) NOT NULL,
  `journal_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `toby` text NOT NULL,
  `particuler` text NOT NULL,
  `credit` text NOT NULL,
  `debit` text NOT NULL,
  `narration` varchar(30) NOT NULL,
  `tot_credit` int(11) NOT NULL,
  `tot_debit` int(11) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbljournal`
--

INSERT INTO `tbljournal` (`jid`, `journal_no`, `date`, `toby`, `particuler`, `credit`, `debit`, `narration`, `tot_credit`, `tot_debit`, `ses_id`) VALUES
(9, 6, '2021-01-07', 'By,To', 'shruti,shruti pramod amrutkar', '1,', ',1', 'a', 1, 1, 5),
(12, 10, '2021-01-04', 'By,To', 'shruti pramod amrutkar,shruti', '10,', ',10', 'a', 10, 10, 5),
(14, 3, '2021-01-17', 'To,By', 'harish more,harish more', ',70', '70,', 'aa', 70, 70, 9),
(15, 4, '2021-01-18', 'By,To', 'sairaj,harish more', '70,', ',70', 'a', 70, 70, 9),
(16, 4, '2021-01-18', 'By,To', 'sairaj,harish more', '70,', ',70', 'a', 70, 70, 9),
(17, 1, '2021-02-17', 'By,To', 'shruti,Cash', '70,', ',70', 'a', 70, 70, 18),
(18, 4, '2021-02-18', 'By,To', 'komal,sairaj', '89,', ',89', 'sw', 89, 89, 9),
(19, 5, '2021-02-24', 'By,To', 'sairaj,Rushali', '90,', ',90', 'asas', 90, 90, 9),
(20, 1, '2021-04-09', 'By,To', 'Hitesh,Nikita', '500,', ',500', 'a', 503, 500, 21),
(25, 1, '2021-05-03', 'By,To', 'Shrutika,Poorvi', '10,', ',10', 'a', 10, 10, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbll1`
--

CREATE TABLE `tbll1` (
  `id` int(11) NOT NULL,
  `under` varchar(30) NOT NULL,
  `open` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbll1`
--

INSERT INTO `tbll1` (`id`, `under`, `open`) VALUES
(1, 'Bank  account', 0),
(2, 'Purchase', 8990),
(3, 'sundry', 9000);

-- --------------------------------------------------------

--
-- Table structure for table `tbllang`
--

CREATE TABLE `tbllang` (
  `lid` int(11) NOT NULL,
  `lname` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllang`
--

INSERT INTO `tbllang` (`lid`, `lname`) VALUES
(1, 'मराठी');

-- --------------------------------------------------------

--
-- Table structure for table `tblled1`
--

CREATE TABLE `tblled1` (
  `id` int(11) NOT NULL,
  `mail_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblled1`
--

INSERT INTO `tblled1` (`id`, `mail_name`, `email`) VALUES
(1, 'shruti', 'shruti@gmail.com'),
(2, 'shreee', 's@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblledger`
--

CREATE TABLE `tblledger` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `under` varchar(30) NOT NULL,
  `perc_calc` int(11) NOT NULL,
  `mail_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `mno` bigint(20) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblledger`
--

INSERT INTO `tblledger` (`id`, `name`, `under`, `perc_calc`, `mail_name`, `email`, `address`, `mno`, `ses_id`, `work_id`) VALUES
(34, 'Shrutika', 'Current Liabilities', 5, 'Shrutika', 'asahu@gmail.com', 'Dhulea', 74995493033, 23, 0),
(35, 'Nikita', 'Bank Accounts', 5, 'Nikita Morankar', 'nikita@gmail.com', 'Pachora', 7499549307, 23, 0),
(36, 'Shree', 'cash in-hand  ', 0, 'Shree', 'shree@gmail.com', 'Nashik', 7499549303, 23, 0),
(37, 'Poorvi', 'Sundry Debitors', 0, 'Poorvi', 'p@gmail.com', 'Wadne', 7499549303, 23, 0),
(38, 'Twinkle', 'creditors', 0, 'samadhan patil', 's@gmail.com', 'Dhule', 7499549303, 23, 0),
(39, 'hdfc', 'Indirect Expense', 0, 'Shruti', 'ashu@gmail.com', 'Dhule', 7499549303, 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblled_bank`
--

CREATE TABLE `tblled_bank` (
  `aid` int(11) NOT NULL,
  `holder` varchar(30) NOT NULL,
  `acc_no` varchar(30) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `IFSC_CODE` text NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `ses_id` int(11) NOT NULL,
  `led_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblled_bank`
--

INSERT INTO `tblled_bank` (`aid`, `holder`, `acc_no`, `branch`, `name`, `IFSC_CODE`, `email`, `ses_id`, `led_id`) VALUES
(23, 'niki moranakr', '1234453456', 'Pachora', '', 'ifsc3234555', 'nikita@gmail.com', 23, 35);

-- --------------------------------------------------------

--
-- Table structure for table `tblliability`
--

CREATE TABLE `tblliability` (
  `lid` int(11) NOT NULL,
  `lib_name` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblliability`
--

INSERT INTO `tblliability` (`lid`, `lib_name`, `ses_id`) VALUES
(2, 'creditors', 0),
(3, 'Loans & other liabilities', 0),
(4, 'Duties and Taxes', 0),
(7, 'ssdfg', 5),
(9, 'a', 9),
(10, 'as', 9),
(11, 'a', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tblmachine`
--

CREATE TABLE `tblmachine` (
  `mid` int(11) NOT NULL,
  `machine_name` varchar(30) NOT NULL,
  `manufacturer` varchar(30) NOT NULL,
  `model_no` text NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmachine`
--

INSERT INTO `tblmachine` (`mid`, `machine_name`, `manufacturer`, `model_no`, `ses_id`) VALUES
(15, 'CVBN1', 'vrushabh more', '2147483647', 0),
(24, 'kubota', 'kubota', 'b1345', 5),
(32, 'kubota', 'as', '7499549303', 18),
(33, 'CVBN', 'asxd', 'BS49954930', 18),
(34, 'Kubota', 'Harish more', 'BS2345566', 9),
(35, 'JCB', 'Vrushabh More', 'BH12345', 9),
(37, 'azs', 'sdxcfg', '1q23456', 20),
(38, 'kubota', 'Sharad', '7499549303', 21),
(40, 'Liaa', 'Sharad', 'BH7499549303', 21),
(41, 'Kubota', 'Vrushabh more', 'BHR1234', 22),
(42, 'Liii', 'Harish More', 'JKL456', 22),
(44, 'ads', '345', '12345678', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tblmejorgrp`
--

CREATE TABLE `tblmejorgrp` (
  `grp_id` int(11) NOT NULL,
  `grp_name` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmejorgrp`
--

INSERT INTO `tblmejorgrp` (`grp_id`, `grp_name`, `ses_id`) VALUES
(1, 'Current Assets', 0),
(2, 'Current Liabilities', 0),
(3, 'Direct Expense', 0),
(4, 'Indirect Expense', 0),
(5, 'Purchase', 0),
(6, 'Sales Account', 0),
(7, 'Fixed  Assets', 0),
(8, 'Investment', 0),
(14, 'account', 18),
(15, 'a', 9),
(16, 'a7', 9),
(17, 'a', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tblmultitem`
--

CREATE TABLE `tblmultitem` (
  `multi_id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `supplier` varchar(30) NOT NULL,
  `payment_mode` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmultitem`
--

INSERT INTO `tblmultitem` (`multi_id`, `bill_no`, `date`, `supplier`, `payment_mode`, `ses_id`, `status`) VALUES
(1, 1, '2021-03-23', 'Cash', 'cash', 9, 0),
(2, 2, '2021-03-31', 'Navneet', 'credit', 9, 0),
(6, 4, '2021-03-30', 'Cash', 'cash', 9, 0),
(7, 5, '2021-03-23', 'Navneet', 'cash', 9, 0),
(8, 2, '2021-03-28', 'Navneet', 'credit', 9, 0),
(26, 56, '2021-03-23', 'Navneet', 'credit', 9, 0),
(28, 890, '2021-03-29', 'aaaa', 'credit', 9, 0),
(29, 18, '2021-04-22', 'Cash', 'cash', 9, 0),
(40, 2, '2021-04-20', 'shruti', 'cash', 9, 0),
(41, 1, '2021-04-14', 'shruti', 'credit', 9, 0),
(43, 1, '2021-04-23', 'Nikita', 'cash', 21, 0),
(44, 2, '2021-04-13', 'Hitesh', 'credit', 21, 0),
(47, 3, '2021-04-21', 'Shruti', 'credit', 21, 0),
(48, 3, '2021-04-28', 'Pradhunya', 'credit', 21, 0),
(49, 5, '2021-04-15', 'Hitesh', 'cash', 21, 0),
(50, 6, '2021-04-22', 'Pradhunya', 'cash', 21, 0),
(51, 7, '2021-04-23', 'Hitesh', 'cash', 21, 0),
(53, 2, '2021-04-22', 'Shraddha', 'credit', 22, 0),
(54, 8, '2021-04-22', 'Shruti', 'cash', 22, 0),
(56, 9, '2021-04-09', 'Shruti', 'cash', 22, 0),
(57, 1, '2021-04-16', 'Shruti', 'cash', 21, 0),
(58, 11, '2021-04-30', 'Pradhunya', 'cash', 21, 0),
(59, 2, '2021-04-21', 'Hitesh', 'credit', 21, 0),
(60, 55, '2021-04-22', 'Nikita', 'cash', 21, 0),
(63, 5, '2021-04-27', 'Hitesh', 'credit', 21, 0),
(64, 3, '2021-04-27', 'Shruti', 'cash', 21, 0),
(65, 4, '2021-04-30', 'Shruti', 'cash', 21, 0),
(66, 4, '2021-04-30', 'Shruti', 'cash', 21, 0),
(67, 4, '2021-04-30', 'Shruti', 'cash', 21, 0),
(68, 4, '2021-04-28', 'Hitesh', 'cash', 21, 0),
(69, 4, '2021-04-21', 'Hitesh', 'cash', 21, 0),
(70, 5, '2021-04-30', 'Hitesh', 'cash', 21, 0),
(71, 44, '2021-04-19', 'Hitesh', 'cash', 21, 0),
(72, 4, '2021-04-20', 'Shruti', 'credit', 21, 0),
(73, 2, '2021-05-05', 'Shruti', 'cash', 21, 0),
(74, 3, '2021-04-28', 'Shruti', 'credit', 21, 0),
(75, 3, '2021-04-28', 'Shruti', 'credit', 21, 0),
(76, 3, '2021-04-30', 'Shruti', 'credit', 21, 0),
(78, 101, '2021-04-17', 'Hitesh', 'credit', 21, 0),
(79, 102, '2021-04-15', 'Hitesh', 'credit', 21, 0),
(81, 3456, '2021-04-29', 'Hitesh', 'cash', 21, 0),
(82, 34564, '2021-04-29', 'Mahi', 'cash', 21, 0),
(83, 67888, '2021-04-23', 'Hitesh', 'cash', 21, 0),
(84, 67888, '2021-04-23', 'Hitesh', 'cash', 21, 0),
(85, 4, '2021-04-28', 'Mahi', 'cash', 21, 0),
(86, 4, '2021-04-28', 'Mahi', 'cash', 21, 0),
(87, 4, '2021-04-28', 'Mahi', 'cash', 21, 0),
(88, 4, '2021-04-30', 'Mahi', 'cash', 21, 0),
(89, 345667, '2021-05-01', 'Mahi', 'credit', 21, 0),
(90, 3456, '2021-04-28', 'Mahi', 'cash', 21, 0),
(91, 4, '2021-04-22', 'Virat', 'credit', 21, 0),
(92, 4, '2021-05-07', 'Mahi', 'credit', 21, 0),
(93, 34564, '2021-04-28', 'Virat', 'credit', 21, 0),
(94, 3456, '2021-04-29', 'Hitesh', 'credit', 21, 0),
(95, 34564, '2021-05-08', 'Shruti', 'cash', 21, 0),
(96, 4, '2021-04-28', 'Mahi', 'cash', 21, 0),
(97, 4, '2021-05-07', 'Mahi', 'cash', 21, 0),
(98, 4, '2021-04-17', 'Virat', 'credit', 21, 0),
(99, 4, '2021-04-17', 'Virat', 'credit', 21, 0),
(100, 3456, '2021-04-13', 'Hitesh', 'credit', 21, 0),
(101, 3456, '2021-04-29', 'Mahi', 'cash', 21, 0),
(102, 78, '2021-04-23', 'Virat', 'credit', 21, 0),
(103, 4, '2021-05-06', 'Hitesh', 'credit', 21, 0),
(104, 3456, '2021-04-22', 'Mahi', 'cash', 21, 0),
(105, 3456, '2021-04-13', 'Mahi', 'cash', 21, 0),
(106, 4, '2021-04-28', 'Mahi', 'credit', 21, 0),
(107, 67888, '2021-04-29', 'Rohit ', 'credit', 21, 0),
(108, 3456, '2021-04-22', 'Virat', 'credit', 21, 0),
(109, 67888, '2021-04-22', 'Virat', 'credit', 21, 0),
(110, 3456, '2021-05-06', 'Mahi', 'credit', 21, 0),
(111, 345667, '2021-04-29', 'Mahi', 'credit', 21, 0),
(112, 34564, '2021-04-09', 'Hitesh', 'credit', 21, 0),
(113, 4, '2021-04-23', 'Mahi', 'credit', 21, 0),
(114, 67888, '2021-04-30', 'Rohit ', 'credit', 21, 0),
(115, 4, '2021-04-22', 'Mahi', 'cash', 21, 0),
(116, 67888, '2021-05-05', 'Virat', 'cash', 21, 0),
(117, 67888, '2021-04-24', 'Mahi', 'cash', 21, 0),
(118, 3456, '2021-04-21', 'Rohit ', 'credit', 21, 0),
(119, 67888, '2021-04-30', 'Mahi', 'cash', 21, 0),
(120, 34564, '2021-04-29', 'Mahi', 'credit', 21, 0),
(121, 4, '2021-04-28', 'Virat', 'cash', 21, 0),
(122, 34564, '2021-04-29', 'Virat', 'cash', 21, 0),
(123, 3456, '2021-04-28', 'Mahi', 'credit', 21, 0),
(124, 345667, '2021-04-28', 'Mahi', 'cash', 21, 0),
(125, 4, '2021-04-21', 'Virat', 'cash', 21, 0),
(126, 4, '2021-04-28', 'Hitesh', 'cash', 21, 0),
(127, 4, '2021-04-23', 'Shruti', 'cash', 21, 0),
(128, 3456, '2021-04-24', 'Hitesh', 'credit', 21, 0),
(129, 3456, '2021-05-06', 'Mahi', 'credit', 21, 0),
(131, 34564, '2021-04-28', 'Virat', 'credit', 21, 0),
(132, 4, '2021-04-09', 'Hitesh', 'credit', 21, 0),
(133, 3456, '2021-04-22', 'Mahi', 'cash', 21, 0),
(134, 67888, '2021-04-21', 'Shruti', 'cash', 21, 0),
(135, 3456, '2021-04-28', 'Hitesh', 'cash', 21, 0),
(136, 4, '2021-04-22', 'Hitesh', 'cash', 21, 0),
(137, 3456, '2021-04-20', 'Hitesh', 'cash', 21, 0),
(138, 3456, '2021-04-20', 'Hitesh', 'cash', 21, 0),
(139, 3456, '2021-04-24', 'Hitesh', 'cash', 21, 0),
(140, 4, '2021-04-24', 'Rohit ', 'credit', 21, 0),
(141, 34564, '2021-05-05', 'Hitesh', 'cash', 21, 0),
(142, 3456, '2021-04-29', 'Virat', 'cash', 21, 0),
(143, 4, '2021-04-12', 'Mahi', 'credit', 21, 0),
(144, 4, '2021-04-30', 'Virat', 'cash', 21, 0),
(145, 4, '2021-04-30', 'Hitesh', 'cash', 21, 0),
(146, 3456, '2021-04-15', 'Shruti', 'credit', 21, 0),
(147, 4, '2021-04-29', 'Virat', 'credit', 21, 0),
(148, 4, '2021-04-24', 'Shruti', 'credit', 21, 0),
(149, 3456, '2021-04-10', 'Mahi', 'cash', 21, 0),
(150, 4, '2021-04-27', 'Hitesh', 'cash', 21, 0),
(151, 3456, '2021-04-23', 'Mahi', 'cash', 21, 0),
(152, 3456, '2021-04-14', 'Hitesh', 'cash', 21, 0),
(153, 3456, '2021-04-17', 'Mahi', 'cash', 21, 0),
(154, 4, '2021-04-29', 'Hitesh', 'credit', 21, 0),
(155, 3456, '2021-05-05', 'Hitesh', 'cash', 21, 0),
(156, 4, '2021-04-29', 'Virat', 'cash', 21, 0),
(158, 7, '2021-04-14', 'Hitesh', 'cash', 21, 0),
(159, 1, '2021-04-21', 'Mahi', 'cash', 21, 0),
(182, 11, '2021-04-22', 'Mahi', 'credit', 21, 0),
(197, 5, '2021-05-29', 'Niki', 'credit', 23, 0),
(208, 5, '2021-05-11', 'Nikita', 'cash', 23, 0),
(232, 1, '2021-05-26', 'Nikita', 'credit', 23, 0),
(241, 5, '2021-06-16', 'Shree', 'credit', 23, 0),
(255, 5, '2021-06-18', 'Poorvi', 'credit', 23, 0),
(285, 1, '2021-06-29', 'Shree', 'cash', 23, 0),
(286, 2, '2021-06-18', 'Shree', 'credit', 23, 0),
(287, 8, '2021-06-30', 'Shree', 'credit', 23, 0),
(288, 5, '2021-07-06', 'Nikita', 'credit', 23, 0),
(289, 2, '2021-07-07', 'Poorvi', 'cash', 23, 0),
(290, 2, '2021-06-30', 'Poorvi', 'credit', 23, 0),
(291, 2, '2021-07-05', 'Poorvi', 'cash', 23, 0),
(292, 5, '2021-06-29', 'Poorvi', 'cash', 23, 0),
(293, 8, '2021-06-23', 'Shree', 'credit', 23, 0),
(294, 8, '2021-07-01', 'Poorvi', 'cash', 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblno_nozzle`
--

CREATE TABLE `tblno_nozzle` (
  `nozzle_id` int(11) NOT NULL,
  `no_of_nozzle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblno_nozzle`
--

INSERT INTO `tblno_nozzle` (`nozzle_id`, `no_of_nozzle`) VALUES
(1, 3),
(2, 4),
(3, 5),
(4, 6),
(5, 7),
(6, 8),
(7, 9),
(8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tblntype`
--

CREATE TABLE `tblntype` (
  `nid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `name_of_sprayer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblntype`
--

INSERT INTO `tblntype` (`nid`, `sid`, `name_of_sprayer`) VALUES
(1, 1, 'dragone'),
(2, 1, 'cafini'),
(3, 1, 'mitra'),
(4, 1, 'agrofab'),
(5, 1, 'navyug'),
(6, 1, 'local'),
(7, 2, 'cima'),
(8, 2, 'martigni'),
(9, 3, 'ess');

-- --------------------------------------------------------

--
-- Table structure for table `tblother`
--

CREATE TABLE `tblother` (
  `oid` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `duration` int(11) NOT NULL,
  `work_desc` text NOT NULL,
  `day_after_prunning` int(11) NOT NULL,
  `work` text NOT NULL,
  `wages` text NOT NULL,
  `tot_wages` int(11) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblother`
--

INSERT INTO `tblother` (`oid`, `plot_no`, `pname`, `date`, `stime`, `etime`, `duration`, `work_desc`, `day_after_prunning`, `work`, `wages`, `tot_wages`, `ses_id`, `status`) VALUES
(27, 45, 'ASDSSSS', '2021-03-02', '04:38:00', '19:41:00', 15, '', 0, 'shruti,rushali', '8,8', 16, 9, 0),
(35, 1, 'Nashik', '2021-04-28', '13:25:00', '23:25:00', 10, 'This work releated to prunning', 8, 'Shruti', '', 5, 21, 0),
(36, 1, 'Nashik', '2021-04-27', '20:23:00', '20:24:00', 0, 'a', -2, 'Shruti', '5', 5, 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblp1`
--

CREATE TABLE `tblp1` (
  `id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `supplier` varchar(30) NOT NULL,
  `payment_mode` varchar(30) NOT NULL,
  `item_name` varchar(40) NOT NULL,
  `purchase_rate` int(11) NOT NULL,
  `act_qty` float NOT NULL,
  `qty` float NOT NULL,
  `reduce_qty` float NOT NULL,
  `unit` varchar(30) NOT NULL,
  `act_unit` varchar(30) NOT NULL,
  `exp_date` date DEFAULT NULL,
  `NOF` int(11) NOT NULL,
  `batch_no` int(11) NOT NULL,
  `tot_amount` int(11) NOT NULL,
  `GST` float NOT NULL,
  `SGST` float NOT NULL,
  `CGST` float NOT NULL,
  `PHI` int(11) NOT NULL,
  `disease` varchar(30) NOT NULL,
  `item_type` varchar(30) NOT NULL,
  `dose` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `multi_id` int(11) NOT NULL,
  `record_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblp1`
--

INSERT INTO `tblp1` (`id`, `bill_no`, `date`, `supplier`, `payment_mode`, `item_name`, `purchase_rate`, `act_qty`, `qty`, `reduce_qty`, `unit`, `act_unit`, `exp_date`, `NOF`, `batch_no`, `tot_amount`, `GST`, `SGST`, `CGST`, `PHI`, `disease`, `item_type`, `dose`, `ses_id`, `status`, `multi_id`, `record_status`) VALUES
(385, 1234, '2021-02-19', 'Navneet', 'cash', 'Nisco', 678, 1000, 1, 1, 'kg', 'g', '2021-02-25', 67, 7, 0, 18, 4088.34, 4088.34, 45, 'Early bite', 'Insecticide', '', 9, 0, 8, 1),
(386, 7, '2021-02-22', 'komal', 'credit', 'qqqqq', 678, 8, 0.008, 0.008, 'ltr', 'ml', '2021-02-20', 67, 7, 0, 12, 2725.56, 2725.56, 345, '', '', '', 9, 0, 1, 1),
(387, 7, '2021-02-26', 'komal', 'credit', 'PEST', 678, 8, 8, 0.4084, 'ltr', 'ltr', '2021-02-16', 67, 7, 0, 18, 4088.34, 4088.34, 67, 'Jeside', 'Pesticide', '', 9, 0, 2, 1),
(398, 4, '2021-03-30', 'Cash', 'cash', 'Acrobat', 1, 100, 0.1, 0.1, 'kg', 'g', '2021-03-16', 3, 3, 0, 12, 0.18, 0.18, 45, 'Early bite', 'Pesticide', '', 9, 0, 6, 1),
(399, 4, '2021-03-30', 'Cash', 'cash', 'FERT', 289, 3, 0.003, 0.003, 'ltr', 'ml', '2021-03-21', 3, 3, 0, 20, 86.7, 86.7, 45, '', '', '', 9, 0, 6, 1),
(400, 5, '2021-03-23', 'Cash', 'credit', 'FERT', 289, 3, 0.003, 0.003, 'ltr', 'ml', '2021-03-29', 3, 3, 0, 20, 86.7, 86.7, 45, 'Thrips', 'Fertilizer', '', 9, 0, 7, 1),
(422, 56, '2021-03-23', 'Navneet', 'credit', 'FERT', 4567, 100, 0.1, 0.1, 'ltr', 'ml', '2021-03-22', 30, 38, 0, 20, 13701, 13701, 45, 'Thrips', 'Fertilizer', '', 9, 0, 26, 1),
(423, 56, '2021-03-23', 'Navneet', 'credit', 'FFF', 4567, 100, 100, 0.0029, 'ltr', 'ltr', '2021-03-16', 3, 3, 0, 18, 1233.09, 1233.09, 45, 'Jeside', 'Fungicide', '', 9, 0, 26, 1),
(425, 890, '2021-03-29', 'aaaa', 'credit', 'Acrobat', 4567, 3, 0.003, 0.003, 'kg', 'g', '2021-03-01', 3, 3, 0, 12, 822.06, 822.06, 45, 'Early bite', 'Pesticide', '', 9, 0, 28, 1),
(429, 890, '2021-03-29', 'aaaa', 'credit', 'FFF', 45678000, 3000, 3, 3, 'ltr', 'ml', '2021-03-10', 30, 38, 0, 18, 123331, 123331, 45, 'Jeside', 'Fungicide', '', 9, 0, 28, 1),
(430, 890, '2021-03-29', 'aaaa', 'credit', 'PEST', 4567, 3, 0.003, 0.003, 'ltr', 'ml', '2021-03-21', 3, 38, 0, 18, 1370.1, 1370.1, 67, 'Jeside', 'Pesticide', '', 9, 0, 28, 1),
(431, 890, '2021-03-29', 'aaaa', 'credit', 'yuuiii', 45, 300, 0.3, 0.091, 'ltr', 'ml', '2021-03-30', 309, 38, 0, 12, 1390.5, 1390.5, 67, 'Jeside', 'Fungicide', '', 9, 0, 28, 1),
(432, 890, '2021-03-29', 'aaaa', 'credit', 'qqqqq', 45, 100, 0.1, 0.1, 'ltr', 'ml', '2021-03-30', 309, 38, 0, 12, 834.3, 834.3, 345, 'Thrips', 'Assets', '', 9, 0, 28, 1),
(433, 18, '2021-04-22', 'Cash', 'cash', 'oxfo', 100, 3, 3, 0.5, 'kg', 'kg', '2021-05-01', 3, 3, 0, 5, 7.5, 7.5, 67, 'Powdery mildew', 'Pesticide', '', 9, 0, 29, 1),
(434, 18, '2021-04-22', 'Cash', 'cash', 'greengo', 3000, 5, 5, 2, 'ltr', 'ltr', '2021-04-19', 309, 3, 0, 18, 83430, 83430, 67, 'Downy mildwe', 'Fertilizer', '', 9, 0, 29, 1),
(435, 18, '2021-04-22', 'Cash', 'cash', 'joomla', 4567, 2, 2, 7.003, 'kg', 'kg', '2021-03-30', 3, 3, 0, 12, 822.06, 822.06, 67, 'Thrips', 'Growth Regulator', '', 9, 0, 29, 1),
(450, 1, '2021-04-23', 'Nikita', 'cash', 'FFFFFFFGGGGG', 5000, 2, 2, 2, 'ltr', 'ltr', '2021-04-22', 6, 4, 0, 12, 1800, 1800, 56, 'Powdery mildew', 'Fertilizer', '', 21, 0, 43, 1),
(451, 2, '2021-04-13', 'Hitesh', 'credit', 'gggggggggg', 5000, 2, 2, 2, 'ltr', 'ltr', '2021-04-15', 6, 4, 0, 18, 2700, 2700, 56, 'Thrips', 'Growth Regulator', '', 21, 0, 44, 1),
(453, 3, '2021-04-21', 'Shruti', 'credit', 'Buldozzer', 5000, 2, 2, 2, 'ltr', 'ltr', '2021-04-12', 6, 4, 0, 12, 1800, 1800, 45, 'Red Mites', 'Assets', '', 21, 0, 47, 1),
(454, 3, '2021-04-28', 'Pradhunya', 'credit', 'Buldozzer', 5000, 2, 2, 2, 'ltr', 'ltr', '2021-04-21', 6, 4, 0, 12, 1800, 1800, 45, 'Red Mites', 'Assets', '', 21, 0, 48, 1),
(456, 6, '2021-04-22', 'Pradhunya', 'cash', 'joomla', 5000, 2, 2, 7.003, 'ltr', 'ltr', '2021-04-16', 6, 4, 0, 18, 2700, 2700, 22, 'Red Mites', 'Fungicide', '', 21, 0, 50, 1),
(457, 7, '2021-04-23', 'Hitesh', 'cash', 'oxfo', 100, 500, 0.5, 0.5, 'kg', 'g', '0000-00-00', 6, 4, 0, 18, 54, 54, 345, 'Early bite', 'Fertilizer', '', 21, 0, 51, 1),
(459, 1, '2021-04-21', 'Shruti', 'cash', 'Acrobat', 100, 5, 5, 5, 'kg', 'kg', '2021-04-21', 2, 4, 0, 12, 12, 12, 10, 'Early bite', 'Pesticide', '', 22, 0, 53, 1),
(460, 1, '2021-04-21', 'Shruti', 'cash', 'Acrobat', 100, 5, 5, 5, 'kg', 'kg', '2021-04-21', 2, 4, 0, 12, 12, 12, 10, 'Early bite', 'Pesticide', '', 22, 0, 53, 1),
(461, 2, '2021-04-22', 'Shraddha', 'credit', 'greengo', 200, 2, 2, 2, 'kg', 'kg', '2021-04-14', 6, 48, 0, 12, 72, 72, 56, 'Red Mites', 'Fungicide', '', 22, 0, 53, 1),
(463, 8, '2021-04-22', 'Shruti', 'cash', 'Acrobat', 5000, 2, 0.002, 0.002, 'kg', 'g', '2021-04-07', 6, 4, 0, 12, 1800, 1800, 10, 'Early bite', 'Pesticide', '', 22, 0, 54, 1),
(464, 9, '2021-04-09', 'Shruti', 'cash', 'greengo', 100, 2, 0.002, 2, 'kg', 'g', '2021-04-14', 6, 48, 0, 12, 36, 36, 56, 'Red Mites', 'Fungicide', '', 22, 0, 56, 1),
(465, 11, '2021-04-30', 'Pradhunya', 'cash', 'Buldozzer', 5000, 2, 2, 2, 'ltr', 'ltr', '2021-04-29', 2, 4, 0, 12, 600, 600, 45, 'Red Mites', 'Assets', '', 21, 0, 58, 1),
(466, 11, '2021-04-30', 'Pradhunya', 'cash', 'greengo', 5000, 2, 2, 2, 'ltr', 'ltr', '2021-04-12', 2, 4, 0, 18, 900, 900, 67, 'Red Mites', 'Insecticide', '', 21, 0, 58, 1),
(467, 2, '2021-04-21', 'Hitesh', 'credit', 'Macc', 5000, 2, 0.002, 0.0015, 'kg', 'g', '2021-04-14', 6, 4, 0, 5, 750, 750, 67, 'Early bite', 'Pesticide', '', 21, 0, 59, 1),
(468, 2, '2021-04-21', 'Hitesh', 'credit', 'oxfo', 5000, 2, 0, 0.5, '', '', '2021-04-21', 2, 4, 0, 18, 2700, 2700, 345, 'Early bite', 'Fertilizer', '', 21, 0, 59, 1),
(469, 55, '2021-04-22', 'Nikita', 'cash', 'Macc', 100, 2, 2, 0.0015, 'ltr', 'ltr', '2021-04-21', 2, 2, 0, 5, 5, 5, 67, 'Early bite', 'Pesticide', '', 21, 0, 60, 1),
(470, 55, '2021-04-22', 'Nikita', 'cash', 'greengo', 100, 2, 2, 2, 'ltr', 'ltr', '2021-04-12', 3, 48, 0, 18, 27, 27, 67, 'Red Mites', 'Insecticide', '', 21, 0, 60, 1),
(471, 55, '2021-04-22', 'Nikita', 'cash', 'Buldozzer', 5000, 5, 0, 0, '', '', '2021-04-28', 6, 4, 0, 12, 1800, 1800, 45, 'Red Mites', 'Assets', '', 21, 0, 60, 1),
(473, 5, '2021-04-27', 'Hitesh', 'credit', 'FFFFFFFGGGGGyyyyyyyyyyy', 5000, 2, 0.002, 0.007, 'ltr', 'ml', '2021-04-21', 6, 4, 0, 18, 2700, 2700, 56, 'Powdery mildew', 'Fungicide', '', 21, 0, 63, 1),
(474, 3, '2021-04-27', 'Shruti', 'cash', 'FFFFFFFGGGGGyyyyyyyyyyy', 100, 2, 0.002, 0.007, 'ltr', 'ml', '2021-04-20', 6, 4, 0, 18, 54, 54, 56, 'Powdery mildew', 'Fungicide', '', 21, 0, 64, 1),
(475, 4, '2021-04-30', 'Shruti', 'cash', 'jjj', 100, 5, 0.005, 0.005, 'kg', 'g', '2021-04-13', 6, 4, 0, 18, 54, 54, 56, 'Jeside', 'Fungicide', '', 21, 0, 65, 1),
(476, 4, '2021-04-30', 'Shruti', 'cash', 'jjj', 100, 5, 0.005, 0.005, 'kg', 'g', '2021-04-13', 6, 4, 0, 18, 54, 54, 56, 'Jeside', 'Fungicide', '', 21, 0, 66, 1),
(477, 4, '2021-04-30', 'Shruti', 'cash', 'jjj', 100, 5, 0.005, 0.005, 'kg', 'g', '2021-04-13', 6, 4, 0, 18, 54, 54, 56, 'Jeside', 'Fungicide', '', 21, 0, 67, 1),
(478, 4, '2021-04-28', 'Hitesh', 'cash', 'iiiigggggg', 5000, 2, 0.002, 0.002, 'kg', 'g', '2021-04-12', 6, 4, 0, 18, 2700, 2700, 56, 'Thrips', 'Insecticide', '', 21, 0, 68, 1),
(479, 5, '2021-04-30', 'Hitesh', 'cash', 'uuuuuuuuuuukkkkkkkkkkk', 5000, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-05', 6, 4, 0, 12, 1800, 1800, 56, 'Milibug', 'Fungicide', '', 21, 0, 70, 1),
(480, 44, '2021-04-19', 'Hitesh', 'cash', 'Acroj', 5000, 2, 2, 1.7, 'kg', 'kg', '2021-04-13', 6, 4, 0, 12, 1800, 1800, 56, 'Milibug', 'Fertilizer', '', 21, 0, 71, 1),
(481, 4, '2021-04-20', 'Shruti', 'credit', 'no', 5000, 2, 0.002, 0, 'kg', 'g', '2021-04-20', 6, 4, 0, 20, 3000, 3000, 56, 'Powdery mildew', 'Fertilizer', '', 21, 0, 72, 1),
(482, 2, '2021-05-05', 'Shruti', 'cash', 'ggggggggggyyy', 5000, 2, 2, 2, 'kg', 'kg', '2021-04-27', 6, 4, 0, 20, 3000, 3000, 56, 'Thrips', 'Fertilizer', '', 21, 0, 73, 1),
(483, 3, '2021-04-28', 'Shruti', 'credit', 'aaaaaaaaa', 5000, 2, 0.002, 0.0015, 'ltr', 'ml', '2021-04-06', 2, 4, 0, 18, 900, 900, 56, 'Jeside', 'Growth Regulator', '', 21, 0, 74, 1),
(484, 3, '2021-04-28', 'Shruti', 'credit', 'aaaaaaaaa', 5000, 2, 0.002, 0.0015, 'ltr', 'ml', '2021-04-06', 2, 4, 0, 18, 900, 900, 56, 'Jeside', 'Growth Regulator', '', 21, 0, 75, 1),
(485, 3, '2021-04-30', 'Shruti', 'credit', 'maccccccccccccccc', 5000, 2, 0.002, 0.002, 'kg', 'g', '2021-04-27', 6, 4, 0, 12, 1800, 1800, 56, 'Downy mildwe', 'Growth Regulator', '', 21, 0, 76, 1),
(487, 101, '2021-04-17', 'Hitesh', 'credit', '777oo', 5000, 5, 0, 0, '', '', '2021-04-21', 2, 4, 0, 12, 600, 600, 56, 'Thrips', 'Fungicide', '', 21, 0, 78, 1),
(488, 101, '2021-04-17', 'Hitesh', 'credit', 'greengo', 5000, 2, 0.002, 2, 'kg', 'g', '2021-04-21', 6, 48, 0, 18, 2700, 2700, 67, 'Red Mites', 'Insecticide', '', 21, 0, 78, 1),
(489, 101, '2021-04-17', 'Hitesh', 'credit', 'greengo', 5000, 2, 0.002, 2, 'kg', 'g', '2021-04-21', 6, 48, 30000, 18, 2700, 2700, 67, 'Red Mites', 'Insecticide', '', 21, 0, 78, 1),
(490, 102, '2021-04-15', 'Hitesh', 'credit', 'gggg', 300, 5, 0.005, 0.001, 'kg', 'g', '2021-04-21', 3, 234, 900, 18, 36, 36, 67, 'Early bite', 'Growth Regulator', '', 21, 0, 79, 1),
(491, 102, '2021-04-15', 'Hitesh', 'credit', 'joomla', 200, 2, 0.002, 7.003, 'ltr', 'ml', '2021-04-27', 3, 132, 600, 18, 54, 54, 67, 'Red Mites', 'Fungicide', '', 21, 0, 79, 1),
(494, 3456, '2021-04-29', 'Hitesh', 'cash', 'greengo', 200, 2, 0.002, 2, 'kg', 'g', '2021-04-14', 2, 42, 400, 18, 36, 36, 67, 'Red Mites', 'Insecticide', '', 21, 0, 81, 1),
(495, 4, '2021-04-30', 'Mahi', 'cash', 'yutrtyu', 200, 2, 0.002, 0.002, 'kg', 'g', '2021-04-13', 2, 1, 400, 12, 24, 24, 56, 'Downy mildwe', 'Fungicide', '', 21, 0, 88, 1),
(496, 345667, '2021-05-01', 'Mahi', 'credit', 'ytre', 200, 2, 2, 7.009, 'ltr', 'ltr', '2021-04-27', 2, 42, 400, 5, 10, 10, 56, 'Thrips', 'Fungicide', '', 21, 0, 89, 1),
(497, 3456, '2021-04-28', 'Mahi', 'cash', 'r', 200, 2, 0.002, 0.002, 'kg', 'g', '2021-04-14', 2, 42, 400, 18, 36, 36, 56, 'Early bite', 'Insecticide', '', 21, 0, 90, 1),
(498, 4, '2021-05-07', 'Mahi', 'credit', 'YYYUYT', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-27', 2, 42, 400, 12, 24, 24, 78, 'Powdery mildew', 'Fertilizer', '', 21, 0, 92, 1),
(499, 34564, '2021-04-28', 'Virat', 'credit', 'redfgg', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-28', 2, 42, 400, 20, 40, 40, 56, 'Powdery mildew', 'Fertilizer', '', 21, 0, 93, 1),
(500, 3456, '2021-04-29', 'Hitesh', 'credit', 'ii8888', 200, 2, 0.002, 0.002, 'kg', 'g', '2021-04-27', 2, 42, 400, 18, 36, 36, 56, 'Milibug', 'Fertilizer', '', 21, 0, 94, 1),
(501, 4, '2021-04-28', 'Mahi', 'cash', 'yyyyyyyyyyyyyyyyyyyyyy', 200, 2, 2, 2, 'ltr', 'ltr', '2021-04-21', 2, 42, 400, 12, 24, 24, 56, 'Thrips', 'Growth Regulator', '', 21, 0, 96, 1),
(502, 4, '2021-05-07', 'Mahi', 'cash', 'yuuiii', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-20', 2, 42, 400, 20, 40, 40, 45, 'Red Mites', 'Growth Regulator', '', 21, 0, 97, 1),
(503, 4, '2021-04-17', 'Virat', 'credit', 'YYYUUII', 200, 2, 2, 0, 'ltr', 'ltr', '2021-04-20', 2, 42, 400, 20, 40, 40, 78, 'Red Mites', 'Growth Regulator', '', 21, 0, 98, 1),
(504, 4, '2021-04-17', 'Virat', 'credit', 'YYYUUII', 200, 2, 2, 0, 'ltr', 'ltr', '2021-04-20', 2, 42, 400, 20, 40, 40, 78, 'Red Mites', 'Growth Regulator', '', 21, 0, 99, 1),
(505, 3456, '2021-04-13', 'Hitesh', 'credit', 'aaaaaaaaa', 300, 2, 0.002, 0.0015, 'ltr', 'ml', '2021-04-13', 2, 426, 600, 18, 54, 54, 56, 'Jeside', 'Growth Regulator', '', 21, 0, 100, 1),
(506, 3456, '2021-04-29', 'Mahi', 'cash', 'gggggggggg', 200, 2, 0.002, 0.002, 'kg', 'g', '2021-04-28', 2, 42, 400, 18, 36, 36, 56, 'Thrips', 'Growth Regulator', '', 21, 0, 101, 1),
(507, 78, '2021-04-23', 'Virat', 'credit', 'greengo', 300, 2, 0.002, 2, 'kg', 'g', '2021-04-13', 3, 1, 900, 18, 81, 81, 67, 'Red Mites', 'Insecticide', '', 21, 0, 102, 1),
(508, 78, '2021-04-23', 'Virat', 'credit', 'YYYUYTmm', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-21', 2, 42, 400, 12, 24, 24, 78, 'Thrips', 'Fungicide', '', 21, 0, 102, 1),
(509, 78, '2021-04-23', 'Virat', 'credit', 'mmmmmm', 300, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-14', 2, 42, 600, 12, 36, 36, 78, 'Powdery mildew', 'Fertilizer', '', 21, 0, 102, 1),
(510, 78, '2021-04-23', 'Virat', 'credit', 'joomla', 200, 2, 0.002, 7.003, 'ltr', 'ml', '2021-04-15', 2, 42, 400, 18, 36, 36, 67, 'Red Mites', 'Fungicide', '', 21, 0, 102, 1),
(511, 78, '2021-04-23', 'Virat', 'credit', 'SNEHA', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-22', 3, 42, 600, 18, 54, 54, 78, 'Thrips', 'Insecticide', '', 21, 0, 102, 1),
(512, 78, '2021-04-23', 'Virat', 'credit', 'hyioo', 200, 2, 0, 0, '', '', '0000-00-00', 3, 42, 600, 18, 54, 54, 78, 'Milibug', 'Growth Regulator', '', 21, 0, 102, 1),
(513, 78, '2021-04-23', 'Virat', 'credit', 'Tanu', 200, 2, 2, 2, 'kg', 'kg', '2021-04-07', 3, 42, 600, 20, 60, 60, 78, 'Milibug', 'Fungicide', '', 21, 0, 102, 1),
(514, 78, '2021-04-23', 'Virat', 'credit', '6yuiei', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-05-05', 3, 1, 600, 12, 36, 36, 78, 'Milibug', 'Fungicide', '', 21, 0, 102, 1),
(515, 4, '2021-05-06', 'Hitesh', 'credit', 's', 200, 2, 0.002, 2.0045, 'ltr', 'ml', '2021-04-27', 2, 42, 400, 18, 36, 36, 56, 'Milibug', 'Insecticide', '', 21, 0, 103, 1),
(516, 3456, '2021-04-22', 'Mahi', 'cash', 'kih', 300, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-21', 2, 42, 600, 18, 54, 54, 56, 'Thrips', 'Insecticide', '', 21, 0, 104, 1),
(517, 3456, '2021-04-13', 'Mahi', 'cash', 'Tanu', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-20', 3, 42, 600, 20, 60, 60, 78, 'Milibug', 'Fungicide', '', 21, 0, 105, 1),
(518, 4, '2021-04-28', 'Mahi', 'credit', '6yuiei', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-05-04', 2, 42, 400, 12, 24, 24, 78, 'Milibug', 'Fungicide', '', 21, 0, 106, 1),
(519, 67888, '2021-04-29', 'Rohit ', 'credit', 'FFFFFFFGGGGGyyyyyyyyyyy', 300, 2, 2, 0.007, 'ltr', 'ltr', '2021-04-20', 3, 42, 900, 18, 81, 81, 56, 'Powdery mildew', 'Fungicide', '', 21, 0, 107, 1),
(520, 3456, '2021-04-22', 'Virat', 'credit', '7u', 200, 2, 0.002, 0.002, 'kg', 'g', '2021-04-20', 2, 1, 400, 5, 10, 10, 78, 'Milibug', 'Fertilizer', '', 21, 0, 108, 1),
(521, 67888, '2021-04-22', 'Virat', 'credit', 'YYYUYT', 200, 2, 2, 0.002, 'ltr', 'ltr', '2021-04-20', 2, 42, 400, 12, 24, 24, 78, 'Powdery mildew', 'Fertilizer', '', 21, 0, 109, 1),
(522, 3456, '2021-05-06', 'Mahi', 'credit', 'yutrtyu', 200, 2, 0.002, 0.002, 'kg', 'g', '2021-04-19', 2, 42, 400, 12, 24, 24, 56, 'Downy mildwe', 'Fungicide', '', 21, 0, 110, 1),
(523, 345667, '2021-04-29', 'Mahi', 'credit', 'yutrtyu', 200, 2, 0.002, 0.002, 'kg', 'g', '2021-05-06', 2, 42, 400, 12, 24, 24, 56, 'Downy mildwe', 'Fungicide', '', 21, 0, 111, 1),
(524, 34564, '2021-04-09', 'Hitesh', 'credit', 'iiiigggggg', 200, 2, 0.002, 0.002, 'kg', 'g', '2021-04-29', 3, 42, 600, 18, 54, 54, 56, 'Thrips', 'Insecticide', '', 21, 0, 112, 1),
(525, 4, '2021-04-23', 'Mahi', 'credit', 'iiiigggggg', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-20', 3, 42, 600, 18, 54, 54, 56, 'Thrips', 'Insecticide', '', 21, 0, 113, 1),
(526, 67888, '2021-04-30', 'Rohit ', 'credit', 'iiiigggggg', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-06', 2, 42, 400, 18, 36, 36, 56, 'Thrips', 'Insecticide', '', 21, 0, 114, 1),
(527, 4, '2021-04-22', 'Mahi', 'cash', 'ytre', 300, 2, 0.002, 7.009, 'kg', 'g', '2021-04-21', 2, 42, 600, 5, 15, 15, 56, 'Thrips', 'Fungicide', '', 21, 0, 115, 1),
(528, 67888, '2021-05-05', 'Virat', 'cash', 'yutrtyu', 200, 2, 0.002, 0.002, 'kg', 'g', '2021-04-28', 2, 1, 400, 12, 24, 24, 56, 'Downy mildwe', 'Fungicide', '', 21, 0, 116, 1),
(529, 67888, '2021-04-24', 'Mahi', 'cash', 'FFFFFFFGGGGGjjjjjj', 200, 5, 0.005, 0.005, 'ltr', 'ml', '2021-04-26', 2, 1, 400, 5, 10, 10, 56, 'Powdery mildew', 'Fungicide', '', 21, 0, 117, 1),
(530, 3456, '2021-04-21', 'Rohit ', 'credit', 'iiiigggggg', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-27', 2, 1, 400, 18, 36, 36, 56, 'Thrips', 'Insecticide', '', 21, 0, 118, 1),
(531, 67888, '2021-04-30', 'Mahi', 'cash', 'uuuuuuuuuuukkkkkkkkkkk', 300, 2, 2, 0.002, 'ltr', 'ltr', '2021-04-20', 2, 1, 600, 12, 36, 36, 56, 'Milibug', 'Fungicide', '', 21, 0, 119, 1),
(532, 34564, '2021-04-29', 'Mahi', 'credit', 'iiiigggggg', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-27', 2, 1, 400, 18, 36, 36, 56, 'Thrips', 'Insecticide', '', 21, 0, 120, 1),
(533, 4, '2021-04-28', 'Virat', 'cash', 'FFFFFFFGGGGGyyyyyyyyyyy', 300, 2, 0.002, 0.007, 'ltr', 'ml', '2021-04-28', 2, 1, 600, 18, 54, 54, 56, 'Powdery mildew', 'Fungicide', '', 21, 0, 121, 1),
(534, 34564, '2021-04-29', 'Virat', 'cash', 'yutrtyu', 200, 2, 0.002, 0.002, 'kg', 'g', '2021-04-27', 2, 1, 400, 12, 24, 24, 56, 'Downy mildwe', 'Fungicide', '', 21, 0, 122, 1),
(535, 3456, '2021-04-28', 'Mahi', 'credit', 'iiiimmmm', 200, 2, 0.002, 0.002, 'kg', 'g', '2021-04-20', 2, 42, 400, 18, 36, 36, 56, 'Early bite', 'Insecticide', '', 21, 0, 123, 1),
(536, 345667, '2021-04-28', 'Mahi', 'cash', 'yutrtyu', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-05-05', 2, 42, 400, 12, 24, 24, 56, 'Downy mildwe', 'Fungicide', '', 21, 0, 124, 1),
(537, 4, '2021-04-21', 'Virat', 'cash', 'joomla', 200, 2, 2, 7.003, 'kg', 'kg', '2021-04-27', 2, 1, 400, 18, 36, 36, 67, 'Red Mites', 'Fungicide', '', 21, 0, 125, 1),
(538, 4, '2021-04-28', 'Hitesh', 'cash', 'FFFFFFFGGGGGjjjjjj', 200, 2, 0.002, 0.002, 'kg', 'g', '2021-04-28', 2, 42, 400, 5, 10, 10, 56, 'Powdery mildew', 'Fungicide', '', 21, 0, 126, 1),
(539, 4, '2021-04-23', 'Shruti', 'cash', 'iiiigggggg', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-14', 2, 42, 400, 18, 36, 36, 56, 'Thrips', 'Insecticide', '', 21, 0, 127, 1),
(540, 3456, '2021-04-24', 'Hitesh', 'credit', 'uuuuuuuuuuukkkkkkkkkkk', 300, 2, 2, 0.002, 'kg', 'kg', '2021-04-19', 2, 1, 600, 12, 36, 36, 56, 'Milibug', 'Fungicide', '', 21, 0, 128, 1),
(541, 3456, '2021-05-06', 'Mahi', 'credit', 'FFFFFFFGGGGGyyyyyyyyyyy', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-14', 2, 42, 400, 18, 36, 36, 56, 'Powdery mildew', 'Fungicide', '', 21, 0, 129, 1),
(543, 34564, '2021-04-28', 'Virat', 'credit', 'iiiigggggg', 200, 2, 0.002, 0.002, 'kg', 'g', '2021-04-28', 2, 42, 400, 18, 36, 36, 56, 'Thrips', 'Insecticide', '', 21, 0, 131, 1),
(544, 4, '2021-04-09', 'Hitesh', 'credit', 'yutrtyu', 200, 2, 2, 2, 'kg', 'kg', '2021-04-13', 2, 42, 400, 12, 24, 24, 56, 'Downy mildwe', 'Fungicide', '', 21, 0, 132, 1),
(545, 3456, '2021-04-22', 'Mahi', 'cash', 'FFFFFFFGGGGGjjjjjj', 200, 2, 0.002, 0.002, 'kg', 'g', '2021-04-21', 2, 1, 400, 5, 10, 10, 56, 'Powdery mildew', 'Fungicide', '', 21, 0, 133, 1),
(546, 67888, '2021-04-21', 'Shruti', 'cash', 'iiiigggggg', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-26', 2, 42, 400, 18, 36, 36, 56, 'Thrips', 'Insecticide', '', 21, 0, 134, 1),
(547, 3456, '2021-04-28', 'Hitesh', 'cash', 'uuuuuuuuuuukkkkkkkkkkk', 300, 2, 0.002, 0.002, 'kg', 'g', '2021-04-13', 2, 42, 600, 12, 36, 36, 56, 'Milibug', 'Fungicide', '', 21, 0, 135, 1),
(548, 4, '2021-04-22', 'Hitesh', 'cash', 'iiiigggggg', 200, 2, 0.002, 0.002, 'kg', 'g', '2021-04-07', 2, 42, 400, 18, 36, 36, 56, 'Thrips', 'Insecticide', '', 21, 0, 136, 1),
(549, 3456, '2021-04-20', 'Hitesh', 'cash', 'dfgt', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-28', 2, 42, 400, 12, 24, 24, 78, 'Powdery mildew', 'Fungicide', '', 21, 0, 137, 1),
(550, 3456, '2021-04-20', 'Hitesh', 'cash', 'dfgt', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-28', 2, 42, 400, 12, 24, 24, 78, 'Powdery mildew', 'Fungicide', '', 21, 0, 138, 1),
(551, 3456, '2021-04-24', 'Hitesh', 'cash', 'FFFFFFFGGGGGjjjjjj', 200, 2, 2, 2, 'kg', 'kg', '2021-04-14', 2, 42, 400, 5, 10, 10, 56, 'Powdery mildew', 'Fungicide', '', 21, 0, 139, 1),
(552, 4, '2021-04-24', 'Rohit ', 'credit', 'FFFFFFFGGGGGjjjjjj', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-21', 2, 42, 400, 5, 10, 10, 56, 'Powdery mildew', 'Fungicide', '', 21, 0, 140, 1),
(553, 34564, '2021-05-05', 'Hitesh', 'cash', 'uuuuuuuuuuukkkkkkkkkkk', 200, 2, 0.002, 0.002, 'kg', 'g', '2021-05-04', 2, 42, 400, 12, 24, 24, 56, 'Milibug', 'Fungicide', '', 21, 0, 141, 1),
(554, 3456, '2021-04-29', 'Virat', 'cash', 'uu88', 300, 2, 0.002, 0.002, 'kg', 'g', '2021-04-20', 2, 42, 600, 12, 36, 36, 56, 'Milibug', 'Fertilizer', '', 21, 0, 142, 1),
(555, 4, '2021-04-12', 'Mahi', 'credit', 'YYYUYT', 300, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-21', 2, 42, 600, 12, 36, 36, 78, 'Powdery mildew', 'Fertilizer', '', 21, 0, 143, 1),
(556, 4, '2021-04-30', 'Virat', 'cash', 'redfgg', 300, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-20', 2, 1, 600, 20, 60, 60, 56, 'Powdery mildew', 'Fertilizer', '', 21, 0, 144, 1),
(557, 4, '2021-04-30', 'Hitesh', 'cash', 'YYYUYT', 200, 5, 0.005, 0.002, 'ltr', 'ml', '2021-04-20', 2, 42, 400, 12, 24, 24, 78, 'Powdery mildew', 'Fertilizer', '', 21, 0, 145, 1),
(558, 3456, '2021-04-15', 'Shruti', 'credit', 'redfgg', 200, 5, 0.005, 0.005, 'kg', 'g', '2021-05-06', 2, 42, 400, 20, 40, 40, 56, 'Powdery mildew', 'Fertilizer', '', 21, 0, 146, 1),
(559, 4, '2021-04-29', 'Virat', 'credit', 'ii8888', 200, 2, 2, 2, 'ltr', 'ltr', '2021-04-14', 2, 42, 400, 18, 36, 36, 56, 'Milibug', 'Fertilizer', '', 21, 0, 147, 1),
(560, 4, '2021-04-24', 'Shruti', 'credit', 'redfgg', 200, 5, 0.005, 0.005, 'ltr', 'ml', '2021-04-13', 2, 1, 400, 20, 40, 40, 56, 'Powdery mildew', 'Fertilizer', '', 21, 0, 148, 1),
(561, 3456, '2021-04-10', 'Mahi', 'cash', 'uu88', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-06', 2, 42, 400, 12, 24, 24, 56, 'Milibug', 'Fertilizer', '', 21, 0, 149, 1),
(562, 4, '2021-04-27', 'Hitesh', 'cash', 'redfgg', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-27', 2, 42, 400, 20, 40, 40, 56, 'Powdery mildew', 'Fertilizer', '', 21, 0, 150, 1),
(563, 3456, '2021-04-23', 'Mahi', 'cash', 'YYYUYT', 200, 2, 2, 0.002, 'ltr', 'ltr', '2021-04-28', 3, 42, 600, 12, 36, 36, 78, 'Powdery mildew', 'Fertilizer', '', 21, 0, 151, 1),
(564, 3456, '2021-04-14', 'Hitesh', 'cash', 'hyioo', 200, 2, 0.002, 0.002, 'ltr', 'ml', '2021-04-19', 2, 42, 400, 18, 36, 36, 78, 'Milibug', 'Growth Regulator', '', 21, 0, 152, 1),
(565, 3456, '2021-04-17', 'Mahi', 'cash', 'aaaaaaaaa', 200, 2, 0.002, 0.0015, 'kg', 'g', '2021-04-06', 2, 42, 400, 18, 36, 36, 56, 'Jeside', 'Growth Regulator', '', 21, 0, 153, 1),
(566, 4, '2021-04-29', 'Hitesh', 'credit', 'YYYUUII', 300, 5, 0.005, 0.005, 'ltr', 'ml', '2021-04-28', 2, 42, 600, 20, 60, 60, 78, 'Red Mites', 'Growth Regulator', '', 21, 0, 154, 1),
(567, 3456, '2021-05-05', 'Hitesh', 'cash', 'yyyyyyyyyyyyyyyyyyyyyy', 200, 5, 0.005, 2, 'kg', 'g', '2021-04-20', 2, 42, 400, 12, 24, 24, 56, 'Thrips', 'Growth Regulator', '', 21, 0, 155, 1),
(721, 1, '2021-06-29', 'Shree', 'cash', 'fert1', 7, 2, 2, 11, 'kg', 'kg', '2021-06-14', 7, 8, 49, 5, 1.225, 1.225, 45, 'Powdery mildew', 'Fertilizer', '5gm', 23, 0, 285, 0),
(722, 1, '2021-06-29', 'Shree', 'cash', 'dis1', 700, 2, 2, 14, 'kg', 'kg', '2021-06-01', 7, 8, 4900, 5, 122.5, 122.5, 45, 'Downy mildwe', 'Pesticide', '5gm', 23, 0, 285, 0),
(723, 1, '2021-06-29', 'Shree', 'cash', 'growth1', 7, 2, 2, 14, 'kg', 'kg', '2021-06-16', 7, 8, 49, 5, 1.225, 1.225, 45, 'Powdery mildew', 'Growth Regulator', '10gm', 23, 0, 285, 0),
(724, 1, '2021-06-29', 'Shree', 'cash', 'hkll', 7, 2, 2, 13, 'kg', 'kg', '2021-06-16', 7, 8, 49, 12, 2.94, 2.94, 4, 'Thrips', 'Growth Regulator', '10gm', 23, 0, 285, 0),
(725, 1, '2021-06-29', 'Shree', 'cash', 'QQQQQQ', 7, 2, 2, 14, 'kg', 'kg', '2021-06-16', 7, 8, 49, 5, 1.225, 1.225, 4, 'Jeside', 'Pesticide', '10gm', 23, 0, 285, 0),
(726, 1, '2021-06-29', 'Shree', 'cash', 'Vakhar', 7, 2, 2, 13, 'kg', 'kg', '2021-06-09', 7, 8, 49, 5, 1.225, 1.225, 4, 'Jeside', 'Insecticide', '4', 23, 0, 285, 0),
(727, 1, '2021-06-29', 'Shree', 'cash', 'UUU', 7, 2, 0.002, 0.014, 'kg', 'g', '2021-06-16', 7, 8, 49, 12, 2.94, 2.94, 4, 'Thrips', 'Insecticide', '4', 23, 0, 285, 0),
(728, 2, '2021-06-18', 'Shree', 'credit', 'yyiiiiioo', 700, 2, 0.002, 0.011, 'kg', 'g', '2021-06-22', 7, 8, 4900, 5, 122.5, 122.5, 4, 'Jeside', 'Insecticide', '10gm', 23, 0, 286, 1),
(729, 8, '2021-06-30', 'Shree', 'credit', 'QQQQQQ', 7, 2, 0.002, 0.014, 'kg', 'g', '2021-06-20', 7, 8, 49, 5, 1.225, 1.225, 4, 'Jeside', 'Pesticide', '10gm', 23, 0, 287, 1),
(730, 5, '2021-07-06', 'Nikita', 'credit', 'fert1', 7, 2, 0.002, 11, 'kg', 'g', '2021-06-15', 3, 88, 21, 5, 0.525, 0.525, 45, 'Powdery mildew', 'Fertilizer', '5gm', 23, 0, 288, 1),
(731, 2, '2021-07-07', 'Poorvi', 'cash', 'chi', 7, 2, 0.002, 0.011, 'ltr', 'ml', '2021-06-14', 7, 8, 49, 12, 2.94, 2.94, 4, 'Jeside', 'Fertilizer', '4', 23, 0, 289, 1),
(732, 2, '2021-06-30', 'Poorvi', 'credit', 'QQQQQQ', 7, 2, 2, 6, 'ltr', 'ltr', '2021-06-22', 3, 8, 21, 5, 0.525, 0.525, 4, 'Jeside', 'Pesticide', '10gm', 23, 0, 290, 1),
(733, 2, '2021-07-05', 'Poorvi', 'cash', 'QQQQQQ', 7, 2, 0.002, 0.006, 'ltr', 'ml', '2021-06-14', 3, 8, 21, 5, 0.525, 0.525, 4, 'Jeside', 'Pesticide', '10gm', 23, 0, 291, 1),
(734, 5, '2021-06-29', 'Poorvi', 'cash', 'QQQQQQ', 9, 2, 0.002, 0.014, 'ltr', 'ml', '2021-06-14', 7, 8, 63, 5, 1.575, 1.575, 4, 'Jeside', 'Pesticide', '10gm', 23, 0, 292, 1),
(735, 8, '2021-06-23', 'Shree', 'credit', 'QQQQQQ', 700, 2, 0.002, 0.006, 'ltr', 'ml', '2021-06-21', 3, 88, 2100, 5, 52.5, 52.5, 4, 'Jeside', 'Pesticide', '10gm', 23, 0, 293, 1),
(736, 8, '2021-07-01', 'Poorvi', 'cash', 'gb', 7, 2, 2, 14, 'ltr', 'ltr', '2021-06-29', 7, 8, 49, 18, 4.41, 4.41, 4, 'Early bite', 'Fungicide', '4gm', 23, 0, 294, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `pid` int(11) NOT NULL,
  `payment_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `plot_name` int(11) NOT NULL,
  `account` varchar(30) NOT NULL,
  `particuler` text NOT NULL,
  `amount` text NOT NULL,
  `narration` varchar(30) NOT NULL,
  `total` int(11) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`pid`, `payment_no`, `date`, `plot_name`, `account`, `particuler`, `amount`, `narration`, `total`, `ses_id`) VALUES
(5, 4, '2020-12-20', 0, 'Current Liabilities', 'Current Liabilities', '70', 'a', 70, 5),
(6, 5, '2020-12-30', 0, 'Shraddha', 'shruti pramod amrutkar,shruti ', '10', 'a', 20, 5),
(7, 8, '2021-01-06', 0, 'Shraddha', 'shruti pramod amrutkar,shruti', '70', 'AS', 140, 5),
(13, 12, '2021-01-19', 0, 'Vishakha', 'sairaj,harish more', '70,10', 'a', 80, 9),
(15, 13, '2021-01-19', 0, 'Vishakha', 'harish more,sairaj', '70,10', 'a', 110, 9),
(16, 13, '2021-02-14', 5, 'Vishakha', 'harish more,sairaj', '100,10', 'any', 110, 9),
(17, 13, '2021-02-14', 2, 'Vishakha', 'harish more', '100', 'a', 100, 9),
(18, 20, '2021-02-17', 1, 'vrushabh', 'Cash', '90', 'a', 90, 18),
(19, 7, '2021-02-18', 2, 'Cash', 'Rushali', '89', 'a', 89, 9),
(20, 2, '2021-04-09', 1, 'Pradhunya', 'Hitesh', '500', 'a', 45, 21),
(28, 2, '2021-05-12', 1, 'Shree', 'Shrutika,Twinkle', '10,10', 'aa', 20, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tblpleaf`
--

CREATE TABLE `tblpleaf` (
  `pleaf_id` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `prunning_day` int(11) NOT NULL,
  `sample_no` int(11) NOT NULL,
  `sample_purpose` varchar(30) NOT NULL,
  `sample_qty` int(11) NOT NULL,
  `sample_taken` varchar(30) NOT NULL,
  `presence_of` varchar(30) NOT NULL,
  `lab` varchar(30) NOT NULL,
  `strtype` varchar(30) NOT NULL,
  `nitro_act` float NOT NULL,
  `nitro_status` varchar(30) NOT NULL,
  `no3n_act` int(11) NOT NULL,
  `no3n_status` varchar(30) NOT NULL,
  `nh4n_act` int(11) NOT NULL,
  `nh4n_status` varchar(30) NOT NULL,
  `p_act` float NOT NULL,
  `p_status` varchar(30) NOT NULL,
  `k_act` float NOT NULL,
  `k_status` varchar(30) NOT NULL,
  `ca_act` float NOT NULL,
  `ca_status` varchar(30) NOT NULL,
  `mg_act` float NOT NULL,
  `mg_status` varchar(30) NOT NULL,
  `s_act` float NOT NULL,
  `s_status` varchar(30) NOT NULL,
  `fe_act` int(11) NOT NULL,
  `fe_status` varchar(30) NOT NULL,
  `mn_act` int(11) NOT NULL,
  `mn_status` varchar(30) NOT NULL,
  `zn_act` int(11) NOT NULL,
  `zn_status` varchar(30) NOT NULL,
  `cu_act` float NOT NULL,
  `cu_status` varchar(30) NOT NULL,
  `b_act` int(11) NOT NULL,
  `b_status` varchar(30) NOT NULL,
  `mo_act` float NOT NULL,
  `mo_status` varchar(30) NOT NULL,
  `na_act` float NOT NULL,
  `na_status` varchar(30) NOT NULL,
  `cl_act` float NOT NULL,
  `cl_status` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpleaf`
--

INSERT INTO `tblpleaf` (`pleaf_id`, `plot_no`, `pname`, `date`, `prunning_day`, `sample_no`, `sample_purpose`, `sample_qty`, `sample_taken`, `presence_of`, `lab`, `strtype`, `nitro_act`, `nitro_status`, `no3n_act`, `no3n_status`, `nh4n_act`, `nh4n_status`, `p_act`, `p_status`, `k_act`, `k_status`, `ca_act`, `ca_status`, `mg_act`, `mg_status`, `s_act`, `s_status`, `fe_act`, `fe_status`, `mn_act`, `mn_status`, `zn_act`, `zn_status`, `cu_act`, `cu_status`, `b_act`, `b_status`, `mo_act`, `mo_status`, `na_act`, `na_status`, `cl_act`, `cl_status`, `ses_id`, `status`) VALUES
(20, 1, 'Vrushabh more', '2021-02-22', 1, 123, 'q1er45', 12, 'sdf', 'ASDF', 'asdf', 'verasain', 8, 'High', 234, 'Low', 34, 'Low', 10, 'High', 234, 'High', 4, 'High', 1, 'High', 234, 'High', 12, 'Low', 11, 'Low', 12, 'Low', 230, 'High', 10, 'Low', 12, 'High', 344, 'High', 30, 'High', 18, 0),
(22, 1, 'Vrushabh More', '2021-03-05', 12, 45, 'sd', 8, 'ad', 'ads', 'eff', 'prebloom', 4578, 'High', 4, 'Low', 4, 'Low', 0, '', 323, 'High', 2, 'Optimal', 12, 'High', 24, 'High', 23, 'High', 23, 'Low', 23, 'Low', 23, 'Low', 21, 'High', 12, 'Low', 12, 'High', 12, 'High', 9, 0),
(25, 1, 'Nashik', '2021-04-28', 8, 6, '78', 2, 'hbjmm', 'sxd', 'sxd', 'recut', 5, 'High', 32, 'Low', 3, 'Low', 3, 'High', 4, 'High', 4, 'High', 44, 'High', 4, 'High', 4, 'Low', 4, 'Low', 8, 'Low', 1, 'Low', 4, 'Low', 2, 'High', 0, 'Low', 1000, 'High', 21, 0),
(26, 1, 'Nashik', '2021-07-01', 63, 23, '23', 2, 'Vrushabh', 'Harish', 'Chem', 'bloom', 6, 'High', 34, 'Low', 53, 'Low', 2, 'High', 2, 'Optimal', 33, 'High', 3, 'High', 33, 'High', 1, 'Low', 3, 'Low', 3, 'Low', 4, 'Low', 3, 'Low', 1, 'High', 3, 'High', 3, 'High', 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpolt`
--

CREATE TABLE `tblpolt` (
  `plot_id` int(11) NOT NULL,
  `farm_name` varchar(30) NOT NULL,
  `owner_name` varchar(35) NOT NULL,
  `GGN_no` bigint(10) NOT NULL,
  `addrs` text NOT NULL,
  `taluka` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `nationality` varchar(35) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `fax_no` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tech_auth` varchar(30) NOT NULL,
  `machine_code` varchar(30) NOT NULL,
  `reg_no` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpolt`
--

INSERT INTO `tblpolt` (`plot_id`, `farm_name`, `owner_name`, `GGN_no`, `addrs`, `taluka`, `district`, `state`, `pin_code`, `nationality`, `phone_no`, `fax_no`, `email`, `tech_auth`, `machine_code`, `reg_no`, `status`) VALUES
(5, 'OM SAI', 'Harish More', 123456, 'Nashik', 'nashik', 'nashik', 'maharashtra', 424305, 'Indian', 7028660395, '234567', 'pratik@gmail.com', 'dcvbnm', 'vrushabh', '1234566', 1),
(6, 'OM SAI', 'Harish More', 123456, 'Nashik', 'nashik', 'nashik', 'maharashtra', 424305, 'Indian', 7028660395, '23456745', 'vrushabh@gmail.com', 'Tech', 'vrushabh', '1234566', 0),
(8, 'OM SAI', 'shree', 123456, 'At wadne post burzad', 'nashik', 'nashik', 'maharashtra', 424307, 'Indian', 70, '23456745', 'shraddha56@gmail.com', 'sdf', 'shraddha', '13', 0),
(9, 'fratelli ', 'vrushabh more', 100, 'old agra road pimpalagon', 'niphad', 'nashik', 'maharashtra', 422209, 'indian', 8956444209, '87878787', 'vrushabhm17@gmail.com', '0000', '0000', '0000', 0),
(10, 'bhakti farms', 'vrushabh', 0, 'old agra road pimpalagon', 'niphad', 'nashik', 'maharashtra', 422209, 'indian', 8956444209, '87878787', 'ad@ad.com', '0000', '0000', '0000', 1),
(11, 'Sairaj Kuwar', 'Harish More', 123456899, 'At wadne post burzad', 'dhule', 'dhule', 'maharashtra', 424307, 'Indian', 70, '23456745', 'sai@gmail.com', 'dcvbnm', '00000', '1234566', 1),
(12, 'Shweta', 'Harish More', 123456, 'Nashik', 'nashik', 'nashik', 'maharashtra', 424305, 'Indian', 7028660395, '23456745', 'vrushab@gmail.com', 'sdff', '123', '1234566', 0),
(13, 'OM SAI', 'vrushabh more', 123456, 'Nashik', 'nashik', 'vrushabh more', 'maharashtra', 424305, 'Indian', 7028660395, '234567', 's@gmail.com', 'dcvbnm', '12345', '1234566', 0),
(17, 'abcd', 'dhule', 123456, 'At wadne post burzad', 'sdfg', 'vrushabh more', 'maharashtra', 424305, 'asdf', 7028660395, 'sdfg', 'v1@gmail.com', 'Tech', '1234', 'xsdcfvgbn43566', 0),
(18, 'GRAPES', 'vrushabh more', 23, 'Nashik', 'nashik', 'Harish More', 'maharashtra', 424305, 'Indian', 7028660395, '23456745', 'p@gmail.com', 'dcvbnm', '12345', '1234566', 0),
(19, 'FARMING', 'SHRUTI AMRUTKAR', 1233456788, 'DHULE', 'DHULE', 'DHULE', 'MAHARASHTRA', 424307, 'INDIAN', 7499549303, 'BHY23456', 'shrutiamrutkar1@gmail.com', 'BH123', 'BH123', '12345667788', 0),
(20, 'Pradhunya', 'Shashi', 23355, 'MALEGAON', 'MALEGAON', 'NASHIK', 'MAHARASHTRA', 424307, 'INDIAN', 7972217635, '1234566', 'pd@gmail.com', 'BH123', '123', '12345667788', 0),
(21, 'Shree Om', 'Sneha Amrutkar', 1234566, 'Dhule', 'Dhule', 'Dhule', 'Maharashtra', 424307, 'Indian', 7499549303, 'BH23455', 'sneha@gmail.com', '1111', '1111', 'RT67889', 0),
(22, 'Ganesh Farm', 'Ganesh Darade', 3456677788, 'Pimpalgaon', 'Nashik', 'Nashik', 'Maharashtra', 424307, 'Indian', 7499549303, '1223567777', 'ganesh@gmail.com', 'asdfg', '1111', '1324467', 0),
(23, 'SAI FARMS', 'Ashu', 5623789, 'Nashik', 'Nashik', 'Nashik', 'Maharshtra', 424307, 'Indian', 935926492, 'gj3456', 'ashu@gmail.com', '1111', '0000', 'BH5688', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblprunning`
--

CREATE TABLE `tblprunning` (
  `prunning_id` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `plot_name` varchar(30) NOT NULL,
  `prunning_type` varchar(30) NOT NULL,
  `date` date DEFAULT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `duration` int(11) NOT NULL,
  `temp` int(30) NOT NULL,
  `climate` varchar(30) NOT NULL,
  `worker_name` text NOT NULL,
  `wages` text NOT NULL,
  `tot_wages` int(11) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblprunning`
--

INSERT INTO `tblprunning` (`prunning_id`, `plot_no`, `plot_name`, `prunning_type`, `date`, `stime`, `etime`, `duration`, `temp`, `climate`, `worker_name`, `wages`, `tot_wages`, `ses_id`, `status`) VALUES
(84, 1, 'Vrushabh more', 'April', '2021-02-21', '05:44:00', '06:48:00', 1, 89, 'cloudy', 'shruti,Shree,Hitesh', '4,8,7', 19, 18, 0),
(88, 1, 'Vrushabh More', 'October', '2021-02-21', '03:17:00', '17:19:00', 14, 56, 'humid', 'rushali,rushali,NIKI,', '8,8,8,', 24, 9, 0),
(92, 1, 'Vrushabh More', 'April', '2021-03-01', '05:19:00', '18:22:00', 13, 89, 'cold', 'shruti,niki', '8,8', 16, 9, 0),
(93, 45, 'ASDSSSS', 'April', '2021-03-22', '19:47:00', '07:47:00', -12, 7, 'cold', 'shruti', '78', 78, 9, 0),
(95, 1, 'Malegaon', 'April', '2021-04-20', '01:29:00', '12:29:00', 11, 7, 'cloudy', 'Shruti,Nikita', '78,78', 156, 21, 0),
(99, 1, 'Nashik', 'April', '2021-04-29', '05:08:00', '17:11:00', 12, 6, 'humid', 'Shruti', '5', 5, 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpurcahse1`
--

CREATE TABLE `tblpurcahse1` (
  `pid` int(11) NOT NULL,
  `purchase_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice_no` int(11) DEFAULT NULL,
  `plot_name` int(11) NOT NULL,
  `paccount_name` varchar(30) NOT NULL,
  `payment_mode` varchar(30) NOT NULL,
  `item_name` text NOT NULL,
  `qty` text NOT NULL,
  `unit` text NOT NULL,
  `rate` text NOT NULL,
  `amount` text NOT NULL,
  `amount1` text NOT NULL,
  `narration` varchar(30) NOT NULL,
  `GST` varchar(30) NOT NULL,
  `CGST` float NOT NULL,
  `SGST` float NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpurcahse1`
--

INSERT INTO `tblpurcahse1` (`pid`, `purchase_no`, `date`, `invoice_no`, `plot_name`, `paccount_name`, `payment_mode`, `item_name`, `qty`, `unit`, `rate`, `amount`, `amount1`, `narration`, `GST`, `CGST`, `SGST`, `ses_id`) VALUES
(33, 14, '2021-01-07', 24, 0, 'shruti', '', 'grape,sharad', '4,34', '', '34,34', '', '136,1156', 'a', '18', 116.28, 116.28, 5),
(34, 15, '2021-01-07', 6, 0, 'shruti pramod amrutkar', '', 'grape', '4', '', '5', '', '20', '1', '12', 1.2, 1.2, 5),
(35, 16, '2021-01-07', 6, 0, 'shruti', '', 'grape,grape', '4,4', '', '5,6', '', '20,24', '1', '5', 1.1, 1.1, 5),
(36, 17, '2021-01-07', 6, 0, 'shruti', '', 'grape,grape', '4,4', '', '6,2', '', '24,8', '1', '12', 1.92, 1.92, 5),
(37, 18, '2021-01-19', 2, 0, 'harish more', '', 'sharad,thomson', '4,4', '', '34,5', '', '136,20', 'a', '5', 3.9, 3.9, 9),
(38, 19, '2021-01-17', 2, 0, 'sairaj', '', 'sharad,sharad,flame', '4,4,7', '', '34,5,10', '', '136,20,70', 'a', '12', 13.56, 13.56, 9),
(39, 20, '2021-01-19', 2, 0, 'Vishakha', '', 'sharad,flame', '34,4', '', '34,34', '', '1156,136', 'a', '12', 77.52, 77.52, 9),
(40, 21, '2021-02-07', 2, 0, 'harish more', '', 'grapes', '500', '', '354', '', '177000', 'a', '5', 4425, 4425, 9),
(41, 22, '2021-02-14', 56, 2, 'sairaj', '', 'grape', '500', '', '10', '', '5000', 'a', '12', 300, 300, 9),
(42, 10, '2021-02-14', 56, 2, 'Vishakha', '', 'grape,grapes', '0.5,0.34', 'kg,kg', '600,600', '', '300,204.00000000000003', 'a', '12', 19.2, 19.2, 9),
(43, 11, '2021-02-14', 3, 2, 'Vishakha', '', 'grapes,grapes', '0.5,0.7', 'kg,kg', '100,600', '', '50,420.00000000000006', 'a', '12', 28.2, 28.2, 9),
(59, 1, '2021-04-22', 6, 1, 'Shruti', '', 'Grapes,Grapes', '2,2', 'kg,kg', '100,100', '200,200', '400', 'A', '5', 10, 10, 21),
(68, 2, '2021-05-03', 1, 1, 'Poorvi', 'credit', 'Apple,Apple', '4,4', 'kg,kg', '4,4', '16,16', '32', 'a', '5', 0.8, 0.8, 23),
(69, 2, '2021-05-03', 1, 1, 'Twinkle', 'cash', '3', '4', 'kg', '4', '16', '16', 'a', '12', 0.96, 0.96, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tblpurchase`
--

CREATE TABLE `tblpurchase` (
  `id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpurchase`
--

INSERT INTO `tblpurchase` (`id`, `bill_no`) VALUES
(1, 23),
(3, 45);

-- --------------------------------------------------------

--
-- Table structure for table `tblreceipt`
--

CREATE TABLE `tblreceipt` (
  `rid` int(11) NOT NULL,
  `receipt_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `account` varchar(30) NOT NULL,
  `particuler` text NOT NULL,
  `amount` text NOT NULL,
  `narration` varchar(30) NOT NULL,
  `total` int(11) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblreceipt`
--

INSERT INTO `tblreceipt` (`rid`, `receipt_no`, `date`, `account`, `particuler`, `amount`, `narration`, `total`, `ses_id`) VALUES
(3, 1, '2020-12-11', 'Current Liabilities', 'Current Liabilities', '70', 'a', 90, 0),
(4, 2, '2020-12-22', 'Current Liabilities', 'Current Liabilities', '70', 'a', 70, 5),
(5, 3, '2020-12-08', 'Current Liabilities', 'Current Liabilities', '70', 'a', 70, 5),
(6, 4, '2020-12-30', 'Shraddha', 'shruti,shruti pramod amrutkar', '10', 'a', 20, 5),
(7, 5, '2021-01-26', 'Shraddha', 'shruti pramod amrutkar,shruti', '70', 'a', 140, 5),
(8, 6, '2021-01-26', 'Shraddha', 'shruti pramod amrutkar,shruti pramod amrutkar', '70,', 'a', 140, 5),
(9, 7, '2021-01-26', 'Shraddha', 'shruti pramod amrutkar,shruti pramod amrutkar', '70,', 'a', 140, 5),
(10, 8, '2021-01-06', 'Shraddha', 'shruti pramod amrutkar,shruti', '70,70', 'a', 140, 5),
(11, 9, '2021-01-07', 'Shraddha', 'a,shruti pramod amrutkar', '70,10', 'a', 80, 5),
(16, 10, '2021-01-19', 'Vishakha', 'sairaj,harish more', '70,70', 'a', 140, 9),
(17, 11, '2021-01-19', 'Vishakha', 'sairaj,harish more', '70,10', 'a', 80, 9),
(18, 12, '2021-01-20', 'Vishakha', 'harish more', '70', 'a', 70, 9),
(19, 4, '2021-02-16', 'Cash', 'sairaj', '70', 'a', 70, 9),
(20, 1, '2021-02-17', 'vrushabh', 'shruti,Nikita', '70,90', 'a', 90, 18),
(21, 2, '2021-02-17', 'vrushabh', 'Cash', '70', 'a', 70, 18),
(22, 2, '2021-02-17', 'vrushabh', 'Cash', '70', 'a', 70, 18),
(27, 4, '2021-02-17', 'vrushabh', 'shruti', '70', 'a', 70, 18),
(28, 5, '2021-02-17', 'Cash', 'sairaj', '70', 'a', 70, 9),
(29, 5, '2021-02-17', 'vrushabh', 'shruti', '70', 'a', 70, 18),
(30, 6, '2021-02-18', 'Cash', 'Rushali', '89', 'AA', 89, 9),
(31, 1, '2021-04-09', 'Pradhunya', 'Hitesh,Nikita', '90,90', 'a', 90, 21),
(37, 1, '2021-05-03', 'Shree', 'Twinkle,Shrutika', '10,10', 'a', 20, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tblsale1`
--

CREATE TABLE `tblsale1` (
  `s1id` int(11) NOT NULL,
  `sales_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `plot_no` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `paccount_name` varchar(30) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `variety` varchar(50) NOT NULL,
  `qty` float NOT NULL,
  `unit` varchar(30) NOT NULL,
  `rate` int(11) NOT NULL,
  `amount` float NOT NULL,
  `narration` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsale1`
--

INSERT INTO `tblsale1` (`s1id`, `sales_no`, `date`, `plot_no`, `invoice_no`, `paccount_name`, `item_name`, `variety`, `qty`, `unit`, `rate`, `amount`, `narration`, `total`, `ses_id`, `status`) VALUES
(46, 3, '2021-05-03', 1, 2, 'Poorvi', 'Apple', 'Thomson', 4, 'kg', 4, 16, 'AS', 32, 23, 0),
(47, 3, '2021-05-03', 1, 2, 'Poorvi', 'Apple', 'Thomson', 4, 'kg', 4, 16, 'AS', 32, 23, 0),
(48, 1, '2021-05-03', 1, 2, 'Twinkle', 'Apple', 'Thomson', 4, 'kg', 4, 16, 'a', 16, 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblsales`
--

CREATE TABLE `tblsales` (
  `sid` int(11) NOT NULL,
  `sales_no` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `paccount_name` varchar(30) NOT NULL,
  `item_name` text NOT NULL,
  `variety` text NOT NULL,
  `qty` text NOT NULL,
  `unit` text NOT NULL,
  `rate` text NOT NULL,
  `amount` text NOT NULL,
  `narration` varchar(30) NOT NULL,
  `total` int(11) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsales`
--

INSERT INTO `tblsales` (`sid`, `sales_no`, `date`, `plot_no`, `invoice_no`, `paccount_name`, `item_name`, `variety`, `qty`, `unit`, `rate`, `amount`, `narration`, `total`, `ses_id`) VALUES
(57, 1, '2021-02-18', 2, 78, 'Pradhunya', 'grapes', 'flame', '56', 'kg', '78', '4368', 'S', 16, 9),
(58, 2, '2021-03-23', 2, 90, 'Rushali', 'grapes', 'flame', '0.045', 'kg', '4', '0.18', 'a', 70, 9),
(59, 3, '2021-03-10', 2, 90, 'Rushali', 'grapes', 'flame', '0.005', 'kg', '5', '0.025', 'a', 0, 9),
(60, 4, '2021-03-10', 1, 90, 'Cash', 'Grapes', 'thomson', '0.005', 'kg', '5', '0.025', 'a', 0, 9),
(61, 5, '2021-03-11', 2, 90, 'komal', 'Grapes', 'thomson', '0.005', 'kg', '5', '25', 'a', 25, 9),
(62, 1, '2021-04-09', 1, 4, 'Nikita', 'Orange', 'thomson', '0.02', 'kg', '4', '0.08', '34', 16, 21),
(71, 1, '2021-05-03', 1, 2, 'Twinkle', 'Apple', 'Thomson', '4', 'kg', '4', '16', 'a', 16, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tblschedule`
--

CREATE TABLE `tblschedule` (
  `schedule_id` int(11) NOT NULL,
  `work` varchar(35) NOT NULL,
  `prunning_type` varchar(30) NOT NULL,
  `pruning_days` int(11) NOT NULL,
  `method` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblschedule`
--

INSERT INTO `tblschedule` (`schedule_id`, `work`, `prunning_type`, `pruning_days`, `method`, `ses_id`) VALUES
(28, 'prunning', 'April', 43, 'crops', 18),
(29, 'Niki', 'October', 43, 'zxdvfvg', 18),
(30, 'prunning', 'April', 67, 'crop', 9),
(31, 'crop', 'October', 67, 'prunning', 9),
(34, 'Prunning', 'October', 56, 'KKKK', 21),
(36, 'Prunning', 'April', 3, 'growth', 22),
(38, 'Prunning', 'April', 3, 'Prun', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tblsite`
--

CREATE TABLE `tblsite` (
  `sid` int(11) NOT NULL,
  `site_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsite`
--

INSERT INTO `tblsite` (`sid`, `site_name`) VALUES
(5, 'pimpalgao'),
(6, 'pachora'),
(7, 'vani'),
(8, 'malegaon');

-- --------------------------------------------------------

--
-- Table structure for table `tblslury`
--

CREATE TABLE `tblslury` (
  `slid` int(11) NOT NULL,
  `content` varchar(35) NOT NULL,
  `unit` varchar(35) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblslury`
--

INSERT INTO `tblslury` (`slid`, `content`, `unit`, `ses_id`) VALUES
(7, 'sadfg', 'g', 5),
(13, 'slury', 'gm', 18),
(14, 'ADGTHJ', 'ltr', 18),
(15, 'slury', 'ml', 9),
(16, 'Slice', 'kg', 9),
(18, 'a', 'gm', 9),
(19, 'aA', 'gm', 9),
(20, 'aaaaaaaaaaaaaaaaaaaa', 'gm', 9),
(21, 'af', 'gm', 9),
(22, 'a', 'gm', 20),
(23, 'aaa', 'gm', 21),
(24, 'eee', 'ml', 21),
(25, 'dddddddftt', 'gm', 21),
(26, 'ASDFG', 'kg', 22),
(27, 'JKKLM', 'gm', 22),
(29, 'RT', 'gm', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tblsluryapp`
--

CREATE TABLE `tblsluryapp` (
  `sid` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `duration` int(11) NOT NULL,
  `prunning_day` varchar(30) NOT NULL,
  `equipment_used` varchar(30) NOT NULL,
  `worker_name` varchar(30) NOT NULL,
  `slury_typ` varchar(30) NOT NULL,
  `content` varchar(30) NOT NULL,
  `quantity` float NOT NULL,
  `unit` varchar(11) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsluryapp`
--

INSERT INTO `tblsluryapp` (`sid`, `plot_no`, `pname`, `date`, `stime`, `etime`, `duration`, `prunning_day`, `equipment_used`, `worker_name`, `slury_typ`, `content`, `quantity`, `unit`, `ses_id`, `status`) VALUES
(42, 1, 'Vrushabh more', '2021-02-26', '15:05:00', '21:01:00', 5, '5days', 'CVBN', 'shraddha', 'Chemical', 'ADGTHJ', 0, 'Kg', 18, 0),
(45, 2, 'Harish More', '2021-02-22', '03:47:00', '17:49:00', 14, '1days', 'cafini', 'shruti', 'Chemical', 'af', 0.089, 'ltr', 9, 0),
(46, 1, 'Vrushabh More', '2021-02-25', '16:01:00', '17:01:00', 1, '4days', 'Kubota', 'niki', 'Bio', 'Slice', 0, 'Kg', 9, 0),
(48, 1, 'Vrushabh More', '2021-02-28', '03:49:00', '14:49:00', 11, '7days', 'Kubota', 'niki', 'Bio', 'aA', 0.01, 'Kg', 9, 0),
(49, 2, 'Dhule', '2021-04-15', '01:51:00', '09:54:00', 8, '-12days', 'cafini', 'Shruti', 'Chemical', 'eee', 3, 'ltr', 21, 0),
(50, 1, 'Nashik', '2021-07-07', '15:21:00', '20:21:00', 5, '69days', 'ads', 'shruti', 'Bio', 'RT', 0.002, 'ltr', 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblsoil`
--

CREATE TABLE `tblsoil` (
  `soil_id` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `prunning_day` int(11) NOT NULL,
  `sample_no` int(11) NOT NULL,
  `sample_purpose` varchar(30) NOT NULL,
  `sample_qty` int(11) NOT NULL,
  `sample_taken` varchar(30) NOT NULL,
  `presence_of` varchar(30) NOT NULL,
  `lab` varchar(30) NOT NULL,
  `ph_act` float NOT NULL,
  `ph_status` varchar(30) NOT NULL,
  `ec_act` float NOT NULL,
  `ec_status` varchar(30) NOT NULL,
  `carbon_act` float NOT NULL,
  `carbon_status` varchar(30) NOT NULL,
  `N_act` int(11) NOT NULL,
  `N_status` varchar(30) NOT NULL,
  `p_act` int(11) NOT NULL,
  `P_status` varchar(30) NOT NULL,
  `K_act` int(11) NOT NULL,
  `K_status` varchar(30) NOT NULL,
  `Ca_act` int(11) NOT NULL,
  `Ca_status` varchar(30) NOT NULL,
  `Mg_act` int(11) NOT NULL,
  `Mg_status` varchar(30) NOT NULL,
  `S_act` int(11) NOT NULL,
  `S_status` varchar(30) NOT NULL,
  `Fe_act` float NOT NULL,
  `Fe_status` varchar(30) NOT NULL,
  `Mn_act` float NOT NULL,
  `Mn_status` varchar(30) NOT NULL,
  `Zn_act` float NOT NULL,
  `Zn_status` varchar(30) NOT NULL,
  `Cu_act` float NOT NULL,
  `Cu_status` varchar(30) NOT NULL,
  `B_act` float NOT NULL,
  `B_status` varchar(30) NOT NULL,
  `Mo_act` float NOT NULL,
  `Mo_status` varchar(30) NOT NULL,
  `Na_act` int(11) NOT NULL,
  `Na_status` varchar(30) NOT NULL,
  `Cl_act` int(11) NOT NULL,
  `Cl_status` varchar(30) NOT NULL,
  `CaCO3_act` float NOT NULL,
  `CaCO3_status` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsoil`
--

INSERT INTO `tblsoil` (`soil_id`, `plot_no`, `pname`, `date`, `prunning_day`, `sample_no`, `sample_purpose`, `sample_qty`, `sample_taken`, `presence_of`, `lab`, `ph_act`, `ph_status`, `ec_act`, `ec_status`, `carbon_act`, `carbon_status`, `N_act`, `N_status`, `p_act`, `P_status`, `K_act`, `K_status`, `Ca_act`, `Ca_status`, `Mg_act`, `Mg_status`, `S_act`, `S_status`, `Fe_act`, `Fe_status`, `Mn_act`, `Mn_status`, `Zn_act`, `Zn_status`, `Cu_act`, `Cu_status`, `B_act`, `B_status`, `Mo_act`, `Mo_status`, `Na_act`, `Na_status`, `Cl_act`, `Cl_status`, `CaCO3_act`, `CaCO3_status`, `ses_id`, `status`) VALUES
(31, 2, 'Harish More', '2021-03-04', 11, 7899, '78', 6, 's', 'sgh', 'hgjk', 8, 'High', 78, 'High', 8, 'High', 7, 'Low', 8, 'Low', 7, 'Low', 78, 'Low', 7, 'Low', 8, 'Low', 7, 'High', 8, 'High', 7, 'High', 7, 'High', 6, 'High', 7, 'High', 7, 'Optimal', 8, 'Optimal', 8, 'High', 9, 0),
(32, 2, 'Harish More', '2021-02-22', 1, 10, '1', 10, 'rgh', 'sgh', 'hgjk', 10, 'High', 10, 'High', 10, 'High', 10, 'Low', 10, 'Optimal', 10, 'Low', 10, 'Low', 10, 'Low', 10, 'Optimal', 10, 'High', 10, 'High', 10, 'High', 10, 'High', 10, 'High', 10, 'High', 10, 'Optimal', 10, 'Optimal', 10, 'High', 9, 0),
(33, 1, 'Vrushabh More', '2021-02-25', 4, 45, 'sd', 43, 'ad', 'ads', 'eff', 45, 'High', 4, 'High', 4, 'High', 3, 'Low', 323, 'High', 2, 'Low', 12, 'Low', 24, 'Low', 23, 'High', 23, 'High', 23, 'High', 23, 'High', 21, 'High', 12, 'High', 12, 'High', 12, 'Optimal', 3, 'Optimal', 3, 'High', 9, 0),
(35, 1, 'Nashik', '2021-04-28', 8, 3, '3', 100, '3', 'Pradhunya', '3', 89, 'High', 2, 'High', 33, 'High', 4, 'Low', 44, 'High', 4, 'Low', 4, 'Low', 44, 'Low', 54, 'High', 55, 'High', 5, 'High', 55, 'High', 5, 'High', 5, 'High', 0, '', 4, 'Optimal', 4, 'Optimal', 54, 'High', 21, 0),
(36, 1, 'Nashik', '2021-06-02', 34, 23, '23', 2, 'Vrushabh', 'Harish', 'Chem', 6, 'Low', 34, 'High', 53, 'High', 2, 'Low', 2, 'Low', 2, 'Low', 33, 'Low', 3, 'Low', 33, 'High', 1, 'Low', 3, 'High', 3, 'High', 4, 'High', 3, 'High', 1, 'High', 3, 'Optimal', 3, 'Optimal', 1, 'Optimal', 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblsprayer`
--

CREATE TABLE `tblsprayer` (
  `sid` int(11) NOT NULL,
  `sprayer_type` varchar(30) NOT NULL,
  `sprayer_name` varchar(30) NOT NULL,
  `nozzle_type` varchar(30) NOT NULL,
  `corenopls` int(11) NOT NULL,
  `corenomin` int(11) NOT NULL,
  `discnopls` float NOT NULL,
  `discnomin` float NOT NULL,
  `nozzle` int(11) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsprayer`
--

INSERT INTO `tblsprayer` (`sid`, `sprayer_type`, `sprayer_name`, `nozzle_type`, `corenopls`, `corenomin`, `discnopls`, `discnomin`, `nozzle`, `ses_id`) VALUES
(84, '2', '8', 'italian', 0, 0, 0.8, 0.8, 7, 18),
(85, '3', '9', 'local', 0, 0, 2, 2, 7, 18),
(86, '3', '9', 'italian', 0, 0, 0.8, 0.8, 10, 9),
(88, '1', '1', 'teejet', 25, 45, 0, 0, 9, 9),
(90, '3', '9', 'local', 0, 0, 5, 6, 6, 9),
(91, '3', '9', 'local', 0, 0, 4, 3, 6, 20),
(93, '3', '9', 'teejet', 32, 45, 3, 3, 8, 21),
(94, '1', '2', 'italian', 0, 0, 0.6, 0.6, 9, 22),
(95, '2', '8', 'local', 0, 0, 5, 2, 8, 22),
(96, '1', '6', 'italian', 0, 0, 0.8, 1, 7, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tblstype`
--

CREATE TABLE `tblstype` (
  `sid` int(11) NOT NULL,
  `stype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstype`
--

INSERT INTO `tblstype` (`sid`, `stype`) VALUES
(1, 'Air blast'),
(2, 'Low volume'),
(3, 'Ultra low volume');

-- --------------------------------------------------------

--
-- Table structure for table `tblsuperadmin`
--

CREATE TABLE `tblsuperadmin` (
  `id` int(11) NOT NULL,
  `saname` varchar(30) NOT NULL,
  `sapass` text NOT NULL,
  `saemail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsuperadmin`
--

INSERT INTO `tblsuperadmin` (`id`, `saname`, `sapass`, `saemail`) VALUES
(1, 'ajinkya', 'ajinkya', 'ajinkyapethkar@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbltemp`
--

CREATE TABLE `tbltemp` (
  `tid` int(11) NOT NULL,
  `temp_name` varchar(30) NOT NULL,
  `otime` time NOT NULL,
  `ctime` time NOT NULL,
  `loc` text NOT NULL,
  `lat` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblvisit`
--

CREATE TABLE `tblvisit` (
  `vid` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `duration` int(11) NOT NULL,
  `prunning_day` int(11) NOT NULL,
  `visitor_name` varchar(30) NOT NULL,
  `observation` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblvisit`
--

INSERT INTO `tblvisit` (`vid`, `plot_no`, `pname`, `date`, `stime`, `etime`, `duration`, `prunning_day`, `visitor_name`, `observation`, `ses_id`, `status`) VALUES
(42, 2, 'Harish More', '2021-03-02', '00:00:00', '04:00:00', 4, 9, 'SD', 'kj', 9, 0),
(43, 1, 'Nashik', '2021-04-20', '02:08:00', '03:08:00', 1, -7, 'sid', 's', 21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblvoucher`
--

CREATE TABLE `tblvoucher` (
  `vid` int(11) NOT NULL,
  `voucher_type` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblvoucher`
--

INSERT INTO `tblvoucher` (`vid`, `voucher_type`, `ses_id`) VALUES
(1, 'Contra Entry', 0),
(2, 'Purchase', 0),
(3, 'Sales', 0),
(4, 'Payments', 0),
(5, 'Journal Entry', 0),
(6, 'Receipt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblwater`
--

CREATE TABLE `tblwater` (
  `water_id` int(11) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `duration` int(11) NOT NULL,
  `prunning_day` int(11) NOT NULL,
  `sample_no` int(11) NOT NULL,
  `sample_purpose` varchar(30) NOT NULL,
  `sample_qty` int(11) NOT NULL,
  `sample_taken` varchar(30) NOT NULL,
  `presence_of` varchar(30) NOT NULL,
  `lab` varchar(30) NOT NULL,
  `ph_act` float NOT NULL,
  `ph_status` varchar(30) NOT NULL,
  `tds_act` int(11) NOT NULL,
  `tds_status` varchar(30) NOT NULL,
  `ec_act` float NOT NULL,
  `ec_status` varchar(30) NOT NULL,
  `ca_act` int(11) NOT NULL,
  `ca_status` varchar(30) NOT NULL,
  `mg_act` int(11) NOT NULL,
  `mg_status` varchar(30) NOT NULL,
  `co3_act` varchar(30) NOT NULL,
  `co3_status` varchar(30) NOT NULL,
  `hco3_act` int(11) NOT NULL,
  `hco3_status` varchar(30) NOT NULL,
  `na_act` int(11) NOT NULL,
  `na_status` varchar(30) NOT NULL,
  `cl_act` int(11) NOT NULL,
  `cl_status` varchar(30) NOT NULL,
  `no3n_act` int(11) NOT NULL,
  `no3n_status` varchar(30) NOT NULL,
  `k_act` float NOT NULL,
  `k_status` varchar(30) NOT NULL,
  `cu_act` float NOT NULL,
  `cu_status` varchar(30) NOT NULL,
  `b_act` float NOT NULL,
  `b_status` varchar(30) NOT NULL,
  `sar_act` float NOT NULL,
  `sar_status` varchar(30) NOT NULL,
  `rsc_act` varchar(30) NOT NULL,
  `rsc_status` varchar(30) NOT NULL,
  `ses_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblwater`
--

INSERT INTO `tblwater` (`water_id`, `plot_no`, `pname`, `date`, `stime`, `etime`, `duration`, `prunning_day`, `sample_no`, `sample_purpose`, `sample_qty`, `sample_taken`, `presence_of`, `lab`, `ph_act`, `ph_status`, `tds_act`, `tds_status`, `ec_act`, `ec_status`, `ca_act`, `ca_status`, `mg_act`, `mg_status`, `co3_act`, `co3_status`, `hco3_act`, `hco3_status`, `na_act`, `na_status`, `cl_act`, `cl_status`, `no3n_act`, `no3n_status`, `k_act`, `k_status`, `cu_act`, `cu_status`, `b_act`, `b_status`, `sar_act`, `sar_status`, `rsc_act`, `rsc_status`, `ses_id`, `status`) VALUES
(20, 1, 'Vrushabh more', '2021-02-22', '00:00:00', '00:00:00', 0, 1, 123, 'asd', 12, 'shruti', 'ASDF', 'asdf', 123, 'High', 234, 'Optimal', 500, 'High', 50, 'Optimal', 2, 'Optimal', '13', '-', 30, 'Optimal', 95, 'High', 1, 'Optimal', 30, 'High', 0.4, '-', 30, '-', 122, 'High', 4, 'Optimal', '1', 'Optimal', 18, 0),
(21, 1, 'Vrushabh More', '2021-02-25', '00:00:00', '00:00:00', 0, 4, 7899, '78', 6, 'rgh', 'sgh', 'hgjk', 8, 'High', 78, 'Optimal', 8, 'High', 7, 'Optimal', 8, 'Optimal', '7', '-', 78, 'Optimal', 7, 'Optimal', 8, 'Optimal', 7, 'High', 8, '-', 7, '-', 7, 'High', 6, 'Optimal', '7', 'High', 9, 0),
(22, 2, 'Harish More', '2021-02-13', '00:00:00', '00:00:00', 0, -15, 45, 'sd', 1000, 'ad', 'ads', 'eff', 45, 'High', 4, 'Optimal', 4, 'High', 3, 'Optimal', 323, 'High', '2', '-', 12, 'Optimal', 24, 'Optimal', 23, 'Optimal', 23, 'High', 23, '-', 23, '-', 21, 'High', 12, 'High', '12', 'High', 9, 0),
(23, 1, 'Nashik', '2021-04-28', '00:00:00', '00:00:00', 0, 8, 3, '3', 3, 'Shruti', 'Pradhunya', '3', 89, 'High', 2, 'Optimal', 33, 'High', 4, 'Optimal', 44, 'High', '4', '-', 4, 'Optimal', 44, 'High', 54, 'Optimal', 55, 'High', 5, '-', 55, '-', 5, 'High', 5, 'Optimal', '0', 'Optimal', 21, 0),
(25, 1, 'Nashik', '2021-06-25', '00:00:00', '00:00:00', 0, 57, 23, '23', 2, 'Vrushabh', 'Harish', 'Chem', 4, 'Low', 34, 'Optimal', 53, 'High', 2, 'Optimal', 2, 'Optimal', '2', '-', 33, 'Optimal', 3, 'Optimal', 33, 'Optimal', 1, 'Optimal', 3, '-', 3, '-', 4, 'High', 3, 'Optimal', '1', 'Optimal', 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblworker`
--

CREATE TABLE `tblworker` (
  `id` int(11) NOT NULL,
  `worker_name` varchar(30) NOT NULL,
  `wages` int(11) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `adhar_no` bigint(10) NOT NULL,
  `ses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblworker`
--

INSERT INTO `tblworker` (`id`, `worker_name`, `wages`, `contact_no`, `adhar_no`, `ses_id`) VALUES
(7, 'shruti', 9, 7028660395, 23456678979, 5),
(14, 'shruti', 5, 70, 7878989089, 18),
(15, 'shraddha', 8, 7028660395, 2345662445, 18),
(16, 'shruti', 7, 7028660395, 123446788889, 9),
(17, 'niki', 7, 7499549303, 123446788889, 9),
(18, 'rushali', 7, 7028660395, 908946788889, 9),
(20, 'shruti', 5, 74999549303, 123456789, 9),
(24, 'Shruti', 5, 74999549303, 12346789000000123, 21),
(26, 'Shruti', 6, 7499549303, 12374859678, 22),
(28, 'Shraddha', 10, 7499549303, 12374859678, 22),
(29, 'shruti', 4, 4, 67990000, 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plot`
--
ALTER TABLE `plot`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `plot_no` (`plot_no`),
  ADD KEY `pname` (`pname`);

--
-- Indexes for table `soil`
--
ALTER TABLE `soil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `tblacc_select`
--
ALTER TABLE `tblacc_select`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `aemail` (`aemail`);

--
-- Indexes for table `tblcassets`
--
ALTER TABLE `tblcassets`
  ADD PRIMARY KEY (`assets_id`);

--
-- Indexes for table `tblcontra`
--
ALTER TABLE `tblcontra`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tblcoreno`
--
ALTER TABLE `tblcoreno`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tblcrop`
--
ALTER TABLE `tblcrop`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `plot_no` (`plot_no`);

--
-- Indexes for table `tbldexpense`
--
ALTER TABLE `tbldexpense`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `tbldiscno`
--
ALTER TABLE `tbldiscno`
  ADD PRIMARY KEY (`discno_id`);

--
-- Indexes for table `tbldisease1`
--
ALTER TABLE `tbldisease1`
  ADD PRIMARY KEY (`did`),
  ADD KEY `plot_no` (`plot_no`);

--
-- Indexes for table `tbldissession`
--
ALTER TABLE `tbldissession`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `tbldrip`
--
ALTER TABLE `tbldrip`
  ADD PRIMARY KEY (`did`),
  ADD KEY `plot_no` (`plot_no`);

--
-- Indexes for table `tbldropleaf`
--
ALTER TABLE `tbldropleaf`
  ADD PRIMARY KEY (`leaf_did`);

--
-- Indexes for table `tblfarmreport`
--
ALTER TABLE `tblfarmreport`
  ADD PRIMARY KEY (`fam_id`);

--
-- Indexes for table `tblfert1`
--
ALTER TABLE `tblfert1`
  ADD PRIMARY KEY (`fert_id`),
  ADD KEY `plot_no` (`plot_no`);

--
-- Indexes for table `tblfertsession`
--
ALTER TABLE `tblfertsession`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `fert_id` (`fert_id`),
  ADD KEY `tblfertsession_ibfk_1` (`plot_no`);

--
-- Indexes for table `tblfruit`
--
ALTER TABLE `tblfruit`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `tblgrowth1`
--
ALTER TABLE `tblgrowth1`
  ADD PRIMARY KEY (`gr_id`),
  ADD KEY `plot_no` (`plot_no`);

--
-- Indexes for table `tblgrowthsession`
--
ALTER TABLE `tblgrowthsession`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `gr_id` (`gr_id`);

--
-- Indexes for table `tblharvest`
--
ALTER TABLE `tblharvest`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `tblidiscno`
--
ALTER TABLE `tblidiscno`
  ADD PRIMARY KEY (`idisc_id`);

--
-- Indexes for table `tbliexpense`
--
ALTER TABLE `tbliexpense`
  ADD PRIMARY KEY (`iexp_id`);

--
-- Indexes for table `tblinhouse`
--
ALTER TABLE `tblinhouse`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `tblinhousecal`
--
ALTER TABLE `tblinhousecal`
  ADD PRIMARY KEY (`inid`);

--
-- Indexes for table `tblirrigation`
--
ALTER TABLE `tblirrigation`
  ADD PRIMARY KEY (`iid`),
  ADD KEY `plot_no` (`plot_no`);

--
-- Indexes for table `tblitem`
--
ALTER TABLE `tblitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbljournal`
--
ALTER TABLE `tbljournal`
  ADD PRIMARY KEY (`jid`);

--
-- Indexes for table `tbll1`
--
ALTER TABLE `tbll1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllang`
--
ALTER TABLE `tbllang`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `tblled1`
--
ALTER TABLE `tblled1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblledger`
--
ALTER TABLE `tblledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblled_bank`
--
ALTER TABLE `tblled_bank`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `tblliability`
--
ALTER TABLE `tblliability`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `tblmachine`
--
ALTER TABLE `tblmachine`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `tblmejorgrp`
--
ALTER TABLE `tblmejorgrp`
  ADD PRIMARY KEY (`grp_id`);

--
-- Indexes for table `tblmultitem`
--
ALTER TABLE `tblmultitem`
  ADD PRIMARY KEY (`multi_id`),
  ADD KEY `multi_id` (`multi_id`);

--
-- Indexes for table `tblno_nozzle`
--
ALTER TABLE `tblno_nozzle`
  ADD PRIMARY KEY (`nozzle_id`);

--
-- Indexes for table `tblntype`
--
ALTER TABLE `tblntype`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `tblother`
--
ALTER TABLE `tblother`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `plot_no` (`plot_no`);

--
-- Indexes for table `tblp1`
--
ALTER TABLE `tblp1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `multi_id` (`multi_id`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tblpleaf`
--
ALTER TABLE `tblpleaf`
  ADD PRIMARY KEY (`pleaf_id`),
  ADD KEY `plot_no` (`plot_no`);

--
-- Indexes for table `tblpolt`
--
ALTER TABLE `tblpolt`
  ADD PRIMARY KEY (`plot_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tblprunning`
--
ALTER TABLE `tblprunning`
  ADD PRIMARY KEY (`prunning_id`),
  ADD KEY `tblprunning_ibfk_1` (`plot_no`);

--
-- Indexes for table `tblpurcahse1`
--
ALTER TABLE `tblpurcahse1`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tblpurchase`
--
ALTER TABLE `tblpurchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreceipt`
--
ALTER TABLE `tblreceipt`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `tblsale1`
--
ALTER TABLE `tblsale1`
  ADD PRIMARY KEY (`s1id`),
  ADD KEY `plot_no` (`plot_no`);

--
-- Indexes for table `tblsales`
--
ALTER TABLE `tblsales`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `plot_no` (`plot_no`);

--
-- Indexes for table `tblschedule`
--
ALTER TABLE `tblschedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tblsite`
--
ALTER TABLE `tblsite`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tblslury`
--
ALTER TABLE `tblslury`
  ADD PRIMARY KEY (`slid`);

--
-- Indexes for table `tblsluryapp`
--
ALTER TABLE `tblsluryapp`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `plot_no` (`plot_no`);

--
-- Indexes for table `tblsoil`
--
ALTER TABLE `tblsoil`
  ADD PRIMARY KEY (`soil_id`),
  ADD KEY `plot_no` (`plot_no`);

--
-- Indexes for table `tblsprayer`
--
ALTER TABLE `tblsprayer`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tblstype`
--
ALTER TABLE `tblstype`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tblsuperadmin`
--
ALTER TABLE `tblsuperadmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`saemail`);

--
-- Indexes for table `tbltemp`
--
ALTER TABLE `tbltemp`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `tblvisit`
--
ALTER TABLE `tblvisit`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `plot_no` (`plot_no`);

--
-- Indexes for table `tblvoucher`
--
ALTER TABLE `tblvoucher`
  ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `tblwater`
--
ALTER TABLE `tblwater`
  ADD PRIMARY KEY (`water_id`),
  ADD KEY `plot_no` (`plot_no`);

--
-- Indexes for table `tblworker`
--
ALTER TABLE `tblworker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plot`
--
ALTER TABLE `plot`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3545;

--
-- AUTO_INCREMENT for table `soil`
--
ALTER TABLE `soil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblacc_select`
--
ALTER TABLE `tblacc_select`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcassets`
--
ALTER TABLE `tblcassets`
  MODIFY `assets_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblcontra`
--
ALTER TABLE `tblcontra`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tblcoreno`
--
ALTER TABLE `tblcoreno`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblcrop`
--
ALTER TABLE `tblcrop`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbldexpense`
--
ALTER TABLE `tbldexpense`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbldiscno`
--
ALTER TABLE `tbldiscno`
  MODIFY `discno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbldisease1`
--
ALTER TABLE `tbldisease1`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tbldissession`
--
ALTER TABLE `tbldissession`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `tbldrip`
--
ALTER TABLE `tbldrip`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbldropleaf`
--
ALTER TABLE `tbldropleaf`
  MODIFY `leaf_did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblfarmreport`
--
ALTER TABLE `tblfarmreport`
  MODIFY `fam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblfert1`
--
ALTER TABLE `tblfert1`
  MODIFY `fert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tblfertsession`
--
ALTER TABLE `tblfertsession`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `tblfruit`
--
ALTER TABLE `tblfruit`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tblgrowth1`
--
ALTER TABLE `tblgrowth1`
  MODIFY `gr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tblgrowthsession`
--
ALTER TABLE `tblgrowthsession`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tblharvest`
--
ALTER TABLE `tblharvest`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblidiscno`
--
ALTER TABLE `tblidiscno`
  MODIFY `idisc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbliexpense`
--
ALTER TABLE `tbliexpense`
  MODIFY `iexp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblinhouse`
--
ALTER TABLE `tblinhouse`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tblinhousecal`
--
ALTER TABLE `tblinhousecal`
  MODIFY `inid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tblirrigation`
--
ALTER TABLE `tblirrigation`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tblitem`
--
ALTER TABLE `tblitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `tbljournal`
--
ALTER TABLE `tbljournal`
  MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbll1`
--
ALTER TABLE `tbll1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbllang`
--
ALTER TABLE `tbllang`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblled1`
--
ALTER TABLE `tblled1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblledger`
--
ALTER TABLE `tblledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tblled_bank`
--
ALTER TABLE `tblled_bank`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblliability`
--
ALTER TABLE `tblliability`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblmachine`
--
ALTER TABLE `tblmachine`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tblmejorgrp`
--
ALTER TABLE `tblmejorgrp`
  MODIFY `grp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblmultitem`
--
ALTER TABLE `tblmultitem`
  MODIFY `multi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `tblno_nozzle`
--
ALTER TABLE `tblno_nozzle`
  MODIFY `nozzle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblntype`
--
ALTER TABLE `tblntype`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblother`
--
ALTER TABLE `tblother`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblp1`
--
ALTER TABLE `tblp1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=737;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblpleaf`
--
ALTER TABLE `tblpleaf`
  MODIFY `pleaf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblpolt`
--
ALTER TABLE `tblpolt`
  MODIFY `plot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblprunning`
--
ALTER TABLE `tblprunning`
  MODIFY `prunning_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tblpurcahse1`
--
ALTER TABLE `tblpurcahse1`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tblpurchase`
--
ALTER TABLE `tblpurchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblreceipt`
--
ALTER TABLE `tblreceipt`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tblsale1`
--
ALTER TABLE `tblsale1`
  MODIFY `s1id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tblsales`
--
ALTER TABLE `tblsales`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tblschedule`
--
ALTER TABLE `tblschedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tblsite`
--
ALTER TABLE `tblsite`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblslury`
--
ALTER TABLE `tblslury`
  MODIFY `slid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tblsluryapp`
--
ALTER TABLE `tblsluryapp`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tblsoil`
--
ALTER TABLE `tblsoil`
  MODIFY `soil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblsprayer`
--
ALTER TABLE `tblsprayer`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tblstype`
--
ALTER TABLE `tblstype`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblsuperadmin`
--
ALTER TABLE `tblsuperadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbltemp`
--
ALTER TABLE `tbltemp`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblvisit`
--
ALTER TABLE `tblvisit`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tblvoucher`
--
ALTER TABLE `tblvoucher`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblwater`
--
ALTER TABLE `tblwater`
  MODIFY `water_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblworker`
--
ALTER TABLE `tblworker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcrop`
--
ALTER TABLE `tblcrop`
  ADD CONSTRAINT `tblcrop_ibfk_1` FOREIGN KEY (`plot_no`) REFERENCES `plot` (`plot_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbldisease1`
--
ALTER TABLE `tbldisease1`
  ADD CONSTRAINT `tbldisease1_ibfk_1` FOREIGN KEY (`plot_no`) REFERENCES `plot` (`plot_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbldrip`
--
ALTER TABLE `tbldrip`
  ADD CONSTRAINT `tbldrip_ibfk_1` FOREIGN KEY (`plot_no`) REFERENCES `plot` (`plot_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblfert1`
--
ALTER TABLE `tblfert1`
  ADD CONSTRAINT `tblfert1_ibfk_1` FOREIGN KEY (`plot_no`) REFERENCES `plot` (`plot_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblfertsession`
--
ALTER TABLE `tblfertsession`
  ADD CONSTRAINT `tblfertsession_ibfk_1` FOREIGN KEY (`plot_no`) REFERENCES `plot` (`plot_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblgrowth1`
--
ALTER TABLE `tblgrowth1`
  ADD CONSTRAINT `tblgrowth1_ibfk_1` FOREIGN KEY (`plot_no`) REFERENCES `plot` (`plot_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblirrigation`
--
ALTER TABLE `tblirrigation`
  ADD CONSTRAINT `tblirrigation_ibfk_1` FOREIGN KEY (`plot_no`) REFERENCES `plot` (`plot_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblother`
--
ALTER TABLE `tblother`
  ADD CONSTRAINT `tblother_ibfk_1` FOREIGN KEY (`plot_no`) REFERENCES `plot` (`plot_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblp1`
--
ALTER TABLE `tblp1`
  ADD CONSTRAINT `tblp1_ibfk_1` FOREIGN KEY (`multi_id`) REFERENCES `tblmultitem` (`multi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblpleaf`
--
ALTER TABLE `tblpleaf`
  ADD CONSTRAINT `tblpleaf_ibfk_1` FOREIGN KEY (`plot_no`) REFERENCES `plot` (`plot_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblprunning`
--
ALTER TABLE `tblprunning`
  ADD CONSTRAINT `tblprunning_ibfk_1` FOREIGN KEY (`plot_no`) REFERENCES `plot` (`plot_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblsale1`
--
ALTER TABLE `tblsale1`
  ADD CONSTRAINT `tblsale1_ibfk_1` FOREIGN KEY (`plot_no`) REFERENCES `plot` (`plot_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
