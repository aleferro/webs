<?php
include "inc/header.php";
include "inc/navbar.php";
?>
<div class="container-fluid" style="margin-bottom:10%;">
<h1 class="d-flex justify-content-center display-5">Shopping Cart</h1>
<div class="container mt-5 p-3 rounded cart">
    <div class="row no-gutters">
        <div class="col-md-8">
            <div class="product-details mr-2">
                <div class="d-flex flex-row align-items-center"><i class="fa fa-long-arrow-left"></i><span class="ml-2">Continue Shopping</span></div>
                <hr>
                <div class="d-flex justify-content-between"><span>You have 4 items in your cart</span>
                    <div class="d-flex flex-row align-items-center"><span class="text-black-50">Sort by:</span>
                        <div class="price ml-2"><span class="mr-1">price</span><i class="fa fa-angle-down"></i></div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                    <div class="d-flex flex-row"><img class="rounded" src="img/pottery1.jpg" width="40">
                        <div class="ml-2"><span class="font-weight-bold d-block">Pottery</span><span class="spec">Pottery maker</span></div>
                    </div>
                    <div class="d-flex flex-row align-items-left"><span class="d-block">2 &nbsp</span><span class="d-block ml-5 font-weight-bold">$50</span><i class="fa fa-trash-o ml-3 text-black-50"></i></div>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                    <div class="d-flex flex-row"><img class="rounded" src="img/pottery1.jpg" width="40">
                        <div class="ml-2"><span class="font-weight-bold d-block">Pottery</span><span class="spec">Pottery maker</span></div>
                    </div>
                    <div class="d-flex flex-row align-items-center"><span class="d-block">2 &nbsp</span><span class="d-block ml-5 font-weight-bold">$50</span><i class="fa fa-trash-o ml-3 text-black-50"></i></div>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                    <div class="d-flex flex-row"><img class="rounded" src="img/pottery1.jpg" width="40">
                        <div class="ml-2"><span class="font-weight-bold d-block">Pottery</span><span class="spec">Pottery maker</span></div>
                    </div>
                    <div class="d-flex flex-row align-items-center"><span class="d-block">1 &nbsp</span><span class="d-block ml-5 font-weight-bold">$50</span><i class="fa fa-trash-o ml-3 text-black-50"></i></div>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                    <div class="d-flex flex-row"><img class="rounded" src="img/pottery1.jpg" width="40">
                        <div class="ml-2"><span class="font-weight-bold d-block">Pottery&nbsp;</span><span class="spec">Pottery maker</span></div>
                    </div>
                    <div class="d-flex flex-row align-items-center"><span class="d-block">1 &nbsp</span><span class="d-block ml-5 font-weight-bold">$50</span><i class="fa fa-trash-o ml-3 text-black-50"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Checkout embedded in shopping cart for version 2 -->
<div class="container mt-5 p-3 rounded cart">
    <div class="row no-gutters">
    <h1 class="d-flex justify-content-center display-5">Checkout</h1>
    <div class="col-md-4">
      <div class="d-flex justify-content-between align-items-center"></div><span class="type d-block mt-3 mb-1">Card type</span><label class="radio"> <input type="radio" name="card" value="payment" checked> <span><img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png" /></span> </label>
        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/visa.png" /></span> </label>
        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/ultraviolet/48/000000/amex.png" /></span> </label>
        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/paypal.png" /></span> </label>
        <div><label>Name on card</label><input type="text" class="form-control" placeholder="Name"></div>
        <div><label>Card number</label><input type="text" class="form-control" placeholder="0000 0000 0000 0000"></div>
        <div class="row">
          <div class="col-md-6"><label>Date</label><input type="text" class="form-control" placeholder="12/24"></div>
          <div class="col-md-6"><label>CVV</label><input type="text" class="form-control" placeholder="342"></div>
        </div>
          <hr class="line">
          <div class="d-flex justify-content-between information"><span>Subtotal</span><span>$200.00</span></div>
          <div class="d-flex justify-content-between information"><span>Shipping</span><span>$5.00</span></div>
          <div class="d-flex justify-content-between information"><span>Total(Incl. taxes)</span><span>$205.00</span></div>
          <button class="btn btn-primary btn-block d-flex justify-content-between mt-3" type="button"><span>$205.00</span><span>Checkout<i class="fa fa-long-arrow-right ml-1"></i></span></button>
      </div>
    </div>
</div>
</div>
<br>
<?php
include "inc/footer.php";
?>