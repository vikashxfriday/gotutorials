<?php

// for send Mail from Site
use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';


function sent_template_mail($template,$postvar){

//$template="RESTORE-PASSWORD";
$gg=get_email_template($template);
$subject=$gg['template_subject'];
$msg=$gg['template_desc'];

$msg=str_replace("[fullname]",$postvar['fullname'],$msg);
$msg=str_replace("[sitename]",$_SESSION['host']['company_name'],$msg);
$msg=str_replace("[username]",$postvar['username'],$msg);


if(isset($postvar['password_link'])&&$postvar['password_link']){
$msg=str_replace("[password]",$postvar['password_link'],$msg);
}
if(isset($postvar['password'])&&$postvar['password']){
$msg=str_replace("[password]",$postvar['password'],$msg);
}

$subject=str_replace("[username]",$postvar['username'],$subject);
$subject=str_replace("[sitename]",$_SESSION['host']['company_name'],$subject);

$to_email=$postvar['email'];
$to_name=$postvar['fullname'];

$mail = new PHPMailer;
$mail->isSMTP();
//$mail->SMTPDebug = 2;
$mail->Priority = 1; 
$mail->IsHTML(true); 
//$mail->setFrom($_SESSION['host']['company_email'], $_SESSION['host']['company_name']);
$mail->setFrom('mailers@itio.in','Support ITIO');
$mail->AddReplyTo('info@itio.in', 'Info ITIO');
$mail->AddAddress($to_email, $to_name);
//$mail->AddCC($cc_email, $cc_name);
//$mail->AddBCC($bcc_email, $bcc_name);
$mail->Subject = $subject;
$mail->Body = $msg;
//send the message, check for errors
if (!$mail->send()) {
   // echo "ERROR: " . $mail->ErrorInfo;
} else {
   // echo "SUCCESS11";
}

return;


}



?>
