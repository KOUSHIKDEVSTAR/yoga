<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Products';

		$this->load->model('model_products');
		$this->load->model('model_branch');
		$this->load->model('model_category');
		$this->load->model('model_stores');
		$this->load->model('model_attributes');
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
        $data['products_details']=$this->model_products->getProductData();
        $this->data['products_details']=$data['products_details'];
		$this->render_template('products/index', $this->data);	
	}

    public function add(){
        if(!in_array('createProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $data['product_type']=$this->model_products->getProducTypeData();
        $this->data['product_type']=$data['product_type'];

        $data['branch_type']=$this->model_products->getBranchTypeData();
        $this->data['branch_type']=$data['branch_type'];
        $this->render_template('products/create', $this->data);

    }

    public function store(){
        if(!in_array('createProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
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
                move_uploaded_file($file_tmp, "uploads/product_image/" .$new_name . "." . $ext);
                $product_image= $new_name . "." . $ext;
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/product_image/' . $product_image;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = 'uploads/product_image/' . $product_image;  
                $config['quality'] = "100%";
                $this->image_lib->initialize($config);
                $this->image_lib->resize(); 
                
            }

        $data = [
            'name'=>$this->input->post('name'),
            'type'=>$this->input->post('type'),
            'price'=>$this->input->post('price'),
            'discounted_price'=>$this->input->post('discounted_price'),
            'image'=>$product_image,
            'availble_at'=>$this->input->post('available_in'),
            'description'=>$this->input->post('description'),
            'created_at'=>date('Y-m-d'),
        ];

        $result = $this->db->insert('products',$data);
        if($result){
            $this->session->set_flashdata('success','Product Added Successfully');
            return redirect('products/index');
        }else{
            $this->session->set_flashdata('error','Fail To Added');
            return redirect('products/index');
        }

    }

    public function view_details($id=null){
        if(!in_array('viewProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $data['products_details']=$this->model_products->getProductData($id);
        $this->data['products_details']=$data['products_details'];
        $this->render_template('products/deatils', $this->data);
    }
    public function edit($id=null){
        if(!in_array('updateProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $data['products_details']=$this->model_products->getProductData($id);
        $this->data['products_details']=$data['products_details'];

        $data['product_type']=$this->model_products->getProducTypeData();
        $this->data['product_type']=$data['product_type'];

        $data['branch_type']=$this->model_products->getBranchTypeData();
        $this->data['branch_type']=$data['branch_type'];
        $this->render_template('products/edit', $this->data);

    }
    public function update(){
        if(!in_array('updateProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $id = $this->input->post('id');
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
                move_uploaded_file($file_tmp, "uploads/product_image/" .$new_name . "." . $ext);
                $product_image= $new_name . "." . $ext;
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/product_image/' . $product_image;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = 'uploads/product_image/' . $product_image;  
                $config['quality'] = "100%";
                $this->image_lib->initialize($config);
                $this->image_lib->resize(); 
                
            }

        $data = [
            'name'=>$this->input->post('name'),
            'type'=>$this->input->post('type'),
            'price'=>$this->input->post('price'),
            'discounted_price'=>$this->input->post('discounted_price'),
            'image'=>$product_image,
            'availble_at'=>$this->input->post('available_in'),
            'description'=>$this->input->post('description'),
            'created_at'=>date('Y-m-d'),
        ];

        $result = $this->model_products->updateProducts($data,$id);
        if($result > 1){
            $this->session->set_flashdata('success','Product Updated Successfully');
            return redirect('products/index');
        }else{
            $this->session->set_flashdata('error','Fail To Updated');
            return redirect('products/index');
        }


    }

    public function modelist(){
        if(!in_array('viewProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $data['modelist']=$this->model_products->getModeListData();
        $this->data['modelist']=$data['modelist'];
        $this->render_template('modelist/index', $this->data);  
    }

    public function modelist_add(){
        if(!in_array('createProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $this->render_template('modelist/add',$this->data); 

    }
    public function modelist_submit(){
        $data= [
            'mode_name'=>$this->input->post('mode_name'),
            'created_at'=>date('Y-m-d'),
        ];
        $result = $this->db->insert('mode_list',$data);
        if($result){
            $this->session->set_flashdata('success','Added Successfully');
            return redirect('products/modelist');
        }else{
            $this->session->set_flashdata('error','Fail To Added');
            return redirect('products/modelist');
        }
        
    }
    public function modelist_delete($id){
        if(!in_array('deleteProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $this->db->where('mode_id',$id);
        $result = $this->db->delete('mode_list');
        if($result){
            $this->session->set_flashdata('success','Deleted Successfully');
            return redirect('products/modelist');
        }else{
            $this->session->set_flashdata('error','Fail To Delete');
            return redirect('products/modelist');
        }



    }

    

}