<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';
require '/opt/lampp/htdocs/WT/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '/opt/lampp/htdocs/WT/vendor/phpmailer/phpmailer/src/Exception.php';
require '/opt/lampp/htdocs/WT/vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer;

$name = $_POST['name'];
$email = $_POST['email'];
$phone= $_POST['phone'];

$message = $_POST['message'];

$mail->isSMTP();
$mail->Host        = 'smtp.gmail.com';
$mail->SMTPAuth    = true;
$mail->Username = 'moneyexchangeong@gmail.com';
$mail->Password = 'vpdt zsts holh emnv'; 
$mail->SMTPSecure  = 'tls'; 
$mail->Port        = 587;

$mail->setFrom('moneyexchangeong@gmail.com', 'moneyexchange');

$conn = mysqli_connect('localhost', 'root', '', 'moneyex');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `user` "; 

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $mail->addAddress($row['email']);
        }

        $mail->isHTML(true);
        $mail->Subject = "TICKET EXCHANGE";
    $mail->Body = "<p>Name: {$name}</p> <p>\n\nEmail: $email </p>\n<p>\n\nphone: $phone </p>\n<p>Message: $message \n</p>";
        if ($mail->send()) {
            echo "<script> window.open('thankyou.html','_self')</script>";
        } else {
            echo "<script>alert('Email not sent !...Check once');</script>";
            echo "<script> window.open('message2.html','_self')</script>";
        }
    } else {
        echo "No data found";
    }
} else {
    echo "Error in SQL query: " . mysqli_error($conn);
}

mysqli_close($conn);
?>