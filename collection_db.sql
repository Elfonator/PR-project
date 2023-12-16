-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Sob 16. pro 2023, 10:53
-- Verze serveru: 10.4.28-MariaDB
-- Verze PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `collection_db`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` tinytext NOT NULL,
  `icon` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Vypisuji data pro tabulku `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `icon`) VALUES
(1, 'DC Comics', 'Based on DC Universe characters', 'icon-01.png'),
(2, 'Marvel', 'Based on Marvel Universe characters', 'icon-02.png'),
(3, 'Anime', 'Based on anime and manga characters', 'icon-03.png'),
(4, 'Games', 'Based on game characters', 'icon-04.png');

-- --------------------------------------------------------

--
-- Struktura tabulky `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `page_name` varchar(45) NOT NULL,
  `page_url` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Vypisuji data pro tabulku `menu`
--

INSERT INTO `menu` (`id`, `page_name`, `page_url`) VALUES
(1, 'Home', 'index.php'),
(2, 'Statues', 'statues.php'),
(3, 'Categories', 'categories.php');

-- --------------------------------------------------------

--
-- Struktura tabulky `popular_img`
--

CREATE TABLE `popular_img` (
  `id` int(11) NOT NULL,
  `statue_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `statue`
--

CREATE TABLE `statue` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `manufacturer` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `category_id` int(11) NOT NULL,
  `img_url` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Vypisuji data pro tabulku `statue`
--

INSERT INTO `statue` (`id`, `name`, `type`, `manufacturer`, `price`, `category_id`, `img_url`) VALUES
(1, 'HUNTRESS', 'Premium Format', 'Sideshow Collectibles', 550, 1, 'https://www.sideshow.com/storage/product-images/300780/huntress_dc-comics_gallery_62aa56041d955.jpg'),
(2, 'PHOENIX AND JEAN GREY', 'Maquette', 'Sideshow Collectibles', 923, 2, 'https://www.sideshow.com/storage/product-images/200572/phoenix-and-jean-grey_marvel_gallery_644aa3ac46e24.jpg'),
(3, 'HARLEY QUINN AND THE JOKER', 'Diorama', 'Sideshow Collectibles', 504, 1, 'https://www.sideshow.com/storage/product-images/200575/harley-quinn-and-the-joker_dc-comics_gallery_630f8f4db20da.jpg'),
(4, 'BATMAN: GOTHAM BY GASLIGHT', 'Premium Format', 'Sideshow Collectibles', 664, 1, 'https://www.sideshow.com/storage/product-images/300804/batman-gotham-by-gaslight_dc-comics_gallery_6500e44c46ff3.jpg'),
(5, 'YENNEFER', '1:3 Scale Statue', 'Prime 1 Studio', 1323, 4, 'https://www.sideshow.com/storage/product-images/912823/yennefer-deluxe-version_the-witcher-3-wild-hunt_gallery_6532f3039a764.jpg'),
(6, 'DANTE', 'Quarter Scale Statue', 'Prime 1 Studio', 947, 4, 'https://www.sideshow.com/storage/product-images/912853/dante__gallery_653c375b41eb5.jpg'),
(7, 'PUNCHLINE', '1:3 Scale Statue', 'Prime 1 Studio', 1540, 1, 'https://www.sideshow.com/storage/product-images/911787/punchline-deluxe-version__gallery_6321016d59931.jpg'),
(8, 'MEGUMI FUSHIGURO', '1:8 Scale Statue', 'Kotobukiya', 142, 3, 'https://www.sideshow.com/storage/product-images/908069/megumi-fushiguro_jujutsu-kaisen_gallery_605e73c2ef7ea.jpg'),
(9, 'LUMINE', '1:7 Scale Statue', 'Kotobukiya', 161, 4, 'https://www.sideshow.com/storage/product-images/911590/lumine_genshin-impact_gallery_62e054ac45aa5.jpg'),
(10, 'GUTS BERSERKER ARMOR', '1:4 Scale Statue', 'Prime 1 Studio', 1380, 3, 'https://www.sideshow.com/storage/product-images/9076322/guts-berserker-armor-unleash-edition-deluxe-version_berserk_gallery_60529941c9a11.jpg'),
(11, 'AETHER', '1:7 Scale Statue', 'Kotobukiya', 161, 4, 'https://www.sideshow.com/storage/product-images/911591/aether_genshin-impact_gallery_62e054f9af04a.jpg');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `popular_img`
--
ALTER TABLE `popular_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_popular_img_statue1_idx` (`statue_id`);

--
-- Indexy pro tabulku `statue`
--
ALTER TABLE `statue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_statue_category_idx` (`category_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pro tabulku `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `statue`
--
ALTER TABLE `statue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `popular_img`
--
ALTER TABLE `popular_img`
  ADD CONSTRAINT `fk_popular_img_statue1` FOREIGN KEY (`statue_id`) REFERENCES `statue` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `statue`
--
ALTER TABLE `statue`
  ADD CONSTRAINT `fk_statue_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
