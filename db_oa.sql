-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019 年 07 月 24 日 10:22
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `db_oa`
--
CREATE DATABASE IF NOT EXISTS `db_oa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_oa`;

-- --------------------------------------------------------

--
-- 表的结构 `sp_dept`
--

CREATE TABLE IF NOT EXISTS `sp_dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `sort` int(50) DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `sp_dept`
--

INSERT INTO `sp_dept` (`id`, `name`, `pid`, `sort`, `remark`) VALUES
(1, '管理部', 0, 1, '管理部门'),
(2, '技术部', 0, 4, '技术部'),
(3, '总裁办', 2, 2, '总裁办'),
(4, '财务部', 0, 3, '财务部'),
(5, '设计部', 5, 6, '设计部门'),
(6, '行政部', 0, 9, NULL),
(7, '运维部', 6, 5, NULL),
(8, '人事部', 1, 6, '人事部门');

-- --------------------------------------------------------

--
-- 表的结构 `sp_doc`
--

CREATE TABLE IF NOT EXISTS `sp_doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL COMMENT '公文标题',
  `filepath` varchar(255) DEFAULT NULL,
  `filename` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `hasfile` smallint(1) DEFAULT '0',
  `content` text,
  `author` varchar(40) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- 转存表中的数据 `sp_doc`
--

INSERT INTO `sp_doc` (`id`, `title`, `filepath`, `filename`, `hasfile`, `content`, `author`, `addtime`) VALUES
(1, '易给i奥我i加速度阿斯顿你阿瑟东', NULL, NULL, 0, 'asd', 'asd', 1563755434),
(2, '你是什么小东西', NULL, NULL, 0, '?', 'admin', 1563755619),
(3, '埃及阿斯顿急急急', NULL, NULL, 0, 'qweqwe ', 'q''we', 1563755897),
(4, '我太难了我最近压力真的好大', NULL, NULL, 0, '灭错', NULL, 1563769777),
(5, '你知道不的', NULL, NULL, 0, 'iao', NULL, NULL),
(6, '你好 世界', NULL, NULL, 0, '&lt;p&gt;啊实打实的&lt;/p&gt;', '阿瑟东', 1563762979),
(7, '更新分类', NULL, NULL, 0, '&lt;p&gt;请问请问&lt;/p&gt;', '请问请问', 1563762987),
(8, 'asd', NULL, NULL, 0, '&lt;p&gt;阿瑟东&lt;/p&gt;', '请问请问', 1563763172),
(9, '趣味 ', NULL, NULL, 0, '&lt;p&gt;请问&lt;/p&gt;', '请问', 1563763182),
(10, '趣味 ', NULL, NULL, 0, '&lt;p&gt;请问&lt;/p&gt;', '请问', 1563763223),
(11, '更新分类', NULL, NULL, 0, '&lt;p&gt;阿德飒飒的&lt;/p&gt;', '请问请问', 1563763236),
(12, 'asd ', NULL, NULL, 0, '', 'asd ', 1563765084),
(13, '你好 世界', NULL, NULL, 0, '&lt;p&gt;asdas&amp;nbsp;&lt;/p&gt;', '请问请问', 1563765102),
(14, 'asd ', NULL, NULL, 0, '&lt;p&gt;asd&amp;nbsp;&lt;/p&gt;', 'asd ', 1563765214),
(15, 'asd ', NULL, NULL, 0, '&lt;p&gt;asd&amp;nbsp;&lt;/p&gt;', 'asd ', 1563765653),
(16, '你好 世界', NULL, NULL, 0, '&lt;p&gt;asdasd&lt;/p&gt;', '请问请问', 1563766424),
(17, '你好 世界', NULL, NULL, 0, NULL, '', 1563766581),
(18, '你好 世界', NULL, NULL, 0, NULL, '', 1563766646),
(19, '你好 世界', NULL, NULL, 0, NULL, '', 1563766652),
(20, '', NULL, NULL, 0, NULL, '', 1563766663),
(21, '', NULL, NULL, 0, NULL, '', 1563766677),
(22, '', NULL, NULL, 0, NULL, '', 1563766685),
(23, '一户八月', NULL, NULL, 0, '', '请问请问', 1563766707),
(24, '一部百一', '/Public/Upload/2019-07-22/5d353097ef731.jpeg', '6cf44aa8ec3742559887ef1589f05e6f.jpeg', 1, '&lt;p&gt;你话hi奥&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;', '请问请问', 1563766935),
(25, '黄孟继', '/Public/Upload/2019-07-22/5d3548e176355.png', 'b21c8701a18b87d6fceb6fdf2fc8093d1d30fd8f.png', 1, '&lt;p&gt;你早了么&lt;/p&gt;', '请问请问', 1563773153),
(26, 'asd', '/Public/Upload/2019-07-22/5d354a800a2ec.png', 'c05ddd13d26a4ce483d69fa2d13cb210.png', 1, '', '啊', 1563773568),
(27, '你好 世界', '/Public/Upload/2019-07-22/5d3577cd3d396.png', 'eac4b74543a982260ed3f391ba4298044b90ebb8.png', 1, '&lt;p&gt;老三喜欢包小姐&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;', '老三', 1563785165),
(28, '老三喜欢产品经理', '/Public/Upload/2019-07-22/5d35787de9f28.png', 'b21c8701a18b87d6fceb6fdf2fc8093d1d30fd8f.png', 1, '&lt;p&gt;你看见了女人就跟 狗见了屎一样 香死你了&amp;nbsp;&lt;br/&gt;&lt;/p&gt;', '韩庆华', 1563785341),
(29, '老三喜欢产品经理', '/Public/Upload/2019-07-23/5d36538f1856d.gif', 'aef32fcca9454b0d86031d858326f220.gif', 1, '&lt;h1 style=&quot;font-size: 32px; font-weight: bold; border-bottom: 2px solid rgb(204, 204, 204); padding: 0px 4px 0px 0px; text-align: left; margin: 0px 0px 10px;&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;今天是个好日子啊&lt;br/&gt;&lt;/h1&gt;', 'asd', 1563791929),
(30, '老三喜欢产品经理', NULL, NULL, 0, '', '请问请问', NULL),
(31, 'asd', NULL, NULL, 0, '&lt;p&gt;a&lt;/p&gt;', 'asd a', 1563874415);

