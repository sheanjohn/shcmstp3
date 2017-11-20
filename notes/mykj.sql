-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-11-20 08:08:56
-- 服务器版本： 5.7.20-log
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mykj`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `Id` int(11) NOT NULL COMMENT '文章id',
  `Atitle` varchar(20) NOT NULL COMMENT '标题',
  `Acont` text NOT NULL COMMENT '内容',
  `Acont_top` varchar(200) NOT NULL COMMENT '摘要',
  `Fid` int(11) NOT NULL COMMENT '栏目ID',
  `Adate` varchar(10) NOT NULL COMMENT '日期',
  `isshow` int(5) NOT NULL DEFAULT '0' COMMENT '是否显示',
  `zhuanti` int(5) NOT NULL DEFAULT '0' COMMENT '是否为专题0否 非0代表专题栏目ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`Id`, `Atitle`, `Acont`, `Acont_top`, `Fid`, `Adate`, `isshow`, `zhuanti`) VALUES
(3, '自尊', '<p>　　自尊是人思想意识活动的一种本能反映，是一个人做人的起码准则，是思想品德的<br>一个基本要素。自尊是人们自我尊重的心理活动，是在维护自身人格尊严中表现出来的<br>一种行为，往往表现为庄严刚正，神圣不可侵犯。这种心理意识活动，成为挺直人生，<br>书写人生，壮丽人生的精神动力。人们通过自尊坚定理想、信念，勃发昂扬向上精神，<br>保持旺盛士气；通过自尊规范自己的行为，严格道德操守，崇高自己的形象；通过自尊<br>形成和谐的社会氛围，保持良好的社会风尚。<br><br>　　自尊是做人的根本。自古以来，人们就把‘人有脸，树有皮，人活一张脸，书活一张<br>皮。’作为做人的基本要求。要脸就是要自尊，自觉保持自己的良好形象。一个人如果丧<br>失了自尊，不要尊严，其人格就会扭曲，形象就会被贬低，就会没有骨气、志气、锐气、<br>士气。或是唯唯诺诺，奴颜婢膝，一身媚骨；或是庸庸碌碌，醉生梦死；或是泯灭良知，<br>不顾寡廉鲜耻。丧失了自尊就丧失了做人的尊严，丧失了人生的意义。<br><br>　　自尊是人类社会永恒的一道风景。人的各种活动都离不开自尊，在家庭活动中，每个<br>成员的自尊保证了家庭的和睦。在社会活动中，每个人的自尊凝结成国家的尊严，民族的<br>尊严。变成了推动社会进步的巨大力量。<br><br>　　自尊是一种思想道德修养，是良好的思想道德情操。只尊重自己，不尊重别人，那不<br>是自尊，只能是自我欣赏，自我陶醉而已；心高气傲，盛气凌人，不是自尊；固执己见，<br>唯我独尊，也不是自尊。自尊既是主观的内心体察、陶冶，也是客观的心态调整，需要不<br>断地端正自己的人生态度，矫正自己的行为。<br><br>　　自尊需要建设，需要自重、自省、自警。自尊如果失去了自重，就会使自重成为无土<br>之木，无水之鱼；自尊如果失去了自省，就会使自尊变形偏离方向；自尊如果失去了自警，<br>就容易使自尊变质，误入歧途。有人貌似自尊，道貌岸然，实则把自尊践踏；有人顺心了<br>就要自尊，不顺心就不要自尊，把自尊当儿戏，在玩笑自尊中被自尊玩笑。自尊需要心灵<br>的纯洁、质朴，需要秉直刚正的人格。<br><br>　　自尊是一种操守，需要有一个平和的心态。自尊心过强，容易心高气傲，目中无人；容<br>易产生虚荣心理，攀比心理，嫉妒心理。自尊心不强，容易产生卑祛、儒弱心理，不求上进<br>无所作为。要自尊就要不断调整自己的心态，积极上进，适应时代的要求。<br><br>　　自尊是一泓清水，可以洗涤人生；自尊是一座青山，可以苍翠人生；自尊是阳光，可以<br>灿烂人生。把自尊放在怀中，永远挺胸昂首，阔步前进。&nbsp;&nbsp;&nbsp;&nbsp;<br></p>', '自尊是人思想意识活动的一种本能反映', 11, '20171108', 0, 15),
(4, '智能设备优惠购 智能制造产业发展现状如何', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;“小度小度，我要看邓超老婆的电视剧。” “小度小度，我想听周杰伦的歌”“小度小度，冰箱里哪些食材要过期了?”随着搭载百度DuerOS智能硬件产品的集中亮相，越来越多的用户体验到这样便捷的智能生活。11月1日-11月7日，百度DuerOS携手极米等众多合作伙伴开启“让AI发声——DuerOS智能生活体验GO”活动，通过线上和线下联动，面向用户集中出售搭载DuerOS的各类智能产品，涵盖智能家居、可穿戴等多个场景，是一次智能产品的盛大“集市”。&nbsp;&nbsp;<br></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;此次活动出售的智能硬件产品，均搭载百度对话式人工智能系统DuerOS，产品涵盖电视、冰箱、音箱等智能家居、智能穿戴等。用户可以在线上和线下体验极米无屏电视Z5、DOSS小度版智能音箱、美的冰箱539、海尔馨厨冰箱等产品带来的人工智能体验。那么，这些搭载DuerOS的智能硬件产品究竟会对我们的生活产生怎样具体的影响呢?</p><p>　　下面几个场景你一定不陌生：当你结束一天的工作回到家中，瘫倒在沙发上，只需按住遥控器说“小度小度，我想看最新的电视剧”，搭载DuerOS的极米无屏电视就能立即响应你，你也可以直接向它提问“这位演员是谁呀?”电视立刻就能回答你。你甚至可以直接告诉他，“直接跳到第20分钟”，无屏电视Z5就会将剧情跳转到你想看的地方。如果说看搭载DuerOS的无屏电视是你“动口不收手”的好帮手，那么搭载DuerOS的冰箱或许就是你的贴心营养师了，“小度小度，蛋炒饭怎么做?”“海鲜不能跟什么一起吃?”“牛排的卡路里有多少?”……有了智能冰箱，妈妈再也不用担心你的饮食问题。</p><p>　　搭载百度DuerOS的极米激光无屏电视能让你“动口不用动手”</p><p>　　作为AI时代的安卓系统，DuerOS在构建开放生态方面持续领跑，成为目前中国市场势头强劲且最具活力的人机交互平台。2017年，极米和百度达成合作，引入了百度新一代对话式人工智能系统DuerOS，这是极米无屏电视迈向人工智能时代的第一步，也是百度人工智能第一次运用于无屏电视，让用户可以通过大屏率先享受最自然便捷的智能生活体验。目前旗下极米激光无屏电视系列、极米无屏电视H1S、Z5等多款电视已经搭载了百度DuerOS，不仅能满足用户任何时候用超高清大屏的看电影看电视需求，更能通过智能系统读懂用户需求，让用户体验到人工智能带来的美好生活。</p>', '        “小度小度，我要看邓超老婆的电视剧。” “小度小度，我想听周杰伦的歌”“小度小度，冰箱里哪些食材要过期了?”随着搭载百度DuerOS智能硬件产品的集中亮相，越来越多的用户体验到这样便捷的智能生活。11月1日-11月7日，百度DuerOS携手极米等众多合作伙伴开启“让AI发声——DuerOS智能生活体验GO”活动，通过线上和线下联动，面向用户集中出售搭载DuerOS的各类智能产品，涵', 15, '20171113', 0, 6);

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL COMMENT '栏目id',
  `catetitle` varchar(20) NOT NULL COMMENT '栏目名',
  `fid` int(5) NOT NULL DEFAULT '0' COMMENT '位置',
  `url` varchar(20) NOT NULL COMMENT '链接地址',
  `icon` varchar(20) NOT NULL COMMENT '图标',
  `cont` varchar(20) NOT NULL COMMENT '说明',
  `ismenu` int(5) NOT NULL DEFAULT '0' COMMENT '是否显示在导航',
  `isshow` int(5) NOT NULL DEFAULT '0' COMMENT '是否显示在循环列表',
  `orderid` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `zhuanti` int(2) NOT NULL DEFAULT '0' COMMENT '是否为专题栏目(子栏目)',
  `cmod` int(5) NOT NULL DEFAULT '0' COMMENT '指定模块'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `catetitle`, `fid`, `url`, `icon`, `cont`, `ismenu`, `isshow`, `orderid`, `zhuanti`, `cmod`) VALUES
(3, '美家、生活', 0, '', '7', '<b>这里是板块一</b><p><br>', 1, 1, 10, 0, 0),
(8, '汽车、户外、运动', 3, '', '15', '2', 1, 0, 1, 1, 0),
(6, '热销导读', 3, '', '7', '33', 1, 0, 10, 1, 0),
(7, '关于网站', 0, '', '', '', 1, 0, 10, 0, 0),
(9, '包邮专区', 3, '', '7', '2', 1, 0, 3, 0, 0),
(10, '文章中心', 0, '', '', '<p>文章中心</p>', 1, 0, 5, 0, 0),
(11, '其他', 10, '', '', '其他', 1, 0, 10, 0, 0),
(15, '物联网之家', 10, '', '', '物联网专题栏目', 1, 0, 10, 1, 0),
(16, '基于模块栏目', 10, '', '', '123', 1, 1, 10, 0, 5);

-- --------------------------------------------------------

--
-- 表的结构 `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `cname` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '参数名',
  `cvalue` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '参数值',
  `ccont` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '参数说明'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `config`
