<?php 



class Video extends Admin_Controller 

{

	public function __construct()

	{

		parent::__construct();



		$this->not_logged_in();



		$this->data['page_title'] = 'Groups';

		



		$this->load->model('model_groups');
		$this->load->library('image_lib');

	}



	/* 

	* It redirects to the manage group page

	* As well as the group data is also been passed to display on the view page

	*/

	public function index()

	{



		if(!in_array('viewGroup', $this->permission)) {

			redirect('dashboard', 'refresh');

		}



		$groups_data = $this->model_groups->getGroupData();

		$this->data['groups_data'] = $groups_data;

		$this->data['page_title'] = 'Video';

		$this->db->select('v.*');
		$this->db->from('videos v');
		$this->data['video_data'] = $this->db->get()->result();

		$this->render_template('video/index', $this->data);

	}	



	/*

	* If the validation is not valid, then it redirects to the create page.

	* If the validation is for each input field is valid then it inserts the data into the database 

	* and it stores the operation message into the session flashdata and display on the manage group page

	*/

	public function add()

	{



		if(!in_array('createGroup', $this->permission)) {

			redirect('dashboard', 'refresh');

		}

		$groups_data = $this->model_groups->getGroupData();

		$this->data['groups_data'] = $groups_data;
		$this->data['page_title'] = 'Add Video';

		$this->db->select('*');
		$this->db->from('membership_list');
		$this->db->where('membership_product_type','Membership');
		$this->data['membership_data'] = $this->db->get()->result();

		$this->render_template('video/add', $this->data);


	}

	public function store(){
		$config = array(
            'allowed_types' =>  'mp4|3gp|flv|mp3',
            'upload_path' => 'uploads/video'
        );
        $this->load->library('upload', $config);
        $this->upload->do_upload('video_uplod');
        $video=$this->upload->data('file_name');

        $data=[
        	'videos_title'=>$this->input->post('title'),
        	'videos_type'=>$this->input->post('video_type'),
        	'video_plan'=>$this->input->post('video_plan'),
        	'status'=>$this->input->post('status'),
        	'video_file'=>$video,
        	
        ];

        $this->db->insert('videos',$data);
        return redirect('Video/index');
           
	}



	/*

	* If the validation is not valid, then it redirects to the edit group page 

	* If the validation is successfully then it updates the data into the database 

	* and it stores the operation message into the session flashdata and display on the manage group page

	*/

	public function edit($id = null)

	{



		if(!in_array('updateGroup', $this->permission)) {

			redirect('dashboard', 'refresh');

		}

		$groups_data = $this->model_groups->getGroupData();

		$this->data['groups_data'] = $groups_data;
		$this->data['page_title'] = 'Edit Video';

		$this->db->select('*');
		$this->db->from('membership_list');
		$this->db->where('membership_product_type','Membership');
		$this->data['membership_data'] = $this->db->get()->result();

		$this->db->select('*');
		$this->db->from('videos v');
		$this->db->where('v.videos_id',$id);
		$this->data['edit_data'] = $this->db->get()->result();

		$this->render_template('video/edit', $this->data);


	}

	public function update(){
		$id = $this->input->post('id');
		if($_FILES['video_uplod']['name'] == NULL){
			$video=$this->input->post('old_video_uplod');

		}else{
			$config = array(
	            'allowed_types' =>  'mp4|3gp|flv|mp3',
	            'upload_path' => 'uploads/video'
		        );
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('video_uplod');
	        $video=$this->upload->data('file_name');
		}
		
        $data=[
        	'videos_title'=>$this->input->post('title'),
        	'videos_type'=>$this->input->post('video_type'),
        	'video_plan'=>$this->input->post('video_plan'),
        	'status'=>$this->input->post('status'),
        	'video_file'=>$video,
        	
        ];
        $this->db->where('videos_id',$id);
        $this->db->update('videos',$data);
        return redirect('Video/index');

	}



	/*

	* It removes the removes information from the database 

	* and it stores the operation message into the session flashdata and display on the manage group page

	*/

	// public function delete($id)

	// {



	// 	if(!in_array('deleteGroup', $this->permission)) {

	// 		redirect('dashboard', 'refresh');

	// 	}



	// 	if($id) {

	// 		if($this->input->post('confirm')) {



	// 			$check = $this->model_groups->existInUserGroup($id);

	// 			if($check == true) {

	// 				$this->session->set_flashdata('error', 'Group exists in the users');

	//         		redirect('groups/', 'refresh');

	// 			}

	// 			else {

	// 				$delete = $this->model_groups->delete($id);

	// 				if($delete == true) {

	// 	        		$this->session->set_flashdata('success', 'Successfully removed');

	// 	        		redirect('groups/', 'refresh');

	// 	        	}

	// 	        	else {

	// 	        		$this->session->set_flashdata('error', 'Error occurred!!');

	// 	        		redirect('groups/delete/'.$id, 'refresh');

	// 	        	}

	// 			}	

	// 		}	

	// 		else {

	// 			$this->data['id'] = $id;

	// 			$this->render_template('groups/delete', $this->data);

	// 		}	

	// 	}

	// }





}