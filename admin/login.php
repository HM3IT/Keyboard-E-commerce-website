<?php
require "../dao/connection.php";
$get_admin_qry = "SELECT question FROM admin WHERE id='1'";
$dataset = $connection->query($get_admin_qry);
$data = $dataset->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>

    <div class='container'>
        <div class='window'>
            <div class='overlay'></div>

            <div class='content'>
                <form action="./controller/admin_controller.php" method="POST">
                    <div class='welcome'>Login</div>
                    <div class='subtitle'>Please fill the required information to verify the admin authentication</div>

                    <div class='input-fields'>
                        <input type='text' placeholder='Username' name="name" class='input-line full-width' required></input>
                        <input type='text' placeholder='<?php echo $data["question"] ?>' name="answer" class='input-line full-width' required></input>
                        <input type='password' placeholder='Password' name="password" class='input-line full-width' required></input>
                    </div>
                    <div>
                        <input type="submit" class="white-round full-width" name="sign-in-btn" value="sign in">
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>