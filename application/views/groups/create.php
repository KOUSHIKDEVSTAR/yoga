<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">

        <div class="content-body">
            <div class="row">
                <div class="col-12">
                <ul class="nav nav-pills mb-2">
                        <!-- account -->
                        <?php if(in_array('updateProfile', $user_permission )): ?>
                        <li class="nav-item">
                            <a class="nav-link " href="<?php echo base_url('users/setting/') ?>">
                                <i data-feather="user" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Account</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(in_array('updateSetting', $user_permission)): ?>
                        <!-- security -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('siteSetting') ?>">
                                <i data-feather="lock" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Site Settings</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(in_array('createGroup', $user_permission) || in_array('viewGroup', $user_permission)): ?>
                        <!-- billing and plans -->
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo base_url('groups') ?>">
                                <i data-feather="bookmark" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Roles</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(in_array('createUser', $user_permission) || in_array('viewUser', $user_permission)): ?>
                        <!-- billing and plans -->
                        <li class="nav-item ">
                            <a class="nav-link " href="<?php echo base_url('staff') ?>">
                                <i data-feather="users" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Staff</span>
                            </a>
                        </li>
                        <?php endif; ?>

                    </ul>

                    <!-- profile -->
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Add Roles</h4>
                        </div>
                        <div class="card-body py-2 my-25">
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



                            <!-- Row grouping -->
                            <form role="form" action="<?php base_url('groups/create') ?>" method="post">
                                <div class="box-body">

                                    <?php echo validation_errors(); ?>

                                    <div class="form-group">
                                        <label for="group_name">Group Name</label>
                                        <input type="text" class="form-control" id="group_name" name="group_name"
                                            placeholder="Enter group name">
                                    </div>
                                    <div class="form-group">
                                        <label for="permission">Permission</label>

                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Create</th>
                                                    <th>Update</th>
                                                    <th>View</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Users</td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="createUser" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="updateUser" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="viewUser" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="deleteUser" class="minimal"></td>
                                                </tr>
                                                <tr>
                                                    <td>Groups</td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="createGroup" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="updateGroup" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="viewGroup" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="deleteGroup" class="minimal"></td>
                                                </tr>
                                                 <tr>
                                                    <td>Branchs</td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="createBranch" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="updateBranch" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="viewBranch" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="deleteBranch" class="minimal"></td>
                                                </tr>
                                                <!--<tr>
                                                    <td>Category</td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="createCategory" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="updateCategory" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="viewCategory" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="deleteCategory" class="minimal"></td>
                                                </tr>
                                                <tr>
                                                    <td>Stores</td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="createStore" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="updateStore" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="viewStore" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="deleteStore" class="minimal"></td>
                                                </tr>
                                                <tr>
                                                    <td>Attributes</td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="createAttribute" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="updateAttribute" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="viewAttribute" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="deleteAttribute" class="minimal"></td>
                                                </tr>
                                                <tr>
                                                    <td>Products</td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="createProduct" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="updateProduct" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="viewProduct" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="deleteProduct" class="minimal"></td>
                                                </tr>
                                                <tr>
                                                    <td>Orders</td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="createOrder" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="updateOrder" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="viewOrder" class="minimal"></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="deleteOrder" class="minimal"></td>
                                                </tr>
                                                <tr>
                                                    <td>Reports</td>
                                                    <td> - </td>
                                                    <td> - </td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="viewReports" class="minimal"></td>
                                                    <td> - </td>
                                                </tr> -->
                                                <tr>
                                                    <td>Company</td>
                                                    <td> - </td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="updateCompany" class="minimal"></td>
                                                    <td> - </td>
                                                    <td> - </td>
                                                </tr>
                                                <tr>
                                                    <td>Profile</td>
                                                    <td> - </td>
                                                    <td> <input type="checkbox" name="permission[]" id="permission"
                                                            value="updateProfile" class="minimal"> </td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="viewProfile" class="minimal"></td>
                                                    <td> - </td>
                                                </tr>
                                                <tr>
                                                    <td>Setting</td>
                                                    <td>-</td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            value="updateSetting" class="minimal"></td>
                                                    <td> - </td>
                                                    <td> - </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                    <a href="<?php echo base_url('groups/') ?>" class="btn btn-warning">Back</a>
                                </div>
                            </form>
                            <!--/ Row grouping -->
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
    $('input[type="checkbox"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
});
</script>