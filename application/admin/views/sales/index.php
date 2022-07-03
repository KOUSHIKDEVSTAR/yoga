 <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="invoice-list-wrapper">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <h2 class="fw-bolder mb-0">Rs : <?=$total_sell_cost;?></h2>
                                        <p class="card-text">Sales - Monthly</p>
                                    </div>
                                    <div class="avatar bg-light-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i data-feather="cpu" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <h2 class="fw-bolder mb-0"><?= $all_customer_count[0]->all_count;?></h2>
                                        <p class="card-text">New Customer</p>
                                    </div>
                                    <div class="avatar bg-light-success p-50 m-0">
                                        <div class="avatar-content">
                                            <i data-feather="server" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <h2 class="fw-bolder mb-0">Rs : <?=$total_duecost;?></h2>
                                        <p class="card-text">Not Received</p>
                                    </div>
                                    <div class="avatar bg-light-danger p-50 m-0">
                                        <div class="avatar-content">
                                            <i data-feather="activity" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <h2 class="fw-bolder mb-0"><?= round($mom);?>%</h2>
                                        <p class="card-text">Growth - MOM</p>
                                    </div>
                                    <div class="avatar bg-light-warning p-50 m-0">
                                        <div class="avatar-content">
                                            <i data-feather="alert-octagon" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body"> 
                                 <h4 class="card-title">Sales Details</h4>
                                  <div class="row">
                                     <div class="col-md-12">
                                    
                                         <a href="<?php echo base_url('sales/add');?>"><button type="button"
                                                 class="btn btn-primary" data-bs-toggle="" data-bs-target="">Add
                                                 Sale</button>
                                         </a>
                                        
                                         <?php if($this->session->flashdata('success')): ?>
                                         <div class="demo-spacing-0">
                                             <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                 <div class="alert-body">
                                                     <?php echo $this->session->flashdata('success'); ?>
                                                 </div>
                                                 <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                     aria-label="Close"></button>
                                             </div>
                                         </div>

                                         <?php elseif($this->session->flashdata('error')): ?>
                                         <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                             <div class="alert-body d-flex align-items-center">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-info me-50">
                                                     <circle cx="12" cy="12" r="10"></circle>
                                                     <line x1="12" y1="16" x2="12" y2="12"></line>
                                                     <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                                 </svg>
                                                 <span>The value is <strong>
                                                         <?php echo $this->session->flashdata('error'); ?></strong>.
                                             </div>
                                             <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                 aria-label="Close"></button>
                                         </div>

                                         <?php endif; ?>
                                     </div>
                                 </div>
                                 <div class="card-datatable table-responsive pt-0">
                                    <table class="user-list-table table">
                                        <thead>
                                            <tr>
                                                <th>SL No.</th>
                                                <th>Invoice</th>
                                                <th><i data-feather="trending-up"></i></th>
                                                <th>Customer</th>
                                                <th>Total</th>
                                                <th class="text-truncate">Issued Date</th>
                                                <th>Balance</th>
                                          
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($sales_details as $sales){?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><a href="<?= base_url('sales/invoice_preview/');?><?= $sales->sale_id;?>">#<?= $sales->invoice_no;?></a></td>
                                                    <td></td>
                                                    <td><img src="<?= base_url('uploads/customer_details/');?><?= $sales->pr_image;?>" height="32" width="32" style="border-radius: 50%;"><h6 class="user-name text-truncate mb-0"><?= $sales->full_name;?></h6>
                                                        <small class="text-truncate text-muted"><?= $sales->email;?></small></td>
                                                    <td><?= $sales->sale_total_price;?></td>
                                                    <td><?= $sales->created_at;?></td>
                                                
                                                    <td><?php if($sales->due_amt == 0){?>
                                                        
                                                        <span class="badge rounded-pill badge-light-success" text-capitalized=""> Paid </span>
                                                    <?php }else{ 
                                                       echo  $sales->due_amt;
                                                        
                                                    }
                                                   ;?></td>
                                                    

                                                </tr>

                                            <?php $i++; } ?>
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

<script type="text/javascript">
$(document).ready(function() {  
    $("#saleslist").addClass('active');
});
</script>