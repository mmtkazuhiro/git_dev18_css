-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 1 月 21 日 15:56
-- サーバのバージョン： 5.7.30
-- PHP のバージョン: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `gs_kadai3`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL,
  `fix` varchar(64) NOT NULL DEFAULT '修正',
  `del` varchar(64) NOT NULL DEFAULT '削除'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`, `fix`, `del`) VALUES
(1, '管理者', 'test1', 'test1', 1, 0, '修正', '削除'),
(2, '一般', 'test2', 'test2', 2, 0, '修正', '削除'),
(7, 'testtest', 'testtest', 'testtest', 2, 0, '修正', '削除'),
(8, 'test111', 'test111', 'test111', 2, 0, '修正', '削除'),
(9, 'taro', 'taro', 'taro', 2, 0, '修正', '削除'),
(10, 'mimata', 'mimata', 'mimata', 1, 0, '修正', '削除');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
