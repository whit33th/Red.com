<?php

require_once '../../config/config.php';

$id = $_POST['id'];
$title = $_POST['title'];
$image = $_POST['image'];
$price = $_POST['price'];

try {

    $updateQuery = "UPDATE products SET title = :title, price = :price, image = :image WHERE id = :id";

    $updateStmt = $dbh->prepare($updateQuery);
    $updateStmt->bindParam(':title', $title, PDO::PARAM_STR);
    $updateStmt->bindParam(':price', $price, PDO::PARAM_INT);
    $updateStmt->bindParam(':image', $image, PDO::PARAM_STR);
    $updateStmt->bindParam(':id', $id, PDO::PARAM_INT);
    $updateStmt->execute();

    header('Location: ../product_edit.php');
    exit();
} catch (Exception $e) {
    echo "Wystąpił błąd podczas usuwania użytkownika: " . $e->getMessage();
}
