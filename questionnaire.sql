-- MySQL dump 10.14  Distrib 5.5.41-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: questionnaire
-- ------------------------------------------------------
-- Server version	5.5.41-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `last_login_date` date NOT NULL,
  `last_login_ip` char(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questionnaires`
--

DROP TABLE IF EXISTS `questionnaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questionnaires` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('survey','exam') NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `create_date` date NOT NULL,
  `expire_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionnaires`
--

LOCK TABLES `questionnaires` WRITE;
/*!40000 ALTER TABLE `questionnaires` DISABLE KEYS */;
INSERT INTO `questionnaires` VALUES (1,'survey','凤凰网原创频道用户调查问卷','凤凰网原创频道上线一年了，在产品和平台上有一些收获，也有需要改进之处，希望得到网友的反馈。凤凰网原创频道上线一年了，在产品和平台上有一些收获，也有需要改进之处，希望得到网友的反馈。凤凰网原创频道上线一年了，在产品和平台上有一些收获，也有需要改进之处，希望得到网友的反馈。凤凰网原创频道上线一年了，在产品和平台上有一些收获，也有需要改进之处，希望得到网友的反馈。','2015-04-01','2015-05-14'),(2,'exam','全国统一考试大学语文试卷','各种类型的考试我们都将经历，任何考试都能说明问题，难度大的考试能够考出水平，难度小的考试也能考出实力。因此考试试题难度大小不是我们为自己推脱责任、逃避考试失利的理由。重要的是找出问题，不让错误再次在您手中重现。经过对答卷进行认真测评，我们为您出具了此份测试报告，目的是帮助您制定正确科学的备考策略，快速通过考试，实现您升学或晋升的梦想。','2015-04-01','2015-05-29'),(5,'exam','[VOB]Uber杭州人民优步司机考核','请您根据刚才的培训视频和服务标准，再结合基本道德、法律常识，完成这份测试','2015-04-04','2015-06-24'),(6,'exam','东中小学生交通安全微信课程测试题','东中小学生交通安全微信课程第一讲测试题东中小学生交通安全微信课程第一讲测试题东中小学生交通安全微信课程第一讲测试题东中小学生交通安全微信课程第一讲测试题东中小学生交通安全微信课程第一讲测试题','2015-04-04','2015-05-30'),(7,'exam','一份国际标准智商测试问卷','智商，就是IQ（Intelligence Quotient的简称)，通俗地可以理解为智力，是指数字、空间、逻辑、词汇、创造、记忆等能力，它是德国心理学家施特恩在1912年提出的。智商表示人的聪明程度：智商越高，则表示越聪明。想检验自己的智商是多少吗？这并不困难，以下就是一份权威的IQ测试题，请在30分钟内完成（30题），之后你就会知道自己的IQ值是多少了。','2015-04-04','2015-05-30'),(8,'exam','考试了','sdfsdfsdfsdfsdf','2015-05-09','2015-05-20'),(9,'exam','测试','测试','2015-05-11','2015-05-31'),(10,'survey','心中女神','最美女司机','2015-05-12','2015-05-15'),(11,'survey','IT Service feedback','test','2015-05-15','2015-05-31'),(12,'survey','啊啊啊','啊啊啊','2015-05-21','2015-05-18'),(13,'survey','test','特色三十三天','2015-05-26','2015-06-30'),(14,'survey','test','测试调研问卷','2015-05-27','2015-06-26'),(15,'survey','测试。','测试中。。。。。。','2015-06-09','2016-04-01'),(16,'survey','收入调查','每个月的收入是多少','2015-06-09','2015-06-18'),(17,'survey','a啊','啊','2015-06-11','2015-06-10'),(18,'survey','123','12312','2015-06-20','2015-06-30'),(19,'exam','高考数学','2015高考数学全国统一考试','2015-06-27','2015-07-02');
/*!40000 ALTER TABLE `questionnaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `options` varchar(800) NOT NULL,
  `standard` varchar(100) DEFAULT NULL,
  `score` tinyint(3) unsigned DEFAULT NULL,
  `questionnaire_id` smallint(5) unsigned NOT NULL,
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (25,'你是通过何种途径得知凤凰网原创频道的？','{\"0\":{\"type\":\"checkbox\",\"text\":\"凤凰网首页推荐\"},\"1\":{\"type\":\"checkbox\",\"text\":\"凤凰网读书频道推荐\"},\"2\":{\"type\":\"checkbox\",\"text\":\"听其他人推荐\"},\"3\":{\"type\":\"checkbox\",\"text\":\"在其他地方看到的\"},\"4\":{\"type\":\"checkbox\",\"text\":\"偶然撞进来的\"},\"5\":{\"type\":\"checkbox_othertext\",\"text\":\"\"}}',NULL,NULL,1,1),(27,'您是何时知道凤凰网原创频道的？','{\"0\":{\"type\":\"radio\",\"text\":\"2012年上半年\"},\"1\":{\"type\":\"radio\",\"text\":\"2012年下半年\"},\"2\":{\"type\":\"radio\",\"text\":\"2013年一季度\"},\"3\":{\"type\":\"radio\",\"text\":\"2013年二季度\"},\"4\":{\"type\":\"radio\",\"text\":\"刚刚\"},\"5\":{\"type\":\"radio_othertext\",\"text\":\"\"}}',NULL,NULL,1,2),(28,'您一般何时登陆凤凰网原创频道？','{\"0\":{\"type\":\"radio\",\"text\":\"上午\"},\"1\":{\"type\":\"radio\",\"text\":\"下午\"},\"2\":{\"type\":\"radio\",\"text\":\"晚上\"},\"3\":{\"type\":\"radio\",\"text\":\"工作时间\"},\"4\":{\"type\":\"radio\",\"text\":\"休闲时间\"},\"5\":{\"type\":\"radio\",\"text\":\"说不好\"}}',NULL,NULL,1,3),(29,'你对凤凰网原创频道的印象如何？','{\"0\":{\"type\":\"radio\",\"text\":\"很喜欢\"},\"1\":{\"type\":\"radio\",\"text\":\"还可以\"},\"2\":{\"type\":\"radio\",\"text\":\"一般\"},\"3\":{\"type\":\"radio\",\"text\":\"不喜欢\"},\"4\":{\"type\":\"radio\",\"text\":\"没感觉\"}}',NULL,NULL,1,4),(30,'你喜欢原创频道的原因是什么','{\"0\":{\"type\":\"checkbox\",\"text\":\"作品不错\"},\"1\":{\"type\":\"checkbox\",\"text\":\"网页漂亮\"},\"2\":{\"type\":\"checkbox\",\"text\":\"阅读页面流畅\"},\"3\":{\"type\":\"checkbox\",\"text\":\"与同类网站相比更出色\"},\"4\":{\"type\":\"checkbox_othertext\",\"text\":\"\"}}',NULL,NULL,1,5),(31,'您认为凤凰网原创频道应该改善的地方有哪些？','{\"0\":{\"type\":\"checkbox\",\"text\":\"美化页面\"},\"1\":{\"type\":\"checkbox\",\"text\":\"增加作品数量\"},\"2\":{\"type\":\"checkbox\",\"text\":\"提高作品质量\"},\"3\":{\"type\":\"checkbox\",\"text\":\"优化登陆、订购流程\"},\"4\":{\"type\":\"checkbox\",\"text\":\"多提供知名网络作者作品\"},\"5\":{\"type\":\"checkbox_othertext\",\"text\":\"\"}}',NULL,NULL,1,6),(32,'你是否能接受付费阅读网络原创作品？','{\"0\":{\"type\":\"radio\",\"text\":\"能\"},\"1\":{\"type\":\"radio\",\"text\":\"不能\"},\"2\":{\"type\":\"radio\",\"text\":\"视情况而定\"}}',NULL,NULL,1,7),(33,'您在凤凰网原创频道是否付费订购过作品？','{\"0\":{\"type\":\"radio\",\"text\":\"经常订购\"},\"1\":{\"type\":\"radio\",\"text\":\"少于3次\"},\"2\":{\"type\":\"radio\",\"text\":\"仅1次\"},\"3\":{\"type\":\"radio\",\"text\":\"没有过\"}}',NULL,NULL,1,8),(34,'您在凤凰网原创频道读过几部作品？','{\"0\":{\"type\":\"radio\",\"text\":\"数不清\"},\"1\":{\"type\":\"radio\",\"text\":\"10部以上\"},\"2\":{\"type\":\"radio\",\"text\":\"5-10部\"},\"3\":{\"type\":\"radio\",\"text\":\"2-4部\"},\"4\":{\"type\":\"radio\",\"text\":\"仅1部\"},\"5\":{\"type\":\"radio\",\"text\":\"没读过\"}}',NULL,NULL,1,9),(35,'您读得最多的读物哪种类型是？','{\"0\":{\"type\":\"radio\",\"text\":\"纸质图书\"},\"1\":{\"type\":\"radio\",\"text\":\"网络小说\"},\"2\":{\"type\":\"radio\",\"text\":\"报刊杂志\"},\"3\":{\"type\":\"radio\",\"text\":\"不怎么读\"}}',NULL,NULL,1,10),(36,'您一般读何种题材作品？','{\"0\":{\"type\":\"checkbox\",\"text\":\"青春文学\"},\"1\":{\"type\":\"checkbox\",\"text\":\"婚恋小说\"},\"2\":{\"type\":\"checkbox\",\"text\":\"情色小说\"},\"3\":{\"type\":\"checkbox\",\"text\":\"职场小说\"},\"4\":{\"type\":\"checkbox\",\"text\":\"官场小说\"},\"5\":{\"type\":\"checkbox\",\"text\":\"历史类\"},\"6\":{\"type\":\"checkbox\",\"text\":\"军事类\"},\"7\":{\"type\":\"checkbox\",\"text\":\"玄幻、仙侠类\"},\"8\":{\"type\":\"checkbox\",\"text\":\"悬疑类\"},\"9\":{\"type\":\"checkbox\",\"text\":\"武侠类\"},\"10\":{\"type\":\"checkbox\",\"text\":\"文化类\"},\"11\":{\"type\":\"checkbox\",\"text\":\"生活类\"},\"12\":{\"type\":\"checkbox\",\"text\":\"学术类\"},\"13\":{\"type\":\"checkbox\",\"text\":\"财经类\"},\"14\":{\"type\":\"checkbox\",\"text\":\"都市题材\"},\"15\":{\"type\":\"checkbox\",\"text\":\"乡土题材\"},\"16\":{\"type\":\"checkbox\",\"text\":\"其它\"}}',NULL,NULL,1,11),(37,'你对凤凰网原创频道的有什么建议？','{\"0\":{\"type\":\"text\",\"text\":\"\"}}',NULL,NULL,1,12),(38,'具有“含泪的微笑”风格的小说家是？','{\"0\":{\"type\":\"radio\",\"text\":\"莫泊桑\"},\"1\":{\"type\":\"radio\",\"text\":\"契科夫\"},\"2\":{\"type\":\"radio\",\"text\":\"欧亨利\"},\"3\":{\"type\":\"radio\",\"text\":\"屠格涅夫\"}}','2',10,2,1),(39,'唐代“新乐府运动”的倡导者是？','{\"0\":{\"type\":\"radio\",\"text\":\"岑参\"},\"1\":{\"type\":\"radio\",\"text\":\"白居易\"},\"2\":{\"type\":\"radio\",\"text\":\"韩愈\"},\"3\":{\"type\":\"radio_othertext\",\"text\":\"\"}}','1',10,2,2),(40,'主张文章应“惟陈言之务去”的文学家是？','{\"0\":{\"type\":\"text\",\"text\":\"\"}}','%u97E9%u6108',10,2,3),(41,'以下诗篇属于李白创作的有','{\"0\":{\"type\":\"checkbox\",\"text\":\"静夜思\"},\"1\":{\"type\":\"checkbox\",\"text\":\"茅屋为秋风所破歌\"},\"2\":{\"type\":\"checkbox\",\"text\":\"春晓\"},\"3\":{\"type\":\"checkbox\",\"text\":\"将进酒\"}}','0,3',10,2,4),(42,'鲁迅原名什么？','{\"0\":{\"type\":\"radio\",\"text\":\"周作人\"},\"1\":{\"type\":\"radio\",\"text\":\"周星星\"},\"2\":{\"type\":\"radio\",\"text\":\"周海媚\"},\"3\":{\"type\":\"radio_othertext\",\"text\":\"\"}}','3:%u5468%u6811%u4EBA',10,2,5),(43,'下列作品中属于编年体历史著作的是?','{\"0\":{\"type\":\"radio\",\"text\":\"<国语>\"},\"1\":{\"type\":\"radio\",\"text\":\"<战国策>\"},\"2\":{\"type\":\"radio\",\"text\":\"<左传>\"},\"3\":{\"type\":\"radio\",\"text\":\"<史记>\"}}','1',10,2,6),(44,'说明文《沙漠里的奇怪现象》的作者是?','{\"0\":{\"type\":\"radio\",\"text\":\"朱光潜\"},\"1\":{\"type\":\"radio\",\"text\":\"华罗庚\"},\"2\":{\"type\":\"radio\",\"text\":\"钱钟书\"},\"3\":{\"type\":\"radio_othertext\",\"text\":\"\"}}','3:%u7AFA%u53EF%u6862',10,2,7),(45,'由徐志摩发起、组织的文学社团是?','{\"0\":{\"type\":\"radio\",\"text\":\"新月社\"},\"1\":{\"type\":\"radio\",\"text\":\"创造性\"},\"2\":{\"type\":\"radio\",\"text\":\"语丝社\"},\"3\":{\"type\":\"radio\",\"text\":\"文学研究会\"}}','0',10,2,8),(46,'曾经荣获“人民艺术家”称号的作家是','{\"0\":{\"type\":\"radio\",\"text\":\"茅盾\"},\"1\":{\"type\":\"radio\",\"text\":\"巴金\"},\"2\":{\"type\":\"radio\",\"text\":\"老舍\"},\"3\":{\"type\":\"radio\",\"text\":\"冰心\"}}','2',10,2,9),(47,'王实甫《西厢记•长亭送别》的体裁是','{\"0\":{\"type\":\"radio\",\"text\":\"散曲\"},\"1\":{\"type\":\"radio\",\"text\":\"套数\"},\"2\":{\"type\":\"radio\",\"text\":\"诸宫调\"},\"3\":{\"type\":\"radio\",\"text\":\"杂曲\"}}','3',10,2,10),(48,'人民优步是私人车辆，拼车合乘，它有什么好处：','{\"0\":{\"type\":\"checkbox\",\"text\":\"减少交通拥堵\"},\"1\":{\"type\":\"checkbox\",\"text\":\"减少尾气排放\"},\"2\":{\"type\":\"checkbox\",\"text\":\"提高城市道路承载能力\"},\"3\":{\"type\":\"checkbox\",\"text\":\"社会进步\"}}','0,1,2',20,5,1),(49,'个人着装及卫生要求','{\"0\":{\"type\":\"checkbox\",\"text\":\"衣着得体\"},\"1\":{\"type\":\"checkbox\",\"text\":\"仪容整洁\"},\"2\":{\"type\":\"checkbox\",\"text\":\"较随意，日常生活怎样就怎样\"},\"3\":{\"type\":\"checkbox\",\"text\":\"时髦流行\"}}','0,1',20,5,2),(50,'司机端软件账号','{\"0\":{\"type\":\"radio\",\"text\":\"注册的手机号@c.cc\"},\"1\":{\"type\":\"radio\",\"text\":\"手机号\"},\"2\":{\"type\":\"radio\",\"text\":\"QQ账号\"},\"3\":{\"type\":\"radio\",\"text\":\"qq号\"}}','1',20,5,3),(51,'您的初始密码是？','{\"0\":{\"type\":\"radio\",\"text\":\"在申请表中设置的密码\"},\"1\":{\"type\":\"radio\",\"text\":\"微信号\"},\"2\":{\"type\":\"radio\",\"text\":\"QQ号\"},\"3\":{\"type\":\"radio\",\"text\":\"123456\"}}','0',20,5,4),(52,'做人民优步司机的目的','{\"0\":{\"type\":\"checkbox\",\"text\":\"顺路搭车，帮助别人\"},\"1\":{\"type\":\"checkbox\",\"text\":\"认识朋友，创建社区\"},\"2\":{\"type\":\"checkbox\",\"text\":\"分担费用，覆盖成本\"},\"3\":{\"type\":\"checkbox\",\"text\":\"道德高尚\"}}','0,2',20,5,5),(53,'小朋友们 过马路 应该是怎 样的 顺序 呢？','{\"0\":{\"type\":\"radio\",\"text\":\"看→停→过\"},\"1\":{\"type\":\"radio\",\"text\":\"停→看→过\"},\"2\":{\"type\":\"radio\",\"text\":\"过→看→停\"},\"3\":{\"type\":\"radio\",\"text\":\"停→过→看\"}}','1',20,6,1),(54,'人行道就是斑马线吗？','{\"0\":{\"type\":\"radio\",\"text\":\"是\"},\"1\":{\"type\":\"radio\",\"text\":\"不是\"},\"2\":{\"type\":\"radio\",\"text\":\"不清楚\"},\"3\":{\"type\":\"radio\",\"text\":\"你说呢\"}}','1',20,6,2),(55,'过马路时怎样看车辆？','{\"0\":{\"type\":\"radio\",\"text\":\"看左面\"},\"1\":{\"type\":\"radio\",\"text\":\"看前面\"},\"2\":{\"type\":\"radio\",\"text\":\"看右面\"},\"3\":{\"type\":\"radio\",\"text\":\"左看,右看, 再左看\"}}','3',20,6,3),(56,'儿童的事业范围有多大','{\"0\":{\"type\":\"radio\",\"text\":\"120度\"},\"1\":{\"type\":\"radio\",\"text\":\"不超过90度\"},\"2\":{\"type\":\"radio\",\"text\":\"150度\"},\"3\":{\"type\":\"radio\",\"text\":\"120度~150度\"}}','3',20,6,4),(57,'哪个年龄段的人必须遵守 &quot;交通安全阀&quot;','{\"0\":{\"type\":\"radio\",\"text\":\"10岁以下的儿童\"},\"1\":{\"type\":\"radio\",\"text\":\"89岁以上的老人\"},\"2\":{\"type\":\"radio\",\"text\":\"10~80岁之间的人\"},\"3\":{\"type\":\"radio\",\"text\":\"所有的人\"}}','2',20,6,5),(58,'选出不同类的一项','{\"0\":{\"type\":\"radio\",\"text\":\"蛇\"},\"1\":{\"type\":\"radio\",\"text\":\"树\"},\"2\":{\"type\":\"radio\",\"text\":\"老虎\"},\"3\":{\"type\":\"radio\",\"text\":\"河马\"}}','1',20,7,1),(59,'在下列分数中，选出不同类的一项：','{\"0\":{\"type\":\"radio\",\"text\":\"3/5\"},\"1\":{\"type\":\"radio\",\"text\":\"3/7\"},\"2\":{\"type\":\"radio\",\"text\":\"3/9\"},\"3\":{\"type\":\"radio\",\"text\":\"1/5\"}}','2',20,7,2),(60,'男孩对男子，正如女孩对','{\"0\":{\"type\":\"radio\",\"text\":\"青年\"},\"1\":{\"type\":\"radio\",\"text\":\"孩子\"},\"2\":{\"type\":\"radio\",\"text\":\"夫人\"},\"3\":{\"type\":\"radio\",\"text\":\"姑娘\"},\"4\":{\"type\":\"radio\",\"text\":\"妇女\"}}','2',20,7,3),(61,'如果笔相对于写字，那么书相对于','{\"0\":{\"type\":\"radio\",\"text\":\"娱乐\"},\"1\":{\"type\":\"radio\",\"text\":\"阅读\"},\"2\":{\"type\":\"radio\",\"text\":\"学文化\"},\"3\":{\"type\":\"radio\",\"text\":\"解除疲劳\"}}','1',20,7,4),(62,'马之于马厩，正如人之于','{\"0\":{\"type\":\"radio\",\"text\":\"牛棚\"},\"1\":{\"type\":\"radio\",\"text\":\"马车\"},\"2\":{\"type\":\"radio\",\"text\":\"房屋\"},\"3\":{\"type\":\"radio\",\"text\":\"农场\"},\"4\":{\"type\":\"radio\",\"text\":\"楼房\"}}','2',20,7,5),(63,'心中女神','{\"0\":{\"type\":\"radio\",\"text\":\"斤斤计较\"},\"1\":{\"type\":\"radio\",\"text\":\"哈哈哈哈\"},\"2\":{\"type\":\"radio\",\"text\":\"斤斤计较斤斤计较\"}}',NULL,NULL,10,1),(64,'overview feeling','{\"0\":{\"type\":\"checkbox\",\"text\":\"bad\"},\"1\":{\"type\":\"checkbox\",\"text\":\"normal\"},\"2\":{\"type\":\"checkbox\",\"text\":\"good\"}}',NULL,NULL,11,1),(65,'infrastructure','{\"0\":{\"type\":\"radio\",\"text\":\"good\"},\"1\":{\"type\":\"radio\",\"text\":\"bad\"}}',NULL,NULL,11,2),(66,'阿萨阿','{\"0\":{\"type\":\"radio\",\"text\":\"斯蒂芬斯蒂芬森的\"},\"1\":{\"type\":\"radio\",\"text\":\"斯蒂芬斯蒂芬斯蒂芬\"},\"2\":{\"type\":\"radio\",\"text\":\"斯蒂芬斯蒂芬斯蒂芬森斯蒂芬\"},\"3\":{\"type\":\"radio_othertext\",\"text\":\"\"}}',NULL,NULL,13,1),(67,'去委屈委屈委屈委屈我','{\"0\":{\"type\":\"checkbox\",\"text\":\"去委屈委屈委屈为\"},\"1\":{\"type\":\"checkbox\",\"text\":\"去委屈委屈委屈为请问\"},\"2\":{\"type\":\"checkbox\",\"text\":\"去委屈委屈委屈亲亲亲亲亲亲\"}}',NULL,NULL,13,2),(68,'和法国和法国恢复','{\"0\":{\"type\":\"text\",\"text\":\"\"}}',NULL,NULL,13,3),(69,'1000','{\"0\":{\"type\":\"radio\",\"text\":\"10000\"},\"1\":{\"type\":\"radio\",\"text\":\"20000\"},\"2\":{\"type\":\"radio_othertext\",\"text\":\"\"}}',NULL,NULL,16,1),(70,'啊','{\"0\":{\"type\":\"radio\",\"text\":\"啊啊1\"},\"1\":{\"type\":\"radio\",\"text\":\"啊啊2\"},\"2\":{\"type\":\"radio\",\"text\":\"啊啊3\"},\"3\":{\"type\":\"radio\",\"text\":\"啊啊4\"}}',NULL,NULL,17,1),(71,'1.请选择以下哪个是错的？','{\"0\":{\"type\":\"radio\",\"text\":\"A       3\"},\"1\":{\"type\":\"radio\",\"text\":\"B      4\"},\"2\":{\"type\":\"radio\",\"text\":\"C     5\"},\"3\":{\"type\":\"radio\",\"text\":\"D    6\"}}','1',2,19,1),(72,'2.请选择正确的？','{\"0\":{\"type\":\"radio\",\"text\":\"A     DLFJLDFKFLDLDFDF\"},\"1\":{\"type\":\"radio\",\"text\":\"B     EEFDFDF\"},\"2\":{\"type\":\"radio\",\"text\":\"C    DFDFD\"},\"3\":{\"type\":\"radio\",\"text\":\"D    DD\"}}','0',2,19,2);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reply` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `openid` char(28) NOT NULL,
  `nickname` varchar(30) DEFAULT NULL,
  `questionnaire_id` smallint(5) unsigned NOT NULL,
  `reply` varchar(8000) NOT NULL,
  `total_score` tinyint(3) unsigned DEFAULT NULL,
  `sex` enum('male','female') DEFAULT 'male',
  `city` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `headimgurl` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reply`
--

LOCK TABLES `reply` WRITE;
/*!40000 ALTER TABLE `reply` DISABLE KEYS */;
INSERT INTO `reply` VALUES (63,'oPsprs0_mKYMscNyrnxzy2M3RxYI','麦沙',6,'{\"53\":\"1\",\"54\":\"1\",\"55\":\"1\",\"56\":\"1\",\"57\":\"2\"}',60,'male','浦东新区','上海','中国','http://wx.qlogo.cn/mmopen/m5VnRRI9TD3knLTKv9JKC6KmicBAjLpE0UNn1RZqFTrJO31jxwM4yXMBX9jX5BP70Upiczal3OC7F5TNrTFy0Dqp9MfjvlZOxx/46'),(64,'oPsprs0_mKYMscNyrnxzy2M3RxYI','麦沙',7,'{\"58\":\"1\",\"59\":\"2\",\"60\":\"1\",\"61\":\"1\",\"62\":\"3\"}',60,'male','浦东新区','上海','中国','http://wx.qlogo.cn/mmopen/m5VnRRI9TD3knLTKv9JKC6KmicBAjLpE0UNn1RZqFTrJO31jxwM4yXMBX9jX5BP70Upiczal3OC7F5TNrTFy0Dqp9MfjvlZOxx/46'),(66,'oPsprszRfJKpmXiVgn-bA8qZvTOk','李冠军',5,'{\"48\":\"0,1,2\",\"49\":\"0\",\"50\":\"1\",\"51\":\"1\",\"52\":\"2\"}',40,'male','西安','陕西','中国','http://wx.qlogo.cn/mmopen/m5VnRRI9TD305FEJa47WuBgdhzVKuIhucpBfRWM4o7iceTUiaSQM6SJ3jG3fgYqeSVx5qnk8XiaaW77mDlVeqoYSGicl2Dh4baEl/46'),(67,'oPsprszRfJKpmXiVgn-bA8qZvTOk','李冠军',6,'{\"53\":\"1\",\"54\":\"0\",\"55\":\"3\",\"56\":\"1\",\"57\":\"3\"}',40,'male','西安','陕西','中国','http://wx.qlogo.cn/mmopen/m5VnRRI9TD305FEJa47WuBgdhzVKuIhucpBfRWM4o7iceTUiaSQM6SJ3jG3fgYqeSVx5qnk8XiaaW77mDlVeqoYSGicl2Dh4baEl/46'),(68,'oPsprsyNunXWHCTQz_pI0dPnWPxY',' 陈军  ',1,'{\"25\":\"3\",\"27\":\"0\",\"28\":\"0\",\"29\":\"2\",\"30\":\"1\",\"31\":\"1\",\"32\":\"1\",\"33\":\"1\",\"34\":\"2\",\"35\":\"1\",\"36\":\"5\",\"37\":\"eee\"}',NULL,'male','贵阳','贵州','中国','http://wx.qlogo.cn/mmopen/icO0icvzvoYLZl4RDX9NIvvEhxwOTbiayr4RBzVq5AVzEibkkZz92ckWSWgImlbY1yWhjJgbMxZqmuw1zOwQOXU1R4L339sdjI2t/46');
/*!40000 ALTER TABLE `reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `value` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'weixin_AppID','wxb5877969f3acc441'),(2,'weixin_AppSecret','7c2b21505b635b53ce162cc5e618433e'),(3,'weixin_Token','kenikehantoken1'),(4,'weixin_domain','questionnaire.laorenwangshi.com'),(5,'weixin_cryptType','1'),(6,'weixin_EncodingAESKey','jrF0iPV44bXW4IPQ2l299B94D59niCGrKuIzHdGln12');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `signimages`
--

DROP TABLE IF EXISTS `signimages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `signimages` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `path` char(66) NOT NULL,
  `status` enum('on','off') NOT NULL DEFAULT 'on',
  `questionnaire_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `signimages`
--

LOCK TABLES `signimages` WRITE;
/*!40000 ALTER TABLE `signimages` DISABLE KEYS */;
INSERT INTO `signimages` VALUES (72,'/Public/Signimages/54f514126a0e2.jpg','on',1),(73,'/Public/Signimages/54f5141279d17.jpg','on',1),(74,'/Public/Signimages/54f5141286e23.jpg','on',1),(75,'/Public/Signimages/54f51412947e8.jpg','on',1),(76,'/Public/Signimages/54f514129f0c0.jpg','on',1),(77,'/Public/Signimages/550e688301b68.jpg','on',2),(78,'/Public/Signimages/550e6884babd1.jpg','on',2),(79,'/Public/Signimages/550e6884d4e89.jpg','on',2),(80,'/Public/Signimages/550e68854d7ec.jpg','on',2),(81,'/Public/Signimages/550e6fbaaea7b.jpeg','on',2),(82,'/Public/Signimages/551ad14a827e0.jpg','on',1),(83,'/Public/Signimages/551b8531a8f0e.jpg','on',3),(84,'/Public/Signimages/551f65d9c1d36.jpg','on',5),(85,'/Public/Signimages/551f65d9c2142.jpg','on',5),(86,'/Public/Signimages/551f65d9c2463.jpg','on',5),(87,'/Public/Signimages/551f65d9c2836.jpg','on',5),(88,'/Public/Signimages/551f65d9c2dc4.jpg','on',5),(90,'/Public/Signimages/551f68e26c087.jpg','on',6),(91,'/Public/Signimages/551f68e26cdaf.jpg','on',6),(92,'/Public/Signimages/551f68e26e406.jpg','on',6),(93,'/Public/Signimages/551f6aa27ff28.jpg','on',7),(94,'/Public/Signimages/551f6aa280293.jpg','on',7),(95,'/Public/Signimages/551f6aa28061e.jpg','on',7),(96,'/Public/Signimages/551f6aa28119a.png','on',7),(97,'/Public/Signimages/551f6aa28168b.jpg','on',7),(98,'/Public/Signimages/551f6aa281ab1.jpg','on',7),(99,'/Public/Signimages/555214721732c.jpg','on',10),(100,'/Public/Signimages/555419c7d7d3d.gif','on',10),(101,'/Public/Signimages/558e416d83de4.png','on',19);
/*!40000 ALTER TABLE `signimages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-28 21:27:35
