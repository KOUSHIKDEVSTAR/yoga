        <?php if($this->session->flashdata('success')){?>
                        <script type="text/javascript">
                        swal({
                            title: "Package Added Successfully",
                            text: "",
                            icon: "success",
                            button: "Done",
                        });;
                        </script>

                        <?php } elseif($this->session->flashdata('error')){?>
                        <script type="text/javascript">
                        swal({
                            title: "Fail To Add",
                            text: "You clicked the button!",
                            icon: "warning",
                            button: "Aww yiss!",
                        });;
                        </script>

                        <?php }?>



    <div class="app-content content profile-content">
        <div class="content-wrapper p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-view-account">
                    <div class="container-xxl">
                        <div class="row">
                            <!-- User Sidebar -->
                            <div class="col-xxl-6 col-xxl-6 col-xxl-6 order-1 order-md-0 offset-xxl-1">

                                <!-- User Card -->
                                <div class="card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="user-avatar-section">
                                                <div class="d-flex align-items-center flex-column">
                                                    <img class="img-fluid rounded mt-3 mb-2"
                                                        src="<?= base_url('admin/uploads/customer_details/');?><?= $customer_details[0]->pr_image;?>"
                                                        height="110" width="110" alt="User avatar" />
                                                    <div class="user-info text-center">
                                                        <h4><?= $customer_details[0]->full_name;?></h4>
                                                        <!-- <span class="badge bg-light-secondary">Customer</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="d-flex justify-content-around my-2 pt-75">
                                                <div class="d-flex align-items-start me-2">
                                                    <span class="badge bg-light-primary p-75 rounded">
                                                        <i data-feather="check" class="font-medium-2"></i>
                                                    </span>
                                                    <div class="ms-75">
                                                        <h4 class="mb-0">1.23k</h4>
                                                        <small>Tasks Done</small>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-start">
                                                    <span class="badge bg-light-primary p-75 rounded">
                                                        <i data-feather="briefcase" class="font-medium-2"></i>
                                                    </span>
                                                    <div class="ms-75">
                                                        <h4 class="mb-0">568</h4>
                                                        <small>Projects Done</small>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4> -->
                                            <div class="info-container">
                                                <ul class="list-unstyled">
                                                    <li class="mb-75">
                                                        <span class="fw-bolder me-25">Username:</span>
                                                        <span><?= $customer_details[0]->email;?></span>
                                                    </li>
                                                    <li class="mb-75">
                                                        <span class="fw-bolder me-25">Billing Email:</span>
                                                        <span><?= $customer_details[0]->email;?></span>
                                                    </li>
                                                    <li class="mb-75">
                                                        <span class="fw-bolder me-25">Status:</span>
                                                        <?php if($customer_details[0]->is_active == 1){?>
                                                        <span class="badge bg-light-success">Active</span>
                                                        <?php }elseif ($customer_details[0]->is_active == 0){?>
                                                        <span class="badge bg-light-danger">Suspended</span>

                                                        <?php } ?>
                                                    </li>
                                                    <li class="mb-75">
                                                        <span class="fw-bolder me-25">Date Of Birth:</span>
                                                        <span><?= $customer_details[0]->dob;?></span>
                                                    </li>
                                                    <li class="mb-75">
                                                        <span class="fw-bolder me-25">Role:</span>
                                                        <span>Customer</span>
                                                    </li>
                                                    <li class="mb-75">
                                                        <span class="fw-bolder me-25">Branch Name:</span>
                                                        <span>
                                                        </span>
                                                    </li>
                                                    <li class="mb-75">
                                                        <span class="fw-bolder me-25">Contact:</span>
                                                        <span><?= $customer_details[0]->mobile_number;?></span>
                                                    </li>
                                                    <li class="mb-75">
                                                        <span class="fw-bolder me-25">Language:</span>
                                                        <span>English</span>
                                                    </li>
                                                    <li class="mb-75">
                                                        <span class="fw-bolder me-25">Address:</span>
                                                        <span><?= $customer_details[0]->address;?></span>
                                                    </li>

                                                </ul>
                                                <div class="btn-wraper">
                                                <div class="d-flex justify-content-center pt-2">
                                                    <a href="<?=base_url('profile/edit');?>"
                                                        class="btn btn-primary me-1 btn-edit">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="d-flex justify-content-center pt-2">
                                                    <a href="<?php echo base_url('login/logout');?>"
                                                        class="btn btn-primary me-1 btn-logout">
                                                        Logout
                                                    </a>
                                                </div>

                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /User Card -->

                            </div>
                            <div class="col-xxl-4 col-xxl-4 col-xxl-4 order-1 order-md-0 ">
                                <!-- Plan Card -->
                                <div class="card border-primary">
                                    <div class="card-body">
                                         <?php if(isset($customer_plan[0])){
                                        foreach($customer_plan as $plan){
                                    ?>
                                        <div class="d-flex justify-content-between align-items-start">
                                            <span class="badge bg-light-primary"><?= $plan->name;?></span>
                                            <div class="d-flex justify-content-center">
                                                <?php $this->db->select('*');
                                                $this->db->from('tbl_cancel_boking_sch');
                                                $this->db->where('sch_cust_id',$this->session->userdata('cust_id'));
                                                $amount = $this->db->get()->result();
                                                ?>

                                                <sup class="h5 pricing-currency text-primary mt-1 mb-0">$</sup>
                                                <span class="fw-bolder display-5 mb-0 text-primary">
                                                    <?php if(isset($amount[0])){?>
                                                    <?=  $amount[0]->amount;?>
                                                        <?php } else{?>
                                                        0

                                                        <?php } ?>
                                                    </span>
                                                <a href="<?= base_url('profile/history');?>"><sub
                                                    class="pricing-duration font-small-4 ms-25 mt-auto mb-2">/History</sub></a>
                                            </div>
                                        </div>
                                        <ul class="ps-1 mb-2">
                                            <li class="mb-50">
                                                <?php if($plan->cancel_policy == 2){
                                                    echo "Unlimited";
                                                }else{
                                                    echo $plan->no_session;
                                                    echo "&nbsp";
                                                    echo "Classes";

                                                }?>
                                            </li>
                                            <li class="mb-50"><?= $plan->validty_days;?> Days Validity</li>
                                            <li>Expairy : <?php
                                                            $date1=$plan->validty_days;
                                                            $date2=$plan->created_at;
                                                            echo date('Y-m-d', strtotime($date2. ' +'.$date1.' days'));
                                                            ?></li>
                                        </ul>
                                      <!--   <div class="d-flex justify-content-between align-items-center fw-bolder mb-50">
                                            <span>Days</span>
                                            <span>4 of 30 Days</span>
                                        </div>
                                        <div class="progress mb-50" style="height: 8px">
                                            <div class="progress-bar" role="progressbar" style="width: 80%"
                                                aria-valuenow="65" aria-valuemax="100" aria-valuemin="80"></div>
                                        </div> -->
                                    <!--  <span>4 days remaining</span> -->
                                     
                                     
                                        <div class="d-grid w-100 mt-2">
                                            <button class="btn btn-primary" data-bs-target="#upgradePlanModal"
                                                data-bs-toggle="modal">
                                                Buy A Membership
                                            </button>
                                        </div>
                                          <?php } }else{?>
                                    <h6> <div class="d-grid w-100 mt-2">
                                            <button class="btn btn-primary" data-bs-target="#upgradePlanModal"
                                                data-bs-toggle="modal">
                                                Buy A Membership
                                            </button>
                                        </div></h6>

                               <?php  }  ?>
                                    </div>
                                </div>
                                <!-- /Plan Card -->
                            </div>


                            <div class="col-xxl-10 col-xxl-10 col-xxl-10 order-1 order-md-0 offset-xxl-1 ">
                                <div class="card container-xxl">
                                    <h4 class="card-header">User's Invoice List</h4>
                                    <table class="invoice-table table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>#Invoice</th>
                                                <th>TOTAL Cost</th>
                                                <th>TOTAL Paid</th>
                                                <th>TOTAL Due</th>
                                                <th class="text-truncate">Issued Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                        $this->db->select('*');
                                        $this->db->from('sales');
                                        $this->db->where('sl_cust_id',$this->session->userdata('cust_id'));
                                        $this->db->order_by('sale_id ','desc');
                                        $customer_inv_det = $this->db->get()->result();

                                        foreach($customer_inv_det as $invoice){?>
                                            <tr>
                                                <td></td>
                                                <td><a
                                                        href="<?= base_url('sales/invoice_preview/');?><?= $invoice->sale_id ;?>">#<?= $invoice->invoice_no;?></a>
                                                </td>
                                                <td><?= $invoice->sale_total_price;?></td>
                                                <td><?= $invoice->received_amount;?></td>
                                                <td><?= $invoice->due_amt;?></td>
                                                <td><?= $invoice->created_at;?></td>

                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card container-xxl">
                                    <h4 class="card-header">User's Transction List</h4>
                                    <table class="invoice-table table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>#Invoice</th>
                                                <th>Payment Amount</th>
                                                <th>Payment Mode</th>
                                                <th>Payment Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                        $this->db->select('*');
                                        $this->db->from('sale_tarnsction');
                                        $this->db->where('custmr_id',$this->session->userdata('cust_id'));
                                        $this->db->order_by('trn_id','desc');
                                        $trans_data = $this->db->get()->result();
                                        foreach($trans_data as $trans){?>
                                            <tr>
                                                <td></td>
                                                <td><a href="">#<?= $trans->invoice_no_sale;?></a></td>
                                                <td><?= $trans->rest_amount;?></td>
                                                <td><?= $trans->pay_method;?></td>
                                                <td><?= $trans->pay_date;?></td>


                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                                 <div class="card container-xxl">
                                 <h4 class="card-header">Wallet Transction List</h4>
                                <table class="invoice-table table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Description</th>
                                            
                                            <th>Payment Amount</th>
                                            <th>Payment Mode</th>
                                            <th>Payment Date</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $this->db->select('*');
                                        $this->db->from('tbl_wallet_transction');
                                        $this->db->where('custmr_id',$this->session->userdata('cust_id'));
                                        $this->db->order_by('wlt_trn_id','desc');
                                        $trans_data = $this->db->get()->result();
                                        foreach($trans_data as $trans){?>
                                        <tr>
                                            <td></td>
                                            <td><?= $trans->pay_desc;?></td>
                                            <td><?= $trans->amount;?></td>
                                            <td><?= $trans->pay_method;?></td>
                                            <td><?= $trans->pay_date;?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                             <?php if(isset($customer_plan[0])){
                                if($customer_plan[0]->is_sharable == 1){
                                ?>
                            <div class="card container-xxl">
                                <h4 class="card-header">Package Sharing Details</h4>
                                <?php 
                                        $this->db->select('*');
                                        $this->db->from('family_package_detils fpd');
                                        $this->db->join('customers','customers.cust_id=fpd.family_id','INNER');
                                        $this->db->where('fpd.buyer_detls_id',$this->session->userdata('cust_id'));
                                        $this->db->order_by('fpd.family_pckg_dtls_id','desc');
                                        $packag_detils = $this->db->get()->result();?>

                                <?php 
                                $count_plan = count($packag_detils);
                                if( $count_plan==3){ ?>
                                     <button class="btn btn-primary" data-bs-target="#package_shrng_dtls"
                                                data-bs-toggle="modal" disabled="">
                                              No Limit to Add
                                            </button>


                                <?php }else{?>
                                      <button class="btn btn-primary" data-bs-target="#package_shrng_dtls"
                                                data-bs-toggle="modal">
                                               Add New
                                            </button>

                               <?php  } ?>
                              
                                <table class="invoice-table table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Package Name</th>
                                            
                                            <th>Full Name</th>
                                            <th>Class Attended</th>
                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach($packag_detils as $packge){?>
                                        <tr> 
                                            <td></td>
                                            <td><?=$customer_plan[0]->name;?></td>
                                            <td><?= $packge->full_name;?></td>
                                            <td><?= $packge->no_of_class;?></td>
                                           
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php }else{?>
                            You Cannot Share this plan to other

                        <?php }}
                            ?>


                               
                            </div>
                            <!--/ User Sidebar -->

                            
                            <!--/ User Content -->
                        </div>

                    </div>

                </section>
                <!-- upgrade your plan Modal -->
                <div class="modal fade" id="upgradePlanModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-upgrade-plan">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-5 pb-2">
                                <div class="text-center mb-2">
                                    <h1 class="mb-1">Upgrade Plan</h1>
                                    <p>Choose the best plan for user.</p>
                                </div>
                                <form id="upgradePlanForm" class="row pt-50" onsubmit="return false">
                                    <div class="col-sm-8">
                                        <label class="form-label" for="choosePlan">Choose Plan</label>
                                        <select id="choosePlan" name="choosePlan" class="form-select"
                                            aria-label="Choose Plan">
                                            <option selected>Choose Plan</option>
                                            <option value="standard">Standard - $99/month</option>
                                            <option value="exclusive">Exclusive - $249/month</option>
                                            <option value="Enterprise">Enterprise - $499/month</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 text-sm-end">
                                        <button type="submit" class="btn btn-primary mt-2">Upgrade</button>
                                    </div>
                                </form>
                            </div>
                            <hr />
                            <div class="modal-body px-5 pb-3">
                                <h6>User current plan is standard plan</h6>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="d-flex justify-content-center me-1 mb-1">
                                        <sup class="h5 pricing-currency pt-1 text-primary">$</sup>
                                        <h1 class="fw-bolder display-4 mb-0 text-primary me-25">99</h1>
                                        <sub class="pricing-duration font-small-4 mt-auto mb-2">/month</sub>
                                    </div>
                                    <button class="btn btn-outline-danger cancel-subscription mb-1">Cancel
                                        Subscription</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ upgrade your plan Modal -->
                
                  <div class="modal fade" id="package_shrng_dtls" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-upgrade-plan">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-5 pb-2">
                                <div class="text-center mb-2">
                                    <h1 class="mb-1">Add Memebr</h1>
                                    <p>Choose the best plan for user.</p>
                                </div>
                                <form id="" action="<?=base_url('profile/sharing_package');?>" method="POST" class="row pt-50">
                                    <input type="hidden" name="cust_id"value="<?=$this->session->userdata('cust_id');?>">
                                    <div class="col-sm-8">
                                        <label class="form-label" for="choosePlan">Full Name</label>
                                        <input type="text" name="full_name" id="full_name" class="form-control">
                                        <span class="text-danger" style="color: red;"><?php echo form_error('full_name'); ?></span>
    
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="form-label" for="choosePlan">Email</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                        <span class="text-danger" style="color: red;"><?php echo form_error('email'); ?></span>
    
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="form-label" for="choosePlan">Mobile Number</label>
                                        <input type="text" name="mobile_phone" id="mobile_phone" class="form-control">
                                        <span class="text-danger" style="color: red;"><?php echo form_error('mobile_phone'); ?></span>
    
                                    </div> 
                                    <div class="col-sm-8">
                                    <label class="form-label" for="choosePlan">Choose Plan</label>
                                      <select id="choosePlan" name="plan_id" class="form-select"
                                            aria-label="Choose Plan" required="">
                                            <option selected>Choose Plan</option>
                                           <?php foreach($customer_plan as $plan){?>
                                            <option value="<?= $plan->memberlist_id;?>"><?= $plan->name;?></option>
                                        <?php } ?>
                                           
                                        </select>
                                       <!-- <input type="text" name="cust_plan" value="<?=$customer_plan[0]->name;?>" readonly class="form-control" >
                                       <input type="hidden" name="plan_id" value="<?=$customer_plan[0]->memberlist_id;?>"> -->
                                    </div>
                                    <div class="col-sm-4 text-sm-end">
                                        <button type="submit" class="btn btn-primary mt-2">Add</button>
                                    </div>
                                </form>
                            </div>
                            <hr />
                            <div class="modal-body px-5 pb-3">
                            
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>