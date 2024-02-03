<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fields_required = ["username", "email", "password", "cpassword"];
    $errors = [];

    foreach ($fields_required as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "Pole <b>$field</b> jest wymagane";
        }
    }
    if (!empty($errors)) {
        $_SESSION["error_message"] = implode("<br>", $errors);
        header("Location: ../views/registration_form.php");
        exit();
    }

    //Email
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error_message"] = "Niepoprawny adress";
        header("Location: registration_form.php");
        exit();
    }
    require_once "../config/config.php";

    $select = "SELECT * FROM users WHERE email = :email";
    $checkUserStmt = $dbh->prepare($select);
    $checkUserStmt->bindParam(':email', $email, PDO::PARAM_STR);
    $checkUserStmt->execute();

    if ($checkUserStmt->rowCount() == 1) {
        $_SESSION["error_message"] = "Użytkownik o podanym adresie email już istnieje";
        header("Location: registration_form.php");
        exit();
    }

    //Pass
    if ($_POST["password"] != $_POST["cpassword"]) {
        $_SESSION["error_message"] = "Hasła muszą być identyczne";
        header("Location: ../views/registration_form.php");
        exit();

    }elseif(strlen($_POST["password"]) < 8){
        $_SESSION["error_message"] = "Password 8 symbols.";
        header("Location: ../views/registration_form.php");
        exit();

    } elseif (!preg_match("/[A-Z]/", $_POST["password"]) || !preg_match("/[a-z]/", $_POST["password"]) || !preg_match("/[0-9]/", $_POST["password"])) {
        $_SESSION["error_message"] = "The password must contain at least one uppercase letter, one lowercase letter, and one number.";
        header("Location: ../views/registration_form.php");
        exit();
    }

    //Username
    $username = htmlspecialchars(trim($_POST["username"]));

    //подготовленный запрос для вставки данных
    $insert = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $sth = $dbh->prepare($insert);
    $sth->bindParam(':username', $username, PDO::PARAM_STR);
    $sth->bindParam(':email', $email, PDO::PARAM_STR);
    $sth->bindParam(':password', $pass, PDO::PARAM_STR);

    $select = "SELECT id FROM users WHERE email = :email";
    $stmt = $dbh->prepare($select);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);

    try {
        $pass = password_hash($_POST["password"], PASSWORD_ARGON2ID);
        $sth->execute();
        if ($sth->rowCount() == 1) {
            $_SESSION["username"] = $username;
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['id'] = session_id();
            $_SESSION['id_users'] = $users[0]['id'];

            header("Location: ../views/user_page.php");
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION["error_message"] = "Nie dodano użytkownika: " . $e->getMessage();
        header("Location: ../views/registration_form.php"); // Перенаправление на страницу с формой
        exit();
    }
}
?>