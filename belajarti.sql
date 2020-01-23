-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2018 at 07:37 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajarti`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailrecord`
--

CREATE TABLE `detailrecord` (
  `idDetail` int(11) NOT NULL,
  `idRecord` int(11) NOT NULL,
  `idPertanyaan` int(11) NOT NULL,
  `jawaban` varchar(10) NOT NULL,
  `jawabanBenar` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailrecord`
--

INSERT INTO `detailrecord` (`idDetail`, `idRecord`, `idPertanyaan`, `jawaban`, `jawabanBenar`, `status`) VALUES
(1, 99, 10, 'jawaban1', 'jawaban1', 1),
(2, 99, 5, 'jawaban3', 'jawaban3', 1),
(3, 99, 1, 'jawaban1', 'jawaban1', 1),
(4, 99, 9, 'jawaban2', 'jawaban2', 1),
(5, 99, 12, 'jawaban2', 'jawaban2', 1),
(6, 100, 7, 'jawaban3', 'jawaban3', 1),
(7, 100, 1, 'jawaban1', 'jawaban1', 1),
(8, 100, 8, 'jawaban1', 'jawaban1', 1),
(9, 100, 4, 'jawaban1', 'jawaban1', 1),
(10, 100, 12, 'jawaban1', 'jawaban2', 0),
(11, 101, 12, 'jawaban2', 'jawaban2', 1),
(12, 101, 11, 'jawaban2', 'jawaban2', 1),
(13, 101, 7, 'jawaban3', 'jawaban3', 1),
(14, 101, 8, 'jawaban1', 'jawaban1', 1),
(15, 101, 1, 'jawaban1', 'jawaban1', 1),
(16, 102, 6, 'jawaban3', 'jawaban2', 0),
(17, 102, 4, 'jawaban1', 'jawaban1', 1),
(18, 102, 11, 'jawaban1', 'jawaban2', 0),
(19, 102, 5, 'jawaban1', 'jawaban3', 0),
(20, 102, 7, 'jawaban3', 'jawaban3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(11) NOT NULL,
  `kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idKategori`, `kategori`) VALUES
(1, 'Website'),
(2, 'Java'),
(3, 'RPL'),
(4, 'AlPro'),
(5, 'BasisData'),
(6, 'Pemrograman');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `idPertanyaan` int(11) NOT NULL,
  `soal` text NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `jawaban1` text NOT NULL,
  `jawaban2` text NOT NULL,
  `jawaban3` text NOT NULL,
  `jawabanBenar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`idPertanyaan`, `soal`, `kategori`, `jawaban1`, `jawaban2`, `jawaban3`, `jawabanBenar`) VALUES
