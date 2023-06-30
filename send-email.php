<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$phone = $_POST["phone"];
if(isset($_POST['message'])) {
    $message = $_POST['message'];
    // wykonaj jakieś operacje na zmiennej $tekst
}

$tresc = $message . " NUMER TELEFONU: " . $phone . " IMIE I NAZWISKO: " . $name . " ADRES EMAIL: " . $email;


try{
    $mail = new PHPMailer();

    $mail->isSMTP();

    $mail->Host ='smtp.gmail.com';

    $mail->Port = 465;

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

    $mail->SMTPAuth = true;

    $mail->Username = 'dominik.jojczyk@gmail.com';

    $mail->Password = 'vnrzswruvboelkcg';

    $mail->CharSet = 'UTF-8';

    $mail->setFrom($email,$name);

    $mail->addAddress("biosite.praca@gmail.com", "biosite");

    $mail->addReplyTo($email,$name);

    $mail->Subject = $subject;

    $mail->isHTML(true); 

    $mail->Body = $tresc;

    $mail->send();
    
    header("Location: sent.html");




}catch(Exception $e){
    echo "Błąd wysyłania maila:{$mail->ErrorInfo}";
}

?>