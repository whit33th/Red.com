<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>RED</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/css/styles.css">
    <link rel="stylesheet" href="../styles/css/login.css">
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

    <form action="../models/cart_proces.php" method="post">
        <?php
        if(isset($_SESSION['cart']) && $totalQuantity != 0){

            require_once "../config/config.php";

            // Формируем массив с идентификаторами продуктов из $_SESSION['cart']
            $ids = array_keys($_SESSION['cart']);
            // Генерируем строку с плейсхолдерами для подготовленного запроса
            $placeholders = implode(',', array_fill(0, count($ids), '?'));
            // Подготавливаем SQL-запрос
            $sql = "SELECT * FROM products WHERE id IN ($placeholders) ORDER BY title ASC";
            $stmt = $dbh->prepare($sql);
            // Привязываем значения к плейсхолдерам
            $stmt->execute($ids);
            // Получаем результат
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
        <table class="cart-table">

                        <tr>

                            <th class="image-th">Image</th>
                            <th>Info</th>
                            <th class="count-th">Count</th>
                        </tr>
            <?php
            if($result){
            foreach($result as $row){
            ?>
                        <tr>

                            <td class="image-td"><img class="img_cart" src="<?=$row['image'] ?>" alt="cart"> </td>
                            <td><?=$row['title'] ?> <br> <?=$row['price']?> zl</td>
                            <td class="count-td action in[">
                                <div class="count-in-cart">
                                <div class="count-in-cart-but less"><</div>
                                    <div>
                                        <input class="text-center count-in-cart-input" type="text" name="quantity[<?=$row['id']?>]" value="<?=$_SESSION['cart'][$row['id']]['quantity']?>">
                                    </div>
                                        <div class="count-in-cart-but more">></div>
                                </div>
                                <button type="submit" name="update">Update</button>
                                <a href="../models/cart_proces.php?action=del&id=<?=$row['id']?>">Delete</a>
                            </td>
                        </tr>
                <?php
                $totalPrice += ($_SESSION['cart'][$row['id']]['quantity'] * $row['price']);
                $_SESSION['totalPrice'] = $totalPrice;
                }
            ?>
                    </table>

    </form>
                <div><p style="color: white;">Total price: <?= $totalPrice?> zl</p></div>
                <div class="buttons">
                    <a href="order_form.php">
                    <button value="Buy" name="submit" type="submit" class="button-buy">
                        <p>Buy</p>
                    </button>
                    </a>
                </div>
                <?php
            }else{
                echo "<p>No products in the cart.</p>";
            }
        }else{
            echo "<p>Your Cart is empty. Please add some products.</p>";
        }

        if (isset($_SESSION["error_message"])){
            echo <<< ERROR
        <div class="callout callout-danger">
           <h5>Błąd!</h5>
           <p>$_SESSION[error_message]</p>
        </div>
        ERROR;
            unset($_SESSION["error_message"]);
        }
        ?>

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
<script>
</script>
</body>

</html>