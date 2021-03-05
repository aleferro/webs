<header class="main-header" style="background-color: whitesmoke">
  <nav class="navbar navbar-static-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="index.php" class="navbar-brand"><b>Bazaar Ceramics</b></a>
      </div>
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">HOME</a></li>
          <li><a href="about_us.php">ABOUT US</a></li>
          <li><a href="contact_us.php">CONTACT US</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">CATEGORY <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="products.php?category=home">Domestic Ware Collection</a></li>
              <li class="divider"></li>
              <li><a href="products.php?category=art">Individual Art Design</a></li>
            </ul>
          </li>
        </ul>
        <form method="POST" class="navbar-form navbar-left" action="search.php">
          <div class="input-group">
            <input type="text" class="form-control" id="navbar-search-input" name="keyword" placeholder="Search for Product" required>
              <span class="input-group-btn" id="searchBtn">
                <button type="submit" class="btn btn-default btn-flat"><span class="glyphicon glyphicon-search"></span> </button>
              </span>
          </div>
        </form>
      </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="cart_view.php">
              <i class="fa fa-shopping-cart"></i>
              <?php
              if(isset($_SESSION['cartItems'])) {
                if(count($_SESSION['cartItems'])>0){
                  $qty = 0;
                  foreach($_SESSION['cartItems'] as $item) {
                    $qty += $item->quantity;
                  }
                  echo "<span class='badge'>".$qty."</span>";
                }
              }
              ?>
            </a>
          </li>
          <?php
            if(isset($_SESSION['user'])){
              echo '
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="'.$user->img.'" class="user-image" width="30px" height="auto" alt="User Image">
                    <span class="hidden-xs">'.$user->first_name.'  '.$user->last_name.'</span>
                  </a>
                  <ul class="dropdown-menu">
                    </li>
                    <li class="user-footer">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </li>
                  </ul>
                </li>
              ';
            }
            else{
              echo "
                <li><a href='login.php'>Login</a></li>
                <li><a href='signup.php'>Signup</a></li>
              ";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>