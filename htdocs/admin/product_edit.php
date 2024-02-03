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
<body style="background-image: url(../styles/gif/matthew-harris-edwards-lightning-flashes.gif); background-size: cover; background-repeat: no-repeat;" >

        <a href="admin.php">
            <img height="20px" style="padding: 10px; filter: invert(100%)" src="https://cdn.onlinewebfonts.com/svg/download_349454.png">
        </a>

<form action="vendor/create.php" method="post">
    <h3 style=" color: white">Add new product</h3>
    <p>Title</p>
    <input type="text" name="title">
    <p>Image</p>
    <input type="text" name="image">
    <p>Price</p>
    <input type="number" name="price"> <br> <br>
    <button type="submit">Add new product</button>
</form>
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Category</th>

    </tr>
    <tr><?php
        $select = "SELECT * FROM products";
        $stmt = $dbh->query($select);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($products as $product) {;
        ?>
    <tr>
        <td><?= $product['id']?></td>
        <td><?= $product['title'] ?></td>
        <td><?= $product['price']."$"?></td>
        <td><?= $product['image'] ?></td>
        <td> <?= $product['category']?> </td>


        <td class="action"><a href="update.php?id=<?= $product['id'] ?>">Update</a></td>
        <td class="action"><a href="vendor/delete.php?id=<?= $product['id'] ?>">Delete</a></td>
    </tr>
    <?php
    }
    ?>
</table>
</body>

</html>