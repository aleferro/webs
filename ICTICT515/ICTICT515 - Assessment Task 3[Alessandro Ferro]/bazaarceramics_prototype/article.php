<?php include 'includes/catalogue.php'; ?>
<?php include_once 'includes/users.php'; ?>
<? include 'includes/session.php'; ?>
<?php
$products = $_SESSION['catalogue'];
$slug = $_GET['product'];
$article;
foreach($products as $item) {
    if($item->name == $slug) {
        $article = $item;
    }
}
$_SESSION['article'] = $article;
?>
<?php include 'includes/header.php'; ?>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="container">
    <section class="content">
        <div class="row">
        	<div class="col-sm-9">
        		<div class="callout" id="callout" style="display:none">
        			<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
        			<span class="message"></span>
        		</div>
	            <div class="row">
	            	<div class="col-sm-6">
                        <img src=<?php echo $article->img ?> width='100%' class='zoom'>
                		<br><br>
	            		<form class="form-inline" action="cart_add.php" id="productForm">
	               			<div class="form-group">
		            			<div class="input-group col-sm-5">
		            				<span class="input-group-btn">
		            					<button type="button" id="minus" class="btn btn-default btn-flat btn-lg"><i class="fa fa-minus"></i></button>
		            				</span>
						          	<input type="text" name="qty" id="quantity" class="form-control input-lg" value="1">
						            <span class="input-group-btn">
						                <button type="button" id="add" class="btn btn-default btn-flat btn-lg"><i class="fa fa-plus"></i>
						                </button>
						            </span>
						        </div>
		            			<button type="submit" class="btn btn-primary btn-lg btn-flat"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
		            		</div>
	            		</form>
	            	</div>
	            	<div class="col-sm-6">
	            		<h1 class="page-header"><?php echo $article->name; ?></h1>
	            		<h3><b>&#36; <?php echo number_format($article->price, 2); ?></b></h3>
	            		<p><b>Description:</b></p>
                        <p><?php echo $article->description; ?></p>
                        <?php
						if(isset($_SESSION['error'])){
							echo "
							<div class='callout-error text-center'>
								<p>".$_SESSION['error']."</p> 
							</div>
							";
							unset($_SESSION['error']);
						}
                    	?>
	            	</div>
	            </div>
	            <br>
        	</div>
        </div>
    </section>
</div>
<?php include 'includes/footer.php' ?>
<script>
// Quantity
$(function(){
	$('#add').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		quantity++;
		$('#quantity').val(quantity);
	});
	$('#minus').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		if(quantity > 1){
			quantity--;
		}
		$('#quantity').val(quantity);
	});

});
</script>
</body>
</html>