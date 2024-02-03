<?php
require_once '../config/config.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="../styles/css/styles.css">
    <link rel="stylesheet" href="../styles/css/login.css">
</head>
<body style="background-image: url(../styles/gif/matthew-harris-edwards-lightning-flashes.gif); background-size: cover; background-repeat: no-repeat;">

<a href="admin.php">
    <img height="20px" style="padding: 10px; filter: invert(100%)" src="https://cdn.onlinewebfonts.com/svg/download_349454.png">
</a>

<form action="vendor/create_users.php" method="post">
    <h3 style="color: white">Add new user</h3>
    <p>Name</p>
    <input type="text" name="name">
    <p>Password</p>
    <input type="password" name="password">
    <p>Email</p>
    <input type="email" name="email"> <br> <br>
    <button type="submit">Add new user</button>
</form>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Password</th>
        <th>Email</th>
        <th>User_type</th>
    </tr><?php

    $stmt = $dbh->query("SELECT * FROM users ");

    $users =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($users as $user) {;
        ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['password'] ?></td>
            <td><?= $user['email'] ?></td>
            <td> <?= $user['user_type'] ?> </td>

            <td class="action"><a href="update_users.php?id=<?= $user['id'] ?>">Update</a></td>
            <td class="action"><a href="vendor/delete_users.php?id=<?= $user['id'] ?>">Delete</a></td>
        </tr>
        <?php
    }
    ?>

</table>

</body>
</html>

