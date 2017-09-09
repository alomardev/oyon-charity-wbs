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
  (1, "root admin", "Oy0n132Org$a", "مدير الموقع"),
  (2, "editor", "Oy0n132Org$a", "محرر أخبار");

INSERT INTO `user_app` VALUES
  (1, 3),
  (2, 2);


