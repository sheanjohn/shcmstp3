-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-11-22 15:54:57
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
  `Atitle` varchar(60) NOT NULL COMMENT '标题',
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
(1, '共享单车企业或平台拒不退还用户押金，该当何罪？', '<p>2017年2月7日，当时在北京投放的单车品牌及数量还比较少，摩拜、ofo算是比较多的，其他的单车品牌还在踌躇满志要突进该市场。</p><p>　　当时，我在《摩拜299元和ofo99元的押金，离非法集资有多远？》一文提出，共享单车的押金模式，打破了传统<strong>“一个租赁物对应一份押金”</strong>的模式，形成了<strong>“一个人对应一份押金”</strong>的模式，突破了传统押金担保属性，而具有不当募集或占有资金的嫌疑，很可能滑向<strong>“集资诈骗”</strong>犯罪。</p><p>　　如今，在共享单车市场恶性竞争的驱使下，监管尚未干预，众多市场参与者已经“难以为继”，用户押金无法正常退还、供应商欠款无法及时支付，或暂停运营，或濒临破产，甚至有个别中小品牌的共享单车企业已经“跑路”。</p><p>　　那么，类似酷骑单车、小蓝单车，这种明显挪用了用户押金，用于企业经营甚至其他用途的行为，到底该当何罪？</p><p>　　<strong>用户押金资产的所有权归用户所有，平台企业只享有占有权</strong></p><div><img src=\"http://sinastorage.com/storage.caitou.sina.com.cn/products/201711/bea9c22259f72a4ab0245fb43b628d79.jpeg\" alt=\"\"></div><p>　　俗称的<strong>“押金”</strong>即为<strong>“保证金”，按照《物权法》和《担保法》相关法律规定，押金</strong>属于一种特殊的<strong>“动产质权”。</strong>从法律层面讲，缴纳或收取押金，目的在于对双方之间的租赁合同起到一定的担保作用。</p><p>　　简单说，用户向共享单车企业缴纳押金时，其只是转移了押金的占有权，而非转移押金所有权。因此，在用户使用单车期间或未申请退还押金期间，虽然押金被共享单车企业实际占有，但是，其所有权依旧归用户所有。</p><p>　　不论是用户在公司总部排队退押金的酷骑，还是如今小蓝用户申请退押金迟迟不能到账，足以表明当前共享单车企业或平台普遍存在的问题：1）将用户押金、预付资金与企业自有资金完全混同，未作区隔；2）在实际经营过程中，挪走用户押金用作它途，并非例外而是常态。</p><p>　　虽然，包括小蓝单车等在内的多家共享单车或平台曾公开宣称其已对收取的用户押金在银行开立了专门账户，但是，该所为专门账户内的资金流动并非得到有效监管。</p><p>　　那么，对于共享单车企业或平台挪用用户押金的行为，该如何定性？又涉嫌何种犯罪行为？</p><p>　　<strong>挪走用户押金不予退还，共享单车企业到底涉嫌何种罪名？</strong></p><div><img src=\"http://sinastorage.com/storage.caitou.sina.com.cn/products/201711/72000cec33e73d6276dc00c7df716064.jpeg\" alt=\"\"></div><p>　　媒体公开报道显示，在今年2月的一次媒体访谈中，时任小蓝单车副总裁胡宇沸表示，用户押金一部分用于退还用户，另一部分进入运营资金。</p><p>　　事实上，在共享单车企业或平台，自有资金总额足以偿付用户押金且用户申请退还押金，按照约定及时退还的话，那么，共享单车企业或平台临时性挪用的行为，很难说构成违法或犯罪。</p><p>　　但是，当共享单车企业或平台，自有资金总额不足以偿付用户押金时，那么，此时共享单车企业或平台挪走用户押金用作它途的行为，就已经涉嫌犯罪。</p><p>　　按照《刑法》第二百七十条规定，将代为保管的他人财物非法占为己有，数额较大，拒不退还的，处二年以下有期徒刑、拘役或者罚金；数额巨大或者有其他严重情节的，处二年以上五年以下有期徒刑，并处罚金。</p><p>　　因此，当酷骑、小蓝等共享单车企业或平台，财务状况恶化，明知自有资金已不足以偿付用户押金，当用户申请退还而无法依约退还时，这些共享单车企业或平台已经涉嫌构成“侵占罪”。</p><p>　　<strong>只投放车辆、不予以管理维护，共享单车企业就是在集资诈骗</strong></p><div><img src=\"http://sinastorage.com/storage.caitou.sina.com.cn/products/201711/2eca696c01752314a2838e3107449c75.jpeg\" alt=\"\"></div><p>　　在类似酷骑、小蓝等共享单车企业财务状况恶化之后，部分共享单车企业为了归集用户押金，不断加大车辆投放范围及数量，且不对线下车辆予以管理维护。</p><p>　　那么，这个阶段的行为，就具有的违法特征。因为这种“只投放不管理”的行为，其目的就是为了归集用户押金，具有明显的非法占有倾向，则涉嫌集资诈骗罪。</p><p>　　按照《刑法》第一百九十二条规定，以非法占有为目的，使用诈骗方法非法集资，数额较大的，处五年以下有期徒刑或者拘役，并处二万元以上二十万元以下罚金；数额巨大或者有其他严重情节的，处五年以上十年以下有期徒刑，并处五万元以上五十万元以下罚金；数额特别巨大或者有其他特别严重情节的，处十年以上有期徒刑或者无期徒刑，并处五万元以上五十万元以下罚金或者没收财产。</p><p>　　令人吊诡的是，不论是此前的酷骑、还是如今的小蓝，这些濒临倒闭且无法及时退还用户押金的企业或平台CEO，还主动接受媒体采访，或是反思经营策略不当，或是向用户深表歉意，完全未意识到企业的经营行为或自己的决策行为已经涉嫌犯罪。</p><p>　　如今，共享单车恶性竞争的苦果已经陆续，暂不讨论它们倒闭后可能留给各地部门大量车辆需清理，也不谈它们之前无偿使用公共资源从事经营性活动，也不说它们盲目激进给自行车行业上下游留下的一堆“烂账”，仅就用户缴纳的押金被挪用且不予退换的问题，其可能涉嫌的犯罪行为及可能被追究刑事责任的风险，亟需引起其他尚未倒闭的共享单车企业及其负责人的重视和警惕。</p><p>　　毕竟，不是说句“对不起”就可以赎罪的。</p>', '“辜负了各位，对不起”。\n\n　　当小蓝单车CEO李刚面对媒体说出这句话时，不禁想起了年初写的《摩拜299元和ofo99元的押金，离非法集资有多远？》一文。', 2, '20171122', 0, 4);

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
  `cmod` int(5) DEFAULT '0' COMMENT '指定模块'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `catetitle`, `fid`, `url`, `icon`, `cont`, `ismenu`, `isshow`, `orderid`, `zhuanti`, `cmod`) VALUES
