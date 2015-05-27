
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `user_id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(150) NOT NULL,
    `pw` VARCHAR(30) NOT NULL,
    `role` TINYINT NOT NULL,
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- book
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book`
(
    `book_id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `author` VARCHAR(255) NOT NULL,
    `genre` VARCHAR(255) NOT NULL,
    `publisher` VARCHAR(255) NOT NULL,
    `language` VARCHAR(255) NOT NULL,
    `content` VARCHAR(255) NOT NULL,
    `path` VARCHAR(255) NOT NULL,
    `year` DATE NOT NULL,
    `user_id` INTEGER NOT NULL,
    PRIMARY KEY (`book_id`),
    INDEX `book_fi_38da1e` (`user_id`),
    CONSTRAINT `book_fk_38da1e`
        FOREIGN KEY (`user_id`)
        REFERENCES `user` (`user_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- comment
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment`
(
    `comment_id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_id` INTEGER NOT NULL,
    `book_id` INTEGER NOT NULL,
    `titel` VARCHAR(150) NOT NULL,
    `date` DATE NOT NULL,
    `text` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`comment_id`,`user_id`,`book_id`),
    INDEX `comment_fi_38da1e` (`user_id`),
    INDEX `comment_fi_be6c79` (`book_id`),
    CONSTRAINT `comment_fk_38da1e`
        FOREIGN KEY (`user_id`)
        REFERENCES `user` (`user_id`),
    CONSTRAINT `comment_fk_be6c79`
        FOREIGN KEY (`book_id`)
        REFERENCES `book` (`book_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- rating
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `rating`;

CREATE TABLE `rating`
(
    `user_id` INTEGER NOT NULL,
    `book_id` INTEGER NOT NULL,
    `rating` TINYINT NOT NULL,
    PRIMARY KEY (`user_id`,`book_id`),
    INDEX `rating_fi_be6c79` (`book_id`),
    CONSTRAINT `rating_fk_38da1e`
        FOREIGN KEY (`user_id`)
        REFERENCES `user` (`user_id`),
    CONSTRAINT `rating_fk_be6c79`
        FOREIGN KEY (`book_id`)
        REFERENCES `book` (`book_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- read
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `read`;

CREATE TABLE `read`
(
    `user_id` INTEGER NOT NULL,
    `book_id` INTEGER NOT NULL,
    `bookmark` INTEGER NOT NULL,
    PRIMARY KEY (`user_id`,`book_id`),
    INDEX `read_fi_be6c79` (`book_id`),
    CONSTRAINT `read_fk_38da1e`
        FOREIGN KEY (`user_id`)
        REFERENCES `user` (`user_id`),
    CONSTRAINT `read_fk_be6c79`
        FOREIGN KEY (`book_id`)
        REFERENCES `book` (`book_id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
