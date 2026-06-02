<?php
include "config.php";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected successfully";

    $Query = "SELECT * FROM products";
    $stmt = $pdo->query($Query);
    $products = $stmt->fetchAll();
    print_r($products);


} catch (PDOException $e) {
    echo "connection failed: " . $e->getMessage();
}
?>








