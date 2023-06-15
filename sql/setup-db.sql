CREATE DATABASE e_commerce_website;
USE e_commerce_website;
CREATE TABLE product (
    id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    description VARCHAR(255),
    added_date VARCHAR(255),
    price INT(5),
    discount INT(3),
    quantity INT(5),
    sold_quantity INT(255),
    category_id INT(3),
    foreign key(category) references category(id)
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
    ship_address VARCHAR(255),
    additional_request VARCHAR(255),
    payment_method VARCHAR(255),
    transaction_slip VARCHAR(255),
    order_aproval VARCHAR(255),
    delivery_status VARCHAR(255),
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
CREATE TABLE category(
    id int(3) not null primary key AUTO_INCREMENT,
    category_name VARCHAR(255)
);
CREATE TABLE images (
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    product_id INT(10),
    FOREIGN KEY (product_id) REFERENCES product(id),
    primary_img VARCHAR(255),
    additional_image1 VARCHAR(255),
    additional_image2 VARCHAR(255),
    additional_image3 VARCHAR(255),
    additional_image4 VARCHAR(255)
);
CREATE TABLE product_review(
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    product_id INT(10),
    customer_id INT(5),
    FOREIGN KEY (product_id) REFERENCES product(id),
    FOREIGN KEY (customer_id) REFERENCES customer(id),
    rating INT(10),
    comments VARCHAR(255),
    created_date VARCHAR(50)
);

ALTER TABLE orders
ADD COLUMN ship_address VARCHAR(500);