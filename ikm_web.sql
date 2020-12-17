-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 03:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikm_web`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `KODEOTOMATISRESELLER` (`nomer` INT) RETURNS CHAR(8) CHARSET utf8mb4 BEGIN
DECLARE kodebaru CHAR(8);
DECLARE urut INT;

SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("RSL", LPAD(urut, 6, 0));

RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `KODEOTOMATISUSER` (`nomer` INT) RETURNS CHAR(8) CHARSET utf8mb4 BEGIN
DECLARE kodebaru CHAR(8);
DECLARE urut INT;

SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("ADM", LPAD(urut, 6, 0));

RETURN kodebaru;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(64) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(64) NOT NULL DEFAULT 'default.jpg',
  `deskripsi` text NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `fax` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `judul`, `gambar`, `deskripsi`, `alamat`, `email`, `phone`, `fax`) VALUES
(2, 'IKM', '2.jpg', '<p>ini adalah tentang hahahahaha akamdhdssnssjsndjbd,dhnfjddmdkdkdmdnfjfk nnnnn</p>\r\n', 'Gembong Kedungwuni Pekalongan', 'fajar2943@gmail.com', '082158863345', '085879056017');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `bidang_id` varchar(64) NOT NULL,
  `bidang_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`bidang_id`, `bidang_name`) VALUES
('BD_5f68beb9454c4', 'Poli Klinik'),
('BD_5f7351fcca5db', 'poli rules');

-- --------------------------------------------------------

--
-- Table structure for table `emot`
--

CREATE TABLE `emot` (
  `emot_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_emot` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emot`
--

INSERT INTO `emot` (`emot_id`, `name`, `image_emot`) VALUES
('EM_5f6cb7afd7824', 'amat baik', 'EM_5f6cb7afd7824.png'),
('EM_5f6cb9f07110a', 'baik', 'EM_5f6cb9f07110a.png'),
('EM_5f6cba296d2a0', 'cukup', 'EM_5f6cba296d2a0.png'),
('EM_5f6cba4d9eab0', 'kurang', 'EM_5f6cba4d9eab0.png');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `penilaian_id` varchar(64) NOT NULL,
  `pertanyaan_id` varchar(64) NOT NULL,
  `emot_id` varchar(64) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `jumlah` int(64) NOT NULL,
  `pindah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`penilaian_id`, `pertanyaan_id`, `emot_id`, `tgl`, `jumlah`, `pindah`) VALUES
('PN_5f70b2d430ec8', 'PT_5f68c84d9d6d1', 'EM_5f6cb7afd7824', '2020-09-27 15:42:12', 6, '2020-09-27'),
('PN_5f70bf8b8a9c8', 'PT_5f68c84d9d6d1', 'EM_5f6cb9f07110a', '2020-09-27 16:36:27', 4, '2020-09-27'),
('PN_5f70bfe5844e3', 'PT_5f68c84d9d6d1', 'EM_5f6cba296d2a0', '2020-09-27 16:37:57', 2, '2020-09-27'),
('PN_5f70ca828c51a', 'PT_5f68c84d9d6d1', 'EM_5f6cba4d9eab0', '2020-09-27 17:23:14', 1, '2020-09-27'),
('PN_5fd4b30abd8af', 'PT_5f68c84d9d6d1', 'EM_5f6cba296d2a0', '2020-12-12 12:09:46', 6, '2020-12-12'),
('PN_5fd4de9b5b5a5', 'PT_5f68c84d9d6d1', 'EM_5f6cba4d9eab0', '2020-12-12 15:15:39', 7, '2020-12-12'),
('PN_5fd4df73a3ac0', 'PT_5f73521c59ddd', 'EM_5f6cb7afd7824', '2020-12-12 15:19:15', 10, '2020-12-12'),
('PN_5fd4e184c3b7d', 'PT_5f68c84d9d6d1', 'EM_5f6cb9f07110a', '2020-12-12 15:28:04', 5, '2020-12-12'),
('PN_5fd50a6518d9d', 'PT_5f68c84d9d6d1', 'EM_5f6cb7afd7824', '2020-12-12 18:22:29', 2, '2020-12-12'),
('PN_5fd50b1722f0c', 'PT_5f73521c59ddd', 'EM_5f6cba4d9eab0', '2020-12-12 18:25:27', 1, '2020-12-12'),
('PN_5fd50b333cbd4', 'PT_5f73521c59ddd', 'EM_5f6cba296d2a0', '2020-12-12 18:25:55', 1, '2020-12-12'),
('PN_5fd50cbba53fd', 'PT_5f73521c59ddd', 'EM_5f6cb9f07110a', '2020-12-12 18:32:27', 2, '2020-12-12'),
('PN_5fd58f464336a', 'PT_5f68c84d9d6d1', 'EM_5f6cb9f07110a', '2020-12-13 03:49:26', 2, '2020-12-13'),
('PN_5fd58f6dbe74e', 'PT_5f73521c59ddd', 'EM_5f6cb9f07110a', '2020-12-13 03:50:05', 2, '2020-12-13'),
('PN_5fd58f9f8d2d3', 'PT_5f73521c59ddd', 'EM_5f6cba296d2a0', '2020-12-13 03:50:55', 1, '2020-12-13'),
('PN_5fdb36fc6a268', 'PT_5f73521c59ddd', 'EM_5f6cba296d2a0', '2020-12-17 10:46:20', 1, '2020-12-17'),
('PN_5fdb372bd7944', 'PT_5f73521c59ddd', 'EM_5f6cb7afd7824', '2020-12-17 10:47:07', 2, '2020-12-17'),
('PN_5fdb374b7c134', 'PT_5f68c84d9d6d1', 'EM_5f6cb7afd7824', '2020-12-17 10:47:39', 1, '2020-12-17'),
('PN_5fdb6732785b8', 'PT_5f68c84d9d6d1', 'EM_5f6cba296d2a0', '2020-12-17 14:12:02', 1, '2020-12-17'),
('PN_5fdb679050117', 'PT_5f73521c59ddd', 'EM_5f6cba4d9eab0', '2020-12-17 14:13:36', 2, '2020-12-17'),
('PN_5fdb67dd821fa', 'PT_5f68c84d9d6d1', 'EM_5f6cba4d9eab0', '2020-12-17 14:14:53', 1, '2020-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `pertanyaan_id` varchar(64) NOT NULL,
  `name` text NOT NULL,
  `bidang_id` varchar(62) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`pertanyaan_id`, `name`, `bidang_id`) VALUES
