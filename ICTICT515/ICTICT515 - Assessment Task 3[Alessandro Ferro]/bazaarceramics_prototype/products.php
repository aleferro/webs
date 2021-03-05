<?php
include 'includes/catalogue.php';
include_once 'includes/session.php';

if(isset($_GET['category'])) {
    $slug = $_GET['category'];
} else {
    $slug = 'home';
}

$articles = $_SESSION['catalogue'];
?>
<?php include 'includes/header.php'; ?>
<body>
	<?php include 'includes/navbar.php'; ?>
	<div class="content-wrapper">
        <div class="container">
            <section class="content">
                <div class="row">
                    <?php
                        if($slug=="art") {
                            echo "<h1 class='page-header'>Individual Art Design</h1>";
                        }
                        if($slug=="home") {
                            echo "<h1 class='page-header'>Domestic Ware Design</h1>";
                        }
                        foreach ($_SESSION['catalogue'] as $piece) {
                            if($piece->category == $slug) {
                                $image = $piece->img;
                                echo "
                                    <div class='col-xs-4'>
                                        <div class='box box-solid'>
                                            <div class='box-body prod-body'>
                                                <img src='".$image."' width='100%' height='auto' class='img-responsive'>
                                                <h5><a href='article.php?product=".$piece->name."'>".$piece->name."</a></h5>
                                            </div>
                                            <div class='box-footer'>
                                                <b>&#36; ".number_format($piece->price, 2)."</b>
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
					    }
                    ?>
                </div>
            </section>
        </div>
    </div>
    <br><br>
<?php
include 'includes/footer.php';
?>
</body>
</html>