(1, '文章中心', 0, '', '4', '<p>无</p>', 1, 0, 10, 0, NULL),
(2, '业界新闻', 1, '', '4', '无', 1, 0, 10, 0, 0),
(3, '商品', 0, '', '3', '<p>无</p>', 1, 0, 10, 0, NULL),
(4, '附属产品', 3, '', '', '无', 1, 0, 10, 1, 1);

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
(12, 'sh1_site_name0', '网站名', '网站名称'),
(13, 'sh1_site_name1', '基于ThinkPHP3开发', '网站标题'),
(14, 'sh1_site_key', '基于ThinkPHP3开发', '网站关键字'),
(15, 'sh1_page_listnum0', '10', '前台列表项数量'),
(16, 'sh1_page_listnum1', '10', '后台列表项数量'),
(17, 'sh1_site_desc', '基于ThinkPHP3开发', '网站描述'),
(18, 'sh1_site_copyright', '葫芦岛明远科技提供技术支持，本站基于ThinkPHP开发设计。', '网站底部文字'),
(21, 'sh1_user_level', '新秀,少侠,大侠,掌门,宗师,盟主', '会员等级'),
(22, 'sh1_user_type', '普通用户,企业用户,VIP用户', '会员类型'),
(25, 'sh1_page_bkc', '#fff', '指定背景颜色');

-- --------------------------------------------------------

--
-- 表的结构 `logmgr`
--

