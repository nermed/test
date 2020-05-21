<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "yourname@yourdomain.com"; // Ajouter son propre email qui est "" par tonnom@domain.com -
$subject = "Website Contact Form:  $name";
$body = "Tu as reçu un message.\n\n"."Voici les détails:\n\nName: $name\n\nEmail: $email\n\nMessage:\n$message";
$header = "From: repondeur@domain.com\n"; // ça l'email avec lequel tu vas repondre. Je recommande d'utiliser un email du genre repondeur@domain.com.
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>