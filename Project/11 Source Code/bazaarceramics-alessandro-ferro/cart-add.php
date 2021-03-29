<?php
include "inc/session.php";

$conn = $pdo->open();

$productId = $_POST['productId'];
$quantity = $_POST['quantity'];

if($quantity<1) {
    $quantity = 1;
}

// IF THE CUSTOMER HAS ALREADY PLACED AN ORDER A NEW ITEM MUST BE ADDED TO THE SHOPPING CART TO MAKE A NEW ORDER IN THE SAME SESSION
if(isset($_SESSION['preventPageRefresh'])) {
    unset($_SESSION['preventPageRefresh']);
}

if(isset($_SESSION['customer'])){
    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM item_cart WHERE userId=:user_id AND itemId=:product_id");
    $stmt->execute(['user_id'=>$_SESSION['customer'], 'product_id'=>$productId]);
    $row = $stmt->fetch();

    if($row['numrows'] < 1){
        try{

            $stmt = $conn->prepare("INSERT INTO item_cart (userId, itemId, quantity) VALUES (:user_id, :product_id, :quantity)");
            $stmt->execute(['user_id'=>$_SESSION['customer'], 'product_id'=>$productId, 'quantity'=>$quantity]);
            header("location: product-details.php?product=".$productId."&cart_response=added");
            
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    else{
        header("location: product-details.php?product=".$productId."&cart_response=already");
    }
}
else{
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    $exist = array();

    foreach($_SESSION['cart'] as $row){
        array_push($exist, $row['productId']);
    }

    if(in_array($productId, $exist)){
        header("location: product-details.php?product=".$productId."&cart_response=already");
    }
    else{
        $data['productId'] = $productId;
        $data['quantity'] = $quantity;

        if(array_push($_SESSION['cart'], $data)){
            header("location: product-details.php?product=".$productId."&cart_response=added");
        }
        else{
            header("location: product-details.php?product=".$productId."&cart_response=cannot");
        }
    }

}
$pdo->close();
?>