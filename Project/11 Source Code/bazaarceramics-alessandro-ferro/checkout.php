<?php
include "inc/header.php";
include "inc/session.php";

$conn = $pdo->open();

$orderId = "";

?>
<div class="container-fluid bottom-30">
<h1 class="d-flex justify-content-center display-5">Order details</h1>
<?php
if(isset($_SESSION['customer'])) {
    
    // ENSURE THAT UPON REFRESHING THE PAGE, A NEW ORDER IS NOT CREATED. THE SESSION IS UNSET IN cart-add.php
    if(!isset($_SESSION['preventPageRefresh'])) {

        $_SESSION['preventPageRefresh'] = $_SESSION['customer'];

        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM address WHERE userId=:userId");
        $stmt->execute(['userId'=>$_SESSION['customer']]);
        $row = $stmt->fetch();
    
        // ADD ADDRESS TO DATABASE
        if($row['numrows'] < 1) {
            try{
                $stmt = $conn->prepare("INSERT INTO address(userId, addressLine, city, postalCode, region, country) VALUES (:userId, :addressLine, :city, :postalCode, :region, :country)");
                $stmt->execute(['userId'=>$_SESSION['customer'], 'addressLine'=>$_POST['address-line'], 'city'=>$_POST['city'], 'postalCode'=>$_POST['postal-code'], 'region'=>$_POST['region'], 'country'=>$_POST['country']]);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    
        // ADD ORDER TO DATABASE
        try {
            $stmt = $conn->prepare("INSERT INTO orders(customerId, totalPrice) VALUES (:customerId, :totalPrice)");
            $stmt->execute(['customerId'=>$_SESSION['customer'], 'totalPrice'=>$_SESSION['totalPrice']]);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    
        // RETRIEVE THE ORDER ID FOR THIS ORDER
        try {
            $stmt = $conn->prepare("SELECT orderId FROM orders WHERE customerId = ".$_SESSION['customer']." ORDER BY orderId DESC LIMIT 1");
            $stmt->execute();
    
            $orderId = $stmt->fetchColumn();
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        } 
    
        // ADD ORDER DETAILS
        try {
            $stmt = $conn->prepare("SELECT item_cart.userId, item_cart.itemId, item_cart.quantity, products.productName, products.price FROM item_cart INNER JOIN products ON item_cart.itemId = products.productId WHERE userId=:userId");
            $stmt->execute(['userId'=>$_SESSION['customer']]);
    
            foreach($stmt as $row) {
                $stmt2 = $conn->prepare("INSERT INTO order_details(itemId, orderId, quantity, unitPrice) VALUES (:itemId, :orderId, :quantity, :price)");
                $stmt2->execute(['itemId'=>$row['itemId'], 'orderId'=>$orderId, 'quantity'=>$row['quantity'], 'price'=>$row['price']]);
            }
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    
        // RETRIEVE AND DISPLAY THE ORDER DETAILS TO THE CUSTOMER
        try {
            $stmt = $conn->prepare("SELECT order_details.*, products.productName FROM order_details INNER JOIN products ON order_details.itemId = products.productId WHERE orderId = :orderId");
            $stmt->execute(['orderId'=>$orderId]);
    
            echo "
                <div class='d-flex justify-content-center mt-5'>
                    <div class='card w-25'>
                        <div class='card-body'>
                            <h4 class='card-title mt-2'>ORDER #".$orderId."</h4>
                            <hr>
            ";
            foreach($stmt as $row) {
                echo "
                    <p class='card-text'><i>PRODUCT</i>:&nbsp".$row['productName']."</p>
                    <p class='card-text'><i>QUANTITY</i>:&nbsp".$row['quantity']."</p>
                    <p class='card-text'><i>PRICE</i>:&nbsp".$row['unitPrice']."</p>
                    <hr>
                ";
            }
             echo "
                            <a class='btn btn-primary' type='input' href='index.php'>Back to Browsing</a>
                        </div>
                    </div>
                </div>
             ";        
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    else {
        echo "
            <div class='center-page'>
                <p class='text-info'>*There is no order to show*</p>
                <a class='btn btn-primary' type='input' href='index.php'>Back to Browsing</a>
            </div>
            ";
    }
}
else {
    header("location: index.php");
}

try {
    $stmt = $conn->prepare("DELETE FROM item_cart WHERE userId=:userId");
    $stmt->execute(['userId'=>$_SESSION['customer']]);
}
catch(PDOException $e) {
    echo $e->getMessage();
}

?>
</div>
<?php
$pdo->close();
include "inc/footer.php";
?>