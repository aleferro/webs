<?php
include "inc/session.php";

$conn = $pdo->open();

if(isset($_POST['date'])) {
    $today = date("Y-m-d");
    $lastWeek = date("Y-m-d", strtotime("-5 days"));
    $week = array();

    try {
        
        $stmt = $conn->prepare("SELECT orderDate, SUM(totalPrice) as totPrice FROM orders WHERE orderDate BETWEEN :lastweek AND :today GROUP BY orderdate");
        $stmt->execute(['lastweek'=>$lastWeek, 'today'=>$today]);


        foreach($stmt as $row) {
            array_push($week, $row['totPrice']);
        }

        echo json_encode($week);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}

$pdo->close();
?>