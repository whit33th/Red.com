<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>RED</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles_elements/css/styles.css">
    <link rel="stylesheet" href="../styles_elements/css/login.css">
</head>

<body>
    <header id="header">
        <div class="header-menu">
            <a href="../index.php"><img id="logo" src="https://logos-world.net/wp-content/uploads/2022/01/Playboi-Carti-Emblem.png"></a>
            <div class="header-menu-item "><a href="News.php">News</a> </div>
            <div class="header-menu-item"><a href="Sales.php">Sales
                </a> </div>
            <div class="header-menu-item "><a href="FAQ.php">FAQ</a> </div>
            <div class="header-menu-item "><a href="Contacts.php">Contacts</a> </div>
            <div class="account"><a href="user_page.php"><img src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png"></a>
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
            </div>
        </div>
    </header>
    <main>
        <div class="centered-div">  
            <div class="accordion">
            <h3 style="font-size: 30px;">The website is under construction</h3>
        </div>
    </main>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-copyright">©&nbsp;2023 Red.com</div>
        </div>
    </footer>
</body>


</html>