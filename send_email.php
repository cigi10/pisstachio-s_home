<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['usrname']);
    $comment = htmlspecialchars($_POST['comment']);
    
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'chiprarego@gmail.com'; // Your Gmail address
        $mail->Password   = 'your-email-password'; // Your Gmail password or App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('your-email@gmail.com', 'Your Name');
        $mail->addAddress('chiprarego@gmail.com', 'Your Name'); // Where you want to receive the emails

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Comment from ' . $name;
        $mail->Body    = "Name: " . $name . "<br>Comment: " . $comment;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

