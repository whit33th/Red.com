<?php

global $connect;
require_once '../../config/config.php';

$id = $_GET['id'];

try {

    $deleteQuery = "DELETE FROM products WHERE id = :id";
    $deleteStmt = $dbh->prepare($deleteQuery);
    $deleteStmt->bindParam(':id', $id, PDO::PARAM_INT);
    $deleteStmt->execute();

    header('Location: ../product_edit.php');
} catch (PDOException $e) {
    echo "Wystąpił błąd podczas usuwania produktu: " . $e->getMessage();
}
