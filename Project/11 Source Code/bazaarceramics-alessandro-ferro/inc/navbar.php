<?php
include "inc/session.php";
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Bazaar Ceramics</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="about-us.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact-us.php">Contacts</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="products.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
             $conn = $pdo->open();
             try{
               $stmt = $conn->prepare("SELECT * FROM categories");
               $stmt->execute();
               foreach($stmt as $row){
                 echo "
                   <a class='dropdown-item' href='products.php?category=".$row['description']."'>".$row['description']."</a>
                 ";                  
               }
             }
             catch(PDOException $e){
               echo "Problems with the connection: " . $e->getMessage();
             }

             $pdo->close();
           ?>
          </div>
        </li>
        <form method="POST" class="d-flex" action="search.php">
          <input id="search-input" class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
          <button id="search-button" class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </ul>
      <div class="d-flex">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li><div class="ml-auto p-2"><a href="shopping-cart.php"><span><img width="30" src="https://img.icons8.com/officel/48/000000/shopping-cart.png" alt='cart icon' /></span></a></div></li>
      <?php
        if(isset($_SESSION['customer']) || isset($_SESSION['admin'])) {
          echo "<li><p class='text-center'><a class='nav-link text-secondary' href='logout.php'>Sign out</a></p></li>";
        }
        else {
          echo "
          <li><p class='text-center'><a class='nav-link text-secondary' href='login.php'>Sign in</a></p></li>
          <li><p class='text-center'><a class='nav-link text-secondary' href='signup.php'>Sign up</a></p></li>
          ";
        }
      ?>    
      </ul>
    </div> 
    </div>
</nav>