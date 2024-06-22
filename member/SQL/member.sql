CREATE DATABASE member1
USE member

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `pw` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `fav` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `createTime` int(10) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `info` (`id`, `username`, `pw`, `email`, `sex`, `fav`, `createTime`, `admin`) VALUES
(10, 'dage1', 'e10adc3949ba59abbe56e057f20f883e', '', 1, '听音乐,玩游戏', 1718808803, 0),
(9, 'dage', 'fd0ff26f355c8a0663e4644854198f71', '3276718088@qq.com', 0, '听音乐', 1718808696, 1),
(14, 'admin', 'fd0ff26f355c8a0663e4644854198f71', '1708360838@qq.com', 1, '听音乐,玩游戏', 1718887569, 1);

ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;
