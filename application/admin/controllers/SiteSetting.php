<?php 

class SiteSetting extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Site Setting';
		

		$this->load->model('model_users');
		$this->load->model('model_groups');
		$this->load->model('model_sitesettings');
		$this->load->model('model_company');
		$this->load->model('model_products');
		$this->load->library('image_lib');
	}

	public function index()
	{
		if(!in_array('updateSetting', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$this->data['currency_symbols'] = $this->currency();
        $this->data['company_data'] = $this->model_company->getCompanyData(1);
		$site_data = $this->model_sitesettings->getsiteData();
		$this->data['site_data'] = $site_data;
		$this->render_template('sitesetting/index', $this->data);	
	}

	public function logoupload(){


		if($_FILES['image']['name']==NULL)
		{
		    $profile_image=$this->input->post('old_site_logo_value');
		}
		else{  
			$new_name1 = str_replace(".", "", microtime());
			$new_name = str_replace(" ", "_", $new_name1);
			$file_tmp = $_FILES['image']['tmp_name'];
			$file = $_FILES['image']['name'];
			$ext = substr(strrchr($file, '.'), 1);
			move_uploaded_file($file_tmp, "uploads/profile_image/" .$new_name . "." . $ext);
			$profile_image= $new_name . "." . $ext;
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/profile_image/' . $profile_image;
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['new_image'] = 'uploads/profile_image/' . $profile_image;  
			$config['quality'] = "100%";
			$this->image_lib->initialize($config);
			$this->image_lib->resize(); 
			
		}
		$data = [
			'profile_img'=>$profile_image,
		];

		$result = $this->model_staff->update_user_data($data,$id);
		if($result > 1){
			$this->session->set_flashdata('success','Profile Image Updated Successfully');
			return redirect('staff/edit/'.$id);
		}else{
			$this->session->set_flashdata('error','Fail To Update');
			return redirect('staff/edit/'.$id);
		}


	}

	public function financial_expense(){
		if(!in_array('createFinancial', $this->permission) || !in_array('updateFinancial', $this->permission) || !in_array('deleteFinancial', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$financial_data = $this->model_sitesettings->getFincialeData();
		$tax_info = $this->model_sitesettings->getTaxInfoData();
		$this->data['financial_data'] = $financial_data;
		$this->data['tax_info'] = $tax_info;
		$this->render_template('financial_expense/index', $this->data);	
	}
	public function financial_expense_add(){
		if(!in_array('createFinancial', $this->permission) ) {
			redirect('dashboard', 'refresh');
		}
		$site_data = $this->model_sitesettings->getsiteData();
		$this->data['site_data'] = $site_data;



		$this->render_template('financial_expense/add',$this->data);	
	}
	public function financial_expense_store(){
		
		$data = [
			'type'=>$this->input->post('type'),
			'name'=>$this->input->post('name'),
		];
		$result = $this->db->insert('financial_exp_master',$data);
		if($result){
			$this->session->set_flashdata('success','Added Financial Expense Successfully');
			return redirect('sitesetting/financial_expense');

		}else{
			$this->session->set_flashdata('error','Fail To Add');
			return redirect('sitesetting/financial_expense');


		}

	}
	public function tax_info_add(){
		if(!in_array('createFinancial', $this->permission) ) {
			redirect('dashboard', 'refresh');
		}
		$site_data = $this->model_sitesettings->getsiteData();
		$this->data['site_data'] = $site_data;

		$data['product_type']=$this->model_products->getProducTypeData();
        $this->data['product_type']=$data['product_type'];

		$this->render_template('financial_expense/add_tax',$this->data);

	}

	public function tax_store(){
		$data = [
			'template_name'=>$this->input->post('template_name'),
			'tax_name'=>$this->input->post('tax_name'),
			'percentage'=>$this->input->post('percentage'),
			'applicable_on'=>$this->input->post('applicable_on'),
		];
		$result = $this->db->insert('tax_master',$data);
		if($result){
			$this->session->set_flashdata('success','Added Tax Info Successfully');
			return redirect('sitesetting/financial_expense');

		}else{
			$this->session->set_flashdata('error','Fail To Add');
			return redirect('sitesetting/financial_expense');


		}

	}
}