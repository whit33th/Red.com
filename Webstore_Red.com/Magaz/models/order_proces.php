<?php
session_start();

if (isset($_POST['submit']) && isset($_SESSION['cart'])){
  $name = $_POST['name'];
    $fields_required = ["name", "surname", "tel", "address", "email", "id_code"];
    $errors = [];

    //empty
    foreach ($fields_required as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "Pole <b>$field</b> jest wymagane";
        }
    }

    if (!empty($errors)) {
        $_SESSION["error_message"] = implode("<br>", $errors);
        header("Location: ../views/order_form.php?error=" . urlencode($errorMessage));
        exit();
    }

    //email
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Niepoprawna wartość";
        $_SESSION['error_message'] = $errorMessage;
        header("Location: ../views/order_form.php?error=" . urlencode($errorMessage));
        exit();
    }

    //id code
    if (!preg_match('/^[0-9]{2}-[0-9]{3}/', $_POST['id_code'])){

        $errorMessage = "Niepoprawna wartość id Code";
        $_SESSION['error_message'] = $errorMessage;
        header("Location: ../views/order_form.php?error=" . urlencode($errorMessage));
        exit();
    }
    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $tel = htmlspecialchars(trim($_POST['tel']));
    $address = htmlspecialchars(trim($_POST['address']));
    $email = htmlspecialchars(trim($email));
    $id_code = htmlspecialchars(trim($_POST['id_code']));


    $id_products = implode(',', array_keys($_SESSION['cart']));

    // Создание нового заказа или сохранение данных покупки в базе данных
    require_once "../config/config.php";

    if(!isset($_SESSION['id_users'])){
        $id_user= 0000;
    }else{
        $id_user= $_SESSION['id_users'];
    }

    $insert = "INSERT INTO orders (id_user, id_products, address, id_code, tel,price) VALUES (:id_user, :id_products, :address, :id_code, :tel, :price)";
    $sth = $dbh->prepare($insert);
    $sth->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $sth->bindParam(':id_products', $id_products, PDO::PARAM_STR);
    $sth->bindParam(':price', $_SESSION['totalPrice'], PDO::PARAM_INT);
    $sth->bindParam(':address', $address, PDO::PARAM_INT);
    $sth->bindParam(':id_code', $id_code, PDO::PARAM_INT);
    $sth->bindParam(':tel', $tel, PDO::PARAM_INT);

    $sth->execute();

    /*    $to = "dhaurylkevich@gmail.com";
        $subject = "Подтверждение покупки";
        $message = wordwrap("Уважаемый $name,\n\nСпасибо за вашу покупку. Мы подтверждаем получение вашего заказа и приложенные данные.\n\nИмя: $name\nEmail: $email\nАдрес: $address\n\nС уважением,\nВаш магазин", 70);
        $headers = "From: dhaurylkevich@edu.cdv.pl"; // Замените на вашу электронную почту

        if(mail($to, $subject, $message, $headers)) {
            $message = "Подтверждение покупки отправлено на вашу электронную почту";
            $_SESSION['success_message'] = $message;
            header("Location: order.php?success=" . urlencode($message));
            exit();
        } else {
            $errorMessage = "Ошибка при отправке подтверждения покупки";
            $_SESSION['error_message'] = $errorMessage;
            header("Location: order.php?error=" . urlencode($errorMessage));
            exit();
        }*/

    $select = "SELECT id FROM orders WHERE id_user = :id_user";
    $checkUserStmt = $dbh->prepare($select);
    $checkUserStmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);
    $checkUserStmt->execute();
    $row = $checkUserStmt->fetchAll(PDO::FETCH_ASSOC);

    unset($_SESSION['cart']);
    // Перенаправление пользователя на страницу подтверждения покупки или другую страницу по вашему выбору
    $message = "Thank you for ordering id#";
    /*$_SESSION['success_message'] = $messag.$row[0]['id'];*/
    header("Location: ../views/complete_order.php?success=" . urlencode($message));
    exit();
}else{
    $message = "Cart is empty!";
    header("Location: ../views/cart_form.php?error=" . urlencode($message));
    exit();
}
?>
