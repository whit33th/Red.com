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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>RED</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/css/styles.css">
    <link rel="stylesheet" href="../styles/css/product.css">
    <link rel="stylesheet" href="../styles/css/news.css">
</head>

<body>
<header id="header">
    <div class="header-menu">
        <div class="ten-proc-div">
            <a href="../index.php"><img id="logo" src="https://logos-world.net/wp-content/uploads/2022/01/Playboi-Carti-Emblem.png"></a>
        </div>
        <div class="eighty-proc-div"><input class="main_input"></div>
        <div class="ten-proc-div"><div class="account"><a href="user_page.php"><img src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png"></a>
            </div>
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
            </div></div>




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
                <div class="but_sec1">
                    <a href="product_form.php?action=add&id=<?=$productid?>">
                        <button class="buy-add button-buy">
                            <p>Buy</p>
                        </button>
                </div>

                </a>

                <button class="buy-add button-add">
                    <img id="like" height="20px" class="add_to_favorite" src="https://www.iconpacks.net/icons/2/free-heart-icon-3510-thumb.png">
                </button>
            </div>
            

            </div>
        </div>
    </div>
    <div> </div>
</main>
<footer class="footer">
    <div class="footer-contect">


        <div class="help-link">
            <a href="News.php">News</a>
            <a href="Sales.php">Sales</a>
            <a href="FAQ.php">FAQ</a>
            <a href="Contacts.php">Contacts</a>
        </div>
        <div class="help-link">

        </div>
        <div class="footer_less_space">
            <div class="flex help-link">
                <div class="gap-ten">
                    <a><img class="ico-inst" src="https://static-00.iconduck.com/assets.00/instagram-icon-512x512-ggh8x3cn.png"></a>
                    <a><img class="ico-inst" src="https://cdn1.iconfinder.com/data/icons/social-media-set-for-free/32/facebook-512.png"></a>
                    <a><img class="ico-inst" src="https://cdn1.iconfinder.com/data/icons/social-media-set-for-free/32/twitter-512.png"></a>
                    <a><img class="ico-inst" src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png"></a>
                </div>
                <p>Patment:</p>
                <div class="gap-ten">
                    <div class="icon-container">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/1280px-Mastercard-logo.svg.png" alt="Иконка">

                    </div>
                    <div class="icon-container">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2560px-Visa_Inc._logo.svg.png" alt="Иконка">
                    </div>
                </div>
            </div>

            <img id="krest" src="https://cdn141.picsart.com/0751c4aa-a6c2-438a-9dae-140faae48c68/373141434044211.png">
            <div class="footer-copyright"><p>©&nbsp;2023 Red.com</p></div>
        </div>




    </div>
</footer>
<script src="../script.js"></script>
</body>

</html>