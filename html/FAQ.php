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

<body style="background-color: #000000">
<?php include 'header.php'; ?>
    <main>
        <div class="centered-div">  
            <div class="accordion">
                <h3 class="accordion-header">FAQs</h3>
                <ul class="accordion-content">
                  <li><a href="#">Pre-order</a></li>
                  <li><a href="#">How to shop and place an order</a></li>
                  <li><a href="#">Pricing and payment</a></li>
                  <li><a href="#">Can I change my delivery address?</a></li>
                  <li><a href="#">Size and fit</a></li>
                </ul>
              </div>
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