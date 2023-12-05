<?php
include_once('../views/config.php');
include_once('../models/cart.php');



if ($_POST['action'] == "Buy Now") {
    $currentDate = new DateTime();
    $date = $currentDate->format('Y-m-d H:i:s');
    $cart = new Cart();
    $cart->addToCart($_POST['userID'], $_POST['productID'], $_POST['quantity'], $date);

    $user = $_POST['userID'];
    $url = "../index.php/cart?userid=$user";

    header("Location:" . $url);
    exit();
} elseif ($_POST['action'] == "Add To Cart") {
    $currentDate = new DateTime();
    $date = $currentDate->format('Y-m-d H:i:s');
    $cart = new Cart();
    $cart->addToCart($_POST['userID'], $_POST['productID'], $_POST['quantity'], $date);

    session_start();
    $redirect_url = (isset($_SESSION['redirect_url'])) ? $_SESSION['redirect_url'] : '/';
    unset($_SESSION['redirect_url']);

    header("Location:" . $redirect_url);
} elseif ($_POST['action'] == "Minus To Cart") {
    $cart = new Cart();
    $cart->minusToCart($_POST['userID'], $_POST['productID'], $_POST['quantity']);

    session_start();
    $redirect_url = (isset($_SESSION['redirect_url'])) ? $_SESSION['redirect_url'] : '/';
    unset($_SESSION['redirect_url']);

    header("Location:" . $redirect_url);
} elseif ($_POST['action'] == "Remove") {
    $cart = new Cart();
    $cart->removeFromCart($_POST['userID'], $_POST['productID']);

    $user = $_POST['userID'];
    $url = "../index.php/cart?userid=$user";
    header("Location:" . $url);
} elseif ($_POST['action'] == "Empty Cart") {
    $cart = new Cart();
    $cart->emptyCart($_POST['userID']);

    $user = $_POST['userID'];
    $url = "../index.php/cart?userid=$user";
    header("Location:" . $url);
} elseif ($_POST['action'] == "Purchase") {
    include_once('../models/transaction.php');

    $transaction = new Transaction();
    $currentDate = new DateTime();
    $date = $currentDate->format('Y-m-d H:i:s');
    $transactionInfo = unserialize(base64_decode($_POST['transaction']));

    if ($transactionInfo && count($transactionInfo) > 0) {
        foreach ($transactionInfo as $item) {
            $transaction->makeTransaction($_POST['userID'], $item['pid'], $item['quantity'], $item['quantity'] * $item['price'], $date);
        }
    }

    $cart = new Cart();
    $cart->emptyCart($_POST['userID']);

    $user = $_POST['userID'];
    $url = "../index.php/cart?userid=$user";
    header("Location:" . $url);
}