-- --------------------------------------------------------

--
-- 表的结构 `sp_email`
--

CREATE TABLE IF NOT EXISTS `sp_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL COMMENT '发送者ID',
  `to_id` int(11) NOT NULL COMMENT '接收者ID',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `file` varchar(255) DEFAULT NULL COMMENT '文件',
  `hasfile` smallint(1) DEFAULT '0' COMMENT '是否有附件',
  `filename` varchar(255) DEFAULT NULL COMMENT '文件原始名',
  `content` text COMMENT '内容',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `isread` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `sp_email`
--

INSERT INTO `sp_email` (`id`, `from_id`, `to_id`, `title`, `file`, `hasfile`, `filename`, `content`, `addtime`, `isread`) VALUES
(1, 1, 6, '老三喜欢产品经理', '/Public/Upload/2019-07-23/5d36d53ae2aeb.png', 1, NULL, '1754747', 1563874618, 1),
(2, 2, 11, '老三喜欢产品经理', '/Public/Upload/2019-07-23/5d36d753dc65f.png', 1, 'player_cover.png', '9999999999999999999', 1563875155, 0),
(3, 1, 8, '吃饭', NULL, 0, NULL, '好的', 1563878732, 0),
(4, 1, 5, '老三喜欢产品经理', NULL, 0, NULL, '阿瑟东', 1563884709, 0),
(5, 1, 7, '老三喜欢产品经理', NULL, 0, NULL, 'as', 1563884737, 0),
(6, 1, 3, '更新分类', NULL, 0, NULL, '7', 1563885441, 0),
(7, 2, 1, '你是什么东西', '/Public/Upload/2019-07-24/5d37c2f8342b5.png', 1, '5d36d53ae2aeb.png', '66666', 1563935480, 0),
(8, 2, 1, '垃圾', NULL, 0, NULL, '操', 1563935770, 0),
(9, 1, 5, '老三喜欢产品经理', NULL, 0, NULL, 'qq', 1563935834, 1),
(10, 1, 5, '', '/Public/Upload/2019-07-24/5d37c6b4af09b.docx', 1, 'ThinkPHP.docx', '', 1563936436, 1),
(11, 1, 5, 'sb', NULL, 0, NULL, 'db', 1563937662, 1),
(12, 1, 5, '老三喜欢产品经理', '/Public/Upload/2019-07-24/5d37cca4f1c00.docx', 1, '移动.docx', '666666', 1563937956, 1),
(13, 1, 2, 'chishaenm ', NULL, 0, NULL, '777777777', 1563938233, 1),
(14, 1, 8, '2', '/Public/Upload/2019-07-24/5d37d31693cd8.txt', 1, 'tp基础.txt', '', 1563939606, 0),
(15, 2, 1, '什么东西啊', NULL, 0, NULL, '啊啊啊', 1563961548, 1);

-- --------------------------------------------------------

--
-- 表的结构 `sp_konwledge`
--

CREATE TABLE IF NOT EXISTS `sp_konwledge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '标题',
  `thumb` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `picture` varchar(255) DEFAULT NULL COMMENT '图片',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `content` text COMMENT '内容',
  `author` varchar(40) NOT NULL COMMENT '作者',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `sp_konwledge`
