DROP DATABASE IF EXISTS CMS;

CREATE DATABASE CMS CHARACTER SET utf8 COLLATE utf8_general_ci;

use CMS;

CREATE TABLE CATEGORIES (
  category_father_id int(30) DEFAULT NULL,
  category_id int(30) NOT NULL,
  name varchar(50) DEFAULT NULL,
  PRIMARY KEY (category_id)
);

CREATE TABLE ARTICLES (
  article_id int(30) NOT NULL,
  name varchar(100) DEFAULT NULL,
  description text(600) DEFAULT NULL,
  picture varchar(100) DEFAULT NULL,
  category_id int(30) NOT NULL,
  PRIMARY KEY (article_id),
  FOREIGN KEY (category_id) References CATEGORIES(category_id)
);

CREATE TABLE PICTURES (
  picture_id int(30) NOT NULL,
  picture varchar(600) DEFAULT NULL,
  description varchar(600) DEFAULT NULL,
  article_id int(30) NOT NULL,
  PRIMARY KEY (picture_id),
  FOREIGN KEY (article_id) References ARTICLES(article_id)
);

CREATE TABLE LINKS (
  link_id int(30) NOT NULL,
  name varchar(100) DEFAULT NULL,
  link varchar(600) DEFAULT NULL,
  article_id int(30) NOT NULL,
  PRIMARY KEY (link_id),
  FOREIGN KEY (article_id) References ARTICLES(article_id)
); 

CREATE TABLE TYPE_OF_USERS (
  type_id int(30) NOT NULL,
  type_user varchar(50) DEFAULT NULL,
  PRIMARY KEY (type_id)
);

CREATE TABLE USERS (
  user_id varchar(30) NOT NULL,
  name varchar(50) NOT NULL,
  surname varchar(100) DEFAULT NULL,
  email varchar(100) DEFAULT NULL,
  telephon int(100) DEFAULT NULL,
  address varchar(100) DEFAULT NULL,
  password varchar(100) NOT NULL,
  type_id int(30) DEFAULT 2,
  PRIMARY KEY (user_id),
  FOREIGN KEY (type_id) References TYPE_OF_USERS(type_id)
);