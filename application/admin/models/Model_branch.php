<?php 



class Model_branch extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}



	/*get the active branch information*/

	public function getActiveBranchs()

	{

		$sql = "SELECT * FROM branch WHERE active = ?";

		$query = $this->db->query($sql, array(1));

		return $query->result_array();

	}



	/* get the brand data */

	public function getBranchData($id = null)

	{

		if($id) {

			$sql = "SELECT * FROM branch WHERE id = ?";

			$query = $this->db->query($sql, array($id));

			return $query->result();

		}



		$sql = "SELECT * FROM branch";

		$query = $this->db->query($sql);

		return $query->result_array();

	}



	public function create($data)

	{

		if($data) {

			$insert = $this->db->insert('branch', $data);

			return ($insert == true) ? true : false;

		}

	}



	public function update($data, $id)

	{

		if($data && $id) {

			$this->db->where('id', $id);

			$update = $this->db->update('branch', $data);

			return ($update == true) ? true : false;

		}

	}



	public function remove($id)

	{

		if($id) {

			$this->db->where('id', $id);

			$delete = $this->db->delete('branch');

			return ($delete == true) ? true : false;

		}

	}

	public function getCancelationPolicyData(){
		$this->db->select('*');
		$this->db->from('tbl_cancelation_policy');
		$res = $this->db->get()->result();
		return $res;


	}



}