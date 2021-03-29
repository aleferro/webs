<?php include "inc/session.php"; ?>
<?php
$userName = $_POST['msgName'];
$userEmail = $_POST['msgEmail'];
$msgSubject = $_POST['msgSubject'];
$msgBody = $_POST['msgBody'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';

//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->From = $userEmail;
$mail->FromName = $userName;

//To address and name
$mail->addAddress("recepient1@example.com", "Recepient Name");

//Address to which recipient will reply
$mail->addReplyTo($userEmail, "Reply");


//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = $msgSubject;
$mail->Body = $msgBody;


try {
    $mail->send();
    $_SESSION['msgSendSuccess'] = "**Thank you for your message**";
    header('location: contact-us.php');
} catch (Exception $e) {
    $_SESSION['msgSendSuccess'] = "**Thank you for your message**";
    header('location: contact-us.php');
}

if (isset($_SESSION['msgSendSuccess'])) {
    $conn = $pdo->open();

    $stmt = $conn->prepare("INSERT INTO email (userName, userEmail, subject, body, receiver) VALUES (:userName, :userEmail, :subject, :body, :receiver)");
	$stmt->execute(['userName'=>$userName, 'userEmail'=>$userEmail, 'subject'=>$msgSubject, 'body'=>$msgBody, 'receiver'=>"recepient1@example.com"]);

    $pdo->close();
}

header('location: contact-us.php');