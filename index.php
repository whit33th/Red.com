
<?php

session_start();
if(!isset($_GET['category'])){
        header("Location: index.php?category=Shoes");
    }
else{
    $category = $_GET['category'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>RED</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/css/styles.css">
    <link rel="stylesheet" href="styles/css/news.css">
    <script src="script.js"></script>
</head>

<body style="background-color: rgb(246, 246, 246);">
<div class="content">
<?php include 'html/header.php'; ?>
<main>
    <div class="shop">
    <div class="category">

        <?php
        require_once "config/config.php";

        $stmt = $dbh->prepare("SELECT name FROM category");

        $stmt->execute();

        $listCategories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($listCategories as $listCategory){
        ?>
        <a href="index.php?action=on&category=<?= $listCategory['name'] ?>" class="category-item"><?= $listCategory['name'] ?></a>
        <?php }?>
    </div>
    <section>

            <h2><?=$category?></h2>
        <div class="hr">
        </div>
        <div class="products ">
            <?php

            $stmt = $dbh->prepare("SELECT * FROM products WHERE category = :category");
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->execute();

            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($products as $product) {
            ?>
            <a href="html/product_form.php?id=<?=$product['id']?>">
                <div class="product">
                    <div class="product_img">
                        <img class="index_product_img" src="<?= $product['image']?>">

                    </div>

                    <div class="product-fast-info">


                        <p class="season smaller"><?=$product['season']?></p>

                        <h3><?= $product['title']?></h3>
                        <div style="display: flex ; align-items: center">


                            <p class="price"><?=$product['price']?> zł</p>

                        </div>
                    </div>

                </div>

            </a>
                <?php
            }
            ?>
    </section>
        </div>

    </div>
</main>
<?php include 'html/footer.php'; ?>

<img src="https://cdn-icons-png.flaticon.com/512/55/55008.png" onclick="scrollToTop()" id="scrollToTopBtn" class="scroll-to-top-button">
</div>


</body>

</html>