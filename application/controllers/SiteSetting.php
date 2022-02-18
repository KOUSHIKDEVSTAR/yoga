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
		$this->load->library('image_lib');
	}

	public function index()
	{
		if(!in_array('updateSetting', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
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

}