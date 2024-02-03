<?php

require_once '../config/config.php';

$select = "SELECT * FROM users WHERE id = :id";

$updateUserStmt = $dbh->prepare($select);
$updateUserStmt->bindParam(':id', $_GET['id'], PDO::PARAM_STR);
$updateUserStmt->execute();

$user = $updateUserStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <link rel="stylesheet" href="../styles/css/styles.css">
    <link rel="stylesheet" href="../styles/css/login.css">
</head>
<body>
<a href="user_edit.php">
    <img height="20px" style="padding: 10px; filter: invert(100%)" src="https://cdn.onlinewebfonts.com/svg/download_349454.png">
</a>
<form action="vendor/update_users.php" method="post">
    <h3 style="color: white">Update User</h3>
    <input type="text" name="id" value="<?= $user[0]['id'] ?>">
    <p>Name</p>

        <input type="text" name="username" value="<?= $user[0]['username'] ?>">

    <p>Password</p>
        <input type="password" name="password" value="<?= $user[0]['password'] ?>">
    <p>Email</p>
        <input type="email" name="email" value="<?= $user[0]['email'] ?>">
    <br>
        <button type="submit"> Update </button>
    </br>
</form>
</body>
</html>