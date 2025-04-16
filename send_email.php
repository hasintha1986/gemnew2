<?php
// මේ file එකේ නම: send_email.php

// Check if the form was submitted using POST method and the submit button was clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    // --- Get Data & Sanitize ---
    // Use htmlspecialchars to prevent XSS attacks
    $name = isset($_POST['user_name']) ? htmlspecialchars(trim($_POST['user_name'])) : 'Not Provided';
    $visitor_email = isset($_POST['user_email']) ? htmlspecialchars(trim($_POST['user_email'])) : '';
    $subject_from_form = isset($_POST['user_subject']) ? htmlspecialchars(trim($_POST['user_subject'])) : 'No Subject';
    $message = isset($_POST['user_message']) ? htmlspecialchars(trim($_POST['user_message'])) : 'No Message';

    // Basic validation (check if required fields are empty after trimming)
    if (empty($name) || empty($visitor_email) || empty($subject_from_form) || empty($message)) {
        // Redirect back with an error if required fields are missing
        header("Location: contact.php?status=error#form-anchor");
        exit;
    }

    // Validate email format
    if (!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) {
        // Redirect back with an error if email format is invalid
        header("Location: contact.php?status=error#form-anchor");
        exit;
    }

    // --- Prepare Email ---

    // Recipient Email Address (*** CHANGE THIS TO YOUR ACTUAL EMAIL ***)
    $email_to = "dhsdesilva@gmail.com"; // Use the email from footer/about us

    // Email Subject Line
    $email_subject = "Website Contact Form: " . $subject_from_form;

    // Email Body Content
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "--------------------------------------------------\n";
    $email_body .= "Name:    " . $name . "\n";
    $email_body .= "Email:   " . $visitor_email . "\n";
    $email_body .= "Subject: " . $subject_from_form . "\n";
    $email_body .= "Message: \n" . $message . "\n";
    $email_body .= "--------------------------------------------------\n\n";
    $email_body .= "Sent on: " . date("Y-m-d H:i:s") . "\n";


    // Email Headers
    // Using a generic 'From' address from your domain is often better for deliverability
    // Replace 'yourdomain.com' with your actual domain if possible
    $headers = "From: noreply@yourdomain.com\r\n"; // Or use $visitor_email if preferred, but less reliable
    $headers .= "Reply-To: " . $visitor_email . "\r\n"; // Ensures replies go to the visitor
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // --- Send Email ---
    // Use PHP's built-in mail() function
    // Note: mail() requires server configuration to work correctly.
    if (mail($email_to, $email_subject, $email_body, $headers)) {
        // Success: Redirect back to contact page with success status
        header("Location: contact.php?status=success#form-anchor");
        exit; // Important to stop script execution after redirect
    } else {
        // Failure: Redirect back to contact page with error status
        // Log the error for debugging if possible (server-side)
        error_log("Mail failed to send from contact form. To: $email_to");
        header("Location: contact.php?status=error#form-anchor");
        exit; // Important to stop script execution after redirect
    }

} else {
    // If the script is accessed directly without POST data or submit action
    // Redirect to the contact page or show an error
    // echo "Invalid access method.";
    header("Location: contact.php"); // Redirect to form page
    exit;
}
?>