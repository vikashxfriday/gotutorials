<?php

$message='<html><body><table width="50%" cellpadding="2" cellspacing="2" style="background-color:#999999">
  <tr style="background-color:#CCCCCC">
    <td colspan="2">Account Details are :</td>
  </tr>
  <tr style="background-color:#CCCCCC">
    <td width="50%">User Name </td>
    <td width="50%">Vikash92</td>
   
  </tr>
  <tr style="background-color:#CCCCCC">
    <td>Password</td>
    <td>vik12125</td>
  </tr>
</table></body></html>';

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//require 'src/Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtppro.zoho.in';  // define on phpmailer
$mail->Port = 465; // define on phpmailer
$mail->Username = 'mailers@itio.in'; // define on phpmailer
$mail->Password = 'India@9901##'; // define on phpmailer
$mail->WordWrap = 50;               // set word wrap
$mail->Priority = 1; 
$mail->IsHTML(true); 

$mail->setFrom('mailers@itio.in','Support ITIO');

//$mail->addAddress('vikashg@bigit.io','Vikash Gupta');
$mail->addAddress('vikashg@itio.in','Vikash Gupta');

$mail->Subject = 'Login Details - ITIO Payment Bank ';
$mail->Body = "$message";
//send the message, check for errors
if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    echo "SUCCESS11";
}
?>