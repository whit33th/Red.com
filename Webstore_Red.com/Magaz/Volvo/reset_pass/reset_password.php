<?php
// Подключение к базе данных и другие необходимые настройки

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Проверка наличия email в базе данных
    $select = "SELECT * FROM user_form WHERE email = :email";
    $stmt = $dbh->prepare($select);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $rowcount = $stmt->rowCount();

    if ($rowcount == 1) {
        // Генерация токена сброса пароля
        $token = generateToken();

        // Сохранение токена в базе данных
        $update = "UPDATE user_form SET reset_token = :token WHERE email = :email";
        $stmt = $dbh->prepare($update);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        // Отправка ссылки сброса пароля по электронной почте
        $resetLink = "http://localhost/Magaz/all/reset_pass/reset_password.php?token=" . $token; // Замените example.com на ваш домен
        $subject = "Password Reset";
        $message = "To reset your password, click the link below:\n\n" . $resetLink;
        $headers = "From: Dimon 228 <dhaurylkevich@edu.cdv.pl>"; // Замените Your Name и yourname@example.com на ваши данные
        mail($email, $subject, $message, $headers);

        // Перенаправление пользователя на страницу с подтверждением сброса пароля
        header("Location: reset_password_confirmation.php");
        exit();
    } else {
        // Email не найден, перенаправление пользователя на страницу ошибки
        header("Location: forgot_password_form.php?error=Email not found");
        exit();
    }
} else {
    // Если форма не была отправлена, перенаправление пользователя на страницу сброса пароля
    header("Location: forgot_password_form.php");
    exit();
}

// Генерация случайного токена сброса пароля
function generateToken() {
    $token = bin2hex(random_bytes(32));
    return $token;
}
?>
