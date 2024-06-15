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
//$phone= $_POST['phone'];
$email = $_POST['email'];
$subject= $_POST['subject'];

$message = $_POST['message'];

$mail->isSMTP();
$mail->Host        = 'smtp.gmail.com';
$mail->SMTPAuth    = true;
$mail->Username = 'gondukalebu@gmail.com';
$mail->Password = 'qvyk lgbj gvcg teoq'; 
$mail->SMTPSecure  = 'tls'; 
$mail->Port        = 587;

$mail->setFrom('ammalladinnedhanalakshmi@gmail.com', 'contactus');

$conn = mysqli_connect('localhost', 'root', '', 'email');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM user"; 

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $mail->addAddress($row['email']);
        }

        $mail->isHTML(true);
        $mail->Subject = " contact us";
    $mail->Body = "<p>Name: {$name}</p> <p>\n\nEmail: $email </p>\n\nSubject: $subject </p>\n\n<p>Message: $message \n</p>";
        if ($mail->send()) {
            echo "successfully sent";
        } else {
            echo "<script>alert('Email not sent !...Check once');</script>";
           
        }
    } else {
        echo "No data found";
    }
} else {
    echo "Error in SQL query: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
