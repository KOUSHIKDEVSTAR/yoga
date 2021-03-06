<?php 



class Sales extends Admin_Controller 

{

	public function __construct()

	{

		parent::__construct();



		$this->not_logged_in();

		

		$this->data['page_title'] = 'Sales';

		$this->load->model('model_groups');

		$this->load->model('model_products');

		$this->load->model('model_branch');

		$this->load->model('model_customers');

		$this->load->model('model_sales');

		$this->load->library('image_lib');

		$this->load->model('model_sitesettings');

        $this->load->helper('f1');

        $this->load->library('encrypt');

	}



	public function index(){
		if(!in_array('viewSales', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $data['all_sell_count']=$this->model_customers->getAllSellCount();		
        $this->data['sell_count']=$data['all_sell_count'];
        $total_cost =0;		
        if(isset($this->data['sell_count'][0])){
        	foreach($this->data['sell_count'] as $sell_count){
        	$total_cost += $sell_count->sale_total_price;

            }
			$this->data['total_sell_cost']=$total_cost;
        }else{
        	$this->data['total_sell_cost']=$total_cost;

        }
        $data['all_customer_count']=$this->model_customers->getAllCustomerCount();
        $this->data['all_customer_count']=$data['all_customer_count'];
        $data['all_due_count']=$this->model_customers->getAllSellDueCount();
        $this->data['all_due_count']=$data['all_due_count'];
        $total_duecost =0;
        foreach($this->data['all_due_count'] as $due_count){
        	$total_duecost +=$due_count->due_amt;

        }
        $this->data['total_duecost']=$total_duecost;
        $data['all_sale_last_month']=$this->model_customers->getAllSellCountlastMonth();
        $this->data['all_sale_last_month']=$data['all_sale_last_month'];
        $sale_last_month =0;
        foreach($this->data['all_sale_last_month'] as $sale_last_month_data){
        	$sale_last_month +=$sale_last_month_data->sale_total_price;

        }
        $this->data['mom_cal']=intval($sale_last_month) - intval($this->data['total_sell_cost']);
        if($this->data['total_sell_cost'] > 0){
        	$this->data['mom'] = intval($this->data['mom_cal']) / intval($this->data['total_sell_cost']);

        }else{
        	$this->data['mom'] =0;
        }
		$data['sales_details']=$this->model_sales->getAllSalesdetails(); 
        $this->data['sales_details']=$data['sales_details'];
		$this->render_template('sales/index', $this->data);	
	}



	public function add(){

		if(!in_array('createSales', $this->permission)) {

            redirect('dashboard', 'refresh');

        }
		$data['customer_details']=$this->model_customers->getCustomerListData(); 
        $this->data['customer_details']=$data['customer_details'];
        $data['products_details']=$this->model_products->getProductData();
        $this->data['products_details']=$data['products_details'];
        $financial_data = $this->model_sitesettings->getFincialeData();
		$tax_info = $this->model_sitesettings->getTaxInfoData();
		$this->data['financial_data'] = $financial_data;
		$this->data['tax_info'] = $tax_info;
		$data['sales_details']=$this->model_sales->getAllSalesdetails(); 
        $this->data['sales_details']=$data['sales_details'];
		$this->render_template('sales/add', $this->data);	
	}



	public function cust_by_id(){

		if(!in_array('viewSales', $this->permission)) {

            redirect('dashboard', 'refresh');

        }
		$cust_id = $this->input->post('id');
		$data['customer_details']=$this->model_customers->getCustomerListData($cust_id);
		$this->data['customer_details']=$data['customer_details'];
		echo json_encode(array('data' => $this->data));
	}
	public function product_by_id(){
		if(!in_array('viewSales', $this->permission)) {

            redirect('dashboard', 'refresh');

        }
		$product_id = $this->input->post('id');
		$data['products_member_details']=$this->model_products->getProductData($product_id);
        $this->data['products_member_details']=$data['products_member_details'];
        echo json_encode(array('data' => $this->data));
	}
	public function subscription_by_id(){
		if(!in_array('viewSales', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$subscription_id = $this->input->post('id');
		$data['subscription_details']=$this->model_sales->getSubscriptionDataId($subscription_id);
        $this->data['subscription_details']=$data['subscription_details'];

        echo json_encode(array('data' => $this->data));



	}



	public function store(){

		

		if($_FILES['transc_attachments']['name']==NULL)

            {

                $transc_attachments=NULL;

            }

            else{  

                $new_name1 = str_replace(".", "", microtime());

                $new_name = str_replace(" ", "_", $new_name1);

                $file_tmp = $_FILES['transc_attachments']['tmp_name'];

                $file = $_FILES['transc_attachments']['name'];

                $ext = substr(strrchr($file, '.'), 1);

                move_uploaded_file($file_tmp, "uploads/invoice_doc/" .$new_name . "." . $ext);

                $transc_attachments= $new_name . "." . $ext;

                $config['image_library'] = 'gd2';

                $config['source_image'] = 'uploads/invoice_doc/' . $transc_attachments;

                $config['create_thumb'] = FALSE;

                $config['maintain_ratio'] = FALSE;

                $config['new_image'] = 'uploads/invoice_doc/' . $transc_attachments;  

                $config['quality'] = "100%";

                $this->image_lib->initialize($config);

                $this->image_lib->resize(); 

                

            }

            $invoice = 'INV'.rand(11111,99999).'';

		$data = [

			'invoice_no'=>$invoice,

			'sl_cust_id'=>$this->input->post('customer_id'),

			'sl_product_id'=>$this->input->post('product_id'),

			'sl_pr_suscription'=>$this->input->post('type_id'),

			'sale_discount'=>$this->input->post('discount'),

			'sale_received_as'=>$this->input->post('recved_type'),

			'product_cost'=>$this->input->post('cost'),

			'received_amount'=>$this->input->post('recved_amnt'),

			'sale_tarnsction_id'=>$this->input->post('tranac_id'),

			'sal_trans_attachments'=>$transc_attachments,

			'due_amt'=>$this->input->post('due_amt'),

			'sale_qty'=>$this->input->post('qty'),

			'sale_total_price'=>$this->input->post('total_price'),

			'sale_tax'=>$this->input->post('tax'),

			'created_at'=>date('Y-m-d'),

			'created_month'=>date('m'),

			'created_year'=>date('Y'),


			'created_by'=>$this->session->userdata('id'),

		];

		$data = $this->db->insert('sales',$data);

		$insert_id = $this->db->insert_id();



		if($this->input->post('due_amt') > 0){

			$due_data = [

			'sale_invoice'=>$invoice,

			'sale_data_id'=>$insert_id,

			'due_sale'=>$this->input->post('due_amt'),

		];

		$data_deu_ifno = $this->db->insert('sales_due',$due_data);



		}



		

		$this->session->set_flashdata('success','Invoice Created Successfully');

        return redirect('sales');



	}



	public function invoice_preview($sale_id){

		if(!in_array('viewSales', $this->permission)) {

            redirect('dashboard', 'refresh');

        }

		$data['sales_details']=$this->model_sales->getAllSalesdetails($sale_id); 

        $this->data['sales_details']=$data['sales_details'];



        // echo "<pre>";print_r($data['sales_details']);exit();

       

		$this->render_template('sales/invoice', $this->data);	



	}

	public function invoice_print($sale_id){

		$data['page_name']="Print";

		$data['sales_details']=$this->model_sales->getAllSalesdetails($sale_id); 

        $this->data['sales_details']=$data['sales_details'];

        $this->load->view('sales/print', $this->data);

       

		// $this->render_template('sales/print', $this->data);	



	}



	public function store_invoice_transction(){

		$data = [

			'invoice_no_sale'=>$this->input->post('invoice_no'),

			'pay_desc'=>"Yes",

			'custmr_id'=>$this->input->post('cust_id'),

			'sale_da_id'=>$this->input->post('sale_id'),

			'rest_amount'=>$this->input->post('amount'),

			'pay_date'=>$this->input->post('date'),

			'pay_method'=>$this->input->post('payment_method'),

			'payment_note'=>$this->input->post('payment_note'),

		];

		$DueAmount = $this->model_sales->getDueAmountByCust($this->input->post('cust_id'));



		$dueAmountById= $DueAmount[0]->due_amt;

		$amount =$this->input->post('amount'); 



		$paidAmoutn = $DueAmount[0]->received_amount;

		$finalPaidAmount = $paidAmoutn + $amount;

		$finalDueAomunt = $dueAmountById - $amount;

		$sale_data=[

			'received_amount'=>$finalPaidAmount,

			'due_amt'=>$finalDueAomunt,

		];



		$DueAmountFromDueTable = $this->model_sales->getDueAmountFromDueTable($this->input->post('sale_id'));

		$dueBlance = $DueAmountFromDueTable[0]->due_sale;

		$finalAmountDue =$dueBlance - $amount;

		$sale_data_due=[

			'due_sale'=>$finalAmountDue,

		];

		$this->model_sales->updateDueAmountDueTale('sales_due',$sale_data_due,$DueAmountFromDueTable[0]->sale_data_id);

		$this->model_sales->updateDueAmount('sales',$sale_data,$DueAmount[0]->sale_id);

		$this->db->insert('sale_tarnsction',$data);

		return redirect('sales/invoice_preview/'.$this->input->post('sale_id').'');





	}



	public function allProductByTypeId(){
		$type_id = $this->input->post('id');
		$data['mebember_product_details']=$this->model_products->getMemberShipByTypeId($type_id);
		$data['subscription_details']=$this->model_sales->getSubscriptionDataId($type_id);
        $this->data['subscription_details']=$data['subscription_details'];
        $this->data['mebember_product_details']=$data['mebember_product_details'];
        echo json_encode(array('data' => $this->data));
	}
	public function productMemberShipByid(){
		$product_id = $this->input->post('id');
		$data['products_member_details']=$this->model_products->getProductData($product_id);
        $this->data['products_member_details']=$data['products_member_details'];
        echo json_encode(array('data_mem' => $this->data));
	}



}