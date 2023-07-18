<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>
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
                        src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png"></a>
        </div>
        <div class="total">
            <a href="../views/cart_form.php">
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
        <table>

                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Count</th>
                            <th>Action</th>
                        </tr>
            <?php
            if($result){
            foreach($result as $row){
            ?>
                        <tr>
                            <td><?=$row['id'] ?></td>
                            <td><?=$row['image'] ?> </td>
                            <td><?=$row['title'] ?></td>
                            <td><?=$row['price']?></td>
                            <td class="action in[">
                                <input style="padding: 0px" class="inp" type="text" name="quantity[<?=$row['id']?>]" value="<?=$_SESSION['cart'][$row['id']]['quantity']?>">
                                <button type="submit" name="update">Update</button>
                            </td>
                            <td>
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
                <div><p style="color: white;">Total price: <?= $totalPrice?></p></div>
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
    <div class="footer-content">
        <div class="footer-copyright">©&nbsp;2023 Red.com</div>
    </div>
</footer>
<script>
</script>
</body>

</html>