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

<body style="background-color: #000000;">
<?php include 'header.php'; ?>
<main>

    <div class="centered-div">

        <form  action="../models/order_proces.php" method="post">
            <div class="order_form">

            <input  class="half-input" type="text" autocomplete="on" name="name" placeholder="Name">

            <input class="half-input" type="text" autocomplete="on" name="surname" placeholder="Surname">

            <input type="tel" name="tel" placeholder="Tel.">

            <input type="text" name="address" autocomplete="on" placeholder="Address">

            <input type="text" name="email" autocomplete="on" placeholder="Email">

            <input type="text" name="id_code" placeholder="00-000">
            </div>
            <?php
            session_start();
            if (isset($_SESSION["error_message"])) {
                echo <<< ERROR
                <p style="color: white">Błąd!</p>
                <p style="color: white" >$_SESSION[error_message]</p>
                ERROR;
                unset($_SESSION["error_message"]);
            } elseif (isset($_SESSION["success_message"])) {
                echo <<< ERROR
                <p >$_SESSION[success_message]</p>
                ERROR;
                unset($_SESSION["success_message"]);
            }
            ?>
            <div style=" padding: 10px 0 0 0; width: 100%">
                <button id="button_form_order" type="submit" name="submit">
                    <p style="margin: 12px; font-size: 1.3em;">Buy</p>
                </button>

            </div>
        </form>


    </div>


</main>
<?php include 'footer.php'; ?>
<script>
</script>
</body>

</html>