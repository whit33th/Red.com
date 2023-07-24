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
            <a href="../index.php"><img id="logo" src="https://logos-world.net/wp-content/uploads/2022/01/Playboi-Carti-Emblem.png" alt=""></a>
            <div class="header-menu-item "><a href="News.php">News</a> </div>
            <div class="header-menu-item"><a href="Sales.php">Sales
                </a> </div>
            <div class="header-menu-item "><a href="FAQ.php">FAQ</a> </div>
            <div class="header-menu-item "><a href="Contacts.php">Contacts</a> </div>
            <div class="account"><a href="../views/user_page.php"><img src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png" alt=""></a>
            </div>
            <div class="total">
                <a href="cart_form.php">
                    <img src="https://cdn-icons-png.flaticon.com/512/1374/1374128.png" alt="">
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
                <p style="font-size: large;">TRC, STC & .SWIZZ <br>
                red@support.com <br>
                1-234-567-890<br>
                8 am - 5 pm PT<br>
                Mon - Fri<br></p>
         
        </div>
    </main>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-copyright">©&nbsp;2023 Red.com</div>
        </div>
    </footer>
</body>

</html>