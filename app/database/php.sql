-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-06-24 14:08:38
-- 服务器版本： 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php`
--

-- --------------------------------------------------------

--
-- 表的结构 `actors`
--

CREATE TABLE IF NOT EXISTS `actors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `avatarUri` varchar(255) NOT NULL,
  `introduce` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `actorName` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `actors`
--

INSERT INTO `actors` (`id`, `name`, `avatarUri`, `introduce`) VALUES
(1, '纳兹', '头像1', '火之灭龙魔导师'),
(2, '伽吉鲁', '头像2', '铁之灭龙魔导师'),
(3, '温蒂', '头像3', '天之灭龙魔导师'),
(4, '拉克萨斯', '头像4', '雷之灭龙魔导师'),
(5, '斯汀', '头像5', '光之灭龙魔导师');

-- --------------------------------------------------------

--
-- 表的结构 `cartitems`
--

CREATE TABLE IF NOT EXISTS `cartitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalPrice` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `owner` (`owner`),
  KEY `item` (`item`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `categoryTitle` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(5, '剧情'),
(1, '动画'),
(2, '搞笑'),
(3, '热血'),
(4, '电影');

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie` int(11) NOT NULL,
  `content` text NOT NULL,
  `poster` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `movie` (`movie`),
  KEY `poster` (`poster`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`id`, `movie`, `content`, `poster`, `created_at`, `updated_at`) VALUES
(1, 4, '从品牌来说的话，冰箱类西门子和海尔是比较好的，应该比美的海信什么的做得好些吧！ 性价比来说的话一定要最低价出手，买的时候可以看看一淘网上面的商品历史价格，我是在2299出手的，但送的1000元券对我来说，意义不大，我觉得送券是个噱头。', 1, '2014-06-24 03:43:26', '2014-06-24 03:43:26');

-- --------------------------------------------------------

--
-- 表的结构 `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `alias` varchar(255) DEFAULT NULL,
  `directors` varchar(255) NOT NULL,
  `countries` varchar(255) NOT NULL,
  `languages` varchar(255) DEFAULT NULL,
  `time_length` int(11) DEFAULT NULL,
  `rank` double NOT NULL DEFAULT '2.5',
  `coverUri` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `summary` text NOT NULL,
  `movieUri` varchar(255) NOT NULL,
  `trailerUri` varchar(255) NOT NULL,
  `photos` text,
  `bgUri` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `unitPrice` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `movies`
--

INSERT INTO `movies` (`id`, `title`, `year`, `created_at`, `alias`, `directors`, `countries`, `languages`, `time_length`, `rank`, `coverUri`, `website`, `summary`, `movieUri`, `trailerUri`, `photos`, `bgUri`, `updated_at`, `unitPrice`) VALUES
(1, '逃离德黑兰', 2012, '2014-06-24 11:05:56', NULL, '本·阿弗莱克', '美国', NULL, NULL, 2.5, '/images/movies/Argo-poster.jpg', NULL, '1979年11月4日，伊朗德黑兰的美国大使馆被几百名伊朗民众、宗教学生及革命联队抗议示威，大使馆的所有人员接到“开始销毁所有敏感资料”的指令后立刻开始用焚化炉和碎纸机毁掉重要文件，但伊朗民众还是在大使馆开门的情况下攻了进去。不到一个小时，美国大使馆被宣告占领，六十六名美国外交官和平民被民众扣留为人质，伊朗现任领导人鲁霍拉·穆萨维·霍梅尼声称：如果美国没把躲至美国的伊朗前任领导人穆罕默德·礼萨·巴列维引渡回来就会一直将人质扣留。但在民众占领大使馆前，有六名负责办美国签证的外交人员从大使馆后门成功逃离，也在后来躲到加拿大大使肯·泰勒的官邸。而美国国务院和白宫接到消息后决定先把逃走的六个人放一边，先解决在大使馆里的人质问题。', '/videos/Argo-L.mp4', '/videos/Argo-S.mp4', NULL, '/images/movies/Argo-cut.jpg', '0000-00-00 00:00:00', 6),
(2, '超级战舰', 2012, '2014-06-24 11:05:56', NULL, '彼得·博格', '美国', NULL, NULL, 2.5, '/images/movies/Battleship_poster.jpg', NULL, '《超级战舰》根据变形金刚玩具公司孩之宝的另一款玩具与游戏改编，由彼得·博格执导。电影讲述美国海军军官艾利克斯·霍普中尉 (泰勒·克奇饰) 被上级派往导弹驱逐舰USS 约翰·保罗·琼斯号 (USS John Paul Jones) 上履行职务，在夏威夷的一次多国联合海上演习时，舰队遇到了隐匿在太平洋深海的外星巨形母舰，来者不善，人类为保卫地球，力阻浩劫，艾利克斯率领被保护罩孤立的海军舰队，尽力一搏，与来自外太空的外星战舰震撼开战。', '/videos/Battleship-L.mp4', '/videos/Battleship-S.mp4', NULL, '/images/movies/Battleship_cut.jpg', '0000-00-00 00:00:00', 6),
(3, '豚鼠特工队', 2009, '2014-06-24 11:05:56', NULL, '霍伊特·耶特曼', '美国', NULL, NULL, 2.5, '/images/movies/GForce-poster.jpg', NULL, '在一个政府秘密计划中，科学家本训练了几只动物间谍。这些受到高强化训练并且全身武装了最先进侦察设备的豚鼠们在一个家电制造商的电脑里发现世界的命运掌握在它们的小爪中。\n团队成员达尔文（山姆·洛克威尔 配音）是队长，坚决要不惜一切代价取得成功；布拉斯特（崔西·摩根 配音）是位有着许多想法同时对所有事情都极度热爱的武器专家；而华蕾斯（佩内洛普·克鲁兹 配音）则是一位性感的武功高手；再加上飞檐走壁的侦察员-苍蝇莫奇和精通电脑和信息技术的星鼻鼹鼠斯贝克尔斯（尼古拉斯·凯奇 配音）。\n在执行任务期间，它们遇到了形形色色动物王国里的其它成员，其中包括宠物店里不务正业，胆小怕事，但最后救了达尔文的赫尔利（乔恩·费儒 配音）和敏感，疯狂保卫自己领土的白鼬--巴克（史蒂夫·布西密 配音）…… 展开了一场前所未有的精彩冒险。', '/videos/GForce-L.mp4', '/videos/GForce-S.mp4', NULL, '/images/movies/GForce-cut.jpg', '0000-00-00 00:00:00', 6),
(4, '墓地邂逅', 2012, '2014-06-24 11:43:26', NULL, 'The Vicious Brother', '美国', NULL, NULL, 4, '/images/movies/GraveEncounters-poster.jpg', NULL, '兰斯普·雷斯顿和一档名为“墓地邂逅”的节目组成员到一个已经废弃的精神病院拍摄节目，而“墓地邂逅”就是一档专门寻找幽灵鬼魂等灵异事件的节目。而此次节目找到这家精神病院是因为传说这家医院发生过非常多科学无法解释的现象，而这些现象早在几年前就被报道出来，一直持续到现在。为了拍摄到有价值的电视画面，到了晚上，他们很自觉地像平常一样把自己锁在这栋恐怖的建筑里面，开始用摄像机捕捉一些非自然的现象。可是他们很快就意识到，这栋建筑不仅仅是闹鬼那么简单，这间医院像是有生命的，并且不打算让这些人离开。他们发现自己迷失在一个像迷宫一样的诡异之地，有的只是无尽的走廊和之前死在这所医院的人的鬼魂···他们甚至很快发现自己的神智都有些不清楚，越陷越深，最终到了一个疯狂的地步。直到最后他们发现如果要知道真相就必须先了解这家医院黑暗的过去···', '/videos/GraveEncounters-L.mp4', '/videos/GraveEncounters-S.mp4', NULL, '/images/movies/GraveEncounters-cut.jpg', '2014-06-24 03:43:26', 6),
(5, '环形使者', 2012, '2014-06-24 11:05:56', NULL, '莱恩·约翰逊', '美国', NULL, NULL, 2.5, '/images/movies/Looper-poster.jpg', NULL, '《环形使者》是莱恩·约翰逊执导，“囧瑟夫”约瑟夫·高登-莱维特、布鲁斯·威利斯、艾米丽·布朗特、许晴主演的一部电影，影片讲述了未来时空旅行变得简单，而有一些“环形杀手”为了赚取利益，都会把来自未来的自己杀掉，约瑟夫·高登-莱维特饰演的乔就是一个“环形杀手”，当他遇到未来的自己时，没有想到未来的自己将自己打倒，老乔目标要去杀一个叫“唤雨师”的孩子，就是年轻乔现在的老板，但是乔告诉莎拉自己的儿子就是“唤雨师”，现在已成年的“唤雨师”准备杀掉所有环形杀手，老乔为了自己的妻子不得不杀这个还没成年的孩子，而年轻的乔为了保护莎拉母子，一个现在的乔和一个未来的乔不得不展开对决', '/videos/Looper-L.mp4', '/videos/Looper-S.mp4', NULL, '/images/movies/Looper-cut.jpg', '0000-00-00 00:00:00', 6),
(6, '守护者联盟', 2012, '2014-06-24 11:05:56', NULL, '彼得·拉姆齐', '美国', NULL, NULL, 2.5, '/images/movies/RiseoftheGuardians-poster.jpg', NULL, '老人诺斯（亚历克·鲍德温 配音）、复活节兔子（休·杰克曼 配音）、牙仙（艾拉·菲舍尔 配音）和沙人，这些童年的守护者个个长生不老、力量强大又动作敏捷，他们的任务就是尽其所能保护所有孩子的天真与想象力。\n但随着一个心怀不轨的邪恶梦魇（裘德·洛 配音）出现了，他打算抢夺孩子们的希望和梦想来抹去守护者的存在。他的阴谋是到处散布恐惧来征服全世界，而唯一能够阻止他的就是相信的力量，以及守护者拥有的神奇魔力。\n此时这群童年的守护者们需要冰霜侠杰克（克里斯·派恩 配音）助其一臂之力，但这位新加入的守护者却只喜欢玩雪，对拯救世界毫不关心。从北极最深的隐蔽处、上海的屋顶到新英格兰的迷你小镇，守护者们在世界各个角落进行一场规模浩大的战争以对抗邪恶又擅于蛊惑人心的邪恶梦魇。', '/videos/RiseoftheGuardians-L.mp4', '/videos/RiseoftheGuardians-S.mp4', NULL, '/images/movies/RiseoftheGuardians-cut.png', '0000-00-00 00:00:00', 6),
(7, '寂静岭', 2012, '2014-06-24 11:05:56', NULL, '迈克尔·巴塞特', '美国', NULL, NULL, 2.5, '/images/movies/SilentHill-poster.jpg', NULL, '海瑟梅森和父亲哈利梅森一直以来都在躲避不明力量的恐怖追杀。她18岁生日当晚，在梦魇缠身和父亲神秘失踪的诡谲情况下，海瑟发现自己原来从未了解“真正的自己”。随着启示录的指引，她踏入了一个危机四伏、狂暴绝伦，可能令她永世不得脱身的邪恶世界……\n海瑟(Heather)跟父亲哈利(Harry)六年来，到处搬家换名字躲避追杀，哈利并告诫海瑟随时保持警戒。在海瑟十八岁生日前夕，海瑟的噩梦越来越频繁且真实。海瑟在新的高中，认识了一样是转学生的文森(Vincent)。文森对海瑟很热情友好，让海瑟对文森有了好感。海瑟在某日放学后，遇到了私家侦探道格拉斯(Douglas)。道格拉斯警告海瑟，异教徒要抓海瑟回寂静岭。海瑟打电话回家告诉父亲哈利，哈利跟女儿约在大卖场的快乐汉堡见面，但哈利刚出门就被抓走。海瑟到卖场等父亲，却发现眼前的人都变成恐怖的怪物、到处都是血腥恐怖的场景。惧怕的海瑟逃离商场途中遇到道格拉斯，在电梯中道格拉斯被怪物抓走杀死。警察发现海瑟的外套上，有道格拉斯的血迹并列海瑟为嫌疑犯追捕。', '/videos/SilentHill-L.mp4', '/videos/SilentHill-S.mp4', NULL, '/images/movies/SilentHill-cut.jpg', '0000-00-00 00:00:00', 6),
(8, '特种部队', 2009, '2014-06-24 11:05:56', NULL, '斯蒂芬·索莫斯', '美国', NULL, NULL, 2.5, '/images/movies/TheRiseofCobra-poster.jpg', NULL, '地球上出现了一个极其神秘的恐怖组织，它的名字叫 “眼镜蛇”， 而让“眼镜蛇”闻名全球的原因，则是源自其对埃菲尔铁塔的一次恐怖行动，在“眼镜蛇”的恐怖轰炸之下，这座法 　国的标志性建筑物顷刻之间化为乌有。很显然，眼镜蛇的这次行动只是一个开始，它向全世界宣告眼镜蛇的成立，而他们的目的则隐藏得更深，许多国家开始感到不安，因为他们不知道什么时候“眼镜蛇”的恐怖行径就会落到自己的国家当中，世界陷入了恐慌状态。联合国对此也感到大为棘手，因此这时候，总部设在布鲁塞尔的一支秘密行动小组就开始发挥了他的威力。', '/videos/TheRiseofCobra-L.mp4', '/videos/TheRiseofCobra-S.mp4', NULL, '/images/movies/TheRiseofCobra-cut.png', '0000-00-00 00:00:00', 6),
(9, '全面回忆', 2012, '2014-06-24 11:05:56', NULL, '伦·怀斯曼', '美国', NULL, NULL, 2.5, '/images/movies/TotalRecall-poster.jpg', NULL, '影片情节发生在21世纪末的地球，那时地球上有“殖民地“和“英联邦”两个国家。到达两地的唯一方式是从地心穿过的“天梯”，殖民地的“反叛军”和英联邦的“联邦军”为了争夺地球上稀有的土地资源而矛盾重重。道格拉斯·奎德（柯林·法瑞尔 饰）是一家机器人工厂里的工人，即使他已经拥有了美丽的洛莉（凯特·贝金赛尔 饰）做妻子，但是他仍然需要依靠将那些无边的想象转换成真实的记忆，来掩盖自己过于无趣和令人沮丧的人生。他总是把自己幻想成是一名超级间谍，轻易就能得到他梦寐以求的一切。', '/videos/TotalRecall-L.mp4', '/videos/TotalRecall-S.mp4', NULL, '/images/movies/TotalRecall-cut.jpg', '0000-00-00 00:00:00', 6),
(10, '温暖的尸体', 2013, '2014-06-24 11:05:58', NULL, '乔纳森·莱文', '美国', NULL, NULL, 2.5, '/images/movies/WarmBodies-poster.jpg', NULL, '故事描述的是一场发生在一个美丽的人类少女和一个敏感纤细的僵尸少年之间的禁忌之恋，而伴随着这一切一起发生的，是一个正在被数量庞大的活死人迅速攻占的黑暗的世界，人性也随之沦陷——虽然处处充斥着可怕的骤变，但是美妙的爱情却能够冲淡所有的恐惧与不安。\n整个故事开始于一个似曾相识的经典桥段——神秘的病毒突然大面积地爆发，也让人类文明直接陷入了消亡当中，任何感染病毒的人都会变成不死僵尸，无爱无恨，只对血肉有着不可抑制的饥渴。至于那些得以幸存下来的人，则活在了漫无边际的恐惧之中，只能眼睁睁地看着自己所爱之人活生生的变成了一具行尸走肉。但是，当一群僵尸围堵住了一个负责补给和侦察工作的人类小分队时，其中一位被称之为R（尼古拉斯·霍尔特饰）的饱含深情的僵尸，对可爱的人类女子朱莉（泰莉莎·帕尔墨饰）一见钟情，所以他不但没有吃掉她的脑子，还从饥饿的同伴手中把她救了出来。', '/videos/WarmBodies-L.mp4', '/videos/WarmBodies-S.mp4', NULL, '/images/movies/WarmBodies-cut.jpg', '0000-00-00 00:00:00', 6);

-- --------------------------------------------------------

--
-- 表的结构 `movie_actor`
--

CREATE TABLE IF NOT EXISTS `movie_actor` (
  `movie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  PRIMARY KEY (`movie_id`,`actor_id`),
  KEY `actor_id` (`actor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `movie_actor`
--

INSERT INTO `movie_actor` (`movie_id`, `actor_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(1, 2),
(2, 3),
(1, 4),
(5, 5);

-- --------------------------------------------------------

--
-- 表的结构 `movie_category`
--

CREATE TABLE IF NOT EXISTS `movie_category` (
  `movie_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`movie_id`,`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `movie_category`
--

INSERT INTO `movie_category` (`movie_id`, `category_id`) VALUES
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(2, 2),
(3, 2),
(2, 3),
(1, 4),
(1, 5);

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `imgUri` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `imgUri`, `created_at`, `updated_at`) VALUES
(1, '【北美影讯】《猩球崛起：黎明之战》新画面人猿短兵相接', '即将于7月11日北美上映的科幻大作《猩球崛起》，再度曝光新画面，加里·奥德曼面对恐慌的人群登高一呼，要与猿族势不两立；而日益促狭的生存环境，则让人与猿不可避免地短兵相接，误会日渐加深......\n\n《猩球崛起：黎明之战》是2011年《人猿星球》的续集，故事背景设在前作15年之后，前作结尾，致命病毒弥漫全球，幸存下来的人类，与高度进化、进占地球的猿族，为了争夺生活空间，以及对地球的控制权，似乎不可避免地再度滑向对立与战争的深渊。\n\n影片由拍摄过《科洛弗档案》、《美版生人勿近》的马特·里夫斯执导，安迪·瑟金斯继续通过动作捕捉出演猿王凯撒，加里·奥德曼、杰森·克拉克联袂加盟。前作中饰演凯撒养父的詹姆斯·弗兰科，也将随着凯撒的温情回忆客串出镜。', '/images/news/comment1.jpg', '2014-06-24 11:06:07', '0000-00-00 00:00:00'),
(2, '北美影讯】《寻找幸福的赫克托》欢乐中国行', '外媒称之为“年度正能量电影”，“男版‘饭祷爱’（Eat, Pray, Love）”。全明星阵容，心理医生环游世界，来到中国找幸福的故事。\n\n男主角赫克托，一位伦敦的心理医生，由出演过《星际迷航》、《僵尸肖恩》、《如何众叛亲离》等影片的英国演员西蒙·佩吉扮演。兴许是工作中负能量太多，他开始怀疑幸福是否真的存在，如果是，那幸福之道又是何为，他毅然决心环游世界，只为寻找答案，中国也是其中一站。\n\n导演既是拍出过《谈谈情，跳跳舞》和《缘分天注定》的彼德·切尔瑟姆，自然也一脉相承了他的温暖深情。让·雷诺、出演过《医院风云》、《黑暗中的舞者》及《狗镇》的瑞典演员斯特兰·斯卡斯加德，以及奥斯卡影帝克里斯托弗·普卢默，都将在赫克托的旅途上与他相遇，共同探访幸福。\n\n影片将于9月19日北美上映。\n', '/images/news/comment2.jpg', '2014-06-24 11:06:07', '0000-00-00 00:00:00'),
(3, '《环太平洋》：剔除内核的纯感官视效', '从去年年尾盼到今年年中，从暑期最酷到没有之一，《环太平洋》在我心目中的量级就放佛这巨大的怪兽和巨大的机甲，根本无从测量。当期待变成现实，当现实尘埃落定，有时发现有时的乐趣可能就只在一个念想。有个念想，好比活着有个奔头，这便成了热爱电影的意义。有意思的是，热爱的电影越多，留下的遗憾越多，可是，翻来覆去，让我们重拾念想的电影又有很多，周而复始，反反复复，最终留下的，就只有习惯。习惯是为自然，自然寻得领悟，以至于，在一场聒噪的大战之后，我思考的不是机甲和怪兽，我再一次心疼那人类辛辛苦苦建造起来的高楼大厦，同情那里面不知道上班还是下班的人类，放佛只有楼宇瞬间崩塌，人类如受惊仓鼠一般躲入断瓦残垣的缝隙，才显示所谓出浩瀚鸿篇的意义。\n \n 时下北美有个影评人对今年的好莱坞大作做了一句精准的测评，期间说道的意思是：今年上映的暑期大作，以目前所处的处境，已经充分对得起它们的属性。也许，科技越发达，技术越先进，我们所能创造的奇观，我们所能抵达的境界，电影，这个本意造梦的机器，难道有些黔驴技穷了吗？有时候我们会扪心自问，我们为什么会在看电影？就图个乐呵？就算我们把电影统统通俗化为娱乐，也无法抹去电影丛林中无处不在的永远镌刻内心的那些深沉。多数时间，我们不会对视效类电影有过多的情节考量，这源于一种观影基调，大多数人也不会把不同类型的电影来做比较，进而得出一些啼笑皆非的荒唐结论。那么，作为一部主打机械题材的特效电影来说，在这个门类里，《环太平洋》是否完成了自己首部曲的使命，答案我个人认为是否定的。即便有续集不断涌现，这第一部的水准也是后者非常容易就可逾越的。', '/images/news/comment3.jpg', '2014-06-24 11:06:07', '0000-00-00 00:00:00'),
(4, '请允许我礼貌地杀人', '这个片子跟《无耻混蛋》非常像，简直是《无耻混蛋》的解放黑奴版；题材都是投机，昆汀是个小聪明的人，要搁在天朝，他这点伎俩全瞎——打着红旗反红旗，打着反NAZI反种族主义的旗号，却以欣赏、精致、咏叹地的笔调，精心刻画了NAZI校官的形象，以及小李的农场主形象。看看昆汀的低俗小说、杀死比尔就不难明白，他那骨子里的肃杀之风，精美之意，透着浓重的精英主义鹰派格调。\n \n      聚光灯分几个点布光，极其细致、稳重、漂亮的分镜头，智趣的台词，迂腐地充满着哲思与艺术气质的侩子手，出人意料的“硬”死亡，如低俗小说般的连锁反应的情节，可以说，昆汀的每部片子都是一部低俗小说，在中国就叫故事会。\n \n      老比尔说过，我们是杀手，可我们是高雅的杀手，我们不干失身份的事。同样，再次斩获奥斯卡影帝的克里斯托弗.瓦尔兹在该片中一再客气地对一再爆粗口辱骂他的奴隶贩子说：“请问你拿枪指着我，是只做做样子，还是真的要杀死我？”当再次被骂后，他无奈地耸耸肩说，那就没办法了，然后，半秒之内，人脑与马脑飞溅，人血共马血一色。尽管如此，他还是很绅士地对另一个重伤的奴隶贩子说：你看到了，是他威胁要杀死我我才被迫反击的，这里有一二三四……五（他数了数奴隶的数目）个证人能为我证明。——影片开场，一个有着用来迷倒知识分子的书卷气与文艺范儿的、同时又拥有百步穿杨的枪法来保证他不合时宜的书卷气能够继续行之于世的可爱的男人的形象，跃然于荧幕前。这种客客气气、妙语连珠、长句不断、思维fancy，然后鲜血淋淋、突死突生、大起大落的人物形象与情节，就成了昆汀的注册商标。', '/images/news/comment4.jpg', '2014-06-24 11:06:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `orderitems`
--

CREATE TABLE IF NOT EXISTS `orderitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalPrice` double NOT NULL,
  `buyer` int(11) NOT NULL,
  `order_id` int(9) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `item` (`item`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `orderitems`
--

INSERT INTO `orderitems` (`id`, `item`, `quantity`, `totalPrice`, `buyer`, `order_id`) VALUES
(1, 1, 1, 6, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `buyer` int(11) NOT NULL,
  `totalPrice` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `buyer` (`buyer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `buyer`, `totalPrice`) VALUES
(1, '2014-06-24 03:20:13', '2014-06-24 03:20:13', 1, 6);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatarUri` varchar(255) NOT NULL,
  `validated_time` date DEFAULT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'USER',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `avatarUri`, `validated_time`, `role`, `created_at`, `updated_at`, `remember_token`, `token`) VALUES
(1, 'doray', '$2y$10$vRXolJ7.UROu7B5sIeBHEeDYugpG9z5s0kZ.Di82sF0L3ySF9sB0m', 'hongduhui@qq.com', 'images/avatars/avatar-boy.png', NULL, 'USER', '2014-06-24 11:38:19', '2014-06-24 03:38:19', 'amGsnQ2ldwSUvwS0VEaEZEErpOWN6IszsoeIPvRhJKxqJ69BczJzrxx8ulKF', NULL),
(2, 'zfx', '$2y$10$s71fDTyZfP8veLfhgk2r1eXNOMmO37/I21/h2t1MiexU68O8.G7ze', '497595927@qq.com', 'images/avatars/avatar-boy.png', NULL, 'USER', '2014-06-24 04:08:05', '2014-06-24 04:08:05', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `viewhistory`
--

CREATE TABLE IF NOT EXISTS `viewhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `viewer` int(11) NOT NULL,
  `movie` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `viewer` (`viewer`),
  KEY `movie` (`movie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 限制导出的表
--

--
-- 限制表 `cartitems`
--
ALTER TABLE `cartitems`
  ADD CONSTRAINT `cartitems_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cartitems_ibfk_2` FOREIGN KEY (`item`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- 限制表 `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`poster`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- 限制表 `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD CONSTRAINT `movie_actor_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movie_actor_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE;

--
-- 限制表 `movie_category`
--
ALTER TABLE `movie_category`
  ADD CONSTRAINT `movie_category_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movie_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- 限制表 `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`item`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- 限制表 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`buyer`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- 限制表 `viewhistory`
--
ALTER TABLE `viewhistory`
  ADD CONSTRAINT `viewhistory_ibfk_1` FOREIGN KEY (`viewer`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `viewhistory_ibfk_2` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
