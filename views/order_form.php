<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>RED</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/css/styles.css">
    <link rel="stylesheet" href="../styles/css/login.css">
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
                        src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png"></a>
            </div>
            <div class="total">
                <a href="cart_form.php" onclick="toggleCart()">
                    <img src="https://cdn-icons-png.flaticon.com/512/1374/1374128.png">
                </a>
            </div>
        </div>
    </header>
    <main>

        <div class="centered-div"><form action="../models/order_proces.php" method="post">

                <input class="half-input" type="text" autocomplete="on" name="name" placeholder="Name">

                <input class="half-input" type="text" autocomplete="on" name="surname" placeholder="Surname">

                <input type="tel" name="tel" placeholder="Tel.">

                <input type="text" name="address" autocomplete="on" placeholder="Address">

                <input type="text" name="email" autocomplete="on" placeholder="Email">

                <input type="text" name="id_code" placeholder="00-000">
                <div class="buttons">
                    <button class="button-buy" type="submit" name="submit">
                        <p>Buy</p>
                    </button>
                    <?php
                    session_start();
                    if (isset($_SESSION["error_message"])){
                        echo <<< ERROR
                <p style="color: white">Błąd!</p>
                <p style="color: white" >$_SESSION[error_message]</p>
                ERROR;
                        unset($_SESSION["error_message"]);
                    }elseif(isset($_SESSION["success_message"])){
                        echo <<< ERROR
                <p >$_SESSION[success_message]</p>
                ERROR;
                        unset($_SESSION["success_message"]);
                    }
                    ?>
                </div>
            </form></div>


    </main>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-copyright">©&nbsp;2023 Red.com</div>
        </div>
    </footer>
    <script>
    </script>
</body>

</html>