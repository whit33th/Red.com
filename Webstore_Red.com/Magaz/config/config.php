<?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "Red.com";

    $dsn = "mysql:host=localhost;dbname=Red.com";

    $dbh = new PDO($dsn, $username, $pass);

    global $dbh;

    //$conn = mysqli_connect('localhost', 'root', '', 'RED') or die('error: '.mysqli_error($conn));
    /*global $conn*/
?>
