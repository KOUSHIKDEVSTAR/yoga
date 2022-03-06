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

	
}