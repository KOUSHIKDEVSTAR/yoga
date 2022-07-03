<?php 



class Model_schedule extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}



	public function getAllScheduledetails($id = null) 

	{

		$this->db->select('tsm.*,users.firstname,users.lastname,branch.name');

		$this->db->from('tbl_schedule_mang tsm');

		// $this->db->join('membership_list','membership_list.memberlist_id=tsm.sc_customer','INNER');

		$this->db->join('users','users.id=tsm.sc_staff_id','INNER');

		$this->db->join('branch','branch.id=tsm.sc_branch_id','INNER');

		$this->db->where('tsm.time_from >',date('Y-m-d'));

		$this->db->order_by('tsm.created_da','desc');

		if($id){



			$this->db->where('tsm.sch_id ',$id);

		}

		

		return $result = $this->db->get()->result();



		

	}

	public function getAllScheduledetailsCurrent($id = null) 

	{

		$this->db->select('tsm.*,users.firstname,users.lastname,branch.name');

		$this->db->from('tbl_schedule_mang tsm');

		// $this->db->join('membership_list','membership_list.memberlist_id=tsm.sc_customer','INNER');

		$this->db->join('users','users.id=tsm.sc_staff_id','INNER');

		$this->db->join('branch','branch.id=tsm.sc_branch_id','INNER');

		$this->db->where('tsm.created_month',date('m'));

		$this->db->where('tsm.created_year',date('Y'));

		$this->db->where('tsm.created_at =',date('Y-m-d'));

		$this->db->order_by('tsm.created_da','desc');

		if($id){



			$this->db->where('tsm.sch_id ',$id);

		}

		return $result = $this->db->get()->result();



		

	}



	public function getBookingDataById($id){

		$this->db->select('sch_booking.*,tbl_schedule_mang.class_name,tbl_schedule_mang.capacity,customers.full_name,customers.mobile_number,tbl_schedule_mang.class_time,tbl_schedule_mang.time_from,tbl_schedule_mang.time_to');

		$this->db->from('sch_booking');

		$this->db->join('tbl_schedule_mang','tbl_schedule_mang.sch_id=sch_booking.schedule_id','INNER');

		$this->db->join('customers','customers.cust_id=sch_booking.user_bas_id','INNER');
		$this->db->where('schedule_id',$id);
		$this->db->where('sch_booking.status',1);

		$result = $this->db->get()->result();

		// echo "<pre>";print_r($result);exit();

		return $result;

	}
	public function getScheduleInfoById($id){
		$this->db->select('*');
		$this->db->from('tbl_schedule_mang');
		$this->db->where('sch_id',$id);
		$result = $this->db->get()->result();
		return $result;
	}

	public function getCancelDataById($id){
		$this->db->select('sch_booking.*,tbl_schedule_mang.class_name,tbl_schedule_mang.capacity,customers.full_name,customers.mobile_number,tbl_schedule_mang.class_time,tbl_schedule_mang.time_from,tbl_schedule_mang.time_to');

		$this->db->from('sch_booking');

		$this->db->join('tbl_schedule_mang','tbl_schedule_mang.sch_id=sch_booking.schedule_id','INNER');

		$this->db->join('customers','customers.cust_id=sch_booking.user_bas_id','INNER');
		$this->db->where('schedule_id',$id);
		$this->db->where('sch_booking.status',2);

		$result = $this->db->get()->result();

		return $result;

	}

	public function getustomerdata(){
		$this->db->select('*');
		$this->db->from('customers');
		$this->db->join('sales','sales.sl_cust_id=customers.cust_id','INNER');
		$this->db->where('sales.sl_pr_suscription',4);
		$result = $this->db->get()->result();
		return $result;

	}

	public function getFinviewInfo(){
		$this->db->select('tfe.*,fem.name');
		$this->db->from('tbl_finview_expense tfe');
		$this->db->join('financial_exp_master fem','fem.fan_exp_id = tfe.towards','INNER');
		// $this->db->join('users stf','stf.id = tfe.tagged_to','INNER');
	    $result = $this->db->get()->result();
		return $result;

	}

	public function getTowardsData(){
		$this->db->select('*');
		$this->db->from('financial_exp_master');
		$this->db->where('type','Expense');
		$this->db->order_by('fan_exp_id','asc');
		return $result= $this->db->get()->result();


	}

	public function getFinviewSalaryAmount(){
		$this->db->select('*');
		$this->db->from('tbl_finview_expense');
		$this->db->where('type','Expense');
		$this->db->where('towards',2);
	    $result = $this->db->get()->result();
		return $result;

	}
	public function getFinviewOtherExpense(){
		$this->db->select('*');
		$this->db->from('tbl_finview_expense');
		$this->db->where('type','Expense');
		$this->db->where('towards',6);
	    $result = $this->db->get()->result();
		return $result;

	}

}

?>