<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = htmlspecialchars($_POST['email']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $service = htmlspecialchars($_POST['Service']);
    $subject = htmlspecialchars($_POST['subject']);

    // Email details
    $to = "rhyslangdon@hotmail.com"; 
    $emailSubject = "New Service Inquiry";
    $emailBody = "
    <html>
    <head>
        <title>Service Inquiry</title>
    </head>
    <body>
        <h2>New Inquiry Details</h2>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>First Name:</strong> {$firstname}</p>
        <p><strong>Last Name:</strong> {$lastname}</p>
        <p><strong>Service:</strong> {$service}</p>
        <p><strong>Subject:</strong> {$subject}</p>
    </body>
    </html>
    ";

    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: {$firstname} {$lastname} <{$email}>" . "\r\n";

    // Send the email
    if (mail($to, $emailSubject, $emailBody, $headers)) {
        echo "Thank you! Your message has been sent successfully.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>
