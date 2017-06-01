CREATE DATABASE studyusers;

USE studyusers;

-- for now userStatus signifies if user is asking for help; true is asking for help, false is offering help

CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userName` VARCHAR (255) NOT NULL,
  `userpassword` VARCHAR (255) NOT NULL,
  `userEmail` VARCHAR (255) NOT NULL,
  `userBio1` VARCHAR (1000),
  `class` VARCHAR (400) NOT NULL,
  `survey` INT,
  PRIMARY KEY (id)
);
