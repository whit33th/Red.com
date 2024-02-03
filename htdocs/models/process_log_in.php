<?php
session_start();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST['email']) || empty($_POST['password'])){
        $_SESSION["error_message"] = "Wypełni pola wymagane!";
        header("Location: ../views/login_form.php");
        exit();
    }

    //email
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error_message"] = "Niepoprawy adress";
        header("Location: registration_form.php");
        exit();
    }

    require_once "../config/config.php";

    $select = "SELECT * FROM users WHERE email = :email";
    $checkUserStmt = $dbh->prepare($select);
    $checkUserStmt->bindParam(':email', $email, PDO::PARAM_STR);

    try{
        $checkUserStmt->execute();
        if ($checkUserStmt->rowCount() == 1) {
            $row = $checkUserStmt->fetchAll(PDO::FETCH_ASSOC);

                    if (password_verify($_POST['password'], $row[0]['password'])) {
                        $_SESSION['id'] = session_id();
                        $_SESSION['id_users'] = $row[0]['id'];
                        $_SESSION['username'] = $row[0]['username'];
                        $_SESSION['email'] = $row[0]['email'];
                        $_SESSION['user_form'] = $row[0]['user_type'];
                        if ($_SESSION['user_form'] == 'admin') {
                            header("Location: ../admin/admin.php");
                        } else {
                            header("Location: ../views/user_page.php");
                        }
                        exit();
                    } else {
                        $_SESSION["error_message"] = "Błędny login lub hasło!";
                        header("Location: ../views/login_form.php");
                        exit();
                    }
        } else {
            $_SESSION["error_message"] = "Błędny login lub hasło!";
            header("Location: ../views/login_form.php");
            exit();
        }
    } catch (PDOException $e) {
        // Обработка ошибок базы данных
        $_SESSION["error_message"] = "Error BD: " . $e->getMessage();
        header("Location: ../views/error_page.php");
        exit();
    }
} else {
    header("Location: ../views/login_form.php");
    exit();
}