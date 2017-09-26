DROP DATABASE IF EXISTS `charity-main`;

CREATE DATABASE `charity-main`
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE `charity-main`;

CREATE TABLE `user`
(
  `id` INT NOT NULL,
  `username` VARCHAR(25) NOT NULL,
  `email` VARCHAR(25),
  `password` VARCHAR(25) NOT NULL,
  `nickname` VARCHAR(25),
  PRIMARY KEY (`id`)
);

CREATE TABLE `user_app`
(
  `user_id` INT NOT NULL,
  `app_id` INT NOT NULL,
  PRIMARY KEY (`app_id`, `user_id`)
);

CREATE TABLE `news_post`
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `date` DATETIME NOT NULL,
  `content` TEXT NOT NULL,
  `header_image` VARCHAR(255),
  `published` BOOLEAN DEFAULT 0,
  PRIMARY KEY (`id`)
);
ALTER TABLE `news_post` AUTO_INCREMENT=1000;

CREATE TABLE `highlighted_news_post`
(
  `post_id` INT NOT NULL PRIMARY KEY
);

CREATE TABLE `visitor`
(
  `post_id` INT NOT NULL,
  `ip` VARCHAR(40) NOT NULL,
  `time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
  `liked` BOOLEAN DEFAULT 0
);

CREATE TABLE `comments`
(
  `index` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(25) NOT NULL,
  `name` VARCHAR(25) NOT NULL,
  `date` DATETIME NOT NULL,
  `post_id` INT NOT NULL,
  PRIMARY KEY (`index`, `post_id`)
);

CREATE TABLE `slideshow_image`
(
  `index` INT NOT NULL,
  `image_url` VARCHAR(25) NOT NULL,
  `link` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`index`)
);

CREATE TABLE `news_ticker`
(
  `id` INT NOT NULL PRIMARY KEY,
  `content` TEXT NOT NULL
);

INSERT INTO `user` (`id`, `username`, `password`, `nickname`) VALUES
  (1, "root admin", "root123", "مدير الموقع"),
  (2, "editor", "editor123", "محرر أخبار");

INSERT INTO `user_app` VALUES
  (1, 2),
  (1, 3),
  (2, 2);


/*** Beneficiaries Data Management System ***/

/* Values */

CREATE TABLE `educational_level` (
  `level` INT PRIMARY KEY,
  `label` VARCHAR(25) NOT NULL
);

CREATE TABLE `beneficiary_type` (
  `id` INT PRIMARY KEY,
  `label` VARCHAR(25) NOT NULL
);

CREATE TABLE `accom_type` (
  `id` INT PRIMARY KEY,
  `label` VARCHAR(25) NOT NULL
);

CREATE TABLE `income_label` (
  `id` INT PRIMARY KEY,
  `label` VARCHAR(25) NOT NULL
);

CREATE TABLE `relation_label` (
  `id` INT PRIMARY KEY,
  `label` VARCHAR(25) NOT NULL
);

CREATE TABLE `health_status_label` (
  `id` INT PRIMARY KEY,
  `label` VARCHAR(25) NOT NULL
);

CREATE TABLE `social_status_label` (
  `id` INT PRIMARY KEY,
  `label` VARCHAR(25) NOT NULL
);

CREATE TABLE `area_label` (
  `id` INT PRIMARY KEY,
  `label` VARCHAR(255) NOT NULL
);

CREATE TABLE `school` (
  `id` INT PRIMARY KEY,
  `label` VARCHAR(255) NOT NULL,
  `area_id` INT
);

/* Values Insertion */

INSERT INTO `educational_level` VALUES
  (1, 'أول ابتدائي'),
  (2, 'ثاني ابتدائي'),
  (3, 'ثالث ابتدائي'),
  (4, 'رابع ابتدائي'),
  (5, 'خامس ابتدائي'),
  (6, 'سادس ابتدائي'),
  (7, 'أول متوسط'),
  (8, 'ثاني متوسط'),
  (9, 'ثالث متوسط'),
  (10, 'أول ثانوي'),
  (11, 'ثاني ثانوي'),
  (12, 'ثالث ثانوي');

INSERT INTO `beneficiary_type` VALUES
  (1, 'ألف'),
  (2, 'باء'),
  (3, 'جيم');


INSERT INTO `accom_type` VALUES
  (1, 'ملك'),
  (2, 'أجار'),
  (3, 'ورثة'),
  (4, 'مشترك'),
  (5, 'غير ذلك');

INSERT INTO `income_label` VALUES
  (1, 'تأمينات'),
  (2, 'الضمان'),
  (3, 'راتب'),
  (4, 'تقاعد'),
  (5, 'تأهيل معاقين'),
  (6, 'عقار'),
  (7, 'أخرى');

INSERT INTO `relation_label` VALUES
  (1, 'ابن'),
  (2, 'بنت'),
  (3, 'أخ'),
  (4, 'أخت'),
  (5, 'أب'),
  (6, 'أم'),
  (7, 'جد'),
  (8, 'جدة');

INSERT INTO `health_status_label` VALUES
  (1, 'سليم'),
  (2, 'مريض');

INSERT INTO `social_status_label` VALUES
  (1, 'متزوج'),
  (2, 'غير متزوج');

INSERT INTO `area_label` VALUES
  (1, 'الرفاع'),
  (2, 'المعيزل'),
  (3, 'السلطانية'),
  (4, 'حصيمة'),
  (5, 'الصراة القديمة'),
  (6, 'الصراة الجديدة');

INSERT INTO `school` VALUES
  (1, 'مدرسة ١', NULL),
  (2, 'مدرسة ٢', NULL),
  (3, 'مدرسة ٣', NULL),
  (4, 'مدرسة ٤', NULL);

/* Entities */

CREATE TABLE `beneficiary` (
  `file_id` INT PRIMARY KEY,
  `gov_id` VARCHAR(20) UNIQUE,
  `full_name` VARCHAR(255),
  `gender` BOOLEAN,
  `birth_date` DATE,
  `is_permanent` BOOLEAN,
  `job` VARCHAR(255),
  `job_location` VARCHAR(255),
  `update_date` DATE,
  `payment_date` DATE,
  `giving_amount` INT,
  `rent_value` INT,
  `family_members_count` INT,
  `alternative_contact_name` VARCHAR(255),
  `beneficiary_type_id` INT,
  `area_id` INT,
  `accom_type_id` INT ,
  `health_status_id` INT,
  `social_status_id` INT
);

CREATE TABLE `phone` (
  `file_id` VARCHAR(20),
  `index` INT,
  `phone_number` VARCHAR(25),
  PRIMARY KEY (`file_id`, `index`)
);

CREATE TABLE `income` (
  `file_id` INT,
  `label_id` INT,
  `amount` INT,
  PRIMARY KEY (`file_id`, `label_id`)
);

CREATE TABLE `dependency` (
  `id` INT,
  `file_id` INT,
  `educational_level` INT,
  `relation_id` INT,
  `gov_id` VARCHAR(20),
  `full_name` VARCHAR(255),
  `gender` BOOLEAN,
  `birth_date` DATE,
  PRIMARY KEY (`id`,`file_id`)
);
