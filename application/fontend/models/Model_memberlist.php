<?php 

class Model_memberlist extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the brand data */
	public function getProductData($id = null)
	{
		$this->db->select('membership_list.*,branch.name as br_name ,mode_list.*,tax_master.*');
		$this->db->from('membership_list');
		$this->db->join('branch','branch.id=membership_list.branch_id','INNER');
		$this->db->join('mode_list','mode_list.mode_id=membership_list.mode_id','INNER');
		$this->db->join('tax_master','tax_master.tax_id=membership_list.tax_type','INNER');
		$this->db->order_by('membership_list.memberlist_id','desc');
		$this->db->where('membership_list.is_show',1);
		$this->db->where('membership_list.membership_product_type',"Product");
		$this->db->order_by('membership_list.memberlist_id','desc');
		$result = $this->db->get()->result();
		return $result;

	}

	public function getsubscriptionData($id = null)
	{
		$this->db->select('membership_list.*,branch.name as br_name ,mode_list.*,tax_master.*');
		$this->db->from('membership_list');
		$this->db->join('branch','branch.id=membership_list.branch_id','INNER');
		$this->db->join('mode_list','mode_list.mode_id=membership_list.mode_id','INNER');
		$this->db->join('tax_master','tax_master.tax_id=membership_list.tax_type','INNER');
		$this->db->order_by('membership_list.memberlist_id','desc');
		$this->db->where('membership_list.membership_product_type',"Membership");
		$this->db->where('membership_list.is_show',1);
		$this->db->order_by('membership_list.memberlist_id','desc');
		$result = $this->db->get()->result();
		return $result;

	}
	public function getMemberListData($id = null)
	{
		$this->db->select('membership_list.*,branch.name as br_name ,mode_list.*,tax_master.*');
		$this->db->from('membership_list');
		$this->db->join('branch','branch.id=membership_list.branch_id','INNER');
		$this->db->join('mode_list','mode_list.mode_id=membership_list.mode_id','INNER');
		$this->db->join('tax_master','tax_master.tax_id=membership_list.tax_type','INNER');
		$this->db->order_by('membership_list.memberlist_id','desc');
		if($id){
			$this->db->where('membership_list.memberlist_id',$id);
		}
		$this->db->order_by('membership_list.memberlist_id','desc');
		$result = $this->db->get()->result();
		return $result;

	}
	public function updateMemebrListData($data,$id){
		$this->db->where('memberlist_id',$id);
		$this->db->update('membership_list',$data);
		$updated_status = $this->db->affected_rows();
        if ($updated_status) :
            return $id;
        else :
            return true;
        endif;
	}
	public function DeleteMemebrListData($id){
		$this->db->where('memberlist_id',$id);
		$this->db->delete('membership_list');
		$updated_status = $this->db->affected_rows();
        if ($updated_status) :
            return $id;
        else :
            return true;
        endif;

	}

	
}