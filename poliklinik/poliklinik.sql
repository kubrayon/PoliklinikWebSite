-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Haz 2021, 16:57:48
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `poliklinik`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolum`
--

CREATE TABLE `bolum` (
  `bolumID` int(11) NOT NULL,
  `bolumAd` varchar(80) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `bolum`
--

INSERT INTO `bolum` (`bolumID`, `bolumAd`) VALUES
(1, 'Acil'),
(2, 'Alerji Polikliniği'),
(3, 'Ağız ve Diş Sağlığı'),
(4, 'Beslenme ve Diyet'),
(5, 'Cildiye'),
(7, 'Çocuk Sağlığı ve Hastalıkları'),
(8, 'Dahiliye'),
(9, 'Göz Hastalıkları'),
(10, 'Enfeksiyon'),
(11, 'Ortopedi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doktorlar`
--

CREATE TABLE `doktorlar` (
  `doktorID` int(11) NOT NULL,
  `doktorAd` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `doktorSoyad` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `bolumID` int(11) NOT NULL,
  `doktorTc` varchar(11) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `doktorlar`
--

INSERT INTO `doktorlar` (`doktorID`, `doktorAd`, `doktorSoyad`, `bolumID`, `doktorTc`) VALUES
(1, 'Mehmet', 'Şekerci', 1, '11111111111'),
(2, 'Ahmet', 'Tank', 1, '22222222222'),
(3, 'Uğur', 'Şahin', 2, '33333333333'),
(4, 'Özlem', 'Şahin', 2, '44444444444'),
(5, 'Haluk', 'Kavukcu', 3, '55555555555'),
(6, 'Osman', 'Kalaycı', 3, '66666666666'),
(7, 'Nilüfer', 'Kaval', 4, '77777777777'),
(8, 'Nergis', 'Söyler', 4, '88888888888'),
(9, 'Bayram', 'Önder', 5, '99999999999'),
(10, 'Ümmühan', 'Kocaoğlu', 5, '10000000000');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevular`
--

CREATE TABLE `randevular` (
  `randevuID` int(11) NOT NULL,
  `randevuDoktor` int(11) NOT NULL,
  `randevuTarih` date NOT NULL,
  `randevuSaat` time NOT NULL,
  `randevuTc` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `randevuAd` varchar(80) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `randevular`
--

INSERT INTO `randevular` (`randevuID`, `randevuDoktor`, `randevuTarih`, `randevuSaat`, `randevuTc`, `randevuAd`) VALUES
(1, 10, '2021-05-30', '14:00:00', '13254875623', 'Osman Bakarca'),
(2, 1, '2021-05-03', '11:30:00', '12345678912', 'Nefise Yön'),
(3, 5, '2021-04-14', '13:00:00', '45612378902', 'Ahmet Görmez'),
(4, 9, '2021-04-14', '14:00:00', '7895623145', 'Melek Bakar'),
(5, 7, '2021-08-28', '09:30:00', '15926348752', 'Ümran Çiçekçi'),
(7, 1, '2021-06-11', '10:30:00', '12546587844', 'Ali Yener'),
(8, 4, '2021-06-18', '14:00:00', '15468975122', 'Kübra Tosun'),
(14, 0, '0000-00-00', '00:00:00', '', ''),
(16, 0, '0000-00-00', '00:00:00', '', ''),
(23, 5, '2021-06-08', '13:30:00', '55555555555', 'Kübra Yön');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bolum`
--
ALTER TABLE `bolum`
  ADD PRIMARY KEY (`bolumID`);

--
-- Tablo için indeksler `doktorlar`
--
ALTER TABLE `doktorlar`
  ADD PRIMARY KEY (`doktorID`);

--
-- Tablo için indeksler `randevular`
--
ALTER TABLE `randevular`
  ADD PRIMARY KEY (`randevuID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bolum`
--
ALTER TABLE `bolum`
  MODIFY `bolumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `doktorlar`
--
ALTER TABLE `doktorlar`
  MODIFY `doktorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `randevular`
--
ALTER TABLE `randevular`
  MODIFY `randevuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
