<?php
//  Ensure all the required information has been passed through to the script before attempting to open a session.
if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['message'])) {
  http_response_code(400);
  echo "Please complete the form before submitting";
  exit;
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$to = "suhanisahi426@gmail.com"; // Replace with your email address
$subject = "New Contact Form Submission from RS Collection";
$txt = "Name: " . $name . "\r\n" .
       "Email: " . $email . "\r\n" .
       "Message:\r\n" . $message;

$headers = "From: webmaster@example.com" . "\r\n" .  // Change this to a valid domain you control
           "Reply-To: " . $email . "\r\n" .
           "X-Mailer: PHP/" . phpversion();

// Check if the email sending was successful.
if(mail($to, $subject, $txt, $headers)) {
  http_response_code(200);
  echo "Thank You! Your message has been sent.";
} else {
  http_response_code(500);
  echo "Oops! Something went wrong and we couldn't send your message.";
}
?>