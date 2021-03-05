<?php
include 'includes/item.php';
include_once 'includes/catalogue.php';

$qty = intval($_GET['qty']);

if(!isset($_SESSION['cartItems'])) {
    $itemsArray = array();
    $_SESSION['cartItems'] = $itemsArray;
}

$_SESSION['article']->quantity = $qty;

if(count($_SESSION['cartItems']) > 0) {
    $isInCart = false;
    foreach($_SESSION['cartItems'] as $item) {
        if($item->name == $_SESSION['article']->name) {
            $item->quantity += $_SESSION['article']->quantity;
            $isInCart = true;
        }
    }
    if(!$isInCart) {
        array_push($_SESSION['cartItems'], $_SESSION['article']);
    }
} else {
    array_push($_SESSION['cartItems'], $_SESSION['article']);
}

header('location: cart_view.php?quantity='.$qty);
?>