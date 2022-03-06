<?php 

class Customers extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Customers';
		$this->load->model('model_groups');
		$this->load->model('model_branch');
		$this->load->model('model_customers');
		$this->load->library('image_lib');
        $this->load->helper('f1');
        $this->load->library('encrypt');
	}

	public function index()
	{
        if(!in_array('viewCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $data['customer_details']=$this->model_customers->getCustomerListData(); 

        $this->data['customer_details']=$data['customer_details'];
		$this->render_template('customer/index', $this->data);	
	}

	public function add(){
		if(!in_array('createCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $data['customer_details']=$this->model_customers->getCustomerListData();
        $branch_data = $this->model_branch->getBranchData();
        $this->data['customer_details']=$data['customer_details'];
        $this->data['branch_data'] = $branch_data;
		$this->render_template('customer/add', $this->data);	

	}
    public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}
	public function store(){
		if($_FILES['image']['name']==NULL)
            {
                $customer_image=NULL;
            }
            else{  
                $new_name1 = str_replace(".", "", microtime());
                $new_name = str_replace(" ", "_", $new_name1);
                $file_tmp = $_FILES['image']['tmp_name'];
                $file = $_FILES['image']['name'];
                $ext = substr(strrchr($file, '.'), 1);
                move_uploaded_file($file_tmp, "uploads/customer_details/" .$new_name . "." . $ext);
                $customer_image= $new_name . "." . $ext;
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/customer_details/' . $customer_image;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = 'uploads/customer_details/' . $customer_image;  
                $config['quality'] = "100%";
                $this->image_lib->initialize($config);
                $this->image_lib->resize(); 
                
            }
            if($_FILES['other_docs']['name']==NULL)
            {
                $other_docs=NULL;
            }
            else{  
                $new_name1 = str_replace(".", "", microtime());
                $new_name = str_replace(" ", "_", $new_name1);
                $file_tmp = $_FILES['other_docs']['tmp_name'];
                $file = $_FILES['other_docs']['name'];
                $ext = substr(strrchr($file, '.'), 1);
                move_uploaded_file($file_tmp, "uploads/customer_details/" .$new_name . "." . $ext);
                $other_docs= $new_name . "." . $ext;
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/customer_details/' . $other_docs;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = 'uploads/customer_details/' . $other_docs;  
                $config['quality'] = "100%";
                $this->image_lib->initialize($config);
                $this->image_lib->resize(); 
                
            }
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[customers.email]');
        if ($this->form_validation->run() == TRUE) {
            $password = rand(111111,999999);
            $password_hash = $this->password_hash($password);
        	$data=[
        		'full_name'=>$this->input->post('name'),
        		'email'=>$this->input->post('email'),
        		'mobile_number'=>$this->input->post('mobile_number'),
        		'pr_image'=>$customer_image,
        		'branch_id'=>$this->input->post('branch_id'),
        		'address'=>$this->input->post('address'),
        		'dob'=>$this->input->post('dob'),
        		'other_docs'=>$other_docs,
        		'password'=>$password_hash,
        	];
        	$result = $this->db->insert('customers',$data);
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
                    $subject = "Customer Added Successfully";

            send_email($this->input->post('email'),$subject, $message);
            $this->session->set_flashdata('success','Customer Created Successfully');
            return redirect('customers');
	        }else{
	            $this->session->set_flashdata('error','Fail To Updated');
	            return redirect('customers');
	        }
        }else{
        	$this->add();
        }

	}
    public function edit($id){
        
        if(!in_array('updateCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $data['customer_details']=$this->model_customers->getCustomerListData($id);
        $branch_data = $this->model_branch->getBranchData();
        $this->data['customer_details']=$data['customer_details'];
        $this->data['branch_data'] = $branch_data;
        $this->render_template('customer/edit', $this->data);    


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
                move_uploaded_file($file_tmp, "uploads/customer_details/" .$new_name . "." . $ext);
                $customer_image= $new_name . "." . $ext;
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/customer_details/' . $customer_image;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = 'uploads/customer_details/' . $customer_image;  
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
                move_uploaded_file($file_tmp, "uploads/customer_details/" .$new_name . "." . $ext);
                $other_docs= $new_name . "." . $ext;
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/customer_details/' . $other_docs;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = 'uploads/customer_details/' . $other_docs;  
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
                'password'=>rand(111111,999999),
            ];
            $result = $this->model_customers->updateCustomerData($data,$id);
            if($result){
            $this->session->set_flashdata('success','Customer Updated Successfully');
            return redirect('customers');
            }else{
                $this->session->set_flashdata('error','Fail To Updated');
                return redirect('customers');
            }
        }else{
            $this->edit($id);
        }


    }
    public function delete($id){
        $result = $this->model_customers->DeleteCustomerListData($id);
        if($result > 0){
            $this->session->set_flashdata('success','Customer Deleted Successfully');
            return redirect('customers');
        }else{
            $this->session->set_flashdata('error','Fail To Updated');
            return redirect('customers');
        }
    }

    public function view($id){
        if(!in_array('updateCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $data['customer_details']=$this->model_customers->getCustomerListData($id);
        $branch_data = $this->model_branch->getBranchData();
        $this->data['customer_details']=$data['customer_details'];
        $this->data['branch_data'] = $branch_data;

        $data['customer_inv_det']=$this->model_customers->getCustomerInvoiceDataById($id);
        $this->data['customer_inv_det']=$data['customer_inv_det'];
        $this->render_template('customer/view',$this->data);

    }

    public function status_update($id,$status){
        $data = [
            'is_active'=>$status,
        ];
        $this->db->where('cust_id',$id);
        $this->db->update('customers',$data);
        $affected_rows  = $this->db->affected_rows();
        if($affected_rows){
            return redirect('Customers/view/'.$id.'');

        }else{
             return redirect('Customers/view/'.$id.'');

        }


    }



}