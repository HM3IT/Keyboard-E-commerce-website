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
