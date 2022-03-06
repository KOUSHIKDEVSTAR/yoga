<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Branch';

		$this->load->model('model_branch');
	}

	/* 
	* It only redirects to the manage product page and
	*/
	public function index()
	{
		if(!in_array('viewBranch', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$result = $this->model_branch->getBranchData();

		$this->data['results'] = $result;
		$groups_data = $this->model_branch->getBranchData();
		$this->data['groups_data'] = $groups_data;
		$this->render_template('branch/index', $this->data);
	}

	/*
	* Fetches the brand data from the brand table 
	* this function is called from the datatable ajax function
	*/
	public function fetchBranchData()
	{
		$result = array('data' => array());

		$data = $this->model_branch->getBranchData();
		
		foreach ($data as $key => $value) {

			// button
			$buttons = '';

			if(in_array('viewBranch', $this->permission)) {
				$buttons .= '<button type="button" class="btn btn-default" onclick="editBranch('.$value['id'].')" data-toggle="modal" data-target="#editBranchModal"><i class="fa fa-pencil"></i></button>';	
			}
			
			if(in_array('deleteBranch', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeBranch('.$value['id'].')" data-toggle="modal" data-target="#removeBranchModal"><i class="fa fa-trash"></i></button>
				';
			}				

			$status = ($value['active'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['name'],
				$status,
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	/*
	* It checks if it gets the brand id and retreives
	* the brand information from the brand model and 
	* returns the data into json format. 
	* This function is invoked from the view page.
	*/
	public function fetchBranchDataById($id)
	{
		if($id) {
			$data = $this->model_branch->getBranchData($id);
			echo json_encode($data);
		}

		return false;
	}

	/*
	* Its checks the brand form validation 
	* and if the validation is successfully then it inserts the data into the database 
	* and returns the json format operation messages
	*/

	public function add(){
		if(!in_array('createBranch', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$groups_data = $this->model_branch->getBranchData();
		$this->data['groups_data'] = $groups_data;
		$this->render_template('branch/create',$this->data);

	}
	public function create()
	{
	
		if(!in_array('createBranch', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		// $response = array();

		$this->form_validation->set_rules('branch_name', 'Branch name', 'trim|required');
		$this->form_validation->set_rules('active', 'Active', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'name' => $this->input->post('branch_name'),
        		'branch_address' => $this->input->post('branch_address'),
        		'branch_phone' => $this->input->post('branch_phone'),
        		'active' => $this->input->post('active'),	
        	);

        	$create = $this->model_branch->create($data);
        	if($create) {
				$this->session->set_flashdata('success', 'Successfully updated');
		        redirect('branch/index', 'refresh');
        		
        		
				
        	}
        	else {
        		
        		$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect('branch/index', 'refresh');		
        	}
        }
        else {
        	
        	$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('branch/add', 'refresh');
        }

        // echo json_encode($response);

	}

	/*
	* Its checks the brand form validation 
	* and if the validation is successfully then it updates the data into the database 
	* and returns the json format operation messages
	*/
	public function edit($id){
		if(!in_array('updateBranch', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		$this->data['edit_data'] = $this->model_branch->getBranchData($id);
		$groups_data = $this->model_branch->getBranchData();
		$this->data['groups_data'] = $groups_data;
		$this->render_template('branch/edit',$this->data);
		

	}
	public function update()
	{
		if(!in_array('updateBranch', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$id=$this->input->post('id');

		

		if($id){
			$this->form_validation->set_rules('branch_name', 'Branch name', 'trim|required');
			$this->form_validation->set_rules('active', 'Active', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE) {
	        	$data = array(
	        		'name' => $this->input->post('branch_name'),
	        		'branch_address' => $this->input->post('branch_address'),
	        		'branch_phone' => $this->input->post('branch_phone'),
	        		'active' => $this->input->post('active'),	
	        	);

	        	$update = $this->model_branch->update($data, $id);
	        	if($update) {
	        		
	        		$this->session->set_flashdata('success', 'Successfully updated');
					redirect('branch/index', 'refresh');
	        	}
	        	else {
	        		
					$this->session->set_flashdata('errors', 'Error occurred!!');
					redirect('branch/index', 'refresh');
	        				
	        	}
	        }
	        else {
	        	$this->edit($id);
	        	$this->session->set_flashdata('errors', 'Error occurred!!');
	        }
		}
		else {
			
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('branch/index', 'refresh');
		}

		
	}

	/*
	* It removes the brand information from the database 
	* and returns the json format operation messages
	*/
	public function remove($brand_id)
	{
		if(!in_array('deleteBranch', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		// $brand_id = $this->input->post('brand_id');
		// $response = array();
		if($brand_id) {
			$delete = $this->model_branch->remove($brand_id);

			if($delete ) {
				
				$this->session->set_flashdata('success', 'Successfully deteled');
				redirect('branch/index', 'refresh');
			}
			else {
				
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect('branch/index', 'refresh');
			}
		}
		else {
		return redirect('branch/index');
		}

		
	}

}