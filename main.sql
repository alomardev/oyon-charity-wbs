<<<<<<< HEAD
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
  `title` VARCHAR(25) NOT NULL,
  `content` TEXT NOT NULL,
  `date` DATETIME NOT NULL,
  `likes` INT DEFAULT 0,
  `visits` INT DEFAULT 0,
  `author_id` INT NOT NULL,
  PRIMARY KEY (`id`)
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

INSERT INTO `user` (`id`, `username`, `password`, `nickname`) VALUES
  (1, "root admin", "123", "مدير الموقع"),
  (2, "editor", "123", "محرر أخبار");

INSERT INTO `user_app` VALUES
  (1, 3),
  (2, 2);


=======
DROP DATABASE IF EXISTS `charity-main`;
CREATE DATABASE `charity-main`;
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

CREATE TABLE `privilege`
(
  `id` INT NOT NULL,
  `label` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `user_privilege`
(
  `privilege_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`privilege_id`, `user_id`)
);

CREATE TABLE `news_post`
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(25) NOT NULL,
  `content` TEXT NOT NULL,
  `date` DATETIME NOT NULL,
  `likes` INT DEFAULT 0,
  `visits` INT DEFAULT 0,
  `author_id` INT NOT NULL,
  PRIMARY KEY (`id`)
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

INSERT INTO `privilege` VALUES
  (1, "ROOT ADMIN"),
  (2, "NEWS ADMIN"),
  (3, "BENIFICIARY DATA ADMIN"),
  (4, "COMMITTE ADMIN");

INSERT INTO `user` (`id`, `username`, `password`) VALUES
  (1, "root admin", "123"),
  (2, "editor", "123");

INSERT INTO `user_privilege` VALUES
  (1, 1),
  (1, 2),
  (2, 2);


>>>>>>> 13e3941842a47f658d91e33cc6bc9376b77c4171
