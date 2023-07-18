<?php
session_start();
require_once "../config/config.php";

if (isset($_POST['update']) && !empty($_POST['quantity'])) {
    $newQuantities = $_POST['quantity'];

    // Проверка на валидность нового количества товаров
    foreach ($newQuantities as $productId => $newQuantity) {
        if ($newQuantity < 0 || !is_numeric($newQuantity)) {
            // Некорректное количество товаров, перенаправление с сообщением об ошибке
            $_SESSION["error_message"] = "InvalidQuantity";
            header("Location: ../views/cart_form.php?error");
            exit();
        }
    }

    // Обновляем количество товаров в корзине
    foreach ($newQuantities as $productId => $newQuantity) {
        if (isset($_SESSION['cart'][$productId])) {
            if ($newQuantity > 0) {
                $_SESSION['cart'][$productId]['quantity'] = $newQuantity;
            } else {
                unset($_SESSION['cart'][$productId]);
            }
        }
    }
    // Перенаправление на страницу корзины или другую нужную страницу
    header("Location: ../views/cart_form.php");
    exit();

}elseif(isset($_GET['action'])){
    $action = $_GET['action'];

    if($action == 'del' && isset($_GET['id'])){
        $id = $_GET['id'];
        if(isset($_SESSION['cart'][$id])){
            unset($_SESSION['cart'][$id]);
            header("Location: ../views/cart_form.php");
            exit();
        }
    }else{
        $_SESSION['error_message'] = "Niepoprawna wartość";
        header("Location: ../views/cart_form.php");
        exit();
    }
}
?>
