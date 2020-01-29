-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2019 at 12:40 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chadia`
--

-- --------------------------------------------------------

--
-- Table structure for table `chadia_clients`
--

CREATE TABLE `chadia_clients` (
  `id` int(11) NOT NULL,
  `c_names` varchar(50) NOT NULL,
  `c_phone` varchar(20) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_password` varchar(50) NOT NULL,
  `c_status` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  `c_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `c_type` varchar(6) NOT NULL DEFAULT 'CLIENT'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chadia_clients`
--

INSERT INTO `chadia_clients` (`id`, `c_names`, `c_phone`, `c_email`, `c_password`, `c_status`, `c_date`, `c_type`) VALUES
(1, 'DUSABE Aimee', '0787031934', 'aime@gmail.com', 'aime', 'ACTIVE', '2019-11-22 16:26:00', 'CLIENT'),
(2, 'UWERA OLIVE', '0788703193', 'olive@gmail.com', 'olive', 'ACTIVE', '2019-11-22 16:26:00', 'CLIENT');

-- --------------------------------------------------------

--
-- Table structure for table `chadia_employees`
--

CREATE TABLE `chadia_employees` (
  `id` int(11) NOT NULL,
  `e_names` varchar(50) NOT NULL,
  `e_phone` varchar(20) NOT NULL,
  `e_address` varchar(20) NOT NULL,
  `e_salon` varchar(20) NOT NULL,
  `e_status` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  `e_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chadia_employees`
--

INSERT INTO `chadia_employees` (`id`, `e_names`, `e_phone`, `e_address`, `e_salon`, `e_status`, `e_date`) VALUES
(1, 'IVAN BUTERA', '0782000000', '286', '2', 'ACTIVE', '2019-02-13 22:56:01'),
(2, 'CHRIS BROWN', '0782000001', '292', '2', 'ACTIVE', '2019-02-13 23:11:26'),
(3, 'MARSHAL MATHERS', '0782000002', '299', '2', 'ACTIVE', '2019-02-13 23:13:24'),
(7, 'MAHIRWE PATRICK', '0782000003', '286', '6', 'ACTIVE', '2019-02-14 06:46:25'),
(8, 'MUKANKUSI SOLANGE', '0782000004', '292', '6', 'ACTIVE', '2019-02-14 06:47:12'),
(9, 'AIMABLE TUYIRATE', '0782000005', '292', '3', 'ACTIVE', '2019-02-17 12:54:51'),
(10, 'MUZUNGU', '0789709054', '314', '2', 'ACTIVE', '2019-07-21 17:50:06'),
(11, 'RASTA', '0788888877', '133', '8', 'ACTIVE', '2019-07-24 10:30:26'),
(12, 'ANGELIQUE', '0789776666', '136', '8', 'ACTIVE', '2019-07-24 10:31:19'),
(13, 'GRETA MARIE', '0755444390', '320', '9', 'ACTIVE', '2019-08-27 12:04:26'),
(14, 'AXEL JUAN LU', '0789999999', '298', '9', 'ACTIVE', '2019-08-27 12:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `chadia_orders`
--

CREATE TABLE `chadia_orders` (
  `id` int(11) NOT NULL,
  `o_service` varchar(20) NOT NULL,
  `o_day` varchar(20) NOT NULL,
  `o_time` varchar(20) NOT NULL,
  `o_cust_name` varchar(50) NOT NULL,
  `o_cust_phone` varchar(20) NOT NULL,
  `o_status` varchar(20) NOT NULL DEFAULT 'PENDING',
  `o_employee` varchar(20) DEFAULT NULL,
  `o_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chadia_orders`
--

INSERT INTO `chadia_orders` (`id`, `o_service`, `o_day`, `o_time`, `o_cust_name`, `o_cust_phone`, `o_status`, `o_employee`, `o_date`) VALUES
(7, '10', '2019-02-16', '11:20', 'GISELE GATARI', '0788888877', 'PENDING', NULL, '2019-02-16 01:33:00'),
(8, '10', '2019-02-16', '11:20', 'GISELE GATARI', '0788888877', 'CANCELED', NULL, '2019-02-16 01:33:38'),
(9, '17', '2019-02-16', '10:24', 'MANZI FABRICE', '0788888888', 'APPROVED', '1', '2019-02-16 01:34:19'),
(10, '17', '2019-02-16', '10:24', 'MANZI FABRICE', '0788888888', 'CANCELED', NULL, '2019-02-16 01:35:19'),
(11, '1', '2019-02-22', '00:00', 'GISELE GATARI', '0788888877', 'CANCELED', NULL, '2019-02-16 01:36:16'),
(12, '2', '2019-02-22', '13:00', 'TWINNIE GOOSE', '0788888866', 'PENDING', NULL, '2019-02-16 01:37:22'),
(13, '10', '2019-02-21', '10:30', 'CHAZO B', '0788888866', 'CANCELED', NULL, '2019-02-16 11:26:49'),
(14, '2', '2019-02-18', '17:00', 'CHRISTA', '0788888855', 'PENDING', NULL, '2019-02-18 15:52:36'),
(15, '17', '2019-02-27', '10:10', 'SANYU', '0788888844', 'PENDING', NULL, '2019-02-18 16:24:54'),
(18, '9', '2019-02-21', '13:00', 'CHADIA KAYITESI', '0785000003', 'PENDING', NULL, '2019-02-19 11:52:38'),
(20, '11', '2019-02-28', '16:00', 'JULIUS KING', '0785000005', 'APPROVED', '7', '2019-02-19 11:53:40'),
(21, '2', '2019-02-28', '13:00', 'BELLA NELLA', '0788888822', 'APPROVED', '1', '2019-02-19 13:01:45'),
(22, '1', '2019-07-26', '13:00', 'MWIZA NICE', '0788867777', 'APPROVED', '1', '2019-07-21 17:32:36'),
(23, '17', '2019-07-24', '08:05', 'MUTESI BELLA', '0784726472', 'PENDING', NULL, '2019-07-24 10:09:15'),
(24, '21', '2019-07-26', '08:00', 'BORA NADIA', '0754434567', 'APPROVED', '11', '2019-07-24 11:07:31'),
(25, '1', '2019-08-25', '08:00', 'KAYITESI CHADIA', '0784726472', 'PENDING', NULL, '2019-08-25 19:45:11'),
(26, '21', '2019-08-25', '08:00', 'JACKIE MAHORO', '0784726472', 'APPROVED', '11', '2019-08-25 19:58:48'),
(27, '22', '2019-08-25', '08:00', 'MONGINA', '0784726472', 'APPROVED', '12', '2019-08-25 20:05:26'),
(28, '24', '2019-08-27', '21:00', 'MUNEZA GRETA', '0784726472', 'APPROVED', '14', '2019-08-27 12:06:55'),
(29, '23', '2019-08-27', '12:00', 'HELENE CYIZA', '0788888887', 'CANCELED', NULL, '2019-08-27 12:34:45'),
(30, '22', '2019-09-30', '08:00', 'KAYITESI CHADIA', '0788867777', 'PENDING', NULL, '2019-08-27 13:38:47'),
(31, '26', '2019-10-16', '08:00', 'UMWALI VANIA', '0727733224', 'CANCELED', NULL, '2019-10-16 12:05:42'),
(32, '26', '2019-10-17', '08:00', 'DIANE INGABIRE', '0784726472', 'CANCELED', NULL, '2019-10-16 16:25:43'),
(33, '24', '2019-11-07', '09:00', 'KAYITESI CHADIA', '0784726472', 'PENDING', NULL, '2019-11-07 15:14:33'),
(34, '26', '2019-11-12', '08:00', 'LENALD', '0788867777', 'APPROVED', '12', '2019-11-07 15:26:55'),
(35, '17', '2019-11-22', '11:57', 'KAYITESI CHADIA', '0784726472', 'PENDING', NULL, '2019-11-22 14:19:08'),
(36, '17', '2019-11-23', '17:59', 'KAYITESI CHADIA', '0784726472', 'PENDING', NULL, '2019-11-22 14:25:27'),
(37, '17', '2019-11-24', '17:58', 'AIME DUSABE', '0787031934', 'PENDING', NULL, '2019-11-23 11:48:27'),
(38, '17', '2019-11-24', '17:58', 'AIME DUSABE', '0787031934', 'APPROVED', NULL, '2019-11-23 11:48:27'),
(39, '17', '2019-11-24', '17:58', 'AIME DUSABE', '0787031934', 'CANCELED', NULL, '2019-11-23 11:48:27'),
(40, '24', '2019-11-23', '10:59', 'DUSABE AIMEE', '0787031934', 'PENDING', NULL, '2019-11-23 13:25:52'),
(41, '1', '2019-11-23', '08:00', 'UWERA OLIVE', '0788703193', 'PENDING', NULL, '2019-11-23 13:27:40'),
(42, '21', '2019-11-28', '08:00', 'DUSABE AIMEE', '0787031934', 'APPROVED', '11', '2019-11-23 13:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `chadia_salons`
--

CREATE TABLE `chadia_salons` (
  `id` int(11) NOT NULL,
  `s_name` varchar(80) NOT NULL,
  `s_address` int(11) NOT NULL,
  `s_logo` varchar(100) NOT NULL,
  `s_open_from` varchar(20) NOT NULL,
  `s_open_to` varchar(20) NOT NULL,
  `s_availability` varchar(10) NOT NULL DEFAULT 'OPEN',
  `s_status` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  `mngr_names` varchar(50) NOT NULL,
  `mngr_phone` varchar(20) NOT NULL,
  `mngr_email` varchar(50) NOT NULL,
  `mngr_pass` varchar(100) NOT NULL,
  `s_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chadia_salons`
--

INSERT INTO `chadia_salons` (`id`, `s_name`, `s_address`, `s_logo`, `s_open_from`, `s_open_to`, `s_availability`, `s_status`, `mngr_names`, `mngr_phone`, `mngr_email`, `mngr_pass`, `s_date`) VALUES
(1, 'TOUCH CURVES', 356, 'hair-salon-logo-preview-01-.jpg', '09:00', '17:00', 'OPEN', 'ACTIVE', 'THERESSA KAMIKAZI', '0788000011', 'theressa@parlour.rw', '71dab1dc6537664f9194c2b102e24a1f', '2019-02-12 13:17:54'),
(2, 'Bianca stylez', 297, 'Bianca3-800x800.png', '08:00', '20:00', 'OPEN', 'ACTIVE', 'MUTESI BIANCA', '0783000000', 'bianca@gmail.com', '0fc9f62064956e8dc5b2629b653ef470', '2019-02-12 13:18:58'),
(3, 'havanna re-do', 2, 'create-a-logo-design-for-hair-style-salon-and-more.jpg', '08:30', '18:00', 'OPEN', 'ACTIVE', 'Butare Sosthen', '0788223344', 'butare@parlour.rw', 'a27fbd3144c48eb8437ce0860eb4ceb3', '2019-02-12 13:20:46'),
(4, 'robert salons', 116, 'robroy.jpg', '07:30', '17:30', 'OPEN', 'ACTIVE', 'Mugabo Robert', '0788334455', 'mugabo@parlour.rw', '890c3dcb4a248b023a6aad28c0fb2219', '2019-02-12 13:22:50'),
(5, 'Best Betty', 191, '69878_1518331834.jpg', '07:30', '19:00', 'CLOSED', 'DELETED', 'Batamuliza Betty', '0788445566', 'betty@parlour.rw', '82b054bd83ffad9b6cf8bdb98ce3cc2f', '2019-02-12 13:23:49'),
(6, 'Isaro', 415, 'hair-salon-logo-template.jpg', '07:30', '17:00', 'OPEN', 'ACTIVE', 'ishimwe claire', '0788556677', 'claire@parlour.rw', '182e500f562c7b95a2ae0b4dd9f47bb2', '2019-02-12 13:25:29'),
(7, 'KEZA BRAIDS', 104, 'hair-salon-logo-preview-01-.jpg', '08:00', '18:00', 'OPEN', 'ACTIVE', 'KEZA BRENDA', '0788000001', 'keza@parlour.rw', '944ce13aca2ed8b2e1d86374f727ff97', '2019-02-13 18:53:28'),
(8, 'ABSOLUTE  FASHION', 133, 'a b s o l u t e f a s h i o n.png', '08:00', '08:00', 'OPEN', 'ACTIVE', 'MWIZA ANNET', '0788778870', 'mwiza@gmail.com', '223ab70ce2f019217ff99c19c88d9eda', '2019-07-24 10:28:19'),
(9, 'SUNSET SPA', 297, 'beauty-one.jpg', '09:00', '22:00', 'OPEN', 'ACTIVE', 'JACKIE MUTONI', '0722002224', 'MUTONIJACKIE@GMAIL.COM', '452e386b96710e07596d5743d48dad23', '2019-08-27 11:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `chadia_sectors`
--

CREATE TABLE `chadia_sectors` (
  `id` int(11) NOT NULL,
  `province` varchar(10) NOT NULL,
  `district` varchar(30) NOT NULL,
  `sector` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chadia_sectors`
--

INSERT INTO `chadia_sectors` (`id`, `province`, `district`, `sector`) VALUES
(1, 'NORTHERN', 'Burera', 'Bungwe'),
(2, 'NORTHERN', 'Burera', 'Butaro'),
(3, 'NORTHERN', 'Burera', 'Cyanika'),
(4, 'NORTHERN', 'Burera', 'Cyeru'),
(5, 'NORTHERN', 'Burera', 'Gahunga'),
(6, 'NORTHERN', 'Burera', 'Gatebe'),
(7, 'NORTHERN', 'Burera', 'Gitovu'),
(8, 'NORTHERN', 'Burera', 'Kagogo'),
(9, 'NORTHERN', 'Burera', 'Kinoni'),
(10, 'NORTHERN', 'Burera', 'Kinyababa'),
(11, 'NORTHERN', 'Burera', 'Kivuye'),
(12, 'NORTHERN', 'Burera', 'Nemba'),
(13, 'NORTHERN', 'Burera', 'Rugarama'),
(14, 'NORTHERN', 'Burera', 'Rugendabari'),
(15, 'NORTHERN', 'Burera', 'Ruhunde'),
(16, 'NORTHERN', 'Burera', 'Rusarabuge'),
(17, 'NORTHERN', 'Burera', 'Rwerere'),
(18, 'NORTHERN', 'Gakenke', 'Busengo'),
(19, 'NORTHERN', 'Gakenke', 'Coko'),
(20, 'NORTHERN', 'Gakenke', 'Cyabingo'),
(21, 'NORTHERN', 'Gakenke', 'Gakenke'),
(22, 'NORTHERN', 'Gakenke', 'Gashenyi'),
(23, 'NORTHERN', 'Gakenke', 'Mugunga'),
(24, 'NORTHERN', 'Gakenke', 'Janja'),
(25, 'NORTHERN', 'Gakenke', 'Kamubuga'),
(26, 'NORTHERN', 'Gakenke', 'Karambo'),
(27, 'NORTHERN', 'Gakenke', 'Kivuruga'),
(28, 'NORTHERN', 'Gakenke', 'Mataba'),
(29, 'NORTHERN', 'Gakenke', 'Minazi'),
(30, 'NORTHERN', 'Gakenke', 'Muhondo'),
(31, 'NORTHERN', 'Gakenke', 'Muyongwe'),
(32, 'NORTHERN', 'Gakenke', 'Muzo'),
(33, 'NORTHERN', 'Gakenke', 'Nemba'),
(34, 'NORTHERN', 'Gakenke', 'Ruli'),
(35, 'NORTHERN', 'Gakenke', 'Rusasa'),
(36, 'NORTHERN', 'Gakenke', 'Rushashi'),
(37, 'NORTHERN', 'Gicumbi', 'Bukure'),
(38, 'NORTHERN', 'Gicumbi', 'Bwisige'),
(39, 'NORTHERN', 'Gicumbi', 'Byumba'),
(40, 'NORTHERN', 'Gicumbi', 'Cyumba'),
(41, 'NORTHERN', 'Gicumbi', 'Giti'),
(42, 'NORTHERN', 'Gicumbi', 'Kaniga'),
(43, 'NORTHERN', 'Gicumbi', 'Manyagiro'),
(44, 'NORTHERN', 'Gicumbi', 'Miyove'),
(45, 'NORTHERN', 'Gicumbi', 'Kageyo'),
(46, 'NORTHERN', 'Gicumbi', 'Mukarange'),
(47, 'NORTHERN', 'Gicumbi', 'Muko'),
(48, 'NORTHERN', 'Gicumbi', 'Mutete'),
(49, 'NORTHERN', 'Gicumbi', 'Nyamiyaga'),
(50, 'NORTHERN', 'Gicumbi', 'Nyankenke'),
(51, 'NORTHERN', 'Gicumbi', 'Rubaya'),
(52, 'NORTHERN', 'Gicumbi', 'Rukomo'),
(53, 'NORTHERN', 'Gicumbi', 'Rushaki'),
(54, 'NORTHERN', 'Gicumbi', 'Rutare'),
(55, 'NORTHERN', 'Gicumbi', 'Ruvune'),
(56, 'NORTHERN', 'Gicumbi', 'Rwamiko'),
(57, 'NORTHERN', 'Gicumbi', 'Shangasha'),
(58, 'NORTHERN', 'Musanze', 'Busogo'),
(59, 'NORTHERN', 'Musanze', 'Cyuve'),
(60, 'NORTHERN', 'Musanze', 'Gacaca'),
(61, 'NORTHERN', 'Musanze', 'Gashaki'),
(62, 'NORTHERN', 'Musanze', 'Gataraga'),
(63, 'NORTHERN', 'Musanze', 'Kimonyi'),
(64, 'NORTHERN', 'Musanze', 'Kinigi'),
(65, 'NORTHERN', 'Musanze', 'Muhoza'),
(66, 'NORTHERN', 'Musanze', 'Muko'),
(67, 'NORTHERN', 'Musanze', 'Musanze'),
(68, 'NORTHERN', 'Musanze', 'Nkotsi'),
(69, 'NORTHERN', 'Musanze', 'Nyange'),
(70, 'NORTHERN', 'Musanze', 'Remera'),
(71, 'NORTHERN', 'Musanze', 'Rwaza'),
(72, 'NORTHERN', 'Musanze', 'Shingiro'),
(73, 'NORTHERN', 'Rulindo', 'Base'),
(74, 'NORTHERN', 'Rulindo', 'Burega'),
(75, 'NORTHERN', 'Rulindo', 'Bushoki'),
(76, 'NORTHERN', 'Rulindo', 'Buyoga'),
(77, 'NORTHERN', 'Rulindo', 'Cyinzuzi'),
(78, 'NORTHERN', 'Rulindo', 'Cyungo'),
(79, 'NORTHERN', 'Rulindo', 'Kinihira'),
(80, 'NORTHERN', 'Rulindo', 'Kisaro'),
(81, 'NORTHERN', 'Rulindo', 'Masoro'),
(82, 'NORTHERN', 'Rulindo', 'Mbogo'),
(83, 'NORTHERN', 'Rulindo', 'Murambi'),
(84, 'NORTHERN', 'Rulindo', 'Ngoma'),
(85, 'NORTHERN', 'Rulindo', 'Ntarabana'),
(86, 'NORTHERN', 'Rulindo', 'Rukozo'),
(87, 'NORTHERN', 'Rulindo', 'Rusiga'),
(88, 'NORTHERN', 'Rulindo', 'Shyorongi'),
(89, 'NORTHERN', 'Rulindo', 'Tumba'),
(90, 'SOUTHERN', 'Gisagara', 'Gikonko'),
(91, 'SOUTHERN', 'Gisagara', 'Gishubi'),
(92, 'SOUTHERN', 'Gisagara', 'Kansi'),
(93, 'SOUTHERN', 'Gisagara', 'Kibilizi'),
(94, 'SOUTHERN', 'Gisagara', 'Kigembe'),
(95, 'SOUTHERN', 'Gisagara', 'Mamba'),
(96, 'SOUTHERN', 'Gisagara', 'Muganza'),
(97, 'SOUTHERN', 'Gisagara', 'Mugombwa'),
(98, 'SOUTHERN', 'Gisagara', 'Mukindo'),
(99, 'SOUTHERN', 'Gisagara', 'Musha'),
(100, 'SOUTHERN', 'Gisagara', 'Ndora'),
(101, 'SOUTHERN', 'Gisagara', 'Nyanza'),
(102, 'SOUTHERN', 'Gisagara', 'Save'),
(103, 'SOUTHERN', 'Huye', 'Gishamvu'),
(104, 'SOUTHERN', 'Huye', 'Karama'),
(105, 'SOUTHERN', 'Huye', 'Kigoma'),
(106, 'SOUTHERN', 'Huye', 'Kinazi'),
(107, 'SOUTHERN', 'Huye', 'Maraba'),
(108, 'SOUTHERN', 'Huye', 'Mbazi'),
(109, 'SOUTHERN', 'Huye', 'Mukura'),
(110, 'SOUTHERN', 'Huye', 'Ngoma'),
(111, 'SOUTHERN', 'Huye', 'Ruhashya'),
(112, 'SOUTHERN', 'Huye', 'Rusatira'),
(113, 'SOUTHERN', 'Huye', 'Rwaniro'),
(114, 'SOUTHERN', 'Huye', 'Simbi'),
(115, 'SOUTHERN', 'Huye', 'Tumba'),
(116, 'SOUTHERN', 'Huye', 'Huye'),
(117, 'SOUTHERN', 'Kamonyi', 'Gacurabwenge'),
(118, 'SOUTHERN', 'Kamonyi', 'Karama'),
(119, 'SOUTHERN', 'Kamonyi', 'Kayenzi'),
(120, 'SOUTHERN', 'Kamonyi', 'Kayumbu'),
(121, 'SOUTHERN', 'Kamonyi', 'Mugina'),
(122, 'SOUTHERN', 'Kamonyi', 'Musambira'),
(123, 'SOUTHERN', 'Kamonyi', 'Ngamba'),
(124, 'SOUTHERN', 'Kamonyi', 'Nyamiyaga'),
(125, 'SOUTHERN', 'Kamonyi', 'Nyarubaka'),
(126, 'SOUTHERN', 'Kamonyi', 'Rugalika'),
(127, 'SOUTHERN', 'Kamonyi', 'Rukoma'),
(128, 'SOUTHERN', 'Kamonyi', 'Runda'),
(129, 'SOUTHERN', 'Muhanga', 'Cyeza'),
(130, 'SOUTHERN', 'Muhanga', 'Kabacuzi'),
(131, 'SOUTHERN', 'Muhanga', 'Kibangu'),
(132, 'SOUTHERN', 'Muhanga', 'Kiyumba'),
(133, 'SOUTHERN', 'Muhanga', 'Muhanga'),
(134, 'SOUTHERN', 'Muhanga', 'Mushishiro'),
(135, 'SOUTHERN', 'Muhanga', 'Nyabinoni'),
(136, 'SOUTHERN', 'Muhanga', 'Nyamabuye'),
(137, 'SOUTHERN', 'Muhanga', 'Nyarusange'),
(138, 'SOUTHERN', 'Muhanga', 'Rongi'),
(139, 'SOUTHERN', 'Muhanga', 'Rugendabari'),
(140, 'SOUTHERN', 'Muhanga', 'Shyogwe'),
(141, 'SOUTHERN', 'Nyamagabe', 'Buruhukiro'),
(142, 'SOUTHERN', 'Nyamagabe', 'Cyanika'),
(143, 'SOUTHERN', 'Nyamagabe', 'Gatare'),
(144, 'SOUTHERN', 'Nyamagabe', 'Kaduha'),
(145, 'SOUTHERN', 'Nyamagabe', 'Kamegeli'),
(146, 'SOUTHERN', 'Nyamagabe', 'Kibirizi'),
(147, 'SOUTHERN', 'Nyamagabe', 'Kibumbwe'),
(148, 'SOUTHERN', 'Nyamagabe', 'Kitabi'),
(149, 'SOUTHERN', 'Nyamagabe', 'Mbazi'),
(150, 'SOUTHERN', 'Nyamagabe', 'Mugano'),
(151, 'SOUTHERN', 'Nyamagabe', 'Musange'),
(152, 'SOUTHERN', 'Nyamagabe', 'Musebeya'),
(153, 'SOUTHERN', 'Nyamagabe', 'Mushubi'),
(154, 'SOUTHERN', 'Nyamagabe', 'Nkomane'),
(155, 'SOUTHERN', 'Nyamagabe', 'Gasaka'),
(156, 'SOUTHERN', 'Nyamagabe', 'Tare'),
(157, 'SOUTHERN', 'Nyamagabe', 'Uwinkingi'),
(158, 'SOUTHERN', 'Nyanza', 'Busasamana'),
(159, 'SOUTHERN', 'Nyanza', 'Busoro'),
(160, 'SOUTHERN', 'Nyanza', 'Cyabakamyi'),
(161, 'SOUTHERN', 'Nyanza', 'Kibirizi'),
(162, 'SOUTHERN', 'Nyanza', 'Kigoma'),
(163, 'SOUTHERN', 'Nyanza', 'Mukingo'),
(164, 'SOUTHERN', 'Nyanza', 'Rwabicuma'),
(165, 'SOUTHERN', 'Nyanza', 'Muyira'),
(166, 'SOUTHERN', 'Nyanza', 'Ntyazo'),
(167, 'SOUTHERN', 'Nyanza', 'Nyagisozi'),
(168, 'SOUTHERN', 'Nyaruguru', 'Cyahinda'),
(169, 'SOUTHERN', 'Nyaruguru', 'Busanze'),
(170, 'SOUTHERN', 'Nyaruguru', 'kibeho'),
(171, 'SOUTHERN', 'Nyaruguru', 'Mata'),
(172, 'SOUTHERN', 'Nyaruguru', 'Munini'),
(173, 'SOUTHERN', 'Nyaruguru', 'Kivu'),
(174, 'SOUTHERN', 'Nyaruguru', 'Ngera'),
(175, 'SOUTHERN', 'Nyaruguru', 'Ngoma'),
(176, 'SOUTHERN', 'Nyaruguru', 'Nyabimata'),
(177, 'SOUTHERN', 'Nyaruguru', 'Nyagisozi'),
(178, 'SOUTHERN', 'Nyaruguru', 'Ruheru'),
(179, 'SOUTHERN', 'Nyaruguru', 'Muganza'),
(180, 'SOUTHERN', 'Nyaruguru', 'Ruramba'),
(181, 'SOUTHERN', 'Nyaruguru', 'Rusenge'),
(182, 'SOUTHERN', 'Ruhango', 'Bweramana'),
(183, 'SOUTHERN', 'Ruhango', 'Byimana'),
(184, 'SOUTHERN', 'Ruhango', 'Kabagari'),
(185, 'SOUTHERN', 'Ruhango', 'Kinazi'),
(186, 'SOUTHERN', 'Ruhango', 'Kinihira'),
(187, 'SOUTHERN', 'Ruhango', 'Mbuye'),
(188, 'SOUTHERN', 'Ruhango', 'Mwendo'),
(189, 'SOUTHERN', 'Ruhango', 'Ntongwe'),
(190, 'SOUTHERN', 'Ruhango', 'Ruhango'),
(191, 'EASTERN', 'Bugesera', 'Gashora'),
(192, 'EASTERN', 'Bugesera', 'Juru'),
(193, 'EASTERN', 'Bugesera', 'Kamabuye'),
(194, 'EASTERN', 'Bugesera', 'Ntarama'),
(195, 'EASTERN', 'Bugesera', 'Mareba'),
(196, 'EASTERN', 'Bugesera', 'Mayange'),
(197, 'EASTERN', 'Bugesera', 'Musenyi'),
(198, 'EASTERN', 'Bugesera', 'Mwogo'),
(199, 'EASTERN', 'Bugesera', 'Ngeruka'),
(200, 'EASTERN', 'Bugesera', 'Nyamata'),
(201, 'EASTERN', 'Bugesera', 'Nyarugenge'),
(202, 'EASTERN', 'Bugesera', 'Rilima'),
(203, 'EASTERN', 'Bugesera', 'Ruhuha'),
(204, 'EASTERN', 'Bugesera', 'Rweru'),
(205, 'EASTERN', 'Bugesera', 'Shyara'),
(206, 'EASTERN', 'Gatsibo', 'Gasange'),
(207, 'EASTERN', 'Gatsibo', 'Gatsibo'),
(208, 'EASTERN', 'Gatsibo', 'Gitoki'),
(209, 'EASTERN', 'Gatsibo', 'Kabarore'),
(210, 'EASTERN', 'Gatsibo', 'Kageyo'),
(211, 'EASTERN', 'Gatsibo', 'Kiramuruzi'),
(212, 'EASTERN', 'Gatsibo', 'Kiziguro'),
(213, 'EASTERN', 'Gatsibo', 'Muhura'),
(214, 'EASTERN', 'Gatsibo', 'Murambi'),
(215, 'EASTERN', 'Gatsibo', 'Ngarama'),
(216, 'EASTERN', 'Gatsibo', 'Nyagihanga'),
(217, 'EASTERN', 'Gatsibo', 'Remera'),
(218, 'EASTERN', 'Gatsibo', 'Rugarama'),
(219, 'EASTERN', 'Gatsibo', 'Rwimbogo'),
(220, 'EASTERN', 'Kayonza', 'Gahini'),
(221, 'EASTERN', 'Kayonza', 'Kabare'),
(222, 'EASTERN', 'Kayonza', 'Kabarondo'),
(223, 'EASTERN', 'Kayonza', 'Mukarange'),
(224, 'EASTERN', 'Kayonza', 'Murama'),
(225, 'EASTERN', 'Kayonza', 'Murundi'),
(226, 'EASTERN', 'Kayonza', 'Mwiri'),
(227, 'EASTERN', 'Kayonza', 'Ndego'),
(228, 'EASTERN', 'Kayonza', 'Nyamirama'),
(229, 'EASTERN', 'Kayonza', 'Rukara'),
(230, 'EASTERN', 'Kayonza', 'Ruramira'),
(231, 'EASTERN', 'Kayonza', 'Rwinkwavu'),
(232, 'EASTERN', 'Kirehe', 'Gahara'),
(233, 'EASTERN', 'Kirehe', 'Gatore'),
(234, 'EASTERN', 'Kirehe', 'Kigina'),
(235, 'EASTERN', 'Kirehe', 'Kirehe'),
(236, 'EASTERN', 'Kirehe', 'Mahama'),
(237, 'EASTERN', 'Kirehe', 'Mpaanga'),
(238, 'EASTERN', 'Kirehe', 'Musaza'),
(239, 'EASTERN', 'Kirehe', 'Mushikiri'),
(240, 'EASTERN', 'Kirehe', 'Naasho'),
(241, 'EASTERN', 'Kirehe', 'Nyamugari'),
(242, 'EASTERN', 'Kirehe', 'Nyarubuye'),
(243, 'EASTERN', 'Kirehe', 'Kigarama'),
(244, 'EASTERN', 'Ngoma', 'Gashanda'),
(245, 'EASTERN', 'Ngoma', 'Jarama'),
(246, 'EASTERN', 'Ngoma', 'Karembo'),
(247, 'EASTERN', 'Ngoma', 'Kazo'),
(248, 'EASTERN', 'Ngoma', 'Kibungo'),
(249, 'EASTERN', 'Ngoma', 'Mugesera'),
(250, 'EASTERN', 'Ngoma', 'Murama'),
(251, 'EASTERN', 'Ngoma', 'Mutenderi'),
(252, 'EASTERN', 'Ngoma', 'Remera'),
(253, 'EASTERN', 'Ngoma', 'Rukira'),
(254, 'EASTERN', 'Ngoma', 'Rukumberi'),
(255, 'EASTERN', 'Ngoma', 'Rurenge'),
(256, 'EASTERN', 'Ngoma', 'Sake'),
(257, 'EASTERN', 'Ngoma', 'Zaza'),
(258, 'EASTERN', 'Nyagatare', 'Gatunda'),
(259, 'EASTERN', 'Nyagatare', 'Kiyombe'),
(260, 'EASTERN', 'Nyagatare', 'Karama'),
(261, 'EASTERN', 'Nyagatare', 'Karangazi'),
(262, 'EASTERN', 'Nyagatare', 'Katabagemu'),
(263, 'EASTERN', 'Nyagatare', 'Matimba'),
(264, 'EASTERN', 'Nyagatare', 'Mimuli'),
(265, 'EASTERN', 'Nyagatare', 'Mukama'),
(266, 'EASTERN', 'Nyagatare', 'Musheli'),
(267, 'EASTERN', 'Nyagatare', 'Nyagatare'),
(268, 'EASTERN', 'Nyagatare', 'Rukomo'),
(269, 'EASTERN', 'Nyagatare', 'Rwempasha'),
(270, 'EASTERN', 'Nyagatare', 'Rwimiyaga'),
(271, 'EASTERN', 'Nyagatare', 'Tabagwe'),
(272, 'EASTERN', 'Rwamagana', 'Fumbwe'),
(273, 'EASTERN', 'Rwamagana', 'Gahengeri'),
(274, 'EASTERN', 'Rwamagana', 'Gishari'),
(275, 'EASTERN', 'Rwamagana', 'Karenge'),
(276, 'EASTERN', 'Rwamagana', 'Kigabiro'),
(277, 'EASTERN', 'Rwamagana', 'Muhazi'),
(278, 'EASTERN', 'Rwamagana', 'Munyaga'),
(279, 'EASTERN', 'Rwamagana', 'Munyiginya'),
(280, 'EASTERN', 'Rwamagana', 'Musha'),
(281, 'EASTERN', 'Rwamagana', 'Muyumbu'),
(282, 'EASTERN', 'Rwamagana', 'Mwulire'),
(283, 'EASTERN', 'Rwamagana', 'Nyakariro'),
(284, 'EASTERN', 'Rwamagana', 'Nzige'),
(285, 'EASTERN', 'Rwamagana', 'Rubona'),
(286, 'KIGALI', 'Gasabo', 'Bumbogo'),
(287, 'KIGALI', 'Gasabo', 'Gatsata'),
(288, 'KIGALI', 'Gasabo', 'Jali'),
(289, 'KIGALI', 'Gasabo', 'Gikomero'),
(290, 'KIGALI', 'Gasabo', 'Gisozi'),
(291, 'KIGALI', 'Gasabo', 'Jabana'),
(292, 'KIGALI', 'Gasabo', 'Kinyinya'),
(293, 'KIGALI', 'Gasabo', 'Ndera'),
(294, 'KIGALI', 'Gasabo', 'Nduba'),
(295, 'KIGALI', 'Gasabo', 'Rusororo'),
(296, 'KIGALI', 'Gasabo', 'Rutunga'),
(297, 'KIGALI', 'Gasabo', 'Kacyiru'),
(298, 'KIGALI', 'Gasabo', 'Kimihurura'),
(299, 'KIGALI', 'Gasabo', 'Kimironko'),
(300, 'KIGALI', 'Gasabo', 'Remera'),
(301, 'KIGALI', 'Kicukiro', 'Gahanga'),
(302, 'KIGALI', 'Kicukiro', 'Gatenga'),
(303, 'KIGALI', 'Kicukiro', 'Gikondo'),
(304, 'KIGALI', 'Kicukiro', 'Kagarama'),
(305, 'KIGALI', 'Kicukiro', 'Kanombe'),
(306, 'KIGALI', 'Kicukiro', 'Kicukiro'),
(307, 'KIGALI', 'Kicukiro', 'Kigarama'),
(308, 'KIGALI', 'Kicukiro', 'Masaka'),
(309, 'KIGALI', 'Kicukiro', 'Niboye'),
(310, 'KIGALI', 'Kicukiro', 'Nyarugunga'),
(311, 'KIGALI', 'Nyarugenge', 'Gitega'),
(312, 'KIGALI', 'Nyarugenge', 'Kanyinya'),
(313, 'KIGALI', 'Nyarugenge', 'KIGALI'),
(314, 'KIGALI', 'Nyarugenge', 'Kimisagara'),
(315, 'KIGALI', 'Nyarugenge', 'Mageragere'),
(316, 'KIGALI', 'Nyarugenge', 'Muhima'),
(317, 'KIGALI', 'Nyarugenge', 'Nyakabanda'),
(318, 'KIGALI', 'Nyarugenge', 'Nyamirambo'),
(319, 'KIGALI', 'Nyarugenge', 'Rwezamenyo'),
(320, 'KIGALI', 'Nyarugenge', 'Nyarugenge'),
(321, 'WESTERN', 'Karongi', 'Bwishyura'),
(322, 'WESTERN', 'Karongi', 'Gishari'),
(323, 'WESTERN', 'Karongi', 'Gishyita'),
(324, 'WESTERN', 'Karongi', 'Gisovu'),
(325, 'WESTERN', 'Karongi', 'Gitesi'),
(326, 'WESTERN', 'Karongi', 'Murundi'),
(327, 'WESTERN', 'Karongi', 'Murambi'),
(328, 'WESTERN', 'Karongi', 'Mubuga'),
(329, 'WESTERN', 'Karongi', 'Mutuntu'),
(330, 'WESTERN', 'Karongi', 'Rugabano'),
(331, 'WESTERN', 'Karongi', 'Ruganda'),
(332, 'WESTERN', 'Karongi', 'Rwankuba'),
(333, 'WESTERN', 'Karongi', 'Twumba'),
(334, 'WESTERN', 'Ngororero', 'Bwira'),
(335, 'WESTERN', 'Ngororero', 'Gatumba'),
(336, 'WESTERN', 'Ngororero', 'Hindiro'),
(337, 'WESTERN', 'Ngororero', 'Kabaya'),
(338, 'WESTERN', 'Ngororero', 'Kageyo'),
(339, 'WESTERN', 'Ngororero', 'Kavumu'),
(340, 'WESTERN', 'Ngororero', 'Matyazo'),
(341, 'WESTERN', 'Ngororero', 'Muhanda'),
(342, 'WESTERN', 'Ngororero', 'Muhororo'),
(343, 'WESTERN', 'Ngororero', 'Ndaro'),
(344, 'WESTERN', 'Ngororero', 'Ngororero'),
(345, 'WESTERN', 'Ngororero', 'Nyange'),
(346, 'WESTERN', 'Ngororero', 'Sovu'),
(347, 'WESTERN', 'Nyabihu', 'Bigogwe'),
(348, 'WESTERN', 'Nyabihu', 'Jenda'),
(349, 'WESTERN', 'Nyabihu', 'Jomba'),
(350, 'WESTERN', 'Nyabihu', 'Kabatwa'),
(351, 'WESTERN', 'Nyabihu', 'Karago'),
(352, 'WESTERN', 'Nyabihu', 'Kintobo'),
(353, 'WESTERN', 'Nyabihu', 'Mukamira'),
(354, 'WESTERN', 'Nyabihu', 'Muringa'),
(355, 'WESTERN', 'Nyabihu', 'Rambura'),
(356, 'WESTERN', 'Nyabihu', 'Rugera'),
(357, 'WESTERN', 'Nyabihu', 'Rurembo'),
(358, 'WESTERN', 'Nyabihu', 'Shyira'),
(359, 'WESTERN', 'Nyamasheke', 'Bushekeri'),
(360, 'WESTERN', 'Nyamasheke', 'Bushenge'),
(361, 'WESTERN', 'Nyamasheke', 'Cyato'),
(362, 'WESTERN', 'Nyamasheke', 'Gihombo'),
(363, 'WESTERN', 'Nyamasheke', 'Kagano'),
(364, 'WESTERN', 'Nyamasheke', 'Kanjongo'),
(365, 'WESTERN', 'Nyamasheke', 'Karambi'),
(366, 'WESTERN', 'Nyamasheke', 'Karengera'),
(367, 'WESTERN', 'Nyamasheke', 'Kirimbi'),
(368, 'WESTERN', 'Nyamasheke', 'Macuba'),
(369, 'WESTERN', 'Nyamasheke', 'Mahembe'),
(370, 'WESTERN', 'Nyamasheke', 'Nyabitekeri'),
(371, 'WESTERN', 'Nyamasheke', 'Rangiro'),
(372, 'WESTERN', 'Nyamasheke', 'Ruharambuga'),
(373, 'WESTERN', 'Nyamasheke', 'Shangi'),
(374, 'WESTERN', 'Rubavu', 'Bugeshi'),
(375, 'WESTERN', 'Rubavu', 'Busasamana'),
(376, 'WESTERN', 'Rubavu', 'Cyanzarwe'),
(377, 'WESTERN', 'Rubavu', 'Gisenyi'),
(378, 'WESTERN', 'Rubavu', 'Kanama'),
(379, 'WESTERN', 'Rubavu', 'Kanzenze'),
(380, 'WESTERN', 'Rubavu', 'Mudende'),
(381, 'WESTERN', 'Rubavu', 'Nyakiliba'),
(382, 'WESTERN', 'Rubavu', 'Nyamyumba'),
(383, 'WESTERN', 'Rubavu', 'Nyundo'),
(384, 'WESTERN', 'Rubavu', 'Rubavu'),
(385, 'WESTERN', 'Rubavu', 'Rugerero'),
(386, 'WESTERN', 'Rusizi', 'Bugarama'),
(387, 'WESTERN', 'Rusizi', 'Butare'),
(388, 'WESTERN', 'Rusizi', 'Bweyeye'),
(389, 'WESTERN', 'Rusizi', 'Gikundamvura'),
(390, 'WESTERN', 'Rusizi', 'Gashonga'),
(391, 'WESTERN', 'Rusizi', 'Giheke'),
(392, 'WESTERN', 'Rusizi', 'Gihundwe'),
(393, 'WESTERN', 'Rusizi', 'Gitambi'),
(394, 'WESTERN', 'Rusizi', 'Kamembe'),
(395, 'WESTERN', 'Rusizi', 'Muganza'),
(396, 'WESTERN', 'Rusizi', 'Mururu'),
(397, 'WESTERN', 'Rusizi', 'Nkanka'),
(398, 'WESTERN', 'Rusizi', 'Nkombo'),
(399, 'WESTERN', 'Rusizi', 'Nkungu'),
(400, 'WESTERN', 'Rusizi', 'Nyakabuye'),
(401, 'WESTERN', 'Rusizi', 'Nyakarenzo'),
(402, 'WESTERN', 'Rusizi', 'Nzahaha'),
(403, 'WESTERN', 'Rusizi', 'Rwimbogo'),
(404, 'WESTERN', 'Rutsiro', 'Boneza'),
(405, 'WESTERN', 'Rutsiro', 'Gihango'),
(406, 'WESTERN', 'Rutsiro', 'Kigeyo'),
(407, 'WESTERN', 'Rutsiro', 'Kivumu'),
(408, 'WESTERN', 'Rutsiro', 'Manihira'),
(409, 'WESTERN', 'Rutsiro', 'Mukura'),
(410, 'WESTERN', 'Rutsiro', 'Murunda'),
(411, 'WESTERN', 'Rutsiro', 'Musasa'),
(412, 'WESTERN', 'Rutsiro', 'Mushonyi'),
(413, 'WESTERN', 'Rutsiro', 'Mushubati'),
(414, 'WESTERN', 'Rutsiro', 'Nyabirasi'),
(415, 'WESTERN', 'Rutsiro', 'Ruhango'),
(416, 'WESTERN', 'Rutsiro', 'Rusebeya');

-- --------------------------------------------------------

--
-- Table structure for table `chadia_services`
--

CREATE TABLE `chadia_services` (
  `id` int(11) NOT NULL,
  `serv_name` varchar(20) NOT NULL,
  `serv_salon` varchar(20) NOT NULL,
  `serv_picture` text NOT NULL,
  `serv_description` text NOT NULL,
  `serv_price` int(11) NOT NULL,
  `serv_status` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  `serv_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chadia_services`
--

INSERT INTO `chadia_services` (`id`, `serv_name`, `serv_salon`, `serv_picture`, `serv_description`, `serv_price`, `serv_status`, `serv_date`) VALUES
(1, 'COOL PURPLE BRAIDS', '2', '972b50eba1700a2d007341405a99deb4.png', 'This product is meant for educational purposes only. Any resemblance to real persons, living or dead is purely coincidental. Void where prohibited. Some assembly required. List each check separately by bank number. Batteries not included.', 30000, 'ACTIVE', '2019-02-14 01:40:18'),
(2, 'MILLENIAL BRAIDS', '2', 'f7501a22bc0738aa1ac099e28c59c0d6.jpg', 'Liquorice jelly-o icing carrot cake dessert powder oat cake I love. Jujubes sugar plum I love I love cupcake cheesecake. Macaroon tootsie roll cupcake ice cream liquorice gingerbread caramels I love. Powder chupa chups cake muffin apple pie. Fruitcake tootsie roll dessert danish cotton candy sesame snaps. Jelly-o cheesecake lemon drops tart biscuit I love tootsie roll fruitcake. Halvah sweet tiramisu topping chocolate cake chocolate bar marzipan fruitcake. Sweet roll halvah marzipan lollipop ice cream. Chupa chups brownie dragÃ©e marshmallow I love powder.', 25000, 'ACTIVE', '2019-02-14 01:45:25'),
(9, 'SWAY LEE', '6', 'dc01da5ea453805f6d1a96bff404736c.jpg', 'Sesame snaps lemon drops marshmallow. Liquorice jelly sesame snaps powder tootsie roll pie. Liquorice apple pie bear claw cookie. Brownie chocolate cake carrot cake muffin chocolate. Jujubes dragÃ©e biscuit lemon drops. Pie cake tiramisu gummies sugar plum chupa chups carrot cake danish. Candy canes oat cake gummi bears pudding I love cake biscuit. DragÃ©e I love jelly chocolate bar sesame snaps dessert apple pie cotton candy macaroon. Sesame snaps lollipop I love cheesecake gummi bears bear claw. Powder cake halvah jelly beans donut cookie tart dessert I love.', 30000, 'ACTIVE', '2019-02-14 03:44:49'),
(10, 'BRIDAL STYLE', '6', '25c1af94140f4cd3a51a99a6ebed5d88.jpg', 'Liquorice jelly-o icing carrot cake dessert powder oat cake I love. Jujubes sugar plum I love I love cupcake cheesecake. Macaroon tootsie roll cupcake ice cream liquorice gingerbread caramels I love. Powder chupa chups cake muffin apple pie. Fruitcake tootsie roll dessert danish cotton candy sesame snaps. Jelly-o cheesecake lemon drops tart biscuit I love tootsie roll fruitcake. Halvah sweet tiramisu topping chocolate cake chocolate bar marzipan fruitcake. Sweet roll halvah marzipan lollipop ice cream. Chupa chups brownie dragÃ©e marshmallow I love powder.', 22500, 'ACTIVE', '2019-02-14 04:05:32'),
(11, 'WEAVED LOCKS', '6', 'abbb331891a58c53ab2e87b5b62ed66c.jpg', 'Sesame snaps lemon drops marshmallow. Liquorice jelly sesame snaps powder tootsie roll pie. Liquorice apple pie bear claw cookie. Brownie chocolate cake carrot cake muffin chocolate. Jujubes dragÃ©e biscuit lemon drops. Pie cake tiramisu gummies sugar plum chupa chups carrot cake danish. Candy canes oat cake gummi bears pudding I love cake biscuit. DragÃ©e I love jelly chocolate bar sesame snaps dessert apple pie cotton candy macaroon. Sesame snaps lollipop I love cheesecake gummi bears bear claw. Powder cake halvah jelly beans donut cookie tart dessert I love.', 45000, 'ACTIVE', '2019-02-14 04:07:06'),
(17, 'WEAVED LOCKS', '2', '12517e89b1d4eb7fe84187f9461fbcc2.jpg', 'Liquorice jelly-o icing carrot cake dessert powder oat cake I love. Jujubes sugar plum I love        Sesame snaps lemon drops marshmallow. Liquorice jelly sesame snaps powder tootsie roll pie. Liquorice apple pie bear claw cookie. Brownie chocolate cake carrot cake muffin chocolate. Jujubes dragÃ©e biscuit lemon drops. Pie cake tiramisu gummies sugar plum chupa chups carrot cake danish. Candy canes oat cake gummi bears pudding I love cake biscuit. DragÃ©e I love jelly chocolate bar sesame snaps dessert apple pie cotton candy macaroon. Sesame snaps lollipop I love cheesecake gummi bears bear claw. Powder cake halvah jelly beans donut cookie tart dessert I love.', 22500, 'ACTIVE', '2019-02-14 13:17:31'),
(18, 'TASHA COBBS', '2', '996a4fee947ebeeb30e3ea12ee48ae1b.jpg', 'Wafer caramels tart. I love toffee topping pudding pudding pie ma', 12000, 'DELETED', '2019-02-17 14:37:20'),
(19, 'AKWABA', '2', '25c1af94140f4cd3a51a99a6ebed5d88.jpg', 'Wafer caramels tart. I love toffee topping pudding pudding pie ma', 50000, 'DELETED', '2019-02-17 14:39:18'),
(20, 'GWARA GWARA', '2', 'img33.jpg', 'brb', 89000, 'DELETED', '2019-02-21 17:10:42'),
(21, 'DREADLOCKS RETOUCH', '8', 'DREADLOCKSRETOUCH.jpg', 'We do dreadlocks implants in three hours with two hairstylists working on your look, we also can retouch your ingrown hair for a perfect look. Our stylist are also trained to offer different events hairstylist', 20000, 'ACTIVE', '2019-07-24 10:57:06'),
(22, 'MANICURE AND PEDICUR', '8', 'thumbnail_large (1).jpg', 'A good manicure will clean and shape your nails and treat your cuticles, which is vital for keeping your nails healthy and strong. \r\n\r\nRegular pedicures not only help keep feet looking pretty, they also keep nails trimmed, calluses controlled and skin moisturized.', 9000, 'DELETED', '2019-07-24 11:05:15'),
(23, 'FULL BODY MASSAGE', '9', 'fullbodymassage.jpg', 'We offer full body massage for couples or single person -we have a discount for a group of four people that will be offered when you get to the saloon. -We offer discount on newly weds and birthday customers.', 15000, 'ACTIVE', '2019-08-27 12:01:08'),
(24, 'CHINESE MASSAGE', '9', 'chinesemassage.jpg', 'With our partnership to the Chinese community we offer a special hot stone massage from china. -Special Discount for newly weds.', 35000, 'ACTIVE', '2019-08-27 12:02:38'),
(25, 'INDONESIAN MASSAGE', '9', 'thumbnail_large.jpg', '-We have a special someone all the way from INDONESIA, he will be available from 22-12-2019 till 27-12-2019', 4500, 'DELETED', '2019-08-27 12:51:48'),
(26, 'MANICURE AND PEDICUR', '8', 'stilettos-african-acrylic-nails-gel-color-manicure-french-design-nail-salon-service-led-polish-opi-nail-polish-lacquer-pedicure-care-natural-healthcare-gel-nail-polish-beauty-acrylic-nai.jpg', 'We offer a range variety of  manicure and pedicure art designs.', 9000, 'ACTIVE', '2019-10-16 11:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `chadia_users`
--

CREATE TABLE `chadia_users` (
  `id` int(11) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_password` text NOT NULL,
  `u_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chadia_users`
--

INSERT INTO `chadia_users` (`id`, `u_email`, `u_password`, `u_type`) VALUES
(1, 'aadacc7b53586545b3bbbcd0ec6df44c', '081c2ce8528c443cc4be69d4096c9778', '1'),
(2, '0100e89f672f1d0b31369c6f3d768eb6', 'b993e4526238d62f6b1b90e605532ff8', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chadia_clients`
--
ALTER TABLE `chadia_clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `e_phone` (`c_phone`);

--
-- Indexes for table `chadia_employees`
--
ALTER TABLE `chadia_employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `e_phone` (`e_phone`);

--
-- Indexes for table `chadia_orders`
--
ALTER TABLE `chadia_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chadia_salons`
--
ALTER TABLE `chadia_salons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mngr_phone` (`mngr_phone`),
  ADD UNIQUE KEY `mngr_email` (`mngr_email`),
  ADD UNIQUE KEY `s_name` (`s_name`);

--
-- Indexes for table `chadia_sectors`
--
ALTER TABLE `chadia_sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chadia_services`
--
ALTER TABLE `chadia_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chadia_users`
--
ALTER TABLE `chadia_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chadia_clients`
--
ALTER TABLE `chadia_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chadia_employees`
--
ALTER TABLE `chadia_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `chadia_orders`
--
ALTER TABLE `chadia_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `chadia_salons`
--
ALTER TABLE `chadia_salons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `chadia_sectors`
--
ALTER TABLE `chadia_sectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=417;
--
-- AUTO_INCREMENT for table `chadia_services`
--
ALTER TABLE `chadia_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `chadia_users`
--
ALTER TABLE `chadia_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
