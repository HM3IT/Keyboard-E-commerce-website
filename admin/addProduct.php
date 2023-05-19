<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/addProduct.css">
</head>

<body>
    <h2 class="title">Add product</h2>
    <form id="add-product" action="controller/product_controller.php" method="post" enctype="multipart/form-data">
        <label for="name">Enter your name</label>
        <input type="text" name="name" id="name">
        <label for="category">Category:</label>
        <select id="category" name="category">
            <option selected value="summer clothes">Summer Clothes</option>
            <option value="rainy clothes">Rainy Clothes</option>
            <option value="winter clothes">Winter Clothes</option>
        </select>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="100" value="1">
        <label for="fileToUpload">Select image to upload:</label>
        <input type="file" name="image" id="fileToUpload">
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="submit" name="add-product-submit">
    </form>
</body>

</html>