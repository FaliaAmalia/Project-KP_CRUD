-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 Jul 2019 pada 11.20
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_guestapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nik` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nik`, `password`, `name`, `image`) VALUES
(1, 'auwfar', 'f0a047143d1da15b630c73f0256d5db0', 'Achmad Chadil Auwfar', 'Koala.jpg'),
(2, 'ozil', 'f4e404c7f815fc68e7ce8e3c2e61e347', 'Mesut ', 'profil2.jpg'),
(3, 'za', 'e10adc3949ba59abbe56e057f20f883e', 'vanza', 'Screen_Shot_2019-04-29_at_10_54_561.png'),
(4, 'admin27', 'f54dbca7c35255d2296c40d6766e63ad', 'admin27', 'baru1.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `appointment`
--

CREATE TABLE `appointment` (
  `id_appointment` int(11) NOT NULL,
  `id` varchar(15) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `company` varchar(30) NOT NULL,
  `id_type` varchar(20) NOT NULL,
  `id_num` varchar(20) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `interest` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` enum('Reschedule','Accepted','Rejected','Waiting Confirmation','') DEFAULT NULL,
  `qr_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `appointment`
--

INSERT INTO `appointment` (`id_appointment`, `id`, `fullname`, `company`, `id_type`, `id_num`, `id_employee`, `image`, `interest`, `datetime`, `email`, `phone`, `status`, `qr_code`) VALUES
(1, '2904190001', 'RIo Pambudhi', 'Politeknik Negeri Padang', 'KTP', '21312312', 74, 'image_1556507378.png', 'sadsadas', '2019-04-29 03:09:41', 'riopambudhi51@gmail.com', '082383010098', 'Accepted', '2904190001.png'),
(2, '2904190002', 'RIo Pambudhi', 'Politeknik Negeri Padang', 'KTP', '21312312', 74, 'image_1556507530.png', 'sdadadsad', '2019-04-29 03:12:12', 'riopambudhi51@gmail.com', '082383010098', 'Reschedule', '2904190002.png'),
(3, '2904190003', 'RIo Pambudhi', 'Politeknik Negeri Padang', 'KTP', '21312312', 74, 'image_1556507987.png', 'sdadasd', '2019-04-29 03:20:02', 'riopambudhi51@gmail.com', '082383010098', 'Rejected', '2904190003.png'),
(4, '2904190004', 'RIo Pambudhi', 'Politeknik Negeri Padang', 'KTP', '21312312', 74, 'image_1556508058.png', 'sdadsadasdsa', '2019-04-29 03:21:04', 'riopambudhi51@gmail.com', '082383010098', 'Rejected', '2904190004.png'),
(5, '2904190005', 'RIo Pambudhi', 'Politeknik Negeri Padang', 'KTP', '21312312', 74, 'image_1556509072.png', 'sdadada', '2019-04-29 03:37:54', 'riopambudhi51@gmail.com', '082383010098', 'Reschedule', '2904190005.png'),
(6, '2904190006', 'RIo Pambudhi', 'Politeknik Negeri Padang', 'KTP', '21312312', 74, 'image_1556509753.png', 'dsadadaas', '2019-04-29 03:49:16', 'riopambudhi51@gmail.com', '082383010098', 'Rejected', '2904190006.png'),
(7, '2904190007', 'RIo Pambudhi', 'Politeknik Negeri Padang', 'KTP', '21312312', 74, 'image_1556509869.png', 'sdadadad', '2019-04-29 03:51:11', 'riopambudhi51@gmail.com', '082383010098', 'Reschedule', '2904190007.png'),
(8, '2904190008', 'RIo Pambudhi', 'Politeknik Negeri Padang', 'KTP', '21312312', 74, 'image_1556509988.png', 'dsadadsad', '2019-04-29 03:53:20', 'riopambudhi51@gmail.com', '082383010098', 'Waiting Confirmation', '2904190008.png'),
(9, '2904190009', 'RIo Pambudhi', 'Politeknik Negeri Padang', 'KTP', '21312312', 74, 'image_1556511445.png', 'sdadad', '2019-04-29 04:17:27', 'riopambudhi51@gmail.com', '082383010098', 'Waiting Confirmation', '2904190009.png'),
(10, '2904190010', 'RIo Pambudhi', 'Politeknik Negeri Padang', 'KTP', '21312312', 74, 'image_1556523709.png', 'Kerjasama ', '2019-04-29 07:41:56', 'riopambudhi51@gmail.com', '082383010098', 'Waiting Confirmation', '2904190010.png'),
(11, '2904190011', 'RIo Pambudhi', 'Politeknik Negeri Padang', 'KTP', '21312312', 80, 'image_1556524726.png', 'Kerjasama antar kampus dengan perusahaan', '2019-04-29 07:58:53', 'riopambudhi51@gmail.com', '082383010098', 'Accepted', '2904190011.png'),
(12, '0205190001', 'Abu Keisha', 'PT Satu Dua Tiga', 'KTP', '31515151515151', 79, 'image_1556791812.png', 'Konsultasi', '2019-05-02 10:10:20', 'huzaiman.rauf@gmail.com', '085232555222', 'Waiting Confirmation', '0205190001.png'),
(13, '0205190002', 'Abu Keisha', 'PT Satu Dua Tiga', 'Choose your identity', '31515151515151', 81, 'image_1556792917.png', 'konsultasi', '2019-05-02 10:28:45', 'huzaiman.rauf@gmail.com', '085232555222', 'Waiting Confirmation', '0205190002.png'),
(14, '0205190003', 'Budiman', 'Bank Mandiri', 'KTP', '137519129292323', 74, 'image_1556793123.png', 'kerjasama dengan perusahaan', '2019-05-02 10:32:06', 'budiman@gmail.com', '085219232211', 'Waiting Confirmation', '0205190003.png'),
(15, '1305190001', 'Rifka esofita', 'Infomedia', 'KTP', '0978767', 79, 'image_1557711002.png', 'hjgjygyh', '2019-05-13 01:30:10', 'rifkaesofita@gmail.com', '0899767', 'Waiting Confirmation', '1305190001.png'),
(16, '1305190002', 'Rifka esofita', 'Politeknik Negeri Padang', 'Choose your identity', '21312312', 74, 'image_1557715137.png', 'hsdfhuheuwf', '2019-05-13 02:39:12', 'riopambudhi51@gmail.com', '082383010098', 'Reschedule', '1305190002.png'),
(17, '1605190001', 'Titi Kamal', 'PT Infomedia Nusantara', 'KTP', '2131231223', 78, 'image_1558010951.png', 'Meeting', '2019-05-16 12:49:24', 'rifkaesofita@gmail.com', '081267252427', 'Waiting Confirmation', '1605190001.png'),
(18, '1605190002', 'Stephany Widyanti', 'Unbraw', 'KTP', '123456', 87, 'image_1558011292.png', 'Intership', '2019-05-16 12:54:58', 'stephany@gmail.com', '08521873847', 'Waiting Confirmation', '1605190002.png'),
(19, '2005190001', 'Titi Kamal', 'PT Infomedia Nusantara', 'Choose your identity', '2131231223', 87, 'image_1558328259.png', 'Pemberian Dokumen', '2019-05-20 04:57:42', 'titikamal@gmail.com', '081267252427', 'Rejected', '2005190001.png'),
(20, '2005190002', 'Stephany Widyanti', 'MRT', 'SIM', '927364547', 87, 'image_1558330974.png', 'Meeting', '2019-05-20 05:43:20', 'stephany@gmail.com', '087246473728', 'Accepted', '2005190002.png'),
(21, '2005190003', 'Titi Kamal', 'PT Infomedia Nusantara', 'KTP', '2131231223', 87, 'image_1558341696.png', 'Show', '2019-05-20 08:41:43', 'rifkaesofita@gmail.com', '081267252427', 'Waiting Confirmation', '2005190003.png'),
(22, '2005190004', 'Tata', 'Infomedia', 'KTP', '1234567', 87, 'image_1558341869.png', 'Seminar', '2019-05-20 08:44:36', 'tata@gmail.com', '085218558248', 'Waiting Confirmation', '2005190004.png'),
(23, '2205190001', 'Titi Kamal', 'PT Infomedia Nusantara', 'KTP', '2131231223', 87, 'image_1558501245.png', 'Intership', '2019-05-22 05:00:47', 'rifkaesofita@gmail.com', '081267252427', 'Reschedule', '2205190001.png'),
(24, '2205190002', 'Tinatun', 'Politeknik Negeri Padang', 'KTP', '27458687', 87, 'image_1558501844.png', 'Seminar', '2019-05-22 05:10:50', 'tina@gmail.com', '085218558248', 'Waiting Confirmation', '2205190002.png'),
(25, '2205190003', 'Titi Kamal', 'PT Infomedia Nusantara', 'KTP', '2131231223', 87, 'image_1558501913.png', 'Seminar', '2019-05-22 05:11:56', 'rifkaesofita@gmail.com', '081267252427', 'Waiting Confirmation', '2205190003.png'),
(26, '2305190001', 'Tania Fajrika', 'Universitas Andalas', 'KTP', '13172232112332133', 79, 'image_1558569293.png', 'Membahas tentang kerjasama antara kampus dengan perusahan infomedia', '2019-05-22 23:54:55', 'taniafajrika12@gmail.com', '0811232112', 'Waiting Confirmation', '2305190001.png'),
(27, '2805190001', 'talit', 'telu', 'KTP', '132116584684', 74, 'image_1559012930.png', 'berkunjung', '2019-05-28 03:08:53', 'erlinuma@gmail.com', '0811111111', 'Waiting Confirmation', '2805190001.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `delivery`
--

CREATE TABLE `delivery` (
  `id_delivery` varchar(20) NOT NULL,
  `type_deliv` varchar(100) NOT NULL,
  `sub_type` varchar(100) NOT NULL,
  `no_resi` varchar(20) NOT NULL,
  `nik_pegawai` varchar(100) NOT NULL,
  `jmlh_barang` int(10) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `front_desk` varchar(100) NOT NULL,
  `deliv_status` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_barang` varchar(20) NOT NULL,
  `id_subtype_vendor` int(11) NOT NULL,
  `id_type_vendor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `delivery`
--

INSERT INTO `delivery` (`id_delivery`, `type_deliv`, `sub_type`, `no_resi`, `nik_pegawai`, `jmlh_barang`, `jenis_barang`, `front_desk`, `deliv_status`, `date_time`, `id_barang`, `id_subtype_vendor`, `id_type_vendor`) VALUES
('1', 'sd', 'asdf', '123', '12345', 5, 'sdfg', 'qwerty', 'fbh', '2019-06-05 10:11:03', '34567', 0, 0),
('2', 'Online Shop', 'tokped', '12345', '164602', 3, 'pakaian', 'rani', 'sudah diterima', '2019-06-24 13:30:15', '2345', 0, 0),
('3', 'Online Shop', 'Online Shop', '1234', '164602', 3, 'tajam', 'rani', 'Belum Diambil', '2019-06-24 15:30:15', '31', 0, 0),
('4', 'E-commerce', 'Shopee', '12345', '09876', 4, 'pakaian', 'mega', 'Belum Diambil', '2019-07-01 09:38:23', '33', 0, 0),
('5', 'Type Of Delivery', 'ecommerce', '164602', '123', 2, 'tajam', 'Anisa', 'Belum diambil', '0000-00-00 00:00:00', '', 0, 0),
('INF5d23fcac1bedc', 'Type Of Delivery', 'olshop', '164602', '123', 2, 'tajam', 'Anisa', 'Belum diambil', '2019-07-09 09:32:12', '', 0, 0),
('INF5d24424e01f21', 'Type Of Delivery', 'ecommerce', '125', '234', 3, 'defg', 'Azizah', 'Belum diambil', '2019-07-09 14:29:18', '', 0, 0),
('INF5d245abf8f7d3', 'Type Of Delivery', 'ecommerce', '12345', '64602', 2, 'pecah', 'Azizah', 'Belum diambil', '2019-07-09 16:13:35', '', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `posisition` varchar(255) NOT NULL,
  `status` enum('Active','Not Active','','') NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `updated` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`id`, `department_id`, `nik`, `name`, `phone`, `email`, `posisition`, `status`, `image`, `created`, `updated`, `created_at`, `updated_at`, `password`) VALUES
(74, 5, '1231', 'Rio Pambudhi', '082383010098', 'riopambudhi51@gmail.com', 'Staff', 'Active', '2.png', '2019-02-14', '2019-02-14', '2019-02-14 01:00:00', '2019-02-14 03:00:00', 'ebd566ec16b6d40e1f14391de268fd4e'),
(75, 5, '13728191019292', 'infomedia', '083193000229', 'infomedia@gmail.com', 'Admin', 'Active', 'iStock-520544094-e1543446519906.jpg', '2019-02-14', '2019-02-14', '2019-02-14 01:00:00', '2019-02-14 03:00:00', ''),
(79, 11, '181784', 'vanza', '081138816666', 'vanzaraitama.vr@gmail.com', 'IT', 'Active', 'Screen_Shot_2019-04-29_at_10_54_56.png', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'e10adc3949ba59abbe56e057f20f883e'),
(80, 22, '1601091048', 'Tika Dianasari', '083193000229', 'tikadiansari96@gmail.com', 'Staff', 'Active', 'images2.jpg', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'e807f1fcf82d132f9bb018ca6738a19f'),
(81, 5, '1601091050', 'Rizky Efrian', '081267725101', 'rizkyefrian7@gmail.com', 'Staff', 'Active', 'download1.jpg', '2019/04/29', '2019/04/29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'e807f1fcf82d132f9bb018ca6738a19f'),
(82, 5, '12345', 'MI C', '081267725101', 'mic@gmail.com', 'Staff', 'Active', 'flat-urban-landscape-with-office-buildings_23-21479236711.jpg', '2019/04/29', '2019/04/29', '2019-04-29 01:00:00', '2019-04-29 01:00:00', 'e807f1fcf82d132f9bb018ca6738a19f'),
(86, 5, '123456', 'riri', '12356', 'tika_diasa@yahoo.co.id', 'Staff', 'Active', '19.png', '2019-02-14', '2019-02-14', '2019-02-14 01:00:00', '2019-02-14 03:00:00', 'e10adc3949ba59abbe56e057f20f883e'),
(87, 5, '1601091046', 'Rifka Esofita', '085218558248', 'rifkaesofita@gmail.com', 'Staff', 'Active', 'iStock-520544094-e15434465199061.jpg', '2019-02-12', '2019-03-19', '2019-02-11 17:00:00', '2019-03-18 17:00:00', '25d55ad283aa400af464c76d713c07ad'),
(88, 34, '4567', 'Falia Amalia', '087710263477', 'faliaamalia25@yahoo.co.id', 'wgfbg', 'Active', 'Idar.jpg', '25052019', '27052019', '0000-00-00 00:00:00', '2019-05-09 11:12:32', '827ccb0eea8a706c4c34a16891f84e7b'),
(89, 34, 'ozil', 'Falia Amalia', '087710263477', 'faliaamalia25@yahoo.co.id', 'wgfbg', 'Active', 'Idar1.jpg', '25052019', '27052019', '0000-00-00 00:00:00', '2019-05-09 11:12:32', 'a152e841783914146e4bcd4f39100686');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `firsttime` time NOT NULL,
  `endtime` time NOT NULL,
  `id_employee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `title`, `date`, `address`, `description`, `firsttime`, `endtime`, `id_employee`) VALUES
(18, 'ikatan', '2019-01-09', 'sdjaif', 'sfhasjdfh', '10:10:10', '12:12:12', 20),
(20, 'rapatt', '2019-01-09', 'sdjaif', 'sfhasjdfh', '10:10:10', '12:12:12', 20),
(21, 'seminar', '2019-02-14', 'adasfae', 'ffef', '16:42:13', '22:28:26', 20),
(22, 'Seminar Nasional IoT', '2019-03-08', 'Jl. RS. Fatmawati 77-81 Jakarta 12150 Indonesia', 'Seminar Nasional IoT yang diselenggarakan oleh PT Infomedia Nusantara, IoT merupakan Internet of Things.', '13:30:00', '16:30:00', 71),
(23, 'Workshop Animasi 3D', '2019-04-04', 'Jl. RS. Fatmawati 77-81 Jakarta 12150 Indonesia', 'Acara pelatihan workshop animasi 3D menggunakan blender.', '14:00:00', '17:00:00', 73),
(24, 'Seminar', '2019-02-02', 'Infomedia', 'Seminar internasional', '08:00:00', '10:00:00', 71),
(25, 'Meeting dengan Google, inc', '2019-04-26', 'Jln. Fatmawati', 'Meeting internasional', '10:00:00', '11:45:00', 74),
(26, 'Seminar', '2019-04-27', 'Infomedia', 'Seminar internasional', '08:00:00', '10:00:00', 78),
(28, 'Rapat Dengan Client', '2019-04-26', 'Infomedia', 'Rapat', '08:00:00', '10:00:00', 74),
(29, 'Rapat dengan Atasan', '2019-04-26', 'Jalan Fatmawati', 'Rapat', '19:05:00', '19:05:00', 74),
(30, 'Rapat', '2019-05-15', 'infomedia', 'Mahasiswa Magang', '10:24:00', '13:24:00', 75),
(31, 'Seminar', '2019-01-09', 'Kantor Infomedia Nusantara', 'sdfas', '09:22:00', '11:22:00', 74),
(32, 'Meeting International', '2019-04-30', 'infomedia Nusantara', 'Invited Internatioal Collage', '09:00:00', '12:00:00', 80),
(33, 'Meeting ', '2019-04-29', 'Infomedia Nusantara', 'Mahasiswa Magang', '08:00:00', '10:06:00', 74),
(34, 'ikatan', '2019-05-09', 'Kantor Infomedia Nusantara', 'Mahasiswa Magang', '18:08:00', '18:08:00', 74),
(35, 'Rapat dengan petinggi perusahaan', '2019-05-16', 'Kantor PT.Infomedia Nusantara', 'rapat yang dilakukan dengan para petinggi perusahaan', '08:00:00', '10:30:00', 74),
(36, 'Intership', '2019-05-22', 'Politeknik Negeri Padang', 'Mahasiswa Magang', '11:46:00', '14:46:00', 87),
(37, 'Rapat Divisi ITSM', '2019-05-23', 'Kantor PT.Infomedia Nusantara', 'rapat yang dilakukan dengan para petinggi perusahaan', '13:00:00', '15:00:00', 74);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `id_event` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` enum('Present','Not present','') NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guest`
--

INSERT INTO `guest` (`id`, `fullname`, `id_event`, `company`, `email`, `phone`, `status`, `time`) VALUES
(11, 'Jack', 26, 'Pnp', 'jack@gmail.com', '08120080000', 'Not present', '0000-00-00 00:00:00'),
(12, 'yuni', 25, 'Semen Padang', 'yuni@gmail.com', '085218855293', 'Not present', '0000-00-00 00:00:00'),
(17, 'Cibon', 32, 'IMS', 'tikadianasari96@gmail.com', '083193000229', 'Not present', '0000-00-00 00:00:00'),
(19, 'Rio Pambudhi', 33, 'Politeknik Negeri Padang', 'rifkaesofita@gmail.com', '08000', 'Present', '0000-00-00 00:00:00'),
(20, 'Vanza', 33, 'PT Infomedia Nusantara', 'vanza@vanza.com', '081138816666', 'Present', '0000-00-00 00:00:00'),
(21, '', 0, '', '', '', '', '0000-00-00 00:00:00'),
(22, 'yuni', 36, 'Semen Padang', 'yuni@gmail.com', '085218855293', 'Present', '2019-05-22 05:07:57'),
(23, 'Ricky', 37, 'Bank Mandiri', 'ricky@gmail.com', '082383010098', 'Not present', '0000-00-00 00:00:00'),
(24, 'Tasya', 37, 'Taspen', 'tasya22@gmail.com', '085211223211', 'Present', '2019-05-22 23:10:54'),
(25, 'Kinta', 37, 'Bank Mandiri', 'kinta11223@gmail.com', '0811223211', 'Not present', '0000-00-00 00:00:00'),
(26, 'Ridho dwi', 37, 'PT. Lancang Kuning', 'ridhodwi12@gmail.com', '08112321112', 'Present', '0000-00-00 00:00:00'),
(27, 'rizky', 25, 'Pnp', 'rizkyefrian7@gmail.com', '123', 'Not present', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `host`
--

CREATE TABLE `host` (
  `id_host` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `position` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reschedule_appointment`
--

CREATE TABLE `reschedule_appointment` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `id_appointment` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reschedule_appointment`
--

INSERT INTO `reschedule_appointment` (`id`, `datetime`, `id_appointment`) VALUES
(1, '2019-04-30 11:10:00', '2904190002'),
(2, '2019-04-30 11:11:00', '2904190005'),
(3, '2019-04-30 14:33:00', '2904190007'),
(4, '2019-05-13 10:46:00', '1305190002'),
(5, '2019-05-24 12:04:00', '2205190001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`, `nama`, `foto`) VALUES
(1, 'kiki', '25036c5a1dee1538c38db5dfa84dcd7e', 'kiki', ''),
(8, 'tika', 'c27cd12c8034c739304c22a3a3748e39', 'tika', 'IMG-20180210-WA00233.jpg'),
(9, 'kiki', '0d61130a6dd5eea85c2c5facfe1c15a7', 'kiki', 'admin4.png'),
(10, 'rifka', '7642cc8b570d5aa995acfb1a14267499', 'Rifka Esofita', 'colorado-2126991_19203.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subtype_delivery`
--

CREATE TABLE `subtype_delivery` (
  `id_subtype_vendor` int(11) NOT NULL,
  `id_type_vendor` int(11) NOT NULL,
  `subtype_vendor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subtype_delivery`
--

INSERT INTO `subtype_delivery` (`id_subtype_vendor`, `id_type_vendor`, `subtype_vendor`) VALUES
(1, 1, 'shopee'),
(2, 1, 'Tokopedia'),
(3, 1, 'Bukalapak'),
(4, 1, 'Lazada'),
(5, 2, 'Instagram'),
(6, 2, 'Facebook');

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_delivery`
--

CREATE TABLE `type_delivery` (
  `id_type_vendor` int(11) NOT NULL,
  `type_vendor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `type_delivery`
--

INSERT INTO `type_delivery` (`id_type_vendor`, `type_vendor`) VALUES
(1, 'E-Commerce'),
(2, 'Online Shop');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_grafik_event`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_grafik_event` (
`title` varchar(255)
,`jumlahGuest` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_grafik_event`
--
DROP TABLE IF EXISTS `v_grafik_event`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_grafik_event`  AS  select `event`.`title` AS `title`,count(`guest`.`id`) AS `jumlahGuest` from (`event` join `guest`) where (`event`.`id` = `guest`.`id_event`) group by `event`.`title` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id_appointment`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id_delivery`),
  ADD KEY `id_subtype_vendor` (`id_subtype_vendor`),
  ADD KEY `id_type_vendor` (`id_type_vendor`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `host`
--
ALTER TABLE `host`
  ADD PRIMARY KEY (`id_host`);

--
-- Indexes for table `reschedule_appointment`
--
ALTER TABLE `reschedule_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subtype_delivery`
--
ALTER TABLE `subtype_delivery`
  ADD PRIMARY KEY (`id_subtype_vendor`),
  ADD KEY `id_type_vendor` (`id_type_vendor`);

--
-- Indexes for table `type_delivery`
--
ALTER TABLE `type_delivery`
  ADD PRIMARY KEY (`id_type_vendor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id_appointment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `host`
--
ALTER TABLE `host`
  MODIFY `id_host` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reschedule_appointment`
--
ALTER TABLE `reschedule_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subtype_delivery`
--
ALTER TABLE `subtype_delivery`
  MODIFY `id_subtype_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `type_delivery`
--
ALTER TABLE `type_delivery`
  MODIFY `id_type_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
