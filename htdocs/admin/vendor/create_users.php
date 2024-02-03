<?php

require_once '../../config/config.php';

$name = $_POST['name'];
$password = password_hash($_POST["password"], PASSWORD_ARGON2ID);
$email = $_POST['email'];

try {
    $insertQuery = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
    $insertStmt = $dbh->prepare($insertQuery);
    $insertStmt->bindParam(':username', $name, PDO::PARAM_STR);
    $insertStmt->bindParam(':password', $password, PDO::PARAM_STR);
    $insertStmt->bindParam(':email', $email, PDO::PARAM_STR);
    $insertStmt->execute();

    header('Location: ../user_edit.php');
} catch (PDOException $e) {
    echo "Wystąpił błąd podczas dodawania użytkownika: " . $e->getMessage();
}

?>
