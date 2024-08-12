<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize it
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = "chilliboyn@gmail.com"; // Change to the email address you want to send to
    $email_subject = "Contact Form Submission: $subject";
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n\n";
    $email_body .= "Message:\n$message";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<p>Email sent successfully!</p>";
    } else {
        echo "<p>Failed to send email. Please try again later.</p>";
    }
} else {
    // Redirect to the contact form page if accessed directly
    header("Location: contact.html");
    exit();
}
?>
