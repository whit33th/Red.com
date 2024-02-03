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
<?php include 'header.php'; ?>
<main>
    <div class="shop">
    <div class="centered-div">
        <form class="log_reg" action="../models/process_log_in.php" method="post">
            <input type="email" name="email" id="email"  placeholder="Email" autocomplete="on">

            <input type="password" name="password" id="password" placeholder="Password" autocomplete="off">

            <a><button>Log in</button></a>
        </form>
        <p>Don't have an account yet?</p>
        <a href="registration_form.php">
            <button>
                Registration
            </button>
        </a>
        <?php
        if (isset($_SESSION["error_message"])){
            echo <<< ERROR
                <p>Błąd!</p>
            <p>$_SESSION[error_message]</p>
            ERROR;
            //echo $_SESSION["error_message"];
            unset($_SESSION["error_message"]);
        }
        ?>
    </div>
    </div>
</main>

<?php include 'footer.php'; ?>
</body>

</html>