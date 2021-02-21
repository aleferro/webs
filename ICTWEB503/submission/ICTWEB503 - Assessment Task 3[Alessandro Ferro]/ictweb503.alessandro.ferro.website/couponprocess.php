<?php 
session_start();
require_once 'config/connect.php';

if(isset($_SESSION['discount'])) {
    header("location: cart.php?message=6"); // Coupons cannot be accumulated

} else if (isset($_POST) & !empty($_POST)){
    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        $date = date("Y/m/d");
        $couponcode = filter_var($_POST['couponcode'], FILTER_SANITIZE_STRING);
        $sql = "SELECT * FROM coupon WHERE code='$couponcode'";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $count = mysqli_num_rows($result);
        $r = mysqli_fetch_assoc($result);

        if($count == 1){
            if($r['usedon'] == NULL && $r['expireon'] >= $date) {
                $usql = "UPDATE coupon SET usedon='$date' WHERE id='$couponcode'";
                $ures = mysqli_query($connection, $usql) or die(mysqli_error($connection));
                $_SESSION['discount'] = $r['value'];
                header("location: cart.php?message=5"); // Discount applied!
            } else {
                header("location: cart.php?message=4"); // The coupon entered is not valid anymore
            } 
        } else {
            header("location: cart.php?message=3"); // Please enter a valid coupon code
        }
    } else {
        header("location: cart.php?message=2"); // There are no items in your cart
    }
} else {
    header("location: cart.php?message=1"); // Please enter your coupon code
}

?>