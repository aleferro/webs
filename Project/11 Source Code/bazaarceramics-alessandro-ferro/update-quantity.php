<?php
include "inc/session.php";

$conn = $pdo->open();

if(isset($_POST['itemInCartId'])) {

    $itemInCart = $_POST['itemInCartId'];

    if(!isset($_SESSION['cart'])) {

        if(isset($_POST['userCartId'])&&isset($_POST['newQuantity'])&&$_POST['newQuantity']>0) {

            $userCartId = $_POST['userCartId'];
            $newQuantity = $_POST['newQuantity'];
    
            try{
                $stmt = $conn->prepare("UPDATE item_cart SET quantity =:newquantity WHERE itemId =:itemid AND userId =:userid");
                $stmt->execute(['newquantity'=>$newQuantity, 'itemid'=>$itemInCart, 'userid'=>$userCartId]);
                echo 1;
            }
            catch(PDOException $e) {
                $e->getMessage();
                echo $e;
            }
        }
    }
    else {
        if(isset($_POST['newQuantity']) && $_POST['newQuantity']>0) {
            $newQuantity = $_POST['newQuantity'];
            $itemInCart = $_POST['itemInCartId'];
            $counter = 0;

            foreach($_SESSION['cart'] as $row) {
                if($row['productId'] == $itemInCart) {
                    $_SESSION['cart'][$counter]['quantity'] = $newQuantity;
                }
                $counter++;
            }

            echo 1;
        }
    }
}

$pdo->close();

?>