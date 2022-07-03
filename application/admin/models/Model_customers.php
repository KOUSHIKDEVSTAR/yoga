<?php 



class Model_customers extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}



	public function getCustomerListData($id = null) 

	{

		$this->db->select('*');

		$this->db->from('customers');	

		$this->db->join('branch','branch.id=customers.branch_id','INNER');

		// $this->db->where('customers.is_active',1);

		if($id){

			$this->db->where('customers.cust_id',$id);

		}



		$this->db->order_by('customers.cust_id','desc');

		$result = $this->db->get()->result();

		return $result;

		

		

	}

	public function updateCustomerData($data,$id){

		$this->db->where('cust_id',$id);

		$this->db->update('customers',$data);

		$updated_status = $this->db->affected_rows();

        if ($updated_status) :

            return $id;

        else :

            return true;

        endif;

	}

	public function DeleteCustomerListData($id){

		$this->db->where('cust_id',$id);

		$this->db->delete('customers');

		$updated_status = $this->db->affected_rows();

        if ($updated_status) :

            return $id;

        else :

            return true;

        endif;



	}



	public function getCustomerInvoiceDataById($id){

		$this->db->select('*');

		$this->db->from('sales');

		$this->db->where('sl_cust_id',$id);

	    return $result = $this->db->get()->result();





	}

	public function getAllSellCount(){
		$this->db->select('sale_total_price');
		$this->db->from('sales');
		$this->db->where('created_month',date('m'));
		return $result = $this->db->get()->result();
	}
	public function getAllSellCountlastMonth(){
		$this->db->select('sale_total_price');
		$this->db->from('sales');
		$this->db->where('created_month',date('m')-1);
		return $result = $this->db->get()->result();
	}

	public function getAllCustomerCount(){
		$this->db->select('count(*) as all_count');
		$this->db->from('customers');
		return $result = $this->db->get()->result();

	}

	public function getAllSellDueCount(){
		$this->db->select('due_amt');
		$this->db->from('sales');
		$this->db->where('created_month',date('m'));
		return $result = $this->db->get()->result();

	}

	public function getCustomerPlanById($id){
		$this->db->select('sales.*,membership_list.name,membership_list.price,membership_list.validty_days,membership_list.dis_price,membership_list.cancel_policy,membership_list.no_session');
		$this->db->from('sales');
		$this->db->join('membership_list','membership_list.memberlist_id=sales.sl_product_id','INNER');
		$this->db->where('membership_list.tax_type',4);
		$this->db->where('sales.sl_cust_id',$id);
		return $result = $this->db->get()->result();
	}

	public function getFinviewExpenseAmount(){
		$this->db->select('fin_amount');
		$this->db->from('tbl_finview_expense');
		$this->db->where('type','Expense');
		// $this->db->where('created_month',date('m'));
		return $result = $this->db->get()->result();

	}
	public function getFinviewIncomeAmount(){

		$this->db->select('fin_amount');
		$this->db->from('tbl_finview_expense');
		$this->db->where('type','Income');
		// $this->db->where('created_month',date('m'));
		return $result = $this->db->get()->result();
	}
	    



	

}