USE gf_interview_task;
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for applications
-- ----------------------------
DROP TABLE IF EXISTS `applications`;
CREATE TABLE `applications` (
  `app_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `creation_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `charity_id` int(11) NOT NULL,
  `stage_id` smallint(1) NOT NULL, -- value 1 = Organisation Approval | value 2 = Allow to Proceed | value 3 = Paid
  PRIMARY KEY (`app_id`),
  KEY `apps_user` (`user_id`),
  KEY `apps_charity` (`charity_id`),
  KEY `apps_stage` (`stage_id`),
  CONSTRAINT `apps_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `apps_charity` FOREIGN KEY (`charity_id`) REFERENCES `charities` (`charity_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `apps_stage` FOREIGN KEY (`stage_id`) REFERENCES `app_stages` (`stage_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for application stages (this is not nessesary for the test, but usually it is useful)
-- ----------------------------
DROP TABLE IF EXISTS `app_stages`;
CREATE TABLE `app_stages` (
  `stage_id` smallint(1) NOT NULL,
  `name` varchar(30),
  PRIMARY KEY (`stage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stages
-- ----------------------------
BEGIN;
INSERT INTO `app_stages` VALUES (1, 'Organisation Approval');
INSERT INTO `app_stages` VALUES (2, 'Allow to Proceed');
INSERT INTO `app_stages` VALUES (3, 'Paid');
COMMIT;

-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
