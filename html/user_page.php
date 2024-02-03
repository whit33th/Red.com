<?php
session_start();
if ($_SESSION["id"] != session_id() || session_status() != 2){
    header("location: login_form.php");
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
    <link rel="stylesheet" href="../styles/css/login.css">
    <link rel="icon" href="https://cdn.shopify.com/s/files/1/2445/5429/files/PBC_RED.png?347">
</head>

<body>
<?php include 'header.php'; ?>
<main>
    <div class="centered-div">
        <h3 style="color: white;"><?php echo $_SESSION['username'];?></h3>
        <a href="../controllers/log_out.php"><button>Exit</button></a>
    </div>
</main>
<?php include 'footer.php'; ?>
</body>

</html>