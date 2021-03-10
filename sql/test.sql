-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-03-07 05:38:04
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `test`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `sample`
--

CREATE TABLE `sample` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(16) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `sample`
--
ALTER TABLE `sample`
  ADD UNIQUE KEY `id` (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `sample`
--
ALTER TABLE `sample`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


create table user (
	user_id int auto_increment primary key, 
	name varchar(100) not null, 
	email varchar(200) not null, 
	login varchar(100) not null unique, 
	password varchar(100) not null
);

INSERT INTO `customer` (`user_id`, `name`, `email`, `login`, `password`) VALUES
(1, '伊藤 直也', ' onakasuitayouyou@gmail.com', 'ito_naoya', 'naoya_ito'),
(2, '藤川 真一', '東京都豊島区東池袋1-20-17', 'fujikawa', 'fshin2000'),
(3, '山本 裕介', '神奈川県横浜市神奈川区反町1-8-14', 'yamamoto', 'yusuke'),
(4, '海野 弘成', '千葉県柏市末広町10-1', 'umino', 'yaotti'),
(5, '奥 一穂', '埼玉県さいたま市大宮区宮町4-13-2', 'oku', 'Kazuho_Oku'),
(6, 'まつもとひろゆき', '千葉県習志野市津田沼1-1-1', 'matsumoto', 'yukihiro_matz'),
(7, '岡野 真也', '長野県長野市鶴賀呑沢614-3', 'okano', 'tokibito'),
(8, '玉川 憲', '北海道札幌市北区北6条西8', 'tamagawa', 'KenTamagawa'),
(9, '松村 太朗', '木県宇都宮市東宿郷2-5-4', 'matsumura', 'taromatsumura');