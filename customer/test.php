<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="controller/cart_controller.php" method="POST">
        <input type="text" name="id" placeholder="id">
        <input type="text" name="name" placeholder="name">
        <input type="number" name="price" placeholder="price">
        <input type="submit" value="submit" name="add-to-cart">
    </form>
</body>

</html>