<?php 

class Model_staff extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getStaffData(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('id','desc');
		$this->db->where('id !=',1);
		$this->db->where('is_deleted',0);
		 return $result= $this->db->get()->result();

	}

	public function getGroupData(){
		$this->db->select('*');
		$this->db->where('id !=',1);
		$this->db->from('groups');
	    return $result=$this->db->get()->result();

	}
	public function getUserById($id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('id','desc');
		$this->db->where('id',$id);
		$this->db->where('is_deleted',0);
		return $result= $this->db->get()->result();

	}
	public function update_user_data($data,$id){
		$this->db->where('id',$id);
		$this->db->update('users',$data);
		$result = $this->db->affected_rows();
		if($result){
			return $id;
		}else{
			return 0;
		}
	}

	
	
}