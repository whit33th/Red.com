<?php

global $connect;
require_once '../config/config.php';

$select = "SELECT * FROM products WHERE id = :id";

$updateProductStmt = $dbh->prepare($select);
$updateProductStmt->bindParam(':id', $_GET['id'], PDO::PARAM_STR);
$updateProductStmt->execute();
$product = $updateProductStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <link rel="stylesheet" href="../styles_elements/css/styles.css">
    <link rel="stylesheet" href="../styles_elements/css/login.css">
</head>
<body>
<a href="product_edit.php">
    <img height="20px" style="padding: 10px; filter: invert(100%)" src="https://cdn.onlinewebfonts.com/svg/download_349454.png">
</a>

<form action="vendor/update.php" method="post">
    <h3 style="color: white">Update Product</h3>
    <input type="hidden" name="id" value="<?= $product[0]['id'] ?>">
    <p>Title</p>
    <input type="text" name="title" value="<?= $product[0]['title'] ?>">
    <p>Image</p>
    <input type="text" name="image" value="<?= $product[0]['image'] ?>">
    <p>Price</p>
    <input type="number" name="price" value="<?= $product[0]['price'] ?>">
    <br>
    <button type="submit">Update</button>
    </br>
</form>
</body>
</html>