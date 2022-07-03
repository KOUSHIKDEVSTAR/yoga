<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-view-account">
                    <div class="row">
                        <!-- User Sidebar -->
                        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                            <!-- User Card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-avatar-section">
                                        <div class="d-flex align-items-center flex-column">
                                            <img class="img-fluid rounded mt-3 mb-2" src="<?= base_url('uploads/customer_details/');?><?= $customer_details[0]->pr_image;?>" height="110" width="110" alt="User avatar" />
                                            <div class="user-info text-center">
                                                <h4><?= $customer_details[0]->full_name;?></h4>
                                                <span class="badge bg-light-secondary">Customer</span>
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
                                    <h4 class="fw-bolder border-bottom pb-50 mb-1"></h4>
                                    <div class="info-container">
                                        <ul class="list-unstyled">
                                           
                                            <li class="mb-75">
                                            <span class="fw-bolder me-25">Email:</span>
                                                <span><?= $customer_details[0]->email;?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Contact:</span>
                                                <span><?= $customer_details[0]->mobile_number;?></span>
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
                                                <span class="fw-bolder me-25">Branch Name:</span>
                                                <span> <?php foreach($branch_data as $branch){?>
                                                    
                                                    <?php if($branch['id'] == $customer_details[0]->branch_id){echo $branch['name'];}?>
                                                <?php }?>
                                                </span>
                                            </li>
                                            
                                            
                                            
                                        </ul>
                                        <div class="d-flex justify-content-center pt-2">
                                            <a href="<?=base_url('customers/edit/');?><?= $customer_details[0]->cust_id;?>" class="btn btn-primary me-1">
                                                Edit
                                            </a>
                                            <?php if($customer_details[0]->is_active == 1){?>
                                                <a onclick="return confirm('Are you sure to Block it?')" href="<?=base_url('customers/status_update/');?><?= $customer_details[0]->cust_id;?>/0" class="btn btn-outline-danger suspend-user">Block</a>

                                            <?php } else{?>
                                                <a onclick="return confirm('Are you sure to Unblock it?')" href="<?=base_url('customers/status_update/');?><?= $customer_details[0]->cust_id;?>/1" class="btn btn-outline-danger suspend-user">UnBlock</a>

                                            <?php } ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /User Card -->
                            <!-- Plan Card -->
                            <div class="card border-primary">
                                <div class="card-body">
                                      <?php if(isset($customer_plan[0])){
                                        foreach($customer_plan as $plan){
                                    ?>
                                    <div class="d-flex justify-content-between align-items-start">
                                        <span class="badge bg-light-primary"><?= $plan->name;?></span>
                                        <div class="d-flex justify-content-center">
                                            <sup class="h5 pricing-currency text-primary mt-1 mb-0">$</sup>
                                             <?php $this->db->select('*');
                                                $this->db->from('tbl_cancel_boking_sch');
                                                $this->db->where('sch_cust_id',$plan->sl_cust_id);
                                                $amount = $this->db->get()->result();
                                                ?>
                                            <span class="fw-bolder display-5 mb-0 text-primary"> 
                                                <?php if(isset($amount[0])){?>
                                                    <?=  $amount[0]->amount;?>
                                                        <?php } else{?>
                                                        0

                                                        <?php } ?></span>
                                            <sub class="pricing-duration font-small-4 ms-25 mt-auto mb-2"></sub>
                                        </div>
                                    </div>
                                    <ul class="ps-1 mb-2">
                                        <li class="mb-50"><?php if($plan->cancel_policy == 2){
                                                    echo "Unlimited";
                                                }else{
                                                    echo $plan->no_session;
                                                    echo "&nbsp";
                                                    echo "Classes";

                                                }?></li>
                                        <li class="mb-50"><?= $plan->validty_days;?> Days Validity</li>
                                        <li>Expairy : <?php
                                                            $date1=$plan->validty_days;
                                                            $date2=$plan->created_at;
                                                            echo date('Y-m-d', strtotime($date2. ' +'.$date1.' days'));
                                                            ?></li>
                                    </ul>
                                    
                                   
                                    
                                    <div class="d-grid w-100 mt-2">
                                        <?php if(isset($amount[0])){
                                            if($amount[0]->amount > 0){?>
                                                     <button class="btn btn-primary" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">
                                            Take Payment
                                        </button>
                                                        
                                        <?php }  }?>
                                       
                                    </div>


                                    <div class="modal fade" id="upgradePlanModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-upgrade-plan">
                                            <div class="modal-content">
                                                <div class="modal-header bg-transparent">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body px-5 pb-2">
                                                    <div class="text-center mb-2">
                                                        <h1 class="mb-1">Payment</h1>
                                                       
                                                    </div>
                                                    <form id=""class="row pt-50" action="<?php echo base_url('Customers/take_payment');?>" method="POST">
                                                        <div class="col-sm-8">
                                                            <label class="form-label" for="choosePlan">Plan :<?= $plan->name;?> </label>
                                                            
                                                        </div>
                                                        <input type="hidden" name="cust_id" value="<?=$plan->sl_cust_id;?>" class="form-control">
                                                        <div class="col-sm-8">
                                                            <label class="form-label" for="choosePlan">Amount</label>
                                                            <input type="text" name="amount" value="<?= $amount[0]->amount;?>" class="form-control">
                                                            
                                                        </div>
                                                        <button type="submit" class="btn btn-primary" >Submit</button>

                                                       
                                                    </form>
                                                </div>
                                                <hr />
                                                
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }?>
                                </div>
                            </div>
                            <!-- /Plan Card -->
                        </div>
                        <!--/ User Sidebar -->

                        <!-- User Content -->
                        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                            

                            <!-- Invoice table -->
                            <div class="card">
                                 <h4 class="card-header">All Invoices</h4>
                                <table class="invoice-table table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>#Invoice</th>
                                            <th>TOTAL Cost</th>
                                            <th>TOTAL Paid</th>
                                            <th>TOTAL Due</th>
                                            <th class="text-truncate">Issued Date</th>
                                            <!-- <th class="cell-fit">Actions</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($customer_inv_det as $invoice){?>
                                        <tr>
                                            <td></td>
                                            <td><a href="<?= base_url('sales/invoice_preview/');?><?= $invoice->sale_id ;?>">#<?= $invoice->invoice_no;?></a></td>
                                            <td><?= $invoice->sale_total_price;?></td>
                                            <td><?= $invoice->received_amount;?></td>
                                            <td><?= $invoice->due_amt;?></td>
                                            <td><?= $invoice->created_at;?></td>
                                            
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="card">
                                 <h4 class="card-header">Wallet History</h4>
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
                                        $this->db->where('custmr_id',$customer_details[0]->cust_id);
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

                            <!-- /Invoice table -->
                        </div>
                        <!--/ User Content -->
                    </div>
                </section>
                <!-- upgrade your plan Modal -->
               
                <!--/ upgrade your plan Modal -->

            </div>
        </div>
    </div>