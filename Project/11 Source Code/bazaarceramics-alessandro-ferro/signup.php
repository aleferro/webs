<?php
include "inc/header.php";
include "inc/navbar.php";
?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }
?>
<div class="container-fluid bottom-20">
<h1 class="d-flex justify-content-center display-5">Register</h1>
<br>
<?php
  if(isset($_SESSION['error'])){
      echo "
        <div class='text-danger'>
          <p>".$_SESSION['error']."</p> 
        </div>
      ";
    unset($_SESSION['error']);
  }

  if(isset($_SESSION['success'])){
      echo "
        <div class='text-success'>
          <p>".$_SESSION['success']."</p> 
        </div>
      ";
      unset($_SESSION['success']);
  }
?>
<form action="register.php" method="POST">
  <div class="form-group">
    <label for="firstName">First Name</label>
    <input type="text" class="form-control w-25" id="firstname" name="firstname"  placeholder="Enter First Name" required>
  </div>
  <div class="form-group">
    <label for="lastName">Last Name</label>
    <input type="text" class="form-control w-25" id="lastname" name="lastname"  placeholder="Enter Last Name" required>
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control w-25" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control w-25" id="password" name="password" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="rePassword1">Retype Password</label>
    <input type="password" class="form-control w-25" id="repassword" name="repassword" placeholder="Retype Password" required>
  </div>
  <br>
  <button type="submit" class="btn btn-primary" name="signup">Submit</button>
</form>
</div>
<?php
include "inc/footer.php";
?>

