<?php
include "inc/header.php";
include "inc/navbar.php";
?>
<div class="container-fluid" style="margin-bottom:20%;">
<h1 class="d-flex justify-content-center display-5">Login</h1>
<br>
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control w-25" id="email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control w-25" id="password" placeholder="Password">
  </div>
  <br>
  <!-- Button momentarily moved outside form to allow redirect for prototyping purpose -->
</form>
<button type="submit" class="btn btn-primary" onclick="signIn()">Submit</button>
<div class="text-warning" id="errorMessage"></div>
</div>
<?php
include "inc/footer.php";
?>