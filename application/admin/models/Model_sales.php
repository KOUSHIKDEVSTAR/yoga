<?php 

class Model_sales extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAllSalesdetails($id = null) 
	{
		$this->db->select('sales.*,customers.full_name,customers.email,customers.mobile_number,customers.pr_image,customers.address,membership_list.name,tax_master.template_name');
		$this->db->from('sales');
		$this->db->join('customers','customers.cust_id=sales.sl_cust_id','INNER');
		$this->db->join('membership_list','membership_list.memberlist_id =sales.sl_product_id','INNER');
		$this->db->join('tax_master','tax_master.tax_id=sales.sl_pr_suscription','INNER');
		if($id){
			$this->db->where('sales.sale_id',$id);
		}
		$this->db->where('sales.is_deleted',0);
		return $result = $this->db->get()->result();

		
	}
	public function getSubscriptionDataId($id){
		$this->db->select('*');
		$this->db->from('tax_master');
		$this->db->where('tax_id',$id);
		return $result = $this->db->get()->result();
	}
	public function getDueAmountByCust($id){
		$this->db->select('*');
		$this->db->from('sales');
		$this->db->where('sl_cust_id',$id);
		return $result = $this->db->get()->result();


	}
	public function getDueAmountFromDueTable($id){
		$this->db->select('*');
		$this->db->from('sales_due');
		$this->db->where('sale_data_id',$id);
		return $result = $this->db->get()->result();

	}
	public function updateDueAmount($table,$data,$id){
		$this->db->where('sale_id',$id);
        $this->db->update($table,$data);
        $updated_status = $this->db->affected_rows();
        if ($updated_status) :
            return $id;
        else :
            return true;
        endif;

	}
	public function updateDueAmountDueTale($table,$data,$id){
		$this->db->where('sales_due_id',$id);
        $this->db->update($table,$data);
        $updated_status = $this->db->affected_rows();
        if ($updated_status) :
            return $id;
        else :
            return true;
        endif;

	}
}