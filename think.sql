-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 09 月 19 日 00:49
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `think`
--

-- --------------------------------------------------------

--
-- 表的结构 `hd_access`
--

CREATE TABLE IF NOT EXISTS `hd_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `hd_access`
--

INSERT INTO `hd_access` (`role_id`, `node_id`, `level`, `module`) VALUES
(6, 5, 1, NULL),
(0, 0, 0, NULL),
(0, 0, 0, NULL),
(6, 8, 2, NULL),
(6, 6, 1, NULL),
(6, 10, 2, NULL),
(7, 17, 1, NULL),
(7, 7, 2, NULL),
(7, 9, 2, NULL),
(7, 11, 3, NULL),
(7, 12, 3, NULL),
(7, 13, 3, NULL),
(7, 14, 3, NULL),
(6, 16, 3, NULL),
(7, 15, 3, NULL),
(7, 16, 3, NULL),
(7, 8, 2, NULL),
(6, 15, 3, NULL),
(6, 14, 3, NULL),
(6, 13, 3, NULL),
(6, 12, 3, NULL),
(6, 11, 3, NULL),
(6, 9, 2, NULL),
(6, 7, 2, NULL),
(6, 17, 1, NULL),
(7, 6, 1, NULL),
(7, 10, 2, NULL),
(7, 5, 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `hd_node`
--

CREATE TABLE IF NOT EXISTS `hd_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `hd_node`
--

INSERT INTO `hd_node` (`id`, `name`, `title`, `status`, `remark`, `sort`, `pid`, `level`) VALUES
(8, 'Rbac', 'Rbac控制器', 1, NULL, 1, 6, 2),
(7, 'Index', '后台首页', 1, NULL, 1, 6, 2),
(6, 'Admin', '后台', 1, NULL, 1, 0, 1),
(5, 'Index', '前台', 1, NULL, 1, 0, 1),
(9, 'MsgManage', '帖子管理', 1, NULL, 1, 6, 2),
(10, 'Index', '前台首页', 1, NULL, 1, 5, 2),
(11, 'role', '角色列表', 1, NULL, 1, 8, 3),
(12, 'node', '节点列表', 1, NULL, 1, 8, 3),
(13, 'user', '用户列表', 1, NULL, 1, 8, 3),
(14, 'addNode', '添加节点', 1, NULL, 1, 8, 3),
(15, 'addUser', '添加用户', 1, NULL, 1, 8, 3),
(16, 'addRole', '添加角色', 1, NULL, 1, 8, 3),
(17, 'Member', '会员中心', 1, NULL, 1, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `hd_role`
--

CREATE TABLE IF NOT EXISTS `hd_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `hd_role`
--

INSERT INTO `hd_role` (`id`, `name`, `pid`, `status`, `remark`) VALUES
(7, 'Editor', NULL, 1, '网站编辑'),
(6, 'Manager', NULL, 1, '普通管理员');

-- --------------------------------------------------------

--
-- 表的结构 `hd_role_user`
--

CREATE TABLE IF NOT EXISTS `hd_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `hd_session`
--

CREATE TABLE IF NOT EXISTS `hd_session` (
  `session_id` varchar(255) NOT NULL,
  `session_expire` int(11) NOT NULL,
  `session_data` blob,
  UNIQUE KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `hd_session`
--

INSERT INTO `hd_session` (`session_id`, `session_expire`, `session_data`) VALUES
('pthrf59fj9i4m2h9cpbnkt26g6', 1411089134, 0x7665726966797c733a33323a226662353038656630373465653738613065353863363862653036643861326562223b7c733a313a2231223b757365726e616d657c733a353a2261646d696e223b6c6f67696e74696d657c733a31393a22323031342d30392d31392030383a34383a3034223b6c6f67696e69707c733a393a223132372e302e302e31223b5f4143434553535f4c4953547c613a303a7b7d37313935613632656466643131613430613638633737666634306565393861367c623a303b);

-- --------------------------------------------------------

--
-- 表的结构 `hd_user`
--

CREATE TABLE IF NOT EXISTS `hd_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `logintime` int(10) unsigned NOT NULL,
  `loginip` varchar(30) NOT NULL,
  `lock` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `hd_user`
--

INSERT INTO `hd_user` (`id`, `username`, `password`, `logintime`, `loginip`, `lock`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1411087694, '127.0.0.1', 0),
(2, 'lishiyu', '88539e20706fe68e58083581067212c9', 1401081911, '127.0.0.1', 0);

-- --------------------------------------------------------

--
-- 表的结构 `hd_wish`
--

CREATE TABLE IF NOT EXISTS `hd_wish` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `content` varchar(255) NOT NULL DEFAULT '',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `hd_wish`
--

INSERT INTO `hd_wish` (`id`, `username`, `content`, `time`) VALUES
(3, '娃儿', '阿斯蒂芬 [钱]', 1407490574),
(2, '李世钰', 'To Be No.1[嘻嘻]', 1401008556);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
