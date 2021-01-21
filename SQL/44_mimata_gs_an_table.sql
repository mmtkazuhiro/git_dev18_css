-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 1 月 21 日 15:55
-- サーバのバージョン： 5.7.30
-- PHP のバージョン: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `gs_kadai3`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `precode` varchar(64) NOT NULL,
  `code` varchar(64) NOT NULL,
  `exp` varchar(128) NOT NULL,
  `indate` datetime NOT NULL,
  `show` varchar(64) NOT NULL DEFAULT '表示',
  `url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `precode`, `code`, `exp`, `indate`, `show`, `url`) VALUES
(17, 'フォントの太さ', '.sample', 'font-weight:bold;', 'フォントの太さを指定できる。lighterやbolderでも指定可。', '2021-01-20 21:10:02', '表示', 'http://www.htmq.com/style/font-weight.shtml'),
(18, 'フォントの色', '.sample', 'color:blue;', 'フォントの色を指定できる', '2021-01-20 21:10:51', '表示', 'http://www.netyasun.com/home/color.html'),
(20, '幅の大きさ', '.sample', 'width:500px;', '幅を変更できる。高さの変更はheightで指定する。', '2021-01-20 21:14:48', '表示', 'https://www.tagindex.com/stylesheet/img/width_height.html'),
(21, 'ブロックコンテナ内の行の揃え位置', '.sample', 'text-align:center;', 'テキストなどの位置を指定できる。', '2021-01-21 00:55:48', '表示', 'http://www.htmq.com/style/text-align.shtml');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
