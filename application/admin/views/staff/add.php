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
             <section class="app-user-list">

                 <!-- list and filter start -->
                 <div class="card">
                     <div class="card-body border-bottom">
                         <h4 class="card-title">Add Staff</h4>

                         <div class="row">
                             <div class="col-md-12">

                                 <a href="<?php echo base_url('staff');?>"><button type="button" class="btn btn-primary"
                                         data-bs-toggle="" data-bs-target="">View
                                         Staff</button>
                                 </a>

                             </div>
                         </div>
                         <section id="multiple-column-form">
                             <div class="row">
                                 <div class="col-12">
                                     <div class="card">
                                         <div class="card-header">
                                             <h4 class="card-title"></h4>
                                         </div>
                                         <div class="card-body">
                                             <form class="form" method="POST" action="<?= base_url('staff/store');?>"
                                                 enctype="multipart/form-data">
                                                 <div class="row">
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Groups</label>
                                                             <select class="form-select form-select-lg" name="groups"
                                                                 id="selectLarge">
                                                                 <option selected>Choose One</option>
                                                                 <?php foreach($group_data as $groups){?>
                                                                 <option value="<?= $groups->id;?>">
                                                                     <?= $groups->group_name;?></option>

                                                                 <?php } ?>
                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="country-floating">Employeement Type</label>
                                                             <select class="form-select form-select-lg"
                                                                 name="employement_type" id="selectLarge">
                                                                 <option selected>Choose One</option>
                                                                 <option value="Contractual">Contractual</option>
                                                                 <option value="Permanent">Permanent</option>
                                                                 <option value="Visiting">Visiting</option>
                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="first-name-column">First
                                                                 Name</label>
                                                             <input type="text" id="first_name" name="first_name"
                                                                 class="form-control" placeholder="First Name" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="first-name-column">Last
                                                                 Name</label>
                                                             <input type="text" id="last_name" name="last_name"
                                                                 class="form-control" placeholder="Last Name" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="email-id-column">Email</label>
                                                             <input type="email" id="email-id-column"
                                                                 class="form-control" name="email"
                                                                 placeholder="Email" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Contact
                                                                 Number</label>
                                                             <input type="text" id="city-column" class="form-control"
                                                                 placeholder="Contact Number" name="contact_number" />
                                                         </div>
                                                     </div>

                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="company-column">Attach
                                                                 Employee Docs</label>
                                                             <input type="file" id="company-column" class="form-control"
                                                                 name="employe_docs" placeholder="Company" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="email-id-column">ID Docs
                                                                 Name</label>
                                                             <input type="text" id="email-id-column"
                                                                 class="form-control" name="id_docs_name"
                                                                 placeholder="ID Docs Name" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="email-id-column">ID Docs
                                                                 Number</label>
                                                             <input type="text" id="email-id-column"
                                                                 class="form-control" name="id_docs_no"
                                                                 placeholder="ID Docs Number" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="email-id-column">Upload
                                                                 Photo</label>
                                                             <input type="file" id="email-id-column"
                                                                 class="form-control" name="image"
                                                                 placeholder="ID Docs Number" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="email-id-column">Tax
                                                                 Id</label>
                                                             <input type="text" id="email-id-column"
                                                                 class="form-control" name="tax_id"
                                                                 placeholder="Tax Id" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-lael" for="email-id-column">DOB</label>
                                                             <input type="date" id="email-id-column"
                                                                 class="form-control" name="dob"
                                                                 placeholder="ID Docs Number" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-lael"
                                                                 for="email-id-column">Gender</label>
                                                             <select class="form-select form-select-lg" id="selectLarge"
                                                                 name="gender">
                                                                 <option selected>Choose One</option>
                                                                 <option value="1">Male</option>
                                                                 <option value="2">Female</option>
                                                                 <option value="3">Transgender</option>
                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-lael" for="email-id-column">Date Of
                                                                 Joining</label>
                                                             <input type="date" id="email-id-column"
                                                                 class="form-control" name="date_of_jng"
                                                                 placeholder="ID Docs Number" />
                                                         </div>
                                                     </div>
                                                     <div class="col-12">
                                                         <button type="submit"
                                                             class="btn btn-primary me-1">Submit</button>
                                                         <a href="<?=base_url('staff/add');?>"><button type="button"
                                                                 class="btn btn-outline-secondary">Reset</button></a>
                                                     </div>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </section>
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