<?php
include 'includes/header.php';
include 'includes/catalogue.php';

$keyword = $_POST['keyword'];
$parameter;

foreach($_SESSION['catalogue'] as $item) {
    if(strpos(strtolower($item->name), $keyword) !== false) {
        $parameter = $item->name;
    }
}

if(isset($parameter)) {
    header('location: article.php?product='.$parameter);
} else {
    include 'includes/navbar.php';
    echo '<h4 style="text-align: center">Item not found</h4>';
    include 'includes/footer.php';
}
?>