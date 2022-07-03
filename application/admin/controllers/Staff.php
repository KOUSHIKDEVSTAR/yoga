<?php 



class Staff extends Admin_Controller 

{

	public function __construct()

	{

		parent::__construct();



		$this->not_logged_in();

		

		$this->data['page_title'] = 'Staff Setting';

		$this->load->model('model_users');

		$this->load->model('model_groups');

		$this->load->model('model_staff');

		$this->load->library('image_lib');
		$this->load->helper('f1');
	}

	public function password_hash($pass = '')

	{

		if($pass) {

			$password = password_hash($pass, PASSWORD_DEFAULT);

			return $password;

		}

	}

	public function index()

	{

		if(!in_array('createUser',  $this->permission) || !in_array('viewUser',  $this->permission)) {

			print_r($this->permission);

			exit();

			redirect('dashboard', 'refresh');

		}

		

		$staff_data = $this->model_staff->getStaffData();

	

		$this->data['staff_data'] = $staff_data;

		

		$this->render_template('staff/index', $this->data);

	}



	public function add(){

		if(!in_array('createUser',  $this->permission) ) {

			redirect('dashboard', 'refresh');

		}

		$group_data = $this->model_staff->getGroupData();

		$this->data['group_data'] = $group_data;

		$this->render_template('staff/add', $this->data);



	}



