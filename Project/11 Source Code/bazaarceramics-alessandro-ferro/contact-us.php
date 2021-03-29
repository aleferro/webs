<?php
include "inc/header.php";
include "inc/navbar.php";
?>
<div class="container-fluid bottom-10">
<div class="justify-content-center">
<br>
<iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3271.2684098930185!2d138.59779681495868!3d-34.924804782064236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ab0ced7c9d09355%3A0x417056fbca06ee08!2s90%20King%20William%20St%2C%20Adelaide%20SA%205067!5e0!3m2!1sen!2sau!4v1603334908333!5m2!1sen!2sau" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<div>
<i>Address: 90 King Williams st.<br>
Hours: 9.00am - 5.00pm<br>
Phone: 5555 555 555<br>
Email: www.bazaarceramics.com<br></i>
</div>
<form class="col-sm-6" action="send-message.php" method="POST">
<br><br>
  <div class="form-group">
    <?php
      if(isset($_SESSION['msgSendSuccess'])) {
        echo "<p class='text-success'>".$_SESSION['msgSendSuccess']."</p>";
        unset($_SESSION['msgSendSuccess']);
      }
      else if(isset($_SESSION['msgSendFail'])) {
        echo "<p class='text-danger'>".$_SESSION['msgSendFail']."</p>";
        unset($_SESSION['msgSendFail']);
      }
      else {
        echo "<p></p>";
      } 
    ?>
    <h6>Contact us</h6>
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control" name="msgName" id="msgName" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" name="msgEmail" id="msgEmail" placeholder="name@example.com" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Subject</label>
    <input type="text" class="form-control" name="msgSubject" id="msgSubject" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" name="msgBody" id="msgBody" rows="3" required></textarea>
  </div>
  <br>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Send</button>
    </div>
  </div>
</form>
<br>
<br>
</div>
<?php
include "inc/footer.php";
?>