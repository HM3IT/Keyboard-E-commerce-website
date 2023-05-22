
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


-- insert value to the product table 
INSERT INTO product (
        name,
        description,
        price,
        quantity,
        image,
        category
    )
VALUES (
        'Product Name',
        'description',
        19.99,
        100,
        image.png,
        'Category Name'
    );

-- use to reset the id (auto increment) of the table   
Set @autoid :=0;
update product set id = @autoid := (@autoid+1);
alter table product Auto_increment = 1;