('PT_5f68c84d9d6d1', 'Bagaimana tanggapan anda tentang pelayanan poli klinik kami?', 'BD_5f68beb9454c4'),
('PT_5f6cc435749f8', 'Bagaimana pendapat anda dengan pelayanan poli umum kami?', 'BD_5f6cc3f23a2b3'),
('PT_5f734d1eb75b4', 'ini adalah pertanyaan untuk dicoba', ''),
('PT_5f73521c59ddd', 'pertanyaan poli rules', 'BD_5f7351fcca5db');

--
-- Triggers `pertanyaan`
--
DELIMITER $$
CREATE TRIGGER `arsip` AFTER DELETE ON `pertanyaan` FOR EACH ROW BEGIN
  INSERT INTO arsips
        (       arsip_id,
                name,
                price,
                stok,
                kategori_id,
                image,
                description
        )
  VALUES
        (       OLD.product_id,
                OLD.name,
                OLD.price,
         		OLD.stok,
                OLD.kategori_id,
                OLD.image,
                OLD.description
        );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','super') NOT NULL DEFAULT 'super',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk menyimpan data user';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `last_login`, `created_at`, `is_active`) VALUES
(1, 'admin', '$2y$10$tonZkQrnGnp9n38rWeMTieLPNxtDfvy4Z/35Q4rlFObsm/xFnSae.', 'admin@gmail.com', 'super', '2020-12-17 13:21:04', '2020-09-19 05:43:20', 0),
(9, 'fajar', '$2y$10$.QdQMQheItpbf2mFSZj9QuBQg9vUkv2wcYw8BuB4rOhBgQriauMvm', 'fajar2943@gmail.com', 'admin', '2020-09-20 17:31:50', '2020-09-20 17:29:21', 0),
(10, 'kalang', '$2y$10$7g3iRdHbmwXX2VVZg2Kh.OXxQI.6GXfmT4prFMVVY2nrEVrF6.Rpy', 'kalang@gmail.com', 'admin', '2020-12-17 13:30:55', '2020-12-17 12:36:58', 0);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `KODEOTOMATIS` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
DECLARE s VARCHAR(8);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(user_id,3,6) AS Nomer
FROM users ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT KODEOTOMATISUSER(i));
 
IF(NEW.user_id IS NULL OR NEW.user_id = '')
 THEN SET NEW.user_id =s;
END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`bidang_id`);

--
-- Indexes for table `emot`
--
ALTER TABLE `emot`
  ADD PRIMARY KEY (`emot_id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`penilaian_id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`pertanyaan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
