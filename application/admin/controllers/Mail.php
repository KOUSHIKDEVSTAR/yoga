<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		
		
	}
	public function send(){
		$email='soumyaranjanbehera082@gmail.com';
    $this->load->library('phpmailer_lib');
    // PHPMailer object
    $mail = $this->phpmailer_lib->load();
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host     = 'smtp.hostinger.in';
    $mail->SMTPAuth = true;
    $mail->Username = 'infosupport@adds2cart.com';
    $mail->Password = 'Admin!@#$1234';
    $mail->SMTPSecure = 'tls';
    $mail->Port     = 587;     
    $mail->setFrom('infosupport@adds2cart.com', 'GUS');
    $mail->addReplyTo('infosupport@adds2cart.com', 'GUS');     
    // Add a recipient
    $mail->addAddress($email); 
    // Email subject
    $mail->Subject ='Application Id Mail';   
    // Set email format to HTML
    $mail->isHTML(true);           
    // Email body content
    $mailContent = 'Hi';
    $mail->Body = $mailContent;
    if(!$mail->send()){
        $mail = "Mail not Send";
        return $mail;
    }

	}

}