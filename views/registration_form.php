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
        <a href="../index.php"><img id="logo"
                                    src="https://logos-world.net/wp-content/uploads/2022/01/Playboi-Carti-Emblem.png"></a>
        <div class="header-menu-item "><a href="News.php">News</a> </div>
        <div class="header-menu-item"><a href="Sales.php">Sales</a> </div>
        <div class="header-menu-item "><a href="FAQ.php">FAQ</a> </div>
        <div class="header-menu-item "><a href="Contacts.php">Contacts</a> </div>

        <div class="account"><a href="user_page.php"><img
                        src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png"></a> </div>
        <div class="total"><a href="cart_form.php"><img src="https://cdn-icons-png.flaticon.com/512/1374/1374128.png"></a>
        </div>
    </div>
</header>
<main>
    <div class="centered-div">
        <form class="log_reg" action="../models/process_sign_up.php" method="POST">
            <input type="text" name="username"  placeholder="Username">
            <input type="text" name="email" id="email" autocomplete="on" placeholder="Email">
            <input type="password" name="password"  placeholder="Password">
            <input type="password" name="cpassword"  placeholder="Password">

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
    <div class="footer-content">
        <div class="footer-copyright">©&nbsp;2023 Red.com</div>
    </div>
</footer>
</body>

</html>