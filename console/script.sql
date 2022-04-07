CREATE DATABASE IF NOT EXISTS KGB;

USE KGB;


CREATE TABLE IF NOT EXISTS agent (
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
nom varchar(75) NOT NULL,
prenom varchar(75) NOT NULL,
date_naissance date NOT NULL,
code_identification varchar(50) NOT NULL, UNIQUE KEY (code_identification),
nationalite varchar(50) NOT NULL,
specialite varchar(150) NOT NULL,
created_at datetime NOT NULL,
updated_at datetime

);


CREATE TABLE IF NOT EXISTS cible (
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
nom varchar(75) NOT NULL,
prenom varchar(75) NOT NULL,
date_naissance date NOT NULL,
code_identification varchar(50) NOT NULL, UNIQUE (code_identification),
nationalite varchar(80) NOT NULL

);



CREATE TABLE IF NOT EXISTS  contact (
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
nom varchar(75) NOT NULL,
prenom varchar(75) NOT NULL,
date_naissance date NOT NULL,
code_identification varchar(50) NOT NULL, UNIQUE (code_identification),
nationalite varchar(80) NOT NULL
);



CREATE TABLE IF NOT EXISTS planque (
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
code varchar(80) NOT NULL, UNIQUE KEY code (code),
adresse varchar(255) NOT NULL,
pays varchar(50) NOT NULL,
type varchar(150) NOT NULL

);



CREATE TABLE IF NOT EXISTS mission (
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
titre varchar(75) NOT NULL,
description varchar(255) NOT NULL,
code varchar(150) NOT NULL,
pays varchar(50) NOT NULL,
agent int(11) NOT NULL,
contact int(11) NOT NULL,
planque int(11) NOT NULL,
cible int(11) NOT NULL,
type varchar(150) NOT NULL,
statut varchar(150) NOT NULL,
specialite varchar(150) NOT NULL,
dateDebut date NOT NULL,
dateFin date NOT NULL,

  FOREIGN KEY (agent) REFERENCES agent( id ),
  FOREIGN KEY (contact) REFERENCES contact ( id ),
  FOREIGN KEY (cible) REFERENCES cible( id ),
  FOREIGN KEY (planque) REFERENCES planque( id)
);


CREATE TABLE IF NOT EXISTS administrateur (
                                                id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nom varchar(75) NOT NULL,
  prenom varchar(75) NOT NULL,
  email varchar(80) NOT NULL UNIQUE,
  password varchar(255) NOT NULL,
  role varchar(25) NOT NULL,
  created_at datetime NOT NULL

);

