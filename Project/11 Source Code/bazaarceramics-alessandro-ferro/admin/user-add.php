<?php
include "inc/session.php";

$conn = $pdo->open();

if(isset($_POST['uemail'])) {

    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
    $stmt->execute(['email'=>$_POST['uemail']]);
    $row = $stmt->fetch();

    if($row['numrows'] < 1) {
        $password = password_hash($_POST['upassword'], PASSWORD_DEFAULT);
        try{
            $stmt = $conn->prepare("INSERT INTO users(firstName, lastName, role, email, password) VALUES (:fname, :lname, :role, :email, :password)");
            $stmt->execute(['fname'=>$_POST['fname'], 'lname'=>$_POST['lname'], 'role'=>$_POST['urole'], 'email'=>$_POST['uemail'], 'password'=>$password]);
            $userid = $conn->lastInsertId();
            echo $userid;
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