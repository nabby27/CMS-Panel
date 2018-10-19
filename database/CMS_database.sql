DROP DATABASE IF EXISTS CMS;

CREATE DATABASE CMS CHARACTER SET utf8 COLLATE utf8_general_ci;

use CMS;
SET SQL_SAFE_UPDATES = 0;


CREATE TABLE CMS_CATEGORIES (
  category_father_id BIGINT DEFAULT NULL,
  category_id BIGINT NOT NULL AUTO_INCREMENT,
  name varchar(200) DEFAULT NULL,
  PRIMARY KEY (category_id)
);

INSERT INTO CMS_CATEGORIES (category_father_id, category_id, name) VALUES 
(1, 1, 'ninguna');

CREATE TABLE CMS_ARTICLES (
  article_id BIGINT NOT NULL AUTO_INCREMENT,
  name varchar(200) DEFAULT NULL,
  description text(600) DEFAULT NULL,
  picture varchar(200) DEFAULT NULL,
  category_id BIGINT NOT NULL,
  PRIMARY KEY (article_id),
  FOREIGN KEY (category_id) References CMS_CATEGORIES(category_id) ON DELETE CASCADE
);

CREATE TABLE CMS_PICTURES (
  picture_id BIGINT NOT NULL AUTO_INCREMENT,
  picture varchar(200) DEFAULT NULL,
  description varchar(600) DEFAULT NULL,
  article_id BIGINT NOT NULL,
  PRIMARY KEY (picture_id),
  FOREIGN KEY (article_id) References CMS_ARTICLES(article_id) ON DELETE CASCADE
);

CREATE TABLE CMS_LINKS (
  link_id BIGINT NOT NULL AUTO_INCREMENT,
  name varchar(200) DEFAULT NULL,
  link varchar(200) DEFAULT NULL,
  article_id BIGINT NOT NULL,
  PRIMARY KEY (link_id),
  FOREIGN KEY (article_id) References CMS_ARTICLES(article_id) ON DELETE CASCADE
); 

CREATE TABLE CMS_TYPE_OF_USERS (
  type_id BIGINT NOT NULL AUTO_INCREMENT,
  type_user varchar(100) DEFAULT NULL,
  PRIMARY KEY (type_id)
);

INSERT INTO CMS_TYPE_OF_USERS (type_id, type_user) VALUES
(1, 'administrador'),
(2, 'usuario');

CREATE TABLE CMS_USERS (
  user_id BIGINT NOT NULL AUTO_INCREMENT,
  name varchar(200) NOT NULL,
  surname varchar(300) DEFAULT NULL,
  email varchar(200) DEFAULT NULL,
  telephon int(100) DEFAULT NULL,
  address varchar(200) DEFAULT NULL,
  type_id BIGINT DEFAULT 2,
  PRIMARY KEY (user_id),
  FOREIGN KEY (type_id) References CMS_TYPE_OF_USERS(type_id) ON DELETE CASCADE
);

CREATE TABLE CMS_AUTH (
  auth_id BIGINT NOT NULL AUTO_INCREMENT,
  user_id BIGINT NOT NULL,
  username varchar(100) NOT NULL, 
  password varchar(200) NOT NULL,
  PRIMARY KEY (auth_id),
  FOREIGN KEY (user_id) References CMS_USERS(user_id) ON DELETE CASCADE
);