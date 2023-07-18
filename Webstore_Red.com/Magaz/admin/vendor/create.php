<?php
require_once '../../config/config.php';

$title = $_POST['title'];
$image = $_POST['image'];
$price = $_POST['price'];

try {
    $insertQuery = "INSERT INTO products (title, price, image) VALUES (:title, :price, :image)";
    $insertStmt = $dbh->prepare($insertQuery);
    $insertStmt->bindParam(':title', $title, PDO::PARAM_STR);
    $insertStmt->bindParam(':price', $price, PDO::PARAM_INT);
    $insertStmt->bindParam(':image', $image, PDO::PARAM_STR);
    $insertStmt->execute();

    header('Location: ../product_edit.php.');
} catch (PDOException $e) {
    echo "Wystąpił błąd podczas dodawania produktu: " . $e->getMessage();
}

?>
?>