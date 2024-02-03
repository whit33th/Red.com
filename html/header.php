<header id="header" class="header">
    <div class="header-menu">
        <div class="ten-proc-div">
            <a href="../index.php">
                <img id="logo" src="https://logos-world.net/wp-content/uploads/2022/01/Playboi-Carti-Emblem.png"></a>
        </div>
        <div class="eighty-proc-div">
            <img class="search_img" src="../styles/ico/search.png">
            <input class="main_input">
        </div>
        <div class="ten-proc-div">
            <div class="account"><a href="../html/user_page.php"><img
                            src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png"></a>
            </div>
            <div class="total">
                <a href="../html/cart_form.php">
                    <img src="https://cdn-icons-png.flaticon.com/512/1374/1374128.png">
                    <?php
                    $totalQuantity = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $item) {
                            $totalQuantity += $item['quantity'];
                        }
                    }
                    echo $totalQuantity;
                    ?>
                </a>
            </div>
        </div>


    </div>
</header>