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
<?php include 'header.php'; ?>

<main>
    <div class="cart_flex">

        <div class="cart_products">
            <form style="background: #f6f6f6; border-radius: 10px" action="../models/cart_proces.php" method="post">
                <?php
                if (isset($_SESSION['cart']) && $totalQuantity != 0){

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
                <?php
                if ($result){
                foreach ($result as $row) {
                    ?>

                    <div class="cart_table">
                        <div class="imageCart">
                            <img class="img_cart" src="<?= $row['image'] ?>" alt="cart">
                        </div>
                        <div class="productInfoCart">
                            <div class="title_cart">
                                <div>
                                    <div><?= $row['title'] ?></div>
                                    <div style=" font-weight: 400; font-size: 14px; padding: 0"><?= $row['gender'] ?> <?= $row['category'] ?></div>

                                </div>
                                <div> <?= $row['price'] ?> zl</div>
                                <div style="padding: 0" class="season_cart"><?= $row['season'] ?></div>
                            </div>

                            <div class="count_cart">
                                <div>
                                    <div><p>Size</p> <?= $row['size'] ?> </div>
                                </div>
                                <label>
                                    <div><p>Quantity</p></div>
                                    <input class="text-center count-in-cart-input" type="number" min="1"
                                           name="quantity[<?= $row['id'] ?>]"
                                           value="<?= $_SESSION['cart'][$row['id']]['quantity'] ?>">
                                </label>
                            </div>
                            <div class="price_cart">
                                <div>
                                    <a class="RemoveProductInCart"
                                       href="../models/cart_proces.php?action=del&id=<?= $row['id'] ?>">
                                        <img style="width: 100%" src="../styles/ico/close.png" alt="Remove">
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>


                    <?php
                    $totalPrice += ($_SESSION['cart'][$row['id']]['quantity'] * $row['price']);
                    $totalPriceAndDelivery = $totalPrice + 20;
                    $_SESSION['totalPrice'] = $totalPrice;

                }
                ?>
            </form>
            <?php
            } else {
                echo "<p style='color: #0d0d0e; text-align: center'>No products in the cart.</p>";
            }
            } else {
                echo "<p style='color: #0d0d0e; text-align: center'>Your Cart is empty. Please add some products.</p>";
            }

            if (isset($_SESSION["error_message"])) {
                echo <<< ERROR
        <div class="callout callout-danger">
           <h5>Błąd!</h5>
           <p>$_SESSION[error_message]</p>
        </div>
        ERROR;
                unset($_SESSION["error_message"]);
            }
            ?>
        </div>
        <div class="cart_functions">
            <div class="order_price">
                <div class="flex name-s "><p>Subtotal: </p>
                    <p><?= $totalPrice ?> zl</p></div>
                <div style="padding-bottom: 10px; border-bottom: 1px solid #343434" class="flex name-s "><p>
                        Delivery: </p>
                    <p>20 zł</p></div>
                <div class="flex name-s "><p>Total: </p>
                    <p><?= $totalPriceAndDelivery ?> zl</p></div>
            </div>
            <div style="padding-top: 20px " class="buttons">
                <a href="order_form.php">
                    <button value="Buy" name="submit" type="submit" id="button_buy_cart">
                        <p style="margin: 15px; font-size: 1.3em ">Go To Checkout</p>
                    </button>
                </a>
            </div>
            <div class="DeliveryInfo flex">
                <div class="flex BorderBottom">
                    <span>
                        <img class="DeliveryInfoIco" src="../styles/ico/clock.png">
                    </span>
                    <p>Free shipping (from 400 zl)</p>
                </div>
                <div class="flex BorderBottom">
                    <span>
                        <img class="DeliveryInfoIco" src="../styles/ico/car.png">
                    </span>
                    <p>30 days for refund</p>
                </div>
                <div class="flex BorderBottom">
                        <span>
                            <img class="DeliveryInfoIco" src="../styles/ico/sale.png">
                        </span>
                    <p>Save with Red Plus</p>
                </div>
            </div>


        </div>
    </div>


</main>
<?php include 'footer.php'; ?>
<script>
</script>
</body>

</html>