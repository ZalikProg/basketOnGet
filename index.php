<?php
global $pdo;
    require 'connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basket</title>
</head>
<body>
    <h1>Catalog</h1>
    <a href="cart.php">В корзину</a>
    <?php
        $sql = 'SELECT * FROM `products`';
        $query = $pdo->prepare($sql);
        $query->execute();

        while ($product = $query->fetch(PDO::FETCH_OBJ)){
            echo "<div class='product'>
                    <p>".$product->name."</p>
                    <p>".$product->price."руб</p>
                    <a href='basket.php?id=".$product->id."'>Купить</a>
                  </div>";
        }
    ?>

    <style>
        .product{
            margin: 50px auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 200px;
            border: 1px solid grey;
            border-radius: 5px;
        }
    </style>
</body>
</html>