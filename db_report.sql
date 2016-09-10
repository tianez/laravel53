/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : laravel2

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-09-10 23:08:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for db_report
-- ----------------------------
DROP TABLE IF EXISTS `db_report`;
CREATE TABLE `db_report` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `sex` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '性别',
  `mingzu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名族',
  `danwei` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '单位及职务',
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '手机号码',
  `fangjian` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '房间号',
  `jdr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '接待人',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `islogin` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of db_report
-- ----------------------------
INSERT INTO `db_report` VALUES ('1', '巴特尔', '男', '蒙古', '党组书记、主任', '', '3788', null, null, null, '0');
INSERT INTO `db_report` VALUES ('2', '陈改户', '男', '汉', '副主任', '', '3688', null, null, null, '0');
INSERT INTO `db_report` VALUES ('3', '张京泽', '男', '汉', '办公厅主任', '', '3712', null, null, null, '0');
INSERT INTO `db_report` VALUES ('4', '杨正根', '男', '汉', '政法司司长', '', '3718', null, null, null, '0');
INSERT INTO `db_report` VALUES ('5', '乐长虹', '男', '汉', '经济司司长', '', '3622', null, null, null, '0');
INSERT INTO `db_report` VALUES ('6', '田联刚', '男', '汉', '教科司司长', '', '3508', null, null, null, '0');
INSERT INTO `db_report` VALUES ('7', '俸兰', '女', '瑶族', '国际司司长', '', '3522', null, null, null, '0');
INSERT INTO `db_report` VALUES ('8', '李春林', '男', '土族', '财务司司长', '', '3408', null, null, null, '0');
INSERT INTO `db_report` VALUES ('9', '石玉钢', '男', '苗族', '政研室主任', '', '3708', null, null, null, '0');
INSERT INTO `db_report` VALUES ('10', '张湘冀', '女', '土家', '人事司副司长', '', '3710', null, null, null, '0');
INSERT INTO `db_report` VALUES ('11', '陈达云', '男', '彝族', '中南民大书记', '', '3807', null, null, null, '0');
INSERT INTO `db_report` VALUES ('12', '王怀刚', '男', '苗族', '中南民大办公室主任', '', '3801', null, null, null, '0');
INSERT INTO `db_report` VALUES ('13', '金春子', '女', '朝鲜', '政法司副司长', '', '3706', null, null, null, '0');
INSERT INTO `db_report` VALUES ('14', '李钟协', '男', '汉', '督查司副司长', '', '3728', null, null, null, '0');
INSERT INTO `db_report` VALUES ('15', '钟廷雄', '男', '壮族', '文宣司副司长', '', '3720', null, null, null, '0');
INSERT INTO `db_report` VALUES ('16', '陈华', '男', '壮族', '舆情中心副主任', '', '3726', null, null, null, '0');
INSERT INTO `db_report` VALUES ('17', '梁惠玲', '女', '', '省委常委、统战部部长', '', '3899', null, null, null, '0');
INSERT INTO `db_report` VALUES ('18', '刘仲初', '男', '', '省政府副秘书长', '', '3812', null, null, null, '0');
INSERT INTO `db_report` VALUES ('19', '许兰兰', '女', '', '省政府秘书六处副处长', '', '3805', null, null, null, '0');
INSERT INTO `db_report` VALUES ('20', '武强', '女', '汉族', '中央统战部二局副巡视员', '', '3602', null, null, null, '0');
INSERT INTO `db_report` VALUES ('21', '许英康', '男', '汉族', '中央统战部二局民族工作处干部', '', '3601', null, null, null, '0');
INSERT INTO `db_report` VALUES ('22', '郝贵诚', '男', '汉族', '全国人大民委办公室主任', '', '3606', null, null, null, '0');
INSERT INTO `db_report` VALUES ('23', '管仁林', '男', '汉族', '国办秘书三局二处处长', '', '3607', null, null, null, '0');
INSERT INTO `db_report` VALUES ('24', '刘伯正', '男', '汉族', '发展改革委地区司副司长', '', '3610', null, null, null, '0');
INSERT INTO `db_report` VALUES ('25', '田晓勤', '女', '土家族', '教育部民族教育司处长', '13811151802', '3617', null, null, null, '0');
INSERT INTO `db_report` VALUES ('26', '李 伟', '男', '汉', '民政部区划地名司副司长', '13801219580', '3612', null, null, null, '0');
INSERT INTO `db_report` VALUES ('27', '龚世良', '男', '汉', '财政部行政政法司行政二处处长', '13910680473', '3507', null, null, null, '0');
INSERT INTO `db_report` VALUES ('28', '任锦雄', '男', '汉族', '交通运输部综合规划司巡视员', '13801091016', '3616', null, null, null, '0');
INSERT INTO `db_report` VALUES ('29', '令狐军民', '男', '汉族', '农业部发展计划司调研员', '', '3517', null, null, null, '0');
INSERT INTO `db_report` VALUES ('30', '杨虎斌', '男', '汉族', '卫生计生委财务司干部', '', '3603', null, null, null, '0');
INSERT INTO `db_report` VALUES ('31', '王 黎', '女', '汉族', '国资委群众工作局副巡视员', '13910017373', '3618', null, null, null, '0');
INSERT INTO `db_report` VALUES ('32', '李征宇', '男', '汉族', '国务院扶贫办政策法规司主任科员', '18683374158', '3605', null, null, null, '0');
INSERT INTO `db_report` VALUES ('33', '王 颖', '女', '汉族', '中国铁路总公司宣传部副部长', '', '3817', null, null, null, '0');
INSERT INTO `db_report` VALUES ('34', '马开能', '男', '回族', '云南省民宗委副主任', '', '3626', null, null, null, '0');
INSERT INTO `db_report` VALUES ('35', '熊国才', '男', '普米族', '云南民宗委政策法规处处长', '15808712050', '3621', null, null, null, '0');
INSERT INTO `db_report` VALUES ('36', '杨斌', '男', '彝族', '楚雄彝族自治州人民政府州长', '', '3628', null, null, null, '0');
INSERT INTO `db_report` VALUES ('37', '周国兴', '男', '彝族', '楚雄自治州民宗委主任', '13987072188', '3623', null, null, null, '0');
INSERT INTO `db_report` VALUES ('38', '毕元伟', '男', '', '科长', '', '2828', null, null, null, '0');
INSERT INTO `db_report` VALUES ('39', '张秀兰', '女', '苗族', '文山壮族自治州人民政府州长', '', '3502', null, null, null, '0');
INSERT INTO `db_report` VALUES ('40', '梁 蹈', '男', '壮族', '文山州政府办副主任', '', '2616', null, null, null, '0');
INSERT INTO `db_report` VALUES ('41', '杨益彰', '男', '', '州长秘书', '', '2616', null, null, null, '0');
INSERT INTO `db_report` VALUES ('42', '马朝洪', '男', '苗族', '文山自治州民宗委主任', '13887634693', '3501', null, null, null, '0');
INSERT INTO `db_report` VALUES ('43', '谭萍', '女', '苗族', '红河哈尼族彝族自治州人民政府副州长', '', '3216', null, null, null, '0');
INSERT INTO `db_report` VALUES ('44', '张俊伟', '男', '彝族', '红河自治州民宗委副主任', '13987321578', '3205', null, null, null, '0');
INSERT INTO `db_report` VALUES ('45', '孔勒干', '男', '景颇族', '德宏傣族景颇族自治州常委、常务副州长', '', '3218', null, null, null, '0');
INSERT INTO `db_report` VALUES ('46', '多守辉', '男', '傣族', '德宏州统战部副部长、民宗局局长', '13908823966', '3219', null, null, null, '0');
INSERT INTO `db_report` VALUES ('47', '相莫', '女', '傣族', '德宏州民宗委经济科长', '', '2926', null, null, null, '0');
INSERT INTO `db_report` VALUES ('48', '王方荣', '男', '汉族', '西双版纳州人民政府副州长', '', '3228', null, null, null, '0');
INSERT INTO `db_report` VALUES ('49', '纳志红', '女', '回族', '西双版纳州民宗局副局长', '13578128166', '3223', null, null, null, '0');
INSERT INTO `db_report` VALUES ('50', '唐冬海', '男', '汉族', '西双版纳州创建办科长', '', '2912', null, null, null, '0');
INSERT INTO `db_report` VALUES ('51', '邹子卿', '男', '汉族', '大理白族自治州人民政府副州长', '', '3512', null, null, null, '0');
INSERT INTO `db_report` VALUES ('52', '李立钧', '男', '白族', '大理自治州民宗委主任', '13808767969', '3505', null, null, null, '0');
INSERT INTO `db_report` VALUES ('53', '杨柱生', '男', '白族', '大理州政府办公室秘书一科科长', '', '2702', null, null, null, '0');
INSERT INTO `db_report` VALUES ('54', '石碧玉', '女', '汉族', '大理州民宗委办公室副主任', '', '2706', null, null, null, '0');
INSERT INTO `db_report` VALUES ('55', '施桂莲', '女', '白族', '大理州民宗委办公室主任科员', '', '2706', null, null, null, '0');
INSERT INTO `db_report` VALUES ('56', '童志云', '男', '汉族', '怒江傈僳族自治州委书记', '', '3808', null, null, null, '0');
INSERT INTO `db_report` VALUES ('57', '普利颜', '男', '怒族', '怒江自治州民宗委主任', '18908869385', '3803', null, null, null, '0');
INSERT INTO `db_report` VALUES ('58', '罗 英', '男', '白族', '怒江州委办公室综合调研科科长', '', '2810', null, null, null, '0');
INSERT INTO `db_report` VALUES ('59', '李福春', '男', '傈僳族', '怒江自治州民宗委办公室主任', '', '2810', null, null, null, '0');
INSERT INTO `db_report` VALUES ('60', '和振东纳', '男', '纳西族', '迪庆藏族自治州人民政府副州长', '', '3202', null, null, null, '0');
INSERT INTO `db_report` VALUES ('61', '肖武', '男', '藏族', '迪庆自治州民宗委主任', '13988789339', '3201', null, null, null, '0');
INSERT INTO `db_report` VALUES ('62', '开哇', '男', '藏族', '青海省民宗委主任', '', '3518', null, null, null, '0');
INSERT INTO `db_report` VALUES ('63', '董富海', '男', '藏族', '青海省民宗委经济处处长', '13897789000', '3519', null, null, null, '0');
INSERT INTO `db_report` VALUES ('64', '马斌', '男', '汉族', '青海省民宗委办公室科长', '', '2902', null, null, null, '0');
INSERT INTO `db_report` VALUES ('65', '哈斯巴图', '男', '蒙古族', '青海省海北州副州长', '', '3330', null, null, null, '0');
INSERT INTO `db_report` VALUES ('66', '才仁夸', '男', '藏族', '青海省海北州民宗委主任', '13309709583', '3323', null, null, null, '0');
INSERT INTO `db_report` VALUES ('67', '索南东智', '男', '藏族', '青海省海南州人民政府州长', '', '3526', null, null, null, '0');
INSERT INTO `db_report` VALUES ('68', '才洛太', '男', '藏族', '青海省海南州统战部副部长、民宗委主任', '13909746059', '3521', null, null, null, '0');
INSERT INTO `db_report` VALUES ('69', '巨克中', '男', '汉族', '青海省黄南州委书记', '', '3308', null, null, null, '0');
INSERT INTO `db_report` VALUES ('70', '拉龙当周', '男', '藏族', '青海省黄南州民宗委主任', '15009737222', '3220', null, null, null, '0');
INSERT INTO `db_report` VALUES ('71', '才仁公保', '男', '藏族', '青海玉树州副州长', '', '3302', null, null, null, '0');
INSERT INTO `db_report` VALUES ('72', '俄金加', '男', '藏族', '青海玉树民宗委主任', '18997368088', '3301', null, null, null, '0');
INSERT INTO `db_report` VALUES ('73', '文国栋', '男', '汉族', '青海海西蒙古族藏族自治州委书记', '', '3322', null, null, null, '0');
INSERT INTO `db_report` VALUES ('74', '师 磊', '男', '', '青海省海西州委副秘书长', '', '2819', null, null, null, '0');
INSERT INTO `db_report` VALUES ('75', '更智加', '男', '藏族', '青海省海西州民宗委主任', '13709773150', '3207', null, null, null, '0');
INSERT INTO `db_report` VALUES ('76', '王达威', '男', '', '干事', '', '2818', null, null, null, '0');
INSERT INTO `db_report` VALUES ('77', '白福兰', '男', '', '联络员', '', '2818', null, null, null, '0');
INSERT INTO `db_report` VALUES ('78', '武玉嶂', '男', '汉族', '青海省果洛州委书记', '', '3208', null, null, null, '0');
INSERT INTO `db_report` VALUES ('79', '扎保才让', '男', '藏族', '青海省果洛州民宗委主任', '18809755550', '3203', null, null, null, '0');
INSERT INTO `db_report` VALUES ('80', '王海峻', '男', '', '果洛州委办秘书', '', '2720', null, null, null, '0');
INSERT INTO `db_report` VALUES ('81', '朴松烈', '男', '朝鲜', '吉林省民委主任', '', '3528', null, null, null, '0');
INSERT INTO `db_report` VALUES ('82', '李明智', '男', '汉', '吉林省民委办公室主任', '13904332279', '3523', null, null, null, '0');
INSERT INTO `db_report` VALUES ('83', '李景浩', '男', '朝鲜', '延边州人民政府州长', '', '3426', null, null, null, '0');
INSERT INTO `db_report` VALUES ('84', '千海兰', '女', '朝鲜', '延边州副州长', '', '3428', null, null, null, '0');
INSERT INTO `db_report` VALUES ('85', '李永虎', '男', '朝鲜', '延边州民委主任', '13704381899', '3423', null, null, null, '0');
INSERT INTO `db_report` VALUES ('86', '柴生祥', '男', '汉族', '甘肃省民族事务委员会党组副书记、副主任', '', '3312', null, null, null, '0');
INSERT INTO `db_report` VALUES ('87', '王学仁', '男', '回族', '甘肃省民族事务委员会政策法规处处长', '13993186918', '3305', null, null, null, '0');
INSERT INTO `db_report` VALUES ('88', '马学礼', '男', '回族', '甘肃省临夏回族自治州州长', '', '3506', null, null, null, '0');
INSERT INTO `db_report` VALUES ('89', '马福俊', '男', '回族', '临夏州政府办公室副主任', '', '2618', null, null, null, '0');
INSERT INTO `db_report` VALUES ('90', '金有录', '男', '回族', '甘肃省临夏回族自治州民委主任', '18693000026', '3503', null, null, null, '0');
INSERT INTO `db_report` VALUES ('91', '徐强', '男', '汉族', '甘肃省甘南藏族自治州州委副书记、统战部部长', '13909410056', '3222', null, null, null, '0');
INSERT INTO `db_report` VALUES ('92', '马玉文', '男', '回族', '甘肃省甘南藏族自治州民委党组副书记', '13909415318', '3221', null, null, null, '0');
INSERT INTO `db_report` VALUES ('93', '韦新辉', '男', '汉族', '新疆维吾尔自治区民委（宗教局）党组书记', '', '3412', null, null, null, '0');
INSERT INTO `db_report` VALUES ('94', '段红娅', '女', '汉族', '新疆维吾尔自治区民委（宗教局）正处法规处副处长', '13699998798', '3405', null, null, null, '0');
INSERT INTO `db_report` VALUES ('95', '梅钰', '女', '汉族', '新疆维吾尔自治区伊犁哈萨克自治州人民政府副州长', '13999379610', '3316', null, null, null, '0');
INSERT INTO `db_report` VALUES ('96', '加拉力丁·卡马力', '男', '维吾尔族', '新疆维吾尔自治区伊犁哈萨克自治州民宗委党组副书记、主任', '18997595558', '3307', null, null, null, '0');
INSERT INTO `db_report` VALUES ('97', '巴音克西', '男', '蒙古族', '新疆维吾尔自治区博尔塔拉蒙古自治州党委常委、统战部部长', '', '3406', null, null, null, '0');
INSERT INTO `db_report` VALUES ('98', '刘铭', '男', '汉族', '新疆维吾尔自治区博尔塔拉蒙古自治州民宗委党组书记', '13999775866', '3403', null, null, null, '0');
INSERT INTO `db_report` VALUES ('99', '刘春', '男', '汉族', '新疆维吾尔自治区克孜勒苏柯尔克孜自治州党委常委', '', '3402', null, null, null, '0');
INSERT INTO `db_report` VALUES ('100', '张勇杰', '男', '汉族', '新疆维吾尔自治区克孜勒苏柯尔克孜自治州民宗委党组书记、副主任', '18099082622', '3401', null, null, null, '0');
INSERT INTO `db_report` VALUES ('101', '居来提·吐尔地', '男', '维吾尔', '新疆维吾尔自治区巴音郭楞蒙古自治州人民政府副州长', '', '3320', null, null, null, '0');
INSERT INTO `db_report` VALUES ('102', '杨伟雯', '女', '汉族', '新疆维吾尔自治区巴音郭楞蒙古自治州民宗委党组书记', '18094816888', '3206', null, null, null, '0');
INSERT INTO `db_report` VALUES ('103', '海拉提', '男', '哈萨克', '新疆维吾尔自治区昌吉州人民政府副州长', '', '3417', null, null, null, '0');
INSERT INTO `db_report` VALUES ('104', '巴尔力克', '男', '哈萨克', '新疆维吾尔自治区昌吉州民宗委副主任', '13119009818', '3419', null, null, null, '0');
INSERT INTO `db_report` VALUES ('105', '吴军', '男', '苗族', '贵州省民宗委党组书记、主任', '', '3510', null, null, null, '0');
INSERT INTO `db_report` VALUES ('106', '龙海碧', '男', '苗族', '贵州省民宗委政策法规处处长', '13511911008', '3105', null, null, null, '0');
INSERT INTO `db_report` VALUES ('107', '冯仕文', '男', '苗族', '贵州省黔东南州委副书记、州长', '', '3516', null, null, null, '0');
INSERT INTO `db_report` VALUES ('108', '张义兵', '男', '土家族', '贵州省黔东南州民宗委党组书记', '13908555058', '3119', null, null, null, '0');
INSERT INTO `db_report` VALUES ('109', '司机', '男', '', '', '', '2820', null, null, null, '0');
INSERT INTO `db_report` VALUES ('110', '向红琼', '女', '苗族', '贵州省黔南州委副书记、州长', '', '3520', null, null, null, '0');
INSERT INTO `db_report` VALUES ('111', '李明进', '男', '苗族', '贵州省黔南州民宗委副主任', '13985079911', '3103', null, null, null, '0');
INSERT INTO `db_report` VALUES ('112', '蒙邵欢', '男', '', '贵州省黔南州政府秘书', '', '2417', null, null, null, '0');
INSERT INTO `db_report` VALUES ('113', '杨永英', '女', '布依族', '贵州省黔西南州委副书记、州长', '', '3318', null, null, null, '0');
INSERT INTO `db_report` VALUES ('114', '王丽蓉', '女', '布依族', '贵州省黔西南州民宗委党组书记、主任', '13985969888', '3317', null, null, null, '0');
INSERT INTO `db_report` VALUES ('115', '姚斌', '男', '汉族', '四川省民宗委党组书记、主任', '', '3418', null, null, null, '0');
INSERT INTO `db_report` VALUES ('116', '周发成', '男', '羌族', '四川省民宗委办公室主任', '13881857923', '3121', null, null, null, '0');
INSERT INTO `db_report` VALUES ('117', '赵克彬', '男', '汉族', '四川省民宗委政法处处长', '13682019712', '3123', null, null, null, '0');
INSERT INTO `db_report` VALUES ('118', '王荣昌', '男', '', '驾驶员', '', '2820', null, null, null, '0');
INSERT INTO `db_report` VALUES ('119', '林书成', '男', '汉族', '四川省凉山州委书记', '', '3422', null, null, null, '0');
INSERT INTO `db_report` VALUES ('120', '曾科技', '男', '', '凉山州委常委办副主任', '', '2826', null, null, null, '0');
INSERT INTO `db_report` VALUES ('121', '吉伍吉史', '男', '彝族', '四川省凉山州民宗委主任', '18981555555', '3421', null, null, null, '0');
INSERT INTO `db_report` VALUES ('122', '石一史军', '男', '', '凉山州民宗委办公室主任', '', '2826', null, null, null, '0');
INSERT INTO `db_report` VALUES ('123', '杨克宁', '男', '藏族', '四川省阿坝州州委副书记、人民政府州长', '', '3420', null, null, null, '0');
INSERT INTO `db_report` VALUES ('124', '王生', '男', '藏族', '四川省阿坝州民宗委主任', '', '3116', null, null, null, '0');
INSERT INTO `db_report` VALUES ('125', '季成', '男', '', '秘书', '', '2712', null, null, null, '0');
INSERT INTO `db_report` VALUES ('126', '刘仁松', '男', '', '秘书', '', '2712', null, null, null, '0');
INSERT INTO `db_report` VALUES ('127', '额勒', '男', '', '司机', '', '2710', null, null, null, '0');
INSERT INTO `db_report` VALUES ('128', '王绍林', '男', '', '司机', '', '2710', null, null, null, '0');
INSERT INTO `db_report` VALUES ('129', '益西达瓦', '男', '藏族', '四川省甘孜州政府州长', '', '3326', null, null, null, '0');
INSERT INTO `db_report` VALUES ('130', '郭静', '男', '', '甘孜州政府研究室副主任', '', '2718', null, null, null, '0');
INSERT INTO `db_report` VALUES ('131', '陈中华', '男', '藏族', '四川省甘孜州民宗委副主任', '18608368195', '3120', null, null, null, '0');
INSERT INTO `db_report` VALUES ('132', '徐克勤', '男', '苗族', '湖南省民宗委党组书记、主任', '', '3310', null, null, null, '0');
INSERT INTO `db_report` VALUES ('133', '李湘阳', '女', '汉族', '湖南省民宗委政法处副处长', '13677358166', '3212', null, null, null, '0');
INSERT INTO `db_report` VALUES ('134', '谷臣华', '男', '', '湖南省民宗委办公室主任科员', '', '2726', null, null, null, '0');
INSERT INTO `db_report` VALUES ('135', '宋殿举', '男', '', '司机', '', '2726', null, null, null, '0');
INSERT INTO `db_report` VALUES ('136', '郭建群', '女', '苗族', '湖南省湘西州委副书记、州人民政府州长', '', '3410', null, null, null, '0');
INSERT INTO `db_report` VALUES ('137', '骆帮建', '男', '', '湘西州政府副秘书长', '', '2419', null, null, null, '0');
INSERT INTO `db_report` VALUES ('138', '林军华', '男', '', '州政府办科长', '', '2806', null, null, null, '0');
INSERT INTO `db_report` VALUES ('139', '李志平', '男', '土家族', '湘西自治州民宗委主任', '13907439677', '3416', null, null, null, '0');
INSERT INTO `db_report` VALUES ('140', '司机', '男', '', '', '', '2802', null, null, null, '0');
INSERT INTO `db_report` VALUES ('141', '司机', '男', '', '', '', '2802', null, null, null, '0');
INSERT INTO `db_report` VALUES ('142', '柳望春', '男', '汉族', '湖北省民宗委主任', '', '3818', null, null, null, '0');
INSERT INTO `db_report` VALUES ('143', '李爱旻', '男', '土家族', '湖北省民宗委经济发展处处长', '18086600817', '3819', null, null, null, '0');
INSERT INTO `db_report` VALUES ('144', '江山', '男', '汉', '人民日报政文部主任记者', '13910434466', '2510', null, null, null, '0');
INSERT INTO `db_report` VALUES ('145', '谭元斌', '男', '土家', '新华社记者', '15907131187', '2512', null, null, null, '0');
INSERT INTO `db_report` VALUES ('146', '冯蕾', '女', '土家', '光明日报经济部主编', '13911794730', '2516', null, null, null, '0');
INSERT INTO `db_report` VALUES ('147', '陈颖', '男', '汉', '中央人民广播电台编辑', '13717718191', '2518', null, null, null, '0');
INSERT INTO `db_report` VALUES ('148', '殷云', '男', '汉', '求是《小康》杂志社常务副社长', '13811021156', '2520', null, null, null, '0');
INSERT INTO `db_report` VALUES ('149', '安宁宁', '男', '汉', '求是《小康》杂志社常务副社长', '18810557175', '2526', null, null, null, '0');
INSERT INTO `db_report` VALUES ('150', '陈远鹏', '男', '汉', '求是《小康》杂志社记者', '', '2519', null, null, null, '0');
INSERT INTO `db_report` VALUES ('151', '麦婉华', '女', '', '求是《小康》杂志社记者', '', '2517', null, null, null, '0');
INSERT INTO `db_report` VALUES ('152', '牛志男', '男', '汉', '中国民族杂志社新媒体部主任', '13810969798', '2528', null, null, null, '0');
INSERT INTO `db_report` VALUES ('153', '崔智伟', '男', '汉', '中国民族杂志社发行部记者', '', '2507', null, null, null, '0');
INSERT INTO `db_report` VALUES ('154', '滕俊', '男', '土家', '民族画报社采编部主任', '13701304327', '2506', null, null, null, '0');
INSERT INTO `db_report` VALUES ('155', '裴雄飞', '', '汉', '办公厅秘书处处长', '18611112312', '3705', null, null, null, '0');
INSERT INTO `db_report` VALUES ('156', '李智', '', '回', '办公厅秘书处副处长', '13693294197', '3303', null, null, null, '0');
INSERT INTO `db_report` VALUES ('157', '田长栋', '', '土家', '办公厅秘书处主任科员', '13426032482', '3619', null, null, null, '0');
INSERT INTO `db_report` VALUES ('158', '李渊呈', '', '苗', '办公厅秘书处干部', '13426004341', '3321', null, null, null, '0');
INSERT INTO `db_report` VALUES ('159', '周文京', '', '侗族', '政法司综合处处长', '13693666663', '3306', null, null, null, '0');
INSERT INTO `db_report` VALUES ('160', '董武', '', '壮族', '政法司政法处处长', '13439772501', '3328', null, null, null, '0');
INSERT INTO `db_report` VALUES ('161', '刘俞江', '', '回族', '政法司政法处主任科员', '13466303010', '3319', null, null, null, '0');
INSERT INTO `db_report` VALUES ('162', '程三艳', '', '土家', '经济司扶贫处副处长', '17774315922', '3912', null, null, null, '0');
INSERT INTO `db_report` VALUES ('163', '欧元明', '', '', '经济司扶贫处处长助理', '18162665927', '3910', null, null, null, '0');
INSERT INTO `db_report` VALUES ('164', '范振军', '', '汉', '研究室研究二处处长', '13520284966', '3112', null, null, null, '0');
INSERT INTO `db_report` VALUES ('165', '周遥强', '', '汉', '研究室研究一处干部', '13501307174', '3908', null, null, null, '0');
INSERT INTO `db_report` VALUES ('166', '李寅', '', '苗', '文宣司宣传处干部', '13811885659', '2509', null, null, null, '0');
INSERT INTO `db_report` VALUES ('167', '李军', null, null, null, null, null, null, null, null, '0');
