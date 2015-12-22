/*
Navicat MySQL Data Transfer

Source Server         : vagrant
Source Server Version : 50546
Source Host           : localhost:33066
Source Database       : onecms

Target Server Type    : MYSQL
Target Server Version : 50546
File Encoding         : 65001

Date: 2015-12-22 18:54:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `advertising`
-- ----------------------------
DROP TABLE IF EXISTS `advertising`;
CREATE TABLE `advertising` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT '#',
  `published` tinyint(4) DEFAULT '10',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_start_date` (`start_date`),
  KEY `idx_end_date` (`end_date`),
  KEY `idx_start_end_date` (`start_date`,`end_date`),
  KEY `idx_position` (`position`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of advertising
-- ----------------------------
INSERT INTO `advertising` VALUES ('1', 'sl1', 'slideshow', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '/uploads/slideshow/1.jpg', '#', '10', '1', '1', '1450754123', '1450754123');
INSERT INTO `advertising` VALUES ('2', 'sl2', 'slideshow', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '/uploads/slideshow/2.jpg', '#', '10', '1', '1', '1450754280', '1450754302');
INSERT INTO `advertising` VALUES ('3', 'sl3', 'slideshow', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '/uploads/slideshow/3.jpg', '#', '10', '1', '1', '1450754294', '1450784576');
INSERT INTO `advertising` VALUES ('4', 'Sản phẩm 1', 'home_product', null, null, '/uploads/products/1.jpg', '#', '10', '1', '1', '1450782014', '1450784547');
INSERT INTO `advertising` VALUES ('5', 'Sản phẩm 2', 'home_product', null, null, '/uploads/products/2.jpg', '#', '10', '1', '1', '1450782033', '1450784106');
INSERT INTO `advertising` VALUES ('6', 'Sản phẩm 3', 'home_product', null, null, '/uploads/products/3.jpg', '#', '10', '1', '1', '1450782047', '1450784112');
INSERT INTO `advertising` VALUES ('7', 'Sản phẩm 4', 'home_product', null, null, '/uploads/products/4.jpg', '#', '10', '1', '1', '1450782064', '1450784117');
INSERT INTO `advertising` VALUES ('8', 'Sản phẩm 5', 'home_product', null, null, '/uploads/products/5.jpg', '#', '10', '1', '1', '1450782082', '1450784122');
INSERT INTO `advertising` VALUES ('9', 'Sản phẩm 6', 'home_product', null, null, '/uploads/products/6.jpg', '#', '10', '1', '1', '1450782097', '1450784127');
INSERT INTO `advertising` VALUES ('10', 'Sản phẩm 7', 'home_product', null, null, '/uploads/products/1.jpg', '#', '10', '1', '1', '1450782114', '1450784132');
INSERT INTO `advertising` VALUES ('11', 'Sản phẩm 8', 'home_product', null, null, '/uploads/products/2.jpg', '#', '10', '1', '1', '1450782142', '1450784138');
INSERT INTO `advertising` VALUES ('12', 'Sản phẩm 9', 'home_product', null, null, '/uploads/products/3.jpg', '#', '10', '1', '1', '1450782158', '1450784143');
INSERT INTO `advertising` VALUES ('13', 'Sản phẩm 10', 'home_product', null, null, '/uploads/products/4.jpg', '#', '10', '1', '1', '1450782173', '1450784148');

-- ----------------------------
-- Table structure for `auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------

-- ----------------------------
-- Table structure for `auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------

-- ----------------------------
-- Table structure for `auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------

-- ----------------------------
-- Table structure for `auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `category_post`
-- ----------------------------
DROP TABLE IF EXISTS `category_post`;
CREATE TABLE `category_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `tree` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci,
  `meta_title` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_params` text COLLATE utf8_unicode_ci,
  `published` tinyint(4) DEFAULT NULL,
  `layouts` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `views` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_title` (`title`) USING BTREE,
  KEY `idx_slug` (`slug`),
  KEY `idx_lft` (`lft`),
  KEY `idx_lft_rgt` (`lft`,`rgt`),
  KEY `idx_id_lft_rgt` (`id`,`lft`,`rgt`),
  KEY `idx_parent_id` (`parent_id`),
  KEY `idx_tree_lft` (`tree`,`lft`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category_post
-- ----------------------------
INSERT INTO `category_post` VALUES ('1', null, '1', '1', '2', '0', 'Tin tức', 'tin-tuc', '', '', '', '', '', null, '10', null, null, '1', '1', '1450760543', '1450760543');
INSERT INTO `category_post` VALUES ('2', null, '2', '1', '2', '0', 'Sự kiện', 'su-kien', '', '', '', '', '', null, '10', null, null, '1', '1', '1450760603', '1450765458');

-- ----------------------------
-- Table structure for `category_product`
-- ----------------------------
DROP TABLE IF EXISTS `category_product`;
CREATE TABLE `category_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `tree` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci,
  `meta_title` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_params` text COLLATE utf8_unicode_ci,
  `published` tinyint(4) DEFAULT NULL,
  `layouts` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `views` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_title` (`title`) USING BTREE,
  KEY `idx_slug` (`slug`) USING BTREE,
  KEY `idx_lft` (`lft`) USING BTREE,
  KEY `idx_lft_rgt` (`lft`,`rgt`) USING BTREE,
  KEY `idx_id_lft_rgt` (`id`,`lft`,`rgt`) USING BTREE,
  KEY `idx_parent_id` (`parent_id`) USING BTREE,
  KEY `idx_tree_lft` (`tree`,`lft`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category_product
-- ----------------------------
INSERT INTO `category_product` VALUES ('1', null, '1', '1', '2', '0', 'Sản phẩm', 'san-pham', '', '', '', '', '', null, '10', null, null, '1', '1', '1450765903', '1450768865');

-- ----------------------------
-- Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1450684366');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1450684371');
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', '1450726671');

-- ----------------------------
-- Table structure for `page`
-- ----------------------------
DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci,
  `meta_title` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_params` text COLLATE utf8_unicode_ci,
  `published` tinyint(4) DEFAULT NULL,
  `layouts` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `views` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_title` (`title`) USING BTREE,
  KEY `idx_slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of page
-- ----------------------------
INSERT INTO `page` VALUES ('1', 'Giới thiệu', 'gioi-thieu', '', '', '', '', null, '10', null, null, '1', '1', '1450769510', '1450769510');

-- ----------------------------
-- Table structure for `post`
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci,
  `meta_params` text COLLATE utf8_unicode_ci,
  `meta_title` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_category_id` (`category_id`),
  KEY `idx_title` (`title`) USING BTREE,
  KEY `idx_slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('1', '1', 'Nội dung test thử', 'noi-dung-test-thu', '/uploads/slideshow/8.jpg', '', null, '', '', '', '10', '1', '1', '1450769617', '1450769617');

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` tinytext COLLATE utf8_unicode_ci,
  `sku` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `video` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `download` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` tinytext COLLATE utf8_unicode_ci,
  `content` mediumtext COLLATE utf8_unicode_ci,
  `specification` text COLLATE utf8_unicode_ci,
  `meta_params` text COLLATE utf8_unicode_ci,
  `meta_title` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_category_id` (`category_id`),
  KEY `idx_title` (`title`) USING BTREE,
  KEY `idx_slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '1', 'Máy tạo ozone làm sạch rau quả Ozonier Fresh MUM-99 30W (Trắng)', 'may-tao-ozone-lam-sach-rau-qua-ozonier-fresh-mum-99-30w-trang', '/uploads/products/1447640871096_5818759.jpg', '/uploads/products/1447640871096_5818759.jpg, /uploads/products/1447640873755_6125840.jpg', 'aaa', null, '1575000', null, '72g4Zkexu3E', null, '<p>- Được làm bằng chất liệu nhựa cao cấp, bền bỉ</p>\r\n\r\n<p>- Sử dụng công nghệ ozone khuếch tán hiện đại</p>\r\n\r\n<p>- Giúp khử độc và làm sạch rau củ, thực phẩm an toàn</p>\r\n', '<p>Máy tạo ozone làm sạch rau quả Ozonier Fresh MUM-99 30W (Trắng)</p>\r\n\r\n<p>-&nbsp;Máy tạo ozone làm sạch rau quả Ozonier Fresh MUM-99 30W (Trắng) được làm bằng chất liệu nhựa cao cấp, bền bỉ, không chứa các hóa chất gây hại, đảm bảo an toàn cho sức khỏe người sử dụng.<br />\r\n- Thiết kế độc đáo và hiện đại với các lỗ khí nhỏ được tích hợp ngay trên máy sẽ giúp ozone khuếch tán vào trong nước, thâm nhập vào sâu bên trong thực phẩm, tiêu diệt mầm bệnh và vi khuẩn, giúp rau, củ, quả và thức ăn luôn được tươi ngon và an toàn nhất.<br />\r\n- Sản phẩm có khả năng phân hủy thuốc trừ sâu, tiêu diệt vi khuẩn liên quan đến bệnh đường ruột, loại bỏ các chất độc hữu cơ và khử mùi hải sản, thịt, cá... Ngoài ra, máy còn có chức năng khử độc bát đĩa và làm sạch không gian xung quanh.<br />\r\n- Thiết kế tiện lợi, máy tạo ozone làm sạch rau quả Ozonier Fresh MUM-99 sẽ là một vật dụng hoàn hảo và cần thiết&nbsp;cho gia đình bạn.​<br />\r\n<br />\r\n<strong>Hướng dẫn sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Làm sạch rau quả:</strong>&nbsp;rửa sạch bẩn trên rau quả, đổ đầy nước vào chậu với lượng vừa đủ, thả quả sục vào giữa đáy chậu, bật máy, ấn nút hẹn giờ phù hợp.</li>\r\n	<li><strong>Làm sạch thịt rau hải sản:</strong>&nbsp;để thực phẩm vào nồi đến khi ngập nước, thả sục vào đáy nồi, ấn nút hẹn thời gian phù hợp. Ozone khuếch tán trong nước thẩm thấu vào thực phẩm khử sạch vi khuẩn và mần bệnh. Sau khi rửa lại thực phẩm bằng nước sạch, sau 5 - 10 phút mới ướp.</li>\r\n	<li><strong>Khử độc bát đĩa:</strong>&nbsp;sau khi rửa bát, cốc xong. Xếp gọn vào chậu nước sạch để sục khí ozon, bát đĩa, ly cốc chén sẽ được diệt trùng hoàn toàn.</li>\r\n	<li><strong>Làm sạch nước:</strong>&nbsp;thả quả sục vào đáy bình, chậu sau đó bật công tắc nguồn, ấn nút hẹn giờ phù hợp với dung tích nước cần xử lý. Nước xử lý xong cần lọc lại trước khi sử dụng.</li>\r\n	<li><strong>Khử mùi không khí:</strong>&nbsp;tháo quả sục, đặt ống vào vị trí cần khử mùi, bật máy, ấn nút hẹn giờ phù hợp với diện tích cần làm sạch. Ozone sẽ khử sạch mùi, không gian được trả lại không khí trong lành tự nhiên.</li>\r\n</ul>\r\n', '<table class=\"table table-bordered table-striped\" id=\"tblGeneralAttribute\" style=\"background-color:transparent; border-collapse:collapse; border-spacing:0px; border:1px solid rgb(221, 221, 221); box-sizing:border-box; margin-bottom:20px; max-width:100%; width:1140px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top\"><strong>Màu sắc</strong></td>\r\n			<td style=\"vertical-align:top\">Trắng</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\"><strong>Chất liệu</strong></td>\r\n			<td style=\"vertical-align:top\">Nhựa</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\"><strong>Model</strong></td>\r\n			<td style=\"vertical-align:top\">MUM-99</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\"><strong>Kích thước</strong></td>\r\n			<td style=\"vertical-align:top\">32 x 12 x 27 (cm)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\"><strong>Xuất xứ</strong></td>\r\n			<td style=\"vertical-align:top\">Trung Quốc</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\"><strong>Điện áp</strong></td>\r\n			<td style=\"vertical-align:top\">220 (V)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\"><strong>Công suất</strong></td>\r\n			<td style=\"vertical-align:top\">30 (W)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\"><strong>Bảo hành</strong></td>\r\n			<td style=\"vertical-align:top\">12 (tháng)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', null, '', '', '', '10', '1', '1', '1450777213', '1450785241');

-- ----------------------------
-- Table structure for `setting`
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_key` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` mediumtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `idx_meta_key` (`meta_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of setting
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'RbFi1_U9E69y6QsQJq5A8eL2V7oMCZoe', '$2y$13$VO33A5o6g9zIOlFeu/PXPuS0iZy.ik0ZYSXN5jJ77Nzx33we3T.Wy', null, 'tuan@sieulog.com', '10', '1450684500', '1450684500');
