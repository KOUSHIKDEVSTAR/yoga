<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register  extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->data['page_title'] = '404 Error';
		$this->load->helper('url');
        $this->load->library('image_lib');
         $this->load->helper('f1');
	}
    public function index(){
        $this->load->view('register',$this->data);
        
     }
    // public function password_hash($pass = '')
    // {
    //     if($pass) {
    //         $password = password_hash($pass, PASSWORD_DEFAULT);
    //         return $password;
    //     }
    // }

     public function store(){
     	$this->form_validation->set_rules('full_name', 'Full Name', 'required|min_length[3]|max_length[80]');
     	$this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|max_length[80]|is_unique[customers.email]');
     	$this->form_validation->set_rules('mobile', 'Mobile', 'required');
            if($this->form_validation->run()){
                $password = rand(111111,999999);
                // $pass_again = password_hash($password, PASSWORD_DEFAULT);
    
        	$data = array(
                'full_name' => $this->input->post('full_name'),
                'email' => $this->input->post('email'),
                'mobile_number' => $this->input->post('mobile'),
                'password'=>$password,
            );
            $result=$this->db->insert('customers',$data);
            if($result){
                 $link = base_url();
                $message = '<table style="font-family:Verdana;font-size:13px;" border="0" cellspacing="0" cellpadding="5" width="100%" dir="rtl">
                    <tbody>
          
                    <tr align="left" valign="middle">
                    <td style="background-color: #00acac;padding: 10px;border:1px solid #E8EAEC;vertical-align:middle;font-family:Verdana;color:#FFF;font-weight:bold;font-size:15px;text-align:center" width="100%">YOGA</td>
                    </tr>
                    <tr align="left" valign="middle">
                        <td style="border:1px solid #E8EAEC;padding: 10px;background-color:#F5F6F7;font-family:Verdana;font-size:15px;color:#616A76;text-align:center">User name = '.$this->input->post('email').' <br>
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

               send_email($this->input->post('email'),$subject, $message);
               $this->session->set_flashdata('success','Registered Successfully');
               return redirect('login');
            }

        }else{
            $this->index();
        }

    }
}