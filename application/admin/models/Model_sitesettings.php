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

		$this->db->select('tax_master.*,financial_exp_master.name');

		$this->db->from('tax_master');

		$this->db->join('financial_exp_master','financial_exp_master.fan_exp_id=tax_master.applicable_on');

		$this->db->order_by('tax_master.tax_id','asc');

		return $result= $this->db->get()->result();

	}

	public function getCouponData(){
		$this->db->select('*');
		
		$this->db->from('tbl_coupons');
		
		$this->db->order_by('coup_id','desc');

		return $result=$this->db->get()->result();
	}

}