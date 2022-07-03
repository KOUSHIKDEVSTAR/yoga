 <div class="app-content content profile-page-content">

     <div class="content-wrapper container-xxl p-0">
         <div class="content-header row">
             <div class="content-header-left col-md-9 col-12 mb-2">
                 <div class="row breadcrumbs-top">
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
                                 <a class="nav-link " href="<?php echo base_url('groups') ?>">
                                     <i data-feather="bookmark" class="font-medium-3 me-50"></i>
                                     <span class="fw-bold">Roles</span>
                                 </a>
                             </li>
                             <?php endif; ?>
                             <?php if(in_array('createUser', $user_permission) || in_array('viewUser', $user_permission)): ?>
                             <!-- billing and plans -->
                             <li class="nav-item ">
                                 <a class="nav-link active" href="<?php echo base_url('staff') ?>">
                                     <i data-feather="users" class="font-medium-3 me-50"></i>
                                     <span class="fw-bold">Staff</span>
                                 </a>
                             </li>
                             <?php endif; ?>

                         </ul>
                     </div>
                 </div>
             </div>

         </div>
         <div class="content-body">
             <!-- users list start -->
             <section id="row-grouping-datatable">
                 <div class="row">
                     <div class="col-12">
                         <div class="card">
                             <div class="card-body border-bottom">
                                 <h4 class="card-title">Staff Details
                                 <a href="<?php echo base_url('staff/add');?>"><button type="button"
                                                 class="btn btn-primary" data-bs-toggle="" data-bs-target="">Add
                                                 Staff</button>
                                         </a>
                                 </h4>

                                 <div class="row">
                                     <div class="col-md-12">

                                         

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
                                         <thead class="table-light">
                                             <tr>
                                                 <th>#</th>
                                                 <!-- <th>Profile Image</th> -->
                                                 <!-- <th>Name</th> -->
                                                 <th>Staff</th>
                                                 <th>Mobile</th>
                                                 <th>Employeement Type</th>
                                                 <th>Status</th>
                                                 <th>Actions</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php 
                                    if(isset($staff_data)){
                                        $i=0;
                                        foreach($staff_data as $staff){
                                            $i++;
                                            ?>
                                             <tr>
                                                 <td><?= $i;?></td>
                                                 <!-- <td><img class="img-fluid"
                                                         src="<?php echo  base_url('uploads/profile_image/');?><?=$staff->profile_img;?>"
                                                         style="width: 100px;height: 80px;"></td>
                                                 <td><?= $staff->firstname;?> <?= $staff->lastname;?></td> -->
                                                 <td>
                                                 <div class="d-flex justify-content-left align-items-center">
                                                         <div class="avatar-wrapper">
                                                             <div class="avatar me-50"><img
                                                                     src="<?php echo  base_url('uploads/profile_image/');?><?=$staff->profile_img;?>"
                                                                     alt="Avatar" width="32" height="32"></div>
                                                         </div>
                                                         <div class="d-flex flex-column">
                                                             <h6 class="user-name text-truncate mb-0"><?= $staff->firstname;?> <?= $staff->lastname;?></h6>
                                                             <small
                                                                 class="text-truncate text-muted"><?= $staff->email;?></small>
                                                         </div>
                                                     </div
                                                     </td>
                                                 <td><?= $staff->phone;?></td>
                                                 <td><?= $staff->emp_ment_typ;?></td>
                                                 <?php  if($staff->is_active == 1){?>
                                                 <td>
                                                     <span data-v-32017d0f=""
                                                         class="badge text-capitalize badge-light-success badge-pill">
                                                         active
                                                     </span>
                                                 </td>
                                                 <?php }else{?>
                                                 <td>
                                                     <span data-v-32017d0f=""
                                                         class="badge text-capitalize badge-light-secondary badge-pill">
                                                         inactive
                                                     </span>
                                                 </td>
                                                 <?php } ?>

                                                 <td>
                                                 <?php if(in_array('updateUser', $user_permission)): ?>
                                                     <a href="<?php echo base_url('staff/edit/');?><?= $staff->id;?>"><i
                                                             data-toggle="tooltip" data-placement="top" title="Edit"
                                                             data-feather="edit"></i></a>
                                                             <?php endif; ?>
                                                     <?php if(in_array('viewUser', $user_permission)): ?>
                                                     <a href="<?php echo base_url('staff/view/');?><?= $staff->id;?>"><i
                                                             data-toggle="tooltip" data-placement="top" title="Edit"
                                                             data-feather="eye"></i></a>
                                                             <?php endif; ?>
                                                            </td>


                                             </tr>
                                             <?php } } ?>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                             <!-- Modal to add new user starts-->

                             <!-- Modal to add new user Ends-->
                         </div>
                     </div>
                 </div>
         </div>
         <!-- list and filter end -->
         </section>
         <!-- users list ends -->

     </div>
 </div>
 </div>
 <script type="text/javascript">
$(document).ready(function() {
    $("#AccountMainMenu").addClass('sidebar-group-active open');
    $("#RolesStaff").addClass('active');

});
 </script>