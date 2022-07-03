<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome  extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->data['page_title'] = '404 Error';
		$this->load->helper('url');
		$this->load->model('model_auth');
	}
    public function index(){
 
        
         $data['schedule_management']=$this->model_auth->getAllScheduledetails();
          $this->data['schedule_management']=$data['schedule_management']; 



            
            $year=date('Y');
            $month=date('m');
            $day=date('d');
            $data['schedule_management_curent_date']=$this->model_auth->getAllScheduledetailsCurrent(); 
            $this->data['schedule_management_curent_date']=$data['schedule_management_curent_date'];
            $data['branch_data']=$this->model_auth->getAllBranches();
            $this->data['branch_data']=$data['branch_data'];
            $this->render_template('welcome_message', $this->data);
     
      }

    public function schedule_load(){
       $data['membershipData']=$this->model_auth->getMembershipdataById($this->session->userdata('cust_id')); 
            $membershipData=$data['membershipData'];
 
        
            $output = '';
            $return =$this->model_auth->getAllScheduledetailsCurrent(); 
            $data_show="";
           
            
            
              foreach($return as $current_date){
                
                  $timestamp = $current_date->time_from;
                    $today = new DateTime("today"); // This object represents current date/time with time set to midnight
                    $match_date = DateTime::createFromFormat( "Y-m-d", $timestamp );
                    $match_date->setTime( 0, 0, 0 ); // set time part to midnight, in order to prevent partial comparison
                    $diff = $today->diff( $match_date );
                    $diffDays = (integer)$diff->format( "%R%a" ); // Extract days count in interval
                    if($diffDays >= 0 ){ 
                      $this->db->select('*');
                      $this->db->from('sch_booking');
                      $this->db->where('schedule_id',$current_date->sch_id);
                      $allCount =  $this->db->get()->result();
                      $cust_id = $this->session->userdata('cust_id');
                      $this->db->select('*');
                      $this->db->from('sch_booking');
                      $this->db->where('schedule_id',$current_date->sch_id);
                      $this->db->where('user_bas_id',$cust_id);
                      $booking_sta = $this->db->get()->result();
                      // echo "<pre>";print_r($booking_sta);
                      $time_from=$current_date->time_from;
                      $time_from= date('d-m-Y',strtotime($time_from));

                     $book_date = $current_date->booking_allowed_time;

                     $data_show="";

                      $today_date = date('d');
                      $created_date = $current_date->created_da;
                      if(intval($created_date) > intval($today_date)){
                        $balnce_date = $created_date - $today_date;
                     
                        if($balnce_date > $book_date){
                        $data_show = "You Can Book after ".$balnce_date." day";
                          
                        }
                        else{
                          $data_show ='<a href="'. base_url('profile/booking').'" class="btn btn-primary">
                          Book</a>';
                        
                        }
                      
                      }else{
                        $data_show ='<a href="'. base_url('profile/booking').'" class="btn btn-primary">
                          Book</a>';


                      }?>


                      <div class="col-md-12 col-xxl-12">
                         <div class="card shadow-none bg-transparent border-primary">
                             <div class="card-body">
                                  <ul>
                                     <li> Date :<?=  $current_date->time_from ?> </li>
                                     <li>Time : <?=  $current_date->class_time ?> </li>
                                     <li><b>Class Name :
                                             <?= $current_date->class_name ?> </b></li>
                                     <li>Teacher : <?= $current_date->firstname  ?></li>
                                     <li>Medium : <?= $current_date->medium_data ?> </li>



                                     <!-- <li>Status
                                         :<?=  count($allCount) / $current_date->capacity ?>
                                     </li> -->

                                  </ul>
                                  <div class="btn-booking">



                                  <?php if(isset($membershipData[0])){?>
                                      <?php if(isset($booking_sta[0])){?>
                                        <?php echo "<pre>";print_r($booking_sta);?>
                                          <div class="check-booked"><span class="icon" ><i data-feather="check-circle"></i></span>Booked</div>

                                          <?php $this->db->select('*');
                                               $this->db->from('tbl_schdl_cust_group');
                                               $this->db->where('schdl_id',$current_date->sch_id);
                                               $result= $this->db->get()->result();

                                                 $cust_grp_array=array();
                                                 foreach($result as $res){
                                                       array_push($cust_grp_array,$res->cust_group_id);
                                                  }?>
                                                      <?php if(in_array($membershipData[0]->sl_product_id,$cust_grp_array)){
                                                             $membershipData[0]->sl_product_id;

                                                         }
                                                      ?>

                                                  <?php 
                                                      $this->db->select('*');
                                                      $this->db->from('membership_list');
                                                      $this->db->where('memberlist_id',$membershipData[0]->sl_product_id);
                                                      $result_1= $this->db->get()->result();
                                                    
                                                  ?>
                                                  <?php
                                                      $to_time = strtotime($current_date->class_time); 
                                                      $from_time = time();
                                                      $minutes = round(($from_time - $to_time)/60);

                                                  ?>


                                              <?php if(720 > $minutes ){?>
                                                  <?php if($result_1[0]->cancel_policy == 1){?>
                                                      <button type="button" class="btn btn-outline-danger"
                                                             data-bs-toggle="modal"
                                                             data-bs-target="#cancel<?=$current_date->sch_id;?>">
                                                             Cancel
                                                      </button>

                                                  <?php }else{?>
                                                      <button type="button" class="btn btn-outline-danger"
                                                             data-bs-toggle="modal"
                                                             data-bs-target="#cancel<?=$current_date->sch_id;?>">
                                                             Cancel
                                                      </button>

                                                  <?php } ?>
                                              <?php }else{?>
                                                  <button type="button" class="btn btn-outline-danger disabled">
                                                        Cannot Cancel
                                                  </button>

                                               <?php  } ?>
                                             
                          


                                              <div class="modal fade text-start modal-primary"
                                                 id="cancel<?=$current_date->sch_id;?>" tabindex="-1"
                                                 aria-labelledby="myModalLabel160" aria-hidden="true">
                                                 <div class="modal-dialog modal-dialog-centered">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                             <h5 class="modal-title"
                                                                 id="myModalLabel160">Cancel Slot
                                                             </h5>
                                                             <button type="button" class="btn-close"
                                                                 data-bs-dismiss="modal"
                                                                 aria-label="Close"></button>
                                                         </div>
                                                         <div class="modal-body">
                                                             <h6>Are you sure to cancel the slot</h6>
                                                             <?php if($result_1[0]->cancel_policy == 1){?>
                                                              Then Your one slot will deduct.
                                                               
                                                             <?php }else{?>
                                                              Your 10 Rupee will be deduct.
                                                             

                                                             <?php } ?>
                                                         </div>
                                                         <div class="modal-footer">
                                                             <a href="<?php echo  base_url('profile/sch_booking_cancel');?>/<?= $current_date->sch_id;?>/<?=$cust_id;?>/<?= $result_1[0]->cancel_policy;?>"
                                                                 class="btn btn-outline-danger">
                                                                 Cancel </a>
                                                         </div>
                                                     </div>
                                                 </div>
                                              </div>
                                      <?php } else{?>

                                                 <?php if(count($allCount) == $current_date->capacity){?>
                                                      <p>No Free Slot Available</p>

                                                 <?php }else{ ?>

                                                          <?php $book_date = $current_date->booking_allowed_time;?>
                                                      
                                                          <?php $today_date = date('d');?>

                                                          <?php $created_date = $current_date->created_da;?>

                                                          <?php if(intval($created_date) > intval($today_date)){
                                                                  $balnce_date = $created_date - $today_date;
                                                                  if($balnce_date > $book_date){
                                                                      $booking_pssibl= $balnce_date - $book_date;
                                                                       echo "Booking Available after ".$booking_pssibl." day";
                                                                  }else{?>
                                                                      <button type="button" class="btn btn-outline-primary"
                                                                         data-bs-toggle="modal"
                                                                         data-bs-target="#primary<?=$current_date->sch_id;?>">
                                                                         Book
                                                                      </button>

                                                                  <?php }
                                                             

                                                          }else{?>
                                                              <button type="button" class="btn btn-outline-primary"
                                                                 data-bs-toggle="modal"
                                                                 data-bs-target="#primary<?=$current_date->sch_id;?>">
                                                                 Book
                                                              </button>
                                                          <?php }?>
                                                          <div class="modal fade text-start modal-primary"
                                                             id="primary<?=$current_date->sch_id;?>" tabindex="-1"
                                                             aria-labelledby="myModalLabel160" aria-hidden="true">
                                                             <div class="modal-dialog modal-dialog-centered">
                                                                 <div class="modal-content">
                                                                     <div class="modal-header">
                                                                         <h5 class="modal-title"
                                                                             id="myModalLabel160">Are You Sure to
                                                                             proceed</h5>
                                                                         <button type="button" class="btn-close"
                                                                             data-bs-dismiss="modal"
                                                                             aria-label="Close"></button>
                                                                     </div>
                                                                     <div class="modal-body">
                                                                         <label>
                                                                             Date:
                                                                         </label>
                                                                         <b><?php echo $current_date->created_at;?></b><br>


                                                                         <label>
                                                                             Time:
                                                                         </label>
                                                                         <b><?php echo $current_date->class_time;?></b><br>
                                                                         <label>
                                                                             Class Name:
                                                                         </label>
                                                                         <b><?php echo $current_date->class_name;?></b><br>
                                                                         <label>
                                                                             Teacher:
                                                                         </label>
                                                                         <b><?php echo $current_date->firstname ;?>
                                                                             <?php echo $current_date->lastname ;?></b><br>
                                                                         <label>
                                                                             Medium:
                                                                         </label>
                                                                         <b><?php echo $current_date->medium_data ;?></b><br>
                                                                         <!-- <label>
                                                                             Status:
                                                                         </label>
                                                                         <b><?php echo count($allCount);?>/<?php echo $current_date->capacity;?></b>
                                                                         <br> -->
                                                                     </div>
                                                                     <div class="modal-footer">
                                                                      <?php $book_date = $current_date->booking_allowed_time;?>
                                                                  
                                                                      <?php $today_date = date('d');?>

                                                                      <?php $created_date = $current_date->created_da;?>

                                                                      <?php if(intval($created_date) > intval($today_date)){
                                                                          $balnce_date = $created_date - $today_date;
                                                                          if($balnce_date > $book_date){
                                                                              echo "You Can Book after ".$balnce_date." day";
                                                                          }else{?>
                                                                               <a href="<?php echo  base_url('profile/sch_booking/1/');?><?= $current_date->sch_id;?>"
                                                                             class="btn btn-primary">
                                                                             Book</a>

                                                                          <?php }
                                                                         

                                                                      }else{?>
                                                                          <a href="<?php echo  base_url('profile/sch_booking/1/');?><?= $current_date->sch_id;?>"
                                                                             class="btn btn-primary">
                                                                             Book</a>

                                                                      <?php }?>
                                                                        
                                                                         <!--  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button> -->
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>

                                                   <?php  } ?>


                                     <?php  } ?>

                                     <?php }else{ ?>

                                      <?php $this->db->select('*');
                                           $this->db->from('family_package_detils');
                                           $this->db->where('family_id',$this->session->userdata('cust_id'));
                                           $family_data = $this->db->get()->result();?>

                                         <?php if(isset($family_data[0])){?>
                                           <?php if(isset($booking_sta[0])){?>
                                        
                                          <div class="check-booked"><span class="icon" ><i data-feather="check-circle"></i></span>Booked</div>

                                      <?php } else{?>

                                                 <?php if(count($allCount) == $current_date->capacity){?>
                                                      <p>No Free Slot Available</p>

                                                 <?php }else{ ?>

                                                          <?php $book_date = $current_date->booking_allowed_time;?>
                                                      
                                                          <?php $today_date = date('d');?>

                                                          <?php $created_date = $current_date->created_da;?>

                                                          <?php if(intval($created_date) > intval($today_date)){
                                                                  $balnce_date = $created_date - $today_date;
                                                                  if($balnce_date > $book_date){
                                                                      $booking_pssibl= $balnce_date - $book_date;
                                                                       echo "Booking Available after ".$booking_pssibl." day";
                                                                  }else{?>
                                                                      <button type="button" class="btn btn-outline-primary"
                                                                         data-bs-toggle="modal"
                                                                         data-bs-target="#primary<?=$current_date->sch_id;?>">
                                                                         Book
                                                                      </button>

                                                                  <?php }
                                                             

                                                          }else{?>
                                                              <button type="button" class="btn btn-outline-primary"
                                                                 data-bs-toggle="modal"
                                                                 data-bs-target="#primary<?=$current_date->sch_id;?>">
                                                                 Book
                                                              </button>
                                                          <?php }?>
                                                          <div class="modal fade text-start modal-primary"
                                                             id="primary<?=$current_date->sch_id;?>" tabindex="-1"
                                                             aria-labelledby="myModalLabel160" aria-hidden="true">
                                                             <div class="modal-dialog modal-dialog-centered">
                                                                 <div class="modal-content">
                                                                     <div class="modal-header">
                                                                         <h5 class="modal-title"
                                                                             id="myModalLabel160">Are You Sure to
                                                                             proceed</h5>
                                                                         <button type="button" class="btn-close"
                                                                             data-bs-dismiss="modal"
                                                                             aria-label="Close"></button>
                                                                     </div>
                                                                     <div class="modal-body">
                                                                         <label>
                                                                             Date:
                                                                         </label>
                                                                         <b><?php echo $current_date->created_at;?></b><br>


                                                                         <label>
                                                                             Time:
                                                                         </label>
                                                                         <b><?php echo $current_date->class_time;?></b><br>
                                                                         <label>
                                                                             Class Name:
                                                                         </label>
                                                                         <b><?php echo $current_date->class_name;?></b><br>
                                                                         <label>
                                                                             Teacher:
                                                                         </label>
                                                                         <b><?php echo $current_date->firstname ;?>
                                                                             <?php echo $current_date->lastname ;?></b><br>
                                                                         <label>
                                                                             Medium:
                                                                         </label>
                                                                         <b><?php echo $current_date->medium_data ;?></b><br>
                                                                         <!-- <label>
                                                                             Status:
                                                                         </label>
                                                                         <b><?php echo count($allCount);?>/<?php echo $current_date->capacity;?></b>
                                                                         <br> -->
                                                                     </div>
                                                                     <div class="modal-footer">
                                                                      <?php $book_date = $current_date->booking_allowed_time;?>
                                                                  
                                                                      <?php $today_date = date('d');?>

                                                                      <?php $created_date = $current_date->created_da;?>

                                                                      <?php if(intval($created_date) > intval($today_date)){
                                                                          $balnce_date = $created_date - $today_date;
                                                                          if($balnce_date > $book_date){
                                                                              echo "You Can Book after ".$balnce_date." day";
                                                                          }else{?>
                                                                               <a href="<?php echo  base_url('profile/sch_booking/1/');?><?= $current_date->sch_id;?>"
                                                                             class="btn btn-primary">
                                                                             Book</a>

                                                                          <?php }
                                                                         

                                                                      }else{?>
                                                                          <a href="<?php echo  base_url('profile/sch_booking/1/');?><?= $current_date->sch_id;?>"
                                                                             class="btn btn-primary">
                                                                             Book</a>

                                                                      <?php }?>
                                                                        
                                                                         <!--  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button> -->
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>

                                                   <?php  } ?>


                                     <?php  } ?>


                                                 
                                            <?php  }else{ ?>
                                                <?php if($this->session->userdata('cust_id')){?>

                                                   <p>You Cannot Book.Please Upgrade You plan</p>
                                                 <?php  }else{ ?>
                                                  <a href="<?=base_url('profile/booking');?>" class="btn btn-primary">Book</a>

                                                  <?php } ?>
                                           <?php }?>

                                     <?php } ?>

                                 </div>
                                 <div class="btn-medium-icon">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                         height="14" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-command">
                                         <path
                                             d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z">
                                         </path>
                                     </svg>

                                 </div>

                             </div>
                         </div>
                      </div>


                     


                   <?php  }
                   }
                    

            
                 
           
            
      }

      public function schedule_load_by_date(){
          $data['membershipData']=$this->model_auth->getMembershipdataById($this->session->userdata('cust_id')); 
            $membershipData=$data['membershipData'];
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $output = '';
        $return = $this->model_auth->getAllScheduledetailsBYdateTime($year,$month); 
        $data_show="";
        foreach($return as $current_date){
                
                  $timestamp = $current_date->time_from;
                    $today = new DateTime("today"); // This object represents current date/time with time set to midnight
                    $match_date = DateTime::createFromFormat( "Y-m-d", $timestamp );
                    $match_date->setTime( 0, 0, 0 ); // set time part to midnight, in order to prevent partial comparison
                    $diff = $today->diff( $match_date );
                    $diffDays = (integer)$diff->format( "%R%a" ); // Extract days count in interval
                    if($diffDays >= 0 ){ 
                      $this->db->select('*');
                      $this->db->from('sch_booking');
                      $this->db->where('schedule_id',$current_date->sch_id);
                      $allCount =  $this->db->get()->result();
                      $cust_id = $this->session->userdata('cust_id');
                      $this->db->select('*');
                      $this->db->from('sch_booking');
                      $this->db->where('schedule_id',$current_date->sch_id);
                      $this->db->where('user_bas_id',$cust_id);
                      $booking_sta = $this->db->get()->result();
                      $time_from=$current_date->time_from;
                      $time_from= date('d-m-Y',strtotime($time_from));
                      $data_show="";

                      $book_date = $current_date->booking_allowed_time;
                      $today_date = date('d');
                      $created_date = $current_date->created_da;
                      if(intval($created_date) > intval($today_date)){
                        $balnce_date = $created_date - $today_date;
                        if($balnce_date > $book_date){
                        $data_show = "You Can Book after ".$balnce_date." day";
                        }else{

                          $data_show ='<a href="'. base_url('profile/booking').'" class="btn btn-primary">
                          Book</a>';
                        }
                      
                      } ?>

                      <div class="col-md-12 col-xxl-12">
                         <div class="card shadow-none bg-transparent border-primary">
                             <div class="card-body">
                                  <ul>
                                     <li> Date :<?=  $current_date->time_from ?> </li>
                                     <li>Time : <?=  $current_date->class_time ?> </li>
                                     <li><b>Class Name :
                                             <?= $current_date->class_name ?> </b></li>
                                     <li>Teacher : <?= $current_date->firstname  ?></li>
                                     <li>Medium : <?= $current_date->medium_data ?> </li>



                                     <!-- <li>Status
                                         :<?=  count($allCount) / $current_date->capacity ?>
                                     </li> -->

                                  </ul>
                                  <div class="btn-booking">



                                  <?php if(isset($membershipData[0])){?>
                                      <?php if(isset($booking_sta[0])){?>
                                          <div class="check-booked"><span class="icon" ><i data-feather="check-circle"></i></span>Booked</div>

                                          <?php $this->db->select('*');
                                               $this->db->from('tbl_schdl_cust_group');
                                               $this->db->where('schdl_id',$current_date->sch_id);
                                               $result= $this->db->get()->result();

                                                 $cust_grp_array=array();
                                                 foreach($result as $res){
                                                       array_push($cust_grp_array,$res->cust_group_id);
                                                  }?>
                                                      <?php if(in_array($membershipData[0]->sl_product_id,$cust_grp_array)){
                                                            $membershipData[0]->sl_product_id;

                                                         }
                                                      ?>

                                                  <?php 
                                                      $this->db->select('*');
                                                      $this->db->from('membership_list');
                                                      $this->db->where('memberlist_id',$membershipData[0]->sl_product_id);
                                                      $result_1= $this->db->get()->result();
                                                  ?>
                                                  <?php
                                                      $to_time = strtotime($current_date->class_time); 
                                                      $from_time = time();
                                                      $minutes = round(($from_time - $to_time)/60);

                                                  ?>


                                              <?php if(720 > $minutes ){?>
                                                  <?php if($result_1[0]->cancel_policy == 1){?>
                                                      <button type="button" class="btn btn-outline-danger"
                                                             data-bs-toggle="modal"
                                                             data-bs-target="#cancel<?=$current_date->sch_id;?>">
                                                             Cancel
                                                      </button>

                                                  <?php }else{?>
                                                      <button type="button" class="btn btn-outline-danger"
                                                             data-bs-toggle="modal"
                                                             data-bs-target="#cancel<?=$current_date->sch_id;?>">
                                                             Cancel
                                                      </button>

                                                  <?php } ?>
                                              <?php }else{?>
                                                  <button type="button" class="btn btn-outline-danger disabled">
                                                        Cannot Cancel
                                                  </button>

                                               <?php  } ?>
                                             
                          


                                              <div class="modal fade text-start modal-primary"
                                                 id="cancel<?=$current_date->sch_id;?>" tabindex="-1"
                                                 aria-labelledby="myModalLabel160" aria-hidden="true">
                                                 <div class="modal-dialog modal-dialog-centered">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                             <h5 class="modal-title"
                                                                 id="myModalLabel160">Cancel Slot
                                                             </h5>
                                                             <button type="button" class="btn-close"
                                                                 data-bs-dismiss="modal"
                                                                 aria-label="Close"></button>
                                                         </div>
                                                         <div class="modal-body">
                                                             <h6>Are you sure to cancel the slot</h6>
                                                             <?php if($result_1[0]->cancel_policy == 1){?>
                                                              Then Your one slot will deduct.
                                                               
                                                             <?php }else{?>
                                                              Your 10 Rupee will be deduct.
                                                             

                                                             <?php } ?>
                                                         </div>
                                                         <div class="modal-footer">
                                                             <a href="<?php echo  base_url('profile/sch_booking_cancel');?>/<?= $current_date->sch_id;?>/<?=$cust_id;?>/<?= $result_1[0]->cancel_policy;?>"
                                                                 class="btn btn-outline-danger">
                                                                 Cancel </a>
                                                         </div>
                                                     </div>
                                                 </div>
                                              </div>
                                      <?php } else{?>

                                                 <?php if(count($allCount) == $current_date->capacity){?>
                                                      <p>No Free Slot Available</p>

                                                 <?php }else{ ?>

                                                          <?php $book_date = $current_date->booking_allowed_time;?>
                                                      
                                                          <?php $today_date = date('d');?>

                                                          <?php $created_date = $current_date->created_da;?>

                                                          <?php if(intval($created_date) > intval($today_date)){
                                                                  $balnce_date = $created_date - $today_date;
                                                                  if($balnce_date > $book_date){
                                                                      $booking_pssibl= $balnce_date - $book_date;
                                                                       echo "Booking Available after ".$booking_pssibl." day";
                                                                  }else{?>
                                                                      <button type="button" class="btn btn-outline-primary"
                                                                         data-bs-toggle="modal"
                                                                         data-bs-target="#primary<?=$current_date->sch_id;?>">
                                                                         Book
                                                                      </button>

                                                                  <?php }
                                                             

                                                          }else{?>
                                                              <button type="button" class="btn btn-outline-primary"
                                                                 data-bs-toggle="modal"
                                                                 data-bs-target="#primary<?=$current_date->sch_id;?>">
                                                                 Book
                                                              </button>
                                                          <?php }?>
                                                          <div class="modal fade text-start modal-primary"
                                                             id="primary<?=$current_date->sch_id;?>" tabindex="-1"
                                                             aria-labelledby="myModalLabel160" aria-hidden="true">
                                                             <div class="modal-dialog modal-dialog-centered">
                                                                 <div class="modal-content">
                                                                     <div class="modal-header">
                                                                         <h5 class="modal-title"
                                                                             id="myModalLabel160">Are You Sure to
                                                                             proceed</h5>
                                                                         <button type="button" class="btn-close"
                                                                             data-bs-dismiss="modal"
                                                                             aria-label="Close"></button>
                                                                     </div>
                                                                     <div class="modal-body">
                                                                         <label>
                                                                             Date:
                                                                         </label>
                                                                         <b><?php echo $current_date->created_at;?></b><br>


                                                                         <label>
                                                                             Time:
                                                                         </label>
                                                                         <b><?php echo $current_date->class_time;?></b><br>
                                                                         <label>
                                                                             Class Name:
                                                                         </label>
                                                                         <b><?php echo $current_date->class_name;?></b><br>
                                                                         <label>
                                                                             Teacher:
                                                                         </label>
                                                                         <b><?php echo $current_date->firstname ;?>
                                                                             <?php echo $current_date->lastname ;?></b><br>
                                                                         <label>
                                                                             Medium:
                                                                         </label>
                                                                         <b><?php echo $current_date->medium_data ;?></b><br>
                                                                         <!-- <label>
                                                                             Status:
                                                                         </label>
                                                                         <b><?php echo count($allCount);?>/<?php echo $current_date->capacity;?></b>
                                                                         <br> -->
                                                                     </div>
                                                                     <div class="modal-footer">
                                                                      <?php $book_date = $current_date->booking_allowed_time;?>
                                                                  
                                                                      <?php $today_date = date('d');?>

                                                                      <?php $created_date = $current_date->created_da;?>

                                                                      <?php if(intval($created_date) > intval($today_date)){
                                                                          $balnce_date = $created_date - $today_date;
                                                                          if($balnce_date > $book_date){
                                                                              echo "You Can Book after ".$balnce_date." day";
                                                                          }else{?>
                                                                               <a href="<?php echo  base_url('profile/sch_booking/1/');?><?= $current_date->sch_id;?>"
                                                                             class="btn btn-primary">
                                                                             Book</a>

                                                                          <?php }
                                                                         

                                                                      }else{?>
                                                                          <a href="<?php echo  base_url('profile/sch_booking/1/');?><?= $current_date->sch_id;?>"
                                                                             class="btn btn-primary">
                                                                             Book</a>

                                                                      <?php }?>
                                                                        
                                                                         <!--  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button> -->
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>

                                                   <?php  } ?>


                                     <?php  } ?>

                                     <?php }else{ ?>

                                      <?php $this->db->select('*');
                                           $this->db->from('family_package_detils');
                                           $this->db->where('family_id',$this->session->userdata('cust_id'));
                                           $family_data = $this->db->get()->result();?>

                                         <?php if(isset($family_data[0])){?>
                                                  <?php $book_date = $current_date->booking_allowed_time;?>
                                              
                                                  <?php $today_date = date('d');?>

                                                  <?php $created_date = $current_date->created_da;?>

                                                  <?php if(intval($created_date) > intval($today_date)){
                                                          $balnce_date = $created_date - $today_date;
                                                          if($balnce_date > $book_date){
                                                              $booking_pssibl= $balnce_date - $book_date;
                                                               echo "Booking Available after ".$booking_pssibl." day";
                                                          }else{?>
                                                              <button type="button" class="btn btn-outline-primary"
                                                                 data-bs-toggle="modal"
                                                                 data-bs-target="#primary<?=$current_date->sch_id;?>">
                                                                 Book
                                                              </button>

                                                          <?php }
                                                             

                                                      }else{?>
                                                          <button type="button" class="btn btn-outline-primary"
                                                             data-bs-toggle="modal"
                                                             data-bs-target="#primary<?=$current_date->sch_id;?>">
                                                             Book
                                                          </button>
                                                      <?php }?>
                                                          <div class="modal fade text-start modal-primary"
                                                             id="primary<?=$current_date->sch_id;?>" tabindex="-1"
                                                             aria-labelledby="myModalLabel160" aria-hidden="true">
                                                             <div class="modal-dialog modal-dialog-centered">
                                                                 <div class="modal-content">
                                                                     <div class="modal-header">
                                                                         <h5 class="modal-title"
                                                                             id="myModalLabel160">Are You Sure to
                                                                             proceed</h5>
                                                                         <button type="button" class="btn-close"
                                                                             data-bs-dismiss="modal"
                                                                             aria-label="Close"></button>
                                                                     </div>
                                                                     <div class="modal-body">
                                                                         <label>
                                                                             Date:
                                                                         </label>
                                                                         <b><?php echo $current_date->created_at;?></b><br>


                                                                         <label>
                                                                             Time:
                                                                         </label>
                                                                         <b><?php echo $current_date->class_time;?></b><br>
                                                                         <label>
                                                                             Class Name:
                                                                         </label>
                                                                         <b><?php echo $current_date->class_name;?></b><br>
                                                                         <label>
                                                                             Teacher:
                                                                         </label>
                                                                         <b><?php echo $current_date->firstname ;?>
                                                                             <?php echo $current_date->lastname ;?></b><br>
                                                                         <label>
                                                                             Medium:
                                                                         </label>
                                                                         <b><?php echo $current_date->medium_data ;?></b><br>
                                                                         <!-- <label>
                                                                             Status:
                                                                         </label>
                                                                         <b><?php echo count($allCount);?>/<?php echo $current_date->capacity;?></b>
                                                                         <br> -->
                                                                     </div>
                                                                     <div class="modal-footer">
                                                                      <?php $book_date = $current_date->booking_allowed_time;?>
                                                                  
                                                                      <?php $today_date = date('d');?>

                                                                      <?php $created_date = $current_date->created_da;?>

                                                                      <?php if(intval($created_date) > intval($today_date)){
                                                                          $balnce_date = $created_date - $today_date;
                                                                          if($balnce_date > $book_date){
                                                                              echo "You Can Book after ".$balnce_date." day";
                                                                          }else{?>
                                                                               <a href="<?php echo  base_url('profile/sch_booking/1/');?><?= $current_date->sch_id;?>"
                                                                             class="btn btn-primary">
                                                                             Book</a>

                                                                          <?php }
                                                                         

                                                                      }else{?>
                                                                          <a href="<?php echo  base_url('profile/sch_booking/1/');?><?= $current_date->sch_id;?>"
                                                                             class="btn btn-primary">
                                                                             Book</a>

                                                                      <?php }?>
                                                                        
                                                                         <!--  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button> -->
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>


                                            <?php  }else{ ?>
                                                <?php if($this->session->userdata('cust_id')){?>

                                               <p>You Cannot Book.Please Upgrade You plan</p>
                                             <?php  }else{ ?>
                                              <a href="<?=base_url('profile/booking');?>" class="btn btn-primary">Book</a>

                                              <?php } ?>
                                           <?php }?>

                                     <?php } ?>

                                 </div>
                                 <div class="btn-medium-icon">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                         height="14" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-command">
                                         <path
                                             d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z">
                                         </path>
                                     </svg>

                                 </div>

                             </div>
                         </div>
                      </div>

                      



               <?php } }
                    

            
                 
           
          


      }

      public function schedule_load_by_branch(){
        $data['membershipData']=$this->model_auth->getMembershipdataById($this->session->userdata('cust_id')); 
        $membershipData=$data['membershipData'];
        $branch = $this->input->post('branch');
        $output = '';
        if($branch > 0){
           $return = $this->model_auth->getAllScheduledetailsBYbranch($branch); 

        }else{
           $return = $this->model_auth->getAllScheduledetailsCurrent();
        }
       
        foreach($return as $current_date){
                
                  $timestamp = $current_date->time_from;
                    $today = new DateTime("today"); // This object represents current date/time with time set to midnight
                    $match_date = DateTime::createFromFormat( "Y-m-d", $timestamp );
                    $match_date->setTime( 0, 0, 0 ); // set time part to midnight, in order to prevent partial comparison
                    $diff = $today->diff( $match_date );
                    $diffDays = (integer)$diff->format( "%R%a" ); // Extract days count in interval
                    if($diffDays >= 0 ){ 
                      $this->db->select('*');
                      $this->db->from('sch_booking');
                      $this->db->where('schedule_id',$current_date->sch_id);
                      $allCount =  $this->db->get()->result();
                      $cust_id = $this->session->userdata('cust_id');
                      $this->db->select('*');
                      $this->db->from('sch_booking');
                      $this->db->where('schedule_id',$current_date->sch_id);
                      $this->db->where('user_bas_id',$cust_id);
                      $booking_sta = $this->db->get()->result();
                      $time_from=$current_date->time_from;
                      $time_from= date('d-m-Y',strtotime($time_from));
 $data_show="";
                      $book_date = $current_date->booking_allowed_time;
                      $today_date = date('d');
                      $created_date = $current_date->created_da;
                      if(intval($created_date) > intval($today_date)){
                        $balnce_date = $created_date - $today_date;
                        if($balnce_date > $book_date){
                        $data_show = "You Can Book after ".$balnce_date." day";
                        }else{

                          $data_show ='<a href="'. base_url('profile/booking').'" class="btn btn-primary">
                          Book</a>';
                        }
                      
                      }?>
                       <div class="col-md-12 col-xxl-12">
                         <div class="card shadow-none bg-transparent border-primary">
                             <div class="card-body">
                                  <ul>
                                     <li> Date :<?=  $current_date->time_from ?> </li>
                                     <li>Time : <?=  $current_date->class_time ?> </li>
                                     <li><b>Class Name :
                                             <?= $current_date->class_name ?> </b></li>
                                     <li>Teacher : <?= $current_date->firstname  ?></li>
                                     <li>Medium : <?= $current_date->medium_data ?> </li>



                                     <!-- <li>Status
                                         :<?=  count($allCount) / $current_date->capacity ?>
                                     </li> -->

                                  </ul>
                                  <div class="btn-booking">



                                  <?php if(isset($membershipData[0])){?>
                                      <?php if(isset($booking_sta[0])){?>
                                          <div class="check-booked"><span class="icon" ><i data-feather="check-circle"></i></span>Booked</div>

                                          <?php $this->db->select('*');
                                               $this->db->from('tbl_schdl_cust_group');
                                               $this->db->where('schdl_id',$current_date->sch_id);
                                               $result= $this->db->get()->result();

                                                 $cust_grp_array=array();
                                                 foreach($result as $res){
                                                       array_push($cust_grp_array,$res->cust_group_id);
                                                  }?>
                                                      <?php if(in_array($membershipData[0]->sl_product_id,$cust_grp_array)){
                                                            $membershipData[0]->sl_product_id;

                                                         }
                                                      ?>

                                                  <?php 
                                                      $this->db->select('*');
                                                      $this->db->from('membership_list');
                                                      $this->db->where('memberlist_id',$membershipData[0]->sl_product_id);
                                                      $result_1= $this->db->get()->result();

                                                     
                                                  ?>
                                                  <?php
                                                      $to_time = strtotime($current_date->class_time); 
                                                      $from_time = time();
                                                      $minutes = round(($from_time - $to_time)/60);

                                                  ?>


                                              <?php if(720 > $minutes ){?>
                                                  <?php if($result_1[0]->cancel_policy == 1){?>
                                                      <button type="button" class="btn btn-outline-danger"
                                                             data-bs-toggle="modal"
                                                             data-bs-target="#cancel<?=$current_date->sch_id;?>">
                                                             Cancel
                                                      </button>

                                                  <?php }else{?>
                                                      <button type="button" class="btn btn-outline-danger"
                                                             data-bs-toggle="modal"
                                                             data-bs-target="#cancel<?=$current_date->sch_id;?>">
                                                             Cancel
                                                      </button>

                                                  <?php } ?>
                                              <?php }else{?>
                                                  <button type="button" class="btn btn-outline-danger disabled">
                                                        Cannot Cancel
                                                  </button>

                                               <?php  } ?>
                                             
                          


                                              <div class="modal fade text-start modal-primary"
                                                 id="cancel<?=$current_date->sch_id;?>" tabindex="-1"
                                                 aria-labelledby="myModalLabel160" aria-hidden="true">
                                                 <div class="modal-dialog modal-dialog-centered">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                             <h5 class="modal-title"
                                                                 id="myModalLabel160">Cancel Slot
                                                             </h5>
                                                             <button type="button" class="btn-close"
                                                                 data-bs-dismiss="modal"
                                                                 aria-label="Close"></button>
                                                         </div>
                                                         <div class="modal-body">
                                                             <h6>Are you sure to cancel the slot</h6>
                                                             <?php if($result_1[0]->cancel_policy == 1){?>
                                                              Then Your one slot will deduct.
                                                               
                                                             <?php }else{?>
                                                              Your 10 Rupee will be deduct.
                                                             

                                                             <?php } ?>
                                                         </div>
                                                         <div class="modal-footer">
                                                             <a href="<?php echo  base_url('profile/sch_booking_cancel');?>/<?= $current_date->sch_id;?>/<?=$cust_id;?>/<?= $result_1[0]->cancel_policy;?>"
                                                                 class="btn btn-outline-danger">
                                                                 Cancel </a>
                                                         </div>
                                                     </div>
                                                 </div>
                                              </div>
                                      <?php } else{?>

                                                 <?php if(count($allCount) == $current_date->capacity){?>
                                                      <p>No Free Slot Available</p>

                                                 <?php }else{ ?>

                                                          <?php $book_date = $current_date->booking_allowed_time;?>
                                                      
                                                          <?php $today_date = date('d');?>

                                                          <?php $created_date = $current_date->created_da;?>

                                                          <?php if(intval($created_date) > intval($today_date)){
                                                                  $balnce_date = $created_date - $today_date;
                                                                  if($balnce_date > $book_date){
                                                                      $booking_pssibl= $balnce_date - $book_date;
                                                                       echo "Booking Available after ".$booking_pssibl." day";
                                                                  }else{?>
                                                                      <button type="button" class="btn btn-outline-primary"
                                                                         data-bs-toggle="modal"
                                                                         data-bs-target="#primary<?=$current_date->sch_id;?>">
                                                                         Book
                                                                      </button>

                                                                  <?php }
                                                             

                                                          }else{?>
                                                              <button type="button" class="btn btn-outline-primary"
                                                                 data-bs-toggle="modal"
                                                                 data-bs-target="#primary<?=$current_date->sch_id;?>">
                                                                 Book
                                                              </button>
                                                          <?php }?>
                                                          <div class="modal fade text-start modal-primary"
                                                             id="primary<?=$current_date->sch_id;?>" tabindex="-1"
                                                             aria-labelledby="myModalLabel160" aria-hidden="true">
                                                             <div class="modal-dialog modal-dialog-centered">
                                                                 <div class="modal-content">
                                                                     <div class="modal-header">
                                                                         <h5 class="modal-title"
                                                                             id="myModalLabel160">Are You Sure to
                                                                             proceed</h5>
                                                                         <button type="button" class="btn-close"
                                                                             data-bs-dismiss="modal"
                                                                             aria-label="Close"></button>
                                                                     </div>
                                                                     <div class="modal-body">
                                                                         <label>
                                                                             Date:
                                                                         </label>
                                                                         <b><?php echo $current_date->created_at;?></b><br>


                                                                         <label>
                                                                             Time:
                                                                         </label>
                                                                         <b><?php echo $current_date->class_time;?></b><br>
                                                                         <label>
                                                                             Class Name:
                                                                         </label>
                                                                         <b><?php echo $current_date->class_name;?></b><br>
                                                                         <label>
                                                                             Teacher:
                                                                         </label>
                                                                         <b><?php echo $current_date->firstname ;?>
                                                                             <?php echo $current_date->lastname ;?></b><br>
                                                                         <label>
                                                                             Medium:
                                                                         </label>
                                                                         <b><?php echo $current_date->medium_data ;?></b><br>
                                                                         <!-- <label>
                                                                             Status:
                                                                         </label>
                                                                         <b><?php echo count($allCount);?>/<?php echo $current_date->capacity;?></b>
                                                                         <br> -->
                                                                     </div>
                                                                     <div class="modal-footer">
                                                                      <?php $book_date = $current_date->booking_allowed_time;?>
                                                                  
                                                                      <?php $today_date = date('d');?>

                                                                      <?php $created_date = $current_date->created_da;?>

                                                                      <?php if(intval($created_date) > intval($today_date)){
                                                                          $balnce_date = $created_date - $today_date;
                                                                          if($balnce_date > $book_date){
                                                                              echo "You Can Book after ".$balnce_date." day";
                                                                          }else{?>
                                                                               <a href="<?php echo  base_url('profile/sch_booking/1/');?><?= $current_date->sch_id;?>"
                                                                             class="btn btn-primary">
                                                                             Book</a>

                                                                          <?php }
                                                                         

                                                                      }else{?>
                                                                          <a href="<?php echo  base_url('profile/sch_booking/1/');?><?= $current_date->sch_id;?>"
                                                                             class="btn btn-primary">
                                                                             Book</a>

                                                                      <?php }?>
                                                                        
                                                                         <!--  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button> -->
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>

                                                   <?php  } ?>


                                     <?php  } ?>

                                     <?php }else{ ?>

                                      <?php $this->db->select('*');
                                           $this->db->from('family_package_detils');
                                           $this->db->where('family_id',$this->session->userdata('cust_id'));
                                           $family_data = $this->db->get()->result();?>

                                         <?php if(isset($family_data[0])){?>
                                                  <?php $book_date = $current_date->booking_allowed_time;?>
                                              
                                                  <?php $today_date = date('d');?>

                                                  <?php $created_date = $current_date->created_da;?>

                                                  <?php if(intval($created_date) > intval($today_date)){
                                                          $balnce_date = $created_date - $today_date;
                                                          if($balnce_date > $book_date){
                                                              $booking_pssibl= $balnce_date - $book_date;
                                                               echo "Booking Available after ".$booking_pssibl." day";
                                                          }else{?>
                                                              <button type="button" class="btn btn-outline-primary"
                                                                 data-bs-toggle="modal"
                                                                 data-bs-target="#primary<?=$current_date->sch_id;?>">
                                                                 Book
                                                              </button>

                                                          <?php }
                                                             

                                                      }else{?>
                                                          <button type="button" class="btn btn-outline-primary"
                                                             data-bs-toggle="modal"
                                                             data-bs-target="#primary<?=$current_date->sch_id;?>">
                                                             Book
                                                          </button>
                                                      <?php }?>
                                                          <div class="modal fade text-start modal-primary"
                                                             id="primary<?=$current_date->sch_id;?>" tabindex="-1"
                                                             aria-labelledby="myModalLabel160" aria-hidden="true">
                                                             <div class="modal-dialog modal-dialog-centered">
                                                                 <div class="modal-content">
                                                                     <div class="modal-header">
                                                                         <h5 class="modal-title"
                                                                             id="myModalLabel160">Are You Sure to
                                                                             proceed</h5>
                                                                         <button type="button" class="btn-close"
                                                                             data-bs-dismiss="modal"
                                                                             aria-label="Close"></button>
                                                                     </div>
                                                                     <div class="modal-body">
                                                                         <label>
                                                                             Date:
                                                                         </label>
                                                                         <b><?php echo $current_date->created_at;?></b><br>


                                                                         <label>
                                                                             Time:
                                                                         </label>
                                                                         <b><?php echo $current_date->class_time;?></b><br>
                                                                         <label>
                                                                             Class Name:
                                                                         </label>
                                                                         <b><?php echo $current_date->class_name;?></b><br>
                                                                         <label>
                                                                             Teacher:
                                                                         </label>
                                                                         <b><?php echo $current_date->firstname ;?>
                                                                             <?php echo $current_date->lastname ;?></b><br>
                                                                         <label>
                                                                             Medium:
                                                                         </label>
                                                                         <b><?php echo $current_date->medium_data ;?></b><br>
                                                                         <!-- <label>
                                                                             Status:
                                                                         </label>
                                                                         <b><?php echo count($allCount);?>/<?php echo $current_date->capacity;?></b>
                                                                         <br> -->
                                                                     </div>
                                                                     <div class="modal-footer">
                                                                      <?php $book_date = $current_date->booking_allowed_time;?>
                                                                  
                                                                      <?php $today_date = date('d');?>

                                                                      <?php $created_date = $current_date->created_da;?>

                                                                      <?php if(intval($created_date) > intval($today_date)){
                                                                          $balnce_date = $created_date - $today_date;
                                                                          if($balnce_date > $book_date){
                                                                              echo "You Can Book after ".$balnce_date." day";
                                                                          }else{?>
                                                                               <a href="<?php echo  base_url('profile/sch_booking/1/');?><?= $current_date->sch_id;?>"
                                                                             class="btn btn-primary">
                                                                             Book</a>

                                                                          <?php }
                                                                         

                                                                      }else{?>
                                                                          <a href="<?php echo  base_url('profile/sch_booking/1/');?><?= $current_date->sch_id;?>"
                                                                             class="btn btn-primary">
                                                                             Book</a>

                                                                      <?php }?>
                                                                        
                                                                         <!--  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button> -->
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>


                                            <?php  }else{ ?>
                                              <?php if($this->session->userdata('cust_id')){?>

                                               <p>You Cannot Book.Please Upgrade You plan</p>
                                             <?php  }else{ ?>
                                              <a href="<?=base_url('profile/booking');?>" class="btn btn-primary">Book</a>

                                              <?php } ?>
                                           <?php }?>

                                     <?php } ?>

                                 </div>
                                 <div class="btn-medium-icon">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                         height="14" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-command">
                                         <path
                                             d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z">
                                         </path>
                                     </svg>

                                 </div>

                             </div>
                         </div>
                      </div>


                     



         <?php } }
                    

            
                 
           
           



      }
}