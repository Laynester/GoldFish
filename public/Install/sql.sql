SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `cms_fuserights`;
DROP TABLE IF EXISTS `cms_settings`;
DROP TABLE IF EXISTS `cms_menu`;
DROP TABLE IF EXISTS `cms_news`;
DROP TABLE IF EXISTS `cms_alerts`;
DROP TABLE IF EXISTS `cms_fuserights`;
CREATE TABLE `cms_fuserights`  (
  `right` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `min_rank` int(25) NOT NULL,
  `desc` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`right`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;
CREATE TABLE `cms_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(255) DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(230) NOT NULL DEFAULT '',
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
CREATE TABLE `cms_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `caption` varchar(250) NOT NULL DEFAULT '',
  `desc` varchar(255) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `author` int(11) NOT NULL,
  `date` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
CREATE TABLE `cms_settings`  (
  `key` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `value` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;
CREATE TABLE `cms_alerts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'ADM',
  `userid` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;
INSERT INTO `cms_fuserights` VALUES ('dashboard', 5, 'Dashboard tab', '1');
INSERT INTO `cms_fuserights` VALUES ('moderation', 5, 'Moderation Tab', '1');
INSERT INTO `cms_fuserights` VALUES ('moderation_badges', 7, 'Give badges', '3');
INSERT INTO `cms_fuserights` VALUES ('moderation_banlist', 5, 'View ban list', '3');
INSERT INTO `cms_fuserights` VALUES ('moderation_chatlog', 5, 'View Chatlog', '3');
INSERT INTO `cms_fuserights` VALUES ('moderation_online', 5, 'View online list', '3');
INSERT INTO `cms_fuserights` VALUES ('moderation_user', 4, 'View users', '3');
INSERT INTO `cms_fuserights` VALUES ('moderation_user_admin', 6, 'Modify Users', '3');
INSERT INTO `cms_fuserights` VALUES ('navi_server_hotel', 7, 'Server Hotel box', '2');
INSERT INTO `cms_fuserights` VALUES ('navi_server_navigation', 7, 'Server Navigation box', '2');
INSERT INTO `cms_fuserights` VALUES ('navi_server_settings', 7, 'Server Settings box', '2');
INSERT INTO `cms_fuserights` VALUES ('navi_site_content', 6, 'Site Content box', '2');
INSERT INTO `cms_fuserights` VALUES ('navi_site_settings', 7, 'Site Settings box', '2');
INSERT INTO `cms_fuserights` VALUES ('navi_usermod_moderation', 5, 'Moderation box', '2');
INSERT INTO `cms_fuserights` VALUES ('navi_usermod_users', 7, 'Moderation Users box', '2');
INSERT INTO `cms_fuserights` VALUES ('server', 7, 'Server Tab', '1');
INSERT INTO `cms_fuserights` VALUES ('server_client', 7, 'Server client settings', '3');
INSERT INTO `cms_fuserights` VALUES ('server_emulator', 7, 'Server emulator settings', '3');
INSERT INTO `cms_fuserights` VALUES ('server_publiccats', 7, 'Server public room categories', '3');
INSERT INTO `cms_fuserights` VALUES ('server_publics', 7, 'Server public rooms', '3');
INSERT INTO `cms_fuserights` VALUES ('server_rcon', 7, 'Server RCON', '3');
INSERT INTO `cms_fuserights` VALUES ('server_vouchers', 7, 'Server Vouchers', '3');
INSERT INTO `cms_fuserights` VALUES ('site', 6, 'Site Tab', '1');
INSERT INTO `cms_fuserights` VALUES ('site_alert', 5, 'Send Site Alerts', '3');
INSERT INTO `cms_fuserights` VALUES ('site_news', 6, 'Create News', '3');
INSERT INTO `cms_fuserights` VALUES ('site_rights', 7, 'Site Rights', '3');
INSERT INTO `cms_fuserights` VALUES ('site_settings_general', 7, 'CMS Settings', '3');
INSERT INTO `cms_fuserights` VALUES ('site_settings_social', 7, 'Social Settings', '3');
INSERT INTO `cms_fuserights` VALUES ('updater', 7, 'Update GoldFish', '3');
INSERT INTO `cms_menu` VALUES ('1', null, 'Home', 'me', '1');
INSERT INTO `cms_menu` VALUES ('2', 'me', 'Home', 'me', '1');
INSERT INTO `cms_menu` VALUES ('3', null, 'Community', 'community', '2');
INSERT INTO `cms_menu` VALUES ('4', 'community', 'Community', 'community', '1');
INSERT INTO `cms_menu` VALUES ('5', 'community', 'Staff', 'community/staff', '5');
INSERT INTO `cms_menu` VALUES ('6', 'me', 'My Page', 'home/%username%', '3');
INSERT INTO `cms_menu` VALUES ('7', 'community', 'Leaderboards', 'community/leaderboards', '4');
INSERT INTO `cms_menu` VALUES ('8', 'community', 'News', 'community/articles', '2');
INSERT INTO `cms_menu` VALUES ('9', 'community', 'Photos', 'community/photos', '3');
INSERT INTO `cms_menu` VALUES ('10', 'me', 'Settings', 'settings', '2');
INSERT INTO `cms_news` VALUES ('1', 'GoldFish Installation complete', 'GoldFish Installation complete', '<p>Welcome to your freshly installed version of GoldFishCMS!</p>', '/images/news/wpid-lpromo_atcg.png', '1', '1563049338');
INSERT INTO `cms_settings` VALUES ('hotelname', 'Habbo');
INSERT INTO `cms_settings` VALUES ('c_images', '/swfs/c_images/');
INSERT INTO `cms_settings` VALUES ('discord_id', '509801583991848972');
INSERT INTO `cms_settings` VALUES ('swfdir', '/swfs/gordon/PRODUCTION-201601012205-226667486/');
INSERT INTO `cms_settings` VALUES ('swf', '/swfs/gordon/PRODUCTION-201601012205-226667486/habbo.swf');
INSERT INTO `cms_settings` VALUES ('emuhost', '127.0.0.1');
INSERT INTO `cms_settings` VALUES ('emuport', '3000');
INSERT INTO `cms_settings` VALUES ('variables', '/swfs/gamedata/external_variables.txt');
INSERT INTO `cms_settings` VALUES ('override_variables', '/swfs/gamedata/override/external_override_variables.txt');
INSERT INTO `cms_settings` VALUES ('texts', '/swfs/gamedata/external_flash_texts.txt');
INSERT INTO `cms_settings` VALUES ('override_texts', '/swfs/gamedata/override/external_flash_override_texts.txt');
INSERT INTO `cms_settings` VALUES ('productdata', '/swfs/gamedata/productdata.txt');
INSERT INTO `cms_settings` VALUES ('furnidata', '/swfs/gamedata/furnidata.xml');
INSERT INTO `cms_settings` VALUES ('figuremap', '/swfs/gamedata/figuremap.xml');
INSERT INTO `cms_settings` VALUES ('figuredata', '/swfs/gamedata/figuredata.xml');
INSERT INTO `cms_settings` VALUES ('twitter_handle', 'Habbo');
INSERT INTO `cms_settings` VALUES ('habbo_imager', 'https://habbo.com.br/habbo-imaging/avatarimage?figure=');
INSERT INTO `cms_settings` VALUES ('site_logo', '/goldfish/images/logo.gif');
INSERT INTO `cms_settings` VALUES ('default_motto', 'I Love Habbo Hotel!');
INSERT INTO `cms_settings` VALUES ('rconport', '3001');
INSERT INTO `cms_settings` VALUES ('group_badges', '/swfs/c_images/Badgeparts/generated/');
INSERT INTO `cms_settings` VALUES ('rconip', '127.0.0.1');
INSERT INTO `cms_settings` VALUES ('installed', '0');
INSERT INTO `cms_settings` VALUES ('hk_notes', 'This housekeeping owns. ^^\r\n\r\n-Laynester');
INSERT INTO `cms_settings` VALUES ('theme', 'goldfish');
INSERT INTO `cms_settings` VALUES ('findretros', null);
INSERT INTO `cms_settings` VALUES ('cacheVar', null);
ALTER TABLE `users` ADD `profile_background` varchar(50) NOT NULL DEFAULT 'bg_colour_03.gif';
ALTER TABLE `users` ADD `hotelview` varchar(50) NOT NULL DEFAULT 'view_us_wide.png';
ALTER TABLE `users` MODIFY `mail` VARCHAR(255) ;
UPDATE `emulator_settings` SET value = '0' WHERE `key` = 'debug.show.headers';
SET FOREIGN_KEY_CHECKS = 1;
