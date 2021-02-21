<?php
	session_start();
	require_once 'config/connect.php';
	include 'inc/header.php';
	include 'inc/nav.php'; 

	if(isset($_POST) & !empty($_POST)){
		$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
		$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
		$sql = "INSERT INTO contactmessage (name, email,  subject, message) VALUES ('$name', '$email', '$subject', '$message')";
		$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

		if($result){
			//Success
			header("location: contact-us.php?message=1");
		}else{
			//Error
			header("location: contact-us.php?message=2");
		}
	}
?>

	<!-- CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<h1 class="page-header"><?php echo _TELL_US; ?></h1>
					
					 <section class="Material-contact-section section-padding section-dark">
						<div class="container">
						  <div class="row" style="padding-top: 20px;">
						      <div class="col-md-6 mt-3 contact-widget-section2 wow animated fadeInLeft" data-wow-delay=".2s">
							  <iframe class="embed-responsive-item" width="500" height="375" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3271.2684098930185!2d138.59779681495868!3d-34.924804782064236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ab0ced7c9d09355%3A0x417056fbca06ee08!2s90%20King%20William%20St%2C%20Adelaide%20SA%205067!5e0!3m2!1sen!2sau!4v1603334908333!5m2!1sen!2sau" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
								<p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
								<br><br>
								<div class="find-widget" style="padding-left: 10px">
						        <p><b><?php echo _ADDRESS; ?>:</b> <i>90 King Willian, Adelaide SA, 5000</i></p>
						        </div>
						        <div class="find-widget" style="padding-left: 10px">
								<p><b><?php echo _PHONE; ?>:</b>  <i>555 5555 55555</i></p>
						        </div>
						        
						        <div class="find-widget" style="padding-left: 10px">
								<p><b><?php echo _WEBSITE; ?>:</b>  <i>www.learnertoolbox.com.au</i></p>
						        </div>
						        <div class="find-widget" style="padding-left: 10px">
								<p><b><?php echo _HOURS; ?>:</b> <i><?php echo _OPENING_HOURS; ?></i></p>
						        </div>
						      </div>
						      <!-- contact form -->
						      <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
						          <form class="shake" role="form" method="post" id="contactForm" name="contact-form" data-toggle="validator">
						          	<!-- After submit -->
						              <div class="form-group">
						                  <!-- Aqui -->
						                  <?php if(isset($_GET['message'])){
											if($_GET['message'] == 1){
											 	?><div class="alert alert-success" role="alert"><?php echo _SUCCESSFUL_SEND; ?></div>
											 <?php } elseif ($_GET['message'] == 2) {
											 	?><div class="alert alert-danger" role="alert"><?php echo _FAILED_SEND; ?></div>
											 <?php } }
											 ?>
						              </div>
						              <!-- Name -->
						              <div class="form-group label-floating">
						                <label class="control-label" for="name"><?php echo _NAME; ?><span style="color:red"> *</span></label>
						                <input class="form-control" id="name" type="text" maxlength="100" name="name" required data-error="Please enter your name">
						                <div class="help-block with-errors"></div>
						              </div>
						              <!-- email -->
						              <div class="form-group label-floating">
						                <label class="control-label" for="email"><?php echo _EMAIL; ?><span style="color:red"> *</span></label>
						                <input class="form-control" id="email" type="email" maxlength="100" name="email" required data-error="Please enter your Email">
						                <div class="help-block with-errors"></div>
						              </div>
						              <!-- Subject -->
						              <div class="form-group label-floating">
						                <label class="control-label"><?php echo _SUBJECT; ?><span style="color:red"> *</span></label>
						                <input class="form-control" id="msg_subject" type="text" maxlength="200" name="subject" required data-error="Please enter your message subject">
						                <div class="help-block with-errors"></div>
						              </div>
						              <!-- Message -->
						              <div class="form-group label-floating">
						                  <label for="message" class="control-label"><?php echo _MESSAGE; ?><span style="color:red"> *</span></label>
						                  <textarea class="form-control" rows="3" id="message" name="message" maxlength="700" required data-error="Write your message"></textarea>
						                  <div class="help-block with-errors"></div>
						              </div>
						              <!-- Form Submit -->
						              <div class="form-submit mt-5">
						                  <button class="btn btn-common" type="submit" id="form-submit"><i class="material-icons mdi mdi-message-outline"></i><?php echo _SEND_MESSAGE; ?></button>
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
		</div>
	</section>
<?php include 'inc/footer.php' ?>