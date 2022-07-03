<?php 



class Schedule_management extends Admin_Controller 

{

	public function __construct()

	{

		parent::__construct();



		$this->not_logged_in();

		

		$this->data['page_title'] = 'Sales';

		$this->load->model('model_products');

		$this->load->model('model_branch');

		 $this->load->model('model_memberlist');

		$this->load->library('image_lib');

		$this->load->model('model_staff');

		$this->load->model('model_sales');

		$this->load->model('model_sitesettings');

		$this->load->model('model_schedule');

        $this->load->helper('f1');

        $this->load->library('encrypt');

	}



	public function index(){

		$data['schedule_management']=$this->model_schedule->getAllScheduledetails(); 

        $this->data['schedule_management']=$data['schedule_management'];



        $data['schedule_management_curent_date']=$this->model_schedule->getAllScheduledetailsCurrent(); 

        $this->data['schedule_management_curent_date']=$data['schedule_management_curent_date'];

        // echo "<pre>";print_r($this->data['schedule_management']);exit();

		$this->render_template('schedule_management/index', $this->data);	

        

	}



	public function add(){



		$data['branch_type']=$this->model_products->getBranchTypeData();

        $this->data['branch_type']=$data['branch_type'];

		$data['memberlist_details']=$this->model_memberlist->getMemberListData();

        $this->data['memberlist_details']=$data['memberlist_details'];

		$staff_data = $this->model_staff->getStaffData();

		$this->data['staff_data'] = $staff_data;



        $this->render_template('schedule_management/add', $this->data);

	}



	public function store(){
		
		
		
		$form_date = $this->input->post('time_from');
		$to_date = $this->input->post('time_to');


		$total_date = round((strtotime($to_date) - strtotime($form_date)) / (60 * 60 * 24));

		 $total_dat= round($total_date) + 1;


		  $excluded_days_array = $this->input->post('excluded_days');

        $finalArray = [];



        for ($j = 0; $j < count($excluded_days_array); $j++) {

            $finalArray[$j]['excluded_days'] = $excluded_days_array[$j];

        }

        $excluded_days = json_encode($finalArray);

        $excluded_day_decode = json_decode($excluded_days);
        $newArray = array();
        foreach($excluded_day_decode as $exclude_day){
        	array_push($newArray,$exclude_day->excluded_days);

        }

		for($i=0;$i < $total_dat;$i++){

        $stop_date = $this->input->post('time_from');
        $stop_date = date('Y-m-d', strtotime($stop_date . ' +'.$i.' day'));

        $date=$stop_date;
        $year = date('Y', strtotime($date));

		$month = date('m', strtotime($date));

		$day = date('d', strtotime($date));

		$dayee = date('l', strtotime($date));


        if(!in_array($dayee,$newArray)){
        	
	        if($_FILES['sc_image']['name']==NULL)

	            {

	                $sc_image=NULL;

	            }

	        else{  

	            $new_name1 = str_replace(".", "", microtime());

	            $new_name = str_replace(" ", "_", $new_name1);

	            $file_tmp = $_FILES['sc_image']['tmp_name'];

	            $file = $_FILES['sc_image']['name'];

	            $ext = substr(strrchr($file, '.'), 1);

	            move_uploaded_file($file_tmp, "uploads/sc_image/" .$new_name . "." . $ext);

	            $sc_image= $new_name . "." . $ext;

	            $config['image_library'] = 'gd2';

	            $config['source_image'] = 'uploads/sc_image/' . $sc_image;

	            $config['create_thumb'] = FALSE;

	            $config['maintain_ratio'] = FALSE;

	            $config['new_image'] = 'uploads/sc_image/' . $sc_image;  

	            $config['quality'] = "100%";

	            $this->image_lib->initialize($config);

	            $this->image_lib->resize(); 

	            

	        }



	        // $excluded_days_array = $this->input->post('excluded_days');

	        // $finalArray = [];



	        // for ($j = 0; $j < count($excluded_days_array); $j++) {

	        //     $finalArray[$j]['excluded_days'] = $excluded_days_array[$j];

	        // }

	        // $excluded_days = json_encode($finalArray);

	    
	        

			$data = [

				'class_name'=>$this->input->post('class_name'),

				'description'=>$this->input->post('desc'),

				'sc_branch_id'=>$this->input->post('branch_id'),

				'sc_staff_id'=>$this->input->post('staff_id'),

				'capacity'=>$this->input->post('capacity'),

				'duration'=>$this->input->post('duration'),

				'medium_data'=>$this->input->post('medium_data'),

				'zoom_id'=>$this->input->post('zoom_id'),

				'zoom_password'=>$this->input->post('zoom_password'),

				'google_meet_link'=>$this->input->post('google_meet_link'),

				'time_from'=>$stop_date,

				'time_to'=>$this->input->post('time_to'),

				'booking_allowed_time'=>$this->input->post('booking_allowed_time'),

				// 'sc_customer'=>$this->input->post('customer_group'),

				'cancelation_policy'=>$this->input->post('cancelation_policy'),

				'sc_image'=>$sc_image,

				'excluded_days'=>$excluded_days,

				'class_time'=>$this->input->post('class_time'),

				'created_at'=>$stop_date,

				'created_month'=>$month,

				'created_year'=>$year,

				'created_da'=>$day,
				'day_name'=>$dayee,

			];
			
			$result = $this->db->insert('tbl_schedule_mang',$data);
			$insert_id = $this->db->insert_id();

			foreach($_POST['customer_group'] as $cust_group){

				$data=[
					'cust_group_id'=>$cust_group,
					'schdl_id'=>$insert_id,

				];
			$this->db->insert('tbl_schdl_cust_group',$data);
			
		    }


        }
		
	
		}
	

		if($result){

			$this->session->set_flashdata('success','Schedule Management Created Successfully');

            return redirect('schedule_management');



		}





	}



