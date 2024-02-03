<?php
session_start();
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
    <link rel="stylesheet" href="../styles/css/news.css">
</head>

<body>
<?php include 'header.php'; ?>
<main>
    <div class="centered-div">

        <h3 style="color: white; font-size: 26px;" class="Order complete">Complete</h3>
        <p style="font-size: 20px;">Thank you for ordering!</p>


    </div>
</main>
<?php include 'footer.php'; ?>
</body>
<script>
    document.querySelector('.accordion-header').addEventListener('click', function() {
        document.querySelector('.accordion').classList.toggle('open');
    });

</script>

</html>