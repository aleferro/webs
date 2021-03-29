<?php
include "inc/session.php";

$conn = $pdo->open();

if(isset($_POST['id'])) {
  try {

    $stmt = $conn->prepare("DELETE FROM products WHERE productId = :productId");
    $stmt->execute(['productId'=> $_POST['id']]);
    echo 1;

  }
  catch(PDOException $e) {
    echo $e->getMessage();
    echo 0;
  }
}
else {
  echo "<p>The item is not in the database</p>";
}

$pdo->close();

?>