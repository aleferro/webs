<?php
include 'includes/users.php';
include 'includes/header.php';

if(isset($_POST) & !empty($_POST)){
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_STRING);
	
    header("location: contact_us.php?message=1");
}
?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
	<?php include 'includes/navbar.php'; ?>
	<div class="content-wrapper">
	    <div class="container">

	        <!-- Main content -->
	        <section class="content">
	            <div class="row">
				    <div class='col-sm-9'>
                    <h1 class="page-header">Contact Us</h1>
						  </div>
						  <div class="row" style="padding-top: 20px;">
						      <div class="col-md-6 mt-3 contact-widget-section2 wow animated fadeInLeft" data-wow-delay=".2s">
                              <iframe class="embed-responsive-item" width="500" height="375" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3271.2684098930185!2d138.59779681495868!3d-34.924804782064236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ab0ced7c9d09355%3A0x417056fbca06ee08!2s90%20King%20William%20St%2C%20Adelaide%20SA%205067!5e0!3m2!1sen!2sau!4v1603334908333!5m2!1sen!2sau" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

						        <div style="padding: 10px 0px">
                                <h4><b>Downhill Downunder</b></h4>
						        </div>
						        <div style="padding: 2px 20px">
						         <i>Address:</i> 90 King Willian, Adelaide SA, 5000
						        </div>
						        <div style="padding: 2px 20px">
						          <i>Phone:</i> 5555 555 555
						        </div>
						        <div style="padding: 2px 20px">
						          <i>Website:</i> www.bazaarceramics.com.au
						        </div>
						        <div style="padding: 2px 20px">
						           <i>Hours:</i> Mon to Fri: 09:30 AM - 5.30 PM / Sat: 9.30 AM - 12.00 PM
						        </div>
						      </div>
                    <!-- contact form -->
						      <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
						          <form class="shake" role="form" method="post" id="contactForm" name="contact-form" data-toggle="validator">
						              <div class="form-group">
						                  <!-- Message code -->
						                  <?php if(isset($_GET['message'])){
											if($_GET['message'] == 1){
											 	?><div class="alert alert-success" role="alert">Your message has been sent!</div>
											 <?php } elseif ($_GET['message'] == 2) {
											 	?><div class="alert alert-danger" role="alert">Your message could not be sent</div>
											 <?php } }
											 ?>
						              </div>
						              <div class="form-group label-floating">
						                <label class="control-label" for="name">Name<span style="color:red"> *</span></label>
						                <input class="form-control" id="name" type="text" maxlength="100" name="name" required data-error="Please enter your name">
						                <div class="help-block with-errors"></div>
						              </div>
						              <div class="form-group label-floating">
						                <label class="control-label" for="email">Email<span style="color:red"> *</span></label>
						                <input class="form-control" id="email" type="email" maxlength="100" name="email" required data-error="Please enter your Email">
						                <div class="help-block with-errors"></div>
						              </div>
						              <div class="form-group label-floating">
						                <label class="control-label">Subject<span style="color:red"> *</span></label>
						                <input class="form-control" id="msg_subject" type="text" maxlength="200" name="subject" required data-error="Please enter your message subject">
						                <div class="help-block with-errors"></div>
						              </div>
						              <div class="form-group label-floating">
						                  <label for="message" class="control-label">Message<span style="color:red"> *</span></label>
						                  <textarea class="form-control" rows="3" id="body" name="body" maxlength="700" required data-error="Write your message"></textarea>
						                  <div class="help-block with-errors"></div>
						              </div>
						              <div class="form-submit mt-5">
						                  <button class="btn btn-primary btn-lg btn-block" type="submit" id="form-submit"> Send Message</button>
						                  <div id="msgSubmit" class="h3 text-center hidden"></div>
						                  <div class="clearfix"></div>
						              </div>
						          </form>
						      </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</div>
</body>
</html>