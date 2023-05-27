
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
CREATE TABLE customer (
    id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    image VARCHAR(25),
    name VARCHAR(255),
    password VARCHAR(255),
    phone INT(5),
    email VARCHAR(255)
);



CREATE TABLE admin (
    id INT(2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    image VARCHAR(25),
    name VARCHAR(255),
    password VARCHAR(255),
    phone INT(5),
    email VARCHAR(255)
);

CREATE TABLE orders(
     id INT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
     order_date date,
     totalprice int(11),
     customer_id int(5),
     foreign key(customer_id) references customer(id)
);

CREATE TABLE order_product(
    id int(5) not null primary key AUTO_INCREMENT,
    order_id int(5),
    product_id int(5),
    num_ordered int(10),
    quoted_price int(10),
    foreign key(order_id) references orders(id),
    foreign key(product_id) references product(id)
);