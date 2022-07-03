<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-12 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                   <!-- header section -->
                   <?php if($this->session->flashdata('success')): ?>
                            <div class="demo-spacing-0">
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <div class="alert-body d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-info me-50">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" y1="16" x2="12" y2="12"></line>
                                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                        </svg>
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>

                            <?php elseif($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                <div class="alert-body d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-info me-50">
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
            </div>

        </div>
        <?php //echo "<pre>"; print_r($site_data);?>
        <div class="content-body">
            <!-- Basic Horizontal form layout section start -->
            
            <!-- Basic Horizontal form layout section end -->

             <section id="basic-horizontal-layouts">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Coupon List</h4>
                            </div>
                            <div class="container">
                                <a href="<?= base_url('siteSetting/coupon_add');?>"><button type="button" class="btn btn-primary">Add</button></a>
                            </div>
                            
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-nowrap text-center">
                                        <thead>
                                            <tr>
                                                <th>S.l No.</th>
                                                <th>Title</th>
                                                <th>Code</th>
                                                <th>Used For</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(isset($coupon_data[0])){
                                                $i=0;
                                                foreach($coupon_data as $data){
                                                    $i++;?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?= $data->coup_title;?></td>
                                                    <td><?= $data->coup_code;?></td>
                                                    <td><?= $data->coup_for;?></td>
                                                    <td><?php if($data->coup_type=="rate"){echo "Rate";}else{echo "Percentage";};?></td>
                                                    <td><?= $data->coup_amnt;?></td>
                                                    <td><?= $data->coup_start_time;?></td>
                                                    <td><?= $data->coup_end_time;?></td>
                                                    <td><?php if($data->is_active == 1){?>
                                                        <span class="badge bg-light-success">Active</span>
                                                     <?php }else{?>
                                                        <span class="badge bg-light-danger">InActive</span>
                                                     <?php } ?></td>
                                                    
                                                    <td>
                                                        <a href="<?= base_url('siteSetting/coupon_edit/');?><?= $data->coup_id;?>"
                                                            class="btn btn-default" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                data-feather="edit"></i></a>

                                                    </td>
                                                </tr>

                                                <?php } }?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    

                    
                </div>
            </section>
            <!-- Basic Horizontal form layout section start -->
           
            <!-- Basic Horizontal form layout section end -->

            

        </div>
    </div>
</div>
<!-- END: Content-->
<script type="text/javascript">
$(document).ready(function() {
    // $("#RolesExpense").addClass('sidebar-group-active open');
    $("#couponlist").addClass('active');

});
</script>