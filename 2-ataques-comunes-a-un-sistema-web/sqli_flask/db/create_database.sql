DROP DATABASE IF EXISTS sqli_poc;
CREATE DATABASE sqli_poc;
USE sqli_poc;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `users`(`id`,`username`,`password`) values
(1,'juan', MD5('juan2022')),
(2,'raul', MD5('raul2022'));