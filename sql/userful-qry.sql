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