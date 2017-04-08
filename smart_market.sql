CREATE DATABASE IF NOT EXISTS market;

USE market;

CREATE TABLE IF NOT EXISTS `admin`
(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	login varchar(255) NOT NULL,
	pass varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS `client`
(
	`id` int(11) NOT NULL,
	`login` varchar(100) NOT NULL,
	`pass` varchar(255) NOT NULL
);
