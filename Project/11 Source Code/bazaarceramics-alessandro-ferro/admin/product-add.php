<?php
include "inc/session.php";

$conn = $pdo->open();

if(isset($_POST['pname'])) {

    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM products WHERE productName=:pName");
    $stmt->execute(['pName'=>$_POST['pname']]);
    $row = $stmt->fetch();

    if($row['numrows'] < 1) {

        try{
            $stmt = $conn->prepare("INSERT INTO products(productName, categoryId, productImage, description, size, price, glazeType) VALUES (:pname, :pcat, :pimage, :pdesc, :psize, :pprice, :pglaze)");
            $stmt->execute(['pname'=>$_POST['pname'], 'pcat'=>$_POST['pcategory'], 'pimage'=>$_POST['pimage'], 'pdesc'=>$_POST['pdescription'], 'psize'=>$_POST['psize'], 'pprice'=>$_POST['pprice'], 'pglaze'=>$_POST['pglaze']]);
            $productid = $conn->lastInsertId();
            echo $productid;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            echo -1;
        }
    }
    else {
        echo -2;
    }

}
else {
    echo -3;
}

$pdo->close();

?>