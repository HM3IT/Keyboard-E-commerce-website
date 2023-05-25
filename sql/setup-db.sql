
CREATE DATABASE e_commerce_website;

USE e_commerce_website;
CREATE TABLE product (
    id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    description VARCHAR(255),
    price INT(5),
    quantity INT(5),
    image VARCHAR(255),
    category VARCHAR(25)
);

--  creating USER table with 6 columns
CREATE TABLE User (
    id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    image VARCHAR(25),
    name VARCHAR(255),
    password VARCHAR(255),
    phone INT(5),
    email VARCHAR(255)
);



CREATE TABLE Admin (
    id INT(2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    image VARCHAR(25),
    name VARCHAR(255),
    password VARCHAR(255),
    phone INT(5),
    email VARCHAR(255)
);
