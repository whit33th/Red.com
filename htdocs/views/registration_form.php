<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>RED</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/css/styles.css">
    <link rel="stylesheet" href="../styles/css/login.css">
    <link rel="stylesheet" href="../styles/css/news.css">
</head>

<body style="background-color: #000000">
<header id="header">
    <div class="header-menu">
        <div class="ten-proc-div">
            <a href="../index.php"><img id="logo" src="https://logos-world.net/wp-content/uploads/2022/01/Playboi-Carti-Emblem.png"></a>
        </div>
        <div class="eighty-proc-div"><input class="main_input"></div>
        <div class="ten-proc-div"><div class="account"><a href="views/user_page.php"><img src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png"></a>
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
    <div class="centered-div">
        <form class="log_reg" action="../models/process_sign_up.php" method="POST">
            <input type="text" name="username"  placeholder="Username">
            <input type="text" name="email" id="email" autocomplete="on" placeholder="Email">
            <input type="password" name="password"  placeholder="Password">
            <input type="password" name="password"  placeholder="Password">

            <a><button>Registration</button></a>
        </form>
        <?php
        session_start();
        if (isset($_SESSION["error_message"])){
            echo <<< ERROR
                    <p>Błąd!</p>
                    <p>$_SESSION[error_message]</p>

                    ERROR;

            unset($_SESSION["error_message"]);
        }
        ?>
        <p>Do you already have an account?</p>
        <a href="login_form.php"><button>Log in</button></a>
    </div>
</main>
<footer class="footer">
    <div class="footer-contect">


        <div class="help-link">
            <a href="views/News.php">News</a>
            <a href="views/Sales.php">Sales</a>
            <a href="views/FAQ.php">FAQ</a>
            <a href="views/Contacts.php">Contacts</a>
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
</body>

</html>