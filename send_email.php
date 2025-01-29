<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure you have PHPMailer installed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);
    try {
        // SMTP Config
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Use your email provider's SMTP
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your-email@gmail.com'; // Change to your email
        $mail->Password   = 'your-email-password'; // Use an App Password for security
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Email Content
        $mail->setFrom($_POST["email"], $_POST["firstname"] . ' ' . $_POST["lastname"]);
        $mail->addAddress('rhyslangdon@hotmail.com'); // Your receiving email
        $mail->Subject = "New Contact Inquiry";
        $mail->Body    = "Name: {$_POST["firstname"]} {$_POST["lastname"]}\n";
        $mail->Body   .= "Email: {$_POST["email"]}\n";
        $mail->Body   .= "Service: {$_POST["service"]}\n\n";
        $mail->Body   .= "Message:\n{$_POST["subject"]}";

        $mail->send();
        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}
?>