<?php
define("PROJECT_HOME","http://localhost/project/");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 0;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "camiklaus0008@gmail.com";
$mail->Password   = "sc@10008";
$mail->IsHTML(true);
$email=$user["mail"];
$name=$user["name"];
$mail->AddAddress("$email", "$name");
$mail->SetFrom("camiklaus0008@gmail.com", "Buch Books");
$mail->AddReplyTo("camiklaus0008@gmail.com", "Buch");

$mailer=md5($email);
$mail->Subject = "Buch Password Recovery";
$content ="<div>" . $user["name"] . ",<br><br><p>Click this link to recover your password<br><a href='" . PROJECT_HOME . "Resetpassword.php?mail=" . $user["mail"] . "&&hash=" . $mailer ."'>" . PROJECT_HOME . "Resetpassword.php?mail=" . $user["mail"] . "&&hash=" . $mailer ."</a><br><br></p>Regards,<br> Admin.</div>";
$mail->MsgHTML($content); 
if(isset($_POST['forgotpassword'])){
  if(!$mail->Send()) {
    echo "Error while sending Email.";
    var_dump($mail);
  } else {
    echo "<script>alert('Set New Password.Please check your mail.');document.location.href=('Welcome.php');</script>";
  }
  
 }
 
?>