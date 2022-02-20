<?php 

class Model_sitesettings extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getsiteData(){
		$this->db->select('*');
		$this->db->from('site_setting');
		$this->db->order_by('setting_id','asc');
		 return $result= $this->db->get()->result();

	}

	public function getFincialeData(){
		$this->db->select('*');
		$this->db->from('financial_exp_master');
		$this->db->order_by('fan_exp_id','asc');
		return $result= $this->db->get()->result();

	}
	public function getTaxInfoData(){
		$this->db->select('*');
		$this->db->from('tax_master');
		$this->db->order_by('tax_id','asc');
		return $result= $this->db->get()->result();

	}
}