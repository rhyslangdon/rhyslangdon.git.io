<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "rhyslangdon@hotmail.com"; // Your email
    $from = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $firstName = htmlspecialchars($_POST["firstname"]);
    $lastName = htmlspecialchars($_POST["lastname"]);
    $service = htmlspecialchars($_POST["service"]);
    $subject = "New Contact Request from Portfolio";
    $message = htmlspecialchars($_POST["subject"]);

    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $fullMessage = "You have received a new message from your portfolio contact form.\n\n";
    $fullMessage .= "Name: $firstName $lastName\n";
    $fullMessage .= "Email: $from\n";
    $fullMessage .= "Service Requested: $service\n\n";
    $fullMessage .= "Message:\n$message\n";

    // Send email
    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
} else {
    echo "Invalid request.";
}
?>