	public function bookingDetails($id){

		$data['schedule_info']=$this->model_schedule->getScheduleInfoById($id);

		$data['bookingData']=$this->model_schedule->getBookingDataById($id);

		$data['cancelData']=$this->model_schedule->getCancelDataById($id);

		$data['customerData']=$this->model_schedule->getustomerdata();

        $this->data['bookingData']=$data['bookingData'];

        $this->data['schedule_info']=$data['schedule_info'];

        $this->data['cancelData']=$data['cancelData'];

        $this->data['customerData']=$data['customerData'];


        $this->render_template('schedule_management/bookingDetails', $this->data);





	}

	public function sch_booking_cancel($sch_id=NULL,$user_id=NULL,$cancel_policy=NULL){
		$sch_data = [
			'status'=>2,
		];
		$this->db->where('schedule_id',$sch_id);
        $this->db->where('user_bas_id',$user_id);
        $result = $this->db->update('sch_booking',$sch_data);
        if($cancel_policy == 2){
            $this->db->select('*');
            $this->db->from('tbl_cancel_boking_sch');
            $this->db->where('sch_cust_id',$user_id);
            $return = $this->db->get()->result();
            if(isset($return[0])){
                $totl_amount = intval($return[0]->amount) + intval(10);
	                $data = [
	                'amount'=>$totl_amount,
	            ];
            
            $this->db->where('sch_cust_id',$user_id);
            $this->db->update('tbl_cancel_boking_sch',$data);
            $this->db->affected_rows();
            }else{
                $totl_amount = 10;
                 $data = [
	                'amount'=>$totl_amount,
	                'sch_cust_id'=>$user_id,
	            ];
	            $this->db->insert('tbl_cancel_boking_sch',$data);
           
            }
            

        }
        return redirect('schedule_management/bookingDetails/'.$sch_id.'');
	}

	public function sch_booking($status=NULL,$sch_id=null){
        $data  = [
            'status'=>1,
            'schedule_id'=>$sch_id,
            'user_bas_id'=>$this->input->post('cust_id'),
            'added_on'=>date('Y-m-d'),
        ];
        $result = $this->db->insert('sch_booking',$data);
        if($result){
            $this->session->set_flashdata('success','You Booked a slot successfully');
            return redirect('schedule_management/bookingDetails/'.$sch_id.'');
        }


    }

