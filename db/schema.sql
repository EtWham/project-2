
CREATE DATABASE Users;

USE Users;

-- userStatus signifies if user is asking for help; true is asking for help, false is offering help
-- find a better way to do the helpers/helped thing, probably user varchar
CREATE TABLE allUsers (
  'id' INT NOT NULL AUTO_INCREMENT,
  'userName' VARCHAR (255) NOT NULL,
  'userStatus' BOOLEAN NOT NULL,
  'date' TIMESTAMP,
  PRIMARY KEY (id)
);

CREATE TABLE helpers (
  'id' INT NOT NULL AUTO_INCREMENT,
  'userName' VARCHAR (255) NOT NULL,
  'helpingIn' VARCHAR (255) NOT NULL,
  'date' TIMESTAMP,
  PRIMARY KEY (id)
);

CREATE TABLE helped (
  'id' INT NOT NULL AUTO_INCREMENT,
  'userName' VARCHAR (255) NOT NULL,
  'helpedIn' VARCHAR (255) NOT NULL,
  'date' TIMESTAMP,
  PRIMARY KEY (id)
);

CREATE TABLE class1 (
  'id' INT NOT NULL AUTO_INCREMENT,
  'userName' VARCHAR (255) NOT NULL,
  'userStatus' BOOLEAN NOT NULL,
  'date' TIMESTAMP,
  PRIMARY KEY (id)
);

CREATE TABLE class2 (
  'id' INT NOT NULL AUTO_INCREMENT,
  'userName' VARCHAR (255) NOT NULL,
  'userStatus' BOOLEAN NOT NULL,
  'date' TIMESTAMP,
  PRIMARY KEY (id)
);

CREATE TABLE class2 (
  'id' INT NOT NULL AUTO_INCREMENT,
  'userName' VARCHAR (255) NOT NULL,
  'userStatus' BOOLEAN NOT NULL,
  'date' TIMESTAMP,
  PRIMARY KEY (id)
);
