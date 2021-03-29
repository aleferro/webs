<?php
include "inc/header.php";
include "inc/navbar.php";
?>
<?php
$conn = $pdo->open();

$productId = $_GET['product'];
if(isset($_GET['cart_response'])) {
  $cart_response = $_GET['cart_response'];
}
else {
  $cart_response = "";
}

// foreach($_SESSION['cart'] as $row) {
//   echo $row['productId'];
// }
try{
  
  $stmt = $conn->prepare("SELECT * FROM products WHERE productId = :productId");
  $stmt->execute(['productId' => $productId]);
  $row = $stmt->fetch();

  $productName = $row['productName'];
  $productImage = $row['productImage'];
  $description = $row['description'];
  $size = $row['size'];
  $price = $row['price'];
  $glazeType = $row['glazeType'];

  echo "
    <h1 class='d-flex justify-content-center display-5'>".$productName."</h1>
    <br>
    ";
  
  switch ($cart_response) {
    case "added":
        echo "<p class='text-success'>*Item Added to Shopping Cart</p>";
        break;
    case "already":
        echo "<p class='text-warning'>*Item already in the Shopping Cart</p> ";
        break;
    case "cannot":
        echo "<p class='text-danger'>*Item cannot be added to the Shopping Cart</p>";
        break;
    default:
        echo "<p></p>";
  }

  echo "
    <div class='card' style='max-width: 50%;'>
      <img class='card-img-top' src='".$productImage."' alt='Product'>
      <div class='card-body'>
      <p class='card-title'>".$description."</p>
        <ul class='no-bullets-left'>
          <li class='card-text'><small>Size: ".$size."</small></li>
          <li class='card-text'><small>Glaze type: ".$glazeType."</small></li>
        </ul>
        <form method='POST' action='cart-add.php'>
          <ul class='no-bullets-right'>
            <input type='hidden' id='productId' name='productId' value='".$productId."'>
            <li><input class='form-control' type='text' id='quantity' name='quantity' placeholder='Qty'></li>
            <li><p>".$price."</p></li>
            <li><button type='submit' class='btn btn-primary'>Add to cart</button></li>
          </ul>
        </form>
      </div>
    </div>
  ";
}
catch(PDOException $e){
  echo "There are problems with the connection: " . $e->getMessage();
}
?>
<?php
include "inc/footer.php";
?>