--

INSERT INTO `config` (`id`, `cname`, `cvalue`, `ccont`) VALUES
(12, 'sh1_site_name0', '小商城', '网站名称'),
(13, 'sh1_site_name1', '基于ThinkPHP3开发', '网站标题'),
(14, 'sh1_site_key', '基于ThinkPHP3开发的小商城', '网站关键字'),
(15, 'sh1_page_listnum0', '10', '前台列表项数量'),
(16, 'sh1_page_listnum1', '10', '后台列表项数量'),
(17, 'sh1_site_desc', '基于ThinkPHP3开发的小商城', '网站描述'),
(18, 'sh1_site_copyright', '葫芦岛明远科技提供技术支持，本站基于ThinkPHP开发设计。', '网站底部文字'),
(21, 'sh1_user_level', '新秀,少侠,大侠,掌门,宗师,盟主', '会员等级'),
(22, 'sh1_user_type', '普通用户,企业用户,VIP用户', '会员类型');

-- --------------------------------------------------------

--
-- 表的结构 `log`
--

CREATE TABLE `log` (
  `Id` int(11) NOT NULL COMMENT '日志id',
  `Uid` int(11) NOT NULL COMMENT '用户ID',
  `Logdate` varchar(10) NOT NULL COMMENT '日期',
  `Jine` float NOT NULL DEFAULT '0' COMMENT '金额',
  `Jifen` float NOT NULL DEFAULT '0' COMMENT '积分额',
  `Action` int(10) NOT NULL COMMENT '操作名',
  `actcont` int(11) NOT NULL COMMENT '操作说明'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL COMMENT 'id',
  `uname` varchar(20) NOT NULL COMMENT '用户名',
  `upswd` varchar(50) NOT NULL COMMENT '密码',
  `utype` int(5) DEFAULT '1' COMMENT '权限区分'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `managers`
--

INSERT INTO `managers` (`id`, `uname`, `upswd`, `utype`) VALUES
(1, 'admin1', '21232f297a57a5a743894a0e4a801fc3', 9),
(3, 'sheanjohn', '21232f297a57a5a743894a0e4a801fc3', 2);

-- --------------------------------------------------------

--
-- 表的结构 `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `mname` varchar(10) NOT NULL COMMENT '模块名',
  `mcid` varchar(100) NOT NULL COMMENT '需要的控件ID，逗号分开',
  `isshow` int(1) NOT NULL DEFAULT '1' COMMENT '是否显示'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `model`
--

INSERT INTO `model` (`id`, `mname`, `mcid`, `isshow`) VALUES
(8, '小视频', '7,12,13,14', 1),
(9, '名片', '8,10,9,12', 1),
(10, '商品', '15,13,12,11,7', 1);

-- --------------------------------------------------------

--
-- 表的结构 `model_ctrls`
--

CREATE TABLE `model_ctrls` (
  `id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL COMMENT '名称',
  `cval` varchar(100) DEFAULT NULL COMMENT '关键值',
  `ccnt` int(10) NOT NULL DEFAULT '0' COMMENT '数量',
  `clen` int(10) NOT NULL DEFAULT '0' COMMENT '长度',
  `ccond` varchar(10) NOT NULL DEFAULT '=' COMMENT '条件（运算）',
  `cloc` int(10) NOT NULL DEFAULT '0' COMMENT '位置0不计算',
  `ctype` varchar(10) NOT NULL DEFAULT 'str' COMMENT '数据类型',
  `cinfo` varchar(60) DEFAULT NULL COMMENT '标记，简要说明',
  `useor` int(1) NOT NULL DEFAULT '0' COMMENT '是否使用编辑器',
  `upic` int(1) NOT NULL DEFAULT '0' COMMENT '是否激活图片库选择'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `model_ctrls`
--

INSERT INTO `model_ctrls` (`id`, `cname`, `cval`, `ccnt`, `clen`, `ccond`, `cloc`, `ctype`, `cinfo`, `useor`, `upic`) VALUES
(7, '标题', '', 0, 21, '<', 0, 'str', '小于20字的字符串', 0, 0),
(8, '姓名', '', 0, 1, '>', 0, 'str', '大于1字的字符（姓名）', 0, 0),
(9, '手机号码', '1', 1, 11, '=', 1, 'int', '手机号码，1开头，11位整数', 0, 0),
(10, '地址', '', 0, 31, '<', 0, 'str', '最多30字的字符串（地址）', 0, 0),
(11, '单价', '', 0, 10, '<', 0, 'int', '价格，小于10位的数字', 0, 0),
(12, '图片', '', 0, 5, '<', 0, 'int', '小于5位的数字（图片库ID）', 0, 1),
(13, '详细介绍', '', 0, 201, '<', 0, 'str', '使用了编辑器的文本，200长', 1, 0),
(14, '下载地址', '', 0, 200, '<', 0, 'str', '下载地址200长字符串', 0, 0),
(15, '品牌', '', 0, 0, '>', 0, 'str', '品牌', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `model_items`
--

CREATE TABLE `model_items` (
  `id` int(11) NOT NULL,
  `model_id` int(10) NOT NULL COMMENT '所属模块',
  `ctrl_id` int(10) NOT NULL COMMENT '控件或规则id（ctrls）',
  `strval` text COMMENT '值'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pic`
--

CREATE TABLE `pic` (
  `Id` int(11) NOT NULL COMMENT '图片库id',
  `pictitle` varchar(15) NOT NULL COMMENT '图库名称'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pic`
--

INSERT INTO `pic` (`Id`, `pictitle`) VALUES
(6, '品牌图库_2017-11-01'),
(5, '图库1');

-- --------------------------------------------------------

--
-- 表的结构 `pic_item`
--

CREATE TABLE `pic_item` (
  `Id` int(11) NOT NULL COMMENT '图片表id',
  `Pictype` int(6) NOT NULL DEFAULT '0' COMMENT '图片类别',
  `Picurl` varchar(200) NOT NULL COMMENT '图片地址',
  `picid` int(11) NOT NULL COMMENT '所在图库ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pic_item`
--

INSERT INTO `pic_item` (`Id`, `Pictype`, `Picurl`, `picid`) VALUES
(9, 1, '/uploads/pic_5/2017-10-31_a.png', 5),
(10, 1, '/uploads/pic_6/2017-11-01_timg (2).jpg', 6),
(7, 1, '/uploads/pic_5/2017-10-27_1c3e6709c93d70cf96673798f0dcd100bba12b82.jpg', 5),
(11, 1, '/uploads/pic_6/2017-11-01_tw.jpg', 6),
(15, 1, '/uploads/pic_6/2017-11-03_124021102_1c3e6709c93d70cf96673798f0dcd100bba12b82.jpg', 6),
(17, 1, '/uploads/pic_5/2017-11-03_143625208_timg.jpg', 5);

-- --------------------------------------------------------

--
-- 表的结构 `shop_active`
--

CREATE TABLE `shop_active` (
  `Id` int(11) NOT NULL COMMENT '活动id',
  `Atitle` varchar(20) NOT NULL COMMENT '积分活动标题',
  `Acateid` int(10) NOT NULL COMMENT '参加活动的产品栏目ID',
  `Ayear` int(4) NOT NULL COMMENT '参加活动的年',
  `Amonth` int(2) NOT NULL COMMENT '参加活动的月',
  `Aday` int(2) NOT NULL COMMENT '参加活动的日',
  `Autype` int(10) NOT NULL DEFAULT '0' COMMENT '参加活动的用户类型',
  `Auid` int(11) NOT NULL COMMENT '参加活动的用户ID',
  `Ajifen` varchar(10) NOT NULL COMMENT '积分制度',
  `Adate` varchar(20) NOT NULL COMMENT '活动结束和开始日期',
  `asta` int(11) NOT NULL DEFAULT '0' COMMENT '活动是否进行'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `shop_address`
--

CREATE TABLE `shop_address` (
  `Id` int(11) NOT NULL COMMENT '地址id',
  `Uid` int(11) NOT NULL COMMENT '用户ID',
  `address` varchar(100) NOT NULL COMMENT '地址串'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `shop_comm`
--

CREATE TABLE `shop_comm` (
  `Id` int(11) NOT NULL COMMENT '商品id',
  `comtitle` varchar(20) NOT NULL COMMENT '商品名',
  `Cateid` int(10) NOT NULL COMMENT '栏目ID',
  `Kucun` int(10) NOT NULL DEFAULT '0' COMMENT '库存',
  `Sta` int(5) NOT NULL DEFAULT '0' COMMENT '状态（是否在售）',
  `Comcont` text NOT NULL COMMENT '商品介绍',
  `Picid` int(11) NOT NULL COMMENT '商品图库',
  `Comcont_top` varchar(200) NOT NULL COMMENT '商品摘要',
  `Ishot` int(5) NOT NULL DEFAULT '0' COMMENT '是否推荐商品',
  `Isup` int(5) NOT NULL DEFAULT '0' COMMENT '是否置顶商品',
  `Titletype` int(5) NOT NULL DEFAULT '0' COMMENT '标题样式',
  `Jiage` float NOT NULL COMMENT '商品价格',
  `Canshu` varchar(50) NOT NULL COMMENT '商品参数名',
  `Canshuzhi` varchar(50) NOT NULL COMMENT '商品参数值',
  `pinpai` int(11) NOT NULL COMMENT '品牌ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `shop_dingdan`
--

CREATE TABLE `shop_dingdan` (
  `Id` int(11) NOT NULL COMMENT '订单id',
  `Uid` int(11) NOT NULL COMMENT '用户ID',
  `Commid` int(11) NOT NULL COMMENT '商品ID',
  `Ddate` varchar(20) NOT NULL COMMENT '日期',
  `Dsta` int(5) NOT NULL DEFAULT '0' COMMENT '订单状态',
  `Dwuliu` varchar(20) NOT NULL COMMENT '物流名称',
  `Djine` int(3) NOT NULL COMMENT '物流金额',
  `Dsn` varchar(20) NOT NULL COMMENT '物流单号',
  `Addid` varchar(100) NOT NULL COMMENT '收货地址ID',
  `paytype` int(11) NOT NULL DEFAULT '0' COMMENT '支付方式'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `shop_moneybase`
--

CREATE TABLE `shop_moneybase` (
  `Id` int(11) NOT NULL COMMENT '资金库id',
  `Yue` float NOT NULL DEFAULT '0' COMMENT '总金额',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `Mtype` int(5) NOT NULL DEFAULT '0' COMMENT '记录类别',
  `Mconfig` int(5) NOT NULL COMMENT '活动参数',
  `mdate` varchar(20) NOT NULL COMMENT '日期'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `shop_paycar`
--

CREATE TABLE `shop_paycar` (
  `Id` int(11) NOT NULL COMMENT '购物车id',
  `Uid` int(11) NOT NULL COMMENT '用户ID',
  `comid` int(11) NOT NULL COMMENT '商品ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `shop_pinpai`
--

CREATE TABLE `shop_pinpai` (
  `id` int(11) NOT NULL COMMENT '品牌id',
  `Pinpaititle` varchar(20) NOT NULL COMMENT '品牌名称',
  `Logo` varchar(200) NOT NULL COMMENT '品牌LOGO',
  `fid` int(10) NOT NULL COMMENT '所在栏目',
  `pcont` text NOT NULL COMMENT '品牌详情'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `shop_pinpai`
--

INSERT INTO `shop_pinpai` (`id`, `Pinpaititle`, `Logo`, `fid`, `pcont`) VALUES
(14, '天王表', '11', 8, '<div label-module=\"para\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;天王表是香港时计宝集团旗下的腕表品牌，采用皇冠造型作为品牌标志，经过二十多年的发展，现已成为国内腕表行业的著名品牌。更先后荣获了“中国名牌”、“中国驰名商标”、“国家级高新技术企业”等荣誉。</div><div label-module=\"para\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;天王表逐步成长为国内知名钟表品牌，并连续四年被国内贸易部、中国电子工业部、中国轻工业总会、中国消费者协会、国家技术监督局、中国纺织总会、国家经贸委等七部委评为全国畅销产品“金桥奖”。</div><p><iframe height=\"498\" width=\"510\" src=\"http://player.youku.com/embed/XMzEyMzI5MzE5Mg==\" frameborder=\"0\" \'allowfullscreen\'=\"\"></iframe></p><p><br></p>'),
(13, '尼桑', '10', 8, '<div label-module=\"para\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日产（NISSAN ），是日本的一家汽车制造商，由鲇川义介(Aikawa Yoshisuke)于1933年在神奈川县横滨市成立，目前在二十个国家和地区（包括日本）设有汽车制造基地，并在全球160多个国家和地区提供产品和服务。</div><div label-module=\"para\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;公司经营范围包括汽车产品和船舶设备的制造、销售和相关业务，现任总裁兼首席执行官为卡洛斯·戈恩（Carlos Ghosn）。1999年，雷诺与日产汽车结成独立的合作伙伴关系，在广泛的领域中展开战略性的合作，日产汽车通过联盟将事业区域拓展至全球，其经济规模大幅增长。</div><div label-module=\"para\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;“NISSAN’（ニッサン）是日语 “日产”两个字的罗马音形式，是日本产业的简称，其含义是 “以人和汽车的明天为目标”。</div><div label-module=\"para\">图形商标是将NISSAN放在一个火红的太阳上，简明扼要地表明了公司名称，突出了所在国家的形象，这在汽车商标文化中独树一帜。</div>');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Jifen` int(6) NOT NULL DEFAULT '0' COMMENT '积分',
  `Shengri` varchar(10) NOT NULL COMMENT '生日',
  `uType` varchar(20) NOT NULL COMMENT '用户类型',
  `weixin` varchar(20) NOT NULL DEFAULT '0' COMMENT '微信',
  `Usex` varchar(5) NOT NULL DEFAULT '男' COMMENT '性别',
  `Old` int(3) NOT NULL DEFAULT '0' COMMENT '年龄',
  `Umail` varchar(20) NOT NULL DEFAULT '@' COMMENT '邮件',
  `Phone` int(15) NOT NULL DEFAULT '0' COMMENT '手机',
  `Qq` int(20) NOT NULL DEFAULT '0' COMMENT 'QQ',
  `Realname` varchar(10) NOT NULL COMMENT '真实姓名',
  `yue` float NOT NULL DEFAULT '0' COMMENT '余额',
  `uname` varchar(20) NOT NULL COMMENT '用户名',
  `upswd` varchar(200) NOT NULL COMMENT 'MD5密码',
  `uleve` varchar(20) NOT NULL COMMENT '用户等级'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `Jifen`, `Shengri`, `uType`, `weixin`, `Usex`, `Old`, `Umail`, `Phone`, `Qq`, `Realname`, `yue`, `uname`, `upswd`, `uleve`) VALUES
(1, 0, '19840818', '普通用户', '0', '男', 0, '@', 0, 0, '真实姓名', 690, 'shean', '1c96b09a0f66835d5c372d1e4064e07e', '宗师');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_ctrls`
--
ALTER TABLE `model_ctrls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_items`
--
ALTER TABLE `model_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pic`
--
ALTER TABLE `pic`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pic_item`
--
ALTER TABLE `pic_item`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `shop_active`
--
ALTER TABLE `shop_active`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `shop_address`
--
ALTER TABLE `shop_address`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `shop_comm`
--
ALTER TABLE `shop_comm`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `shop_dingdan`
--
ALTER TABLE `shop_dingdan`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `shop_moneybase`
--
ALTER TABLE `shop_moneybase`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `shop_paycar`
--
ALTER TABLE `shop_paycar`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `shop_pinpai`
--
ALTER TABLE `shop_pinpai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章id', AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '栏目id', AUTO_INCREMENT=17;

--
-- 使用表AUTO_INCREMENT `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用表AUTO_INCREMENT `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用表AUTO_INCREMENT `model_ctrls`
--
ALTER TABLE `model_ctrls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `model_items`
--
ALTER TABLE `model_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `pic`
--
ALTER TABLE `pic`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图片库id', AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `pic_item`
--
ALTER TABLE `pic_item`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图片表id', AUTO_INCREMENT=18;

--
-- 使用表AUTO_INCREMENT `shop_active`
--
ALTER TABLE `shop_active`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动id';

--
-- 使用表AUTO_INCREMENT `shop_comm`
--
ALTER TABLE `shop_comm`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品id';

--
-- 使用表AUTO_INCREMENT `shop_dingdan`
--
ALTER TABLE `shop_dingdan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单id';

--
-- 使用表AUTO_INCREMENT `shop_moneybase`
--
ALTER TABLE `shop_moneybase`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '资金库id';

--
-- 使用表AUTO_INCREMENT `shop_paycar`
--
ALTER TABLE `shop_paycar`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '购物车id';

--
-- 使用表AUTO_INCREMENT `shop_pinpai`
--
ALTER TABLE `shop_pinpai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '品牌id', AUTO_INCREMENT=15;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
