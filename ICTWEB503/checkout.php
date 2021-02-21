<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue-light layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
          <br><br><br>
	        <div class="row">
	        	<div class="col-sm-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <h3 class="text-center">Payment Details</h3><br>
                            <row>
                                <div class="col-sm-2"><img class="img-responsive images" width='40' height='auto' src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Mastercard-Curved.png"></div>
                                <div class="col-sm-2"><img class="img-responsive images" width='40' height='auto' src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Discover-Curved.png"></div>
                                <div class="col-sm-2"><img class="img-responsive images" width='40' height='auto' src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Paypal-Curved.png"></div>
                                <div class="col-sm-2"><img class="img-responsive images" width='40' height='auto' src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/American-Express-Curved.png"></div>
                            </row>
                        </div>
                    </div>
                    <form role="form">
                      <div class="panel-body">      
                        <div class="row">
                          <div class="col-xs-12">
                            <div class="form-group"> <label>CARD NUMBER</label>
                              <div class="input-group"> <input class="form-control" input id="ccn" type="tel" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" required /> <span class="input-group-addon"><span class="fa fa-credit-card"></span></span> </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group"> 
                                <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label> <input type="tel" pattern="\d{1,2}/\d{2}" class="form-control" placeholder="MM / YY" required />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group"> <label>CV CODE</label> <input type="tel" max="999" pattern="([0-9]|[0-9]|[0-9])" class="form-control" placeholder="CVC" required /> </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="form-group"> <label>CARD OWNER</label> <input type="text" class="form-control" placeholder="Card Owner Name" required /> </div>
                            </div>
                          </div>              
                        </div>
                        <div class="panel-footer">
                          <div class="row">
                            <div class="col-xs-12"> <input type="submit" class="btn btn-success btn-lg btn-block" value="Confirm Payment" /></div>
                          </div>
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

<?php include 'includes/scripts.php'; ?>
</body>
</html>