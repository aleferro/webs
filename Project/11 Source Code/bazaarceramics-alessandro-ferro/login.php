<?php
include "inc/header.php";
include "inc/navbar.php";
?>
<div class="container-fluid bottom-20">
<h1 class="d-flex justify-content-center display-5">Login</h1>
<br>
<?php
  if(isset($_SESSION['error'])){
    echo "
      <div class='callout-error'>
        <p class='text-danger'>".$_SESSION['error']."</p> 
      </div>
    ";
    unset($_SESSION['error']);
  }
  if(isset($_SESSION['success'])){
    echo "
      <div class='callout-success'>
        <p class='text-success'>".$_SESSION['success']."</p> 
      </div>
    ";
    unset($_SESSION['success']);
  }
?>
<form action="verify.php" method="POST">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control w-25" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control w-25" id="password" name="password" placeholder="Password">
  </div>
  <br>
  <button type="submit" class="btn btn-primary" name="login">Submit</button>
</form>
<div class="text-warning" id="errorMessage"></div>
</div>
<?php
include "inc/footer.php";
?>