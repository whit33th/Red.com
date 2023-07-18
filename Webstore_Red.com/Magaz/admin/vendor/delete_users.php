<?php

global $connect;
require_once '../../config/config.php';

$id = $_GET['id'];
try {
    $deleteQuery = "DELETE FROM users WHERE id = :id";
    $deleteStmt = $dbh->prepare($deleteQuery);
    $deleteStmt->bindParam(':id', $id, PDO::PARAM_INT);
    $deleteStmt->execute();

    header('Location: ../user_edit.php');
} catch (PDOException $e) {

    echo "Wystąpił błąd podczas usuwania użytkownika: " . $e->getMessage();

}
?>