--

INSERT INTO `sp_konwledge` (`id`, `title`, `thumb`, `picture`, `description`, `content`, `author`, `addtime`) VALUES
(1, '老三喜欢产品经理', '/Public/Upload/2019-07-23/thumb_5d366c7baddc1.gif', NULL, '老三喜欢产品进来', '色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三', 'my', NULL),
(2, '老三喜欢产品经理', '/Public/Upload/2019-07-23/thumb_5d366c7baddc1.gif', '/Public/Upload/2019-07-23/5d366c7baddc1.gif', '', '色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三', 'asd ', 1563847811),
(3, '老三喜欢产品经理', '/Public/Upload/2019-07-23/thumb_5d366c8319803.gif', '/Public/Upload/2019-07-23/5d366c8319803.gif', '', '色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三色鬼三', 'asd ', 1563847818),
(4, '老三喜欢产品经理', '/Public/Upload/2019-07-23/thumb_5d3671e32a063.png', '/Public/Upload/2019-07-23/5d3671e32a063.png', '啊实打实的', '啊实打实的', '请问请问', 1563849187),
(5, '你好 世界', '/Public/Upload/2019-07-23/thumb_5d367c218ef92.png', '/Public/Upload/2019-07-23/5d367c218ef92.png', 'asasd', 'asddas', '请问请问', 1563851809),
(6, '你好 世界', '/Public/Upload/2019-07-23/thumb_5d367c30ba836.gif', '/Public/Upload/2019-07-23/5d367c30ba836.gif', '', '', 'asd', 1563851833),
(7, '66666', NULL, NULL, '', '', '', 1563852238),
(8, '789789', NULL, NULL, '', '', 'asd', 1563852250),
(9, '', NULL, NULL, '', '', 'asd', 1563852311),
(10, '老三喜欢产品经理d', NULL, NULL, '', '', 'asdd', 1563852644);

-- --------------------------------------------------------

--
-- 表的结构 `sp_user`
--

CREATE TABLE IF NOT EXISTS `sp_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` char(32) NOT NULL,
  `nickname` varchar(40) NOT NULL,
  `truename` varchar(40) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `tel` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `sp_user`
--

INSERT INTO `sp_user` (`id`, `username`, `password`, `nickname`, `truename`, `dept_id`, `sex`, `birthday`, `tel`, `email`, `remark`, `addtime`, `role_id`) VALUES
(1, 'admin', 'admin', '狠狠', '管理员', 1, '男', '2019-07-19', '123', '15', '都是', 154545, 1),
(2, 'qwe', 'qwe', '含量', '张三', 2, '女', '2019-08-02', '12311515151', '1235645@163.com', '我太难了', 1563518304, 2),
(3, 'qwe', 'qweqwe', 'asd', '李四', 3, '男', '2019-08-09', '12311515151', '333333333@qq.com', ' 45454', 1563519197, 1),
(4, 'qqq', 'admin', '狠狠', '杨康', 4, '男', '2019-07-19', '123', '15', '都是', 154545, 1),
(5, 'aa', 'admin', '狠狠', '李昊', 1, '男', '2019-07-19', '123', '15', '都是', 154545, 1),
(6, 'adminsad', 'jjj', '狠狠', '王思雨', 7, '男', '2019-07-19', '123', '15', '都是', 154545, 1),
(7, 'dsd', 'admin', '狠狠', '胡汉三', 1, '男', '2019-07-19', '123', '15', '都是', 154545, 3),
(8, 'admin', 'admin', '狠狠', '白起', 1, '男', '2019-07-19', '123', '15', '都是', 154545, 3),
(9, 'adminsad', 'admin', '狠狠', '吕布', 2, '男', '2019-07-19', '123', '15', '都是', 154545, 3),
(10, 'asd', 'admin', '狠狠', '蒙面', 2, '男', '2019-07-19', '123', '15', '都是', 154545, 3),
(11, 'admindd', 'admin', '狠狠', '老三', 2, '男', '2019-07-19', '123', '15', '都是', 154545, 3),
(12, 'admin', 'admin', '狠狠', '呆瓜', 1, '男', '2019-07-19', '123', '15', '都是', 154545, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
