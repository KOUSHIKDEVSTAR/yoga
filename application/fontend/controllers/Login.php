<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login  extends Admin_Controller 
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

    public function index(){
        if($this->session->userdata('cust_email')){
            return redirect('profile');
        }else{
            $this->load->view('login',$this->data);
        }
         

    }
    public function auth(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $verify_user = $this->model_auth->checkUser($email);
        if(isset($verify_user[0])){
            $user_pass = $verify_user[0]->password;
            if($user_pass == $password){
                $verify_active = $this->model_auth->checkUserActive($email);

                if($verify_active[0]){
                    $session_data = array( 
                      'cust_id' =>$verify_active[0]->cust_id,
                      'cust_email'=>$verify_active[0]->email,
                    );
                    $this->session->set_userdata($session_data);  
                    return redirect('profile');

                }else{
                    $this->session->set_flashdata('error_act','Your Account is Suspended');
                    return redirect('login');
                }
            }else{
                $this->session->set_flashdata('error_paas','Password Doesnot Match');
                return redirect('login');
            }
        }else{
            $message = "No Customer Available";
            $this->session->set_flashdata('error',$message);
            return redirect('login');
        }
        
    }

    public function logout(){
        if($this->session->userdata('cust_id')){
        $this->session->sess_destroy();
        return redirect('login');

        }elseif($this->session->userdata('cust_email')){
            $this->session->sess_destroy();
            return redirect('login');
        }

    }
   
}