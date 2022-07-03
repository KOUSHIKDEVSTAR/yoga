<?php  defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Phpmailer_lib{
	public function  __construct(){
		log_message('debug','PHPMailer class is loaded.');
	}
	public function load(){
		//require_once APPPATH.'third_party/email/PHPMailerAutoload.php';
		 require_once APPPATH.'third_party/PHPMailer/Exception.php';
		 require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
		 require_once APPPATH.'third_party/PHPMailer/SMTP.php';

		$mail = new PHPMailer(true);
		$mail->Mailer = "smtp";
		$mail->isSMTP();
		
		$mail->SMTPAuth=true;
		$mail->SMTPSecure = 'tls';
		$mail->Port =587 ;
		$mail->Host='smtp.gmail.com';
		$mail->Username='soumyaranjanbehera082@gmail.com';
	 	$mail->Password='7538936140';
	 	$mail->isHTML(True);
		return $mail;

	}
}
?>