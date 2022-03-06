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
                            <h4 class="card-title">Edit Roles</h4>
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

                            <?php if(in_array('createGroup', $user_permission)): ?>
                            <a href="<?php echo base_url('groups/create') ?>" class="btn btn-primary">Add Group</a>
                            <br /> <br />
                            <?php endif; ?>

                            <!-- Row grouping -->
                            <form role="form" action="<?php base_url('groups/update') ?>" method="post">
                                <div class="box-body">

                                    <?php echo validation_errors(); ?>

                                    <div class="form-group">
                                        <label for="group_name">Group Name</label>
                                        <input type="text" class="form-control" id="group_name" name="group_name"
                                            placeholder="Enter group name"
                                            value="<?php echo $group_data['group_name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="permission">Permission</label>

                                        <?php $serialize_permission = unserialize($group_data['permission']); ?>

                                        <div class="box-body card-datatable table-responsive pt-0">
                                        <table id=" groupTable" class="user-list-table table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Create</th>
                                                    <th>Update</th>
                                                    <th>View</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Users</td>
                                                    <td><input type="checkbox" class="minimal" name="permission[]"
                                                            id="permission" class="minimal" value="createUser" <?php if($serialize_permission) {
                                                                    if(in_array('createUser', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="updateUser" <?php 
                                                                  if($serialize_permission) {
                                                                        if(in_array('updateUser', $serialize_permission)) { echo "checked"; } 
                                                                          } ?>></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="viewUser" <?php 
                                                                  if($serialize_permission) {
                                                                        if(in_array('viewUser', $serialize_permission)) { echo "checked"; }   
                                                                          } ?>></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="deleteUser" <?php 
                                                                  if($serialize_permission) {
                                                                        if(in_array('deleteUser', $serialize_permission)) { echo "checked"; }  
                                                                          } ?>></td>
                                                </tr>
                                                <tr>
                                                    <td>Groups</td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="createGroup" <?php 
                                                                  if($serialize_permission) {
                                                                        if(in_array('createGroup', $serialize_permission)) { echo "checked"; }  
                                                                          } ?>></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="updateGroup" <?php 
                                                                  if($serialize_permission) {
                                                                        if(in_array('updateGroup', $serialize_permission)) { echo "checked"; }  
                                                                          } ?>></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="viewGroup" <?php 
                                                                  if($serialize_permission) {
                                                                        if(in_array('viewGroup', $serialize_permission)) { echo "checked"; }  
                                                                          } ?>></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="deleteGroup" <?php 
                                                                  if($serialize_permission) {
                                                                        if(in_array('deleteGroup', $serialize_permission)) { echo "checked"; }  
                                                                          } ?>></td>
                                                </tr>
                                                <tr>
                                                    <td>Branchs</td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="createBranch" <?php if($serialize_permission) {
                                                                    if(in_array('createBranch', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="updateBranch" <?php if($serialize_permission) {
                                                                    if(in_array('updateBranch', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="viewBranch" <?php if($serialize_permission) {
                                                                    if(in_array('viewBranch', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="deleteBranch" <?php if($serialize_permission) {
                                                                    if(in_array('deleteBranch', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                </tr>
                                                <tr>
                                                    <td>Financial Expense</td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="createFinancial" <?php if($serialize_permission) {
                                                                    if(in_array('createFinancial', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="updateFinancial" <?php if($serialize_permission) {
                                                                    if(in_array('updateFinancial', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="viewFinancial" <?php if($serialize_permission) {
                                                                    if(in_array('viewFinancial', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="deleteFinancial" <?php if($serialize_permission) {
                                                                    if(in_array('deleteFinancial', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                </tr>
                                                <tr>
                                                            <td>Products</td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="createProduct" <?php if($serialize_permission) {
                                                                    if(in_array('createProduct', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="updateProduct" <?php if($serialize_permission) {
                                                                    if(in_array('updateProduct', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="viewProduct" <?php if($serialize_permission) {
                                                                    if(in_array('viewProduct', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="deleteProduct" <?php if($serialize_permission) {
                                                                    if(in_array('deleteProduct', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Customer</td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="createCustomer" <?php if($serialize_permission) {
                                                                  if(in_array('createCustomer', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="updateCustomer" <?php if($serialize_permission) {
                                                                    if(in_array('updateCustomer', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="viewCustomer" <?php if($serialize_permission) {
                                                                    if(in_array('viewCustomer', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="deleteCustomer" <?php if($serialize_permission) {
                                                                    if(in_array('deleteCustomer', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                        </tr>
                                                <!--
                                                        
                                                        <tr>
                                                            <td>Attributes</td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="createAttribute" <?php if($serialize_permission) {
                                                                    if(in_array('createAttribute', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="updateAttribute" <?php if($serialize_permission) {
                                                                    if(in_array('updateAttribute', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="viewAttribute" <?php if($serialize_permission) {
                                                                    if(in_array('viewAttribute', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="deleteAttribute" <?php if($serialize_permission) {
                                                                    if(in_array('deleteAttribute', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>Orders</td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="createOrder" <?php if($serialize_permission) {
                                                                    if(in_array('createOrder', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="updateOrder" <?php if($serialize_permission) {
                                                                    if(in_array('updateOrder', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="viewOrder" <?php if($serialize_permission) {
                                                                    if(in_array('viewOrder', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="deleteOrder" <?php if($serialize_permission) {
                                                                    if(in_array('deleteOrder', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Reports</td>
                                                            <td> - </td>
                                                            <td> - </td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="viewReports" <?php if($serialize_permission) {
                                                                    if(in_array('viewReports', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                            <td> - </td>
                                                        </tr> -->
                                                <tr>
                                                            <td>Company</td>
                                                            <td> - </td>
                                                            <td><input type="checkbox" name="permission[]" id="permission"
                                                                    class="minimal" value="updateCompany" <?php if($serialize_permission) {
                                                                    if(in_array('updateCompany', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                            <td> - </td>
                                                            <td> - </td>
                                                        </tr>
                                                <tr>
                                                    <td>Profile</td>
                                                    <td> - </td>
                                                    <td> <input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="updateProfile" <?php if($serialize_permission) {
                                                                    if(in_array('updateProfile', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>> </td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="viewProfile" <?php if($serialize_permission) {
                                                                    if(in_array('viewProfile', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                    <td> - </td>
                                                </tr>
                                                <tr>
                                                    <td>Setting</td>
                                                    <td>-</td>
                                                    <td><input type="checkbox" name="permission[]" id="permission"
                                                            class="minimal" value="updateSetting" <?php if($serialize_permission) {
                                                                    if(in_array('updateSetting', $serialize_permission)) { echo "checked"; } 
                                                                      } ?>></td>
                                                    <td> - </td>
                                                    <td> - </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update Changes</button>
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
<script type="text/javascript">
$(document).ready(function() {
    $("#AccountMainMenu").addClass('sidebar-group-active open');
    $("#RolesMenu").addClass('active');

});
</script>