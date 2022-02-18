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
                            <h4 class="card-title">Manage Roles</h4>
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
                            <section id="row-grouping-datatable">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="box-body card-datatable table-responsive pt-0"">
                                        <table id=" branchTable" class="user-list-table table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Group Name</th>
                                                        <?php if(in_array('updateGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                                                        <th>Action</th>
                                                        <?php endif; ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($groups_data): ?>
                                                    <?php foreach ($groups_data as $k => $v): ?>
                                                    <tr>
                                                        <td><?php echo $v['group_name']; ?></td>

                                                        <?php if(in_array('updateGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                                                        <td>
                                                            <?php if(in_array('updateGroup', $user_permission)): ?>
                                                            <a href="<?php echo base_url('groups/edit/'.$v['id']) ?>"
                                                                class="btn btn-default"><i data-feather="edit"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(in_array('deleteGroup', $user_permission)): ?>
                                                            <!-- <a href="<?php echo base_url('groups/delete/'.$v['id']) ?>"
                                                                class="btn btn-default"><i
                                                                    data-feather="delete"></i></a> -->
                                                            <?php endif; ?>
                                                        </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                    <?php endforeach ?>
                                                    <?php endif; ?>
                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
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
    // $('.table').DataTable();
    $("#AccountMainMenu").addClass('sidebar-group-active open');
    $("#RolesMenu").addClass('active');

});
</script>