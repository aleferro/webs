<?php
include "inc/session.php";

$conn = $pdo->open();

if(isset($_POST['prodid'])) {

    try {

        $stmt = $conn->prepare("UPDATE products SET productName=:productName, categoryId=:categoryId, description=:description, size=:size, price=:price, glazeType=:glazeType WHERE productId=:productId");
        $stmt->execute(['productName'=>$_POST['prodname'], 'categoryId'=>$_POST['catid'], 'description'=>$_POST['proddescription'], 'size'=>$_POST['prodsize'], 'price'=>$_POST['prodprice'], 'glazeType'=>$_POST['prodglaze'], 'productId'=>$_POST['prodid'] ]);
        echo 1;
    }
    catch(PDOException $e) {
        echo $e->getMessage();
        echo 0;
      }
}
else {
    echo "The item selected is not in the database";
}



$pdo->close();

?>