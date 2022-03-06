<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function send_email($emails, $subject, $message)
{

   $ci = &get_instance();
   $ci->load->library('phpmailer_lib');
   $mail = $ci->phpmailer_lib->load();
   $mail->isSMTP();
   $mail->Host     = 'smtp.hostinger.in';
   $mail->SMTPAuth = true;
   $mail->Username = 'infosupport@adds2cart.com';
   $mail->Password = 'Admin!@#$1234';
   $mail->SMTPSecure = 'tls';
   $mail->Port     = 587;
   $mail->setFrom('infosupport@adds2cart.com', 'Admin');
   $mail->Subject = $subject;
   $mail->isHTML(true);
   $mailContent = $message;
   $mail->Body = $mailContent;
   $mail->addAddress($emails);
   $mail->send();

}









