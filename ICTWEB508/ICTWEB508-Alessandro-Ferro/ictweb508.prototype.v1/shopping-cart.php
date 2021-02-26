<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5" />
	<meta name="description" content="Bazaar Ceramics prototype">
	<meta name="author" content="aleferro">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Bazaar Ceramics prototype</title>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Bazaar Ceramics</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="about-us.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact-us.php">Contact Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="products.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="products.php">New</a></li>
            <li><a class="dropdown-item" href="products.php">Second Hand</a></li>
            <li><a class="dropdown-item" href="products.php">Digital</a></li>
            <li><a class="dropdown-item" href="products.php">Material</a></li>
          </ul>
        </li>
        <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      </ul>
      <div class="d-flex">
      <div class="ml-auto p-2"><a href="shopping-cart.php"><span><img width="30" src="https://img.icons8.com/officel/48/000000/shopping-cart.png" /></span></a></div>
    </div> 
    </div>
</nav>
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
    <br>
    <a href="checkout.php" class="btn btn-primary">Checkout</a>
</div>


<br>
<footer class="footer static-bottom">
<br>
  <div class="container-fluid bg-light">
    <span class="text-muted">All rights reserved.</span>
  </div>
</footer>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>