<?php
include "inc/header.php";
include "inc/navbar.php";
?>
<?php
$prodName = "Product Name";
$prodPrice = "$50.00";
$viewDetails = "Go to Details";
?>
<div class="container-fluid bottom-20">
<img src="img/banner.jpg" class="img-fluid mx-auto d-block col-sm-10" alt="Image of a face on a pot">
<h1 class="d-flex justify-content-center display-5">Special Offers</h1>
<div class="d-flex justify-content-center" style="margin: 4% 5%">
  <div class="card col-sm-3" style="margin-right:2%; margin-bottom:2%">
    <img class="card-img" src="img/pottery1.jpg" alt="Card image">
    <div class="card-img-overlay">
      <h5 class="card-title"><img src="img/ribbon.png" style="max-width:100%; height:auto;" alt='golden ribbon'></h5>
    </div>
    <div class="text-center">
      <h7>Item name</h7><br>
      <small>$50.00</small>
    </div>
  </div>
  <div class="card col-sm-3" style="margin-right:2%; margin-bottom:2%">
    <img class="card-img" src="img/pottery2.jpg" alt="Card image">
    <div class="card-img-overlay">
      <h5 class="card-title"><img src="img/ribbon.png" style="max-width:100%; height:auto;" alt='golden ribbon'></h5>
    </div>
    <div class="text-center">
      <h7>Item name</h7><br>
      <small>$50.00</small>
    </div>
  </div>
  <div class="card col-sm-3" style="margin-right:2%; margin-bottom:2%">
    <img class="card-img" src="img/pottery3.jpg" alt="Card image">
    <div class="card-img-overlay">
      <h5 class="card-title"><img src="img/ribbon.png" style="max-width:100%; height:auto;" alt='golden ribbon'></h5>
    </div>
    <div class="text-center">
      <h7>Item name</h7><br>
      <small>$50.00</small>
    </div>
  </div>
</div>
<div class="d-flex flex-row justify-content-center" style="margin: 4% 5%">
<div class="card col-sm-3" style="margin-right:2%; margin-bottom:2%">
    <img class="card-img" src="img/pottery4.jpg" alt="Card image">
    <div class="card-img-overlay">
      <h5 class="card-title"><img src="img/ribbon.png" style="max-width:100%; height:auto;" alt='golden ribbon'></h5>
    </div>
    <div class="text-center">
      <h7>Item name</h7><br>
      <small>$50.00</small>
    </div>
  </div>
  <div class="card col-sm-3" style="margin-right:2%; margin-bottom:2%">
    <img class="card-img" src="img/pottery8.jpg" alt="Card image">
    <div class="card-img-overlay">
      <h5 class="card-title"><img src="img/ribbon.png" style="max-width:100%; height:auto;" alt='golden ribbon'></h5>
    </div>
    <div class="text-center">
      <h7>Item name</h7><br>
      <small>$50.00</small>
    </div>
  </div>
  <div class="card col-sm-3" style="margin-right:2%; margin-bottom:2%">
    <img class="card-img" src="img/pottery10.jpg" alt="Card image">
    <div class="card-img-overlay">
      <h5 class="card-title"><img src="img/ribbon.png" style="max-width:100%; height:auto;" alt='golden ribbon'></h5>
    </div>
    <div class="text-center">
      <h7>Item name</h7><br>
      <small>$50.00</small>
    </div>
  </div>
</div>
<a class="nav-link text-secondary" href="products.php?category=homeware"><p class="text-center">View Products</p></a>
<br>
<h5 class="d-flex justify-content-center">Upcoming Exhibitions</h5>
<br>
<div class="d-flex">
<img src="img/banner-event.jpg" class="img-fluid mx-auto d-block col-sm-10" alt="events banner">
</div>
</div>
<?php
include "inc/footer.php";
?>