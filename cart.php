<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Cart</h1>
    <a href="index.php">В каталог</a>
    <?php
        $result = array();
        foreach($_SESSION["cart"] as $block){
            foreach ($block as $product){
                if(isset($result[$product['id']])){
                    $result[$product['id']]["count"] += 1;
                }
                else{
                    $result[$product['id']] = array("id" => $product['id'], "name" => $product['name'], 'count' => 1, 'price' => $product['price']);
                }
            }
        }

        foreach ($result as $product){
            echo "<div class='cart-product'>
                    <p>Название: ".$product['name']."</p>
                    <p>Количество: ".$product['count']."</p>
                    <p>Цена: ".$product['price'] * $product['count']."</p>
                  </div>";
        }
    ?>

    <a class="order-btn" href="sendOrder.php">Оформить заказ</a>

<style>
    .cart-product{
        width: 200px;
        border: 1px solid black;
        margin: 10px auto;
        display: flex;
        align-items: center;
        flex-direction: column;
        border-radius: 5px;
    }

    .order-btn{
        display: block;
        margin: 30px auto 0;
        text-align: center;
        width: 150px;
        background: chocolate;
        color: white;
        text-decoration: none;
        font-size: 18px;
        padding: 3px;
        border-radius: 5px;
    }
</style>
</body>
</html>
