<?php 

class Model_products extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the brand data */
	public function getProductData($id = null)
	{
		$this->db->select('membership_list.*,tax_master.percentage');
		$this->db->from('membership_list');
		$this->db->join('tax_master','tax_master.tax_id=membership_list.tax_type','INNER');
		if($id){
			$this->db->where('memberlist_id',$id);
		}
		
		$result = $this->db->get()->result();
		return $result;

	}

	public function getActiveProductData()
	{
		$sql = "SELECT * FROM products WHERE availability = ? ORDER BY id DESC";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('products', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function updateProducts($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('products', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('products');
			return ($delete == true) ? true : false;
		}
	}

	public function countTotalProducts()
	{
		$sql = "SELECT * FROM products";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function getProducTypeData(){
		$this->db->select('*');
		$this->db->from('financial_exp_master');
		$this->db->where('type','Income');
		$this->db->order_by('fan_exp_id','asc');
		return $result= $this->db->get()->result();


	}
	public function getBranchTypeData(){
		$this->db->select('*');
		$this->db->from('branch');
		$this->db->where('active',1);
		$this->db->order_by('id','asc');
		return $result= $this->db->get()->result();

	}

	public function getModeListData(){
		$this->db->select('*');
		$this->db->from('mode_list');
		$this->db->order_by('mode_id','asc');
		return $result= $this->db->get()->result();

	}
	public function getMemberShipByTypeId($type_id){
		$this->db->select('*');
		$this->db->from('membership_list');
		$this->db->where('tax_type',$type_id);
		return $result= $this->db->get()->result();

	}
}