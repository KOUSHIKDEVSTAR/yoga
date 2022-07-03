<?php 

class Model_auth extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* 
		This function checks if the email exists in the database
	*/
	public function check_email($email) 
	{
		if($email) {
			$sql = 'SELECT * FROM users WHERE email = ?';
			$query = $this->db->query($sql, array($email));
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
	}

	/* 
		This function checks if the email and password matches with the database
	*/
	public function login($email, $password) {
		if($email && $password) {
			$sql = "SELECT * FROM users WHERE email = ?";
			$query = $this->db->query($sql, array($email));

			if($query->num_rows() == 1) {
				$result = $query->row_array();

				$hash_password = password_verify($password, $result['password']);
				if($hash_password === true) {
					return $result;	
				}
				else {
					return false;
				}

				
			}
			else {
				return false;
			}
		}
	}

	public function checkUser($email){
		$this->db->select('*');
		$this->db->from('customers');
		$this->db->where('email',$email);
		return $result = $this->db->get()->result();

	}
	public function checkUserActive($email){
		$this->db->select('*');
		$this->db->from('customers');
		$this->db->where('email',$email);
		$this->db->where('is_active',1);
		return $result = $this->db->get()->result();
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

	public function checkCustomerBooking($id){
		$this->db->select('*');
		$this->db->from('sales');
		$this->db->where('sl_cust_id',$id);
		return $result = $this->db->get()->result();

	}
	public function getAllScheduledetails($id = null) 
	{
		$this->db->select('tsm.*,users.firstname,users.lastname,branch.name');
		$this->db->from('tbl_schedule_mang tsm');

		$this->db->join('users','users.id=tsm.sc_staff_id','INNER');
		$this->db->join('branch','branch.id=tsm.sc_branch_id','INNER');
		$this->db->where('tsm.created_month',date('m'));
		$this->db->where('tsm.created_year',date('Y'));
		$this->db->where('tsm.created_at >=',date('Y-m-d'));
		$this->db->order_by('tsm.created_da','asc');
		if($id){

			$this->db->where('tsm.sch_id ',$id);
		}
		return $result = $this->db->get()->result();

		
	}
	public function getAllScheduledetailsCurrent($id = null) 
	{
		$this->db->select('tsm.*,users.firstname,users.lastname,branch.name');
		$this->db->from('tbl_schedule_mang tsm');
		$this->db->join('users','users.id=tsm.sc_staff_id','INNER');
		$this->db->join('branch','branch.id=tsm.sc_branch_id','INNER');
		$this->db->where('tsm.created_month',date('m'));
		$this->db->where('tsm.created_year',date('Y'));
		
		$this->db->order_by('tsm.created_da','asc');
		if($id){

			$this->db->where('tsm.sch_id ',$id);
		}
		return $result = $this->db->get()->result();

		
	}

	public function getMembershipdataById($user_id){
		$this->db->select('*');
		$this->db->from('sales');
		$this->db->where('sl_cust_id',$user_id);
		return $result = $this->db->get()->result();


	}

	public function getAllScheduledetailsBYdateTime($year,$month){
		$this->db->select('tsm.*,users.firstname,users.lastname,branch.name');
		$this->db->from('tbl_schedule_mang tsm');
		$this->db->join('users','users.id=tsm.sc_staff_id','INNER');
		$this->db->join('branch','branch.id=tsm.sc_branch_id','INNER');
		$this->db->where('tsm.created_month',$month);
		$this->db->where('tsm.created_year',$year);
		
		$this->db->order_by('tsm.created_da','asc');
		return $result = $this->db->get()->result();

	}

	public function getAllBranches(){
		$this->db->select('*');
		$this->db->from('branch');
		$this->db->where('active',1);
		return $result = $this->db->get()->result();

	}
	public function getAllScheduledetailsBYbranch($branch){
		$this->db->select('tsm.*,users.firstname,users.lastname,branch.name');
		$this->db->from('tbl_schedule_mang tsm');
		$this->db->join('users','users.id=tsm.sc_staff_id','INNER');
		$this->db->join('branch','branch.id=tsm.sc_branch_id','INNER');
		$this->db->where('tsm.sc_branch_id',$branch);
		$this->db->order_by('tsm.created_da','asc');
		return $result = $this->db->get()->result();

	}
	

	public function getCustomerPlanById($user_id){

		$this->db->select('sales.*,membership_list.name,membership_list.price,membership_list.validty_days,membership_list.dis_price,membership_list.cancel_policy,membership_list.no_session,membership_list.memberlist_id,membership_list.is_sharable');
		$this->db->from('sales');
		$this->db->join('membership_list','membership_list.memberlist_id=sales.sl_product_id','INNER');
		$this->db->where('membership_list.tax_type',4);
		$this->db->where('sales.sl_cust_id',$user_id);
		return $result = $this->db->get()->result();

	}
}