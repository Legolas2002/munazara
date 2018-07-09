-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 07 Tem 2018, 17:24:55
-- Sunucu sürümü: 10.1.31-MariaDB
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `deneme20_munazara`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `konu`
--

CREATE TABLE `konu` (
  `id` int(11) NOT NULL,
  `ad` varchar(250) NOT NULL,
  `zaman` varchar(50) NOT NULL,
  `online` enum('0','1') NOT NULL DEFAULT '1',
  `tarafi` varchar(50) NOT NULL,
  `tarafi2` varchar(50) NOT NULL,
  `hak` int(3) NOT NULL,
  `hak2` int(3) NOT NULL,
  `alt_konu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `konu`
--

INSERT INTO `konu` (`id`, `ad`, `zaman`, `online`, `tarafi`, `tarafi2`, `hak`, `hak2`, `alt_konu`) VALUES
(3, 'Fanta mı Cola mı ?', '20.06.2018', '0', '', '', 0, 0, ''),
(10, 'Sinek mi Sivrisinek mi ?', '', '1', 'Sinek', 'Sivrisinek', 3, 3, 'Doğru mu Yanlış mı?'),
(11, 'LEZİZ ÇAYLI KEK TARİFİ (Cupcake)', '', '1', 'Çay', 'Kek', 0, 0, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `k_adi` varchar(50) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `zaman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parola` varchar(250) NOT NULL,
  `durum` enum('0','1') NOT NULL DEFAULT '1',
  `yetki` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `k_adi`, `mail`, `zaman`, `parola`, `durum`, `yetki`) VALUES
(2, 'seyhan', 'l@l.com', '2018-06-18 18:00:07', 'e10adc3949ba59abbe56e057f20f883e', '1', '2'),
(3, 'Legolas2002', 'aga@aga.com', '2018-06-18 18:10:24', 'e10adc3949ba59abbe56e057f20f883e', '1', '2'),
(4, 'Legolas2002', 'y@y.com', '2018-06-19 16:31:40', 'e10adc3949ba59abbe56e057f20f883e', '1', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `tarafi` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `zaman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `video` varchar(500) NOT NULL,
  `konu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `video`
--

INSERT INTO `video` (`id`, `tarafi`, `mail`, `zaman`, `video`, `konu`) VALUES
(24, 'Sinek', 'a@a.com', '2018-06-22 23:31:49', '/23732203542101321306SampleVideo_1280x720_1mb.mp4', 'Sinek mi Sivrisinek mi ?'),
(25, 'Sinek', 'a@a.com', '2018-07-02 21:56:21', '/27246307962977429178Ekran Görüntüsü (7).png', 'Sinek mi Sivrisinek mi ?');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `konu`
--
ALTER TABLE `konu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `konu`
--
ALTER TABLE `konu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
