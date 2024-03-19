<?php

// Define some constants
define( "RECIPIENT_NAME", "indulekha" );
define( "RECIPIENT_EMAIL", "indulekhaharidas2000@gmail.com" );

// Read the form values
$success = false;
$name = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$senderEmail = isset( $POST['email'] ) ? preg_replace( "/[^\.\-\\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$subject = isset( $POST['subject'] ) ? preg_replace( "/[^\.\-\\@a-zA-Z0-9]/", "", $_POST['subject'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

$mail_subject = 'A contact request send by ' . $name;

$body = 'Name: '. $name . "\r\n";
$body .= 'Email: '. $senderEmail . "\r\n";




if ($subject) {$body .= 'Subject: '. $subject . "\r\n"; }


$body .= 'message: ' . "\r\n" . $message;



// If all values exist, send the email
if ( $name && $senderEmail && $message ) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $name . " <" . $senderEmail . ">";  
  $success = mail( $recipient, $mail_subject, $body, $headers );
  echo "<div class='inner success'><p class='success'>Thanks for contacting us. We will contact you ASAP!</p></div><!-- /.inner -->";
}else {
	echo "<div class='inner error'><p class='error'>Something went wrong. Please try again.</p></div><!-- /.inner -->";
}

?>

<?php
$secret = $_POST["secret"];
$response = $_POST["response"];
$url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$response;
$verify = file_get_contents($url);
echo $verify;
?>