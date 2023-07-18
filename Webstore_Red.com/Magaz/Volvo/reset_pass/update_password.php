// update_password.php
<?php
// Подключение к базе данных и другие необходимые настройки

if (isset($_POST['token']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    $token = $_POST['token'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword === $confirmPassword) {
        // Поиск пользователя по токену сброса пароля
        $select = "SELECT * FROM user_form WHERE reset_token = :token";
        $stmt = $dbh->prepare($select);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->execute();
        $rowcount = $stmt->rowCount();

        if ($rowcount == 1) {
            // Обновление пароля пользователя
            $hashedPassword = md5($newPassword); // Замените на соответствующую функцию хеширования пароля
            $update = "UPDATE user_form SET password = :password, reset_token = NULL WHERE reset_token = :token";
            $stmt = $dbh->prepare($update);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindParam(':token', $token, PDO::PARAM_STR);
            $stmt->execute();

            // Перенаправление пользователя на страницу успешного обновления пароля
            header("Location: password_reset_success.php");
            exit();
        } else {
            // Токен сброса пароля не найден, перенаправление пользователя на страницу ошибки
            header("Location: reset_password_form.php?error=Invalid token");
            exit();
        }
    } else {
        // Пароли не совпадают, перенаправление пользователя на страницу ошибки
        header("Location: reset_password_form.php?error=Passwords do not match");
        exit();
    }
} else {
    // Если форма не была отправлена, перенаправление пользователя на страницу сброса пароля
    header("Location: reset_password_form.php");
    exit();
}
?>
