<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mail  extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->data['page_title'] = '404 Error';
		$this->load->helper('url');
        $this->load->model('model_auth');
        $this->load->library('image_lib');
        $this->load->helper('f1');
	}
    function send(){
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.sendgrid.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'apikey';
        $mail->Password = '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';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom('info@mykkon.com', 'CodexWorld');
        $mail->addReplyTo('info@mykkon.com', 'CodexWorld');
        
        // Add a recipient
        $mail->addAddress('koushikpramanick24@gmail.com');
        
        
        
        // Email subject
        $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
    }
    public function index(){
        $link = base_url();
        $password ="Admin!@#$1234";
        $email ="koushikpramanick24@gmail.com";
                $message = '<table style="font-family:Verdana;font-size:13px;" border="0" cellspacing="0" cellpadding="5" width="100%" dir="rtl">
                    <tbody>
          
                    <tr align="left" valign="middle">
                    <td style="background-color: #00acac;padding: 10px;border:1px solid #E8EAEC;vertical-align:middle;font-family:Verdana;color:#FFF;font-weight:bold;font-size:15px;text-align:center" width="100%">YOGA</td>
                    </tr>
                    <tr align="left" valign="middle">
                        <td style="border:1px solid #E8EAEC;padding: 10px;background-color:#F5F6F7;font-family:Verdana;font-size:15px;color:#616A76;text-align:center">User name = '.$email.' <br>
                        Password = '.$password.'
                        </td>
                        </tr>
                        <tr>
                        <td style="background-color: #00acac;padding: 10px;text-align: center;">
                        <a style="display: inline-block;color:#FFF;font-size: 13px;text-decoration: none;text-transform: uppercase;font-weight: bold; font-family: verdana, sans-serif" href="' . $link . '">Details</a></td>
                    </tr>
                    </tbody>
                    </table>';
                    $subject = "Registration Details";

               send_email($email,$subject, $message);
    }
}