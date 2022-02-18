<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">

        <div class="content-body">
            <div class="row">
                <div class="col-12">


                    <!-- profile -->
                    <div class="card">
                        <div class="card-header border-bottom">
                           <?php if(in_array('createBranch', $user_permission)): ?>

                              <a href="<?php echo base_url('branch/index');?>"><button type="button" class="btn btn-primary" data-bs-toggle=""
                                data-bs-target="">View Branch</button></a>
                            <br /> <br />
                            <?php endif; ?>
                        </div>
                        <div class="card-body py-2 my-25">
                            <!-- header section -->

                            <!--/ header section -->
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
                            
                                    <div class="col-md-12 col-xs-12">

                                        <div id="messages"></div>

                                        <?php if($this->session->flashdata('success')): ?>
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <?php echo $this->session->flashdata('success'); ?>
                                        </div>
                                        <?php elseif($this->session->flashdata('error')): ?>
                                        <div class="alert alert-error alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <?php echo $this->session->flashdata('error'); ?>
                                        </div>
                                        <?php endif; ?>

                                        

                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">Add Branchs</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                 <form role="form" action="<?php echo base_url('branch/create') ?>" method="post">
                                                    <div class="form-group">
                                                        <label for="edit_brand_name">Branch Name</label>
                                                        <input type="text" class="form-control" id="branch_name" name="branch_name"
                                                            placeholder="Enter brand name" autocomplete="off" required="">
                                                    </div>
                                                     <div class="form-group mt-2">
                                                        <label for="edit_brand_name">Branch Address</label>
                                                        <input type="text" class="form-control" id="branch_address" name="branch_address"
                                                            placeholder="Enter Branch Address" autocomplete="off" required="">
                                                    </div>
                                                     <div class="form-group mt-2">
                                                        <label for="edit_brand_name">Branch Phone</label>
                                                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" minlength="10" maxlength="10" id="branch_phone" name="branch_phone"
                                                            placeholder="Enter Branch Phone" autocomplete="off" required="">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="edit_active">Status</label>
                                                        <select class="form-control" id="active" name="active">
                                                            <option value="1">Active</option>
                                                            <option value="2">Inactive</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                                                    <a href="<?= base_url('branch/index');?>"><button type="button" class="btn btn-danger mt-3">Back</button></a>
                                                </form>
                                           
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                    <!-- col-md-12 -->
                                
                            


                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $("#AccountMainMenu").addClass('sidebar-group-active open');
    $("#RolesBranch").addClass('active');

});
</script>