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
    <meta charset="UTF-8">
    <title>RED</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles_elements/css/styles.css">
</head>

<body>
<header id="header">
    <div class="header-menu">
        <a href="index.php"><img id="logo" src="https://logos-world.net/wp-content/uploads/2022/01/Playboi-Carti-Emblem.png"></a>
        <div class="header-menu-item "><a href="views/News.php">News</a> </div>
        <div class="header-menu-item"><a href="views/Sales.php">Sales</a> </div>
        <div class="header-menu-item "><a href="views/FAQ.php">FAQ</a> </div>
        <div class="header-menu-item "><a href="views/Contacts.php">Contacts</a> </div>
        <div class="account"><a href="views/user_page.php"><img src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png"></a>
        </div>
        <div class="total">
            <a href="views/cart_form.php">
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
        require_once "config/config.php";

        $stmt = $dbh->prepare("SELECT name FROM categoty");

        $stmt->execute();

        $listCategorys = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($listCategorys as $listCategory){
        ?>
        <a href="index.php?action=on&category=<?= $listCategory['name'] ?>" class="category-item"><?= $listCategory['name'] ?></a>
        <?php }?>
        <a href="#Polo" class="category-item">POLO</a>
        <a href="#Shirts" class="category-item">SHIRTS</a>
        <a href="#Pajamas" class="category-item">PAJAMAS</a>
    </div>
    <section>
        <h2><?=$category ?></h2>
        <div class="products ">
            <?php

            $stmt = $dbh->prepare("SELECT * FROM products WHERE category = :category");
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->execute();

            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($products as $product) {
            ?>
            <a href="views/product_form.php?id=<?=$product['id']?>">
                <div class="product">
                    <img src="<?= $product['image']?>">
                    <h3><?= $product['title']?></h3>
                    <p><?=$product['price']?> zł</p>
                </div>
                <?php
                }
                ?>
            </a>

    </section>

</main>
<button onclick="scrollToTop()" id="scrollToTopBtn" class="scroll-to-top-button">▲</button>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-copyright">©&nbsp;2023 Red.com</div>
    </div>

</footer>
<script>
    var header = document.getElementById('header');
    var prevScrollPos = window.pageYOffset;
    window.onscroll = function () {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollPos > currentScrollPos || currentScrollPos < 35) {
            header.style.transform = 'translateY(0)';
        } else {
            header.style.transform = 'translateY(-100%)';
        }
        prevScrollPos = currentScrollPos;
    };
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    window.onscroll = function () { toggleScrollToTopButton() };
    function toggleScrollToTopButton() {
        var scrollToTopBtn = document.getElementById("scrollToTopBtn");
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 400) {
            scrollToTopBtn.classList.add("show");
        } else {
            scrollToTopBtn.classList.remove("show");
        }
    }
</script>
</body>

</html>