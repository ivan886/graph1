create database trip;
use trip;

DROP TABLE IF EXISTS files;

CREATE TABLE files (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) DEFAULT NULL,
  type varchar(200) DEFAULT NULL,
  drive_id varchar(200) DEFAULT NULL,
  PRIMARY KEY (id)
) ;

DROP TABLE IF EXISTS persons;
CREATE TABLE persons (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) DEFAULT NULL,
  lastname varchar(100) DEFAULT NULL,
  telephone int(11) DEFAULT NULL,
  email varchar(300) DEFAULT NULL,
  imei varchar(100) DEFAULT NULL,
  created datetime DEFAULT NULL,
  updated datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ;

DROP TABLE IF EXISTS categories;
CREATE TABLE categories (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ;


DROP TABLE IF EXISTS sites;
CREATE TABLE sites (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_category int(11),
  name varchar(100) DEFAULT NULL,
  description varchar(2000) DEFAULT NULL,
  lat double DEFAULT NULL,
  lon double DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_category) REFERENCES categories(id)  ON DELETE CASCADE
  ) ;



DROP TABLE IF EXISTS visits;
CREATE TABLE visit (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_site int(11) DEFAULT NULL,
  id_person  int(11) DEFAULT NULL,
  created datetime DEFAULT NULL,
      
  PRIMARY KEY (id)	,
  FOREIGN KEY (id_site) REFERENCES sites(id)  ON DELETE CASCADE,
  FOREIGN KEY (id_person)  REFERENCES persons(id)  ON DELETE CASCADE
) ;


DROP TABLE IF EXISTS files_site;
CREATE TABLE files_site (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_site int(11) DEFAULT NULL,
  id_file int(11) DEFAULT NULL,
  created datetime DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_site) REFERENCES sites(id)  ON DELETE CASCADE,
  FOREIGN KEY (id_file)  REFERENCES files(id)  ON DELETE CASCADE
) ;


