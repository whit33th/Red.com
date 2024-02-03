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
<?php include 'footer.php'; ?>
</body>

</html>