	public function store(){

		$this->form_validation->set_rules('groups', 'Group', 'required');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');

		
		$password_not_hash = rand(111111,999999);
		$password = $this->password_hash($password_not_hash);
		$email = $this->input->post('email');

        if ($this->form_validation->run() == TRUE) {

			if($_FILES['image']['name']==NULL)

			{

			    $profile_image=NULL;

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

			if($_FILES['employe_docs']['name']==NULL)

			{

			    $docs=NULL;

			}

			else{  

				$new_name1 = str_replace(".", "", microtime());

				$new_name = str_replace(" ", "_", $new_name1);

				$file_tmp = $_FILES['employe_docs']['tmp_name'];

				$file = $_FILES['employe_docs']['name'];

				$ext = substr(strrchr($file, '.'), 1);

				move_uploaded_file($file_tmp, "uploads/emp_docs/" . $new_name . "." . $ext);

				$docs= $new_name . "." . $ext;

				$config['image_library'] = 'gd2';

				$config['source_image'] = 'uploads/emp_docs/' . $docs;

				$config['create_thumb'] = FALSE;

				$config['maintain_ratio'] = FALSE;

				$config['new_image'] = 'uploads/emp_docs/' . $docs;  

				$config['quality'] = "100%";

				$this->image_lib->initialize($config);

				$this->image_lib->resize(); 

				

			}

			$data = [

				'firstname'=>$this->input->post('first_name'),

				'lastname'=>$this->input->post('last_name'),

				'username'=>$this->input->post('email'),

				'email'=>$this->input->post('email'),

				'password' => $password,

				'phone'=>$this->input->post('contact_number'),

				'emp_ment_typ'=>$this->input->post('employement_type'),

				'emp_docs'=>$docs,

				'id_docs_name'=>$this->input->post('id_docs_name'),

				'id_docs_no'=>$this->input->post('id_docs_no'),

				'profile_img'=>$profile_image,

				'tax_id'=>$this->input->post('tax_id'),

				'dob'=>$this->input->post('dob'),

				'gender'=>$this->input->post('gender'),

				'date_of_joining'=>$this->input->post('date_of_jng'),

				'created_at'=>date('Y-m-d'),

				'is_active'=>1,



			];

			$result = $this->db->insert('users',$data);

			if($result){

				$message = '<table style="font-family:Verdana;font-size:13px;" border="0" cellspacing="0" cellpadding="5" width="100%" dir="rtl">
                    <tbody>
          
                    <tr align="left" valign="middle">
                    <td style="background-color: #00acac;padding: 10px;border:1px solid #E8EAEC;vertical-align:middle;font-family:Verdana;color:#FFF;font-weight:bold;font-size:15px;text-align:center" width="100%">YOGA</td>
                    </tr>
                    <tr align="left" valign="middle">
                        <td style="border:1px solid #E8EAEC;padding: 10px;background-color:#F5F6F7;font-family:Verdana;font-size:15px;color:#616A76;text-align:center">User name = '.$email.' <br>
                        Password = '.$password_not_hash.'
                        </td>
                        </tr>
                        <tr>
                        
                    </tr>
                    </tbody>
                    </table>';
                    $subject = "Registration Details";

               send_email($email,$subject, $message);

				$this->session->set_flashdata('success','Staff Added Successfully');

				return redirect('staff');

			}else{

				$this->session->set_flashdata('error','Fail To Added');

				return redirect('staff');

			}

		}else {

			$this->add();

		}





	}

	public function edit($id){

		if(!in_array('updateUser',  $this->permission)) {

			redirect('dashboard', 'refresh');

		}

		$user_data = $this->model_staff->getUserById($id);

    	$groups = $this->model_staff->getGroupData();

    	$this->data['user_data'] = $user_data;

    	$this->data['group_data'] = $groups;

		$this->render_template('staff/edit',$this->data);



	}

	public function view($id){

		if(!in_array('viewUser',  $this->permission)) {

			redirect('dashboard', 'refresh');

		}

		$user_data = $this->model_staff->getUserById($id);

    	$groups = $this->model_staff->getGroupData();

    	$this->data['user_data'] = $user_data;

    	$this->data['group_data'] = $groups;

		$this->render_template('staff/view',$this->data);



	}

	public function update(){

		$id = $this->input->post('id');

		if($_FILES['employe_docs']['name']==NULL)

		{

		    $docs=$this->input->post('old_docs');

		}

		else{  

			$new_name1 = str_replace(".", "", microtime());

			$new_name = str_replace(" ", "_", $new_name1);

			$file_tmp = $_FILES['employe_docs']['tmp_name'];

			$file = $_FILES['employe_docs']['name'];

			$ext = substr(strrchr($file, '.'), 1);

			move_uploaded_file($file_tmp, "uploads/emp_docs/" . $new_name . "." . $ext);

			$docs= $new_name . "." . $ext;

			$config['image_library'] = 'gd2';

			$config['source_image'] = 'uploads/emp_docs/' . $docs;

			$config['create_thumb'] = FALSE;

			$config['maintain_ratio'] = FALSE;

			$config['new_image'] = 'uploads/emp_docs/' . $docs;  

			$config['quality'] = "100%";

			$this->image_lib->initialize($config);

			$this->image_lib->resize(); 

			

		}

		$data = [

			

			'firstname'=>$this->input->post('first_name'),

			'lastname'=>$this->input->post('last_name'),

			'username'=>$this->input->post('email'),

			'email'=>$this->input->post('email'),

			

			'phone'=>$this->input->post('contact_number'),

			'emp_ment_typ'=>$this->input->post('employement_type'),

			'emp_docs'=>$docs,

			'id_docs_name'=>$this->input->post('id_docs_name'),

			'id_docs_no'=>$this->input->post('id_docs_no'),

			'tax_id'=>$this->input->post('tax_id'),

			'dob'=>$this->input->post('dob'),

			'gender'=>$this->input->post('gender'),

			'date_of_joining'=>$this->input->post('date_of_jng'),

			'created_at'=>date('Y-m-d'),

			



		];

		$result = $this->model_staff->update_user_data($data,$id);

		if($result > 1){

			$this->session->set_flashdata('success','Staff Updated Successfully');

			return redirect('staff');

		}else{

			$this->session->set_flashdata('error','Fail To Update');

			return redirect('staff');

		}



	}

	public function profile_img_update($id){

		

		if($_FILES['image']['name']==NULL)

		{

		    $profile_image=NULL;

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