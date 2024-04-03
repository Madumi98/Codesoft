

<?php

 $receiving_email_address = 'madumipabasara11@gmail.com';

 if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );

    // If the form is submitted, it will run this function
    function php_email_form_submit($receiving_email_address) {

      // Form fields values
      $name = isset($_POST['name']) ? $_POST['name'] : '';
      $email = isset($_POST['email']) ? $_POST['email'] : '';
      $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
      $message = isset($_POST['message']) ? $_POST['message'] : '';

      // If all the form fields are not empty, it will proceed
      if($name && $email && $subject && $message) {

        // Sanitizing input data
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $subject = filter_var($subject, FILTER_SANITIZE_STRING);
        $message = filter_var($message, FILTER_SANITIZE_STRING);

        // Additional input validation
        if(strlen($name) > 50) {
          die('The name is too long!');
        }

        if(strlen($email) > 100) {
          die('The email is too long!');
        }

        if(strlen($subject) > 100) {
          die('The subject is too long!');
        }

        if(strlen($message) > 5000) {
          die('The message is too long!');
        }

        // The subject of the email you will receive
        $subject = 'Contact Form Submission - ' . $subject;

        // Create the email body
        $message_body = '';
        $message_body .= 'Name: ' . $name . "\n";
        $message_body .= 'Email: ' . $email . "\n";
        $message_body .= 'Subject: ' . $subject . "\n";
        $message_body .= 'Message: ' . $message . "\n";

        // Send the email
        if(mail($receiving_email_address, $subject, $message_body, "From: " . $email)) {
          echo 'Your message has been sent successfully!';
        } else {
          echo 'Error sending the email!';
        }

      } else {
        echo 'Please fill out all the form fields!';
      }
    }

    // If the form is submitted, call the function
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      php_email_form_submit($receiving_email_address);
    }

 } else {
    die( 'Unable to load the "PHP Email Form" Library!');
 }

?>
