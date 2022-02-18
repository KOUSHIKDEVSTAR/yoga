<!-- BEGIN: Content-->
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
                            <h4 class="card-title">Profile Details</h4>
                        </div>
                        <div class="card-body py-2 my-25">
                            <!-- header section -->

                            

                            <div class="col-md-12 col-xs-12">

                                

                                <?php if(in_array('createBranch', $user_permission)): ?>

                                <a href="<?php echo base_url('branch/add');?>"><button type="button"
                                        class="btn btn-primary" data-bs-toggle="" data-bs-target="">Add
                                        Branch</button></a>
                                <br /> <br />
                                <?php endif; ?>
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
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Manage Branchs</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body card-datatable table-responsive pt-0">
                                        <table id="branchTable" class="user-list-table table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Branch Name</th>
                                                    <th>Branch Address</th>
                                                    <th>Branch Phone</th>
                                                    
                                                    <th>Status</th>
                                                    <?php if(in_array('updateBranch', $user_permission) || in_array('deleteBranch', $user_permission)): ?>
                                                    <th>Action</th>
                                                    <?php endif; ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($groups_data): ?>
                                                <?php foreach ($groups_data as $k => $v): ?>
                                                <tr>
                                                    <td><?php echo $v['name']; ?></td>
                                                    <td><?php echo $v['branch_address']; ?></td>
                                                    <td><?php echo $v['branch_phone']; ?></td>
                                                    <td><?php if($v['active'] == 1){
                                                        echo "Active";

                                                    }else{
                                                        echo "Inactive";
                                                    } ?></td>

                                                    <?php if(in_array('updateBranch', $user_permission) || in_array('deleteBranch', $user_permission)): ?>
                                                    <td>
                                                        <?php if(in_array('updateBranch', $user_permission)): ?>
                                                        <a href="<?php echo base_url('branch/edit/'.$v['id']) ?>"
                                                            class="btn btn-default" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                data-feather="edit"></i></a>
                                                        <?php endif; ?>
                                                        <?php if(in_array('deleteBranch', $user_permission)): ?>
                                                        <a href="<?php echo base_url('branch/remove/'.$v['id']) ?>"
                                                            class="btn btn-default" data-toggle="tooltip"
                                                            data-placement="top" title="Delete"><i
                                                                data-feather="delete"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                    <?php endif; ?>
                                                </tr>
                                                <?php endforeach ?>
                                                <?php endif; ?>
                                            </tbody>

                                        </table>
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
<!-- END: Content-->



<script type="text/javascript">
$(document).ready(function() {
    // $('#branchTable').DataTable();
    $("#RolesBranch").addClass('active');
});
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>