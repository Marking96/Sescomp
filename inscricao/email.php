<?php

require("../includes/PHPMailer-master/PHPMailerAutoload.php");

$mail = new PHPMailer;

$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'br14.hostgator.com.br';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'flisol@valelivre.org';                 // SMTP username
$mail->Password = 'ciVPT3SXX,TN';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('flisol@valelivre.org', 'Flisol Vale 2016');
$mail->addAddress('jezmaelbasilio@gmail.com', 'Jezmael Basilio');     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Seja bem vindo ao Flisol Vale 2016!";

// Gerando o corpo do E-mail
$mail->Body    = "teste";
$mail->AltBody = 'Seja bem vindo ao Flisol Vale 2016! Sua inscrição foi realizada com sucesso.';

if(!$mail->send()) {
    $msg .= 'Message could not be sent.';
    $msg .= 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $msg .= '. Sua confirmação de inscrição foi enviada para seu e-mail.';
}

?>
