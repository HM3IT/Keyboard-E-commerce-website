<?php
require "../../dao/connection.php";
$valid_file_extensions = array("png", "jpeg", "jpg", "svg", "webp", "jfif");
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
    $discount = $_POST["discount"];
    $quantity =  $_POST["quantity"];
    $description =  $_POST["description"];
    $category_id = $_POST["category_id"];
    $today = date("Y-m-d");


    $get_category_sql = "SELECT * FROM category WHERE id = $category_id";
    $category_dataset = $connection->query($get_category_sql);
    $data =  $category_dataset->fetch();
    $category = $data["category_name"];
    if (!empty($_FILES["primary_img"]["tmp_name"])) {
        $image_file_name = $_FILES["primary_img"]["name"];
        $image_file_size = $_FILES["primary_img"]["size"];
        $image_file_tmp =  $_FILES["primary_img"]["tmp_name"];
        $image_file_type = $_FILES["primary_img"]["type"];

        $file_extension = strtolower(pathinfo($image_file_name, PATHINFO_EXTENSION));

        if (!in_array($file_extension, $valid_file_extensions)) {

            echo "<script> 
            alert('The image file " . $file_extension . " extension is not supported');
            location.href = '../add_product.php'; 
            </script>";
            return;
        }
        // allowed up to 3MB 
        if ($image_file_size >= 1024 * 1024 * 3) {

            echo "<script> 
                    alert('The image file size is too big');
                     location.href = '../add_product.php'; 
                    </script>";
            return;
        }
        // path: uploaded image files 
        $target_img_dir = "../../images/Products/$category/";

        if (!is_dir($target_img_dir)) {
            // Create the directory if it doesn't exist
            mkdir($target_img_dir, 0777, true);
        }

        $target_file = $target_img_dir . basename($image_file_name);
        if (move_uploaded_file($image_file_tmp, $target_file)) {
        } else {
            echo "target not found";
        }
    }

    $update_product_sql;
    if (isset($image_file_name)) {

    }
    $update_product_sql = "UPDATE product SET name = '$name', description = '$description', added_date ='$today', price ='$price', discount ='$discount', quantity = '$quantity', category_id = '$category_id'  WHERE id = '$id'";

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

////////////////////

function processImageFile($imageFile) {
    $valid_file_extensions = array("jpg", "jpeg", "png", "gif");

    $image_file_name = $imageFile["name"];
    $image_file_size = $imageFile["size"];
    $image_file_tmp = $imageFile["tmp_name"];
    $image_file_type = $imageFile["type"];

    $file_extension = strtolower(pathinfo($image_file_name, PATHINFO_EXTENSION));

    if (!in_array($file_extension, $valid_file_extensions)) {
        echo "<script> 
            alert('The image file " . $file_extension . " extension is not supported');
            location.href = '../add_product.php'; 
            </script>";
        return;
    }

    // allowed up to 3MB 
    if ($image_file_size >= 1024 * 1024 * 3) {
        echo "<script> 
            alert('The image file size is too big');
            location.href = '../add_product.php'; 
            </script>";
        return;
    }

    // path: uploaded image files 
    $target_img_dir = "../../images/Products/$category/";

    if (!is_dir($target_img_dir)) {
        // Create the directory if it doesn't exist
        mkdir($target_img_dir, 0777, true);
    }

    $target_file = $target_img_dir . basename($image_file_name);
    if (move_uploaded_file($image_file_tmp, $target_file)) {
        // Image file successfully uploaded
        // Perform further processing or database operations if needed
    } else {
        echo "Target not found";
    }
}
///////////////////






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
        $stmt =   $connection->query($insert_product_sql);
        echo '<script> 
            alert("Successfully added the product");        
            location.href = "../product_manager.php"; 
            </script>';
    } else {
        echo "target not found";
    }
}

function processImageFile($imageFile) {
    $valid_file_extensions = array("jpg", "jpeg", "png", "gif");

    $image_file_name = $imageFile["name"];
    $image_file_size = $imageFile["size"];
    $image_file_tmp = $imageFile["tmp_name"];
    $image_file_type = $imageFile["type"];

    $file_extension = strtolower(pathinfo($image_file_name, PATHINFO_EXTENSION));

    if (!in_array($file_extension, $valid_file_extensions)) {
        echo "<script> 
            alert('The image file " . $file_extension . " extension is not supported');
            location.href = '../add_product.php'; 
            </script>";
        return;
    }

    // allowed up to 3MB 
    if ($image_file_size >= 1024 * 1024 * 3) {
        echo "<script> 
            alert('The image file size is too big');
            location.href = '../add_product.php'; 
            </script>";
        return;
    }

    // path: uploaded image files 
    $target_img_dir = "../../images/Products/$category/";

    if (!is_dir($target_img_dir)) {
        // Create the directory if it doesn't exist
        mkdir($target_img_dir, 0777, true);
    }

    $target_file = $target_img_dir . basename($image_file_name);
    if (move_uploaded_file($image_file_tmp, $target_file)) {
        // Image file successfully uploaded
        // Perform further processing or database operations if needed
    } else {
        echo "Target not found";
    }
}