(1, 'Apa kepanjangan dari HTML?', 'Website', 'Hypertext Markup Language', 'Hyperlink Machine Language', 'Hypertext Machine Lesson', 'jawaban1'),
(2, 'Berikut ini penulisan sintak perulangan for yang benar adalah ......', 'Website', '(for i=0;i<5;i++){ statement; }', 'for(int i=0,i<5,i++){ statement; }', 'for(int i=1;i<=5;i++){ statement; }', 'jawaban3'),
(3, 'Analisis kebutuhan => Desain => Pengkodean => Pengujian => Pemeliharaan adalah tahapan dari pemodelan perangkat lunak .....', 'RPL', 'Spiral', 'Waterfall', 'Prototyping', 'jawaban2'),
(4, 'Pewarisan atribut dan method dari sebuah class ke class lainnya disebut ......', 'Java', 'inheritance', 'enkapsulasi', 'polimorfisme', 'jawaban1'),
(5, 'Sintak untuk menampilkan output ke layar di bahasa pemrograman Java adalah....', 'Java', 'system.out.println(\"Hello World\");', 'System.Out.Println(\"Hello World\");', 'System.out.println(\"Hello World\");', 'jawaban3'),
(6, 'Berikut ini tipe-tipe UML yang termasuk dalam Structure Diagram adalah .....', 'RPL', 'Sequence Diagram', 'Class Diagram', 'Use Case', 'jawaban2'),
(7, 'Perintah berikut yang termasuk dalam Data Definition Language (DDL) pada basis data adalah .....', 'BasisData', 'insert', 'select', 'drop', 'jawaban3'),
(8, 'Sintak yang tepat untuk menghapus primary key adalah .....', 'BasisData', 'alter table namaTable drop primary key', 'drop primary key', 'alter table namaTable delete primary key', 'jawaban1'),
(9, 'Penulisan variable dalam bahasa pemrograman C yang tidak sesuai dengan aturan adalah .....', 'AlPro', 'string myVar', 'int var-1', 'string _myVar', 'jawaban2'),
(10, 'Perintah untuk menampilkan output ke layar pada bahasa C adalah .....', 'AlPro', 'printf(\"Hello World\");', 'echo \"Hello World\";', 'System.out.println(\"Hello World\");', 'jawaban1'),
(11, 'Penulisan variabel yang benar di PHP adalah', 'Website', 'int angka;', '$myVar;', '@Huruf;', 'jawaban2'),
(12, 'Fungsi yang digunakan untuk menghitung jumlah data pada suatu kolom adalah .....', 'BasisData', 'sum', 'count', 'max', 'jawaban2'),
(13, 'Manakah yang bukan bahasa pemrograman?', 'Pemrograman', 'C', 'C#', 'CPanel', 'jawaban3'),
(14, 'Bahasa pemrograman manakah yang tidak menggunakan konsep OOP?', 'Pemrograman', 'C', 'Java', 'C#', 'jawaban1'),
(15, 'Perintah SQL yang digunakan untuk memilih database yang akan digunakan adalah .....', 'BasisData', 'CREATE namaDatabase;', 'USE namaDatabase;', 'CHOOSE namaDatabase;', 'jawaban2'),
(16, 'Berikut ini yang bukan merupakan sintak untuk melakukan looping adalah .....', 'AlPro', 'while', 'for', 'do', 'jawaban3');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `idRecord` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `benar` int(11) NOT NULL,
  `salah` int(11) NOT NULL,
  `kosong` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`idRecord`, `username`, `tanggal`, `benar`, `salah`, `kosong`, `score`) VALUES
(99, 'alfinda', '2018-01-03 14:51:01', 5, 0, 0, 100),
(100, 'alfinda', '2018-01-03 15:10:12', 4, 1, 0, 80),
(101, 'syifa', '2018-01-07 11:36:55', 5, 0, 0, 100),
(102, 'syifa', '2018-01-07 11:37:49', 2, 3, 0, 40),
(103, 'rahma', '2018-01-07 13:34:45', 4, 0, 1, 80);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` char(40) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `level` enum('0','1') DEFAULT '0',
  `score` int(11) NOT NULL,
  `win` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `nama`, `level`, `score`, `win`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', '1', 0, 0),
(2, 'alfinda', 'c6c3d75edde422bf19f37c32adc1cb2cf66152e0', 'AlfindaRahma', '0', 180, 1),
(4, 'rahma', '0c61420737c91f4fc58fc3d4ff1f5f1674073f87', 'Rahmadiarni', '0', 80, 0),
(3, 'syifa', 'f952e2020df8d3c1905d469c29e1c8124e3cb5ec', 'AssyifaMaharani', '0', 140, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailrecord`
--
ALTER TABLE `detailrecord`
  ADD PRIMARY KEY (`idDetail`),
  ADD KEY `fkidPertanyaan` (`idPertanyaan`),
  ADD KEY `fk_idRecord` (`idRecord`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`idPertanyaan`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`idRecord`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `idUser` (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailrecord`
--
ALTER TABLE `detailrecord`
  MODIFY `idDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `idPertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `idRecord` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailrecord`
--
ALTER TABLE `detailrecord`
  ADD CONSTRAINT `fk_idRecord` FOREIGN KEY (`idRecord`) REFERENCES `record` (`idRecord`),
  ADD CONSTRAINT `fkidPertanyaan` FOREIGN KEY (`idPertanyaan`) REFERENCES `pertanyaan` (`idPertanyaan`);

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
