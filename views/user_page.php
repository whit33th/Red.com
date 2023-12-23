<?php
session_start();
if ($_SESSION["id"] != session_id() || session_status() != 2){
    header("location: login_form.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>RED</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/css/styles.css">
    <link rel="stylesheet" href="../styles/css/login.css">
    <link rel="icon" href="https://cdn.shopify.com/s/files/1/2445/5429/files/PBC_RED.png?347">
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
        <div class="account"><a href="user-page.html"><img
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
    <div class="centered-div">
        <h3 style="color: white;"><?php echo $_SESSION['username'];?></h3>
        <a href="../controllers/log_out.php"><button>Exit</button></a>
    </div>
</main>
<footer class="footer">
    <div class="footer-content">
        <div class="footer-copyright">©&nbsp;2023 Red.com</div>
    </div>
</footer>
</body>

</html>