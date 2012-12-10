-- ----------------------------
-- Table structure for `#__slideshow`
-- ----------------------------
DROP TABLE IF EXISTS `#__slideshow`;
CREATE TABLE `#__slideshow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `alias` varchar(100) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `video` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `align` tinyint(1) NOT NULL,
  `description` mediumtext NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `language` char(7) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `xreference` varchar(50) NOT NULL DEFAULT '',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of #__slideshow
-- ----------------------------
INSERT INTO `#__slideshow` VALUES ('1', '9', 'We make awesome UX & UI design. Have a look.', 'we-make-awesome-ux-ui-design-have-a-look', '1', '', 'images/slider/slider_1.jpg', '#', '0', '<p>Good visual design on a website identifies and works for its target market. This can be an age group or particular strand of culture thus the designer should understand the trends of its audience.</p>', '1', '1', '1', '0', '', '*', '0000-00-00 00:00:00', '0', '', '2012-08-18 01:59:13', '855', '0', '0000-00-00 00:00:00', '', '', '{\"robots\":\"\",\"author\":\"\",\"rights\":\"\"}', '0', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `#__slideshow` VALUES ('2', '8', 'Quality of code', 'quality-of-code', '1', '', 'images/slider/slider_1.jpg', '#', '1', '<p>When creating a site it is good practice to conform to standards. This includes errors in code, better layout for code as well as making sure your IDs and classes are identified properly.</p>', '2', '1', '1', '0', '', '*', '0000-00-00 00:00:00', '0', '', '2012-08-18 01:25:08', '855', '0', '0000-00-00 00:00:00', '', '', '{\"robots\":\"\",\"author\":\"\",\"rights\":\"\"}', '0', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `#__slideshow` VALUES ('3', '9', 'Spherikal', 'spherikal', '0', 'http://player.vimeo.com/video/39792837', '', '#', '0', '', '5', '1', '1', '0', '', '*', '0000-00-00 00:00:00', '0', '', '2012-08-18 01:25:17', '855', '0', '0000-00-00 00:00:00', '', '', '{\"robots\":\"\",\"author\":\"\",\"rights\":\"\"}', '0', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `#__slideshow` VALUES ('4', '9', 'Slider with many variations to suit any need perfectly!', 'slider-with-many-variations-to-suit-any-need-perfectly', '2', '', 'images/slider/slider_4.jpg', '#', '0', '', '4', '1', '1', '0', '', '*', '0000-00-00 00:00:00', '0', '', '2012-08-18 01:34:19', '855', '0', '0000-00-00 00:00:00', '', '', '{\"robots\":\"\",\"author\":\"\",\"rights\":\"\"}', '0', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `#__slideshow` VALUES ('5', '8', 'Good visual design on a website identifies and works for its target', 'good-visual-design-on-a-website-identifies-and-works-for-its-target', '2', '', 'images/slider/slider_3.jpg', '#', '1', '', '3', '1', '1', '0', '', '*', '0000-00-00 00:00:00', '0', '', '2012-08-18 01:37:30', '855', '0', '0000-00-00 00:00:00', '', '', '{\"robots\":\"\",\"author\":\"\",\"rights\":\"\"}', '0', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
