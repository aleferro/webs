<?php
include "inc/header.php";
include "inc/navbar.php";

$conn = $pdo->open();
$totalPrice = 0;
?>
<form action='checkout.php' method='POST'>
<div class="container-fluid bottom-10">
<h1 class="d-flex justify-content-center display-5">Shopping Cart</h1>
<div class="container mt-5 p-3 rounded cart">
    <div class="row no-gutters">
        <div class="col-md-8">
            <div class="product-details mr-2">
                <div class="d-flex flex-row align-items-center"><i class="fa fa-long-arrow-left"></i><span class="ml-2">Continue Shopping</span></div>
                <hr>
                <div class="d-flex justify-content-between"><span>Items in cart</span>
                    <div class="d-flex flex-row"><span class="text-black-50">Quantity/</span>
                        <div class="price"><span>Price per Unit</span><i class="fa fa-angle-down"></i></div>
                    </div>
                    <div class="m-4"></div>
                </div>
                <?php
                    if(isset($_SESSION['customer'])) {
                        try {
                            $stmt = $conn->prepare("SELECT item_cart.userId, item_cart.itemId, item_cart.quantity, products.productImage, products.productName, products.price FROM item_cart INNER JOIN products ON item_cart.itemId = products.productId WHERE userId=:userId");
                            $stmt->execute(['userId'=>$_SESSION['customer']]);

                            foreach($stmt as $row) {
                                echo "
                                      <div class='d-flex justify-content-between align-items-center mt-3 p-2 items rounded'>
                                        <div class'd-flex flex-row'><img class='rounded' src='".$row['productImage']."' width='40' height='auto' alt='item image' >
                                            <div><span class='font-weight-bold d-block'>".$row['productName']."</span></div>
                                        </div>
                                        <div class='d-flex flex-row align-items-left'>
                                            <span class='d-block text-black-50'><input type='text' class='quantityInCart' id='".$row['itemId']."ID".$row['userId']."' onBlur='changeItemQuantityDB(".$row['itemId'].", ".$row['userId'].");' value='".$row['quantity']."'></span>&nbsp &nbsp
                                            <span class='d-block font-weight-bold'>$".$row['price']."</span>
                                        </div>
                                        <a href='cart-delete.php?product=".$row['itemId']."'><span><img width='30' src='img/remove.svg' /></span></a>
                                      </div>
                                      ";
                                      $totalPrice += $row['quantity']*$row['price'];
                                      $_SESSION['totalPrice'] = $totalPrice;
                            }
                        }
                        catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                    }
                    else if(isset($_SESSION['cart'])) {
                    
                        foreach($_SESSION['cart'] as $row) {
                            $stmt = $conn->prepare("SELECT productImage, productName, price FROM products WHERE productId =:productId");
                            $stmt->execute(['productId'=>$row['productId']]);
                            foreach($stmt as $dataRow) {
                                echo "<div class='d-flex justify-content-between align-items-center mt-3 p-2 items rounded'>
                                        <div class'd-flex flex-row'><img class='rounded' src='".$dataRow['productImage']."' width='40' height='auto' alt='item image'>
                                            <div><span class='font-weight-bold d-block'>".$dataRow['productName']."</span></div>
                                        </div>
                                        <div class='d-flex flex-row align-items-left'>
                                            <span class='d-block text-black-50'><input type='text' class='quantityInCart' id='".$row['productId']."' onBlur='changeItemQuantitySession(".$row['productId'].");' value='".$row['quantity']."'></span>&nbsp &nbsp
                                            <span class='d-block font-weight-bold'>$".$dataRow['price']."</span>
                                        </div>
                                        <a href='cart-delete.php?product=".$row['productId']."'><span><img width='30' src='img/remove.svg' /></span></a>
                                      </div>
                                      ";
                                      $totalPrice += $row['quantity']*$dataRow['price'];
                                      $_SESSION['totalPrice'] = $totalPrice;
                            }
                        }
                    }
                    else {
                        echo "<h5>There are no items in your shopping cart</h5>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- TOAST MESSAGE -->
<div class="toast align-items-center" id="cartToast" data-delay="1250" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body" id="cartToastMessage"></div>
    </div>
</div>
<!-- Checkout embedded in shopping cart for version 2 -->
<div class="container mt-5 p-3 rounded cart">
    <div class="row no-gutters">
    <h1 class="d-flex justify-content-center display-5">Checkout</h1>
    <div class="col-md-4">
    <br>
    <fieldset>
    <legend>Shipping details</legend>
        <div><label>Address</label><input type="text" name="address-line" class="form-control" placeholder="1 Bazaar St." required></div>
        <div><label>City</label><input type="text" name="city" class="form-control" placeholder="Sydney" required></div>
        <div><label>Postal Code</label><input type="text" name='postal-code' class="form-control" placeholder="1000" required></div>
        <div><label>Region</label><input type="text" name='region' class="form-control" placeholder="NSW"></div>
        <div><label>Country</label><input type="text" name='country' class="form-control" placeholder="Australia" required></div>
    </fieldset>
    <br>
    <fieldset>
    <legend>Payment options</legend>
    <div>
        <div id="paypal-button-container"></div>
        <a class="btn btn-primary w-100" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Credit Card
        </a>
    </div>
    <div class="collapse" id="collapseExample">
    <div class="card card-body">
        <div><label>Name on card</label><input type="text" class="form-control" placeholder="Name" required></div>
        <div><label>Card number</label><input type="text" class="form-control" placeholder="0000 0000 0000 0000" required></div>
        <div class="row">
            <div class="col-md-6"><label>Date</label><input type="text" class="form-control" placeholder="12/24" required></div>
            <div class="col-md-6"><label>CVV</label><input type="text" class="form-control" placeholder="342" required></div>
        </div>
    </div>
    <?php
    if(!isset($_SESSION['customer'])) {
        echo "<p class='text-info'><b>Sign in to proceed to checkout</b></p>";
    }
    else if($totalPrice < 1) {
        echo "<p class='text-info'><b>There are no items in your cart</b></p>";
    }
    else {
        echo "<button class='btn btn-primary btn-block d-flex justify-content-between mt-3' type='submit'><span>$".$totalPrice."&nbsp;</span><span>Pay Now</button>";
    }
    ?>
    
    </div>


        <hr class="line">
        <div class="d-flex justify-content-between information"><span>Total(Incl. taxes)</span><span><?php echo "$".$totalPrice ?></span></div>
    </fieldset>
      </div>
    </div>
</div>
</div>
</form>
<br>

<script src="https://www.paypal.com/sdk/js?client-id=test&disable-funding=credit,card"></script>
<script>paypal.Buttons().render("#paypal-button-container");</script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<?php
$pdo->close();

include "inc/footer.php";
?>
