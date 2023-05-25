<?php
require "../../dao/connection.php";

// removing product form TABLE product
if (isset($_GET["remove_product_id"])) {
    $id = $_GET["remove_product_id"];
    $product_delete_qry = "DELETE FROM product WHERE id =  $id  ";
    // $delete = mysqli_query($connection, $product_delete_qry);
    $stmt =   $connection->query($product_delete_qry);
    header("Location: ../product_manager.php");
    exit;
}

// updating the old product from TABLE product where id (product)
if (isset($_POST["update-product-submit"])) {
    $id = $_POST['id'];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity =  $_POST["quantity"];
    $description =  $_POST["description"];
    $category = $_POST["category"];

   if(!empty($_FILES["product-image"]["tmp_name"])){
    $image_file_name = $_FILES["product-image"]["name"];
    $image_file_size = $_FILES["product-image"]["size"];
    $image_file_tmp =  $_FILES["product-image"]["tmp_name"];
    $image_file_type = $_FILES["product-image"]["type"];
    $valid_file_extensions = array("png", "jpeg", "jpg", "svg", "jfif");
    $file_extension = strtolower(pathinfo($image_file_name, PATHINFO_EXTENSION));


    if (!in_array($file_extension, $valid_file_extensions)) {

        echo "<script> 
             alert('The image file " . $file_extension . " extension is not supported');
             location.href = '../add_product.php'; 
            </script>";
        // allowed up to 3MB 
        if ($image_file_size >= 1024 * 1024 * 3) {

            echo "<script> 
             alert('File size is too big');
             location.href = '../add_product.php'; 
            </script>";
        }
    }
    // path: uploaded image files 
    $target_img_dir = "../../images/Products/$category/";
    $target_file = $target_img_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($image_file_tmp, $target_file)) {
    } else {
        echo "target not found";
    }
   }
    $update_product_sql = "UPDATE product SET name = '$name', price ='$price', category = '$category', quantity = '$quantity', description = '$description' WHERE id = '$id'";
    if ($connection->query($update_product_sql)) {
        echo '<script> 
        alert("Successfully updated the product"); 
        location.href = "../product_manager.php"; 
        </script>';
    } else {
        // Update failed
        echo "Error updating product ";
    }
}
// inserting a new product into TABLE product
if (isset($_POST["add-product-submit"])) {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity =  $_POST["quantity"];
    $description =  $_POST["description"];
    $category = $_POST["category"];

    $image_file_name = $_FILES["image"]["name"];
    $image_file_size = $_FILES["image"]["size"];
    $image_file_tmp =  $_FILES["image"]["tmp_name"];
    $image_file_type = $_FILES["image"]["type"];
    $valid_file_extensions = array("png", "jpeg", "jpg", "svg", "jfif");
    $file_extension = strtolower(pathinfo($image_file_name, PATHINFO_EXTENSION));


    if (!in_array($file_extension, $valid_file_extensions)) {

        echo "<script> 
             alert('The image file " . $file_extension . " extension is not supported');
             location.href = '../add_product.php'; 
            </script>";
        // allowed up to 3MB 
        if ($image_file_size >= 1024 * 1024 * 3) {

            echo "<script> 
             alert('File size is too big');
             location.href = '../add_product.php'; 
            </script>";
        }
    }
    // path: uploaded image files 
    $target_img_dir = "../../images/Products/$category/";
    $target_file = $target_img_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($image_file_tmp, $target_file)) {
        $insert_product_sql = "INSERT INTO product (
            name,
            description,
            price,
            quantity,
            image,
            category
        )
    VALUES (
            '$name',
            '$description',
            $price,
            $quantity,
            '$image_file_name',
            '$category'
        );";
        if ($connection) {
            echo "Know";
        } else {
            echo "No";
        }
        $stmt =   $connection->query($insert_product_sql);
        echo '<script> 
            alert("Successfully added the product"); 
            
            location.href = "../product_manager.php"; 
            </script>';
    } else {
        echo "target not found";
    }
}
