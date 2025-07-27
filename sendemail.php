<?php

// Define some constants

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "Kuramsrinivasrajan@gmail.com";
$mail->Password   = "rzipuxvifrgjxiho";





// Read the form values
$success = false;
$userName = isset( $_POST['name'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$userPhone = isset( $_POST['phone'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$senderServices = isset( $_POST['services'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['services'] ) : "";

$email = 'Contactus@antarbhaga.com';


// If all values exist, send the email
if ( $userName && $senderEmail && $userPhone && $senderServices) {
  // $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  // $headers = "From: " . $userName . "";
  // $msgBody = " Email: ". $senderEmail . " Phone: ". $userPhone . " Services: ". $senderServices . " Message: " . $message . "";
  // $success = mail( $recipient, $headers, $msgBody );


try {

    $mail->setFrom('Kuramsrinivasrajan@gmail.com', 'Rajan');

    $mail->addAddress($email, 'Rajan');

    $mail->Subject = 'Antarbahga : Customer Details';

    $mail->Body = "Name: " . $userName .', Phone: '. $userPhone .', Email: '. $senderEmail .' ,'.$senderServices;

    // send mail

    $mail->send();

    // empty users input

    $name = $message = $email = "";

    $success = "Message sent successfully";

} catch (Exception $e) {

    // echo $e->errorMessage(); use for testing & debugging purposes
    $error = "Sorry message could not send, try again";
} catch (Exception $e) {

    // echo $e->getMessage(); use for testing & debugging purposes
    $error = "Sorry message could not send, try again";
}
  //Set Location After Successsfull Submission
  header('Location: index.html');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: contact.html?message=Failed');	
}

?>