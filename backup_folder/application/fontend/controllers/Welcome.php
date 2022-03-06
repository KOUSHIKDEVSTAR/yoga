<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome  extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->data['page_title'] = '404 Error';
		$this->load->helper('url');
	}
    public function index(){
 
        $this->output->set_status_header('404'); 
        $this->render_template('welcome_message', $this->data);
        // $this->load->view('welcome_message');
     
      }
}