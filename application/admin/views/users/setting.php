<!-- BEGIN: Content-->
<div class="app-content content profile-page-content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">

        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills mb-2">
                    <?php if(in_array('updateProfile', $user_permission )): ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo base_url('users/setting/') ?>">
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
                            <h4 class="card-title">Profile Details</h4>
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
                            <!-- form -->
                            <form class="" action="<?php echo base_url('users/setting') ?>" method="post">
                                <div class="row">

                                    <div class="mb-1 col-md-3 col-xs-3">
                                        <label class="form-label" for="basic-addon-name">First name</label>

                                        <input type="text" id="basic-addon-name" class="form-control" name="fname"
                                            placeholder="First name" value="<?php echo $user_data['firstname'] ?>"
                                            aria-label="Name" aria-describedby="basic-addon-name" required readonly/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter your First name.</div>
                                    </div>
                                    <div class="mb-1 col-md-3 col-xs-3">
                                        <label class="form-label" for="basic-addon-name">Last name</label>

                                        <input type="text" id="basic-addon-name" class="form-control" name="lname"
                                            placeholder="Last name" value="<?php echo $user_data['lastname'] ?>"
                                            aria-label="Name" aria-describedby="basic-addon-name" required readonly/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter your Last name.</div>
                                    </div>
                                    <div class="mb-1 col-md-3 col-xs-3">
                                        <label class="form-label" for="basic-default-email1">Email</label>
                                        <input type="email" id="basic-default-email1" class="form-control"
                                            placeholder="john.doe@email.com" name="email" placeholder="Email"
                                            value="<?php echo $user_data['email'] ?>" aria-label="john.doe@email.com"
                                            required readonly/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid email</div>
                                    </div>

                                    <div class="mb-1 col-md-3 col-xs-3">
                                        <label class="form-label" for="bsDob">Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone"
                                            value="<?php echo $user_data['phone'] ?>" id="bsDob" required readonly/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter your date of birth.</div>
                                    </div>
                                    <div class="mb-1 col-md-3 col-xs-3">
                                        <label class="form-label" for="bsDob">Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Address"
                                            value="<?php echo $user_data['address'] ?>" id="bsDob" required readonly/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter your date of birth.</div>
                                    </div>
                                    
                                    <!-- <div class="mb-1 col-md-3 col-xs-3">
                                        <?php $countries=$this->db->get('countries')->result_array();
                                            // print_r($countries);
                                            ?>
                                        <label class="form-label" for="select-country1">Country</label>
                                        <select id="country" class="select2 form-select" name="country" required readonly>
                                            <option value="">Select Country</option>
                                        <?php foreach($countries as $rowIndex){?>
                                            <option value="<?php echo $rowIndex['name'];?>"><?php echo $rowIndex['name'];?></option>
                                            <?php }?>
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select your country</div>
                                    </div> -->
                                    <div class="mb-1 col-md-3 col-xs-3">
                                        <label class="form-label" for="bsDob">PIN CODE</label>
                                        <input type="text" class="form-control" name="pin" placeholder="PIN"
                                            value="<?php echo $user_data['pin'] ?>" id="bsDob" required readonly/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter your date of birth.</div>
                                    </div>
                                    
                                    <div class="mb-1 col-md-3 col-xs-3">
                                        <label class="form-label" class="d-block">Gender</label>
                                        <div class="form-check my-50">
                                            <input type="radio" id="validationRadio3" name="gender" class="form-check-input"
                                                value="1" <?php if($user_data['gender'] == 1) { echo "checked";} ?>
                                                required readonly/>
                                            <label class="form-check-label" for="validationRadio3">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="validationRadio4" name="gender" class="form-check-input"
                                                value="1" <?php if($user_data['gender'] == 2) {echo "checked"; } ?>
                                                required readonly/>
                                            <label class="form-check-label" for="validationRadio4">Female</label>
                                        </div>
                                    </div>
                                    <div class="mb-1 col-md-3 col-xs-3">
                                        <label for="validationCustomUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" class="form-control" id="validationCustomUsername"
                                                name="username" placeholder="Username"
                                                value="<?php echo $user_data['username'] ?>" required readonly/>
                                            <div class="invalid-feedback">Please choose a username.</div>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <div class="alert alert-warning">

                                        <div class="alert-body fw-normal">
                                            Leave the password field empty if you don't want to change.
                                        </div>
                                    </div>
                                    <div class="alert-body fw-normal">

                                    </div>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />

                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Confirm password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />

                                </div>


                                
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                            <!--/ form -->
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
    $("#AccountMainMenu").addClass('sidebar-group-active open');
    $("#AccountMenu").addClass('active');

});
</script>