<?php
include 'includes/item.php';
include 'includes/session.php';

$productName = $_GET['product'];

$indexToRemove = -1;
$j = count($_SESSION['cartItems']);

for($i=0; $i<$j; $i++) {
    if($_SESSION['cartItems'][$i]->name==$productName) {
        $indexToRemove = $i;
    }
}
if($indexToRemove >= 0) {
    array_splice($_SESSION['cartItems'], $indexToRemove, 1);
}

header('location: cart_view.php');

?>