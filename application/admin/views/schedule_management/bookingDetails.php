    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="invoice-list-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body"> 
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php if(isset($schedule_info[0])){?>
                                            <h5 class="card-title">
                                            <?= $schedule_info[0]->class_name;?></h5>
                                            <h5>Starts : <?= $schedule_info[0]->class_time;?> </h5>
                                            <!-- <h5>Date : <?= $schedule_info[0]->time_from;?> - <?= $schedule_info[0]->time_to;?></h5> -->
                                            <h5>Date : <?= $schedule_info[0]->time_from;?></h5>
                                            <a class="btn btn-flat-danger waves-effect" href="<?php echo base_url('Schedule_management/suspend_schdule/2/');?><?= $schedule_info[0]->sch_id;?>">Suspend Class</a>
                                            <?php } ?>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <h5>Add A Customer</h5>
                                            <?php if(isset($schedule_info[0])){?>
                                            <form method="POST" action="<?= base_url('schedule_management/sch_booking/1/');?><?= $schedule_info[0]->sch_id;?>">
                                            
                                            <?php } ?>
                                            <div class="row">
                                                <div class="col-md-9">
                                        <select class="form-control select2" name="cust_id" required="" >
                                            <option value="">Choose Customer</option>
                                            <?php foreach($customerData as $customer){?>
                                                <option value="<?= $customer->cust_id;?>"><?= $customer->full_name;?></option>

                                           <?php  } ?>
                                            
                                        </select>
                                        </div>
                                        <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                        </div>
                                    </div>
                                 
                                    
                                  <div class="row">
                                     <div class="col-md-12">
                                     </div>
                                 </div>
                                 <h5 class="mt-4">Booking Details</h5>
                                 <div class="card-datatable table-responsive pt-0">
                                    <table class="user-list-table table">
                                        <thead>
                                            <tr>
                                                
                                                <th>Customer Name</th>
                                                <th>Mobile Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                       <tbody>

                                         <?php foreach($bookingData as $booking){?>
                                            <tr>
                                              
                                               <td><?php echo $booking->full_name;?></td>
                                               <td><?php echo $booking->mobile_number ;?> </td>
                                               <?php 
                                                $this->db->select('*');
                                                $this->db->from('sales');
                                                $this->db->where('sl_cust_id',$booking->user_bas_id);
                                                $membershipData = $this->db->get()->result();
                                                ?>


                                                <?php $this->db->select('*');
                                                 $this->db->from('tbl_schdl_cust_group');
                                                 $this->db->where('schdl_id',$booking->schedule_id);
                                                 $result= $this->db->get()->result();

                                                 $cust_grp_array=array();
                                                 foreach($result as $res){
                                                    array_push($cust_grp_array,$res->cust_group_id);
                                                 }



                                           ?>
                                               <?php if(in_array($membershipData[0]->sl_product_id,$cust_grp_array)){
                                                  $membershipData[0]->sl_product_id;

                                               }
                                               ?>

                                               <?php $this->db->select('*');
                                                     $this->db->from('membership_list');
                                                     $this->db->where('memberlist_id',$membershipData[0]->sl_product_id);
                                                     $result_1= $this->db->get()->result();
                                                     ?>
                                                    

                                                                       
                                                        <?php
                                                        $to_time = strtotime($booking->class_time); 
                                                        $from_time = time();
                                                        $minutes = round(($from_time - $to_time)/60);

        
                                                         
                                                        ?>


                                                                    <td> <?php if($booking->status == 1){?>
                                                                        <?php if(720 > $minutes ){?>
                                                                            <?php if($result_1[0]->cancel_policy == 1){?>
                                                                                 <button type="button" class="btn btn-outline-danger"
                                                                                   data-bs-toggle="modal"
                                                                                   data-bs-target="#cancel<?=$booking->schedule_id;?>">
                                                                                   Cancel
                                                                               </button>

                                                                            <?php }else{?>
                                                                                <button type="button" class="btn btn-outline-danger"
                                                                                   data-bs-toggle="modal"
                                                                                   data-bs-target="#cancel<?=$booking->schedule_id;?>">
                                                                                   Cancel
                                                                               </button>

                                                                            <?php } ?>
                                                                            

                                                                        <?php }else{?>
                                                                            <button type="button" class="btn btn-outline-danger disabled">
                                                                  Cannot Cancel
                                                               </button>

                                                                       <?php  } ?>
                                                                   <?php } ?>


                                                                <div class="modal fsade text-start modal-primary"
                                                                   id="cancel<?=$booking->schedule_id;?>" tabindex="-1"
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
                                                                               <a href="<?php echo  base_url('schedule_management/sch_booking_cancel');?>/<?= $booking->schedule_id;?>/<?=$booking->user_bas_id;?>/<?=$result_1[0]->cancel_policy;?>"
                                                                                   class="btn btn-outline-danger">
                                                                                   Cancel </a>
                                                                               <!--  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button> -->
                                                                           </div>
                                                                       </div>
                                                                   </div>
                                                               </div>

                                                                           </td>
                                            </tr>

                                        <?php } ?>

                                        

                                       </tbody>
                                    </table>
                                </div>
                                <h5>Cancel Details</h5>
                                <div class="card-datatable table-responsive pt-0">
                                    <table class="user-list-table table">
                                        <thead>
                                            <tr>
                                                
                                                <th>Customer Name</th>
                                                <th>Mobile Number</th>
                                                
                                            </tr>
                                        </thead>
                                       <tbody>
                                        <?php foreach($cancelData as $booking){?>
                                            <tr>
                                              
                                               <td><?php echo $booking->full_name;?></td>
                                               <td><?php echo $booking->mobile_number ;?> </td>
                                           </tr>
                                        <?php } ?>
                                       </tbody>
                                    </table>
                                </div>
                                </div>


                                
                            </div>
                        </div>
                    </div>
                    
                </section>

            </div>
        </div>
    </div>