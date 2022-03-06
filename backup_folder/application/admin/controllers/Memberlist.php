<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Memberlist extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Products';
		$this->load->model('model_products');
		$this->load->model('model_branch');
        $this->load->model('model_sitesettings');
        $this->load->model('model_memberlist');
        $this->load->library('image_lib');
	}

    /* 
    * It only redirects to the manage product page
    */
	public function index()
	{
        if(!in_array('viewProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $data['memberlist_details']=$this->model_memberlist->getMemberListData();
        $this->data['memberlist_details']=$data['memberlist_details'];
		$this->render_template('memberlist/index', $this->data);	
	}

    public function add(){
        if(!in_array('viewProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $tax_info = $this->model_sitesettings->getTaxInfoData();
        $branch_data = $this->model_branch->getBranchData();
        $data['modelist']=$this->model_products->getModeListData();
        $this->data['modelist']=$data['modelist'];
        $this->data['tax_info'] = $tax_info;
        $this->data['branch_data'] = $branch_data;
        $this->render_template('memberlist/add', $this->data);    


    }

    public function store(){
        if($_FILES['image']['name']==NULL)
            {
                $product_image=NULL;
            }
            else{  
                $new_name1 = str_replace(".", "", microtime());
                $new_name = str_replace(" ", "_", $new_name1);
                $file_tmp = $_FILES['image']['tmp_name'];
                $file = $_FILES['image']['name'];
                $ext = substr(strrchr($file, '.'), 1);
                move_uploaded_file($file_tmp, "uploads/membership_product/" .$new_name . "." . $ext);
                $product_image= $new_name . "." . $ext;
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/membership_product/' . $product_image;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = 'uploads/membership_product/' . $product_image;  
                $config['quality'] = "100%";
                $this->image_lib->initialize($config);
                $this->image_lib->resize(); 
                
            }
        $data =[
            'tax_type'=>$this->input->post('type'),
            'product_image'=>$product_image,
            'description'=>$this->input->post('description'),
            'name'=>$this->input->post('name'),
            'price'=>$this->input->post('price'),
            'dis_price'=>$this->input->post('discounted_price'),
            'validty_days'=>$this->input->post('validty_days'),
            'no_session'=>$this->input->post('no_session'),
            'branch_id'=>$this->input->post('branch'),
            'mode_id'=>$this->input->post('modelist'),
            'created_at'=>date('Y-m-d'),
        
        ];
        $result = $this->db->insert('membership_list',$data);
        if($result){
            $this->session->set_flashdata('success','Product Added Successfully');
            return redirect('memberlist');
        }else{
            $this->session->set_flashdata('error','Fail To Added');
            return redirect('memberlist');
        }

    }
    public function edit($id){
         if(!in_array('viewProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $tax_info = $this->model_sitesettings->getTaxInfoData();
        $branch_data = $this->model_branch->getBranchData();
        $data['modelist']=$this->model_products->getModeListData();
        $this->data['modelist']=$data['modelist'];

        $this->data['tax_info'] = $tax_info;
        $this->data['branch_data'] = $branch_data;

        $data['memberlist']=$this->model_memberlist->getMemberListData($id);
        $this->data['edit_data']=$data['memberlist'];
        $this->render_template('memberlist/edit', $this->data);    

    }
    public function update(){
        $id=$this->input->post('id');
        if($_FILES['image']['name']==NULL)
            {
                $product_image=$this->input->post('old_image');
            }
            else{  
                $new_name1 = str_replace(".", "", microtime());
                $new_name = str_replace(" ", "_", $new_name1);
                $file_tmp = $_FILES['image']['tmp_name'];
                $file = $_FILES['image']['name'];
                $ext = substr(strrchr($file, '.'), 1);
                move_uploaded_file($file_tmp, "uploads/membership_product/" .$new_name . "." . $ext);
                $product_image= $new_name . "." . $ext;
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/membership_product/' . $product_image;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = 'uploads/membership_product/' . $product_image;  
                $config['quality'] = "100%";
                $this->image_lib->initialize($config);
                $this->image_lib->resize(); 
                
            }
        $data =[
            'tax_type'=>$this->input->post('type'),
            'product_image'=>$product_image,
            'description'=>$this->input->post('description'),
            'name'=>$this->input->post('name'),
            'price'=>$this->input->post('price'),
            'dis_price'=>$this->input->post('discounted_price'),
            'validty_days'=>$this->input->post('validty_days'),
            'no_session'=>$this->input->post('no_session'),
            'branch_id'=>$this->input->post('branch'),
            'mode_id'=>$this->input->post('modelist'),
        ];
        $result = $this->model_memberlist->updateMemebrListData($data,$id);
        if($result > 0){
            $this->session->set_flashdata('success','Product Updated Successfully');
            return redirect('memberlist');
        }else{
            $this->session->set_flashdata('error','Fail To Updated');
            return redirect('memberlist');
        }

    }
    public function delete($id){
        $result = $this->model_memberlist->DeleteMemebrListData($id);
        if($result > 0){
            $this->session->set_flashdata('success','Product Deleted Successfully');
            return redirect('memberlist');
        }else{
            $this->session->set_flashdata('error','Fail To Updated');
            return redirect('memberlist');
        }

    }

   
    

}