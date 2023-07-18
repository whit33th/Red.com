<?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "RED";

    $dsn = "mysql:host=localhost;dbname=RED";

    $dbh = new PDO($dsn, $username, $pass);

    global $dbh;

    //$conn = mysqli_connect('localhost', 'root', '', 'RED') or die('error: '.mysqli_error($conn));
    /*global $conn*/
?>