CREATE TABLE `logmgr` (
  `Id` int(11) NOT NULL COMMENT '日志id',
  `uname` varchar(50) NOT NULL COMMENT '用户ID',
  `Logdate` varchar(50) NOT NULL COMMENT '日期',
  `Action` varchar(50) NOT NULL COMMENT '操作名',
  `actcont` varchar(100) NOT NULL COMMENT '操作说明'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `logmgr`
--

INSERT INTO `logmgr` (`Id`, `uname`, `Logdate`, `Action`, `actcont`) VALUES
(2, 'admin1', '20171122022909', '成功毁灭证据', '成功清空了系统日志'),
(3, 'admin1', '20171122023823', '成功改造人……', '成功编辑了一名会员的参数'),
(4, 'admin1', '20171122023841', '头也不回的走了', '成功退出系统'),
(5, 'sheanjohn', '20171122023849', '风尘仆仆的来了', '成功登录系统'),
(6, 'sheanjohn', '20171122023935', '不幸被挡在门外', '试图进入没有权限的管理页面'),
(7, 'sheanjohn', '20171122023946', '不幸被挡在门外', '试图进入没有权限的管理页面'),
(8, 'sheanjohn', '20171122034217', '风尘仆仆的来了', '成功登录系统'),
(9, 'sheanjohn', '20171122034604', '不幸被挡在门外', '试图进入没有权限的管理页面');

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
(3, 'sheanjohn', '1c96b09a0f66835d5c372d1e4064e07e', 2);

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
(1, '附属产品', '1,2,5,4,3', 1);

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
  `cui` int(1) NOT NULL DEFAULT '0' COMMENT '0普通输入框，1激活图片库选择，2下拉列表，3启用编辑器,4选择图片库'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `model_ctrls`
--

INSERT INTO `model_ctrls` (`id`, `cname`, `cval`, `ccnt`, `clen`, `ccond`, `cloc`, `ctype`, `cinfo`, `cui`) VALUES
(1, '名称', '', 0, 60, '<', 0, 'str', '标题60', 0),
(2, '相册', '', 0, 10, '<', 0, 'int', '图库ID', 4),
(3, '内容', '', 0, 200, '<', 0, 'str', '内容200', 3),
(4, '是否显示', '', 0, 2, '<', 0, 'str', '是否', 2),
(5, '设为推荐', '', 0, 2, '<', 0, 'str', '是否', 2);

-- --------------------------------------------------------

--
-- 表的结构 `model_items`
--

CREATE TABLE `model_items` (
  `id` int(11) NOT NULL,
  `model_id` int(10) NOT NULL COMMENT '所属模块',
  `ctrl_id` int(10) NOT NULL COMMENT '控件或规则id（ctrls）',
  `strval` text COMMENT '值',
  `sessc` varchar(100) NOT NULL COMMENT '整条数据标识',
  `orderid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `model_items`
--

INSERT INTO `model_items` (`id`, `model_id`, `ctrl_id`, `strval`, `sessc`, `orderid`) VALUES
(1, 1, 2, '1', '20171120234522', 1),
(2, 1, 1, '商品1', '20171120234522', 0),
(3, 1, 5, '是', '20171120234522', 2),
(4, 1, 4, '是', '20171120234522', 3),
(5, 1, 3, '<p>商品介绍……</p>', '20171120234522', 4);

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
(14, '图库_20171121');

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
(25, 1, 'uploads/pic_14/20171121_10392389_timg.jpg', 14);

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
(1, 0, '19840801', '普通用户', '0', '男', 0, '@', 0, 0, '真实姓名', 690, 'shean', '1c96b09a0f66835d5c372d1e4064e07e', '宗师');

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
-- Indexes for table `logmgr`
--
ALTER TABLE `logmgr`
  ADD PRIMARY KEY (`Id`);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章id', AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '栏目id', AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用表AUTO_INCREMENT `logmgr`
--
ALTER TABLE `logmgr`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志id', AUTO_INCREMENT=10;

--
-- 使用表AUTO_INCREMENT `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `model_ctrls`
--
ALTER TABLE `model_ctrls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `model_items`
--
ALTER TABLE `model_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `pic`
--
ALTER TABLE `pic`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图片库id', AUTO_INCREMENT=15;

--
-- 使用表AUTO_INCREMENT `pic_item`
--
ALTER TABLE `pic_item`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图片表id', AUTO_INCREMENT=26;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '品牌id';

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
