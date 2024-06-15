
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require 'vendor/autoload.php';
require '/opt/lampp/htdocs/WT/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '/opt/lampp/htdocs/WT/vendor/phpmailer/phpmailer/src/Exception.php';
require '/opt/lampp/htdocs/WT/vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer(true); 

$name = $_POST['name'];
$email = $_POST['email'];
$phone= $_POST['phone'];

$message = $_POST['message'];

try {
 
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'moneyexchangeong@gmail.com';
    $mail->Password = 'vpdt zsts holh emnv';
    $mail->SMTPSecure = 'ssl'; 
    $mail->Port = 465; 


    $mail->setFrom('moneyexchangeong@gmail.com', 'moneyexchange');
    $mail->addAddress("$phone", 'Recipient Name');
    

  for ($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) {
    $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i] );  
 }
    
    $mail->isHTML(true);
    
    $mail->Subject = "TICKET FILE";
    $mail->Body = "<p>Name: {$name}</p> <p>\n\nEmail: $phone </p>\n\n<p>Message: $message \n</p>";
    
   
    
    $mail->send();
    echo "<script> window.open('thankyou.html','_self')</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

