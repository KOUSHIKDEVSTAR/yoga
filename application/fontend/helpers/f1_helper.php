<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



function send_email($emails, $subject, $message)

{



   $ci = & get_instance();
   $ci->load->library('phpmailer_lib');
   $mail = $ci->phpmailer_lib->load();
   $mail->isSMTP();
   $mail->Host     = 'smtp.sendgrid.net';
   $mail->SMTPAuth = true;
   $mail->Username = 'apikey';
   $mail->Password = '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';
   $mail->SMTPSecure = 'TLS';
   $mail->Port     = 587 ;
   $mail->IsSMTP(); // enable SMTP
   $mail->SMTPDebug = 2;  // debugging: 1 = errors and messages, 2 = messages only
   $mail->SMTPAutoTLS = false;
   $mail->setFrom('info@mykkon.com', 'Admin');
   $mail->Subject = $subject;
   $mail->isHTML(true);
   $mailContent = $message;
   $mail->Body = $mailContent;
   $mail->addAddress($emails);
   $mail->send();

  
    
  
   



}





