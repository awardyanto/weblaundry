-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Jun 2020 pada 17.18
-- Versi Server: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_login`
--

CREATE TABLE `admin_login` (
  `ID` int(22) NOT NULL,
  `Adm_Name` text NOT NULL,
  `Adm_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_login`
--

INSERT INTO `admin_login` (`ID`, `Adm_Name`, `Adm_Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_form`
--

CREATE TABLE `contact_form` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Phone_No` varchar(15) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact_form`
--

INSERT INTO `contact_form` (`ID`, `Name`, `Phone_No`, `Message`) VALUES
(2, 'Ucok', '0894499-89498', 'Pak ko daleman saya berubah warna?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `manager_login`
--

CREATE TABLE `manager_login` (
  `ID` int(22) NOT NULL,
  `Mngr_Name` text NOT NULL,
  `Mngr_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `manager_login`
--

INSERT INTO `manager_login` (`ID`, `Mngr_Name`, `Mngr_Password`) VALUES
(1, 'alfian', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `ID` int(22) NOT NULL,
  `User_ID` int(22) NOT NULL,
  `Order_Code` int(20) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `Total_Item` int(22) NOT NULL,
  `Total_Price` int(22) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `Pick_up_date` date NOT NULL,
  `Delivery_date` date NOT NULL,
  `Phone_No` int(20) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Pick_Up_status` text NOT NULL,
  `Delivery_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`ID`, `User_ID`, `Order_Code`, `User_Name`, `Total_Item`, `Total_Price`, `pembayaran`, `Pick_up_date`, `Delivery_date`, `Phone_No`, `Address`, `Pick_Up_status`, `Delivery_status`) VALUES
