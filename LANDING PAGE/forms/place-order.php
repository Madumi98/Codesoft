
<?php

 $receiving_email_address = 'madumipabasara11@gmail.com';

 if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );

    // Access form data using PHP global variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Define the body of the email
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Subject: $subject\n";
    $body .= "Message: $message\n";

    // Create the headers of the email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email using the PHP mail function
    if(mail($receiving_email_address, $subject, $body, $headers)){
      echo 'Your email has been sent successfully!';
    } else {
      echo 'Failed to send your email!';
    }

 } else {
    die( 'Unable to load the "PHP Email Form" Library!');
 }

?>
