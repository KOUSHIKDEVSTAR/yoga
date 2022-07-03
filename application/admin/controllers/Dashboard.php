<?php 



class Dashboard extends Admin_Controller 

{

	public function __construct()

	{

		parent::__construct();



		$this->not_logged_in();



		$this->data['page_title'] = 'Dashboard';

		

		$this->load->model('model_products');

		$this->load->model('model_orders');

		$this->load->model('model_users');

		$this->load->model('model_stores');

		$this->load->model('model_customers');

		$this->load->model('model_schedule');

	}



	/* 

	* It only redirects to the manage category page

	* It passes the total product, total paid orders, total users, and total stores information

	into the frontend.

	*/

	public function index()

	{

		$this->data['total_products'] = $this->model_products->countTotalProducts();

		$this->data['total_paid_orders'] = $this->model_orders->countTotalPaidOrders();

		$this->data['total_users'] = $this->model_users->countTotalUsers();

		$this->data['total_stores'] = $this->model_stores->countTotalStores();

		$data['all_customer_count']=$this->model_customers->getAllCustomerCount();
        $this->data['all_customer_count']=$data['all_customer_count'];


		$data['all_sell_count']=$this->model_customers->getAllSellCount();
        $this->data['sell_count']=$data['all_sell_count'];
        $total_cost =0;
        foreach($this->data['sell_count'] as $sell_count){
        	$total_cost +=$sell_count->sale_total_price;

        }
        $this->data['total_sell_cost']=$total_cost;




        $data['finview_expesnse_amount']=$this->model_customers->getFinviewExpenseAmount();
    	$expnsese =0; 
    	if(isset($data['finview_expesnse_amount'][0])){
    		foreach($data['finview_expesnse_amount'] as $fineeeview){
    			$expnsese = $expnsese + $fineeeview->fin_amount;


    		}
    		
    	}else{
    		$expnsese = 0;
    	}
    	$this->data['finview_expesnse_amount']=$expnsese;

    	$data['finview_income_amount']=$this->model_customers->getFinviewIncomeAmount();
    	$income =0; 
    	if(isset($data['finview_income_amount'][0])){
    		foreach($data['finview_income_amount'] as $fineeeview){
    			$income = $income + $fineeeview->fin_amount;


    		}
    		
    	}else{
    		$income = 0;
    	}
    	$this->data['finview_income_amount']=$income;


    	 $data['schedule_management_curent_date']=$this->model_schedule->getAllScheduledetailsCurrent(); 

        $this->data['schedule_management_curent_date']=$data['schedule_management_curent_date'];


		$user_id = $this->session->userdata('id');

		$is_admin = ($user_id == 1) ? true :false;



		$this->data['is_admin'] = $is_admin;

		$this->render_template('dashboard', $this->data);

	}

}