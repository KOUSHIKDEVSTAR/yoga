<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile  extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->data['page_title'] = '404 Error';
		$this->load->helper('url');
		$this->load->model('model_auth');
	    $this->load->library('image_lib');
	}
    public function index(){
    	if($this->session->userdata('cust_email')){
    		$email = $this->session->userdata('cust_email');
    		$this->data['customer_details'] = $this->model_auth->checkUser($email);
    		$this->render_template('profile/index',$this->data);

    	}else{
    		return redirect('login');
    	}
    
    }
    public function edit(){
    	if($this->session->userdata('cust_email')){
    		$email = $this->session->userdata('cust_email');
    		$this->data['customer_details'] = $this->model_auth->checkUser($email);
    		$this->render_template('profile/edit',$this->data);

    	}else{
    		return redirect('login');
    	}

    }
    public function update(){
    	$id = $this->input->post('id');
        if($_FILES['image']['name']==NULL)
            {
                $customer_image=$this->input->post('old_image');
            }
            else{  
                $new_name1 = str_replace(".", "", microtime());
                $new_name = str_replace(" ", "_", $new_name1);
                $file_tmp = $_FILES['image']['tmp_name'];
                $file = $_FILES['image']['name'];
                $ext = substr(strrchr($file, '.'), 1);
                move_uploaded_file($file_tmp, "admin/uploads/customer_details/" .$new_name . "." . $ext);
                $customer_image= $new_name . "." . $ext;
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'admin/uploads/customer_details/' . $customer_image;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = 'admin/uploads/customer_details/' . $customer_image;  
                $config['quality'] = "100%";
                $this->image_lib->initialize($config);
                $this->image_lib->resize(); 
                
            }
            if($_FILES['other_docs']['name']==NULL)
            {
                $other_docs=$this->input->post('old_other_docs');
            }
            else{  
                $new_name1 = str_replace(".", "", microtime());
                $new_name = str_replace(" ", "_", $new_name1);
                $file_tmp = $_FILES['other_docs']['tmp_name'];
                $file = $_FILES['other_docs']['name'];
                $ext = substr(strrchr($file, '.'), 1);
                move_uploaded_file($file_tmp, "admin/uploads/customer_details/" .$new_name . "." . $ext);
                $other_docs= $new_name . "." . $ext;
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'admin/uploads/customer_details/' . $other_docs;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = 'admin/uploads/customer_details/' . $other_docs;  
                $config['quality'] = "100%";
                $this->image_lib->initialize($config);
                $this->image_lib->resize(); 
                
            }
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data=[
                'full_name'=>$this->input->post('name'),
                'email'=>$this->input->post('email'),
                'mobile_number'=>$this->input->post('mobile_number'),
                'pr_image'=>$customer_image,
                'branch_id'=>$this->input->post('branch_id'),
                'address'=>$this->input->post('address'),
                'dob'=>$this->input->post('dob'),
                'other_docs'=>$other_docs,
            ];
            $result = $this->model_auth->updateCustomerData($data,$id);
            if($result){
            	$this->session->set_flashdata('success','Profile Updated');
            	return redirect('profile');
            }else{
            	$this->session->set_flashdata('error','Fail To Update');
            	return redirect('profile');
            }
        }

    }
}