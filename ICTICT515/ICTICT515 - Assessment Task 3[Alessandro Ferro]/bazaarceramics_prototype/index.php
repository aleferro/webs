<?php
include "includes/header.php";
include 'includes/catalogue.php';
include_once 'includes/users.php';

$articles = $items;
?>

<body>
<?php include "includes/navbar.php";?>
<div class="container-fluid">
    <div class="row">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		    <ol class="carousel-indicators">
		        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
		    </ol>
		    <div class="carousel-inner">
		        <div class="item active">
		            <img src="images/banner1.jpg" alt="First slide">
		        </div>
		        <div class="item">
		            <img src="images/banner2.jpg" alt="Second slide">
		        </div>
		        <div class="item">
		            <img src="images/banner3.jpg" alt="Third slide">
		        </div>
		    </div>
		    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		        <span class="fa fa-angle-left"></span>
		    </a>
		    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		        <span class="fa fa-angle-right"></span>
		    </a>
		</div>
    </div>
    <br><br>
    <div class="container">
        <div class='row'>
            <h1 class="page-header">Our Production<h1>
           <?php
            $j = count($articles);
            for($i=0; $i<$j; $i++) {
                if($i<4 || $i >11) {
                    echo "
                        <div class='col-xs-3'>
                            <div class='box box-solid'>
                                <div class='box-body prod-body'>
                                    <img src='".$articles[$i]->img."' width='100%' height='auto' class='img-responsive'>
                                    <h5><a href='article.php?product=".$articles[$i]->name."'>".$articles[$i]->name."</a></h5>
                                </div>
                                <div class='box-footer'>
                                    <b>&#36; ".number_format($articles[$i]->price, 2)."</b>
                                </div>
                            </div>
                        </div>
                    ";
                }
            }
            ?>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
</body>
</html>