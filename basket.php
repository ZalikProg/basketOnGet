<?php
    session_start();
    require 'connect.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$id]);

    $product = $query->fetch(PDO::FETCH_ASSOC);

    $_SESSION['cart'][$product['name']][] = $product;

    header("Location: ./index.php");
?>
