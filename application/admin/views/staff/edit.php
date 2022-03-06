 <div class="app-content content ">

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
             <section class="app-user-list">

                 <!-- list and filter start -->
                 <div class="card">
                     <div class="card-body border-bottom">
                         <div class="row">
                             <div class="col-md-12">

                                 <a href="<?php echo base_url('staff');?>"><button type="button" class="btn btn-primary"
                                         data-bs-toggle="" data-bs-target="">View
                                         Staff</button>
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
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
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
                     </div>
                     <div class="card">
                         <div class="card-header border-bottom">
                             <h4 class="card-title">Profile Details</h4>
                         </div>
                         <div class="card-body py-2 my-25">
                             <!-- header section -->
                             <div class="d-flex">
                                 <a href="#" class="me-25">
                                     <img src="<?php echo base_url('uploads/profile_image/');?><?= $user_data[0]->profile_img;?>"
                                         id="account-upload-img" class="uploadedAvatar rounded me-50"
                                         alt="profile image" height="100" width="100" />
                                 </a>
                                 <!-- upload and reset button -->
                                 <div class="d-flex align-items-end mt-75 ms-1">
                                     <div>
                                         <label for="account-upload"
                                             class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                         <form class="form form-horizontal" method="POST"
                                             action="<?= base_url('staff/profile_img_update/');?><?= $user_data[0]->id;?>"
                                             enctype="multipart/form-data">
                                             <input type="file" id="account-upload" name="image" hidden
                                                 accept="image/*" />
                                             <button type="submit" id="account-reset"
                                                 class="btn btn-sm btn-outline-secondary mb-75">Submit</button>
                                         </form>
                                         <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                                     </div>
                                 </div>
                                 <!--/ upload and reset button -->
                             </div>
                             <!--/ header section -->

                             <!-- form -->
                             <form class="form" method="POST" action="<?= base_url('staff/update');?>"
                                 enctype="multipart/form-data">
                                 <input type="hidden" name="id" value="<?= $user_data[0]->id;?>">
                                 <div class="row">
                                     <div class="col-md-6 col-12">
                                         <div class="mb-1">
                                             <label class="form-label" for="first-name-column">Groups</label>
                                             <select class="form-select form-select-lg" name="groups" id="selectLarge">
                                                 <option selected>Choose One</option>
                                                 <?php foreach($group_data as $groups){?>
                                                 <option value="<?= $groups->id;?>"><?= $groups->group_name;?></option>

                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-md-6 col-12">
                                         <div class="mb-1">
                                             <label class="form-label" for="country-floating">Employeement Type</label>
                                             <select class="form-select form-select-lg" name="employement_type"
                                                 id="selectLarge">
                                                 <option selected>Choose One</option>
                                                 <option value="Contractual"
                                                     <?php if($user_data[0]->emp_ment_typ =="Contractual"){echo "selected" ;}?>>
                                                     Contractual</option>
                                                 <option value="Permanent"
                                                     <?php if($user_data[0]->emp_ment_typ =="Permanent"){echo "selected" ;}?>>
                                                     Permanent</option>
                                                 <option value="Visiting"
                                                     <?php if($user_data[0]->emp_ment_typ =="Visiting"){echo "selected" ;}?>>
                                                     Visiting</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-md-6 col-12">
                                         <div class="mb-1">
                                             <label class="form-label" for="first-name-column">First Name</label>
                                             <input type="text" id="first_name" name="first_name" class="form-control"
                                                 value="<?=$user_data[0]->firstname;?> " placeholder="First Name" />
                                         </div>
                                     </div>
                                     <div class="col-md-6 col-12">
                                         <div class="mb-1">
                                             <label class="form-label" for="first-name-column">Last Name</label>
                                             <input type="text" id="last_name" value="<?=$user_data[0]->lastname;?>"
                                                 name="last_name" class="form-control" placeholder="Last Name" />
                                         </div>
                                     </div>
                                     <div class="col-md-6 col-12">
                                         <div class="mb-1">
                                             <label class="form-label" for="email-id-column">Email</label>
                                             <input type="email" id="email-id-column" class="form-control"
                                                 value="<?=$user_data[0]->email;?>" name="email" placeholder="Email" />
                                         </div>
                                     </div>
                                     <div class="col-md-6 col-12">
                                         <div class="mb-1">
                                             <label class="form-label" for="city-column">Contact Number</label>
                                             <input type="text" id="city-column" class="form-control"
                                                 placeholder="Contact Number" value="<?=$user_data[0]->phone;?>"
                                                 name="contact_number" />
                                         </div>
                                     </div>

                                     <div class="col-md-6 col-12">
                                         <div class="mb-1">
                                             <label class="form-label" for="company-column">Attach Employee Docs</label>
                                             <input type="file" id="company-column" class="form-control"
                                                 name="employe_docs" placeholder="Company" />
                                         </div>
                                     </div>
                                     <div class="col-md-6 col-12">
                                         <div class="mb-1">
                                             <label class="form-label" for="email-id-column">Download / View
                                                 Documents</label><br>
                                             <?php if(isset($user_data[0]->emp_docs)){?>
                                             <a href="<?=base_url('uploads/emp_docs/');?><?= $user_data[0]->emp_docs;?>"
                                                 target="_blank" download><i data-feather="download-cloud"></i> Download</a>
                                             <input type="hidden" name="old_docs" value="<?=$user_data[0]->emp_docs;?>">

                                             <?php }else{ ?>
                                             No Preview

                                             <?php  } ?>

                                         </div>
                                     </div>
                                     <div class="col-md-6 col-12">
                                         <div class="mb-1">
                                             <label class="form-label" for="email-id-column">ID Docs Name</label>
                                             <input type="text" id="email-id-column" class="form-control"
                                                 name="id_docs_name" value="<?=$user_data[0]->id_docs_name;?>"
                                                 placeholder="ID Docs Name" />
                                         </div>
                                     </div>
                                     <div class="col-md-6 col-12">
                                         <div class="mb-1">
                                             <label class="form-label" for="email-id-column">ID Docs Number</label>
                                             <input type="text" id="email-id-column" class="form-control"
                                                 name="id_docs_no" value="<?=$user_data[0]->id_docs_no;?>"
                                                 placeholder="ID Docs Number" />
                                         </div>
                                     </div>

                                     <div class="col-md-6 col-12">
                                         <div class="mb-1">
                                             <label class="form-label" for="email-id-column">Tax Id</label>
                                             <input type="text" id="email-id-column" value="<?=$user_data[0]->tax_id;?>"
                                                 class="form-control" name="tax_id" placeholder="Tax Id" />
                                         </div>
                                     </div>
                                     <div class="col-md-6 col-12">
                                         <div class="mb-1">
                                             <label class="form-lael" for="email-id-column">DOB</label>
                                             <input type="date" id="email-id-column" class="form-control" name="dob"
                                                 value="<?=$user_data[0]->dob;?>" placeholder="ID Docs Number" />
                                         </div>
                                     </div>
                                     <div class="col-md-6 col-12">
                                         <div class="mb-1">
                                             <label class="form-lael" for="email-id-column">Gender</label>
                                             <select class="form-select form-select-lg" id="selectLarge" name="gender">
                                                 <option selected>Choose One</option>
                                                 <option value="1"
                                                     <?php if($user_data[0]->gender == 1){echo "selected" ;}?>>Male
                                                 </option>
                                                 <option value="2"
                                                     <?php if($user_data[0]->gender == 2){echo "selected" ;}?>>Female
                                                 </option>
                                                 <option value="3"
                                                     <?php if($user_data[0]->gender == 3){echo "selected" ;}?>>
                                                     Transgender</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-md-6 col-12">
                                         <div class="mb-1">
                                             <label class="form-lael" for="email-id-column">Date Of Joining</label>
                                             <input type="date" value="<?= $user_data[0]->date_of_joining;?>"
                                                 id="email-id-column" class="form-control" name="date_of_jng"
                                                 placeholder="ID Docs Number" />
                                         </div>
                                     </div>
                                     <div class="col-12">
                                         <button type="submit" class="btn btn-primary me-1">Submit</button>
                                         <a href="<?=base_url('staff');?>"><button type="button"
                                                 class="btn btn-outline-secondary">Back</button></a>
                                     </div>
                                 </div>
                             </form>

                             <!--/ form -->
                         </div>
                     </div>
                     <!-- deactivate account  -->
                     <div class="card">
                         <div class="card-header border-bottom">
                             <h4 class="card-title">Delete Account</h4>
                         </div>
                         <div class="card-body py-2 my-25">
                             <div class="alert alert-warning">
                                 <h4 class="alert-heading">Are you sure you want to delete your account?</h4>
                                 <div class="alert-body fw-normal">
                                     Once you delete your account, there is no going back. Please be certain.
                                 </div>
                             </div>

                             <form id="formAccountDeactivation" class="validate-form" onsubmit="return false">
                                 <div class="form-check">
                                     <input class="form-check-input" type="checkbox" name="accountActivation"
                                         id="accountActivation" data-msg="Please confirm you want to delete account" />
                                     <label class="form-check-label font-small-3" for="accountActivation">
                                         I confirm my account deactivation
                                     </label>
                                 </div>
                                 <div>
                                     <button type="submit" class="btn btn-danger deactivate-account mt-1">Deactivate
                                         Account</button>
                                 </div>
                             </form>
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