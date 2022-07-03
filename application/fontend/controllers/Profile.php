<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile  extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->data['page_title'] = '404 Error';
		$this->load->helper('url');
		$this->load->model('model_auth');
	    $this->load->library('image_lib');
        $this->load->helper('f1');
	}
    public function index(){
        if($this->session->userdata('cust_email')){
        	$email = $this->session->userdata('cust_email');
            $this->data['customer_details'] = $this->model_auth->checkUser($email);
            $this->data['customer_plan'] = $this->model_auth->getCustomerPlanById($this->session->userdata('cust_id'));
            $this->load->view('templates/header',$this->data);
            $this->load->view('templates/header_menu',$this->data);
            $this->load->view('profile/index', $this->data);
            $this->load->view('templates/footer',$this->data);

        	}else{
        	 	return redirect('login');
        }
    
    }
    public function edit(){
    	if($this->session->userdata('cust_email')){
    		$email = $this->session->userdata('cust_email');
    		$this->data['customer_details'] = $this->model_auth->checkUser($email);
    		$this->render_template('profile/edit',$this->data);

    	}else{
    		return redirect('login');
    	}

    }
    public function update(){
    	$id = $this->input->post('id');
        if($_FILES['image']['name']==NULL)
            {
                $customer_image=$this->input->post('old_image');
            }
            else{  
                $new_name1 = str_replace(".", "", microtime());
                $new_name = str_replace(" ", "_", $new_name1);
                $file_tmp = $_FILES['image']['tmp_name'];
                $file = $_FILES['image']['name'];
                $ext = substr(strrchr($file, '.'), 1);
                move_uploaded_file($file_tmp, "admin/uploads/customer_details/" .$new_name . "." . $ext);
                $customer_image= $new_name . "." . $ext;
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'admin/uploads/customer_details/' . $customer_image;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = 'admin/uploads/customer_details/' . $customer_image;  
                $config['quality'] = "100%";
                $this->image_lib->initialize($config);
                $this->image_lib->resize(); 
                
            }
            if($_FILES['other_docs']['name']==NULL)
            {
                $other_docs=$this->input->post('old_other_docs');
            }
            else{  
                $new_name1 = str_replace(".", "", microtime());
                $new_name = str_replace(" ", "_", $new_name1);
                $file_tmp = $_FILES['other_docs']['tmp_name'];
                $file = $_FILES['other_docs']['name'];
                $ext = substr(strrchr($file, '.'), 1);
                move_uploaded_file($file_tmp, "admin/uploads/customer_details/" .$new_name . "." . $ext);
                $other_docs= $new_name . "." . $ext;
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'admin/uploads/customer_details/' . $other_docs;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = 'admin/uploads/customer_details/' . $other_docs;  
                $config['quality'] = "100%";
                $this->image_lib->initialize($config);
                $this->image_lib->resize(); 
                
            }
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data=[
                'full_name'=>$this->input->post('name'),
                'email'=>$this->input->post('email'),
                'mobile_number'=>$this->input->post('mobile_number'),
                'pr_image'=>$customer_image,
                'branch_id'=>$this->input->post('branch_id'),
                'address'=>$this->input->post('address'),
                'dob'=>$this->input->post('dob'),
                'other_docs'=>$other_docs,
            ];
            $result = $this->model_auth->updateCustomerData($data,$id);
            if($result){
            	$this->session->set_flashdata('success','Profile Updated');
            	return redirect('profile');
            }else{
            	$this->session->set_flashdata('error','Fail To Update');
            	return redirect('profile');
            }
        }

    }

    public function booking(){
        if($this->session->userdata('cust_email')){
            $cust_id = $this->session->userdata('cust_id');
            $data['branch_data']=$this->model_auth->getAllBranches();
            $this->data['branch_data']=$data['branch_data'];

            $this->data['customer_booking'] = $this->model_auth->checkCustomerBooking($cust_id);
            $data['schedule_management']=$this->model_auth->getAllScheduledetails();
            $this->data['schedule_management']=$data['schedule_management']; 
            $data['schedule_management_curent_date']=$this->model_auth->getAllScheduledetailsCurrent(); 
            $this->data['schedule_management_curent_date']=$data['schedule_management_curent_date'];
            $data['membershipData']=$this->model_auth->getMembershipdataById($cust_id); 
            $this->data['membershipData']=$data['membershipData'];

            $this->render_template('profile/booking',$this->data);

        }else{
            return redirect('login');
        }


    }

    public function sch_booking($status,$sch_id){
        $data  = [
            'status'=>1,
            'schedule_id'=>$sch_id,
            'user_bas_id'=>$this->session->userdata('cust_id'),
            'added_on'=>date('Y-m-d'),

        ];
        $result = $this->db->insert('sch_booking',$data);
        if($result){
            $this->session->set_flashdata('success','You Booked a slot successfully');
            return redirect('profile/booking');
        }


    }

    public function sch_booking_cancel($sch_id=NULL,$user_id=NULL,$cancel_policy=NULL){
        $this->db->where('schedule_id',$sch_id);
        $this->db->where('user_bas_id',$user_id);
        $result = $this->db->delete('sch_booking');
        if($cancel_policy == 2){
            $this->db->select('*');
            $this->db->from('tbl_cancel_boking_sch');
            $this->db->where('sch_cust_id',$user_id);
            $return = $this->db->get()->result();
            if(isset($return[0])){
                $totl_amount = intval($return[0]->amount) + intval(10);
            }else{
                $totl_amount = 10;
            }
            $data = [
                'amount'=>$totl_amount,
            ];
            
            $this->db->where('sch_cust_id',$user_id);
            $this->db->update('tbl_cancel_boking_sch',$data);
            
            $this->db->affected_rows();

        }
        if($result){
             $this->session->set_flashdata('error','Cancel a slot successfully');
            return redirect('profile/booking');

        }


    }
    public function history(){
        if($this->session->userdata('cust_email')){
            $this->render_template('profile/history',$this->data);

        }

    }
    public function sharing_package(){

        $this->form_validation->set_rules('full_name', 'Full Name', 'required|min_length[3]|max_length[80]');
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|max_length[80]|is_unique[customers.email]');
        $this->form_validation->set_rules('mobile_phone', 'Mobile', 'required');
            if($this->form_validation->run()){
                $password = rand(111111,999999);

                    $cust_data = array(
                        'full_name'=>$this->input->post('full_name'),
                        'email'=>$this->input->post('email'),
                        'mobile_number'=>$this->input->post('mobile_phone'),
                        'branch_id'=>5,
                        'password'=> $password,
                );
            $result=$this->db->insert('customers',$cust_data);
            $last_id = $this->db->insert_id();
            // if($result){
            //        $link = base_url();
            //        $message = '<table style="font-family:Verdana;font-size:13px;" border="0" cellspacing="0" cellpadding="5" width="100%" dir="rtl">
            //         <tbody>
          
            //         <tr align="left" valign="middle">
            //         <td style="background-color: #00acac;padding: 10px;border:1px solid #E8EAEC;vertical-align:middle;font-family:Verdana;color:#FFF;font-weight:bold;font-size:15px;text-align:center" width="100%">YOGA</td>
            //         </tr>
            //         <tr align="left" valign="middle">
            //             <td style="border:1px solid #E8EAEC;padding: 10px;background-color:#F5F6F7;font-family:Verdana;font-size:15px;color:#616A76;text-align:center">User name = '.$this->input->post('email').' <br>
            //             Password = '.$password.'
            //             </td>
            //             </tr>
            //             <tr>
            //             <td style="background-color: #00acac;padding: 10px;text-align: center;">
            //             <a style="display: inline-block;color:#FFF;font-size: 13px;text-decoration: none;text-transform: uppercase;font-weight: bold; font-family: verdana, sans-serif" href="' . $link . '">Details</a></td>
            //         </tr>
            //         </tbody>
            //         </table>';
            //         $subject = "Registration Details";

            //     send_email($this->input->post('email'),$subject, $message);
            // }

               $this->db->select('*');
               $this->db->from('membership_list');
               $this->db->where('memberlist_id',$this->input->post('plan_id'));
               $mem_plan_id = $this->db->get()->result();


                    $date1=$mem_plan_id[0]->validty_days;
                    $date2=$mem_plan_id[0]->created_at;
                   $validty_dys =  date('Y-m-d', strtotime($date2. ' +'.$date1.' days'));
                                                      

                $pack_data = [
                    'pack_id'=>$this->input->post('plan_id'),
                    'buyer_detls_id'=>$this->input->post('cust_id'),
                    'family_id'=>$last_id,
                    'validity_dtls'=>$mem_plan_id[0]->validty_days,
                    'validity_ends'=>$validty_dys,
               ];




               $this->db->insert('family_package_detils', $pack_data);
                $this->session->set_flashdata('success','Package Added Successfully');
               return redirect('profile');

        
        }else{
             $this->session->set_flashdata('error','Package Added Successfully');
            return redirect('profile');
        }
    }
}