<?php
session_start();

require_once "../config/config.php";

if(isset($_GET['action']) && $_GET['action']=="add"){

    $id=intval($_GET['id']);

    if(isset($_SESSION['cart'][$id])){

        $_SESSION['cart'][$id]['quantity']++;
        header("Location: product_form.php?id=$id");
        exit();
    }else{

        $stmt = $dbh->query("SELECT * FROM products WHERE id = $id");

        if($stmt->rowCount() == 1){
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['cart'][$row[0]['id']]=array(
                "quantity" => 1,
                "price" => $row[0]['price']
            );
            header("Location: product_form.php?id=$id");
            exit();
        }else{
            echo("ERerere");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>RED</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles_elements/css/styles.css">
    <link rel="stylesheet" href="../styles_elements/css/product.css">
</head>

<body>
<header id="header">
    <div class="header-menu">
        <a href="../index.php"><img id="logo"
                                    src="https://logos-world.net/wp-content/uploads/2022/01/Playboi-Carti-Emblem.png"></a>
        <div class="header-menu-item "><a href="News.php">News</a> </div>
        <div class="header-menu-item"><a href="Sales.php">Sales</a> </div>
        <div class="header-menu-item "><a href="FAQ.php">FAQ</a> </div>
        <div class="header-menu-item "><a href="Contacts.php">Contacts</a> </div>
        <div class="account"><a href="user_page.php"><img
                        src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png"></a> </div>
        <div class="total">
            <a href="cart_form.php">
                <img src="https://cdn-icons-png.flaticon.com/512/1374/1374128.png">
                <?php
                $totalQuantity = 0;
                if(isset($_SESSION['cart'])){
                    foreach($_SESSION['cart'] as $item){
                        $totalQuantity += $item['quantity'];
                    }
                }
                echo $totalQuantity;
                ?>
            </a>
        </div>
    </div>
</header>
<main>
    <div class="category">
        <?php

        $stmt = $dbh->prepare("SELECT name FROM categoty");

        $stmt->execute();

        $listCategorys = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($listCategorys as $listCategory){
            ?>
            <a href="../index.php?category=<?= $listCategory['name'] ?>" class="category-item"><?= $listCategory['name'] ?></a>
        <?php }?>

    </div>
    <div class="product-border">
        <?php
        $productid = $_GET['id'];

        $stmt = $dbh->prepare("SELECT * FROM image WHERE id = :id");
        $stmt->bindParam(':id', $productid, PDO::PARAM_STR);
        $stmt->execute();

        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($images as $image) {
        ?>

        <div class="product-pictures">
            <div class="main-photo ">
                <img class="main-photo"
                     src="<?= $image['image_1']?>">
            </div>
            <div class="gallery">
                <div class="gallery-container">
                    <div class="gallery-images">
                        <img src="<?= $image['image_1']?>"
                             alt="Photo 0">
                        <img src="<?= $image['image_2']?>"
                             alt="Photo 1">
                        <img src="<?= $image['image_3']?>"
                             alt="Photo 2">
                        <img src="<?= $image['image_4']?>"
                             alt="Photo 3">
                        <img src="<?= $image['image_5']?>"
                             alt="Photo 1">
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        $select = "SELECT * FROM products WHERE id = :id";

        $checkProductStmt = $dbh->prepare($select);
        $checkProductStmt->bindParam(':id', $productid, PDO::PARAM_STR);
        $checkProductStmt->execute();

        $products = $checkProductStmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($products as $product){
        ?>
        <div class="product-info">
            <div class="product-name">
                <h3><?=$product['title']?></h3>
                <p><?=$product['price']?> zł</p>
            </div>
            <div class="description">
                <p><?=$product['description']?></p>
            </div>

            <div class="product-size">
                <?php
                $sizeString = $product['size'];
                $sizes = explode(',', $sizeString);
                foreach ($sizes as $size) {
                    echo '<p>'.trim($size).'</p>';
                }
                ?>
            </div>
            <?php
            }
            ?>
            <div class="buttons">
                <a href="product_form.php?action=add&id=<?=$productid?>">
                    <button class="buy-add button-buy">
                        <p>Buy</p>
                    </button>
                </a>
                <button class="buy-add button-add">
                    <p>Add</p>
                </button>
            </div>
        </div>
    </div>
    <div> </div>
</main>
<footer class="footer">
    <div class="footer-content">
        <div class="footer-copyright">©&nbsp;2023 Red.com</div>
    </div>
</footer>
<script src="../script.js"></script>
</body>

</html>