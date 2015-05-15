
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `UserID` INTEGER NOT NULL AUTO_INCREMENT,
    `benutzername` VARCHAR(255) NOT NULL,
    `passwort` VARCHAR(24) NOT NULL,
    `rolle` INTEGER NOT NULL,
    PRIMARY KEY (`UserID`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
