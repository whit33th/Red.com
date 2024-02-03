<?php

require_once '../../config/config.php';

$id = $_POST['id'];
$name = $_POST['username'];
$password = password_hash($_POST["password"], PASSWORD_ARGON2ID);
$email = $_POST['email'];

try {
    $updateQuery = "UPDATE `users` SET `username` = :username, `password` = :password, `email` = :email WHERE `id` = :id";
    $updateStmt = $dbh->prepare($updateQuery);
    $updateStmt->bindParam(':username', $name, PDO::PARAM_STR);
    $updateStmt->bindParam(':password', $password, PDO::PARAM_STR);
    $updateStmt->bindParam(':email', $email, PDO::PARAM_STR);
    $updateStmt->bindParam(':id', $id, PDO::PARAM_INT);
    $updateStmt->execute();

    header('Location: ../user_edit.php');
} catch (Exception $e) {

    echo "Wystąpił błąd podczas aktualizacji danych: " . $e->getMessage();

}

?>