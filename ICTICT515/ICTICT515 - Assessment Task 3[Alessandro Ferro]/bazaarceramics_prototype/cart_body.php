<?php
if(isset($_SESSION['cartItems']) && count($_SESSION['cartItems'])>0){
	$totalPrice = 0;
	echo"
		<h1 class='page-header'>YOUR CART</h1>
		<div class='box box-solid'>
		<div class='box-body'>
		<table class='table  table-sm'>
		<thead>
		<th></th>
		<th>Photo</th>
        <th>Name</th>
        <th width='20%'>Quantity</th>
		<th>Price</th>
		</thead>
	";
	foreach ($itemsInCart as $item) {
		echo "
			<tbody id='tbody'>
	    	<tr>
            <td width='40px'>
			<div>
			<a href='cart_delete.php?product=".$item->name."'><i class='fa fa-minus-circle fa-2x' style='color:red;'></i></a>
            </div>
            </td>
			<td><img src=".$item->img." width='50px' heigth='auto' class='image-responsive'></td>
            <td>".$item->name."</td>
            <td>".$item->quantity."</td>
			<td>$ ".$item->price."</td>
            </tr>
		";
		$totalPrice += $item->price*$item->quantity;
	}
    echo "
        <tr>
        <td colspan=4>

        <p style='text-align:right'><b>Total Price: </b></p>
        </td>
        <td><b>$ </b>".$totalPrice."</td>
        </tr>
        </tbody>
        </table>
        </div>
        </div>
        ";
} else {
	echo "
		<h3>Your shopping Cart is Empty</h3><br>
		<div>
			<img src='images/empty_cart.jpg' width='800' height='auto' class='image-responsive'>
		</div>
	";
}
?>