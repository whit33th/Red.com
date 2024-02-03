<?php
session_start();

require_once "../config/config.php";

if (isset($_GET['action']) && $_GET['action'] == "add") {

    $id = intval($_GET['id']);

    if (isset($_SESSION['cart'][$id])) {

        $_SESSION['cart'][$id]['quantity']++;
        header("Location: product_form.php?id=$id");
        exit();
    } else {

        $stmt = $dbh->query("SELECT * FROM products WHERE id = $id");

        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['cart'][$row[0]['id']] = array(
                "quantity" => 1,
                "price" => $row[0]['price']

            );
            header("Location: product_form.php?id=$id");
            exit();
        } else {
            echo("Silence");
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>RED</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/css/styles.css">
    <link rel="stylesheet" href="../styles/css/product.css">
    <link rel="stylesheet" href="../styles/css/news.css">


</head>

<body>
<?php include 'header.php'; ?>
<main>
    <div class="category">
        <?php

        $stmt = $dbh->prepare("SELECT name FROM category");

        $stmt->execute();

        $listCategorys = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($listCategorys as $listCategory) {
            ?>
            <a href="../index.php?category=<?= $listCategory['name'] ?>"
               class="category-item"><?= $listCategory['name'] ?></a>
        <?php } ?>

    </div>
    <div class="product-border">
        <?php
        $productid = $_GET['id'];

        $stmt = $dbh->prepare("SELECT * FROM image WHERE id = :id");
        $stmt->bindParam(':id', $productid, PDO::PARAM_STR);
        $stmt->execute();

        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($images as $image) {
            ?>

            <div class="product-pictures">
                <div class="main-photo ">
                    <img class="main-photo"
                         src="<?= $image['image_1'] ?>">
                </div>
                <div class="gallery">
                    <div class="gallery-container">
                        <div class="gallery-images">
                            <img src="<?= $image['image_1'] ?>"
                                 alt="Photo 0">
                            <img src="<?= $image['image_2'] ?>"
                                 alt="Photo 1">
                            <img src="<?= $image['image_3'] ?>"
                                 alt="Photo 2">
                            <img src="<?= $image['image_4'] ?>"
                                 alt="Photo 3">
                            <img src="<?= $image['image_5'] ?>"
                                 alt="Photo 1">
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        $select = "SELECT * FROM products WHERE id = :id";

        $checkProductStmt = $dbh->prepare($select);
        $checkProductStmt->bindParam(':id', $productid, PDO::PARAM_STR);
        $checkProductStmt->execute();

        $products = $checkProductStmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($products

        as $product){
        ?>
        <div class="product-info">
            <div class="product-name flex">
                <div class="flex name-s ">
                    <h3><?= $product['title'] ?></h3>
                    <p class="season smaller"><?= $product['season'] ?></p>
                </div>

                <p style=" font-weight: 400; font-size: 14px"><?= $product['gender'], " ", $product['category'] ?></p>

                <p class="productPrice padding10"><?= $product['price'] ?> zł</p>
            </div>


            <div class="product-size p15">
                <div class="size-guide flex">
                    <p class="select-size">Select size:</p>

                    <div class="popup" onclick="togglePopup()">
                        <p style="text-decoration: underline; color: black"><a>Size guide</a></p>
                        <div class="popuptext" id="myPopup">

                            <table class="popup-table">
                                <tr class="size-country">
                                    <td style="border: none">Italy</td>
                                    <td style="border: none">US</td>
                                    <td style="border: none">UK</td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false"
                                    class="_a6c9fc _c5172b _cafeb8">
                                    <td class="_afec03 _fdc55a">35</td>
                                    <td class="_afec03 _eb76ff">2</td>
                                    <td class="_afec03 _eb76ff">1
                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false" class="_a6c9fc _cafeb8">
                                    <td class="_afec03 _fdc55a">35.5</td>
                                    <td class="_afec03 _eb76ff">2.5</td>
                                    <td class="_afec03 _eb76ff">1.5

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false"
                                    class="_a6c9fc _c5172b _cafeb8">
                                    <td class="_afec03 _fdc55a">36</td>
                                    <td class="_afec03 _eb76ff">3</td>
                                    <td class="_afec03 _eb76ff">2

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false" class="_a6c9fc _cafeb8">
                                    <td class="_afec03 _fdc55a">36.5</td>
                                    <td class="_afec03 _eb76ff">3.5</td>
                                    <td class="_afec03 _eb76ff">2.5

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false"
                                    class="_a6c9fc _c5172b _cafeb8">
                                    <td class="_afec03 _fdc55a">37</td>
                                    <td class="_afec03 _eb76ff">4</td>
                                    <td class="_afec03 _eb76ff">3

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false" class="_a6c9fc _cafeb8">
                                    <td class="_afec03 _fdc55a">37.5</td>
                                    <td class="_afec03 _eb76ff">4.5</td>
                                    <td class="_afec03 _eb76ff">3.5

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false"
                                    class="_a6c9fc _c5172b _cafeb8">
                                    <td class="_afec03 _fdc55a">38</td>
                                    <td class="_afec03 _eb76ff">5</td>
                                    <td class="_afec03 _eb76ff">4

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false" class="_a6c9fc _cafeb8">
                                    <td class="_afec03 _fdc55a">38.5</td>
                                    <td class="_afec03 _eb76ff">5.5</td>
                                    <td class="_afec03 _eb76ff">4.5

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false"
                                    class="_a6c9fc _c5172b _cafeb8">
                                    <td class="_afec03 _fdc55a">39</td>
                                    <td class="_afec03 _eb76ff">6</td>
                                    <td class="_afec03 _eb76ff">5

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false" class="_a6c9fc _cafeb8">
                                    <td class="_afec03 _fdc55a">39.5</td>
                                    <td class="_afec03 _eb76ff">6.5</td>
                                    <td class="_afec03 _eb76ff">5.5

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false"
                                    class="_a6c9fc _c5172b _cafeb8">
                                    <td class="_afec03 _fdc55a">40</td>
                                    <td class="_afec03 _eb76ff">7</td>
                                    <td class="_afec03 _eb76ff">6

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false" class="_a6c9fc _cafeb8">
                                    <td class="_afec03 _fdc55a">40.5</td>
                                    <td class="_afec03 _eb76ff">7.5</td>
                                    <td class="_afec03 _eb76ff">6.5

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false"
                                    class="_a6c9fc _c5172b _cafeb8">
                                    <td class="_afec03 _fdc55a">41</td>
                                    <td class="_afec03 _eb76ff">8</td>
                                    <td class="_afec03 _eb76ff">7

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false" class="_a6c9fc _cafeb8">
                                    <td class="_afec03 _fdc55a">41.5</td>
                                    <td class="_afec03 _eb76ff">8.5</td>
                                    <td class="_afec03 _eb76ff">7.5

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false"
                                    class="_a6c9fc _c5172b _cafeb8">
                                    <td class="_afec03 _fdc55a">42</td>
                                    <td class="_afec03 _eb76ff">9</td>
                                    <td class="_afec03 _eb76ff">8

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false" class="_a6c9fc _cafeb8">
                                    <td class="_afec03 _fdc55a">42.5</td>
                                    <td class="_afec03 _eb76ff">9.5</td>
                                    <td class="_afec03 _eb76ff">8.5

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false"
                                    class="_a6c9fc _c5172b _cafeb8">
                                    <td class="_afec03 _fdc55a">43</td>
                                    <td class="_afec03 _eb76ff">10</td>
                                    <td class="_afec03 _eb76ff">9

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false" class="_a6c9fc _cafeb8">
                                    <td class="_afec03 _fdc55a">43.5</td>
                                    <td class="_afec03 _eb76ff">10.5</td>
                                    <td class="_afec03 _eb76ff">9.5

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false"
                                    class="_a6c9fc _c5172b _cafeb8">
                                    <td class="_afec03 _fdc55a">44</td>
                                    <td class="_afec03 _eb76ff">11</td>
                                    <td class="_afec03 _eb76ff">10

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false" class="_a6c9fc _cafeb8">
                                    <td class="_afec03 _fdc55a">44.5</td>
                                    <td class="_afec03 _eb76ff">11.5</td>
                                    <td class="_afec03 _eb76ff">10.5

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false"
                                    class="_a6c9fc _c5172b _cafeb8">
                                    <td class="_afec03 _fdc55a">45</td>
                                    <td class="_afec03 _eb76ff">12</td>
                                    <td class="_afec03 _eb76ff">11

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false" class="_a6c9fc _cafeb8">
                                    <td class="_afec03 _fdc55a">45.5</td>
                                    <td class="_afec03 _eb76ff">12.5</td>
                                    <td class="_afec03 _eb76ff">11.5

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false"
                                    class="_a6c9fc _c5172b _cafeb8">
                                    <td class="_afec03 _fdc55a">46</td>
                                    <td class="_afec03 _eb76ff">13</td>
                                    <td class="_afec03 _eb76ff">12

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false" class="_a6c9fc _cafeb8">
                                    <td class="_afec03 _fdc55a">46.5</td>
                                    <td class="_afec03 _eb76ff">13.5</td>
                                    <td class="_afec03 _eb76ff">12.5

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false"
                                    class="_a6c9fc _c5172b _cafeb8">
                                    <td class="_afec03 _fdc55a">47</td>
                                    <td class="_afec03 _eb76ff">14</td>
                                    <td class="_afec03 _eb76ff">13

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false" class="_a6c9fc _cafeb8">
                                    <td class="_afec03 _fdc55a">47.5</td>
                                    <td class="_afec03 _eb76ff">14.5</td>
                                    <td class="_afec03 _eb76ff">13.5

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false"
                                    class="_a6c9fc _c5172b _cafeb8">
                                    <td class="_afec03 _fdc55a">48</td>
                                    <td class="_afec03 _eb76ff">15</td>
                                    <td class="_afec03 _eb76ff">14

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false" class="_a6c9fc _cafeb8">
                                    <td class="_afec03 _fdc55a">48.5</td>
                                    <td class="_afec03 _eb76ff">15.5</td>
                                    <td class="_afec03 _eb76ff">14.5

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false"
                                    class="_a6c9fc _c5172b _cafeb8">
                                    <td class="_afec03 _fdc55a">49</td>
                                    <td class="_afec03 _eb76ff">16</td>
                                    <td class="_afec03 _eb76ff">15

                                    </td>
                                </tr>
                                <tr tabindex="0" aria-expanded="false" aria-disabled="false" class="_a6c9fc _cafeb8">
                                    <td class="_afec03 _fdc55a">49.5</td>
                                    <td class="_afec03 _eb76ff">16.5</td>
                                    <td class="_afec03 _eb76ff">15.5

                                    </td>
                                </tr>

                            </table>

                        </div>
                    </div>
                </div>

                <div class="sizes-form">
                    <div class="sizes">

                        <?php
                        $sizeString = $product['size'];
                        $sizes = explode(',', $sizeString);
                        foreach ($sizes as $size) {
                            echo '<div class="size-div"><p>' . trim($size) . '</p></div>';
                        }
                        ?>
                    </div>
                </div>

            </div>
            <?php
            }
            ?>
            <div class="buttons">
                <div class="but_sec1">
                    <a href="product_form.php?action=add&id=<?= $productid ?>">
                        <button class="buy-add button-buy">
                            <p>Buy</p>
                        </button>
                </div>
                </a>
                <button class="buy-add button-add">
                    <img id="like" height="20px" class="add_to_favorite"
                         src="https://www.iconpacks.net/icons/2/free-heart-icon-3510-thumb.png">
                </button>
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

            <div class="description">

                <p><?= $product['description'] ?></p>
            </div>


        </div>
    </div>
    </div>
    <div> </div>
    <div class=""></div>
</main>
<?php include 'footer.php' ?>
<script src="../script.js"></script>

</body>

</html>