    public function finview(){

    	$data['finview_salary_amount']=$this->model_schedule->getFinviewSalaryAmount();
    	
    	$salary =0; 


    	if(isset($data['finview_salary_amount'][0])){
    		foreach($data['finview_salary_amount'] as $fineeeview){
    			$salary = $salary + $fineeeview->fin_amount;


    		}
    		
    	}else{
    		$salary = 0;
    	}
    	$data['finview_other_expnse']=$this->model_schedule->getFinviewOtherExpense();


    	$expense =0; 
    	if(isset($data['finview_other_expnse'][0])){
    		foreach($data['finview_other_expnse'] as $fineview){
    			$expense = $expense + $fineview->fin_amount;

    		}
    		
    	}else{
    		$expense = 0;
    	}

    	

    	$data['finview_info']=$this->model_schedule->getFinviewInfo();

        $this->data['finview_info']=$data['finview_info'];
        $this->data['finview_salary_amount']=$salary;
        $this->data['finview_other_expnse']=$expense;

         // echo "<pre>";print_r($this->data['finview_info']);exit();

        $this->render_template('schedule_management/finview_list', $this->data);

    }
    public function finview_add(){
    	// $data['product_type']=$this->model_products->getProducTypeData();
     //    $this->data['product_type']=$data['product_type'];

    	$staff_data = $this->model_staff->getStaffData();

		$this->data['staff_data'] = $staff_data;


		$towards_data = $this->model_schedule->getTowardsData();

		$this->data['towards_data'] = $towards_data;

        $this->render_template('schedule_management/finview_add', $this->data);

    }

    public function finview_Store(){
    	  if($_FILES['attach_refrence']['name']==NULL)

	            {

	                $attach_refrence=NULL;

	            }

	        else{  

	            $new_name1 = str_replace(".", "", microtime());

	            $new_name = str_replace(" ", "_", $new_name1);

	            $file_tmp = $_FILES['attach_refrence']['tmp_name'];

	            $file = $_FILES['attach_refrence']['name'];

	            $ext = substr(strrchr($file, '.'), 1);

	            move_uploaded_file($file_tmp, "uploads/fineview/" .$new_name . "." . $ext);

	            $attach_refrence= $new_name . "." . $ext;

	            $config['image_library'] = 'gd2';

	            $config['source_image'] = 'uploads/fineview/' . $attach_refrence;

	            $config['create_thumb'] = FALSE;

	            $config['maintain_ratio'] = FALSE;

	            $config['new_image'] = 'uploads/fineview/' . $attach_refrence;  

	            $config['quality'] = "100%";

	            $this->image_lib->initialize($config);

	            $this->image_lib->resize(); 

	           
	        }

	        $data = [
	        	'fin_date'=>$this->input->post('date'),
	        	'type'=>$this->input->post('type'),
	        	'towards'=>$this->input->post('towards'),
	        	'fin_amount'=>$this->input->post('amount'),
	        	'tagged_to'=>$this->input->post('staff_id'),
	        	'refrenece'=>$this->input->post('refrence'),
	        	'attach_refrence'=>$attach_refrence,
	        	'mode'=>$this->input->post('mode_data'),
	        	'remarks'=>$this->input->post('remarks'),
	        	'enter_by'=>$this->session->userdata('id'),
	        	'added_on'=>date('Y-m-d'),
	        ];
	        $result = $this->db->insert('tbl_finview_expense',$data);
	        if($result){
	        	 $this->session->set_flashdata('success','Expenses Added successfully');
	        	 return redirect('schedule_management/finview');
	        }


    }

    public function suspend_schdule($status,$sch_id){

    	$data=[
    		'sch_status'=>$status,
    	];
    	$this->db->where('sch_id',$sch_id);
    	$this->db->update('tbl_schedule_mang',$data);
    	$result = $this->db->affected_rows();
    	if($result){
    		$this->session->set_flashdata('success','Schedule Suspended Successfully');
    		return redirect('schedule_management');
    	}


    }




	



}