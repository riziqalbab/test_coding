-- Database schema for the application
CREATE DATABASE IF NOT EXISTS learn_yii;
USE learn_yii;

-- Account table for users
CREATE TABLE IF NOT EXISTS `account` (
    `username` VARCHAR(45) NOT NULL,
    `password` VARCHAR(250) NOT NULL,
    `name` VARCHAR(45) NOT NULL,
    `role` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`username`)
) ENGINE = InnoDB;

-- Post table
CREATE TABLE IF NOT EXISTS `post` (
    `idpost` INT NOT NULL AUTO_INCREMENT,
    `title` TEXT NOT NULL,
    `content` TEXT NOT NULL,
    `date` DATETIME NOT NULL,
    `username` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`idpost`),
    INDEX `fk_post_account_idx` (`username` ASC),
    CONSTRAINT `fk_post_account`
        FOREIGN KEY (`username`)
        REFERENCES `account` (`username`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- Insert dummy users
INSERT INTO account (username, password, name, role) VALUES 
('admin', '$2y$10$UQz7fOiZWwM0CQYt2UTBWewDapV8ZxgsQ39/boEID62.xS10LfFGi', 'Administrator', 'admin'),
('author', '$2y$10$p2M7T2MbBtYQdCLAX7DvpO/czKEZDA8DDZWNaIKcqCNCsCvUq/NM2', 'Author User', 'author');

-- Note: Password for admin is 'admin' and for author is 'author'