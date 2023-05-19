<?php

if (isset($_POST["submit"])) {

    $image_file_name = $_FILES["image"]["name"];
    $image_file_size = $_FILES["image"]["size"];
    $image_file_tmp =  $_FILES["image"]["tmp_name"];
    $image_file_type = $_FILES["image"]["type"];

    $valid_file_extensions = array("png", "jpeg", "jpg", "svg");

    $file_extension = strtolower(pathinfo($image_file_name, PATHINFO_EXTENSION));

    if (!in_array($file_extension, $valid_file_extensions)) {
        echo "No the file extension is not valid";
        if ($image_file_size >= 1024 * 1024) {
?>
            <script>
                alert("File size is too big");
            </script>
<?php
        }
        return;
    }

    echo "Yes, the image is valid";

    $target_img_dir = "../../images/Upload-images/";
    $target_file = $target_img_dir . basename($_FILES["image"]["name"]);

    move_uploaded_file($image_file_tmp, $target_file);
}



if(isset($_POST["add-product-submit"])){
     $name = $_POST["name"];
     $category = $_POST["category"];
     $quantity =  $_POST["quantity"];
     $file_name = $_FILES["image"]["name"];
     $description =  $_POST["description"];

     echo $name;
     echo $category;
     echo $quantity;
     echo $file_name ;
     echo $description;
}
?>