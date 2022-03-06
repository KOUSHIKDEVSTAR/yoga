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
}