(13, 13, 279365, 'Toni', 3, 3600, 0, '2020-06-18', '2020-06-19', 895471256, 'Cibunar, Kec. Parung Panjang, Bogor, Jawa Barat 16360', 'Pikcup', 'Diterima'),
(14, 13, 453558, 'Toni', 2, 1725, 1725, '2020-06-18', '2020-06-20', 895471256, 'Cibunar, Kec. Parung Panjang, Bogor, Jawa Barat 16360', 'Pikcup', 'Diterima'),
(15, 16, 577855, 'Ucok', 1, 1000, 0, '2020-06-18', '2020-06-19', 2147483647, 'Jl. doang jadian kaga', 'Pikcup', 'Diterima'),
(16, 16, 878053, 'Ucok', 1, 1600, 0, '2020-06-18', '2020-06-20', 2147483647, 'Jl. doang jadian kaga', 'No', 'Menunggu'),
(17, 13, 780551, 'Toni', 1, 750, 750, '2020-06-18', '2020-06-25', 895471256, 'Cibunar, Kec. Parung Panjang, Bogor, Jawa Barat 16360', 'No', 'Menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_temp`
--

CREATE TABLE `order_temp` (
  `ID` int(22) NOT NULL,
  `User_ID` int(22) NOT NULL,
  `Services_Name` text NOT NULL,
  `Services_Type` text NOT NULL,
  `Laundry_Price` int(100) NOT NULL,
  `Dry_Price` int(100) NOT NULL,
  `Total_Item` int(100) NOT NULL,
  `Pick_Delivery_Status` text NOT NULL,
  `Order_Status` text NOT NULL,
  `Order_code` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_temp`
--

INSERT INTO `order_temp` (`ID`, `User_ID`, `Services_Name`, `Services_Type`, `Laundry_Price`, `Dry_Price`, `Total_Item`, `Pick_Delivery_Status`, `Order_Status`, `Order_code`) VALUES
(1, 5, 'Kiloan', 'Layanan super cepat', 150000, 50000, 2, '2', 'active', '32388'),
(2, 5, 'Satuan', 'Layanan super cepat', 10000, 5000, 1, '2', 'active', '304542'),
(3, 5, 'Satuan', 'Layanan super cepat', 10000, 5000, 1, '2', 'active', '974183'),
(4, 5, 'Satuan', 'Layanan super cepat', 10000, 5000, 1, '2', 'active', '31351'),
(5, 5, 'Satuan', 'Layanan super cepat', 10000, 5000, 1, '2', 'active', '329383'),
(6, 5, 'Satuan', 'Layanan super cepat', 10000, 5000, 1, '2', 'active', '833254'),
(7, 5, 'Kiloan', 'Layanan cepat', 100000, 50000, 1, '2', 'active', '576207'),
(12, 5, 'Kiloan', 'Layanan cepat', 100000, 50000, 1, '2', 'active', '208534'),
(13, 5, 'Satuan', 'Layanan super cepat', 10000, 5000, 1, '2', 'active', '191200'),
(14, 5, 'Satuan', 'Layanan cepat', 7000, 5000, 1, '2', 'active', '390570'),
(15, 10, 'Satuan', 'Layanan super cepat', 10000, 5000, 1, '2', 'active', '645634'),
(16, 10, 'Kaos', 'Layanan super cepat', 800, 200, 1, '2', 'active', '687900'),
(17, 10, 'Kaos', 'Layanan super cepat', 800, 200, 1, '2', 'active', '297523'),
(18, 13, 'Kaos', 'Layanan super cepat', 800, 200, 1, '2', 'active', '279365'),
(19, 13, 'Celana Panjang', 'Layanan super cepat', 1200, 400, 1, '2', 'active', '279365'),
(20, 13, 'Celana Pendek', 'Layanan super cepat', 1000, 0, 1, '2', 'active', '279365'),
(21, 13, 'Kaos', 'Layanan cepat', 600, 150, 1, '2', 'active', '453558'),
(22, 13, 'Celana Pendek', 'Layanan cepat', 750, 225, 1, '2', 'active', '453558'),
(23, 16, 'Kaos', 'Layanan super cepat', 800, 200, 1, '2', 'active', '577855'),
(24, 16, 'Celana Panjang', 'Layanan super cepat', 1200, 400, 1, '2', 'active', '878053'),
(25, 13, 'Kaos', 'Layanan cepat', 600, 150, 1, '2', 'active', '780551'),
(26, 13, 'Kaos', 'Layanan biasa', 400, 100, 1, '1', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_type`
--

CREATE TABLE `services_type` (
  `ID` int(22) NOT NULL,
  `Services_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `services_type`
--

INSERT INTO `services_type` (`ID`, `Services_Name`) VALUES
(6, 'Layanan super cepat'),
(7, 'Layanan cepat'),
(8, 'Layanan biasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_uploade`
--

CREATE TABLE `services_uploade` (
  `ID` int(22) NOT NULL,
  `Services_Name` varchar(100) NOT NULL,
  `Services_Type` varchar(100) NOT NULL,
  `Dry_Price` int(120) NOT NULL,
  `Laundry_Price` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `services_uploade`
--

INSERT INTO `services_uploade` (`ID`, `Services_Name`, `Services_Type`, `Dry_Price`, `Laundry_Price`) VALUES
(16, 'Kaos', 'Layanan biasa', 100, 400),
(17, 'Kaos', 'Layanan cepat', 150, 600),
(18, 'Kaos', 'Layanan super cepat', 200, 800),
(19, 'Celana Panjang', 'Layanan biasa', 200, 600),
(20, 'Celana Panjang', 'Layanan cepat', 300, 900),
(21, 'Celana Panjang', 'Layanan super cepat', 400, 1200),
(22, 'Celana Pendek', 'Layanan biasa', 150, 500),
(23, 'Celana Pendek', 'Layanan cepat', 225, 750),
(24, 'Celana Pendek', 'Layanan super cepat', 300, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_login`
--

CREATE TABLE `user_login` (
  `ID` int(22) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_login`
--

INSERT INTO `user_login` (`ID`, `User_Name`, `Password`, `telefon`, `alamat`, `saldo`) VALUES
(13, 'Toni', '123', '0895471256', 'Cibunar, Kec. Parung Panjang, Bogor, Jawa Barat 16360', 497525),
(14, 'Jodi', '123', '0894343477', 'Jl. Surya Kencana No.1, Pamulang Bar., Kec. Pamulang, Kota Tangerang Selatan, Banten 15417', 500000),
(15, 'Alex', '123', '09516876232', 'Jl. rumah indah nomer 21', 0),
(16, 'Ucok', '123', '08954741128', 'Jl. doang jadian kaga', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `manager_login`
--
ALTER TABLE `manager_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_temp`
--
ALTER TABLE `order_temp`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `services_type`
--
ALTER TABLE `services_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `services_uploade`
--
ALTER TABLE `services_uploade`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `manager_login`
--
ALTER TABLE `manager_login`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `order_temp`
--
ALTER TABLE `order_temp`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `services_type`
--
ALTER TABLE `services_type`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `services_uploade`
--
ALTER TABLE `services_uploade`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
