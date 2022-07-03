<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Memberlist extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

	

		$this->data['page_title'] = 'Products';
        $this->load->helper('url');
		$this->load->model('model_auth');
	    $this->load->library('image_lib');
		$this->load->model('model_products');
		$this->load->model('model_branch');
        // $this->load->model('model_sitesettings');
        $this->load->model('model_memberlist');
        $this->load->library('image_lib');
        $this->load->library('stripe_lib');
	}

    /* 
    * It only redirects to the manage product page
    */
	public function index()
	{
        
        $data['memberlist_details']=$this->model_memberlist->getsubscriptionData();
        $this->data['memberlist_details']=$data['memberlist_details'];
        $this->data['publishableKey']="pk_test_51HNKXeFjQ4dpWp5WaLwveImoE5sMMi9mF10LtMp7vPK2hW1MuVpJ6UNbYCmvZEkKK35mFFmHJ8YrsUfHqkyKT44t00dHjaA6Tb";
		$this->render_template('memberlist/index', $this->data);	
	}

    public function purchase($id){
        if($this->session->userdata('cust_email')){
    		$this->data = array();
    		
    		// Get product data from the database
            $product = $this->model_memberlist->getMemberListData($id);
            $this->data['subs_info']=$product;

            

            if($this->session->userdata('cust_id')){
                $cust_id = $this->session->userdata('cust_id');
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where('id',$cust_id);
                $this->data['cust_info']= $this->db->get()->result();

            // echo "<pre>";print_r( $this->data['cust_info']);exit();

            }
         
    		
    		// If payment form is submitted with token
    		if($this->input->post('stripeToken')){
    			// Retrieve stripe token, card and user info from the submitted form data
    			$postData = $this->input->post();
    			$postData['product'] = $product;
    			
    			// Make payment
    			$paymentID = $this->payment($postData);
    			
    			// If payment successful
    			if($paymentID){
    				redirect('products/payment_status/'.$paymentID);
    			}else{
    				$apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    				$this->data['error_msg'] = 'Transaction has been failed!'.$apiError;
    			}
    		}
            
            // Pass product data to the details view
    		$this->data['product'] = $product;
            $this->render_template('checkout', $this->data);
        }else{
            return redirect('login');
        }
    }

    public function delivr_add_save(){
        $data =[
            'deliv_mobile'=>$this->input->post('mobile'),
            'delvr_flat_no'=>$this->input->post('house_no'),
            'delvr_landmark'=>$this->input->post('land_maRK'),
            'delvr_town_city'=>$this->input->post('town_city'),
            'delvr_pincode'=>$this->input->post('pincode'),
            'delvr_state'=>$this->input->post('state'),
            'delvr_addres_type'=>$this->input->post('add_type'),
            'delvr_user_id'=>$this->input->post('user_id'),
            'delvr_name'=>$this->input->post('full_name'),
            'delvr_created_at'=>date('Y-m-d'),

        ];

        $res = $this->db->insert('tbl_user_deliver_details',$data);
        echo $res;

    }

    public function coupon_dis_get(){

        $coupon_code = $this->input->post('coupons_code');
        $this->db->select('*');
        $this->db->from('tbl_coupons');
        $this->db->where('coup_code',$coupon_code);
        $this->data['all_coupons'] = $this->db->get()->result();
        echo json_encode(array('data' => $this->data));

    }

    // public function add(){
    //     if(!in_array('viewProduct', $this->permission)) {
    //         redirect('dashboard', 'refresh');
    //     }
    //     $tax_info = $this->model_sitesettings->getTaxInfoData();
    //     $branch_data = $this->model_branch->getBranchData();
    //     $data['modelist']=$this->model_products->getModeListData();
    //     $this->data['modelist']=$data['modelist'];
    //     $this->data['tax_info'] = $tax_info;
    //     $this->data['branch_data'] = $branch_data;
    //     $this->render_template('memberlist/add', $this->data);    


    // }

    // public function store(){
    //     if($_FILES['image']['name']==NULL)
    //         {
    //             $product_image=NULL;
    //         }
    //         else{  
    //             $new_name1 = str_replace(".", "", microtime());
    //             $new_name = str_replace(" ", "_", $new_name1);
    //             $file_tmp = $_FILES['image']['tmp_name'];
    //             $file = $_FILES['image']['name'];
    //             $ext = substr(strrchr($file, '.'), 1);
    //             move_uploaded_file($file_tmp, "uploads/membership_product/" .$new_name . "." . $ext);
    //             $product_image= $new_name . "." . $ext;
    //             $config['image_library'] = 'gd2';
    //             $config['source_image'] = 'uploads/membership_product/' . $product_image;
    //             $config['create_thumb'] = FALSE;
    //             $config['maintain_ratio'] = FALSE;
    //             $config['new_image'] = 'uploads/membership_product/' . $product_image;  
    //             $config['quality'] = "100%";
    //             $this->image_lib->initialize($config);
    //             $this->image_lib->resize(); 
                
    //         }
    //     $data =[
    //         'tax_type'=>$this->input->post('type'),
    //         'product_image'=>$product_image,
    //         'description'=>$this->input->post('description'),
    //         'name'=>$this->input->post('name'),
    //         'price'=>$this->input->post('price'),
    //         'dis_price'=>$this->input->post('discounted_price'),
    //         'validty_days'=>$this->input->post('validty_days'),
    //         'no_session'=>$this->input->post('no_session'),
    //         'branch_id'=>$this->input->post('branch'),
    //         'mode_id'=>$this->input->post('modelist'),
    //         'created_at'=>date('Y-m-d'),
    //         'membership_product_type'=>$this->input->post('membership_product_type'),
        
    //     ];
    //     $result = $this->db->insert('membership_list',$data);
    //     if($result){
    //         $this->session->set_flashdata('success','Product Added Successfully');
    //         return redirect('memberlist');
    //     }else{
    //         $this->session->set_flashdata('error','Fail To Added');
    //         return redirect('memberlist');
    //     }

    // }
    // public function edit($id){
    //      if(!in_array('viewProduct', $this->permission)) {
    //         redirect('dashboard', 'refresh');
    //     }
    //     $tax_info = $this->model_sitesettings->getTaxInfoData();
    //     $branch_data = $this->model_branch->getBranchData();
    //     $data['modelist']=$this->model_products->getModeListData();
    //     $this->data['modelist']=$data['modelist'];

    //     $this->data['tax_info'] = $tax_info;
    //     $this->data['branch_data'] = $branch_data;

    //     $data['memberlist']=$this->model_memberlist->getMemberListData($id);
    //     $this->data['edit_data']=$data['memberlist'];
    //     $this->render_template('memberlist/edit', $this->data);    

    // }
    // public function update(){
    //     $id=$this->input->post('id');
    //     if($_FILES['image']['name']==NULL)
    //         {
    //             $product_image=$this->input->post('old_image');
    //         }
    //         else{  
    //             $new_name1 = str_replace(".", "", microtime());
    //             $new_name = str_replace(" ", "_", $new_name1);
    //             $file_tmp = $_FILES['image']['tmp_name'];
    //             $file = $_FILES['image']['name'];
    //             $ext = substr(strrchr($file, '.'), 1);
    //             move_uploaded_file($file_tmp, "uploads/membership_product/" .$new_name . "." . $ext);
    //             $product_image= $new_name . "." . $ext;
    //             $config['image_library'] = 'gd2';
    //             $config['source_image'] = 'uploads/membership_product/' . $product_image;
    //             $config['create_thumb'] = FALSE;
    //             $config['maintain_ratio'] = FALSE;
    //             $config['new_image'] = 'uploads/membership_product/' . $product_image;  
    //             $config['quality'] = "100%";
    //             $this->image_lib->initialize($config);
    //             $this->image_lib->resize(); 
                
    //         }
    //     $data =[
    //         'tax_type'=>$this->input->post('type'),
    //         'product_image'=>$product_image,
    //         'description'=>$this->input->post('description'),
    //         'name'=>$this->input->post('name'),
    //         'price'=>$this->input->post('price'),
    //         'dis_price'=>$this->input->post('discounted_price'),
    //         'validty_days'=>$this->input->post('validty_days'),
    //         'no_session'=>$this->input->post('no_session'),
    //         'branch_id'=>$this->input->post('branch'),
    //         'mode_id'=>$this->input->post('modelist'),
    //     ];
    //     $result = $this->model_memberlist->updateMemebrListData($data,$id);
    //     if($result > 0){
    //         $this->session->set_flashdata('success','Product Updated Successfully');
    //         return redirect('memberlist');
    //     }else{
    //         $this->session->set_flashdata('error','Fail To Updated');
    //         return redirect('memberlist');
    //     }

    // }
    // public function delete($id){
    //     $result = $this->model_memberlist->DeleteMemebrListData($id);
    //     if($result > 0){
    //         $this->session->set_flashdata('success','Product Deleted Successfully');
    //         return redirect('memberlist');
    //     }else{
    //         $this->session->set_flashdata('error','Fail To Updated');
    //         return redirect('memberlist');
    //     }

    // }

   
    

}