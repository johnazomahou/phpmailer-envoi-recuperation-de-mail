<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
//Create an instance; passing `true` enables exceptions

function envoie_mail($from_name,$from_email,$subject,$message){
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPSecure = 'ssl';
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;     
    $mail->Username   = 'johnazomahou@gmail.com';                     //SMTP username
    $mail->Password   = 'tonmotdepasse';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;
    $mail->setFrom($from_email, $from_name);
    $mail->addAddress('johnazomahou@gmail.com','AthenaTech');
    $mail->isHTML(true);                                 
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->setLanguage('fr', '/optional/path/to/language/directory/');
    if (!$mail->Send()) {
        return false;
    }
    else {
        return true;
    }

}
if (envoie_mail($_POST['name'],$_POST['email'],$_POST['subject'],$_POST['message'])) {
    echo 'OK';
}
else {
    echo "Une erreur s'est produite";
}
