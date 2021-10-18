<?php
// Load Composer's autoloader
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';




$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$EmailTo = "youssef.rakrouki@esprit.tn";
$Subject = "New Message Received";

// prepare email body text
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";

$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";

$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth = 1;                                   // Enable SMTP authentication
    $mail->Username = 'testmailing07@gmail.com';                     // SMTP username
    $mail->Password = 'Azerty123.';                               // SMTP password
    $mail->SMTPSecure="ssl";
    // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('testmailing07@gmail.com','admin Planete tours');
    $mail->addAddress($EmailTo);     // Add a recipient





    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Resrvation effectuee';
    $mail->Body = 'votre payement a été effectué avec <b>succes!</b> <br> Merci pour votre confiance. ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    header('Location: ../index.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}





// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success){
    echo "success";
}else{
    echo "invalid";
}

?>