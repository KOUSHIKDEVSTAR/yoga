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
                                <h4 class="card-title">Financial Expense</h4>
                            </div>
                            <div class="container">
                                <a href="<?= base_url('siteSetting/financial_expense_add');?>"><button type="button" class="btn btn-primary">Add</button></a>
                            </div>
                            
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-nowrap text-center">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($financial_data as $data){?>
                                                <tr>
                                                <td><?= $data->type;?></td>
                                                <td><?= $data->name;?></td>
                                            </tr>

                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tax Info</h4>
                            </div>
                             <div class="container">
                                <a href="<?= base_url('siteSetting/tax_info_add');?>"><button type="button" class="btn btn-primary">Add</button></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-nowrap text-center">
                                        <thead>
                                            <tr>
                                                <th>Template Name</th>
                                                <th>Tax Name</th>
                                                <th>Percentage(%)</th>
                                                <th>Applicable On</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($tax_info as $data){?>
                                                <tr>
                                                <td><?= $data->template_name;?></td>
                                                <td><?= $data->tax_name;?></td>
                                                <td><?= $data->percentage;?></td>
                                                <td><?= $data->name;?></td>
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
            <!-- Basic Horizontal form layout section start -->
           
            <!-- Basic Horizontal form layout section end -->

            

        </div>
    </div>
</div>
<!-- END: Content-->
<script type="text/javascript">
$(document).ready(function() {
    // $("#RolesExpense").addClass('sidebar-group-active open');
    $("#RolesExpense").addClass('active');

});
</script>